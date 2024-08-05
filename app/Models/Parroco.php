<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parroco extends Model
{
    use HasFactory;

    protected $table = 'parrocos';
    protected $fillable = [
        'id_sacerdote'
    ];
        /**
         * Get the user that owns the Parroco
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function sacerdote()
        {
            return $this->belongsTo(Sacerdote::class, 'id_sacerdote');
        }
    
}
