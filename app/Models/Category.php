<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    public function restaurants(): BelongsToMany
    {
        return $this->belongsToMany(Restaurant::class);
    }
}
