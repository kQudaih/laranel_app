<?php

namespace BestBlog;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
        return $this->belongsTo('BestBlog\User');
    }
}
