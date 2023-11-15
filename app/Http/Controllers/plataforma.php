<?php

namespace App\Http\Controllers;

use App\Models\Lugare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        


        $lugar = Lugare::findOrFail($id);


        $lugar->nombre = $request->nombre;
        $lugar->categoria = $request->categoria;


        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('public/lugares');
            $lugar->imagen = basename($imagenPath);
        }


        $lugar->save();


        return redirect('/');
    }

    public function destroy($id){
                $lugar = Lugare::find($id);

                if (!$lugar) {
                    return response()->json(['error' => 'Lugar no encontrado'], 404);
                }

                // Elimina la imagen asociada
                if ($lugar->imagen) {
                    Storage::delete('public/lugares/' . $lugar->imagen);
                }

                // Elimina el lugar
                $lugar->delete();

                return response()->json(['message' => 'Lugar eliminado correctamente']);
    }

    public function create(){
        return view('Create');
    }

    public function Process(Request $request)
    {
        try {
            // Validación de datos
            $request->validate([
                'nombre' => 'required|string',
                'categoria' => 'required|string',
                'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            $lugar = new Lugare();
    

            $lugar->nombre = $request->nombre;
            $lugar->categoria = $request->categoria;
    

            if ($request->hasFile('imagen')) {
                $imagenPath = $request->file('imagen')->store('public/lugares');
                $lugar->imagen = basename($imagenPath);
            }
    

            $lugar->save();
    
            return redirect('/')->with('success', 'Registro creado exitosamente.');
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Error al crear el registro: ' . $e->getMessage());
        }
    }


    
}
