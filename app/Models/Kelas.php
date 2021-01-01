<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    public function mapel()
    {
        return $this->hasMany('App\Models\Matpel');
    }

    public function SetMatpel()
    {
        return $this->hasMany('App\Models\Set_matpel', 'kelas_id', 'id');
    }

    public function siswas_r()
    {
        return $this->hasMany('App\Models\KelasSiswa','kelas_id','id');
    }
}
