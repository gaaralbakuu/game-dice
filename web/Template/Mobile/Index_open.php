<include file="Public/header"/>
<link rel="stylesheet" href="__CSS__/userHome.css">
<body>
<header data-am-widget="header" class="am-header am-header-default header nav_bg am-header-fixed">
    <h1 class="am-header-title userHome_h1" style="margin: 0 auto; width: 100%;">
        开奖信息
    </h1>
</header>
<style>
    .am-tabs-d2 .am-tabs-nav {
        background-color: white;
    }
    .am-tabs-d2 .am-tabs-nav>.am-active {
        background-color: white;
    }
    .hall .am-tabs-nav{
        position: fixed;
        top: 1.2rem;
        z-index: 101;
    }
    .hall .am-tabs-bd{
        margin-top: 1.15rem;
    }
</style>
<div class="hall am-cf">
    <div class="open-award-wrap">
        <div class="open-award">
            <p>
                <span class="lt-sum">1</span>
                <span class="lt-sum">2</span>
                <span class="lt-unit">亿</span>
                <span class="lt-sum">1</span>
                <span class="lt-sum">9</span>
                <span class="lt-sum">0</span>
                <span class="lt-sum">0</span>
                <span class="lt-unit">万</span>
                <span class="lt-sum">1</span>
                <span class="lt-sum">4</span>
                <span class="lt-sum">7</span>
                <span class="lt-sum">6</span>
            </p>
            <div>当前已累计中奖金额</div>
        </div>
    </div>

    <div data-am-widget="tabs" class="am-tabs am-tabs-d2" data-am-tabs-noswipe="1" style="margin-top: 0.8rem">
        <ul class="am-tabs-nav am-cf">
            <li class="am-active"><a href="[data-tab-panel-0]" data-typeid="k3">快3</a></li>
            <li class=""><a href="[data-tab-panel-1]" data-typeid="ssc">时时彩</a></li>
            <li class=""><a href="[data-tab-panel-2]" data-typeid="pk10">pk10</a></li>
            <li class=""><a href="[data-tab-panel-3]" data-typeid="dpc">低频彩</a></li>
            <li class=""><a href="[data-tab-panel-4]" data-typeid="x5">11选5</a></li>
            <li class=""><a href="[data-tab-panel-5]" data-typeid="keno">快乐彩</a></li>
            <li class=""><a href="[data-tab-panel-6]" data-typeid="lhc">六合彩</a></li>
        </ul>
        <div class="am-tabs-bd">
            <div data-tab-panel-0 class="am-tab-panel am-active">
                <div class="widget-list am-cf">
                    <ul class="am-list m-widget-list am-cf"></ul>
                </div>
            </div>
            <div data-tab-panel-1 class="am-tab-panel ">
                <div class="widget-list am-cf"><ul class="am-list m-widget-list am-cf"></ul></div>
            </div>
            <div data-tab-panel-2 class="am-tab-panel ">
                <div class="widget-list am-cf"><ul class="am-list m-widget-list am-cf"></ul></div>
            </div>
            <div data-tab-panel-3 class="am-tab-panel ">
                <div class="widget-list am-cf"><ul class="am-list m-widget-list am-cf"></ul></div>
            </div>
            <div data-tab-panel-4 class="am-tab-panel ">
                <div class="widget-list am-cf"><ul class="am-list m-widget-list am-cf"></ul></div>
            </div>
            <div data-tab-panel-5 class="am-tab-panel ">
                <div class="widget-list am-cf"><ul class="am-list m-widget-list am-cf"></ul></div>
            </div>
            <div data-tab-panel-6 class="am-tab-panel ">
                <div class="widget-list am-cf"><ul class="am-list m-widget-list am-cf"></ul></div>
            </div>
        </div>
    </div>
</div>

<!-- loading -->
<div class="am-modal am-modal-loading am-modal-no-btn" tabindex="-1" id="change-loading">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">正在载入...</div>
        <div class="am-modal-bd">
            <span class="am-icon-spinner am-icon-spin"></span>
        </div>
    </div>
</div>

<include file="Public/footer"/>
</body>