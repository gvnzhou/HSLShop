<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller {

    public function index($GoodsId){

      $GoodsType = M("GoodsType"); // 实例化商品分类对象

      // 查找enabledd值为1的商品分类数据 
      $GoodsTypeList = $GoodsType->where("enabled = 1")->select(); 

      $this->assign("GoodsTypeList", $GoodsTypeList);

      $Goods = M("Goods");

      $GoodsDetail = $Goods->where("goods_id = '$GoodsId'")->find();

      $this->assign('GoodsDetail', $GoodsDetail);

      $this->display();

    }



}