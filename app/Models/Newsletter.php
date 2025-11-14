<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'image',
    ];
    public function subscribers()
    {
        return $this->belongsToMany(Subscriber::class, 'newsletter_subscriber');
    }
}
