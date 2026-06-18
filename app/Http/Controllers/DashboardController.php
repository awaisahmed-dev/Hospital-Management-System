<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view(
            'dashboard',
            [
                'patients'=>DB::table('patients')->count(),
                'doctors'=>DB::table('doctors')->count(),
                'departments'=>DB::table('departments')->count(),
                'staff'=>DB::table('staff')->count(),
            ]
        );
    }
}