<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Hari;
use App\Models\KelasSiswa;
use App\Models\Siswa;

class Kelas_controller extends Controller
{
    public function add()
    {
        $title = 'Add Kelas';

        return view('dashboard.kelas.add',compact('title'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $data['name'] = $request->name;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Kelas::insert($data);

        \Session::flash('sukses','Data Berhasil Di input');

        return redirect()->back();
    }

    public function show()
    {
        $title = 'Show data kelas';
        $data = Kelas::all();

        return view('dashboard.kelas.show',compact('title','data'));
    }

    public function edit($id)
    {
        $title = 'Edit data kelas';
        $dt = Kelas::find($id);

        return view('dashboard.kelas.edit',compact('title','dt'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $data['name'] = $request->name;
        //$data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Kelas::where('id',$id)->update($data);

        \Session::flash('sukses','Data Berhasil Di input');

        return redirect()->back();
    }

    public function delete($id)
    {
        try {
            Kelas::where('id',$id)->delete();

            \Session::flash('sukses','Data Berhasil Di delete');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect()->back();
    }

    /*
    function hari
    */
    public function hari()
    {
        $title = 'add hari';
        return view('dashboard.kelas.hari.index',compact('title'));
    }

    public function h_store(Request $request)
    {
        $this->validate($request,[
            'hari' => 'required',
        ]);

        $data['hari'] = $request->hari;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Hari::insert($data);

        \Session::flash('sukses','Data Berhasil Di input');

        return redirect()->back();
    }

    public function detail($id)
    {
        $title = 'Detail kelas';

        $data = Kelas::find($id);
        $siswa = KelasSiswa::where('kelas_id',$id)->count();
        $sw = Siswa::orderBy('nama','asc')->get();

        return view('dashboard.kelas.detail',compact('title','data','siswa','sw'));
    }

    public function add_siswa(Request $request,$id)
    {
        try {
            $id_siswa = $request->siswa_id;

            $data['siswa_id'] = $request->siswa_id;
            $data['kelas_id'] = $id;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');

            KelasSiswa::insert($data);

            \Session::flash('sukses','Siswa Berhasil ditambahkan');

        } catch (\Throwable $th) {
            \Session::flash('gagal',$th->getMessage());
        }

        return redirect()->back();
    }

    public function delete_siswa($id)
    {
        try {
            KelasSiswa::where('id',$id)->delete();

            \Session::flash('sukses','Data Berhasil Di delete');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect()->back();
    }
}
