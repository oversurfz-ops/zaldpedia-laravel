<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'order_id',
        'game_id',
        'zone_id',
        'account_email',
        'account_password',
        'login_via',
        'hero_request',
        'service_id',
        'total_price',
        'status',
        'payment_method',
    ];

    /**
     * Get the service associated with this order.
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
