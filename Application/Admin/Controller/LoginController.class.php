<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
  
  public function index(){

    $this->display();


  }

  public function login(){

    if (IS_POST){

        $UserName = $_POST['username'];
        $PassWord = $_POST['password'];

        $AdminUser = M("AdminUser"); // 实例化AdminUser对象

        $pwd = $AdminUser->where("user_name = '$UserName'")->getField('password');

        $Url = U("Admin/Index/index/");

        if ($PassWord == $pwd) {

          $data['status']  = 1;
          $data['url'] = $Url;

          session('adminUser', $UserName); 

          $this->ajaxReturn($data);

        } else {
          $data['status'] = 0;
          $this->ajaxReturn($data);

        }

     }else{
        $this->error('非法请求');
     }

  }
}