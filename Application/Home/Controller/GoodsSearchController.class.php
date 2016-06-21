<?php
namespace Home\Controller;
use Think\Controller;
class GoodsSearchController extends Controller {

  public function index(){

    $keywords = $_POST['keywords'];
    $Goods = M("Goods"); // 实例化商品对象
     
    // 查找相关商品数据 
    $GoodsList = $Goods->where("goods_name like '%{$keywords}%' ")->limit(12)->select();

    $GoodsType = M("GoodsType"); // 实例化商品分类对象

    // 查找enabledd值为1的商品分类数据 
    $GoodsTypeList = $GoodsType->where("enabled = 1")->select();


    // 将数据添加到模板
    $this->assign("GoodsList", $GoodsList);
    $this->assign("GoodsTypeList", $GoodsTypeList);
    $this->display();

  }
}