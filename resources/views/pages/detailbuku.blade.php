@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Buku</h4>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-3">ISBN</div>
                    <div class="col-8">
                        : {{$book->ISBN}}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">Judul Buku</div>
                    <div class="col-8">
                        : {{$book['Judul Buku']}}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">Tahun terbit</div>
                    <div class="col-8">
                        : {{$book['Tahun Terbit']}}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">Kategori</div>
                    <div class="col-8">
                        : {{$book['Jenis Buku']}}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">Klasifikasi</div>
                    <div class="col-8">
                        : {{$book['Klasifikasi']}}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">Bahasa</div>
                    <div class="col-8">
                        : {{$book['Bahasa']}}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">Penerbit</div>
                    <div class="col-8">
                        : {{$book->publisher->Nama}}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">Author</div>
                    <div class="col-8">
                        <ul>
                            @foreach ($book->author as $author)
                            <li>{{$author->pivot->role}} : {{$author->nama}}</li>    
                            @endforeach
                        </ul>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <th>Kode Buku</th>
                        <th>Kode Klasifikasi</th>
                        <th>Kondisi</th>
                        <th>Ketersediaan</th>
                    </thead>
                    <tbody>
                        @foreach ($book->book_item as $item)
                    <td>{{$item['kode buku']}}</td>
                    <td>{{$item['kode klasifikasi']}}</td>
                    <td>{{$item['kondisi']}}</td>
                    <td>
                        @if ($item->borrow == 0)
                            <span class="text-danger">dipinjam</span>
                        @else
                            <span class="text-success">tersedia</span>
                        @endif
                    </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection