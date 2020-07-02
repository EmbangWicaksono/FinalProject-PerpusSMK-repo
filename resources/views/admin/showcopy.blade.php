@extends('layouts.dashboard')
@section('content')
    @include('component.messages')
    <div class="card mt-3">
        <div class="card-header">
            <div class="row">
                <h4 class="ml-2"><i class="fas fa-book-medical mr-2"></i>Data Salinan</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <form action="/editcopy/{{$book_item->book_entry->id}}" method="POST">
                    <div class="form-group row">
                        <label for="ISBN" class="col-4 col-form-label">ISBN</label>
                        <div class="col-8">
                        <input type="text" name="ISBN" id="ISBN" class="form-control @error('ISBN') is-invalid @enderror" placeholder="No.ISBN" readonly value="{{$book_item->ISBN}}" readonly>
                            @error('ISBN')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="judul_buku" class="col-4 col-form-label">Judul Buku</label>
                        <div class="col-8">
                        <input type="text" name="judul_buku" id="judul_buku" class="form-control @error('judul_buku') is-invalid @enderror" value="{{$book_item['judul buku']}}" readonly>
                            @error('judul_buku')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kode" class="col-4 col-form-label">Kode Buku</label>
                        <div class="col-8">
                        <input type="text" name="kode" id="kode" class="form-control @error('kode') is-invalid @enderror" value="{{$book_item['kode buku']}}" readonly>
                            @error('kode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kondisi" class="col-4 col-form-label">Kondisi</label>
                        <div class="col-8">
                            <select name="kondisi" id="kondisi" class="form-control">
                                <option value="tersedia" {{$book_item->kondisi == 'tersedia' ? 'selected' : ''}}>Tersedia</option>
                                <option value="bekas" {{$book_item->kondisi == 'bekas' ? 'selected' : ''}}>Bekas</option>
                                <option value="hilang" {{$book_item->kondisi == 'hilang' ? 'selected' : ''}}>hilang</option>
                                <option value="rusak" {{$book_item->kondisi == 'rusak' ? 'selected' : ''}}>rusak</option>
                            </select>
                        </div>
                        
                    </div>
                    <div class="form-group row">
                        <label for="kode_k" class="col-4 col-form-label">Kode Klasifikasi</label>
                        <div class="col-8">
                        <input type="text" name="kode_k" id="kode_k" class="form-control @error('kode_k') is-invalid @enderror" value="{{$book_item['kode klasifikasi']}}">
                            @error('kode_k')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sumber" class="col-4 col-form-label">Sumber</label>
                        <div class="col-8">
                        <input type="text" name="sumber" id="sumber" class="form-control @error('sumber') is-invalid @enderror" placeholder="Toko Buku/Pemerintah/Sumbangan" value="{{$book_item->book_entry->Sumber}}">
                            @error('sumber')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Tanggal_Masuk" class="col-4 col-form-label">Tanggal Masuk</label>
                        <div class="col-8">
                        <input type="date" name="Tanggal_Masuk" id="Tanggal_Masuk" class="form-control" value="{{date('Y-m-d', strtotime($book_item->book_entry['tanggal masuk']))}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga" class="col-4 col-form-label">Harga Buku</label>
                        <div class="col-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Rp.</span>
                                </div>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" min="1" placeholder="1000" value="{{$book_item->book_entry->harga}}">
                                <div class="input-group-append">
                                  <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            @error('harga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
            <script type="text/javascript">
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            </script>
        </div>
    </div>
@endsection