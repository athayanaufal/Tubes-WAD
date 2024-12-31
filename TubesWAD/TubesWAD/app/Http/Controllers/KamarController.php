<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Pasien;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index()
    {
        // Ambil semua kamar, tidak hanya yang tersedia
        $semuaKamar = Kamar::all();
        $pasiens = Pasien::whereNull('kamar_id')->get();
        
        // Ambil kamar yang masih tersedia untuk dropdown
        $kamarTersedia = $semuaKamar->where('status', 'tersedia');
        
        if ($pasiens->isEmpty()) {
            return view('pilihkamar', [
                'semuaKamar' => $semuaKamar,
                'kamarTersedia' => $kamarTersedia,
                'pasiens' => $pasiens
            ])->with('error', 'Tidak ada pasien yang perlu kamar');
        }
        
        return view('pilihkamar', [
            'semuaKamar' => $semuaKamar,
            'kamarTersedia' => $kamarTersedia,
            'pasiens' => $pasiens
        ]);
    }

    public function create()
    {
        return view('kamar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kamar' => 'required|string|max:50',
            'tipe_kamar' => 'required|string|max:50',
            'kapasitas' => 'required|integer',
            'status' => 'required|string|max:20',
        ]);

        Kamar::create($request->all());
        return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil ditambahkan.');
    }

    public function edit(Kamar $kamar)
    {
        return view('kamar.edit', compact('kamar'));
    }

    public function update(Request $request, Kamar $kamar)
    {
        $request->validate([
            'nama_kamar' => 'required|string|max:50',
            'tipe_kamar' => 'required|string|max:50',
            'kapasitas' => 'required|integer',
            'status' => 'required|string|max:20',
        ]);

        $kamar->update($request->all());
        return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil diperbarui.');
    }

    public function destroy(Kamar $kamar)
    {
        $kamar->delete();
        return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil dihapus.');
    }

    public function assignKamar(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'pasien_id' => 'required|exists:pasien,id',
            'kamar_id' => 'required|exists:kamar,id',
        ]);

        // Cari kamar yang dipilih
        $kamar = Kamar::findOrFail($validatedData['kamar_id']);
        
        // Pastikan kamar tersedia dan masih ada kapasitas
        if ($kamar->status !== 'tersedia' || $kamar->kapasitas <= 0) {
            return back()->with('error', 'Kamar yang dipilih tidak tersedia atau sudah penuh.');
        }

        // Cari pasien
        $pasien = Pasien::findOrFail($validatedData['pasien_id']);
        
        // Update kapasitas kamar
        $newKapasitas = $kamar->kapasitas - 1;
        $newStatus = $newKapasitas > 0 ? 'tersedia' : 'penuh';
        
        $kamar->update([
            'kapasitas' => $newKapasitas,
            'status' => $newStatus
        ]);

        // Update data pasien dengan kamar yang dipilih
        $pasien->update(['kamar_id' => $kamar->id]);

        return redirect()->route('pilihkamar.index')
            ->with('success', 'Kamar berhasil dipilih untuk pasien.');
    }
}
