<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<title>员工管理系统</title>
	<meta name="keywords" content="{:GetVar('keywords')}" />
	<meta name="description" content="{:GetVar('description')}" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" >

	<link rel="stylesheet" href="resources/css2/bootstrap.min.css">
	<link rel="stylesheet" href="resources/css2/reset.css">
	<link rel="stylesheet" href="resources/css2/icon.css">
	<link rel="stylesheet" href="resources/css2/header.css">
	<link rel="stylesheet" href="resources/css2/main.css">
	<link rel="stylesheet" href="resources/css2/login.css">
	<link rel="stylesheet" href="resources/css2/footer.css">
	<link rel="stylesheet" type="text/css" href="resources/css/common.css" />
	<link rel="stylesheet" type="text/css" href="resources/css2/layout.css" />
	<link rel="stylesheet" type="text/css" href="resources/css/style.css" />
	<link rel="stylesheet" type="text/css" href="resources/css2/artDialog.css" />
	<script type="text/javascript" src="resources/js/jquery-1.9.1.min.js"></script>
	<style>
		.y_lclass{
			top:3px;
			right: 3px;
		}
	</style>
</head>
<body>
<div class="login_main">
	<div class="login_bg">
		
		<div class="login_input">
			
				<div class="login_user user_commom_style" style="text-align: center;">
					<input id="code" type="text"  class="text_accont" name="name"  verify="isLoginName" isNot="true" msg="安全码不能为空"  style="text-align: center; border-radius:4px;" placeholder="输入安全码" />
					<em class="checkInput">
						<i class="iconfont"></i>
						<span></span>
					</em>
				</div>
				<div class="btn_submit" style="text-align: center; margin-left: 0px;">
					<button  type="submit" class="btn-danger active sub_btn btn-sm" style="width:8em;height:2em;font-size: 1.3em;" onclick="start_login()">确定</button>
				</div>
		</div>
	</div>
</div>
<!-- <include file="Public/footer" /> -->
<script type="text/javascript">
	function start_login(){
		var code = document.getElementById()
		$.post("check_login.php",{c:},function(data){

		},"json");
	}
</script>
<div class="loginCengBox">
	<div class="loginCeng">
		<div class="loginCengH">
			<h3>温馨提示</h3>
			<span class="loginCengClose">
				<i class="iconfont icon-guanbi-copy"></i>
			</span>
		</div>
		<div class="loginCengB">
		
		</div>
		<div class="loginCengF">
			<button type="submit" >确定</button>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function(){
		$("#kinMaxShow").kinMaxShow({
			height:225,
			intervalTime:2,
			button:{
				showIndex:false,
				normal:{marginRight:'8px',border:'0',right:'50%',bottom:'10px',borderRadius:'7px',background:'#fff'},
				focus:{background:'#bd0d0d',border:'0'}
			}
		});

	});
</script>
<!-- 调用插件 -->
<script type="text/javascript">
	$(function(){
		// var _FormValidate = new $.rui_validate();
		// _FormValidate.initload();

		// _FormValidate.initForm({
		// 	FocusTip:true,	//获取焦点则进行提示，显示输入规则（ boolen ）
		// 	BlurChange:true,	//失去焦点再进行提示，显示输入规则（ boolen ）
		// 	ShowTip: "Icon",	//显示提示信息的类型：Bubble（气泡）；IconText( 图标加文字 ) ; Text（仅是文字）; Icon（正确或错误的图标）； Highlights 聚焦高亮 ;
		// 	ShowTipDirection:"right", //提示信息的位置：right：右边，top：上面；bottom：下面；inside：输入框内；
		// 	FormObj:$("#ruivalidate_form_class"),	//验证的表单容器
		// 	FormIdName: 'ruivalidate_form_class',  //form的ID名称
		// 	ShowTipClass:"ts_msg",    //显示提示信息的区域class
		// 	ShowTipStyle:"",    //显示提示信息的class
		// 	SubBtn:'sub_btn',   //提交按钮的class
		// 	CallBack: ruivalidate_form_class //回调函数
		// })
		// function ruivalidate_form_class(obj) {
		// 	var _this = $(".ruivalidate_form_class .sub_btn");
		// 	_sub(_this);
		// }
	
		$('.text_accont[name="name"]').blur(function () {
			var text = $(this).val();
			if(!text || text.trim() == ''){
				$(this).siblings('.checkInput').show();
				$(this).siblings('.checkInput').find('span').text('账号不能为空');
				$(this).siblings('.checkInput').find('.iconfont').removeClass('icon-chenggong');
				$(this).siblings('.checkInput').find('.iconfont').addClass('icon-cross-ivt');
			}else{
				$(this).siblings('.checkInput').show();
				$(this).siblings('.checkInput').find('span').text('');
				$(this).siblings('.checkInput').find('.iconfont').removeClass('icon-cross-ivt');
				$(this).siblings('.checkInput').find('.iconfont').addClass('icon-chenggong');
			}
		})

		$('.text_accont[name="pass"]').blur(function () {
			var text = $(this).val();
			if(!text || text.trim() == ''){
				$(this).siblings('.checkInput').show();
				$(this).siblings('.checkInput').find('span').text('密码不能为空');
				$(this).siblings('.checkInput').find('.iconfont').removeClass('icon-chenggong');
				$(this).siblings('.checkInput').find('.iconfont').addClass('icon-cross-ivt');
			}else if(text.length < 6 || text.length > 16){
				$(this).siblings('.checkInput').show();
				$(this).siblings('.checkInput').find('span').text('密码范围在6-16位');
				$(this).siblings('.checkInput').find('.iconfont').removeClass('icon-chenggong');
				$(this).siblings('.checkInput').find('.iconfont').addClass('icon-cross-ivt');
			}else{
				$(this).siblings('.checkInput').show();
				$(this).siblings('.checkInput').find('span').text('');
				$(this).siblings('.checkInput').find('.iconfont').removeClass('icon-cross-ivt');
				$(this).siblings('.checkInput').find('.iconfont').addClass('icon-chenggong');
			}
		})

	});

	function check_login(obj){
		$.post($(obj).attr('action'),$(obj).serialize(), function(json){
			if(json.sign==1){
				loginCengBoxFn(json.message);
				window.location.href = "/Game.pk10?code=bjpk10";
			}else{
				if(json.message=="你的帐号已在别处登陆，是否重新登陆"){
					if(confirm('你的帐号已在别处登陆，是否重新登陆')){
						$.ajax({
							url : $(obj).attr('action'),
							type : "POST",
							data : {
								name : $("input[name=name]").val(),
								pass :$("input[name=pass]").val(),
								nocode : true,
							},
							success : function (json) {
								loginCengBoxFn(json.message);
								window.location.href = "{:U('Member.index')}";
							}
						})
					}
				}else{
					// alt(json.message);
					loginCengBoxFn(json.message);
				}
			}
		},'json');
		return false;
	}
</script>
</body>
</html>