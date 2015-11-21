<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title',
        'alias',
        'description',
        'icon',
    ];

    public function scopeByName($query, $alias)
    {
        $query->where('alias', '=', $alias);
    }

    public function scopeOrderByName($query)
    {
        $query->orderBy('title');
    }

    public function records()
    {
        return $this->hasMany('\App\Record');
    }
}
