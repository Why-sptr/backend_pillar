<?php

namespace App\Http\Controllers;

use App\Models\TambahOngkir;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $pillar = TambahOngkir::where('asal', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $pillar = TambahOngkir::with('tujuan')->paginate(5);
        }
        return view('home', ['pillar' => $pillar]);
    }
}
