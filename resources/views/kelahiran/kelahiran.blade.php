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
                                    <th>Nama Ibu</th>
                                    <th>Nama Bayi</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat / Tgl Lahir ~ Jam</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $no => $d)
                                    <tr></tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $d->penduduk->nama }}</td>
                                    <td>{{ $d->nama }}</td>
                                    <td>{{ $d->j_kelamin }}</td>
                                    <td>{{ $d->tmpt_lahir }} / {{ tanggal($d->tgl_lahir) }} ~ {{ $d->jam }}</td>
                                    <td align="center">

                                        <a data-bs-toggle="modal" data-bs-target="#modal-edit{{ $d->id }}"
                                            class="btn icon btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                                        <a onclick="return confirm('Yakin dihapus ?')"
                                            href="{{ route('hapus_kelahiran', $d->id) }}"
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
            <form action="{{ route('tambah_kelahiran') }}" enctype="multipart/form-data" method="post">
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
                                    <label for="">Nama Ibu</label>
                                    <select required name="penduduk_id" class="form-control select2" id="">
                                        <option value="">- Pilih Ibu -</option>
                                        @foreach ($penduduk as $p)
                                            <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Nama Bayi</label>
                                    <input required type="text" name="nama" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label>
                                    <select required name="j_kelamin" class="form-control select2" id="">
                                        <option value="">- Pilih -</option>
                                        <option value="pria">Pria</option>
                                        <option value="wanita">Wanita</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Tanggal</label>
                                    <input required type="date" name="tgl_lahir" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Jam</label>
                                    <input required type="time" name="jam" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Tempat</label>
                                    <input type="text" name="tmpt_lahir" class="form-control">
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
                <form action="{{ route('edit_kelahiran') }}" enctype="multipart/form-data" method="post">
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
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="hidden" name="id" value="{{ $d->id }}">
                                    <div class="form-group">
                                        <label for="">Nama Ibu</label>
                                        <select required name="penduduk_id" class="form-control select2" id="">
                                            <option value="">- Pilih Ibu -</option>
                                            @foreach ($penduduk as $p)
                                                <option {{ $p->id == $d->penduduk_id ? 'selected' : '' }} value="{{ $p->id }}">{{ $p->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Nama Bayi</label>
                                        <input required type="text" value="{{ $d->nama }}" name="nama" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Jenis Kelamin</label>
                                        <select required name="j_kelamin" class="form-control select2" id="">
                                            <option value="">- Pilih -</option>
                                            <option {{ $d->j_kelamin == 'pria' ? 'selected' : '' }} value="pria">Pria</option>
                                            <option {{ $d->j_kelamin == 'wanita' ? 'selected' : '' }} value="wanita">Wanita</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Tanggal</label>
                                        <input required type="date" value="{{ $d->tgl_lahir }}" name="tgl_lahir" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Jam</label>
                                        <input type="time" value="{{ $d->jam }}" name="jam" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Tempat</label>
                                        <input type="text" value="{{ $d->tmpt_lahir }}" name="tmpt_lahir" class="form-control">
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
