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

<style>
.border-danger-outline{
	border:1px solid #dd514c;
}
.border-success-outline{
	border:1px solid #5eb95e;
}
</style>
<title>系统预开奖彩管理</title>
</head>
<body>
<nav class="breadcrumb">
<div class="l">
<form method="get" action="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME);?>" class="text-c">
彩种：<span class="select-box clearfix" style="width:150px; background:#fff; text-align:center; margin:0 auto"><select class="select" onChange="javascipt:window.location.href=this.value">
    <?php if(is_array($lotterylist)): $i = 0; $__LIST__ = $lotterylist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cpv): $mod = ($i % 2 );++$i;?><option value="<?php echo U('yukaijianghistory',['name'=>$cpv['name']]);?>" <?php if($cpv['name'] == $name): ?>selected<?php endif; ?>><?php echo ($cpv["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
</select>
</span>
<input name="name" type="hidden" value="<?php echo ($name); ?>">
期号：<input type="text" name="expect" class="input-text" style="width:120px;" value="<?php echo ($expect); ?>">
<button class="btn radius" type="submit" >查询</button>
</form>
</div>
<div class="r">
<a href="<?php echo U('yukaijiang');?>" class="btn radius l" style="margin-left:10px;line-height:1.6em;margin-top:3px">返回预开奖</a>
</div>

</nav>
<div class="page-container">
	<div class="mt-5">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="60">彩种</th>
				<th width="60">期号</th>
				<th width="120">开奖号码</th>
				<th width="120">时间</th>
				<th width="60">管理人</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($olist)): $i = 0; $__LIST__ = $olist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c ">
				<td><?php echo ($lotterylist[$vo['name']]['title']); ?></td>
				<td><?php echo ($vo["expect"]); ?></td>
				<td><?php echo ($vo["opencode"]); ?></td>
				<td><?php echo (date("m-d H:i:s",$vo["opentime"])); ?></td>
				<td id="stateadmin-<?php echo ($vo["expect"]); ?>"><?php echo ($vo["stateadmin"]); ?></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
    <div class="cl pd-5 bg-1 bk-gray mt-20">
        <div class="l" style="padding:0"></div>
        <div class="r">
            <div class="pageNav l" style="padding:0"><?php echo ($pageshow); ?></div>
            <div class="r">共有数据：<strong><?php echo ($total); ?></strong> 条 </div>
        </div>
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

</body>
</html>