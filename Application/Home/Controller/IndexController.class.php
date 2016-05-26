<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function index(){

      $GoodsType = M("GoodsType"); // 实例化商品分类对象

      // 查找enabledd值为1的商品分类数据 
      $GoodsTypeList = $GoodsType->where("enabled = 1")->select(); 


      $Goods = M("Goods"); // 实例化商品对象
      
      // 查找最新的商品数据 
      $GoodsNewList = $Goods->where("is_new = 1")->limit(8)->order('goods_id DESC')->select();

      // 查找推荐的商品数据 
      $GoodsPromoteList = $Goods->where("is_promote = 1")->select();

      // 查找热门的商品数据 
      $GoodsHotList = $Goods->where("is_hot = 1")->select();

      // 将数据添加到模板
      $this->assign("GoodsNewList", $GoodsNewList);

      $this->assign("GoodsPromoteList", $GoodsPromoteList);

      $this->assign("GoodsHotList", $GoodsHotList);

      $this->assign("GoodsTypeList", $GoodsTypeList);

      $this->display();

    }


}