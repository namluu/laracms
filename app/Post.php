<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'cms_posts';

    protected $fillable = [
        'title', 'body', 'is_active', 'category_id', 'admin_id'
    ];

    /**
     * Get the category record associated with the post.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }
}
