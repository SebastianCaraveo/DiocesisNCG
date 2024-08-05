<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matrimonio extends Model
{
    use HasFactory;

    protected $fillable = [
        'registro',
        'senor',
        'senorita',
        'testigo_senor',
        'testigo_senorita',
        'notas',
        'celebrante',
        'sacramento_id',
        'capilla',
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
        return $this->belongsTo(LibroSacramento::class, 'libro_sacramento_id');
    }
}
