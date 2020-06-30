@extends('layouts.dashboard')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            <div class="row">
                <h4 class="ml-2"><i class="fas fa-book mr-2"></i>Data Buku</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <form action="" method="post">
                    <div class="form-group row">
                        <label for="ISBN" class="col-4 col-form-label">ISBN</label>
                        <div class="col-8">
                            <input type="text" name="ISBN" id="ISBN" class="form-control" placeholder="No.ISBN">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Judul Buku" class="col-4 col-form-label">Judul Buku</label>
                        <div class="col-8">
                            <input type="text" name="Judul Buku" id="Judul Buku" class="form-control" placeholder="Judul Buku">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Tahun Terbit" class="col-4 col-form-label">Tahun Terbit</label>
                        <div class="col-8">
                            <input type="text" name="Tahun_Terbit" id="Tahun_Terbit" class="form-control" placeholder="2000">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Jenis_Buku" class="col-4 col-form-label">Jenis Buku</label>
                        <div class="col-8">
                            <select name="Jenis_Buku" id="Jenis_Buku" class="form-control">
                                <option value="Novel">Novel</option>
                                <option value="Buku Pelajaran">Buku Pelajaran</option>
                                <option value="Kamus">Kamus</option>
                                <option value="Referensi">Referensi</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Klasifikasi" class="col-4 col-form-label">Klasifikasi</label>
                        <div class="col-8">
                            <input type="text" name="Klasifikasi" id="Klasifikasi" placeholder="Klasifikasi Buku" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Bahasa" class="col-4 col-form-label">Bahasa</label>
                        <div class="col-8">
                            <input type="text" name="Bahasa" id="Bahasa" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Penerbit" class="col-4 col-form-label">Penerbit</label>
                        <div class="col-8">
                            <select name="Penerbit" id="Penerbit" class="form-control">
                                @foreach ($publishers as $publisher)
                            <option value={{$publisher->id}}>{{$publisher->Nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Penulis" class="col-4 col-form-label">Penulis</label>
                        <div class="input-group col-8">
                            <input type="text" name="Penulis" id="Penulis" class="form-control">
                            <select name="role" id="role" class="form-control">
                                <option value="Penulis Utama">Penulis Utama</option>
                                <option value="Penulis Kedua">Penulis Kedua</option>
                                <option value="Redaksi">Redaksi</option>
                            </select>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    
@endsection