<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Persona extends Model
{

    protected $fillable=[
        'nombre',
        'nombre_papa',
        'nombre_mama',
        'fecha_nacimiento',
        'lugar_nacimiento',
        'genero'
    ];

    public function getFechaNacimientoAttribute($value)
        {
            if (!$value) {
                return [
                    'cadena' => '--/--/----',
                    'dia' => '',
                    'mes' => '',
                    'ano' => '',
                ];
            }
        
            $meses = array(
                "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
                "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
            );
        
            $fecha = Carbon::parse($value);
            $mes = $meses[($fecha->format('n')) - 1];
            return [
                'cadena' => $fecha->format('d') . ' de ' . $mes . ' del ' . $fecha->format('Y'),
                'dia' => $fecha->format('d'),
                'mes' => $mes,
                'ano' => $fecha->format('Y'),
            ];
        }



    public function sacramentos(){
        return $this->hasMany(Sacramento::class);
    }

    public function Parroquia()
{
    return $this->hasOneThrough(
        Parroquia::class,
        Sacramento::class,
        'persona_id',
        'id',
        'id',
        'parroquia_id'
    );
}

public function libroSacramento()
{
    return $this->hasManyThrough(
        LibroSacramento::class,
        Sacramento::class,
        'persona_id',
        'id',
        'id',
        'libro_sacramento_id'
    );
}
  

}