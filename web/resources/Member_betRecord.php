<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<title>{:GetVar('webtitle')}</title>
	<meta name="keywords" content="{:GetVar('keywords')}" />
	<meta name="description" content="{:GetVar('description')}" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" >

	<link rel="stylesheet" href="__CSS2__/bootstrap.min.css">
	<link rel="stylesheet" href="__CSS2__/reset.css">
	<link rel="stylesheet" href="__CSS2__/icon.css">
	<link rel="stylesheet" href="__CSS2__/header.css">
	<link rel="stylesheet" href="__CSS2__/record.css">
	<link rel="stylesheet" href="__CSS2__/userInfo.css">
	<link rel="stylesheet" href="__CSS2__/footer.css">
	<link rel="stylesheet" href="__JS2__/layer/skin/default/layer.css">
	<script type="text/javascript" src="__JS__/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="__JS__/artDialog.js"></script>

	<script>
		var ISLOGIN = "{$userinfo.id}";
	</script>
	<script src="__JS__/index.js"></script>
</head>
<body>
<include file="Public/header" />
	<script src="__JS2__/require.js" data-main="__JS2__/homePage"></script>
	<div class="vip_info clearfix container">
		<include file="Member/side" />
		<div class="pull-right vip_info_pan">
			<div class="vip_info_title">
			</div>
			<div class="vip_info_content betRecord_main">
				<div class="betRecord_top">
					<strong>今日概况</strong>
					<span>投注金额：<em>{$touzhujine}元</em></span>
					<span>中奖金额：<em>{$allokamount}元</em></span>
					<span>盈利：<em>{$allokamount-$touzhujine}元</em></span>
				</div>
				<div class="betRecord_tab clearfix">
					<div class="category pull-left">
						<em class="tle">彩种：</em>
						<div class="form-group">
							<select name="lotteryId" id="lottery_code" onchange="chaxun();" class="form-control" id="">
								<option value="0">全部彩票</option> {$cp[name]} 
								<volist name="ALLCP" id="cp">
								 <option value="{$cp[name]}"  <eq name="cp[name]" value="$Think.get.name">selected="selected"</eq> >{$cp[title]}</option>
								</volist>
							</select>
						</div>
					</div>
					<div class="bet_time pull-left" id="time-box">
						<em class="tle">时间：</em>
						<span class="bet_common_bor <if condition="$Think.get.atime eq 1">active</if>" value="1"  onclick="chaxun('1',null);">今天</span>
						<span class="bet_common_bor <if condition="$Think.get.atime eq 2">active</if>" value="2" onclick="chaxun('2',null);">昨天</span>
						<span class="bet_common_bor <if condition="$Think.get.atime eq 3">active</if>" value="3" onclick="chaxun('3',null);">七天</span>
					</div>
					<span class="bet_status pull-left" id="status-box">
						<em class="tle">状态：</em>
						<span class="bet_common_bor a_item  <if condition="$Think.get.a_item eq 1">active</if>" value="1""  onclick="chaxun(null,'1');">全部</span>
						<span class="bet_common_bor a_item  <if condition="$Think.get.a_item eq 2">active</if>" value="2""  onclick="chaxun(null,'2');">已中奖</span>
						<span class="bet_common_bor a_item  <if condition="$Think.get.a_item eq 3">active</if>" value="3""  onclick="chaxun(null,'3');">未中奖</span>
						<span class="bet_common_bor a_item  <if condition="$Think.get.a_item eq 4">active</if>" value="4""  onclick="chaxun(null,'4');">等待开奖</span>
					</div>


									<div class="bet_info  col-sm-12">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>彩种</th>
								<th>期号</th>
								<th>投注内容</th>
								<th>投注金额</th>
								<th>开奖号码</th>
								<th>奖金</th>
								<th>状态</th>
								<th>投注时间</th>
								<!--<th>操作项</th>-->
							</tr>
						</thead>
						<tbody>
						<volist name="tzlist" id="vo">
							<tr>
								<td>{$vo.cptitle}</td>
								<td>{$vo.expect}</td>
								<td class="ytzcode">
                                    <span class="ytzcodes">
                                        {$vo.playtitle}--
                                        <if condition="$vo[playid] eq 'lhwq' or $vo[playid] eq 'lhws' or $vo[playid] eq 'lhwg' or $vo[playid] eq 'lhqb' or $vo[playid] eq 'lhqs' or $vo[playid] eq 'lhqg' or $vo[playid] eq 'lhbs' or $vo[playid] eq 'lhbg' or $vo[playid] eq 'lhsg'">
                                            {$vo.tzcode|str_replace=['0','1','2'],['龙','虎','和'],###}
                                            <elseif condition="$vo[playid] eq 'dxdsqe' or $vo[playid] eq 'dxdshe' or $vo[playid] eq 'dxdsqs' or $vo[playid] eq 'dxdshs'" />
                                            {$vo.tzcode|str_replace=['0','1','2','3'],['大','小','单','双'],###}
                                            <else/>
                                            {$vo.tzcode}
                                        </if>
                                    </span>
                                </td>
								<td>{$vo.amount}</td>
								<td>{$vo.opencode}</td>
								<td>{$vo.okamount}</td>
								<td>
									<if condition="$vo[isdraw] eq 0">
										未开奖
										<elseif  condition="$vo[isdraw] eq 1" />
										<span style="color:red">已中奖</span>
										<elseif  condition="$vo[isdraw] eq -1" />
										<span style="color:green">未中奖</span>
										<elseif  condition="$vo[isdraw] eq -2" />
										<span style="color:grey">已撤单</span>
									</if>
								</td>
								<td>{$vo.oddtime|date="m-d H:i:s",###}</td>
								<td>
									<if condition="$vo[isdraw] eq 0"><a href="javascript:void" class="chedan_btn" style="color:red"  onclick="Order_chedan('{$vo[id]}','{$vo[trano]}',this)">撤单</a> <elseif condition="$vo[isdraw] eq -2" />已撤消 <else />已关闭</if>
								</td>
							</tr>
						</volist>
						</tbody>
					</table>
				</div>
				<!-- 如果没有查到就显示这个 -->
				<div class="no_result" style="display:none;">
					暂无记录
				</div>
<!--				<ul class="pagination bet_paging">
					<li><a href="">上一页</a></li>
					<li class="active"><a href="">1</a></li>
					<li><a href="">2</a></li>
					<li><a href="">3</a></li>
					<li><a href="">4</a></li>
					<li><a href="">下一页</a></li>
					<li><a href="">共 <em class="color_res">0</em> 页</a></li>
				</ul>-->
				<div class="page" id="page">{$pageshow}</div>
				<div class="prompt">
					<i class="iconfont">&#xe659;</i>
					温馨提示：投注记录最多只保留7天。
				</div>
				</div>


			</div>
		</div>
	</div>
<include file="Public/footer" />

<div class="modal fade ytz_model" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">投注内容</h4>
            </div>
            <div class="modal-body" style="word-wrap:break-word ;">
                ----
            </div>
        </div>
    </div>
</div>

<script>
	function chaxun(t,s){
		var name=$("#lottery_code").val();
		/*var qihao=$("#qihao_code").val();*/
		if(t){
			var atime = t;
		}else{
			var atime = $('#time-box span.active').attr('value');
		}
		if(s){
			var a_item = s;
		}else{
			var a_item = $('#status-box span.active').attr('value');
		}
		var url = '__ROOT__'+"/Member.betRecord.name."+name+".atime."+atime+".a_item."+a_item;
		window.location.href = url;
	}
/*	function chexun() {
		alert();
	}*/
</script>

</body>
</html>