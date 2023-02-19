<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKeluarga;
use App\Models\Datang;
use App\Models\Kelahiran;
use App\Models\Kematian;
use App\Models\Kk;
use App\Models\Pegawai;
use App\Models\Penduduk;
use App\Models\Pindah;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function lapPegawai()
    {
        $data = [
            'title' => 'Laporan Data Pegawai',
            'datas' => Pegawai::all(),
        ];
        return view('laporan.pegawai.view',$data);
    }

    public function save_lapPegawai()
    {
        $data = [
            'title' => 'Laporan Data Pegawai',
            'datas' => Pegawai::all(),
        ];
        return view('laporan.pegawai.print',$data);
    }

    public function lapPenduduk()
    {
        $data = [
            'title' => 'Laporan Data Penduduk',
            'datas' => Penduduk::all(),
        ];
        return view('laporan.penduduk.view',$data);
    }

    public function save_lapPenduduk(Request $r)
    {
        if($r->pilih == 'All'){
            $penduduk = Penduduk::all();
        } else {
            $pilih = $r->pilih;
            $where = $r->$pilih;
            $penduduk = Penduduk::where($pilih, $where)->get();
        }
        $data = [
            'title' => 'Laporan Data Penduduk',
            'datas' => $penduduk,
        ];
        return view('laporan.penduduk.print',$data);
    }

    public function lapKk()
    {
        $data = [
            'title' => 'Laporan Data Kartu Keluarga',
            'datas' => Penduduk::all(),
        ];
        return view('laporan.kk.view',$data);
    }

    public function save_lapKk(Request $r)
    {
        $query = Kk::whereBetween('tgl_terbit', [$r->tgl1, $r->tgl2])->get();
        $data = [
            'title' => 'Laporan Data Kartu Keluarga',
            'datas' => $query,
        ];
        return view('laporan.kk.print',$data);
    }

    public function lapAnggotaKeluarga()
    {
        $data = [
            'title' => 'Laporan Anggota Keluarga',
            'datas' => Penduduk::all(),
            'kk' => Kk::all(),
        ];
        return view('laporan.anggotaKeluarga.view',$data);
    }

    public function save_lapAnggotaKeluarga(Request $r)
    {
        $query = AnggotaKeluarga::with([
            'kk',
            'penduduk'
        ])->where('kk_id', $r->kk_id)->groupBy('kk_id')->get();
        $data = [
            'title' => 'Laporan Anggota Keluarga',
            'datas' => $query,
        ];
        return view('laporan.anggotaKeluarga.print',$data);
    }

    public function lapKelahiran($jenis)
    {
        $data = [
            'title' => $jenis == '1' ? 'Laporan Kelahiran' : 'Laporan Kematian',
            'datas' => Penduduk::all(),
            'jenis' => $jenis,
        ];
        return view('laporan.kelahiran.view',$data);
    }

    public function save_lapKelahiran(Request $r)
    {
        $query = $r->jenis == 1 ? 
                    Kelahiran::with('penduduk')->whereBetween('tgl_lahir', [$r->tgl1, $r->tgl2])->orderBy('id', 'DESC')->get()
                    :
                    Kematian::with('penduduk')->whereBetween('tgl_kematian', [$r->tgl1, $r->tgl2])->orderBy('id', 'DESC')->get();
        $data = [
            'title' => $r->jenis == '1' ? 'Laporan Kelahiran' : 'Laporan Kematian',
            'datas' => $query,
            'jenis' => $r->jenis,
        ];
        return view('laporan.kelahiran.print',$data);
    }

    public function lapDatang($jenis)
    {
        $data = [
            'title' => $jenis == '1' ? 'Laporan Datang Penduduk' : 'Laporan Pindah Penduduk',
            'datas' => Penduduk::all(),
            'kk' => Kk::all(),
            'jenis' => $jenis,
        ];
        return view('laporan.datang.view',$data);
    }

    public function save_lapDatang(Request $r)
    {
        $query = $r->jenis == 1 ? 
                    Datang::with('penduduk')->whereBetween('tgl', [$r->tgl1, $r->tgl2])->orderBy('id', 'DESC')->get()
                    :
                    Pindah::with('penduduk')->whereBetween('tgl', [$r->tgl1, $r->tgl2])->orderBy('id', 'DESC')->get();
        $data = [
            'title' => $r->jenis == '1' ? 'Laporan Datang Penduduk' : 'Laporan Pindah Penduduk',
            'datas' => $query,
            'jenis' => $r->jenis,
        ];
        return view('laporan.datang.print',$data);
    }
    
}
