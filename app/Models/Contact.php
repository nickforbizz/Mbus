<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $mobile_number
 * @property int $telephone_number
 * @property string $address
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Conductor[] $conductors
 * @property Driver[] $drivers
 * @property Employee[] $employees
 * @property Passanger[] $passangers
 * @property User[] $users
 */
class Contact extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'contact';

    /**
     * @var array
     */
    protected $fillable = ['mobile_number', 'telephone_number', 'address', 'status', 'created_at', 'updated_at', 'deleted_at'];

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function passangers()
    {
        return $this->hasMany('App\Models\Passanger');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
