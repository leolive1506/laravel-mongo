<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends ModelMongo
{
    // use HasFactory;
    protected $collection = 'blog_posts';
    protected $fillable = ['nome'];
}
