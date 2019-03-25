<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $email
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Newsletter extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'newsletter';

    /**
     * @var array
     */
    protected $fillable = ['email', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

}
