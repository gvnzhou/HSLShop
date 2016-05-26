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
            <li><a href="/HSLshop/index.php/Admin/System/index">修改密码</a></li>
            <li><a href="/HSLshop/index.php/Admin/System/exitUser">退出系统</a></li>
          </ul>
        </div>
        
        <div class="user-info pull-right">
          <span>当前登录人：</span><strong><?php echo (session('adminUser')); ?></strong>
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
                <li><a href="/HSLshop/index.php/Admin/System/exitUser">退出系统</a></li>
              </ul>
            </li>

          </ul>
          

          
          
        </div>



        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <ol class="breadcrumb">
            <li><a href="#">当前位置</a></li>
            <li><a href="#">商品管理</a></li>
            <li><a href="#">添加商品</a></li>
          </ol>
          
          <div class="table-info">
            <form action="/HSLshop/index.php/Admin/Goods/addGoods" enctype="multipart/form-data" method="post" id="add_goods">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td>商品名称：</td>
                  <td><input type="text" name="goodsname"></td>
                </tr>
                <tr>
                  <td>商品分类：</td>
                  <td>
                    <select name="goodstype" id="">
                      <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["cat_id"]); ?>"><?php echo ($vo["cat_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    
                  </td>
                </tr>
                <tr>
                  <td>型号：</td>
                  <td><input type="text" name="goodsmodel"></td>
                </tr>
                <tr>
                  <td>规格：</td>
                  <td><input type="text" name="goodsspec"></td>
                </tr>
                <tr>
                  <td>产地：</td>
                  <td><input type="text" name="goodsplace"></td>
                </tr>
                <tr>
                  <td>价格：</td>
                  <td><input type="text" name="goodsprice"></td>
                </tr>
                <tr>
                  <td>库存数量：</td>
                  <td><input type="text" name="goodsnumber"></td>
                </tr>
                <tr>
                  <td>其它：</td>
                  <td>
                    <label for="goodsnew">新品</label><input type="checkbox" name="goodsother" id="goodsnew">
                    <label for="goodshot">热门</label><input type="checkbox" name="goodsother" id="goodshot">
                    <label for="goodspromote">推荐</label><input type="checkbox" name="goodsother" id="goodspromote">
                  </td>
                </tr>
                <tr>
                  <td>商品图片：</td>
                  <td><input type="file" name="goodsimg"></td>
                </tr>
                <tr>
                  <td>详细说明：</td>
                  <td>
                    <textarea id="editor_id" name="content" style="width:100%;height:300px;">
                    
                    </textarea>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td><button type="submit" class="btn btn-success" >添加</button></td>
                </tr>
              </tbody>
            </table>
          </form>
          </div>
          
          
        </div>
      </div>
    </div>

    <script charset="utf-8" src="/HSLshop/Public/admin/js/jquery-1.12.2.min.js"></script>
    <script charset="utf-8" src="/HSLshop/Public/admin/js/basic.js"></script>
    <script charset="utf-8" src="/HSLshop/Public/admin/kindeditor/kindeditor-all-min.js"></script>
    <script charset="utf-8" src="/HSLshop/Public/admin/kindeditor/kindeditor-all-min.js"></script>
    <script charset="utf-8" src="/HSLshop/Public/admin/kindeditor/lang/zh-CN.js"></script>
    <script>
      KindEditor.ready(function(K) {
        var options = {
          cssPath : '/HSLshop/Public/admin/kindeditor/themes/default/default.css',
          filterMode : true
        };
        var editor = K.create('textarea[name="content"]', options);
      });
    </script>

  </body>
</html>