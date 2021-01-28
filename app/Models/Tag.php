<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function news()
    {
        return $this->belongsToMany('App\Models\News', 'news_tags')
            ->orderBy('created_at', 'DESC')->paginate(5);
    }

    public function getRouteKeyName()
    {
        return 'tagSlug';
    }
}
