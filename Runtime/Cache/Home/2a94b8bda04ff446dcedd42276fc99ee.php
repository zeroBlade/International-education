<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-COMPATIBLE">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="/SIS.JXNU-B/Public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="/SIS.JXNU-B/Public/assets/global/styles/public.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE STYLES -->
        <!-- [if IE] -->
        <!--  <script src="/SIS.JXNU-B/Public/assets/global/plugins/ie8/html5shiv.min.js" type="text/javascript"></script> -->
        <script src="/SIS.JXNU-B/Public/assets/global/plugins/ie8/respond.min.js" type="text/javascript"></script>
        <!--  <link rel="stylesheet" href="/SIS.JXNU-B/Public/assets/global/styles/ie8-fix.css" type="text/css"/>-->
        <!-- [endif] -->

        
    <link rel="stylesheet" type="text/css" href="/SIS.JXNU-B/Public/assets/global/plugins/zm-rotation/zm-rotation.css"/>
    <link href="/SIS.JXNU-B/Public/assets/pages/styles/index.css" rel="stylesheet" type="text/css"/>

        <!-- END PAGE STYLES -->
        <title>国际教育学院</title>
    </head>
    <body>
        <div class="container container-fluid">
            <div class="top-header">
                <div class="row">
                    <div class="col-md-2">
                        <?php  echo date("Y年m月d日",time()); $weekday = array(日,一,二,三,四,五,六); echo "&nbsp"; echo "&nbsp"; echo "&nbsp"; echo "星期".$weekday[date(w)]; ?>
                    </div>
                    
                    <div class="col-md-6">
                        <marquee>
                            <?php if(empty($announce)): ?><b style="color:#fff;">暂无重要公示~</b>
                            <?php else: ?>

                                <?php if(is_array($announce)): $i = 0; $__LIST__ = $announce;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(empty($vo['link'])): echo ($vo['content']); ?>
                                    <?php else: ?>
                                        <a href="http://<?php echo ($vo['link']); ?>"><?php echo ($vo['content']); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
                        </marquee>
                    </div>
                
                    <div class="col-md-4">
                        <div class="user">
                            <?php if(empty($session_user_no)): ?><span class="login-btn">
                                    <a href="<?php echo U('User/login');?>" title="网站特定栏目仅供学院内学生访问，需先登录">
                                        <?php if(($lang_id) == "2"): ?>学生登录
                                        <?php else: ?>
                                            Login<?php endif; ?>
                                    </a>
                                </span>
                            <?php else: ?>
                                <span class="logout-btn">
                                    <a href="<?php echo U('Home/User/userLogout');?>">
                                        <?php if(($lang_id) == "2"): ?>退出
                                            <?php else: ?>
                                            Logout<?php endif; ?>
                                    </a>
                                </span>
                                <span class="admin">
                                    <a href="<?php echo U('Home/User/pwd');?>">
                                        <?php if(($lang_id) == "2"): ?>修改密码
                                            <?php else: ?>
                                            Change Key<?php endif; ?>
                                    </a>
                                </span><?php endif; ?>
                            
                            <span class="admin">
                                <a href="<?php echo U('Score/score');?>" title="留学生查成绩入口">
                                    <?php if(($lang_id) == "2"): ?>留学生入口
                                        <?php else: ?>
                                        Check Grade<?php endif; ?>
                                </a>
                            </span>
                            
                            <span class="admin">
                                <a href="<?php echo U('System/HyStart/login');?>">
                                    <?php if(($lang_id) == "2"): ?>后台管理
                                        <?php else: ?>
                                        Admin<?php endif; ?>
                                </a>
                            </span>
                            
                            <?php if(empty($session_user_name)): else: ?>
                                <span class="login-welcome">
                                    |&nbsp;
                                    <?php if(($lang_id) == "2"): ?>欢迎你!
                                    <?php else: ?>
                                        Welcome!<?php endif; ?>
                                    &nbsp;<?php echo ($session_user_name); ?>
                                </span><?php endif; ?>

                        </div>
                    </div>

                </div>
            </div>
           
            <div class="header">
                <img src="/SIS.JXNU-B/Public/assets/global/img/back-roll.jpg" alt="江西师范大学">
            </div>
           
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                        <ul class="nav navbar-nav">
                            <li>
                                <a href="<?php echo U('Index/index');?>">首页</a>
                            </li>
                            <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if(empty($v['children'])): ?><li>
                                        <a title="<?php echo ($v["name"]); ?>" href="<?php echo U('Article/category',array('category_id'=> $v['id'],'lan_id'=>$v['language_id']));?>"><?php echo (mb_substr($v['name'],0,5,'UTF8')); ?>
                                            <span class="sr-only"></span>
                                        </a>
                                    </li>
                                <?php else: ?>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" title=""><?php echo (mb_substr($v['name'],0,5,'UTF8')); ?></a>
                                        <ul class="dropdown-menu">
                                            <?php if(is_array($v['children'])): $i = 0; $__LIST__ = $v['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ch): $mod = ($i % 2 );++$i; if(($ch["name"]) == "精品课程"): ?><li>
                                                        <a href="http://www.sisjxnu.com/index.php/Home/GoodCourse/course.html" title=""><?php echo ($ch['name']); ?></a>
                                                    </li>
                                                <?php else: ?>
                                                    <li>
                                                        <a href="<?php echo U('Article/category',array('category_id'=> $ch['id'],'lan_id'=>$v['language_id']));?>" title=""><?php echo ($ch['name']); ?>
                                                        </a>
                                                    </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                        </ul>
                                    </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <form class="navbar-form navbar-left " role="search" action="<?php echo U('Article/searchShow');?>" method="post">
                                <div class="form-group  input-group-sm">
                                    <input type="text" name ="search" class="form-control input-group-sm" placeholder="搜索相关文章"></div>
                                <button type="submit" class="btn btn-default btn-sm">搜索</button>
                            </form>
                        </ul>
                    </div>

                    <!-- /.navbar-collapse --> 
                </div>
            </nav>
       
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        
    <div class="row">
        <div class="col-md-7">
            <div class="news-player">
                <div class="zm-rotation">
                    <ul class="rotation-list">
                        <?php if(is_array($picUrl)): $i = 0; $__LIST__ = $picUrl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                                <a href="<?php echo U('Article/detail',array('content_id'=>$vo['content_id'],'lan_id'=>$se_lan_id));?>"><?php echo ($vo['url']); ?></a>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <div class="rotation-title"></div>
                    <a href="javascript:;" class="rotation-text"></a>
                    <div class="rotation-focus"></div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="block">
                <div class="block-title">
                    <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>
                    学院动态
                </div>
                <div class="block-content">
                    <ul>
                        <?php if(empty($news)): ?><li>暂无动态</li>
                            <?php else: ?>
                            <?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                                    <div class="notice-list">
                                        <img src="/SIS.JXNU-B/Public/assets/global/img/ico_17.jpg">
                                        <a href="<?php echo U('Article/detail',array('content_id'=> $vo['id'],'lan_id'=>$lang_id));?>">
                                            <?php if(($lang_id) == "2"): echo (mb_substr($vo['title'],0,18,'UTF-8')); ?>..
                                                <?php else: ?>
                                                <?php echo (mb_substr($vo['title'],0,30,'UTF-8')); ?>...<?php endif; ?>
                                        </a>
                                        <span class="notice-time pull-right hidden-xs"><?php echo (date('m-d',$vo['create_time'])); ?></span>
                                    </div>
                                </li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="block">
                <div class="block-title">
                    <span class="glyphicon glyphicon-tree-conifer" aria-hidden="true"></span>
                    本科生教育
                </div>
                
                <div class="block-content">
                    <ul>
                        <?php if(is_array($benke)): $i = 0; $__LIST__ = $benke;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bk): $mod = ($i % 2 );++$i;?><li>
                                <img src="/SIS.JXNU-B/Public/assets/global/img/ico_17.jpg">
                                <a href="<?php echo U('Article/detail',array('content_id'=> $bk['id'],'lan_id'=>$lang_id));?>"><?php echo (mb_substr($bk['title'],0,19,'UTF-8')); ?>
                                </a>
                                <div class="time"><?php echo (date('m-d',$bk['create_time'])); ?></div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>

                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="block block-yjs">
                <div class="block-title">
                    <span class="glyphicon glyphicon-education" aria-hidden="true"></span>
                    研究生教育
                </div>
                <div class="block-content">
                    <ul>
                        <?php if(is_array($yanjiusheng)): $i = 0; $__LIST__ = $yanjiusheng;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$yjs): $mod = ($i % 2 );++$i;?><li>
                                <img src="/SIS.JXNU-B/Public/assets/global/img/ico_17.jpg">
                                <a href="<?php echo U('Article/detail',array('content_id'=> $yjs['id'],'lan_id'=>$lang_id));?>"><?php echo (mb_substr($yjs['title'],0,25,'UTF-8')); ?>
                                </a>
                                <div class="time"><?php echo (date('m-d',$yjs['create_time'])); ?></div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>

            <!--专题展示-->
            <div class="block topic-block" style="display:none;">
                <div class="box-title">
                    <span class="glyphicon glyphicon-gift"></span>
                    <?php if(($lang_id) == "2"): ?>专题展示
                        <?php else: ?>
                        Topic<?php endif; ?>
                    <span class="more">
                        <a href="javascript:;" class="pull-right hidden-xs hidden-sm back">
                            <?php if(($lang_id) == "2"): ?>返回
                                <?php else: ?>
                                Back<?php endif; ?>
                        </a>
                    </span>
                    <span class="more more-icon">
                        <a href="" class="pull-right"> <i class="glyphicon glyphicon-share"></i>
                        </a>
                    </span>
                </div>
                <div class="block-content">
                    <div class="box-center-content">
                        <div class="topic-pic">
                            <a target="_blank" href="<?php echo ($topic['url']); ?>" title="<?php echo ($topic['name']); ?>">
                                <br>
                                <img style="height: 0" src="/SIS.JXNU-B/Public/uploads/<?php echo ($topic['path']); ?>" alt=""/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="four-block">
                <?php if(($array_count) == "3"): ?><div class="box-right">
                        <?php if(($lang_id) == "2"): ?><ul class="box-nav">
                                <?php if(is_array($subNav)): $i = 0; $__LIST__ = $subNav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($vo['id']); ?>">
                                        <a href="<?php echo U($vo['url']);?>" ><?php echo ($vo['name']); ?></a>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <li class="topic">
                                    <a href="javascript:;" >
                                        <?php if(($lang_id) == "2"): ?>专题
                                            <br>
                                            展示
                                            <?php else: ?>
                                            Topic Show<?php endif; ?>
                                    </a>
                                </li>
                            </ul>
                            <?php else: ?>
                            <ul class="box-nav2">
                                <?php if(is_array($subNav)): $i = 0; $__LIST__ = $subNav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($vo['id']); ?>">
                                        <a href="<?php echo U($vo['url']);?>" ><?php echo ($vo['name']); ?></a>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <li style="margin-left: 0px;" class="topic">
                                    <a href="javascript:;" >Topic Show</a>
                                </li>
                            </ul><?php endif; ?>
                    </div>
                    <?php else: ?>

                    <!--       <div class="box-right">
                    <?php if(($lang_id) == "2"): ?><ul class="box-nav">
                            <?php if(is_array($subNav)): $i = 0; $__LIST__ = $subNav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($vo['id']); ?>">
                                    <a href="<?php echo U($vo['url']);?>" ><?php echo ($vo['name']); ?></a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            <li class="topic">
                                <a href="javascript:;" >
                                    <?php if(($lang_id) == "2"): ?>专题
                                        <br>
                                        展示
                                        <?php else: ?>
                                        Topic Show<?php endif; ?>
                                </a>
                            </li>
                        </ul>
                        <?php else: ?>
                        <ul class="box-nav2">
                            <?php if(is_array($subNav)): $i = 0; $__LIST__ = $subNav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($vo['id']); ?>">
                                    <a href="<?php echo U($vo['url']);?>" ><?php echo ($vo['name']); ?></a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            <li style="margin-left: 0px;" class="topic">
                                <a href="javascript:;" >Topic Show</a>
                            </li>
                        </ul><?php endif; ?>
                </div>
                --><?php endif; ?>
            </div>
        </div>
   
        <div class="clear"></div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="block">
                <div class="block-title">
                    <span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>
                    学生工作
                </div>
                <div class="block-content">
                    <ul>
                        <?php if(is_array($xuesheng)): $i = 0; $__LIST__ = $xuesheng;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xs): $mod = ($i % 2 );++$i;?><li>
                                <img src="/SIS.JXNU-B/Public/assets/global/img/ico_17.jpg">
                                <a href="<?php echo U('Article/detail',array('content_id'=> $xs['id'],'lan_id'=>$lang_id));?>"><?php echo (mb_substr($xs['title'],0,17,'UTF-8')); ?>
                                </a>
                                <div class="time"><?php echo (date('m-d',$xs['create_time'])); ?></div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="block">
                <div class="block-title">
                    <span class="glyphicon glyphicon-screenshot" aria-hidden="true"></span>
                    科学研究
                </div>
                <div class="block-content">
                    <ul>
                        <?php if(is_array($keyan)): $i = 0; $__LIST__ = $keyan;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ky): $mod = ($i % 2 );++$i;?><li>
                                <img src="/SIS.JXNU-B/Public/assets/global/img/ico_17.jpg">
                                <a href="<?php echo U('Article/detail',array('content_id'=> $ky['id'],'lan_id'=>$lang_id));?>"><?php echo (mb_substr($ky['title'],0,27,'UTF-8')); ?>
                                </a>
                                <div class="time"><?php echo (date('m-d',$ky['create_time'])); ?></div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="link">
                <div class="link-img">
                    <img src="/SIS.JXNU-B/Public/assets/global/img/link-img.png" alt=""></div>
                <div class="link-text">
                    <table>
                        <tr>
                            <td>
                                <a href="">办公系统</a>
                            </td>
                            <td>
                                <a href="">教务在线</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="">图书馆</a>
                            </td>
                            <td>
                                <a href="">社科处</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="">研究生院</a>
                            </td>
                            <td>
                                <a href="">科技处</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="">招生就业</a>
                            </td>
                            <td>
                                <a href="">学生工作网</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

                    </div>
                </div>
            </div>

            <div class="footer">
                <table>
                    <tr>
                        <td>
                            <a href="http://www.jxnu.edu.cn/" target="_blank">江西师范大学</a>

                            <a href="http://jwc.jxnu.edu.cn/" target="_blank">师大教务在线</a>

                            <a href="http://rsc.jxnu.edu.cn/" target="_blank">江西师大人事网</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            Copyright&copy;
                            <?php echo date('Y',time()); ?>江西师范大学国际教育学院 学院地址：江西省南昌市紫阳大道99号 邮政编码：330022</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            联系电话：0791-8120460 赣ICP备11002450号-1  &nbsp;    技术支持：江西师范大学计算机信息工程学院宏奕工作室
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- BEGIN CORE PLUGIN -->
        <script src="/SIS.JXNU-B/Public/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="/SIS.JXNU-B/Public/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/SIS.JXNU-B/Public/assets/global/plugins/bootbox.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGIN -->

        <script type="text/javascript">
            /* GLOBAL URL */
            var _ROOT_ = '/SIS.JXNU-B',
                    _PUBLIC_ = '/SIS.JXNU-B/Public',
                    _INDEX_ = '/SIS.JXNU-B/index.php',
                    _ACTION_ = '/SIS.JXNU-B/index.php/Home/Index/index',
                    _MODULE_ = '/SIS.JXNU-B/index.php/Home',
                    _CONTROLLER_ = '/SIS.JXNU-B/index.php/Home/Index';
        </script>
        <script type="text/javascript">
            window._ROOT_='/SIS.JXNU-B';
            window._APP_='/SIS.JXNU-B/index.php';
            window._ACTION_='<?php echo U("");?>';
            window._SELF_='<?php echo urldecode("/SIS.JXNU-B/");?>';
        </script>
        <!-- BEGIN CORE SCRIPTS -->
        <script src="/SIS.JXNU-B/Public/assets/global/scripts/public.js" type="text/javascript"></script>
        <!-- END CORE SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        
    <script type="text/javascript" src="/SIS.JXNU-B/Public/assets/global/plugins/zm-rotation/jquery.zmrotation.js"></script>
    <script type="text/javascript" src="/SIS.JXNU-B/Public/assets/pages/scripts/index_home.js"></script>

        
    <script type="text/javascript">
        $(document).ready(function(){
            $(".zm-rotation").zmRotation({height: 250});
        }); 
          $(document).ready(function(){
                IndexShow.init();
            });
    </script>

        <!-- END PAGE LEVEL SCRIPTS -->
    </body>
</html>