@extends('layouts.master')

@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
                <div class="col-md-8">

                <a class="btn btn-success" href="{{ url('kelas/show')}}"><i class="material-icons">keyboard_backspace</i></a>
                    
                    <div class="card">
                    
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ $title }}</h4>
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
                                <tr>
                                    <th>kelas</th>
                                    <th>total siswa</th>
                                </tr>
                                
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $siswa }}</td>
                                </tr>
                                
                                
                            </table>
                            
                            
                            <table>
                                <tr>
                                    <th>Add Siswa</th>
                                </tr>
                                <tr>
                                    <td>
                                    <form method="post" action="{{ url('kelas/add-siswa/'.$data->id)}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="exampleSelect1">Pilih siswa</label>
                                                <select class="form-control" name="siswa_id">
                                                    @foreach($sw as $s)
                                                    <option value="{{ $s->id }}" style="background-color:rgba(0,0,0,0.5)">{{ $s->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary pull-right">Submit</button>

                                    </td>
                                </tr>
                            </table>

                            <table class="table">
                                    <tr>
                                        <th>#</th>
                                        <th>nis</th>
                                        <th>nama</th>
                                        <th>Delete</th>
                                    </tr>
                                
                                    <tr>
                                    @foreach($data->siswas_r as $e=>$sw)
                                        <td>{{ $e+1 }}</td>
                                        <td>{{ $sw->siswa_r->nisn }}</td>
                                        <td>{{ $sw->siswa_r->nama }}</td>
                                        <td>
                                            <a href="{{ url('kelas/siswa/hapus/'.$sw->id) }}" class="btn btn-success"><i class="material-icons">delete_sweep</i></a>
                                        </td>
                                    @endforeach
                                    </tr>
                                
                            </table>
                            
                        </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection