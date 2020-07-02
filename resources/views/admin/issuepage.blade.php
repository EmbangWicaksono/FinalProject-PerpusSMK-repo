@extends('layouts.dashboard')
@section('content')
    <h3 class="mt-4 ml-3 mb-3">Denda Anggota</h3>
    <form action="/issue/showmember" method="get">
        @csrf
    <div class="form-group row col-md-12">
        <input type="text" name="id" id="id" class="form-control col-3 ml-3" placeholder="No.Induk Anggota">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit"><i class="fas fa-search" value='button1'></i></button>
        </div>
    </form>
    </div>
    @isset($user)        
        <div class="card">
            <div class="card-header col-md-12">
                <div class="row">
                    <div class="col-4">
                        No. Induk
                    </div>
                    <div class="col-8">
                        : {{$user->username}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Nama
                    </div>
                    <div class="col-8">
                        : {{$user->name}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Status
                    </div>
                    <div class="col-8">
                        : {{$user->status}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Kelas
                    </div>
                    <div class="col-8">
                        : {{$user->kelas}}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="/insertfine" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" name="jenis" id="jenis" class="form control col-4" placeholder="Jenis Denda">
                    <input type="number" name="total" id="total" class="form control ml-3 col-4" placeholder="Total Denda">
                    <input type="hidden" name="id" id="id" value="{{$user->id}}">
                    <button type="submit" class="btn btn-success ml-3" value='button2'><i class="fas fa-save"></i></button>
                </div>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Jenis Denda</th>
                            <th colspan="2">Total Denda</th>
                        </tr>
                        <tbody>
                            @if (count($user->fine) > 0)
                                @foreach ($user->fine as $fine)
                                <tr>
                                    <td>{{$fine['jenis denda']}}</td>
                                    <td>Rp.{{$fine['total denda']}},00</td>
                                    <td style = "text-align: center">
                                        {!! Form::open(['action' => ['TransactionController@deletefine', $fine->id], 'method' => 'POST']) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        {!! Form::button("<i class='fas fa-trash'></i>", ['class' => 'btn btn-danger', 'type'=>'submit', 'onclick' => "if( ! confirm('Apakah denda telah lunas?')){return false;}"]) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <td colspan="3" class="table-danger">Tidak memiliki denda yang belum dibayar!</td>
                            @endif
                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
    @endisset
@endsection