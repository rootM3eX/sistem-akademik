<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Siswa;
use App\Models\Nilai;

class Siswa_controller extends Controller
{
    public function index()
    {
        $title = 'Siswa';

        return view('dashboard.siswa.index',compact('title'));
    }

    public function add()
    {
        $title = 'add siswa';

        return view('dashboard.siswa.add',compact('title'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'email' => 'required',
        ]);

        //insert siswa
        $data['nama'] = $request->nama;
        $data['email'] = $request->email;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        //insert biodata siswa
        $data['nisn'] = $request->nisn;
        $data['no_hp'] = $request->no_hp;
        $data['alamat'] = $request->alamat;
        $data['tempat_lahir'] = $request->tempat_lahir;
        $data['tanggal_lahir'] = $request->tanggal_lahir;
        $data['kelas'] = $request->kelas;
        $data['jurusan'] = $request->jurusan;

        $file = $request->file('photo');
        if ($file) {
            $file->move('biodata_siswa', $file->getClientOriginalName());
            $data['photo'] = 'biodata_siswa/'.$file->getClientOriginalName();
        }

        Siswa::insert($data);

        \Session::flash('sukses','Data Berhasil diSave');

        return redirect()->back();
    }

    public function show()
    {
        $title = 'show siswa';
        $data = Siswa::paginate(5);

        return view('dashboard.siswa.show',compact('title','data'));
    }

    public function delete($id)
    {
        try {
            Siswa::where('id',$id)->delete();

            \Session::flash('sukses','Data Berhasil Di delete');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $title = 'Edit Data Siswa';
        $dt = Siswa::find($id);

        return view('dashboard.siswa.edit',compact('title','dt'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'nama' => 'required',
            'email' => 'required',
        ]);

        //insert siswa
        $data['nama'] = $request->nama;
        $data['email'] = $request->email;
        //$data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        //insert biodata siswa
        $data['nisn'] = $request->nisn;
        $data['no_hp'] = $request->no_hp;
        $data['alamat'] = $request->alamat;
        $data['tempat_lahir'] = $request->tempat_lahir;
        $data['tanggal_lahir'] = $request->tanggal_lahir;
        $data['kelas'] = $request->kelas;
        $data['jurusan'] = $request->jurusan;

        $file = $request->file('photo');
        if ($file) {
            $file->move('biodata_siswa', $file->getClientOriginalName());
            $data['photo'] = 'biodata_siswa/'.$file->getClientOriginalName();
        }

        Siswa::where('id',$id)->update($data);

        \Session::flash('sukses','Data Berhasil diUpdate');

        return redirect()->back();
    }

    public function lulus($id)
    {
        try {
            //kondisi klik button lulus
            Siswa::where('id',$id)->update([
                'is_aktif'=>1
            ]);

            \Session::flash('sukses','Siswa Berhasil Diaktifkan');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect()->back();
    }

    public function aktif()
    {
        $title = 'Data Siswa Yang Aktif';
        $data = Siswa::where('is_aktif',1)->paginate(5);

        return view('dashboard.siswa.show', compact('title','data'));
    }

    public function belum_aktif()
    {
        $title = 'Data Siswa yang Tidak Aktif';

        $data = Siswa::whereNull('is_aktif')->paginate(5);

        return view('dashboard.siswa.show', compact('title','data'));
    }

    public function detail($id)
    {
        $title = 'Detail Siswa';
        $dt = Siswa::find($id);

        return view('dashboard.siswa.detail',compact('title','dt'));
    }

    public function export()
    {
        return Excel::download(new SiswaExport, 'siswa.xlsx');
    }
}
