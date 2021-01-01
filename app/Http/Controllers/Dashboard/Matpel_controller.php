<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\MatpelExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Matpel;
use App\Models\Kelas;
use App\Models\Hari;
use App\Models\Set_matpel;
use App\Models\Set_jadwal;
use App\Models\Set_kelas;
use App\User;

class Matpel_controller extends Controller
{
    public function index()
    {
        $title = 'Add Jadwal';

        $guru = User::all();
        $kelas = Kelas::all();

        return view('dashboard.matpel.index',compact('title','guru','kelas'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'user_id' => 'required',
            'name' => 'required',
        ]);

        $data['user_id'] = $request->user_id;
        $data['kelas_id'] = $request->kelas_id;
        $data['name'] = $request->name;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Matpel::insert($data);

        \Session::flash('sukses','Data Berhasil Di input');

        return redirect()->back();
    }

    public function show()
    {
        $title = 'Show Jadwal Pelajaran';

        $data = Matpel::paginate(5);

        return view('dashboard.matpel.show',compact('title','data'));
    }

    public function guru($id)
    {
        $title = 'Matpel Guru';

        //send data
        $data = User::find($id);

        $matpel = User::where('id',$id)->first();
        $p = $matpel->guru_r()->paginate(5);

        return view('dashboard.matpel.guru',compact('title','data','matpel','p'));
    }

    /*public function g_store(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);

        $data['user_id'] = $id;
        $data['name'] = $request->name;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Matpel::insert($data);

        \Session::flash('sukses','Data Berhasil Di input');

        return redirect()->back();
    }**/

    public function delete($id)
    {
        try {
            Matpel::where('id',$id)->delete();

            \Session::flash('sukses','Data Berhasil Di delete');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect()->back();
    }

    /**
     * function set matpel
     */
    public function set_matpel()
    {
        $title = 'Tambah Jadwal';
        $hari = Hari::get();
        $matpel = Matpel::get();
        $kelas = Kelas::get();

        return view('dashboard.matpel.set_matpel.add',compact('title','hari','matpel','kelas'));
    }

    public function set_store(Request $request)
    {
        $this->validate($request,[
            'hari_id' => 'required',
            'matpel_id' => 'required',
            'dari_jam' => 'required',
            'sampai_jam' => 'required',
        ]);

        //store set_matpel
        $data['hari_id'] = $request->hari_id;
        $data['matpel_id'] = $request->matpel_id;
        $data['kelas_id'] = $request->kelas_id;
        $data['dari_jam'] = $request->dari_jam;
        $data['sampai_jam'] = $request->sampai_jam;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Set_matpel::insert($data);

        \Session::flash('sukses','Data Berhasil Di input');

        return redirect()->back();
    }

    public function show_matpel()
    {
        $data = Set_matpel::with('mapel', 'mapel.kelas')->get();
        $hari = Hari::get();
        $title = 'Jadwal mata pelajaran';

        return view('dashboard.matpel.set_matpel.show',compact('title','data','hari'));
    }

    public function detail_matpel($id)
    {
        $title = 'Detail Jadwal Mapel';

        $data = Set_matpel::where('kelas_id',$id)->get();

        return view('dashboard.matpel.set_matpel.detail',compact('title','data'));
    }

    public function set_delete($id)
    {
        try {
            Set_matpel::where('id',$id)->delete();

            \Session::flash('sukses','Data Berhasil Di delete');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new MatpelExport, 'jadwalMatpel.xlsx');
    }
}
