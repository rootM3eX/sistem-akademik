<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\NilaiExport;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Models\Siswa;
use App\Models\Nilai;
use PDF;

class Nilai_controller extends Controller
{
    public function nilai($id)
    {
        $title = 'Input nilai siswa';
        $dt = Siswa::find($id);

        return view('dashboard.nilai.index',compact('title','dt'));
    }

    public function store(Request $request,$id)
    {
        $this->validate($request,[
            'siswa_id' => 'required',
            'b_indo' => 'required',
            'b_inggris' => 'required',
            'mtk' => 'required',
            'pkn' => 'required'
        ]);

        $data['siswa_id'] = $id;
        $data['semester'] = $request->semester;
        $data['b_indo'] = $request->b_indo;
        $data['b_inggris'] = $request->b_inggris;
        $data['mtk'] = $request->mtk;
        $data['pkn'] = $request->pkn;
        $data['sejarah'] = $request->sejarah;
        $data['sosio'] = $request->sosio;
        $data['fisika'] = $request->fisika;
        $data['kimia'] = $request->kimia;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Nilai::insert($data);

        \Session::flash('sukses','Data Berhasil Di input');

        return redirect()->back();
    }

    public function detail($id)
    {
        $title = 'detail nilai siswa';
        $data = Nilai::where('siswa_id',$id)->get();

        return view('dashboard.nilai.detail',compact('title','data'));
    }

    public function edit($id)
    {
        $title = 'edit nilai siwa';
        $dt = Nilai::where('id',$id)->first();

        return view('dashboard.nilai.edit',compact('title','dt'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'b_indo' => 'required',
            'b_inggris' => 'required',
            'mtk' => 'required',
            'pkn' => 'required',
            'semester' => 'required'
        ]);

        //$data['siswa_id'] = $id;
        $data['semester'] = $request->semester;
        $data['b_indo'] = $request->b_indo;
        $data['b_inggris'] = $request->b_inggris;
        $data['mtk'] = $request->mtk;
        $data['pkn'] = $request->pkn;
        $data['sejarah'] = $request->sejarah;
        $data['sosio'] = $request->sosio;
        $data['fisika'] = $request->fisika;
        $data['kimia'] = $request->kimia;
        //$data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Nilai::where('siswa_id',$id)->update($data);

        \Session::flash('sukses','Data Berhasil Di update');

        return redirect()->back();
    }

    public function cetak($id){
        try {
            $dt = Nilai::where('id',$id)->find($id);
 
            $pdf = PDF::loadview('dashboard.nilai.pdf',compact('dt'))->setPaper('a4', 'landscape');
            return $pdf->stream();
 
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage().' ! '.$e->getLine());
        }
 
        return redirect()->back();
    }

    public function export($id)
    {
        $nilai = Nilai::find($id);
        $word = new TemplateProcessor('file-word/rapot.docx');
        $word->setValue('id', $nilai->id);
        $word->setValue('semester', $nilai->semester);
        $word->setValue('b_indo', $nilai->b_indo);
        $word->setValue('b_inggris', $nilai->b_inggris);
        $word->setValue('pkn', $nilai->pkn);
        $word->setValue('mtk', $nilai->mtk);
        $fileName = $nilai->id;
        $word->saveAs($fileName . '.docx');
        return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
    }

    public function delete($id)
    {
        try {
            Nilai::where('id',$id)->delete();
            
            \Session::flash('sukses','Data Berhasil Di delete');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect()->back();
    }

    public function ex_export()
    {
        return Excel::download(new NilaiExport, 'nilai.xlsx');
    }
}
