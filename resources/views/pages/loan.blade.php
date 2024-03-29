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
          </tr>
        </thead>
        <tbody>
        @foreach ($loan as $item)
          <tr>
            <td>{{$item["kode buku"]}}</td>
            <td>{{$item["judul buku"]}}</td>
            <td>{{$item->pivot["tanggal pinjam"]}}</td>
            <td>{{$item->pivot["batas kembali"]}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    @else
        <div class="container">
          <div class="alert alert-warning"> Data tidak ada</div>
        </div>
    @endif
@endsection