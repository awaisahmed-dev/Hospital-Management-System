<?php

namespace Backend\Modules\Clinical\LabOrders\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\Clinical\LabOrders\Models\LabOrder;
use Backend\Modules\Clinical\Consultations\Models\Consultation;

use Backend\Modules\CoreAdministration\Patients\Models\Patient;
use Backend\Modules\CoreAdministration\Doctors\Models\Doctor;

class LabOrderController extends Controller
{
    public function index(Request $request)
    {
        $query = LabOrder::query();

        if($request->search)
        {
            $query->where(
                'lab_order_no',
                'like',
                '%'.$request->search.'%'
            );
        }

        $laborders = $query->latest()->paginate(10);

        return view(
            'laborders.index',
            compact('laborders')
        );
    }

    public function create()
    {
        $consultations = Consultation::pluck('id','id');

        $patients = Patient::pluck(
            'first_name',
            'id'
        );

        $doctors = Doctor::pluck(
            'first_name',
            'id'
        );

        return view(
            'laborders.create',
            compact(
                'consultations',
                'patients',
                'doctors'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'lab_order_no'=>'required|unique:lab_orders',
            'patient_id'=>'required',
            'doctor_id'=>'required',
            'test_name'=>'required'

        ]);

        $data = $request->all();

        $data['created_by']=auth()->id();
        $data['updated_by']=auth()->id();

        LabOrder::create($data);

        return redirect()
            ->route('laborders.index')
            ->with(
                'success',
                'Lab Order Created Successfully'
            );
    }

    public function show($id)
    {
        $laborder = LabOrder::findOrFail($id);

        return view(
            'laborders.show',
            compact('laborder')
        );
    }

    public function edit($id)
    {
        $laborder = LabOrder::findOrFail($id);

        $consultations = Consultation::pluck('id','id');

        $patients = Patient::pluck(
            'first_name',
            'id'
        );

        $doctors = Doctor::pluck(
            'first_name',
            'id'
        );

        return view(
            'laborders.edit',
            compact(
                'laborder',
                'consultations',
                'patients',
                'doctors'
            )
        );
    }

    public function update(Request $request,$id)
    {
        $laborder = LabOrder::findOrFail($id);

        $data = $request->all();

        $data['updated_by']=auth()->id();

        $laborder->update($data);

        return redirect()
            ->route('laborders.index')
            ->with(
                'success',
                'Lab Order Updated Successfully'
            );
    }

    public function destroy($id)
    {
        LabOrder::destroy($id);

        return redirect()
            ->route('laborders.index')
            ->with(
                'success',
                'Lab Order Deleted Successfully'
            );
    }
}