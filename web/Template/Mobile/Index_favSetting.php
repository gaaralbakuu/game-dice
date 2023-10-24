<include file="Public/header"/>
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
            <span>
                <a href="{:U('Index/index')}"  style="float: right;">完成</a>
            </span>
        </h1>
    </header>

    <div class="favorite favorite1 fav">
        <div class="dearest">
            <div class="dearest-title">
                <img src="__IMG__/index/icon-heart.png" alt="" class="hot-img">
                <span>我的彩票(点击删除)</span>
            </div>
        </div>
        <ul class="am-cf">
            <volist name="mycplist" id="mycp" >
                <li data-name="{$mycp[name]}">
                    <a href="javascript:void(0)">
                        <i class="iconfont">
                            <img src="/app/{$mycp[name]}.png"/>
                        </i>
                    </a>
                </li>
            </volist>
        </ul>
    </div>

    <div class="favorite favorite1 guess">
        <div class="dearest">
            <div class="dearest-title">
                <img src="__IMG__/index/icon-heart.png" alt="" class="hot-img">
                <span>猜你喜欢(点击添加)</span>
            </div>
        </div>
        <ul class="am-cf">
            <volist name="guesslist" id="guesscp" >
                <li data-name="{$guesscp[name]}">
                    <a href="javascript:void(0)">
                        <i class="iconfont">
                            <img src="/app/{$guesscp[name]}.png"/>
                        </i>
                    </a>
                </li>
            </volist>
        </ul>
    </div>

    <include file="Public/footer"/>
</body>