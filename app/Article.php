<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function hasManyComments()
    {
        return $this->hasMany('App\Comment', 'article_id', 'id');
    }

    public function hasOneCatetory()
    {
    	return $this->belongsTo('App\Catetory','cate_id','id');
    }
    public function scopeOfarticlePage($query){
    	return $query->orderby('updated_at','desc')->paginate(5);
    }
}
