<?php

namespace App\Http\Controllers;

use App\Models\rujukanterdekat;
use Illuminate\Http\Request;
use App\Models\rujukanterdekat as Rujukan;

class RujukanController extends Controller
{
    public function index(Request $request)
    {
         
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        $rujukan = Rujukan::selectRaw("*, ( 6371 * acos( cos( radians(?) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(?) ) + sin( radians(?) ) * sin( radians( latitude ) ) ) ) AS distance", [$latitude, $longitude, $latitude])
            ->having("distance", "<", 10) 
            ->orderBy("distance")
            ->get();

        return view('rujukan.index', compact('rujukan'));
    }
}
