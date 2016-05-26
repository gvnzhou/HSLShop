<?php
namespace Home\Controller;
use Think\Controller;
class OrderController extends Controller {

    public function index(){

      if (!session("username")) {
        $this->error('你还没有登录！', U('Home/Users/login'));
      }

      // 遍历所有购物车商品
      foreach($_SESSION['GoodsIdList'] as $v) {

        $str .= "goods_id = $v[0] or ";

      }

      $str = substr($str, 0, -3);

      $Goods = M("Goods");

      $GoodsList = $Goods->where("$str")->select();

      // 计算购物车内商品总价
      foreach($GoodsList as $v) {

        $TotalPrice += $v['goods_price'];

      }

      $_SESSION['orderPrice'] = $TotalPrice;

      $TotalPrice = sprintf("%1.2f",$TotalPrice);

      $this->assign("GoodsList", $GoodsList);

      $this->assign("TotalPrice", $TotalPrice);

      $this->display();


    }


    // 创建订单
    public function CreateOrder(){

      $Users = M("Users");

      $UserName = $_SESSION['username'];

      $UsersData = $Users->where("user_name = '$UserName'")->find();

      $OrderSn = date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 6);

      $data['order_sn'] = $OrderSn;
      $data['user_id'] = $UsersData['user_id'];
      $data['pay_id'] = $_POST['paytype'];
      $data['ship_id'] = $_POST['shiptype'];
      $data['consignee'] = $_POST['consignee'];
      $data['tel'] = $_POST['tel'];
      $data['address'] = $_POST['address'];
      $data['create_time'] = time();
      $data['order_status'] = 0;
      $data['pay_status'] = 0;
      $data['goods_amount'] = $_SESSION['orderPrice'];

      $OrderInfo = M("OrderInfo");// 实例化订单信息表

      $OrderGoods = M("OrderGoods");// 实例化订单物品表

      // 更新订单信息表
      if ($OrderInfo->add($data)) {

        $OrderSn = $data['order_sn'];

        $OrderInfoData = $OrderInfo->where("order_sn = '$OrderSn'")->find();

        // 遍历所有购物车商品
        foreach($_SESSION['GoodsIdList'] as $v) {

          $data2["order_id"] = $OrderInfoData['order_id'];
          $data2["goods_id"] = $v[0];
          $data2["goods_number"] = $v[1];

          // 更新订单物品表
          if (!$OrderGoods->add($data2)) {
            $this->error("订单创建失败！");
            return false;
          }

        }
        $this->success("订单创建成功！",U("Home/Users/index"));

      }



    }

    public function myOrder(){

      if (!session("username")) {
        $this->error('你还没有登录！', U('Home/Users/login'));
      }

      $OrderInfo = M("OrderInfo");// 实例化订单信息表

      $Users = M("Users");

      $Goods = M("Goods");

      // 订单商品信息，每个订单对应商品数据
      $OrderGoods = M("OrderGoods");

      $UserName = $_SESSION['username'];

      $UserId = $Users->where("user_name = '$UserName'")->getField('user_id');

      // 所有订单信息
      $AllOrderData = $OrderGoods -> select();

      // 当前登陆用户的所有订单信息
      $OrderInfoList = $OrderInfo->where("user_id = '$UserId'")->select();

      //var_dump($AllOrderData);

      foreach ($OrderInfoList as $key1 => $value1) {

        foreach ($AllOrderData as $key2 => $value2) {

          if($OrderInfoList[$key1]['order_id'] == $AllOrderData[$key2]['order_id'] ) {

            $goodsId = $AllOrderData[$key2]['goods_id'];

            $GoodsData = $Goods->where("goods_id = '$goodsId'")->find();

            $OrderInfoList[$key1]['goods'][$key2] = $GoodsData;
            $OrderInfoList[$key1]['goods'][$key2]["goods_number"] = $AllOrderData[$key2]['goods_number'];
            
          }

        }
        
      }

            //var_dump($OrderInfoList);
      $this->assign("OrderInfoList", $OrderInfoList);

      $this->display();

    }

    public function OrderDetail($orderId) {

      $Goods = M("Goods");// 实例化商品表

      $OrderInfo = M("OrderInfo");// 实例化订单信息表

      $OrderGoods = M("OrderGoods");// 实例化订单商品表

      // 当前登陆用户的所有订单信息
      $OrderInfoData = $OrderInfo->where("order_id = '$orderId'")->find();

      // 获取订单商品信息
      $OrderGoodsList = $OrderGoods->where("order_id = '$orderId'")->select();


      foreach ($OrderGoodsList as $key => $value) {

        $goodsId = $OrderGoodsList[$key]['goods_id'];

        $goodsNum = $OrderGoodsList[$key]['goods_number'];

        $GoodsData = $Goods->where("goods_id = '$goodsId'")->find();

        $OrderGoodsList[$key] = $GoodsData;

        $OrderGoodsList[$key]['goods_number'] = $goodsNum;

      }

      //var_dump($OrderGoodsList);

      $this->assign("OrderInfoData", $OrderInfoData);
      $this->assign("OrderGoodsList", $OrderGoodsList);

      $this->display();


    }

    public function deleteOrder($orderId) {

      $OrderInfo = M("OrderInfo");// 实例化订单信息表

      $data['order_status'] = 2;

      if ($OrderInfo->where("order_id = '$orderId'")->save($data)) {

        $this->success('订单取消成功！', U('Home/Order/myorder'));

      }

    }

    public function payOrder($orderId) {

      $OrderInfo = M("OrderInfo");// 实例化订单信息表

      $data['pay_status'] = 1;

      if ($OrderInfo->where("order_id = '$orderId'")->save($data)) {

        $this->success('支付成功！', U('Home/Order/myorder'));

      }

    }
}