<?php
namespace Admin\Controller;
use Think\Controller;
class SystemController extends Controller {

  public function index(){

    $AdminUser = M("AdminUser"); // 实例化AdminUser对象

    $AdminName = session('adminUser');

    $data = $AdminUser->where("user_name = '$AdminName'")->find();

    $this->assign('data',$data);
      
    $this->display();


  }
  

  public function exitUser() {

    session('adminUser',null);

    $this->success('退出成功', '../Login/index');

  }

}