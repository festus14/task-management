<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TaskPagesController extends Controller
{
    //create Task

    public function createTask(){
        return view('pages.create_task');
    }

    
}
