<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
		if(isset($_SESSION['user_id'])&&$_SESSION['username']!=''){
                    //echo($_SESSION['id']);
                    //$this->error("请先登录！",U('login/index'));
                    /*$message=D('Message');
                    //dump($arr);
                    $count=$message->count();
                    $page=new \Think\Page($count,3);
                    $show=$page->show();
                    $arr=$message->limit($page->firstRow.','.$page->listRows)->relation(true)->select();
                    $this->assign('list',$arr);
                    $this->assign('show',$show);*/
                    //$customer = D(Customer);
                    //$com_arr = $customer->select();
					dump($_SESSION);
                    $this->display();
		}else{
			//echo ($_SESSION['username']);			
			$this->error("请先登录！",U('login/index'));
			//$this->display();
		}
		//echo "hello world!";
    }
	public function Speak(){
		$title=$_POST['title'];
		$content=$_POST['content'];
		$filename=$_FILES["filename"]["name"];
		$code=$_POST['code'];
		$time=time();
		if($title&&$content!=null){
			$verify = new \Think\Verify();    
		//return $verify->check($code, $id="");
		if(!$verify->check($code, $id="")){
			$this->error('验证码错误');
		}
		}else{
			$this->error('标题或内容不能为空');
		}
		$message=M('Message');
		$data[title]=$title;
		$data[content]=$content;
		$data[filename]=$filename;
		$data['time']=date('Y-m-d',$time);
		$data['uid']=$_SESSION['id'];
		$message->add($data);
		//echo($data['time']);
		$upload=new \Think\Upload();
		$upload->rootPath='./Public/'; //文件存放的根目录是当前文件（当入口文件的前）的Public文件下
		$upload->savePath='./Uploads/';//当前（当Public文件夹的前）文件夹的Uploads文件夹下
		$info   =   $upload->upload();
		if($info){
			$this->success('发表成功！');
		}else{
			$this->error('留言成功，文件上传失败',$upload->getError());
		}
		
	}
}