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
                        <form action="{{ route('save_lapAnggotaKeluarga') }}" method="post">
                            @csrf
                            <div class="row" x-data="{
                                pilih:false
                            }">

                            <div class="col-lg-3">
                                <label for="">No KK</label>
                                <select name="kk_id" class="form-control select2" id="">
                                    <option value="">- Pilih Kk -</option>
                                    @foreach ($kk as $k)
                                        <option value="{{ $k->id }}">{{ $k->no_kk }}</option>
                                    @endforeach
                                </select>
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
