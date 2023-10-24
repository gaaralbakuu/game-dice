<include file="Public/header" />
<link rel="stylesheet" href="__CSS__/userHome.css">
<style type="text/css">
		.bank_recharge .bank_form_list li .bank_form_left {
    width: 25%;
    font-weight: normal;
    font-size: 14px;
    height: 42px;
    text-align: right;
    display: inline-block;
     padding-left: 0px; 
    line-height: 42px;
    vertical-align: middle;
}
	.money_box .mysele{
		color: white;
		background-color: #f72222 !important;
	}
	.money_box{
		width: 100%;
    padding-bottom: 20px;
    display: inline-block;
    font-size: 0px;
    margin-top: 20px;

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
			绑定提现账号
		</h1>

	</header>
	
	<div class="bank_recharge">
		<div class="money_box" style="border-bottom-style: ; font-size: 0px;margin-top: 20px;text-align: center;">
	<button onclick="sele_click('0')" class="mytype mysele" style="padding: 2px 25px;outline: none;background-color: white;border: 1px solid red;font-size:14px;border-right: 0px; ">银行卡</button>
	<button onclick="sele_click('1')" class="mytype" style="padding: 2px 25px;outline: none;background-color: white;border: 1px solid red;font-size:14px;">支付宝</button>
</div>
<!-- start -->
		<form id="myzfb" action="{:U('Member/addBank')}" class="update_form am-form" method="post" style="margin-top:10px;display: none;text-align: center;">
			<input type="text" name="stype" style="display: none;" value="z">
			<!-- <div class="clearfix drop_menu" style="margin-bottom:22px;">
				<div>
					<span class="" >本人姓名：</span>
					<div class="form-group accountname" style="text-align:left;">
						 {$userinfo.userbankname}
					</div>
				</div>
				<div>
				<span class="">支付宝账号：</span>
				<div class="form-group drop_menu">
					<input id="zfb" type="text" name="zfb" placeholder="请输入支付宝账号">
				</div>

				</div>
			</div>
			<div class="clearfix drop_menu">
			<div class="answer">
					<span>资金密码：</span>
					<input type="password" id="bankTradPwd2" name="safepass" placeholder="请输入资金密码">
			</div>
			</div> -->

			<ul class="bank_form_list">
				<li class="am-cf">
					<span class="bank_form_left am-fl">本人姓名：</span>

					<div class="am-form-group bank_right_select am-fr" style="text-align:left;">
						<span class="am-form-caret userbankname" style="font-size: 14px;">{$userinfo.userbankname}</span>
					</div>

					<!--<div class="am-fr bank_right_input">
						<input type="text"  id="accountname" name="accountname"  class="input_txt" placeholder="请输入您的真实姓名" >
					</div>-->
					
				</li>
				<li class="am-cf">
					<span class="bank_form_left am-fl">支付宝账号：</span>
				
						<!-- <select name="bankname" id="sysBankCard" class="select_common">
							<option value="">请选择银行</option>
							<volist name="Allbank" id="value">
								<option value="{$value['bankcode']}">{$value['bankname']}</option>
							</volist>
						</select>
						<span class="am-form-caret"></span> -->
						<div class="am-fr bank_right_input" style="text-align:left;">
						<input id="zfb" class="input_txt" type="text" name="zfb" placeholder="请输入支付宝账号">
					</div>
			
					
				</li>
				<li class="am-cf">
					<span class="bank_form_left am-fl">资金密码：</span>
				
						<!-- <select name="bankname" id="sysBankCard" class="select_common">
							<option value="">请选择银行</option>
							<volist name="Allbank" id="value">
								<option value="{$value['bankcode']}">{$value['bankname']}</option>
							</volist>
						</select>
						<span class="am-form-caret"></span> -->
						<div class="am-fr bank_right_input" style="text-align:left;">
						<input type="password" class="input_txt" id="bankTradPwd2" name="safepass" placeholder="请输入资金密码">
					</div>
			
					
				</li>
			</ul>
		
			<button class="am-btn am-btn-danger am-radius am-btn-block" onclick="userbindbankcard2();" type="button">提交</button>
		</form>
		<!-- end -->
		<form id="myyhk" action="{:U('Member/addBank')}" method="post" class="am-form">
			<ul class="bank_form_list">
				<li class="am-cf">
					<span class="bank_form_left am-fl">持卡人姓名：</span>

					<div class="am-form-group bank_right_select am-fr">
						<span class="am-form-caret userbankname" style="font-size: 14px;">{$userinfo.userbankname}</span>
					</div>

					<!--<div class="am-fr bank_right_input">
						<input type="text"  id="accountname" name="accountname"  class="input_txt" placeholder="请输入您的真实姓名" >
					</div>-->
					
				</li>
				<li class="am-cf">
					<span class="bank_form_left am-fl">银行：</span>
				
						<!-- <select name="bankname" id="sysBankCard" class="select_common">
							<option value="">请选择银行</option>
							<volist name="Allbank" id="value">
								<option value="{$value['bankcode']}">{$value['bankname']}</option>
							</volist>
						</select>
						<span class="am-form-caret"></span> -->
						<div class="am-fr bank_right_input">
						<input id="sysBankCard" type="text" name="bankname" class="input_txt" placeholder="请输入银行">
					</div>
			
					
				</li>
				<li class="am-cf">
					<span class="bank_form_left am-fl">开户省：</span>
	<div class="am-fr bank_right_input">
						<input type="text" id="s_province" name="province" class="input_txt"   placeholder="请输入开户省份"/>
</div>
				</li>
				<li class="am-cf">
					<span class="bank_form_left am-fl">开户市：</span>
<div class="am-fr bank_right_input">
						<input type="text"  name="city" id="s_city" class="input_txt"   placeholder="请输入开户城市"/>
		</div>

				</li>
<!--				<li class="am-cf">
					<span class="bank_form_left am-fl" >开户人姓名</span>
					<div class="am-fr bank_right_input">
						<input name="accountname" type="text" class="input_txt" placeholder="请输入银行卡的姓名" >
					</div>
				</li>-->
				<li class="am-cf">
					<span class="bank_form_left am-fl">开户网点：</span>
					<div class="am-fr bank_right_input">
						<input type="text"  id="bankBranch" name="accountname"  class="input_txt" placeholder="请输入开户网点" >
					</div>
				</li>
				<li class="am-cf">
					<span class="bank_form_left am-fl">银行卡号：</span>
					<div class="am-fr bank_right_input">
						<input type="text"  id="bankCardNum" name="banknumber"  class="input_txt" placeholder="请输入银行卡的卡号" >
					</div>
				</li>
				<li class="am-cf">
					<span class="bank_form_left am-fl">确认卡号：</span>
					<div class="am-fr bank_right_input">
						<input type="text" id="regBankCardNum" name="rebanknumber"  class="input_txt" placeholder="请再次输入银行卡号">
					</div>
				</li>
				<li class="am-cf">
					<span class="bank_form_left am-fl">资金密码：</span>
					<div class="am-fr bank_right_input">
						<input type="password" id="bankTradPwd" name="safepass"  class="input_txt" placeholder="请输入您的资金密码">
					</div>
				</li>
			</ul>

			<button class="am-btn am-btn-danger am-radius am-btn-block"  onclick="userbindbankcard();" type="button">确定</button>
		</form>	
	</div>
	<include file="Public/footer" />
	<script>
		var userbindbankcard = function(){

			var url = '__ROOT__/Apijiekou.' + 'userbindbankcard';
			var bankCode = $("#sysBankCard").val();
            var _username = $(".userbankname").html();
			var bankCardNumber = $("#bankCardNum").val();
			var regbankCardNumber = $("#regBankCardNum").val();
			var province = $("#s_province").val();
			var city = $("#s_city").val();

			var bankTradPwd = $("#bankTradPwd").val();
			// 07-11 add 开户行网点
			var bankBranch = $("#bankBranch").val();
			bankBranch = bankBranch?bankBranch:"";
			/*if(!_username || _username !=""){
				alert("请输入你的真实姓名");
				return false;
			}*/

			if(_username.length<2){
				window.location.href="{:U('Account/userbankname')}"
			}
			if (bankCode.length < 1) {
				alert("请选择银行卡");return false;
			} else if (province=="省份" || city=="地级市") {
				alert("请选择开户省市");return false;

			} else if (bankCardNumber.length < 1) {
				alert("请输入银行卡号");return false;

			} else if (regbankCardNumber.length < 1) {
				alert("请输入确认银行卡号");return false;
			} else if (regbankCardNumber != bankCardNumber) {
				alert("两次卡号输入的不一致，请重新输入");return false;
			} else if (bankTradPwd.length < 1) {
				alert("请输入资金密码");return false;
			}
			var bankAddress = province + "-" + city;
			$.post(url,{
				"stype": "y",
				"bankCardNumber": bankCardNumber,
				"bankAddress": bankAddress,
				"bankTradPwd": bankTradPwd,
				"bankCode": bankCode,
				"regbankCardNumber": regbankCardNumber,
				"bankBranch": bankBranch,
				"accountname": _username
			}, function(json){
				if(json.sign){
					alert('银行绑定成功',1);
					window.location.href="{:U('Member/bindcard')}";
				}else{
					alert(json.message,-1);
					return false;
				}
				return false;
			},'json');

		}
		$('.money_box .mytype').on('click', function() {
				$(this).addClass('mysele').siblings().removeClass('mysele');
			})

	function sele_click(t){
		if(t == '0'){
			$('#myzfb').css("display","none");
			$('#myyhk').css("display","block");
		}else if(t == '1'){
			$('#myyhk').css("display","none");
			$('#myzfb').css("display","block");
		}
	}
		var userbindbankcard2 = function(){

		 var url = '__ROOT__/Apijiekou.' + 'userbindbankcard'; 

				 var zfb = $("#zfb").val();
		         var accountname = $(".userbankname").html();
		 		 var bankTradPwd = $("#bankTradPwd2").val();
		 		 console.log(bankTradPwd);
				 if (zfb.length < 1) {
					 alt("请输入支付宝账号");return false;
				 }  else if (bankTradPwd.length < 1) {
					 alt("请输入资金密码");return false;
				 }
				 console.log('ok');
				 $.post(url,{
				 	 "stype": "z",
					 "zfb": zfb,
					 "accountname": accountname,
					 "bankTradPwd": bankTradPwd
				 }, function(json){
					 if(json.sign){
						 alt('绑定成功',1);
						window.location.href="{:U('Member/bindcard')}";
					 }else{
						 alt(json.message,-1);
						 return false;
					 }
					 return false;
				 },'json');

	 }
	</script>
</body>
</html>