<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\LibroSacramento;
use Illuminate\Http\Request;
use App\Models\Matrimonio;
use App\Models\Sacramento;
use App\Models\Parroquia;
use App\Models\Sacerdote;
use App\Models\Registro;
use App\Models\Persona; 
use App\Models\Parroco;
use Carbon\Carbon;


class MatrimonioController extends Controller
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
    public function store(Request $request){
        $rules = [
            'id_parroquia' => 'required|exists:parroquias,id',
            'libro_sacramento' => [
                'required',
                'unique:libro_sacramentos,numero_libro,NULL,id,folio,' . $request->folio_sacramento . ',partida,' . $request->partida_sacramento . ',id_parroquia,' . $request->id_parroquia . ',num_letra,' . ($request->libro_letra_sacramento ?? 'NULL') . ',letra_partida,' . ($request->letra_partida_sacramento ?? 'NULL') . ',tipo_sacramento,Matrimonio',
            ],
            'id_persona' => 'required|exists:personas,id',
            'capilla' => 'nullable|string',
            'fecha_registro_matrimonio' => 'nullable|date',
            'esposo' => 'nullable|string',
            'esposa' => 'nullable|string',
            'testigo_senor' => 'nullable|string',
            'testigo_senorita' => 'nullable|string',
            'sacerdote' => 'nullable|string',
            'libro_sacramento' => 'required|integer',
            'libro_letra_sacramento' => 'nullable|string',
            'folio_sacramento' => 'required|integer',
            'partida_sacramento' => 'required|integer',
            'letra_partida_sacramento' => 'nullable|string',
            'notas' => 'nullable|string',
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
                'tipo_sacramento' => 'Matrimonio',
                'num_letra' => $request->libro_letra_sacramento,
                'letra_partida' => $request->letra_partida_sacramento,
            ]);
            Log::debug('LibroSacramento created', $libroSacramento->toArray());

            // Crear registro en la tabla sacramentos
            $sacramento = Sacramento::create([
                'persona_id' => $request->id_persona,
                'tipo' => 'Matrimonio',
                'parroquia_id' => $request->id_parroquia,
                'libro_sacramento_id' => $libroSacramento->id,
            ]);
            Log::debug('Sacramento created', $sacramento->toArray());

                
                $matrimonio = Matrimonio::create([
                    'sacramento_id' => $sacramento->id,
                    'registro' => $request->fecha_registro_matrimonio,  
                    'senor' => $request->esposo,
                    'senorita' => $request->esposa,
                    'testigo_senor' => $request->testigo_senor, 
                    'testigo_senorita' => $request->testigo_senorita,
                    'notas' => $request->notas,
                    'celebrante' => $request->sacerdote,
                    'capilla'=> $request->capilla,
                ]);
                Log::debug('Matrimonio created', $matrimonio->toArray());

                // Crear registro en la tabla registros
                $registro = Registro::create([
                    'persona_id' => $request->id_persona,
                    'user_id' => Auth::id(),
                    'sacramento_id' => $sacramento->id,
                ]);
                Log::debug('Registro created', $registro->toArray());
    
                DB::commit();
    
                return redirect()->back()->with('success', 'Se ha registrado con éxito el Sacramento del Matrimonio');
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Error al registrar la confirmación: ' . $e->getMessage(), ['request' => $request->all()]);
                return redirect()->back()->with('error', 'Hubo un problema al procesar la solicitud');
            }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Matrimonio $matrimonio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matrimonio $matrimonio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    try {
        $matrimonio = Matrimonio::find($id);
        if (!$matrimonio) {
            return redirect()->back()->with('error', 'Matrimonio no encontrado');
        }
        $matrimonio->sacramento->libroSacramento->update([
            'numero_libro' => $request->libroSacramento,
            'num_letra' => $request->letra_libro_sacramento,
            'folio' => $request->folioSacramento,
            'partida' => $request->partidaSacramento,
            'letra_partida' => $request->partida_letra_sacramento,
        ]);

        // Actualizar la Confirmación
        $matrimonio->update([
            'registro' => $request->fecha_registro,
            'senor' => $request->senor,
            'senorita' => $request->senorita,
            'testigo_senor' => $request->testigo_senor,
            'testigo_senorita' => $request->testigo_senorita,
            'notas' => $request->notas,
            'celebrante' => $request->celebrante,
            'capilla'=>$request->capilla,
        ]);

        return redirect()->back()->with('success', 'Se ha actualizado con éxito el Sacramento del Matrimonio');
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
                    if($sacramento->matrimonio){
                        $sacramento->matrimonio()->delete();
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
            return redirect()->route('personas.info')->with('error', 'Error al eliminar el Bautismo');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('personas.info', ['id' => $id])->with('success', 'Confirmación eliminada correctamente');
        }
    }

}
