<?php

namespace App\Http\Controllers;

use App\Models\puskesmasterdekat;
use Illuminate\Http\Request;
use App\Models\puskesmasterdekat as Puskesmas;

class PuskesmasTerdekatController extends Controller
{
    public function index()
    {
        $puskesmas = Puskesmas::all();
        return view('puskesmas.index', compact('puskesmas'));
    }

    public function create()
    {
        return view('puskesmas.create');
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

        Puskesmas::create($request->all());
        return redirect()->route('puskesmas.index')->with('success', 'Puskesmas berhasil ditambahkan.');
    }

    public function show(Puskesmas $puskesmas)
    {
        return view('puskesmas.show', compact('puskesmas'));
    }

    public function edit(Puskesmas $puskesmas)
    {
        return view('puskesmas.edit', compact('puskesmas'));
    }

    public function update(Request $request, Puskesmas $puskesmas)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'telepon' => 'nullable|string|max:15',
        ]);

        $puskesmas->update($request->all());
        return redirect()->route('puskesmas.index')->with('success', 'Puskesmas berhasil diperbarui.');
    }

    public function destroy(Puskesmas $puskesmas)
    {
        $puskesmas->delete();
        return redirect()->route('puskesmas.index')->with('success', 'Puskesmas berhasil dihapus.');
    }
    public function search(Request $request)
{
    $latitude = $request->input('latitude');
    $longitude = $request->input('longitude');
    
    
    $puskesmas = Puskesmas::select('*')
        ->selectRaw('(
            6371 * acos(
                cos(radians(?)) * 
                cos(radians(latitude)) * 
                cos(radians(?) - radians(longitude)) + 
                sin(radians(?)) * 
                sin(radians(latitude))
            )
        ) AS distance', [$latitude, $longitude, $latitude])
        ->orderBy('distance')
        ->get();

    return view('puskesmas.index', compact('puskesmas'));
}
}
