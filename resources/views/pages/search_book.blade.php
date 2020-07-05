@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="/searchbook" method="get">
                <div class="input-group">
                        <input type="text" class="form-control" name="search" id="search" placeholder="Judul Buku">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="submit">
                            <span class="fas fa-search"></span>
                            </button>
                        </span>
                </div>
                </form>
            </div>
            <div class="col-md-12 mt-5">
                @isset($books)
                    @foreach ($books as $item)
                        <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{$item['Judul Buku']}}</h4>
                            <p class="card-text">
                                Tahun {{$item['Tahun Terbit']}} <br>
                                Author : {{$item->author[0]->nama}} <br>
                                Kategori : {{$item['Jenis Buku']}}
                                {{-- @foreach ($item->author as $author)
                            <span class="text-secondary">{{$author->nama}}</span>
                                @endforeach   --}}
                            </p>
                        <a href="/detail/{{$item->ISBN}}" class="btn btn-info">Detail Buku</a>
                        </div>
                        </div>
                    @endforeach
                @endisset
            </div>
        </div>
    </div>
@endsection