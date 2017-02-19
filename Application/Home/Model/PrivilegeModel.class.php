<?php
namespace Home\Model;
use Think\Model;
	class PrivilegeModel extends Model{
		/*
		 *无限极分类代码
		 *
		**/
		public function sel_all(){
			$pri = M('Privilege');
			$arr = $pri->select();
			return $this->list_level($arr,$pid=0,$level=0);
			
		}
		public function list_level($arr,$pid=0,$level=0){
			//必须是静态数组，如果不定义静态数组会出问题
			static $data = array();
			foreach($arr as $key=>$v){
				if($v['pid']==$pid){
					$v['level']=$level;
					$data[]=$v;
					$this->list_level($arr,$v['id'],$level+1);
				}
			}
			return $data;
		}
		public function selTwArr(){
			$pri = M('Privilege');
			$arr = $pri->select();
			return $this->twArr($arr,$pid=0,$level=0);
			
		}
		public function twArr($arr,$pid=0,$level=0){
			foreach($arr as $key=>$v){
				if($v['pid']==$pid){
					$v['level']=$level;
					$v['children'] = $this->twArr($arr,$v['id'],$level+1);
					$value[]=$v;
				}
			}
			return $value;
		}
		/*返回easyui可以是别的josn格式数据
		 *就是把表单数据显示成带有children的二维数组，使之显示树状
		 *
		**/
		  
		
	}
?>