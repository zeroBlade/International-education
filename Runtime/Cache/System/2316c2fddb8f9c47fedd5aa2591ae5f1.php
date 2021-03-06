<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 8]> <html lang="zh-CN" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="zh-CN" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zh-CN">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php if(empty($pageTitle)): echo S('SITE_ADMIN_TITLE'); else: echo ($_pageTitle); ?> - <?php echo S('SITE_ADMIN_TITLE'); endif; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="<?php echo S('SITE_ADMIN_KEYWORDS');?>" name="keywords"/>
<meta content="<?php echo S('SITE_ADMIN_DESCRIPTION');?>" name="description"/>
<meta content="HomyitStudio" name="author"/>
<!-- BEGIN PAGE LOAD PROGRESSBAR -->
<script src="/SIS.JXNU-B/Public/assets/global/plugins/pace/pace.custom.min.js" type="text/javascript"></script>
<link href="/SIS.JXNU-B/Public/assets/global/plugins/pace/themes/blue/pace-theme-flat-top.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LOAD PROGRESSBAR -->
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="/SIS.JXNU-B/Public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="/SIS.JXNU-B/Public/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="/SIS.JXNU-B/Public/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="/SIS.JXNU-B/Public/assets/pages/styles/login.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="/SIS.JXNU-B/Public/assets/global/styles/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="/SIS.JXNU-B/Public/assets/global/styles/plugins.css" rel="stylesheet" type="text/css"/>
<link href="/SIS.JXNU-B/Public/assets/layout/styles/layout.css" rel="stylesheet" type="text/css"/>
<link href="/SIS.JXNU-B/Public/assets/layout/styles/themes/blue.css" rel="stylesheet" type="text/css"/>
<link href="/SIS.JXNU-B/Public/assets/global/styles/hyframe.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="hy-page-login">
<!-- BEGIN LOGO -->
<div class="logo">
	<div class="login-img hidden-480"></div>
	<div class="display-none title-480">江西师范大学<br><p>学生工作综合服务平台</p></div>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form">
		<h3 class="form-title">系统登录</h3>
		<div class="form-alert"></div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">用户名</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control" type="text" autocomplete="off" placeholder="您的账号" name="hy_username"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">密　码</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="密　码" name="hy_password"/>
			</div>
		</div>
		<div class="form-actions overflow-hidden">
			<label class="checkbox pull-left">
			<input type="checkbox" name="remember"/> 记住我 </label>
			<button type="submit" class="btn blue pull-right">
			登录 <i class="m-icon-swapright m-icon-white"></i>
			</button>
            <input type="hidden" id="login-addon" value="<?php echo C('PWD_HASH_ADDON');?>" />
            <input type="hidden" id="login-key" value="<?php echo session('LOGIN_KEY');?>" />
		</div>
		<div class="forget-password">
			<h4><a href="javascript:;" id="forget-password" title="点击重置密码" ><i>忘记密码？</i></a></h4>
		</div>
	</form>
	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form">
		<h3 class="form-title">找回密码</h3>
		<div class="form-alert"></div>
		<p>
			 请填入系统“个人信息”中留的邮箱地址
		</p>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">用户名</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control" type="text" autocomplete="off" placeholder="您的学号或者工号" name="forget_username"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">邮箱</label>
			<div class="input-icon">
				<i class="fa fa-envelope"></i>
				<input class="form-control" type="text" autocomplete="off" placeholder="Email" name="forget_email"/>
			</div>
		</div>
		<div class="display-none after-send">		
			<div class="form-group">
				<label class="control-label visible-ie8 visible-ie9">验证码</label>
				<div class="input-icon">
					<i class="fa fa-check"></i>
					<input class="form-control" type="text" autocomplete="off" placeholder="您收到的验证码" name="forget_verify"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label visible-ie8 visible-ie9">新密码</label>
				<div class="input-icon">
					<i class="fa fa-lock"></i>
					<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="新密码" name="forget_password"/>
				</div>
			</div>
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn">
			<i class="m-icon-swapleft"></i> 返回 </button>
			<button type="submit" class="btn blue pull-right">
			确认 <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	 2015 &copy; 江西师范大学计算机信息工程学院 <span class="visible-xs-inline"><br></span>宏奕工作室（Homyit Studio）
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="/SIS.JXNU-B/Public/assets/global/plugins/respond.min.js"></script>
<script src="/SIS.JXNU-B/Public/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="/SIS.JXNU-B/Public/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/SIS.JXNU-B/Public/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/SIS.JXNU-B/Public/assets/global/plugins/jquery.blockui.js" type="text/javascript"></script>
<script src="/SIS.JXNU-B/Public/assets/global/plugins/store-json2.min.js" type="text/javascript"></script>
<script src="/SIS.JXNU-B/Public/assets/global/plugins/crypto.custom.min.js" type="text/javascript"></script>
<script src="/SIS.JXNU-B/Public/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN CORE SCRIPTS -->
<script type="text/javascript">
/* GLOBAL URL */
var _ROOT_ = '/SIS.JXNU-B',
    _PUBLIC_ = '/SIS.JXNU-B/Public',
    _INDEX_ = '/SIS.JXNU-B/index.php',
    _ACTION_ = '/SIS.JXNU-B/index.php/System/HyStart/login',
    _MODULE_ = '/SIS.JXNU-B/index.php/System',
    _CONTROLLER_ = '/SIS.JXNU-B/index.php/System/HyStart';
</script>
<script src="/SIS.JXNU-B/Public/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/SIS.JXNU-B/Public/assets/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/SIS.JXNU-B/Public/assets/global/scripts/hyframe.js" type="text/javascript"></script>
<!-- END CORE SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/SIS.JXNU-B/Public/assets/global/plugins/jquery-validation/jquery.validate.min.js" type="text/javascript"></script>
<script src="/SIS.JXNU-B/Public/assets/global/plugins/jquery.backstretch.min.js" type="text/javascript"></script>
<script src="/SIS.JXNU-B/Public/assets/pages/scripts/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script type="text/javascript">
jQuery(document).ready(function() {
    Metronic.init();
    Layout.init();
    Login.init();
});
</script>
<!-- END JAVASCRIPTS -->
<!-- BEGIN ANALYTICS -->
<div class="hidden">
<script type="text/javascript">
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?41c66ca2d9e89051b8f673b25979b6a0";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</div>
<!-- END ANALYTICS -->
</body>
<!-- END BODY -->
</html>