<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';

    protected $fillable = [
        'body',
        'user_id',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function replies()
    {
        return $this->hasMany('App\Status', 'parent_id');
    }

    public function likes()
    {
        return $this->morphMany('App\Like', 'like');
    }
}
