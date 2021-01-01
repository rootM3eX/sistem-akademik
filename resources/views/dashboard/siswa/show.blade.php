@extends('layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">
          <div class="row">
                <div class="col-md-8">
                <a class="btn btn-success" href="{{ url('siswa/add')}}"><i class="material-icons">add</i></a>
                <a class="btn btn-info" href="{{ url('siswa/show')}}">All Siswa</a>
                <a class="btn btn-warning" href="{{ url('siswa/aktif')}}">Siswa Aktif</a>
                <a class="btn btn-danger" href="{{ url('siswa/belum-aktif')}}">Siswa Tidak Aktif</a>
                <a class="btn btn-success" href="{{ url('siswa/export')}}">Export</a>
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
                                    <tr>
                                        <th>#</th>
                                        <th>action</th>
                                        <th>Nama</th>
                                        <th>nisn</th>
                                        <th>no HP</th>
                                        <th>Photo</th>
                                        <th>Status</th>
                                    </tr>
                                    @foreach($data as $e=>$dt)
                                    <tr>
                                        <td>{{ $e+1 }}</td>
                                        <td>
                                            <div style="width:100px">
                                                <a href="{{ url('siswa/hapus/'.$dt->id)}}"><i class="material-icons">delete_sweep</i></a>
                                                <a href="{{ url('siswa/edit/'.$dt->id)}}"><i class="material-icons">edit</i></a>
                                                <a href="{{ url('siswa/detail/'.$dt->id)}}"><i class="material-icons">visibility</i></a>
                                                <a href="{{ url('nilai/input/'.$dt->id)}}"><i class="material-icons">input</i></a>
                                                <a href="{{ url('nilai/detail/'.$dt->id)}}"><i class="material-icons">event_note</i></a>
                                            </div>
                                        </td>
                                        <td>{{ $dt->nama }}</td>
                                        <td>{{ $dt->nisn }}</td>
                                        <td>{{ $dt->no_hp }}</td>
                                        <td>
                                            <img src="{{ asset($dt->photo) }}" alt="photo siswa" style="width:70px;">
                                        </td>
                                        <td>
                                            @if($dt->is_aktif == null)
                                            <a href="{{ url('siswa/'.$dt->id.'/aktif')}}" class="btn btn-danger"><i class="material-icons">close</i></a>
                                            @else
                                            <label class="btn btn-success"><i class="material-icons">check</i></label>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    {{ $data->links() }}
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection