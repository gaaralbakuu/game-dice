<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<title><?php echo GetVar('webtitle');?></title>
	<meta name="keywords" content="<?php echo GetVar('keywords');?>" />
	<meta name="description" content="<?php echo GetVar('description');?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" ><meta name="keywords" content="关键字">

	<link rel="stylesheet" href="/resources/css2/bootstrap.min.css">
	<link rel="stylesheet" href="/resources/css2/icon.css">
	<link rel="stylesheet" href="/resources/css2/reset.css">
	<link rel="stylesheet" href="/resources/css2/howtoplay.css">
</head>
<body>
<div class="container padding_0">
	<div class="header">
		<i class="iconfont pull-right">&#xe65a;</i>
		<p class="pull-right margin_0"><?php echo ($caipiao['title']); ?></p>
	</div>
	<div class="main">
		<div class="how">
			<div class="img"><img src="/resources/images/howtoplay_brief.png" alt="简介"></div>
			<div class="how_content">
				<p><?php echo ($caipiao['title']); ?>：由香港政府授权香港赛马会组织销售；</p>
				<p>开奖时间：每周三次，通常于周二、周四及周六或周日晚上举行；</p>
				<p>开奖号码：从01-49共49个号码中任选1或多个号码进行投注，每期开出6个正码和1个特码为中奖号码，竞猜7位开奖号码的全部或部分号码。投注方式灵活，全面满足不同彩民的投注需要；</p>
             </div>
		</div>
		<div class="play">
			<div class="play_title">
				<img src="/resources/images/howtoplay_howtoplay.png" alt="玩法">
			</div>
			<div class="play_content">
				<img src="/resources/images/howtoplay_lhc.png" alt="">
			</div>
		</div>
	</div>
</div>
</body>
</html>