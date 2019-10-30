<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = Project::with('tasks')
        ->with('team_members')
        ->with('team_members')
        ->get();

    $tasks = Task::with('client')
        ->with('project_sub_type')
        ->with('project')
        ->with('status')
        ->with('manager')
        ->with('assinged_tos')
        ->with('category')
        ->get();

    $users = User::all();

    $clients = Client::all();
    $categories = TastCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

    $assinged_tos = User::all()->pluck('name', 'id');

    $managers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

    $statuses = TaskStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

    $projects_sub_type = ProjectSubType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


    $events = [];
    foreach ($this->sources as $source) {
        foreach ($source['model']::all() as $model) {
            $crudFieldValue = $model->getOriginal($source['date_field']);

            if (!$crudFieldValue) {
                continue;
            }
            if($source['date_field'] === 'deadline'){
                $classname = 'm-fc-event--danger m-fc-event--solid-focus';
            }
            elseif( $source['date_field'] === 'created_at'){
                $classname = 'm-fc-event--accent';
            }
            elseif( $source['date_field'] === 'ending_date'){
                $classname = 'm-fc-event--light  m-fc-event--solid-danger';
            }else{
                $classname = 'm-fc-event--light m-fc-event--solid-warning';
            }
            $events[] = [
                'title' => trim( $model->{$source['field']}),
                'start' => $crudFieldValue,
                'url'   => route($source['route'], $model->id),
                'className' => $classname,
                'description' => $source['prefix'] . " " . $model->{$source['field']}
                    . " " . $source['suffix'],
            ];
        }
    }
        return view('theme.laravel.testing', compact('tasks', 'projects', 'users', 'clients', 'events', 'categories', 'assinged_tos', 'managers', 'statuses', 'projects_sub_type'));
    }
}
