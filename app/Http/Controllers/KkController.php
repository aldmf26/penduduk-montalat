<?php

namespace App\Http\Controllers;

use App\Models\Kk;
use Illuminate\Http\Request;

class KkController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Kartu Keluarga',
            'datas' => Kk::orderBy('id', 'DESC')->get()
        ];
        return view('kk.kk',$data);
    }

    public function create(Request $r)
    {
        $data = [
            'no_kk' => $r->no_kk,
            'alamat' => $r->alamat,
            'no_hp' => $r->no_hp,
            'jml_keluarga' => 0,
            'tgl_terbit' => $r->tgl_terbit,
        ];
        Kk::create($data);
        return redirect()->route('kk')->with('sukses', 'Berhasil tambah data');
    }

    public function update(Request $r)
    {
        $data = [
            'no_kk' => $r->no_kk,
            'alamat' => $r->alamat,
            'no_hp' => $r->no_hp,
            'jml_keluarga' => 0,
            'tgl_terbit' => $r->tgl_terbit,
        ];
        Kk::find($r->id)->update($data);
        return redirect()->route('kk')->with('sukses', 'Berhasil edit data');
    }
    public function destroy($id)
    {
        Kk::find($id)->delete();
        return redirect()->route('kk')->with('sukses', 'Berhasil hapus data');
    }
}
