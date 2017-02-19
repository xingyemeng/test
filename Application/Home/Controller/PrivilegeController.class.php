<?php
namespace Home\Controller;
use Think\Controller;
class PrivilegeController extends Controller {
    public function lst(){
		$this->display();
    }
	public function prilst(){
		//$M=D('Privilege');
        //$arr=$M->select();
		$pri=D('Privilege');
		$arr=$pri->selTwArr();
		//$data = $bta->getTreeArray();  
        //echo json_encode($data);
		$json_string = json_encode($arr);
        $obj = json_decode($json_string);
        $this->ajaxReturn($obj);
    }
	public function add(){
		$data=D('Privilege');
		$arr=$data->sel_all();
		$this->assign('list',$arr);
		$this->display();
    }
	public function doadd(){
		$arr = D(Privilege);
		$data['pri_name']=$_POST['pri_name'];
		$data['mname']=$_POST['mname'];
		$data['cname']=$_POST['cname'];
		$data['aname']=$_POST['aname'];
		$data['pid']=$_POST['id'];
		$gata = $arr->add($data);
		if($gata){
            $data['info']='权限添加成功';
        }else{
            $data['info']='权限添加失败';
        }
        //echo($aa);
        echo(json_encode($data));
		
    }
	public function edit(){
		$this->display();
    }
	public function sc(){
		$pri=D('Privilege');
		
	}
}