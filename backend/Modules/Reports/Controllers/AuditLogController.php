<?php

namespace Backend\Modules\Reports\Controllers;

use App\Http\Controllers\Controller;

class AuditLogController extends Controller
{
    public function index()
    {
        return view('auditlogs.index');
    }
}