<?php

namespace App\Http\Controllers;

use App\Models\Konsul;
use App\Models\Dokter;
use Illuminate\Http\Request;

class KonsulController extends Controller
{
    // Menampilkan daftar dokter
    public function indexDokter()
    {
        $dokters = Dokter::where('spesialisasi', 'Dokter Umum')->get();
        return view('janji_temu.dokterUmum', compact('dokters'));
    }

    // Menampilkan form untuk menjadwalkan pertemuan
    public function create($dokter_id)
    {
        $dokter = Dokter::findOrFail($dokter_id);
        return view('janji_temu.jadwalkan', compact('dokter'));
    }

    // Menyimpan janji temu
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nip_dokter' => 'required|exists:dokter,nip_dokter',
            'nomor_telepon_pasien' => 'required|string|max:15',
            'waktu_janji' => 'required|date',
            'catatan' => 'nullable|string',
        ]);

        $validatedData['nama_pasien'] = auth()->user()->nama;

        Konsul::create($validatedData);

        return redirect()->route('jadwal.janji_temu.index')->with('success', 'Janji temu berhasil dibuat.');
    }

    // Menampilkan daftar jadwal
    public function indexJadwal()
    {
        // Ambil data konsul untuk pasien yang sedang login
        $konsuls = Konsul::where('nama_pasien', auth()->user()->nama)->with('dokter')->get();
    
        // Pastikan variabel $konsuls ada dan dikirim ke view
        return view('janji_temu.listJadwal', compact('konsuls'));
    }

    // Menampilkan form untuk mengedit jadwal
    public function edit($id)
    {
        $konsul = Konsul::findOrFail($id);

        // Cek apakah jadwal bisa diedit (satu hari sebelum)
        if (now()->diffInDays($konsul->waktu_janji) < 1) {
            return redirect()->route('jadwal.janji_temu.index')->withErrors(['error' => 'Jadwal tidak dapat diedit kurang dari satu hari sebelum waktu janji.']);
        }

        return view('janji_temu.editJadwal', compact('konsul'));
    }

    // Memperbarui jadwal
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nip_dokter' => 'required|exists:dokter,nip_dokter',
            'nama_pasien' => 'required|string|max:255',
            'waktu_janji' => 'required|date',
            'catatan' => 'nullable|string',
        ]);

        $konsul = Konsul::findOrFail($id);
        $konsul->update($validatedData);

        return redirect()->route('jadwal.janji_temu.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    // Menghapus jadwal
    public function destroy($id)
    {
        $konsul = Konsul::findOrFail($id);
        $konsul->delete();

        return redirect()->route('jadwal.janji_temu.index')->with('success', 'Jadwal berhasil dihapus.');
    }

    public function chat($konsul_id)
    {
        $konsul = Konsul::findOrFail($konsul_id);
        return view('janji_temu.chat', compact('konsul'));
    }

    public function sudahiPercakapan($konsul_id)
    {
        $konsul = Konsul::findOrFail($konsul_id);
        $konsul->status = true; // Ubah status menjadi true
        $konsul->save(); // Simpan perubahan

        return redirect()->route('jadwal.janji_temu.index')->with('success', 'Percakapan telah disudahi dan status diubah menjadi done.');
    }
}