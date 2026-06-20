<?php

namespace Backend\Modules\Finance\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\Finance\Models\Payment;
use Backend\Modules\Finance\Models\Invoice;

use Backend\Modules\CoreAdministration\Patients\Models\Patient;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $query = Payment::with([
            'invoice',
            'patient'
        ]);

        if($request->search)
        {
            $query->where(
                'payment_no',
                'like',
                '%'.$request->search.'%'
            );
        }

        $payments = $query
            ->latest()
            ->paginate(10);

        return view(
            'payments.index',
            compact('payments')
        );
    }

    public function create()
    {
        $invoices = Invoice::pluck(
            'invoice_no',
            'id'
        );

        $patients = Patient::pluck(
            'first_name',
            'id'
        );

        return view(
            'payments.create',
            compact(
                'invoices',
                'patients'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'payment_no'=>'required|unique:payments',
            'invoice_id'=>'required',
            'patient_id'=>'required',
            'amount'=>'required',
            'payment_date'=>'required'

        ]);

        $data = $request->all();

        $data['created_by'] = auth()->id() ?? 1;
        $data['updated_by'] = auth()->id() ?? 1;

        Payment::create($data);

        return redirect()
            ->route('payments.index')
            ->with(
                'success',
                'Payment Created Successfully'
            );
    }

    public function show($id)
    {
        $payment = Payment::with([
            'invoice',
            'patient'
        ])->findOrFail($id);

        return view(
            'payments.show',
            compact('payment')
        );
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);

        $invoices = Invoice::pluck(
            'invoice_no',
            'id'
        );

        $patients = Patient::pluck(
            'first_name',
            'id'
        );

        return view(
            'payments.edit',
            compact(
                'payment',
                'invoices',
                'patients'
            )
        );
    }

    public function update(Request $request,$id)
    {
        $payment = Payment::findOrFail($id);

        $data = $request->all();

        $data['updated_by'] = auth()->id() ?? 1;

        $payment->update($data);

        return redirect()
            ->route('payments.index')
            ->with(
                'success',
                'Payment Updated Successfully'
            );
    }

    public function destroy($id)
    {
        Payment::destroy($id);

        return redirect()
            ->route('payments.index')
            ->with(
                'success',
                'Payment Deleted Successfully'
            );
    }
}