<?php

namespace App\Http\Controllers;

use App\Models\Kematian;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class KematianController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Kematian Penduduk',
            'datas' => Kematian::with('penduduk')->orderBy('id', 'DESC')->get(),
            'penduduk' => Penduduk::all()
        ];
        return view('kematian.kematian',$data);
    }

    public function create(Request $r)
    {
        $umur = Penduduk::find($r->penduduk_id)->tgl_lahir;
        $data = [
            'penduduk_id' => $r->penduduk_id,
            'tgl_kematian' => $r->tgl_kematian,
            'sebab' => $r->sebab,
            'umur' => date_diff(date_create($umur), date_create($r->tgl_kematian))->y,
        ];
        Kematian::create($data);
        return redirect()->route('kematian')->with('sukses', 'Berhasil tambah data');
    }

    public function update(Request $r)
    {
        $data = [
            'penduduk_id' => $r->penduduk_id,
            'tgl_kematian' => $r->tgl_kematian,
            'sebab' => $r->sebab,
        ];
        Kematian::find($r->id)->update($data);
        return redirect()->route('kematian')->with('sukses', 'Berhasil edit data');
    }
    public function destroy($id)
    {
        Kematian::find($id)->delete();
        return redirect()->route('kematian')->with('sukses', 'Berhasil hapus data');
    }
}
