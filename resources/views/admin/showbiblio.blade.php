@extends('layouts.dashboard')
@section('content')
    @include('component.messages')
    <div class="card mt-3">
        <div class="card-header">
            <div class="row">
                <h4 class="ml-2"><i class="fas fa-book mr-2"></i>Data Buku</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <form action="/biblioupdate" method="post">
                    <div class="form-group row">
                        <label for="ISBN" class="col-4 col-form-label">ISBN</label>
                        <div class="col-8">
                        <input type="text" name="ISBN" id="ISBN" class="form-control @error('ISBN') is-invalid @enderror" placeholder="No.ISBN" value="{{$book->ISBN}}" readonly>
                        @error('ISBN')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Judul" class="col-4 col-form-label">Judul Buku</label>
                        <div class="col-8">
                        <input type="text" name="Judul" id="Judul" class="form-control @error('Judul') is-invalid @enderror" placeholder="Judul Buku" value="{{$book['Judul Buku']}}">
                        @error('Judul')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Tahun Terbit" class="col-4 col-form-label">Tahun Terbit</label>
                        <div class="col-8">
                        <input type="text" name="Tahun_Terbit" id="Tahun_Terbit" class="form-control @error('Tahun_Terbit') is-invalid @enderror" placeholder="2000" value="{{$book['Tahun Terbit']}}">
                        @error('Tahun_Terbit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Jenis_Buku" class="col-4 col-form-label">Jenis Buku</label>
                        <div class="col-8">
                            <select name="Jenis_Buku" id="Jenis_Buku" class="form-control">
                                <option {{$book['Jenis Buku'] == 'Novel' ? 'selected' : ''}} value="Novel">Novel</option>
                                <option {{$book['Jenis Buku'] == 'Buku Pelajaran' ? 'selected' : ''}} value="Buku Pelajaran">Buku Pelajaran</option>
                                <option {{$book['Jenis Buku'] == 'Kamus' ? 'selected' : ''}} value="Kamus">Kamus</option>
                                <option {{$book['Jenis Buku'] == 'Referensi' ? 'selected' : ''}} value="Referensi">Referensi</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Klasifikasi" class="col-4 col-form-label">Klasifikasi</label>
                        <div class="col-8">
                        <input type="text" name="Klasifikasi" id="Klasifikasi" placeholder="Klasifikasi Buku" class="form-control @error('Klasifikasi') is-invalid @enderror" value="{{$book->Klasifikasi}}">
                        @error('Klasifikasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Bahasa" class="col-4 col-form-label">Bahasa</label>
                        <div class="col-8">
                        <input type="text" name="Bahasa" id="Bahasa" class="form-control @error('Bahasa') is-invalid @enderror" value="{{$book->Bahasa}}">
                        @error('Bahasa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Penerbit" class="col-4 col-form-label">Penerbit</label>
                        <div class="col-8">
                            <select name="Penerbit" id="Penerbit" class="form-control">
                                @foreach ($publishers as $publisher)
                            <option {{$book['ID Penerbit'] == $publisher->id ? 'selected' : ''}} value={{$publisher->id}}>{{$publisher->Nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Penulis" class="col-4 col-form-label">Penulis</label>
                        <div class="input-group col-8">
                            <input type="text" id="Penulis" name="Penulis" class="form-control" placeholder="Nama Penulis">
                            <input type="text"id="role" name="role" class="form-control" placeholder="Peran">
                            <div class="input-group-append">
                            <a href="#" class="btn btn-success" onclick="this.href='/authorplus/{{$book->ISBN}}/'+document.getElementById('Penulis').value+'/'+document.getElementById('role').value">+</a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered offset-4 col-8">
                        <thead>
                            <th>Author</th>
                            <th>Role</th>
                        </thead>
                        <tbody>
                        @foreach ($book->author as $author)
                            <tr>
                            <td>{{$author->nama}}</td>
                            <td>{{$author->pivot->role}}
                            <a href="#" class="btn btn-danger float-right" onclick="this.href='/authormin/{{$book->ISBN}}/{{$author->id}}'"><i class="fas fa-trash"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="form-group row">
                        {{ csrf_field() }}
                        <div class="offset-4 col-8">
                          <button name="submit" type="submit" class="btn btn-primary">Update Data Buku</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection