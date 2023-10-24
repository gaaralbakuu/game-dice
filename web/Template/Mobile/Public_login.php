<include file="Public/header" />
<link rel="stylesheet" href="__CSS__/userHome.css">
<body>
<header data-am-widget="header"class="am-header am-header-default header nav_bg am-header-fixed">
    <div class="am-header-left am-header-nav">
        <a href="javascript:history.back(-1);" class="">
            <i class="iconfont icon-arrow-left"></i>
        </a>
    </div>
    <h1 class="am-header-title userHome_h1" style="margin: 0 auto; width: 100%;">
        用户登录
        <span><a href="{:GetVar('kefuthree')}" style="padding-right: 10px; position: absolute;right: 0px;top: 0px;color: white;font-size: 14px;">
        <img src="/app/mykefu.png" style="width: 24px;display: inline-block;">
        <span style="vertical-align: middle;">客服</span>
    </a></span>
    </h1>
	    <body style="background: white">
    <div class="am-container" style="margin-top: 70px;">
        <div class="am-g" style="text-align: center;"> 
            <img src="__IMG__/index/logo-3.png" alt="" style="width: 60px;margin: 0 auto;display: block;">
        <span class="my_logo">{:GetVar('webtitle')}</span>
        </div>
    </div>
      <style type="text/css">
        .my_logo{
                height: 30px;
    line-height: 30px;
    margin-top: -20px;
           display: inline-block;
    vertical-align: middle;
    font-weight: 600;
    background-image: -webkit-linear-gradient(left,#FFEB3B,#ff7d02 10%,#ff7d02 20%,#c3f985 30%, #CCCCFF 40%, #ff7902 50%,#f38bf0 60%,#ff7902 70%,#c3f985 80%,#ff7d02 90%,#FFEB3B 100%);
    -webkit-text-fill-color: transparent;
    -webkit-background-clip: text;
    -webkit-background-size: 200% 100%;
    -webkit-animation: masked-animation 4s linear infinite;
    font-size: 18px;
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
@keyframes masked-animation {
    0% {
        background-position: 0  0;
    }
    100% {
        background-position: -100%  0;
    }
}
    </style>
<div class="bank_recharge">
    <form method="post" class="ruivalidate_form_class" onSubmit="return check_login(this)" id="form1" checkby_ruivalidate url="" action="{:U('Public/logindo')}">
        <ul class="bank_form_list">
            <li class="am-cf">
                <span class="bank_form_left am-fl">账　号</span>
                <div class="am-fr bank_right_input">
                    <input type="text" class="input_txt" name="name" placeholder="请输入账号">
                </div>
            </li>
            <li class="am-cf">
                <span class="bank_form_left am-fl">密　码</span>
                <div class="am-fr bank_right_input">
                    <input type="password" name="pass" class="input_txt" placeholder="请输入密码">
                </div>
            </li>
<!--            <li class="am-cf" style="position:relative;">
                <span class="bank_form_left am-fl">验证码</span>
                <div class="am-fr bank_right_input">
                    <input type="text" name="code" class="input_txt"　style="width:20%;" placeholder="请输入验证码">
                </div>
                <span style="position:absolute;right:0;font-size:0.18rem;top:0;"><img style="height:0.45rem;width:1.2rem;" src="{:U('Public/verify',array('imageW'=>110,'imageH'=>30))}"  onclick="this.src=this.src+'?temp='+ 1" /></span>
            </li>-->
        </ul>
        <button style="margin-top:0.1rem;margin-bottom: 0px;" class="am-btn am-btn-danger am-radius am-btn-block" type="submit">立即登录</button>
        <div style="text-align: center;font-size: 14px;">
        <p class="bank_pass" style="display: inline-block;"><a  href="{:U('Public/forgetPaw')}">忘记密码?</a></p>
        <p class="bank_pass " style="text-align: center;display: inline-block;"><a href="{:U('Public/register')}">没有账号? 立即注册</a></p>
        </div>
    </form>
</div>
<script>
    function check_login(obj) {
        $.ajax({
            url : "{:U('Public/LoginDo')}",
            type : 'POST',
            data : $("#form1").serialize(),
            success : function (data) {
                if(data.sign==true){
                    alert(data.message);
                    window.location.href= "{:U('Member/index')}"
                }else{
                    if(data.message=="你的帐号已在别处登陆，是否重新登陆"){
                        if(confirm('你的帐号已在别处登陆，是否重新登陆')){
                            $.ajax({
                                url : "{:U('Public/LoginDo')}",
                                type : "POST",
                                data : {
                                    name : $("input[name=name]").val(),
                                    pass :$("input[name=pass]").val(),
                                    nocode : true,
                                },
                                success : function (json) {
                                    alert(json.message);
                                    window.location.href = "{:U('Member.index')}";
                                }
                            })
                        }
                }else{
                    alert(data.message);
                }
                }
            }
        })
        return false;
    }
</script>
</body>
</html>