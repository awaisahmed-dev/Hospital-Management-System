<?php

namespace Backend\Modules\Finance\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\Finance\Models\Invoice;

use Backend\Modules\CoreAdministration\Patients\Models\Patient;
use Backend\Modules\CoreAdministration\Doctors\Models\Doctor;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Invoice::with([
            'patient',
            'doctor'
        ]);

        if($request->search)
        {
            $query->where(
                'invoice_no',
                'like',
                '%'.$request->search.'%'
            );
        }

        $invoices = $query
            ->latest()
            ->paginate(10);

        return view(
            'invoices.index',
            compact('invoices')
        );
    }

    public function create()
    {
        $patients = Patient::pluck(
            'first_name',
            'id'
        );

        $doctors = Doctor::pluck(
            'first_name',
            'id'
        );

        return view(
            'invoices.create',
            compact(
                'patients',
                'doctors'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'invoice_no'=>'required|unique:invoices',
            'patient_id'=>'required',
            'invoice_date'=>'required',
            'total_amount'=>'required'

        ]);

        $data = $request->all();

        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();

        Invoice::create($data);

        return redirect()
            ->route('invoices.index')
            ->with(
                'success',
                'Invoice Created Successfully'
            );
    }

    public function show($id)
    {
        $invoice = Invoice::with([
            'patient',
            'doctor'
        ])->findOrFail($id);

        return view(
            'invoices.show',
            compact('invoice')
        );
    }

    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);

        $patients = Patient::pluck(
            'first_name',
            'id'
        );

        $doctors = Doctor::pluck(
            'first_name',
            'id'
        );

        return view(
            'invoices.edit',
            compact(
                'invoice',
                'patients',
                'doctors'
            )
        );
    }

    public function update(Request $request,$id)
    {
        $invoice = Invoice::findOrFail($id);

        $data = $request->all();

        $data['updated_by'] = auth()->id();

        $invoice->update($data);

        return redirect()
            ->route('invoices.index')
            ->with(
                'success',
                'Invoice Updated Successfully'
            );
    }

    public function destroy($id)
    {
        Invoice::destroy($id);

        return redirect()
            ->route('invoices.index')
            ->with(
                'success',
                'Invoice Deleted Successfully'
            );
    }
}