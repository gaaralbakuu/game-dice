<include file="Public/header"/>
<link rel="stylesheet" href="__CSS__/userHome.css">
<body>
<header data-am-widget="header" class="am-header am-header-default header nav_bg am-header-fixed">
    <h1 class="am-header-title userHome_h1" style="margin: 0 auto; width: 100%;">
        购彩大厅
    </h1>
</header>
<style>
    .am-tabs-d2 .am-tabs-nav>.am-active a {
        color: white;
    }
    .am-tabs-d2 .am-tabs-nav>.am-active {
        border-bottom: 2px solid white;
        background-color: #8f0008;
    }
    .am-tabs-d2 .am-tabs-nav {
        background-color: #8f0008;
    }
    .am-tabs-d2 .am-tabs-nav a {
        color: white;
    }
    .am-tabs-d2 .am-tabs-nav>.am-active:after {
        border-bottom-color: white;
    }
    .hall .am-tabs-nav{
        position: fixed;
        top: 0.5rem;
        z-index: 101;
    }
    .hall .am-tabs-bd{
        margin-top: 0.45rem;
    }
</style>
    <div class="hall">
        <div data-am-widget="tabs" class="am-tabs am-tabs-d2" data-am-tabs-noswipe="1">
            <ul class="am-tabs-nav am-cf">
<!--                <li class="am-active"><a href="[data-tab-panel-0]">全部</a></li>-->
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
                        <ul class="am-list m-widget-list am-cf">
                            <!--
                            <li>
                                <a href="#" class="am-cf">
                                    <i class="iconfont am-fl">
                                        <img src="/app/bjpk10.png">
                                    </i>
                                    <div class="gameMid am-fl">
                                        <h3>北京PK拾</h3>
                                        <div class="prize-num">
                                            <ul class="normal">
                                                <li class="pk-09">09</li>
                                                <li class="pk-03">03</li>
                                                <li class="pk-01">01</li>
                                                <li class="pk-02">02</li>
                                                <li class="pk-05">05</li>
                                                <li class="pk-06">06</li>
                                                <li class="pk-04">04</li>
                                                <li class="pk-10">10</li>
                                                <li class="pk-08">08</li>
                                                <li class="pk-07">07</li
                                            </ul>
                                        </div>
                                        <p class="date">第<span class="">724781</span>期 截至<span class="timer">00:00:00</span></p>
                                    </div>
                                </a>
                            </li>
                            -->
                        </ul>
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

<script>

</script>

<include file="Public/footer"/>
</body>