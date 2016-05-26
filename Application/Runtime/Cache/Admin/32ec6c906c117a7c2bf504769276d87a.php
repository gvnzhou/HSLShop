<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->

    <title>天猴商城后台登录页面</title>

    <!-- Bootstrap core CSS -->
    <link href="/HSLshop/Public/admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/HSLshop/Public/admin/css/signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form id="alogin-form" class="form-signin" >
        <h2 class="form-signin-heading text-center">后台管理中心</h2>
        <label for="inputEmail" class="sr-only">用户名</label>
        <input type="text" id="inputUserName" name="username" class="form-control" placeholder="用户名" autocomplete="off">
        <label for="inputPassword" class="sr-only">密码</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="密码" autocomplete="off">
        <strong id="tip" class="text-danger">asdasda</strong>
        <button class="btn btn-lg btn-primary btn-block" type="button" id="login-btn">登录</button>
      </form>

    </div> <!-- /container -->

    <script src="/HSLshop/Public/admin/js/jquery-1.12.2.min.js"></script>
    <script src="/HSLshop/Public/admin/js/basic.js"></script>

  </body>
</html>