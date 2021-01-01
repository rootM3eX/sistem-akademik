@extends('layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">
          <div class="row">
                <div class="col-md-8">
    
                <a class="btn btn-success" href="{{ url('siswa/show')}}"><i class="material-icons">keyboard_backspace</i></a>
    
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
                                <div class="col-md-6">
                                    <tr>
                                        <th>Nama</th>
                                        <th>email Sekolah</th>
                                        <th>nisn</th>
                                        <th>kelas</th>
                                        <th>jurusan</th>
                                    </tr>
                                    
                                    <tr>
                                        <td>{{ $dt->nama }}</td>
                                        <td>{{ $dt->email }}</td>
                                        <td>{{ $dt->nisn }}</td>
                                        <td>{{ $dt->kelas }}</td>
                                        <td>{{ $dt->jurusan }}</td>
                                        
                                    </tr>
                                </div>
                                <div class="col-md-6">
                                    <tr>
                                        <th>tempat lahir</th>
                                        <th>tanggal lahir</th>
                                        <th>NO.HP</th>
                                        <th>alamat</th>
                                        <th>photo</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $dt->tempat_lahir }}</td>
                                        <td>{{ date('d-m-Y',strtotime($dt->tanggal_lahir)) }}</td>
                                        <td>{{ $dt->no_hp }}</td>
                                        <td>{{ $dt->alamat }}</td>
                                        <td>
                                            <img src="{{ asset($dt->photo) }}" alt="photo siswa" style="width:70px;">
                                        </td>
                                    </tr>
                                </div>
                            </table>
                        </div>
                            
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection