<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($webheadertitle); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=none">

<link rel="shortcut icon" href="/favicon.ico">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="renderer" content="webkit" />
<link rel="stylesheet" href="/Template/Mobile/css/amazeui.min.css">
<link rel="stylesheet" href="/Template/Mobile/css/common2.css"> 
<link rel="stylesheet" href="/Template/Mobile/css/index.css">
<link rel="stylesheet" type="text/css" href="/resources/css/reset.css" />
<link rel="stylesheet" type="text/css" href="/resources/css/layout.css" />
<link rel="stylesheet" type="text/css" href="/resources/css/artDialog.css" />
<link rel="stylesheet" type="text/css" href="/resources/css/font-awesome.min.css" />

<link rel="stylesheet" href="/Template/Mobile/css/icons.css">
<!--<link rel="stylesheet" type="text/css" href="/resources/css/k3.css" />-->
<!--<link rel="stylesheet" href="/Template/Mobile/css/bootstrap.min.css">
<link rel="stylesheet" href="/Template/Mobile/css/resets.css">
<link rel="stylesheet" href="/Template/Mobile/css/icons.css">
<link rel="stylesheet" href="/Template/Mobile/css/style.css">
<link rel="stylesheet" href="/Template/Mobile/css/main.css">
<link rel="stylesheet" href="/Template/Mobile/css/common.css">-->
<link rel="stylesheet" href="/Template/Mobile/css/ssc.css">
<script>
var WebConfigs = {
	webtitle:"<?php echo ($webconfigs["webtitle"]); ?>",
	kefuthree:"<?php echo ($webconfigs["kefuthree"]); ?>",
	kefuqq:"<?php echo ($webconfigs["kefuqq"]); ?>",
	ROOT : ""
};
</script>

<script>
	var lotteryinfo = <?php echo json_encode($nowcpinfo,JSON_UNESCAPED_UNICODE);?>;
</script>
<script>
<?php echo "var k3lotteryrates = ".json_encode($rates,JSON_UNESCAPED_UNICODE);?>
</script>
<script type="text/javascript" src="/resources/js/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="/resources/css/chat/appchat-chat-index.css" />
    <link rel="stylesheet" type="text/css" href="/resources/css/chat/index1.css" />
    <link rel="stylesheet" type="text/css" href="/resources/css/chat/index.css" />
    <!--workmand的js-->
    <script type="text/javascript" src="/resources/js/chat/swfobject.js"></script>
    <script type="text/javascript" src="/resources/js/chat/web_socket.js"></script>
    <script type="text/javascript" src="/resources/js/chat/jquery-sinaEmotion-2.1.0.js"></script>
<script type="text/javascript" src="/resources/js/artDialog.js"></script>
<!--[if lt IE 9]>
<script src="/resources/js/html5shiv.js"></script>
<![endif]-->

</head>

<body>
 
<style>	
.yGame_list{
	width: 96px;
	background: #fff;
	position: absolute;
	right: 0;
	top: 50px;
	box-shadow: 0 2px 10px rgba(41,41,41,.08);
	display: none;
}
.yGame_list li{
	text-align: center;
	height: 45px;
	line-height: 45px;
	padding: 0;
}
.yGame_list li:first-child:before{
	position: absolute;
	content: "";
	display: block;
	width: 0;
	height: 0;
	border-bottom: 1em solid hsla(0,0%,100%,.96);
	border-left: 1em solid transparent;
	right: 0;
	top: -.96em;
}
#showGameList .icon-sanjiaoxing{
	display: inline-block;
	transform: rotate(180deg);
	transition: .6s;
	font-size: 22px;
}
.start_video{
        opacity: 1;
         position: fixed;
    right: 10px;
    border-radius: 50%;
    bottom: 230px;
    width: 30px;
    height: 30px;
    text-align: center;
    background-color: rgba(255,255,255,0.2);
    color: rgba(236, 42, 42, 0.4);
    box-shadow: 0 0 5px rgba(255,0,0,0.4);
    z-index: 100;
    line-height: 30px;
    cursor: pointer;
    font-size: 12px;
    display: none;
    }
    #video_box,#chat_box{
        overflow: hidden;
        position: fixed;
    left: -100vw;
    top: 0px;
    z-index: 5000;
    }
    #video_box #child{
          width: 100vw;
    height: 70vw;
    margin: 0 auto;
    display: block;
    position: relative;
    border-radius: 5px;
    }
    .close_video_button{
        width: 60px;
    text-align: center;
    margin: 20px auto;
    border-radius: 3px;
    display: block;
    color: white;
    font-size: 14px;
    cursor: pointer;
    }
    .parent_chile{
      width: 100vw;
    height: 70vw;
    margin: 0 auto;
    top: 50%;
    margin-top: -166px;
    position: relative;
    }
    .mychat_start{
    border-radius: 3px;
    bottom: 168px;
    height: 50px;
    padding-top: 3px;
    line-height: 14px;
    }
    .mychat{
        display: block;
    }
</style>
<script type="text/javascript" src="/resources/js/way.min.js"></script>
<script type="text/javascript" src="/resources/js/jquery.history.js"></script>
<script type="text/javascript" src="/resources/main/common.js"></script>
<script type="text/javascript" src="/resources/main/index.js"></script>
<script type="text/javascript" src="/resources/js/member.page.js"></script>
<script type="text/javascript" src="/Template/Mobile/js/tabGameData.js"></script>
<script type="text/javascript" src="/Template/Mobile/js/syxw.js"></script>
<script type="text/javascript" src="/Template/Mobile/js/syxwtabGame.js"></script>
<!--<script src="/Template/Mobile/js2/require.js" data-main="/Template/Mobile/js2/homePage"></script>-->
<script src="/Template/Mobile/js/require.js" data-main="/Template/Mobile/js/main"></script>
<section class="" id="gamepage">
    <span onclick="strat_chat()" class="start_video mychat_start">
        聊<br>天<br>室
        <span id="username" style="display: none;"><?php echo ($username); ?></span>
         <span id="myhead" style="display: none;"><?php echo ($face); ?></span>
         <span id="is_chat" style="display: none;"><?php echo ($is_chat); ?></span>
    <span id="is_video" style="display: none;"><?php echo ($is_video); ?></span>
     <span id="chat_filter" style="display: none;"><?php echo ($chat_filter); ?></span>
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
                        <a href="javascript:void(0)" title="发送表情" class="btn-control"><<img style="width: 26px;" src="/resources/images/chat/biaoqing.png" /></a><label for="imgUploadInput" style="display: none;"><span title="上传图片" class="btn-control"><i class="iconfont icon-erjiyemian-liaotianduihua-danchuangtianjiatupian"></i> <input id="imgUploadInput" type="file" accept=".jpg, .png, .gif, .jpeg, image/jpeg, image/png, image/gif" style="width: 0.1px; height: 0.1px; opacity: 0; position: absolute; top: -20px;"></span></label>
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
  <div class="mobileGameTop">
    <header data-am-widget="header"class="am-header am-header-default header nav_bg am-header-fixed" style="background:#000;">
      <div class="am-header-left am-header-nav">
          <a href="/" class="">
              <i class="iconfont icon-shouyeshouye1"></i>
          </a>
      </div>
      <h1 class="am-header-title userHome_h1" style="margin: 0 auto; width: 100%;">
      	<span style="height: 50px;margin-left: -42px; line-height: 50px;display: inline-block;vertical-align: top;">
                <sapn style="height: 50px;line-height: 50px;display: inline-block;color:white;font-size: 12px;vertical-align: top;">余额:</sapn>
                <span id="money_text" style="height: 50px;margin-right: 5px; line-height: 50px;display: inline-block; font-size: 12px;color: red;vertical-align: top;"></span>
                </span>
          <em class="gameInfo">玩<br>法</em>
          <span class="gameType">
            <string>三码前三直选复式</string>
            <i class="iconfont icon-sanjiaoxing"></i>
          </span>
      </h1>
      <div class="am-header-right am-header-nav">
			<a href="javascript:void(0);" id="showGameList" style="text-decoration:none;">
				<em class="bill_day"><?php echo ($cptitle); ?></em>
				<i class="iconfont icon-sanjiaoxing"></i>
			</a>
		</div>
		<ul class="yGame_list">
				<?php if(is_array($ssclist)): $i = 0; $__LIST__ = $ssclist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php if($vo['name'] == $lotteryname): ?>curr<?php endif; ?> am-modal-actions-header" lotteryname="<?php echo ($vo["name"]); ?>">
						<a href="/Game.x5?code=<?php echo ($vo["name"]); ?>" style="padding: 0;"><?php echo ($vo["title"]); ?></a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
  </header>
    <div class="play_select_insert" id="j_play_select">
			<ul class="play_select_tit" style="overflow:hidden;">
				<li lottery_code="sm" class="curr">三码</li>	
				<li lottery_code="em">二码</li>
				<li lottery_code="bdw">不定位</li>
				<li lottery_code="dwd">定位胆</li>
				<li lottery_code="qw">趣味型</li>
				<li lottery_code="rxfs">任选复式</li>
				<li lottery_code="rxds">任选单式</li>
				<li lottery_code="rxtd">任选胆拖</li>
			</ul>
			<!--玩法二级选项开始-->
				<div class="bet_filter_box" style="">
				
				</div>
				<!--玩法二级选项结束-->
		</div>
  </div>
	<div class="open_containers g_Time_Section">
        <!--彩种开奖倒计时-->
        <div class="cz_daojishi">
            <div class="open_issue">
				<span class="c_red" id="f_lottery_info_number" way-data="showExpect.currFullExpect">---</span>期投注截止
			</div>
            <div class="j_lottery_time" servertime="">
				<div class="shij">
                	<span way-data="gametimes.h">00</span>
                    :
                	<span way-data="gametimes.m">00</span>
                    :
                	<span way-data="gametimes.s">00</span>
                </div>
			</div>
        </div>
        <!--彩种开奖倒计时-->

        <!--彩种开奖号码-->
        <div class="cz_openNumb">

            <div class="open_issue" id="showTabel"><span class="c_red" way-data="showExpect.lastFullExpect" id="f_lottery_info_lastnumber" firstissueno="">---</span>期开奖号码</div>
            <div class="open_number">
                <input type="hidden" value="1,1,2" id="j_openNum"><!--开奖号码效果赋值-->
                <ol id="ssc_winning_sum">
					        <li class="ssc_winning_sum_gif" way-data="showExpect.openCode1"></li>
                    <li class="ssc_winning_sum_gif" way-data="showExpect.openCode2"></li>
                    <li class="ssc_winning_sum_gif" way-data="showExpect.openCode3"></li>
                    <li class="ssc_winning_sum_gif" way-data="showExpect.openCode4"></li>
                    <li class="ssc_winning_sum_gif" way-data="showExpect.openCode5"></li>
				        </ol>
            </div>
            <div class="block_container lishi">
            	<div style="height: 50vh;background-color: white;">
                <div style="height: 49vh;padding-bottom: 10px; overflow: scroll;background-color: white;">
              <table id="fn_getoPenGame" border="0px" cellpadding="0" cellspacing="0">
                  <colgroup>
                      <col width="93px" />
                      <col width="50px" />
                      <col width="40px" />
                      <col width="59px" />
                  </colgroup>
                  <thead>
                  <tr>
                      <th>期数</th>
                      <th>奖号</th>
                      <th>开奖时间</th>
                  </tr>
                  </thead>
                  <tbody class="tbody text-c">
                  <!--开奖期号-->
                  <!--开奖号码-->
                  <!--和值-->
                  <!--大小-->
                  <!--单双-->
                  </tbody>
              </table>
              </div>
                <span class="cz_daojishi my_close_lishi" id="showTabel">关闭</span>
                </div>
          </div>
        </div>
          <i class="iconfont icon-jiantouxia my_jiantouxia cz_daojishi" id="showTabel"></i>
        <!--彩种开奖号码-->
    </div>
    
	<div class="lottery_playContainer">

		
	
  
    <section id="gameBet" class="cl">
		<section class="gameBet_balls">
			<div class="gameBet_left l">
			<?php if($nowcpinfo['iswh'] == 0): ?><!--玩法详细说明区域-->
				<div class="play_select_prompt">
					<i class="iconfont c_org"></i>
					<span way-data="tabDoc"></span>
				</div>
				<div class="g_Number_Section" >
				</div>
				<div class="selectMultiple">
          <div class="selectMultipleT" id="selectMultipleTId">
                                  <div class="my_beishu">
                                                  <span class="select_zhushu" style="color: #333;">
              共
              <em class="zhushu" style="color: #333;">0</em>
              注,
            </span>
                                <span class="selectMultipleOld" style="color: #333;">
              共
              <em class="selectMultipleOldMoney" style="color: #333;">
                0.00
              </em>
              元
            </span>
                            </div>
                                <div class="selectMultipleNumber">
                                    <i class="reduce">-</i>
                                    <input type="tel" value="1" class="selectMultipInput"
                                           onKeypress="return (/[\d]/.test(String.fromCharCode(event.keyCode)))">
                                    <i class="add">+</i>
                                </div>
                                倍
                                <select class="selectMultipleCon">
                                    <option value="1">元</option>
                                    <option value="0.1">角</option>
                                    <option value="0.01">分</option>
                                </select>
                                 <button class="betting_right_btn2">确定</button>
                            </div>
          <div class="selectMultipleB addtobetbtn">
						<span class="lanIconNumber" id="lanIconNumberss">
							1
						</span>
						<div class="addIcon" id="addIconId">
							+
						</div>
            <span class="select_zhushu">
              共
              <em class="zhushu">0</em>
              注,
            </span>
            <span class="selectMultipleOld">
              共
              <em class="selectMultipleOldMoney">
                0.00
              </em>
              元
            </span>
						<div class="selectMultipleB_n" id="selectMultipleB_nId">
							
						</div>
          </div>
					<div class="selectMultipleLz" id="selectMultipleLz_show">
						<span class="lanIconNumber" id="lanIconNumbere">
							0
						</span>
						<i class="iconfont icon-lanzi"></i>
						<a href="javascript:void(0);" class="selectMultipleLz_a">号码篮</a>
					</div>
						
				</div>
				<!--玩法详细说明区域-->
				<div class="numberLan" style="display: none;">
					<header data-am-widget="header" class="am-header am-header-default header nav_bg am-header-fixed am-no-layout">
						<div class="am-header-left am-header-nav">
								<a href="javascript:void(0);" class="" style="text-decoration:none;">
										<i class="iconfont icon-arrow-left"></i>
								</a>
						</div>
						<h1 class="am-header-title userHome_h1" style="margin: 0 auto; width: 100%;font-size: 20px;">
								号码篮
						</h1>
					</header>
					<div class="randomBox">
						<div class="random">
							<a class="randomBtn random1">+ 机选1注</a>
							<a class="randomBtn random5">+ 机选5注</a>
							<a class="randomBtn closeNumberlan">+ 继续选号</a>
						</div>
					</div>
						<div class="xiad-left">
							<dl class="yBettingLists">
								
							</dl>
							<div class="mo_empty" id="orderlist_clear">
								清空单号
							</div>
						</div>     
						<!--<div class="g_Chase_Section">
							<div class="chase_Program">
								<p class="p_chase">方案注数
									<i class="c_green fw_600" way-data="ytotal_money_zhushu" id="f_gameOrder_lotterys_num">0</i> 注， 
									金额 <i class="c_org fw_600">¥<em id="f_gameOrder_amount" way-data="ytotal_money">0</em></i> 元  
								</p>
							</div>
						</div>   
						<div class="xiad-righ">
							<ul>
								<li class="li22"><span id="f_submit_order" style="cursor: pointer;">
									<img src="/resources/images/icon/icon_06.png">&nbsp;&nbsp;确认投注</span>
								</li>
								<li class="li22 li23"><span id="orderlist_clear" style="cursor: pointer;">
									<img src="/resources/images/icon/icon_19.png">&nbsp;&nbsp;清空单号</span>
								</li>
							</ul>
						</div>-->


				<div class="selectMultiple">
          <div class="selectMultipleB" style="padding-left: 10px;">
            <span class="selectMultipleOld">
              <div class="g_Chase_Section">
								<div class="chase_Program">
									<p class="p_chase">方案
										<i class="c_green fw_600" way-data="ytotal_money_zhushu" id="f_gameOrder_lotterys_num">0</i>注， 
										<em id="f_gameOrder_amount" way-data="ytotal_money">0</em></i> 元  
									</p>
								</div>
						</div>
            </span>
						<div style="font-size: 14px;color: #a9a9a9;">
							普通投注
						</div>
          </div>
					<div class="selectMultipleLz" style="background:#dc3b40">
						<span id="f_submit_order"  style="font-size: 18px;color: #fff;">
							立即投注
						</span>
					</div>
						
				</div>
				</div>
			<?php else: ?>
			<img src="/resources/images/k3cpcz.png" /><?php endif; ?>
			</div>
		
		</section>
    </section>
</section>
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
<div id="getBillInfobox" style="display:none">
<div class="submitComfire">
<ul class="ui-form">
<li style="width:50%; float:left"><label for="question1" class="ui-label">彩种：</label><span class="mark" way-data="BillInfo.cptitle">--</span></li>
<li style="width:50%; float:left"><label for="question1" class="ui-label">期号：</label><span class="mark">第 <span way-data="BillInfo.expect" class="mark">--</span> 期</span></li>	
<li style="width:50%; float:left"><label for="question1" class="ui-label">玩法：</label><span class="mark" way-data="BillInfo.playtitle">--</span></li>
<li style="width:50%; float:left"><label for="question1" class="ui-label">赔率：</label><span way-data="BillInfo.mode" class="mark">--</span></li>	
<li><label for="answer1" class="ui-label">投注号码：</label><span class="mark" way-data="BillInfo.tzcode">--</span></li>	
<li style="width:50%; float:left"><label for="question2" class="ui-label">单注金额：</label><span class="mark" way-data="BillInfo.amount">--</span></li><li style="width:50%; float:left"><label for="question2" class="ui-label">投注注数：</label><span class="mark" way-data="BillInfo.itemcount">--</span></li>
<li style="width:50%; float:left"><label for="question2" class="ui-label">中奖金额：</label><span class="mark" way-data="BillInfo.okamount">--</span></li><li style="width:50%; float:left"><label for="question2" class="ui-label">中奖注数：</label><span class="mark" way-data="BillInfo.okcount">--</span></li>


<li style="width:50%; float:left"><label for="question2" class="ui-label">开奖号码：</label><span class="mark" way-data="BillInfo.opencode">--</span></li><li style="width:50%; float:left"><label for="question2" class="ui-label">中奖状态：</label><span id="BillInfo_isdraw" way-data="BillInfo.state">--</span></li>
</ul>
</div>
</div>
<div id="submitComfirebox" style="display:none">
    <div class="submitComfire">
		<ul class="ui-form">
			<li>
				<label for="question1" class="ui-label">彩种：</label>
				<span class="ui-text-info" way-data="showExpect.shortname">--</span>
			</li>
			<li>
				<label for="question1" class="ui-label">期号：</label>
				<span class="ui-text-info">第 <span way-data="showExpect.currFullExpect" class="mark">---</span> 期</span>
			</li>		
			<li>
				<label for="answer1" class="ui-label">详情：</label>
				<div id="Orderdetaillist" class="textarea" style="font-size:12px;"></div>		
			</li>		
			<li>
				<label for="question2" class="ui-label">付款总金额：</label>
				<span class="ui-text-info"><span id="Orderdetailtotalprice" class="mark">0.00</span>元</span>
			</li>		
			<li>
				<label for="question2" class="ui-label">付款帐号：</label>
				<span way-data="user.username" class="ui-text-info mark">---</span>
			</li>	
		</ul>	
		<p class="text-note">	</p>	<p class="text-note">	</p>
	</div>
</div>
<script>
     if($('#is_chat').html() == '1'){
                    $('.mychat_start').css('display','block');          
            }else{
                    $('.mychat_start').css('display','none');        
            }

	function openwindow(url,name,iWidth,iHeight) {
		var url; 
		var name; 
		var iWidth; 
		var iHeight; 
	 
		var iTop = (window.screen.height-30-iHeight)/2; 
		var iLeft = (window.screen.width-10-iWidth)/2; 
		window.open(url,name,'height='+iHeight+',,innerHeight='+iHeight+',width='+iWidth+',innerWidth='+iWidth+',top='+iTop+',left='+iLeft+',toolbar=no,menubar=no,scrollbars=auto,resizeable=no,location=no,status=no');
	}
 
	$('.helps').click(function () {
		openwindow("<?php echo U('Game/howtoplay', array('name'=>$nowcpinfo['name'],'cz'=>ACTION_NAME));?>",'',1058,870);
	})
  $(document).on('click','.gameType',function (){
    if($('.play_select_insert').is(':hidden')){
      $(this).find('.icon-sanjiaoxing').css('transform','rotate(360deg)');
      $('#j_play_select').show();
      $('.bet_filter_box').show();
			$('.ymask').show();
    }else{
			$(this).find('.icon-sanjiaoxing').css('transform','rotate(180deg)');
      $('#j_play_select').hide();
      $('.bet_filter_box').hide();
			$('.ymask').hide();
    }
  })

	$(document).on('click','.ymask',function (){
		$('#j_play_select').hide();
		$('.bet_filter_box').hide();
		$('.ymask').hide();
	})

  $(document).on('click','#showTabel',function (){
    
    if($('.lishi').is(':hidden')){
      $('.lishi').show();
    }else{
      $('.lishi').hide();
    }
  })

	
	$(document).on('click','#selectMultipleLz_show',function (){
		$(document).scrollTop(0);
		if($('.yBettingLists .yBettingList').length > 0){
			$('#orderlist_clear').show();
		}else{
			$('#orderlist_clear').hide();
		}
		$('.numberLan').show();
	})

	$(document).on('click','.numberLan .am-header-left , .closeNumberlan',function (){
		$('.numberLan').hide();
	})

	$(document).on('click','#showGameList',function () {
		if($('.yGame_list').is(':hidden')){
      $(this).find('.icon-sanjiaoxing').css('transform','rotate(360deg)');
			$('.yGame_list').show();
    }else{
			$(this).find('.icon-sanjiaoxing').css('transform','rotate(180deg)');
			$('.yGame_list').hide();
    }
	})
	
	var ytext = $('.bill_day').text().substring(0,2);
	$('.bill_day').text(ytext);
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

</script>
<style>
	.looding{
		width:100%;
		height:200%;
		z-index: 999;
		background: rgba(0,0,0,0.7);
		position: absolute;
		color:#333;
		top:0;
		left:0;
		text-align:center
	}
	.looding span{
		z-index: 9999;
		background: #ffffff;
		text-align:center;
		font-size:20px;
		color:#000;
		display: block;
		width:200px;
		height:50px;
		line-height: 50px;
		border-radius: 5px;
		position: fixed;
		top: 50%;
		left: 50%;
		margin-top: -25px;
		margin-left: -100PX;
	}
</style>
<div class="looding"  style="display:none;">
	<span>正在处理数椐... <img src="/Template/Mobile/images/addloading.gif" width="23" height="23" alt=""></span>

</div>
<div class="am-modal-actions  am-modal-active" id="my-actions" style="display:none;">
		<div class="am-modal-actions-group">
			<ul class="am-list">
				<?php if(is_array($ssclist)): $i = 0; $__LIST__ = $ssclist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php if($vo['name'] == $lotteryname): ?>curr<?php endif; ?> am-modal-actions-header" lotteryname="<?php echo ($vo["name"]); ?>">
						<a href="/Game.x5?code=<?php echo ($vo["name"]); ?>" style="padding: 0;"><?php echo ($vo["title"]); ?></a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
				<!--<li class="am-modal-actions-header">重庆时时彩</li>
				<li class="am-modal-actions-header">天津时时彩</li>
				<li class="am-modal-actions-header">大发时时彩</li>
				<li class="am-modal-actions-header">新疆时时彩</li>-->
			</ul>
		</div>
		<div class="am-modal-actions-group">
			<button class="am-btn am-btn-secondary am-btn-block btn_red" data-am-modal-close="">取消</button>
		</div>
	</div>
	<div class="ymask" style="width: 100%;height: 100%;position:fixed;top:0;left:0;background: rgba(0,0,0,0.3);display:none;"></div>
	
</body>
<script type="text/javascript" src="/resources/js/chat/mobilechat.js"></script>
</html>