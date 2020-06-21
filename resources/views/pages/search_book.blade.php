@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {!! Form::open() !!}
                <div class="input-group">
                    <div class="input-group-prepend search-panel">
                        {{-- <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All</button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div> --}}
                        {{Form::select('category', ['ISBN' => 'ISBN', 'judul' => 'Judul'],null, ['class' => 'btn'])}}
                      </div>
                        <input type="text" class="form-control" name="x" id="search" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">
                            <span class="fas fa-search"></span>
                            </button>
                        </span>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection