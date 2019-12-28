<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'cms_posts';

    protected $fillable = [
        'title', 'body'
    ];
}
