<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <link rel="icon" href="/codepencil/Public/images/logo-16.png" sizes="16x16">
    <title>404 Not Found</title>
    <style>
        * {
            padding: 0px;
            margin: 0px;
        }
        html, body{
            height: 100%;
        }
        body {
            background-color: #252527;
        }
        .back-img {
            background-color: #252527;
            width: 800px;
            height: 450px;
            position: absolute;
            left: calc(50% - 400px);
            top: calc(50% - 225px);
            position: relative;
        }
        #eye-left {
            left: 322px;
            top: 176px;
            position: absolute;
        }
        #eye-right {
            left: 451px;
            top: 176px;
            position: absolute;
        }
    </style>
</head>
<body>
    <div class="back-img">
        <img src="/codepencil/Public/images/405.png" alt="">
        <img src="/codepencil/Public/images/left-eye.png" id="eye-left" alt="">
        <img src="/codepencil/Public/images/right-eye.png" id="eye-right" alt="">
    </div>
    <script src="/codepencil/Public/js/jquery-2.1.4.js"></script>
    <script src="/codepencil/Public/js/404.js"></script>
</body>
</html>