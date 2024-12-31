<?php

namespace App\Http\Controllers;

use App\Models\puskesmasterdekat;
use Illuminate\Http\Request;

class PuskesmasTerdekatController extends Controller
{
    public function index()
    {
        $puskesmas = puskesmasterdekat::all();
        return view('puskesmasterdekat.index', compact('puskesmas'));
    }

    public function create()
    {
        return view('puskesmasterdekat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'telepon' => 'nullable|string|max:15',
        ]);

        puskesmasterdekat::create($request->all());
        return redirect()->route('puskesmasterdekat.index')->with('success', 'Puskesmas berhasil ditambahkan.');
    }

    public function show(puskesmasterdekat $puskesmas)
    {
        return view('puskesmasterdekat.show', compact('puskesmas'));
    }

    public function edit(puskesmasterdekat $puskesmas)
    {
        return view('puskesmasterdekat.edit', compact('puskesmas'));
    }

    public function update(Request $request, puskesmasterdekat $puskesmas)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'telepon' => 'nullable|string|max:15',
        ]);

        $puskesmas->update($validated);
        return redirect()->route('puskesmasterdekat.index')->with('success', 'Puskesmas berhasil diperbarui.');
    }

    public function destroy(puskesmasterdekat $puskesmas)
    {
        $puskesmas->delete();
        return redirect()->route('puskesmasterdekat.index')->with('success', 'Puskesmas berhasil dihapus.');
    }
}
