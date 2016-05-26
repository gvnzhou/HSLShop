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


      <div class="my-order-list clearfix">
        <h3>我的订单</h3>
        <ul class="my-order-title clearfix">
          <li class="order-num">订单编号</li>
          <li class="goods-name">商品名称</li>
          <li class="goods-price">单价（元）</li>
          <li class="goods-num">数量</li>
          <li class="order-total">总计</li>
          <li class="order-time">购买时间</li>
          <li class="order-state">支付状态</li>
          <li class="order-operate">操作</li>
          <li class="goods-state">退/发货状态</li>
        </ul>



        <?php if(is_array($OrderInfoList)): $i = 0; $__LIST__ = $OrderInfoList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ul class="my-order-box my-order-title clearfix">
          <li class="order-num order-1 order-2">
            <?php echo ($vo["order_sn"]); ?>
          </li>
          <li class="goods-list">

            <?php if(is_array($vo['goods'])): $i = 0; $__LIST__ = $vo['goods'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($i % 2 );++$i;?><ul class="clearfix">
                <li class="goods-name">
                <img src="/HSLshop/<?php echo ($goods["goods_img"]); ?>" alt="">
                  <a href=""><?php echo ($goods["goods_name"]); ?></a>
                </li>
                <li class="goods-price"><?php echo ($goods["goods_price"]); ?></li>
                <li class="goods-num"><?php echo ($goods["goods_number"]); ?></li>
              </ul><?php endforeach; endif; else: echo "" ;endif; ?>

          </li>
          <li class="order-total order-1 order-2"><?php echo ($vo["goods_amount"]); ?></li>
          <li class="order-time order-1 order-2"><?php echo (date("Y-m-d H:i",$vo["create_time"])); ?></li>
          <li class="order-state order-1 order-2">
            <?php switch($vo["pay_status"]): case "0": ?>未支付<?php break;?>
              <?php case "1": ?>已支付<?php break; endswitch;?>
          </li>
          <li class="order-operate order-1">
            <div>
              <a href="/HSLshop/index.php/Home/Order/OrderDetail/orderId/<?php echo ($vo["order_id"]); ?>">订单详情</a>
              <a href="/HSLshop/index.php/Home/Order/payOrder/orderId/<?php echo ($vo["order_id"]); ?>">现在支付</a>
              <a href="/HSLshop/index.php/Home/Order/deleteOrder/orderId/<?php echo ($vo["order_id"]); ?>" class="red">取消订单</a>
            </div>
          </li>
          <li class="goods-state order-1 order-2">
            <?php switch($vo["order_status"]): case "0": ?>未发货<?php break;?>
              <?php case "1": ?>已发货<?php break;?>
              <?php case "2": ?>订单关闭<?php break; endswitch;?>
          </li>
        </ul><?php endforeach; endif; else: echo "" ;endif; ?>

      </div>
      
      
      

    </div>  
  </div>


  <div class="footer">
    <p>javion25.github.io 版权所有 &copy;</p>
  </div>
  <script src="/HSLshop/Public/home/js/jquery-1.12.2.min.js"></script>
  <script src="/HSLshop/Public/home/js/myorder.js"></script>
</body>
</html>