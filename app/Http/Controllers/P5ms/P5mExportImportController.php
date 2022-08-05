<?php

namespace App\Http\Controllers\P5ms;

use App\Http\Controllers\Controller;
use App\Exports\P5ms\Excel\Export;
use App\Imports\P5ms\Excel\Import;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\P5m;
use App\Departemen;
use App\Pegawai;

class P5mExportImportController extends Controller
{
    public function export()
    {
        $p5ms = P5m::join('locations','p5ms.id_lokasi','=','locations.id')
        ->leftjoin('pegawais','p5ms.nrp','=','pegawais.nrp_pegawai')
        ->join('departemens','departemens.id','=','p5ms.id_departemen')
        ->select('p5ms.*','locations.lokasi','pegawais.*','departemens.departemen')
        ->get();
        $pegawais = Pegawai::orderBy('nama_pegawai', 'ASC')->get();
        $departemens = Departemen::orderBy('departemen', 'ASC')->get();
        
        if(count($p5ms)!=0)
            return Excel::download(new Export, 'list-p5m-' . date('d-m-Y') . '.xlsx');
        return redirect()->back()->withInput()->withErrors('Tidak ada Data');
    }

    public function import()
    {
        try {
            Excel::import(new Import, request()->file('file'));
            return redirect()->back()->with('sukses', 'Import Data Berhasil');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Gagal, Pastikan Import Data Anda Sesuai');
        }
    }
}
