<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    public function category()
    {
        return $this->belongsTo(categorie::class);
    }
}
