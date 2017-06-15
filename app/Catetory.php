<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catetory extends Model
{
    
    protected $table='catetory';

    public function hasManyArticle(){
    	return $this->hasMany('App\article','cate_id','id');
    }

    public function scopeOfcatetoryPage($query){
    	return $query->paginate(10);
    }

    public static function getListArr(){
    	$arr =Catetory::get();
    	$arr1 = $arr->toArray();
    	return catetory_list($arr1);
    }
}
