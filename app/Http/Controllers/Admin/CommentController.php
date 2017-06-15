<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
    public function index(){
    	$comment = Comment::with('hasOneArticle')->OfcommentsPage();
    	//dd($comment);
        return view('admin/comment/index',['data'=>$comment]);
    }

    public function edit($id){
        $comment = Comment::with('hasOneArticle')->find($id);
        //dd($comment);
        return view('admin/comment/edit',['comment'=>$comment]);
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'content'=>'required',
            ]);
        $comment = Comment::findOrFail($id);
        $comment->content = $request->get('content');

        if($comment->save()){
            return redirect('admin/comment');
        }else{
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destory($id){
        Comment::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
}
