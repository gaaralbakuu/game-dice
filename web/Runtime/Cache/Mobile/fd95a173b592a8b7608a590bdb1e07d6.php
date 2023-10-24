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
<body>
    <style type="text/css">
            .mynav1{
        color:#999 !important;
    }
    .mynav2{
color:#999 !important;
    }
    .mynav3{
color:#999 !important;
    }
    .mynav4{
color:#999 !important;
    }
    .mynav5{
color:#eb000e !important;
    }
    </style>
<header data-am-widget="header"class="am-header am-header-default header nav_bg am-header-fixed">
    <h1 class="am-header-title userHome_h1">
        我的账户
    </h1>
    <div class="am-header-right am-header-nav header_down">
        <a href="<?php echo GetVar('kefuthree');?>" style="width: 70px; height: 50px; padding-right: 10px; position: absolute;right: 0px;top: 0px;color: white;font-size: 14px;">
        <img src="/app/mykefu.png" style="width: 24px;height: 24px; display: inline-block;">
        <span style="vertical-align: middle;">客服</span>
    </a>
    </div>
</header>

<div class="my_header">
    <div class="my_info am-cf">
        <div class="img am-fl">
            <img src="<?php echo ($userinfo['face']); ?>" class="am-radius" alt="">
        </div>
        <div class="am-fl my_header_content">
            <p>账号：<em><?php echo ($userinfo['username']); ?></em></p>
			<!-- <span class="hide_text">已隐藏</span><em class="show_money" ></em> <a class="hide_money" href="javascript:void(0);">隐藏</a><strong class="show_money_btn">显示</strong> -->
            <p>余额：<?php echo ($userinfo['balance']); ?> </p>
			 <!-- <p>洗码：<?php echo ($userinfo['xima']); ?> </p> -->
        </div>
        <i class="iconfont icon-shuaxin am-fr my_home_refresh" style="display: block;"></i>
    </div>
    <div class="my_operation_money">
        <ul class="am-avg-sm-4">
            <li>
                <a href="<?php echo U('Account/rechargeList');?>">
                    <i class="iconfont icon-chongzhi"></i>
                    <em>我要充值</em>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Account/withdrawals');?>">
                    <i class="iconfont icon-tixian"></i>
                    <em>我要提现</em>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Account/dealRecord');?>">
                    <i class="iconfont icon-jiaoyijilu"></i>
                    <em>交易记录</em>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Member/betRecord');?>">
                    <i class="iconfont icon-touzhujilu"></i>
                    <em>投注记录</em>
                </a>
            </li>
        </ul>
    </div>
</div>

<ul class="my_set_list">
    <li>
        <a href="<?php echo U('Member/personalInfo');?>" class="am-cf">
            <i class="iconfont icon-wode square_bg"></i>
            <span>个人信息</span>
            <i class="iconfont icon-arrowright"></i>
        </a>
    </li>
  <!-- <?php if(($userinfo['proxy']) == "1"): ?>-->
    <li>
        <a href="<?php echo U('Member/agent');?>" class="am-cf">
            <i class="iconfont icon-qian square_bg" style="background: #dd514c;"></i>
            <span>代理中心</span>
            <i class="iconfont icon-arrowright"></i>
        </a>
    </li>
  <!--<?php endif; ?>-->
    <li>
        <a href="<?php echo U('Member/setting');?>" class="am-cf">
            <i class="iconfont icon-safe square_bg"></i>
            <span>安全中心</span>
            <i class="iconfont icon-arrowright"></i>
        </a>
    </li>
	<li>
        <a href="/Activity.index.do" class="am-cf">
            <i class="iconfont icon-giftfill square_bg" style="background:#f37b1d;"></i>
            <span>活动中心</span>
            <i class="iconfont icon-arrowright"></i>
        </a>
    </li>
<!-- 	 <li>
        <a href="<?php echo U('Member/trans');?>" class="am-cf">
            <i class="iconfont icon-shuju square_bg"></i>
            <span>额度转换</span>
            <i class="iconfont icon-arrowright"></i>
        </a>
    </li> -->
    <li>
        <a href="<?php echo U('Account/todayLoss');?>" class="am-cf">
            <i class="iconfont icon-shuju square_bg"></i>
            <span>今日盈亏</span>
            <i class="iconfont icon-arrowright"></i>
        </a>
    </li>
    <li>
        <a href="<?php echo U('Member/gglist');?>" class="am-cf">
            <i class="iconfont icon-tubiao15 square_bg"></i>
            <span>平台公告</span>
            <i class="iconfont icon-arrowright"></i>
        </a>
    </li>
</ul>
<div class="security_close">
    <a href="javascript:if(confirm('是否退出？'))location='<?php echo U('Public/LoginOut');?>'" class="am-cf">
        <span>退出登录</span>
        <i class="iconfont icon-arrowright am-fr"></i>
    </a>
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
<script>
    

    
</script>
</body>
</html>