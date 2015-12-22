<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'parent_id',
        'alias',
        'title',
        'icon',
    ];

    public function scopeByName($query, $alias)
    {
        $query->where('alias', '=', $alias);
    }

    public function scopeMain($query)
    {
        $query->where('parent_id', '=', '0');
    }

    public function scopeOrderByName($query)
    {
        $query->orderBy('title');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function suns()
    {
        return $this->hasMany('\App\Category', 'parent_id', 'id');
    }

    public function records()
    {
        return $this->hasMany('\App\Record');
    }
}
