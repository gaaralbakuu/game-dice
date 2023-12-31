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
		<i class="iconfont pull-right">&#xe657;</i>
		<p class="pull-right margin_0"><?php echo ($caipiao['title']); ?></p>
	</div>
	<div class="main">
		<div class="how">
			<div class="img"><img src="/resources/images/howtoplay_brief.png" alt="简介"></div>
			<div class="how_content">
				<p><?php echo ($caipiao['title']); ?>：是经中国国家财政部批准，由中国福利彩票发行管理中心在地级市所辖区域内发行，由地级市福利彩票发行中心承销的彩票。</p>
				<p>开奖时间：每天<?php echo ($caipiao['qishu']); ?>期、每10分钟1期；每天早上<?php echo ($caipiao['firsttime']); ?>分至晚上<?php echo ($caipiao['endtime']); ?>；</p>
				<p>玩法分为一星、二星、三星、四星、五星、大小单双共六种玩法群。每期开奖号码为一个五位数号码，分为个、十、百、千、万位；</p>
			</div>
		</div>
		<div class="play">
			<div class="play_title">
				<img src="/resources/images/howtoplay_howtoplay.png" alt="玩法">
			</div>
			<div class="play_content">
				<img src="/resources/images/howtoplay_ssc.png" alt="">
			</div>
		</div>
	</div>
</div>
</body>
</html>