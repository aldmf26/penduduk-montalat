<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Pegawai',
            'datas' => Pegawai::orderBy('id', 'DESC')->get()
        ];
        return view('pegawai.pegawai',$data);
    }

    public function create(Request $r)
    {
        $data = [
            'nik' => $r->nik,
            'nama' => $r->nama,
            'alamat' => $r->alamat,
            'no_hp' => $r->no_hp,
            'jabatan' => $r->jabatan,
            'tgl_lahir' => $r->tgl_lahir,
            'tgl' => date('Y-m-d'),
        ];
        Pegawai::create($data);
        return redirect()->route('pegawai')->with('sukses', 'Berhasil tambah data');
    }

    public function update(Request $r)
    {
        $data = [
            'nik' => $r->nik,
            'nama' => $r->nama,
            'alamat' => $r->alamat,
            'no_hp' => $r->no_hp,
            'jabatan' => $r->jabatan,
            'tgl_lahir' => $r->tgl_lahir,
        ];
        Pegawai::find($r->id)->update($data);
        return redirect()->route('pegawai')->with('sukses', 'Berhasil edit data');
    }
    public function destroy($id)
    {
        Pegawai::find($id)->delete();
        return redirect()->route('pegawai')->with('sukses', 'Berhasil hapus data');
    }
}
