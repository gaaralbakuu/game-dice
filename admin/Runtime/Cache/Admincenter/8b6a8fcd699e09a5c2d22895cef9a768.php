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

<title>存款记录</title>
</head>
<body>
<?php
$_states = [ '0'=>'未审核', '1'=>'已审核', '-1'=>'取消申请', ]; ?>
<div class="page-container">
    <span class="r">
<a class="btn btn-success radius r btn-refresh" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</span>
	<form method="get" action="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME);?>" class="text-c">
<?php $fuddetailtypes = C('fuddetailtypes');?>
<span class="select-box" style="width:80px"><select class="select" name="state">
<option value="">全部</option>
<?php if(is_array($_states)): foreach($_states as $fk=>$ft): ?><option value="<?php echo ($fk); ?>" <?php if(($fk == $state) and ($state != '')): ?>selected<?php endif; ?>><?php echo ($ft); ?></option><?php endforeach; endif; ?>

</select></span>
        
        <input type="hidden" name="uid" value="<?php echo ($info["id"]); ?>">
    	时间:<input class="input-text" type="text" style="width:100px;" onFocus="WdatePicker({dateFmt:'yyyyMMdd'})" name="sDate" value="<?php echo ($_sDate); ?>"> - <input class="input-text" type="text" style="width:100px;" onFocus="WdatePicker({dateFmt:'yyyyMMdd'})" value="<?php echo ($_eDate); ?>" name="eDate">
    	金额:<input class="input-text" type="text" style="width:60px;" name="sAmout" value="<?php echo ($_sAmout); ?>"> - <input class="input-text" type="text" style="width:60px;" value="<?php echo ($_eAmout); ?>" name="eAmout">
        
        用户名：<input class="input-text" type="text" style="width:100px;" value="<?php echo ($username); ?>" name="username">
        单号：<input class="input-text" type="text" style="width:100px;" value="<?php echo ($trano); ?>" name="trano">
        <input class="btn btn-default-outline radius" type="submit" value="查询">
    </form>
    <div class="mt-5">
    <form method="post" action="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME);?>">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="80">平台单号</th>
                <!--<th width="80">第三方单号</th>-->
				<th width="60">用户名</th>
				<th width="60">支付账号</th>
				<th width="60">存款方式</th>
				<th width="60">充值前</th>
				<th width="60">金额</th>
				<th width="60">充值后</th>
				<!--<th width="60">实际金额</th>
				<th width="60">手续费</th>
				<th width="60">实际手续费</th>
				<th width="70">变更前金额</th>
				<th width="70">变更后金额</th>-->
				<th width="70">备注</th>
				<!--<th width="70">操作人</th>-->
				<th width="60">类型</th>
				<th width="60">时间</th>
				<th width="30">状态</th>
			</tr>
		</thead>
		<tbody>
            <?php $yemiantotal = 0; ?>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['state']==1)$yemiantotal += $vo['amount']; ?>
            <tr class="text-c">
                <td><input type="checkbox" class="checkids" value="<?php echo ($vo["id"]); ?>" name="ids[<?php echo ($vo["id"]); ?>]"></td>
                <td><?php echo ($vo["trano"]); ?></td>
               <!-- <td><?php echo ($vo["threetrano"]); ?></td>-->
                <td><?php echo ($vo["username"]); ?></td>
                <td><?php if($vo['paytype'] != 'linepay'): echo ($vo["payname"]); else: ?><u style="cursor:pointer;" class="text-primary" trano="<?php echo ($vo["trano"]); ?>" tip-content="<?php echo ($vo["payname"]); ?>">查看信息</u><?php endif; ?></td>
                <td><?php echo ($vo["paytypetitle"]); ?></td>
                <td><?php echo ($vo["oldaccountmoney"]); ?></td>
                <td><?php echo ($vo["amount"]); ?></td>
                <td><?php echo ($vo["newaccountmoney"]); ?></td>
                <!--<td><?php echo ($vo["actualamount"]); ?></td>
                <td><?php echo ($vo["fee"]); ?></td>
                <td><?php echo ($vo["actualfee"]); ?></td>
                <td><?php echo ($vo["oldaccountmoney"]); ?></td>
                <td><?php echo ($vo["newaccountmoney"]); ?></td>-->
                <td><?php echo ($vo["remark"]); ?></td>
              <!--  <td><?php echo ($vo["stateadmin"]); ?></td>-->
                <td><?php if($vo['isauto'] == 1): ?>自动<?php elseif($vo['state'] == 2): ?>手动<?php endif; ?></td>
                <td><?php echo (date("m-d H:i",$vo["oddtime"])); ?></td>
                <td>
                <?php if($vo['state'] == 0): ?><u style="cursor:pointer" class="text-primary" layer-url="<?php echo U('rechargstate',['id'=>$vo['id']]);?>" title="编辑订单-<?php echo ($vo["trano"]); ?>状态">
                	<span style="color:red">未审核</span>
                </u>
                <?php elseif($vo['state'] == 1): ?>
                	<span style="color:green">已审核</span>
                <?php elseif($vo['state'] == -1): ?>
               	 <span style="color:grey">取消</span><?php endif; ?>
                |
                <a style="text-decoration:none" class="ml-5" layer-del-url="<?php echo U('rechargedelete',array('id'=>$vo['id']));?>" href="javascript:;" title="删除">删除</a>
                </td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
    
    <div class="cl pd-5 bg-1 bk-gray mt-20 text-c">
        <span class="l"><a href="javascript:;" deleteall-url="<?php echo U('rechargedelall');?>" title="删除" class="btn btn-danger-outline radius">删除</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <div class="l" style="padding:0">页面成功：<strong style="color:#f60"><?php echo ($yemiantotal); ?></strong>元</div>
        <div class="r">
            <div class="pageNav l" style="padding:0"><?php echo ($page); ?></div>
            <div class="r">共有数据：<strong><?php echo ($totalcount); ?></strong> 条 </div>
        </div>
    </div>
    
    <div class="cl pd-5 bg-1 bk-gray mt-20 text-c">
        总充值：<strong style="color:#f60"><?php echo ($rechalltotal); ?></strong>(<?php echo ($rechalltotal_count); ?>笔)&nbsp;&nbsp;&nbsp;&nbsp;自动充值：<strong style="color:#f60"><?php echo ($rechtotal_aotu); ?></strong>(<?php echo ($rechtotal_aotu_count); ?>笔)&nbsp;&nbsp;&nbsp;&nbsp;手动充值：<strong style="color:#f60"><?php echo ($rechtotal_shou); ?></strong>(<?php echo ($rechtotal_shou_count); ?>笔)
    </div>
    </form>
	</div>
</div>
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

<div id="modalwfts" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <p id="myModalLabel">投注内容查看</p><a class="close" data-dismiss="modal" aria-hidden="true" href="javascript:void();">×</a>
    </div>
    <div class="modal-body">
        <p id="_wfts_remark">
        </p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
    </div>
</div>
<script type="text/javascript" src="/Template/admin/resources/ui/lib/bootstrap-modal/2.2.4/bootstrap-modalmanager.js"></script>
<script type="text/javascript" src="/Template/admin/resources/ui/lib/bootstrap-modal/2.2.4/bootstrap-modal.js"></script>
<script>
$(document).on("click", "[tip-content]", function() {
	var obj       = $(this);
	var content = $(obj).attr('tip-content');
	$("#myModalLabel").text("单号:"+$(obj).attr('trano'));
	$("#_wfts_remark").html(content);
	$("#modalwfts").modal("show");
});

</script>
</body>
</html>