@extends('laporan.theme.print')
@section('content')
<style>
    .table-sm {
        font-size: 12px;
    }
</style>
<table class="table table-sm table-bordered" id="table1">
    <thead>
        <tr>
            <th>No</th>
            <th>No KTP</th>
            <th>Nama</th>
            <th>Kelamin</th>
            <th>Agama</th>
            <th>Goldar</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Tempat / Tgl Lahir</th>
            <th>Pendidikan</th>
            <th>Pekerjaan</th>
            <th>Negara</th>
            <th>Nikah / Hidup</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $no => $d)
            <tr>
                <td>{{ $no + 1 }}</td>
                <td>{{ $d->no_ktp }}</td>
                <td>{{ ucwords($d->nama) }}</td>
                <td>{{ ucwords($d->j_kelamin) }}</td>
                <td>{{ ucwords($d->agama) }}</td>
                <td>{{ ucwords($d->gol_darah) }}</td>
                <td>{{ ucwords($d->alamat) }}</td>
                <td>{{ $d->no_hp }}</td>
                <td>{{ ucwords($d->tmpt_lahir) }} / {{ $d->tgl_lahir }}</td>
                <td>{{ ucwords($d->pendidikan) }}</td>
                <td>{{ ucwords($d->pekerjaan) }}</td>
                <td>{{ ucwords($d->warga_negara) }}</td>
                <td>{{ ucwords($d->status_nikah) }} / {{ ucwords($d->status_hidup) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
