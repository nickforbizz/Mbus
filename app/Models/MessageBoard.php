<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $categoty
 * @property string $message_body
 * @property int $guests
 * @property int $status
 * @property string $date_added
 * @property User $user
 */
class MessageBoard extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'message_board';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'categoty', 'message_body', 'guests', 'status', 'date_added'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
