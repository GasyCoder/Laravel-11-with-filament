<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'thumbnail',
        'title',
        'color',
        'user_id',
        'uuid',
        'slug',
        'category_id',
        'user_id',
        'content',
        'tags',
        'published',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected $casts = [
        'tags'=> 'array', 
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->uuid = (string) Str::uuid();
            $post->slug = Str::slug($post->name);
        });
    }
        
}
