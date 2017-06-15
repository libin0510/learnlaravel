<?php 

function catetory_list($catetories){
  $tree = array();
  $f_tree = array();
  foreach($catetories as $k=>$v){
  	$tree['item_'.$v['id']] = $v;
  	$tree['item_'.$v['id']]['children'] = array();
  	$f_tree['item_'.$v['pid']]['children']['item_'.$v['id']] = $tree['item_'.$v['id']];
  }
   find_children($tree,$f_tree);
   foreach($tree as $kkk=>$vvv){
		if($vvv['pid'] != '0'){
			unset($tree[$kkk]);
		}
	}
   return $tree;
}


function find_children(&$tree,$f_tree){
	foreach($tree as $k=>$v){
		if(isset($f_tree[$k])){
			$tree[$k]['children'] = $f_tree[$k]['children'];
		}
	}
	foreach($tree as $kk=>$kv){
	 if(!empty($kv['children'])){
		find_children($tree[$kk]['children'],$f_tree);
	 }
	}	
	return $tree;
}

function arr_to_string($id,$arr,$g='-'){
	$str = '';
	$f = '|';
	foreach($arr as $k=>$v){		
		$select = '';
		if($id == $v['id']){
			$select = 'selected="selected"';
		}
		$str .= '<option value="'.$v['id'].'" '.$select.'>'.$f.$g.$v['cate_name'].'</option>';
		if(!empty($v['children'])){			
<<<<<<< HEAD
			$str .= arr_to_string($id,$v['children'], $g.'-');
=======
			$str .= arr_to_string($id,$v['children'], $g."-");
>>>>>>> release-20170615
		}
	}
	return $str;
}

?>