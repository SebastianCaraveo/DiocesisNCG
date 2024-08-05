<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\LibroSacramento;
use App\Models\Sacramento;
use App\Models\Parroquia;
use App\Models\Sacerdote;
use App\Models\Registro;
use App\Models\Bautismo;
use App\Models\Persona;
use App\Models\Parroco;


class BautismoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $persona = Persona::find($id);

        $sacramento = $persona->sacramentos()->where('tipo', 'bautismo')->exists();

        $parroquias = Parroquia::all(); 
        $parrocos = Parroco::all(); 
        $sacerdotes = Sacerdote::all();

        return view('frontend.layouts.bautismo', compact('persona', 'parroquias', 'parrocos', 'sacerdotes', 'sacramento'));
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
        // Definir reglas de validación
        $rules = [
            'id_parroquia' => 'required|exists:parroquias,id',
            'libroSacramento' => [
                'required',
                'unique:libro_sacramentos,numero_libro,NULL,id,folio,' . $request->folioSacramento . ',partida,' . $request->partidaSacramento . ',id_parroquia,' . $request->id_parroquia . ',num_letra,' . ($request->libroLetraSacramento ?? 'NULL') . ',letra_partida,' . ($request->input('num_letra_partida') ?? 'NULL') . ',tipo_sacramento,Bautismo',
            ],
            'selectSacerdote' => 'required',
            'registroBautismo' => 'nullable|date',
            'padrinosBautismo' => 'required|string',
            'idPerson' => 'required|string',
        ];

        // Validar la solicitud
        $validador = Validator::make($request->all(), $rules);

        if ($validador->fails()) {
            Log::debug('Validation failed', $validador->errors()->toArray());
            return redirect()->back()->withErrors($validador)->withInput();
        }

        DB::beginTransaction();

        try {
            // Crear registro en la tabla libro_sacramentos
            $libroSacramento = LibroSacramento::create([
                'id_parroquia' => $request->id_parroquia,
                'numero_libro' => $request->libroSacramento,
                'folio' => $request->folioSacramento,
                'partida' => $request->partidaSacramento,
                'tipo_sacramento' => 'Bautismo',
                'num_letra' => $request->libroLetraSacramento,
                'letra_partida' => $request->input('num_letra_partida'),
            ]);
            Log::debug('LibroSacramento created', $libroSacramento->toArray());

            // Crear registro en la tabla sacramentos
            $sacramento = Sacramento::create([
                'persona_id' => $request->idPerson,
                'tipo' => 'Bautismo',
                'parroquia_id' => $request->id_parroquia,
                'libro_sacramento_id' => $libroSacramento->id,
            ]);
            Log::debug('Sacramento created', $sacramento->toArray());

            // Crear registro en la tabla bautismos
            $bautismo = Bautismo::create([
                'registro' => $request->registroBautismo,
                'padrinos' => $request->padrinosBautismo,
                'no_partida' => $request->partida_no,
                'num_libro_rc' => $request->input('libroRC'),
                'folio_rc' => $request->input('folioRC'),
                'partida_rc' => $request->input('actaRC'),
                'delegacion_rc' => $request->input('delegacionRC'),
                'celebrante' => $request->selectSacerdote,
                'lugar_confirmacion' => $request->confirmo,
                'contrajo_matrimonio' => $request->input('matrimonio'),
                'notas' => $request->notas,
                'capilla' => $request->input('capilla'),
                'sacramento_id' => $sacramento->id,
            ]);
            Log::debug('Bautismo created', $bautismo->toArray());

            // Crear registro en la tabla registros
            $registro = Registro::create([
                'persona_id' => $request->idPerson,
                'user_id' => Auth::id(),
                'sacramento_id' => $sacramento->id,
            ]);
            Log::debug('Registro created', $registro->toArray());

            DB::commit();

            return redirect()->back()->with('success', 'Se ha registrado con éxito el Sacramento del Bautismo');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al registrar el sacramento de bautismo: ' . $e->getMessage(), ['request' => $request->all()]);
            return redirect()->back()->with('error', 'Hubo un problema al procesar la solicitud');
        }
    }





    /**
     * Display the specified resource.
     */
    public function show(Bautismo $bautismo)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bautismo $bautismo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    try {
        /* dd($request->all()); */
        // Obtener el Bautismo existente para actualizar
        $bautismo = Bautismo::find($id);

        // Verificar si el Bautismo existe
        if (!$bautismo) {
            return redirect()->back()->with('error', 'Bautismo no encontrado');
        }

        // Actualizar el Libro de Sacramento si es necesario
        $libroSacramento = $bautismo->sacramento->libroSacramento;
        $libroSacramento->numero_libro = $request->numero_libro_sacramento;
        $libroSacramento->num_letra = $request->libro_letra_sacramento;
        $libroSacramento->folio = $request->folio_sacramento;
        $libroSacramento->partida = $request->partida_sacramento;
        $libroSacramento->letra_partida = $request->letra_partida_sacramento;
        $libroSacramento->save();

        // Actualizar Bautismo
        $bautismo->registro = $request->fecha_registro_bautismo;
        $bautismo->padrinos = $request->padrinos_bautismo;
        $bautismo->no_partida = $request->recibio_eucaristia;
        $bautismo->celebrante = $request->sacerdote;
        $bautismo->lugar_confirmacion = $request->recibio_confirmacion;
        $bautismo->contrajo_matrimonio = $request->contrajo_matrimonio;
        $bautismo->notas = $request->notas;
        $bautismo->capilla = $request->capilla;
        $bautismo->num_libro_rc = $request->numero_libro_registro_civil;
        $bautismo->folio_rc = $request->folio_registro_civil;
        $bautismo->partida_rc = $request->acta_registro_civil;
        $bautismo->delegacion_rc = $request->delegacion;
        $bautismo->save();

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
                    if($sacramento->bautismo){
                        $sacramento->bautismo()->delete();
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
            return redirect()->route('personas.info', ['id' => $id])->with('success', 'Bautismo eliminado correctamente');

        }
    }
}
