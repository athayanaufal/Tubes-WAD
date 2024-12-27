<?php

namespace App\Http\Controllers;

use App\Models\RiwayatMedis;
use App\Models\Pasien;
use Illuminate\Http\Request;

class RiwayatMedisController extends Controller
{
    public function __construct()
    {
        $this->middleware('dokter');  // Hanya dokter yang bisa mengakses
    }

    public function index($pasien_id)
    {
        $riwayatMedis = RiwayatMedis::where('pasien_id', $pasien_id)->get();

        return view('riwayat_medis.index', compact('riwayatMedis'));
    }

    public function store(Request $request, $pasien_id)
    {
        $request->validate([
            'diagnosis' => 'required',
            'obat' => 'required',
            'tanggal' => 'required|date',
        ]);

        RiwayatMedis::create([
            'pasien_id' => $pasien_id,
            'dokter_id' => auth()->user()->id,
            'diagnosis' => $request->diagnosis,
            'obat' => $request->obat,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('riwayat_medis.index', $pasien_id)
                         ->with('success', 'Riwayat medis berhasil ditambahkan.');
    }
}
