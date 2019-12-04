<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'body',
        'url',
        'commentable_id',
        'commentable_type',
        'user_id'
    ];

    public function commentable()
    {
        $this->morphTo();
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
    public function project()
    {
        $this->hasOne(Project::class);
    }
}
