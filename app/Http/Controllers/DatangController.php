<?php

namespace App\Http\Controllers;

use App\Models\Datang;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class DatangController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Pendatang',
            'datas' => Datang::with('penduduk')->orderBy('id', 'DESC')->get(),
            'penduduk' => Penduduk::all()
        ];
        return view('datang.datang',$data);
    }

    public function create(Request $r)
    {
        $data = [
            'penduduk_id' => $r->penduduk_id,
            'alamat' => $r->alamat,
            'tgl' => $r->tgl,
        ];
        Datang::create($data);
        return redirect()->route('datang')->with('sukses', 'Berhasil tambah data');
    }

    public function update(Request $r)
    {
        $data = [
            'penduduk_id' => $r->penduduk_id,
            'alamat' => $r->alamat,
            'tgl' => $r->tgl,
        ];
        Datang::find($r->id)->update($data);
        return redirect()->route('datang')->with('sukses', 'Berhasil edit data');
    }
    public function destroy($id)
    {
        Datang::find($id)->delete();
        return redirect()->route('datang')->with('sukses', 'Berhasil hapus data');
    }
}
