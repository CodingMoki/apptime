<?php

namespace App\Http\Controllers\Inspeksis;

use App\Inspeksi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InspeksiController extends Controller
{
    public function index()
    {
        $inspeksis = Inspeksi::all();
        $db = DB::statement("select (cv.NAMAPEGAWAI)Nama, (cv.SATKER)Satuan_Kerja, CONVERT(DATE,cal.schedule_date) as Tanggal,LIST_ABSEN.* 
        FROM [dbo].absensi_calendar cal
        LEFT JOIN [dbo].pegawai_cv cv on cv.NIK = cal.emp_code
        LEFT JOIN  (
            SELECT CASE 
        WHEN a.hari = 1 THEN 'Senin' WHEN a.hari = 2 THEN 'Selasa' WHEN a.hari = 3 THEN 'Rabu'
        WHEN a.hari = 4 THEN 'Kamis' WHEN a.hari = 5 THEN 'Jumat' WHEN a.hari = 6 THEN 'Sabtu'
        WHEN a.hari = 7 THEN 'Minggu' END AS Hari,
       -- CASE WHEN a.id_absensi IS NOT NULL THEN a.id_absensi ELSE b.id_absensi END AS id_absensi,
        CASE WHEN a.NIK IS NOT NULL THEN a.NIK ELSE b.NIK END AS No_Page,
        --CASE WHEN convert(time(0),a.waktu) IS  NULL THEN 'Tidak Absen' ELSE 'Absen'
        convert(time(0),a.waktu) AS Masuk, CONCAT(a.latitude,',',a.longitude) AS Koordinat_a, a.lokasi_absen AS Lokasi_Absen_a,  a.foto AS Foto_Masuk, a.keterangan as Keterangan_a,
        CASE WHEN a.tanggal IS NOT NULL THEN a.tanggal ELSE b.tanggal END AS Tanggal,
        --CASE WHEN convert(time(0),b.waktu) IS  NULL THEN 'Tidak Absen' ELSE 'Absen Pulang'
        convert(time(0),b.waktu) AS Pulang, CONCAT(b.latitude,',',b.longitude) AS Koordinat_b, b.lokasi_absen AS Lokasi_Absen_b,  b.foto AS Foto_Pulang, b.keterangan as Keterangan_b
        FROM (SELECT * from [dbo].absensi_transaksi_absensi where flag='0' AND tanggal between '01 November 2021' AND '20 November 2021') a 
        FULL JOIN (SELECT * from [dbo].absensi_transaksi_absensi where  flag='1'  AND tanggal between '01 November 2021' AND '20 November 2021') b 
        ON CONVERT(DATE, a.tanggal) = CONVERT(DATE, b.tanggal) AND a.NIK = b.NIK) LIST_ABSEN 
        on LIST_ABSEN.No_Page = cal.emp_code AND CONVERT(DATE,cal.schedule_date) = LIST_ABSEN.Tanggal
        where (CONVERT(DATE,cal.schedule_date) between '01 November 2021' AND '20 November 2021') AND cv.TIPE = 'DataPribadi'
        ---and LIST_ABSEN.No_Page='10170062'
        ORDER BY cal.DAY, cv.SATKER DESC");
        return $db;

        DB::table('absensi_calendar as cal')->select('(cv.NAMAPEGAWAI)Nama','(cv.SATKER)Satuan_Kerja',DB::raw('CONVERT(DATE,cal.schedule_date) as Tanggal'),'LIST_ABSEN.*')
            ->leftJoin('pegawai_cv as cv',' cv.NIK','=','cal.emp_code')
            ->leftJoin(DB::raw("SELECT CASE 
            WHEN a.hari = 1 THEN 'Senin' WHEN a.hari = 2 THEN 'Selasa' WHEN a.hari = 3 THEN 'Rabu'
            WHEN a.hari = 4 THEN 'Kamis' WHEN a.hari = 5 THEN 'Jumat' WHEN a.hari = 6 THEN 'Sabtu'
            WHEN a.hari = 7 THEN 'Minggu' END AS Hari,
           -- CASE WHEN a.id_absensi IS NOT NULL THEN a.id_absensi ELSE b.id_absensi END AS id_absensi,
            CASE WHEN a.NIK IS NOT NULL THEN a.NIK ELSE b.NIK END AS No_Page,
            --CASE WHEN convert(time(0),a.waktu) IS  NULL THEN 'Tidak Absen' ELSE 'Absen'
            convert(time(0),a.waktu) AS Masuk, CONCAT(a.latitude,',',a.longitude) AS Koordinat_a, a.lokasi_absen AS Lokasi_Absen_a,  a.foto AS Foto_Masuk, a.keterangan as Keterangan_a,
            CASE WHEN a.tanggal IS NOT NULL THEN a.tanggal ELSE b.tanggal END AS Tanggal,
            --CASE WHEN convert(time(0),b.waktu) IS  NULL THEN 'Tidak Absen' ELSE 'Absen Pulang'
            convert(time(0),b.waktu) AS Pulang, CONCAT(b.latitude,',',b.longitude) AS Koordinat_b, b.lokasi_absen AS Lokasi_Absen_b,  b.foto AS Foto_Pulang, b.keterangan as Keterangan_b
            FROM (SELECT * from [dbo].absensi_transaksi_absensi where flag='0' AND tanggal between '01 November 2021' AND '20 November 2021')a"))
        return view('inspeksis.index')->with('inspeksis', $inspeksis);

        //return Inspeksi::all();
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
