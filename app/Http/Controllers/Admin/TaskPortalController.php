<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class TaskPortalController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('task_portal_access'), 403);

        return view('admin.taskPortals.index');
    }
}
