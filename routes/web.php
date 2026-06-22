<?php

use Illuminate\Support\Facades\Route;
use Backend\Modules\Reports\Controllers\FinancialReportController;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Route;

Route::post(
    '/logout',
    function()
    {
        Auth::logout();

        session()->invalidate();

        session()->regenerateToken();

        return redirect('/');
    }
)->name('logout');

Route::get(
    'financialreports',
    [FinancialReportController::class,'index']
)->name('financialreports.index');

Route::get('/', function () {
    return view('welcome');
});
