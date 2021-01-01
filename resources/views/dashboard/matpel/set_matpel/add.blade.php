@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

        <a class="btn btn-warning" href="{{ url('set-matpel/show')}}">Show Jadwal</a>

        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">{{ $title }}</h4>
                  <p class="card-category">Isi Lengkap</p>
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

                  <form method="post" action="{{ url('set-matpel/add')}}">
                      @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleSelect1">hari</label>
                                <select class="form-control" name="hari_id">
                                    @foreach($hari as $hr)
                                    <option value="{{ $hr->id }}" style="background-color:rgba(0,0,0,0.5)">{{ $hr->hari }}</option>
                                    @endforeach
                                </select>
                            </div>
                      </div>
                      <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleSelect1">Mata Pelajaran</label>
                                <select class="form-control" name="matpel_id">
                                    @foreach($matpel as $mt)
                                    <option value="{{ $mt->id }}" style="background-color:rgba(0,0,0,0.5)">{{ $mt->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                      </div>
                      <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleSelect1">Kelas</label>
                                <select class="form-control" name="kelas_id">
                                    @foreach($kelas as $kl)
                                    <option value="{{ $kl->id }}" style="background-color:rgba(0,0,0,0.5)">{{ $kl->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Dari jam</label>
                                <input type="text" class="form-control" name="dari_jam">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Sampai jam</label>
                                <input type="text" class="form-control" name="sampai_jam">
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>

                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

        </div>
    </div>
</div>

@endsection