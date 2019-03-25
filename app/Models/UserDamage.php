<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $category
 * @property int $costs
 * @property int $status
 * @property string $date_added
 */
class UserDamage extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['category', 'costs', 'status', 'date_added'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

}
