<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $fname
 * @property string $lname
 * @property string $gender
 * @property string $age
 * @property string $mobile
 * @property string $address
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Tableguest extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['username', 'email', 'password', 'fname', 'lname', 'gender', 'age', 'mobile', 'address', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

}
