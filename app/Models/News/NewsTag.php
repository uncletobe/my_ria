<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class NewsTag extends Model
{
    public function newsCategory() {
        return $this->belongsToMany('App\Models\News\NewsCategories', 'id', 'parent_id');
    }
}
