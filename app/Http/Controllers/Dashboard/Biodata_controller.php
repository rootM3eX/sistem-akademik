<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\User;

class Biodata_controller extends Controller
{
    public function index()
    {
        $title = 'isi lengkap biodata';
        $dt = User::with('biodata_guru_r')->where('id',\Auth::user()->id)->first();
        $cek = Guru::where('user_id',\Auth::user()->id)->count();

        return view('dashboard.biodata.index',compact('title','dt','cek'));
    }

    public function store(Request $request,$id)
    {
        $this->validate($request,[
            'nip' => 'required',
        ]);
        $data['no_hp'] = $request->no_hp;
        $data['nip'] = $request->nip;
        $data['user_id'] = $id;
        $data['alamat'] = $request->alamat;
        $data['tempat_lahir'] = $request->tempat_lahir;
        $data['tanggal_lahir'] = $request->tanggal_lahir;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $file = $request->file('photo');
        if ($file) {
            $file->move('guru', $file->getClientOriginalName());
            $data['photo'] = 'guru/'.$file->getClientOriginalName();
        }

        Guru::insert($data);

        \Session::flash('sukses','Data Berhasil dimasukan');

        return redirect()->back();
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
}
