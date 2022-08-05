<?php

namespace App\Http\Controllers;

use App\Shift;
use App\Lokasi;

use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function index()
    {
        $shifts = Shift::paginate(10);
        return view('shift.index', compact('shifts'));
    }
    public function store(Request $request)
    {
        Shift::create([
            'shift_code' => $request->shift_code
        ]);
        return redirect()->back()->with('success', "Data lokasi berhasil ditambahkan");
    }

    public function delete(Request $request)
    {
        $shift = Shift::find($request->id);
        $shift->delete();
        return redirect()->back()->with('success', "Data lokasi berhasil dihapus");
    }

    public function update(Request $request)
    {
        $shift = Shift::find($request->id);
        $shift->update([
            'shift_code' => $request->shift_code
        ]);
        return redirect()->back()->with('success', "Data lokasi berhasil diubah");
    }
}
