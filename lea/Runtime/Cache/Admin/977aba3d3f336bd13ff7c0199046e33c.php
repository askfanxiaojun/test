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
        <label class="label">标签名称：</label>
        <input type="text" class="input box-shadow-none radius-none" id="name" value="<?php echo ($info["name"]); ?>" datatype="*" placeholder="分类名称" />

      
        <div class="margin-big-top">
        <button class="btn button bg-sub" type="submit"> 确 定</button>
        </div>
      </form>

    </div>
  </div>
<script type="text/javascript">
$(function() {

  function showmsg(msg) {
    layer.msg(msg, function() {})
  }

  $.Tipmsg.r = null;
  $(".form").Validform({
    tiptype: function(msg) {
      showmsg(msg)
    },
    tipSweep: true,
    callback: function(form) {

      $.ajax({
        type: 'POST',
        url: '/index.php?s=/Admin/Item/tags_add.html',
        data: {
          name: $("#name").val(),
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
      return false
    }
  })
});
</script>
</body>
</html>