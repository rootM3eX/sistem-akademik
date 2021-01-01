@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

        <a class="btn btn-warning" href="{{ url('siswa/show')}}">Show Siswa</a>

        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">{{ $title }}</h4>
                  <p class="card-category">Complete profile</p>
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

                  <form method="post" action="{{ url('nilai/add/'.$dt->id)}}" enctype="multipart/form-data">
                      @csrf
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control" name="siswa_id" value="{{ $dt->nama }}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Jurusan</label>
                          <p><strong>{{ $dt->jurusan }}</strong></p>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Semester</label>
                          <input type="number" class="form-control" name="semester">
                        </div>
                      </div>
                    </div>
                    <br><h3>Umum</h3>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">B Indonesia</label>
                          <input type="number" class="form-control" name="b_indo">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">B Inggris</label>
                          <input type="number" class="form-control" name="b_inggris">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Mtk</label>
                          <input type="text" class="form-control" name="mtk">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">PKN</label>
                          <input type="text" class="form-control" name="pkn">
                        </div>
                      </div>
                    </div>

                    <br><h3>Jurusan</h3>

                    <h4>IPA</h4>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fisika</label>
                          <input type="number" class="form-control" name="fisika">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kimia</label>
                          <input type="number" class="form-control" name="kimia">
                        </div>
                      </div>
                    </div>

                    <br>

                    <h4>IPS</h4>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sejarah</label>
                          <input type="number" class="form-control" name="sejarah">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sosiologi</label>
                          <input type="number" class="form-control" name="sosio">
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