<?php

namespace App\Http\Controllers;

use App\Models\Kelahiran;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class KelahiranController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Kelahiran Penduduk',
            'datas' => Kelahiran::with('penduduk')->orderBy('id', 'DESC')->get(),
            'penduduk' => Penduduk::where('j_kelamin', 'wanita')->get()
        ];
        return view('kelahiran.kelahiran',$data);
    }

    public function create(Request $r)
    {
        $data = [
            'penduduk_id' => $r->penduduk_id,
            'nama' => $r->nama,
            'tmpt_lahir' => $r->tmpt_lahir,
            'tgl_lahir' => $r->tgl_lahir,
            'jam' => $r->jam,
            'j_kelamin' => $r->j_kelamin,
        ];
        Kelahiran::create($data);
        return redirect()->route('kelahiran')->with('sukses', 'Berhasil tambah data');
    }

    public function update(Request $r)
    {
        $data = [
            'penduduk_id' => $r->penduduk_id,
            'nama' => $r->nama,
            'tmpt_lahir' => $r->tmpt_lahir,
            'tgl_lahir' => $r->tgl_lahir,
            'jam' => $r->jam,
            'j_kelamin' => $r->j_kelamin,
        ];
        Kelahiran::find($r->id)->update($data);
        return redirect()->route('kelahiran')->with('sukses', 'Berhasil edit data');
    }
    public function destroy($id)
    {
        Kelahiran::find($id)->delete();
        return redirect()->route('kelahiran')->with('sukses', 'Berhasil hapus data');
    }
}
