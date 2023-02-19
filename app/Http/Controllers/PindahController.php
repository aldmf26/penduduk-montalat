<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Pindah;
use Illuminate\Http\Request;

class PindahController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Pindah Penduduk',
            'datas' => Pindah::with('penduduk')->orderBy('id', 'DESC')->get(),
            'penduduk' => Penduduk::all()
        ];
        return view('pindah.pindah',$data);
    }

    public function create(Request $r)
    {
        $data = [
            'penduduk_id' => $r->penduduk_id,
            'alamat_lama' => $r->alamat_lama,
            'alamat_baru' => $r->alamat_baru,
            'tgl' => $r->tgl,
        ];
        Pindah::create($data);
        return redirect()->route('pindah')->with('sukses', 'Berhasil tambah data');
    }

    public function update(Request $r)
    {
        $data = [
            'penduduk_id' => $r->penduduk_id,
            'alamat_lama' => $r->alamat_lama,
            'alamat_baru' => $r->alamat_baru,
            'tgl' => $r->tgl,
        ];
        Pindah::find($r->id)->update($data);
        return redirect()->route('pindah')->with('sukses', 'Berhasil edit data');
    }
    public function destroy($id)
    {
        Pindah::find($id)->delete();
        return redirect()->route('pindah')->with('sukses', 'Berhasil hapus data');
    }
}
