<include file="Public/header" />
<link rel="stylesheet" href="__CSS__/activity.css">
<style>
	.am-tabs-default .am-tabs-nav>.am-active a{
		background-color: transparent;
    color: #fff;
	}
	.am-tabs-nav i{
		display: block;
    font-size: 28px;
    line-height: 14px;
    margin-top: 17px;
	}
	.am-tabs .am-tabs-nav a{
		color: #5c5f60;
		display: block;
		width: 108px;
	}
	.am-tabs-bd .am-tab-panel{
		padding: 0;
	}
	.am-tabs-bd .home_main{
		margin: 0;
	}
	.mynav1{
		color:#999 !important;
	}
	.mynav2{
color:#eb000e !important;
	}
	.mynav3{
color:#999 !important;
	}
	.mynav4{
color:#999 !important;
	}
	.mynav5{
color:#999 !important;
	}
</style>
<body>
	<header data-am-widget="header"class="am-header am-header-default header nav_bg am-header-fixed">
		<div class="am-header-left am-header-nav">
			<a href="javascript:history.back(-1);" class="">
				<i class="iconfont icon-arrow-left"></i>
			</a>
    </div>

		<h1 class="am-header-title activity_h1">
			全部彩种
		</h1>
	</header>
	
	 <div data-am-widget="tabs" class="am-tabs am-tabs-default" style="margin: 0;">
      <ul class="am-tabs-nav am-cf" style="background: #000;overflow: auto;overflow-y: hidden;">
          <li class="am-active"><a>
						<i class="iconfont icon-quanbu"></i>
						全部彩种</a></li>
          <li class=""><a>
						<i class="iconfont icon-fucaikuai3"></i>
						快3</a></li>
          <li class=""><a>
						<i class="iconfont icon--shishicai"></i>
						时时彩</a></li>
      </ul>
      <div class="am-tabs-bd" style="margin-bottom: 65px;border:0px;">
          <div data-tab-panel-0 class="am-tab-panel am-active">
            <ul class="home_main am-avg-sm-3">
				<volist name="cplist" id="cp">
					 <li class="home_main_list"><div>
						<switch name="cp.typeid">
							<case value="k3">
						      <a href="__ROOT__/Game.{$cp.typeid}.code.{$cp.name}.do">
							  <i class="iconfont" style="color:#07b39e"><img src="/app/{$cp.name}.png" style="width:50px"/></i>
							  </a>
							</case>
							<case value="ssc">
								<a href="__ROOT__/Game.{$cp.typeid}.code.{$cp.name}.do" >
									<!--<i class="iconfont icon--shishicai" style="color:#fa7e00;"></i>-->
									<i class="iconfont" style="color:#07b39e"><img src="/app/{$cp.name}.png" style="width:50px"/></i>
								</a>
							</case>
							<case value="x5">
								<a href="__ROOT__/Game.{$cp.typeid}.code.{$cp.name}.do">
									<!--<i class="iconfont icon-11xuan5" style="color:#218ddd;"></i>-->
									<i class="iconfont" style="color:#07b39e"><img src="/app/{$cp.name}.png" style="width:50px"/></i>
								</a>
							</case>
							<case value="keno">
								<a href="__ROOT__/Game.{$cp.typeid}.code.{$cp.name}.do">
									<!--<i class="iconfont icon-kuaile8" style="color:#fc5826;"></i>-->
									<i class="iconfont" style="color:#07b39e"><img src="/app/{$cp.name}.png" style="width:50px"/></i>
								</a>
							</case>
							<case value="pk10">
								<a href="__ROOT__/Game.pk10?code={$cp[name]}">
									<!--<i class="iconfont icon--pk" style="color:#f22751;"></i>-->
									<i class="iconfont" style="color:#07b39e"><img src="/app/{$cp.name}.png" style="width:50px"/></i>
								</a>
							</case>
							<case value="dpc">
								<a href="__ROOT__/Game.{$cp.typeid}.code.{$cp.name}.do">
										<i class="iconfont <?php if(strstr($cp['name'],'3d')){}else{}?>"><?php if(strstr($cp['name'],'3d')){ ?><img src="/app/{$cp.name}.png" style="width:50px"><?php } ?><?php if(strstr($cp['name'],'pl3')){ ?><img src="/app/{$cp.name}.png" style="width:50px"><?php } ?></i>
								</a>
							</case>
							<case value="lhc"> 
								<a href="__ROOT__/Game.{$cp.typeid}?code={$cp.name}">
									<i class="iconfont" style="color:#07b39e"><img src="/app/{$cp.name}.png" style="width:50px"/></i>
								</a>
							</case>
						</switch>
							<h3>{$cp.title}</h3>
							<em>{$cp.ftitle}</em>
						 </div></li>
				</volist>

				</ul>
					</div>
          <div data-tab-panel-1 class="am-tab-panel ">
								<ul class="home_main am-avg-sm-3">
									<volist name="cplist2" id="cp">
										<eq name="cp.typeid" value="k3">
											<li class="home_main_list"><div>
												<a href="__ROOT__/Game.{$cp.typeid}.code.{$cp.name}.do">
												<i class="iconfont" style="color:#07b39e"><img src="/app/k3.gif" style="width:50px"/></i>
												</a>
													<h3>{$cp.title}</h3>
													<em>{$cp.ftitle}</em>
												</div></li>
										</eq>
									</volist>
								</ul>
          </div>
          <div data-tab-panel-2 class="am-tab-panel ">
            <ul class="home_main am-avg-sm-3">
				<volist name="cplist2" id="cp">
					<eq name="cp.typeid" value="ssc">
						<li class="home_main_list"><div>
							<a href="__ROOT__/Game.{$cp.typeid}.code.{$cp.name}.do">
								<i class="iconfont" style="color:#07b39e"><img src="/app/{$cp.name}.png" style="width:50px"/></i>
							</a>
								<h3>{$cp.title}</h3>
								<em>{$cp.ftitle}</em>
							</div></li>
					</eq>
				</volist>
			 </ul>
          </div>
		 <div data-tab-panel-3 class="am-tab-panel">
            <ul class="home_main am-avg-sm-3">
				<volist name="cplist2" id="cp">
					<eq name="cp.typeid" value="keno">
						<li class="home_main_list">
							<a href="__ROOT__/Game.{$cp.typeid}.code.{$cp.name}.do">
								<i class="iconfont" style="color:#07b39e"><img src="/app/{$cp.name}.png" style="width:50px"/></i>
							</a>
								<h3>{$cp.title}</h3>
								<em>{$cp.ftitle}</em>
						</li>
					</eq>
				</volist>
				 </ul>
			 </div>
		  <div data-tab-panel-4 class="am-tab-panel">
			  <ul class="home_main am-avg-sm-3">
				  <volist name="cplist2" id="cp">
					  <eq name="cp.typeid" value="pk10">
						  <li class="home_main_list">
							  <a href="__ROOT__/Game.pk10?code={$cp[name]}"">
								<i class="iconfont" style="color:#07b39e"><img src="/app/{$cp.name}.png" style="width:50px"/></i>
							  </a>
								  <h3>{$cp.title}</h3>
								  <em>{$cp.ftitle}</em>
						  </li>
					  </eq>
				  </volist>
			  </ul>
		  </div>
		  <div data-tab-panel-5 class="am-tab-panel">
			  <ul class="home_main am-avg-sm-3">
				  <volist name="cplist2" id="cp">
					  <eq name="cp.typeid" value="x5">
						  <li class="home_main_list">
							  <a href="__ROOT__/Game.{$cp.typeid}.code.{$cp.name}.do">
                              <i class="iconfont" style="color:#07b39e"><img src="/app/{$cp.name}.png" style="width:50px"/></i>
							  </a>
								  <h3>{$cp.title}</h3>
								  <em>{$cp.ftitle}</em>
						  </li>
					  </eq>
				  </volist>
			  </ul>
		  </div>
		  
		  <div data-tab-panel-6 class="am-tab-panel">
			  <ul class="home_main am-avg-sm-3">
				  <volist name="cplist2" id="cp">
					  <eq name="cp.typeid" value="lhc">
						  <li class="home_main_list">
							  <a href="__ROOT__/Game.{$cp.typeid}.code.{$cp.name}.do">
								  <i class="iconfont" style="color:#07b39e"><img src="/app/{$cp.name}.png" style="width:50px"/></i>
							  </a>
							  <h3>{$cp.title}</h3>
							  <em>{$cp.ftitle}</em>
						  </li>
					  </eq>
				  </volist>
			  </ul>
		  </div>
      </div>
  </div>
<script>

</script>

<include file="Public/footer"/>
</body>
</html>