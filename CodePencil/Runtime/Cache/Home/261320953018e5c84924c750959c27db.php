<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
	<title>SIPC Codepencil</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/codepencil/Public/images/logo-16.png" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="/codepencil/Public/css/reset.css">
	<link rel="stylesheet" type="text/css" href="/codepencil/Public/css/login.css">
	<style>
		.formContainer {
			max-width: 600px;
			margin: 0 auto;
			padding: 20px 20px 150px 20px;
			position: relative;
		}
		@media (max-width: 550px){
			.github {
				display: none;
			}
			header {
				margin-top: 20px;
				margin-bottom: 20px;
			}
			header > img {
				width: 25px;
				height: 25px;
			}
			form > div > label {
				font-size: 13px;
			}
			header > .sipc, header > .code {
				font-size: 23px;
			}
			header > div >h1 {
				font-size: 50px;
			}
		}
	</style>
</head>
<body>
	<div class="formContainer">
		<header>
			<img src="/codepencil/Public/images/logo.png" class="sipcImg" style="cursor:pointer;">
			<span class="sipc">SIPC</span>
			<span class="code">codepencil</span>
			<div>
				<h1><a href="/codepencil/index.php/index">Log in!</a></h1>
				<a href="https://github.com/SIPC115" class="github">Fork in with GitHub</a>
			</div>
		</header>
		<form method="post" action="/codepencil/index.php/Log/login">
			<div>
				<label id="username">USERNAME</label>
				<input type="text" name="username">
			</div>
			<div>
				<label id="password">PASSWORD</label>
				<input type="password" name="password">
			</div>
				<input type="checkbox">
				<span id="show">SHOW PASSWORD</span>
			<button>Login</button>
		</form>
	</div>
	<script src="/codepencil/Public/js/login.js"></script>
	<script>
		document.querySelector(".sipcImg").onclick = function() {
			window.location.href = "/codepencil/index.php/index";
		}
	</script>
</body>
</html>