<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'bio', 'image', 'category_id', 'user_id'];


  

    public function user()
    {
        return $this->belongsTo(User::class, 'User_id');
    }

    public function categories()
    {
        return $this->belongsTo(categorie::class, 'category_id');
    }

    public function Commitment()
    {
        return $this->hasMany(Commitment::class, 'posts_id');
    }
}
