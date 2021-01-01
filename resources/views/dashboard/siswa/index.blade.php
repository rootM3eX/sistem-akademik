@extends('layouts.master')

@section('content')

<div class="content">
    <div class="container">
        <h2>siswa</h2>
        <div class="row">
            <div class="col-md-6">
                <a class="btn btn-success" href="{{ url('siswa/add/')}}">add siswa</a>
            </div>
            <div class="col-md-6">
                <a class="btn btn-warning" href="{{ url('siswa/show')}}">show siswa</a>
            </div>
        </div>
    </div>
</div>

@endsection