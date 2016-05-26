<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends Controller {

    public function index(){

      if (IS_POST) {
        
        $OrderInfo = M("OrderInfo");

        $orderid = $_POST['orderid'];
        $data['address'] = $_POST['address'];
        $data['consignee'] = $_POST['consignee'];
        $data['pay_status'] = $_POST['paystatus'];
        $data['order_status'] = $_POST['orderstatus'];


        if ($OrderInfo->where("order_id = '$orderid'") ->save($data)) {
          $this->success("修改成功！", U('Admin/Order/index'));
        }


      } else {

        $OrderInfo = M("OrderInfo");

        $OrderInfoList = $OrderInfo -> select();

        $this->assign('OrderInfoList',$OrderInfoList);
          
        $this->display();


      }

      
    }
    

    public function editOrder($orderId){

      $OrderInfo = M("OrderInfo");

      $OrderInfoData = $OrderInfo -> where("order_id = '$orderId'") -> find();

      $this->assign('OrderInfoData',$OrderInfoData);
        
      $this->display();
    }

    public function delOrder($orderId){

      $OrderInfo = M("OrderInfo"); // 实例化GoodsType对象
        
      if ($OrderInfo->where("order_id = '$orderId'")->delete()) {
        $this->success("删除成功！");
      } else {
        $this->error("删除失败！");
      }

    }
}