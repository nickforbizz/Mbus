<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $salary_id
 * @property int $trip_id
 * @property string $shift_time
 * @property string $date_employed
 * @property int $employment_status
 * @property string $date_added
 * @property int $status
 * @property Salary $salary
 * @property Trip $trip
 * @property User $user
 */
class Employee extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'employee';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'salary_id', 'trip_id', 'shift_time', 'date_employed', 'employment_status', 'date_added', 'status'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function salary()
    {
        return $this->belongsTo('App\Models\Salary');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trip()
    {
        return $this->belongsTo('App\Models\Trip');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
