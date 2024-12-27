<?php

namespace App\Http\Controllers;

use App\Models\JanjiTemu;
use App\Models\Dokter;

use Illuminate\Http\Request;

class JanjiTemuController extends Controller
{
    public function index()
    {
        $janjiTemus = JanjiTemu::with('dokter')->get();
        return view('janji_temu.index', compact('janjiTemus'));
    }

    public function create()
    {
        $dokters = Dokter::all();
        return view('janji_temu.create', compact('dokters'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'dokter_id' => 'required|exists:dokter,id',
            'nama_pasien' => 'required|string|max:255',
            'nomor_telepon_pasien' => 'required|string|max:15',
            'waktu_janji' => 'required|date',
            'catatan' => 'nullable|string',
        ]);

        JanjiTemu::create($validatedData);
        return redirect()->route('janji_temu.index')->with('success', 'Janji temu berhasil dibuat.');
    }

    public function show(JanjiTemu $janjiTemu)
    {
        return view('janji_temu.show', compact('janjiTemu'));
    }

    public function edit(JanjiTemu $janjiTemu)
    {
        $dokters = Dokter::all();
        return view('janji_temu.edit', compact('janjiTemu', 'dokters'));
    }

    public function update(Request $request, JanjiTemu $janjiTemu)
    {
        $validatedData = $request->validate([
            'dokter_id' => 'required|exists:dokter,id',
            'nama_pasien' => 'required|string|max:255',
            'nomor_telepon_pasien' => 'required|string|max:15',
            'waktu_janji' => 'required|date',
            'catatan' => 'nullable|string',
        ]);

        $janjiTemu->update($validatedData);
        return redirect()->route('janji_temu.index')->with('success', 'Janji temu berhasil diperbarui.');
    }

    public function destroy(JanjiTemu $janjiTemu)
    {
        $janjiTemu->delete();
        return redirect()->route('janji_temu.index')->with('success', 'Janji temu berhasil dihapus.');
    }
}
