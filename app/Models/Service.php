<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $fillable = [
        'sku_id',
        'name',
        'category',
        'price',
        'description',
        'icon',
    ];

    /**
     * Get the orders associated with this service.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
