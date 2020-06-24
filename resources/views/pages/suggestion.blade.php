@extends('layouts.app')
@section('content')
@include('component.messages')
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Form Usulan Buku</h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('inputsuggestion')}}" method="post">
                            <div class="form-group row">
                                <label for="Judul_bk" class="col-4 col-form-label">Judul Buku</label>
                                <div class="col-8">
                                    <input type="text" id="Judul_bk" class="form-control here" placeholder="Judul Buku" name="Judul_bk">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="penulis" class="col-4 col-form-label">Penulis</label>
                                <div class="col-8">
                                    <input type="text" id="penulis" class="form-control" placeholder="Nama Penulis Buku" name="penulis">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="penerbit" class="col-4 col-form-label">Penerbit</label>
                                <div class="col-8">
                                    <input type="text" id="penerbit" class="form-control" placeholder="Nama Penerbit Buku" name="penerbit">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jumlah" class="col-4 col-form-label">Jumlah Buku</label>
                                <div class="col-8">
                                    <input type="number" id="jumlah" class="form-control" placeholder="Jumlah Buku" name="jumlah" min="1">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="harga" class="col-4 col-form-label">Harga Buku</label>
                                <div class="col-8">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input type="number" class="form-control" id="harga" name="harga" min="1" placeholder="1000">
                                        <div class="input-group-append">
                                          <span class="input-group-text">.00</span>
                                        </div>
                                      </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="id" id="id" value="{{Auth::user()->id}}">
                                <input type="hidden" name="name" id="name" value="{{Auth::user()->name}}">
                              <div class="offset-4 col-8">
                                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection