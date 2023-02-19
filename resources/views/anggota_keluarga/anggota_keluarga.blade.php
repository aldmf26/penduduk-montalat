@extends('theme.app')
@section('content')
    <div id="main">
        <div class="page-heading">
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="float: left">{{ $title }}</h3>
                        <button type="button" class="btn btn-primary" style="float: right" data-bs-toggle="modal"
                            data-bs-target="#modal-tambah">
                            <i class="bi bi-plus"></i> Tambah Data
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No KK</th>
                                    <th>Nama Kepala Keluarga</th>
                                    <th>Tgl Terbit</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $no => $d)
                                    <tr></tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $d->kk->no_kk }}</td>
                                    <td>{{ $d->penduduk->nama }}</td>
                                    <td>{{ tanggal($d->kk->tgl_terbit) }}</td>
                                    <td align="center">
                                        <a data-bs-toggle="modal" data-bs-target="#modal-detail{{ $d->id }}"
                                            class="btn icon btn-sm btn-primary"><i class="bi bi-eye"></i></a>
                                        {{-- <a data-bs-toggle="modal" data-bs-target="#modal-edit{{ $d->id }}"
                                            class="btn icon btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                                        <a onclick="return confirm('Yakin dihapus ?')"
                                            href="{{ route('hapus_anggota_keluarga', $d->id) }}"
                                            class="btn  icon btn-sm btn-danger"><i class="bi bi-trash"></i></a> --}}
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>

    </div>

    {{-- modal tambah --}}
    <div class="modal fade text-left" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{ route('tambah_anggota_keluarga') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel1">
                            Tambah {{ $title }}
                        </h5>
                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="">No KK</label>
                                <select name="kk_id" class="form-control" id="">
                                    <option value="">- Pilih No KK -</option>
                                    @foreach ($kk as $k)
                                        <option value="{{ $k->id }}">{{ $k->no_kk }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="">Nama Penduduk</label>
                                <select name="penduduk_id" class="form-control select2" id="">
                                    <option value="">- Pilih Penduduk -</option>
                                    @foreach ($penduduk as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Hubungan Keluarga</label>
                                    <input type="text" name="hubungan_keluarga" class="form-control">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Save</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- view detail --}}
    @foreach ($datas as $d)
        <div class="modal fade text-left" id="modal-detail{{ $d->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel1">
                            Detail {{ $title }}
                        </h5>
                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                
                        @php
                            $detail = DB::table('anggota_keluargas as a')
                                        ->join('kks as b', 'a.kk_id', 'b.id')
                                        ->join('penduduks as c', 'a.penduduk_id', 'c.id')
                                        ->where('b.no_kk', $d->kk->no_kk)
                                        ->get();
                         
                        @endphp
                        <h5 class="text-bold">No Kartu Keluarga : {{ $d->kk->no_kk }}</h5>
                        <hr>
                        
                        <table class="table">
                            <tr>
                                <th width="6%">No</th>
                                <th>Nama</th>
                                <th>Hubungan</th>
                            </tr>
                            @foreach ($detail as $no=> $s)
                                <tr>
                                    <td>{{ $no+1 }}</td>
                                    <td>{{$s->nama}}</td>
                                    <td>{{$s->hubungan_keluarga}}</td>
                                </tr>
                            
                            @endforeach
                          
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                    </div>
                </div>
 
            </div>
        </div>
    @endforeach
@endsection
