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
              <a href="">小米手环</a>
              <a href="">TFboy</a>
              <a href="">阿尔法狗</a>
              <a href="">iphone7s</a>
              <a href="">单反</a>
          </div>
        </div>
      </div>

      <div class="order-list">
        <ul class="goods-title">
          <li>商品信息</li>
          <li>分类</li>
          <li>单价（元）</li>
          <li>数量</li>
          <li>金额</li>
        </ul>

        <?php if(is_array($GoodsList)): $i = 0; $__LIST__ = $GoodsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="goods-box clearfix">
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
              1
            </div>
            <div class="price-total">
              <span><?php echo ($vo["goods_price"]); ?></span>
            </div>
          </div><?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="total">
          <span>合计：</span><span>￥<?php echo ($TotalPrice); ?></span>
        </div>
        

      <form action="/HSLshop/index.php/Home/Order/CreateOrder/" method="post">
        <div class="order-form">
            
            <div class="input-box">
              <label for="">收件人姓名：</label><input type="text" name="consignee">
            </div>
            <div class="input-box">
              <label for="">联系电话：</label><input type="text" name="tel">
            </div>
            <div class="input-box">
              <label for="">收件地址：</label><input type="text" name="address">
            </div>
            <div class="input-box">
              <label for="">支付方式：</label>
              <select name="paytype" id="">
                <option value="1">支付宝支付</option>
                <option value="2">微信支付</option>
                <option value="3">货到付款</option>
                <option value="4">网银支付</option>
              </select>
            </div>
            <div class="input-box">
              <label for="">配送方式：</label>
              <select name="shiptype" id="">
                <option value="1">普通快递</option>
                <option value="2">EMS</option>
                <option value="3">自取</option>
              </select>
            </div>
            
          
        </div>
        <div class="submit-box">
          <a>返回购物车</a>
          <button type="submit">提交订单</button>
        </div>
      </div>
      </form>
      
      

    </div>  
  </div>


  <div class="footer">
    <p>javion25.github.io 版权所有 &copy;</p>
  </div>
</body>
</html>