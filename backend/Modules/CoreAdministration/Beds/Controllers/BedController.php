<?php

namespace Backend\Modules\CoreAdministration\Beds\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\CoreAdministration\Beds\Models\Bed;

class BedController extends Controller
{
    public function index(Request $request)
    {
        $query = Bed::query();

        if($request->search)
        {
            $query->where('bed_no','like','%'.$request->search.'%')
                  ->orWhere('bed_type','like','%'.$request->search.'%');
        }

        $beds = $query->latest()->paginate(10);

        return view(
            'beds.index',
            compact('beds')
        );
    }

    public function create()
    {
        return view('beds.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required',
            'bed_no' => 'required|unique:beds',
        ]);

        $data = $request->all();

        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();

        Bed::create($data);

        return redirect()
            ->route('beds.index')
            ->with('success','Bed Created Successfully');
    }

    public function show($id)
    {
        $bed = Bed::findOrFail($id);

        return view(
            'beds.show',
            compact('bed')
        );
    }

    public function edit($id)
    {
        $bed = Bed::findOrFail($id);

        return view(
            'beds.edit',
            compact('bed')
        );
    }

    public function update(Request $request,$id)
    {
        $bed = Bed::findOrFail($id);

        $request->validate([
            'room_id'=>'required',
            'bed_no'=>'required',
        ]);

        $data = $request->all();
        $data['updated_by'] = auth()->id();

        $bed->update($data);

        return redirect()
            ->route('beds.index')
            ->with('success','Bed Updated Successfully');
    }

    public function destroy($id)
    {
        Bed::destroy($id);

        return redirect()
            ->route('beds.index')
            ->with('success','Bed Deleted Successfully');
    }
}