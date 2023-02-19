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
                        <form action="{{ route('save_lapPenduduk') }}" method="post">
                            @csrf
                            <div class="row" x-data="{
                                pilih:false
                            }">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Pilih Filter</label>
                                    <select name="" id="" x-model="pilih" class="form-control">
                                        <option value="false">- Pilih -</option>
                                        @php
                                            $datas = [
                                                '0' => 'All',
                                                'kelamin' => 'j_kelamin',
                                                'status nikah' => 'status_nikah',
                                                'status hidup' => 'status_hidup'
                                            ];
                                        @endphp
                                        @foreach ($datas as $i => $d)
                                            <option value="{{ $d }}">{{ ucwords($i == '0' ? 'All' : $i) }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <template x-if="pilih === 'j_kelamin'">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Jenis Kelamin</label>
                                        <select name="j_kelamin" class="form-control select2" id="">
                                            <option value="">- Pilih -</option>
                                            <option value="pria">Pria</option>
                                            <option value="wanita">Wanita</option>
                                        </select>
                                    </div>
                                </div>
                            </template>
                            <template x-if="pilih === 'status_nikah'">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Status Menikah</label>
                                        <select name="status_nikah" class="form-control select2" id="">
                                            <option value="">- Pilih Status-</option>
                                            <option value="sudah">Sudah</option>
                                            <option value="belum">Belum</option>
                                        </select>
                                    </div>
                                </div>
                            </template>
                            <template x-if="pilih === 'status_hidup'">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Status Hidup</label>
                                        <select name="status_hidup" class="form-control select2" id="">
                                            <option value="">- Pilih Status -</option>
                                            <option value="hidup">Hidup</option>
                                            <option value="meniggal">Meninggal</option>
                                        </select>
                                    </div>
                                </div>
                            </template>
                            <input type="hidden" name="pilih" x-model="pilih">
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
