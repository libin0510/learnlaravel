<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Catetory;

class ArticleController extends Controller
{
    public function index(){
        $data = Article::with('hasOneCatetory')->OfarticlePage();
    	return view('admin/article/index',['data'=>$data]);
    }

    public function create(){
        $cate_list = arr_to_string(0,Catetory::getListArr());
    	return view('admin/article/create',['cate_list'=>$cate_list]);
    }

    public function store(Request $request){
    	$this->validate($request, [
    		'title'=>'required|unique:articles|max:255',
            'cate_id'=>'required',
    		'body'=>'required',
    		]);

    	$article = new Article;
    	$article->title=$request->get('title');
    	$article->body = $request->get('body');
        $article->cate_id = $request->get('cate_id');
    	$article->user_id = $request->user()->id;

    	if($article->save()){
    		return redirect('admin/article');
    	}else{
    		return redirect()->back()->withInput()->withErrors('保存失败！');
    	}

    }

    public function edit($id){
        $article = Article::with('hasOneCatetory')->find($id);
        $cate_list = arr_to_string($article->cate_id,Catetory::getListArr());
    	return view('admin/article/edit',['article'=>$article,'cate_list'=>$cate_list]);
    }

    public function update($id, Request $request){
    	$this->validate($request,[
    		'title'=>'required|max:255', 
            'cate_id'=>'required',
    		'body' =>'required',            
    		]);
    	$article = Article::findOrFail($id);
    	$article->title = $request->get('title');
    	$article->body = $request->get('body');
        $article->cate_id = $request->get('cate_id');
    	if($article->save()){
    		return redirect('admin/article');
    	}else{
    		return redirect()->back()->withInput()->withErrors('保存失败！');
    	}
    }

    public function destroy($id)
	{
	    Article::find($id)->delete();
	    return redirect()->back()->withInput()->withErrors('删除成功！');
	}

}
