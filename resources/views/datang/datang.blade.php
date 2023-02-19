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
                                    <th>No KTP</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Tanggal</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $no => $d)
                                    <tr></tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $d->penduduk->no_ktp }}</td>
                                    <td>{{ ucwords($d->penduduk->nama) }}</td>
                                    <td>{{ $d->alamat }}</td>
                                    <td>{{ tanggal($d->tgl) }}</td>
                                    <td align="center">

                                        <a data-bs-toggle="modal" data-bs-target="#modal-edit{{ $d->id }}"
                                            class="btn icon btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                                        <a onclick="return confirm('Yakin dihapus ?')"
                                            href="{{ route('hapus_datang', $d->id) }}"
                                            class="btn  icon btn-sm btn-danger"><i class="bi bi-trash"></i></a>
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
        <div class="modal-dialog modal-md" role="document">
            <form action="{{ route('tambah_datang') }}" enctype="multipart/form-data" method="post">
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
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Nama Penduduk</label>
                                    <select name="penduduk_id" class="form-control select2" id="">
                                        <option value="">- Pilih Penduduk -</option>
                                        @foreach ($penduduk as $p)
                                            <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" name="alamat" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Tanggal</label>
                                    <input type="date" name="tgl" class="form-control">
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

    {{-- modal deit --}}
    @foreach ($datas as $d)
        <div class="modal fade text-left" id="modal-edit{{ $d->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <form action="{{ route('edit_datang') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel1">
                                Edit {{ $title }}
                            </h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{ $d->id }}">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Nama Penduduk</label>
                                        <select name="penduduk_id" class="form-control select2" id="">
                                            <option value="">- Pilih Penduduk -</option>
                                            @foreach ($penduduk as $p)
                                                <option {{$p->id == $d->penduduk_id ? 'selected' : ''}} value="{{ $p->id }}">{{ $p->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <input value="{{ $d->alamat }}" type="text" name="alamat" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Tanggal</label>
                                        <input value="{{ $d->tgl }}" type="date" name="tgl" class="form-control">
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
    @endforeach
@endsection
