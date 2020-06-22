@extends('layouts.app')
@section('content')
    @if (count($loan) > 0)
    @foreach ($loan as $item)
    <table class="table">
        <thead>
          <tr>
            <th>Kode Buku</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Batas Waktu</th>
            <th>Tanggal Kembali</th>
          </tr>
        </thead>
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
    @endforeach
    @else
        <div class="alert alert-warning"> Data tidak ada</div>
    @endif
@endsection