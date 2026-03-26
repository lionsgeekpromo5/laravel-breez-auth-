<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['post_title', 'post_subtitle', 'post_description', 'user_id'];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
