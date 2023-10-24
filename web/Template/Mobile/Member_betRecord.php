<include file="Public/header"/>
<link rel="stylesheet" href="__CSS__/userHome.css">
<script type="text/javascript" src="/Template/Mobile/js/index.js"></script>
<style>

</style>
<body class="bg_fff">
<header data-am-widget="header" class="am-header am-header-default header nav_bg am-header-fixed">
    <div class="am-header-left am-header-nav">
        <a href="javascript:history.back(-1);" class="">
            <i class="iconfont icon-arrow-left"></i>
        </a>
    </div>
    <!--		<div class="winners_tab am-header-title">
                <em class="active" data-title="0">投注记录</em><em data-title="1">追号记录</em>
            </div>-->
    <h1 class="am-header-title userHome_h1">投注记录</h1>
    <div class="am-header-right am-header-nav">
        <a href="javascript:void(0);" data-am-modal="{target: '#my-actions'}">
            <em class="bill_day">全部</em>
            <i class="iconfont icon-jiantouxia"></i>
        </a>
    </div>
    <style type="text/css">
        .mynav1{
        color:#999 !important;
    }
    .mynav2{
color:#999 !important;
    }
    .mynav3{
color:#eb000e !important;
    }
    .mynav4{
color:#999 !important;
    }
    .mynav5{
color:#999 !important;
    }
    </style>
</header>

<div data-am-widget="tabs" class=" am-tabs-d2 billrecord_main">
    <ul class="am-tabs-nav am-cf">
        <li
        <if condition="$Think.get.a_item eq '1'">class="am-active"</if>
        ><a href="{:U('Member/betRecord',array('a_item'=>1))}">全部</a></li>
        <li
        <if condition="$Think.get.a_item eq '2'">class="am-active"</if>
        ><a href="{:U('Member/betRecord',array('a_item'=>2))}">已中奖</a></li>
        <li
        <if condition="$Think.get.a_item eq '3'">class="am-active"</if>
        ><a href="{:U('Member/betRecord',array('a_item'=>3))}">未中奖</a></li>
        <li
        <if condition="$Think.get.a_item eq '4'">class="am-active"</if>
        ><a href="{:U('Member/betRecord',array('a_item'=>4))}">等待开奖</a></li>
    </ul>
    <div class="am-tabs-bd">

        <!--全部-->
        <if condition="$Think.get.a_item eq '1' or $Think.get.a_item eq ''" value="1">
            <div data-tab-panel-0 class="am-tab-panel am-active">
                <div data-am-widget="list_news" class="am-list-news am-list-news-default">
                    <div class="am-list-news-bd">
                        <ul class="am-list">
                            <!-- <volist name="tzlist" id="vo">
                                    <li class="am-g am-list-item-dated">
                                        <p class="am-cf">
                                            <span class="what_type am-fl">{$vo.expect}</span>
                                            <em class="money am-fr">投注金额:{$vo.amount}</em>
                                        </p>
                                        <p class="am-cf billrecord_time">
                                            <span class="am-fl">{$vo.oddtime|date="m-d H:i:s",###}</span>
                                            <if condition="$vo.isdraw eq '0'"><em class="am-fr">{$vo.cptitle}(未开奖)</em></if>
                                            <if condition="$vo.isdraw eq '1'">
                                                <em class="am-fr">{$vo.cptitle}</em><em class="money am-fr" style="margin-right:1em">中奖金额:{$vo.okamount}</em></if>
                                            <if condition="$vo.isdraw eq '-1'"><em class="am-fr" style="color:green">{$vo.cptitle}(未中奖)</em></if>
                                        </p>
                                    </li>
                            </volist>-->
                            <volist name="tzlist" id="vo">
                                <li class="am-g am-list-item-dated">
                                    <a href="{:U('Member/betRecordDetails',array('trano'=>$vo['trano']))}">

                                    <p class="am-cf" style="font-size:14px">
                                         <img src="{$vo.img}" style="width: 20px;height: 20px;float: left;margin-right: 8px;margin-top: 4px;vertical-align: middle;">
    
                                        <span class="what_type am-fl">{$vo.cptitle}({$vo.expect}期)</span>
                                        <if condition="$vo.isdraw eq '0'">
                                            <em class="money am-fr" style="color:#666">未开奖</em>
                                            <a style="display: inline-block;" href="javascript:void" class="chedan_btn" style="color:red" onClick="Order_chedan('{$vo[id]}','{$vo[trano]}',this)">撤单</a>
                                            
                                            <!-- <a style="cursor:pointer;font-size: 12px !important;display: inline-block;" class="text-primary" layer-chedan-url="/Game.chedan.id.1282.do">撤单</u> -->
                                        </if>
                                        <if condition="$vo.isdraw eq '1'">
                                            <em class="money am-fr" style="color:red">已中奖 {$vo.okamount}元</em>
                                        </if>
                                        <if condition="$vo.isdraw eq '-1'">
                                            <em class="money am-fr" style="color:green">未中奖</em>
                                        </if>
                                        <if condition="$vo.isdraw eq '-2'">
                                            <em class="money am-fr" style="color:green">已撤单</em>
                                        </if>
                                    </p>
                                   <!--  <p class="am-cf billrecord_time" style="font-size:14px">
                                        <span class="what_type am-fl">玩法：{$vo.playtitle}({$vo.mode})</span>
                                    </p>
                                    <p class="am-cf billrecord_time" style="font-size:14px">
                                        <span class="what_type am-fl">投注内容：
                                            <if condition="$vo[playid] eq 'lhwq' or $vo[playid] eq 'lhws' or $vo[playid] eq 'lhwg' or $vo[playid] eq 'lhqb' or $vo[playid] eq 'lhqs' or $vo[playid] eq 'lhqg' or $vo[playid] eq 'lhbs' or $vo[playid] eq 'lhbg' or $vo[playid] eq 'lhsg'">
                                                {$vo.tzcode|str_replace=['0','1','2'],['龙','虎','和'],###}
                                                <elseif condition="$vo[playid] eq 'dxdsqe' or $vo[playid] eq 'dxdshe' or $vo[playid] eq 'dxdsqs' or $vo[playid] eq 'dxdshs'"/>
                                                {$vo.tzcode|str_replace=['0','1','2','3'],['大','小','单','双'],###}
                                                <else/>
                                                {$vo.tzcode}
                                            </if>
                                        </span>
                                    </p> -->
                                    <!-- <p class="am-cf billrecord_time" style="font-size:14px">
                                        <span class="what_type am-fl">单号：{$vo.trano}</span>
                                    </p> -->
                                    <p class="am-cf billrecord_time" style="font-size:14px">
                                        <!-- <span class="what_type am-fl">金额:{$vo.amount},注数:{$vo.itemcount},中奖金:{$vo.okamount},中注数:{$vo.okcount}</span> -->
                                        
                                        <if condition="$vo.isdraw eq '1'">
                                             <span class="what_type am-fl" style="color: #999;">投注金额 {$vo.amount}元</span>
                                            <!-- <span class="what_type am-fl" style="color: red;">已中奖 {$vo.okamount}元</span> -->
                                        </if>
                                        <if condition="$vo.isdraw eq '-1'">
                                            <span class="what_type am-fl" style="color: #999;">投注金额 {$vo.amount}元</span>
                                        </if>
                                        <if condition="$vo.isdraw eq '-2'">
                                           <span class="what_type am-fl" style="color: #999;">投注金额 {$vo.amount}元</span>
                                        </if>
                                    </p>
                                </a>
                                </li>
                            </volist>
                        </ul>
                    </div>
                </div>
            </div>
        </if>
        <!--已中奖-->
        <eq name="Think.get.a_item" value="2">
            <div data-tab-panel-1 class="am-tab-active ">
                <div data-am-widget="list_news" class="am-list-news am-list-news-default">
                    <div class="am-list-news-bd">
                        <ul class="am-list">
                            <volist name="tzlist" id="vo">
                                <eq name="vo['isdraw']" value="1">
                                    <li class="am-g am-list-item-dated" style="font-size:14px">
                                         <a href="{:U('Member/betRecordDetails',array('userid'=>$vo['trano']))}">
                                        <p class="am-cf" style="font-size:14px">
                                         <img src="{$vo.img}" style="width: 20px;height: 20px;float: left;margin-right: 8px;margin-top: 4px;vertical-align: middle;">
                                            <span class="what_type am-fl">{$vo.cptitle}({$vo.expect}期)</span>
                                            <if condition="$vo.isdraw eq '0'">
                                                <em class="money am-fr" style="color:#666">未开奖</em>
                                            </if>
                                            <if condition="$vo.isdraw eq '1'">
                                                <em class="money am-fr" style="color:red">已中奖 {$vo.okamount}元</em>
                                            </if>
                                            <if condition="$vo.isdraw eq '-1'">
                                                <em class="money am-fr" style="color:green">未中奖</em>
                                            </if>
                                        </p>
                                        <!-- <p class="am-cf billrecord_time" style="font-size:14px">
                                            <span class="what_type am-fl">玩法：{$vo.playtitle}({$vo.mode})</span>
                                        </p>
                                        <p class="am-cf billrecord_time" style="font-size:14px">
                                            <span class="what_type am-fl">投注内容：
                                            <if condition="$vo[playid] eq 'lhwq' or $vo[playid] eq 'lhws' or $vo[playid] eq 'lhwg' or $vo[playid] eq 'lhqb' or $vo[playid] eq 'lhqs' or $vo[playid] eq 'lhqg' or $vo[playid] eq 'lhbs' or $vo[playid] eq 'lhbg' or $vo[playid] eq 'lhsg'">
                                                {$vo.tzcode|str_replace=['0','1','2'],['龙','虎','和'],###}
                                                <elseif condition="$vo[playid] eq 'dxdsqe' or $vo[playid] eq 'dxdshe' or $vo[playid] eq 'dxdsqs' or $vo[playid] eq 'dxdshs'" />
                                                {$vo.tzcode|str_replace=['0','1','2','3'],['大','小','单','双'],###}
                                                <else/>
                                                {$vo.tzcode}
                                            </if>
                                            </span>
                                        </p>
                                        <p class="am-cf billrecord_time" style="font-size:14px">
                                            <span class="what_type am-fl">单号：{$vo.trano}</span>
                                        </p> -->
                                        <p class="am-cf billrecord_time" style="font-size:14px">
                                          <if condition="$vo.isdraw eq '1'">
                                            <span class="what_type am-fl" style="color: #999;">投注金额 {$vo.amount}元</span>
                                        </if>
                                        <if condition="$vo.isdraw eq '-1'">
                                            <span class="what_type am-fl" style="color: #999;">投注金额 {$vo.amount}元</span>
                                        </if>
                                        <if condition="$vo.isdraw eq '-2'" style="color: #999;">
                                           <span class="what_type am-fl">投注金额 {$vo.amount}元</span>
                                        </if>
                                        </p>
                                    </a>
                                    </li>
                                </eq>
                            </volist>
                        </ul>
                    </div>
                </div>
            </div>
        </eq>
        <!--未中奖-->
        <eq name="Think.get.a_item" value="3">
            <div data-tab-panel-2 class="am-tab-active ">
                <div data-am-widget="list_news" class="am-list-news am-list-news-default">
                    <div class="am-list-news-bd">
                        <ul class="am-list">
                            <volist name="tzlist" id="vo">
                                <eq name="vo[isdraw]" value="-1">
                                    <li class="am-g am-list-item-dated">
                                         <a href="{:U('Member/betRecordDetails',array('userid'=>$vo['trano']))}">
                                        <p class="am-cf" style="font-size:14px">
                                         <img src="{$vo.img}" style="width: 20px;height: 20px;float: left;margin-right: 8px;margin-top: 4px;vertical-align: middle;">
                                            <span class="what_type am-fl">{$vo.cptitle}({$vo.expect}期)</span>
                                            <if condition="$vo.isdraw eq '0'">
                                                <em class="money am-fr" style="color:#666">未开奖</em>
                                            </if>
                                            <if condition="$vo.isdraw eq '1'">
                                                <em class="money am-fr" style="color:red">已中奖</em>
                                            </if>
                                            <if condition="$vo.isdraw eq '-1'">
                                                <em class="money am-fr" style="color:green">未中奖</em>
                                            </if>
                                        </p>
                                      <!--   <p class="am-cf billrecord_time" style="font-size:14px">
                                            <span class="what_type am-fl">玩法：{$vo.playtitle}({$vo.mode})</span>
                                        </p>
                                        <p class="am-cf billrecord_time" style="font-size:14px">
                                            <span class="what_type am-fl">投注内容：
                                                <if condition="$vo[playid] eq 'lhwq' or $vo[playid] eq 'lhws' or $vo[playid] eq 'lhwg' or $vo[playid] eq 'lhqb' or $vo[playid] eq 'lhqs' or $vo[playid] eq 'lhqg' or $vo[playid] eq 'lhbs' or $vo[playid] eq 'lhbg' or $vo[playid] eq 'lhsg'">
                                                    {$vo.tzcode|str_replace=['0','1','2'],['龙','虎','和'],###}
                                                    <elseif condition="$vo[playid] eq 'dxdsqe' or $vo[playid] eq 'dxdshe' or $vo[playid] eq 'dxdsqs' or $vo[playid] eq 'dxdshs'"/>
                                                    {$vo.tzcode|str_replace=['0','1','2','3'],['大','小','单','双'],###}
                                                    <else/>
                                                    {$vo.tzcode}
                                                </if>
                                            </span>
                                        </p>
                                        <p class="am-cf billrecord_time" style="font-size:14px">
                                            <span class="what_type am-fl">单号：{$vo.trano}</span>
                                        </p> -->
                                        <p class="am-cf billrecord_time" style="font-size:14px">
                                          <if condition="$vo.isdraw eq '1'">
                                            <span class="what_type am-fl" style="color: red;">已中奖 {$vo.amount}元</span>
                                        </if>
                                        <if condition="$vo.isdraw eq '-1'">
                                            <span class="what_type am-fl" style="color: #999;">投注金额 {$vo.amount}元</span>
                                        </if>
                                        <if condition="$vo.isdraw eq '-2'" style="color: #999;">
                                           <span class="what_type am-fl">投注金额 {$vo.amount}元</span>
                                        </if>
                                        </p>
                                    </a>
                                    </li>
                                </eq>
                            </volist>
                        </ul>
                    </div>
                </div>
            </div>
        </eq>
        <!--等待开奖-->
        <eq name="Think.get.a_item" value="4">
            <div data-tab-panel-3 class="am-tab-active ">
                <div data-am-widget="list_news" class="am-list-news am-list-news-default">
                    <div class="am-list-news-bd">
                        <ul class="am-list">
                            <volist name="tzlist" id="vo">
                                <eq name="vo[isdraw]" value="0">
                                    <li class="am-g am-list-item-dated">
                                         <a href="{:U('Member/betRecordDetails',array('trano'=>$vo['trano']))}">
                                       <p class="am-cf" style="font-size:14px">
                                         <img src="{$vo.img}" style="width: 20px;height: 20px;float: left;margin-right: 8px;margin-top: 4px;vertical-align: middle;">
                                            <span class="what_type am-fl">{$vo.cptitle}({$vo.expect}期)</span>
                                            <if condition="$vo.isdraw eq '0'">
                                                <em class="money am-fr" style="color:#666">未开奖</em>
                                                 <a style="display: inline-block;" href="javascript:void" class="chedan_btn" style="color:red" onClick="Order_chedan('{$vo[id]}','{$vo[trano]}',this)">撤单</a>
                                            </if>
                                            <if condition="$vo.isdraw eq '1'">
                                                <em class="money am-fr" style="color:red">已中奖</em>
                                            </if>
                                            <if condition="$vo.isdraw eq '-1'">
                                                <em class="money am-fr" style="color:green">未中奖</em>
                                            </if>
                                        </p>
                                        <!-- <p class="am-cf billrecord_time" style="font-size:14px">
                                            <span class="what_type am-fl">玩法：{$vo.playtitle}({$vo.mode})</span>
                                        </p>
                                        <p class="am-cf billrecord_time" style="font-size:14px">
                                            <span class="what_type am-fl">投注内容：
                                                <if condition="$vo[playid] eq 'lhwq' or $vo[playid] eq 'lhws' or $vo[playid] eq 'lhwg' or $vo[playid] eq 'lhqb' or $vo[playid] eq 'lhqs' or $vo[playid] eq 'lhqg' or $vo[playid] eq 'lhbs' or $vo[playid] eq 'lhbg' or $vo[playid] eq 'lhsg'">
                                                    {$vo.tzcode|str_replace=['0','1','2'],['龙','虎','和'],###}
                                                    <elseif condition="$vo[playid] eq 'dxdsqe' or $vo[playid] eq 'dxdshe' or $vo[playid] eq 'dxdsqs' or $vo[playid] eq 'dxdshs'"/>
                                                    {$vo.tzcode|str_replace=['0','1','2','3'],['大','小','单','双'],###}
                                                    <else/>
                                                    {$vo.tzcode}
                                                </if>
                                            </span>
                                        </p>
                                        <p class="am-cf billrecord_time" style="font-size:14px">
                                            <span class="what_type am-fl">单号：{$vo.trano}</span>
                                        </p> -->
                                        <p class="am-cf billrecord_time" style="font-size:14px">
                                           <if condition="$vo.isdraw eq '1'">
                                            <span class="what_type am-fl" style="color: red;">已中奖 {$vo.amount}元</span>
                                        </if>
                                        <if condition="$vo.isdraw eq '-1'">
                                            <span class="what_type am-fl" style="color: #999;">金额 {$vo.amount}元</span>
                                        </if>
                                        <if condition="$vo.isdraw eq '-2'" style="color: #999;">
                                           <span class="what_type am-fl">金额 {$vo.amount}元</span>
                                        </if>
                                        </p>
                                    </a>
                                    </li>
                                </eq>
                            </volist>
                        </ul>
                    </div>
                </div>
            </div>
        </eq>
        <style type="text/css">
            .green-black{
              padding: 10px;
            }
            .green-black a{
                margin: 0 2px;
              padding: 0px 2px;
              font-size: 12px;
              border:1px solid #DCDFE6;
            }
            .green-black span{
 
              font-size: 12px;
            }
            .green-black .current{
                border:1px solid #DCDFE6;
                margin: 0 2px;
              padding: 0px 4px;
                color: red;
            }
        </style>
        <div class="page text-center green-black">{$pageshow}</div>
    </div>
</div>

<div class="am-modal-actions billrecord_day" id="my-actions">
    <div class="am-modal-actions-group">
        <ul class="am-list">
            <li class="am-modal-actions-header"><a onClick="return getlist(0);">全部</a></li>
            <li class="am-modal-actions-header"><a onClick="return getlist(1);">今天</a></li>
            <li class="am-modal-actions-header"><a onClick="return getlist(2);">昨天</a></li>
            <li class="am-modal-actions-header"><a onClick="return getlist(3);">七天</a></li>
        </ul>
    </div>
    <div class="am-modal-actions-group">
        <button class="am-btn am-btn-secondary am-btn-block btn_red" data-am-modal-close>取消</button>
    </div>
</div>
<include file="Public/footer"/>
<script>
    function getlist(atime) {
        var a_item = "{$Think.get.a_item}";
        if (a_item == "") {
            a_item = 1;
        }
        window.location.href = "Member.betRecord.atime." + atime + ".a_item." + a_item;
    }

    setTimeout(function () {
        var str = "{$Think.get.atime}";
        switch (str) {
            case '1':
                $('.bill_day').html('今天');
                break;
            case '2':
                $('.bill_day').html('昨天');
                break;
            case '3':
                $('.bill_day').html('七天');
                break;
            default:
                $('.bill_day').html('全部');


        }
    })
    /*		function chaxun(t){
                var atime = t;
                var url = "__ROOT__/index.php?m=Mobil&c=Account&a=dealRecord3&atime="+atime/!*+"&type="+type*!/;
                window.location.href = url;
            }*/
</script>
</body>
</html>