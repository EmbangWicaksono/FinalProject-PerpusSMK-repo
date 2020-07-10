@extends('layouts.dashboard')
@section('content')
    <h3 class="mt-4 ml-2">Daftar Penerbit</h3>
    @include('component.messages')
    <div class="card mb-4">
        <div class="card-header">
            <span class="card-title">Edit Penerbit</span>
        </div>
        <div class="card-body">
        <form action="/publisher/edit" method="post">
            <div class="input-group mb-1 mt-1">
            <input type="hidden" name="id" id="id" value="{{$publisher->id}}">
            <input type="text" name="penerbit_name" id="penerbit_name" class="form-control col-5" placeholder="Nama Penerbit" value="{{$publisher->Nama}}">
                <div class="input-group-append">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i></button>
                </div>
            </div>
        </form>
        </div>
    </div>
@endsection