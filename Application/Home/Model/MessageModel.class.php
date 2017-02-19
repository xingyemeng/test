<?php
namespace Home\Model;
use Think\Model\RelationModel;
	class MessageModel extends RelationModel{
		protected $_link=array(
			User => array(
				'mapping_type'  => self::BELONGS_TO,
				'class_name'    => 'User',
				'foreign_key'   => 'uid',
				'mapping_name'  => 'user',
				'mapping_fields'=> 'username',
				'as_fields'		=> 'username',
			),
		);
	}
?>