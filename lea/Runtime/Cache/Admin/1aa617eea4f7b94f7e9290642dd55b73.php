<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
  <title></title>
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
      <form class="form-inline" action="#" method="post"  autocomplete="off">
        <?php if(is_array($video)): $i = 0; $__LIST__ = $video;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="field padding">
		   <span><?php echo ($vo["pname"]); ?>视频 : </span>
		   
		   <input type="text" class="input radius-none box-shadow-none" size="100" value="<?php echo ($vo["url"]); ?>"  placeholder="视频地址" />
		   <button class="button button-small bg-sub radius-none" type="button" onclick="save(<?php echo ($vo["pid"]); ?>,<?php echo ($itemid); ?>,this)">保存</button>
		 
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
      </form>

    </div>
  </div>
<script type="text/javascript">
function save(type,itemid,d){
	var url=$(d).prev('input');
	if(url.val().length < 1){
		layer.tips('视频地址不能为空', url, {
			tips: [4, '#78BA32']
		});
		url.focus()
		return false
	}
	
      $.ajax({
        type: 'POST',
        url: '/index.php?s=/Admin/Item/item_video',
        data: {
          type:type,
		  itemid:itemid,
		  url:url.val()
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