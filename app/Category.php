<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'cms_categories';

    protected $fillable = [
        'name', 'is_active'
    ];
}
