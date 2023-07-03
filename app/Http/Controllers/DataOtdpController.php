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
}

