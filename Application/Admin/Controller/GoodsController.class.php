<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends Controller {

    public function addGoodsType(){

      if (IS_POST) {
        
        $GoodsTypeName = $_POST["goodstype"];

        $GoodsType = M("GoodsType"); // 实例化GoodsType对象
        $data['cat_name'] = $GoodsTypeName;
        $data['enabled'] = 1;

        if ($GoodsType->add($data)) {
          $this->success("添加成功");
        }


      } else {
        $this->display();
      }

    }


    public function manageGoodsType(){

      $GoodsType = M("GoodsType"); // 实例化GoodsType对象

      $list = $GoodsType->select();

      $this->assign('list',$list);
      
      $this->display();

    }


    public function editGoodsType($GoodsTypeId){

      if (IS_POST) {
          
          $GoodsType = M("GoodsType"); // 实例化GoodsType对象

          $data['cat_name'] = $_POST["catname"];

          if ($GoodsType->where("cat_id = '$GoodsTypeId'")->save($data)) {
            $this->success("修改成功！");
          } else {
            $this->error("修改失败！");
          }
          
      } else {

        $GoodsType = M("GoodsType"); // 实例化GoodsType对象

        $data = $GoodsType->where("cat_id = '$GoodsTypeId'")->find();

        $this->assign('data',$data);
        
        $this->display();

      }

    }


    public function delGoodsType($GoodsTypeId){

      $GoodsType = M("GoodsType"); // 实例化GoodsType对象
        
      if ($User->where("cat_id= '$GoodsTypeId'")->delete()) {
        $this->success("删除成功！");
      } else {
        $this->error("删除失败！");
      }

    }


    public function delGoods($GoodsId){

      $Goods = M("Goods"); // 实例化GoodsType对象
        
      if ($Goods->where("goods_id = '$GoodsId'")->delete()) {
        $this->success("删除成功！");
      } else {
        $this->error("删除失败！");
      }

    }

    public function addGoods(){

      if (IS_POST) {

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
        $upload->savePath  =     ''; // 设置附件上传（子）目录
        // 上传文件 
        $info   =   $upload->upload();

        if(!$info) {// 上传错误提示错误信息
          $flag = 0;
        }else{// 上传成功
          foreach($info as $file){
             $data['goods_img'] = "Uploads/".$file['savepath'].$file['savename'];
          }
          $flag = 1;
        }

        // 图片是否上传成功
        if($flag){

          $GoodsName = $_POST["goodsname"];
          $GoodsType = $_POST["goodstype"];
          $GoodsModel = $_POST["goodsmodel"];
          $GoodsSpec = $_POST["goodsspec"];
          $GoodsPlace = $_POST["goodsplace"];
          $GoodsPrice = $_POST["goodsprice"];
          $GoodsNumber = $_POST["goodsnumber"];
          $GoodsDesc = $_POST["content"];


          $Goods = M("Goods"); // 实例化Goods对象

          $data['cat_id'] = $GoodsType;
          $data['goods_name'] = $GoodsName;
          $data['goods_number'] = $GoodsNumber;
          $data['goods_place'] = $GoodsPlace;
          $data['goods_price'] = $GoodsPrice;
          $data['goods_model'] = $GoodsModel;

          $data['goods_desc'] = $GoodsDesc;

          $data['goods_spec'] = $GoodsSpec;
          $data['click_count'] = 1;

          $data['is_new'] = 1;

          $data['create_time'] = time();
          $data['update_time'] = $data['create_time'];


          if ($Goods->add($data)) {
            $this->success("添加成功");
          }

        }else {

        }

      } else {

        $GoodsType = M("GoodsType");

        $list = $GoodsType->where("enabled = 1")->select();

        $this->assign('list', $list);

        $this->display();

      }

    }

    public function manageGoods(){
      

      $Goods = M("Goods"); // 实例化Goods对象

      $list = $Goods->select();

      $this->assign('list',$list);
    
      $this->display();

    }

    public function editGoods($GoodsId){
      
      if (IS_POST) {

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
        $upload->savePath  =     ''; // 设置附件上传（子）目录
        // 上传文件 
        $info   =   $upload->upload();

        if(!$info) {// 上传错误提示错误信息
          $flag = 0;
        }else{// 上传成功
          foreach($info as $file){
             $data['goods_img'] = "Uploads/".$file['savepath'].$file['savename'];
          }
          $flag = 1;
        }

        // 图片是否上传成功
        if($flag){

          $GoodsName = $_POST["goodsname"];
          $GoodsType = $_POST["goodstype"];
          $GoodsModel = $_POST["goodsmodel"];
          $GoodsSpec = $_POST["goodsspec"];
          $GoodsPlace = $_POST["goodsplace"];
          $GoodsPrice = $_POST["goodsprice"];
          $GoodsNumber = $_POST["goodsnumber"];
          $GoodsDesc = $_POST["content"];


          $Goods = M("Goods"); // 实例化Goods对象

          $data['cat_id'] = $GoodsType;
          $data['goods_name'] = $GoodsName;
          $data['goods_number'] = $GoodsNumber;
          $data['goods_place'] = $GoodsPlace;
          $data['goods_price'] = $GoodsPrice;
          $data['goods_model'] = $GoodsModel;

          $data['goods_desc'] = $GoodsDesc;

          $data['goods_spec'] = $GoodsSpec;

          $data['create_time'] = time();
          $data['update_time'] = $data['create_time'];

          if ($Goods->where("goods_id = '$GoodsId'")->save($data)) {
            $this->success("修改成功！");
          } else {
            $this->error("修改失败！");
          }
        
        }
      } else {

        $Goods = M("Goods"); // 实例化Goods对象

        $data = $Goods->where("goods_id = '$GoodsId'")->find();

        $GoodsType = M("GoodsType");

        $list = $GoodsType->where("enabled = 1")->select();

        $this->assign('list', $list);

        $this->assign('data', $data);

        $this->display();

      }



    }

}