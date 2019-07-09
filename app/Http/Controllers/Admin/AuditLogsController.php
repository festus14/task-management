<?php

namespace App\Http\Controllers\Admin;

use App\AuditLog;
use App\Http\Controllers\Controller;

class AuditLogsController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('audit_log_access'), 403);

        $auditLogs = AuditLog::all();

        return view('admin.auditLogs.index', compact('auditLogs'));
    }

    public function show(AuditLog $auditLog)
    {
        abort_unless(\Gate::allows('audit_log_show'), 403);

        return view('admin.auditLogs.show', compact('auditLog'));
    }
}
