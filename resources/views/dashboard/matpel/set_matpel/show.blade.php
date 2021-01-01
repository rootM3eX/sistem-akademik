@extends('layouts.master')

@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
                <div class="col-md-8">

                <a class="btn btn-success" href="{{ url('matpel/add')}}"><i class="material-icons">add</i></a>
                <a class="btn btn-primary" href="{{ url('set-matpel/add')}}">Add jadwal</a>
                <a class="btn btn-info" href="{{ url('set-matpel/show')}}">Lihat jadwal</a>
                <a class="btn btn-warning" href="{{ url('matpel/export')}}">Export jadwal</a>
                    
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

                            <thead>
                                <tr>
                                @foreach($hari as $hr)
                                    <th>{{ $hr->hari }}</th>
                                @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                @foreach($hari as $hr)
                                    <td>
                                    @foreach($hr->jadwals as $jd)
                                    <p>{{ date('H:i',strtotime($jd->dari_jam)) }} - {{ date('H:i',strtotime($jd->sampai_jam)) }} :
                                    {{ $jd->kelas->name }} : {{ $jd->mapel->name }} : {{ $jd->mapel->matpel->name }}
                                    </p>
                                    @endforeach
                                    </td>
                                @endforeach
                                </tr>
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