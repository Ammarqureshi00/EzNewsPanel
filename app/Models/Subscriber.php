<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscriber extends Model
{
    use HasFactory; //

    protected $fillable = [
        'name',
        'email',

    ];

    public function newsletter()
    {
        return $this->belongsToMany(Newsletter::class, 'news_subscription', 'subscriber_id', 'news_id');
    }
}
