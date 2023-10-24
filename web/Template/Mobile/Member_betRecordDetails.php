<include file="Public/header"/>
<link rel="stylesheet" href="__CSS__/userHome.css">
<style>

</style>
<body class="bg_fff">
<header data-am-widget="header" class="am-header am-header-default header nav_bg am-header-fixed" style="font-size: 0px;">
    <div class="am-header-left am-header-nav">
        <a href="javascript:history.back(-1);" class="">
            <i class="iconfont icon-arrow-left"></i>
        </a>
    </div>
    <!--		<div class="winners_tab am-header-title">
                <em class="active" data-title="0">投注记录</em><em data-title="1">追号记录</em>
            </div>-->
    <h1 class="am-header-title userHome_h1" style="font-size: 14px !important;">投注详情</h1>
<style type="text/css">
	th{
		max-width: 60vw;
		font-size: 12px;
		padding: 5px;
		display: inline-block;
		vertical-align: top;
	}
	tr{
		margin-bottom: 10px;
		display: block;
		text-align: left;
	}
	table{
		text-align: center;
		display: inline-block;
	}
	table tr>th:last-child{
		color: #999 !important;
	}
</style>
</header>
<div data-am-widget="tabs" class=" am-tabs-d2 billrecord_main">
	<div style="width: 100vw;
    height: 30vw;
    overflow: hidden;">
	<div style="width: 180vw;height: 100vw;left: -40vw;background-color: #ec0022;top: -50%;position: relative;top: -90vw;border-radius: 50%;">
		<img src="<?php echo $my_touzhud['img'] ?>" style='width: 16vw;
    height: 16vw;
    box-shadow: 0px 0px 5px #EBEEF5;
    position: absolute;
    bottom: -18vw;
    border-radius: 50%;
    left: 82vw;
    z-index: 19999;'>
	</div>
	</div>
	<div style="width: 100vw;
    overflow: hidden;">
		<p style="text-align: center;"><?php echo $my_touzhud['cptitle'] ?></p>
		<p style="text-align: center;color: #999;font-size: 12px;">第 <?php echo $my_touzhud['expect'] ?> 期</p>
		<div style="margin-top: 15px; text-align: center;">
		<table style="margin: auto 0;">
			<tr>
				<th>投注状态</th>
				<th id="isdraw"><?php echo $my_touzhud['isdraw'] == '0' ? '未开奖' : ($my_touzhud['isdraw'] == '1' ? '已中奖' : ($my_touzhud['isdraw'] == '-1' ? '未中奖' : '未知')) ?></th>
			</tr>
			<tr>
				<th>中奖金额</th>
				<th><?php echo $my_touzhud['okamount'] ?></th>
			</tr>
			<tr>
				<th>投注号码</th>
				<th><?php echo $my_touzhud['tzcode'] ?></th>
			</tr>
			<tr>
				<th>开奖号码</th>
				<th><?php echo $my_touzhud['opencode'] ?></th>
			</tr>
			<tr>
				<th>投注时间</th>
				<th><?php echo $my_touzhud['oddtime'] ?></th>
			</tr>
			<tr>
				<th>游戏玩法</th>
				<th><?php echo $my_touzhud['playtitle'] ?></th>
			</tr>
			<tr>
				<th>投注金额</th>
				<th><?php echo $my_touzhud['amount'] ?></th>
			</tr>

		</table>
		</div>
		<a href="/Game.{$my_touzhud['typeid']}?code={$my_touzhud['cpname']}" style="width: 90%;
    height: 45px;
    line-height: 45px;
    margin: 60px auto;
    text-align: center;
    /* display: inline-block; */
    display: block;
    border-radius: 3px;
    color: white;
    background-color: #ec0022;">进入游戏</a>
	</div>
	<img id="isdrawimg" src="/app/yzj.png" style="width: 70px;height: 70px; position: absolute;bottom: 150px;right: 20px;display: none;">
  <span style="display: none;" id="my_t"><?php echo json_encode($my_touzhud) ?></span>
</div>
<script>

 var isdraw = document.getElementById('isdraw').innerHTML;
 if(isdraw === "已中奖"){
 	document.getElementById('isdrawimg').style.display = "block";
 }
</script>
</body>
</html>