<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的认证 - 会员中心芝麻乐开源众筹系统</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/Public/css/pintuer.css">
<script src="/Public/js/jquery-1.8.3.min.js"></script>
<script src="/Public/js/pintuer.js"></script>
<script src="/Public/js/respond.js"></script>
<script src="/Public/lib/layer/layer.js"></script>
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

<div class="container"><div class="x12 margin-large-top border bg-white margin-large-bottom">	<div class="x2" style="min-height:800px">		<div class="x12 border-bottom padding-top padding-bottom text-center ">			<a href="/index.php?s=/User/Info"><img src="<?php if($user['header']): echo cut_image($user['header'],'90','90'); else: ?>/Template/User/default/Public/img/user-logo.jpg<?php endif; ?>" width="90" height="90" class="header radius-circle" /></a>			<h5 class="padding"><?php echo ($phone); ?></h5>			<?php if($user['rstatus'] == '1'): ?><div class="txt-border txt-small radius-circle border sta" data-msg="<span class='text-black'>你已通过实名认证，<a href='<?php echo U('User/Attest/index');?>' class='text-blue'>查看认证</a></span>" ><div class="txt bg-red radius-circle icon-male"></div></div>						<?php else: ?>			<div class="txt-border txt-small radius-circle border sta" data-msg="<span class='text-black'>你未通过实名认证，<a href='<?php echo U('User/Attest/index');?>' class='text-blue'>去认证</a></span>" ><div class="txt radius-circle icon-male"></div></div><?php endif; ?>			<div class="txt-border txt-small radius-circle border sta" data-msg="<span class='text-black'>您已绑定手机，<a href='' class='text-blue'>更改</a></span>"><div class="txt radius-circle bg-red icon-tablet"></div></div>			<a href="<?php echo U('User/Prepaid/index');?>" class="txt-border txt-small radius-circle border " ><div class="txt radius-circle bg-red ">充</div></a>		</div>		<div class="x12 border-bottom padding-bottom leftnav">				<a href="/index.php?s=/User/index" class="button x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Index and ACTION_NAME == index): ?>bg-red<?php endif; ?>"><span class="padding-left">会员中心首页<span><span class="float-right icon-angle-right"></span></a>			<span class="button x12 bg-gray radius-none">我是项目方</span>			<a href="<?php echo U('Item/item_add');?>" class="button button-small x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Item and ACTION_NAME == item_add): ?>bg-red<?php endif; ?>"><span class="padding-large-left">发布项目<span><span class="float-right icon-angle-right"></span></a>			<a href="<?php echo U('Item/index');?>" class="button button-small x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Item and ACTION_NAME == index): ?>bg-red<?php endif; ?>"><span class="padding-large-left">已发布的项目<span><span class="float-right icon-angle-right"></span></a>							<span class="button x12 bg-gray radius-none">我是投资方</span>			<a href="<?php echo U('Investor/collect_item');?>" class="button button-small x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Investor and ACTION_NAME == collect_item): ?>bg-red<?php endif; ?>"><span class="padding-large-left">我收藏的项目<span><span class="float-right icon-angle-right"></span></a>			<a href="<?php echo U('Investor/with_item');?>" class="button button-small x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Investor and ACTION_NAME == with_item): ?>bg-red<?php endif; ?>"><span class="padding-large-left">我投资的项目<span><span class="float-right icon-angle-right"></span></a>			<span class="button x12 bg-gray radius-none">资金管理</span>			<a href="<?php echo U('User/Funds/money_details');?>" class="button button-small x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Funds and ACTION_NAME == money_details): ?>bg-red<?php endif; ?>"><span class="padding-large-left">资金明细<span><span class="float-right icon-angle-right"></span></a>			<a href="<?php echo U('User/Funds/payment_details');?>" class="button button-small x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Funds and ACTION_NAME == payment_details): ?>bg-red<?php endif; ?>"><span class="padding-large-left">充值记录<span><span class="float-right icon-angle-right"></span></a>			<a href="<?php echo U('User/Prepaid/index');?>" class="button button-small x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Prepaid and ACTION_NAME == index): ?>bg-red<?php endif; ?>"><span class="padding-large-left">我要充值<span><span class="float-right icon-angle-right"></span></a>			<span class="button x12 bg-gray radius-none">个人中心</span>			<a href="<?php echo U('Attest/index');?>" class="button button-small x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Attest): ?>bg-red<?php endif; ?>"><span class="padding-large-left">我的认证<span><span class="float-right icon-angle-right"></span></a>			<a href="<?php echo U('Info/index');?>" class="button button-small x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Info and ACTION_NAME == index): ?>bg-red<?php endif; ?>"><span class="padding-large-left">账号设置<span><span class="float-right icon-angle-right"></span></a>			<a href="<?php echo U('Dolog/index');?>" class="button button-small x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Dolog): ?>bg-red<?php endif; ?>"><span class="padding-large-left">消息中心<span><span class="badge bg-dot float-right"><?php echo doLog();?>条未读</span></a>			<a href="<?php echo U('Bank/index');?>" class="button button-small x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Bank): ?>bg-red<?php endif; ?>"><span class="padding-large-left">银行卡管理<span></a>		</div>		</div>	<script type="text/javascript">		$(".sta").each(function(e){			var msg=$(this).attr('data-msg');			$(this).on("mouseover mouseout",function(event){ 			if(event.type == "mouseover"){ 				 var ii=layer.tips(msg, $(this), {    				tips: [2,'#fff']				});	 			}else if(event.type == "mouseout"){  				layer.close(ii)			 }			})											})	</script><div class="x10  border-left" style="min-height:800px;">
<div class="x12 padding border-bottom">
	<h1>我的认证</h1>
</div>
<div class="x12 bg padding">
	<div class="x12 bg-white padding-big height-big">
		<span class="x12 text-red text-center text-big"><?php echo ($status); ?></span>
		<span class="x12 text-center text-small">承诺：身份证信息仅用于投资后成立有限合伙企业名称预核准的证明材料！</span>
	</div>
	<div class="x12 bg-white padding-big height-big margin-top">
		<span class="x12 text-small">身份证照片拍摄要求：</span>
		<span class="x12 text-small">
			1. 拍摄的身份证照片必须是白底，且文字内容清晰，建议拍摄时把身份证放在一张白纸上； </br>
			2. 在光线充足的地方进行拍照并避免光线直射，防止身份证反光； </br>
			3. 拍摄画面必须把身份证的四角拍摄进去，保证画面内显示出身份证边角全部（画面有手或其它物品的遮挡均属无效照片）；  </br>
			4. 拍照时要中心点垂直拍摄，尽量避免画面有严重的透视变形。</br>
		</span>
	</div>
	<?php if($attest['status'] != '1'): ?><div class="x12 bg-white padding-big height-big margin-top">
			<div class=" padding x12">
				<span class="text-gray x2 text-right padding-right"><span class="text-red">*</span> 身份证 :</span>
				<span class="x5 padding">	
					<span>
						<a class="button bg-blue button-small radius-none x2 text-center input-file" href="javascript:void(0);">+ 上传身份证正面<input size="100" name="card_positives" id="card_positive" type="file" /></a>
						<span class="text-small  text-gray padding-big-left" id="card_positive_tips">允许上传：png，jpg格式</span>
					</span>
					<div class="x12 padding border positive">
						<?php if($attest['card_positive']): ?><img src="<?php echo ($attest["card_positive"]); ?>" width="100" height="100">
							<input type="hidden" name="card_positive" value="<?php echo ($attest["card_positive"]); ?>"><?php endif; ?>
					</div>
				</span>
				<span class="x5 padding">	
					<span>
						<a class="button bg-blue button-small radius-none x2 text-center input-file" href="javascript:void(0);">+ 上传身份证反面<input size="100" name="card_negatives" id="card_negative" type="file" /></a>
						<span class="text-small  text-gray padding-big-left">允许上传：png，jpg格式</span>
					</span>
					<div class="x12 padding border negative">
						<?php if($attest['card_negative']): ?><img src="<?php echo ($attest["card_negative"]); ?>"   width="100" height="100">
							<input type="hidden" name="card_negative" value="<?php echo ($attest["card_negative"]); ?>"><?php endif; ?>
					</div>
				</span>
			</div>
			<div class="x12 text-center"><button onClick="card_in()" class="button bg-yellow radius-none">提交认证</button></div>
		</div><?php endif; ?>
</div>
<div class="x12 text-center padding"><ul class="pagination border-red pagination-small"><?php echo ($page); ?></ul></div>
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
<script src="/Public/js/form.js"></script>
<script>
//提交审核
	function card_in(){
		var card_positive=$('input[name="card_positive"]'); //封面图片
		var card_negative=$('input[name="card_negative"]'); //封面图片

		if(card_positive.length == 0){
			slideFunction('card_positive')
			layer.tips("请上传正面","#card_positive_tips", {
				tips: [1, '#3595CC'],
				time: 4000
			})
			return false
		}
		if(card_negative.length == 0){
			slideFunction('card_negative')
			layer.tips("请上传反面","#card_negative_tips", {
				tips: [1, '#3595CC'],
				time: 4000
			})
			return false
		}
	    $.post("/index.php?s=/User/Attest/card_in", {
		 	card_positive: card_positive.val(),
		 	card_negative: card_negative.val(),
		},function(d){
			if (d.status == 1) {
				layer.open({
				    content: d.info,
				    yes: function(index){
				        window.location.reload()
				    }
				});  
			}else{
				layer.open({ content: d.info,});
			}
	   	});
	}
//上传身份证正面
    $(function () {
      	$("#card_positive").wrap("<form id='myupload' action='/Admin/Upload/index' method='post' enctype='multipart/form-data'></form>");
      	$("#card_positive").change(function(){
      		$("#myupload").ajaxSubmit({
      			dataType:  'json',
      			beforeSend: function() {
      				var index = layer.load(1, {
					shade: [0.1,'#fff'] //0.1透明度的白色背景
				});
      			},
      			success: function(data) {

      				if(data.status==0){
      					layer.open({
      						content:data.info,
      						btn:['好的'],
      						yes:function(){
      							layer.closeAll()
      						}
      					})
      				}else{
      					var img = data.url;
      					var filename = data.original;
      					var filehtml='<img src="'+img+'" alt="'+filename+'" width="100" height="100"><input type="hidden" name="card_positive" value="'+img+'"/>'
      					$(".positive").html(filehtml)
      					$(".positive").removeClass('hidden');
      					layer.closeAll()
      				}
      			}
      		});
      	});
    });
//上传身份证反面
    $(function () {
      	$("#card_negative").wrap("<form id='mynegative' action='/Admin/Upload/index' method='post' enctype='multipart/form-data'></form>");
      	$("#card_negative").change(function(){
      		$("#mynegative").ajaxSubmit({
      			dataType:  'json',
      			beforeSend: function() {
      				var index = layer.load(1, {
					shade: [0.1,'#fff'] //0.1透明度的白色背景
				});
      			},
      			success: function(data) {

      				if(data.status==0){
      					layer.open({
      						content:data.info,
      						btn:['好的'],
      						yes:function(){
      							layer.closeAll()
      						}
      					})
      				}else{
      					var img = data.url;
      					var filename = data.original;
      					var filehtml='<img src="'+img+'" alt="'+filename+'" width="100" height="100"><input type="hidden" name="card_negative" value="'+img+'"/>'
      					$(".negative").html(filehtml)
      					$(".negative").removeClass('hidden');
      					layer.closeAll()
      				}
      			}
      		});
      	});
    });
</script>
</body>
</html>