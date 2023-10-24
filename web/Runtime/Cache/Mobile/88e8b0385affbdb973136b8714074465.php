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
<style>
	.am-tabs-default .am-tabs-nav>.am-active a{
		background-color: transparent;
    color: #fff;
	}
	.am-tabs-nav i{
		display: block;
    font-size: 28px;
    line-height: 14px;
    margin-top: 17px;
	}
	.am-tabs .am-tabs-nav a{
		color: #5c5f60;
		display: block;
		width: 108px;
	}
	.am-tabs-bd .am-tab-panel{
		padding: 0;
	}
	.am-tabs-bd .home_main{
		margin: 0;
	}
	.mynav1{
		color:#999 !important;
	}
	.mynav2{
color:#eb000e !important;
	}
	.mynav3{
color:#999 !important;
	}
	.mynav4{
color:#999 !important;
	}
	.mynav5{
color:#999 !important;
	}
</style>
<body>
	<header data-am-widget="header"class="am-header am-header-default header nav_bg am-header-fixed">
		<div class="am-header-left am-header-nav">
			<a href="javascript:history.back(-1);" class="">
				<i class="iconfont icon-arrow-left"></i>
			</a>
    </div>

		<h1 class="am-header-title activity_h1">
			全部彩种
		</h1>
	</header>
	
	 <div data-am-widget="tabs" class="am-tabs am-tabs-default" style="margin: 0;">
      <ul class="am-tabs-nav am-cf" style="background: #000;overflow: auto;overflow-y: hidden;">
          <li class="am-active"><a>
						<i class="iconfont icon-quanbu"></i>
						全部彩种</a></li>
          <li class=""><a>
						<i class="iconfont icon-fucaikuai3"></i>
						快3</a></li>
          <li class=""><a>
						<i class="iconfont icon--shishicai"></i>
						时时彩</a></li>
      </ul>
      <div class="am-tabs-bd" style="margin-bottom: 65px;border:0px;">
          <div data-tab-panel-0 class="am-tab-panel am-active">
            <ul class="home_main am-avg-sm-3">
				<?php if(is_array($cplist)): $i = 0; $__LIST__ = $cplist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($i % 2 );++$i;?><li class="home_main_list"><div>
						<?php switch($cp["typeid"]): case "k3": ?><a href="/Game.<?php echo ($cp["typeid"]); ?>.code.<?php echo ($cp["name"]); ?>.do">
							  <i class="iconfont" style="color:#07b39e"><img src="/app/<?php echo ($cp["name"]); ?>.png" style="width:50px"/></i>
							  </a><?php break;?>
							<?php case "ssc": ?><a href="/Game.<?php echo ($cp["typeid"]); ?>.code.<?php echo ($cp["name"]); ?>.do" >
									<!--<i class="iconfont icon--shishicai" style="color:#fa7e00;"></i>-->
									<i class="iconfont" style="color:#07b39e"><img src="/app/<?php echo ($cp["name"]); ?>.png" style="width:50px"/></i>
								</a><?php break;?>
							<?php case "x5": ?><a href="/Game.<?php echo ($cp["typeid"]); ?>.code.<?php echo ($cp["name"]); ?>.do">
									<!--<i class="iconfont icon-11xuan5" style="color:#218ddd;"></i>-->
									<i class="iconfont" style="color:#07b39e"><img src="/app/<?php echo ($cp["name"]); ?>.png" style="width:50px"/></i>
								</a><?php break;?>
							<?php case "keno": ?><a href="/Game.<?php echo ($cp["typeid"]); ?>.code.<?php echo ($cp["name"]); ?>.do">
									<!--<i class="iconfont icon-kuaile8" style="color:#fc5826;"></i>-->
									<i class="iconfont" style="color:#07b39e"><img src="/app/<?php echo ($cp["name"]); ?>.png" style="width:50px"/></i>
								</a><?php break;?>
							<?php case "pk10": ?><a href="/Game.pk10?code=<?php echo ($cp[name]); ?>">
									<!--<i class="iconfont icon--pk" style="color:#f22751;"></i>-->
									<i class="iconfont" style="color:#07b39e"><img src="/app/<?php echo ($cp["name"]); ?>.png" style="width:50px"/></i>
								</a><?php break;?>
							<?php case "dpc": ?><a href="/Game.<?php echo ($cp["typeid"]); ?>.code.<?php echo ($cp["name"]); ?>.do">
										<i class="iconfont <?php if(strstr($cp['name'],'3d')){}else{}?>"><?php if(strstr($cp['name'],'3d')){ ?><img src="/app/<?php echo ($cp["name"]); ?>.png" style="width:50px"><?php } if(strstr($cp['name'],'pl3')){ ?><img src="/app/<?php echo ($cp["name"]); ?>.png" style="width:50px"><?php } ?></i>
								</a><?php break;?>
							<?php case "lhc": ?><a href="/Game.<?php echo ($cp["typeid"]); ?>?code=<?php echo ($cp["name"]); ?>">
									<i class="iconfont" style="color:#07b39e"><img src="/app/<?php echo ($cp["name"]); ?>.png" style="width:50px"/></i>
								</a><?php break; endswitch;?>
							<h3><?php echo ($cp["title"]); ?></h3>
							<em><?php echo ($cp["ftitle"]); ?></em>
						 </div></li><?php endforeach; endif; else: echo "" ;endif; ?>

				</ul>
					</div>
          <div data-tab-panel-1 class="am-tab-panel ">
								<ul class="home_main am-avg-sm-3">
									<?php if(is_array($cplist2)): $i = 0; $__LIST__ = $cplist2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($i % 2 );++$i; if(($cp["typeid"]) == "k3"): ?><li class="home_main_list"><div>
												<a href="/Game.<?php echo ($cp["typeid"]); ?>.code.<?php echo ($cp["name"]); ?>.do">
												<i class="iconfont" style="color:#07b39e"><img src="/app/k3.gif" style="width:50px"/></i>
												</a>
													<h3><?php echo ($cp["title"]); ?></h3>
													<em><?php echo ($cp["ftitle"]); ?></em>
												</div></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
								</ul>
          </div>
          <div data-tab-panel-2 class="am-tab-panel ">
            <ul class="home_main am-avg-sm-3">
				<?php if(is_array($cplist2)): $i = 0; $__LIST__ = $cplist2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($i % 2 );++$i; if(($cp["typeid"]) == "ssc"): ?><li class="home_main_list"><div>
							<a href="/Game.<?php echo ($cp["typeid"]); ?>.code.<?php echo ($cp["name"]); ?>.do">
								<i class="iconfont" style="color:#07b39e"><img src="/app/<?php echo ($cp["name"]); ?>.png" style="width:50px"/></i>
							</a>
								<h3><?php echo ($cp["title"]); ?></h3>
								<em><?php echo ($cp["ftitle"]); ?></em>
							</div></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			 </ul>
          </div>
		 <div data-tab-panel-3 class="am-tab-panel">
            <ul class="home_main am-avg-sm-3">
				<?php if(is_array($cplist2)): $i = 0; $__LIST__ = $cplist2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($i % 2 );++$i; if(($cp["typeid"]) == "keno"): ?><li class="home_main_list">
							<a href="/Game.<?php echo ($cp["typeid"]); ?>.code.<?php echo ($cp["name"]); ?>.do">
								<i class="iconfont" style="color:#07b39e"><img src="/app/<?php echo ($cp["name"]); ?>.png" style="width:50px"/></i>
							</a>
								<h3><?php echo ($cp["title"]); ?></h3>
								<em><?php echo ($cp["ftitle"]); ?></em>
						</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				 </ul>
			 </div>
		  <div data-tab-panel-4 class="am-tab-panel">
			  <ul class="home_main am-avg-sm-3">
				  <?php if(is_array($cplist2)): $i = 0; $__LIST__ = $cplist2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($i % 2 );++$i; if(($cp["typeid"]) == "pk10"): ?><li class="home_main_list">
							  <a href="/Game.pk10?code=<?php echo ($cp[name]); ?>"">
								<i class="iconfont" style="color:#07b39e"><img src="/app/<?php echo ($cp["name"]); ?>.png" style="width:50px"/></i>
							  </a>
								  <h3><?php echo ($cp["title"]); ?></h3>
								  <em><?php echo ($cp["ftitle"]); ?></em>
						  </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			  </ul>
		  </div>
		  <div data-tab-panel-5 class="am-tab-panel">
			  <ul class="home_main am-avg-sm-3">
				  <?php if(is_array($cplist2)): $i = 0; $__LIST__ = $cplist2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($i % 2 );++$i; if(($cp["typeid"]) == "x5"): ?><li class="home_main_list">
							  <a href="/Game.<?php echo ($cp["typeid"]); ?>.code.<?php echo ($cp["name"]); ?>.do">
                              <i class="iconfont" style="color:#07b39e"><img src="/app/<?php echo ($cp["name"]); ?>.png" style="width:50px"/></i>
							  </a>
								  <h3><?php echo ($cp["title"]); ?></h3>
								  <em><?php echo ($cp["ftitle"]); ?></em>
						  </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			  </ul>
		  </div>
		  
		  <div data-tab-panel-6 class="am-tab-panel">
			  <ul class="home_main am-avg-sm-3">
				  <?php if(is_array($cplist2)): $i = 0; $__LIST__ = $cplist2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($i % 2 );++$i; if(($cp["typeid"]) == "lhc"): ?><li class="home_main_list">
							  <a href="/Game.<?php echo ($cp["typeid"]); ?>.code.<?php echo ($cp["name"]); ?>.do">
								  <i class="iconfont" style="color:#07b39e"><img src="/app/<?php echo ($cp["name"]); ?>.png" style="width:50px"/></i>
							  </a>
							  <h3><?php echo ($cp["title"]); ?></h3>
							  <em><?php echo ($cp["ftitle"]); ?></em>
						  </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			  </ul>
		  </div>
      </div>
  </div>
<script>

</script>

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