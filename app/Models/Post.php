<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_en',
        'title_fr',
        'body_en',
        'body_fr',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // va chercher user_id
    }
}
