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
<style>
    .home_main .new_home_main_list {
        text-align: center;
        padding: 0.2rem 0 0.1rem;
    }

    .home_main .new_home_main_list a {
        display: block;
    }

    .home_main .new_home_main_list i {
        font-size: 0.4rem;
        line-height: 0.42rem;
    }

    .home_main .new_home_main_list.icon-fucaikuai3 {
        color: #e01506;
    }

    .home_main .new_home_main_list .icon-zhongqingshishicailogo {
        color: #fa7e00;
    }

    .home_main .new_home_main_list h3 {
        margin: 0;
        color: #333;
        font-weight: normal;
        line-height: 0.1rem;
        margin-top: 0.1rem;
    }

    .home_main .new_home_main_list em {
        color: #989898;
        font-size: 0.12rem;

    }

    .my_operation_money {
           background: white;
    margin-bottom: 0.1rem;
    margin-top: 20px;
    width: 95%;
    margin: 20px auto;
    margin-bottom: 10px;
    border-radius: 4px;
    box-shadow: 1px 1px 3px rgba(0, 0, 0, .1);
    }

    .my_operation_money li {
         
    }

    .hd {
        height: 40px;
        line-height: 40px;
        font-size: 20px;
        overflow: hidden;
        background: #eee;
        border-top: 1px solid #ccc;
        padding: 0 10px;
    }

    .hd h3 {
        float: left;
        font-size: 20px;
    }

    .hd h3 span {
        color: #ccc;
        font-family: Georgia;
        margin-left: 10px;
    }
    .rankBg {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    background: #fff url(../app/rankBg.png) no-repeat;
    background-position: 30px 70px;
    background-size: 110%;
    opacity: .1;
}
.am-header .am-header-title{
    margin: 0px !important;
}
.am-header .am-header-title img {
        margin-top: 5px !important;
    height: 40px;
    vertical-align: top;
}
</style>
<body>
    <script type="text/javascript" src="//js.users.51.la/20416167.js"></script>
<header data-am-widget="header" class="am-header am-header-default header nav_bg am-header-fixed">
    <h1 class="am-header-title header_logo" style="font-size: 19px;">
       <img src="resources/images/mylogo.png" alt="">
        <img src="//ia.51.la/go1?id=20416167&pvFlag=1" style="display:none;" />
        <!-- <span class="my_logo"><?php echo GetVar('webtitle');?></span> -->
    </h1>
     <style type="text/css">

@keyframes masked-animation {
    0% {
        background-position: 0  0;
    }
    100% {
        background-position: -100%  0;
    }
}
    </style>
    <!-- <div class="am-header-right am-header-nav header_down">
        <a href="javascript:void(0);" class="showCodeC">
            APP
            <i class="iconfont icon-wechaticon16"></i>
        </a>
    </div> -->
</header>

<div data-am-widget="slider" class="am-slider am-slider-a5" data-am-slider='{&quot;directionNav&quot;:false}'>
    <ul class="am-slides">
        <li>
            <img src="/Template/Mobile/images/banner1.png" alt="">
        </li>
         <li>
            <img src="/Template/Mobile/images/bannerqi2.jpg" alt=""  >
        </li>
        
        <li>
            <img src="/Template/Mobile/images/bannerqi3.jpg" alt="" >
        </li>
        <li>
            <img src="/Template/Mobile/images/bannerqi4.jpg" alt=""  >
        </li> 
    </ul>
</div>
<div style="width: 100%; text-align: center;position: absolute;">
<div class="home_notice" style="display: inline-block;">
    <a href="<?php echo U('Member/ggshow',array('aid'=>$gglist['id']));?>" class="am-cf">
        <div class="am-fl">
            <i class="iconfont icon-icon100"></i>
            <marquee style="width: 70vw;
    height: 26px;
    line-height: 26px;
    vertical-align: top;
    display: inline-block;
    box-sizing: border-box;"><?php echo ($gglist[title]); ?></marquee>
        </div>
        <div class="am-fr">
            <i class="iconfont icon-arrowright"></i>
        </div>
    </a>
</div>
</div>
<!--<div class="my_operation_money">
    <ul class="am-avg-sm-4">
       
            <li>
                <a href="<?php echo U('Account/rechargeList');?>">
                    <i class="iconfont">
                        <img src="/Template/Mobile/images/index/btn-deposit.png" alt="" width="48" height="48">
                    </i>
                    <em>充值</em>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Account/withdrawals');?>">
                    <i class="iconfont">
                        <img src="/Template/Mobile/images/index/btn-withdrawal.png" alt="" width="48" height="48">
                    </i>
                    <em>提现</em>
                </a>
            </li>
        
        
        
        
        <li>
            <a href="<?php echo U('Member/betRecord');?>">
                <i class="iconfont">
                    <img src="/Template/Mobile/images/index/icon-trend.png" alt="" width="48" height="48">
                </i>
                <em>投注记录</em>
            </a>
        </li>
        <li>
            <a href="<?php echo GetVar('kefuthree');?>">
                <i class="iconfont">
                    <img src="/Template/Mobile/images/index/icon-service.png" alt="" width="48" height="48">
                </i>
                <em>客服</em>
            </a>
        </li>
       
    </ul>
</div>-->
<style type="text/css">
    .hot-periods{
        text-align: center;
        display: block;
    }
    .home_main_list{

        text-align: center;
    }
</style>

<div class="credit">
    <div class="hot">
        <img src="/Template/Mobile/images/index/icon-hot.png" alt="" class="hot-img">
        热门游戏
    </div>
    <ul class="am-cf">
       <?php if(is_array($cplist)): $i = 0; $__LIST__ = $cplist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($i % 2 );++$i;?><li class="home_main_list">
                        <div>
                        <?php switch($cp["typeid"]): case "k3": ?><a href="/Game.<?php echo ($cp["typeid"]); ?>.code.<?php echo ($cp["name"]); ?>.do">
                              <i class="iconfont" style="color:#07b39e"><img src="/app/<?php echo ($cp["name"]); ?>.png" style="width:50px"/></i>
                               <div class="hot-periods">
                            <span style="font-size: 14px;color: #333333;"><?php echo ($cp["title"]); ?></span>
                            <p style="color: #999999;"><?php echo ($cp["ftitle"]); ?></p>
                             </div>
                              </a><?php break;?>
                            <?php case "ssc": ?><a href="/Game.<?php echo ($cp["typeid"]); ?>.code.<?php echo ($cp["name"]); ?>.do" >
                                    <!--<i class="iconfont icon--shishicai" style="color:#fa7e00;"></i>-->
                                    <i class="iconfont" style="color:#07b39e"><img src="/app/<?php echo ($cp["name"]); ?>.png" style="width:50px"/></i>
                                 <div class="hot-periods">
                            <span style="font-size: 14px;color: #333333;"><?php echo ($cp["title"]); ?></span>
                            <p style="color: #999999;"><?php echo ($cp["ftitle"]); ?></p>
                             </div>
                                </a><?php break;?>
                            <?php case "x5": ?><a href="/Game.<?php echo ($cp["typeid"]); ?>.code.<?php echo ($cp["name"]); ?>.do">
                                    <!--<i class="iconfont icon-11xuan5" style="color:#218ddd;"></i>-->
                                    <i class="iconfont" style="color:#07b39e"><img src="/app/<?php echo ($cp["name"]); ?>.png" style="width:50px"/></i>
                               <div class="hot-periods">
                            <span style="font-size: 14px;color: #333333;"><?php echo ($cp["title"]); ?></span>
                            <p style="color: #999999;"><?php echo ($cp["ftitle"]); ?></p>
                             </div>
                                </a><?php break;?>
                            <?php case "keno": ?><a href="/Game.<?php echo ($cp["typeid"]); ?>.code.<?php echo ($cp["name"]); ?>.do">
                                    <!--<i class="iconfont icon-kuaile8" style="color:#fc5826;"></i>-->
                                    <i class="iconfont" style="color:#07b39e"><img src="/app/<?php echo ($cp["name"]); ?>.png" style="width:50px"/></i>
                                 <div class="hot-periods">
                            <span style="font-size: 14px;color: #333333;"><?php echo ($cp["title"]); ?></span>
                            <p style="color: #999999;"><?php echo ($cp["ftitle"]); ?></p>
                             </div>
                                </a><?php break;?>
                            <?php case "pk10": ?><a href="/Game.pk10?code=<?php echo ($cp[name]); ?>">
                                    <!--<i class="iconfont icon--pk" style="color:#f22751;"></i>-->
                                    <i class="iconfont" style="color:#07b39e"><img src="/app/<?php echo ($cp["name"]); ?>.png" style="width:50px"/></i>
                                 <div class="hot-periods">
                            <span style="font-size: 14px;color: #333333;"><?php echo ($cp["title"]); ?></span>
                            <p style="color: #999999;"><?php echo ($cp["ftitle"]); ?></p>
                             </div>
                                </a><?php break;?>
                            <?php case "dpc": ?><a href="/Game.<?php echo ($cp["typeid"]); ?>.code.<?php echo ($cp["name"]); ?>.do">
                                        <i class="iconfont <?php if(strstr($cp['name'],'3d')){}else{}?>"><?php if(strstr($cp['name'],'3d')){ ?><img src="/app/<?php echo ($cp["name"]); ?>.png" style="width:50px"><?php } if(strstr($cp['name'],'pl3')){ ?><img src="/app/<?php echo ($cp["name"]); ?>.png" style="width:50px"><?php } ?></i>
                                <div class="hot-periods">
                            <span style="font-size: 14px;color: #333333;"><?php echo ($cp["title"]); ?></span>
                            <p style="color: #999999;"><?php echo ($cp["ftitle"]); ?></p>
                             </div>
                                </a><?php break;?>
                            <?php case "lhc": ?><a href="/Game.<?php echo ($cp["typeid"]); ?>?code=<?php echo ($cp["name"]); ?>">
                                    <i class="iconfont" style="color:#07b39e"><img src="/app/<?php echo ($cp["name"]); ?>.png" style="width:50px"/></i>
                             <div class="hot-periods">
                            <span style="font-size: 14px;color: #333333;"><?php echo ($cp["title"]); ?></span>
                            <p style="color: #999999;"><?php echo ($cp["ftitle"]); ?></p>
                             </div>
                                </a><?php break; endswitch;?>
                           
                         </div></li><?php endforeach; endif; else: echo "" ;endif; ?>
      <!--   <li style="border-bottom: 1px solid #eee;">
            <a href="javascript:void(0);" class="showCodeC">
                <i class="iconfont" style="color:#07b39e">
                    <img src="/Template/Mobile/images/index/icon-download.png"/>
                </i>
                <div class="hot-periods">
                    <span>APP下载</span>
                    <p>随心随地随心畅玩</p>
                </div>
            </a>
        </li> -->
        <li style="text-align: center;">
            <a href="<?php echo U('Index/lotteryHall');?>" style="text-align: center;">
                <i class="iconfont" style="color:#07b39e;display: inline-block;">
                    <img src="/Template/Mobile/images/index/icon-more.png"/>
                </i>
                <div class="hot-periods">
                    <span>更多彩票</span>
                    <p>更多热门彩票</p>
                </div>
            </a>
        </li>
    </ul>
</div>
<!--  <div class="winning-box">
                    <div class="news-title clearfix" style="box-shadow: 0 2px 2px #F2F6FC">
                        <img src="/app/rank.png" style="margin: 10px;width: 16px;">
                        <h2 class="news-tit pull-left" style="display: inline-block;font-size: 14px;vertical-align: middle;"><strong>最新中奖榜</strong></h2>
                    </div>
                    <div class="rankBg"></div>
                    <div class="news-content myScroll" style="height: 290px; padding: 0px 10px;">

                        <ul class="news-scroll">
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li>
                                    <?php echo str_replace_cn($value['username'],1,3);?><b><?php echo ($value['k3name']); ?></b>
                                    <em>喜中 <em style="color: #fe4365;"><?php echo ($value['okamount']); ?>.00</em>元</em>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
-->
<script type="text/javascript" src="/resources/js/scroll.js"></script>
<script>
    $(function(){
        $('.myScroll').myScroll({
            speed: 40, 
           rowHeight: 58 
        });

        $('.notice-tab li.tab_g').hover(function(){
            
            
            $('.notice-tab li').removeClass('on');
            $(this).addClass('on');
            var index = $('.notice-tab li').index(this);
            $('.notice-main .draw-contents').hide();
            $('.notice-main').find('.draw-contents').eq(index).show();
        });
     });
</script>

<style>
.winning-box{
    width: 95%;
    margin: 10px auto;
    border-radius: 4px;
    position: relative;
	background:#fff;
    box-shadow: 1px 1px 3px rgba(0, 0, 0, .1);
}
.winning-box .myScroll{
                    height:177px;
                     
                    margin-bottom: 20px;
                    padding:0px;
                    overflow: hidden;
                }

                .myScroll ul{
                    overflow: hidden;
                }

                .myScroll > ul >li {
                    line-height: 25px;
    height: 58px;
    width: 100%;
    border-bottom: 1px solid #F2F6FC;
    overflow: hidden;
    padding-left: 10px;
    position: relative;
    font-size: 14px;
    color: #333;
                }

                .myScroll > ul >li > b{
                    color: #333;
                    display: block;
                }

                .myScroll > ul > li >em{
    display: inline-block;
    color: #999;
    position: absolute;
    right: 10px;
    top: 15px;
                }

    .am-modal-dialog{width: 80%;}
    .am-modal-bd img{
        width: 100%;
    }
</style>
<div class="am-modal am-modal-no-btn" tabindex="-1" id="fistModal">
    <div class="am-modal-dialog">
        
        <div class="am-modal-hd">公告
		      欢迎光临！祝您在2019发发发发发发发发
            <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
  
   
        </div>
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
<div class="showCodePage"
     style="background-position: 0 50px;display:none;position: fixed;left:0;top:0;z-index:9999;text-align:center;width:100%;height:100%;background-image: url(/Template/Mobile/images/codeJpg.jpg);background-size:100% 95%;">
    <header data-am-widget="header" class="am-header am-header-default header nav_bg">
        <a href="javascript:void(0);" class="hideCodec" style="float:left;color:#fff;">
            <i class="iconfont icon-arrow-left"></i>
        </a>
        <h1 class="am-header-title header_logo">
            APP下载
        </h1>
    </header>
    <img src="/Template/Mobile/images/app.png" width="130" height="130"
         style="margin-top: 36px;box-shadow: 0px 1px 9px #000;"/>
</div>

<script>
    $(document).on('click', '.showCodeC', function () {
        $('.showCodePage').show();
    })
    $(document).on('click', '.hideCodec', function () {
        $('.showCodePage').hide();
    })
    $('li.home_main_list a').click(function (event) {

        event.preventDefault()
        var url = $(this).attr('href');

        $.ajax({
            url: url,
            type: 'POST',
            success: function (json) {

                if (json.sign == 'fase') {
                    window.location.href = "<?php echo U('Public/login');?>";
                } else {

                    window.location.href = url;
                }
            }
        })
    })
</script>
</body>
</html>