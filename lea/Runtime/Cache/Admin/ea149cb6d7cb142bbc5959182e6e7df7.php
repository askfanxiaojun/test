<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
  <title>$bupt.title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/Public/css/pintuer.css">
  <script src="/Public/js/jquery-1.8.3.min.js"></script>
  <script src="/Public/js/pintuer.js"></script>
  <script src="/Public/js/respond.js"></script>
  <script src="/Public/lib/layer/layer.js"></script>
  <script type="text/javascript" src="/Public/lib/validform/Validform.min.js"></script>
  <link href="/Public/lib/validform/style.css" rel="stylesheet" type="text/css">
</head>
<body>

  <div class="container">
    <div class="x12 padding">

      <form class="form" action="#" method="post" autocomplete="off">
        <label class="label">分类名称：</label>
        <input type="text" class="input box-shadow-none radius-none" id="name" value="<?php echo ($info["name"]); ?>" datatype="*" placeholder="分类名称" />

        <label class="label">上级分类：</label>
        <select class="input box-shadow-none radius-none" id="pid">
          <option value="0" <?php if($info['pid'] == 0 ): ?>selected<?php endif; ?>>无</option>
          <?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($info['pid'] == $vo['id'] ): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>

        <label class="label">分类排序：</label>
        <input type="number" min="0" class="input box-shadow-none radius-none" id="sort" value="<?php echo ((isset($info["sort"]) && ($info["sort"] !== ""))?($info["sort"]):'0'); ?>" datatype="*" />

        <label class="label">分页条数：</label>
        <input type="number" min="1" class="input box-shadow-none radius-none" id="limit" value="<?php echo ((isset($info["limit"]) && ($info["limit"] !== ""))?($info["limit"]):'10'); ?>" datatype="*" />
		
		<label class="label">SEO标题 ：</label>
        <input type="text" class="input box-shadow-none radius-none" id="title"  value="<?php echo ($info["title"]); ?>" datatype="*" />
	
		<label class="label">SEO关键词 ：</label>
        <input type="text" class="input box-shadow-none radius-none" id="keywords"  value="<?php echo ($info["keywords"]); ?>" datatype="*" />
		
		<label class="label">SEO描述 ：</label>
        <input type="text" class="input box-shadow-none radius-none" id="description"  value="<?php echo ($info["description"]); ?>" datatype="*" />

        <div class="margin-big-top">
        <button class="btn button bg-sub" type="button" onclick="save()"> 确 定</button>
        </div>
      </form>

    </div>
  </div>
<script type="text/javascript">
function save(){
	var name=$("#name").val();
	if(name.length < 1){
		layer.tips('标题不能为空','#name');
		$("#name").focus()
		return false
	}
      $.ajax({
        type: 'POST',
        url: '/index.php?s=/Admin/Item/item_category_add.html',
        data: {
          name: $("#name").val(),
          pid: $("#pid").val(),
          sort:$("#sort").val(),
          limit:$("#limit").val(),
          description:$("#description").val(),
          title:$("#title").val(),
          keywords:$("#keywords").val(),
        },
        dataType: "json",
        beforeSend: function() {
          layer.load(2, {
            shade: [0.1, '#fff']
          })
        },
        success: function(data) {
          layer.closeAll();
          if (data.status == 1) {
            parent.layer.msg(data.info, {
              shift: 2,
              time: 1000,
              shade: [0.1, '#000'],
              end: function() {
                parent.location.reload()
              }
            })
          } else {
            parent.layer.alert(data.info, {
              icon: 5
            })
          }
        }
      });
 }
</script>
</body>
</html>