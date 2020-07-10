@extends('layouts.dashboard')
@section('content')
    <h3 class="mt-4 ml-3 mb-3">Reservasi Buku</h3>
    @include('component.messages')
    <form action="/reservation/showmember" method="get">
        @csrf
    <div class="form-group row col-md-12">
        <input type="text" name="id" id="id" class="form-control col-3 ml-3" placeholder="No.Induk Anggota">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit"><i class="fas fa-search" value='button1'></i></button>
        </div>
    </form>
    </div>
    @isset($user)        
        <div class="card">
            <div class="card-header col-md-12">
                <div class="row">
                    <div class="col-4">
                        No. Induk
                    </div>
                    <div class="col-8">
                        : {{$user->username}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Nama
                    </div>
                    <div class="col-8">
                        : {{$user->name}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Status
                    </div>
                    <div class="col-8">
                        : {{$user->status}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Kelas
                    </div>
                    <div class="col-8">
                        : {{$user->kelas}}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="/insertreservation" method="POST">
                @csrf
                <div class="input-group mb-2">
                    <input type="text" name="kode" id="kode" class="form control col-4" placeholder="Kode Buku">
                    <input type="hidden" name="id" id="id" value="{{$user->id}}">
                    <button type="submit" class="btn btn-success ml-3" value='button2'><i class="fas fa-save"></i></button>
                </div>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kode Buku</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Reservasi</th>
                            <th>status</th>
                        </tr>
                        <tbody>
                            @if (count($user->reservation) > 0)
                                @foreach ($user->reservation as $book)
                                <tr>
                                <td>{{$book['kode buku']}}</td>
                                <td>{{$book['judul buku']}}</td>
                                <td>{{$book->pivot['tanggal reservasi']}}</td>
                                
                                    @if ($book->borrow == 1)
                                    <td>
                                    <form action="/deletereserve" method="post">
                                    @csrf
                                    <input type="hidden" name="kode" id="kode" value="{{$book['kode buku']}}">
                                    <input type="hidden" name="id" id="id" value="{{$user->id}}">
                                    <button type="submit" class="btn btn-secondary">pinjam buku</button>
                                    </form>
                                    </td>
                                    @else
                                        <td class="text-danger">buku masih dipinjam</td>
                                    @endif
                                
                                </tr>
                                @endforeach
                            @else
                                <td colspan="4" class="table-danger" style="text-align: center">tidak ada buku yang dipesan!</td>
                            @endif
                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
    @endisset
@endsection