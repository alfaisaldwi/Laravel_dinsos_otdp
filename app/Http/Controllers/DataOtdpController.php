<?php

namespace App\Http\Controllers;

use App\Models\DataOtdp;
use Illuminate\Http\Request;
use File;

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

        $destinasi = $request->destinasi_tujuan;

        if ($destinasi === 'Jawa') {
            $tujuan = $request->provinsi;
        } else {
            $tujuan = $request->provinsi . '-' . $request->destinasi_pulau;
        }

        $files = $request->file('file');
        $dok = uniqid() . '.' . 'file' . '.' . $request->file->extension();
        $files->move(public_path('file/'), $dok);
        $file = $dok;

        $provinsiDekat = [
            'Bali',
            'Kalimantan Selatan',
            'Kalimantan Barat',
            'Kalimantan Tengah',
            'Lampung',
            'Sumatra Selatan',
            'Sulawesi Selatan',
            'Nusa Tenggara Barat',
            'Bengkulu',
            'Jambi'
        ];

        $destinasi = $request->destinasi_tujuan; // Destinasi Tujuan dari permintaan HTTP
        $provinsi = $request->provinsi; // Provinsi dari permintaan HTTP
        $umur = $request->umur; // Umur dari permintaan HTTP
        $pekerjaan = $request->pekerjaan; // Pekerjaan dari permintaan HTTP

        $hasil = ''; // Inisialisasi variabel $hasil dengan nilai awal

        if (in_array($provinsi, $provinsiDekat)) {
            if ($umur >= 51 && $destinasi !== 'Jawa') {
                // Umur 51++ , destinasi luar Jawa, dan provinsi termasuk dalam kategori jarak dekat
                $hasil = 'Jarak Dekat'; //done
                // ...
            } elseif ($umur >= 31 && $umur <= 50 && $destinasi !== 'Jawa' && $pekerjaan === 'Wiraswasta') {
                // Umur 31-50, destinasi luar Jawa, provinsi termasuk dalam kategori jarak dekat, dan pekerjaan wiraswasta
                $hasil = 'Jarak Dekat'; //done
                // ...
            } elseif ($umur >= 31 && $umur <= 50 && $destinasi !== 'Jawa' && $pekerjaan === 'Buruh') {
                // Umur 31-50, destinasi luar Jawa, provinsi termasuk dalam kategori jarak dekat, dan pekerjaan buruh
                $hasil = 'Jarak Dekat';

            }
        } else if ($umur >= 15 && $umur <= 30 && $destinasi !== 'Jawa') {
            // Umur 15-30, destinasi luar Jawa, provinsi termasuk dalam kategori jarak jauh,
            $hasil = 'Jarak JAUH Kondisi Provinsi Jauh'; //done
        } else if ($umur >= 31 && $umur <= 50 && $destinasi !== 'Jawa' && $pekerjaan === 'Karyawan Swasta') {
            // Umur 31-50, destinasi luar Jawa, provinsi termasuk dalam kategori jarak jauh, dan pekerjaan karyawan swasta
            $hasil = 'Jarak JAUH Kondisi Provinsi Jauh'; //done
        } else if ($umur >= 31 && $umur <= 50 && $destinasi !== 'Jawa' && $pekerjaan === 'Ibu Rumah Tangga') {
            // Umur 31-50, destinasi luar Jawa, provinsi termasuk dalam kategori jarak jauh, dan pekerjaan ibu rumah tangga
            $hasil = 'Jarak JAUH Kondisi Provinsi Jauh'; //done
        } else {
            $hasil = null;
        }

        // Simpan data ke database
        $dataOtdp = new DataOtdp();
        $dataOtdp->nama = $request->nama;
        $dataOtdp->no_kepolisian = $request->no;
        $dataOtdp->umur = $request->umur;
        $dataOtdp->tempat_lahir = $request->tempat_lahir;
        $dataOtdp->tanggal_lahir = $request->tanggal_lahir;
        $dataOtdp->alamat = $request->alamat;
        $dataOtdp->pekerjaan = $request->pekerjaan;
        $dataOtdp->destinasi_tujuan = $tujuan;
        $dataOtdp->destinasi_pulau = $request->destinasi_pulau;
        $dataOtdp->provinsi = $request->provinsi;
        $dataOtdp->nama_file = $file;
        $dataOtdp->hasil = $hasil;
        $dataOtdp->save();

        return redirect()->route('data_otdp.index')->with('success', 'Data OTDP berhasil ditambahkan');
    }

    public function edit($id)
    {
        $dataOtdp = DataOtdp::findOrFail($id);

        return view('layouts.data_otdp.edit_data_otdp', compact('dataOtdp'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $dataOtdp = DataOtdp::findOrFail($id);
        $destinasi = $request->destinasi_tujuan;

        if ($destinasi === 'Jawa') {
            $tujuan = $request->provinsi;
        } else {
            $tujuan = $request->provinsi . '-' . $request->destinasi_pulau;
        }

        if ($request->hasFile('file')) {
            $files = $request->file('file');
            $dok = uniqid() . '.' . 'file' . '.' . $request->file->extension();
            $files->move(public_path('file/'), $dok);
            $file = $dok;

            File::delete('file/' . $dataOtdp->nama_file);
        } else {
            $file = $dataOtdp->nama_file;
        }

        $provinsiDekat = [
            'Bali',
            'Kalimantan Selatan',
            'Kalimantan Barat',
            'Kalimantan Tengah',
            'Lampung',
            'Sumatra Selatan',
            'Sulawesi Selatan',
            'Nusa Tenggara Barat',
            'Bengkulu',
            'Jambi'
        ];

        $destinasi = $request->destinasi_tujuan; // Destinasi Tujuan dari permintaan HTTP
        $provinsi = $request->provinsi; // Provinsi dari permintaan HTTP
        $umur = $request->umur; // Umur dari permintaan HTTP
        $pekerjaan = $request->pekerjaan; // Pekerjaan dari permintaan HTTP

        $hasil = ''; // Inisialisasi variabel $hasil dengan nilai awal

        if (in_array($provinsi, $provinsiDekat)) {
            if ($umur >= 51 && $destinasi !== 'Jawa') {
                // Umur 51++ , destinasi luar Jawa, dan provinsi termasuk dalam kategori jarak dekat
                $hasil = 'Jarak Dekat'; //done
                // ...
            } elseif ($umur >= 31 && $umur <= 50 && $destinasi !== 'Jawa' && $pekerjaan === 'Wiraswasta') {
                // Umur 31-50, destinasi luar Jawa, provinsi termasuk dalam kategori jarak dekat, dan pekerjaan wiraswasta
                $hasil = 'Jarak Dekat'; //done
                // ...
            } elseif ($umur >= 31 && $umur <= 50 && $destinasi !== 'Jawa' && $pekerjaan === 'Buruh') {
                // Umur 31-50, destinasi luar Jawa, provinsi termasuk dalam kategori jarak dekat, dan pekerjaan buruh
                $hasil = 'Jarak Dekat';

            }
        } else if ($umur >= 15 && $umur <= 30 && $destinasi !== 'Jawa') {
            // Umur 15-30, destinasi luar Jawa, provinsi termasuk dalam kategori jarak jauh,
            $hasil = 'Jarak JAUH Kondisi Provinsi Jauh'; //done
        } else if ($umur >= 31 && $umur <= 50 && $destinasi !== 'Jawa' && $pekerjaan === 'Karyawan Swasta') {
            // Umur 31-50, destinasi luar Jawa, provinsi termasuk dalam kategori jarak jauh, dan pekerjaan karyawan swasta
            $hasil = 'Jarak JAUH Kondisi Provinsi Jauh'; //done
        } else if ($umur >= 31 && $umur <= 50 && $destinasi !== 'Jawa' && $pekerjaan === 'Ibu Rumah Tangga') {
            // Umur 31-50, destinasi luar Jawa, provinsi termasuk dalam kategori jarak jauh, dan pekerjaan ibu rumah tangga
            $hasil = 'Jarak JAUH Kondisi Provinsi Jauh'; //done
        } else {
            $hasil = null;
        }
        $dataOtdp->update([
            'nama' => $request->nama,
            'no_kepolisian' => $request->no,
            'umur' => $request->umur,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'pekerjaan' => $request->pekerjaan,
            'destinasi_tujuan' => $tujuan,
            'destinasi_pulau' => $request->destinasi_pulau,
            'provinsi' => $request->provinsi,
            'nama_file' => $file,
            'hasil' => $hasil,
        ]);

        return redirect()->route('data_otdp.index')->with('success', 'Data OTDP berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data_otdp = DataOtdp::find($id);
        if ($data_otdp) {
            File::delete('file/' . $data_otdp->nama_file);
            $data_otdp->delete();
            return redirect()->route('data_otdp.index')->with('success', 'Data OTDP berhasil dihapus');
        }
        return redirect()->route('data_otdp.index')->with('error', 'Data OTDP tidak ditemukan');
    }

    public function rekomendasi()
    {
        $data_otdps = DataOtdp::latest()->get();
        return view('layouts.rekomendasi.index', compact('data_otdps'));
    }
}