<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function posts()
    {
        return $this->belongsToMany(Category::class, 'category_post', 'post_id');
    }
}
