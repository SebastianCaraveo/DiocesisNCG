<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\LibroSacramento;
use App\Models\Confirmacion;
use App\Models\Sacramento;
use App\Models\Matrimonio;
use App\Models\Parroquia;
use App\Models\Sacerdote;
use App\Models\Bautismo;
use App\Models\Comunion;
use App\Models\Registro;
use App\Models\Persona;
use App\Models\Parroco;

class PersonaController extends Controller
{
    public function index(Request $r)
    {
        $query = Persona::query();

        $parroquias = Parroquia::orderBy('nombre')->get();
        $parroquiaPredeterminada = Auth::user()->parroquia_id;

        $nombre = $r->input('nombre');
        $query->where(function($q) use ($nombre) {
            $q->where('nombre', 'like', '%' . $nombre . '%')
              ->orWhereRaw('SOUNDEX(nombre) = SOUNDEX(?)', [$nombre]);
        });

        // Aplica filtros adicionales si se proporcionan
        $nombreMama = trim($r->get('nombre_mama'));
        $nombrePapa = trim($r->get('nombre_papa'));
        $fechaNacimiento = trim($r->get('fecha_nacimiento'));

        if (!empty($nombreMama)) {
            $query->where('nombre_mama', 'LIKE', "%$nombreMama%");
        }

        if (!empty($nombrePapa)) {
            $query->where('nombre_papa', 'LIKE', "%$nombrePapa%");
        }

        if (!empty($fechaNacimiento)) {
            $query->where('fecha_nacimiento', 'LIKE', "%$fechaNacimiento%");
        }

        $idsPersonas = $query->pluck('id');

        $personas = Persona::whereIn('id', $idsPersonas)->orderBy('id', 'asc')->get();

        if ($personas->isEmpty()) {
            return view('frontend.layouts.person');
        } else {
            $perPage = 10;
            $page = $r->input('page', 1);
            $paginatedPersons = $query->paginate($perPage, ['*'], 'page', $page);

            return view('frontend.layouts.search-section', compact('paginatedPersons', 'nombre', 'parroquias', 'parroquiaPredeterminada'));
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'nombre_papa' => 'required',
            'nombre_mama' => 'required',
            'fecha_nacimiento' => 'nullable|date',
            'lugar_nacimiento',
            'genero' => 'required|in:Masculino,Femenino',
        ]);

        $persona = Persona::create($request->all());

        return redirect()->route('personas.info', ['id' => $persona->id])->with('success', 'Persona registrada exitosamente.');
    }

    public function edit($id)
    {
        $persona = Persona::findOrFail($id);
        return view('personas.edit', compact('persona'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'nullable|string',
            'nombre_papa' => 'nullable|string',
            'nombre_mama' => 'nullable|string',
            'fecha_nacimiento' => 'nullable|date',
            'lugar_nacimiento' => 'nullable|string',
            'genero' => 'required|in:Masculino,Femenino',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $persona = Persona::findOrFail($id);
        $persona->update($request->all());

        return redirect()->route('personas.info', ['id' => $persona->id])->with('success', 'Persona actualizada con éxito');
    }

    public function show($id)
    {
    }

    public function destroy($id)
    {
        $persona = Persona::findOrFail($id);

        // Iniciar una transacción para asegurar la consistencia de la base de datos
        DB::beginTransaction();

        try {
            // Verificar si la persona tiene sacramentos
            if ($persona->sacramentos->isNotEmpty()) {
                foreach ($persona->sacramentos as $sacramento) {
                    // Eliminar datos ligados al sacramento (Bautismo, Comunion, etc.)
                    $sacramento->bautismo()->delete();
                    $sacramento->comunion()->delete();
                    $sacramento->confirmacion()->delete();
                    $sacramento->matrimonio()->delete();

                    // Eliminar el registro de Sacramento
                    $sacramento->delete();

                    // Verificar si hay un libro_sacramento asociado
                    if ($sacramento->libroSacramento) {
                        // Eliminar el registro de LibroSacramento
                        $sacramento->libroSacramento->delete();
                    }
                }
            }

            // Finalmente, eliminar la persona
            $persona->delete();

            // Confirmar la transacción si todo fue exitoso
            DB::commit();

            return redirect()->route('personas.index')->with('success', 'Persona eliminada correctamente');
        } catch (\Exception $e) {
            // En caso de error, revertir la transacción y mostrar un mensaje de error
            DB::rollback();

            return redirect()->route('personas.index')->with('error', 'Error al eliminar la persona');
        }
    }

    public function infoPerson($id)
    {
        $persona = Persona::with([
            'sacramentos',
            'Parroquia',
            'sacramentos.libroSacramento',
        ])->find($id);

        $parroquias = Parroquia::all();
        $parroquiaPredeterminada = Auth::user()->parroquia_id;
        $sacerdotes = Sacerdote::all();

        $libro = $persona->sacramentos->map(function ($sacramento) {
            return [
                'tipo' => $sacramento->tipo,
                'numero_libro' => $sacramento->libroSacramento->numero_libro,
                'folio' => $sacramento->libroSacramento->folio,
                'partida' => $sacramento->libroSacramento->partida,
                'num_letra' => $sacramento->libroSacramento->num_letra,
                'letra_partida' => $sacramento->libroSacramento->letra_partida
            ];
        });

        $sacramentob = $persona->sacramentos()->where('tipo', 'bautismo')->exists();
        $sacramentoe = $persona->sacramentos()->where('tipo', 'comunion')->exists();
        $sacramentoc = $persona->sacramentos()->where('tipo', 'confirmacion')->exists();
        $sacramentom = $persona->sacramentos()->where('tipo', 'matrimonio')->exists();

        $sacramentosPersona[$persona->id] = [
            'bautismo' => $sacramentob,
            'comunion' => $sacramentoe,
            'confirmacion' => $sacramentoc,
            'matrimonio' => $sacramentom,
        ];

        $bautismoData = [];
        if ($sacramentob) {
            $bautismoData = $persona->sacramentos()->where('tipo', 'bautismo')->with('bautismo')->first()->bautismo;
        }

        $comunionData = [];
        if ($sacramentoe) {
            $comunionData = $persona->sacramentos()->where('tipo', 'comunion')->with('comunion')->first()->comunion;
        }

        $confirmacionData = [];
        if ($sacramentoc) {
            $confirmacionData = $persona->sacramentos()->where('tipo', 'confirmacion')->with('confirmacion')->first()->confirmacion;
        }

        $matrimonioData = [];
        if ($sacramentom) {
            $matrimonioData = $persona->sacramentos()->where('tipo', 'matrimonio')->with('matrimonio')->first()->matrimonio;
        }

        return view('frontend.layouts.info', compact('libro', 'persona', 'parroquias', 'parroquiaPredeterminada', 'sacerdotes', 'sacramentosPersona', 'bautismoData', 'comunionData', 'confirmacionData', 'matrimonioData'));
    }
}
