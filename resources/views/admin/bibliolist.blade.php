@extends('layouts.dashboard')
@section('content')
    <h2 class="mt-4">Data Buku</h2>
<div class="card">
    <div class="card-header">
        <a href="/addbiblio" class="btn btn-success">Tambah Buku</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Edit</th>
                        <th>Judul Buku</th>
                        <th>ISBN</th>
                        <th>Jenis Buku</th>
                        <th>Klasifikasi</th>
                        <th>Bahasa</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                    <tr>
                    <td><a href="/showbiblio/{{$book->ISBN}}" class="btn btn-info"><i class="fas fa-edit"></i></a></td>
                        <td>{{$book['Judul Buku']}}
                            <small>Oleh @foreach ($book->author as $author)
                                <span class="badge badge-secondary">{{$author->nama}}</span>
                            @endforeach</small>
                        </td>
                        <td>{{$book->ISBN}}</td>
                        <td>{{$book['Jenis Buku']}}</td>
                        <td>{{$book->Klasifikasi}}</td>
                        <td>{{$book->Bahasa}}</td>
                        <td>
                            {!! Form::open(['action' => ['AdminbookController@deletebiblio', $book->ISBN], 'method' => 'POST']) !!}
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