<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\AdminArticle;
use think\facade\Cache;
class Articlelst extends Controller
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
    public function index($id)
    {
        $article = new AdminArticle;
        $site =Cache::get('site');
        $nav = Cache::get('nav');
        $article = Cache::get('article');
        if(!Cache::get('article')){
           $articleRes = $article->getAticleId($id);
        }
    	$this->assign(
    		array(
    			'site'=>$site,

    			'nav'=>$nav,

                'article' => $article,
    		)
    	);

    	return $this->fetch();
    }



}

