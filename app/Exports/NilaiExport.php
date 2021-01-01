<?php

namespace App\Exports;

use App\Models\Nilai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NilaiExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Nilai::all();
    }

    /**
    * @var Invoice $invoice
    */
    public function map($nilai): array
    {
        return [
            'Nama',
            $nilai->semester,
            $nilai->b_indo,
            $nilai->b_inggris,
            $nilai->mtk,
            $nilai->pkn,
            $nilai->sejarah,
            $nilai->sosio,
            $nilai->fisika,
            $nilai->kimia,
            $nilai->tafsir,
            $nilai->qurdis,
        ];
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Semester',
            'B.Indonesia',
            'B.Inggris',
            'Matematika',
            'PKN',
            'Sejarah',
            'Sosiologi',
            'Fisika',
            'Kimia',
            'Tafsir',
            'Quran Hadis',
        ];
    }
}
