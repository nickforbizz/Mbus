<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $contact_id
 * @property int $national_id
 * @property string $username
 * @property string $email
 * @property string $remember_token
 * @property string $fname
 * @property string $lname
 * @property string $sname
 * @property string $password
 * @property string $age
 * @property string $gender
 * @property string $occupation
 * @property string $marital_status
 * @property string $date_added
 * @property int $user_level
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Contact $contact
 * @property MessageBoard[] $messageBoards
 */
class User extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['contact_id', 'national_id', 'username', 'email', 'remember_token', 'fname', 'lname', 'sname', 'password', 'age', 'gender', 'occupation', 'marital_status', 'date_added', 'user_level', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contact()
    {
        return $this->belongsTo('App\Models\Contact');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messageBoards()
    {
        return $this->hasMany('App\Models\MessageBoard');
    }
}
