<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['nickname', 'email', 'website', 'content', 'article_id'];

    public function hasOneArticle(){
    	return $this->hasOne('App\article','id','article_id');
    }
    
    public function scopeOfcommentsPage($query){
    	return $query->orderby('updated_at','desc')->paginate(10);
    }    
}
