<?php

namespace App\Http\Controllers;

use App\Models\TambahOngkir;
use App\Models\Tujuan;
use Illuminate\Http\Request;

class TambahOngkirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $pillar = TambahOngkir::where('asal', 'LIKE', '%' . $request->search . '%')
                ->orderBy('asal', 'asc')
                ->get();
        } else {
            $pillar = TambahOngkir::with('tujuan')
                ->orderBy('asal', 'asc')
                ->get();
        }
        
        return view('home', ['pillar' => $pillar]);
    }
    

    public function index2()
    {
        $pillar = TambahOngkir::all();
        return response()->json([
            'status' => "success",
            "data" => $pillar,
        ]);
    }



    public function tambahongkir()
    {
        $pillar = Tujuan::all();
        return view('tambahdataongkir', compact('pillar'));
    }

    public function insertOngkir(Request $request)
    {
        $this->validate($request, [
            'asal' => 'required',
            'ongkir' => 'required',
        ]);
        $pillar =  TambahOngkir::create($request->all());
        $pillar->save();

        return redirect()->route('home')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function tampil($id)
    {

        $pillar = TambahOngkir::find($id);
        return view('tampilkanongkir', compact('pillar'));
    }

    public function updatedataongkir(Request $request, $id)
    {
        $this->validate($request, [

            'asal' => 'required',
            'ongkir' => 'required',
        ]);
        $pillar = TambahOngkir::find($id);
        $pillar->update($request->all());

        $pillar->save();

        return redirect()->route('home')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $pillar = TambahOngkir::find($id);
        $pillar->delete();
        return redirect()->route('home')->with('success', 'Data Berhasil Di Hapus');
    }

    public function trash(Request $request)
    {
        // mengampil data guru yang sudah dihapus
        if ($request->has('search')) {
            $pillar = TambahOngkir::where('asal', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $pillar = TambahOngkir::onlyTrashed()->get();
        }
        return view('trashongkir', ['pillar' => $pillar]);
    }

    public function restoreongkir($id)
    {
        $pillar = TambahOngkir::onlyTrashed()->where('id', $id);
        $pillar->restore();
        return redirect()->route('home')->with('success', 'Data Berhasil Di Restore');
    }

    public function restoreongkirall()
    {

        $pillar = TambahOngkir::onlyTrashed();
        $pillar->restore();

        return redirect()->route('home')->with('success', 'Data Berhasil Di Restore');
    }

    public function hapuspermanenongkir($id)
    {
        // hapus permanen data guru
        $pillar = TambahOngkir::onlyTrashed()->where('id', $id);
        $pillar->forceDelete();

        return redirect()->route('trashongkir')->with('success', 'Data Berhasil Di Hapus Permanen');
    }

    public function hapuspermanenguruall()
    {
        // hapus permanen semua data guru yang sudah dihapus
        $pillar = TambahOngkir::onlyTrashed();
        $pillar->forceDelete();

        return redirect()->route('trashongkir')->with('success', 'Data Berhasil Di Hapus Permanen Semua');
    }

    public function kudus(Request $request)
    {
        if ($request->has('search')) {
            $pillar = TambahOngkir::with('tujuan')->where('tujuan_id', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $pillar = TambahOngkir::with('tujuan')->where('asal', 'LIKE', 'kudus')->get();
        }
        return view('home', ['pillar' => $pillar]);
    }

    public function pati(Request $request)
    {
        if ($request->has('search')) {
            $pillar = TambahOngkir::with('tujuan')->where('asal', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $pillar = TambahOngkir::with('tujuan')->where('asal', 'LIKE', 'pati')->get();
        }
        return view('home', ['pillar' => $pillar]);
    }

    public function demak(Request $request)
    {
        if ($request->has('search')) {
            $pillar = TambahOngkir::with('tujuan')->where('asal', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $pillar = TambahOngkir::with('tujuan')->where('asal', 'LIKE', 'demak')->get();
        }
        return view('home', ['pillar' => $pillar]);
    }

    public function semarang(Request $request)
    {
        if ($request->has('search')) {
            $pillar = TambahOngkir::with('tujuan')->where('asal', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $pillar = TambahOngkir::with('tujuan')->where('asal', 'LIKE', 'semarang')->get();
        }
        return view('home', ['pillar' => $pillar]);
    }

    public function rembang(Request $request)
    {
        if ($request->has('search')) {
            $pillar = TambahOngkir::with('tujuan')->where('asal', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $pillar = TambahOngkir::with('tujuan')->where('asal', 'LIKE', 'rembang')->get();
        }
        return view('home', ['pillar' => $pillar]);
    }
}
