<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Parroquia;
use App\Models\Noticia;
use App\Models\Catecismo;
use App\Models\Bautizo;
use App\Models\Confesion;
use App\Models\Misa;
use App\Models\Sacramento;
use App\Models\Bautismo;
use App\Models\Comunion;
use App\Models\Confirmacion;
use App\Models\Matrimonio;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        $noticias = Noticia::all();
        $misas = Misa::all();
        $bautizos = Bautizo::all();
        $confesiones = Confesion::all();
        $catecismos = Catecismo::all();
        $parroquias = Parroquia::with('parroco.sacerdote')->get();

        return view('/frontend/index', compact('noticias' , 'parroquias', 'misas', 'confesiones', 'catecismos', 'bautizos')); 
        
    }

    public function welcome(){
        return view('home');
    }

    public function admin(){
        if(Auth::user()->rol != 'Administrador'){
            return redirect('/');
        }

        // Conteo total de registros de todos los sacramentos
        $totalRegistros = Sacramento::count();

        // Conteo por tipo de sacramento
        $conteoBautismos = Bautismo::count();
        $conteoComuniones = Comunion::count();
        $conteoConfirmaciones = Confirmacion::count();
        $conteoMatrimonios = Matrimonio::count();

        return view('admin.index', compact('totalRegistros', 'conteoBautismos', 'conteoComuniones', 'conteoConfirmaciones', 'conteoMatrimonios'));
    }

    public function busqueda(Request $request){
        try {
            $parroquiaId = $request->input('parroquia_id');
            $parroquias = Parroquia::with('parroco.sacerdote')
            ->where('id', $parroquiaId)
            ->get();

            return response()->json(['parroquias' => $parroquias]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
