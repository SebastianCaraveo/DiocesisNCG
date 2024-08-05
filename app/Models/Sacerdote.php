<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Sacerdote extends Model
{
    use HasFactory;

    protected $table= 'sacerdotes';

    protected $fillable = [
        'nombre',
        'ap_paterno',
        'ap_materno',
        'licenciatura',
    ];  
        /**
         * Get the user associated with the Sacerdote
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasOne
         */
        public function parroco()
        {
            return $this->hasOne(Parroco::class, 'id_sacerdote');
        }
    
}
