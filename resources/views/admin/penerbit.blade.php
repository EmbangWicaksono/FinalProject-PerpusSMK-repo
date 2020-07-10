@extends('layouts.dashboard')
@section('content')
    <h3 class="mt-4 ml-2">Daftar Penerbit</h3>
    @include('component.messages')
    <div class="card mb-4">
        <div class="card-header">
        <form action="/penerbit/add" method="post">
            <div class="input-group mb-1 mt-1">
                <input type="text" name="penerbit_name" id="penerbit_name" class="form-control col-5" placeholder="Nama Penerbit">
                <div class="input-group-append">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i></button>
                </div>
            </div>
        </form>
        </div>
        <div class="card-body">
            @if (count($penerbit)>0)
            <div class="table-responsive">
                <table class="table table-hover" cellspacing='0' width='100%' id="daftarpenerbit">
                    <tbody>
                        @foreach ($penerbit as $item)
                            <tr>
                            <td><a href="/publisher/{{$item->id}}">{{$item->Nama}}</a></td>
                                <td style="text-align: right">
                                    {!! Form::open(['action' => ['AdminController@penerbitdelete', $item->id], 'method' => 'POST']) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    {!! Form::button("<i class='fas fa-trash'></i>", ['class' => 'btn btn-danger', 'type'=>'submit', 'onclick' => "if( ! confirm('Anda yakin ingin menghapus?')){return false;}"]) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$penerbit->links()}}
            </div>
            @else
                <div class="alert alert-warning">
                    Data Tidak Ada!
                </div>
            @endif
        </div>
    </div>
@endsection