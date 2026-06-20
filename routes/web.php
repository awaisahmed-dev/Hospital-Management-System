<?php

use Illuminate\Support\Facades\Route;
use Backend\Modules\Reports\Controllers\FinancialReportController;

Route::get(
    'financialreports',
    [FinancialReportController::class,'index']
)->name('financialreports.index');

Route::get('/', function () {
    return view('welcome');
});
