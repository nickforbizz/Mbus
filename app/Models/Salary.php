<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $deductions_id
 * @property int $user_damages_id
 * @property int $category
 * @property int $basic_salary
 * @property int $total_salary
 * @property int $status
 * @property string $date_added
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Deduction $deduction
 * @property UserDamage $userDamage
 * @property Employee[] $employees
 */
class Salary extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'salary';

    /**
     * @var array
     */
    protected $fillable = ['deductions_id', 'user_damages_id', 'category', 'basic_salary', 'total_salary', 'status', 'date_added', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function deduction()
    {
        return $this->belongsTo('App\Models\Deduction', 'deductions_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userDamage()
    {
        return $this->belongsTo('App\Models\UserDamage', 'user_damages_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }
}
