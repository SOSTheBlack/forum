<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    public function woner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
