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
                                    <th>Alamat</th>
                                    <th>Tgl Terbit</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $no => $d)
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        <td>{{ $d->no_kk }}</td>
                                        <td>{{ ucwords($d->alamat) }}</td>
                                        <td>{{ tanggal($d->tgl_terbit) }}</td>
                                        <td align="center">
                                            <a data-bs-toggle="modal" data-bs-target="#modal-detail{{ $d->id }}"
                                                class="btn icon btn-sm btn-primary"><i class="bi bi-eye"></i></a>
                                            <a data-bs-toggle="modal" data-bs-target="#modal-edit{{ $d->id }}"
                                                class="btn icon btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                                            <a onclick="return confirm('Yakin dihapus ?')"
                                                href="{{ route('hapus_kk', $d->id) }}"
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
            <form action="{{ route('tambah_kk') }}" enctype="multipart/form-data" method="post">
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
                                    <label for="">No KK</label>
                                    <input required type="text" name="no_kk" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" name="alamat" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">No HP</label>
                                    <input type="text" name="no_hp" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Tgl Terbit</label>
                                    <input required type="date" name="tgl_terbit" class="form-control">
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
    <div class="modal fade text-left" id="modal-edit{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <form action="{{ route('edit_kk') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel1">
                            Edit {{ $title }}
                        </h5>
                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" name="id" value="{{ $d->id }}">
                                <div class="form-group">
                                    <label for="">No KK</label>
                                    <input value="{{ $d->no_kk }}" required type="text" name="no_kk" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input value="{{ $d->alamat }}" type="text" name="alamat" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">No HP</label>
                                    <input value="{{ $d->alamat }}" type="text" name="no_hp" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Tgl Terbit</label>
                                    <input value="{{ $d->tgl_terbit }}" required type="date" name="tgl_terbit" class="form-control">
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
    
    {{-- view detail --}}
    @foreach ($datas as $d)
        <div class="modal fade text-left" id="modal-detail{{ $d->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
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
                            $detail = [
                                'No KK' => $d->no_kk,
                                'Alamat' => $d->alamat,
                                'No HP' => $d->no_hp,
                                'Tgl Terbit' => $d->tgl_terbit,
                            ];
                        @endphp
                        <table class="table">
                            @foreach ($detail as $i => $s)
                                <tr>
                                    <td width="30%">{{ $i }}</td>
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
