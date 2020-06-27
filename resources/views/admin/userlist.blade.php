@extends('layouts.dashboard')
@section('content')
    <h3 class="mt-4">Anggota Perpustakaan</h3>
    @include('component.messages')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-user mr-1"></i>
        Daftar Anggota
        <a href="/users/add" class="btn btn-success float-right">Tambah Anggota<i class="fas fa-user ml-1"></i></a>
    </div>
    <div class="card-body">    
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nomor Induk</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Kelas</th>
                        <th>ditambahkan</th>
                        <th>diperbaharui</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $item)
                    <tr>
                    <td>{{$item->username}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->status}}</td>
                    <td>{{$item->kelas}}</td>
                    <td>{{date('d-M-Y h:m:s', strtotime($item->created_at))}}</td>
                    <td>{{date('d-M-Y h:m:s', strtotime($item->updated_at))}}</td>
                    <td style="text-align: center">
                        <a href="user/{{$item->id}}" class="btn btn-info">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td style="text-align: center">
                        {{-- <a href="#" class="btn btn-danger" onclick="confirm('apakah anda ingin menghapus {{$item->name}}?')">
                            <i class="fas fa-trash"></i>
                        </a> --}}
                        {!! Form::open(['action' => ['UserController@destroy', $item->id], 'method' => 'POST']) !!}
                        {!! Form::hidden('_method', 'DELETE') !!}
                        {!! Form::button("<i class='fas fa-trash'></i>", ['class' => 'btn btn-danger', 'type'=>'submit', 'onclick' => "if( ! confirm('Anda yakin ingin menghapus?')){return false;}"]) !!}
                        {!! Form::close() !!}
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection