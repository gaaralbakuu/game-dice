<include file="Public/header" />
<link rel="stylesheet" href="__CSS__/activity.css">

</head>
<body class="bg_fff">
	<header data-am-widget="header"class="am-header am-header-default header nav_bg am-header-fixed">
		<div class="am-header-left am-header-nav">
			<a href="javascript:history.back(-1);" class="">
				<i class="iconfont icon-arrow-left"></i>
			</a>
      	</div>

		<h1 class="am-header-title activity_h1">
			好友推荐
		</h1>
	</header>
	<div class="promotion_main">
	<h2 class="promotion_h2">
				活动说明
			</h2>
	</div>
1：优乐彩票平台老会员每推荐一位好友注册充值，您将获得￥18.88元彩金。以此类推，推荐彩金无上限；<br>
2：推荐好友注册后，好友需要充值￥100元以上（充值不累计）方可领取彩金； <br>
3：申请彩金之前必须先绑定银行账号否则系统将判断不符合申请条件拒绝赠予彩金。 <br>
4：老会员重新注册充值优乐彩票平台将不予发放彩金； <br>
5：优乐彩票平台代理会员不享有推荐彩金; <br>
申请方式：会员邀请好友后，请联系24小时在线客服领取彩金，只限当日-逾期视为放弃此项优惠<br><br>



&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;申请方式<br>
会员邀请好友后，请联系24小时在线客服 领取彩金，只限当日-逾期视为放弃此项优惠<br><br>

活动细则<br>
1：优乐彩票平台所有彩金均以人民币（CNY）为结算金额； <br>
2：优乐彩票平台所有优惠为玩家而设，如果发现任何会员，以不诚实的方式套取红利，我平台有权取消会员账户结余的权利； <br>
3：优乐彩票平台保留活动最终解释权，以及在无通知的情况下修改，终止活动的权利，适用于所有优惠。<br><br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;注意事项<br>
每个银行卡户名，每位会员，每一相同IP，每一电子邮箱，每一电话号码，相同支付方式（借记卡/信用卡/银行账户）及共享计算机环境（例如网吧，其他公用计算机等）只能享受一次优惠；若会员有重复申请账号行为，公司保留取消或收回会员优惠彩金的权利。 大富彩票平台的所有优惠为玩家而设，如发现任何团体或个人，以不诚实方式套取红利或任何威胁，滥用公司优惠等行为。公司保留冻结，取消该团体或个人账户结余的权利。 
若会员对活动有争议时，为确保双方利益，杜绝身份盗用行为，优乐彩票平台有权要求会员向我们提供充足有效文件，用以确认是否享有该优惠的资质。 此活动可与其他优惠同时进行享用。
	<include file="Public/footer" />
	<script type="text/javascript">
		function jiangli(){
			$.post("{:U('Activity/jinji')}",'', function(json){
				if(json.status==1){
					alert(json.info);
					window.location.reload();
				}else{
					alert(json.info);
				}
			},'json');
			return false;
		}
	</script>
</body>
</html>