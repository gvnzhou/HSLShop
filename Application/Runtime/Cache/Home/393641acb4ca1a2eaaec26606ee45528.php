<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
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
          <a href="/HSLshop/index.php/Home/Order/myOrder">我的订单</a>
        </nav>
      </div>

      <div class="order-detail-list">
        <h3>我的订单详情</h3>

        <h4>订单信息：</h4>
        <ul class="order-title">
          <li class="order-id">订单编号</li>
          <li class="order-total">总计</li>
          <li class="order-time">购买时间</li>
          <li class="order-state">支付状态</li>
          <li class="pay-info">支付信息</li>
          <li class="goods-state">退/发货状态</li>
        </ul>
        
        <ul class="order-title order-info">
          <li class="order-id"><?php echo ($OrderInfoData["order_sn"]); ?></li>
          <li class="order-total">￥<?php echo ($OrderInfoData["goods_amount"]); ?></li>
          <li class="order-time"><?php echo (date("Y-m-d H:i",$OrderInfoData["create_time"])); ?></li>
          <li class="order-state">
            <?php switch($OrderInfoData["pay_status"]): case "0": ?>未支付<?php break;?>
              <?php case "1": ?>已支付<?php break; endswitch;?>
          </li>
          <li class="pay-info">
            <p>收件人：<?php echo ($OrderInfoData["consignee"]); ?></p>
            <p>电话： <?php echo ($OrderInfoData["tel"]); ?></p>
            <p><?php echo ($OrderInfoData["address"]); ?></p>
            <p>支付方式：
            <?php switch($OrderInfoData["pay_id"]): case "1": ?>支付宝支付<?php break;?>
              <?php case "2": ?>微信支付<?php break;?>
              <?php case "3": ?>货到付款<?php break;?>
              <?php case "4": ?>网银支付<?php break; endswitch;?>
            </p>
            <p>配送方式： 
            <?php switch($OrderInfoData["ship_id"]): case "1": ?>普通快递<?php break;?>
              <?php case "2": ?>EMS<?php break;?>
              <?php case "3": ?>自取<?php break; endswitch;?>
            </p>
          </li>
          <li class="goods-state">
            <?php switch($OrderInfoData["order_status"]): case "0": ?>未发货<?php break;?>
              <?php case "1": ?>已发货<?php break;?>
              <?php case "2": ?>订单关闭<?php break; endswitch;?>
          </li>
        </ul>
        

        <h4>订单商品：</h4>
        <ul class="goods-title">
          <li class="goods-name">商品名称</li>
          <li class="goods-tag">分类</li>
          <li class="goods-price">购买单价</li>
          <li class="goods-num">购买数量</li>
          <li class="order-小计">小计</li>
        </ul>
        
        <?php if(is_array($OrderGoodsList)): $i = 0; $__LIST__ = $OrderGoodsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ul class="goods-title goods-info">
            <li class="goods-name">
              <img src="/HSLshop/<?php echo ($vo["goods_img"]); ?>" alt="">
              <a href=""><?php echo ($vo["goods_name"]); ?></a>
            </li>
            <li class="goods-tag">
              <?php switch($vo["cat_id"]): case "1": ?>个人化妆<?php break;?>
                <?php case "6": ?>图书影像<?php break;?>
                <?php case "7": ?>家用电器<?php break;?>
                <?php case "8": ?>手机数码<?php break;?>
                <?php case "9": ?>服装帽饰<?php break;?>
                <?php case "10": ?>运动健康<?php break;?>
                <?php case "11": ?>母婴玩具<?php break; endswitch;?>
            </li>
            <li class="goods-price">
              <?php echo ($vo["goods_price"]); ?>
            </li>
            <li class="goods-num">
              <?php echo ($vo["goods_number"]); ?>
            </li>
            <li class="order-小计">
              ￥<?php echo ($vo['goods_price']*$vo['goods_number']); ?>
            </li>
          </ul><?php endforeach; endif; else: echo "" ;endif; ?>
        
      </div>
    

    </div>  
  </div>


  <div class="footer">
    <p>javion25.github.io 版权所有 &copy;</p>
  </div>
</body>
</html>