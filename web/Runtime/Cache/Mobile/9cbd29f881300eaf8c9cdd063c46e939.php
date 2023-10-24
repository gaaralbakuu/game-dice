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

</head>
<body class="bg_fff">
	<header data-am-widget="header"class="am-header am-header-default header nav_bg am-header-fixed">
		<div class="am-header-left am-header-nav">
			<a href="javascript:history.back(-1);" class="">
				<i class="iconfont icon-arrow-left"></i>
			</a>
      	</div>

		<h1 class="am-header-title activity_h1">
			晋级奖励
		</h1>
	</header>
	
	<div class="promotion_img">
		<img src="/Template/Mobile/images/banner1.png" alt="">
	</div>
 	<div class="promotion_grade">
		<p>
			<span>当前等级：</span>	
			<em><?php echo ($userinfo["groupname"]); ?></em>
		</p>
		<p>
			<span>上次晋级等级：</span>
			<?php if(($_SESSION['userinfo']) != ""): ?><em><?php if(empty($jjlist[0]['groupid'])): ?>VIP1<?php else: ?>VIP<?php echo ($jjlist[0]['groupid']); endif; ?></em><?php endif; ?>
		</p>
		<p>
			<span>晋级奖励：</span>
			<?php if(($_SESSION['userinfo']) != ""): ?><em><?php if(empty($jlje)): ?>0.00 <?php else: echo ($jlje); endif; ?>元</em><?php endif; ?>
		</p>
	</div>
	
	<div class="promotion_btn" style="font-size: 18px;margin-bottom: 20px;border-bottom:0;border-radius: 2px;overflow: hidden;">
		<?php if(!empty($_SESSION['userinfo'])): if(($jlje) == "0"): ?><strong><a href="javascript:void(0);" class="btn no_login_btn" style="font-size: 18px;">无奖励</a></strong>
				<?php else: ?>
				<strong style="background-color: #67C23A;"><a style="color: white;font-size: 18px;" href="javascript:void(0);" class="btn btn-danger" onclick="jiangli();" >点击领取奖励</a></strong><?php endif; ?>
			<?php else: ?>
			<strong><a href="<?php echo U('Public/login');?>" class="btn no_login_btn">未登录</a></strong><?php endif; ?>
	</div>
	<?php if(!empty($_SESSION['userinfo'])): ?><table class="am-table am-table-bordered am-table-sss">
			<tbody>
			<tr><th>领取时间</th><th>晋级名称</th><th>晋级积分</th><th>领取奖励</th><th>状态</th></tr>
			<?php if(is_array($jjlist)): $i = 0; $__LIST__ = $jjlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["groupname"] != '' ): ?><tr><td><?php echo (date("m-d H:i",$vo["oddtime"])); ?></td>
					<td><?php echo ($vo["groupname"]); ?></td>
					<td><?php echo ($vo["point"]); ?></td>
					<td><?php echo ($vo["jlje"]); ?></td>
					<td><?php if($vo['shenhe'] == 0): ?><span style="color:grey">审核中</span><?php elseif($vo['shenhe'] == -1): ?><span style="color:red">未通过</span><?php elseif($vo['shenhe'] == 1): ?><span style="color:green">通过</span><?php endif; ?></td></tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table><?php endif; ?>
	<div class="promotion_main">
		<div class="promotion_rule">
			<h2 class="promotion_h2">
				普级机制
			</h2>
			<table class="am-table am-table-bordered">
				<thead>
					<tr>
						<th>等级</th>
						<th>成长积分</th>
						<th>晋级奖励</th>
						<th>跳级奖励</th>
					</tr>
				</thead>
				<tbody>
				<?php if(is_array($allbili)): $i = 0; $__LIST__ = $allbili;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><tr>
						<td><?php echo ($value["groupname"]); ?></td>
						<td><?php echo ($value["shengjiedu"]); ?></td>
						<td><?php echo ($value["jjje"]); ?></td>
						<td><?php echo ($value["tiaoji"]); ?></td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
		</div>
		<div class="promotion_explain">
			<h2 class="promotion_h2">
				活动说明
			</h2>
			<p>1、会员每晋升一个等级，都能获得奖励，最高可达<?php echo ($maxjlje); ?>元。</p>
			<p>2、充值1元可获得1成长积分。</p>
			<br />
			<p>例1：奥巴马从VIP1直接晋升到VIP4，他将能获得1+5+10=16元奖励。</p>
			<p>例2：本拉登从VIP2直接晋升到VIP4，他将能获得5+10=15元奖励。</p>
			<br />
		</div>
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
	<script type="text/javascript">
		function jiangli(){
			$.post("<?php echo U('Activity/jinji');?>",'', function(json){
				if(json.status==1){
					alert(json.info);
					window.location.reload();
				}else{
					alert(json.info);
				}
			},'json');
			return false;
		}
	</script>
</body>
</html>