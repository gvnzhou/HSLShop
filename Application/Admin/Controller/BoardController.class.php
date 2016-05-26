<?php
namespace Admin\Controller;
use Think\Controller;
class BoardController extends Controller {

    public function index(){

        
      $MessageBoard = M("MessageBoard");

      $MessageBoardList = $MessageBoard->select();

      $this->assign("MessageBoardList", $MessageBoardList);

      $this->display();

    }
    
    public function delMessage($mesId){

      $MessageBoard = M("MessageBoard"); // 实例化留言板对象

      if ($MessageBoard->where("message_id = '$mesId'")->delete()) {
        $this->success("删除成功！");
      } else {
        $this->error("删除失败！");
      }

    }


    public function reMessage(){



    }


}