<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function owner(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
