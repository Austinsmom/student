<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'category_id',
        'published_at',
        'status',
        'comments_counts'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function setPublishedAtAttribute($value)
    {
        $now = Carbon::now();
        $this->attributes['published_at'] = "$value {$now->hour}:{$now->minute}:{$now->second}";
    }
}
