@extends('laporan.theme.print')
@section('content')
<table class="table table-bordered" id="table1">
    <thead>
        <tr>
            <th>No</th>
            <th>No KK</th>
            <th>No Hp</th>
            <th>Alamat</th>
            <th>Tanggal Terbit</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $no => $d)
            <tr>
                <td>{{ $no + 1 }}</td>
                <td>{{ $d->no_kk }}</td>
                <td>{{ ucwords($d->no_hp) }}</td>
                <td>{{ ucwords($d->alamat) }}</td>
                <td>{{ tanggal($d->tgl_terbit) }}</td>
                
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
