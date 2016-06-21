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
      <div class="banner">
        <img src="/HSLshop/Public/home/img/logo.jpg" alt="">
        <div class="search-box">
          <form action="/HSLshop/index.php/Home/GoodsSearch/index">
              <input type="text" name="keywords" placeholder="输入你想买的东西"><button>搜索</button>
          </form>
          <div class="search-hot">
              <a href="">帽子</a>
              <a href="">炉石卡包</a>
              <a href="">阿尔法狗</a>
              <a href="">iphone7s</a>
              <a href="">单反</a>
          </div>
        </div>
      </div>

      <ul class="tag-nav">
          <li><a href="">全部商品分类</a></li>
          <?php if(is_array($GoodsTypeList)): $i = 0; $__LIST__ = $GoodsTypeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/HSLshop/index.php/Home/GoodsType/index/catId/<?php echo ($vo["cat_id"]); ?>"><?php echo ($vo["cat_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
      
  
  
      
      <div class="content">


        <div class="goods-details ">
          <div class="goods-info clearfix">
            <div class="goods-img">
              <img src="/HSLshop/<?php echo ($GoodsDetail["goods_img"]); ?>" alt="">
            </div>
            <div class="goods-text">
              <h2><?php echo ($GoodsDetail["goods_name"]); ?></h2>
              <div class="info-list">
                <dl>
                  <dt>型号：</dt><dd><?php echo ($GoodsDetail["goods_model"]); ?></dd>
                </dl>
                <dl>
                  <dt>规格：</dt><dd><?php echo ($GoodsDetail["goods_spec"]); ?></dd>
                </dl>
                <dl>
                  <dt>产地：</dt><dd><?php echo ($GoodsDetail["goods_place"]); ?></dd>
                </dl>
                <dl>
                  <dt>分类：</dt><dd>
                  <?php switch($GoodsDetail["cat_id"]): case "1": ?>个人化妆<?php break;?>
                      <?php case "6": ?>图书影像<?php break;?>
                      <?php case "7": ?>家用电器<?php break;?>
                      <?php case "8": ?>手机数码<?php break;?>
                      <?php case "9": ?>服装帽饰<?php break;?>
                      <?php case "10": ?>运动健康<?php break;?>
                      <?php case "11": ?>母婴玩具<?php break; endswitch;?>
                  </dd>
                </dl>
                <dl>
                  <dt>价格：</dt><dd>￥<?php echo ($GoodsDetail["goods_price"]); ?>元</dd>
                </dl>
                <dl>
                  <dt>剩余库存：</dt><dd><?php echo ($GoodsDetail["goods_number"]); ?></dd>
                </dl>
                <dl>
                  <dt>浏览：</dt><dd><?php echo ($GoodsDetail["click_count"]); ?>次</dd>
                </dl>   
              </div>
              <a href="/HSLshop/index.php/Home/Cart/addGoods/GoodsId/<?php echo ($GoodsDetail["goods_id"]); ?>" class="add-btn">加入购物车</a>
            </div>
          </div>
        
          <div class="goods-intro">
            <h3>商品介绍：</h3>

            <p>
              <?php echo ($GoodsDetail["goods_desc"]); ?>
            </p>
          </div>
        </div>
      

      </div>

    </div>  
  </div>


  <div class="footer">
    <p><a href="http://www.javion.me">javion.me</a> 版权所有 &copy;</p>
  </div>
</body>
</html>