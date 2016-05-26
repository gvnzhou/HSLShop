<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {

    public function index(){

        $Users = M("Users"); // 实例化Users对象

        $list = $Users->select();

        $this->assign('list',$list);
        
        $this->display();
    }

    public function head(){
        
        $this->display();
    }
    
    public function delUser($UserId) {

        $UserId = $UserId;

        $User = M("Users"); // 实例化Users对象
        
        if ($User->where("user_id= '$UserId'")->delete()) {
          $this->success("删除成功！");
        } else {
          $this->error("删除失败！");
        }
    }

    public function editUser($UserId) {

        if (IS_POST) {
          
          $User = M("Users"); // 实例化Users对象

          $data['user_name'] = $_POST["username"];
          $data['nickname'] = $_POST["nickname"];
          $data['email'] = $_POST["email"];
          $data['password'] = $_POST["password"];

          if ($User->where("user_id = '$UserId'")->save($data)) {
            $this->success("修改成功！");
          } else {
            $this->error("修改失败！");
          }
          
        } else {

          $UserId = $UserId;

          $User = M("Users"); // 实例化Users对象
          
          $UserDetail = $User->where("user_id = '$UserId'")->find();

          $this->assign('UserDetail',$UserDetail);
          
          $this->display();

        }

    }

    

}