<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo GetVar('webtitle');?></title>
    <meta name="keywords" content="<?php echo GetVar('keywords');?>" />
    <meta name="description" content="<?php echo GetVar('description');?>" />
    <meta name="renderer" content="webkit" />
    <link rel="stylesheet" href="/resources/css2/bootstrap.min.css">
    <link rel="stylesheet" href="/resources/css2/reset.css">
    <link rel="stylesheet" href="/resources/css2/icon.css">
    <link rel="stylesheet" href="/resources/css2/header.css">
    <link rel="stylesheet" href="/resources/css2/main.css">
    <link rel="stylesheet" href="/resources/css2/footer.css">

</head>
<body>
<script>
    var WebConfigs = {
        "ROOT" : "",
        'IMG' : "/resources/images",
    }
</script>
<img alt="箭头" src="//ia.51.la/go1?id=20429299&pvFlag=1" style="display:none;" />
<script>
    var WebConfigs = {
        "ROOT" : "",
        'IMG' : "/resources/images",
    }
</script>
<script type="text/javascript" src="/resources/js/jquery-3.1.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="/resources/css/artDialog.css" />
<link rel="stylesheet" type="text/css" href="/resources/css/headernav.css" />
<script type="text/javascript" src="/resources/js/artDialog.js"></script>
<script type="text/javascript" src="/resources/js/way.min.js"></script>
<script type="text/javascript" src="/resources/main/common.js"></script>
<header class="header" style="height:30px;">
    <div class="container claerfix">
        <div class="pull-left">
            Hi，欢迎来到<?php echo GetVar('webtitle');?>！
        </div>

        <?php if(!empty($userinfo["username"])): ?><div class="pull-right user_login_info">
                <ul>
                    <!--<p class="margin_0">性别：<span><?php if(($userinfo['sex']) == "1"): ?>男<?php endif; if(($userinfo['sex']) == "2"): ?>女<?php endif; if(($userinfo['sex']) == ""): ?>保密<?php endif; ?></span></p>-->
                    <li class="user_login_info1">
                        <a  href="<?php echo U('Member/index');?>" class="user_header" data-html="true" class="user_header" data-container="body" data-toggle="popover" data-placement="bottom"data-content='<div class="ceng"><div class="media"><div class="media-left"><a href="<?php echo U('Member/index');?>"><img src="<?php echo ($userinfo["face"]); ?>" alt="" class="media-boject img-circle"></a><p><?php echo ($userinfo["username"]); ?></p></div><div class="media-body" style="padding-bottom:10px;">
                <p class="margin_0">账号：<span><?php echo ($userinfo["username"]); ?></span></p>
                <p class="margin_0">等级：<span><?php echo ($userinfo["groupname"]); ?></span></p>
                <p class="margin_0">头衔：<span><?php if(($userinfo['groupname']) == "代理"): ?>总代理 <?php else: echo ($userinfo["touhan"]); endif; ?></span></p>
                <p class="margin_0">累积中奖：<span><?php echo (session('okamountcount')); ?></span></p>
            </div>
            <div class="media-footer">
                <?php if(is_array($_SESSION['k3names'])): $i = 0; $__LIST__ = $_SESSION['k3names'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Game/k3');?>?code=<?php echo ($value['cpname']); ?>" title="<?php echo ($value["cptitle"]); ?>" class="color_res" style="font-size:5px;"><span style="color:#333;display: block;margin-top:4px;"><?php echo (substr($value["cptitle"],0,6)); ?></span><i class="iconfont">&#xe607;</i></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </div></div></div>'>
    <img class="img-circle"  src="<?php echo ($userinfo["face"]); ?>" alt="">
    <?php echo ($userinfo['username']); ?>
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
        <a href="<?php echo U('Member/index');?>" class="my_account">
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
    <li class="user_login_info3">
        余额：
        <span class="show_money">
                            <em class="smallmoney" style="color:#F70B0F;"><?php echo ($userinfo['balance']); ?></em>
                            <i class="iconfont refresh_money">&#xe602;</i>
                            <em class="hide_money_btn">隐藏</em>
                        </span>
        <span class="hide_money" style="display:none;">
                            已隐藏
                            <em class="show_money_btn">显示</em>
                        </span>
    </li>
    <!-- <li class="xima l">洗码：<span class="c-green" style="color:green;" way-data="user.xima">0</span></li> -->
    <li class="user_login_info4">
        <a href="<?php echo U('Account/quickRecharge');?>">充值</a>
    </li>
    <li class="user_login_info5">
        <a href="<?php echo U('Account/withdrawals');?>">提现</a>
    </li>
    <li class="user_login_info6">
        <a href="<?php echo U('Public/LoginOut');?>">退出</a>
    </li>
    <li>
        <a href="<?php echo GetVar('kefuthree');?>"    target="_blank"   class="keufBox" style="margin-left: 0px;"></a>
    </li>
    <li style="padding:0;line-height: 49px;">
        <a href="tencent://message/?Menu=yes&uin=<?php echo GetVar('kefuqq');?>&Site=腾讯爱好者&Service=300&sigT=45a1e5847943b64c6ff3990f8a9e644d2b31356cb0b4ac6b24663a3c8dd0f8aa12a595b1714f9d45"  target="_blank">
            <img src="/resources/images/qq.gif" width="20" height="20" style="vertical-align: super;" />
        </a>
    </li>
    </ul>
    </div>
    <?php else: ?>
    <div class="pull-right user_login_info ">
        <a style="margin:0;float:left;" href="<?php echo U('Public/login');?>">亲，请登录</a>
        <em style="margin:0 3px;color:#ccc;float:left;">|</em>
        <a style="float:left;" href="<?php echo U('Public/register');?>">用户注册</a>
        <em style="margin:0 3px;color:#ccc;float:left;">|</em>
        <a style="float:left;" href="<?php echo U('Agent/index');?>" >代理中心</a>
<!--        <a href="<?php echo GetVar('kefuthree');?>"    target="_blank"   class="keufBox pull-left"></a>-->
<!--        <a href="<?php echo GetVar('kefuqq');?>"    target="_blank">-->
<!--            <img src="/resources/images/qq.gif" width="20" height="20" style="vertical-align: super;float:left;margin-top:4px;" />-->
<!--        </a>-->
    </div><?php endif; ?>
    </div>
</header>

<script>
    var ISLOGIN = "<?php echo ($userinfo["id"]); ?>";
</script>

<style>
    .container > a.logo{
        margin:5px 0px;
        overflow: hidden;
        height: 80px;
        width: 350px;
    }

    .container > ul.header_login{
        height: 80px;
        overflow: hidden;
    }

    ul.header_login li{
        float: left;
        margin-top: 24px;
        position: relative;
        margin-right: 5px;
    }

    ul.header_login input{
        width: 135px;
        height: 27px;
        border-radius: 2px;
        border: 1px solid #ddd;
        background-color: #fff;
        color: #333;
        padding-left: 8px;
    }

    ul.header_login>li>a.btn{
        margin: 0;
        height: 26px;
        width: 72px;
        line-height: 26px;
        padding: 0px;
    }

    .head8{
        height: 40px;
    }

    .head8 .nav {
        height: 39px;
    }

    .head8 .nav .container{
        height: 37px;
    }

    .head8 .nav .container .navItem{
        height: 35px;
    }

    .head8 .nav .container .navItem li{
        height: 34px;
    }

    .head8 .nav .container .navItem a{
        height: 35px;
    }

    .head8 .navItem span{
        height: 39px;
    }

    .header_login a.btn{
        font-size: 12px;
    }

    .header_login .login{
        background-color: #f13131;
    }

    .header_login .register{
        background-color: #ff9726;
        color:white;
    }

</style>

<div class="container clearfix" style="display: none;">
    <a href="/" class="logo pull-left">
        <img src="resources/images/logo-3.png" style="width: 70px;height: 70px;" />
        <span class="my_logo"><?php echo GetVar('webtitle');?></span>
        <img src="resources/images/logo_dream.png" style="width:79px;height:27px;margin-left:8px;"/>
    </a>
    <style type="text/css">
        .my_logo{
       display: inline-block;
    vertical-align: middle;
    font-weight: 600;
    background-image: -webkit-linear-gradient(left,#FFEB3B,#ff7d02 10%,#ff7d02 20%,#c3f985 30%, #CCCCFF 40%, #ff7902 50%,#f38bf0 60%,#ff7902 70%,#c3f985 80%,#ff7d02 90%,#FFEB3B 100%);
    -webkit-text-fill-color: transparent;
    -webkit-background-clip: text;
    -webkit-background-size: 200% 100%;
    -webkit-animation: masked-animation 4s linear infinite;
    font-size: 25px;
}
@keyframes masked-animation {
    0% {
        background-position: 0  0;
    }
    100% {
        background-position: -100%  0;
    }
}
    </style>
    <?php if(!empty($userinfo["username"])): else: ?>

        <ul class="header_login pull-left">
            <li><input type="text"  name="name"  placeholder="用户名"></li>
            <li><input type="password"  name="password2"  placeholder="密码"></li>
            <li>
                <a href="javascript:void(0);" class="btn btn-danger login">登录</a>
                <a href="javascript:void(0);" class="btn btn-default register" onclick="location.href='<?php echo U('Public/register');?>'">注册</a>
            </li>
        </ul><?php endif; ?>


    <a href="<?php echo GetVar('kefuthree');?>" target="_blank">
        <img src="resources/images/kefu.png" width="75" height="75" alt="" style="margin-right: 10px;float:right;margin-top:5px;cursor: pointer;">
    </a>

</div>
<style type="text/css">
    .head8 {
        font-size: 0px;
    }
    .head8 .nav{
        border: 0px !important;
    }
    .head8,.head8 .nav ,.head8 .nav .container,.head8 .nav .container .navItem a {
        height: 72px;
        line-height: 72px !important;
    }
    .head8 .nav .container .navItem a {
        font-size: 16px !important;
    }
    .head8 .nav .container .navItem li ,.head8 .nav .container .navItem{
   border-left: none !important; 
  border-right: none !important;
}
.head8 .nav .container .navItem a:hover {
color:#fedf50;
}
</style>
<div class="header head8">
    <div class="nav">
        <div class="container fix">
             <img src="resources/images/mylogo.png" style="height: 65px;">
            <ul class="navItem fix flr" style="position: relative;">

                <li class=""><a href="/">首页</a></li>
                <!---->
                <!-- <li class=""><a href="<?php echo U('Index/zrvideo');?>">真人视讯</a></li> -->
                <li class=""><a href="<?php echo U('Index/lottery');?>">购彩大厅</a></li>
                <!---->
                <li class=""><a href="<?php echo U('Activity/index');?>">活动中心</a></li>
                <!---->
                <li class=""><a href="<?php echo U('Index/mobile');?>">手机购彩</a></li>
                <!---->
                <li class=""><a href="<?php echo U('Member/index');?>">我的账户</a></li>
                <!---->
                <li class=""><a href="<?php echo U('News/lists',array('catid'=>33));?>">帮助指南</a></li>
                <!---->
                <span></span>
            </ul>
        </div>
    </div>
<img alt="箭头" src="//ia.51.la/go1?id=20429299&pvFlag=1" style="display:none;" />
</div>



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
        });

        $(".header_login a.login").click(function(){
            
            
            $.post("<?php echo U('Public/logindo');?>",{
                name:$("input[name='name']").val(),
                pass:$("input[name='password2']").val()
            },function(json){
                console.log(json.message);
                if(json.sign==1){
                    loginCengBoxFn(json.message);
                    window.location.href = "<?php echo U('Member.index');?>";
                }else{
                    loginCengBoxFn(json.message);
                }
            },'json');
        });



    })
</script>

<script type="text/javascript" src="/resources/js/way.min.js"></script>
<script type="text/javascript" src="/resources/main/common.js"></script>
<script type="text/javascript" src="/resources/main/index.js"></script>
<script src="/resources/js2/require.js" data-main="/resources/js2/homePage"></script>

<div class="main">
    <!-- 首页两边 -->
    <div class="container">
         <div style="position: fixed;top: 0px;left: 0px;width: 100%;">
            <div style="position: fixed;width: 130px;height: 500px;left: 10px;top: 106px;">
                <img src="/resources/images/left_banner.png" style="width: 130px;">
                <div style="width: 100px;margin: 0 auto;border-radius: 5px; height: 300px;background-color: #f72222;color: white;font-size: 26px;line-height: 40px;position: relative; text-align: center;">
                    <br>投<br>入<br>梦<br>想
                    <img src="/resources/images/hua.png" style="width: 130px;position: absolute;bottom: -10px;right: -30px;">
                </div>
            </div>
            <div style="position: fixed;width: 130px;height: 500px;right: 10px;top: 106px;">
                <img src="/resources/images/left_banner.png" style="width: 130px;">
                <div style="width: 100px;margin: 0 auto;border-radius: 5px; height: 300px;background-color: #f72222;color: white;font-size: 26px;line-height: 40px;position: relative; text-align: center;">
                    <br>注<br>定<br>精<br>彩
                     <img src="/resources/images/hua.png" style="width: 130px;position: absolute;bottom: -10px;right: -30px;">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3 main_left padding_0">
                <ul class="magin_left_list indexcplist" >



                    <?php if(is_array($bncaipiao)): $i = 0; $__LIST__ = $bncaipiao;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($i % 2 );++$i;?><li>
                            <?php switch($cp["typeid"]): case "k3": ?><a href="/Game.k3?code=<?php echo ($cp[name]); ?>" title="<?php echo ($cp[ftitle]); ?>">
                                        <i class="iconfont"><img src="/resources/images/lot_img/<?php echo ($cp["name"]); ?>.png" style="width:38px"/></i><?php break;?>
                                <?php case "lhc": ?><a href="/Game.lhc?code=<?php echo ($cp[name]); ?>" title="<?php echo ($cp[ftitle]); ?>">
                                        <i class="iconfont" style="color:#07b39e"><img src="/resources/images/lot_img/<?php echo ($cp["name"]); ?>.png" style="width:38px"/></i><?php break;?>
                                <?php case "ssc": ?><a href="/Game.ssc?code=<?php echo ($cp[name]); ?>" title="<?php echo ($cp[ftitle]); ?>">
                                        <i class="iconfont special " ><img src="/resources/images/lot_img/<?php echo ($cp["name"]); ?>.png" style="width:38px"/></i><?php break;?>
                                <?php case "pk10": ?><a href="/Game.pk10?code=<?php echo ($cp[name]); ?>" title="<?php echo ($cp[ftitle]); ?>">
                                        <i class="iconfont " style="color:#f22751" ><img src="/resources/images/lot_img/<?php echo ($cp["name"]); ?>.png" style="width:38px"/></i><?php break;?>
                                <?php case "keno": ?><a href="/Game.keno?code=<?php echo ($cp[name]); ?>" title="<?php echo ($cp[ftitle]); ?>">
                                        <i class="iconfont" style="color:#fc5826" ><img src="/resources/images/lot_img/<?php echo ($cp["name"]); ?>.png" style="width:38px"/></i><?php break;?>
                                <?php case "x5": ?><a href="/Game.x5?code=<?php echo ($cp[name]); ?>" title="<?php echo ($cp[ftitle]); ?>">
                                        <i class="iconfont"><img src="/resources/images/lot_img/<?php echo ($cp["name"]); ?>.png" style="width:38px"/></i><?php break;?>
                                <?php case "dpc": ?><a href="/Game.dpc?code=<?php echo ($cp[name]); ?>" title="<?php echo ($cp[ftitle]); ?>">
                                        <i class="iconfont <?php if(strstr($cp['name'],'3d')){}else{}?>">
                                            <?php if(strstr($cp['name'],'3d')){ ?>
                                                <img src="/resources/images/lot_img/<?php echo ($cp["name"]); ?>.png" style="width:38px">
                                            <?php } ?>

                                            <?php if(strstr($cp['name'],'pl3')){ ?>
                                                <img src="/resources/images/lot_img/<?php echo ($cp["name"]); ?>.png" style="width:38px">
                                            <?php } ?></i><?php break; endswitch;?>
                            <em><?php echo ($cp[title]); ?></em>
                            <span><?php echo (msubstr($cp[ftitle],'0','6','utf-8','')); ?></span>
                            </a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="col-xs-6 main_middle">
                <div class="middle_swiper">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <!-- <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                            <li data-target="#myCarousel" data-slide-to="4"></li> -->
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <a href="<?php echo U('Activity/index');?>"><img src="/resources/images/indexbanner1.jpg" alt=""></a>
                            </div>
                            <div class="item">
                                <a href="<?php echo U('Activity/index');?>"><img src="/resources/images/indexbanner2.jpg" alt=""></a>
                            </div>
                           <!--  <div class="item">
                                <a href="<?php echo U('Activity/index');?>"><img src="/resources/images/indexbanner3.jpg" alt=""></a>
                            </div>
                            <div class="item">
                                <a href="<?php echo U('Activity/index');?>"><img src="/resources/images/indexbanner4.jpg" alt=""></a>
                            </div>
                            <div class="item">
                                <a href="<?php echo U('Activity/index');?>"><img src="/resources/images/indexbanner5.jpg" alt=""></a>
                            </div> -->
                        </div>
                    </div>
                </div>
                <!--
                    <div class="middle_swiper">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="100">
                                            <ol class="carousel-indicators">
                                                <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                            </ol>
                                            <div class="carousel-inner">
                                                <div class="item active">
                                                    <a href=""><img src="img/banner1.png" alt=""></a>
                                                </div>
                                                <div class="item">
                                                    <a href=""><img src="img/banner2.png" alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    -->
               <div class="middle_tab main_common_bor">
                    <div class="tab_menu">
                        <ul class="tab_menu_box row margin_0">
                            <?php if(is_array($bncaipiao)): $key = 0; $__LIST__ = $bncaipiao;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($key % 2 );++$key; if(($value["name"]) == "bjk3"): ?><li class=" active col-xs-4"><?php echo ($value['title']); ?></li><?php endif; ?>
                                <?php if(($value["name"]) == "cqssc"): ?><li class="col-xs-4"><?php echo ($value['title']); ?></li><?php endif; ?>
                                <?php if(($value["name"]) == "gd11x5"): ?><li class="col-xs-4"><?php echo ($value['title']); ?></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>

                        </ul>
                        <div class="tab_menu_content">
                            <ul class="tab_content_box">
                                <?php if(is_array($bncaipiao)): $key = 0; $__LIST__ = $bncaipiao;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($key % 2 );++$key; if(($value[name]) == "bjk3"): ?><li style="display:block;">
                                            <div class="sum">
                                                <span class="sum<?php echo (substr(implode(',',$value[opencode]),0,1)); ?>"></span>
                                                <i>+</i>
                                                <span class="sum<?php echo (substr(implode(',',$value[opencode]),2,1)); ?>"></span>
                                                <i>+</i>
                                                <span class="sum<?php echo (substr(implode(',',$value[opencode]),4,1)); ?>"></span>
                                                <i>=</i>
                                                <em><?php echo (array_sum($value[opencode])); ?></em>
                                            </div>
                                            <p class="words">
                                                <span>当前期：第<em><?php echo ($value['expect']); ?></em>期</span>
                                                <span>开奖号码：第<em><?php echo (implode(',',$value[opencode])); ?></em></span>
                                                <span>和值：<em><?php echo (array_sum($value[opencode])); ?></em></span>
                                                <span>形态：
                                                <a href="javascript:void(0);"><?php echo ($value['daxiao']); ?></a>
                                                <a href="javascript:void(0);"><?php echo ($value['danshuang']); ?></a>
                                            </span>
                                            </p>
                                        </li><?php endif; ?>
                                    <?php if(($value[name]) == "cqssc"): ?><li>
                                            <div class="clearfix">
                                                <div class="five_sumber pull-left">
                                                    <em><?php echo ($value[opencode][0]); ?></em>
                                                    <em><?php echo ($value[opencode][1]); ?></em>
                                                    <em><?php echo ($value[opencode][2]); ?></em>
                                                    <em><?php echo ($value[opencode][3]); ?></em>
                                                    <em><?php echo ($value[opencode][4]); ?></em>
                                                </div>
                                                <a href="/Game.ssc?code=<?php echo ($value[name]); ?>" class="bet pull-left">立即投注</a>
                                            </div>
                                            <p class="words">
                                                <span>当前期：第<em><?php echo ($value['expect']); ?></em>期</span>
                                                <span>开奖号码：第<em><?php echo (implode(',',$value[opencode])); ?></em></span>
                                            </p>
                                        </li><?php endif; ?>
                                    <?php if(($value[name]) == "gd11x5"): ?><li>
                                            <div class="clearfix">
                                                <div class="five_sumber pull-left">
                                                    <em><?php echo ($value[opencode][0]); ?></em>
                                                    <em><?php echo ($value[opencode][1]); ?></em>
                                                    <em><?php echo ($value[opencode][2]); ?></em>
                                                    <em><?php echo ($value[opencode][3]); ?></em>
                                                    <em><?php echo ($value[opencode][4]); ?></em>
                                                </div>
                                                <a href="/Game.x5?code=<?php echo ($value[name]); ?>" class="bet pull-left">立即投注</a>
                                            </div>
                                            <p class="words">
                                                <span>当前期：第<em><?php echo ($value['expect']); ?></em>期</span>
                                                <span>开奖号码：第<em><?php echo (implode(',',$value[opencode])); ?></em></span>
                                            </p>
                                        </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--                <div class="middle_tab main_common_bor">
                    <div class="tab_menu">
                        <ul class="tab_menu_box row margin_0">
                            <?php $i = '0'; ?>
                            <?php if(is_array($bncaipiao)): $key = 0; $__LIST__ = array_slice($bncaipiao,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($key % 2 );++$key;?><li class=" <?php if(($i) == "0"): ?>active<?php endif; ?> col-xs-2"><?php echo ($value['title']); ?></li>
                                <?php  endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <div class="tab_menu_content">
                            <ul class="tab_content_box">
                                <?php $j = '0'; ?>
                                <?php if(is_array($bncaipiao)): $key = 0; $__LIST__ = array_slice($bncaipiao,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($key % 2 );++$key;?><li style="display: <?php if(($j) == "0"): ?>block<?php else: ?>none<?php endif; ?>;">
                                        <div class="sum">
                                            <span class="sum<?php echo (substr(implode(',',$value[opencode]),0,1)); ?>"></span>
                                            <i>+</i>
                                            <span class="sum<?php echo (substr(implode(',',$value[opencode]),2,1)); ?>"></span>
                                            <i>+</i>
                                            <span class="sum<?php echo (substr(implode(',',$value[opencode]),4,1)); ?>"></span>
                                            <i>=</i>
                                            <em><?php echo (array_sum($value[opencode])); ?></em>
                                        </div>
                                        <p class="words">
                                            <span>当前期：第<em><?php echo ($value['expect']); ?></em>期</span>
                                            <span>开奖号码：第<em><?php echo (implode(',',$value[opencode])); ?></em></span>
                                            <span>和值：<em><?php echo (array_sum($value[opencode])); ?></em></span>
                                            <span>形态：
                                                <a href="javascript:void(0);"><?php echo ($value['daxiao']); ?></a>
                                                <a href="javascript:void(0);"><?php echo ($value['danshuang']); ?></a>
                                            </span>
                                        </p>
                                    </li>
                                    <?php  endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                -->

            </div>

            <style>

                .main_left span{
                    float: right;
                    padding-right: 10px;
                }

                a:link, a:hover, a:visited{
                    text-decoration: none;
                }

                .main_right>.login{
                    background: #f6f6f6 none repeat scroll 0 0;
                    height: 468px;
                    width: 250px;
                }

                .main_right>.login>.login-box{
                    height: 80px;
                }

                .login-box > .not-login,.login-box > .login{
                    color: #333;
                    margin: 0 20px;
                }

                .login-box > .not-login > .login-btn-box{
                    height: 26px;
                    line-height: 36px;
                }

                .not-login > .welcome{
                    color: rgb(51, 51, 51);
                    height: 32px;
                    margin-top: 25px;
                    text-align: center;
                    font-size: 12px;
                }

                .not-login > .welcome > label{
                    font-weight: 400;
                }

                .login-box > .not-login>.login-btn-box> a{
                    text-align: center;
                    padding: 3px 10px;
                    color: #fff;
                    margin: 0 10px;
                    width: 80px;
                    height: 28px;
                    font-size: 12px;
                }

                .login-user-info {
                    color: #333;
                    font-size: 12px;
                    margin-top: 12px;
                }

                .login-user-info .user {
                    float: left;
                }

                .login-user-info .quit {
                    color: #999;
                    float: right;
                }

                .login .info-cont {
                    height: 27px;
                    line-height: 27px;
                    padding: 0;
                }

                .info-cont label{
                    float: left;
                }

                .info-cont .show_money,.info-cont .hide_money{
                    border: 1px dashed #ccc;
                    height: 22px;
                    line-height: 20px;
                    text-align: center;
                    width: 92px;
                    display: inline-block;
                    font-weight: 400;
                }

                .info-cont .recharge-btn{
                    height: 25px;
                    width: 72px;
                    background-color: #F13131;
                    font-size: 12px;
                    line-height: 25px;
                    padding: 0px;
                    margin-left: 20px;
                }

                .login .info-list .m14 {
                    color: #d8d8d8;
                    margin: 0 8px;
                }

                .login .info-list a {
                    color: #333;
                }

                .login .info-list a:hover {
                    color: #f13131;
                    text-decoration: none;
                }

                .login .info-list > label{
                    font-weight: 400;
                }

                .help-tab-box{
                    margin: 10px 0px 0;
                    padding-left: 15px;
                    padding-right: 15px;
                }

                .help-tab-box > .help-tab{
                    border-bottom: 1px solid #dbdbdb;
                    height: 28px;
                    line-height: 28px;
                    margin-bottom: 6px;
                    padding-left: 10px;
                    padding-right: 10px;
                }

                .help-tab>li.on{
                    border-bottom: 2px solid #f13131;
                    height: 27px;
                    float: left;
                    margin-right: 16px;
                    position: relative;
                    text-align: center;
                    width: 60px;
                }

                .help-tab > li.on >a{
                    color: rgb(51, 51, 51);
                    display: inline-block;
                    font-size: 14px;
                }

                .help-tab-box > ul{
                    margin-top: 0px;
                    padding-left: 10px;
                    padding-right: 10px;
                }

                .mobile-box{
                    background-position: 0 -140px;
                    height: 190px;
                    margin: 5px 0px 0;
                    width: 100%;
                    padding-left: 15px;
                    padding-right: 15px;
                }

                .mobile-box > .mobile-box-text{
                    border-top: 1px solid #dbdbdb;
                    padding-top: 10px;
                    color: rgb(51, 51, 51);
                    height: 40px;
                    text-align: center;
                    width: 100%;
                    font-size: 14px;
                    margin-top: 15px;
                }

                .red {
                    color: red;
                    font-weight: 400;
                }

                .mobile-box div{
                    text-align: center;
                }

                .mobile-box img{
                    height: 142px;
                    margin: 10px 25px;
                    width: 142px;
                }

                .row > .drawing{
                    width: 232px;
                    overflow: hidden;
                }

                .draw-box{
                    width: 100%;
                }

                .draw-box > .title-top,.news-title{
                    border-bottom: 1px solid #e9e9e9;
                    height: 30px;
                    line-height: 30px;
                }

                .draw-box > .title-top > .notice-tit,.news-title>.news-tit{
                    float: left;
                    font-weight: bold;
                    font-size: 16px;
                    margin-top: 0px;
                    color: black;
                }

                .notice-tab{
                    float: right;
                    height: 30px;
                    line-height: 30px;
                }

                .notice-tab li {
                    color: #333;
                    cursor: pointer;
                    float: left;
                    margin-right: 12px;
                    text-align: center;
                    width: 24px;
                }

                .notice-tab li.on {
                    border-bottom: 2px solid #f13131;
                    height: 29px;
                    position: relative;
                }

                .notice-tab li a:link, .notice-tab li a:active {
                    color: #333;
                }
                .notice-tab li a:hover {
                    color: #f13131;
                    text-decoration: none;
                }

                .notice-main{
                    height: 400px;
                    position: relative;
                    overflow: hidden;
                }

                .notice-list li {
                    line-height: 22px;
                    margin: 0 10px;
                    border-bottom: 1px dotted #ccc;
                }

                .notice-list li.li-line {
                     
                    height: 1px;
                    line-height: 1px;
                    overflow: hidden;
                    vertical-align: middle;
                    width: 210px;

                }

                .notice-list .lot-name {
                    color: #999;
                    float: left;
                    margin-top: 12px;
                }
                .notice-list .lot-name a:link, .notice-list .lot-name a:visited, .notice-list .lot-name a:active {
                    color: #333;
                    font-family: "微软雅黑","Microsoft Yahei";
                    font-size: 14px;
                    font-weight: bold;
                }
                .notice-list .lot-name a:hover {
                    color: #f13131;
                    text-decoration: none;
                }
                .notice-list span.term {
                    color: #666;
                    float: right;
                    margin-top: 12px;
                }
                .notice-list span.term a {
                    color: #999;
                }
                .notice-list .redball {
                    color: #f13131;
                    float: left;
                    font-weight: bold;
                    margin-right: 5px;
                }
                .notice-list .blueball {
                    color: #4495ff;
                    display: inline;
                    float: left;
                    font-weight: bold;
                    margin-left: 6px;
                }
                .notice-list li.last {
                    border-bottom: 0 none;
                    margin-bottom: 12px;
                    overflow: hidden;
                }
                .draw-contents .fr {
                    color: #d8d8d8;
                }
                .draw-contents .fr a:link, .draw-contents .fr a:visited, .draw-contents .fr a:active {
                    color: #666;
                }
                .draw-contents .fr a:hover {
                    color: #f13131;
                    text-decoration: none;
                }

                .clear {
                    clear: both;
                }

                .fr {
                    float: right;
                }

                .lottery-news-box>.news-content{
                    width: 500px;
                    overflow: hidden;
                    position: relative;
                }

                .news-content>.news-banner{
                    position: relative;
                    width: 492px;
                     
                    margin-top: 5px;
                    overflow: hidden;
                }

                .news-banner > ul > li{
                    margin-top: 5px;
                }

                .news-banner > ul > li img{
                    max-height:100px;
                    max-width:500px;
                }

                .winning-box .myScroll{
                    height:177px;
                    margin:5px;
                    padding:0px;
                    overflow: hidden;
                }

                .myScroll ul{
                    overflow: hidden;
                }

                .myScroll > ul >li {
                    line-height: 25px;
                    height:25px;
                    width: 240px;
                    overflow: hidden;
                    padding-left: 10px;
                }

                .myScroll > ul >li > b{
                    color: black;
                }

                .myScroll > ul > li >em{
                    float:right;
                    display: inline-block;
                    color: red;
                }

                .row .ranking-box{
                    margin-top: 15px;
                    width: 230px;
                    padding: 0px 10px 0;
                    height: 210px;
                    overflow: hidden;
                }

                .ranking-box table{
                    font-size: 12px;
                    border-collapse: collapse;
                    border-spacing: 0;
                }

                .ranking-box table td{
                    padding-top: 5px;
                }

                .ranking-box table td.tc{
                    text-align: center;
                }

                .ranking-box table td.tr{
                    text-align: right;
                }

                .ranking-box table span.top1_num{
                    width: 18px;
                    height: 18px;
                    line-height: 18px;
                    color: #fff;
                    text-align: center;
                    display: inline-block;
                    margin: 0 2px;
                    background-color: #f36309;
                }
                .ranking-box table span.top_num{
                    width: 18px;
                    height: 18px;
                    line-height: 18px;
                    color: #fff;
                    text-align: center;
                    display: inline-block;
                    margin: 0 2px;
                    background-color: #afafaf;
                }
            </style>

            <div class="col-xs-3 main_right padding_0">
                <div class="login clearfix">

                    <div class="login-box">
                        <?php if(is_array($userinfo)): ?><div class="login">
                                <div class="login-user-info clearfix">
                                    <label class="user" id="span_user_username">Hi，<?php echo ($userinfo["username"]); ?></label>
                                    <a href="<?php echo U('Public/LoginOut');?>" rel="nofollow" class="quit js-trigger-logout">退出</a>
                                </div>
                                <div class="info-cont clearfix">
                                    <label class="show_money" style="width: 112px;">
                                        <em class="smallmoney" style="color:#F70B0F;"><?php echo ($userinfo['balance']); ?></em>
                                        <i class="iconfont refresh_money">&#xe602;</i>
                                        <em class="hide_money_btn">隐藏</em>
                                    </label>
                                    <label class="hide_money" style="display:none;">
                                        已隐藏
                                        <em class="show_money_btn">显示</em>
                                    </label>

                                    <label>
                                        <a href="<?php echo U('Account/quickRecharge');?>" class="btn btn-danger recharge-btn icon">充 值</a>
                                    </label>
                                </div>
                                <div class="info-list clearfix">
                                    <label><a href="<?php echo U('Member/betRecord');?>" target="_blank">投注记录</a></label>
                                    <label class="m14">|</label>
                                    <label><a href="<?php echo U('Account/dealRecord');?> " target="_blank">交易记录</a></label>
                                    <label class="m14">|</label>
                                    <label><a href="<?php echo U('Member/ziliao');?>" target="_blank">个人信息</a></label>
                               </div>
                            </div>
                            <?php else: ?>
                            <div class="not-login">
                                <div class="welcome">
                                    <label>Hi，欢迎来到<?php echo GetVar('webtitle');?></label>
                                </div>
                                <div class="login-btn-box">
                                    <a href="<?php echo U('Home/Public/login');?>" class="btn bg_red">
                                        <i class="iconfont">&#xe61e;</i>
                                        登 录
                                    </a>
                                    <a href="<?php echo U('Home/Public/register');?>" class="btn bg_org">
                                        用户注册
                                    </a>
                                </div>
                            </div><?php endif; ?>
                        <div class="help-tab-box">
                            <ul class="help-tab">
                                <li class="on">
                                    <a href="javascript:void(0)" class="user-help">购彩帮助</a>
                                </li>
                            </ul>
                            <ul class="help-ul">
                                <li>
                                    <a href="<?php echo U('News/lists',array('catid'=>33));?>" target="_blank">如何注册彩票网会员？</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('News/lists',array('catid'=>33));?>" target="_blank">在线支付的方式有哪些？</a>
                                </li>
                            </ul>
                        </div>

                        <div class="mobile-box">
                            <div class="mobile-box-text">
                                <label class="red">手机购彩，轻轻松松变土豪！</label>
                            </div>
                            <div>
                                <img src="/resources/images/mobile_qrcode.png" alt="">
                            </div>
                        </div>
                    </div>

                    <!--
                    <?php if(is_array($userinfo)): ?><div class="succees_box">
                            <p class="user_name">HI,<?php echo ($userinfo["username"]); ?></p>
                            <p class="user_balance">余额：<?php echo ($userinfo["balance"]); ?></p>
                            <p class="user_c_t">
                                <a href="<?php echo U('Account/quickRecharge');?>" class="btn bg_red">充 值</a>
                                <a href="<?php echo U('Account/withdrawals');?>" class="btn bg_org">提 现</a>
                            </p>
                        </div>
                        <?php else: endif; ?>
                    -->

                </div>

            </div>
        </div>

        <div class="row" style="margin-top: 24px;display: none;">
            <div class="col-xs-3 padding_0 drawing">
                <div class="draw-box">
                    <div class="title-top">
                        <h2 class="notice-tit">
                            <strong>开奖公告</strong>
                        </h2>
                        <ul class="notice-tab">
                            <li class="tab_g on">
                                <a href="javascript://" class="color333" title="热门">热门</a>
                            </li>
                            <li class="tab_g">
                                <a href="javascript://" class="color333" title="低频">低频</a>
                            </li>
                            <li class="tab_o">
                                <a target="_blank" href="<?php echo U('Index/lottery');?>" class="color333" title="更多">更多</a>
                            </li>
                        </ul>
                    </div>
                    <div class="notice-main">
                        <div class="draw-contents">
                            <ul class="notice-list">
                                <?php if(is_array($bncaipiao)): $key = 0; $__LIST__ = $bncaipiao;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($key % 2 );++$key; if($value['typeid'] == 'ssc'): ?><li>
                                            <span class="lot-name"><a href="/Game.ssc?code=<?php echo ($value[name]); ?>"><?php echo ($value['title']); ?></a></span>
                                            <span class="term"><?php echo ($value['expect']); ?>期</span>
                                            <span class="clear"></span>
                                            <div class="clear"></div>
                                            <div class="redball"><?php echo ($value[opencode][0]); ?></div>
                                            <div class="redball"><?php echo ($value[opencode][1]); ?></div>
                                            <div class="redball"><?php echo ($value[opencode][2]); ?></div>
                                            <div class="redball"><?php echo ($value[opencode][3]); ?></div>
                                            <div class="redball"><?php echo ($value[opencode][4]); ?></div>
                                            <br>
                                            <div class="fr">
                                                <span>2018-11-02 13:02:00</span> |
                                                <a href="/Trend.trend_<?php echo ($$value["typeid"]); ?>.code.<?php echo ($value["name"]); ?>.do" target="_blank">走势</a> |
                                                <a href="/Game.ssc?code=<?php echo ($value["name"]); ?>" target="_blank">投注</a>
                                            </div>
                                            <div class="clear"></div>
                                        </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <div class="draw-contents" style="display: none;">
                            <ul class="notice-list">
                                <?php if(is_array($bncaipiao)): $key = 0; $__LIST__ = $bncaipiao;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($key % 2 );++$key; if($value['typeid'] == 'dpc'): ?><li>
                                            <span class="lot-name"><a href="/Game.ssc?code=<?php echo ($value[name]); ?>"><?php echo ($value['title']); ?></a></span>
                                            <span class="term"><?php echo ($value['expect']); ?>期</span>
                                            <span class="clear"></span>
                                            <div class="clear"></div>
                                            <div class="redball"><?php echo ($value[opencode][0]); ?></div>
                                            <div class="redball"><?php echo ($value[opencode][1]); ?></div>
                                            <div class="redball"><?php echo ($value[opencode][2]); ?></div>
                                            <br>
                                            <div class="fr">
                                                <span>2018-11-02 13:02:00</span> |
                                                <a href="/Trend.trend_<?php echo ($$value["typeid"]); ?>.code.<?php echo ($value["name"]); ?>.do" target="_blank">走势</a> |
                                                <a href="/Game.ssc?code=<?php echo ($value["name"]); ?>" target="_blank">投注</a>
                                            </div>
                                            <div class="clear"></div>
                                        </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-6 main_middle">
                <div class="lottery-news-box">
                    <div class="news-title clearfix">
                        <h2 class="news-tit pull-left"><strong>彩票资讯</strong></h2>
                    </div>
                    <div class="news-content">
                        <div class="news-banner">
                            <ul>
                                <li>
                                    <img src="/resources/images/banner-01.png" alt="">
                                </li>
                                <li>
                                    <img src="/resources/images/banner-01.png" alt="">
                                </li>
                                <li>
                                    <img src="/resources/images/banner-01.png" alt="">
                                </li>
                                <li>
                                    <img src="/resources/images/banner-01.png" alt="">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-3 main_right padding_0">
                <div class="winning-box">
                    <div class="news-title clearfix">
                        <h2 class="news-tit pull-left"><strong>最新中奖</strong></h2>
                    </div>
                    <div class="news-content myScroll">
                        <ul class="news-scroll">
                            <?php if(is_array($list2)): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li>
                                    <?php echo str_replace_cn($value['username'],1,3);?>喜中 <b><?php echo ($value['k3name']); ?></b>
                                    <em>￥<?php echo ($value['okamount']); ?>.00</em>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>

                <div class="ranking-box">
                    <div class="news-title clearfix">
                        <h2 class="news-tit pull-left"><strong>中奖排行</strong></h2>
                    </div>
                    <div class="news-content">
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <colgroup>
                                <col width="10%">
                                <col width="40%">
                                <col width="50%">
                            </colgroup>
                            <tbody>
                                <?php if(is_array($list)): $k = 0; $__LIST__ = array_slice($list,0,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><tr class="top">
                                        <td class="tc">
                                            <?php if(($k) < "3"): ?><span class="top1_num"><?php echo ($k); ?></span>
                                                <?php else: ?>
                                                <span class="top_num"><?php echo ($k); ?></span><?php endif; ?>

                                        </td>
                                        <td class="tr"><?php echo str_replace_cn($value['username'],1,3);?></td>
                                        <td class="tr "><?php echo ($value['okamount']); ?>.00元</td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

<script type="text/javascript" src="/resources/js/scroll.js"></script>
<script>
    $(function(){
        $('.myScroll').myScroll({
            speed: 40, 
            rowHeight: 25 
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
</body>
</html>