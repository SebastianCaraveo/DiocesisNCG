<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\LibroSacramento;
use App\Models\Confirmacion;
use App\Models\Sacramento;
use App\Models\Sacerdote;
use App\Models\Parroquia;
use App\Models\Registro;
use App\Models\Persona;
use App\Models\Parroco;


class ConfirmacionController extends Controller
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
                'unique:libro_sacramentos,numero_libro,NULL,id,folio,' . $request->folio_sacramento . ',partida,' . $request->partida_sacramento . ',id_parroquia,' . $request->id_parroquia . ',num_letra,' . ($request->libro_letra_sacramento ?? 'NULL') . ',letra_partida,' . ($request->letra_partida_sacramento ?? 'NULL') . ',tipo_sacramento,Confirmacion',
            ],
            'id_persona' => 'required|exists:personas,id',
            'parroquia_bautismo' => 'nullable|string|max:255',
            'municipio_bautismo' => 'nullable|string|max:255',
            'fecha_bautismo' => 'nullable|date',
            'numero_libro_bautismo' => 'nullable|integer',
            'letra_libro_bautismo' => 'nullable|string|max:10',
            'folio_bautismo' => 'nullable|integer',
            'partida_bautismo' => 'nullable|integer',
            'partida_letra_bautismo' => 'nullable|string|max:10',
            'capilla' => 'nullable|string|max:255',
            'fecha_registro_confirmacion' => 'nullable|date',
            'padrinos' => 'nullable|string|max:255',
            'sacerdote' => 'nullable|string|max:255',
            'libro_letra_sacramento' => 'nullable|string|max:10',
            'folio_sacramento' => 'required|integer',
            'partida_sacramento' => 'required|integer',
            'letra_partida_sacramento' => 'nullable|string|max:10',
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
            // Verificar si ya existe un libro de sacramentos con las mismas características
            $existingLibroSacramento = LibroSacramento::where([
                'numero_libro' => $request->libro_sacramento,
                'folio' => $request->folio_sacramento,
                'partida' => $request->partida_sacramento,
                'id_parroquia' => $request->id_parroquia,
                'num_letra' => $request->libro_letra_sacramento ?? null,
                'letra_partida' => $request->letra_partida_sacramento ?? null,
                'tipo_sacramento' => 'Confirmacion',
            ])->first();

            if ($existingLibroSacramento) {
                // Si el libro de sacramentos ya existe, no se crea uno nuevo
                $libroSacramento = $existingLibroSacramento;
            } else {
                // Crear registro en la tabla libro_sacramentos
                $libroSacramento = LibroSacramento::create([
                    'id_parroquia' => $request->id_parroquia,
                    'numero_libro' => $request->libro_sacramento,
                    'folio' => $request->folio_sacramento,
                    'partida' => $request->partida_sacramento,
                    'tipo_sacramento' => 'Confirmacion',
                    'num_letra' => $request->libro_letra_sacramento,
                    'letra_partida' => $request->letra_partida_sacramento,
                ]);
                Log::debug('LibroSacramento created', $libroSacramento->toArray());
            }

            // Crear registro en la tabla sacramentos
            $sacramento = Sacramento::create([
                'persona_id' => $request->id_persona,
                'tipo' => 'Confirmacion',
                'parroquia_id' => $request->id_parroquia,
                'libro_sacramento_id' => $libroSacramento->id,
            ]);
            Log::debug('Sacramento created', $sacramento->toArray());

            // Crear registro en la tabla confirmaciones
            $confirmacion = Confirmacion::create([
                'sacramento_id' => $sacramento->id,
                'bautizado_parroquia' => $request->parroquia_bautismo,
                'municipio_bautismo' => $request->municipio_bautismo,
                'fecha_bautismo' => $request->fecha_bautismo,
                'no_libro_bautismo' => $request->numero_libro_bautismo,
                'folio_bautismo' => $request->folio_bautismo,
                'partida_bautismo' => $request->partida_bautismo,
                'padrinos' => $request->padrinos,
                'registro' => $request->fecha_registro_confirmacion,
                'notas' => $request->notas,
                'celebrante' => $request->sacerdote,
                'capilla' => $request->capilla,
                'lib_letra_bautismo' => $request->letra_libro_bautismo,
                'letra_partida_bautismo' => $request->partida_letra_bautismo,
            ]);
            Log::debug('Confirmacion created', $confirmacion->toArray());

            // Crear registro en la tabla registros
            $registro = Registro::create([
                'persona_id' => $request->id_persona,
                'user_id' => Auth::id(),
                'sacramento_id' => $sacramento->id,
            ]);
            Log::debug('Registro created', $registro->toArray());

            DB::commit();

            return redirect()->back()->with('success', 'Se ha registrado con éxito el Sacramento de la Confirmación');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al registrar la confirmación: ' . $e->getMessage(), ['request' => $request->all()]);
            return redirect()->back()->with('error', 'Hubo un problema al procesar la solicitud');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Confirmacion $confirmacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Confirmacion $confirmacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    try {
        // Obtener la Confirmación existente para actualizar
        $confirmacion = Confirmacion::find($id);

        // Verificar si la Confirmación existe
        if (!$confirmacion) {
            return redirect()->back()->with('error', 'Confirmación no encontrada');
        }

        // Actualizar el Libro de Sacramento si es necesario
        if ($confirmacion->sacramento) {
            $libroSacramento = $confirmacion->sacramento->libroSacramento;

            if ($libroSacramento) {
                $libroSacramento->numero_libro = $request->numero_libro_sacramento;
                $libroSacramento->num_letra = $request->numero_letra_libro_sacramento;
                $libroSacramento->folio = $request->folio_sacramento;
                $libroSacramento->partida = $request->partida_sacramento;
                $libroSacramento->letra_partida = $request->letra_partida_sacramento;
                $libroSacramento->save();
            }
        }

        // Actualizar la Confirmación
        $confirmacion->bautizado_parroquia = $request->parroquia_bautizado;
        $confirmacion->municipio_bautismo = $request->municipio_bautismo;
        $confirmacion->fecha_bautismo = $request->fecha_bautismo;
        $confirmacion->no_libro_bautismo = $request->numero_libro_bautismo;
        $confirmacion->folio_bautismo = $request->folio_bautismo;
        $confirmacion->partida_bautismo = $request->partida_bautismo;
        $confirmacion->padrinos = $request->padrinos;
        $confirmacion->registro = $request->fecha_registro_confirmacion;
        $confirmacion->notas = $request->notas;
        $confirmacion->celebrante = $request->sacerdote;
        $confirmacion->capilla = $request->capilla;
        $confirmacion->num_lib_letra_confirmacion = $request->numero_lib_letra_confirmacion;
        $confirmacion->letra_partida_bautismo = $request->letra_partida_bautismo;

        $confirmacion->save();

        return redirect()->back()->with('success', 'Se ha actualizado con éxito el Sacramento de la Confirmación');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Hubo un problema al procesar la solicitud: ' . $e->getMessage());
    }
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $persona = Persona::findOrFail($id);

        DB::beginTransaction();

        try {
            if ($persona->sacramentos->isNotEmpty()) {
                foreach ($persona->sacramentos as $sacramento) {
                    if($sacramento->confirmacion){
                        $sacramento->confirmacion()->delete();
                        $sacramento->delete();
                        if ($sacramento->libroSacramento) {
                            $sacramento->libroSacramento->delete();
                        }
                    }
                }
            }
            DB::commit();
            return redirect()->route('personas.info')->with('error', 'Error al eliminar el Bautismo');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('personas.info', ['id' => $id])->with('success', 'Confirmación eliminada correctamente');
        }
    }
}
