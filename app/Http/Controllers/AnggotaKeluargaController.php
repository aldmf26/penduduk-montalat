<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKeluarga;
use App\Models\Kk;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class AnggotaKeluargaController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Anggota Keluarga',
            'datas' => AnggotaKeluarga::with([
                'kk',
                'penduduk'
            ])->groupBy('kk_id')->get(),
            'kk' => Kk::all(),
            'penduduk' => Penduduk::all()
        ];
        return view('anggota_keluarga.anggota_keluarga',$data);
    }

    public function create(Request $r)
    {
        $data = [
            'kk_id' => $r->kk_id,
            'penduduk_id' => $r->penduduk_id,
            'hubungan_keluarga' => $r->hubungan_keluarga,
        ];
        AnggotaKeluarga::create($data);
        return redirect()->route('anggota_keluarga')->with('sukses', 'Berhasil tambah data');
    }

    public function update(Request $r)
    {
        $data = [
            'kk_id' => $r->kk_id,
            'penduduk_id' => $r->penduduk_id,
            'hubungan_keluarga' => $r->hubungan_keluarga,
        ];
        AnggotaKeluarga::find($r->id)->update($data);
        return redirect()->route('anggota_keluarga')->with('sukses', 'Berhasil edit data');
    }
    public function destroy($id)
    {
        AnggotaKeluarga::find($id)->delete();
        return redirect()->route('anggota_keluarga')->with('sukses', 'Berhasil hapus data');
    }

}
