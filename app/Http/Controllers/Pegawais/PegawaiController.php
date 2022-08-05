<?php
namespace App\Http\Controllers\Pegawais;

use App\Pegawai;
use App\Departemen;
use App\Location;
use App\Http\Controllers\Controller;
use App\Jabatan;
use App\Lokasi;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawais = Pegawai::all();
        $jabatans = Jabatan::all();
        $departemens = Departemen::all();
        $locations = Lokasi::all();

        return view('Pegawais.index', compact('pegawais','departemens','jabatans','locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pegawai::create([
            'nama_pegawai' => $request->nama_pegawai,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nrp_pegawai' => $request->nrp_pegawai,
            'id_jabatan_pegawai' => $request->id_jabatan_pegawai,
            'id_departemen' => $request->id_departemen,
            'id_lokasi' => $request->id_lokasi,
        ]);
        return redirect()->back()->with('success', "Data pegawai berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
