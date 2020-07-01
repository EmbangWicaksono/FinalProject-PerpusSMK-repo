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
                <form action="/biblioadd" method="post">
                    <div class="form-group row">
                        <label for="ISBN" class="col-4 col-form-label">ISBN</label>
                        <div class="col-8">
                            <input type="text" name="ISBN" id="ISBN" class="form-control" placeholder="No.ISBN">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Judul" class="col-4 col-form-label">Judul Buku</label>
                        <div class="col-8">
                            <input type="text" name="Judul" id="Judul" class="form-control" placeholder="Judul Buku">
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
                    <div class="wrap-text">
                        <div class="form-group row">
                            <label for="Penulis" class="col-4 col-form-label">Penulis</label>
                            <div class="input-group col-8">
                                <input type="text" id="Penulis[]" name="Penulis[]" class="form-control" placeholder="Nama Penulis">
                                <input type="text"id="role[]" name="role[]" class="form-control" placeholder="Peran">
                                <div class="input-group-append">
                                    <button class="btn btn-success add_fields" type="button">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        {{ csrf_field() }}
                        <div class="offset-4 col-8">
                          <button name="submit" type="submit" class="btn btn-primary">Tambah Data Buku</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            var max_fields      = 5; //maximum input boxes allowed
	var wrapper   		= $(".wrap-text"); //Fields wrapper
	var add_button      = $(".add_fields"); //Add button ID
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append('<div class="form-group row"><div class="input-group offset-4 col-8"><input type="text" id="Penulis[]" name="Penulis[]" class="form-control" placeholder="Nama Penulis"><input type="text" id="role[]" name="role[]"" class="form-control" placeholder="Peran"><div class="input-group-append"><button type="button" class="btn btn-danger remove_field">-</button></div></div></div>'); //add input box
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').parent('div').parent('div').remove(); x--;
	})
        })
    </script>
@endsection