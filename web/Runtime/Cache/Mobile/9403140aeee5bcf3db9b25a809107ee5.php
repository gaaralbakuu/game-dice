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

<link rel="stylesheet" href="/Template/Mobile/css/activity.css">
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
color:#eb000e !important;
    }
    .mynav5{
color:#999 !important;
    }
    </style>
	<header data-am-widget="header"class="am-header am-header-default header nav_bg am-header-fixed">
		<h1 class="am-header-title activity_h1">
			活动中心
		</h1>
	</header>
	
	<div class="activity_list">
		<a href="<?php echo U('Activity/promotion');?>" class="am-cf am-block">
			<div class="activity_list1 am-fl">
				<em>1</em>
			</div>
			<div class="activity_list2 am-fl">
				<p>晋级奖励</p>
				<em>会员每晋升一个等级，都能获得奖励，最高可达38888元。</em>
			</div>
			<div class="activity_list3 am-fr">
				<i class="iconfont icon-arrowright"></i>
			</div>
		</a>
	</div>

	<div class="activity_list">
		<a href="<?php echo U('Activity/everydayPlus');?>" class="am-cf am-block">
			<div class="activity_list1 am-fl bg_green">
				<em class="bg_green">2</em>
			</div>
			<div class="activity_list2 am-fl">
				<p>每日加奖</p>
				<em>每日加奖是根据会员昨日投注金额进行加奖，奖金无上限。</em>
			</div>
			<div class="activity_list3 am-fr">
				<i class="iconfont icon-arrowright"></i>
			</div>
		</a>
	</div>
<div class="activity_list">
		<a href="<?php echo U('Activity/s3');?>" class="am-cf am-block">
			<div class="activity_list1 am-fl" style="background: #d52ebe!important;">
				<em class="" style="background: #d52ebe!important;">3</em>
			</div>
			<div class="activity_list2 am-fl">
				<p>每月VIP彩金大派送</p>
				<em>会员每月彩金</em>
			</div>
			<div class="activity_list3 am-fr">
				<i class="iconfont icon-arrowright"></i>
			</div>
		</a>
	</div>
	<div class="activity_list">
		<a href="<?php echo U('Activity/s4');?>" class="am-cf am-block">
			<div class="activity_list1 am-fl " style="background: #d52e88!important;">
				<em class="" style="background: #d52e88!important;">4</em>
			</div>
			<div class="activity_list2 am-fl">
				<p>转账彩金</p>
				<em>银行卡.支付宝。微信。转账 送1%彩金</em>
			</div>
			<div class="activity_list3 am-fr">
				<i class="iconfont icon-arrowright"></i>
			</div>
		</a>
	</div>
	<div class="activity_list">
		<a href="<?php echo U('Activity/s4');?>?id=5" class="am-cf am-block">
			<div class="activity_list1 am-fl " style="background: #2196F3!important;">
				<em class="" style="background: #2196F3!important;">5</em>
			</div>
			<div class="activity_list2 am-fl">
				<p>网银充值获大奖</p>
				<em>使用网银转帐充值可领取5%彩金大奖</em>
			</div>
			<div class="activity_list3 am-fr">
				<i class="iconfont icon-arrowright"></i>
			</div>
		</a>
	</div>
	<div class="activity_list">
		<a href="<?php echo U('Activity/s3');?>?id=6" class="am-cf am-block">
			<div class="activity_list1 am-fl " style="background: #3F51B5!important;">
				<em class="" style="background: #3F51B5!important;">6</em>
			</div>
			<div class="activity_list2 am-fl">
				<p>好友推荐</p>
				<em>快互动您的好友一起购彩</em>
			</div>
			<div class="activity_list3 am-fr">
				<i class="iconfont icon-arrowright"></i>
			</div>
		</a>
	</div>
	<div class="activity_list">
		<a href="<?php echo U('Activity/s5');?>?id=7" class="am-cf am-block">
			<div class="activity_list1 am-fl " style="background: #F44336!important">
				<em class="" style="background: #F44336!important">7</em>
			</div>
			<div class="activity_list2 am-fl">
				<p>代理加盟</p>
				<em>全新最优代理合作模式，零风险，零成本，实时获得返点赚取佣金，免流水，随时提现</em>
			</div>
			<div class="activity_list3 am-fr">
				<i class="iconfont icon-arrowright"></i>
			</div>
		</a>
	</div>
	<div class="activity_list">
		<a href="<?php echo U('Activity/show');?>?id=8" class="am-cf am-block">
			<div class="activity_list1 am-fl " style="background: #8BC34A!important">
				<em class="" style="background: #8BC34A!important">8</em>
			</div>
			<div class="activity_list2 am-fl">
				<p>幸运首充</p>
				<em>首次充值送现金【优乐彩票】百发钜惠第一惠隆重推出【秒冲，秒送】存款送现金专题活动</em>
			</div>
			<div class="activity_list3 am-fr">
				<i class="iconfont icon-arrowright">
				</i>
			</div>
		</a>
	</div>

	

	<div class="activity_list">
		<a href="<?php echo U('Activity/s5');?>" class="am-cf am-block">
			<div class="activity_list1 am-fl" style="background: #d52e4a!important;">
				<em class="" style="background: #d52e4a!important;">9</em>
			</div>
			<div class="activity_list2 am-fl">
				<p>全民代理</p>
				<em>诚招代理 0投资 0风险 高回报</em>
			</div>
			<div class="activity_list3 am-fr">
				<i class="iconfont icon-arrowright"></i>
			</div>
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
</body>
</html>