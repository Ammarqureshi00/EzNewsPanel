<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];
    public function newsletters()
    {
        return $this->morphedByMany(Newsletter::class, 'taggable'); // shared polymorphic many-to-many
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
