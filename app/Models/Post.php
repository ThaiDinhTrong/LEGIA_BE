<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'owner_id', 
        'content', 
        'privacy', 
        'background_id', 
        'post_type', 
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function images()
    {
        return $this->hasMany(PostImage::class, 'post_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function reactions()
    {
        return $this->hasMany(Reaction::class, 'post_id');
    }    

    public function shares()
    {
        return $this->hasMany(Share::class, 'post_id');
    }

    public function background()
    {
        return $this->belongsTo(Background::class);
    }
}
