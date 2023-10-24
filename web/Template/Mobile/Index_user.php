<include file="Public/header"/>
<link rel="stylesheet" href="__CSS__/userHome.css">
<body>
<header data-am-widget="header" class="am-header am-header-default header nav_bg am-header-fixed">
    <h1 class="am-header-title userHome_h1" style="margin: 0 auto; width: 100%;">
        我的
    </h1>
    <a href="{:GetVar('kefuthree')}" style="padding-right: 10px; position: absolute;right: 0px;top: 0px;color: white;font-size: 14px;">
        <img src="/app/mykefu.png" style="width: 24px;display: inline-block;">
        <span style="vertical-align: middle;">客服</span>
    </a>
</header>

<style>
        .mynav1{
        color:#999 !important;
    }
    .mynav2{
color:#999 !important;
    }
    .mynav3{
color:#999 !important;
    }
    .mynav4{
color:#999 !important;
    }
    .mynav5{
color:#eb000e !important;
    }
    .user {
        background: #f2f2f2;
        width: 100%;
        /*padding-top: 1rem;*/
        padding-bottom: 0.2rem;
        color: #303030;
    }
    .user .info {
        background: #d22018;
        min-height: 0.8rem;
    }
    .user .info .login-reg {
        background: hsla(0,0%,100%,.3);
        position: relative;
        width: 1rem;
        height: 0.4rem;
        line-height: 0.4rem;
        top: .15rem;
        margin: 0 auto;
        border-radius: .1rem;
        font-size: .14rem;
        color: #fff;
        text-align: center;
    }
    .user .login-reg a{color: white;}
    .btns{background: white;padding-left: 0.1rem;padding-right: 0.1rem;}
    .btns .am-avg-sm-3{border-bottom: 1px solid #eee;}
    .btns li{display: inline-block;}
    .btns li>a{display: block;text-align: center;padding: 0.1rem;font-size: 0.12rem;
        color: #303030;}
    .btns li>a i{display: block;}
    .btns li>a i img{width: 0.25rem;height: 0.25rem;}
    .my_header .img img{width: 0.64rem;height: 0.64rem;border-radius: 0.32rem;}
    .my_header_content>p{color:white !important;font-size: 0.14rem;}
    .icon-shuaxin{color: white !important;}
</style>
<div class="user">
    <div class="info">
        <empty name="userinfo.username">
            <div class="login-reg">
                <div>
                    <a href="{:U('Public/login')}">登录</a> / <a href="{:U('Public/register')}">注册</a>
                </div>
            </div>
        </empty>
        <notempty name="userinfo.username">
            <div class="my_header am-cf" style="background: #b91616;">
                <div class="my_info am-cf">
                    <div class="img am-fl">
                        <img src="__ROOT__{$userinfo['face']}" class="am-radius" alt="">
                    </div>
                    <div class="am-fl my_header_content">
                        <p>账号：<em>{$userinfo['username']}</em></p>
                        <!-- <span class="hide_text">已隐藏</span><em class="show_money" ></em> <a class="hide_money" href="javascript:void(0);">隐藏</a><strong class="show_money_btn">显示</strong> -->
                        <p>余额：{$userinfo['balance']} </p>
<!--                        <p>洗码：{$userinfo['xima']} </p>-->
                    </div>
                    <i class="iconfont icon-shuaxin am-fr my_home_refresh" style="display: block;"></i>
                </div>
            </div>
        </notempty>
    </div>

    <div class="btns">
        <div class="am-cf am-avg-sm-3">
            <li>
                <a href="{:U('Account/rechargeList')}">
                    <i class="iconfont">
                        <img src="__IMG__/index/icon-deposit.png" alt="">
                    </i>
                    <span>充值</span>
                </a>
            </li>
            <li>
                <a href="{:U('Account/withdrawals')}">
                    <i class="iconfont">
                        <img src="__IMG__/index/icon-withdrawal.png" alt="">
                    </i>
                    <span>提款</span>
                </a>
            </li>
            <li>
                <a href="{:U('Member/betRecord')}">
                    <i class="iconfont">
                        <img src="__IMG__/index/icon-orders.png" alt="">
                    </i>
                    <span>注单</span>
                </a>
            </li>
        </div>
        <div class="am-cf am-avg-sm-3">
            <li>
                <a href="{:U('Account/dealRecord')}">
                    <i class="iconfont">
                        <img src="__IMG__/index/icon-account.png" alt="">
                    </i>
                    <span>个人账变</span>
                </a>
            </li>
            <li>
                <a href="{:U('Member/personalInfo')}">
                    <i class="iconfont">
                        <img src="__IMG__/index/icon-team.png" alt="">
                    </i>
                    <span>个人信息</span>
                </a>
            </li>
            <li>
                <a href="{:U('Member/gglist')}">
                    <i class="iconfont">
                        <img src="__IMG__/index/icon-message.png" alt="">
                    </i>
                    <span>平台公告</span>
                </a>
            </li>
        </div>
    </div>

    <ul class="my_set_list">
        <li>
            <a href="/Member.personalInfo.do" class="am-cf">
                <i class="iconfont icon-wode square_bg"></i>
                <span>个人信息</span>
                <i class="iconfont icon-arrowright"></i>
            </a>
        </li>
		<li>
            <a href="/Member.agent.do" class="am-cf">
                <i class="iconfont icon-wode square_bg"></i>
                <span>代理中心</span>
                <i class="iconfont icon-arrowright"></i>
            </a>
        </li>
        <li>
            <a href="/Member.setting.do" class="am-cf">
                <i class="iconfont icon-safe square_bg"></i>
                <span>安全中心</span>
                <i class="iconfont icon-arrowright"></i>
            </a>
        </li>
        <li>
            <a href="/Activity.index.do" class="am-cf">
                <i class="iconfont icon-giftfill square_bg" style="background:#f37b1d;"></i>
                <span>活动中心</span>
                <i class="iconfont icon-arrowright"></i>
            </a>
        </li>
       <!--  <li>
            <a href="/Member.trans.do" class="am-cf">
                <i class="iconfont icon-shuju square_bg"></i>
                <span>额度转换</span>
                <i class="iconfont icon-arrowright"></i>
            </a>
        </li> -->
        <li>
            <a href="/Account.todayLoss.do" class="am-cf">
                <i class="iconfont icon-shuju square_bg"></i>
                <span>今日盈亏</span>
                <i class="iconfont icon-arrowright"></i>
            </a>
        </li>
        <li>
            <a href="/Member.gglist.do" class="am-cf">
                <i class="iconfont icon-tubiao15 square_bg"></i>
                <span>平台公告</span>
                <i class="iconfont icon-arrowright"></i>
            </a>
        </li>
    </ul>
    <notempty name="userinfo.username">
    <div class="security_close">
        <a href="javascript:if(confirm('是否退出？'))location='{:U('Public/LoginOut')}'" class="am-cf">
            <span>退出登录</span>
            <i class="iconfont icon-arrowright am-fr"></i>
        </a>
    </div>
    </notempty>
</div>


<include file="Public/footer"/>
</body>