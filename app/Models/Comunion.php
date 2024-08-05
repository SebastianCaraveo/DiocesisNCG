<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Comunion extends Model
{
    use HasFactory;

    protected $fillable = [
        'registro', 
        'padrino', 
        'madrina',
        'bautismo',
        'lugar_bautismo',
        'fecha_bautismo', 
        'notas',
        'celebrante',
        'sacramento_id',
        'capilla',
        'num_lib_bautismo',
        'num_lib_letra_bautismo',
        'folio_bautismo',
        'partida_bautismo',
        'letra_partida_bautismo',
    ];

    public function sacramento()
    {
        return $this->belongsTo(Sacramento::class);
    }

    public function libroSacramento()
    {
        return $this->belongsTo(libroSacramento::class, 'libro_sacramento_id');
    }

    public function getFormattedFechaBautismoAttribute()
    {
        if (!$this->fecha_bautismo) {
            return '--/--/----';
        }

        $meses = [
            "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
            "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
        ];

        $fecha = Carbon::parse($this->fecha_bautismo);
        $mes = $meses[$fecha->format('n') - 1];

        return [
            'cadena' => $fecha->format('d') . ' de ' . $mes . ' del ' . $fecha->format('Y'),
            'dia' => $fecha->format('d'),
            'mes' => $mes,
            'ano' => $fecha->format('Y'),
        ];
    }

    public function getFechaBautismoForInputAttribute()
    {
        return $this->fecha_bautismo ? Carbon::parse($this->fecha_bautismo)->format('Y-m-d') : '';
    }
}
