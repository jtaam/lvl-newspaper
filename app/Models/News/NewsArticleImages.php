<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class NewsArticleImages extends Model
{
    protected $fillable = ['article_id', 'header', 'right', 'main', 'bottom'];

    public function article(){
        return $this->belongsTo(NewsArticle::class);
    }
}
