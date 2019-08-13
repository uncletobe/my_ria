<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class BaseArticleModel extends Model
{
    public function getPublishedAtAttribute($valueFromObject)
    {
        return Carbon::parse($valueFromObject)->diffForHumans() . ", " .
            Carbon::parse($valueFromObject)->format('h:m');
    }

}
