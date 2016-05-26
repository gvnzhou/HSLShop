<?php
namespace Home\Controller;
use Think\Controller;
class BoardController extends Controller {

    public function index(){

      $GoodsType = M("GoodsType"); // 实例化商品分类对象

      // 查找enabledd值为1的商品分类数据 
      $GoodsTypeList = $GoodsType->where("enabled = 1")->select();


      $MessageBoard = M("MessageBoard"); // 实例化留言板对象

      $MessageBoardList = $MessageBoard->select();

      $this->assign("MessageBoardList", $MessageBoardList);

      $this->assign("GoodsTypeList", $GoodsTypeList);

      $this->display();

    }

    public function addMessage(){

      if (IS_POST) {

        $MessageBoard = M("MessageBoard"); // 实例化留言板对象
        
        $data['user_name'] = $_POST['username'];
        $data['message_desc'] = $_POST['content'];
        $data['add_time'] = time();

        if ($MessageBoard -> add($data)) {
          
          $this->success("留言成功！", U('Home/Board/index'));

        }

      }


    }

    

}