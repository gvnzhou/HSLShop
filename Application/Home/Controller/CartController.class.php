<?php
namespace Home\Controller;
use Think\Controller;
class CartController extends Controller {


    public function index(){

      // 遍历所有购物车商品id
      foreach($_SESSION['GoodsIdList'] as $v) {

        $str .= "goods_id = $v[0] or ";

      }

      $str = substr($str, 0, -3);

      $Goods = M("Goods");

      $GoodsList = $Goods->where("$str")->select();

      // 计算购物车内商品总价
      foreach($GoodsList as $k1 => $v1) {

        foreach($_SESSION['GoodsIdList'] as $k2 => $v2) {

          if ($v1['goods_id'] == $v2[0]) {

            $GoodsList[$k1]['goods_num'] = $v2[1];

            $TotalPrice += $v1['goods_price']*$v2[1];
            
          }
          
        }

      }

      $TotalPrice = sprintf("%1.2f",$TotalPrice);

      $this->assign("GoodsList", $GoodsList);

      $this->assign("TotalPrice", $TotalPrice);

      // var_dump ($_SESSION['GoodsIdList']);
      // var_dump ($GoodsList);
        
      $this->display();


    }

    // 将商品加入购物车
    public function addGoods($GoodsId){

      // 判断购物车内是否有商品
      if($_SESSION['GoodsIdList']) {

        $GoodsInfo = array();
        $GoodsNum = 1;

        // 判断添加商品是否重复
        foreach ($_SESSION['GoodsIdList'] as $key => $value) {

          if($value[0] == $GoodsId){
            $GoodsNum += 1;
            $value[1] = $GoodsNum;
          } else {
            array_push($GoodsInfo, $GoodsId);
            array_push($GoodsInfo, $GoodsNum);
            array_push($_SESSION['GoodsIdList'], $GoodsInfo);
          }
          
        }

      } else {

        $_SESSION['GoodsIdList'] = array();

        $GoodsInfo = array();
        array_push($GoodsInfo, $GoodsId);
        array_push($GoodsInfo, 1);

        array_push($_SESSION['GoodsIdList'], $GoodsInfo);

      }


      $this->success("添加成功！",U('Home/Cart/index'));

    }

    // 删除购物车内商品
    public function delGoods($GoodsId){


      foreach($_SESSION['GoodsIdList'] as $k => $v) {

        if($v[0] == $GoodsId) {

          unset($_SESSION['GoodsIdList'][$k]);

        }

      }

      $this->success("删除成功！",U('Home/Cart/index'));
    }


    // 清空购物车内商品
    public function delALLGoods(){

      $_SESSION['GoodsIdList'] = null;

      $this->success("清空成功！",U('Home/Cart/index'));
    }

    // 更新商品数量
    public function updateGoodsNum(){

      if (IS_POST) {

        $GoodsId = $_POST['goodsid'];
        $GoodsNum = $_POST['goodsnum'];

        foreach($_SESSION['GoodsIdList'] as $k => $v) {

          if($v[0] == $GoodsId) {

            $_SESSION['GoodsIdList'][$k][1] = intval($GoodsNum);
            $this->ajaxReturn(1);
          }

        }
      } 
      
    }
}