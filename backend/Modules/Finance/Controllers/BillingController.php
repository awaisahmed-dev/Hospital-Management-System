<?php

namespace Backend\Modules\Finance\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\Finance\Models\Billing;
use Backend\Modules\Finance\Models\Invoice;

use Backend\Modules\CoreAdministration\Patients\Models\Patient;

class BillingController extends Controller
{
    public function index(Request $request)
    {
        $query = Billing::with([
            'invoice',
            'patient'
        ]);

        if($request->search)
        {
            $query->where(
                'billing_no',
                'like',
                '%'.$request->search.'%'
            );
        }

        $billings = $query
            ->latest()
            ->paginate(10);

        return view(
            'billing.index',
            compact('billings')
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
            'billing.create',
            compact(
                'invoices',
                'patients'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'billing_no'=>'required|unique:billings',
            'invoice_id'=>'required',
            'patient_id'=>'required',
            'billing_date'=>'required',
            'total_amount'=>'required'

        ]);

        $data = $request->all();

        $data['created_by'] = auth()->id() ?? 1;
        $data['updated_by'] = auth()->id() ?? 1;

        Billing::create($data);

        return redirect()
            ->route('billings.index')
            ->with(
                'success',
                'Billing Created Successfully'
            );
    }

    public function show($id)
    {
        $billing = Billing::with([
            'invoice',
            'patient'
        ])->findOrFail($id);

        return view(
            'billing.show',
            compact('billing')
        );
    }

    public function edit($id)
    {
        $billing = Billing::findOrFail($id);

        $invoices = Invoice::pluck(
            'invoice_no',
            'id'
        );

        $patients = Patient::pluck(
            'first_name',
            'id'
        );

        return view(
            'billing.edit',
            compact(
                'billing',
                'invoices',
                'patients'
            )
        );
    }

    public function update(Request $request,$id)
    {
        $billing = Billing::findOrFail($id);

        $data = $request->all();

        $data['updated_by'] = auth()->id() ?? 1;

        $billing->update($data);

        return redirect()
            ->route('billings.index')
            ->with(
                'success',
                'Billing Updated Successfully'
            );
    }

    public function destroy($id)
    {
        Billing::destroy($id);

        return redirect()
            ->route('billings.index')
            ->with(
                'success',
                'Billing Deleted Successfully'
            );
    }
}