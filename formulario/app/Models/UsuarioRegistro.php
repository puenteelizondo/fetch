<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioRegistro extends Model
{
    protected $table = "usuarios"; // Define la tabla si el nombre no sigue la convención de Laravel
    protected $fillable = [
        'usuario',
        'contraseña'
    ];
}
