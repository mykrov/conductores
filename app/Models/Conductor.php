<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string $telefono
 * @property string $cedula
 */
class Conductor extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'conductor';

    /**
     * @var array
     */
    protected $fillable = ['nombre', 'apellido', 'telefono', 'cedula'];
}
