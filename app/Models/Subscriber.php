<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscriber extends Model
{
    use HasFactory; // <-- add this

    protected $fillable = [
        'email',
        'name',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
