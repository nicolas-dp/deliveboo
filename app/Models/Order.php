<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function dishes(): BelongsToMany
    {
        return $this->belongsToMany(Dish::class);
    }

    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'restaurant_id',
        'total_price',
        'slug',
        'notes',
        'order_date',
    ];
}

/*   'customer_name' => 'required|max:100',
            'customer_email' => 'required|max:100',
            'customer_phone' => 'required|max:100',
            'customer_address' => 'required|max:400',
            'restaurant_id' => 'required',
            'total_price' => 'required',
            'notes' => 'nullable|max:400', */