<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员中心 - 芝麻乐开源众筹系统</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/Public/css/pintuer.css">
<script src="/Public/js/jquery-1.8.3.min.js"></script>
<script src="/Public/js/pintuer.js"></script>
<script src="/Public/js/respond.js"></script>
<script src="/Public/lib//layer/layer.js"></script>
</head>
<body style="background:#e7e8eb">
<style>

.mynav li{width: 80px;height: 36px;line-height: 36px;float: left;text-align: center;margin-right: 5px;border-radius: 3px;position: relative;display: block;}

.mynav .active{background-color: #ea544a;}

.mynav .active a{color: #fff;}

</style>

<script type="text/javascript">

var Sys = {};

        var ua = navigator.userAgent.toLowerCase();

        if (window.ActiveXObject){

            Sys.ie = ua.match(/msie ([\d.]+)/)[1]

            if (Sys.ie<=7){

            alert('你目前的IE版本为'+Sys.ie+'版本太低，请升级！');location.href="http://windows.microsoft.com/zh-CN/internet-explorer/downloads/ie";

            }

        }

</script>

<div class="x12 margin-big-bottom text-little padding-small bg-black text-pale" id="top">

    <div class="container">

        <span class="x2">欢迎来到芝麻乐开源众筹系统！</span>

        <span class="x10 text-right text-pale"><?php if(session('user.uin')): ?><a href="<?php echo U('User/Index/index');?>" class="text-pale"><?php echo session('user.phone');?> 进入用户中心</a> | <a href="<?php echo U('/User/Login/logout');?>" class="text-pale">退出</a><?php else: ?></a><a href="<?php echo U('User/Login/index');?>" class="text-pale">登录</a> | <a href="<?php echo U('User/Login/reg');?>" class="text-pale">注册</a><?php endif; ?></span>

    </div>

</div>

<div class="container-layout  bg-white">

    <div class="container padding-big-top padding-big-bottom">

        <div class="x12">

            <div class="x2">

                <a href="/"><img src="/uploads/1/20151017/buptcms_1445061661767.png" alt="芝麻乐开源众筹系统"  class="img-responsive"></a>

            </div>

            <div class="x10 padding-top">

                <div class="x6">

                    <ul class="mynav text-big float-left padding-big-right" style="padding-left:40px">

                        <li <?php if(CONTROLLER_NAME== 'Index'): ?>class="active"<?php endif; ?>><a href="/">首页</a></li>

                        <li <?php if(CONTROLLER_NAME== 'Item'): ?>class="active"<?php endif; ?>><a href="<?php echo U('Home/Item/index');?>">项目</a></li>

                        <!--             <li><a href="#">动态</a></li> -->

                        <li <?php if(CONTROLLER_NAME== 'News'): ?>class="active"<?php endif; ?>><a href="<?php echo U('Home/News/index');?>">新闻</a></li>

                    </ul>

                </div>

                <div class="x4">

                    <form id="form" action="<?php echo U('Home/Item/index');?>" method="get">

                        <div class="input-group padding-little-top">
                            <div class="field">

                                <input type="text" class="input border-red" name="search" size="30" placeholder="项目名称"/>
                            </div>

                            <span class="addbtn"><button type="submit" class="button bg-red">搜索</button></span>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

function select (){

    var content = $('input[name="search"]');

    if(content.val()==''){

        layer.tips("请填写搜索内容！","#content",{

            tips: 1

        })

        content.focus();

        return false

    }
    window.location.href="/index.php/Home/Item/index/search/"+content.val()
}

</script>

<div class="container">
	<div class="padding">

	<div class="x12 padding-bottom border-bottom">
		<div class="x6 padding-large">
			<h2>我的余额</h2>
			<div class="padding text-bold" style="font-size:50px;">￥0元</div>
		</div>
		<div class="x6 padding-large">
			<a href="/index.php?s=/User/Withdraw" class="button bg-blue radius-none">提现</a>
			<a href="/index.php?s=/User/Prepaid" class="button bg-red radius-none">充值</a>
		</div>
		
	</div>

    <div class="x12 padding-big">

        <form class="form-x" id="form-pay" action="<?php echo U('Prepaid/pay_param');?>" method="post" autocomplete="off" target="_blank">

            <div class="form-group">
                <div class="label"><strong>充值方式:</strong></div>
                <div class="field">
                    <div class="button-group radio">
                        <label class="button active"><input name="money_type" value="1" checked="checked" type="radio">在线支付</label>
                        <!-- <label class="button"><input name="money_type" value="2" type="radio">第三方托管支付</label> -->
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="label"><label for="money">充值金额:</label></div>
                <div class="field">
                    <div class="input-group x3">
                        <input type="text" class="input" id="money" name="money" value="" datatype="*1-8" placeholder="" />
                        <span class="addon">元</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="label"><strong>支付方式:</strong></div>
                <div class="field">
                    <div class="button-group border-sub radio" id="pay_type">

                        <?php if(is_array($payment_lists)): $i = 0; $__LIST__ = $payment_lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><label class="button <?php if($i == 1): ?>active<?php endif; ?>">
                            <img src="<?php echo ($vo["ico"]); ?>" width="23">
                            <input type="radio" name="paytype" value="<?php echo ($vo["type"]); ?>" <?php if($i == 1): ?>checked="checked"<?php endif; ?> title="<?php echo ($vo["title"]); ?>"><?php echo ($vo["title"]); ?>
                        </label><?php endforeach; endif; else: echo "" ;endif; ?>
                        
                    </div>
                </div>
            </div>

            <div class="form-button">
                <button class="button bg-sub radius-none" type="submit">确定，去付款</button>
            </div>

        </form>

    </div>
</div>
</div>
</div>
</div>
<div class="clearfix"></div>

<div class="container-layout text-gray  bg-black bg-inverse padding-big-top padding-big-bottom margin-big-top" >
    <div class="container text-small">
        <div class="x10 height-big margin-bottom">
			<?php $info = D("Admin/Nav")->loadList("status =1 AND type =2 AND pid =0","");foreach ($info as $i=>$bupt):$nav2=D("Admin/Nav")->loadList(array("pid"=>$bupt["id"]));?><a href="<?php echo ($bupt["url"]); ?>" class="padding-big-right text-gray"><?php echo ($bupt["name"]); ?></a><?php endforeach ?>
        </div>

        <div class="x12 text-left text-little">版权所有 © 芝麻乐开源众筹系统 All Rights Reserved，赣ICP备：380959609 <a href="http://www.zhimale.com">芝麻乐</a>版权所有</div>
    </div>
</div>
<div class="fixed-bottom-right margin-right" style="width:40px;right:10px;z-index: 99999;">
<!--     <div class="x12 txt radius-small bg-red margin-small-bottom icon-qrcode text-large"></div>
    <div class="x12 txt radius-small bg-red margin-small-bottom icon-pencil-square-o text-large"></div>
    <div class="x12 txt radius-small bg-red margin-small-bottom icon-question text-large"></div> -->
    <a href="javascript:;"  onclick="slideFunction('top');"><div class="txt radius-small bg-red margin-small-bottom icon-arrow-up text-large"></div></a>
</div>
<script type="text/javascript" src="/Public/lib//validform/Validform.min.js"></script>

<script type="text/javascript">
$(function(){
    $(".form-x").Validform({
        tiptype:2,
        callback:function(form){
            var money = $("#money").val();
            var paytype = $('#pay_type input[name="paytype"]:checked ').attr('title');

            if (money<0.01) {
                layer.tips('请输入正确的充值金额！', '#money', {
                    tips: [1, '#ea544a']
                });
                return false;
            };

            layer.confirm('确定要使用'+paytype+'充值'+money+'元？', function(){
                document.getElementById("form-pay").submit();
                //setTimeout("location.href = '/'",1000); 
                layer.confirm('请您确认已在新窗口完成支付', {
                    icon: 6,
                    btn: ['完成支付','取消支付'] //按钮
                }, function(){
                    location.href = '<?php echo U('User/index/index');?>';
                }, function(){
                    //layer.msg('取消成功', {shift: 6});
                });

            });
        
            return false;
        }
    });
})
</script>
</body>
</html>