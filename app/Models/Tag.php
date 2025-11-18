<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function newsletters()
    {
        return $this->morphedByMany(Newsletter::class, 'taggable');
    }
}
