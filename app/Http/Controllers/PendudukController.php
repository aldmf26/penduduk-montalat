<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Penduduk',
            'datas' => Penduduk::orderBy('id', 'DESC')->get()
        ];
        return view('penduduk.penduduk',$data);
    }

    public function create(Request $r)
    {
        $data = [
            'no_ktp' => $r->no_ktp,
            'nama' => $r->nama,
            'j_kelamin' => $r->j_kelamin,
            'agama' => $r->agama,
            'gol_darah' => $r->gol_darah,
            'nm_ayah' => $r->nm_ayah,
            'nm_ibu' => $r->nm_ibu,
            'alamat' => $r->alamat,
            'no_hp' => $r->no_hp,
            'tmpt_lahir' => $r->tmpt_lahir,
            'tgl_lahir' => $r->tgl_lahir,
            'pendidikan' => $r->pendidikan,
            'pekerjaan' => $r->pekerjaan,
            'status_nikah' => $r->status_nikah,
            'warga_negara' => $r->warga_negara,
            'status_hidup' => $r->status_hidup,
        ];
        Penduduk::create($data);
        return redirect()->route('penduduk')->with('sukses', 'Berhasil tambah data');
    }

    public function update(Request $r)
    {
        $data = [
            'no_ktp' => $r->no_ktp,
            'nama' => $r->nama,
            'j_kelamin' => $r->j_kelamin,
            'agama' => $r->agama,
            'gol_darah' => $r->gol_darah,
            'nm_ayah' => $r->nm_ayah,
            'nm_ibu' => $r->nm_ibu,
            'alamat' => $r->alamat,
            'no_hp' => $r->no_hp,
            'tmpt_lahir' => $r->tmpt_lahir,
            'tgl_lahir' => $r->tgl_lahir,
            'pendidikan' => $r->pendidikan,
            'pekerjaan' => $r->pekerjaan,
            'status_nikah' => $r->status_nikah,
            'warga_negara' => $r->warga_negara,
            'status_hidup' => $r->status_hidup,
        ];
        Penduduk::find($r->id)->update($data);
        return redirect()->route('penduduk')->with('sukses', 'Berhasil edit data');
    }
    public function destroy($id)
    {
        Penduduk::find($id)->delete();
        return redirect()->route('penduduk')->with('sukses', 'Berhasil hapus data');
    }
}
