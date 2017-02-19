<?php
return array(
	//'配置项'=>'配置值'
	//rbac  
	'NOT_AUTH_MODULE'	=>	'index',
	'USER_AUTH_ON'              =>true, 
	'USER_AUTH_TYPE'     =>    1,   
	'USER_AUTH_KEY' =>    'user_id',  
	'USER_AUTH_GATEWAY' =>'/home/login',  
	'RBAC_ROLE_TABLE' =>'tp_role',  
	'RBAC_USER_TABLE' =>'tp_role_user',  
	'RBAC_ACCESS_TABLE' =>'tp_access',
	'RBAC_NODE_TABLE' =>'tp_node',  
	'RBAC_SUPERADMIN'   =>  'ysx',  
	'ADMIN_AUTH_KEY'    =>  'ysx',
);