<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Client;
use App\Http\Requests\MassDestroyTaskRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Project;
use App\ProjectSubType;
use App\Task;
use App\TaskStatus;
use App\TastCategory;
use App\User;
use App\TaskComment;
use App\Notifications\TestNotification;

class TaskPagesController extends Controller
{
    //create Task

    public function createTask(){
        return view('pages.create_task');
    }
    public function getProjects(Request $request, $client_id){
        return Project::where('client_id', '=', $client_id)->get();
    }
    public function getProject($project_type){
        return Project::where('project_type_id', $project_type)->get();
    }

    public function getAllClient(Request $request){
        return Client::all();
    }
    public function getSingleClient(Request $request, $id){
        return Client::findOrFail($id);
    }

    public function getProjectSubType($project_type){
        return ProjectSubType::where('project_type_id', $project_type)->get();
    }

    public function getSingleProjectSubType(Request $request, $id){
        return ProjectSubType::where('project_type_id', $id)->get();
    }


    public function getAllTaskComments(Request $request, $task_id){
        return TaskComment::where('task_id', $task_id)
        ->with('user')
        ->with('task')
        ->with('client')
        ->with('project')
        ->get();
    }


    public function getSingleComment($id){
        return TaskComment::where('id', $id)
        ->with('user')
        ->with('task')
        ->with('client')
        ->with('project')
        ->get();
    }

    public function projectDashboard(Request $request){
        $projects = Project::with('tasks')->with('client')->with('status')->get();
        //dd($projects);
        $tasks = Task::all();
        return view('pages.project_dashboard', compact('projects', 'tasks'));
    }

    public function createTaskCategory(){
        return view('pages.task_category');
    }

    public function viewTask(){
        return view('pages.view_task');
    }

    public function letter_template(){
        return view('letter.letter_template');
    }

    //sendMail
    public function sendMail(){
        $user = App\User::find(1);

        $user->notify(new TestNotification("A new user has visited on our application."));


        return view('pages.send_email');
    }


}
