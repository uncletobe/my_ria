<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class NewsTag extends Model
{
    public function newsCategory() {
        return $this->hasOne('App\Models\News\NewsCategories', 'id', 'parent_id');
    }
}
