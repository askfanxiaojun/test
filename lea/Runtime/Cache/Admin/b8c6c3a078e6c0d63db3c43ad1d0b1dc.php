<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
  <title>芝麻乐众筹管理后台</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/Public/css/pintuer.css">
  <script src="/Public/js/jquery-1.8.3.min.js"></script>
  <script src="/Public/js/pintuer.js"></script>
  <script src="/Public/js/respond.js"></script>
  <script src="/Public/lib/layer/layer.js"></script>
</head>
<body style="background:#fafafa;">
	<!-- 导航 -->

<div class="container-layout  bg-white border-bottom margin-bottom">
  <div class="container padding-big-top padding-big-bottom">
    <div class="x12">
      <div class="x2 ">
        <a href="javascript:void(0)">
          <span class=" text-red" style="font-size: 32px;">芝麻乐</span><span class="text-gray padding-left">众筹管理后台</span>
        </a>
      </div>
		<div class="x8  text-right float-right">			<div class="navbar-text navbar-right hidden-s">
			 <span class="padding-right"> 欢迎登录 <?php echo session('admin_username');?> ( <?php echo ($group_name); ?>  ) </span>	
			 <a href="javascript:void(0)" onclick="my_edit()" class="button button-small icon-cog bg-blue"> 设置</a>
			  <a href="/" target="_blank"  class="button button-small icon-link bg-blue"> 访问网站</a>
			 <button type="button" onclick="delcahe()" class="button button-small icon-power-off bg-blue"> 删除缓存</button>			 <button type="button" id="loginout" class="button button-small icon-power-off bg-blue"> 退出系统</button></div>
		</div>
      </div>
    </div>
  </div>
<script>	function delcahe(){		$.get("/index.php?s=/Admin/Delcahe/index",function(ret){			layer.msg(ret.info,{shift:2})		})	}
	function my_edit(id){	
		layer.open({
			type: 2,
			area: ['700px', '360px'],
			fix: true, //不固定
			maxmin: true,
			title:'用户设置',
			content: '/index.php?s=/Admin/Auth/my_edit'
		});
	}
</script>
 <div class="container">
	<div class="border x12">
    <div class="x2 bg-white border-right">	
	<div class="x12" style="min-height:800px">
	<div class="x12 border-bottom padding-bottom">
		<?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['name']);?>" class="button  padding-top padding-big-left border-none radius-none padding-bottom x12 <?php if('/index.php?s=/Admin/Funds/money_details/uin/1.html' == '/'.$vo['name'].'.html'): ?>bg-sub<?php endif; ?>"> <?php echo ($vo["title"]); ?> <span class="float-right icon-angle-right"></span></a>
		<?php if(is_array($vo["sub_menu"])): $i = 0; $__LIST__ = $vo["sub_menu"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo U($v['name']);?>" class="padding-large-left button x12  border-none radius-none <?php if('/index.php?s=/Admin/Funds/money_details/uin/1.html' == '/'.$v['name'].'.html'): ?>bg-sub<?php endif; ?>"><span class="padding-left"><?php echo ($v["title"]); ?><span class="float-right icon-angle-right"></span></span></a><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
	</div>
	<div class="clearfix"></div>
		<div class="padding text-center text-small text-gray">
			<a href="http://www.zhimale.com" class=" text-gray padding-right">帮助中心</a>|
			<a href="http://www.zhimale.com" class="text-gray padding-left">联系我们</a>
			<span class="text-gray padding-top x12">ZHIMALE 版权所有</span>			<span class="text-gray padding-top x12">版本号 <?php echo ZHIMALE_V ?></span>
		</div> 
	</div>
            
    </div>
    <div class="x10 bg-white" style="min-height:680px;">
<script>

  $(function(){
    $('#loginout').click(function(){
      layer.confirm('确定要退出吗？', {icon: 3},function(){
        parent.layer.msg('退出成功!', {
          shift: 2,
          time: 1000,
          shade: [0.1,'#000'],
          end: function(){
            window.location.href = '<?php echo U('/Admin/Public/logout');?>';
          }
        });
      });
     });
  });

  //全局配置
layer.config({
    extend: [
        'extend/layer.ext.js' 
    ]
});
</script>
<div class="x12 padding border-bottom">
	<span class="x2">资金明细</span>
	<div class="x6 ">
		<a href="<?php echo U('Admin/Funds/money_details');?>" class='x1  <?php if(!$_GET['type']): ?>text-red<?php endif; ?>'>全部</a>
		<a href="<?php echo U('Admin/Funds/money_details',array('type'=>1));?>" class='x1  <?php if($_GET['type'] == 1): ?>text-red<?php endif; ?>'>进账</a>
		<a href="<?php echo U('Admin/Funds/money_details',array('type'=>2));?>" class='x1  <?php if($_GET['type'] == 2): ?>text-red<?php endif; ?>'>出账</a>
	</div>

</div>
<div class="x12 padding">

<table class="table table-bordered text-small table-striped">
<tr>
	<th>用户</th>
	<th>用途</th>
	<th>类型</th>
	<th>金额</th>
	<th>余额</th>
	<th>创建时间</th>
	<th>更新时间</th>
	<th>备注</th>
	<th>状态</th>
</tr>
<?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bupt): $mod = ($i % 2 );++$i;?><tr>
	<td><a href="<?php echo U('Admin/Funds/money_details',array('uin'=>$bupt['uin']));?>" class="text-sub"><?php echo ($bupt["user_name"]); ?></a></td>
	<td><?php echo ($bupt["title"]); ?></td>
	<td><?php if($bupt['type'] == 1): ?>进账<?php else: ?>出账<?php endif; ?></td>
	<td><?php if($bupt['type'] == 1): ?>+<?php else: ?>-<?php endif; ?> <?php echo ($bupt["money"]); ?></td>
	<td>￥<?php echo ($bupt["balance"]); ?></td>
	<td><?php echo (date("Y-m-d h:i:s",$bupt["create_time"])); ?></td>
	<td><?php if($bupt['update_time']): echo (date("Y-m-d h:i:s",$bupt["update_time"])); endif; ?></td>
	<td title="<?php echo ($bupt["remark"]); ?>"><?php echo (cutStr($bupt["remark"],10)); ?></td>
	<td>
		<?php if($bupt['status'] == 1): ?><span class="text-red float-right">成功</span>
		<?php else: ?>
			<span class="text-red float-right">处理中...</span><?php endif; ?>
	</td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
</div>
<div class="clearfix"></div>
<div class="x12 text-center padding"><ul class="pagination pagination-group border-red pagination-small"><?php echo ($page); ?></ul></div>
</div>
</div>
</div>


</body>
</html>