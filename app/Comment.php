<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'email',
        'post_id',
        'content',
        'published_at'
    ];


    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function scopeNoSpam($query)
    {
        return $query->where('spam', '!=', 1);
    }
}
