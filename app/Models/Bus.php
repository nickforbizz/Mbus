<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $maintenance_id
 * @property int $bus_number
 * @property int $capacity
 * @property string $model
 * @property string $owner
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Maintenance $maintenance
 * @property Ticket[] $tickets
 * @property Trip[] $trips
 */
class Bus extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'bus';

    /**
     * @var array
     */
    protected $fillable = ['maintenance_id', 'bus_number', 'capacity', 'model', 'owner', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function maintenance()
    {
        return $this->belongsTo('App\Models\Maintenance');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trips()
    {
        return $this->hasMany('App\Models\Trip');
    }
}
