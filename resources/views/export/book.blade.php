<table>
    <tr>
        <td colspan="7" style="text-align: center"><h4>Pemasukan Buku SMK PGRI 2 Salatiga</h4></td>
    </tr>
    <tr>
        <td colspan="7" style="text-align: center"><h4>Diambil tanggal {{date('d/m/Y')}}</h4></td>
    </tr>
    <tr>
        <td colspan="7" style="text-align: center"><h4></h4></td>
    </tr>
    <thead>
        <tr style="">
            <th><b>ISBN</b></th>
            <th><b>Judul Buku</b></th>
            <th><b>Kode Buku</b></th>
            <th><b>Tanggal Masuk</b></th>
            <th><b>Sumber</b></th>
            <th><b>Harga</b></th>

        </tr>
    </thead>
    <tbody>
        @foreach ($book_entry as $book)
            <tr>
            <td>{{$book->ISBN}}</td>
            <td>{{$book->book_item['judul buku']}}</td>
            <td>{{$book->book_item['kode buku']}}</td>
            <td>{{$book['tanggal masuk']}}</td>
            <td>{{$book->Sumber}}</td>
            <td>{{$book->harga}}</td>

        @endforeach
    </tbody>
</table>