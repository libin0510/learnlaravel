<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catetory;
use App\Article;

class CatetoryController extends Controller
{
    public function index($id=1){
    	$catetory = Catetory::findorfail($id);
    	$articles = Article::where('cate_id',$id)->OfarticlePage();
    	return view('catetory',['articles'=>$articles,'catetory'=>$catetory]);
    }
}
