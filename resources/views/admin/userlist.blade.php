@extends('layouts.dashboard')
@section('content')
    <h1 class="mt-4">Anggota</h1>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-user mr-1"></i>
        Daftar Anggota
    </div>
    <div class="card-body">    
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nomor Induk</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Kelas</th>
                        <th>ditambahkan</th>
                        <th>diperbaharui</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $item)
                    <tr>
                    <td>{{$item->username}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->status}}</td>
                    <td>{{$item->kelas}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection