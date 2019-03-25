<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $contact_name
 * @property string $contact_email
 * @property string $contact_msg
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class AnonymousMsg extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['contact_name', 'contact_email', 'contact_msg', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

}
