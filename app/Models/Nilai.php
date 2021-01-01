<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilais';

    public function siswa()
    {
        return $this->belongsTo('App\Models\Siswa','id');
    }
    
}
