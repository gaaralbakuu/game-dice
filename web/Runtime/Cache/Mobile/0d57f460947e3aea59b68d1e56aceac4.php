<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo GetVar('webtitle');?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=none">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="full-screen" content="yes">
    <meta name="x5-fullscreen" content="true">
    <meta name="screen-orientation" content="portrait">
    <meta name="x5-orientation" content="portrait">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="apple-touch-icon-precomposed" href="/Template/Mobile/images/icon.jpg">
    <link rel="apple-touch-startup-image" href="/Template/Mobile/images/strat.jpg" />
     <link rel="stylesheet" href="/Template/Mobile/css/amazeui.min.css">
    <link rel="stylesheet" href="/Template/Mobile/css/common2.css">
    <link rel="stylesheet" href="/Template/Mobile/css/index.css">
    <link rel="stylesheet" href="/Template/Mobile/css/icon.css">
    <link rel="stylesheet" href="/resources/css/artDialog.css">
    <script>
        var Webconfigs = {
            "ROOT" : ""
        }
    </script>
    </head>
<script src="/Template/Mobile/js/jquery-3.1.1.min.js"></script> 
<script type="text/javascript" src="/resources/js/artDialog.js"></script>
<script type="text/javascript" src="/resources/js/way.min.js"></script>
<script type="text/javascript" src="/resources/main/common.js"></script>
<script src="/Template/Mobile/js/require.js" data-main="/Template/Mobile/js/main"></script>

<link rel="stylesheet" href="/Template/Mobile/css/userHome.css">
<body class="bg_fff">
<header data-am-widget="header"class="am-header am-header-default header nav_bg am-header-fixed">
	<div class="am-header-left am-header-nav">
		<a href="javascript:history.back(-1);" class="">
			<i class="iconfont icon-arrow-left"></i>
		</a>
	</div>
	<div class="winners_tab am-header-title">
		<em class="active" data-title="0">公告</em><!-- <em data-title="1">私信</em> -->
	</div>
</header>
<div data-am-widget="tabs" class="am-tabs am-tabs-d2 billrecord_main">
	<div class="am-tabs-bd">
		<div class="am-tab-panel am-active">
			<div data-am-widget="list_news" class="am-list-news am-list-news-default" >
				<div class="am-list-news-bd">
					<ul class="am-list">
						<?php if(is_array($gglist)): $i = 0; $__LIST__ = $gglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="am-g am-list-item-dated">
								<a href="<?php echo U('Member/ggshow',array('aid'=>$vo['id']));?>">
									<p class="am-cf">
										<span class="what_type am-fl"><?php echo ($vo[title]); ?></span>
									</p>
									<p class="am-cf billrecord_time">
										<span class="am-fl"><?php echo (date('Y-m-d',$vo[oddtime])); ?></span>
									</p>
								</a>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div  class="am-tabs am-tabs-d2 billrecord_main isplay_no">
	<p style="text-align:center;">暂无私信</p>
</div>
<div data-am-widget="navbar" class="am-navbar am-cf am-navbar-default bottom_navbar">
    <ul class="am-navbar-nav am-cf am-avg-sm-5 my_nav_b" style="overflow: visible;">
        <li style="position: relative;">
<!--            <a href="/" class="bottom_navbar_list">-->
            <a href="<?php echo U('Index/index');?>" class="bottom_navbar_list mynav1">
                <i class="iconfont icon-shouyeshouye1"></i>
                <span class="am-navbar-label">首  页</span>
            </a>
        </li>
        <li style="position: relative;">
            <a href="<?php echo U('Member/betRecord.a_item.1.do');?>" class="bottom_navbar_list mynav3">
                <i class="iconfont icon-jinbei"></i>
                <span class="am-navbar-label">投注记录</span>
            </a>
        </li>
        <li style="position: relative;">
            <div class="mynav22" style="width: 100%; text-align: center;position: absolute;top: 0px;left: 0px;">
             <span style="width: 44px;height: 44px;display: inline-block; border-radius: 50%;position: relative;top: -10px; box-shadow: 0 -3px 10px #DCDFE6;background-color: white;"></span>     
            </div>
           
            <a href="<?php echo U('Index.lotteryHall');?>" class="bottom_navbar_list mynav2" style="background-color: white;position: relative;z-index: 100;">
                <i class="iconfont icon-goucaidating"></i>
                <span class="am-navbar-label">购彩大厅</span>
            </a>
        </li>
        <li style="position: relative;">
            <a href="<?php echo U('Index/youhui');?>" class="bottom_navbar_list mynav4">
                <i class="iconfont icon-lipin"></i>
                <span class="am-navbar-label">优惠活动</span>
            </a>
        </li>
        <!--
         <li>
            <a href="<?php echo U('Member/betRecord');?>" class="bottom_navbar_list">
                <i class="iconfont icon-touzhujilu"></i>
                <span class="am-navbar-label">投注记录</span>
            </a>
        </li>
        <li>
            <a href="<?php echo GetVar('kefuthree');?>" class="bottom_navbar_list">
                <i class="iconfont icon-kefu"></i>
                <span class="am-navbar-label">在线客服</span>
            </a>
        </li>
        <li>
            <a href="<?php echo U('Member/index');?>" class="bottom_navbar_list">
                <i class="iconfont icon-wode"></i>
                <span class="am-navbar-label">我的账户</span>
            </a>
        </li>
         -->
        <li style="position: relative;">
            <a href="<?php echo U('Member/index');?>" class="bottom_navbar_list mynav5">
                <i class="iconfont icon-wode"></i>
                <span class="am-navbar-label">我的</span> 
            </a>
        </li>
    </ul>
    
</div>
</body>
</html>