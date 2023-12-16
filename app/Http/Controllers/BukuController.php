<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function bukutampil()
    {
        $databuku = Buku::orderby('kode_buku','ASC')
        ->paginate(5);

        return view('halaman/view_buku', ['buku'=>$databuku]);
    }

    public function bukutambah(Request $request)
    {
        $this->validate($request, [
            'kode_buku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'kategori' => 'required'
        ]);

        Buku::create([
            'kode_buku' => $request->kode_buku,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'kategori' => $request->kategori
        ]);

        return redirect('/buku');
    }

    public function bukuhapus($id_buku)
    {
        $databuku = Buku::find($id_buku);
        $databuku->delete();

        return redirect()->back();
    }

    public function bukuedit($id_buku, Request $request)
    {
        $this->validate($request,[
            'kode_buku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'kategori' => 'required'
        ]);

        $buku = Buku::find($id_buku);
        $buku->kode_buku = $request->kode_buku;
        $buku->judul = $request->judul;
        $buku->pengarang = $request->pengarang;
        $buku->kategori = $request->kategori;

        $buku->save();
        return redirect()->back();
    }
}
