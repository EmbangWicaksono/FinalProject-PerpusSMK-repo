<table>
    <tr>
        <td colspan="7" style="text-align: center"><h4>Pengunjung Perpustakaan SMK PGRI 2 Salatiga</h4></td>
    </tr>
    <tr>
        <td colspan="7" style="text-align: center"><h4>Diambil tanggal {{date('d/m/Y')}}</h4></td>
    </tr>
    <tr>
        <td colspan="7" style="text-align: center"><h4></h4></td>
    </tr>
    <thead>
        <tr style="">
            <th><b>Nama Pengunjung</b></th>
            <th><b>status</b></th>
            <th><b>kelas</b></th>
            <th><b>tanggal</b></th>
>

        </tr>
    </thead>
    <tbody>
        @foreach ($visitor as $person)
            <tr>
            <td>{{$person->user->name}}</td>
            <td>{{$person->user->status}}</td>
            <td>{{$person->user->kelas}}</td>
            <td>{{date('d-m-Y h:m:s', strtotime($person->added_on))}}</td>
            </tr>
        @endforeach
    </tbody>
</table>