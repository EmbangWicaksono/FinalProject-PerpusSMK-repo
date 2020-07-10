<table>
    <tr>
        <td colspan="9" style="text-align: center"><h4>Peminjaman SMK PGRI 2 Salatiga</h4></td>
    </tr>
    <tr>
        <td colspan="9" style="text-align: center"><h4>Diambil tanggal {{date('d/m/Y')}}</h4></td>
    </tr>
    <tr>
        <td colspan="9" style="text-align: center"><h4></h4></td>
    </tr>
    <thead>
        @php
            $counter = 1;
        @endphp
        <tr style="">
            <th><b>No.</b></th>
            <th><b>Nomor Induk</b></th>
            <th><b>Nama</b></th>
            <th><b>Status</b></th>
            <th><b>Kelas</b></th>
            <th><b>Judul Buku</b></th>
            <th><b>Kode Buku</b></th>
            <th><b>Tanggal Pinjam</b></th>
            <th><b>Tanggal Kembali</b></th>
            <th><b>Tanggal Buku Kembali</b></th>

        </tr>
    </thead>
    <tbody>
        @foreach ($loans as $loan)
            <tr>
            <td>{{$counter}}</td>
            <td>{{$loan->user->username}}</td>
            <td>{{$loan['nama peminjam']}}</td>
            <td>{{$loan->user->status}}</td>
            <td>{{$loan->user->kelas}}</td>
            <td>{{$loan['judul buku']}}</td>
            <td>{{$loan['kode buku']}}</td>
            <td>{{$loan['tanggal pinjam']}}</td>
            <td>{{$loan['tanggal kembali']}}</td>
            </tr>
            @php
                $counter++;
            @endphp
        @endforeach
    </tbody>
</table>