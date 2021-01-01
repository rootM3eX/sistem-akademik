@extends('layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">
          <div class="row">
                <div class="col-md-8">
                <a class="btn btn-success" href="{{ url('siswa/show')}}"><i class="material-icons">keyboard_backspace</i></a>
                    <div class="card">
                    
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">List Siswa</h4>
                        </div>
                            <div class="card-body">
                            @if(Session::has('sukses'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                                {{ Session::get('sukses') }}
                            </div>
                            @endif
            
                            @if(Session::has('gagal'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-ban"></i> Gagal!</h4>
                                {{ Session::get('gagal') }}
                            </div>
                            @endif
                            
                            <div class="table-responsive">
                                <table class="table">
                                    
                                       <thead>
                                           <tr>
                                               <th>Semester</th>
                                               <th>B.indo</th>
                                               <th>B.inggris</th>
                                               <th>MTK</th>
                                               <th>PKN</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                       @foreach($data as $dt)
                                           <tr>
                                               <td>{{ $dt->semester }}</td>
                                               <td>{{ $dt->b_indo }}</td>
                                               <td>{{ $dt->b_inggris }}</td>
                                               <td>{{ $dt->mtk }}</td>
                                               <td>{{ $dt->pkn }}</td>
                                           </tr>
                                        @endforeach
                                       </tbody>
                                    
                                </table>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Peminatan IPA</th>
                                            <th>Fisika</th>
                                            <th>Kimia</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $dt)
                                        <tr>
                                            <td>{{ $dt->semester }}</td>
                                            <td>{{ $dt->fisika }}</td>
                                            <td>{{ $dt->kimia }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Peminatan IPS</th>
                                            <th>Sejarah</th>
                                            <th>Sosio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $dt)
                                        <tr>
                                            <td>{{ $dt->semester }}</td>
                                            <td>{{ $dt->sejarah }}</td>
                                            <td>{{ $dt->sosio }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Semester</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $dt)
                                        <tr>
                                            <td>{{ $dt->semester }}</td>
                                            <td>
                                                <a href="{{ url('nilai/edit/'.$dt->id)}}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                                <a href="{{ url('download-nilai/'.$dt->id)}}" target="_blank" class="btn btn-success"><i class="material-icons">print</i>EXL</a>
                                                <a href="{{ url('ex-nilai/'.$dt->id)}}" target="_blank" class="btn btn-success"><i class="material-icons">print</i>Word</a>
                                                <a href="{{ url('nilai/hapus/'.$dt->id)}}" target="_blank" class="btn btn-danger"><i class="material-icons">delete_sweep</i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection