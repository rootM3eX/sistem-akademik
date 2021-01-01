<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\GuruExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Guru;
use App\User;
use Hash;

class Guru_controller extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $user_id = \Auth::user()->id;

        $cek = Guru::where('user_id',$user_id)->count();
        if ($cek < 1) {
            $pesan = 'Hallo guruku Harap Lengkapi Biodata';
        }else {
            $pesan = 'Terimakasih sudah melengkapi data diri';
        }

        return view('dashboard.guru.index',compact('title','cek','user_id','pesan'));

    }

    public function add()
    {
        $title = 'Add Guru';

        return view('dashboard.guru.add',compact('title'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'email' => 'required',
        ]);

        $data['name'] = $request->nama;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        User::insert($data);

        \Session::flash('sukses','Guru berhasil ditambahkan');

        return redirect('guru/add');
    }

    public function show()
    {
        if (\Auth::user()->role == 1) {
        $title = 'Show Data Guru';
        $data = User::withCount('biodata_guru_r')->whereNull('role')->orderBy('name','asc')->paginate(5);

        return view('dashboard.guru.show',compact('title','data'));
        }
    }

    public function lulus($id)
    {
        try {
            //kondisi klik button lulus
            User::where('id',$id)->update([
                'is_aktif'=>1
            ]);

            \Session::flash('sukses','Guru Berhasil Diaktifkan');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect()->back();
    }

    public function verifikasi()
    {
        $title = 'Data Guru Yang Aktif';
        $data = User::where('is_aktif',1)->orderBy('name','asc')->paginate(5);

        return view('dashboard.guru.show', compact('title','data'));
    }

    public function belum_verifikasi()
    {
        $title = 'Data Guru yang Tidak Aktif';

        $data = User::whereNull('is_aktif')->orderBy('name','asc')->paginate(5);

        return view('dashboard.guru.show', compact('title','data'));
    }

    public function delete($id)
    {
        try {
            User::where('id',$id)->delete();

            \Session::flash('sukses','Data Berhasil Di delete');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $title = 'Edit Data Guru';
        $dt = User::with('biodata_guru_r')->find($id);

        return view('dashboard.guru.edit',compact('title','dt'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'nip' => 'required',
        ]);
        $data['no_hp'] = $request->no_hp;
        $data['nip'] = $request->nip;
        //$data['user_id'] = $id;
        $data['alamat'] = $request->alamat;
        $data['tempat_lahir'] = $request->tempat_lahir;
        $data['tanggal_lahir'] = $request->tanggal_lahir;
        //$data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $file = $request->file('photo');
        if ($file) {
            $file->move('guru', $file->getClientOriginalName());
            $data['photo'] = 'guru/'.$file->getClientOriginalName();
        }

        Guru::where('user_id',$id)->update($data);

        //update user table
        $user['name'] = $request->name;
        $user['email'] = $request->email;
        $data['updated_at'] = date('Y-m-d H:i:s');

        User::where('id',$id)->update($user);

        \Session::flash('sukses','Data Guru Berhasil diupdate');

        return redirect()->back();
    }
    public function export()
    {
        return Excel::download(new GuruExport, 'guru.xlsx');
    }
}
