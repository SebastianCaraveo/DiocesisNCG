<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confesion extends Model
{
    use HasFactory;

    protected $fillable = [
        'horario',
        'id_parroquia',
    ];

    /**
     * Get the user that owns the Parroquia
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parroquia()
    {
        return $this->belongsTo(Parroquia::class, 'id_parroquia');
    }
}
