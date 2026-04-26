<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['title', 'slug', 'content', 'image', 'user_id'])]
class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
