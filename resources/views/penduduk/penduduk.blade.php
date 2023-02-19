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
                                    <th>Nama Penduduk</th>
                                    <th>Kelamin</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $no => $d)
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        <td>{{ $d->no_ktp }}</td>
                                        <td>{{ ucwords($d->nama) }}</td>
                                        <td>{{ ucwords($d->j_kelamin) }}</td>
                                        <td>{{ ucwords($d->status_hidup) }}</td>
                                        <td align="center">
                                            <a data-bs-toggle="modal" data-bs-target="#modal-detail{{ $d->id }}"
                                                class="btn icon btn-sm btn-primary"><i class="bi bi-eye"></i></a>
                                            <a data-bs-toggle="modal" data-bs-target="#modal-edit{{ $d->id }}"
                                                class="btn icon btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                                            <a onclick="return confirm('Yakin dihapus ?')"
                                                href="{{ route('hapus_penduduk', $d->id) }}"
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
        <div class="modal-dialog modal-lg-max" role="document">
            <form action="{{ route('tambah_penduduk') }}" enctype="multipart/form-data" method="post">
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
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">No KTP</label>
                                    <input required type="text" name="no_ktp" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <input required type="text" name="nama" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <label for="">Kelamin</label>
                                <select name="j_kelamin" class="form-control select2" id="">
                                    <option value="">- Pilih Kelamin -</option>
                                    <option value="pria">Pria</option>
                                    <option value="wanita">Wanita</option>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">Agama</label>
                                    <input required type="text" name="agama" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">Golongan Darah</label>
                                    <input required type="text" name="gol_darah" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" name="alamat" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">No HP</label>
                                    <input type="text" name="no_hp" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">Tempat Lahir</label>
                                    <input required type="text" name="tmpt_lahir" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">Tgl Lahir</label>
                                    <input required type="date" name="tgl_lahir" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">Pendidikan</label>
                                    <input required type="text" name="pendidikan" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">Pekerjaan</label>
                                    <input required type="text" name="pekerjaan" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <label for="">Status Nikah</label>
                                <select name="status_nikah" class="form-control select2" id="">
                                    <option value="">- Pilih -</option>
                                    <option value="Belum">Belum</option>
                                    <option value="Sudah">Sudah</option>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">Warga Negara</label>
                                    <input required type="text" name="warga_negara" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <label for="">Status Hidup</label>
                                <select name="status_hidup" class="form-control select2" id="">
                                    <option value="">- Pilih -</option>
                                    <option value="Hidup">Hidup</option>
                                    <option value="Meninggal">Meninggal</option>
                                </select>
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

    {{-- modal edit --}}
    @foreach ($datas as $d)
        <div class="modal fade text-left" id="modal-edit{{ $d->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-lg-max" role="document">
                <form action="{{ route('edit_penduduk') }}" enctype="multipart/form-data" method="post">
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
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="{{ $d->id }}">
                                        <label for="">No KTP</label>
                                        <input value="{{ $d->no_ktp }}" required type="text" name="no_ktp"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Nama Lengkap</label>
                                        <input value="{{ $d->nama }}" required type="text" name="nama"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label for="">Kelamin</label>
                                    <select name="j_kelamin" class="form-control select2" id="">
                                        <option value="">- Pilih Kelamin -</option>
                                        <option {{ $d->j_kelamin == 'pria' ? 'selected' : '' }} value="pria">Pria
                                        </option>
                                        <option {{ $d->j_kelamin == 'wanita' ? 'selected' : '' }} value="wanita">Wanita
                                        </option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">Agama</label>
                                        <input value="{{ $d->agama }}" required type="text" name="agama"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">Golongan Darah</label>
                                        <input value="{{ $d->gol_darah }}" required type="text" name="gol_darah"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <input value="{{ $d->alamat }}" type="text" name="alamat"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">No HP</label>
                                        <input value="{{ $d->no_hp }}" type="text" name="no_hp"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">Tempat Lahir</label>
                                        <input value="{{ $d->tmpt_lahir }}" required type="text" name="tmpt_lahir"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">Tgl Lahir</label>
                                        <input value="{{ $d->tgl_lahir }}" required type="date" name="tgl_lahir"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">Pendidikan</label>
                                        <input value="{{ $d->pendidikan }}" required type="text" name="pendidikan"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">Pekerjaan</label>
                                        <input value="{{ $d->pekerjaan }}" required type="text" name="pekerjaan"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label for="">Status Nikah</label>
                                    <select name="status_nikah" class="form-control select2" id="">
                                        <option value="">- Pilih -</option>
                                        <option {{ $d->status_nikah == 'Belum' ? 'selected' : '' }} value="Belum">Belum
                                        </option>
                                        <option {{ $d->status_nikah == 'Sudah' ? 'selected' : '' }} value="Sudah">Sudah
                                        </option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">Warga Negara</label>
                                        <input value="{{ $d->warga_negara }}" required type="text"
                                            name="warga_negara" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label for="">Status Hidup</label>
                                    <select name="status_hidup" class="form-control select2" id="">
                                        <option value="">- Pilih -</option>
                                        <option {{ $d->status_hidup == 'Hidup' ? 'selected' : '' }} value="Hidup">Hidup
                                        </option>
                                        <option {{ $d->status_hidup == 'Meninggal' ? 'selected' : '' }} value="Meninggal">
                                            Meninggal</option>
                                    </select>
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
                            $umur = date_diff(date_create($d->tgl_lahir), date_create('today'))->y;
                            $detail = [
                                'No KTP' => $d->no_ktp,
                                'Nama Lengkap' => $d->nama,
                                'Umur' => "$umur Tahun",
                                'Kelamin' => $d->j_kelamin,
                                'Kelamin' => $d->j_kelamin,
                                'Agama' => $d->agama,
                                'Gol Darah' => $d->gol_darah,
                                'Alamat' => $d->alamat,
                                'No HP' => $d->no_hp,
                                'Tempat Lahir' => $d->tmpt_lahir,
                                'Tgl Lahir' => $d->tgl_lahir,
                                'Pendidikan' => $d->pendidikan,
                                'Pekerjaan' => $d->pekerjaan,
                                'Status Nikah' => $d->status_nikah,
                                'Warga Negara' => $d->warga_negara,
                                'Status Hidup' => $d->status_hidup,
                            ];
                        @endphp
                        <table class="table">
                            @foreach ($detail as $i => $s)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td width="6%">: </td>
                                    <td>{{ $s }}</td>
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
