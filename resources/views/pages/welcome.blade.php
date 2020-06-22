@extends('layouts.app2')
@section('content')
@guest    
<header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12 text-center">
          <h1 class="font-weight-light">PerpusPGRI2</h1>
          <p class="lead">Perpustakaan SMK PGRI 2 Salatiga</p>
        </div>
      </div>
    </div>
  </header>
@else
<header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12 text-center">
          <h1 class="font-weight-light">Selamat Datang</h1>
        <p class="lead">{{Auth::user()->name}}</p>
        </div>
      </div>
    </div>
  </header>  
@endguest
@endsection