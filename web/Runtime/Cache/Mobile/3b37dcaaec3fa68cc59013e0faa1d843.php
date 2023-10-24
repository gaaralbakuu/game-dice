<?php if (!defined('THINK_PATH')) exit(); $webheadertitle = $nowcpinfo['title']; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo ($webheadertitle); ?></title>
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<link rel="shortcut icon" href="/favicon.ico">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/Template/Mobile/css/sm.css">
<link rel="stylesheet" href="/Template/Mobile/css/sm-extend.min.css">

<script>
    var WebConfigs = {
        'ROOT' : ""
    } 
<?php echo "var k3lotteryrates = ".json_encode($rates,JSON_UNESCAPED_UNICODE);?>
</script>
<script type='text/javascript' src='/Template/Mobile/js/zepto.js' charset='utf-8'></script>
<script type='text/javascript' src='/Template/Mobile/js/config.js' charset='utf-8'></script>
<script type='text/javascript' src='/Template/Mobile/js/fx.js' charset='utf-8'></script>
<script type='text/javascript' src='/Template/Mobile/js/sm.min.js' charset='utf-8'></script>
<script type='text/javascript' src='/Template/Mobile/js/slideupdown.js' charset='utf-8'></script>
<script type='text/javascript' src='/Template/Mobile/js/sm-extend.min.js' charset='utf-8'></script>
<link rel="stylesheet" href="/Template/Mobile/css/sm-extend.min.css">
<link rel="stylesheet" href="/Template/Mobile/css/reset.css">
<link rel="stylesheet" href="/Template/Mobile/css/theme-red.css">  

<link rel="stylesheet" href="/Template/Mobile/css/icon.css">
<script>
var lotteryinfo = <?php echo json_encode($nowcpinfo,JSON_UNESCAPED_UNICODE);?>;
</script>
<script type='text/javascript' src='/Template/Mobile/js/way.min.js' charset='utf-8'></script>
<script type="text/javascript" src="/Template/Mobile/js/member.page.js"></script>
<script type='text/javascript' src='/Template/Mobile/js/common.js' charset='utf-8'></script>
<script type='text/javascript' src='/Template/Mobile/js/k3.js' charset='utf-8'></script>

<link rel="stylesheet" type="text/css" href="/resources/css/chat/appchat-chat-index.css" />
    <link rel="stylesheet" type="text/css" href="/resources/css/chat/index1.css" />
    <link rel="stylesheet" type="text/css" href="/resources/css/chat/index.css" />
    <!--workmand的js-->
    <!-- <script type="text/javascript" src="/resources/js/jquery-1.9.1.min.js"></script> -->
   <!--  <script type="text/javascript" src="/resources/js/chat/swfobject.js"></script>
    <script type="text/javascript" src="/resources/js/chat/web_socket.js"></script>
    <script type="text/javascript" src="/resources/js/chat/jquery-sinaEmotion-2.1.0.js"></script> -->
<style>
.bottom_navbar{position: absolute;bottom: 0;z-index: 9999;width: 100%;}
.bottom_navbar ul{list-style: none;overflow: hidden;padding: 0;margin: 0;background: #22292c;color: #fff;padding-top: 5px;}
.bottom_navbar ul li{ float: left;width: 20%;text-align: center;}
.am-navbar-default a {color: #fff;}
.am-navbar-nav a { display: inline-block;width: 100%;height: 49px;line-height: 20px;}
.bottom_navbar .bottom_navbar_list i{font-size: 25px;line-height: 30px;}
.am-navbar-nav a .am-navbar-label {padding-top: 2px;line-height: 1;font-size: 12px;display: block;word-wrap: normal;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;font-size: 14px;}
.bottom_navbar .active {color: #e54042;}
.choice_lottery_playdetail {
    position: absolute;
    z-index: 100;
    top: -50px;
    left: 50%;
}
.my_jiantouxia {
    width: 30px !important;
    position: absolute;
    height: 20px !important;
    margin-top: 4px;
    left: 50%;
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px;
    margin-left: -15px;
    line-height: 20px;
    text-align: center;
    font-size: 12px;
    
    color: #999;
    top: 54px !important;
    background-color: white;
}
.start_video{
    background-color: rgba(255,255,255,0.4) !important;
    box-shadow: 0 0 5px rgba(255,255,255,0.4) !important;
    z-index: 3000 !important;
    color: white !important;
}
#chat_box{
    z-index: 10000;
}
</style>
</head>
<body>
<div class="page-group">
    <span onclick="strat_chat()" class="start_video mychat_start" style="display: none;">
        聊<br>天<br>室
        <span id="username" style="display: none;"><?php echo ($username); ?></span>
         <span id="myhead" style="display: none;"><?php echo ($face); ?></span>
    </span>
    <!-- start -->
        <div id="chat_box" style="width: 100vw; height: 100vh; background-color: rgba(0,0,0,0.8);">
            <span id="level" style="display: none;"><?php echo ($level); ?></span>
             <div class="mychat">
     <div class="chatbar" style="position: relative !important;">
    <!---->
    <div class="chatwin type-normal">
        <div class="chat" style="border: 3px solid #f00;">
            <div class="lay-relative">
                <!---->
                <div class="profile">
                    <div class="inner" style="animation-duration: 0.3s;">
                        <div class="avatar" ><img src="<?php echo ($info['head']); ?>" alt="" id="userhead"></div>
                        <p><span class="txt-nick">北京pk10</span></p>
                        <p>当前等级: <img src="/resources/images/chat/icon_member01.gif" alt="" class="head_level_img"></p>
                        <div>
                            <p>
                                <input type="file" id="upload_head" style="display: none">
                                <a href="javascript:void(0)" class="u-btn1">关闭</a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="chat-header">
                    <div class="ttl"><span><i class="iconfont icon-shouyeshouye1" style="vertical-align: 0px;font-size: 18px;"></i> 聊天室</span></div>
                </div>
                <div class="list" style="bottom: 98px;" >
                    <div class="lay-scroll" style="padding-top: 45px;" id="content_parent">
                       
                        <?php if(is_array($chat_list)): $k1 = 0; $__LIST__ = $chat_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($k1 % 2 );++$k1;?><div class="Item <?php echo ($vo1['class']); ?>">
                            <div class="lay-block">
                                <div class="avatar" ><img src="<?php echo ($vo1['head']); ?>" alt="84***20"></div>
                                <div class="lay-content">
                                    <div class="msg-header">
                                        <h4><?php echo ($vo1['name']); ?></h4> <span><img src="<?php echo ($vo1['level_img']); ?>" alt="普通会员"></span> <span class="MsgTime"><?php echo ($vo1['create_at']); ?></span></div>
                                    <div class="Bubble" style="<?php echo ($vo1['style']); ?>">
                                        <p><span style="white-space: pre-wrap; word-break: break-all;"><?php echo ($vo1['content']); ?></span></p>
                                    
                                    </div>
                                </div>
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>

                    </div>
                    <div class="controls" style="top: 38px;">
                        <a href="javascript:void(0)" class="ListCtrl roll_screen"><i class="iconfont" style="vertical-align: -1px;"></i>滚屏</a>
                        <a href="javascript:void(0)" class="ListCtrl clear_screen"><i class="iconfont" style="vertical-align: 0px;"></i>清屏</a>
                    </div>
                    <div class="chat-announce">
                        <div class="ttl"><i class="iconfont icon-icon100"></i> 公告:</div>
                        <div class="scroll">
                            <marquee scrollamount="3">
                                <ol>
                     
          <li><?php echo ($notice); ?></li>
      
                                </ol>
                            </marquee>
                        </div>
                    </div>
                </div>
                <div class="compose">
                    <div class="control-bar">
                        <div class="el-popover"  x-placement="top-start">

                            <div class="emoji-container">
                                <i class="Emoji emoji-smile" data-id="[smile]"></i>
                                <i class="Emoji emoji-laughing" data-id="[laughing]"></i>
                                <i class="Emoji emoji-blush" data-id="[blush]"></i>
                                <i class="Emoji emoji-heart_eyes" data-id="[heart_eyes]"></i>
                                <i class="Emoji emoji-smirk" data-id="[smirk]"></i>
                                <i class="Emoji emoji-flushed" data-id="[flushed]"></i>
                                <i class="Emoji emoji-grin" data-id="[grin]"></i>
                                <i class="Emoji emoji-kissing_smiling_eyes" data-id="[kissing_smiling_eyes]"></i>
                                <i class="Emoji emoji-wink" data-id="[wink]"></i>
                                <i class="Emoji emoji-kissing_closed_eyes" data-id="[kissing_closed_eyes]"></i>
                                <i class="Emoji emoji-stuck_out_tongue_winking_eye" data-id="[stuck_out_tongue_winking_eye]"></i>
                                <i class="Emoji emoji-sleeping" data-id="[sleeping]"></i>
                                <i class="Emoji emoji-worried" data-id="[worried]"></i>
                                <i class="Emoji emoji-sweat_smile" data-id="[sweat_smile]"></i>
                                <i class="Emoji emoji-cold_sweat" data-id="[cold_sweat]"></i>
                                <i class="Emoji emoji-joy" data-id="[joy]"></i>
                                <i class="Emoji emoji-sob" data-id="[sob]"></i>
                                <i class="Emoji emoji-angry" data-id="[angry]"></i>
                                <i class="Emoji emoji-mask" data-id="[mask]"></i>
                                <i class="Emoji emoji-scream" data-id="[scream]"></i>
                                <i class="Emoji emoji-sunglasses" data-id="[sunglasses]"></i>
                                <i class="Emoji emoji-thumbsup" data-id="[thumbsup]"></i>
                                <i class="Emoji emoji-clap" data-id="[clap]"></i>
                                <i class="Emoji emoji-ok_hand" data-id="[ok_hand]"></i>
                            </div>
                            <div x-arrow="" class="popper__arrow" style="left: 15.5px;"></div>
                        </div>
                        <span></span>
                        <a href="javascript:void(0)" title="发送表情" class="btn-control"><img style="width: 26px;" src="/resources/images/chat/biaoqing.png" /></a><label for="imgUploadInput" style="display: none;"><span title="上传图片" class="btn-control"><i class="iconfont icon-erjiyemian-liaotianduihua-danchuangtianjiatupian"></i> <input id="imgUploadInput" type="file" accept=".jpg, .png, .gif, .jpeg, image/jpeg, image/png, image/gif" style="width: 0.1px; height: 0.1px; opacity: 0; position: absolute; top: -20px;"></span></label>
                        <!---->
                        <!---->
                        <!---->
                    </div>
                    <div class="typing">
                        <div class="txtinput el-textarea {if $info['is_temporary']==1}is-disabled{/if}">
                            <textarea  id="textarea_content" {if $info['is_temporary']==1}disabled  placeholder="输入内容" {/if} type="textarea" autosize="[object Object]" rows="2" autocomplete="off" validateevent="true" class="el-textarea__inner" style="height: 54px;"></textarea>
                        </div>
                        <div class="sendbtn" onclick="onSubmit()">
                            <a href="javascript:void(0)" class="u-btn1">发送</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="controls chat-header">
                <span class="ttl">
                    <a href="javascript:void(0)" title="修改昵称" style="display: none;"><i class="iconfont icon-user"></i></a>
                    <a onclick="close_chat()" href="javascript:void(0)" title="隐藏聊天室"><i class="iconfont icon-guanbi-copy" style="font-size: 14px;"></i></a>
                </span>
            </div>


        </div>
    </div>
</div>
 </div>
        </div>
        <!-- end -->
      <!-- 你的html代码 -->
      <div class="pa yyplay_select_container" id="PageSwitch">
        <?php if(is_array($k3list)): $i = 0; $__LIST__ = $k3list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$k3vo): $mod = ($i % 2 );++$i;?><a  data-k3url="<?php echo U('Game/k3',['code'=>$k3vo['name']]);?>"><?php echo ($k3vo["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
      <div class="page">
        <style>
    .theme-red .icon-sanjiaoxing{
        display: inline-block;
        transform: rotate(180deg);
        transition: .6s;
        font-size: 22px;
    }
</style>

<header class="bar bar-nav theme-red" style="background:#000;text-align:center;">
     <span style="height: 50px;margin-left: -42px;line-height: 50px;display: inline-block;vertical-align: top;">
                <sapn style="height: 50px;line-height: 50px;display: inline-block;color:white;font-size: 12px;vertical-align: top;">余额:</sapn>
                <span id="money_text" style="height: 50px;margin-right: 5px; line-height: 50px;display: inline-block; font-size: 12px;color: red;vertical-align: top;"></span>
        </span>
    <?php if($userinfo and ($userinfo['islogin'] == 1)): if((strtolower(CONTROLLER_NAME) == 'index') and (strtolower(ACTION_NAME) == 'index')): ?><a class="button button-link button-nav pull-left bar-nav-top-left" href="/">
        <span class="icon icon-home"></span>
    </a>
    <?php else: ?>
    <a class="button button-link button-nav pull-left bar-nav-top-left" href="/">
        <span class="iconfont icon-shouyeshouye1"></span>
    </a><?php endif; ?>
    <?php if((strtolower(CONTROLLER_NAME) == 'game') and (strtolower(ACTION_NAME) == 'k3') and is_array($nowcpinfo)): ?><h1 class="title" onclick="GamePageSwitchToggle();"><?php echo ($nowcpinfo["title"]); ?><i class="iconfont icon-sanjiaoxing"></i></h1>
    
    <?php else: ?>
    <h1 class="title"><?php echo ($webheadertitle); ?></h1><?php endif; ?>

    <?php else: ?>
    <?php if((strtolower(CONTROLLER_NAME) == 'index') and (strtolower(ACTION_NAME) == 'index')): ?><a class="button button-link button-nav pull-left bar-nav-top-left" href="/">
        <span class="iconfont icon-shouyeshouye1"></span>
    </a>
    <?php else: ?>
    <a class="button button-link button-nav pull-left bar-nav-top-left" href="/">
        <span class="icon icon-left"></span>
    </a><?php endif; ?>

    <a class="button button-link button-nav pull-right" onclick="lianxikefu('<?php echo ($WebConfigs["kefuthree"]); ?>')">
        <span class="icon icon-message"></span>
        联系客服
    </a>
    <?php if((strtolower(CONTROLLER_NAME) == 'game') and (strtolower(ACTION_NAME) == 'k3') and is_array($nowcpinfo)): ?><h1 class="title" onclick="GamePageSwitchToggle();"><?php echo ($nowcpinfo["title"]); ?> <span class="icon icon-down" style="font-size:0.8rem;"></span></h1>
    <!-- <div class="pa yyplay_select_container" id="PageSwitch">
        <?php if(is_array($k3list)): $i = 0; $__LIST__ = $k3list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$k3vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Game/k3',['code'=>$k3vo['name']]);?>"><?php echo ($k3vo["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
    </div> -->
    <?php else: ?>
    <h1 class="title"><?php echo ($webheadertitle); ?></h1><?php endif; endif; ?>
    <!-- 选择与切换玩法 -->
        <em class="gameInfo" style="font-size: 12px;display: inline-block;line-height: 13px;text-align: left;margin-top: 13px;">玩<br>法</em>
        <div class="choice_lottery_playdetail_left">
            <a class="choice_playName" href="#">和值</a>
            <i class="iconfont icon-sanjiaoxing" style="color: #f0c930;transform: rotate(180deg);transition: .6s;"></i>
        </div>    
<script type="text/javascript">
    window.onload = function(){
        $.ajax({
                url:"<?php echo U('Account/refreshmoney');?>",
                type:'POST',
                success :function (data) {
                    $("#money_text").html(data);
                  
                }
            })
             setInterval(function(){
    $.ajax({
                url:"<?php echo U('Account/refreshmoney');?>",
                type:'POST',
                success :function (data) {
                    $("#money_text").html(data);
                  
                }
            })
    },4000);
    setInterval(function(){
        getUserBetsListToday2();
    },5000);
    }
</script>
<style type="text/css">
    .theme-red .icon-sanjiaoxing{
        font-size: 18px !important;
    }
</style>
</header>


          <div class="content">
			
            <div class="play_select_container yyplay_select_container">
                <!-- 玩法切换 -->
                <div class="play_select_insert" id="j_play_select">
                    
                    <ul class="play_select_tit"> 
                
                            
                            <li lottery_code="k3hzzx" parent_code="<?php echo ($nowcpinfo["name"]); ?>" class="curr lottery_1">
                                <a href="javascript:void(0)" class="lineMore-item">和值</a>
                                <p class="ypeil"><?php echo ($minPeilv); ?>-<?php echo ($maxPeilv); ?>倍</p>
                                <p class="ysaizi">
                                    <span class="dice dice1"></span>+
                                    <span class="dice dice2"></span>+
                                    <span class="dice dice3"></span>
                                </p>
                            </li>
                        
                            <li lottery_code="k3sthtx" parent_code="<?php echo ($nowcpinfo["name"]); ?>" class=" lottery_3">
                                <a href="javascript:void(0)" class="lineMore-item">三同号通选</a> 
                                <p class="ypeil">赔率<?php echo ($peilv["k3sthtx"]); ?>倍</p>
                                <p class="ysaizi">
                                    <span class="dice dice1"></span> 
                                    <span class="dice dice1"></span> 
                                    <span class="dice dice1"></span>
                                </p>
                            </li>
                        
                            <li lottery_code="k3sthdx" parent_code="<?php echo ($nowcpinfo["name"]); ?>" class=" lottery_5">
                                <a href="javascript:void(0)" class="lineMore-item">三同号单选</a>
                                <p class="ypeil">赔率<?php echo ($peilv["k3sthdx"]); ?>倍</p>
                                <p class="ysaizi">
                                    <span class="dice dice1"></span> 
                                    <span class="dice dice1"></span> 
                                    <span class="dice dice1"></span>
                                </p>
                            </li>
                        
                            <li lottery_code="k3sbthbz" parent_code="<?php echo ($nowcpinfo["name"]); ?>" class=" lottery_7">
                                <a href="javascript:void(0)" class="lineMore-item">三不同号</a>
                                <p class="ypeil">赔率<?php echo ($peilv["k3sbthbz"]); ?>倍</p>
                                <p class="ysaizi">
                                    <span class="dice dice2"></span> 
                                    <span class="dice dice3"></span> 
                                    <span class="dice dice5"></span>
                                </p>
                            </li>
                        
                            <li lottery_code="k3slhtx" parent_code="<?php echo ($nowcpinfo["name"]); ?>" class=" lottery_9">
                                <a href="javascript:void(0)" class="lineMore-item">三连号通选</a>
                                <p class="ypeil">赔率<?php echo ($peilv["k3slhtx"]); ?>倍</p>
                                <p class="ysaizi">
                                    <span class="dice dice1"></span> 
                                    <span class="dice dice2"></span> 
                                    <span class="dice dice3"></span>
                                </p>
                            </li>
                        
                            <li lottery_code="k3ethfx" parent_code="<?php echo ($nowcpinfo["name"]); ?>" class=" lottery_11">
                                <a href="javascript:void(0)" class="lineMore-item">二同号复选</a>
                                <p class="ypeil">赔率<?php echo ($peilv["k3ethfx"]); ?>倍</p>
                                <p class="ysaizi">
                                    <span class="dice dice1"></span> 
                                    <span class="dice dice1"></span> 
                                    <span class="dice dice3"></span>
                                </p>
                            </li>
                        
                            <li lottery_code="k3ethdx" parent_code="<?php echo ($nowcpinfo["name"]); ?>" class=" lottery_13">
                                <a href="javascript:void(0)" class="lineMore-item">二同号单选</a>
                                <p class="ypeil">赔率<?php echo ($peilv["k3ethdx"]); ?>倍</p>
                                <p class="ysaizi">
                                    <span class="dice dice1"></span> 
                                    <span class="dice dice1"></span> 
                                    <span class="dice dice3"></span>
                                </p>
                            </li>
                        
                            <li lottery_code="k3ebthbz" parent_code="<?php echo ($nowcpinfo["name"]); ?>" class=" lottery_15">
                                <a href="javascript:void(0)" class="lineMore-item">二不同号</a>
                                <p class="ypeil">赔率<?php echo ($peilv["k3ebthbz"]); ?>倍</p>
                                <p class="ysaizi">
                                    <span class="dice dice1"></span> 
                                    <span class="dice dice4"></span> 
                                    <span class="dice dice4"></span>
                                </p>
                            </li>
                        
                    </ul> 
                </div>
                <!-- 玩法切换 -->
            </div>
            <style type="text/css">
                
            </style>
			<div class="row no-gutter text-center Betting_Issue_CountDown cz_openNumb" style="padding-top:5px;background: #22563f;position: relative;height: 59px;overflow: visible;">
                       <dl class="col-50">
                              <dt style="font-size:14px;"><i class="f_lottery_info_lastnumber red"  id="f_lottery_info_lastnumber" way-data="showExpect.lastFullExpect">--</i><span id="issueText">期</span></dt>
                               <dd style="font-size:20px; padding:0; margin:0;">
							   <ul id="openNum_list" style="padding: 0px; display: inline-block;margin:0;">
                    <li class="open_numb_gif"></li>
                    <li class="open_numb_gif"></li>
                    <li class="open_numb_gif"></li>
                </ul>

							  </dd>
                        </dl>
                       <dl class="col-50" style="color:#caebda">
                        <dt style="font-size:14px;">距<i class="f_lottery_info_number red" id="f_lottery_info_number" way-data="showExpect.currFullExpect">--</i>期截止</dt>
                         <dd style="font-size:20px; padding:0; margin:0;"><i class="j_lottery_time red" id="j_lottery_time">
							<t class="hh bj"><span way-data="gametimes.h">00</span></t>
							<em>:</em>
							<t class="mm bj"><span way-data="gametimes.m">00</span></t>
							<em>:</em>
							<t class="ss bj"><span way-data="gametimes.s">00</span></t>
						 </i></dd>
                        </dl> 
                        <i onclick="" class="iconfont icon-jiantouxia my_jiantouxia cz_daojishi my_close_lishi2"></i>
			</div>
					<div id="fn_getoPenGame" style="width: 100%;
    height: 100vh;
    position: absolute;
    overflow: scroll;
     background-color: rgba(0,0,0,0.5); 
    margin-top: -4px;
    display: none; ">
    <div style="height: 50vh;text-align: center; background-color: #22563f;">
                <div style="height: 49vh;padding-bottom: 10px; overflow: scroll;background-color: #22563f;">
                           <table id="fn_getoPenGame" border="0px" cellpadding="0" cellspacing="0" style="width:100%;text-align:center">
                            <colgroup>
                                <col width="30%">
                                <col width="20%">
                                <col width="20%">
                                <col width="20%">
                            </colgroup>
                            <thead 
    style="background-color: #DADADA; border-bottom: 1px solid #BBBBBB;border-top: 1px solid hsla(0,0%,100%,.3);background-color: #22563f;width: 16rem;font-size: .7em;color: #caebda;text-align: center;clear: both;border-bottom: 1px solid #BBBBBB;height: 64px;">
                                <tr style="    border-bottom: 1px solid #212121;">
                                    <th>期数</th>
                                    <th>奖号</th>
                                    <th>和值</th>
                                    <th>形态</th>
                                </tr>
                            </thead>
                            <tbody class="tbody" style="background: #22563f;"></tbody>
                        </table>
                    </div>
                    <span onclick="" class="cz_daojishi my_close_lishi Betting_Issue_CountDown" style="">关闭</span>
                </div>
                 
                         </div>


<section class="ui-container">   
			<!-- 选择与切换玩法 -->
			<!-- 投注期号与倒计时 -->
			<!-- 投注期号与倒计时 --> 
			<!-- 选号区域 -->
			<div class="Choice_Ball_Container ui-whitespace" id="Game_CheckBall">
				<?php if($nowcpinfo['iswh'] == 0): ?><div class="gn_main_cont k3_ball_conatiner" id="gn_main_cont">

				</div>
				<?php else: ?>
					<p style="font-size:30px; color:#f60; text-align:center; padding:15px 0;">彩种维护中...</p><?php endif; ?>
            </div>
		</section>  
          </div>
      </div>
  </div>

<div class="lottey_footer" style="bottom: 58px;">
    <div class="lottery_footer_sum" style="display:none;">
        <span class="lottery_sum_text">当前号码</span>
        <div id="lottery_sum_old_b">

        </div>
    </div>
    <div class="lottery_inputBox" style="display:none;">
        每注金额
        <input type="number" class="lottery_input" placeholder="金额">
        <span class="lottery_input_text">请输入要投注的金额</span>
    </div>
    <div class="kuaijie_money">
        <ul class="kuaijie_money_ul">
            <li class="kuaijie_item">5</li>
            <li class="kuaijie_item">10</li>
            <li class="kuaijie_item">50</li>
            <li class="kuaijie_item">100</li>
            <li class="kuaijie_item">1000</li>
        </ul>
    </div>  
    <div class="betting_box" style="background: #22563f;border-top: 1px solid #1a4230;">
        <div class="betting_left">
            <span class="betting_empty">清空</span>
            <em class="betting_sum_box" style="display:none;">
                共<span class="betting_sum">0</span>注,
                <span class="betting_sum_moery">0</span>元
            </em>
        </div>
        <div class="betting_right">
            <button class="betting_right_btn">
                马上投注
            </button>
        </div>
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
<script type="text/html" id="k3hzzx_wf">
	<!--和值-->

	<div id="k3hzzx" class="ball_section section_cqssc">
		<p class="remark" style="text-align:center;color:#999;margin:15px 0 5px;color:#caebda;">
			猜3个开奖号相加的和,3-10为小,11-18为大
		</p>
		<div class="li_ball">
			<div class="ui-row-flex">
				<div class="ui-col ui-col-4 line-box">
					<ul class="ball_list_ul">
						<li class="ball_item"><a playid="k3hzbig" ball-type="k3hzzx" ball-number="大" href="javascript:void(0)" class="ball_number" peilv="<?php echo ($peilv["k3hzbig"]); ?>"><b>大</b>
								<p class="peilv">
									赔率<?php echo ($peilv["k3hzbig"]); ?>
								</p>
							</a></li>
						<li class="ball_item"><a playid="k3hzsmall" ball-type="k3hzzx" ball-number="小" href="javascript:void(0)" class="ball_number" peilv="<?php echo ($peilv["k3hzsmall"]); ?>"><b>小</b>
								<p class="peilv">
									赔率<?php echo ($peilv["k3hzsmall"]); ?>
								</p>
							</a></li>
						<li class="ball_item"><a playid="k3hzodd" ball-type="k3hzzx" ball-number="单" href="javascript:void(0)" class="ball_number" peilv="<?php echo ($peilv["k3hzodd"]); ?>"><b>单</b>
								<p class="peilv">
									赔率<?php echo ($peilv["k3hzodd"]); ?>
								</p>
							</a></li>
						<li class="ball_item"><a playid="k3hzeven" ball-type="k3hzzx" ball-number="双" href="javascript:void(0)" class="ball_number" peilv="<?php echo ($peilv["k3hzeven"]); ?>"><b>双</b>
								<p class="peilv">
									赔率<?php echo ($peilv["k3hzeven"]); ?>
								</p>
							</a></li>
						<li class="ball_item"><a playid="k3hz3" ball-type="k3hzzx" ball-number="3" href="javascript:void(0)" class="ball_number" peilv="<?php echo ($peilv["k3hz3"]); ?>"><b>3</b>
								<p class="peilv">
									赔率<?php echo ($peilv["k3hz3"]); ?>
								</p>
							</a></li>
						<li class="ball_item"><a playid="k3hz4" ball-type="k3hzzx" ball-number="4" href="javascript:void(0)" class="ball_number" peilv="<?php echo ($peilv["k3hz4"]); ?>"><b>4</b>
								<p class="peilv">
									赔率<?php echo ($peilv["k3hz4"]); ?>
								</p>
							</a></li>
						<li class="ball_item"><a playid="k3hz5" ball-type="k3hzzx" ball-number="5" href="javascript:void(0)" class="ball_number" peilv="<?php echo ($peilv["k3hz5"]); ?>"><b>5</b>
								<p class="peilv">
									赔率<?php echo ($peilv["k3hz5"]); ?>
								</p>
							</a></li>
						<li class="ball_item"><a playid="k3hz6" ball-type="k3hzzx" ball-number="6" href="javascript:void(0)" class="ball_number" peilv="<?php echo ($peilv["k3hz6"]); ?>"><b>6</b>
								<p class="peilv">
									赔率<?php echo ($peilv["k3hz6"]); ?>
								</p>
							</a></li>
						<li class="ball_item"><a playid="k3hz7" ball-type="k3hzzx" ball-number="7" href="javascript:void(0)" class="ball_number" peilv="<?php echo ($peilv["k3hz7"]); ?>"><b>7</b>
								<p class="peilv">
									赔率<?php echo ($peilv["k3hz7"]); ?>
								</p>
							</a></li>
						<li class="ball_item"><a playid="k3hz8" ball-type="k3hzzx" ball-number="8" href="javascript:void(0)" class="ball_number" peilv="<?php echo ($peilv["k3hz8"]); ?>"><b>8</b>
								<p class="peilv">
									赔率<?php echo ($peilv["k3hz8"]); ?>
								</p>
							</a></li>
						<li class="ball_item"><a playid="k3hz9" ball-type="k3hzzx" ball-number="9" href="javascript:void(0)" class="ball_number" peilv="<?php echo ($peilv["k3hz9"]); ?>"><b>9</b>
								<p class="peilv">
									赔率<?php echo ($peilv["k3hz9"]); ?>
								</p>
							</a></li>
						<li class="ball_item"><a playid="k3hz10" ball-type="k3hzzx" ball-number="10" href="javascript:void(0)" class="ball_number" peilv="<?php echo ($peilv["k3hz10"]); ?>"><b>10</b>
								<p class="peilv">
									赔率<?php echo ($peilv["k3hz10"]); ?>
								</p>
							</a></li>
						<li class="ball_item"><a playid="k3hz11" ball-type="k3hzzx" ball-number="11" href="javascript:void(0)" class="ball_number" peilv="<?php echo ($peilv["k3hz11"]); ?>"><b>11</b>
								<p class="peilv">
									赔率<?php echo ($peilv["k3hz11"]); ?>
								</p>
							</a></li>
						<li class="ball_item"><a playid="k3hz12" ball-type="k3hzzx" ball-number="12" href="javascript:void(0)" class="ball_number" peilv="<?php echo ($peilv["k3hz12"]); ?>"><b>12</b>
								<p class="peilv">
									赔率<?php echo ($peilv["k3hz12"]); ?>
								</p>
							</a></li>
						<li class="ball_item"><a playid="k3hz13" ball-type="k3hzzx" ball-number="13" href="javascript:void(0)" class="ball_number" peilv="<?php echo ($peilv["k3hz13"]); ?>"><b class="peilv">13</b>
								<p>
									赔率<?php echo ($peilv["k3hz13"]); ?>
								</p>
							</a></li>
						<li class="ball_item"><a playid="k3hz14" ball-type="k3hzzx" ball-number="14" href="javascript:void(0)" class="ball_number" peilv="<?php echo ($peilv["k3hz14"]); ?>"><b>14</b>
								<p class="peilv">
									赔率<?php echo ($peilv["k3hz14"]); ?>
								</p>
							</a></li>
						<li class="ball_item"><a playid="k3hz15" ball-type="k3hzzx" ball-number="15" href="javascript:void(0)" class="ball_number" peilv="<?php echo ($peilv["k3hz15"]); ?>"><b>15</b>
								<p class="peilv">
									赔率<?php echo ($peilv["k3hz15"]); ?>
								</p>
							</a></li>
						<li class="ball_item"><a playid="k3hz16" ball-type="k3hzzx" ball-number="16" href="javascript:void(0)" class="ball_number" peilv="<?php echo ($peilv["k3hz16"]); ?>"><b>16</b>
								<p class="peilv">
									赔率<?php echo ($peilv["k3hz16"]); ?>
								</p>
							</a></li>
						<li class="ball_item"><a playid="k3hz17" ball-type="k3hzzx" ball-number="17" href="javascript:void(0)" class="ball_number" peilv="<?php echo ($peilv["k3hz17"]); ?>"><b>17</b>
								<p class="peilv">
									赔率<?php echo ($peilv["k3hz17"]); ?>
								</p>
							</a></li>
						<li class="ball_item"><a playid="k3hz18" ball-type="k3hzzx" ball-number="18" href="javascript:void(0)" class="ball_number" peilv="<?php echo ($peilv["k3hz18"]); ?>"><b>18</b>
								<p class="peilv">
									赔率<?php echo ($peilv["k3hz18"]); ?>
								</p>
							</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

</script>
<script type="text/html" id="k3sthtx_wf">
	<!--三同号通选-->

	<div id="k3sthtx" class="ball_section section_cqssc">
		<p class="remark" style="color:#999">
			对所有相同的三个号码（111、222、333、444、555、666）进行投注，任意号码开出，即为中奖。奖金<?php echo ($peilv["k3sthtx"]); ?>倍
		</p>
		<div class="li_ball">
			<div class="ui-row-flex">
				<div class="ui-col ui-col-4 line-box">
					<ul class="ball_list_ul">
						<li style="width:100%" class="ball_item"><a playid="k3sthtx" playid="k3sthtx" href="javascript:void(0);" ball-type="3THTX" ball-number="三同号通选" class="ball_number" id="slhtx_btn"><b>三同号通选</b></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

</script>
<script type="text/html" id="k3sthdx_wf">
	<!--3同号单选-->
	<div id="k3sthdx" class="ball_section section_cqssc">
		<p class="remark" style="color:#999">
			对相同的三个号码（111、222、333、444、555、666）中的任意一个进行投注，所选号码开出，即为中奖。奖金<?php echo ($peilv["k3sthdx"]); ?>倍
		</p>
		<div class="li_ball">
			<div class="ui-row-flex">
				<div class="ui-col ui-col-4 line-box">
					<ul class="ball_list_ul">
						<li style="width:33.3%" class=" ball_item"><a playid="k3sthdx" ball-type="k3sthdx" ball-number="111" href="javascript:void(0)" class="ball_number"><b>111</b></a></li>
						<li style="width:33.3%" class=" ball_item"><a playid="k3sthdx" ball-type="k3sthdx" ball-number="222" href="javascript:void(0)" class="ball_number"><b>222</b></a></li>
						<li style="width:33.3%" class=" ball_item"><a playid="k3sthdx" ball-type="k3sthdx" ball-number="333" href="javascript:void(0)" class="ball_number"><b>333</b></a></li>
						<li style="width:33.3%" class=" ball_item"><a playid="k3sthdx" ball-type="k3sthdx" ball-number="444" href="javascript:void(0)" class="ball_number"><b>444</b></a></li>
						<li style="width:33.3%" class=" ball_item"><a playid="k3sthdx" ball-type="k3sthdx" ball-number="555" href="javascript:void(0)" class="ball_number"><b>555</b></a></li>
						<li style="width:33.3%" class=" ball_item"><a playid="k3sthdx" ball-type="k3sthdx" ball-number="666" href="javascript:void(0)" class="ball_number"><b>666</b></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</script>
<script type="text/html" id="k3sbthbz_wf">
	<!--3不同号-->
	<div id="k3sbthbz" class="ball_section section_cqssc">
		<p class="remark" style="color:#999">
			从1～6中任选3个或多个号码，所选号码与开奖号码的3个号码相同，即为中奖。奖金<?php echo ($peilv["k3sbthbz"]); ?>倍
		</p>
		<div class="li_ball">
			<div class="ui-row-flex">
				<div class="ui-col ui-col-4 line-box">
					<ul class="ball_list_ul">
						<li style="width:33.3%" class=" ball_item"><a playid="k3sbthbz" ball-type="k3sbthbz" ball-number="1" href="javascript:void(0)" class="ball_number"><b>1</b></a></li>
						<li style="width:33.3%" class=" ball_item"><a playid="k3sbthbz" ball-number="2"  ball-type="k3sbthbz" href="javascript:void(0)" class="ball_number"><b>2</b></a></li>
						<li style="width:33.3%" class=" ball_item"><a playid="k3sbthbz" ball-number="3" ball-type="k3sbthbz" href="javascript:void(0)" class="ball_number"><b>3</b></a></li>
						<li style="width:33.3%" class=" ball_item"><a playid="k3sbthbz" ball-number="4" ball-type="k3sbthbz" href="javascript:void(0)" class="ball_number"><b>4</b></a></li>
						<li style="width:33.3%" class=" ball_item"><a playid="k3sbthbz" ball-number="5" ball-type="k3sbthbz" href="javascript:void(0)" class="ball_number"><b>5</b></a></li>
						<li style="width:33.3%" class=" ball_item"><a playid="k3sbthbz" ball-number="6" ball-type="k3sbthbz" href="javascript:void(0)" class="ball_number"><b>6</b></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</script>
<script type="text/html" id="k3slhtx_wf">
	<!--3连号同选-->
	<div id="k3slhtx" class="ball_section section_cqssc">
		<p class="remark" style="color:#999">
			对所有3个相连的号码（123、234、345、456）进行投注，任意号码开出，即为中奖。奖金<?php echo ($peilv["k3slhtx"]); ?>倍
		</p>
		<div class="li_ball">
			<div class="ui-row-flex">
				<div class="ui-col ui-col-4 line-box">
					<ul class="ball_list_ul">
						<li style="width:100%" class="ball_item"><a ball-type="k3slhtx" playid="k3slhtx" ball-number="三连号通选" class="ball_number" href="javascript:void(0)"><b >三连号通选</b></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</script>
<script type="text/html" id="k3ethfx_wf">
	<!--2同号复选-->
	<div id="k3ethfx" class="ball_section section_cqssc">
		<p class="remark" style="color:#999">
			从11～66中任选1个或多个号码，选号与奖号（包含11～66，不限顺序）相同，即为中奖。奖金<?php echo ($peilv["k3ethfx"]); ?>倍
		</p>
		<div class="li_ball">
			<div class="ui-row-flex">
				<div class="ui-col ui-col-4 line-box">
					<ul class="ball_list_ul">
						<li style="width:33.3%" class=" ball_item"><a ball-number="11" playid="k3ethfx" ball-type="k3ethfx" href="javascript:void(0)" class="ball_number"><b>11</b></a></li>
						<li style="width:33.3%" class=" ball_item"><a ball-number="22" playid="k3ethfx" ball-type="k3ethfx" href="javascript:void(0)" class="ball_number"><b>22</b></a></li>
						<li style="width:33.3%" class=" ball_item"><a ball-number="33" playid="k3ethfx" ball-type="k3ethfx" href="javascript:void(0)" class="ball_number"><b>33</b></a></li>
						<li style="width:33.3%" class=" ball_item"><a ball-number="44" playid="k3ethfx" ball-type="k3ethfx" href="javascript:void(0)" class="ball_number"><b>44</b></a></li>
						<li style="width:33.3%" class=" ball_item"><a ball-number="55" playid="k3ethfx" ball-type="k3ethfx" href="javascript:void(0)" class="ball_number"><b>55</b></a></li>
						<li style="width:33.3%" class=" ball_item"><a ball-number="66" playid="k3ethfx" ball-type="k3ethfx" href="javascript:void(0)" class="ball_number"><b>66</b></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</script>
<script type="text/html" id="k3ethdx_wf">
	<!--2同号单选-->

	<div id="k3ethdx" class="ball_section section_cqssc">
		<p class="remark" style="color:#999">
			选择1对相同号码和1个不同号码投注，选号与奖号相同，即为中奖，奖金<?php echo ($peilv["k3ethdx"]); ?>倍
		</p>
		<div class="gn_main_list">
			<ul class="ball_list_ul">
				<li style="width:100%;margin:8px 5px" class="li_ball curr">
					<ul style="width:100%;margin:auto" class="ball_list_ul ball_cont" id="ball_list_ul0">
						<li style="width:16.6%;padding:5px 5px;" class="ball_item"><a ball-number="11" ball-type="k3ethdx" playid="k3ethdx" href="javascript:void(0)" class="ball_number ethdx_btn"><b>11</b></a></li>
						<li style="width:16.6%;padding:5px 5px;" class="ball_item"><a ball-number="22" ball-type="k3ethdx" playid="k3ethdx" href="javascript:void(0)" class="ball_number ethdx_btn"><b>22</b></a></li>
						<li style="width:16.6%;padding:5px 5px;" class="ball_item"><a ball-number="33" ball-type="k3ethdx" playid="k3ethdx" href="javascript:void(0)" class="ball_number ethdx_btn"><b>33</b></a></li>
						<li style="width:16.6%;padding:5px 5px;" class="ball_item"><a ball-number="44" ball-type="k3ethdx" playid="k3ethdx" href="javascript:void(0)" class="ball_number ethdx_btn"><b>44</b></a></li>
						<li style="width:16.6%;padding:5px 5px;" class="ball_item"><a ball-number="55" ball-type="k3ethdx" playid="k3ethdx" href="javascript:void(0)" class="ball_number ethdx_btn"><b>55</b></a></li>
						<li style="width:16.6%;padding:5px 5px;" class="ball_item"><a ball-number="66" ball-type="k3ethdx" playid="k3ethdx" href="javascript:void(0)" class="ball_number ethdx_btn"><b>66</b></a></li>
					</ul>
				</li>
				<li style="width:100%;margin:8px 5px" class="li_ball curr">
					<ul style="width:100%;margin:auto" class="ball_list_ul ball_cont" id="ball_list_ul1">
						<li style="width:16.6%;padding:5px 5px;" class="ball_item"><a ball-number="1" ball-type="k3ethdx" playid="k3ethdx" href="javascript:void(0)" class="ball_number ethdx_btn1"><b>1</b></a></li>
						<li style="width:16.6%;padding:5px 5px;" class="ball_item"><a ball-number="2" ball-type="k3ethdx" playid="k3ethdx" href="javascript:void(0)" class="ball_number ethdx_btn1"><b>2</b></a></li>
						<li style="width:16.6%;padding:5px 5px;" class="ball_item"><a ball-number="3" ball-type="k3ethdx" playid="k3ethdx" href="javascript:void(0)" class="ball_number ethdx_btn1"><b>3</b></a></li>
						<li style="width:16.6%;padding:5px 5px;" class="ball_item"><a ball-number="4" ball-type="k3ethdx" playid="k3ethdx" href="javascript:void(0)" class="ball_number ethdx_btn1"><b>4</b></a></li>
						<li style="width:16.6%;padding:5px 5px;" class="ball_item"><a ball-number="5" ball-type="k3ethdx" playid="k3ethdx" href="javascript:void(0)" class="ball_number ethdx_btn1"><b>5</b></a></li>
						<li style="width:16.6%;padding:5px 5px;" class="ball_item"><a ball-number="6" ball-type="k3ethdx" playid="k3ethdx" href="javascript:void(0)" class="ball_number ethdx_btn1"><b>6</b></a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</script>
<script type="text/html" id="k3ebthbz_wf">
	<!--2不同号-->
	<div id="k3ebthbz" class="ball_section section_cqssc">
		<p class="remark" style="color:#999">
			从1～6中任选2个或多个号码，所选号码与开奖号码任意2个号码相同，即为中奖。奖金<?php echo ($peilv["k3ebthbz"]); ?>倍
		</p>
		<div class="li_ball">
			<div class="ui-row-flex">
				<div class="ui-col ui-col-4 line-box gn_main_list">
					<ul class="ball_list_ul">
						<li style="width:33.3%" class=" ball_item"><a ball-number="1" ball-type="k3ebthbz" playid="k3ebthbz" href="javascript:void(0)" class="ball_number"><b>1</b></a></li>
						<li style="width:33.3%" class=" ball_item"><a ball-number="2" ball-type="k3ebthbz" playid="k3ebthbz" href="javascript:void(0)" class="ball_number"><b>2</b></a></li>
						<li style="width:33.3%" class=" ball_item"><a ball-number="3" ball-type="k3ebthbz" playid="k3ebthbz" href="javascript:void(0)" class="ball_number"><b>3</b></a></li>
						<li style="width:33.3%" class=" ball_item"><a ball-number="4" ball-type="k3ebthbz" playid="k3ebthbz" href="javascript:void(0)" class="ball_number"><b>4</b></a></li>
						<li style="width:33.3%" class=" ball_item"><a ball-number="5" ball-type="k3ebthbz" playid="k3ebthbz" href="javascript:void(0)" class="ball_number"><b>5</b></a></li>
						<li style="width:33.3%" class=" ball_item"><a ball-number="6" ball-type="k3ebthbz" playid="k3ebthbz" href="javascript:void(0)" class="ball_number"><b>6</b></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</script>

<div class="popup" id="userbetshistory">
		<div class="list-block media-list" style="padding-top: 0; margin-top: 0">
			<div class="card-header "><botton id="formaubmitdo" class="button button-fill button-danger close-popup" style="width:100%;">关闭</botton></div>
			<ul id="userbetshistorylist"></ul>
			<div class="member-pag paging"></div>
		</div>
</div>
<script>

</script>
</body>
<!-- <script type="text/javascript" src="/resources/js/chat/mobilechat.js"></script> -->
</html>