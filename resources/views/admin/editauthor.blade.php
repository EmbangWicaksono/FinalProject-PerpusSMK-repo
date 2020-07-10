@extends('layouts.dashboard')
@section('content')
    <h3 class="mt-4 ml-2">Daftar Penulis</h3>
    @include('component.messages')
    <div class="card mb-4">
        <div class="card-header">
            <span class="card-title">Edit Penulis</span>
        </div>
        <div class="card-body">
            <form action="/penulis/edit" method="post">
                <div class="input-group">
                <input type="hidden" name="id" id="id" value="{{$author->id}}">
                <input type="text" placeholder="Nama Penulis" id="nama" name="nama" class="form-control col-5" value="{{$author->nama}}">
                    <select name="type" id="type" class="form-control ml-2 col-4">
                        <option {{$author->type == 'Nama Pribadi' ? 'selected' : ''}} value="Nama Pribadi">Nama Pribadi</option>
                        <option {{$author->type == 'Perusahaan' ? 'selected' : ''}} value="Perusahaan">Perusahaan</option>
                        <option {{$author->type == 'Kelompok Orang' ? 'selected' : ''}} value="Kelompok Orang">Kelompok Orang</option>
                    </select>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-outline-success ml-2"><i class="fas fa-save"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection