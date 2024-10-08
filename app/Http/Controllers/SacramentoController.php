<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\LibroSacramento;
use App\Models\Sacramento;
use App\Models\Parroquia;
use App\Models\Persona;
use TCPDF;

class SacramentoController extends Controller
{
    public function search(Request $request)
    {
        $parroquias = Parroquia::orderBy('nombre')->get();
        $parroquiaPredeterminada = Auth::user()->parroquia_id;
        $tipos_sacramento = ['Bautismo', 'Comunion', 'Confirmacion', 'Matrimonio'];

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
            $query->whereHas('slibroSacramento', function ($q) use ($request) {
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

        if (!$request->filled('parroquia_id') && !$request->filled('tipo') && !$request->filled('numero_libro') && !$request->filled('num_letra') && !$request->filled('folio') && !$request->filled('partida') && !$request->filled('letra_partida')) {
            $sacramentos = Sacramento::with(['persona', 'libroSacramento', 'parroquia'])->paginate(10);
        } else {
            $sacramentos = $query->with(['persona', 'libroSacramento', 'parroquia'])->paginate(10);
        }

        return view('frontend.layouts.search-section', compact('sacramentos', 'tipos_sacramento', 'parroquias', 'parroquiaPredeterminada'));
    }

    public function generatePDF(Request $request)
{
    ini_set('memory_limit', '512M');

    $validateData = $request->validate([
        'tipo_sacramento' => 'required|string',
        'numero_libro' => 'required|integer',
        'letra_libro' => 'nullable|string',
        'parroquia_id' => 'required|integer',
    ]);

    $tipo_sacramento = $validateData['tipo_sacramento'];
    $numero_libro = $validateData['numero_libro'];
    $letra_libro = $validateData['letra_libro'];
    $parroquia_id = $validateData['parroquia_id'];

    // Construcción de la consulta con el filtro por tipo de sacramento
    $query = LibroSacramento::where('tipo_sacramento', $tipo_sacramento)
        ->where('numero_libro', $numero_libro)
        ->where('id_parroquia', $parroquia_id);

    // Filtro adicional si se especifica una letra del libro
    if (!is_null($letra_libro) && $letra_libro !== '') {
        $query->where('num_letra', $letra_libro);
    } else {
        // Si no se proporciona letra, excluye aquellos registros que tienen una letra
        $query->whereNull('num_letra');
    }

    $registros = $query->get();

    // Creación del documento PDF
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Información del documento
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tu Nombre');
    $pdf->SetTitle('Lista de Registros de ' . $tipo_sacramento);
    $pdf->SetSubject('Generación de PDF');

    // Añade una página
    $pdf->AddPage();

    // Generación del contenido
    $html = view('frontend.documents.ListRegistersPDF', [
        'registros' => $registros,
        'tipo_sacramento' => $tipo_sacramento,
    ])->render();

    // Escribe el contenido en el PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    // Cierra y descarga el documento PDF
    return $pdf->Output('Lista_de_Registros.pdf', 'D');
}

}
