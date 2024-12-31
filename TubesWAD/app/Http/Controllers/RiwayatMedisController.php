<?php

namespace App\Http\Controllers;

use App\Models\RiwayatMedis;
use App\Models\Pasien;
use Illuminate\Http\Request;

class RiwayatMedisController extends Controller
{
    public function index()
    {
        // Ambil semua riwayat medis beserta pasien
        $riwayatMedis = RiwayatMedis::with('pasien')->get();

        // Ambil semua pasien untuk dropdown atau kebutuhan lain
        $pasiens = Pasien::all();

        return view('riwayatmedis', compact('riwayatMedis', 'pasiens'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pasien_id' => 'required|exists:pasien,id',
            'diagnosa' => 'required|string|max:255',
        ]);

        RiwayatMedis::create($validatedData);

        return redirect()->route('riwayatmedis.index')->with('success', 'Riwayat medis berhasil ditambahkan.');
    }

    public function update(Request $request, RiwayatMedis $riwayatMedis)
    {
        $validatedData = $request->validate([
            'pasien_id' => 'required|exists:pasien,id',
            'diagnosa' => 'required|string|max:255',
        ]);

        $riwayatMedis->update($validatedData);

        return redirect()->route('riwayatmedis.index')->with('success', 'Riwayat medis berhasil diperbarui.');
    }

    public function destroy(RiwayatMedis $riwayatMedis)
    {
        $riwayatMedis->delete();

        return redirect()->route('riwayatmedis.index')->with('success', 'Riwayat medis berhasil dihapus.');
    }
}
