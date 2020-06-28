@extends('layouts.dashboard')
@section('content')
    <h3 class="mt-4 ml-2">Daftar Usulan Buku</h3>
    <div class="card mb-4">
        <div class="card-header">
            <a href="/export/usulanbuku" class="btn btn-success"><i class="fas fa-file-excel mr-1"></i>Export Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered small" id="dataTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Pengusul</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                            <td>{{$book->nama}}</td>
                            <td>{{$book['judul buku']}}</td>
                            <td>{{$book->penulis}}</td>
                            <td>{{$book->penerbit}}</td>
                            <td>{{$book->jumlah}}</td>
                            <td>{{'Rp.'.number_format($book['perkiraan harga'],0,'','.')}}</td>
                            <td>{{'Rp.'.number_format($book->jumlah*$book['perkiraan harga'],0,'','.')}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection