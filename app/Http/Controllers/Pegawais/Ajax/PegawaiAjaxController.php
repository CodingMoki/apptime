<?php

namespace App\Http\Controllers\Pegawais\Ajax;

use App\Http\Controllers\Controller;
use App\Pegawai;
use Illuminate\Http\Request;

class PegawaiAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $pegawai = new Pegawai();
        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->nrp_pegawai = $request->nrp_pegawai;
        $pegawai->id_jabatan_pegawai = $request->id_jabatan_pegawai;
        $pegawai->id_departemen = $request->id_departemen;
        $pegawai->id_lokasi = $request->id_lokasi;     
        $pegawai->save();

        return response()->json(['status' => 200, 'message' => 'Success', 'data' => $pegawai], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pegawai = Pegawai::findOrFail($id);

        return response()->json(['status' => 200, 'message' => 'Success', 'data' => $pegawai], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);

        return response()->json(['status' => 200, 'message' => 'Success', 'data' => $pegawai], 200);
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
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->nrp_pegawai = $request->nrp_pegawai;
        $pegawai->id_jabatan_pegawai = $request->id_jabatan_pegawai;
        $pegawai->id_departemen = $request->id_departemen;
        $pegawai->id_lokasi = $request->id_lokasi;   
        $pegawai->save();

        return response()->json(['status' => 200, 'message' => 'Success', 'data' => $pegawai], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pegawai::findOrFail($id)->delete();

        return response()->json(['status' => 200, 'message' => 'Success'], 200);
    }
}
