@extends('layouts.dashboard')
@section('content')
    <h2 class="mt-4">Daftar Salinan</h2>
    @include('component.messages')
<div class="card">
    <div class="card-header">
        <a href="/addcopy" class="btn btn-success float-right">Tambah Salinan</a>
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
                        <th>Sumber</th>
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
                        <td>{{$book->book_entry->Sumber}}</td>
                        <td>
                            {!! Form::open(['action' => ['UserController@destroy', $book->ISBN], 'method' => 'POST']) !!}
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