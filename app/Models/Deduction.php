<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $category
 * @property int $amount
 * @property int $status
 * @property string $date_added
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Salary[] $salaries
 */
class Deduction extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['category', 'amount', 'status', 'date_added', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salaries()
    {
        return $this->hasMany('App\Models\Salary', 'deductions_id');
    }
}
