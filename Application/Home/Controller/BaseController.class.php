<?php 
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
    protected $errorMessage='';
    public function _initialize(){
        $mLink = D('FriendLink');
        $link = $mLink->getLink();
        
        session('link',$link);
       
        $lanId = I('lan_id')?I('lan_id'):2;
        session('lanId',$lanId);
        
        $announce = D('Announce')->getAnnounce();
        
        $this->assign('announce',$announce)
             ->assign('session_user_no',ss_h_uno())
             ->assign('session_user_name',session('userName'))
             ->assign('lang_id',ss_lanid());
        
        $this->assign('nav',D('Category')
             ->get_article_category())
             ->assign('lan',D('Language')->getLan())
             ->assign('link',session('link'));
    }

	/**
	 * 404错误页面
	 * <br>满足测试条件则转向404页面
	 * @param bollean $test 测试条件
	 */
//	public function _404(){
//        if(!$message) return;
//            dump($message);
//           die;
//            $this->redirect('Index/error');
//	}

    public function errorPage($massage){
//        dump($massage);
        if(!$massage) return;
        $this->assign('message',$massage);
        $this->display('Public/errorPage');
    }
}

?>