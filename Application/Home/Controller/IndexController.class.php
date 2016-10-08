<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {

	public function _initialize(){
        parent::_initialize();
	}

    public function index(){
        $mFriendLink = D('friend_link');
        $topic=$mFriendLink->getTopicLink();
        $mBanner = D('Banner');
    	$banner=$mBanner->getBanner();
        $mCategory = D('Category');
        $subNav=$mCategory->getSubNav();
        $mDetail = D('Details');
        $picUrl = $mDetail->get_first_img();
        $wishes=$mDetail->getDetails2('领导致辞');
        $news=$mDetail->getDetails('学院新闻');
        $notice = $mDetail->getDetails2('师生风采');
//         $announce = D('Announce')->getAnnounce();
/* 后来修改 */
        $benkejiaoyu = $mDetail->getDetails2('教学动态');
        $yanjiushengjiaoyu = $mDetail->getDetails2('新闻动态');
        $xueshengzuzhi = $mDetail->getDetails2('学生组织');
        $keyandongtai = $mDetail->getDetails2('科研动态');
        
        $this->assign('benke',$benkejiaoyu)
            ->assign('yanjiusheng',$yanjiushengjiaoyu)
            ->assign('xuesheng',$xueshengzuzhi)
            ->assign('keyan',$keyandongtai);
        
        
/* 后来修改 */
        foreach($subNav as $k=>&$v) {
            switch ($v['name']) {
                case '互动平台' :
                    $subNav[$k]['url'] = 'Question/questionList';
                    $v['name'] = "互动"."<br>"."平台";
                    break;
                case '课程建设' :
                    $subNav[$k]['url'] = 'GoodCourse/course';
                     $v['name'] = "课程"."<br>"."建设"; 
                    break;
				case '家委之窗' :
					 $subNav[$k]['url'] = 'Home/Article/category/category_id/33/lan_id/'.ss_lanid();
					 $v['name'] = "家委"."<br>"."之窗";
					 break;
                default:
                    $subNav[$k]['url'] = 'Home/Article/category/category_id/'.M('category')->where(array('pid'=>$v['id'],'status'=>array('eq',1)))->getField('id').'/lan_id/'.ss_lanid();
            }
        }
        $this->assign('topic',$topic)
            ->assign('picUrl',$picUrl)
            ->assign('banner',$banner)
            ->assign('subNav',$subNav)
            ->assign('wishes',$wishes)
            ->assign('news',$news)
            ->assign('notice',$notice)
            ->assign('se_lan_id',ss_lanid())
            ->assign('array_count',count($subNav))
            ->display();
    }
    
}