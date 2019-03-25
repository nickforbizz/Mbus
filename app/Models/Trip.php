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
 * @property Bus $bus
 * @property Conductor $conductor
 * @property Driver $driver
 * @property Route $route
 * @property Conductor[] $conductors
 * @property Driver[] $drivers
 * @property Employee[] $employees
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
    protected $fillable = ['bus_id', 'route_id', 'driver_id', 'conductor_id', 'time_trip_started', 'status', 'timespan'];

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
    public function route()
    {
        return $this->belongsTo('App\Models\Route');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function conductors()
    {
        return $this->hasMany('App\Models\Conductor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function drivers()
    {
        return $this->hasMany('App\Models\Driver');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }
}
