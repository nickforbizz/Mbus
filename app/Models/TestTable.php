<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $text_val
 * @property int $int_val
 * @property int $status
 * @property string $dated
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class TestTable extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'test_table';

    /**
     * @var array
     */
    protected $fillable = ['text_val', 'int_val', 'status', 'dated', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

}
