<?php

namespace App\Http\Controllers;

use App\Lokasi;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Lokasi::paginate(10);
        return view('lokasi.index', compact('locations'));
    }
    public function store(Request $request)
    {
        Lokasi::create([
            'lokasi' => $request->lokasi
        ]);
        return redirect()->back()->with('success', "Data lokasi berhasil ditambahkan");
    }
    public function update(Request $request)
    {
        $lokasi = Lokasi::find($request->id);
        $lokasi->update([
            'lokasi' => $request->lokasi
        ]);
        return redirect()->back()->with('success', "Data lokasi berhasil diubah");
    }
    public function delete(Request $request)
    {
        $lokasi = Lokasi::find($request->id);
        $lokasi->delete();
        return redirect()->back()->with('success', "Data lokasi berhasil dihapus");
    }
}
