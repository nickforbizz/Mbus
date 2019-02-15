<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $contact_id
 * @property string $fname
 * @property string $lname
 * @property string $sname
 * @property string $gender
 * @property int $age
 * @property int $status
 * @property string $date_added
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Contact $contact
 */
class Passanger extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'passanger';

    /**
     * @var array
     */
    protected $fillable = ['contact_id', 'fname', 'lname', 'sname', 'gender', 'age', 'status', 'date_added', 'created_at', 'updated_at', 'deleted_at'];

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
}
