<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Pasien;
use Illuminate\Http\Request;

class MilihKamarController extends Controller
{
    public function index()
    {
        // Menampilkan daftar kamar yang tersedia
        $kamarTersedia = Kamar::where('status', 'tersedia')->get();

        return view('pemilihan_kamar.index', compact('kamarTersedia'));
    }

    public function pilihKamar(Request $request, $pasien_id)
    {
        $request->validate([
            'kamar_id' => 'required|exists:kamar,id',
        ]);

        // Cari kamar yang dipilih
        $kamar = Kamar::findOrFail($request->kamar_id);

        if ($kamar->status !== 'tersedia') {
            return back()->with('error', 'Kamar yang dipilih tidak tersedia.');
        }

        // Update status kamar menjadi "digunakan"
        $kamar->update(['status' => 'digunakan']);

        // Update pasien dengan kamar yang dipilih
        $pasien = Pasien::findOrFail($pasien_id);
        $pasien->update(['kamar_id' => $kamar->id]);

        return redirect()->route('pemilihan_kamar.index')
            ->with('success', 'Kamar berhasil dipilih.');
    }
}
