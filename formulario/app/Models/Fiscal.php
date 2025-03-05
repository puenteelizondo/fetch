<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fiscal extends Model
{
    public $timestamps = false;

    // Define la conexión para este modelo
    protected $connection = 'web-sqlsrv'; // Establece la conexión correcta para DB2

    // Define la tabla si el nombre no sigue la convención de Laravel
    protected $table = "procurador";

    protected $fillable = [
        'contacto',
        'correo',
        'celular',
        'mensaje',
        'f_mensaje',
        'ip',
        'navegador',
    ];

    protected $hidden = [
        'leido',
        'respuesta',
        'f_respuesta',
        'id_respondio',
        'id_eliminado'
    ];

    protected $casts = [
        'f_mensaje' => 'datetime', // Convierte automáticamente f_mensaje en un objeto DateTime
    ];
}
