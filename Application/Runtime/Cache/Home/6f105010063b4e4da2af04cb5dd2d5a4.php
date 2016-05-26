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
          <form action="">
              <input type="text" name="keywords" placeholder="输入你想买的东西"><button>搜索</button>
          </form>
          <div class="search-hot">
              <a href="">TFboy</a>
              <a href="">阿尔法狗</a>
              <a href="">iphone7s</a>
              <a href="">单反</a>
          </div>
        </div>
      </div>

      <div class="shop-car">
        <ul class="goods-title">
          <li>商品信息</li>
          <li>分类</li>
          <li>单价（元）</li>
          <li>数量</li>
          <li>金额</li>
          <li>操作</li>
        </ul>
        
        <?php if(isset($_SESSION['GoodsIdList'])): if(is_array($GoodsList)): $i = 0; $__LIST__ = $GoodsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="goods-box clearfix">
            <div class="goods-info">
              <div class="goods-name">
                <img src="/HSLshop/<?php echo ($vo["goods_img"]); ?>" alt="">
                <a href=""><?php echo ($vo["goods_name"]); ?></a>
              </div>
              <div class="goods-other">
                <p>型号：<?php echo ($vo["goods_model"]); ?></p>
                <p>规格：<?php echo ($vo["goods_spec"]); ?></p>
              </div>
            </div>
            <div class="goods-cate">
              <span>
              <?php switch($vo["cat_id"]): case "1": ?>个人化妆<?php break;?>
                <?php case "6": ?>图书影像<?php break;?>
                <?php case "7": ?>家用电器<?php break;?>
                <?php case "8": ?>手机数码<?php break;?>
                <?php case "9": ?>服装帽饰<?php break;?>
                <?php case "10": ?>运动健康<?php break;?>
                <?php case "11": ?>母婴玩具<?php break; endswitch;?>
              </span>
            </div>
            <div class="goods-price">
              <span><?php echo ($vo["goods_price"]); ?></span>
            </div>
            <div class="goods-num">
             <input type="text" value="<?php echo ($vo["goods_num"]); ?>" id="goods-num" class="<?php echo ($vo["goods_id"]); ?>" data-price="<?php echo ($vo["goods_price"]); ?>">
            </div>
            <div class="price-total">
              <span><?php echo ($vo['goods_price']*$vo['goods_num']); ?>.00</span>
            </div>
            <div class="operate">
              <a href="/HSLshop/index.php/Home/Cart/delGoods/GoodsId/<?php echo ($vo["goods_id"]); ?>">删除</a>
            </div>
          </div><?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="total">
          <span>合计：</span><span id="totalprice">￥<?php echo ($TotalPrice); ?></span>
        </div>
        <?php else: ?>
          
          <p>您的购物车为空，快去挑选商品吧！</p><?php endif; ?>
        
        <div class="confirm">
          <a href="/HSLshop/index.php/Home/Cart/delAllGoods/">清空购物车</a>
          <a href="/HSLshop/index.php/Home/Order/index/">确认订单</a>
        </div>

      </div>

    </div>  
  </div>

  <div class="footer">
    <p>javion25.github.io 版权所有 &copy;</p>
  </div>
  <script src="/HSLshop/Public/home/js/jquery-1.12.2.min.js"></script>
  <script src="/HSLshop/Public/home/js/basic.js"></script>
  <script src="/HSLshop/Public/home/js/cart.js"></script>
</body>
</html>