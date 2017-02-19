<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
<html>
<head>
<title>客户管理</title>
<link rel="stylesheet" type="text/css" href="/tp3/Public/easyui/themes/default/easyui.css">   
<link rel="stylesheet" type="text/css" href="/tp3/Public/easyui/themes/icon.css">   
<script type="text/javascript" src="/tp3/Public/easyui/jquery.min.js"></script>   
<script type="text/javascript" src="/tp3/Public/easyui/jquery.easyui.min.js"></script>
<script type="text/javascript" src="/tp3/Public/easyui/locale/easyui-lang-zh_CN.js"></script>
<script type="text/javascript" src="/tp3/Public/js/index.js"></script>
<link rel="stylesheet" type="text/css" href="/tp3/Public/css/index.css">
</head>
<body class="easyui-layout layout_index">
     <script type="text/javascript">
        $(function () {
            $('.side li a').click(function(){
                var url = $(this).attr('cmshref');
                var classId = 'index';
                var subtitle = $(this).text();
                var rel = $(this).attr('rel');
                if (rel == 'dialog') {
                    $('#dialog_cms').dialog({    
                        title: 'My Dialog',    
                        width: 580,    
                        height: 360,    
                        closed: false,    
                        cache: false,    
                        href: url,    
                        modal: true.constructor,
                        buttons: [{
                                text: '保存',
                                iconCls: 'icon-ok',
                                handler: function () {
                                    //alert(classId);
									
									var href=$('.ff').attr('thref');
                                    submitForm(href); //调用更新操作
                                }
                            }, {
                                text: '取消',
                                iconCls: 'icon-cancel',
                                handler: function () {
                                    dialogOnClose();
                                }
                            }
                        ]
                    });
                    return false;
                }
                if (!$('#tabs_' + classId).tabs('exists', subtitle)) {
                    $('#tabs_' + classId).tabs('add', {
                        title: subtitle,
                        content: subtitle,
                        closable: true,
                        href: url,
                        tools: [{
                                iconCls: 'icon-mini-refresh',
                                handler: function () {
                                    updateTab(classId, url, subtitle);
                                }
                            }]
                    });
                    return false;
                } else {
                    $('#tabs_' + classId).tabs('select', subtitle);
                    return false;
                }
            });
        });
    </script>
    <div data-options="region:'north',split:true" style="height:100px;">
        <div class="logo" style="float:left;"><image src="/tp3/Public/images/logo1.jpg" /></div>
        <div style="float:right;">
            
    <p>欢迎您<?php echo session('username');?>，<a href="/tp3/index.php/home/login/logout" target="_top">退出</a></p>


        </div>
    </div> 
    <div data-options="region:'west',title:'菜单栏',split:true" style="width:200px;">
        <div class="easyui-accordion side" data-options="multiple:true">
            <!--//左侧菜单导航-->
            <div title="客户信息管理" data-options="iconCls:'icon-mini-add'" style="overflow:auto;padding:10px;">
	<ul class="easyui-tree" data-options="animate:true">
		
			<li data-options="state:'open'">
				<span>客户信息管理</span>
				<ul>
					<li><a rel="dialog" href="javascript:void(0);" cmshref="/tp3/index.php/Home/customer/add">客户信息录入</a></li>
					<li><a href="javascript:void(0);" cmshref="/tp3/index.php/Home/customer/index">客户信息列表</a></li>
				</ul>
	</ul>
</div>
<div title="系统设置" data-options="iconCls:'icon-mini-add'" style="overflow:auto;padding:10px;">
	<ul class="easyui-tree" data-options="animate:true">
		
			<li data-options="state:'open'">
				<span>权限管理</span>
				<ul>
					<li><a href="javascript:void(0);" cmshref="/tp3/index.php/Home/Privilege/lst">权限列表</a></li>
					<li><a href="javascript:void(0);" cmshref="/tp3/index.php/Home/Role/lst">角色列表</a></li>
					<li><a href="javascript:void(0);" cmshref="/tp3/index.php/Home/Admin/lst">管理员列表</a></li>
				</ul>
			</li> 
	</ul>
</div>
<div title="个人信息管理" data-options="iconCls:'icon-mini-add'" style="overflow:auto;padding:10px;">
	<ul class="easyui-tree" data-options="animate:true">
		
			<li data-options="state:'open'">
				<span>个人信息管理</span>
				<ul>
					<li><a rel="dialog" href="javascript:void(0);" cmshref="/tp3/index.php/Home/customer/add">基本信息修改</a></li>
					<li><a href="javascript:void(0);" cmshref="/tp3/index.php/Home/customer/index">密码修改</a></li>
				</ul>
			</li> 
	</ul>
</div>
<div title="待定。。。。" data-options="iconCls:'icon-mini-add'" style="overflow:auto;padding:10px;">
	<ul class="easyui-tree" data-options="animate:true">
		
			<li data-options="state:'open'">
				<span>待定。。。。</span>
				<ul>
					<li><a rel="dialog" href="javascript:void(0);" cmshref="/tp3/index.php/Home/customer/add">待定。。。。</a></li>
				</ul>
			</li> 
	</ul>
</div>
            <!--//左侧菜单导航-->
        </div><!--accordion-->
    </div>   
    <div data-options="region:'center',title:'内容管理系统'" style="padding:5px;background:#eee;">
         <div id="tabs_index" class="easyui-tabs"  fit="true" border="false">
            

        </div>
    </div>
    <div id="dialog_cms" data-options="iconCls:'icon-save'">
    </div>
    
</body>	

</html>