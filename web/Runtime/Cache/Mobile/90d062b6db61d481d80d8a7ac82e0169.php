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
<body class="bg_fff">
	<header data-am-widget="header"class="am-header am-header-default header nav_bg am-header-fixed">
		<div class="am-header-left am-header-nav">
			<a href="javascript:history.back(-1);" class="">
				<i class="iconfont icon-arrow-left"></i>
			</a>
      	</div>

		<h1 class="am-header-title activity_h1">
			每日加奖
		</h1>
	</header>
	
	<div class="promotion_img">
		<img src="/Template/Mobile/images/banner2.png" alt="">
	</div>
	
	<div class="promotion_grade">
		<p>
			<span>当前等级：</span>
			<em><?php echo ($userinfo["groupname"]); ?></em>
		</p>

		<?php if($userinfo["groupid"] != '10'): ?><p>
			<span>昨日投注：</span>	
			<em><?php if(($countamount) == ""): ?>0<?php else: echo ($countamount); endif; ?></em>
		</p>
		<p>
			<span>加奖比例：</span>	
			<em><?php echo ($fanshuibili); ?>%</em>
		</p>
		<p>
			<span>可得加奖：</span>	
			<em><?php if(($jiajiang) == ""): ?>0<?php else: echo ($jiajiang); endif; ?></em></em>
		</p>
	</div><?php endif; ?>
	<div class="promotion_btn" style="background-color: #67C23A;border-bottom: 0px;">
	<?php if(!empty($_SESSION['userinfo'])): if($userinfo["groupid"] != '10'): if(($jiajiang) == ""): ?><strong><a href="javascript:void(0);" class="btn no_login_btn" style="font-size: 18px;">无加奖</a></strong>
			<?php else: ?>
			<strong><a href="javascript:void(0);" class="btn btn-danger" onclick="qingquyongqu();" style="font-size: 18px;color: white;">点击领取加奖</a></strong><?php endif; ?>
			<?php else: ?>
			<strong><a href="javascript:void(0);" class="btn no_login_btn" style="font-size: 18px;">无加奖</a></strong><?php endif; ?>
		<?php else: ?>
		<strong><a href="<?php echo U('Public/login');?>" class="btn no_login_btn">未登录</a></strong><?php endif; ?>
	</div>
	<?php if(!empty($_SESSION['userinfo'])): ?><table class="am-table am-table-bordered am-table-sss">
			<tbody>
			<tr><th>领取时等级</th><th>流水金额</th><th>比例</th><th>金额</th><th>时间</th><th>状态</th></tr>
			<?php if(is_array($lqlist)): $i = 0; $__LIST__ = $lqlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($vo["groupname"]); ?></td>
					<td><?php echo ($vo["touzhuedu"]); ?></td>
					<td><?php echo ($vo["bili"]); ?></td>
					<td><?php echo ($vo["amount"]); ?></td>
					<td><?php echo (date("m-d H:i",$vo["oddtime"])); ?></td>
					<td><?php if($vo['shenhe'] == 0): ?><span style="color:grey">审核中</span><?php elseif($vo['shenhe'] == 1): ?><span style="color:green">通过</span><?php endif; ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table><?php endif; ?>
	<div class="ty_page pages" id="lrx_ty_page"><?php echo ($pageshow); ?></div>
	<div class="promotion_main">
		<div class="promotion_rule">
			<h2 class="promotion_h2">
				加奖比例
			</h2>
			<table class="am-table am-table-bordered">
				<thead>
					<tr>
						<th>等级/投注额</th>
						<?php if(is_array($mintozhu)): $i = 0; $__LIST__ = $mintozhu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><th><?php echo ($value[0]); ?>+</th><?php endforeach; endif; else: echo "" ;endif; ?>
					</tr>
				</thead>
				<tbody>
				<?php if(is_array($bilisss)): $i = 0; $__LIST__ = $bilisss;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><tr>
						<td><?php echo ($value[0]); ?></td>
						<td><?php echo ($value[1]); ?>%</td>
						<td><?php echo ($value[2]); ?>%</td>
						<td><?php echo ($value[3]); ?>%</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
		</div>
		<div class="promotion_explain">
			<h2 class="promotion_h2">
				活动说明
			</h2>
			<p>1、每日加奖在每日凌晨00:20后开放领取；</p>
			<p>2、加奖比例是根据会员等级以及昨日累计投注金额进行一定比例的加奖；</p>
			<!--<p>3、需Vip3以上且昨日投注额大于或等于100才能获得加奖；</p>-->
			<p>3、撤单和其他无效投注将不计算在内；</p>
			<p>4、提款后相应的降级将会影响加奖的比例。</p>
			<p>5、活动奖金逾期未领取，视为自动放弃活动资格。</p>
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
    
</div>	<script type="text/javascript">
		function qingquyongqu(){
			$.post("<?php echo U('Activity/everydayPlus');?>",'', function(json){
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