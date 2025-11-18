<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function newsletters()
    {
        return $this->morphedByMany(Newsletter::class, 'categorizable');
    }
}
