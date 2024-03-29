@extends('layouts.dashboard')
@section('content')
    <h2 class="mt-4">Daftar Salinan</h2>
    @include('component.messages')
<div class="card">
    <div class="card-header">
        <div class="d-flex">
            <a href="/listitem" class="btn btn-light"><i class="fas fa-redo-alt"></i></a>
            <input type="text" name="kode" id="kode" placeholder="Judul Buku" class="col-4 form-control">
            <a href="" class="btn btn-info ml-1" onclick="this.href='Copy/'+document.getElementById('kode').value"><i class="fas fa-search ml-1 mr-1"></i></a>
            <a href="/addcopy" class="btn btn-success ml-auto">Tambah Salinan</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Edit</th>
                        <th>Kode Buku</th>
                        <th>Judul Buku</th>
                        <th>Kondisi</th>
                        <th>Tanggal Masuk</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                    <tr>
                    <td><a href="/showcopy/{{$book['kode buku']}}" class="btn btn-info"><i class="fas fa-edit"></i></a></td>
                        <td>{{$book['kode buku']}}</td>
                        <td>{{$book->Book['Judul Buku']}}</td>
                        <td>{{$book->kondisi}}</td>
                        <td>{{date('d-M-Y', strtotime($book->book_entry['tanggal masuk']))}}</td>
                        <td>@if ($book->borrow == 1)
                            tersedia
                        @else
                            dipinjam
                        @endif</td>
                        <td>
                            {!! Form::open(['action' => ['AdminbookController@deletecopy', $book->book_entry->id], 'method' => 'POST']) !!}
                            {!! Form::hidden('_method', 'DELETE') !!}
                            {!! Form::button("<i class='fas fa-trash'></i>", ['class' => 'btn btn-danger', 'type'=>'submit', 'onclick' => "if( ! confirm('Anda yakin ingin menghapus?')){return false;}"]) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$books->links()}}
    </div>
</div>
@endsection