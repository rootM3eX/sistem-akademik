<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasSiswa extends Model
{
    protected $table = 'kelas_siswa';

    public function kelas_r()
    {
        return $this->belongsTo('App\Models\Kelas','id');
    }

    public function siswa_r()
    {
        return $this->belongsTo('App\Models\Siswa','siswa_id','id');
    }
}
