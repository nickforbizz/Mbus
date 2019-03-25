<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $distance
 * @property string $a_coodinates
 * @property string $b_coodinates
 * @property int $status
 * @property string $date_added
 * @property string $a_terminal
 * @property string $b_terminal
 * @property Ticket[] $tickets
 * @property Trip[] $trips
 */
class Route extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'route';

    /**
     * @var array
     */
    protected $fillable = ['name', 'distance', 'a_coodinates', 'b_coodinates', 'status', 'date_added', 'a_terminal', 'b_terminal'];

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
