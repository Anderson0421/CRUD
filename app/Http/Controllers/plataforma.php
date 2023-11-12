<?php

namespace App\Http\Controllers;

use App\Models\Lugare;
use Illuminate\Http\Request;

class plataforma extends Controller
{
    public function List(){
        $lugares = Lugare::all();
        return view('List')->with('lugares',$lugares);
    }

    public function edit($id) {
        $lugar = Lugare::find($id);
    
        return view('Edit')->with('lugar', $lugar);
    }

    public function update(Request $request, $id) {
        $lugar = Lugare::find($id);
    
        if (!$lugar) {
            return redirect()->back()->with('error', 'El lugar no existe.');
        }
        
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('img');
            $lugar->update([
                'imagen' => $imagenPath,
            ]);
        }
        $lugar->update([
            'nombre' => $request->nombre,
            'categoria' => $request->categoria,
            'oferta' => $request->oferta,
        ]);
    
        return redirect('/');
    }
    
    
}
