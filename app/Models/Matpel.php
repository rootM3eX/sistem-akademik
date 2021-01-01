<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matpel extends Model
{
    protected $table = 'matpels';

    public function matpel()
    {
        return $this->belongsTo('\App\User', 'user_id', 'id');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas','id');
    }

    //mapel to many set_matpel
    public function SetMapel()
    {
        return $this->hasMany('App\Models\Set_matpel','matpel_id','id');
    }
}
