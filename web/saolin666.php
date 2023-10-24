<include file="Public/header" />
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<link rel="stylesheet" href="__CSS__/userHome.css">

<body leftMargin=0 topMargin=4>
<header data-am-widget="header"class="am-header am-header-default header nav_bg am-header-fixed">
    <div class="am-header-left am-header-nav">
        <a href="javascript:history.back(-1);" class="">
            <i class="iconfont icon-arrow-left"></i>
        </a>
    </div>

    <h1 class="am-header-title activity_h1">
        支付中心
    </h1>

</header>

<div class="bank_recharge">
    <form method="post" id="bank_recharge_from" name=alipayment action=codepay.php method='get' target="_blank" >

        <ul class="bank_form_list">
            <li class="am-cf">
                <span class="bank_form_left am-fl">付款金额</span>
                <div class="am-fr bank_right_input">
                    <input type="text" name="WIDtotal_fee" id="amount" value="<?php echo $_GET["money"]; ?>" class="input_txt">
					  
                </div>
            </li>
            <li class="am-cf">
                <span class="bank_form_left am-fl">商品名称</span>
                <div class="am-fr bank_right_input">
                    <input type="text" name="WIDsubject" value="<?php echo $_GET["oname"]; ?>" class="input_txt" readonly="readonly">
                </div>
            </li>
			<li class="am-cf">
                <span class="bank_form_left am-fl">商户订单号</span>
                <div class="am-fr bank_right_input">
                    <input type="text" name="WIDout_trade_no" value="<?php echo $_GET["oid"]; ?>" class="input_txt" readonly="readonly">
                </div>
            </li>
            <li class="am-cf">
                <span class="bank_form_left am-fl">充值方式</span>
                <div class="am-fr bank_right_input">

                    <select name="paytype" required>
                        <option value="">请选择支付方式</option>
                        <if condition="($tgpay_type eq 0) or ($tgpay_type eq 1)">
                            <option type="radio" name="type" value="wxpay">微信支付</option>
                        </if>
                        <if condition="($tgpay_type eq 0) or ($tgpay_type eq 2)">
                            <option type="radio" name="type" value="alipay" checked="">支付宝支付</option>
                        </if>
                    </select>
                </div>
            </li>
        </ul>

        <button class="am-btn am-btn-danger am-radius am-btn-block nextbtn" type="button"   style="text-align:center;" >确定</button>
    </form>
   <div id="foot">
			<ul class="foot-ul">
				<li><font class="note-help">如果您点击“确认”按钮，即表示您同意该次的执行操作。 </font></li>
				<li>
				
				</li>
			</ul>
		</div>
</div>

<include file="Public/footer" />

<script type="text/javascript">
    $('.nextbtn').click(function () {
        if($('input[name=amount]').val()=="") {
            alert('请输入充值金额');return false;
        }
        if($('input[name=paytype]:checked').val()==""){
            alert('请选择支付方式');return false;
        }

        $.post("{:U('Account/post_tg_pay')}",{
            amount      : $('#amount').val(),
            paytype     : $("select[name='paytype'] option:selected").val(),
        },function(res){
            alert(res.message);
            if(res.code == '1'){
                window.location.href = res.url;
            }
        },'json');
    });
</script>
</body>
</html>