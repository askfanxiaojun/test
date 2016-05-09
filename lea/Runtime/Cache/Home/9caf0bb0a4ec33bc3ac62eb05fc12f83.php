<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html lang="zh-cn"><head>    <title>BUPT众筹</title>    <meta name="keywords" content="BUPT众筹管理后台"/>    <meta name="description" content="BUPT众筹管理后台"/>    <meta name="viewport" content="width=device-width, initial-scale=1.0">    <link rel="stylesheet" href="/Public/css/bootstrap.css">    <link rel="stylesheet" href="/Public/css/pintuer.css">    <link rel="stylesheet" href="/Public/css/fan.css">    <link rel="stylesheet" href="/Template/Home/default/css/bupt.css">    <script src="/Public/js/jquery-1.8.3.min.js"></script>    <script src="/Public/js/bootstrap.js"></script>    <script src="/Public/js/pintuer.js"></script>    <script src="/Public/js/respond.js"></script>    <script src="/Public/lib/layer/layer.js"></script></head><body style="background:#f0f0f0">    <!-- 导航 m-->    <style>

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
    <!-- banner -->    <div class="banner">        <div class="carousel">            <?php $info = M("ad")->where("type =1")->select();foreach ($info as $i => $bupt): ?><div class="item">                    <a href="<?php echo ($bupt["url"]); ?>"><img src="<?php echo ($bupt["img"]); ?>" alt="<?php echo ($bupt["name"]); ?>"></a>                </div><?php endforeach ?>        </div>    </div>    <!-- box1  -->    <!-- box2 -->    <div class="container margin-big-top">        <!-- 项目  -->        <div class="x12 padding-big-right">            <div class="title-card">                <div class="row">                        <h1 class="title-name">热门众筹</h1>                        <a href="<?php echo U('Home/Item/index');?>" target="_blank"><button type="button" class="btn btn-default btn-sm title-btn" style="float:right">                            查看更多</button></a>                </div>            </div>            <div class="margin-small-top">                <?php $itemList = D("User/item")->loadList("a.status =1 AND a.progress =1 AND a.end_time >1462716724 AND a.isdel = 0","10","sort desc");foreach ($itemList as $i=>$bupt):$bupt["url"]=U("Item/info",array("id"=>$bupt["id"]));$bupt["last_time"]=gettime($bupt["end_time"]-time());$bupt["success_rate"]=D("User/ItemWithOrder")->successRate($bupt["id"]);$bupt["count_money"]=D("User/ItemWithOrder")->countMoney($bupt["id"]);?><div class="col-md-4 card">                        <div class="thumbnail">                            <a href="<?php echo ($bupt["url"]); ?>" target="_blank"><img src="<?php echo ($bupt["cover_img"]); ?>" alt="<?php echo ($bupt["name"]); ?>"></a>                            <div class="float-right text-right" style="margin-top:-33px;margin-right:-13px;position: relative;">                                <span class="button bg-dot radius-none"><?php echo ($bupt["progress_name"]); ?></span>                                <i class="status-icons" style="right: 0px;"></i>                            </div>                            <div class="caption">                                <a href="<?php echo ($bupt["url"]); ?>" target="_blank"><h3 style="height:50px;"><?php echo ($bupt["name"]); ?></h3></a>                                <div style="height:80px;">                                    <p class="intro"><?php echo ($bupt["desc"]); ?> </p>                                </div>                                <div class="progress">                                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">                                        <span class="sr-only">60% Complete</span>                                    </div>                                </div>                                <div class="row">                                    <div class="col-md-3">                                        <p class="num">$<?php echo ($bupt["count_money"]); ?></p>                                        <p class="p-num">已筹金额</p>                                    </div>                                    <div class="col-md-3">                                        <p class="num"><?php echo ($bupt["success_rate"]); ?>%</p>                                        <p class="p-num">达成率</p>                                    </div>                                    <div class="col-md-3">                                        <p class="num">100</p>                                        <p class="p-num">筹款人数</p>                                    </div>                                    <div class="col-md-3">                                        <p class="num"><?php echo ($bupt["last_time"]); ?></p>                                        <p class="p-num">剩余天数</p>                                    </div>                                </div>                            </div>                        </div>                    </div><?php endforeach ?>            </div>        </div>    </div>    <!-- 底部 -->    <div class="container-layout text-gray  bg-black bg-inverse padding-big-top padding-big-bottom margin-big-top" >
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
</div></body></html>