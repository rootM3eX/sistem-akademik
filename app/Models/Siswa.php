<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';

    public function nilai()
    {
        return $this->hasMany('App\Models\Nilai','siswa_id','id');
    }
}
