
<table>
    <tr>
        <td colspan="7" style="text-align: center"><h4>Daftar usulan buku SMK PGRI 2 Salatiga</h4></td>
    </tr>
    <tr>
        <td colspan="7" style="text-align: center"><h4>Diambil tanggal {{date('d/m/Y')}}</h4></td>
    </tr>
    <tr>
        <td colspan="7" style="text-align: center"><h4></h4></td>
    </tr>
    <thead>
        <tr style="">
            <th><b>Nama Pengusul</b></th>
            <th><b>Judul Buku</b></th>
            <th><b>Penulis</b></th>
            <th><b>Penerbit</b></th>
            <th><b>Jumlah</b></th>
            <th><b>Harga</b></th>
            <th><b>Total</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($suggestion as $book)
            <tr>
            <td>{{$book->nama}}</td>
            <td>{{$book['judul buku']}}</td>
            <td>{{$book->penulis}}</td>
            <td>{{$book->penerbit}}</td>
            <td>{{$book->jumlah}}</td>
            <td>{{$book['perkiraan harga']}}</td>
            <td>{{($book->jumlah*$book['perkiraan harga'])}}</td>
            </tr>
        @endforeach
    </tbody>
</table>