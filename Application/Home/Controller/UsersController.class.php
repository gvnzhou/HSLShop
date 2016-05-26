<?php
namespace Home\Controller;
use Think\Controller;
class UsersController extends Controller {


    public function index(){


      if (!session("username")) {

        $this->error('你还没有登录！', '../Users/login', 1);
        
      }

      $Users = M("Users"); // 实例化AdminUser对象

      $username = session('username');

      $res = $Users->where("user_name = '$username'")->find();

      $this->assign('res',$res);

      $this->display();

    }


    public function register(){

      if (IS_POST) {

        $Email = $_POST['email'];
        $UserName = $_POST['username'];
        $PassWord = $_POST['password'];

        $Users = M("Users"); // 实例化AdminUser对象

        $res = $Users->where("email = '$Email'")->find();

        $Url = U('Home/Users/index');

        $data['user_name'] = $UserName;
        $data['password'] = $PassWord;
        $data['email'] = $Email;
        $data['reg_time'] = time();

        if (!$res) {

          $Users->add($data);

          $data['status']  = 1;
          $data['url'] = $Url;

          session("username", $UserName);


        } else {
          $data['status']  = 2;
        }

        $this->ajaxReturn($data);

      }else {
        $this->display();
      }

    }

    public function login(){

      if (IS_POST) {

        $UserName = $_POST['username'];
        $PassWord = $_POST['password'];

        $Users = M("Users"); // 实例化AdminUser对象

        $res = $Users->where("user_name = '$UserName'")->find();

        $Url = U('Home/Users/index');

        if ($res) {

          if ($res["password"] == $PassWord) {
            $data['status']  = 1;
            $data['url'] = $Url;
            session("username", $UserName);
          } else {

            $data['status']  = 2;

          }

         

        } else {
          $data['status']  = 3;
        }

        $this->ajaxReturn($data);

      }else {
        $this->display();
      }

    }

    public function exitUser(){

      session('username',null);

      $this->success('退出成功', '../Index/index');

    }

}