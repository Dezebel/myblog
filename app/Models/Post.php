<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;  

class Post extends Eloquent
{ 
    use HasFactory, Notifiable, HasApiTokens;
    
    protected $fillable = ['title', 'content', 'user_id'];
    
    protected static function booted()
    {
        static::creating(function (Post $post){
            if (auth()->check()) {
                $post->user_id = Auth::id();
            }
        });
    }

    public function user(): BelongsTo
    {
         return $this->belongsTo(User::class);
    }
}
