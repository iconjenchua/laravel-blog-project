<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'active', 'title', 'body'
    ];
    
    protected $dates = [
        'deleted_at', 'published_at'
    ];
    
    public function Author() {
        return $this->belongsTo('\App\User', 'user_id', 'id');
    }
    
    public function scopeActivePosts($query) {
        return $query->whereActive(1);
    }
}
