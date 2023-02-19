@extends('laporan.theme.print')
@section('content')
    <table class="table table-bordered" id="table1">
        <thead>
            @if ($jenis == 1)
                <tr>
                    <th>No</th>
                    <th>No Ktp</th>
                    <th>Nama Ibu</th>
                    <th>Nama Anak</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Tempat / Tanggal Lahir ~ Jam</th>
                </tr>
            @else
                <tr>
                    <th>No</th>
                    <th>No Ktp</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Umur</th>
                    <th>Tanggal Meninggal</th>
                    <th>Sebab</th>
                    <th>Alamat</th>
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
                        <td>{{ ucwords($d->umur) }}</td>
                        <td>{{ ucwords($d->j_kelamin) }}</td>
                        <td>{{ ucwords($d->penduduk->alamat) }}</td>
                        <td>{{ $d->tmpt_lahir }} / {{ date('d-m-Y', strtotime($d->tgl_lahir)) }} ~ {{ $d->jam }}</td>

                    </tr>
                @else
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $d->penduduk->no_ktp }}</td>
                        <td>{{ ucwords($d->penduduk->nama) }}</td>
                        <td>{{ ucwords($d->penduduk->j_kelamin) }}</td>
                        <td>{{ ucwords($d->umur) }}</td>
                        <td>{{ tanggal($d->tgl_kematian) }}</td>
                        <td>{{ ucwords($d->sebab) }}</td>
                        <td>{{ ucwords($d->penduduk->alamat) }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endsection
