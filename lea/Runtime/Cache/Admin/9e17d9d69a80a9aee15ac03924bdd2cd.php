<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="/Public/css/pintuer.css">
<script src="/Public/js/jquery-1.8.3.min.js"></script>
<script src="/Public/js/pintuer.js"></script>
<script src="/Public/lib/layer/layer.js"></script>
      <div class="x12 padding-large">
		  <div class="form-group">
			<div class="field">
			 <span class=" padding-right">角色名称 : </span>
			 <input type="text" class="input input-auto box-shadow-none radius-none" value="<?php echo ($group_info["title"]); ?>"  name="title" size="20"  />
			</div>
		  </div>
		  <div class="">选择权限 : </div>
		  <div class="clearfiex"></div>
		<div class="collapse">
		 <?php if(is_array($rule_list)): $i = 0; $__LIST__ = $rule_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="panel">
			<div class="panel-head bg "><span class="float-right"><label><input type="checkbox" name="rules[]" onclick="checkd(this,1)" <?php if(in_array($vo['id'],$group_info['rules'])): ?>checked<?php endif; ?> value="<?php echo ($vo["id"]); ?>" /> 选择</label></span> <?php echo ($vo["title"]); ?> </div>
			<div class="panel-body">
				<ul class="list-group">
					<?php if(is_array($vo["sub"])): $i = 0; $__LIST__ = $vo["sub"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span class="float-right"><label><input type="checkbox" name="rules[]" value="<?php echo ($v["id"]); ?>" onclick="checkd(this,0)"<?php if(in_array($v['id'],$group_info['rules'])): ?>checked<?php endif; ?> /> 选择</label></span><?php echo ($v["title"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		  </div><?php endforeach; endif; else: echo "" ;endif; ?>
		 
		</div>
		<div class="text-center clearfiex margin-top">
			<button class="button bg-blue" onclick="rules_save(this)" type="button">保存</button>
		</div>
	  </div>
    </div>
	<script>
		function rules_save(d){
			var title=$("input[name='title']").val();
			var rules=new Array();
			$("input[name='rules[]']:checked").each(function(i,v){
				rules.push($(v).val());
			})
			$.post("/index.php?s=/Admin/Auth/role_add",{title:title,rules:rules.join(',',rules)},function(ret){
				if(ret.status==1){
					parent.layer.msg(ret.info, {
						offset: 200,
						shift: 2
					});
					parent.window.location.reload()
				}else{
					layer.msg(ret.info, {
						offset: 200,
						shift: 2
					});
				}
			})
		}
		//全选
		function checkd(a,b){
			if(b==1){									
				var c=$(a).parent().parent().parent().parent().find("li input[name='rules[]']");
				$(a).attr('checked',$(a).attr("checked"))
				$(c).attr('checked',!$(c).attr("checked"))
			}
		}
	</script>