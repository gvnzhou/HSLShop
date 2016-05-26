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
      
      

      <div class="user-info">
        <nav>
          <h2>我的天猴商城</h2>
          <a href="">修改资料</a>
          <a href="">我的订单</a>
        </nav>
        
        <div class="info-edit">
          <form action="">
            <div class="input-box">
              <label for="">用户名：</label><?php echo ($res["user_name"]); ?>
            </div>
            <div class="input-box">
              <label for="">密&nbsp;&nbsp;&nbsp;码：</label><input type="text">
            </div>
            <div class="input-box">
              <label for="">E-mail：</label><input type="text">
            </div>
            <div class="input-box">
              <label for="">注册时间：</label><span><?php echo (date("Y-m-d H:i",$res["reg_time"])); ?></span>
            </div>
            <input type="submit" value="修改资料">
            
          </form>

        </div>
        
      </div>
      

     
      

    </div>  
  </div>


  <div class="footer">
    <p>javion25.github.io 版权所有 &copy;</p>
  </div>
</body>
</html>