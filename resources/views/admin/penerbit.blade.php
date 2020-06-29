@extends('layouts.dashboard')
@section('content')
    <h3 class="mt-4 ml-2">Daftar Penerbit</h3>
    @include('component.messages')
    <div class="card mb-4">
        <div class="card-header">
        <form action="{{route('penerbit/add')}}" method="post">
            <div class="form-group">
                <input type="text" name="penerbit_name" id="penerbit_name" class="form-control col-5" required>
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
                                <td>{{$item->Nama}}</td>
                                <td style="text-align: center">
                                    {!! Form::open(['action' => ['AdminController@penerbitdelete', $item->id], 'method' => 'POST']) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    {!! Form::button("<i class='fas fa-trash'></i>", ['class' => 'btn btn-danger', 'type'=>'submit', 'onclick' => "if( ! confirm('Anda yakin ingin menghapus?')){return false;}"]) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
                <div class="alert alert-warning">
                    Data Tidak Ada!
                </div>
            @endif
        </div>
    </div>
@endsection