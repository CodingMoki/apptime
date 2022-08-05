<?php

namespace App\Http\Controllers;

use App\Departemen;
use App\Jabatan;
use App\Lokasi;
use App\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::paginate(10);
        $jabatans = Jabatan::all();
        $departemens = Departemen::all();
        $locations = Lokasi::all();
        return view('pegawai.index', compact('pegawais','departemens','jabatans','locations'));
    }
    public function store(Request $request)
    {
        Pegawai::create([
            'nama_pegawai' => $request->nama_pegawai,
            'nrp_pegawai' => $request->nrp_pegawai,
            'jenis_kelamin' => $request->jenis_kelamin,
            'id_jabatan_pegawai' => $request->id_jabatan_pegawai,
            'id_departemen' => $request->id_departemen,
            'id_lokasi' => $request->id_lokasi,
        ]);
        return redirect()->back()->with('success', "Data pegawai berhasil ditambahkan");
    }
    public function update(Request $request)
    {
        $jabatan = Pegawai::find($request->id);
        $jabatan->update([
            'nama_pegawai' => $request->nama_pegawai,
            'nrp_pegawai' => $request->nrp_pegawai,
            'jenis_kelamin' => $request->jenis_kelamin,
            'id_jabatan_pegawai' => $request->id_jabatan_pegawai,
            'id_departemen' => $request->id_departemen,
            'id_lokasi' => $request->id_lokasi,
        ]);
        return redirect()->back()->with('success', "Data pegawai berhasil diubah");
    }
    public function delete(Request $request)
    {
        $jabatan = Pegawai::find($request->id);
        $jabatan->delete();
        return redirect()->back()->with('success', "Data pegawai berhasil dihapus");
    }
}
