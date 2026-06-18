<?php

namespace Backend\Modules\CoreAdministration\Rooms\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\CoreAdministration\Rooms\Models\Room;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $query = Room::query();

        if($request->search)
        {
            $query->where('room_no','like','%'.$request->search.'%')
                  ->orWhere('room_name','like','%'.$request->search.'%')
                  ->orWhere('room_type','like','%'.$request->search.'%');
        }

        $rooms = $query
            ->latest()
            ->paginate(10);

        return view(
            'rooms.index',
            compact('rooms')
        );
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'branch_id' => 'required',
            'room_no' => 'required|unique:rooms',
            'room_type' => 'required',

        ]);

        $data = $request->all();

        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();

        Room::create($data);

        return redirect()
            ->route('rooms.index')
            ->with('success','Room Created Successfully');
    }

    public function show($id)
    {
        $room = Room::findOrFail($id);

        return view(
            'rooms.show',
            compact('room')
        );
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);

        return view(
            'rooms.edit',
            compact('room')
        );
    }

    public function update(Request $request,$id)
    {
        $room = Room::findOrFail($id);

        $request->validate([

            'branch_id' => 'required',
            'room_no' => 'required',
            'room_type' => 'required',

        ]);

        $data = $request->all();

        $data['updated_by'] = auth()->id();

        $room->update($data);

        return redirect()
            ->route('rooms.index')
            ->with('success','Room Updated Successfully');
    }

    public function destroy($id)
    {
        Room::destroy($id);

        return redirect()
            ->route('rooms.index')
            ->with('success','Room Deleted Successfully');
    }
}
