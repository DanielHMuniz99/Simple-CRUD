<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }   
}
