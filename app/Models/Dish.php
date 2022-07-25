<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Dish extends Model
{
    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }

    protected $fillable = [
        'name',
        'description',
        'price',
        'ingredients',
        'is_available',
        'cover_image',
        'slug',
        'restaurant_id',
    ];

}
