<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sacramento extends Model
{
    use HasFactory;

    protected $table= 'sacramentos';

    protected $fillable = [
        'persona_id', 
        'tipo', 
        'parroquia_id', 
        'libro_sacramento_id',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function parroquia()
    {
        return $this->belongsTo(Parroquia::class);
    }

    public function libroSacramento()
    {
        return $this->belongsTo(LibroSacramento::class);
    }

    public function bautismo()
    {
        return $this->hasOne(Bautismo::class);
    }

    public function comunion()
    {
        return $this->hasOne(Comunion::class);
    }

    public function confirmacion()
    {
        return $this->hasOne(Confirmacion::class);
    }

    public function matrimonio()
    {
        return $this->hasOne(Matrimonio::class);
    }

}
