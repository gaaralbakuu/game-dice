<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<title>购彩大厅</title>
	<meta name="keywords" content="关键字">
	<meta name="description" content="网站主要内容">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" >

	<link rel="stylesheet" href="/resources/css2/bootstrap.min.css">
	<link rel="stylesheet" href="/resources/css2/reset.css">
	<link rel="stylesheet" href="/resources/css2/icon.css">
	<link rel="stylesheet" href="/resources/css2/header.css">
	<link rel="stylesheet" href="/resources/css2/lottery.css">
	<link rel="stylesheet" href="/resources/css2/footer.css">
	<link rel="stylesheet" href="/resources/js2/layer/skin/default/layer.css">

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

<script type="text/javascript" src="/resources/js/way.min.js"></script>
<script type="text/javascript" src="/resources/main/common.js"></script>
<script src="/resources/js2/require.js" data-main="/resources/js2/homePage"></script>
<div class="lotter_main">
	<div class="container padding_0 padding_t_15">
		<div class="clearfix main_scroll">
			<div class="scroll_left pull-left">
				<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="10000">
					<ol class="carousel-indicators">
						<li class="" data-target="#myCarousel" data-slide-to="0"></li>
						<li data-target="#myCarousel" data-slide-to="1" class="active"></li>
						
					</ol>
					<div class="carousel-inner">
						<div class="item">
							<a href=""><img src="/resources/images/banner3.png" alt=""></a>
						</div>
						<div class="item active">
							<a href=""><img src="/resources/images/banner2 (1).png" alt=""></a>
						</div>
						
					</div>
				</div>
			</div>
			<div class="scroll_right pull-right">
				<h2 class="margin_0">风云榜</h2>
				<div class="ranking main_common_bor winning">
					<div class="ranking_scrooll_box">
						<ul class="ranking_list_lotter ranking_scroll" style="margin-top: 0px;">
							<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li>
									<div class="media">
										<div class="media-left">
											<img src="<?php echo ($value['face']); ?>" alt="" class="media-boject img-circle">
										</div>
										<div class="media-body">
											<p class="margin_0"><?php echo ($value['username']); ?><span> 在 <?php echo ($value['k3name']); ?></span></p>
											<p class="margin_0">喜中 <em>￥<?php echo ($value['okamount']); ?></em></p>
										</div>
									</div>
								</li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="gradient clearfix">
			<i class="pull-left"></i>
			<em class="pull-right"></em>
		</div>
		<div class="lottery_content">
			<ul class="content_nav clearfix">
				<li class="active">
					<a href="javascript:void(0)">热门</a>
				</li>
				<li>
					<a href="javascript:void(0)">全部</a>
				</li>
				<li>
					<a href="javascript:void(0)">快三</a>
				</li>
				<li>
					<a href="javascript:void(0)">时时彩</a>
				</li>
				<li>
					<a href="javascript:void(0)">快乐彩</a>
				</li>
				<li>
					<a href="javascript:void(0)">PK10</a>
				</li>
				<li>
					<a href="javascript:void(0)">11选5</a>
				</li>
				<li>
					<a href="javascript:void(0)">六合彩</a>
				</li>
				<li>
					<a href="javascript:void(0)">低频彩</a>
				</li>
			</ul>
			<div class="content_list_box">
				<!--热门-->
				<ul class="content_list clearfix" style="display:block;">
					<?php if(is_array($hotcaipiao)): $i = 0; $__LIST__ = array_slice($hotcaipiao,0,12,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($i % 2 );++$i;?><li class="k3_project">
							<div class="media">
								<div class="media-left">
									<?php if(($cp["typeid"]) == "k3"): ?><i class="iconfont">&#xe607;</i><?php endif; ?>
									<?php if(($cp["typeid"]) == "lhc"): ?><i class="iconfont" style="color:#07b39e">&#xe65a;</i><?php endif; ?>
									<?php if(($cp["typeid"]) == "ssc"): ?><i class="iconfont special " >&#xe657;</i><?php endif; ?>
									<?php if(($cp["typeid"]) == "pk10"): ?><i class="icon--pk iconfont " style="color:#f22751" ></i><?php endif; ?>
									<?php if(($cp["typeid"]) == "keno"): ?><i class="icon-kuaile8 iconfont " style="color:#fc5826" ></i><?php endif; ?>
									<?php if(($cp["typeid"]) == "x5"): ?><i class="icon-11xuan5 iconfont " style="color:#218ddd" ></i><?php endif; ?>
									<?php if(($cp["typeid"]) == "dpc"): ?><i class="<?php if(strstr($cp['name'],'3d')){echo 'icon-fucai3d fc3d_c';}else{echo ' icon-pailie3 pl3_c';}?>  iconfont " style="color:<?php if(strstr($cp['name'],'3d')){echo '#00b7ee';}else{echo '#38b366';}?>" ></i><?php endif; ?>
								</div>
								<div class="media-body">
									<p><?php echo ($cp[title]); ?></p>
									<span><?php echo (msubstr($cp[ftitle],'0','6','utf-8','')); ?></span>
								</div>
							</div>
							<div class="k3_beetting">
								<?php if($cp['typeid'] == 'k3'): ?><a href="/Game.k3?code=<?php echo ($cp["name"]); ?>" class="btn_beetting">立即投注</a>
									<a href="javascript:void(0);" class="help " onclick="helps('<?php echo ($cp["name"]); ?>','k3')" >
										<i class="iconfont">&#xe6a8;</i>
									</a><?php endif; ?>
								<?php if($cp['typeid'] == 'lhc'): ?><a href="/Game.lhc?code=<?php echo ($cp["name"]); ?>" class="btn_beetting">立即投注</a>
									<a href="javascript:void(0);" class="help " onclick="helps('<?php echo ($cp["name"]); ?>','lhc')" >
										<i class="iconfont">&#xe6a8;</i>
									</a><?php endif; ?>
								<?php if($cp['typeid'] == 'ssc'): ?><a href="/Game.ssc?code=<?php echo ($cp["name"]); ?>" class="btn_beetting">立即投注</a>
									<a href="javascript:void(0);" class="help " onclick="helps('<?php echo ($cp["name"]); ?>','ssc')">
										<i class="iconfont">&#xe6a8;</i>
									</a><?php endif; ?>
								<?php if($cp['typeid'] == 'pk10'): ?><a href="/Game.pk10?code=<?php echo ($cp["name"]); ?>" class="btn_beetting">立即投注</a>
									<a href="javascript:void(0);" class="help " onclick="helps('<?php echo ($cp["name"]); ?>','pk10')">
										<i class="iconfont">&#xe6a8;</i>
									</a><?php endif; ?>
								<?php if($cp['typeid'] == 'keno'): ?><a href="/Game.keno?code=<?php echo ($cp["name"]); ?>" class="btn_beetting">立即投注</a>
									<a href="javascript:void(0);" class="help " onclick="helps('<?php echo ($cp["name"]); ?>','keno')">
										<i class="iconfont">&#xe6a8;</i>
									</a><?php endif; ?>
								<?php if($cp['typeid'] == 'x5'): ?><a href="/Game.x5?code=<?php echo ($cp["name"]); ?>" class="btn_beetting">立即投注</a>
									<a href="javascript:void(0);" class="help " onclick="helps('<?php echo ($cp["name"]); ?>','x5')">
										<i class="iconfont">&#xe6a8;</i>
									</a><?php endif; ?>
								<?php if($cp['typeid'] == 'dpc'): ?><a href="/Game.dpc?code=<?php echo ($cp["name"]); ?>" class="btn_beetting">立即投注</a>
									<a href="javascript:void(0);" class="help " onclick="helps('<?php echo ($cp["name"]); ?>','dpc')">
										<i class="iconfont">&#xe6a8;</i>
									</a><?php endif; ?>
							</div>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<!--全部-->
				<ul class="content_list clearfix" style="display:none;">
					<?php if(is_array($Allcp)): $i = 0; $__LIST__ = $Allcp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($i % 2 );++$i;?><li class="k3_project">
							<div class="media">
								<div class="media-left">
									<?php if($cp['typeid'] == 'k3'): ?><i class="iconfont">&#xe607;</i><?php endif; ?>
									<?php if($cp['typeid'] == 'lhc'): ?><i class="iconfont" style="color:#07b39e">&#xe65a;</i><?php endif; ?>
									<?php if($cp['typeid'] == 'ssc'): ?><i class="iconfont special " >&#xe657;</i><?php endif; ?>
									<?php if($cp['typeid'] == 'pk10'): ?><i class="icon--pk iconfont" style="color:#f22751" ></i><?php endif; ?>
									<?php if($cp['typeid'] == 'keno'): ?><i class="icon-kuaile8 iconfont " style="color:#fc5826" ></i><?php endif; ?>
									<?php if($cp['typeid'] == 'x5'): ?><i class="icon-11xuan5 iconfont " style="color:#218ddd" ></i><?php endif; ?>
									<?php if($cp['typeid'] == 'dpc'): ?><i class="<?php if(strstr($cp['name'],'3d')){echo 'icon-fucai3d fc3d_c';}else{echo ' icon-pailie3 pl3_c';}?>  iconfont " style="color:<?php if(strstr($cp['name'],'3d')){echo '#00b7ee';}else{echo '#38b366';}?>" ></i><?php endif; ?>
								</div>
								<div class="media-body">
									<p><?php echo ($cp[title]); ?></p>
									<span><?php echo (msubstr($cp[ftitle],'0','6','utf-8','')); ?></span>
								</div>
							</div>
							<div class="k3_beetting">
								<?php if($cp['typeid'] == 'k3'): ?><a href="/Game.k3?code=<?php echo ($cp["name"]); ?>" class="btn_beetting">立即投注</a>
									<a href="javascript:void(0);" class="help " onclick="helps('<?php echo ($cp["name"]); ?>','k3')" >
										<i class="iconfont">&#xe6a8;</i>
									</a><?php endif; ?>
								<?php if($cp['typeid'] == 'lhc'): ?><a href="/Game.lhc?code=<?php echo ($cp["name"]); ?>" class="btn_beetting">立即投注</a>
									<a href="javascript:void(0);" class="help " onclick="helps('<?php echo ($cp["name"]); ?>','lhc')" >
										<i class="iconfont">&#xe6a8;</i>
									</a><?php endif; ?>
								<?php if($cp['typeid'] == 'ssc'): ?><a href="/Game.ssc?code=<?php echo ($cp["name"]); ?>" class="btn_beetting">立即投注</a>
									<a href="javascript:void(0);" class="help " onclick="helps('<?php echo ($cp["name"]); ?>','ssc')">
										<i class="iconfont">&#xe6a8;</i>
									</a><?php endif; ?>
								<?php if($cp['typeid'] == 'pk10'): ?><a href="/Game.pk10?code=<?php echo ($cp["name"]); ?>" class="btn_beetting">立即投注</a>
									<a href="javascript:void(0);" class="help " onclick="helps('<?php echo ($cp["name"]); ?>','pk10')">
										<i class="iconfont">&#xe6a8;</i>
									</a><?php endif; ?>
								<?php if($cp['typeid'] == 'keno'): ?><a href="/Game.keno?code=<?php echo ($cp["name"]); ?>" class="btn_beetting">立即投注</a>
									<a href="javascript:void(0);" class="help " onclick="helps('<?php echo ($cp["name"]); ?>','keno')">
										<i class="iconfont">&#xe6a8;</i>
									</a><?php endif; ?>
								<?php if($cp['typeid'] == 'x5'): ?><a href="/Game.x5?code=<?php echo ($cp["name"]); ?>" class="btn_beetting">立即投注</a>
									<a href="javascript:void(0);" class="help " onclick="helps('<?php echo ($cp["name"]); ?>','x5')">
										<i class="iconfont">&#xe6a8;</i>
									</a><?php endif; ?>
								<?php if($cp['typeid'] == 'dpc'): ?><a href="/Game.dpc?code=<?php echo ($cp["name"]); ?>" class="btn_beetting">立即投注</a>
									<a href="javascript:void(0);" class="help " onclick="helps('<?php echo ($cp["name"]); ?>','dpc')">
										<i class="iconfont">&#xe6a8;</i>
									</a><?php endif; ?>
							</div>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<!--快3-->
				<ul class="content_list  clearfix" style="display:none">
					<?php if(is_array($other)): $i = 0; $__LIST__ = $other;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($i % 2 );++$i; if($cp['typeid'] == 'k3'): ?><li class="k3_project">
								<div class="media">
									<div class="media-left">
										<i class="iconfont">&#xe607;</i>
									</div>
									<div class="media-body">
										<p><?php echo ($cp[title]); ?></p>
										<span><?php echo (msubstr($cp[ftitle],'0','6','utf-8','')); ?></span>
									</div>
								</div>
								<div class="k3_beetting">
									<a href="/Game.k3?code=<?php echo ($cp["name"]); ?>" class="btn_beetting">立即投注</a>
									<a href="javascript:void(0);" class="help " onclick="helps('<?php echo ($cp["name"]); ?>','k3')" >
										<i class="iconfont">&#xe6a8;</i>
									</a>
								</div>
							</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<!--时时彩-->
				<ul class="content_list clearfix" style="display:none">
					<?php if(is_array($other)): $i = 0; $__LIST__ = $other;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($i % 2 );++$i; if($cp['typeid'] == 'ssc'): ?><li class="k3_project">
								<div class="media">
									<div class="media-left">
										<i class="iconfont special " >&#xe657;</i>
									</div>
									<div class="media-body">
										<p><?php echo ($cp[title]); ?></p>
										<span><?php echo (msubstr($cp[ftitle],'0','6','utf-8','')); ?></span>
									</div>
								</div>
								<div class="k3_beetting">
									<a href="/Game.ssc?code=<?php echo ($cp["name"]); ?>" class="btn_beetting">立即投注</a>
									<a href="javascript:void(0);" class="help " onclick="helps('<?php echo ($cp["name"]); ?>','ssc')" >
										<i class="iconfont">&#xe6a8;</i>
									</a>
								</div>
							</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<!--快乐彩-->
				<ul class="content_list clearfix" style="display:none">
					<?php if(is_array($other)): $i = 0; $__LIST__ = $other;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($i % 2 );++$i; if($cp['typeid'] == 'keno'): ?><li class="k3_project">
								<div class="media">
									<div class="media-left">
										<i class="icon-kuaile8 iconfont " style="color:#fc5826" ></i>
									</div>
									<div class="media-body">
										<p><?php echo ($cp[title]); ?></p>
										<span><?php echo (msubstr($cp[ftitle],'0','6','utf-8','')); ?></span>
									</div>
								</div>
								<div class="k3_beetting">
									<a href="/Game.keno?code=<?php echo ($cp["name"]); ?>" class="btn_beetting">立即投注</a>
									<a href="javascript:void(0);" class="help " onclick="helps('<?php echo ($cp["name"]); ?>','keno')" >
										<i class="iconfont">&#xe6a8;</i>
									</a>
								</div>
							</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<!--PK10-->
				<ul class="content_list clearfix" style="display:none">
					<?php if(is_array($other)): $i = 0; $__LIST__ = $other;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($i % 2 );++$i; if( $cp['typeid'] == 'pk10'): ?><li class="k3_project">
								<div class="media">
									<div class="media-left">
										<i class="icon--pk iconfont " style="color:#f22751" ></i>
									</div>
									<div class="media-body">
										<p><?php echo ($cp[title]); ?></p>
										<span><?php echo (msubstr($cp[ftitle],'0','6','utf-8','')); ?></span>
									</div>
								</div>
								<div class="k3_beetting">
									<a href="/Game.pk10?code=<?php echo ($cp["name"]); ?>" class="btn_beetting">立即投注</a>
									<a href="javascript:void(0);" class="help " onclick="helps('<?php echo ($cp["name"]); ?>','keno')" >
										<i class="iconfont">&#xe6a8;</i>
									</a>
								</div>
							</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<!--11选5-->
				<ul class="content_list clearfix" style="display:none">
					<?php if(is_array($other)): $i = 0; $__LIST__ = $other;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($i % 2 );++$i; if($cp['typeid'] == 'x5'): ?><li class="k3_project">
								<div class="media">
									<div class="media-left">
										<i class="icon-11xuan5 iconfont " style="color:#218ddd" ></i>
									</div>
									<div class="media-body">
										<p><?php echo ($cp[title]); ?></p>
										<span><?php echo (msubstr($cp[ftitle],'0','6','utf-8','')); ?></span>
									</div>
								</div>
								<div class="k3_beetting">
									<a href="/Game.x5?code=<?php echo ($cp["name"]); ?>" class="btn_beetting">立即投注</a>
									<a href="javascript:void(0);" class="help " onclick="helps('<?php echo ($cp["name"]); ?>','x5')" >
										<i class="iconfont">&#xe6a8;</i>
									</a>
								</div>
							</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<!--六合彩-->
				<ul class="content_list clearfix" style="display:none">
					<?php if(is_array($other)): $i = 0; $__LIST__ = $other;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($i % 2 );++$i; if($cp['typeid'] == 'lhc'): ?><li class="k3_project">
								<div class="media">
									<div class="media-left">
										<i class="iconfont" style="color:#07b39e">&#xe65a;</i>
									</div>
									<div class="media-body">
										<p><?php echo ($cp[title]); ?></p>
										<span><?php echo (msubstr($cp[ftitle],'0','6','utf-8','')); ?></span>
									</div>
								</div>
								<div class="k3_beetting">
									<a href="/Game.lhc?code=<?php echo ($cp["name"]); ?>" class="btn_beetting">立即投注</a>
									<a href="javascript:void(0);" class="help " onclick="helps('<?php echo ($cp["name"]); ?>','lhc')" >
										<i class="iconfont">&#xe6a8;</i>
									</a>
								</div>
							</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<!--低频彩-->
				<ul class="content_list clearfix" style="display:none">
					<?php if(is_array($other)): $i = 0; $__LIST__ = $other;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cp): $mod = ($i % 2 );++$i; if($cp['typeid'] == 'dpc'): ?><li class="k3_project">
								<div class="media">
									<div class="media-left">
										<i class="<?php if(strstr($cp['name'],'3d')){echo 'icon-fucai3d fc3d_c';}else{echo ' icon-pailie3 pl3_c';}?>  iconfont " style="color:<?php if(strstr($cp['name'],'3d')){echo '#00b7ee';}else{echo '#38b366';}?>" ></i>
									</div>
									<div class="media-body">
										<p><?php echo ($cp[title]); ?></p>
										<span><?php echo (msubstr($cp[ftitle],'0','6','utf-8','')); ?></span>
									</div>
								</div>
								<div class="k3_beetting">
									<a href="/Game.dpc?code=<?php echo ($cp["name"]); ?>" class="btn_beetting">立即投注</a>
									<a href="javascript:void(0);" class="help " onclick="helps('<?php echo ($cp["name"]); ?>','dpc')" >
										<i class="iconfont">&#xe6a8;</i>
									</a>
								</div>
							</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</ul>
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

<script>
	function openwindow(url,name,iWidth,iHeight) {
		var url; 
		var name; 
		var iWidth; 
		var iHeight; 
	 
		var iTop = (window.screen.height-30-iHeight)/2; 
		var iLeft = (window.screen.width-10-iWidth)/2; 
		window.open(url,name,'height='+iHeight+',,innerHeight='+iHeight+',width='+iWidth+',innerWidth='+iWidth+',top='+iTop+',left='+iLeft+',toolbar=no,menubar=no,scrollbars=auto,resizeable=no,location=no,status=no');
	}
 
	function helps(name,cz) {
		var url = "/Game.howtoplay.name."+name+".cz."+cz;
		openwindow(url,'',1058,870);

	}
</script>
</body>
</html>