<include file="Public/header" />
<link rel="stylesheet" href="__CSS__/userHome.css">
<body style="background-color: white;">
<header data-am-widget="header"class="am-header am-header-default header nav_bg am-header-fixed">
	<div class="am-header-left am-header-nav">
		<a href="javascript:history.back(-1);" class="">
			<i class="iconfont icon-arrow-left"></i>
		</a>
	</div>
	<h1 class="am-header-title userHome_h1">
		用户注册
	</h1>
</header>
<style type="text/css">
	.bank_recharge .bank_form_list li {
		margin-bottom: 15px !important;
	}
	.bank_recharge .bank_form_list li{
        width: 90%;
    height: 42px;
    margin: 0 auto;
    background: #fff;
    padding: 0 0.1rem;
    border-radius: 2030px;
    overflow: hidden;
    margin-bottom: 30px;
    font-size: 14px;
    border: 1px solid #ddd;
}
</style>
<div class="bank_recharge">
	<form method="post" action="{:U('Public/register')}"  class="ruivalidate_form_class" onSubmit="return check_form(this)" id="form1">
		<ul class="bank_form_list">
			
			<li class="am-cf">
				<span class="bank_form_left am-fl">邀请码</span>
                <present name="linkinfo"><input type="hidden" name="linkid" value="{$linkinfo.id}"  /></present>
				<div class="am-fr bank_right_input">
					<!-- <input type="text" value="{$tgid}" name="reccode" id="reccode" class="input_txt" placeholder="请输入邀请码"> -->
					<input type="text" <if condition="$tgid neq ''">readonly</if> value="{$tgid == '0' ? '' : $tgid}" id="reccode" class="input fadeIn delay1 input_txt"
							size="60" name="reccode" maxlength="16"  placeholder="请输入邀请码" />
				</div>
			</li>
			<li class="am-cf">
				<span class="bank_form_left am-fl">账号</span>
				<div class="am-fr bank_right_input">
					<input type="text"  name="username" id="username" class="input_txt" placeholder="请输入账号">
				</div>
			</li>
			<li class="am-cf">
				<span class="bank_form_left am-fl">设置密码</span>
				<div class="am-fr bank_right_input">
					<input type="password" name="password" id="password" class="input_txt" placeholder="请输入密码">
				</div>
			</li>
			<li class="am-cf">
				<span class="bank_form_left am-fl">确认密码</span>
				<div class="am-fr bank_right_input">
					<input type="password"  name="cpassword" id="cpassword" class="input_txt" placeholder="请再次输入密码">
				</div>
			</li>
			<li class="am-cf" style="position:relative;">
				<span class="bank_form_left am-fl">提款密码</span>
				<div class="am-fr bank_right_input">
					<input type="password"  name="tradepassword" id="tradepassword" class="input_txt" placeholder="请输入提款密码">
					<!--<select name="tradepassword[]"  class="form-control" style="width:auto;background:#f6f6f6;">
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
					</select>
					<select name="tradepassword[]" class="form-control" style="width:auto; background:#f6f6f6;">
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
					</select>
					<select name="tradepassword[]" class="form-control" style="width:auto; background:#f6f6f6;">
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
					</select>
					<select name="tradepassword[]" class="form-control" style="width:auto; background:#f6f6f6;">
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
					</select>
					<select name="tradepassword[]" class="form-control" style="width:auto; background:#f6f6f6;">
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
					</select>
					<select name="tradepassword[]" class="form-control" style="width:auto; background:#f6f6f6;">
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
					</select>-->
				</div>
			</li>
		</ul>
		<p class="bank_pass"><a href="{:U('Public/login')}" style="font-size: 14px;">已有账号? 立即登录</a></p>
		<button style="margin-top:0.1rem;" class="am-btn am-btn-danger am-radius am-btn-block" type="submit">立即注册</button>
	</form>
</div>
<include file="Public/footer" />
<script>
	function check_form(obj) {
       $.ajax({
		   url : "{:U('Public/register')}",
		   type : 'POST',
		   data : $("#form1").serialize(),
		   success : function (data) {
			   if(data.sign==true){
				   alert("恭喜你!注册成功");
				   window.location.href= "{:U('Member/index')}"
			   }else{
				   alert(data.message);
			   }
		   }
	   })
		return false;
	}
</script>
</body>
</html>