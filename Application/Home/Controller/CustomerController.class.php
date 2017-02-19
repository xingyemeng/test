<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Home\Controller;
use Think\Controller;
class CustomerController extends BaseController{
    public function index(){
		$this->assign('subtl','客户信息列表');
        $this->display();
    }
    public function add(){
        $this->display();
    }
     public function doadd(){
        $customer = M(Customer);
        $name = I('post.cname');
        $data['com_name'] = $name;
        $phone = I('post.cphone');
        $data['com_phone'] = $phone;
        $desc = I('post.cdes');
        $data['desc'] = $desc;
		$data['subtitle']='客户信息列表';
        $this->checkCustomer($data);
        $arr = $customer->add($data);
        if($arr){
            $data['info']='客户添加成功';
        }else{
            $data['info']='客户添加失败';
        }
        //echo($aa);
        echo(json_encode($data));
    }
	/*
	 *数据表中修改数据提交给php
	 *2016.11.7
	 *
	*/
	public function change(){
		$customer = M(Customer);
		$data['id'] = $_POST['id'];
		$data['com_name'] = $_POST['com_name'];
		$data['com_phone'] = $_POST['com_phone'];
		$data['desc'] = $_POST['desc'];
		$data['time'] = time();
		$arr = $customer->save($data);
		if(!$arr){
			echo '修改失败';
		}else{
			echo '修改成功';
		}
	}
	/*
	 *删除数据
	 *@author 杨少鑫
	 *param rows
	 *2016.11.11
	*/
	public function del(){
		$customer = M(Customer);
		$data['id'] = $_POST['id'];
		$gata = $customer->where($data)->delete();
		if($gata){
			echo("删除成功");
		}else{
			echo("删除失败");
		}
	}
    public function userList(){
        $M=M('Customer');
        $arr=$M->select();
        $json_string = json_encode($arr);
        $obj = json_decode($json_string);
        $this->ajaxReturn($obj);
    }
    private function checkCustomer($data){
        $name=$data['com_name'];
        $phone= $data['com_phone'];
        $des=$data['desc'];
        if($name == ''){
            $mes['info'] = '请输入客户姓名';
            echo json_encode($mes);
            exit;
        }
        if($phone == ''){
            $mes['info'] = '请输入客户电话';
            echo json_encode($mes);
            exit;
        }
        if($des == ''){
            $mes['info'] = '请输入客户描述';
            echo json_encode($mes);
            exit;
        }
}
}
