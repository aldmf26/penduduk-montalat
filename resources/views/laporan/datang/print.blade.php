@extends('laporan.theme.print')
@section('content')
    <table class="table table-bordered" id="table1">
        <thead>
            @if ($jenis == 1)
            <tr>
                <th>No</th>
                <th>No Ktp</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Datang</th>
                <th>Alamat</th>
            </tr>
            @else
                <tr>
                    <th>No</th>
                <th>No Ktp</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Pindah</th>
                <th>Alamat Lama</th>
                <th>Alamat Baru</th>
                </tr>
            @endif
        </thead>
        <tbody>
            @foreach ($datas as $no => $d)
                @if ($jenis == 1)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $d->penduduk->no_ktp }}</td>
                        <td>{{ ucwords($d->penduduk->nama) }}</td>
                        <td>{{ ucwords($d->penduduk->j_kelamin) }}</td>
                        <td>{{ tanggal($d->tgl) }}</td>
                        <td>{{ ucwords($d->alamat) }}</td>

                    </tr>
                @else
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $d->penduduk->no_ktp }}</td>
                    <td>{{ ucwords($d->penduduk->nama) }}</td>
                    <td>{{ ucwords($d->penduduk->j_kelamin) }}</td>
                    <td>{{ tanggal($d->tgl) }}</td>
                    <td>{{ ucwords($d->alamat_lama) }}</td>
                    <td>{{ ucwords($d->alamat_baru) }}</td>

                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endsection
