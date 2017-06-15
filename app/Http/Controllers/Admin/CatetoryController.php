<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Catetory;
use helper;
class CatetoryController extends Controller
{
    
    public function index(){
    	$catetories = Catetory::OfcatetoryPage();
    	return view('admin.catetory.index',['catetories'=>$catetories]);
    }

    public function create(){
    	Catetory::get(); 
    	$cate_list = arr_to_string(0,Catetory::getListArr());
    	return view('admin.catetory.create',['cate_list'=>$cate_list]);
    }

    public function edit($id){
    	$catetory = Catetory::findorfail($id);    	
    	$cate_list = arr_to_string($catetory['pid'],Catetory::getListArr());
    	return view('admin.catetory.edit',['catetory'=>$catetory,'cate_list'=>$cate_list]);
    }

    public function store(Request $request){
    	$this->validate($request,[
    			'cate_name'=>"required",
    			'pid' =>"required",
    		]);
    	$catetory = new Catetory;
    	$catetory->cate_name = $request->get('cate_name');
    	$catetory->pid = $request->get('pid');

    	if($catetory->save()){
    		return redirect('admin/catetory');
        }else{
            return redirect()->back()->withInput()->withErrors('保存失败！');
    	}
    }

    public function update(Request $request,$id){
    	$this->validate($request,[
    			'cate_name'=>"required",
    			'pid' =>"required",
    		]);
    	$catetory = Catetory::findorfail($id);
    	$catetory->cate_name = $request->get('cate_name');
    	$catetory->pid = $request->get('pid');

    	if($catetory->save()){
    		return redirect('admin/catetory');
        }else{
            return redirect()->back()->withInput()->withErrors('保存失败！');
    	}
    }

    public function delete($id){
    	Catetory::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
}
