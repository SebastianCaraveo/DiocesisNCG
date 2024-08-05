<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Sacramento;
use App\Models\Parroquia;
use App\Models\Persona;

class SacramentoController extends Controller
{
    public function search(Request $request)
    {
        $parroquias = Parroquia::orderBy('nombre')->get();
        $parroquiaPredeterminada = Auth::user()->parroquia_id;

        $queryPersona = Persona::query();
        $query = Sacramento::query();

        // Filtro obligatorio por parroquia
        if ($request->filled('parroquia_id')) {
            $query->whereHas('libroSacramento', function ($q) use ($request) {
                $q->where('id_parroquia', $request->input('parroquia_id'));
            });
        }

        // Filtros adicionales opcionales
        if ($request->filled('tipo')) {
            $query->where('tipo', $request->input('tipo'));
        }

        if ($request->filled('numero_libro')) {
            $query->whereHas('libroSacramento', function ($q) use ($request) {
                $q->where('numero_libro', $request->input('numero_libro'));
            });
        }

        if ($request->filled('num_letra')) {
            $query->whereHas('libroSacramento', function ($q) use ($request) {
                $q->where('num_letra', $request->input('num_letra'));
            });
        }

        if ($request->filled('folio')) {
            $query->whereHas('libroSacramento', function ($q) use ($request) {
                $q->where('folio', $request->input('folio'));
            });
        }

        if ($request->filled('partida')) {
            $query->whereHas('libroSacramento', function ($q) use ($request) {
                $q->where('partida', $request->input('partida'));
            });
        }

        if ($request->filled('letra_partida')) {
            $query->whereHas('libroSacramento', function ($q) use ($request) {
                $q->where('letra_partida', $request->input('letra_partida'));
            });
        }

        // Si no se proporcionan filtros, obtener todos los resultados
        if (!$request->filled('parroquia_id') && !$request->filled('tipo') && !$request->filled('numero_libro') && !$request->filled('num_letra') && !$request->filled('folio') && !$request->filled('partida') && !$request->filled('letra_partida')) {
            $sacramentos = Sacramento::with(['persona', 'libroSacramento', 'parroquia'])->paginate(10);
        } else {
            // Obtener los resultados con las relaciones necesarias
            $sacramentos = $query->with(['persona', 'libroSacramento', 'parroquia'])->paginate(10);
        }

        return view('frontend.layouts.search-section', compact('sacramentos', 'parroquias', 'parroquiaPredeterminada'));
    }

}
