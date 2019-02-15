<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $distance
 * @property string $a_coodinates
 * @property string $b_coodinates
 * @property string $a_terminal
 * @property string $b_terminal
 * @property string $date_added
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Ticket[] $tickets
 * @property Trip[] $trips
 */
class Busroute extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'busroute';

    /**
     * @var array
     */
    protected $fillable = ['name', 'distance', 'a_coodinates', 'b_coodinates', 'a_terminal', 'b_terminal', 'date_added', 'status', 'created_at', 'updated_at', 'deleted_at'];

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
        return $this->hasMany('App\Models\Ticket', 'route_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trips()
    {
        return $this->hasMany('App\Models\Trip', 'route_id');
    }
}
