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

class ProjectPagesController extends Controller
{
    //create Project

    public function createProject(){
        return view('pages.create_project');
    }


    //upload document

    public function uploadDocument(){
        return view('pages.upload_documents');
    }
    
    // project report
    public function projectReport(){
        return view('pages.project_report');
    }

    // project subtype
    public function projectSubtype(){
        $projectSubTypes = ProjectSubType::with('project_type')->get();
        return view('pages.create_subtype', compact('projectSubTypes'));
    }

    // project report
    public function viewProject(){
        return view('pages.view_project');
    }
}
