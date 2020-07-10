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
<div class="card">
<div class="card-header">
<div class="card-title"><i class="fas fa-table mr-1"></i>Laporan Buku</div>
</div>
<div class="card-body">
<form action="/export/book" method="post">
    <div class="form-group row">
        <label for="datetime" class="col-form-label mr-3 ml-2">Tanggal : </label>
        <input type="date" name="datetime[]" id="datetime[]" class="mb-2 col-2 form-control"><span class="ml-2 mr-2 col-form-label">-</span><input type="date" name="datetime[]" id="datetime[]" class="mb-2 col-2 form-control">
    </div>
    <div class="input-group mt-1">
        @csrf
        <button type="submit" class="btn btn-success">Export</button>
    </div>
</form>
</div>
</div>
<div class="card">
<div class="card-header">
<div class="card-title"><i class="fas fa-table mr-1"></i>Laporan Peminjaman</div>
</div>
<div class="card-body">
<form action="/export/loan" method="post">
    <div class="form-group row">
        <label for="datetime" class="col-form-label mr-3 ml-2">Tanggal : </label>
        <input type="date" name="datetime[]" id="datetime[]" class="mb-2 col-2 form-control"><span class="ml-2 mr-2 col-form-label">-</span><input type="date" name="datetime[]" id="datetime[]" class="mb-2 col-2 form-control">
    </div>
    <div class="input-group mt-1">
        @csrf
        <button type="submit" class="btn btn-success">Export</button>
    </div>
</form>
</div>
</div>
<div class="card">
<div class="card-header">
<div class="card-title"><i class="fas fa-table mr-1"></i>Laporan Pengunjung</div>
</div>
<div class="card-body">
<form action="/export/visitor" method="post">
    <div class="form-group row">
        <label for="datetime" class="col-form-label mr-3 ml-2">Tanggal : </label>
        <input type="date" name="datetime[]" id="datetime[]" class="mb-2 col-2 form-control"><span class="ml-2 mr-2 col-form-label">-</span><input type="date" name="datetime[]" id="datetime[]" class="mb-2 col-2 form-control">
    </div>
    <div class="input-group mt-1">
        @csrf
        <button type="submit" class="btn btn-success">Export</button>
    </div>
</form>
</div>
</div>
@endsection