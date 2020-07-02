@extends('layouts.dashboard')
@section('content')
    <h3 class="mt-4 ml-2">Daftar Penulis</h3>
    @include('component.messages')
    <div class="card mb-4">
        <div class="card-header">
            <form action="/penulis/add" method="post">
                <div class="input-group">
                    <input type="text" placeholder="Nama Penulis" id="nama" name="nama" class="form-control col-5">
                    <select name="type" id="type" class="form-control ml-2 col-4">
                        <option value="Nama Pribadi">Nama Pribadi</option>
                        <option value="Perusahaan">Perusahaan</option>
                        <option value="Kelompok Orang">Kelompok Orang</option>
                    </select>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-outline-success ml-2"><i class="fas fa-save"></i></button>
                </div>
            </form>
        </div>
        <div class="card-body">
            @if (count($penulis)>0)
            <div class="table-responsive">
                <table class="table table-hover" cellspacing='0' width='100%' id="daftarpenulis">
                    <tbody>
                        @foreach ($penulis as $item)
                            <tr>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->type}}</td>
                                <td style="text-align: right">
                                    {!! Form::open(['action' => ['AdminController@penulisdelete', $item->id], 'method' => 'POST']) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    {!! Form::button("<i class='fas fa-trash'></i>", ['class' => 'btn btn-danger', 'type'=>'submit', 'onclick' => "if( ! confirm('Anda yakin ingin menghapus?')){return false;}"]) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$penulis->links()}}
            </div>
            @else
                <div class="alert alert-warning">
                    Data Tidak Ada!
                </div>
            @endif
        </div>
    </div>
@endsection