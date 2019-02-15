<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $bus_id
 * @property int $route_id
 * @property int $driver_id
 * @property int $conductor_id
 * @property string $time_trip_started
 * @property int $status
 * @property string $timespan
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Bus $bus
 * @property Conductor $conductor
 * @property Driver $driver
 * @property Busroute $busroute
 */
class Trip extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'trip';

    /**
     * @var array
     */
    protected $fillable = ['bus_id', 'route_id', 'driver_id', 'conductor_id', 'time_trip_started', 'status', 'timespan', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bus()
    {
        return $this->belongsTo('App\Models\Bus');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function conductor()
    {
        return $this->belongsTo('App\Models\Conductor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function driver()
    {
        return $this->belongsTo('App\Models\Driver');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function busroute()
    {
        return $this->belongsTo('App\Models\Busroute', 'route_id');
    }
}
