<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->

    <title>天猴商城后台管理中心</title>

    <!-- Bootstrap core CSS -->
    <link href="/HSLshop/Public/admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/HSLshop/Public/admin/css/dashboard.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">天猴商城后台管理</a>
        </div>      
        
        

        <div id="navbar" class="navbar-collapse collapse pull-right">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">修改密码</a></li>
            <li><a href="#">退出系统</a></li>
          </ul>
        </div>
        
        <div class="user-info pull-right">
          <span>当前登录人：</span><strong>admin</strong>
        </div>

      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          
          <ul class="nav nav-sidebar">

            <li>
              <span>用户管理</span>
              <ul class="nav">
                <li><a href="/HSLshop/index.php/Admin/Index/">注册用户管理</a></li>
              </ul>
            </li>


            <li>
              <span>商品管理</span>
              <ul class="nav">
                <li><a href="/HSLshop/index.php/Admin/Goods/addGoodsType">添加商品分类</a></li>
                <li><a href="/HSLshop/index.php/Admin/Goods/manageGoodsType">商品分类管理</a></li>
                <li><a href="/HSLshop/index.php/Admin/Goods/addGoods">添加商品</a></li>
                <li><a href="/HSLshop/index.php/Admin/Goods/manageGoods">商品管理</a></li>
              </ul>
            </li>
            
            
            <li>
              <span>订单管理</span>
              <ul class="nav">
                <li><a href="/HSLshop/index.php/Admin/Order/index">订单信息管理</a></li>
              </ul>
            </li>
            
            <li>
              <span>留言板管理</span>
              <ul class="nav">
                <li><a href="/HSLshop/index.php/Admin/Board/index">留言回复管理</a></li>
              </ul>
            </li>
            
            <li>
              <span>系统管理</span>
              <ul class="nav">
                <li><a href="/HSLshop/index.php/Admin/System/index">修改密码</a></li>
                <li><a href="">退出系统</a></li>
              </ul>
            </li>

          </ul>
          

          
          
        </div>




        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <ol class="breadcrumb">
            <li><a href="#">当前位置</a></li>
            <li><a href="#">订单管理</a></li>
          </ol>

          <form class="form-inline">
            <div class="form-group">
              <label for="keywords">关键字：</label>
              <input type="text" class="form-control" id="keywords" placeholder="输入要查找的内容">
            </div>

            <button type="submit" class="btn btn-default">查找</button>
            <button type="submit" class="btn btn-default">显示全部</button>

          </form>
          
          <div class="table-info">

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>id</th>
                  <th>订单编号</th>
                  <th>收货地址</th>
                  <th>购买人</th>
                  <th>购买时间</th>
                  <th>支付状态</th>
                  <th>退/发货状态</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              <?php if(is_array($OrderInfoList)): $i = 0; $__LIST__ = $OrderInfoList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                  <td><?php echo ($vo["order_id"]); ?></td>
                  <td><?php echo ($vo["order_sn"]); ?></td>
                  <td><?php echo ($vo["address"]); ?></td>
                  <td><?php echo ($vo["consignee"]); ?></td>
                  <td><?php echo (date("Y-m-d H:i",$vo["create_time"])); ?></td>
                  <td>
                  <?php switch($vo["pay_status"]): case "0": ?>未支付<?php break;?>
                    <?php case "1": ?>已支付<?php break; endswitch;?>
                  </td>
                  <td>
                   <?php switch($vo["order_status"]): case "0": ?>未发货<?php break;?>
                    <?php case "1": ?>已发货<?php break;?>
                    <?php case "2": ?>订单关闭<?php break; endswitch;?>
                  </td>
                  <td><a href="/HSLshop/index.php/Admin/Order/editOrder/orderId/<?php echo ($vo["order_id"]); ?>">修改</a><a href="/HSLshop/index.php/Admin/Order/delOrder/orderId/<?php echo ($vo["order_id"]); ?>">删除</a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
              </tbody>
            </table>
            <button type="button" class="btn btn-danger">删除</button>
          </div>
         <!--  <nav class="paging-wrap">
            <ul class="pagination">
              <li>
                <a href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li>
                <a href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav> -->
          
        </div>
      </div>
    </div>



  </body>
</html>