<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $category
 * @property int $amount
 * @property int $status
 * @property string $date_added
 */
class Deduction extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['category', 'amount', 'status', 'date_added'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

}
