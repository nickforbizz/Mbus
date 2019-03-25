<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $fname
 * @property string $lname
 * @property string $sname
 * @property int $contact_id
 * @property string $gender
 * @property int $age
 * @property int $status
 * @property string $date_added
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
    protected $fillable = ['fname', 'lname', 'sname', 'contact_id', 'gender', 'age', 'status', 'date_added'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

}
