<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parroquia;
use App\Models\Bautizo;
use App\Models\Confesion;
use App\Models\Misa;
use App\Models\Catecismo;

class ServiceController extends Controller
{
    public function index(){
        $parroquias = Parroquia::all();
        $bautizos = Bautizo::all();
        $catecismos = Catecismo::all();
        $misas = Misa::all();
        $confesiones = Confesion::all();
        return view('admin.serviceadmin', compact('parroquias', 'bautizos', 'catecismos', 'misas', 'confesiones',));
    }

    public function store(Request $request){

        $tipoServicio = $request->input('tipo_servicio');
        $idParroquia = $request->input('id_parroquia');

        // Almacena los datos según el tipo de servicio
        switch ($tipoServicio) {
            case 'bautizos':
                Bautizo::create([
                    'fecha_platicas' => $request->input('fecha_platica'),
                    'fecha_bautizos' => $request->input('fecha_bautismo'),
                    'id_parroquia' => $idParroquia,
                ]);
                break;

            case 'confesiones':
                Confesion::create([
                    'horario' => $request->input('horario_confesion'),
                    'id_parroquia' => $idParroquia,
                ]);
                break;

            case 'misas':
                Misa::create([
                    'misa_dominical' => $request->input('misa_dominical'),
                    'misa_entre_semanal' => $request->input('misa_entre_semana'),
                    'id_parroquia' => $idParroquia,
                ]);
                break;

            case 'catecismo':
                Catecismo::create([
                    'horario' => $request->input('horario_catecismo'),
                    'id_parroquia' => $idParroquia,
                ]);
                break;

            default:
                // Manejo de error o mensaje de tipo de servicio no válido
                break;
        }

        // Puedes redirigir a una página específica después de guardar

        return redirect()->back()->with('success', 'Servicio registrado exitosamente.');
    }

    // ServicioController.php

public function eliminar($tipo, $id)
{
    // Lógica para eliminar el servicio según el tipo y el ID
    // Ejemplo con Eloquent
    switch ($tipo) {
        case 'bautizos':
            Bautizo::destroy($id);
            break;
        case 'confesiones':
            Confesion::destroy($id);
            break;
        // Repite el proceso para otros tipos de servicios
        default:
            // Manejo de error o mensaje de tipo de servicio no válido
            break;
    }

    return redirect()->back()->with('success', 'Servicio eliminado exitosamente.');
}

public function editar($tipo, $id)
{
    $parroquias = Parroquia::all();
    $bautizos = Bautizo::all();
    $catecismos = Catecismo::all();
    $misas = Misa::all();
    $confesiones = Confesion::all();

    $servicio = null; // Obtén el servicio según el tipo y el ID usando Eloquent

    return view('admin.serviceadmin', compact('servicio', 'tipo', 'parroquias', 'bautizos', 'catecismos', 'misas', 'confesiones'));
}

public function actualizar(Request $request, $tipo, $id)
{
    // Lógica para actualizar el servicio según el tipo y el ID
    // Ejemplo con Eloquent
    switch ($tipo) {
        case 'bautizos':
            Bautizo::where('id', $id)->update([
                'fecha_platicas' => $request->input('fecha_platica'),
                'fecha_bautizos' => $request->input('fecha_bautismo'),
                // Otros campos según sea necesario
            ]);
            break;
        case 'confesiones':
            Confesion::where('id', $id)->update([
                'horario' => $request->input('horario_confesion'),
                // Otros campos según sea necesario
            ]);
            break;
        // Repite el proceso para otros tipos de servicios
        default:
            // Manejo de error o mensaje de tipo de servicio no válido
            break;
    }

    return redirect()->back()->with('success', 'Servicio actualizado exitosamente.');
}


}
