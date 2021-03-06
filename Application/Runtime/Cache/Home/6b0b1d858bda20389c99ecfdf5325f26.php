<?php if (!defined('THINK_PATH')) exit();?><table id="rol"></table>
<!--
		columns:[[
			{field:'id',title:'编号',width:100,checkbox:true},
			{field:'id',title:'角色名',width:100},
			{field:'id',title:'模块名',width:100},
			{field:'id',title:'控制器名',width:100},
			{field:'id',title:'方法名',width:100},
			{field:'time',title:'提交时间',width:100},
			{field:'id',title:'上级角色ID',width:200}
		]],
		这块代码就是width属性不起作用，查明情况！！！！
--->
<script>
	
	$('#rol').treegrid({
		url:'/tp2/index.php/Home/Role/rolelst',
		idField:'id',    
		treeField:'pri_name',
		singleSelect:false,
		columns:[[
			{field:'id',title:'编号',checkbox:true,width:200},
			{field:'pri_name',title:'角色名',width:200},
			{field:'mname',title:'模块名',width:200},
			{field:'cname',title:'控制器名',width:200},
			{field:'aname',title:'方法名',width:200},
			{field:'pid',title:'上级角色ID',width:200},
		]],
		toolbar:[{
			text:'新增角色',
			iconCls:'icon-add',
			handler:function(){
				var href='/tp2/index.php/Home/Role/add';
				openDialog(href);
			}
		},'-',{
			text:'批量删除',
			iconCls:'icon-remove',
			handler:function(){
				alert('批量删除');
			}
		}]
	});
	
</script>