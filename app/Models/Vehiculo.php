<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idvehiculo
 * @property string $marca
 * @property string $modelo
 * @property int $year
 * @property string $placa
 * @property Asignacion[] $asignacions
 */
class Vehiculo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'vehiculo';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idvehiculo';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['marca', 'modelo', 'year','placa'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asignacions()
    {
        return $this->hasMany('App\Asignacion', 'vehiculo', 'idvehiculo');
    }
}
