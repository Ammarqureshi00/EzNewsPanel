<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    public $table = 'news';

    protected $fillable = [
        'title',
        'content',
        'image',
        'slug',
    ];

    public function subscribers()
    {
        return $this->belongsToMany(Subscriber::class, 'news_subscription'); // many-to-many
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable'); // polymorphic many-to-many
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable'); // polymorphic many-to-many
    }

    /**
     * Use slug for route model binding
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
