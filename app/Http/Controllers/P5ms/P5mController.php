<?php

namespace App\Http\Controllers\p5ms;

use App\P5m;
use App\Departemen;
use App\Http\Controllers\Controller;
use App\Pegawai;
use Illuminate\Http\Request;

class P5mController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p5ms = P5m::join('locations','p5ms.id_lokasi','=','locations.id')
        ->leftjoin('pegawais','p5ms.nrp','=','pegawais.nrp_pegawai')
        ->join('departemens','departemens.id','=','p5ms.id_departemen')
        ->select('p5ms.*','locations.lokasi','pegawais.*','departemens.departemen')
        ->get();
        $pegawais = Pegawai::orderBy('nama_pegawai', 'ASC')->get();
        $departemens = Departemen::orderBy('departemen', 'ASC')->get();

        return view('p5ms.index', compact('p5ms', 'pegawais', 'departemens'));
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
        //
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
