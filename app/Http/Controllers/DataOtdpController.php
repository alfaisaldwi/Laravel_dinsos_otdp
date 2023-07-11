<?php

namespace App\Http\Controllers;

use App\Models\DataOtdp;
use Illuminate\Http\Request;

class DataOtdpController extends Controller
{
 public function index()
    {
        $data_otdps = DataOtdp::latest()->get();
        return view('layouts.data_otdp.data_otdp', compact('data_otdps'));
    }

    public function create()
    {
        return view('layouts.data_otdp.create_data_otdp');
    }

    public function postCreate(Request $request)
    {
        // ...
    
        $destinasi = $request->input('destinasiC');
        $namaKota = '';
    
        if ($destinasi === 'jawa') {
            $namaKota = $request->input('kotaC') . '-' . $request->input('destinasiC');;
        } else if ($destinasi === 'luar_jawa') {
            $namaKota = $request->input('kotaC') . '-' . $request->input('pulauC');
        }
    
        // Simpan data ke database
        $dataOtdp = new DataOtdp();
        $dataOtdp->nama = $request->input('namaC');
        $dataOtdp->no_kepolisian = $request->input('nokC');
        $dataOtdp->umur = $request->input('umurC');
        $dataOtdp->ttl = $request->input('ttlC');
        $dataOtdp->pekerjaan = $request->input('pekerjaanC');
        $dataOtdp->destinasi_tujuan = $namaKota;
        $dataOtdp->save();
    
        // ...
    
        return redirect()->route('data_otdp.index')->with('success', 'Data OTDP berhasil ditambahkan');
    }


    public function edit($id)
    {
        $dataOtdp = DataOtdp::findOrFail($id);

        return view('layouts.data_otdp.edit_data_otdp', compact('dataOtdp'));
    }

    public function update(Request $request, $id)
    {
        $data_otdp = DataOtdp::find($id);
        $data_otdp->nama = $request->input('nama');
        $data_otdp->no_kepolisian = $request->input('no_kepolisian');
        $data_otdp->umur = $request->input('umur');
        $data_otdp->ttl = $request->input('ttl');
        $data_otdp->pekerjaan = $request->input('pekerjaan');
        
        if ($request->input('destinasi') == 'jawa') {
            $data_otdp->destinasi_tujuan = $request->input('kota').'-Jawa';
        } else {
            $data_otdp->destinasi_tujuan= $request->input('pulau').'-'.$request->input('kota');
        }

        $data_otdp->save();

        return redirect()->route('data_otdp.index')->with('success', 'Data OTDP berhasil diperbarui');
    }

    public function destroy($id)
{
    $data_otdp = DataOtdp::find($id);
    if ($data_otdp) {
        $data_otdp->delete();
        return redirect()->route('data_otdp.index')->with('success', 'Data OTDP berhasil dihapus');
    }
    return redirect()->route('data_otdp.index')->with('error', 'Data OTDP tidak ditemukan');
}

}