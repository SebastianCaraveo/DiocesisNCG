<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Confirmacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'bautizado_parroquia',
        'municipio_bautismo',
        'fecha_bautismo',
        'no_libro_bautismo',
        'folio_bautismo',
        'partida_bautismo',
        'padrinos',
        'registro',
        'notas',
        'celebrante',
        'capilla',
        'num_lib_letra_confirmacion',
        'letra_partida_bautismo',
        'sacramento_id',
    ];

    public function sacramento()
    {
        return $this->belongsTo(Sacramento::class);
    }

    /**
     * Get the libroSacramento that owns the Bautismo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function libroSacramento()
    {
        return $this->belongsTo(libroSacramento::class, 'libro_sacramento_id');
    }
}
