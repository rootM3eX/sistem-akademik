<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Siswa::all();
    }

    /**
    * @var Invoice $invoice
    */
    public function map($siswa): array
    {
        return [
            $siswa->nama,
            $siswa->email,
            $siswa->no_hp,
            $siswa->nisn,
            $siswa->kelas,
            $siswa->jurusan,
            $siswa->alamat,
            $siswa->tempat_lahir,
            date('Y-m-d',strtotime($siswa->tanggal_lahir)),
        ];
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Email',
            'No.HP',
            'NISN',
            'Kelas',
            'Jurusan',
            'Alamat',
            'Tempat Lahir',
            'Tanggal Lahir',
        ];
    }
}
