<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $national_id
 * @property string $username
 * @property string $email
 * @property string $telephone
 * @property string $fname
 * @property string $lname
 * @property string $sname
 * @property string $password
 * @property string $age
 * @property string $gender
 * @property string $occupation
 * @property string $date_added
 * @property int $user_level
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Admin extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['national_id', 'username', 'email', 'telephone', 'fname', 'lname', 'sname', 'password', 'age', 'gender', 'occupation', 'date_added', 'user_level', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

}
