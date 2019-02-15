<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $contact_id
 * @property int $salary_id
 * @property string $shift_time
 * @property string $date_employed
 * @property int $employment_status
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Contact $contact
 * @property Salary $salary
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
    protected $fillable = ['contact_id', 'salary_id', 'shift_time', 'date_employed', 'employment_status', 'status', 'created_at', 'updated_at', 'deleted_at'];

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function salary()
    {
        return $this->belongsTo('App\Models\Salary');
    }
}
