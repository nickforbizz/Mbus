<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $mobile_number
 * @property string $email
 * @property int $telephone_number
 * @property string $address
 * @property string $social_media_links
 * @property string $date_added
 * @property int $status
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
    protected $fillable = ['mobile_number', 'email', 'telephone_number', 'address', 'social_media_links', 'date_added', 'status'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
