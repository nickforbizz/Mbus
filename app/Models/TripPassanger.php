<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $trip_id
 * @property int $passanger_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class TripPassanger extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'trip_passanger';

    /**
     * @var array
     */
    protected $fillable = ['trip_id', 'passanger_id', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

}
