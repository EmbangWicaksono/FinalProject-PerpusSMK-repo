@extends('layouts.app')
@section('content')
    @if (!$loan->isEmpty())
    <div class="container">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Kode Buku</th>
            <th scope="col">Judul Buku</th>
            <th scope="col">Tanggal Pinjam</th>
            <th scope="col">Batas Waktu</th>
            <th scope="col">Tanggal Kembali</th>
          </tr>
        </thead>
        @foreach ($loan as $item)
        <tbody>
          <tr>
            <td>{{$item["kode buku"]}}</td>
            <td>{{$item["judul buku"]}}</td>
            <td>{{$item["tanggal pinjam"]}}</td>
            <td>{{$item["batas kembali"]}}</td>
            <td>{{$item["tanggal kembali"]}}</td>
          </tr>
        </tbody>
      </table>
    </div>
    @endforeach
    @else
        <div class="container">
          <div class="alert alert-warning"> Data tidak ada</div>
        </div>
    @endif
@endsection