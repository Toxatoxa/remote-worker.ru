<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'alias',
        'title',
        'description',
        'body',
        'category_id',
        'url',
    ];

    public function category()
    {
        return $this->belongsTo('\App\Category');
    }

    public function user()
    {
        return $this->belongsTo('\App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('\App\Tag');
    }

    public function getTagListAttribute()
    {
        return $this->tags->lists('id')->toArray();
    }
}
