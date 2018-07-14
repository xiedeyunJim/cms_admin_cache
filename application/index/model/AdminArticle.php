<?php
namespace app\index\model;
use think\Model;
use app\index\model\AdminCate;
use think\facade\Cache;
class AdminArticle extends Model
{

	public function getAticleId($id)
	{
		$cate = new AdminCate;
		$arr = $cate->getchilrendid($id);
		$arr[] = $id;
		$str =implode(',', $arr);
		$article=$this->order('id desc')->field('id,create_time,site,detail,look,like,title')->where('cateid',$str)->cache(true)->paginate(10);
    	Cache::set('article',$article);

	} 

}	


