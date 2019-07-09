<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ClientPortalController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('client_portal_access'), 403);

        return view('admin.clientPortals.index');
    }
}
