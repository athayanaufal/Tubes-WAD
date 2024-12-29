<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Pasien;
use Illuminate\Http\Request;

class MilihKamarController extends Controller
{
    public function index()
    {
        $kamarTersedia = Kamar::where('status', 'tersedia')->get();

        return view('pemilihan_kamar.index', compact('kamarTersedia'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'kamar_id' => 'required|exists:kamars,id',
        ]);

        $kamar = Kamar::findOrFail($validatedData['kamar_id']);
        
        if ($kamar->status !== 'tersedia') {
            return back()->with('error', 'Kamar yang dipilih tidak tersedia.');
        }

        $pasien = Pasien::findOrFail($validatedData['pasien_id']);
        
        $kamar->update(['status' => 'digunakan']);

        $pasien->update(['kamar_id' => $kamar->id]);

        return redirect()->route('pemilihan_kamar.index')
            ->with('success', 'Kamar berhasil dipilih untuk pasien.');
    }
}
