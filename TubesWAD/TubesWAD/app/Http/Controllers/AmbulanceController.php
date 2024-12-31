<?php

namespace App\Http\Controllers;

use App\Models\Ambulance;
use Illuminate\Http\Request;

class AmbulanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ambulances = Ambulance::with('pasien')->get();  
        return view('ambulance.index', compact('ambulances'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk membuat ambulans baru (Jika menggunakan view)
        return view('ambulance.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input request
        $validated = $request->validate([
            'kode_mobil' => 'required|string|max:255|unique:ambulances', 
            'nip_supir' => 'required|integer',
            'nik_pasien' => 'nullable|integer',
        ]);

        // Membuat ambulans baru
        $ambulance = Ambulance::create([
            'kode_mobil' => $validated['kode_mobil'],
            'nip_supir' => $validated['nip_supir'],
            'nik_pasien' => $validated['nik_pasien'] ?? null,
        ]);

        return response()->json($ambulance, 201); // Mengembalikan ambulans yang baru dibuat
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Menampilkan ambulans berdasarkan ID
        $ambulance = Ambulance::find($id);

        if (!$ambulance) {
            return response()->json(['message' => 'Ambulans tidak ditemukan'], 404);
        }

        return response()->json($ambulance);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Menampilkan form untuk mengedit ambulans (Jika menggunakan view)
        $ambulance = Ambulance::find($id);

        if (!$ambulance) {
            return response()->json(['message' => 'Ambulans tidak ditemukan'], 404);
        }

        return view('ambulance.edit', compact('ambulance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input request
        $validated = $request->validate([
            'kode_mobil' => 'required|string|max:255|unique:ambulances,kode_mobil,' . $id, 
            'nip_supir' => 'required|integer',
            'nik_pasien' => 'nullable|integer',
        ]);

        // Mencari ambulans berdasarkan ID
        $ambulance = Ambulance::find($id);

        if (!$ambulance) {
            return response()->json(['message' => 'Ambulans tidak ditemukan'], 404);
        }

        // Memperbarui data ambulans
        $ambulance->update([
            'kode_mobil' => $validated['kode_mobil'],
            'nip_supir' => $validated['nip_supir'],
            'nik_pasien' => $validated['nik_pasien'] ?? null,
        ]);

        return response()->json($ambulance); // Mengembalikan ambulans yang diperbarui
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Mencari ambulans berdasarkan ID
        $ambulance = Ambulance::find($id);

        if (!$ambulance) {
            return response()->json(['message' => 'Ambulans tidak ditemukan'], 404);
        }

        // Menghapus ambulans
        $ambulance->delete();

        return response()->json(['message' => 'Ambulans berhasil dihapus']);
    }
}
