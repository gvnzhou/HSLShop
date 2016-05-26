<?php
namespace Home\Controller;
use Think\Controller;
class GoodsTypeController extends Controller {

    public function index($catId){

      $GoodsType = M("GoodsType"); // 实例化商品分类对象

      // 查找enabledd值为1的商品分类数据 
      $GoodsTypeList = $GoodsType->where("enabled = 1")->select(); 

      $GoodsType = $GoodsType->where("cat_id = '$catId'")->find(); 

      $Goods = M("Goods");

      $list = $Goods->where("cat_id = '$catId'")->select();

      $this->assign("list", $list);

      $this->assign("GoodsTypeList", $GoodsTypeList);

      $this->assign("GoodsType", $GoodsType);

      $this->display();

    }


}