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
                                    <th>#</th>
                                    <th>hari</th>
                                    <th>kelas</th>
                                    <th>matpel</th>
                                    <th>dari</th>
                                    <th>sampai</th>
                                </tr>
                                @foreach($data as $e=>$dt)
                                <tr>
                                    <td>{{ $e+1 }}</td>
                                    <td>{{ $dt->hari->hari }}</td>
                                    <td>{{ $dt->kelas->name }}</td>
                                    <td>{{ $dt->mapel->name }}</td>
                                    <td>{{ $dt->dari_jam }}</td>
                                    <td>{{ $dt->sampai_jam }}</td>
                                </tr>
                                @endforeach
                                
                            </table>
                        </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection