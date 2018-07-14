<?php
namespace app\index\model;
use think\Model;
class AdminCate extends Model{

	public function getchilrendid($cateid){
		//select(),是查询全部;
		$cateres = $this->select();
		//传递参数;
		return $this->_getchilrendid($cateres,$cateid);

	}
	public function _getchilrendid($cateres,$cateid){
		static $arr = array();
		//把每一条信息循环出来，二维数组;
		//如果每一条信息的pid == 点击的ID，那么它就是属于这个ID的下级
		//使用递归，这个再一次把这个data，
		foreach($cateres as $key=>$vo){
			if($vo['pid'] == $cateid){
				//这样找到子栏目
				$arr[] = $vo['id'];
				//通过子栏目的ID，找到子栏目的子栏目
				$this->_getchilrendid($cateres,$vo['id']);
			}
		}
		return $arr;
	}

}	


