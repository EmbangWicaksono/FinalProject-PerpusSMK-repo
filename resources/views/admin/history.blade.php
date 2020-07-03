@extends('layouts.dashboard')
@section('content')
    <h3 class="mt-4 ml-3 mb-3">Riwayat Peminjaman Anggota</h3>
    @include('component.messages')
    <form action="/history/showmember" method="get">
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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kode Buku</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Batas Kembali</th>
                            <th>Tanggal Kembali</th>
                        </tr>
                        <tbody>
                            @if (count($user->book_item) > 0)
                                @foreach ($user->book_item as $loan)
                                <tr>
                                <td>{{$loan['kode buku']}}</td>
                                <td>{{$loan['judul buku']}}</td>
                                <td>{{$loan->pivot['tanggal pinjam']}}</td>
                                <td>{{$loan->pivot['batas kembali']}}</td>
                                <td>
                                    @if ($loan->pivot['tanggal kembali'] == NULL)
                                        belum kembali
                                    @else
                                    {{$loan->pivot['tanggal kembali']}}
                                    @endif
                                </td>
                                </tr>
                                @endforeach
                            @else
                                <td colspan="6" class="table-danger" style="text-align: center">tidak ada buku yang dipinjam!</td>
                            @endif
                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
    @endisset
@endsection