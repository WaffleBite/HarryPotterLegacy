<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories(){
        return $this-> belongsTo(Category::class, 'category', 'id');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order');
    }
}
