<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Misa extends Model
{
    use HasFactory;

    protected $fillable = [
        'misa_dominical',
        'misa_entre_semanal',
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
