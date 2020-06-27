@extends('layouts.dashboard')
@section('content')
<div class="col-md-9">
    <div class="card">
        <div class="card-body">
          <div class="row">
                <div class="col-md-12">
                    <h4>Profil Anggota</h4>
                    <hr>
                </div>
          </div>
          <div class="row">
                <div class="col-md-12">
                <form action="/users/{{$profile->id}}" method="POST">
                      <div class="form-group row">
                        <label for="username" class="col-4 col-form-label">Nomor Induk</label> 
                        <div class="col-8">
                        <input id="username" name="username" placeholder="Username" class="form-control here" required="required" type="text" value="{{$profile->username}}">
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label for="name" class="col-4 col-form-label">Nama</label> 
                        <div class="col-8">
                        <input id="name" name="name" placeholder="Nama Lengkap" class="form-control here" required="required" type="text" value="{{$profile->name}}">
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label for="status" class="col-4 col-form-label">Status</label> 
                        <div class="col-8">
                        <input id="status" name="status" placeholder="status" class="form-control here" required="required" type="text" value="{{$profile->status}}" readonly>
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label for="jenis_kelamin" class="col-4 col-form-label">Jenis Kelamin</label> 
                        <div class="col-8">
                          @if ($profile['jenis kelamin'] == 'Laki-laki')
                          <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                              <option value="Laki-laki" selected>Laki Laki</option>
                              <option value="Perempuan">Perempuan</option>
                          </select>
                          @else
                          <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                              <option value="Laki-laki">Laki Laki</option>
                              <option value="Perempuan" selected>Perempuan</option>
                          </select>
                          @endif
                        </div>
                      </div>
                      @if ($profile->kelas != null)
                      <div class="form-group row">
                        <label for="kelas" class="col-4 col-form-label">Kelas</label> 
                        <div class="col-8">
                        <input id="kelas" name="kelas" placeholder="Kelas" class="form-control here" required="required" type="text" value="{{$profile->kelas}}">
                        </div>
                      </div>
                      @endif
                      <div class="form-group row">
                        <label for="telepon" class="col-4 col-form-label">Nomor Telepon</label> 
                        <div class="col-8">
                        <input id="telepon" name="telepon" placeholder="Nomor Telepon" class="form-control here" required="required" type="text" value="{{$profile->telepon}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="newpass" class="col-4 col-form-label">Ganti Password</label> 
                        <div class="col-8">
                        <input id="newpass" name="newpass" class="form-control here" type="password">
                        </div>
                      </div>
                      <div class="form-group row">
                          {{csrf_field()}}
                          <input type="hidden" name="_method" value="PUT">
                        <div class="offset-4 col-8">
                          <button name="submit" type="submit" class="btn btn-primary">Perbaharui Profile</button>
                        </div>
                      </div>
                    </form>
                </div>
          </div>
            
        </div>
    </div>
</div>
@endsection