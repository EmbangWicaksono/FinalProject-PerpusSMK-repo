@extends('layouts.dashboard')
@section('content')
    <h3 class="mt-4 ml-2">Anggota Perpustakaan</h3>
    @include('component.messages')
<div class="card mb-4">
    <div class="card-header">
        <div class="d-flex">
        <a href="{{route('user.index')}}" class="btn btn-light"><i class="fas fa-redo-alt"></i></a>
            <input type="text" name="kode" id="kode" placeholder="No.Induk" class="col-4 form-control">
            <a href="" class="btn btn-info ml-1" onclick="this.href='member/'+document.getElementById('kode').value"><i class="fas fa-search ml-1 mr-1"></i></a>
            <a href="/users/add" class="btn btn-success ml-auto"><i class="fas fa-user ml-1 mr-1"></i>Tambah Anggota</a>
        </div>
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
                @if (count($list) > 0)
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
                @else
                    <td colspan="8" class="table-warning">data tidak ditemukan</td>
                @endif
            </table>
            {{$list->links()}}
        </div>
    </div>
</div>
@endsection