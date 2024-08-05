<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model
{
    use HasFactory;

    protected $table= 'parroquias';

    protected $fillable = [
        'nombre',
        'direccion',
        'municipio',
        'ubicacion',
        'telefono',
        'horario',
        'id_parroco',
    ];

    /**
     * Get the parroco that owns the Parroquia
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parroco()
    {
        return $this->belongsTo(Parroco::class, 'id_parroco');
    }

    /**
     * Get all of the libroSacramentos for the Parroquia
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function libroSacramentos(): HasMany
    {
        return $this->hasMany(libroSacramentos::class, 'id_parroquia');
    }

    /**
     * Get all of the usuarios for the Parroquia
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuarios(): HasMany
    {
        return $this->hasMany(User::class, 'parroquia_id');
    }
    
}