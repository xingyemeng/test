<?php
namespace Home\Controller;
use Think\Controller;
class loginController extends Controller {
    public function index(){
		$this->display();
		//echo "hello world!";
    }
/*	public function getajax(){
		$this->ajaxReturn('这是我要的数据','信息1',1);
	}
*/
	public function dologin(){		
		//判断用户是否存在
		//信息是否正确
		//验证码判断
		$username=$_POST['username'];
		$password=$_POST['password'];
		$code=$_POST['code'];
		$verify = new \Think\Verify();    
		//return $verify->check($code, $id="");
		//验证码函数，要解释下code和ID的用处
		if(!$verify->check($code, $id="")){
			$this->error('验证码错误');
		}
		$user=M('User');
		$where['username']=$username;
		$where['password']=$password;
		$arr=$user->field('id,username')->where($where)->find();
		if($arr){
			session(C('USER_AUTH_KEY'),$arr['id']);  
			session('username',$arr['username']);
			//如果用户是超级管理员，则可以进行一切操作  
			if (session('username')==C('RBAC_SUPERADMIN')) {  
				session(C('ADMIN_AUTH_KEY'),true);  
			}
			$rbac=new \Org\Util\Rbac();
			//$rbac::ccd();
			//取出用户权限信息
			$rbac::saveAccessList();
			$this->success('登陆成功',U('Index/index'));
			
		}
		else{
			$this->error('用户不存在');
		}
	}
	public function logout(){
		unset($_SESSION['user_id']);
		unset($_SESSION['username']);
		session_destroy();
		$this->redirect("./home/login/index");
	}
	public function Verify(){
		$config =    array(
			'fontSize'    =>    18,    // 验证码字体大小    
			'length'      =>    3,     // 验证码位数    
			'useNoise'    =>    false, // 关闭验证码杂点
			'imageW'	  =>	100,
			'imageH'	  =>	35,
		);
		$Verify = new \Think\Verify($config);
		$Verify->entry();
	}
}