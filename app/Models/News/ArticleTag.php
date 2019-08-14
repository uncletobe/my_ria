<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class ArticleTag extends Model
{
    public function tagName() {
        return $this->hasOne('App\Models\News\NewsTag', 'id', 'tag_id');
    }

    public function newsCategory() {
        return $this->hasOneThrough('App\Models\News\NewsCategories',
            'App\Models\News\NewsTag', 'parent_id', 'id');
    }

}
