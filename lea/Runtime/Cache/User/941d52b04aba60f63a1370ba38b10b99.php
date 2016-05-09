<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员中心 --BUPT众筹</title>
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

        <span class="x2">欢迎来到BUPT众筹！</span>

        <span class="x10 text-right text-pale"><?php if(session('user.uin')): ?><a href="<?php echo U('User/Index/index');?>" class="text-pale"><?php echo session('user.phone');?> 进入用户中心</a> | <a href="<?php echo U('/User/Login/logout');?>" class="text-pale">退出</a><?php else: ?></a><a href="<?php echo U('User/Login/index');?>" class="text-pale">登录</a> | <a href="<?php echo U('User/Login/reg');?>" class="text-pale">注册</a><?php endif; ?></span>

    </div>

</div>

<div class="container-layout  bg-white">

    <div class="container padding-big-top padding-big-bottom">

        <div class="x12">

            <div class="x2">

                <a href="/"><img src="/uploads/3/20160508/buptcms_1462715118513.png" alt="BUPT众筹"  class="img-responsive"></a>

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

<div class="padding border-bottom">
	<div class="step">
	 <div class="step-bar active" style="width:25%;"><span class="step-point icon-check"></span><span class="step-text">基本资料</span></span></div>
	 <div class="step-bar " style="width:25%;"><span class="step-point">2</span><span class="step-text">股权设置</span></div>
	 <div class="step-bar" style="width:25%;"><span class="step-point">3</span><span class="step-text">项目详情</span></div>
	 <div class="step-bar" style="width:25%;"><span class="step-point">4</span><span class="step-text">发起人信息</span></div>
	</div>
</div>
<div class="clearfix"></div>
<div class="padding  x12">
	<div class="border x12">
	<div class="bg padding "><strong>发起项目</strong></div>	
		<div class="height-large padding border-bottom x12">
			<span class="text-gray x2"><span class="text-red">*</span> 行业类别</span>
			<span class="x9">
				<select name="cid[]" class="input input-auto box-shadow-none radius-none"  id="first" onchange="loadRegion('first',2,'second','/index.php?s=/User/Item/get_category');">
				<option value="" >选择栏目</option>
				<?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($vo['id'] == $nowcate[0]['id']): ?>selected<?php endif; ?>  ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				<select name="cid[]" class="input input-auto box-shadow-none radius-none" id="second"  onchange="loadRegion('second',3,'third','/index.php?s=/User/Item/get_category');">
					<?php if($nowcate[1]['id']): ?><option value="<?php echo ($nowcate[1]['id']); ?>"><?php echo ($nowcate[1]['name']); ?></option>
					<?php else: ?>
						<option value="0">无</option><?php endif; ?>
				</select>
			</span>
			
		</div>
		<div class="height-large padding border-bottom x12">
			<span class="text-gray x2"><span class="text-red">*</span> 标签</span>
			<span class="x9" >
			  <div class="field">
				<div class="button-group checkbox">
				<?php if(is_array($tags)): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><label class="button radius-none margin-small <?php if(in_array($vo['id'],$tagsid)): ?>active<?php endif; ?>" onclick="choosetags(this)">
					<input name="tags[]" value="<?php echo ($vo["id"]); ?>" <?php if(in_array($vo['id'],$tagsid)): ?>checked="checked"<?php endif; ?> type="checkbox" /><span class="icon icon-check text-red"></span> <?php echo ($vo["name"]); ?>
				  </label><?php endforeach; endif; else: echo "" ;endif; ?> 
				</div>
			  </div>
			</span>
			
		</div>
		<div class="height-large padding border-bottom x12">
			<span class="text-gray x2"><span class="text-red">*</span> 项目名称</span>
			<span class="x9">
				<input type="text" name="name" value="<?php echo ($item["name"]); ?>" class="input box-shadow-none radius-none" />
			</span>
		</div>
		<div class="height-large padding border-bottom x12">
			<span class="text-gray x2"><span class="text-red">*</span> 项目简介</span>
			<span class="x9">
				<input type="text" name="desc" value="<?php echo ($item["desc"]); ?>" class="input box-shadow-none radius-none" />
			</span>
		</div>
		<div class="height-large padding border-bottom x12">
			<span class="text-gray x2"><span class="text-red">*</span>  筹资金额</span>
			<span class="x9">
				<input type="text" name="raising_money" value="<?php echo ($item["raising_money"]); ?>" placeholder="如：100000" class="text-small input input-auto box-shadow-none radius-none" size="20" /> 元
			</span>
		</div>
		
		<div class="height-large padding border-bottom x12">
			<span class="text-gray x2"><span class="text-red">*</span>  筹资结束时间</span>
			<span class="x9">
				<input type="text" name="end_time" placeholder="请选择" value="<?php if($item['end_time']): echo date('Y-m-d H:i:s',$item['end_time']); endif; ?>"  onclick="laydate({istime: true, min: laydate.now(), format: 'YYYY-MM-DD hh:mm:ss'})" class="text-small input input-auto box-shadow-none radius-none" size="20" /> 
			</span>
		</div>
		
		<div class="x12 padding text-center">
			<a href="javascript:void(0)" class="button button-big bg-red" onclick="add_item(this)">下一步</a>
		</div>
		
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

        <div class="x12 text-left text-little">版权所有 © BUPT众筹 All Rights Reserved，赣ICP备：380959609 <a href="http://www.zhimale.com">芝麻乐</a>版权所有</div>
    </div>
</div>
<div class="fixed-bottom-right margin-right" style="width:40px;right:10px;z-index: 99999;">
<!--     <div class="x12 txt radius-small bg-red margin-small-bottom icon-qrcode text-large"></div>
    <div class="x12 txt radius-small bg-red margin-small-bottom icon-pencil-square-o text-large"></div>
    <div class="x12 txt radius-small bg-red margin-small-bottom icon-question text-large"></div> -->
    <a href="javascript:;"  onclick="slideFunction('top');"><div class="txt radius-small bg-red margin-small-bottom icon-arrow-up text-large"></div></a>
</div>
<script>
function choosetags(d){
	var c=$("input[name='tags[]']:checked");
	if(c.length > 3){
		$(d).find('input[name="tags[]"]').attr('checked',false);
		layer.msg('最多可以选择3个标签');
	}
}
function add_item(d){
	var cids=$("select[name='cid[]']");
	var tags=$("input[name='tags[]']:checked");
	var name=$("input[name='name']");
	var raising_money=$("input[name='raising_money']");
	var desc=$("input[name='desc']");
	var end_time=$("input[name='end_time']");
	var cid=new Array();
	var tag=new Array();
	cids.each(function(){
		cid.push($(this).val());	
		
	})
	if(cids.val()==''){
		layer.tips('选择一个行业类别',cids);
		cids.focus()
		return false
	}
	if(desc.val()==''){
		layer.tips('简介还是要一个吧',desc);
		desc.focus();
		return false
	}
	//取CID最后一个不为0的id值
	var last = cid[cid.length - 1];
	if(last=='0'){
		last = cid[cid.length - 2];
		if(last=='0'){
			last = cid[cid.length - 3];
		}
	}
	tags.each(function(){
		tag.push($(this).val());
	})
	if(name.val()==''){
		layer.tips('项目名不能为空',name);
		name.focus()
		return false
	}
	if(raising_money.val()==''){
		layer.tips('筹资金额是一个数字喔',raising_money);
		raising_money.focus()
		return false
	}
	if(end_time.val()==''){
		layer.tips(' 筹资结束时间不能为空',end_time);
		end_time.focus()
		return false
	}
		<?php if($itemid): ?>var type=<?php echo ($itemid); ?>;
		<?php else: ?>
		var type="add";<?php endif; ?>
	
	$.post('/index.php?s=/User/Item/item_in',{
		name:name.val(),
		cid:last,
		tag:tag.join(','),
		raising_money:raising_money.val(),
		end_time:end_time.val(),
		type:type,
		desc:desc.val(),
	},function(data){
		if(data.status==1){
			window.location.href=data.url	
		}else{
			console.log(data)
			layer.msg(data.info)
		}
	})
}
</script>
<script src="/Public/lib/region.js"></script>
</body>
</html>