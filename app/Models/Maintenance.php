<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property int $costs
 * @property string $_token
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Bus[] $buses
 */
class Maintenance extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'maintenance';

    /**
     * @var array
     */
    protected $fillable = ['title', 'costs', '_token', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function buses()
    {
        return $this->hasMany('App\Models\Bus');
    }
}
