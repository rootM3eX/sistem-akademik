@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

        <a class="btn btn-warning" href="{{ url('guru/show')}}">Back</a>

        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">{{ $title }}</h4>
                  <p class="card-category">Edit Data</p>
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

                  <form method="post" action="{{ url('guru/'.$dt->id)}}" enctype="multipart/form-data">
                      @csrf
                      {{ method_field('PUT') }}
                      <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">NIP</label>
                          <input type="text" class="form-control" name="nip" value="{{ $dt->biodata_guru_r->nip }}">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" class="form-control" name="name" value="{{ $dt->name }}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" class="form-control" name="email" value="{{ $dt->email }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tempat Lahir</label>
                          <input type="text" class="form-control" name="tempat_lahir" value="{{ $dt->biodata_guru_r->tempat_lahir }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tanggal Lahir</label>
                          <input type="date" class="form-control" name="tanggal_lahir" value="{{ date('Y-m-d',strtotime($dt->biodata_guru_r->tanggal_lahir)) }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputFile">Click ini :)</label>
                                <input type="file" id="exampleInputFile" name="photo">

                            <p class="help-block">Input file photo.</p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">No HP</label>
                          <input type="number" class="form-control" name="no_hp" value="{{ $dt->biodata_guru_r->no_hp }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Alamat</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Alamat anda.</label>
                            <textarea class="form-control" name="alamat" rows="5">{{ $dt->biodata_guru_r->alamat }}</textarea>
                          </div>
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