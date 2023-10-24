<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo ($cptitle); ?>开奖走势图 - <?php echo GetVar('webtitle');?>线上平台</title>
<meta name="renderer" content="webkit" />
    <link rel="stylesheet" href="/resources/css2/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/resources/css/reset.css" />
<link rel="stylesheet" type="text/css" href="/resources/css/trend.css" />
    <link rel="stylesheet" href="/resources/css2/icon.css">
    <link rel="stylesheet" href="/resources/css2/header.css">
    <link rel="stylesheet" href="/resources/css2/main.css">
    <link rel="stylesheet" href="/resources/css2/footer.css">
<script>
var WebConfigs = {
	webtitle:"<?php echo ($webconfigs["webtitle"]); ?>",
	kefuthree:"<?php echo ($webconfigs["kefuthree"]); ?>",
    ROOT : "",
	kefuqq:"<?php echo ($webconfigs["kefuqq"]); ?>"
};
</script>
<script type="text/javascript" src="/resources/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/resources/js/artDialog.js"></script>
<!--[if lt IE 9]>
<script src="/resources/js/html5shiv.js"></script>
<![endif]-->
<script type="text/javascript" src="/resources/js/way.min.js"></script>
<script type="text/javascript" src="/resources/js/jquery.history.js"></script>
<script type="text/javascript" src="/resources/main/common.js"></script>
<script type="text/javascript" src="/resources/main/index.js"></script>
<script type="text/javascript" src="/resources/js/member.page.js"></script>
<script type="text/javascript" src="/resources/main/trend.js"></script>
    <script>
    var lotteryname = "<?php echo ($lotteryname); ?>";
    function MM_jumpMenu(targ,selObj,restore){ 
        if(selObj.options[selObj.selectedIndex].value){
            eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
            if (restore) selObj.selectedIndex=0;
        }
    }
    $(function(){
        selectlettery();
    });
    function selectlettery(){
        if(!lotterylist){
            return false;
        }
        if(lotterylist.length>0){
            var opts = '';
            for(var o in lotterylist){
                var selected = '';
                if(lotteryname==lotterylist[o].name){
                    selected = 'selected';
                }
                console.log(lotterylist)
                if(lotterylist[o].name.indexOf("k3")>1){
                    opts += '<option '+selected+' value="/Trend.trend_k3.code.'+lotterylist[o].name+'">'+lotterylist[o].title+'</option>';
                }else if(lotterylist[o].name.indexOf("ssc")>1){
                    opts += '<option '+selected+' value="/Trend.trend_ssc.code.'+lotterylist[o].name+'">'+lotterylist[o].title+'</option>';
                }else if(lotterylist[o].name.indexOf("x5")>1){
                    opts += '<option '+selected+' value="/Trend.trend_x5.code.'+lotterylist[o].name+'">'+lotterylist[o].title+'</option>';
                }else if(lotterylist[o].name.indexOf("pk10")>1){
                    opts += '<option '+selected+' value="/Trend.trend_pk10.code.'+lotterylist[o].name+'">'+lotterylist[o].title+'</option>';
                }else if(lotterylist[o].name.indexOf("keno")>1){
                    opts += '<option '+selected+' value="/Trend.trend_keno.code.'+lotterylist[o].name+'">'+lotterylist[o].title+'</option>';
                }else if(lotterylist[o].name =='pl3' || lotterylist[o].name =='fc3d'){
                    opts += '<option '+selected+' value="/Trend.trend_dpc.code.'+lotterylist[o].name+'">'+lotterylist[o].title+'</option>';
                }else if(lotterylist[o].name=='lhc' || lotterylist[o].name=='dflhc' ){
                    opts += '<option '+selected+' value="/Trend.trend_lhc.code.'+lotterylist[o].name+'">'+lotterylist[o].title+'</option>';
                }
            };
            $("#selectlettery").html(opts);
        }
    }

</script>
</head>

<body>
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

<section class="<!--container--> pt-10 pb-10" id="gamepage" >
<div id="tableAndCanvas" style="width:99.5%;margin:0 auto;">
<div id="dataWrap">

    <div class="selectWay">
        <h2><strong class="l">基本走势图</strong> </h2>
        <div class="l ml-20">
        <span>选择彩种：<select name="selectDate" id="selectlettery" class="text-muted" onChange="MM_jumpMenu('window',this,0)"></select>&nbsp;&nbsp;</span>
        </div>
    </div>

<table class="dataTable" id="chartsTable">
    <thead>
        <tr class="text-c">
            <th height="20" width="80" rowspan="2">期号</th>
            <th colspan="5" width="80" rowspan="2">开奖号码</th>
            <th colspan="10">万位</th>
            <th colspan="10">千位</th>
            <th colspan="10">百位</th>
            <th colspan="10">十位</th>
            <th colspan="10">个位</th>
            <th colspan="10">号码分布</th>
        </tr>
        <tr>
          <th width="20"  height="20">0</th>
          <th width="20"  height="20">1</th>
          <th width="20"  height="20">2</th>
          <th width="20"  height="20">3</th>
          <th width="20"  height="20">4</th>
          <th width="20"  height="20">5</th>
          <th width="20"  height="20">6</th>
          <th width="20"  height="20">7</th>
          <th width="20"  height="20">8</th>
          <th width="20"  height="20">9</th>

            <th width="20"  height="20">0</th>
            <th width="20"  height="20">1</th>
            <th width="20"  height="20">2</th>
            <th width="20"  height="20">3</th>
            <th width="20"  height="20">4</th>
            <th width="20"  height="20">5</th>
            <th width="20"  height="20">6</th>
            <th width="20"  height="20">7</th>
            <th width="20"  height="20">8</th>
            <th width="20"  height="20">9</th>

            <th width="20"  height="20">0</th>
            <th width="20"  height="20">1</th>
            <th width="20"  height="20">2</th>
            <th width="20"  height="20">3</th>
            <th width="20"  height="20">4</th>
            <th width="20"  height="20">5</th>
            <th width="20"  height="20">6</th>
            <th width="20"  height="20">7</th>
            <th width="20"  height="20">8</th>
            <th width="20"  height="20">9</th>

            <th width="20"  height="20">0</th>
            <th width="20"  height="20">1</th>
            <th width="20"  height="20">2</th>
            <th width="20"  height="20">3</th>
            <th width="20"  height="20">4</th>
            <th width="20"  height="20">5</th>
            <th width="20"  height="20">6</th>
            <th width="20"  height="20">7</th>
            <th width="20"  height="20">8</th>
            <th width="20"  height="20">9</th>

            <th width="20"  height="20">0</th>
            <th width="20"  height="20">1</th>
            <th width="20"  height="20">2</th>
            <th width="20"  height="20">3</th>
            <th width="20"  height="20">4</th>
            <th width="20"  height="20">5</th>
            <th width="20"  height="20">6</th>
            <th width="20"  height="20">7</th>
            <th width="20"  height="20">8</th>
            <th width="20"  height="20">9</th>

            <th width="20"  height="20">0</th>
            <th width="20"  height="20">1</th>
            <th width="20"  height="20">2</th>
            <th width="20"  height="20">3</th>
            <th width="20"  height="20">4</th>
            <th width="20"  height="20">5</th>
            <th width="20"  height="20">6</th>
            <th width="20"  height="20">7</th>
            <th width="20"  height="20">8</th>
            <th width="20"  height="20">9</th>
        </tr>
    </thead>
    <tbody id="cpdata">
             <?php echo ($trendhtml); ?>
    </tbody>

</table>
</div>
</div>
</section>
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

</body>
</html>