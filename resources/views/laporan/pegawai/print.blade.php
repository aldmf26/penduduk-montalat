@extends('laporan.theme.print')
@section('content')
    <div class="container">
        <table class="table" id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Jabatan</th>
                    <th>Tgl Lahir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $no => $d)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $d->nik }}</td>
                        <td>{{ ucwords($d->nama) }}</td>
                        <td>{{ ucwords($d->alamat) }}</td>
                        <td>{{ $d->no_hp }}</td>
                        <td>{{ ucwords($d->jabatan) }}</td>
                        <td>{{ tanggal($d->tgl_lahir) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
