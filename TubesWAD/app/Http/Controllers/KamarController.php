<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index()
{
    $kamar = Kamar::all();
    return view('kamar.index', compact('kamar'));
}

public function create()
{
    return view('kamar.create');
}

public function store(Request $request)
{
    Kamar::create($request->validate([
        'nama_kamar' => 'required|string|max:50',
        'tipe_kamar' => 'required|string|max:50',
        'kapasitas' => 'required|integer',
        'status' => 'required|string|max:20',
    ]));
    return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil ditambahkan.');
}

public function edit(Kamar $kamar)
{
    return view('kamar.edit', compact('kamar'));
}

public function update(Request $request, Kamar $kamar)
{
    $kamar->update($request->validate([
        'nama_kamar' => 'required|string|max:50',
        'tipe_kamar' => 'required|string|max:50',
        'kapasitas' => 'required|integer',
        'status' => 'required|string|max:20',
    ]));
    return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil diperbarui.');
}

public function destroy(Kamar $kamar)
{
    $kamar->delete();
    return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil dihapus.');
}

}
