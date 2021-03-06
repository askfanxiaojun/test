<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="/Public/css/pintuer.css">
<script src="/Public/js/jquery-1.8.3.min.js"></script>
<script src="/Public/lib/layer/layer.js"></script>
 <div class="x12 padding-large ">
       <form method="post" class="form-x">
		  <div class="form-group x6">
			<div class="label padding-right">真实姓名 : </div>
			<div class="field">
			  <input type="text" class="input input-auto box-shadow-none radius-none"  name="name" size="30" placeholder="" />
			</div>
		  </div>
		  <div class="form-group x6">
			<div class="label padding-right">卡号 : </div>
			<div class="field">
			  <input type="text" class="input input-auto box-shadow-none radius-none"  name="card" size="30"  />
			</div>
		  </div>
		  <div class="form-group x6">
			<div class="label padding-right">卡类型 : </div>
			<div class="field">
			  <input type="text" class="input input-auto box-shadow-none radius-none"  name="type" size="30"  />
			</div>
		  </div>
		  <div class="form-group x6">
			<div class="label padding-right">开户行 : </div>
			<div class="field">
			  <input type="text" class="input input-auto box-shadow-none radius-none"  name="bank" size="30"  />
			</div>
		  </div>
		  <div class="form-button x12 text-center"><button class="button bg-blue icon-plus" onclick="bank_add(this)" type="button"> 新增此卡</button></div>
		</form>
      </div>
	  <script>	
  		$("input[name='card']").bind('input propertychange', function() {	
			var rates=$(this).val();
			$.get("/User/Bank/bankInfo",{
				card:rates
			},function(d){
				$("input[name='type']").val(d.info);
			})
		})

	  //创建节点
		function bank_add(d){
			var name=$("input[name='name']");
			var card=$("input[name='card']");
			var type=$("input[name='type']");
			var bank=$("input[name='bank']");
			if(name.val()==''){
				layer.tips('请填写真实姓名', name);
				name.focus();
				return false
			}
			if(card.val()==''){
				layer.tips('请填写卡号', card);
				card.focus();
				return false
			}
			if(type.val()==''){
				layer.tips('请填写卡类型', type);
				type.focus();
				return false
			}
			if(bank.val()==''){
				layer.tips('请填写开户行', bank);
				bank.focus();
				return false
			}
			$.post("/User/Bank/bank_in",{
				name:name.val(),
				card:card.val(),
				type:type.val(),
				bank:bank.val(),
			},function(d){
				if(d.status==1){
					 parent.layer.msg(d.info, {
						offset: 200,
						shift: 2
					});
					 parent.window.location.reload()
				}else{
					layer.msg(d.info, {
						offset: 200,
						shift: 2
					});
				}
			})			
		}
		</script>