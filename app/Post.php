<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    protected $table = 'cms_posts';

    protected $fillable = [
        'title', 'body', 'is_active', 'category_id', 'admin_id'
    ];

    /**
     * improve performance
     * 
     */
    public function getAll()
    {
        $posts = DB::table($this->table)
                ->leftJoin('cms_categories', $this->table.'.category_id', '=', 'cms_categories.id')
                ->leftJoin('admins', $this->table.'.admin_id', '=', 'admins.id')
                ->select('cms_posts.id', 'cms_posts.title', 'cms_posts.is_active', 'cms_categories.name as category_name', 'admins.name as admin_name', 'cms_posts.created_at')
                ->get();
        return $posts;
    }

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
