<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class ArticleTag extends Model
{
    public function tagName() {
//        return $this->hasOne('App\Models\News\NewsTag', 'id', 'tag_id');
        return $this->belongsToMany('App\Models\News\NewsTag', 'id', 'tag_id');
    }

}
