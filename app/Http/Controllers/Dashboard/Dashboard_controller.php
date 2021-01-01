<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Matpel;

class Dashboard_controller extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $guru = User::all();
        $kelas = Kelas::all();
        $siswa = Siswa::all();
        $matpel = Matpel::all();

        return view('dashboard.beranda.index',compact('title','guru','kelas','siswa','matpel'));
    }
}
