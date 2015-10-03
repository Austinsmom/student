<?php

namespace App;

use App\Facades\MyHtml;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'email',
        'post_id',
        'content',
        'published_at',
        'spam'
    ];


    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function setContentAttribute($value)
    {
        $this->attributes['content'] = MyHtml::sanitize($value);
    }

    public function scopeNoSpam($query)
    {
        return $query->where('spam', '!=', 1);
    }
}
