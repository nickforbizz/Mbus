<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $bus_id
 * @property int $route_id
 * @property int $ticket_number
 * @property int $amount
 * @property string $luggages
 * @property string $date_booked
 * @property string $date_to_expire
 * @property int $status
 * @property Bus $bus
 * @property Route $route
 */
class Ticket extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ticket';

    /**
     * @var array
     */
    protected $fillable = ['bus_id', 'route_id', 'ticket_number', 'amount', 'luggages', 'date_booked', 'date_to_expire', 'status'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bus()
    {
        return $this->belongsTo('App\Models\Bus');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function route()
    {
        return $this->belongsTo('App\Models\Route');
    }
}
