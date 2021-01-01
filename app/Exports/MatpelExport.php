<?php

namespace App\Exports;

use App\Models\Set_matpel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MatpelExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Set_matpel::all();
    }

    /**
    * @var Invoice $invoice
    */
    public function map($matpel): array
    {
        return [
            $matpel->hari->hari,
            $matpel->mapel->name,
            $matpel->kelas->name,
            date('H:i',strtotime($matpel->dari_jam)),
            date('H:i',strtotime($matpel->sampai_jam)),
        ];
    }

    public function headings(): array
    {
        return [
            'Hari',
            'Mata Pelajaran',
            'Kelas',
            'Masuk',
            'Keluar',
        ];
    }
}
