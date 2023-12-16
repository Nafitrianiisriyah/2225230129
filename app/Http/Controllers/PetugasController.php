<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
class PetugasController extends Controller
{
    public function petugastampil()
    {
        $datapetugas = Petugas::orderby('nama_petugas','ASC')
        ->paginate(5);
        

        return view('halaman/view_petugas', ['petugas'=>$datapetugas]);
    }
      
        public function petugastambah (Request $request)
        {
            $this->validate($request, [
                'nama_petugas' => 'required',
                'no_hp' => 'required',
                
                
            ]);

            Petugas::create([
                'nama_petugas' => $request->nama_petugas,
                'no_hp' => $request->no_hp,
                
            ]);

            return redirect('/petugas');

        }

            
        public function petugashapus($id_petugas)
        {
            $datapetugas=Petugas::find($id_petugas); 
            $datapetugas->delete();
            
            return redirect()->back();

        }

    
        public function petugasedit($id_petugas, Request $request) 
        {
            $this->validate($request, [
                'nama_petugas' => 'required',
                'no_hp' => 'required',
                
            ]);

            $id_petugas = Petugas::find($id_petugas);
            $id_petugas ->nama_petugas = $request->nama_petugas;
            $id_petugas->no_hp = $request->no_hp;
            

            $id_petugas->save();

            return redirect()->back();
        }
}          

