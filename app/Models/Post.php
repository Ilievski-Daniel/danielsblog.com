<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_category');
    }

    public function comments()
    {
        return $this->belongsToMany(Category::class, 'post_comment');
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
