<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\LibroSacramento;
use App\Models\Sacramento;
use App\Models\Parroquia;
use App\Models\Comunion;
use App\Models\Registro;
use App\Models\Persona;
use App\Models\Parroco;


class ComunionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Definir reglas de validación
        $rules = [
            'id_parroquia' => 'required|exists:parroquias,id',
            'libro_sacramento' => [
                'required',
                'unique:libro_sacramentos,numero_libro,NULL,id,folio,' . $request->folio_sacramento . ',partida,' . $request->partida_sacramento . ',id_parroquia,' . $request->id_parroquia . ',num_letra,' . ($request->libro_letra_sacramento ?? 'NULL') . ',letra_partida,' . ($request->letra_partida_sacramento ?? 'NULL') . ',tipo_sacramento,Comunion',
            ],
            'id_persona' => 'required|exists:personas,id',
            'capilla' => 'nullable|string|max:255',
            'fecha_registro_comunion' => 'nullable|date',
            'padrino_comunion' => 'required|string|max:255',
            'madrina_comunion' => 'required|string|max:255',
            'parroquia_bautizado' => 'nullable|string|max:255',
            'municipio_bautizado' => 'nullable|string|max:255',
            'fecha_bautizado' => 'nullable|date',
            'libro_sacramento_bautismo' => 'nullable|integer',
            'libro_sacramento_letra_bautismo' => 'nullable|string|max:10',
            'folio_sacramento_bautismo' => 'nullable|integer',
            'partida_sacramento_bautismo' => 'nullable|integer',
            'partida_letra_sacramento_bautismo' => 'nullable|string|max:10',
            'libro_letra_sacramento' => 'nullable|string|max:10',
            'folio_sacramento' => 'required|integer',
            'partida_sacramento' => 'required|integer',
            'letra_partida_sacramento' => 'nullable|string|max:10',
            'sacerdote' => 'required|string|max:255',
            'notas' => 'nullable|string|max:255',
        ];
    
        // Validar la solicitud
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            Log::warning('Validation failed', ['errors' => $validator->errors(), 'request' => $request->all()]);
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        DB::beginTransaction();
    
        try {
            // Crear registro en la tabla libro_sacramentos
            $libroSacramento = LibroSacramento::create([
                'id_parroquia' => $request->id_parroquia,
                'numero_libro' => $request->libro_sacramento,
                'folio' => $request->folio_sacramento,
                'partida' => $request->partida_sacramento,
                'tipo_sacramento' => 'Comunion',
                'num_letra' => $request->libro_letra_sacramento,
                'letra_partida' => $request->letra_partida_sacramento,
            ]);
            Log::debug('LibroSacramento created', $libroSacramento->toArray());
    
            // Crear registro en la tabla sacramentos
            $sacramento = Sacramento::create([
                'persona_id' => $request->id_persona,
                'tipo' => 'Comunion',
                'parroquia_id' => $request->id_parroquia,
                'libro_sacramento_id' => $libroSacramento->id,
            ]);
            Log::debug('Sacramento created', $sacramento->toArray());
    
            // Crear registro en la tabla comuniones
            $comunion = Comunion::create([
                'sacramento_id' => $sacramento->id,
                'registro' => $request->fecha_registro_comunion,
                'padrino' => $request->padrino_comunion,
                'madrina' => $request->madrina_comunion,
                'bautismo' => $request->parroquia_bautizado,
                'lugar_bautismo' => $request->municipio_bautizado,
                'fecha_bautismo' => $request->fecha_bautizado,
                'num_lib_bautismo' => $request->libro_sacramento_bautismo,
                'num_lib_letra_bautismo' => $request->libro_sacramento_letra_bautismo,
                'folio_bautismo' => $request->folio_sacramento_bautismo,
                'partida_bautismo' => $request->partida_sacramento_bautismo,
                'letra_partida_bautismo' => $request->partida_letra_sacramento_bautismo,
                'capilla' => $request->capilla,
                'celebrante' => $request->sacerdote,
                'notas' => $request->notas,
            ]);
            Log::debug('Comunion created', $comunion->toArray());
    
            // Crear registro en la tabla registros
            $registro = Registro::create([
                'persona_id' => $request->id_persona,
                'user_id' => Auth::id(),
                'sacramento_id' => $sacramento->id,
            ]);
            Log::debug('Registro created', $registro->toArray());
    
            DB::commit();
    
            return redirect()->back()->with('success', 'Se ha registrado con éxito el Sacramento de la Comunión');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al registrar la comunión: ' . $e->getMessage(), ['request' => $request->all()]);
            return redirect()->back()->with('error', 'Hubo un problema al procesar la solicitud');
        }
    }
    






    /**
     * Display the specified resource.
     */
    public function show(Comunion $comunion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comunion $comunion)
    {      //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    try {
        // Obtener la Comunión existente para actualizar
        $comunion = Comunion::find($id);

        // Verificar si la Comunión existe
        if (!$comunion) {
            return redirect()->back()->with('error', 'Comunión no encontrada');
        }

        // Actualizar el Libro de Sacramento si es necesario
        $libroSacramento = $comunion->sacramento->libroSacramento;
        $libroSacramento->numero_libro = $request->libro_sacramento;
        $libroSacramento->num_letra = $request->libro_letra_sacramento;
        $libroSacramento->folio = $request->folio_sacramento;
        $libroSacramento->partida = $request->partida_sacramento;
        $libroSacramento->letra_partida = $request->letra_partida_sacramento;
        $libroSacramento->save();

        // Actualizar la Comunión
        $comunion->registro = $request->fecha_registro_comunion;
        $comunion->capilla = $request->capilla;
        $comunion->padrino = $request->padrino_comunion;
        $comunion->madrina = $request->madrina_comunion;
        $comunion->bautismo = $request->parroquia_bautizado;
        $comunion->lugar_bautismo = $request->municipio_bautismo;
        $comunion->fecha_bautismo = $request->fecha_bautismo;
        $comunion->num_lib_bautismo = $request->numero_libro_bautismo;
        $comunion->num_lib_letra_bautismo = $request->numero_letra_libro_bautismo;
        $comunion->folio_bautismo = $request->folio_bautismo;
        $comunion->partida_bautismo = $request->partida_bautismo;
        $comunion->letra_partida_bautismo = $request->letra_partida_bautismo;
        $comunion->celebrante = $request->sacerdote;
        $comunion->notas = $request->notas;
        $comunion->save();

        return redirect()->back()->with('success', 'Se ha actualizado con éxito el Sacramento de la Comunión');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Hubo un problema al procesar la solicitud');
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $persona = Persona::findOrFail($id);

        // Iniciar una transacción para asegurar la consistencia de la base de datos
        DB::beginTransaction();

        try {
            // Verificar si la persona tiene sacramentos
            if ($persona->sacramentos->isNotEmpty()) {
                foreach ($persona->sacramentos as $sacramento) {
                    if($sacramento->comunion){
                        $sacramento->comunion()->delete();
                        $sacramento->delete();
                        if ($sacramento->libroSacramento) {
                            // Eliminar el registro de LibroSacramento
                            $sacramento->libroSacramento->delete();
                        }
                    }
                    
                }
            }
            // Confirmar la transacción si todo fue exitoso
            DB::commit();

            return redirect()->route('personas.info')->with('error', 'Error al eliminar la Priemra Comunión');
        } catch (\Exception $e) {
            
            DB::rollback();

            return redirect()->route('personas.info', ['id' => $id])->with('success', 'Primera Comunión eliminada correctamente');

        }
    }
}
