@extends('layouts.dashboard')
@section('content')
    <h2 class="mt-4">Data Buku</h2>
<div class="card">
    <div class="card-header">
        <div class="d-flex">
            <a href="/listbiblio" class="btn btn-light"><i class="fas fa-redo-alt"></i></a>
            <input type="text" name="kode" id="kode" placeholder="Judul Buku" class="col-4 form-control">
            <a href="" class="btn btn-info ml-1" onclick="this.href='Book/'+document.getElementById('kode').value"><i class="fas fa-search ml-1 mr-1"></i></a>
            <a href="/addbiblio" class="btn btn-success ml-auto">Tambah Buku</a>
        </div>
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
                @if (count($books) > 0)
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
                @else
                    <td colspan="7" class="table-warning">Data tidak ditemukan</td>
                @endif
            </table>
        </div>
        {{$books->links()}}
    </div>
</div>
@endsection