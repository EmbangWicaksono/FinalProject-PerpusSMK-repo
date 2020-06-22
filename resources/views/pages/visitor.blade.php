@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Pengunjung perpustakaan</h1>
        {!! Form::open(['action' => 'VisitorController@check_id']) !!}
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              {!! Form::text('username', '', ['placeholder' => 'Masukkan Nomor Induk', 'class' => 'form-control']) !!}
            </div>
          </div>
          <div class="col-md-2">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
          </div>
        </div>
        {!! Form::close() !!}
        @include('component.messages')
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