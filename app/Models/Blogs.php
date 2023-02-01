<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(BlogCategroy::class, 'blog_category_id', 'id');
        // `blog_category_id` from blogs table BELONGS TO `id` blog_categories table
    }
    
}
