<?php if (!defined('THINK_PATH')) exit();?><!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="../Template/admin/resources/ui/lib/html5.js"></script>
<script type="text/javascript" src="../Template/admin/resources/ui/lib/respond.min.js"></script>
<script type="text/javascript" src="../Template/admin/resources/ui/lib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="../Template/admin/resources/ui/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="../Template/admin/resources/ui/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="../Template/admin/resources/ui/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="../Template/admin/resources/ui/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="../Template/admin/resources/ui/static/h-ui.admin/skin/green/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="../Template/admin/resources/ui/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="../Template/admin/resources/ui/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->

<?php
$config = require '/app/Common/Conf/db.php'; $conn = mysqli_connect("localhost",$config['DB_USER'],$config['DB_PWD'],$config['DB_NAME']); if(!$conn){ die("connect database fali error = "+mysql_error()); }else{ mysqli_query($conn,'SET NAMES utf8'); } ?>
<title>游戏记录</title>
</head>
<body>
    <nav class="cl pt-10">
    <div class="l">
    <form method="get" action="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME);?>" class="text-c">
    <input type="hidden" name="refert" value="<?php echo ($refert); ?>">
&nbsp;&nbsp;内部：<span class="select-box" style="width:80px"><select class="select" name="isnb">
<option value="999">全部</option>
<option value="1" <?php if($isnb == 1): ?>selected<?php endif; ?>>是</option>
<option value="0" <?php if($isnb == 0): ?>selected<?php endif; ?>>否</option>
</select></span>
<?php $cplists = M('caipiao')->order('typeid asc,id desc')->select();?>
彩种：<span class="select-box" style="width:80px"><select class="select" name="cpname">
<option value="">全部</option>
<?php if(is_array($cplists)): foreach($cplists as $cpk=>$cpv): ?><option value="<?php echo ($cpv["name"]); ?>" <?php if($cpv['name'] == $cpname): ?>selected<?php endif; ?>><?php echo ($cpv["title"]); ?></option><?php endforeach; endif; ?>
</select></span>
期号：<input class="input-text" type="text" style="width:60px;" value="<?php echo ($qihao); ?>" name="qihao">
单号：<input class="input-text" type="text" style="width:60px;" value="<?php echo ($trano); ?>" name="trano">
        时间:<input class="input-text" type="text" style="width:80px;" onFocus="WdatePicker({dateFmt:'yyyyMMdd HH:mm'})" name="sDate" value="<?php echo ($_sDate); ?>"> - <input class="input-text" type="text" style="width:80px;" onFocus="WdatePicker({dateFmt:'yyyyMMdd HH:mm'})" value="<?php echo ($_eDate); ?>" name="eDate">&nbsp;&nbsp;
        
        用户名：<input class="input-text" type="text" style="width:60px;" value="<?php echo ($username); ?>" name="username">
状态：<span class="select-box" style="width:80px"><select class="select" name="status">
<option value="999">全部</option>
<option value="0" <?php if(isset($status) and ($status == 0)): ?>selected<?php endif; ?>>未开奖</option>
<option value="1" <?php if($status == 1): ?>selected<?php endif; ?>>中奖</option>
<option value="-1" <?php if($status == -1): ?>selected<?php endif; ?>>未中奖</option>
<option value="-2" <?php if($status == -2): ?>selected<?php endif; ?>>撤单</option>
</select></span>
排序：<span class="select-box" style="width:80px"><select class="select" name="listorder">
<option value="">默认</option>
<option value="1" <?php if($listorder == 1): ?>selected<?php endif; ?>>时间大到小</option>
<option value="2" <?php if($listorder == 2): ?>selected<?php endif; ?>>时间小到大</option>
<option value="3" <?php if($listorder == 3): ?>selected<?php endif; ?>>金额大到小</option>
<option value="4" <?php if($listorder == 4): ?>selected<?php endif; ?>>金额小到大</option>
</select></span>
        <input class="btn btn-default-outline radius" type="submit" value="查询">
        
    </form>
    </div>
  <div class="r">
    自动刷新：
    <span class="select-box" style="width:80px"><select class="select" id="refertime" name="refertime" onChange="javascipt:window.location.href=this.value">
<option value="<?php echo U('',array_merge($_GET,['refert'=>0]));?>">不刷新</option>
<option value="<?php echo U('',array_merge($_GET,['refert'=>5]));?>" <?php if($refert == 5): ?>selected<?php endif; ?>>5秒</option>
<option value="<?php echo U('',array_merge($_GET,['refert'=>10]));?>" <?php if($refert == 10): ?>selected<?php endif; ?>>10秒</option>
<option value="<?php echo U('',array_merge($_GET,['refert'=>20]));?>" <?php if($refert == 20): ?>selected<?php endif; ?>>20秒</option>
<option value="<?php echo U('',array_merge($_GET,['refert'=>30]));?>" <?php if($refert == 30): ?>selected<?php endif; ?>>30秒</option>
<option value="<?php echo U('',array_merge($_GET,['refert'=>40]));?>" <?php if($refert == 40): ?>selected<?php endif; ?>>40秒</option>
<option value="<?php echo U('',array_merge($_GET,['refert'=>50]));?>" <?php if($refert == 50): ?>selected<?php endif; ?>>50秒</option>
<option value="<?php echo U('',array_merge($_GET,['refert'=>60]));?>" <?php if($refert == 60): ?>selected<?php endif; ?>>60秒</option>
</select></span>
    </div>
    </nav>
<div class="page-container">
    <div class="mt-5">
<!--        <p>赔率计算方法:赔率x(金额/注数)x中奖注数x中奖倍数x元角分=中奖金额 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;奖金计算方法:奖金x中奖注数x中奖倍数x元角分=中奖金额</p>
-->
 <form method="post" action="">
    <table class="table table-border table-bordered table-hover table-bg table-sort">
        <thead>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="90">单号</th>
                <th width="60">用户名</th>
                <th width="80">彩票名称</th>
                <th width="60">期号</th>
                <th width="60">玩法</th>
                <!--<th width="40">模式</th>-->
                <th width="40">注数</th>
                <!--<th width="30">倍数</th>-->
                <th width="70">奖金/赔率</th>
                <th width="50">金额</th>
                <!--<th width="60">投注前金额</th>-->
                <th width="80">投注后金额</th>
                <th width="40">中奖金额</th>
                <th width="40">中奖注数</th>
                <th width="40">中奖倍数</th>
                <th width="50">元/角/分</th>
                <th width="40">号码</th>
                <th width="50">开奖号</th>
                <!--<th width="60">追号</th>-->
                <!--<th width="60">追中停</th>-->
                <!--<th width="60">来源</th>-->
                <th width="50">状态</th>
                <th width="80">投注时间</th>
                <th width="60">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c">
                <td><input type="checkbox" class="checkids" value="<?php echo ($vo["id"]); ?>" name="ids[<?php echo ($vo["id"]); ?>]"></td>
                <td><?php echo ($vo["trano"]); ?></td>
                <td><?php echo ($vo["username"]); ?></td>
                <td><?php echo ($vo["cptitle"]); ?></td>
                <td><?php echo ($vo["expect"]); ?></td>
                <td><?php echo ($vo["playtitle"]); ?></td>
                <!--<td><?php if($vo['yjf'] == '1'): ?>元<?php elseif($vo['yjf'] == '0.1'): ?>角<?php elseif($vo['yjf'] == '0.01'): ?>分<?php elseif($vo['yjf'] == '0.001'): ?>厘<?php endif; ?></td>-->
                <td><?php echo ($vo["itemcount"]); ?></td>
                <!--<td><?php echo ($vo["beishu"]); ?></td>-->
                <!--<td><?php echo ($vo["mode"]); ?>/<?php echo ($vo["repoint"]); ?>%</td>-->
                <td><?php echo ($vo["mode"]); ?></td>
                <td><?php echo ($vo["amount"]); ?></td>
                <!--<td><?php echo ($vo["amountbefor"]); ?></td>-->
                <td><?php echo ($vo["amountafter"]); ?></td>
                <td><?php echo ($vo["okamount"]); ?></td>
                <td><?php echo ($vo["okcount"]); ?></td>
                <td><?php echo ($vo["beishu"]); ?></td>
                <td><?php echo ($vo["yjf"]); ?></td>
                <td style="padding:0">
                <?php if(strlen($vo['tzcode']) <= 20): ?><p style="cursor:pointer;width:85px;height:25px; overflow:hidden;padding:0; margin:0;text-overflow: ellipsis;white-space: nowrap;" class="text-primary" trano="<?php echo ($vo["trano"]); ?>" tip-content="<?php echo ($vo["tzcode"]); ?>"><?php echo ($vo["tzcode"]); ?></p>
                    <?php else: ?>
                    <u style="cursor:pointer;" class="text-primary" trano="<?php echo ($vo["trano"]); ?>" tip-content="<?php echo ($vo["tzcode"]); ?>">查看</u><?php endif; ?>
                </td>
    
                <td><?php echo ($vo["opencode"]); ?></td>
                <!--<td><?php if($vo['Chase'] == '1'): ?>追<?php else: ?>否<?php endif; ?></td>-->
                <!--<td><?php if($vo['stopChase'] == '1'): ?>是<?php else: ?>否<?php endif; ?></td>-->
               <!-- <td><?php echo ($vo["source"]); ?></td>-->
                <td><?php if($vo['isdraw'] == '1'): ?><span class="c-green">中</span><?php elseif($vo['isdraw'] == '0'): ?><span class="c-333">未开奖</span><?php elseif($vo['isdraw'] == '-1'): ?><span class="c-red">未中</span><?php elseif($vo['isdraw'] == '-2'): ?><span class="c-666">撤</span><?php endif; ?></td>
                <td><?php echo (date("m-d H:i:s",$vo["oddtime"])); ?></td>
                <td><?php if($vo['isdraw'] == '0'): ?><u style="cursor:pointer;font-size: 12px !important;" class="text-primary" layer-chedan-url="<?php echo U('chedan',['id'=>$vo['id']]);?>">撤单</u><?php else: ?>---<?php endif; ?><span onclick="update_touzhu(<?php echo ($vo["id"]); ?>)" id="a<?php echo ($vo["id"]); ?>" myval="<?php echo ($vo["username"]); ?>" style="margin-left: 5px;font-size: 12px;cursor: pointer;">修改</span></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <div class="cl pd-5 bg-1 bk-gray mt-20 text-c">
        <div class="l" style="padding:0"><a href="javascript:;" deleteall-url="<?php echo U('deleteall');?>" title="删除" class="btn btn-danger-outline radius">删除</a></div>
        <div class="r">
            <div class="pageNav l" style="padding:0"><?php echo ($page); ?></div>
            <div class="r">共有数据：<strong><?php echo ($totalcount); ?></strong> 条 </div>
        </div>
    </div>
    </form>
    </div>
</div>
 <div id="update_touzhu_box" style="width: 100%;height: 100vh;z-index: 1000;position: fixed;top: 0px;left: 0px;display: none; background-color: rgba(0,0,0,0.3);">
        <div style="width: 950px;height: 300px;padding: 30px;margin: 100px auto;border-radius: 10px; box-shadow: 0 0 5px #cccccc;position: relative; background-color: white;">
            <p style="text-align: center;">修改下注信息</p>
            <table class="my_table">
                <tr>
                    <th style="width: 55px !important;">
                        倍数
                    </th>
                    <th>
                        玩法
                    </th>
                    <th>
                        总金额
                    </th>
                    <th>
                        投注金额 
                    </th>
                    <th>
                       中奖金额 
                    </th>
                    <th>
                       投注号码 
                    </th>
                     <th>
                       状态 
                    </th>
                </tr>
                <tr>
                    <th style="width: 55px !important;">
                        <input id="beishu" type="text" style="width: 50px !important;">
                        <p style="font-size: 12px;margin-top: 2px; color: #999;">倍数</p>
                    </th>
                    <th>
                       <input id="wanfa" type="text">
                       <p style="font-size: 12px;margin-top: 2px; color: #999;">格式一定不能乱填</p>
                    </th>
                     <th>
                       <input id="yue" type="text"> 
                       <p style="font-size: 12px;margin-top: 2px; color: #999;">玩家总余额</p>
                    </th>
                    <th>
                       <input id="jine" type="text"> 
                       <p style="font-size: 12px;margin-top: 2px; color: #999;">输入金额</p>
                    </th>
                    <th>
                       <input id="zhongjine" type="text"> 
                       <p style="font-size: 12px;margin-top: 2px; color: #999;">当前注所中奖的金额</p>
                    </th>
                    <th>
                       <input id="haoma" type="text">
                       <p style="font-size: 12px;margin-top: 2px; color: #999;">如果是大小，只能填大或者小</p>
                    </th>
                     <th>
                       <input id="zhaungtai" type="text">
                       <p style="font-size: 12px;margin-top: 2px; color: #999;">只能填写：未中、中、撤单</p>
                    </th>
                </tr>
            </table>
            <button onclick="r_update_touzhu()" id="confirm_button">确认修改</button>
            <span onclick="close_update_touzhu_box()" style="right: 10px;top: 10px; position: absolute;cursor: pointer; color: red;">关闭</span>
        </div>
    </div>
    <style type="text/css">
        #confirm_button{
            width: 150px;
    height: 40px;
    border-radius: 3px;
    font-size: 14px;
    display: block;
    color: white;
    box-shadow: 2px 5px 5px #ccc;
    border: 0px;
    margin: 30px auto;
    background-color: #19a97b;
        }
        .my_table {
                    width: 100%;
                    border-collapse: collapse;
                    border-spacing: 0;
                }
                
                .my_table th {
                    padding: 5px 2px;
                    font-size: 12px;
                    text-align: center;
                    border: 1px solid #cacaca;
                    color:#999999;
                }
                .my_table .on th {
                    color: #333333;
                }
                .my_table input{
                   width: 120px;
                   height: 30px;
                   margin-top: 10px;
                   border-radius: 2px;
                   text-align: center;
                   font-size: 12px;
                    border: 1px solid #cccccc;
                }
        }
    </style>
    <script type="text/javascript">
        var cur_id = null,cur_data = null,is_on_off = false;
        var username;
        function update_touzhu(id){
            username = $('#a'+id).attr("myval");
            cur_id = id;
            document.getElementById("update_touzhu_box").style.display = "block";
            document.getElementById("beishu").value = "";
                document.getElementById("wanfa").value = "";
                document.getElementById("jine").value = "";
                document.getElementById("haoma").value = "";
                document.getElementById("zhongjine").value = "";
                document.getElementById("zhaungtai").value = "";
                document.getElementById("yue").value = "";
            $.post("/get_touzhu.php",{type:"r",id:id,username:username},function(data){
                console.log('data = = '+data);
                var d = JSON.parse(data).data;
                cur_data = d;
                document.getElementById("yue").value = d.yue;
                document.getElementById("beishu").value = d.beishu;
                document.getElementById("wanfa").value = d.playtitle;
                document.getElementById("jine").value = d.amount;
                document.getElementById("haoma").value = d.tzcode;
                document.getElementById("zhongjine").value = d.okamount;
                document.getElementById("zhaungtai").value = d.isdraw == "-1"?"未中":d.isdraw == "1"?"中":d.isdraw == "0"?"未开":"撤单";
                is_on_off = true;
            })
        }

        function close_update_touzhu_box(){
            document.getElementById("update_touzhu_box").style.display = "none";
        }

        function r_update_touzhu(){
            if(!is_on_off){
                alert("未加载，请稍后再试");
                return;
            }
            var playid = null;
            var wanfa = htmlEncode(document.getElementById("wanfa").value);
            $.post("/get_wanfa.php",{playtitle:wanfa,typeid:cur_data.typeid},function(data){
                console.log('data = '+data);
                var d = JSON.parse(data);
                if(d.state == 200){
                    playid = d.playid;
             var amount = htmlEncode(document.getElementById("jine").value);
             var tzcode = htmlEncode(document.getElementById("haoma").value);
             var okamount = htmlEncode(document.getElementById("zhongjine").value);
             var isdraw = htmlEncode(document.getElementById("zhaungtai").value);
             var beishu = htmlEncode(document.getElementById("beishu").value);
             var yue = htmlEncode(document.getElementById("yue").value);

              isdraw = isdraw == "未中"?"-1":isdraw == "中" ? "1" : isdraw == "未开" ? "0" : "-2";
              console.log("is = "+isdraw);
             $.post("/get_touzhu.php",{type:"s",yue:yue,id:cur_id,amount:amount,tzcode:tzcode,okamount:okamount,isdraw:isdraw,playid:playid,playtitle:wanfa,beishu:beishu,username:username},function(data){
                console.log('data = '+data);
                var d = JSON.parse(data);
                if(d.state == 200){
                    alert("修改成功");
                    window.location.reload();
                }else{
                    alert("修改失败");
                }
            })


                }else{
                    alert("获取失败");
                }
            })

        }
        function htmlEncode(str) {
 
    return str
 
        .replace(/&/g, '&amp;')
     
        .replace(/"/g, '&quot;')
     
        .replace(/'/g, '&#39;')
     
        .replace(/</g, '&lt;')
     
        .replace(/>/g, '&gt;');
 
}
    </script>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="../Template/admin/resources/ui/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="../Template/admin/resources/ui/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="../Template/admin/resources/ui/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="../Template/admin/resources/ui/static/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript" src="../Template/admin/resources/ui/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="../Template/admin/resources/ui/lib/icheck/jquery.icheck.min.js"></script> 
<script type="text/javascript" src="../Template/admin/resources/ui/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script> 
<script type="text/javascript" src="../Template/admin/resources/ui/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="../Template/admin/resources/ui/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	$.Huitab("#tab-system .tabBar span","#tab-system .tabCon","current","click","6");
});

<!--AJAX POST表单提交-->
$("#AjaxPostForm,.AjaxPostForm").submit(function(){
	var $this    = $(this);
	var $confirm = $this.attr('confirm');
	var url      = $this.attr('action');
 
	var defaultsubvalue = $("#AjaxPostForm,.AjaxPostForm").find("[type='submit']").val();
 
	layer.confirm('您确定需要操作吗？', {
	  btn: ['确定','取消'] 
	}, function(index){
	  	layer.close(index);
		$("#AjaxPostForm,.AjaxPostForm").find("[type='submit']").val('正在提交...').attr("disabled","disabled");
		$.post(url,$this.serialize(), function(json){
			if(json.status==1){
				layer.msg(json.info,{icon:1,time:2000});
				$("#AjaxPostForm,.AjaxPostForm").find("[type='submit']").val(defaultsubvalue).removeAttr("disabled");
			 
				setTimeout("parentrefresh()", 2000);
			}else if(json.status==0){
				$("#AjaxPostForm,.AjaxPostForm").find("[type='submit']").val(defaultsubvalue).removeAttr("disabled");
				layer.msg(json.info,{icon:2,time:3000});
			}
			
		}, "json");
	}, function(index){
	  layer.close(index);
	});
	
	return false;
});
function parentrefresh(index){
	var index = parent.layer.getFrameIndex(window.name);
	if(window.name==''){
		window.location.reload();
	}else{
		parent.location.reload();
	}
	parent.layer.close(index);
 
 
}
$(document).on("click", "[layer-url]", function() {
	var title = $(this).attr('title')?$(this).attr('title'):'窗口信息',
		url   = $(this).attr('layer-url'),
		w     = $(this).attr('layer-width'),
		h     = $(this).attr('layer-height');
	if(w=='100%'){
		var layerindex = layer.open({
		  type: 2,
		  content: url,
		  area: ['320px', '195px'],
		  maxmin: true
		});
		layer.full(layerindex);
	}else{
		layer_show(title,url,w,h);
	}
});
$(document).on("click", "[status-url]", function() {
	var obj       = $(this);
	var url       = $(this).attr('status-url');
	var title     = obj.attr('title')?$(this).attr('title'):'您确认操作吗？';
	var issuccess = obj.hasClass('label-success');
	layer.confirm(title,function(index){
		$.getJSON(url, function(json){
			if(json.status==1){
				if(issuccess){
					obj.removeClass('label-success').addClass('label-defaunt').text('禁用');
				}else{
					obj.removeClass('label-defaunt').addClass('label-success').text('启用');
				}
				layer.msg('操作成功',{icon: 1,time:1000});
			}else{
				layer.msg(json.info,{icon: 2,time:2000});
			};
		});
	});
});
$(document).on("click", "[layer-del-url]", function() {
	var obj       = $(this);
	var url       = obj.attr('layer-del-url');
	var title     = '您确认删除吗？';
	var issuccess = obj.hasClass('label-success');
	layer.confirm(title,function(index){
		$.getJSON(url, function(json){
			if(json.status==1){
				obj.parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			}else{
				layer.msg(json.info,{icon: 2,time:2000});
			};
		});
	});
});
$(document).on("click", "[layer-alt-url]", function() {
	var obj       = $(this);
	var url       = obj.attr('layer-alt-url');
	var title     = '您确认操作吗？';
	var issuccess = obj.hasClass('label-success');
	layer.confirm(title,function(index){
		$.getJSON(url, function(json){
			if(json.status==1){
				 
				layer.msg('操作成功!',{icon:1,time:1000});
			}else{
				layer.msg(json.info,{icon: 2,time:2000});
			};
		});
	});
});

$(document).on("click", "[deleteall-url]", function() {
	if($("input.checkids:checked").length<1){
		layer.msg('请勾选操作的数据行',{icon:5,time:3000});
		return false;
	}
	var obj       = $(this),
		url       = obj.attr('deleteall-url'),
		form      = obj.parents('form');
	form.attr('action',url)
	layer.confirm('确定批量删除吗？',function(index){
		$.post(url,form.serialize(), function(json){
			if(json.status==1){
				layer.msg(json.info,{icon:1,time:2000});
				setTimeout("window.location.reload()", 2000);
			}else if(json.status==0){
				layer.msg(json.info,{icon:2,time:3000});
			}
			
		}, "json");
	});
});

$(document).on("click", "[listorder-url]", function() {
	if($("input.checkids:checked").length<1){
		layer.msg('请勾选操作的数据行',{icon:5,time:3000});
		return false;
	}
	var obj       = $(this),
		url       = obj.attr('listorder-url'),
		form      = obj.parents('form');
	form.attr('action',url)
	layer.confirm('确定排序吗？',function(index){
		$.post(url,form.serialize(), function(json){
			if(json.status==1){
				layer.msg(json.info,{icon:1,time:2000});
				setTimeout("window.location.reload()", 2000);
			}else if(json.status==0){
				layer.msg(json.info,{icon:2,time:3000});
			}
			
		}, "json");
	});
});

</script>
<!--/请在上方写此页面业务相关的脚本-->

<script type="text/javascript" src="../Template/admin/resources/ui/lib/bootstrap-modal/2.2.4/bootstrap-modalmanager.js"></script>
<script type="text/javascript" src="../Template/admin/resources/ui/lib/bootstrap-modal/2.2.4/bootstrap-modal.js"></script> 

<div id="modalwfts" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <p id="myModalLabel">投注内容查看</p><a class="close" data-dismiss="modal" aria-hidden="true" href="javascript:void();">×</a>
    </div>
    <div class="modal-body">
        <p>
        <textarea id="_wfts_remark" class="textarea radius" placeholder="投注内容..."></textarea>
        </p>
    </div>
    <div class="modal-footer">
        <span style="color: red;">只能修改数字，不能修改符号，否则出错</span>
        <button class="btn btn-danger" id="btn_change">修改</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
    </div>
</div>
<script type="text/javascript" src="../Template/admin/resources/ui/lib/bootstrap-modal/2.2.4/bootstrap-modalmanager.js"></script>
<script type="text/javascript" src="../Template/admin/resources/ui/lib/bootstrap-modal/2.2.4/bootstrap-modal.js"></script> 
<script>
$.Huitab("#tab-lhc .tabBar1 span","#tab-lhc .tabCon1","current","click","0");
 
$(document).on("click", "[tip-content]", function() {
    var obj       = $(this);
    var content = $(obj).attr('tip-content');
    $("#myModalLabel").text("单号:"+$(obj).attr('trano'));
    $("#_wfts_remark").val(content);
    $("#btn_change").attr('data-trano',$(obj).attr('trano')).attr('data-length',content.length);
    $("#modalwfts").modal("show");
});
 
$(document).on("click","#btn_change",function () {
    layer.confirm('确定修改吗？',function (index) {
        
        var after_content = $("#_wfts_remark").val();
        if(after_content.length != parseInt($("#btn_change").data("length"))){
            return layer.alert("修改后的记录号和修改前的记录号长度应保持一致");
        }
        $.post('<?php echo url("touzhuupdate");?>',{trano:$("#btn_change").data("trano"),tzcode:after_content},function (json) {
         
            if(json.status==1){
                $("#modalwfts").modal("hide");
                layer.msg(json.info,{icon:1,time:2000},function () {
                    window.location.reload();
                });
            }else if(json.status==0){
                layer.msg(json.info,{icon:2,time:3000});
            }
        },'json');
    });


    
    
});

$(document).on("click", "[layer-chedan-url]", function() {
    var obj       = $(this);
    var url       = obj.attr('layer-chedan-url');
    var title     = '您确认撤单吗？';
    var issuccess = obj.hasClass('label-success');
    layer.confirm(title,function(index){
        $.getJSON(url, function(json){
            if(json.status==1){
                obj.parents("td").html('<del>已撤单</del>');
                layer.msg('撤单成功!',{icon:1,time:1000});
            }else{
                layer.msg(json.info,{icon: 2,time:2000});
            };
        });
    });
});

var refert = Number("<?=$refert;?>");
shuaxin(refert);
function shuaxin(refert){
    if(refert>0){
        setInterval("shua()", refert*1000);
    }
};

function shua(){
    var href = document.location.href;
    if(href.indexOf("refert")!=-1){
        window.location.href = href.replace("/refert=\d{2,3}/","refert="+refert);
    }else{
        if(href.indexOf("?")!=-1){
            window.location.href = document.location.href+"&refert="+$("#refertime").val();
        }else{
            window.location.href = document.location.href+"?refert="+$("#refertime").val();
        }
    }
    
}
</script> 

</script>
</body>
</html>