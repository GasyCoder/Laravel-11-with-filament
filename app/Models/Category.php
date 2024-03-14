<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "slug",
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($var) {
            $var->slug = Str::slug($var->name);
        });

        static::updating(function ($var) {
            $var->slug = Str::slug($var->name);
        });
    }

}
