<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <title>天猴商城 - 买买买！你喜欢的</title>
  <link rel="stylesheet" href="/HSLshop/Public/home/css/style.css">
</head>
<body>
  <div class="header">
    <div class="wrap clearfix">
      <ul class="nav-user">

        <?php if(isset($_SESSION['username'])): ?><li>欢迎，<a href="/HSLshop/index.php/Home/Users/index"><?php echo (session('username')); ?></a></li>
          <li><a href="/HSLshop/index.php/Home/Users/exitUser">退出</a></li>

        <?php else: ?>
          <li><a href="/HSLshop/index.php/Home/Users/login">你好，请登录</a></li>
          <li><a href="/HSLshop/index.php/Home/Users/register" class="text-orange">免费注册</a></li><?php endif; ?>

        


      </ul>
      <ul class="navbar">
        <li><a href="/HSLshop/index.php">首页</a></li>
        <li><a href="/HSLshop/index.php/Home/Cart/index">我的购物车</a></li>
        <li><a href="/HSLshop/index.php/Home/Order/myOrder">我的订单</a></li>
        <li><a href="/HSLshop/index.php/Home/Board">留言板</a></li>
      </ul>
    </div>
  </div>
      
  
  
  
  <div class="container">
    <div class="container-wrap clearfix">
      
      <div class="reg-box">

        <h1>注册天猴商城账户</h1>
        <div class="input-box">
          <input type="text" placeholder="输入邮箱账号" id="useremail">
        </div>
        <div class="input-box">
          <input type="text" placeholder="输入用户名" id="username">
        </div>
        <div class="input-box">
          <input type="password" placeholder="输入密码" id="password">
        </div>
        <div class="input-box">
          <input type="password" placeholder="再次输入密码" id="password2"><p id="tip"></p>
        </div>
        <button id="reg-btn" class="reg-btn">立即注册</button>



      </div>

     
      

    </div>  
  </div>


  <div class="footer">
    <p>javion25.github.io 版权所有 &copy;</p>
  </div>

  <script src="/HSLshop/Public/home/js/jquery-1.12.2.min.js"></script>
  <script src="/HSLshop/Public/home/js/basic.js"></script>
</body>
</html>