<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>收藏的项目 - 会员中心芝麻乐开源众筹系统</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/Public/css/pintuer.css">
<script src="/Public/js/jquery-1.8.3.min.js"></script>
<script src="/Public/js/pintuer.js"></script>
<script src="/Public/js/respond.js"></script>
<script src="/Public/lib/layer/layer.js"></script>
<script src="/Public/lib/laydate/laydate.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/lib/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/lib/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/Public/lib/ueditor/lang/zh-cn/zh-cn.js"></script>
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
<div class="x12 padding border-bottom">
	<h1>投资管理</h1>
</div>
<div class="x12 padding">
	<div class="x12 text-center padding-top padding-bottom border-bottom border-top margin-top">
		<a href="<?php echo U('Investor/index');?>" class='x2 border-right <?php if(CONTROLLER_NAME == Investor and ACTION_NAME == index): ?>text-red<?php endif; ?>'>全部项目</a>
		<a href="<?php echo U('Investor/collect_item');?>" class='x2 border-right <?php if(CONTROLLER_NAME == Investor and ACTION_NAME == collect_item): ?>text-red<?php endif; ?>'>收藏的项目</a>
		<a href="<?php echo U('Investor/interview_item');?>" class='x2 border-right <?php if(CONTROLLER_NAME == Investor and ACTION_NAME == interview_item): ?>text-red<?php endif; ?>'>约谈的项目</a>
		<a href="<?php echo U('Investor/lead');?>" class='x2 border-right <?php if(CONTROLLER_NAME == Investor and ACTION_NAME == lead): ?>text-red<?php endif; ?>'>领投的项目</a>
		<a href="<?php echo U('Investor/with_item');?>" class='x2 border-right <?php if(CONTROLLER_NAME == Investor and ACTION_NAME == with_item): ?>text-red<?php endif; ?>'>跟投的项目</a>
		<a href="<?php echo U('Investor/index');?>" class='x2 border-right'>完成的项目</a>
	</div>
</div>
<?php if(is_array($collect)): $i = 0; $__LIST__ = $collect;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bupt): $mod = ($i % 2 );++$i;?><div class="x12 bg padding">
		<div class="x3 padding  bg-white"><img src="<?php echo ($bupt["cover_img"]); ?>" alt="<?php echo ($bupt["item_name"]); ?>" class="x12" height="94"></div>
		<div class="x9 bg padding bg-white border-left height-big">
			<div><a href="<?php echo U('Home/Item/Info',array('id'=>$bupt['id']));?>" class="x6 text-big"><?php echo ($bupt["item_name"]); ?></a><span class="x6 text-right"><button class="button radius-none bg-red"><?php echo ($bupt["progress_name"]); ?>中</button><button onClick="collect('<?php echo ($bupt["id"]); ?>','<?php echo ($bupt["item_name"]); ?>')" class="button radius-none bg-yellow margin-left">取消收藏</button></span></div>
			<div class="x12 text-gray">
				<div class="x6">
					<span class="x12">融资总额: <span class="text-red">￥<?php echo ($bupt["raising_money"]); ?></span></span>
				</div>
				<div class="x6">
					<span class="x12">投资方占比: <span class="text-red"><?php echo ($bupt["investment_rate"]); ?>%</span></span>
				</div>
			</div>
			<div class="x12 text-gray">
				<div class="x6">
					<span class="x12">最低投资: <span class="text-red">￥<?php echo ($bupt["lowest_money"]); ?></span></span>
				</div>
				<div class="x6">
					<span class="x12">已完成: <span class="text-red"><?php echo ($bupt["investment_rate"]); ?>%</span></span>
				</div>
			</div>
		</div>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>
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
<script>
	function collect(id,itemname){
		layer.confirm('您是否要取消《'+itemname+'》的收藏', {
		    btn: ['是','否'] //按钮
		}, function(){
		    $.post("/index.php?s=/User/Investor/collect_del", {
			 	id: id,
			},function(d){
				if (d.status == 1) {
					layer.open({
					    content: d.info,
					    yes: function(index){
					        layer.close(index); //一般设定yes回调，必须进行手工关闭
					        layer.closeAll('page');
					        window.location.reload()
					    }
					});  
				}else{
					layer.open({ content: d.info,});
				}
		   	});
		}, function(){
		    layer.msg('您选择了取消', {shift: 2});
		});
	}
</script>
</body>
</html>