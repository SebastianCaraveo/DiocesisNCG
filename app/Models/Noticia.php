<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Noticia extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'noticia',
        'imagen',
    ];

    public function guardarIamgen($image)
    {
        $imagenPATH = $image->store('public/noticias');
        $imagenPATH = str_replace('public/', 'storage/', $imagenPATH);

        $this->update(['imagen' => $imagenPATH]);
    }

    public function eliminarImagen()
    {
        if ($this->imagen) {
            $imagenPATH = str_replace('storage/', 'public/', $this->imagen);
            Storage::delete($imagenPATH);

            $this->update(['imagen' => null]);
        }
    }
}
