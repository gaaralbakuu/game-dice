<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head> 
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>在线投注 - <?php echo GetVar('webtitle');?>线上平台</title>
<meta name="renderer" content="webkit" />
<link rel="stylesheet" type="text/css" href="/resources/css/reset.css" />
<link rel="stylesheet" type="text/css" href="/resources/css/layout.css" />
<link rel="stylesheet" type="text/css" href="/resources/css/artDialog.css" />
<link rel="stylesheet" type="text/css" href="/resources/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="/resources/css/k3.css" />
<link rel="stylesheet" href="/resources/css2/bootstrap.min.css">
<link rel="stylesheet" href="/resources/css2/reset.css">
<link rel="stylesheet" href="/resources/css2/icon.css">
<link rel="stylesheet" href="/resources/css2/header.css">
<link rel="stylesheet" href="/resources/css2/footer.css">
<link rel="stylesheet" href="/resources/css/style.css">
<link rel="stylesheet" href="/resources/css2/main.css">
<link rel="stylesheet" href="/resources/css/common.css">
<link rel="stylesheet" href="/resources/css2/ssc.css">
<script>
var WebConfigs = {
	webtitle:"<?php echo ($webconfigs["webtitle"]); ?>",
	kefuthree:"<?php echo ($webconfigs["kefuthree"]); ?>",
	kefuqq:"<?php echo ($webconfigs["kefuqq"]); ?>",
	ROOT : ""
};
</script>
<script>
<?php echo "var k3lotteryrates = ".json_encode($rates,JSON_UNESCAPED_UNICODE);?>
</script>
<script type="text/javascript" src="/resources/js/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="/resources/css/chat/appchat-chat-index.css" />
    <link rel="stylesheet" type="text/css" href="/resources/css/chat/index1.css" />
    <link rel="stylesheet" type="text/css" href="/resources/css/chat/index.css" />
    <!--workmand的js-->
    <script type="text/javascript" src="/resources/js/chat/swfobject.js"></script>
    <script type="text/javascript" src="/resources/js/chat/web_socket.js"></script>
    <script type="text/javascript" src="/resources/js/chat/jquery-sinaEmotion-2.1.0.js"></script>
<script type="text/javascript" src="/resources/js/artDialog.js"></script>
<!--[if lt IE 9]>
<script src="/resources/js/html5shiv.js"></script>
<![endif]-->

</head>

<body>
 
<style>	
	.j_lottery_time .shij span{
		color: #fff;
		font-size: 36px;
	}
	.cz_logo>a>img{
		width: 60px;
		height:60px;
	}
      .mychat {
    position: fixed;
    bottom: 0;
    right: 0;
    height: 100vh;
    width: 350px;
    background-color: #fff;
    transform-origin: bottom left;

    box-shadow: 0px 0px 7px 1px #ababab;
    outline: none;
    border: 0;
    transform-origin: bottom right;
    z-index: 9998 !important;
}
	.start_video{
       position: absolute;
    left: -24px;
    border-radius: 5px;
    top: 80px;
    width: 40px;
    height: auto;
    text-align: center;
    background-color: red;
    color: white;
    z-index: 100;
    line-height: 16px;
    padding: 10px 0px;
    border-top-right-radius: 0px;
    border-bottom-right-radius: 0px;
    cursor: pointer;
    display: none;
    }
    #video_box{
        overflow: hidden;
        position: fixed;
    left: -100vw;
    top: 0px;
    z-index: 1000;
    }
    #video_box #child{
          width: 718px;
    height: 460px;
    margin: 0 auto;
    display: block;
    position: relative;
    border-radius: 5px;
    border: 5px solid white;
    box-shadow: 0 0 10px white;
    }
    .close_video_button{
        width: 60px;
    text-align: center;
    margin: 20px auto;
    border-radius: 3px;
    display: block;
    color: white;
    font-size: 14px;
    cursor: pointer;
    }
    .parent_chile{
         width: 718px;
        height: 460px;
    margin: 0 auto;
    top: 50%;
    margin-top: -283px;
    position: relative;
    }
</style>
<!--header start-->
<script>
    var WebConfigs = {
        "ROOT" : "",
        'IMG' : "/resources/images"
    }
</script>
<link rel="stylesheet" type="text/css" href="/resources/css/artDialog.css" />
<script type="text/javascript" src="/resources/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/resources/js/artDialog.js"></script>
<script type="text/javascript" src="/resources/js/way.min.js"></script>
<script type="text/javascript" src="/resources/main/common.js"></script>
<header class="header" style="background:#000;height:40px;line-height:40px;">
    <div class="container claerfix">
        <div class="allLottery2" style="position:absolute;left: -40px;bottom: -366px;">
            <img src="/resources/images/allgamelink2.png" />
        </div>
        <div class="pull-left backLeft" style="color:#fff;">
            <a href="/" class="backHomeBtn" style="color:#fff;">返回首页</a>
            |
            <a href="javascript:void(0);" class="allLottery" style="color:#fff;">全部彩票</a>
            <div class="backLeftLottery" style="display: none;">
                <i class="user_login_info2_i"></i>
                <dl class="aLotteryList">
                    <dt class="aLotteryListTitle" >快三</dt>
                    <dd class="aLotteryListK3">
                        <?php if(is_array($Allcp)): $key = 0; $__LIST__ = $Allcp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($key % 2 );++$key; if($cp['typeid'] == 'k3'): ?><a href="/Game.<?php echo ($cp["typeid"]); ?>?code=<?php echo ($cp["name"]); ?>"><?php echo ($cp["title"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </dd>
                </dl>
                <dl class="aLotteryList">
                    <dt class="aLotteryListTitle">时时彩</dt>
                    <dd class="aLotteryListSSC">
                        <?php if(is_array($Allcp)): $key = 0; $__LIST__ = $Allcp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($key % 2 );++$key; if($cp['typeid'] == 'ssc'): ?><a href="/Game.<?php echo ($cp["typeid"]); ?>?code=<?php echo ($cp["name"]); ?>"><?php echo ($cp["title"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </dd>
                </dl>
                <dl class="aLotteryList">
                    <dt class="aLotteryListTitle">快乐彩</dt>
                    <dd class="aLotteryListKLC">
                        <?php if(is_array($Allcp)): $key = 0; $__LIST__ = $Allcp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($key % 2 );++$key; if($cp['typeid'] == 'keno' or $cp['typeid'] == 'pk10'): ?><a href="/Game.<?php echo ($cp["typeid"]); ?>?code=<?php echo ($cp["name"]); ?>"><?php echo ($cp["title"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </dd>
                </dl>
                <dl class="aLotteryList">
                    <dt class="aLotteryListTitle">十一选五</dt>
                    <dd class="aLotteryListSYSW">
                        <?php if(is_array($Allcp)): $key = 0; $__LIST__ = $Allcp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($key % 2 );++$key; if($cp['typeid'] == 'x5'): ?><a href="/Game.<?php echo ($cp["typeid"]); ?>?code=<?php echo ($cp["name"]); ?>"><?php echo ($cp["title"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </dd>
                </dl>
                <dl class="aLotteryList">
                    <dt class="aLotteryListTitle">六合彩</dt>
                    <dd class="aLotteryListDPC">
                        <?php if(is_array($Allcp)): $key = 0; $__LIST__ = $Allcp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($key % 2 );++$key; if($cp['typeid'] == 'lhc'): ?><a href="/Game.<?php echo ($cp["typeid"]); ?>?code=<?php echo ($cp["name"]); ?>"><?php echo ($cp["title"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </dd>
                </dl>
                <dl class="aLotteryList">
                    <dt class="aLotteryListTitle">低频彩</dt>
                    <dd class="aLotteryListDPC">
                        <?php if(is_array($Allcp)): $key = 0; $__LIST__ = $Allcp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($key % 2 );++$key; if($cp['typeid'] == 'dpc'): ?><a href="/Game.<?php echo ($cp["typeid"]); ?>?code=<?php echo ($cp["name"]); ?>"><?php echo ($cp["title"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </dd>
                </dl>
            </div>
            <div class="backLeftLottery2" style="display: none;">
                <dl class="aLotteryList">
                    <dt class="aLotteryListTitle" >快三</dt>
                    <dd class="aLotteryListK3">
                        <?php if(is_array($Allcp)): $key = 0; $__LIST__ = $Allcp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($key % 2 );++$key; if($cp['typeid'] == 'k3'): ?><a href="/Game.<?php echo ($cp["typeid"]); ?>?code=<?php echo ($cp["name"]); ?>"><?php echo ($cp["title"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </dd>
                </dl>
                <dl class="aLotteryList">
                    <dt class="aLotteryListTitle">时时彩</dt>
                    <dd class="aLotteryListSSC">
                        <?php if(is_array($Allcp)): $key = 0; $__LIST__ = $Allcp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($key % 2 );++$key; if($cp['typeid'] == 'ssc'): ?><a href="/Game.<?php echo ($cp["typeid"]); ?>?code=<?php echo ($cp["name"]); ?>"><?php echo ($cp["title"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </dd>
                </dl>
                <dl class="aLotteryList">
                    <dt class="aLotteryListTitle">快乐彩</dt>
                    <dd class="aLotteryListKLC">
                        <?php if(is_array($Allcp)): $key = 0; $__LIST__ = $Allcp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($key % 2 );++$key; if($cp['typeid'] == 'keno' or $cp['typeid'] == 'pk10'): ?><a href="/Game.<?php echo ($cp["typeid"]); ?>?code=<?php echo ($cp["name"]); ?>"><?php echo ($cp["title"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </dd>
                </dl>
                <dl class="aLotteryList">
                    <dt class="aLotteryListTitle">十一选五</dt>
                    <dd class="aLotteryListSYSW">
                        <?php if(is_array($Allcp)): $key = 0; $__LIST__ = $Allcp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($key % 2 );++$key; if($cp['typeid'] == 'x5'): ?><a href="/Game.<?php echo ($cp["typeid"]); ?>?code=<?php echo ($cp["name"]); ?>"><?php echo ($cp["title"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </dd>
                </dl>
                <dl class="aLotteryList">
                    <dt class="aLotteryListTitle">六合彩</dt>
                    <dd class="aLotteryListDPC">
                        <?php if(is_array($Allcp)): $key = 0; $__LIST__ = $Allcp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($key % 2 );++$key; if($cp['typeid'] == 'lhc'): ?><a href="/Game.<?php echo ($cp["typeid"]); ?>?code=<?php echo ($cp["name"]); ?>"><?php echo ($cp["title"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </dd>
                </dl>
                <dl class="aLotteryList">
                    <dt class="aLotteryListTitle">低频彩</dt>
                    <dd class="aLotteryListDPC">
                        <?php if(is_array($Allcp)): $key = 0; $__LIST__ = $Allcp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($key % 2 );++$key; if($cp['typeid'] == 'dpc'): ?><a href="/Game.<?php echo ($cp["typeid"]); ?>?code=<?php echo ($cp["name"]); ?>"><?php echo ($cp["title"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </dd>
                </dl>
            </div>
        </div>
        <script>
            
            var timerall2 = null;
            $('.allLottery2,.backLeftLottery2').mouseover(function (){
                if(timerall2){
                    clearTimeout(timerall2);
                }
                $('.backLeftLottery2').show();
            })
            $('.allLottery2,.backLeftLottery2').mouseout(function (){
                timerall2 = setTimeout(function (){
                    $('.backLeftLottery2').hide();
                },300)
            })
            $(document).on('mouseover','.moneyInfo',function (){
                $(this).find('.moneyInfoHover').show();
            })
            $(document).on('mouseout','.moneyInfo',function (){
                $(this).find('.moneyInfoHover').hide();
            })
        </script>
        <?php if(!empty($userinfo["username"])): ?><div class="pull-right user_login_info">
                <ul>
                    <li class="user_login_info1">
                        <a  href="<?php echo U('Member/index');?>" style="color:#fff;" class="user_header" data-html="true" class="user_header" data-container="body" data-toggle="popover" data-placement="bottom"data-content='<div class="ceng"><div class="media"><div class="media-left"><a href="<?php echo U('Member/index');?>"><img src="<?php echo ($userinfo["face"]); ?>" alt="" class="media-boject img-circle"></a><p><?php echo ($userinfo["username"]); ?></p></div><div class="media-body" style="padding-bottom:10px;">
                 
                <p class="margin_0">账号：<span><?php echo ($userinfo["username"]); ?></span></p>
                <p class="margin_0">等级：<span><?php echo ($userinfo["groupname"]); ?></span></p>
                <p class="margin_0">头衔：<span><?php if(($userinfo['groupname']) == "代理"): ?>总代理 <?php else: echo ($userinfo["touhan"]); endif; ?></span></p>
                <p class="margin_0">累积中奖：<span><?php echo (session('okamountcount')); ?></span></p>
            </div>
            <div class="media-footer">
                <?php if(is_array($_SESSION['k3names'])): $i = 0; $__LIST__ = $_SESSION['k3names'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Game/k3');?>?code=<?php echo ($value['cpname']); ?>" title="<?php echo ($value["cptitle"]); ?>" class="color_res" style="font-size:5px;"><span style="color:#333;display: block;margin-top:4px;"><?php echo (substr($value["cptitle"],0,6)); ?></span><i class="iconfont">&#xe607;</i></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </div></div></div>'>
    <img class="img-circle myhead"  src="<?php echo ($userinfo["face"]); ?>" alt="">
    <span id="myname"><?php echo ($userinfo['username']); ?></span>
    </a>
    <a class="user_info" style="display:none">
        0
    </a>
    <div class="info_sum_box" style="display: none;">
        <div class="info_sum clearfix">
            <a href="" class="pull-left">
                我的未读消息
                (<em>0</em>)
            </a>
            <a href="" class="pull-right">
                更多
            </a>
        </div>
    </div>
    </li>
    <li class="user_login_info2">
        <a href="<?php echo U('Member/index');?>" class="my_account" style="color:#fff;">
            我的账户
            <i class="iconfont">&#xe6a1;</i>
        </a>
        <div class="user_login_info2_list" style="display:none;">
            <i class="user_login_info2_i"></i>
            <?php if($userinfo["proxy"] == '1'): ?><a href="<?php echo U('Member/Agent');?>">代理中心</a><?php endif; ?>
            <a href="<?php echo U('Member/betRecord');?>">投注记录</a>
            <a href="<?php echo U('Account/dealRecord');?>">交易记录</a>
            <a href="<?php echo U('Member/ziliao');?>">个人信息</a>
            <a href="<?php echo U('Member/index');?>">安全中心</a>
        </div>
    </li>
    <li class="user_login_info3" style="color:#fff;">
        余额：
                        <span class="show_money">
                            <em class="smallmoney" style="color:#F70B0F;"><?php echo ($userinfo['balance']); ?></em>
                            <i class="iconfont refresh_money">&#xe602;</i>
                            <em class="hide_money_btn" style="color:#fff;">隐藏</em>
                        </span>
                        <span class="hide_money" style="display:none;color:#fff;">
                            已隐藏
                            <em class="show_money_btn" style="color:#fff;">显示</em>
                        </span>
    </li>
    <!-- <li class="xima l" style="color:#fff;">洗码：<span class="c-green" style="color:green;" way-data="user.xima">0</span></li> -->
    <li class="user_login_info4">
        <a href="<?php echo U('Account/quickRecharge');?>" style="color:#fff;">充值</a>
    </li>
    <li class="user_login_info5">
        <a href="<?php echo U('Account/withdrawals');?>" style="color:#fff;">提现</a>
    </li>
    <li class="user_login_info6">
        <a href="<?php echo U('Public/LoginOut');?>" style="color:#fff;">退出</a>
    </li>
    <li>
        <a href="<?php echo GetVar('kefuthree');?>" target="_blank" class="keufBox" style="margin-left: 0px;margin-top:8px;"></a>
    </li>
    <li style="padding:0;line-height: 59px;">
        <a href="tencent://message/?Menu=yes&uin=<?php echo GetVar('kefuqq');?>&Site=腾讯爱好者&Service=300&sigT=45a1e5847943b64c6ff3990f8a9e644d2b31356cb0b4ac6b24663a3c8dd0f8aa12a595b1714f9d45"    target="_blank">
            <img src="/resources/images/qq.gif" width="20" height="20" style="vertical-align: super;" />
        </a>
    </li>
    </ul>
    </div>
    <?php else: ?>
    <div class="pull-right user_login_info ">
        <a style="margin:0;color:#fff;" href="<?php echo U('Public/login');?>">亲，请登录</a>
        <em style="margin:0 3px;color:#fff;">|</em> <a href="<?php echo U('Public/register');?>" style="color:#fff;">用户注册</a><em style="margin:0 3px;color:#fff;">|</em>
        <a href="<?php echo U('Agent/index');?>" style="color:#fff;">代理中心</a>
    </div><?php endif; ?>
    </div>
</header>

<script>
    var ISLOGIN = "<?php echo ($userinfo["id"]); ?>";
    var index  = 0;
    $('.refresh_money').click(function () {
        index++;
        var sum = index*360;
        $(this).css('transform','rotate('+sum+'deg)');
    })
</script>

<script>
    $(function () {
        $('.refresh_money').click(function () {
            $.ajax({
                url:"<?php echo U('Account/refreshmoney');?>",
                type:'POST',
                success :function (data) {
                    $('.smallmoney').html(data);
                }
            })
        })

    })
    ref = setInterval(function(){
    $.ajax({
                url:"<?php echo U('Account/refreshmoney');?>",
                type:'POST',
                success :function (data) {
                    $('.smallmoney').html(data);
                }
            })
    },4000);
    ref1 = setInterval(function(){
        getUserBetsListToday();
    },20000);
</script>
<script type="text/javascript" src="/resources/js/way.min.js"></script>
<script type="text/javascript" src="/resources/js/jquery.history.js"></script>
<script type="text/javascript" src="/resources/main/common.js"></script>
<script type="text/javascript" src="/resources/main/index.js"></script>
<script type="text/javascript" src="/resources/js/member.page.js"></script>
<script type="text/javascript" src="/resources/js2/tabGameData.js"></script>
<script type="text/javascript" src="/resources/main/pl3.js"></script>
<script type="text/javascript" src="/resources/js2/pl3tabGame.js"></script>
<script type="text/javascript" src="/resources/js2/bootstrap.min.js"></script>
<!--<script src="/resources/js2/require.js" data-main="/resources/js2/homePage"></script>-->
<div id="video_box" style="width: 100vw; height: 100vh; background-color: rgba(0,0,0,0.8);">
            
        </div>
<section class="container wapper" id="gamepage" style="width:1030px!important;position: relative;">
    <span onclick="strat_video()" class="start_video">
        开<br/>启<br/>动<br/>画
    </span>
    	<div class="mychat">
    <span id="level" style="display: none;"><?php echo ($level); ?></span>
        <span id="is_chat" style="display: none;"><?php echo ($is_chat); ?></span>
    <span id="is_video" style="display: none;"><?php echo ($is_video); ?></span>
    <span id="chat_filter" style="display: none;"><?php echo ($chat_filter); ?></span>
    <span id="chattext" onclick="chatswitch()" style="position: absolute;
    width: 30px;
    font-size: 12px;
    line-height: 14px;
    text-align: center;
        padding: 5px;
    left: -30px;
    color: white;
    top: 50%;
    margin-top: -25px;
    background-color: red;
    border-radius: 5px;
    cursor: pointer;
        border-top-right-radius: 0px;
    border-bottom-right-radius: 0px;
    display: inline-block;">隐<br>藏<br>聊<br>天<br>室</span>
     <div class="chatbar">
    <!---->
    <div class="chatwin type-normal">
        <div class="chat">
            <div class="lay-relative">
                <!---->
                <div class="profile">
                    <div class="inner" style="animation-duration: 0.3s;">
                        <div class="avatar" ><img src="<?php echo ($info['head']); ?>" alt="" id="userhead"></div>
                        <p><span class="txt-nick">北京pk10</span></p>
                        <p>当前等级: <img src="/resources/images/chat/icon_member01.gif" alt="" class="head_level_img"></p>
                        <div>
                            <p>
                                <input type="file" id="upload_head" style="display: none">
                                <a href="javascript:void(0)" class="u-btn1">关闭</a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="chat-header">
                    <div class="ttl"><span> 聊天室</span></div>
                </div>
                <div class="list" style="bottom: 98px;" >
                    <div class="lay-scroll" style="padding-top: 45px;" id="content_parent">
                       
                        <?php if(is_array($chat_list)): $k1 = 0; $__LIST__ = $chat_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($k1 % 2 );++$k1;?><div class="Item <?php echo ($vo1['class']); ?>">
                            <div class="lay-block">
                                <div class="avatar" ><img src="<?php echo ($vo1['head']); ?>" alt="84***20"></div>
                                <div class="lay-content">
                                    <div class="msg-header">
                                        <h4><?php echo ($vo1['name']); ?></h4> <span><img src="<?php echo ($vo1['level_img']); ?>" alt="普通会员"></span> <span class="MsgTime"><?php echo ($vo1['create_at']); ?></span></div>
                                    <div class="Bubble" style="<?php echo ($vo1['style']); ?>">
                                        <p><span style="white-space: pre-wrap; word-break: break-all;"><?php echo ($vo1['content']); ?></span></p>
                                    
                                    </div>
                                </div>
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>

                    </div>
                    <div class="controls" style="top: 38px;">
                        <a href="javascript:void(0)" class="ListCtrl roll_screen"><i class="iconfont" style="vertical-align: -1px;"></i>滚屏</a>
                        <a href="javascript:void(0)" class="ListCtrl clear_screen"><i class="iconfont" style="vertical-align: 0px;"></i>清屏</a>
                    </div>
                    <div class="chat-announce">
                        <div class="ttl"><i class="iconfont icon-icon100"></i> 公告:</div>
                        <div class="scroll">
                            <marquee scrollamount="3">
                                <ol>
                      
                                     <?php if(is_array($gglist)): $k = 0; $__LIST__ = array_slice($gglist,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li><?php echo ($vo["title"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                </ol>
                            </marquee>
                        </div>
                    </div>
                </div>
                <div class="compose">
                    <div class="control-bar">
                        <div class="el-popover"  x-placement="top-start">

                            <div class="emoji-container">
                                <i class="Emoji emoji-smile" data-id="[smile]"></i>
                                <i class="Emoji emoji-laughing" data-id="[laughing]"></i>
                                <i class="Emoji emoji-blush" data-id="[blush]"></i>
                                <i class="Emoji emoji-heart_eyes" data-id="[heart_eyes]"></i>
                                <i class="Emoji emoji-smirk" data-id="[smirk]"></i>
                                <i class="Emoji emoji-flushed" data-id="[flushed]"></i>
                                <i class="Emoji emoji-grin" data-id="[grin]"></i>
                                <i class="Emoji emoji-kissing_smiling_eyes" data-id="[kissing_smiling_eyes]"></i>
                                <i class="Emoji emoji-wink" data-id="[wink]"></i>
                                <i class="Emoji emoji-kissing_closed_eyes" data-id="[kissing_closed_eyes]"></i>
                                <i class="Emoji emoji-stuck_out_tongue_winking_eye" data-id="[stuck_out_tongue_winking_eye]"></i>
                                <i class="Emoji emoji-sleeping" data-id="[sleeping]"></i>
                                <i class="Emoji emoji-worried" data-id="[worried]"></i>
                                <i class="Emoji emoji-sweat_smile" data-id="[sweat_smile]"></i>
                                <i class="Emoji emoji-cold_sweat" data-id="[cold_sweat]"></i>
                                <i class="Emoji emoji-joy" data-id="[joy]"></i>
                                <i class="Emoji emoji-sob" data-id="[sob]"></i>
                                <i class="Emoji emoji-angry" data-id="[angry]"></i>
                                <i class="Emoji emoji-mask" data-id="[mask]"></i>
                                <i class="Emoji emoji-scream" data-id="[scream]"></i>
                                <i class="Emoji emoji-sunglasses" data-id="[sunglasses]"></i>
                                <i class="Emoji emoji-thumbsup" data-id="[thumbsup]"></i>
                                <i class="Emoji emoji-clap" data-id="[clap]"></i>
                                <i class="Emoji emoji-ok_hand" data-id="[ok_hand]"></i>
                            </div>
                            <div x-arrow="" class="popper__arrow" style="left: 15.5px;"></div>
                        </div>
                        <span></span>
                        <a href="javascript:void(0)" title="发送表情" class="btn-control"><img style="width: 26px;" src="/resources/images/chat/biaoqing.png" /></a><label for="imgUploadInput" style="display: none;"><span title="上传图片" class="btn-control"><i class="iconfont icon-erjiyemian-liaotianduihua-danchuangtianjiatupian"></i> <input id="imgUploadInput" type="file" accept=".jpg, .png, .gif, .jpeg, image/jpeg, image/png, image/gif" style="width: 0.1px; height: 0.1px; opacity: 0; position: absolute; top: -20px;"></span></label>
                        <!---->
                        <!---->
                        <!---->
                    </div>
                    <div class="typing">
                        <div class="txtinput el-textarea {if $info['is_temporary']==1}is-disabled{/if}">
                            <textarea  id="textarea_content" {if $info['is_temporary']==1}disabled  placeholder="输入内容" {/if} type="textarea" autosize="[object Object]" rows="2" autocomplete="off" validateevent="true" class="el-textarea__inner" style="height: 54px;"></textarea>
                        </div>
                        <div class="sendbtn" onclick="onSubmit()">
                            <a href="javascript:void(0)" class="u-btn1">发送</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
 </div>
 <!-- end -->
	<div class="open_containers g_Time_Section">
        <!--彩种logo-->
        <div class="cz_logo">
            <h2 class="lottery_title_h2" way-data="showLotteryTitle.name">---</h2>
            <a href="javascript:void(0)" >
<!--                <i class="icon-pailie3 iconfont common_lottery_icon" style="color:#38b366;"></i>-->
				<img src="/resources/images/lot_img/" alt="">
			</a>
        </div>
        <!--彩种logo-->
        <!--彩种开奖倒计时-->
        <div class="cz_daojishi">
            <div class="open_issue">距&nbsp;&nbsp;
				<b class="c_red" id="f_lottery_info_number" way-data="showExpect.currFullExpect">---</b>&nbsp;&nbsp;期投注截止还有：
			</div>
            <div class="j_lottery_time" servertime="" style="font-size: 22px; color: rgb(255, 255, 255);">
				<div class="shij">
                	<span way-data="gametimes.h">00</span>
                    :
                	<span way-data="gametimes.m">00</span>
                    :
                	<span way-data="gametimes.s">00</span>
                </div>
			</div>
        </div>
        <!--彩种开奖倒计时-->

        <!--彩种开奖号码-->
        <div class="cz_openNumb">

            <div class="open_issue">第&nbsp;&nbsp;<b class="c_red" way-data="showExpect.lastFullExpect" id="f_lottery_info_lastnumber" firstissueno="">---</b>&nbsp;&nbsp;期开奖号码为：</div>
            <div class="open_number">
                <input type="hidden" value="1,1,2" id="j_openNum"><!--开奖号码效果赋值-->
                <ol id="ssc_winning_sum">
					<li class="ssc_winning_sum_gif" way-data="showExpect.openCode1"></li>
                    <li class="ssc_winning_sum_gif" way-data="showExpect.openCode2"></li>
                    <li class="ssc_winning_sum_gif" way-data="showExpect.openCode3"></li>
				</ol>
            </div>

        </div>
        <!--彩种开奖号码-->
    </div>
         <script type="text/javascript">
    function strat_video(){
            $("#video_box").animate({left:'0px'},800);
        }
        function close_video(){
            $("#video_box").animate({left:'-100vw'},700);
        }
     if($('#is_chat').html() == '1'){
                    $('.mychat').css('display','block');
            }else{
                     $('.mychat').css('display','none');
            }

            mian_video();

        
    function mian_video(){
        var type = $('.lottery_title_h2').html();   
        console.log(type);
             if($('#is_video').html() == '1'){
            if(type == '---'){
                setTimeout(function(){
                mian_video();   

            },300)
            }else if(type == '福彩3D'){

                $('.start_video').css("display","block");
            var str = '<div class="parent_chile"><iframe id="child" src="https://kj.kai861.com/view/video/fc3DVideo/index.html?10041?1682010.co" width="100%" scrolling="no" height="100%" frameborder="0"></iframe><img src="/resources/images/arraw_left.png" class="close_video_button" onclick="close_video()" /></div>';
                $('#video_box').append(str);
            }else if(type == '排列三'){

                $('.start_video').css("display","block");
            var str = '<div class="parent_chile"><iframe id="child" src="https://kj.kai861.com/view/video/fc3DVideo/index.html?10043?1682010.co" width="100%" scrolling="no" height="100%" frameborder="0"></iframe><img src="/resources/images/arraw_left.png" class="close_video_button" onclick="close_video()" /></div>';
                $('#video_box').append(str);
            }
        }
    }
 </script>
	<div class="lottery_playContainer">
		<div class="system_lottery_box">
			<span class="prev">
				<i class="iconfont icon-a866"></i>
			</span>
			<ul class="system_lottery" style="width: 1506px;">
				
				<?php if(is_array($ssclist)): $i = 0; $__LIST__ = $ssclist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if($vo['name'] == $lotteryname): ?>class="curr"<?php endif; ?> lotteryname="<?php echo ($vo["name"]); ?>">
						<a href="/Game.dpc?code=<?php echo ($vo["name"]); ?>"><?php echo ($vo["title"]); ?></a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>	
			</ul>
			<span class="next">
				<i class="iconfont icon-a866"></i>
			</span>
        </div>

		<div class="play_select_insert" id="j_play_select">
			<ul class="play_select_tit">
				<li lottery_code="pl3_3x" class="curr">三星</li>
				<li lottery_code="pl3_q2">前二</li>
				<li lottery_code="pl3_h2">后二</li>
				<li lottery_code="pl3_1x">一星</li>
				<li lottery_code="pl3_dsds">大小单双</li> 
			</ul>
		</div>
	
  
    <section id="gameBet" class="cl">
		<section class="gameBet_balls">
			<div class="gameBet_left l">
			<?php if($nowcpinfo['iswh'] == 0): ?><!--玩法二级选项开始-->
				<div class="bet_filter_box">
				
				</div>
				<!--玩法二级选项结束-->
				<!--玩法详细说明区域-->
				<div class="play_select_prompt" style="padding:10px 0;">
					<i class="iconfont c_org"></i>
					<span way-data="tabDoc"></span>
				</div>
				<div class="g_Number_Section" style="width: 720px;padding: 15px 0;">
				</div>
				<div class="selectMultiple">
					<span class="select_zhushu">
						您选择了
						<em class="zhushu">0</em>
						注,
					</span>
					<div class="selectMultipleNumber">
						<i class="reduce">-</i>
						<input type="tel" value="1" class="selectMultipInput" onKeypress="return (/[\d]/.test(String.fromCharCode(event.keyCode)))">
						<i class="add">+</i>
					</div>
					倍
					<select class="selectMultipleCon">
						<option value="1">元</option>
						<option value="0.1">角</option>
						<option value="0.01">分</option>
					</select>
					<span class="selectMultipleOld">
						共
						<em class="selectMultipleOldMoney">
							0.00
						</em>
						元
					</span>
				</div>
				<!--玩法详细说明区域-->
				<div class="addtobet">
					<button class="addtobetbtn" type="button">确认选号</button>
				</div>
				<div class="xiad-left">
				<dl class="yBettingLists">
					
				</dl>
				</div>     
				<div class="g_Chase_Section">
					<div class="chase_Program">
						<p class="p_chase">方案注数
							<i class="c_green fw_600" way-data="ytotal_money_zhushu" id="f_gameOrder_lotterys_num">0</i> 注， 
							金额 <i class="c_org fw_600">¥<em id="f_gameOrder_amount" way-data="ytotal_money">0</em></i> 元  
						</p>
					</div>
				</div>   
				<div class="xiad-righ">
					<ul>
						<li class="li22"><span id="f_submit_order" style="cursor: pointer;">
							<img src="/resources/images/icon/icon_06.png">&nbsp;&nbsp;确认投注</span>
						</li>
						<li class="li22 li23"><span id="orderlist_clear" style="cursor: pointer;">
							<img src="/resources/images/icon/icon_19.png">&nbsp;&nbsp;清空单号</span>
						</li>
					</ul>
				</div>
			<?php else: ?>
			<img src="/resources/images/k3cpcz.png" /><?php endif; ?>
			</div>
		
			
		</section>
		<!--选号区域右侧-->
        <div class="gameBet_right">
            <!--今日开奖号码-->
            <div class="right_infsoBlock">
                <div class="title">
                    <span class="fl">开奖公告</span>
                    <span class="fr">
                    <a target="_blank" class="open_lotteryNumb_chart yopen_explain"  href="<?php echo U('Trend/trend_dpc',array('code'=>$nowcpinfo['name']));?>">走势图</a>
                    |
                    <a href="javascript:void(0);" class="yopen_explain helps">玩法说明</a>
                    </span>
                </div>
                <div class="block_container lishi">
                    <table id="fn_getoPenGame" border="0px" cellpadding="0" cellspacing="0">
                        <colgroup>
                            <col width="93px" />
                            <col width="50px" />
                            <col width="40px" />
                            <col width="59px" />
                        </colgroup>
                        <thead>
                        <tr>
                            <th>期数</th>
                            <th>奖号</th>
                            <th>开奖时间</th>
                        </tr>
                        </thead>
                        <tbody class="tbody text-c">
                        <!--开奖期号-->
                        <!--开奖号码-->
                        <!--和值-->
                        <!--大小-->
                        <!--单双-->
                        </tbody>
                    </table>
                </div>
            </div>
            <!--今日开奖号码-->

            <!--最新中奖会员-->
            <div class="least_luckMember">
                <div class="title">
                    <span>中奖信息</span>
                    <em class="to_update">中奖信息实时更新</em>
                </div>
                <div class="ranking_scroll_box" style="height:435px;">
                <ul class="ranking_list sum_icon ranking_scroll">

                    <?php if(is_array($list2)): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li data-html="true" class="user_header" data-container="body" data-toggle="popover" data-placement="left" data-content="<div class=&quot;ceng&quot;><div class=&quot;media&quot;><div class=&quot;media-left&quot;><img src=&quot;<?php echo ($value['face']); ?>&quot; alt=&quot;&quot; class=&quot;media-boject img-circle&quot;><p></p></div><div class=&quot;media-body&quot;> <p class=&quot;margin_0&quot;>账号：<span><?php echo (substr_replace($value['username'],'**',1,2)); ?></span></p><p class=&quot;margin_0&quot;>等级：<span><?php echo ($value['groupname']); ?></span></p><p class=&quot;margin_0&quot;>头衔：<span><?php echo ($value['touhan']); ?></span></p><p class=&quot;margin_0&quot;>累积中奖：<span><?php echo ($value['okamountcount']); ?></span></p></div>
                   <div class=&quot;media-footer&quot; style=&quot;padding-top:3px;&quot;>
                       <?php if(is_array($value['k3names'])): $i = 0; $__LIST__ = array_slice($value['k3names'],0,10,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href=&quot;<?php echo U('Game/k3');?>?code=<?php echo ($val[name]); ?>&quot; class=&quot;color_res&quot; ><span style=&quot;color:#333&quot;><?php echo (substr($val["title"],0,6)); ?></span><i class=&quot;iconfont&quot;></i></a><?php endforeach; endif; else: echo "" ;endif; ?>
                   </div></div></div>" data-original-title="" title="">
                        <div class="media clearfix">
                            <div class="media-left">
                                <img src="<?php echo ($value['face']); ?>" alt="" class="media-boject img-circle">
                            </div>
                            <div class="media-body">
                                <p class="margin_0">账号昵称：<span><?php echo (substr_replace($value['username'],'**',1,2)); ?></span></p>
                                <p class="margin_0">中奖金额：<em><?php echo ($value['okamount']); ?></em></p>
                            </div>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                </div>
            </div>
            <!--最新中奖会员-->
        </div>
        <!--选号区域右侧-->
		<!--<section class="gameBet_openlists">
			<div class="jinqi">
				<div class="title" style="height:30px; line-height:30px; border-bottom:1px solid #ddd">
                    <p class="pull-left" style="margin-left:10px;">
                        <img src="/resources/images/jbei.jpg" />开奖公告
                    </p>
                    <p class="pull-right" style="margin-right:10px;">
                        <a href="<?php echo U('Game/trend',['code'=>$lotteryname]);?>">形态走势</a>
                    </p>
                </div>
				<div class="lishi">
				<table>
					<tbody class="text-c"></tbody>
				</table>
				</div>
			</div>
		</section>-->
    </section>
<!--投注记录---->
<section class="historylist mt-20">
	<div class="history-box">
		<div class="tabBd lot-tabBd" style="display:block">
			<table class="mem-biao" id="userBets">
				<thead>
				<tr>
					<th>订单号</th>
					<th>期号</th>
					<th>开奖号</th>
					<th>玩法</th>
					<th>赔率</th>
					<th>投注总额</th>
					<th>奖金</th>
					<th>下单时间</th>
					<th>状态</th>
				</tr>
				</thead>
				<tbody id="userBetsListToday"></table>
		</div>
		<div class="member-pag paging"></div>
	</div>
</section>
</section>
</div>
<footer class="footer" style="clear:both">
    <div class="footer_main">
        <div class="container">
            <div class="row">
                <div class="col-xs-3 footer_left padding_0">
                    <div class="footer_common_title">
                        <h2>技术支持 <span>Technical support</span></h2>
                    </div>
                    <div class="clearfix footer_l_content">
                        <a href="">
                            <div class="pull-left">
                                <img src="/resources/images/dafayun.png" alt="">
                            </div>
                            <p class="pull-left">
                                <span><?php echo GetVar('webtitle');?>系统</span>
                                <span>专业彩票系统平台</span>
                            </p>
                        </a>
                    </div>
                    <i></i>
                </div>
                <div class="col-xs-4 footer_middle">
                    <div class="footer_common_title">
                        <h2>服务体验 <span>Service experience</span></h2>
                        <div class="footer_m_content">
                            <div class="clearfix enter">
                                <span class="pull-left">昨日充值到账平均时间</span>
                                <p class="bar pull-left margin_0">
                                    <span class="bar_red"></span>
                                </p>
                                <span class="miao pull-left"><em>53</em> 秒</span>
                            </div>
                            <div class="clearfix enter">
                                <span class="pull-left">昨日提现到账平均时间</span>
                                <p class="bar pull-left margin_0">
                                    <span class="bar_blue"></span>
                                </p>
                                <span class="miao pull-left"><em>17'40</em> 秒</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3 footer_right">
                    <div class="footer_common_title">
                        <h2>充值展示 <span>Recharge method</span></h2>
                    </div>
                    <div class="chongzhi_img_box">
                        <span class="chongzhi_img1"></span>
                        <span class="chongzhi_img2"></span>
                        <span class="chongzhi_img3"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_other">
        <div class="container">
            <p class="footer_link">
                <a href="<?php echo U('News/lists',['catid'=>30,'showid'=>3]);?>?About ">关于我们</a>
                <a href="<?php echo U('News/lists',['catid'=>30,'showid'=>56]);?>?About">联系我们</a>
                <a href="<?php echo U('News/lists',['catid'=>30,'showid'=>57]);?>?About">商务合作</a>
                <a href="<?php echo U('News/lists',['catid'=>30,'showid'=>58]);?>?About">法律声明</a>
                <a href="<?php echo U('News/lists',['catid'=>30,'showid'=>59]);?>?About">隐私声明</a>
            </p>
            <p class="footer_copyright">
                Copyright ©  <?php echo GetVar('webtitle');?>  Reserved | 18+
            </p>
        </div>
    </div>
</footer>
<?php if($_COOKIE['showgg']== '1' && $_SESSION['userinfo']!= ''): ?><div class="notice">
    <div class="noticCon">
        <h3>网站最新公告 <a class="iconfont icon-guanbi-copy closeNotice"></a></h3>
     <ul>
         <?php if(is_array($gglist)): $k = 0; $__LIST__ = array_slice($gglist,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li><a href=<?php echo U('Member/ggshow',array('aid'=>$vo['id']));?>><?php echo ($vo["title"]); ?><br>[<?php echo (date("Y-m-d H:i:s",$vo["oddtime"])); ?>]</a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    </div>
</div><?php endif; ?> 
<script>
    $('.notice').find('.closeNotice').click(function (){
     
        $('.notice').hide();
        $.ajax({
            url : "<?php echo U('Common/closegg');?>",
            type:"POST",
        })
    })
</script>
<div class="loginCengBox">
	<div class="loginCeng">
		<div class="loginCengH">
			<h3>温馨提示</h3>
			<span class="loginCengClose">
				<i class="iconfont icon-guanbi-copy"></i>
			</span>
		</div>
		<div class="loginCengB">
		
		</div>
		<div class="loginCengF">
			<button type="submit" >确定</button>
		</div>
	</div>
</div>


<div id="submitComfirebox" style="display:none">
    <div class="submitComfire">	<ul class="ui-form"><li><label for="question1" class="ui-label">彩种：</label><span class="ui-text-info" way-data="showExpect.shortname">--</span></li>		<li><label for="question1" class="ui-label">期号：</label><span class="ui-text-info">第 <span way-data="showExpect.currFullExpect" class="mark">---</span> 期</span></li>		<li><label for="answer1" class="ui-label">详情：</label>		<div id="Orderdetaillist" class="textarea" style="font-size:12px;">		</div>		</li>		<li><label for="question2" class="ui-label">付款总金额：</label><span class="ui-text-info"><span id="Orderdetailtotalprice" class="mark">0.00</span>元</span></li>		<li><label for="question2" class="ui-label">付款帐号：</label><span way-data="user.username" class="ui-text-info mark">---</span></li>	</ul>	<p class="text-note">	</p>	<p class="text-note">	</p></div>
</div>

<div id="submitComfireboxaaa" style="display:none">
    <div class="submitComfire">
    <ul class="ui-form">
    <li>
        <label for="question1" class="ui-label">彩种：</label>
        <span class="ui-text-info" way-data="showExpect.shortname">--</span>
    </li>
    <li>
        <label for="question1" class="ui-label">期号：</label>
        <span class="ui-text-info">第 <span way-data="showExpect.currFullExpect" class="mark">---</span> 期</span>
    </li>
    <li>
        <label for="answer1" class="ui-label">详情：</label>
        <div id="Orderdetaillist" class="textarea" style="font-size:12px;">		</div>
    </li>
    <li>
        <label for="question2" class="ui-label">付款总金额：</label>
        <span class="ui-text-info"><span id="Orderdetailtotalprice" class="mark">0.00</span>元</span>
    </li>
    <li>
        <label for="question2" class="ui-label">付款帐号：</label>
        <span way-data="user.username" class="ui-text-info mark">---</span>
    </li>
    </ul>
    </div>
</div>

<div id="getBillInfobox" style="display:none">
<div class="submitComfire">
<ul class="ui-form">
<li style="width:50%; float:left"><label for="question1" class="ui-label">彩种：</label><span class="mark" way-data="BillInfo.cptitle">--</span></li>
<li style="width:50%; float:left"><label for="question1" class="ui-label">期号：</label><span class="mark">第 <span way-data="BillInfo.expect" class="mark">--</span> 期</span></li>	
<li style="width:50%; float:left"><label for="question1" class="ui-label">玩法：</label><span class="mark" way-data="BillInfo.playtitle">--</span></li>
<li style="width:50%; float:left"><label for="question1" class="ui-label">赔率：</label><span way-data="BillInfo.mode" class="mark">--</span></li>	
<li><label for="answer1" class="ui-label">投注号码：</label><span class="mark" way-data="BillInfo.tzcode">--</span></li>	
<li style="width:50%; float:left"><label for="question2" class="ui-label">单注金额：</label><span class="mark" way-data="BillInfo.amount">--</span></li><li style="width:50%; float:left"><label for="question2" class="ui-label">投注注数：</label><span class="mark" way-data="BillInfo.itemcount">--</span></li>
<li style="width:50%; float:left"><label for="question2" class="ui-label">中奖金额：</label><span class="mark" way-data="BillInfo.okamount">--</span></li><li style="width:50%; float:left"><label for="question2" class="ui-label">中奖注数：</label><span class="mark" way-data="BillInfo.okcount">--</span></li>


<li style="width:50%; float:left"><label for="question2" class="ui-label">开奖号码：</label><span class="mark" way-data="BillInfo.opencode">--</span></li><li style="width:50%; float:left"><label for="question2" class="ui-label">中奖状态：</label><span id="BillInfo_isdraw" way-data="BillInfo.state">--</span></li>
</ul>
</div>
</div>
<div id="submitComfirebox" style="display:none">
    <div class="submitComfire">
		<ul class="ui-form">
			<li>
				<label for="question1" class="ui-label">彩种：</label>
				<span class="ui-text-info" way-data="showExpect.shortname">--</span>
			</li>
			<li>
				<label for="question1" class="ui-label">期号：</label>
				<span class="ui-text-info">第 <span way-data="showExpect.currFullExpect" class="mark">---</span> 期</span>
			</li>		
			<li>
				<label for="answer1" class="ui-label">详情：</label>
				<div id="Orderdetaillist" class="textarea" style="font-size:12px;"></div>		
			</li>		
			<li>
				<label for="question2" class="ui-label">付款总金额：</label>
				<span class="ui-text-info"><span id="Orderdetailtotalprice" class="mark">0.00</span>元</span>
			</li>		
			<li>
				<label for="question2" class="ui-label">付款帐号：</label>
				<span way-data="user.username" class="ui-text-info mark">---</span>
			</li>	
		</ul>	
		<p class="text-note">	</p>	<p class="text-note">	</p>
	</div>
</div>
<script>
	function winningScroll(obj) {
		var height = $(obj).find('li:first').outerHeight();
		var str = -height + 'px';
		var index = 0;

		$(obj).animate({'marginTop' : str},3000,function (){
			$(this).css('marginTop','0px').find('li:first').appendTo($(this));
		})
	}

	function openwindow(url,name,iWidth,iHeight) {
		var url; 
		var name; 
		var iWidth; 
		var iHeight; 
	 
		var iTop = (window.screen.height-30-iHeight)/2; 
		var iLeft = (window.screen.width-10-iWidth)/2; 
		window.open(url,name,'height='+iHeight+',,innerHeight='+iHeight+',width='+iWidth+',innerWidth='+iWidth+',top='+iTop+',left='+iLeft+',toolbar=no,menubar=no,scrollbars=auto,resizeable=no,location=no,status=no');
	}
 
	$('.cz_logo>a>img').attr('src',$('.cz_logo>a>img')[0].src+getQueryString('code')+'.png');

 
	$('.helps').click(function () {
		openwindow("<?php echo U('Game/howtoplay', array('name'=>$nowcpinfo['name'],'cz'=>ACTION_NAME));?>",'',1058,870);
	})

 
	var myar = setInterval("winningScroll('.ranking_scroll')",5000);
	$('.ranking_scroll').hover(function (){ 
		clearInterval(myar);
	},function () {
		myar = setInterval("winningScroll('.ranking_scroll')",5000);
	})
 
	var timer1 = null;
	$('.my_account,.user_login_info2_list').mouseover(function (){
		if(timer1){
			clearTimeout(timer1);
		}
		$('.user_login_info2_list').show();
	})
	$('.my_account,.user_login_info2_list').mouseout(function (){
		timer1 = setTimeout(function (){
			$('.user_login_info2_list').hide();
		},300)
	})
 
	var timer2 = null;
	$('.allLottery,.backLeftLottery').mouseover(function (){
		if(timer2){
			clearTimeout(timer2);
		}
		$('.backLeftLottery').show();
	})
	$('.allLottery,.backLeftLottery').mouseout(function (){
		timer2 = setTimeout(function (){
			$('.backLeftLottery').hide();
		},300)
	})
 
	$('.hide_money_btn').click(function () {
		$('.show_money').hide();
		$('.hide_money').show();
	})
	$('.show_money_btn').click(function () {
		$('.show_money').show();
		$('.hide_money').hide();
	})
 
	var index  = 0;
	$('.refresh_money').click(function () {
		index++;
		var sum = index*360;
		$(this).css('transform','rotate('+sum+'deg)');
	})
 
	$("[data-toggle='popover']").popover({
	trigger: "hover",
	delay: {hide: 100}
	}).on('shown.bs.popover', function (event) {
			var that = this;
			$('.popover').on('mouseenter', function () {
					$(that).attr('in', true);
			}).on('mouseleave', function () {
					$(that).removeAttr('in');
					$(that).popover('hide');
			});
	}).on('hide.bs.popover', function (event) {
			if ($(this).attr('in')) {
					event.preventDefault();
			}
	});
</script>
<style>
	.looding{
		width:100%;
		height:200%;
		z-index: 999;
		background: rgba(0,0,0,0.7);
		position: absolute;
		color:#333;
		top:0;
		left:0;
		text-align:center
	}
	.looding span{
		z-index: 9999;
		background: #ffffff;
		text-align:center;
		font-size:20px;
		color:#000;
		display: block;
		width:200px;
		height:50px;
		line-height: 50px;
		border-radius: 5px;
		position: fixed;
		top: 50%;
		left: 50%;
		margin-top: -25px;
		margin-left: -100PX;
	}
</style>
<div class="looding"  style="display:none;">
	<span>正在处理数椐... <img src="/resources/images/addloading.gif" width="23" height="23" alt=""></span>

</div>
</body>
<script type="text/javascript" src="/resources/js/chat/webchat.js"></script>
</html>