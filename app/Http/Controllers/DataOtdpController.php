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
        //
        return view('layouts.data_otdp.create_data_otdp');
    }

    public function postcreate(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'namaC' => 'required',
            'nokC' => 'required',
            'umurC' => 'required',
            'ttlC' => 'required',
            'pekerjaanC' => 'required',
            'destinasiC' => 'required',
            'pulauC' => 'required_if:destinasiC,luar_jawa',
        ]);

        // Buat instance model DataOtdp
        $dataOtdp = new DataOtdp();
        $dataOtdp->nama = $validatedData['namaC'];
        $dataOtdp->no_kepolisian = $validatedData['nokC'];
        $dataOtdp->umur = $validatedData['umurC'];
        $dataOtdp->ttl = $validatedData['ttlC'];
        $dataOtdp->pekerjaan = $validatedData['pekerjaanC'];
        $dataOtdp->destinasi_tujuan = $validatedData['destinasiC'];
        $dataOtdp->destinasi_pulau = $validatedData['pulauC'] ?? null; // Jika destinasiC adalah 'jawa', pulauC akan bernilai null
        $dataOtdp->save();

        // Redirect ke halaman lain atau tampilkan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $data_otdp = DataOtdp::findOrFail($id);
        return view('layouts.data_otdp.edit_data_otdp', compact('data_otdp'));
    }

    public function update(Request $request, $id)
    {
        $data_otdp = DataOtdp::findOrFail($id);
        $data_otdp->nama = $request->input('nama');
        $data_otdp->no_kepolisian = $request->input('no_kepolisian');
        $data_otdp->umur = $request->input('umur');
        $data_otdp->ttl = $request->input('ttl');
        $data_otdp->pekerjaan = $request->input('pekerjaan');
        $data_otdp->destinasi_tujuan = $request->input('destinasi_tujuan');
        $data_otdp->destinasi_pulau = $request->input('destinasi_pulau');
        $data_otdp->save();

        return redirect()->route('data_otdp.index')->with('success', 'Data OTDP berhasil diperbarui.');
    }
}


