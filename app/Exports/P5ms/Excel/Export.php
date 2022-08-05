<?php

namespace App\Exports\P5ms\Excel;

use App\P5m;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class Export implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $P5ms = P5m::all();

        return collect([
            $this->customProcessDataP5msToExcel($P5ms)
        ]);
    }

    public function headings(): array
    {
        return [
            'No.',
            'Materi',
            'Tanggal',
            'NRP',
            'Nama Pemateri',
            'Departemen',
            'Lokasi',
            'Shift',
            'Photo',
        ];
    }

    public function registerEvents(): array
    {

        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A1:W1';
                $event->sheet->setAllBorders('thin')->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            }
        ];
    }

    public function customProcessDataP5msToExcel($model)
    {
        foreach ($model as $key => $p5m) {
            $data[$key]['no'] = $key + 1;
            $data[$key]['materi'] = $p5m->materi;
            $data[$key]['tanggal'] = $p5m->tanggal;
            $data[$key]['nrp'] = $p5m->nrp;
            $data[$key]['nama_pegawai'] = $p5m->nama_pegawai;
            $data[$key]['departemen'] = $p5m->departemen;
            $data[$key]['lokasi'] = $p5m->lokasi;
            $data[$key]['id_shift'] = $this->checkP5mConditions($p5m);
            $data[$key]['photo_p5m'] = $p5m->photo_p5m;

        }

        return $data;
    }

    public function checkP5mConditions($p5m)
    {
        if ($p5m->id_shift === 1) {
            $id_shift = 'Shift 1';
        } else {
            $id_shift = 'Shift 2';
        }

        return $id_shift;
    }
}
