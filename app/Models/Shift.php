<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $shift_time
 * @property int $status
 * @property string $created_at
 * @property string $deleted_at
 * @property string $updated_at
 * @property Conductor[] $conductors
 * @property Driver[] $drivers
 * @property Employee[] $employees
 */
class Shift extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'shift';

    /**
     * @var array
     */
    protected $fillable = ['title', 'shift_time', 'status', 'created_at', 'deleted_at', 'updated_at'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

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
