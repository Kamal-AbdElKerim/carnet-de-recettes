<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commitment extends Model
{
    use HasFactory;

    protected $fillable = [
        'commit',
        'posts_id',
        'User_id',
        'has_reviewed',
       
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'User_id');
    }
    public function posts()
    {
        return $this->belongsTo(Post::class, 'posts_id');
    }
}
