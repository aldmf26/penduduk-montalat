@extends('theme.app')
@section('content')
    <div id="main">
        <div class="page-heading">
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="float: left">{{ $title }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('save_lapKelahiran') }}" method="post">
                            @csrf
                            <div class="row" x-data="{
                                pilih:false
                            }">
                            <div class="col-lg-3">
                                <input type="hidden" name="jenis" value="{{ $jenis }}">
                                <div class="form-group">
                                    <label for="">Tgl {{$jenis == 1 ? 'Lahir' : 'Meniggal'}} Dari</label>
                                    <input type="date" name="tgl1" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Tgl {{$jenis == 1 ? 'Lahir' : 'Meniggal'}} Sampai</label>
                                    <input type="date" name="tgl2" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Aksi</label><br>
                                    <button class="btn btn-primary" type="submit">Cetak</button>
                                </div>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>

    </div>
@endsection
