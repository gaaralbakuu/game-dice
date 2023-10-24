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
<body>
	<header data-am-widget="header"class="am-header am-header-default header nav_bg am-header-fixed">
		<div class="am-header-left am-header-nav">
			<a href="javascript:history.back(-1);" class="">
				<i class="iconfont icon-arrow-left"></i>
			</a>
      	</div>

		<h1 class="am-header-title activity_h1">
			银行转账
		</h1>

	</header>
	
	<div class="bank_recharge">
		<form action="" method="post" id="formrecharge" class="am-form">
			<ul class="bank_form_list">
				<li class="am-cf">
					<span class="bank_form_left am-fl" style="font-size: 12px;">收款银行</span>
					<div class="am-fr bank_right_input">
						<input type="hidden"   name="paytype" value="<?php echo ($payinfo["paytype"]); ?>"  class="copy_txt" style="font-size: 12px;">
						<em style="padding-top:10px;display:block;font-size: 12px;"><?php echo ($payinfo["paytypetitle"]); ?></em>
						<span class="am-form-caret"></span>
					</div>
				</li>
                <li class="am-cf">
                    <span class="bank_form_left am-fl" style="font-size: 12px;">收款户名</span>
                    <div class="am-fr bank_right_input">
                        <input type="text" value="<?php echo ($bankname); ?>" class="copy_txt" disabled="disabled" style="font-size: 12px;"><span onclick="copy('huming')" id="huming"  class="copu_btn" data-clipboard-text="<?php echo ($bankname); ?>" style="font-size: 12px;">复制</span>
                    </div>
                </li>
                <li class="am-cf">
                    <span class="bank_form_left am-fl" style="font-size: 12px;">收款账号</span>
                    <div class="am-fr bank_right_input">
                        <input type="text" value="<?php echo ($bankcode); ?>" class="copy_txt" disabled="disabled" style="font-size: 12px;"><span onclick="copy('zhanghao')" id="zhanghao"  class="copu_btn" data-clipboard-text="<?php echo ($bankcode); ?>" style="font-size: 12px;">复制</span>
                    </div>
                </li>
                <li class="am-cf">
                    <span class="bank_form_left am-fl" style="font-size: 12px;">开户支行</span>
                    <div class="am-fr bank_right_input">
                        <input type="text" value="<?php echo ($payinfo["ftitle"]); ?>" class="copy_txt" disabled="disabled" style="font-size: 12px;"><span onclick="copy('zhihang')" id="zhihang" class="copu_btn" data-clipboard-text="<?php echo ($payinfo["ftitle"]); ?>" style="font-size: 12px;">复制</span>
                    </div>
                </li>
				<li class="am-cf">
					<span class="bank_form_left am-fl" style="font-size: 12px;">充值金额</span>
					<div class="am-fr bank_right_input">
						<input type="text" name="amount" value="<?php echo (floor($payinfo["minmoney"])); ?>"  class="input_txt" placeholder="至少<?php echo (floor($payinfo["minmoney"])); ?>"  style="font-size: 12px;">
					</div>
				</li>
				<li class="am-cf">
					<span class="bank_form_left am-fl" style="font-size: 12px;">转账户名</span>
					<div class="am-fr bank_right_input">
						<input type="text"  class="input_txt" name="userpayname" placeholder="请输入付款人的银行卡姓名" style="font-size: 12px;">
					</div>
				</li>
			</ul>

			<button class="am-btn am-btn-danger am-radius am-btn-block" type="button" onclick="addrecharge()">确定</button>
		</form>	
		<div class="bottom_explain">
			<p>1、请转账到以上收款银行账户。</p>
			<p>2、请正确填写转账银行卡的持卡人姓名和充值金额，以便及时核对。</p>
			<p>3、转账1笔提交1次，请勿重复提交订单。</p>
			<p>4、请务必转账后再提交订单,否则无法及时查到您的款项！</p>
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
		function copy(id) {
      if(navigator.userAgent.match(/(iPhone|iPod|iPad);?/i)) { 
        window.getSelection().removeAllRanges(); 
        var Url2 = document.getElementById(id); 
        var range = document.createRange();
        
        range.selectNode(Url2);
        
        window.getSelection().addRange(range);
        
        var successful = document.execCommand('copy');

        
        window.getSelection().removeAllRanges();
        alert("复制成功");
      } else {
        var n = document.getElementById(id).innerText;
        const input = document.createElement('input');
        document.body.appendChild(input);
        input.setAttribute('value', n);
        input.select();
        if(document.execCommand('copy')) {
          document.execCommand('copy');
        }
        document.body.removeChild(input);
        alert("复制成功");
      }

    }
		function addrecharge() {
			$.ajax({
				type:"post",
				url:"<?php echo U('Apijiekou/addrecharge');?>",
				data : $('#formrecharge').serialize(),
				success : function (json) {
					if(json.sign==1){
						alert(json.message);
						window.location.href = "<?php echo U('Account/dealRecord2');?>";
					}else{
						if(json.message=="请输入您的支付账号"){
							alert("请输入您的银行卡姓名")
						}else{
							alert(json.message);
						}

					}

				}
			})
		}
	</script>
</body>
</html>