<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hari extends Model
{
    protected $table = 'hari';

    public function jadwals()
    {
        return $this->hasMany('App\Models\Set_matpel','hari_id','id');
    }
}
