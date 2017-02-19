<?php
namespace Home\Controller;
use Think\Controller;
class RoleController extends Controller {
    public function lst(){
		$this->display();
    }
	public function prilst(){
		//$M=D('Privilege');
        //$arr=$M->select();
		$pri=D('Privilege');
		$arr=$pri->sel_all();
		$json_string = json_encode($arr);
        $obj = json_decode($json_string);
        $this->ajaxReturn($obj);
    }
	public function add(){
		$this->display();
    }
	public function edit(){
		$this->display();
    }
}