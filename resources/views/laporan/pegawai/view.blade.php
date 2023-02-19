@extends('theme.app')
@section('content')
    <div id="main">
        <div class="page-heading">
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="float: left">{{ $title }}</h3>
                        <a href="{{ route('save_lapPegawai') }}" class="btn btn-primary" style="float: right" >
                            <i class="bi bi-file-pdf"></i> Cetak
                        </a>
                    </div>
                    <div class="card-body">
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
                </div>
            </section>
        </div>

    </div>
@endsection
