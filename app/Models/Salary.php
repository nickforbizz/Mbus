<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $category
 * @property int $benefits
 * @property int $deductions
 * @property int $basic_salary
 * @property int $total_salary
 * @property int $status
 * @property string $date_added
 * @property Conductor[] $conductors
 * @property Driver[] $drivers
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
    protected $fillable = ['category', 'benefits', 'deductions', 'basic_salary', 'total_salary', 'status', 'date_added'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function conductors()
    {
        return $this->hasMany('App\Models\Conductor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function drivers()
    {
        return $this->hasMany('App\Models\Driver');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }
}
