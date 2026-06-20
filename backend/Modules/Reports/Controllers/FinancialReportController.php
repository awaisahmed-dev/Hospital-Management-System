<?php

namespace Backend\Modules\Reports\Controllers;

use App\Http\Controllers\Controller;

use Backend\Modules\Finance\Models\Invoice;
use Backend\Modules\Finance\Models\Payment;
use Backend\Modules\Finance\Models\Billing;
use Backend\Modules\Finance\Models\Expense;
use Backend\Modules\Finance\Models\Payroll;

class FinancialReportController extends Controller
{
    public function index()
    {
        $totalInvoices = Invoice::count();

        $totalPayments = Payment::count();

        $totalBillings = Billing::count();

        $totalExpenses = Expense::count();

        $totalPayrolls = Payroll::count();

        $revenue =
            Payment::sum('amount') +
            Billing::sum('total_amount');

        $expense =
            Expense::sum('amount') +
            Payroll::sum('salary');

        $profit = $revenue - $expense;

        return view(
            'financialreports.index',
            compact(
                'totalInvoices',
                'totalPayments',
                'totalBillings',
                'totalExpenses',
                'totalPayrolls',
                'revenue',
                'expense',
                'profit'
            )
        );
    }
}