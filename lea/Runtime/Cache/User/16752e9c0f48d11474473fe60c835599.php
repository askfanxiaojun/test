<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>发布的项目 - 会员中心芝麻乐开源众筹系统</title>
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
	<h1>我发布的项目</h1>
</div>
<div class="x12 text-center padding-top padding-bottom border-bottom border-top margin-top">
	<a href="<?php echo U('Item/index');?>" class='x1 <?php if(!$_GET['progress']): ?>border-right text-red<?php endif; ?>'>全部</a>
	<?php if(is_array($progresslist)): $i = 0; $__LIST__ = $progresslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bupt): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Item/index',array('progress'=>$bupt['id']));?>"  class="x1 <?php if($_GET['progress'] == $bupt['id']): ?>border-right text-red<?php endif; ?>"><?php echo ($bupt["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bupt): $mod = ($i % 2 );++$i;?><div class="x12 bg padding">
		<div class="x3 padding  bg-white"><img src="<?php echo ($bupt["cover_img"]); ?>" alt="<?php echo ($bupt["name"]); ?>" class="x12" height="94"></div>
		<div class="x9 bg padding bg-white border-left height-big" style="height: 114px;">
			<div>
				<span class="x6">
					<span class="text-big"><?php echo ($bupt["name"]); ?><a class="text-small text-gray" href="<?php echo U('User/Item/item_add',array('itemid'=>$bupt['id']));?>" class="text-gray"> 修改</a></span>
					<div class="x12 text-gray">
						<div class="x6">
							<span class="x12 text-small">融资总额: <span class="text-red">￥<?php echo ($bupt["raising_money"]); ?></span></span>
						</div>
						<div class="x6">
							<span class="x12 text-small">投资方占比: <span class="text-red"><?php echo ($bupt["investment_rate"]); ?>%</span></span>
						</div>
						<div class="x6">
							<span class="x12 text-small"> 已融资: <span class="text-red"> ￥<?php echo ($bupt["count_money"]); ?></span></span>
						</div>
						<div class="x6">
							<span class="x12 text-small">完成率: <span class="text-red"><?php echo ($bupt["success_rate"]); ?>%</span></span>
						</div>
					</div>
				</span>
				<span class="x6">
					<div class="x9">
						<button class="button radius-none bg-red button-small"><?php echo ($bupt["progress_name"]); ?></button>
						<button onClick="lead(<?php echo ($bupt["id"]); ?>,this)" class="button button-small radius-none bg-yellow margin-left">领投规则</button>
						<button onclick="video('<?php echo U('User/Item/item_video',array('itemid'=>$bupt['id']));?>')" class="button button-small radius-none bg-sub margin-left">视频管理</button>
						
					</div>
					<div class="x3">
						<span class="x12"><a href="<?php echo U('Item/interview',array('itemid'=>$bupt['id']));?>" class="button button-small bg-sub radius-none"><?php echo ($bupt["interview"]); ?>位约谈</a></span>
						<span class="x12 margin-top"><a href="<?php echo U('Lead/index',array('itemid'=>$bupt['id']));?>" class="button button-small bg-sub radius-none"><?php echo ($bupt["countlead"]); ?>位领投</a></span>
					</div>
				</span>
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
	function open_l(itemid,info){
		layer.open({
		    type: 1,
		    title:'设置领投规则',
		    skin: 'layui-layer-rim', //加上边框
		    area: ['600px', '450px'], //宽高
		    content: '<form class="form padding-big">'+
		    '<input type="hidden" name="itemid" value="'+itemid+'"/>'+
			'<div class="form-group">'+
				'<div class="label"><label for="manage_money">领投人管理服务费</label></div>'+
				'<div class="field field-icon-right">'+
					'<input type="text" class="input" id="manage_money" name="manage_money" value="'+info.manage_money+'" size="30" placeholder="纯数字" />'+
				'</div>'+
			'</div>'+
			'<div class="form-group">'+
				'<div class="label"><label for="num">领投人数量</label></div>'+
				'<div class="field field-icon-right">'+
					'<input type="text" class="input" id="num" name="num" size="30" value="'+info.num+'" placeholder="纯数字" />'+
				'</div>'+
			'</div>'+
			'<div class="form-group">'+
				'<div class="label"><label for="do_what">领投人义务</label></div>'+
				'<div class="field field-icon-right">'+
					'<textarea type="text" rows="5" class="input" id="do_what" name="do_what"  placeholder="领头人需要做什么">'+info.do_what+'</textarea>'+
				'</div>'+
			'</div>'+
			'<div class="form-button"><button class="button radius-none bg-red" type="button" onClick="sub(this)">提交</button></div>'+
			'</form>'
		});
	}
	//弹出设置层
	function lead(itemid,b){
		$.get("/index.php?s=/User/Lead/lead_list/itemid/"+itemid, function(d){
			if (d.status==1) {
				open_l(itemid,d.info);
			}else{
				layer.open({
				    content: d.info
				});  
			}
		});
	}
	function sub(a){
		var itemid = $('input[name="itemid"]');
		var manage_money = $('input[name="manage_money"]');
		var num = $('input[name="num"]');
		var do_what = $('textarea[name="do_what"]');
		if(manage_money.val()=='' || isNaN(manage_money.val())){
			layer.tips("纯数字填写","#manage_money",{
			    tips: 1
			})
			manage_money.focus();
			return false
		}
		if(num.val()=='' || isNaN(num.val())){
			layer.tips("纯数字填写","#num",{
			    tips: 1
			})
			num.focus();
			return false
		}
		if(do_what.val()==''){
			layer.tips("不能为空","#do_what",{
			    tips: 1
			})
			do_what.focus();
			return false
		}
		$.post("/index.php?s=/User/Lead/sub_lead", {
		 	itemid: itemid.val(),
		 	manage_money: manage_money.val(),
		 	num: num.val(),
		 	do_what: do_what.val(),
		},function(d){
			if (d.status == 1) {
				layer.open({
				    content: d.info,
				    yes: function(index){
				    	layer.close(index); //一般设定yes回调，必须进行手工关闭
				    	window.location.reload();
				    }
				}); 
			}else{
				alert(d.info);
			}
	   	});
	}
	function video(url){
		layer.open({
        type: 2,
        title: '提示',
        shadeClose: true,
        shade: 0.8,
        area: ['1000px', '570px'],
        content: url
      });
	}
</script>
</body>
</html>