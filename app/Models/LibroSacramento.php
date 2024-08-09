<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LibroSacramento extends Model
{
    use HasFactory;

    protected $table= 'libro_sacramentos';

    protected $fillable = [
        'numero_libro',
        'folio',
        'partida',
        'tipo_sacramento',
        'id_parroquia',
        'num_letra',
        'letra_partida',
    ];

    /**
     * Get the parroquia that owns the LibroSacramento
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parroquia(): BelongsTo
    {
        return $this->belongsTo(Parroquia::class, 'id_parroquia');
    }

    public function sacramentos()
    {
        return $this->hasMany(Sacramento::class, 'libro_sacramento_id');
    }

    public function persona()
    {
        return $this->hasOneThrough(Persona::class, Sacramento::class, 'libro_sacramento_id', 'id', 'id', 'persona_id');
    }
}
