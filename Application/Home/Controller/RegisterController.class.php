<?php
namespace Home\Controller;
use Think\Controller;
class RegisterController extends Controller {
    public function index(){
        //登录页展示
		$this->display();
		
    }
	public function checkname(){
		//确认可以注册
		//把数据写入数据库
		//跳转登陆界面
		$username=$_GET['username'];
		$user=M('User');
		$where['username']=$username;
		$count=$user->where($where)->count();
		if($count){
			echo '不允许';
		}else{
			echo '允许';
		}
	}
	public function doReg(){
		$user=M(User);
		$name=$_POST['username'];
		$password=$_POST['password'];
		$repassword=$_POST['repassword'];
		$sex=$_POST['sex'];
		$code=$_POST['code'];	
		//验证码验证
		$verify = new \Think\Verify();    
		//return $verify->check($code, $id="");
		if(!$verify->check($code, $id="")){
			$this->error('验证码错误');
		}		
		if($psaaword==$repassword){
			echo"<script>alert('两次密码输入不一致，请重新输入');</script>";
			echo"<script>location='index.html'</script>";
		}else{
			$conn=mysql_connect("localhost","root","");
			mysql_select_db("tp2");
			mysql_query("set names utf8");
			$sqlinsert="insert into tp_user(username,password,sex) values('{$name}','{$password}','{$sex}')";
			mysql_query($sqlinsert);
			$this->success("注册成功",U('login/index'));
		}
	}
}