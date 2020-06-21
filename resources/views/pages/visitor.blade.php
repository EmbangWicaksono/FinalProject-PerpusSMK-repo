@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Pengunjung perpustakaan</h1>
        {!! Form::open(['action' => 'VisitorController@check_id']) !!}
        {!! Form::text('username', '', ['placeholder' => 'Masukkan Nomor Induk']) !!}
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
        @if (count($today)>0)
        <div class='table-responsive'>
            <!--Table-->
            <table id="today_table" class="table table-striped table-bordered">
            <!--Table head-->
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Status</th>
                  <th>Waktu</th>
                </tr>
              </thead>
              <!--Table head-->
              <!--Table body-->
              <tbody>
                  @foreach ($today as $visitor)
                  <tr>
                  <td>{{$visitor["nama pengunjung"]}}</td>
                    <td>{{$visitor->status}}</td>
                    <td>{{$visitor->added_on}}</td>
                  </tr>
                  @endforeach
              </tbody>
              <!--Table body-->
            </table>
            <!--Table-->
           </div>
        @else
            <div></div>
            <h3>tidak ada pengunjung hari ini</h3>
        @endif
    </div>
@endsection