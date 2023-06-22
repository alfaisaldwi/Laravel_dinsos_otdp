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
}
