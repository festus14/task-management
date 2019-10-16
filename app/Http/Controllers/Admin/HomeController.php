<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Project;
use App\ProjectSubType;
use App\Task;
use App\TaskStatus;
use App\TastCategory;
use App\User;
use Illuminate\Support\Facades\Request;

class HomeController
{
    private $sources = [
        [
            'model'      => '\\App\\Project',
            'date_field' => 'starting_date',
            'field'      => 'name',
            'prefix'     => 'Project: ',
            'suffix'     => 'Starting',
            'route'      => 'admin.projects.edit',
        ],
        [
            'model'      => '\\App\\Task',
            'date_field' => 'starting_date',
            'field'      => 'name',
            'prefix'     => 'Task: ',
            'suffix'     => 'Starting',
            'route'      => 'admin.tasks.edit',
        ],
        [
            'model'      => '\\App\\Task',
            'date_field' => 'ending_date',
            'field'      => 'name',
            'prefix'     => 'Task: ',
            'suffix'     => 'Ending',
            'route'      => 'admin.tasks.edit',
        ],
        [
            'model'      => '\\App\\Project',
            'date_field' => 'deadline',
            'field'      => 'name',
            'prefix'     => 'Project: ',
            'suffix'     => 'Ending',
            'route'      => 'admin.projects.edit',
        ],
        [
            'model'      => '\\App\\TaskComment',
            'date_field' => 'created_at',
            'field'      => 'created_at',
            'prefix'     => 'Comment: ',
            'suffix'     => 'Starting',
            'route'      => 'admin.task-comments.edit',
        ],
        [
            'model'      => '\\App\\TaskCommentReply',
            'date_field' => 'created_at',
            'field'      => 'task_comment_reply',
            'prefix'     => 'Reply: ',
            'suffix'     => 'Starting',
            'route'      => 'admin.task-comment-replies.edit',
        ],
    ];
    public function index(Request $request)
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

        return view('theme.laravel.dashboard', compact('tasks', 'projects', 'users', 'clients', 'events', 'categories', 'assinged_tos', 'managers', 'statuses', 'projects_sub_type'));
    }

    public function test(Request $request){
        return view('admin.payrollLetters.tinymc');
    }
}
