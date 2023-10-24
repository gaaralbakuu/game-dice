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
<script type="text/javascript" src="/Template/Mobile/js/index.js"></script>
<style>

</style>
<body class="bg_fff">
<header data-am-widget="header" class="am-header am-header-default header nav_bg am-header-fixed">
    <div class="am-header-left am-header-nav">
        <a href="javascript:history.back(-1);" class="">
            <i class="iconfont icon-arrow-left"></i>
        </a>
    </div>
    <!--		<div class="winners_tab am-header-title">
                <em class="active" data-title="0">投注记录</em><em data-title="1">追号记录</em>
            </div>-->
    <h1 class="am-header-title userHome_h1">投注记录</h1>
    <div class="am-header-right am-header-nav">
        <a href="javascript:void(0);" data-am-modal="{target: '#my-actions'}">
            <em class="bill_day">全部</em>
            <i class="iconfont icon-jiantouxia"></i>
        </a>
    </div>
    <style type="text/css">
        .mynav1{
        color:#999 !important;
    }
    .mynav2{
color:#999 !important;
    }
    .mynav3{
color:#eb000e !important;
    }
    .mynav4{
color:#999 !important;
    }
    .mynav5{
color:#999 !important;
    }
    </style>
</header>

<div data-am-widget="tabs" class=" am-tabs-d2 billrecord_main">
    <ul class="am-tabs-nav am-cf">
        <li
        <?php if($_GET['a_item']== '1'): ?>class="am-active"<?php endif; ?>
        ><a href="<?php echo U('Member/betRecord',array('a_item'=>1));?>">全部</a></li>
        <li
        <?php if($_GET['a_item']== '2'): ?>class="am-active"<?php endif; ?>
        ><a href="<?php echo U('Member/betRecord',array('a_item'=>2));?>">已中奖</a></li>
        <li
        <?php if($_GET['a_item']== '3'): ?>class="am-active"<?php endif; ?>
        ><a href="<?php echo U('Member/betRecord',array('a_item'=>3));?>">未中奖</a></li>
        <li
        <?php if($_GET['a_item']== '4'): ?>class="am-active"<?php endif; ?>
        ><a href="<?php echo U('Member/betRecord',array('a_item'=>4));?>">等待开奖</a></li>
    </ul>
    <div class="am-tabs-bd">

        <!--全部-->
        <?php if($_GET['a_item']== '1' or $_GET['a_item']== ''): ?><div data-tab-panel-0 class="am-tab-panel am-active">
                <div data-am-widget="list_news" class="am-list-news am-list-news-default">
                    <div class="am-list-news-bd">
                        <ul class="am-list">
                            <!-- <?php if(is_array($tzlist)): $i = 0; $__LIST__ = $tzlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="am-g am-list-item-dated">
                                        <p class="am-cf">
                                            <span class="what_type am-fl"><?php echo ($vo["expect"]); ?></span>
                                            <em class="money am-fr">投注金额:<?php echo ($vo["amount"]); ?></em>
                                        </p>
                                        <p class="am-cf billrecord_time">
                                            <span class="am-fl"><?php echo (date("m-d H:i:s",$vo["oddtime"])); ?></span>
                                            <?php if($vo["isdraw"] == '0'): ?><em class="am-fr"><?php echo ($vo["cptitle"]); ?>(未开奖)</em><?php endif; ?>
                                            <?php if($vo["isdraw"] == '1'): ?><em class="am-fr"><?php echo ($vo["cptitle"]); ?></em><em class="money am-fr" style="margin-right:1em">中奖金额:<?php echo ($vo["okamount"]); ?></em><?php endif; ?>
                                            <?php if($vo["isdraw"] == '-1'): ?><em class="am-fr" style="color:green"><?php echo ($vo["cptitle"]); ?>(未中奖)</em><?php endif; ?>
                                        </p>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>-->
                            <?php if(is_array($tzlist)): $i = 0; $__LIST__ = $tzlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="am-g am-list-item-dated">
                                    <a href="<?php echo U('Member/betRecordDetails',array('trano'=>$vo['trano']));?>">

                                    <p class="am-cf" style="font-size:14px">
                                         <img src="<?php echo ($vo["img"]); ?>" style="width: 20px;height: 20px;float: left;margin-right: 8px;margin-top: 4px;vertical-align: middle;">
    
                                        <span class="what_type am-fl"><?php echo ($vo["cptitle"]); ?>(<?php echo ($vo["expect"]); ?>期)</span>
                                        <?php if($vo["isdraw"] == '0'): ?><em class="money am-fr" style="color:#666">未开奖</em>
                                            <a style="display: inline-block;" href="javascript:void" class="chedan_btn" style="color:red" onClick="Order_chedan('<?php echo ($vo[id]); ?>','<?php echo ($vo[trano]); ?>',this)">撤单</a>
                                            
                                            <!-- <a style="cursor:pointer;font-size: 12px !important;display: inline-block;" class="text-primary" layer-chedan-url="/Game.chedan.id.1282.do">撤单</u> --><?php endif; ?>
                                        <?php if($vo["isdraw"] == '1'): ?><em class="money am-fr" style="color:red">已中奖 <?php echo ($vo["okamount"]); ?>元</em><?php endif; ?>
                                        <?php if($vo["isdraw"] == '-1'): ?><em class="money am-fr" style="color:green">未中奖</em><?php endif; ?>
                                        <?php if($vo["isdraw"] == '-2'): ?><em class="money am-fr" style="color:green">已撤单</em><?php endif; ?>
                                    </p>
                                   <!--  <p class="am-cf billrecord_time" style="font-size:14px">
                                        <span class="what_type am-fl">玩法：<?php echo ($vo["playtitle"]); ?>(<?php echo ($vo["mode"]); ?>)</span>
                                    </p>
                                    <p class="am-cf billrecord_time" style="font-size:14px">
                                        <span class="what_type am-fl">投注内容：
                                            <?php if($vo[playid] == 'lhwq' or $vo[playid] == 'lhws' or $vo[playid] == 'lhwg' or $vo[playid] == 'lhqb' or $vo[playid] == 'lhqs' or $vo[playid] == 'lhqg' or $vo[playid] == 'lhbs' or $vo[playid] == 'lhbg' or $vo[playid] == 'lhsg'): echo (str_replace(['0','1','2'],['龙','虎','和'],$vo["tzcode"])); ?>
                                                <?php elseif($vo[playid] == 'dxdsqe' or $vo[playid] == 'dxdshe' or $vo[playid] == 'dxdsqs' or $vo[playid] == 'dxdshs'): ?>
                                                <?php echo (str_replace(['0','1','2','3'],['大','小','单','双'],$vo["tzcode"])); ?>
                                                <?php else: ?>
                                                <?php echo ($vo["tzcode"]); endif; ?>
                                        </span>
                                    </p> -->
                                    <!-- <p class="am-cf billrecord_time" style="font-size:14px">
                                        <span class="what_type am-fl">单号：<?php echo ($vo["trano"]); ?></span>
                                    </p> -->
                                    <p class="am-cf billrecord_time" style="font-size:14px">
                                        <!-- <span class="what_type am-fl">金额:<?php echo ($vo["amount"]); ?>,注数:<?php echo ($vo["itemcount"]); ?>,中奖金:<?php echo ($vo["okamount"]); ?>,中注数:<?php echo ($vo["okcount"]); ?></span> -->
                                        
                                        <?php if($vo["isdraw"] == '1'): ?><span class="what_type am-fl" style="color: #999;">投注金额 <?php echo ($vo["amount"]); ?>元</span>
                                            <!-- <span class="what_type am-fl" style="color: red;">已中奖 <?php echo ($vo["okamount"]); ?>元</span> --><?php endif; ?>
                                        <?php if($vo["isdraw"] == '-1'): ?><span class="what_type am-fl" style="color: #999;">投注金额 <?php echo ($vo["amount"]); ?>元</span><?php endif; ?>
                                        <?php if($vo["isdraw"] == '-2'): ?><span class="what_type am-fl" style="color: #999;">投注金额 <?php echo ($vo["amount"]); ?>元</span><?php endif; ?>
                                    </p>
                                </a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
            </div><?php endif; ?>
        <!--已中奖-->
        <?php if(($_GET['a_item']) == "2"): ?><div data-tab-panel-1 class="am-tab-active ">
                <div data-am-widget="list_news" class="am-list-news am-list-news-default">
                    <div class="am-list-news-bd">
                        <ul class="am-list">
                            <?php if(is_array($tzlist)): $i = 0; $__LIST__ = $tzlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo['isdraw']) == "1"): ?><li class="am-g am-list-item-dated" style="font-size:14px">
                                         <a href="<?php echo U('Member/betRecordDetails',array('userid'=>$vo['trano']));?>">
                                        <p class="am-cf" style="font-size:14px">
                                         <img src="<?php echo ($vo["img"]); ?>" style="width: 20px;height: 20px;float: left;margin-right: 8px;margin-top: 4px;vertical-align: middle;">
                                            <span class="what_type am-fl"><?php echo ($vo["cptitle"]); ?>(<?php echo ($vo["expect"]); ?>期)</span>
                                            <?php if($vo["isdraw"] == '0'): ?><em class="money am-fr" style="color:#666">未开奖</em><?php endif; ?>
                                            <?php if($vo["isdraw"] == '1'): ?><em class="money am-fr" style="color:red">已中奖 <?php echo ($vo["okamount"]); ?>元</em><?php endif; ?>
                                            <?php if($vo["isdraw"] == '-1'): ?><em class="money am-fr" style="color:green">未中奖</em><?php endif; ?>
                                        </p>
                                        <!-- <p class="am-cf billrecord_time" style="font-size:14px">
                                            <span class="what_type am-fl">玩法：<?php echo ($vo["playtitle"]); ?>(<?php echo ($vo["mode"]); ?>)</span>
                                        </p>
                                        <p class="am-cf billrecord_time" style="font-size:14px">
                                            <span class="what_type am-fl">投注内容：
                                            <?php if($vo[playid] == 'lhwq' or $vo[playid] == 'lhws' or $vo[playid] == 'lhwg' or $vo[playid] == 'lhqb' or $vo[playid] == 'lhqs' or $vo[playid] == 'lhqg' or $vo[playid] == 'lhbs' or $vo[playid] == 'lhbg' or $vo[playid] == 'lhsg'): echo (str_replace(['0','1','2'],['龙','虎','和'],$vo["tzcode"])); ?>
                                                <?php elseif($vo[playid] == 'dxdsqe' or $vo[playid] == 'dxdshe' or $vo[playid] == 'dxdsqs' or $vo[playid] == 'dxdshs'): ?>
                                                <?php echo (str_replace(['0','1','2','3'],['大','小','单','双'],$vo["tzcode"])); ?>
                                                <?php else: ?>
                                                <?php echo ($vo["tzcode"]); endif; ?>
                                            </span>
                                        </p>
                                        <p class="am-cf billrecord_time" style="font-size:14px">
                                            <span class="what_type am-fl">单号：<?php echo ($vo["trano"]); ?></span>
                                        </p> -->
                                        <p class="am-cf billrecord_time" style="font-size:14px">
                                          <?php if($vo["isdraw"] == '1'): ?><span class="what_type am-fl" style="color: #999;">投注金额 <?php echo ($vo["amount"]); ?>元</span><?php endif; ?>
                                        <?php if($vo["isdraw"] == '-1'): ?><span class="what_type am-fl" style="color: #999;">投注金额 <?php echo ($vo["amount"]); ?>元</span><?php endif; ?>
                                        <?php if($vo["isdraw"] == '-2'): ?><span class="what_type am-fl">投注金额 <?php echo ($vo["amount"]); ?>元</span><?php endif; ?>
                                        </p>
                                    </a>
                                    </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
            </div><?php endif; ?>
        <!--未中奖-->
        <?php if(($_GET['a_item']) == "3"): ?><div data-tab-panel-2 class="am-tab-active ">
                <div data-am-widget="list_news" class="am-list-news am-list-news-default">
                    <div class="am-list-news-bd">
                        <ul class="am-list">
                            <?php if(is_array($tzlist)): $i = 0; $__LIST__ = $tzlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo[isdraw]) == "-1"): ?><li class="am-g am-list-item-dated">
                                         <a href="<?php echo U('Member/betRecordDetails',array('userid'=>$vo['trano']));?>">
                                        <p class="am-cf" style="font-size:14px">
                                         <img src="<?php echo ($vo["img"]); ?>" style="width: 20px;height: 20px;float: left;margin-right: 8px;margin-top: 4px;vertical-align: middle;">
                                            <span class="what_type am-fl"><?php echo ($vo["cptitle"]); ?>(<?php echo ($vo["expect"]); ?>期)</span>
                                            <?php if($vo["isdraw"] == '0'): ?><em class="money am-fr" style="color:#666">未开奖</em><?php endif; ?>
                                            <?php if($vo["isdraw"] == '1'): ?><em class="money am-fr" style="color:red">已中奖</em><?php endif; ?>
                                            <?php if($vo["isdraw"] == '-1'): ?><em class="money am-fr" style="color:green">未中奖</em><?php endif; ?>
                                        </p>
                                      <!--   <p class="am-cf billrecord_time" style="font-size:14px">
                                            <span class="what_type am-fl">玩法：<?php echo ($vo["playtitle"]); ?>(<?php echo ($vo["mode"]); ?>)</span>
                                        </p>
                                        <p class="am-cf billrecord_time" style="font-size:14px">
                                            <span class="what_type am-fl">投注内容：
                                                <?php if($vo[playid] == 'lhwq' or $vo[playid] == 'lhws' or $vo[playid] == 'lhwg' or $vo[playid] == 'lhqb' or $vo[playid] == 'lhqs' or $vo[playid] == 'lhqg' or $vo[playid] == 'lhbs' or $vo[playid] == 'lhbg' or $vo[playid] == 'lhsg'): echo (str_replace(['0','1','2'],['龙','虎','和'],$vo["tzcode"])); ?>
                                                    <?php elseif($vo[playid] == 'dxdsqe' or $vo[playid] == 'dxdshe' or $vo[playid] == 'dxdsqs' or $vo[playid] == 'dxdshs'): ?>
                                                    <?php echo (str_replace(['0','1','2','3'],['大','小','单','双'],$vo["tzcode"])); ?>
                                                    <?php else: ?>
                                                    <?php echo ($vo["tzcode"]); endif; ?>
                                            </span>
                                        </p>
                                        <p class="am-cf billrecord_time" style="font-size:14px">
                                            <span class="what_type am-fl">单号：<?php echo ($vo["trano"]); ?></span>
                                        </p> -->
                                        <p class="am-cf billrecord_time" style="font-size:14px">
                                          <?php if($vo["isdraw"] == '1'): ?><span class="what_type am-fl" style="color: red;">已中奖 <?php echo ($vo["amount"]); ?>元</span><?php endif; ?>
                                        <?php if($vo["isdraw"] == '-1'): ?><span class="what_type am-fl" style="color: #999;">投注金额 <?php echo ($vo["amount"]); ?>元</span><?php endif; ?>
                                        <?php if($vo["isdraw"] == '-2'): ?><span class="what_type am-fl">投注金额 <?php echo ($vo["amount"]); ?>元</span><?php endif; ?>
                                        </p>
                                    </a>
                                    </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
            </div><?php endif; ?>
        <!--等待开奖-->
        <?php if(($_GET['a_item']) == "4"): ?><div data-tab-panel-3 class="am-tab-active ">
                <div data-am-widget="list_news" class="am-list-news am-list-news-default">
                    <div class="am-list-news-bd">
                        <ul class="am-list">
                            <?php if(is_array($tzlist)): $i = 0; $__LIST__ = $tzlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo[isdraw]) == "0"): ?><li class="am-g am-list-item-dated">
                                         <a href="<?php echo U('Member/betRecordDetails',array('trano'=>$vo['trano']));?>">
                                       <p class="am-cf" style="font-size:14px">
                                         <img src="<?php echo ($vo["img"]); ?>" style="width: 20px;height: 20px;float: left;margin-right: 8px;margin-top: 4px;vertical-align: middle;">
                                            <span class="what_type am-fl"><?php echo ($vo["cptitle"]); ?>(<?php echo ($vo["expect"]); ?>期)</span>
                                            <?php if($vo["isdraw"] == '0'): ?><em class="money am-fr" style="color:#666">未开奖</em>
                                                 <a style="display: inline-block;" href="javascript:void" class="chedan_btn" style="color:red" onClick="Order_chedan('<?php echo ($vo[id]); ?>','<?php echo ($vo[trano]); ?>',this)">撤单</a><?php endif; ?>
                                            <?php if($vo["isdraw"] == '1'): ?><em class="money am-fr" style="color:red">已中奖</em><?php endif; ?>
                                            <?php if($vo["isdraw"] == '-1'): ?><em class="money am-fr" style="color:green">未中奖</em><?php endif; ?>
                                        </p>
                                        <!-- <p class="am-cf billrecord_time" style="font-size:14px">
                                            <span class="what_type am-fl">玩法：<?php echo ($vo["playtitle"]); ?>(<?php echo ($vo["mode"]); ?>)</span>
                                        </p>
                                        <p class="am-cf billrecord_time" style="font-size:14px">
                                            <span class="what_type am-fl">投注内容：
                                                <?php if($vo[playid] == 'lhwq' or $vo[playid] == 'lhws' or $vo[playid] == 'lhwg' or $vo[playid] == 'lhqb' or $vo[playid] == 'lhqs' or $vo[playid] == 'lhqg' or $vo[playid] == 'lhbs' or $vo[playid] == 'lhbg' or $vo[playid] == 'lhsg'): echo (str_replace(['0','1','2'],['龙','虎','和'],$vo["tzcode"])); ?>
                                                    <?php elseif($vo[playid] == 'dxdsqe' or $vo[playid] == 'dxdshe' or $vo[playid] == 'dxdsqs' or $vo[playid] == 'dxdshs'): ?>
                                                    <?php echo (str_replace(['0','1','2','3'],['大','小','单','双'],$vo["tzcode"])); ?>
                                                    <?php else: ?>
                                                    <?php echo ($vo["tzcode"]); endif; ?>
                                            </span>
                                        </p>
                                        <p class="am-cf billrecord_time" style="font-size:14px">
                                            <span class="what_type am-fl">单号：<?php echo ($vo["trano"]); ?></span>
                                        </p> -->
                                        <p class="am-cf billrecord_time" style="font-size:14px">
                                           <?php if($vo["isdraw"] == '1'): ?><span class="what_type am-fl" style="color: red;">已中奖 <?php echo ($vo["amount"]); ?>元</span><?php endif; ?>
                                        <?php if($vo["isdraw"] == '-1'): ?><span class="what_type am-fl" style="color: #999;">金额 <?php echo ($vo["amount"]); ?>元</span><?php endif; ?>
                                        <?php if($vo["isdraw"] == '-2'): ?><span class="what_type am-fl">金额 <?php echo ($vo["amount"]); ?>元</span><?php endif; ?>
                                        </p>
                                    </a>
                                    </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
            </div><?php endif; ?>
        <style type="text/css">
            .green-black{
              padding: 10px;
            }
            .green-black a{
                margin: 0 2px;
              padding: 0px 2px;
              font-size: 12px;
              border:1px solid #DCDFE6;
            }
            .green-black span{
 
              font-size: 12px;
            }
            .green-black .current{
                border:1px solid #DCDFE6;
                margin: 0 2px;
              padding: 0px 4px;
                color: red;
            }
        </style>
        <div class="page text-center green-black"><?php echo ($pageshow); ?></div>
    </div>
</div>

<div class="am-modal-actions billrecord_day" id="my-actions">
    <div class="am-modal-actions-group">
        <ul class="am-list">
            <li class="am-modal-actions-header"><a onClick="return getlist(0);">全部</a></li>
            <li class="am-modal-actions-header"><a onClick="return getlist(1);">今天</a></li>
            <li class="am-modal-actions-header"><a onClick="return getlist(2);">昨天</a></li>
            <li class="am-modal-actions-header"><a onClick="return getlist(3);">七天</a></li>
        </ul>
    </div>
    <div class="am-modal-actions-group">
        <button class="am-btn am-btn-secondary am-btn-block btn_red" data-am-modal-close>取消</button>
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
<script>
    function getlist(atime) {
        var a_item = "<?php echo ($_GET['a_item']); ?>";
        if (a_item == "") {
            a_item = 1;
        }
        window.location.href = "Member.betRecord.atime." + atime + ".a_item." + a_item;
    }

    setTimeout(function () {
        var str = "<?php echo ($_GET['atime']); ?>";
        switch (str) {
            case '1':
                $('.bill_day').html('今天');
                break;
            case '2':
                $('.bill_day').html('昨天');
                break;
            case '3':
                $('.bill_day').html('七天');
                break;
            default:
                $('.bill_day').html('全部');


        }
    })
     
</script>
</body>
</html>