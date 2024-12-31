<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua notifikasi
        $notifikasi = Notifikasi::all();
        return response()->json($notifikasi); // Mengembalikan notifikasi dalam format JSON
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk membuat notifikasi (Jika menggunakan view)
        return view('notifikasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input request
        $validated = $request->validate([
            'pesan' => 'required|string|max:255',
            'type' => 'nullable|string',
            'notifiable_id' => 'required|integer',
            'notifiable_type' => 'required|string',
        ]);

        // Membuat notifikasi baru
        $notifikasi = Notifikasi::create([
            'pesan' => $validated['pesan'],
            'type' => $validated['type'],
            'notifiable_id' => $validated['notifiable_id'],
            'notifiable_type' => $validated['notifiable_type'],
        ]);

        // Menyimpan notifikasi ke database
        return response()->json($notifikasi, 201); // Mengembalikan respons JSON
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Menampilkan notifikasi berdasarkan ID
        $notifikasi = Notifikasi::find($id);

        if (!$notifikasi) {
            return response()->json(['message' => 'Notifikasi tidak ditemukan'], 404);
        }

        return response()->json($notifikasi);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Menampilkan form untuk mengedit notifikasi (Jika menggunakan view)
        $notifikasi = Notifikasi::find($id);

        if (!$notifikasi) {
            return response()->json(['message' => 'Notifikasi tidak ditemukan'], 404);
        }

        return view('notifikasi.edit', compact('notifikasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input request
        $validated = $request->validate([
            'pesan' => 'required|string|max:255',
            'type' => 'nullable|string',
            'notifiable_id' => 'required|integer',
            'notifiable_type' => 'required|string',
        ]);

        // Mencari notifikasi berdasarkan ID
        $notifikasi = Notifikasi::find($id);

        if (!$notifikasi) {
            return response()->json(['message' => 'Notifikasi tidak ditemukan'], 404);
        }

        // Memperbarui notifikasi
        $notifikasi->update([
            'pesan' => $validated['pesan'],
            'type' => $validated['type'],
            'notifiable_id' => $validated['notifiable_id'],
            'notifiable_type' => $validated['notifiable_type'],
        ]);

        return response()->json($notifikasi); // Mengembalikan notifikasi yang diperbarui
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Mencari notifikasi berdasarkan ID
        $notifikasi = Notifikasi::find($id);

        if (!$notifikasi) {
            return response()->json(['message' => 'Notifikasi tidak ditemukan'], 404);
        }

        // Menghapus notifikasi
        $notifikasi->delete();

        return response()->json(['message' => 'Notifikasi berhasil dihapus']);
    }
}
