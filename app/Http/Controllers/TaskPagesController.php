<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskPagesController extends Controller
{
    //create Task

    public function createTask(){
        return view('pages.create_task');
    }
}
