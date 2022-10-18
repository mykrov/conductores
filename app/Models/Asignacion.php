<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idasignacion
 * @property int $vehiculo
 * @property int $conductor
 * @property Conductor $conductor
 * @property Vehiculo $vehiculo
 */
class Asignacion extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'asignacion';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idasignacion';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['vehiculo', 'conductor'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function conductor()
    {
        return $this->belongsTo('App\Models\Conductor', 'conductor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehiculo()
    {
        return $this->belongsTo('App\Models\Vehiculo', 'vehiculo', 'idvehiculo');
    }
}
