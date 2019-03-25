<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $bus_number
 * @property int $capacity
 * @property string $model
 * @property string $maintenance
 * @property int $status
 * @property string $date_added
 * @property string $owner
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
    protected $fillable = ['bus_number', 'capacity', 'model', 'maintenance', 'status', 'date_added', 'owner'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

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
