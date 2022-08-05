<?php

namespace App\Http\Controllers;

use App\Jabatan;
use App\Lokasi;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatans = Jabatan::paginate(10);
        return view('jabatan.index', compact('jabatans'));
    }
    public function store(Request $request)
    {
        Jabatan::create([
            'jabatan' => $request->jabatan
        ]);
        return redirect()->back()->with('success', "Data jabatan berhasil ditambahkan");
    }
    public function update(Request $request)
    {
        $jabatan = Jabatan::find($request->id);
        $jabatan->update([
            'jabatan' => $request->jabatan
        ]);
        return redirect()->back()->with('success', "Data jabatan berhasil diubah");
    }
    public function delete(Request $request)
    {
        $jabatan = Jabatan::find($request->id);
        $jabatan->delete();
        return redirect()->back()->with('success', "Data jabatan berhasil dihapus");
    }
}
