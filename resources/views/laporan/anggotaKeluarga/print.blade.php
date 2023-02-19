@extends('laporan.theme.print')
@section('content')
    @foreach ($datas as $d)
        <h5 style="margin-top:-20px;"><b> No KK.{{ $d->kk->no_kk }} </b></h5>
        <div class="container">
            <table width="100%" cellpadding="2">
                <tr>
                    <td width="18%">Nama Kepala Keluarga</td>
                    <td width="2%">:</td>
                    <td><b>{{ ucwords($d->penduduk->nama) }}</b></td>
                </tr>
                <tr>
                    <td width="18%">Alamat</td>
                    <td width="2%">:</td>
                    <td>{{ ucwords($d->penduduk->alamat) }}</td>
                </tr>
            </table>
        </div>
        @php
            $detail = DB::table('anggota_keluargas as a')
                ->join('kks as b', 'a.kk_id', 'b.id')
                ->join('penduduks as c', 'a.penduduk_id', 'c.id')
                ->where('b.no_kk', $d->kk->no_kk)
                ->get();
            
        @endphp
        <br>    
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Agama</th>
                    <th>Pendidikan</th>
                    <th>Pekerjaan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail as $no => $d)
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->no_ktp }}</td>
                        <td>{{ $d->j_kelamin }}</td>
                        <td>{{ $d->tmpt_lahir }}</td>
                        <td>{{ date('d-m-Y', strtotime($d->tgl_lahir)) }}</td>
                        <td>{{ $d->agama }}</td>
                        <td>{{ $d->pendidikan }}</td>
                        <td>{{ $d->pekerjaan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
    {{-- <table class="table table-bordered" id="table1">
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
</table> --}}
@endsection
