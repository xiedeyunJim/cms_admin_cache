<?php
namespace app\index\controller;
use think\Controller;
use think\facade\Cache;
class Page extends Controller
{
    protected function initialize()
    {
        if(!Cache::get('nav')){
            getnav();
        }
        if(!Cache::get('site')){
            # code...
            getSite();
        }
    }     
	public function index()
	{
        $site =Cache::get('site');
        $nav = Cache::get('nav');
    	$this->assign(
    		array(
    			'site'=>$site,

    			'nav'=>$nav,
    		)
    	);
		return $this->fetch();	
	}
	
}