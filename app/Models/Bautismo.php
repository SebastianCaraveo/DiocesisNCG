<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Bautismo extends Model
{
    use HasFactory;

    protected $fillable = [
        'sacramento_id', 
        'registro', 
        'padrinos', 
        'no_partida',
        'celebrante',
        'lugar_confirmacion',
        'contrajo_matrimonio',
        'notas',
        'capilla',
        'num_libro_rc',
        'folio_rc',
        'partida_rc',
        'delegacion_rc',
    ];

    /**
     * Get the sacramento that owns the Bautismo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sacramento()
    {
        return $this->belongsTo(Sacramento::class);
    }

    /**
     * Accessor for the 'registro' attribute.
     *
     * @param string|null $value
     * @return array
     */
    /* public function getRegistroAttribute($value)
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
    } */
}
