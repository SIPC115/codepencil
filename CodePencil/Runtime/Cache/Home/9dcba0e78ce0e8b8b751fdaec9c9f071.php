<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/codepencil/Public/images/logo-16.png" sizes="16x16">
    <title>SIPC Codepencil</title>
    <link rel="stylesheet" type="text/css" href="/codepencil/Public/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/codepencil/Public/css/base.css">
    <link rel="stylesheet" type="text/css" href="/codepencil/Public/css/user.css">
</head>
<body>
    <header class="main-header">
        <div class="title-area">
            <a href="<?php echo U('Index/index');?>" class="logo">
                <img src="/codepencil/Public/images/logo.png" alt="">
            </a>
            <div class="title-text">
                <h1 id="pen-title">
                    <!-- 这里a放置该帖子的title -->
                    <a href="<?php echo U('Code/readcode/readc/3');?>">
                        SIPC <span class="logo-center">Codepencil</span>
                    </a>
                </h1>
                <!-- 这里填用户名 -->
                <div class="by">前端代码分享平台</div>
                <!-- <div class="by"></div> -->
            </div>
        </div>
        <div class="title-btn">
            <div class="user-btn">
                <button class="btn buttonA" id="code-setting">
                    <!-- <a href="/codepencil/index.php/Code/index/cid/0"> -->
                    <?php if(!empty($_SESSION['uid'])){echo "<a href='/codepencil/index.php/Code/index/cid/0'>"; }else{ echo "<a href='/codepencil/index.php/Log/login'>"; } ?>
                    <i class="icon icon-pencil icon-link"></i>New Pen</a>
                </button>
                <button class="btn buttonA">
                    <?php if($_SESSION['username']){echo "<a href='/codepencil/index.php/Code/readcode/readc/2'>".$_SESSION['username'];}else{ echo "<a href='/codepencil/index.php/Log/login'>"."登录";} ?></a>
                </button>
                <button class="btn buttonA">
                    <?php if($_SESSION['username']){echo "<a href='/codepencil/index.php/Log/logout'>"."注销";}else{echo "注册";} ?></a>
                </button>
            </div>
        </div>
    </header>
    <div class="page-wrap">

        
            <div class="list-main">
                <?php if(is_array($code)): $i = 0; $__LIST__ = $code;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="list-area">
                        <div class="list-name"><a href="/codepencil/index.php/Code/index/cid/<?php echo ($vo["cid"]); ?>"><?php echo ($vo["codename"]); ?></a></div>
                        <div class="list-author">作者：<span><?php echo ($vo["username"]); ?></span></div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
       

        <ul class="pagination">
            <li>
                <?php echo ($page); ?>
            </li>
        </ul>
    </div>
    <script src="/codepencil/Public/js/jquery-2.1.4.js"></script>   
    <script>
        jQuery(document).ready(function($) {
            $("button").on("mousedown", function(event) {
                $(this).css({
                    "transform" : "translateY(2px)"
                });
                $(document).on("mouseup", buttonUp);
            });
            function buttonUp(event) {
                $("button").css({
                    "transform" : "translateY(0px)"
                });
                $(document).off("mouseup", buttonUp);
            }
            $(".buttonA").on("click", function(evnet) {
                var href = $(this).find("a").attr("href");
                if(href !== undefined) {
                    window.location.href = href;
                }
            })
        })
    </script>
</body>
</html>