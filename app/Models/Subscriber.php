<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscriber extends Model
{
    use HasFactory; //

    protected $fillable = [
        'email',
        'name',
    ];

    public function newsletters()
    {
        return $this->belongsToMany(Newsletter::class, 'news_subscriber');
    }
}
