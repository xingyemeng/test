<?php if (!defined('THINK_PATH')) exit();?><table id="dg"></table>
<script>
    var datagrid; //定义全局变量datagrid
    var editRow = undefined; //定义全局变量：当前编辑的行
datagrid=$('#dg').datagrid({
    url:'/tp3/index.php/Home/Customer/userList',//因为ThinkPHP的 $this->ajaxReturn(); 返回到前台的数据格式是数组，而EasyUI DataGrid 接收的Json 格式是对象 ，
    pagination: true, //显示分页
    pageSize: 5, //页大小
    pageList: [15, 30, 45, 60], //页大小下拉选项此项各value是pageSize的倍数
    fit: true, //datagrid自适应宽度
    fitColumn: false, //列自适应宽度
    striped: true, //行背景交换
    nowap: true, //列内容多时自动折至第二行
    border: false,
    idField: 'id', //主键
    columns:[[
            {field: 'id', title: '编号', width: 100, sortable: true, checkbox: true },
            {field:'com_name',title:'姓名',width:100,sortable: true,
                 editor: { type: 'validatebox', options: { required: true} }},
            {field:'com_phone',title:'电话',width:100,
                 editor: { type: 'validatebox', options: { required: true} }},
            {field:'desc',title:'描述',width:100,
                 editor: { type: 'validatebox', options: { required: true} }},
            {field:'time',title:'提交时间',width:100},
			{field:'userId',title:'操作', width:80,
			formatter: function(value,row,index){
				var btn = "<a class='editcls' onclick='editUser("+index+")' href='javascript:void(0)'>编辑</a>|<a onclick='del("+index+")' href='javascript:void(0)'>删除</a>";
                return btn;
			}}

            ]],
    queryParams: { action: 'query' }, //查询参数           
	onClickRow: function (rowIndex, rowData) {
                            $(this).datagrid('unselectRow', rowIndex);
                        },
    toolbar: [{
                text: '修改',
		iconCls: 'icon-edit',
		handler: function(){
                    changeGrid();
                    
                }
	},'-',{
		iconCls: 'icon-save',
		text: '保存',
		handler: function(){
					var url = '/tp3/index.php/Home/Customer/change';
					saveGrid(url);
					
		}
	},'-',{
		iconCls: 'icon-add',
		text: '添加',
		handler: function(){
			var href='/tp3/index.php/Home/customer/add';
			openDialog(href);
		}
	}]
});  

//操作按钮调用
function editUser(index){
	if(editRow!==undefined){
		datagrid.datagrid('endEdit',editRow);
		editRow = undefined;
	}
	if(editRow==undefined){
		 //开启编辑
		 datagrid.datagrid("beginEdit", index);
		 //修改编辑行状态
		 editRow = index;
	}
}
//删除按钮
function del(index){
	var rows = datagrid.datagrid('getSelected',index);
	if(rows != null)
	{
		$.messager.confirm('确认对话框','您确定删除&nbsp;&nbsp;&nbsp;'+rows.com_name+'?',function(r){
			if(r){
				$.post('/tp3/index.php/Home/Customer/del',{id:rows.id},function(msg){
					$('#dg').datagrid('reload');
					$.messager.alert('提示消息',msg);
				})
			}
		});
	}else{
		alert('请勾选要删除的项');
	}
}
	
</script>