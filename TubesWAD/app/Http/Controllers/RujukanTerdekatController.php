<?php

namespace App\Http\Controllers;

use App\Models\rujukanterdekat;
use Illuminate\Http\Request;
use App\Models\rujukanterdekat as Rujukan;

class RujukanTerdekatController extends Controller
{
    public function index(Request $request)
    {
        $rujukan = rujukanterdekat::all();
        return view('rujukanterdekat.index', compact('rujukan'));
    }

    public function create()
    {
        return view('rujukanterdekat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis_layanan' => 'required|numeric',
            'telepon' => 'nullable|string|max:15',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        rujukanterdekat::create($request->all());
        return redirect()->route('rujukanterdekat.index')->with('success', 'Rujukan berhasil ditambahkan.');
    }

    public function show(rujukanterdekat $rujukan)
    {
        return view('rujukanterdekat.show', compact('rujukan'));
    }

    public function edit(rujukanterdekat $rujukan)
    {
        return view('rujukanterdekat.edit', compact('rujukan'));
    }

    public function update(Request $request, rujukanterdekat $rujukan)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis_layanan' => 'required|numeric',
            'telepon' => 'nullable|string|max:15',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $rujukan->update($validated);
        return redirect()->route('rujukanterdekat.index')->with('success', 'rujukan berhasil diperbarui.');
    }

    public function destroy(rujukanterdekat $rujukan)
    {
        $rujukan->delete();
        return redirect()->route('rujukanterdekat.index')->with('success', 'rujukan berhasil dihapus.');
    }
}
