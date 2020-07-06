@extends('layouts.dashboard')
@section('content')
<h1 class="mt-4">Dashboard</h1>
<div class="card-columns">
    <div class="card">
        <div class="card-header text-center text-light"  style="background-color:#007bff">
            <h4>Pengunjung</h4>
        </div>
        <div class="card-body bg-light text-center">
            <span class="display-3">{{$today->get('visitor')}}</span>
        </div>
    </div>
    <div class="card">
        <div class="card-header text-center text-light" style="background-color: #28a745 ">
            <h4>Transaksi</h4>
        </div>
        <div class="card-body bg-light text-center">
            <span class="display-3">{{$today->get('loan')}}</span>
        </div>
    </div>
    <div class="card">
        <div class="card-header text-center text-light"  style="background-color:#ffc107">
            <h4>Reservasi</h4>
        </div>
        <div class="card-body bg-light text-center">
        <span class="display-3">{{$today->get('reservation')}}</span>
        </div>
    </div>
</div>
@endsection