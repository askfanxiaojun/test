<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>

<html lang="zh-cn">

<head>

  <title>BUPT众筹管理后台</title>

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
          <span class=" text-red" style="font-size: 32px;">BUPT</span><span class="text-gray padding-left">众筹管理后台</span>
        </a>
      </div>
		<div class="x8  text-right float-right">
			<div class="navbar-text navbar-right hidden-s">
			 <span class="padding-right"> 欢迎登录 <?php echo session('admin_username');?> ( <?php echo ($group_name); ?>  ) </span>	
			 <a href="javascript:void(0)" onclick="my_edit()" class="button button-small icon-cog bg-blue"> 设置</a>
			  <a href="/" target="_blank"  class="button button-small icon-link bg-blue"> 访问网站</a>
			 <button type="button" onclick="delcahe()" class="button button-small icon-power-off bg-blue"> 删除缓存</button>
			 <button type="button" id="loginout" class="button button-small icon-power-off bg-blue"> 退出系统</button></div>
		</div>

      </div>

    </div>

  </div>

<script>
	function delcahe(){
		$.get("/index.php?s=/Admin/Delcahe/index",function(ret){
			layer.msg(ret.info,{shift:2})
		})
	}
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

		<?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['name']);?>" class="button  padding-top padding-big-left border-none radius-none padding-bottom x12 <?php if('/index.php?s=/Admin/System/index.html' == '/'.$vo['name'].'.html'): ?>bg-sub<?php endif; ?>"> <?php echo ($vo["title"]); ?> <span class="float-right icon-angle-right"></span></a>

		<?php if(is_array($vo["sub_menu"])): $i = 0; $__LIST__ = $vo["sub_menu"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo U($v['name']);?>" class="padding-large-left button x12  border-none radius-none <?php if('/index.php?s=/Admin/System/index.html' == '/'.$v['name'].'.html'): ?>bg-sub<?php endif; ?>"><span class="padding-left"><?php echo ($v["title"]); ?><span class="float-right icon-angle-right"></span></span></a><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>

	</div>

	<div class="clearfix"></div>

		<div class="padding text-center text-small text-gray">

			<a href="http://www.zhimale.com" class=" text-gray padding-right">帮助中心</a>|

			<a href="http://www.zhimale.com" class="text-gray padding-left">联系我们</a>

			<span class="text-gray padding-top x12">ZHIMALE 版权所有</span>
			<span class="text-gray padding-top x12">版本号 <?php echo ZHIMALE_V ?></span>

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

</script> <div class="x12 padding border-bottom height-big"> 	<h5>网站设置</h5> </div> <div class="clearfix"></div> <div class="padding  x12"> 	<div class="border x12"> 		<div class="bg padding ">网站基本信息</div> 		<div class="height-large padding border-bottom x12"> 			<span class="text-gray x2">网站名称</span> 			<span class="x9" id="sitename"><?php echo (C("sitename")); ?></span> 			<a href="###" class="text-blue" onclick="edit_d('sitename','<?php echo (C("sitename")); ?>')">修改</a> 		</div> 		<div class="height-large padding border-bottom x12"> 			<span class="text-gray x2">网站域名</span> 			<span class="x9" id="domain"><?php echo (C("domain")); ?></span> 			<a href="###" class="text-blue" onclick="edit_d('domain','<?php echo (C("domain")); ?>')">修改</a> 		</div> 		<div class="height-large padding border-bottom x12"> 			<span class="text-gray x2">网站标志</span> 			<span class="x9"><img src="<?php echo (C("logo")); ?>" class="logo" height="60" /></span> 			<a class="input-file text-blue" href="javascript:void(0);">	 				上传 				<input size="100" type="file" id='fileupload' name='mypic' /> 			</a>	 		</div> 		<div class="height-large padding border-bottom x12"> 			<span class="text-gray x2">网站副标题</span> 			<span class="x9" id="title"><?php echo (C("title")); ?></span> 			<a href="###" class="text-blue" onclick="edit_d('title','<?php echo (C("title")); ?>')">修改</a> 		</div> 		<div class="height-large padding border-bottom x12"> 			<span class="text-gray x2">网站关键词</span> 			<span class="x9" id="keywords"><?php echo (C("keywords")); ?></span> 			<a href="###" class="text-blue" onclick="edit_d('keywords','<?php echo (C("keywords")); ?>')">修改</a> 		</div> 		<div class="height-large padding border-bottom x12"> 			<span class="text-gray x2">网站简介</span> 			<span class="x9" id="desc"><?php echo (C("desc")); ?></span> 			<a href="###" class="text-blue"  onclick="edit_d('desc','<?php echo (C("desc")); ?>')">修改</a> 		</div> 		<div class="height-large padding   x12"> 			<span class="text-gray x2">URL模式</span> 			<span class="x9" > 				<label class="button "><input name="URL_MODEL" value="1" <?php if(C("URL_MODEL")== '1'): ?>checked<?php endif; ?> type="radio"> PATHINFO模式</label> 				<label class="button "><input name="URL_MODEL" value="2" <?php if(C("URL_MODEL")== '2'): ?>checked<?php endif; ?> type="radio"> REWRITE模式	</label> 				<label class="button "><input name="URL_MODEL" value="3" <?php if(C("URL_MODEL")== '3'): ?>checked<?php endif; ?> type="radio"> 兼容模式</label> 			</span> 			<a href="javascript:void(0)" class="text-blue"  onclick="save_url()">确认</a> 		</div> 	</div> </div></div><script type="text/javascript" src="/Public/js/form.js"></script><script type="text/javascript">function save_url(){	var urlmode=$("input[name='URL_MODEL']:checked").val();	layer.confirm('修改URL模式，如果你的环境不支持的话网站会打不开哟！', {		btn: ['确定','取消'] //按钮	}, function(){		edit('URL_MODEL',urlmode);	}, function(){		layer.msg('你选择了取消', {shift: 6});	});}function edit_d(name,v){	//var html='<input type="text" size="30" class="input input-auto" name="'+name+'" value="'+v+'" />';	layer.prompt({title: '编辑修改', formType: 2,value:v}, function(text){		edit(name,text);	});}function edit(name,d){	var sitename='<?php echo (C("sitename")); ?>';	var domain='<?php echo (C("domain")); ?>';	var logo='<?php echo (C("logo")); ?>';	var title='<?php echo (C("title")); ?>';	var keywords='<?php echo (C("keywords")); ?>';	var desc='<?php echo (C("desc")); ?>';	var huancun='<?php echo (C("huancun")); ?>';	var rootPath='<?php echo (C("rootPath")); ?>';	var upload_exts='<?php echo (C("upload_exts")); ?>';	var urlmode='<?php echo (C("URL_MODEL")); ?>';	if(name=='rootPath'){		rootPath=d;	}	if(name=='URL_MODEL'){		urlmode=d;	}	if(name=='upload_exts'){		upload_exts=d;	}	if(name=='sitename'){		sitename=d;	}	if(name=='domain'){		domain=d;	}	if(name=='logo'){		logo=d;	}	if(name=='title'){		title=d;	}	if(name=='keywords'){		keywords=d;	}	if(name=='desc'){		desc=d;	}	if(name=='huancun'){		huancun=d;	}	$.post(		'/index.php?s=/Admin/System/index',		{			sitename:sitename,			domain:domain,			logo:logo,			title:title,			keywords:keywords,			desc:desc,			huancun:huancun,					upload_exts:upload_exts,					rootPath:rootPath,			URL_MODEL:urlmode,						},function(e){			if(e.status==0){				parent.layer.msg(e.info, {					offset: 200,					shift: 2				});			}else{				$("#"+name).text(d);				layer.closeAll()				window.location.reload();			}		}		)}$(function () {	var bar = $('.bar');	var percent = $('.jindu');	var showimg = $('.content');	var progress = $(".jindu");	var files = $(".files");	var btn = $(".btn span");	$("#fileupload").wrap("<form id='myupload' action='/index.php?s=/Admin/Upload' method='post' enctype='multipart/form-data'></form>");	$("#fileupload").change(function(){		$("#myupload").ajaxSubmit({			dataType:  'json',			beforeSend: function() {				var index = layer.load(1, {					shade: [0.1,'#fff'] //0.1透明度的白色背景				});			},			success: function(data) {				if(data.status==0){					layer.open({						content:data.info,						btn:['好的'],						yes:function(){							layer.closeAll()						}					})				}else{					var img = data.url;					$(".logo").attr('src',img);					edit('logo',img);				}			}		});	});});</script></body></html>