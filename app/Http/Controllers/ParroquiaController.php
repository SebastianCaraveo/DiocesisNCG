<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Agrega el uso de Validator
use App\Models\Parroquia;
use App\Models\Parroco;
use App\Models\Sacerdote; // Asegúrate de importar el modelo Sacerdote

class ParroquiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parrocos = Parroco::all();
        $parroquias = Parroquia::with('parroco')->get();
        /* dd($parroquias); */

        return view('admin.churchadmin', compact('parrocos', 'parroquias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nombre_parroquia' => 'required',
            'direccion_parroquia' => 'required',
            'municipio_parroquia' => 'required',
            'ubicacion_parroquia' => 'required',
            'telefono_parroquia' => 'required', 
            'horario_parroquia' => 'required', 
            'id_parroco' => 'required',
        ]);

        $parroquia = Parroquia::create([
            'nombre' => $request->nombre_parroquia,
            'direccion' => $request->direccion_parroquia,
            'municipio' => $request->municipio_parroquia,
            'ubicacion' => $request->ubicacion_parroquia,
            'telefono' => $request->telefono_parroquia,
            'horario' => $request->horario_parroquia,
            'id_parroco' => $request->id_parroco,
        ]);

        return redirect()->route('church.index')->with('success', 'Parroquia creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parroquia $parroquia)
    {

        return view('admin.components.modalEchurch', ['parroquia'=> $parroquia]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parroquia $parroquia)
    {
        $request -> validate([
            'nombre_parroquia' => 'required',
            'direccion_parroquia' => 'required',
            'municipio_parroquia' => 'required',
            'ubicacion_parroquia' => 'required',
            'telefono_parroquia' => 'required',
            'horario_parroquia' => 'required',
            'id_parroco' => 'required',
        ]);    

        $parroquia -> update([
            'nombre'=> $request -> nombre_parroquia,
            'direccion' => $request -> direccion_parroquia,
            'municipio' => $request -> municipio_parroquia,
            'ubicacion' => $request -> ubicacion_parroquia,
            'telefono' => $request -> telefono_parroquia,
            'horario' => $request -> horario_parroquia,
            'id_parroco' => $request -> id_parroco,
        ]);

        return redirect()->route('church.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parroquia $parroquia)
    {
        $parroquia -> delete();

        return redirect()->route('church.index');
    }
}
