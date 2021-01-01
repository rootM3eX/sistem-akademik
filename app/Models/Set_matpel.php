<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Set_matpel extends Model
{
    protected $table = 'set_matpels';

    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas', 'kelas_id', 'id');
    }

    public function mapel()
    {
        return $this->belongsTo('App\Models\Matpel', 'matpel_id' ,'id');
    }

    public function hari()
    {
        return $this->belongsTo('App\Models\Hari','id');
    }
}
