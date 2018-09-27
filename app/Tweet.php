<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    /**
     *
     * Tweet author relationship
     *
     */
    
    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
