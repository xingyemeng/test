/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

	/*
	*打开dialog对话框
	*@param href（传递对话框中显示的页面的地址）
	*@author杨少鑫
	*@2016.11.18
	**/
	function openDialog(href){
		$('#dialog_cms').dialog({    
                        title: '添加新权限',    
                        width: 580,    
                        height: 360,    
                        closed: false,    
                        cache: false,    
                        href: href,
                        modal: true.constructor,
                        buttons: [{
                                text: '保存',
                                iconCls: 'icon-ok',
                                handler: function () {
                                    //alert(classId);
                                    submitForm(); //调用更新操作
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
	}
	/*
	*修改datagrid中的选中行
	*
	*@author杨少鑫
	*@2016.11.18
	**/
	function changeGrid(){
		//获取到被选中的行
		var rows = datagrid.datagrid('getSelections');
		//选中多行则不执行编辑
		if(rows.length !== 1){
			alert('请选择其中一行修改');
		}else{
			if(editRow!==undefined){
				datagrid.datagrid('endEdit',editRow);
				editRow = undefined;
			}
			if(editRow==undefined){
				var index = datagrid.datagrid("getRowIndex", rows[0]);
				 //开启编辑
				 datagrid.datagrid("beginEdit", index);
				 //修改编辑行状态
				 editRow = index;
				 
			}
		}
	}
	/*
	*保存datagrid中编辑行修改后的数据，并提交数据库
	*@param url
	*@author杨少鑫
	*@2016.11.18
	**/	
	function saveGrid(url){
		datagrid.datagrid('endEdit',editRow);//关闭编辑行，才能能获取当前被修改的数据					
		var rows = datagrid.datagrid('getChanges','updated');//获取编辑行
		//假如没有修改过，则返回空（之前没有写着局可以再firebug中看到有错误，但是效果一样）
		if(rows[0] == undefined){
			alert('没有改变了的数据');
			return;
		}
		//定义一个数组
		var data = new Array();
		//把修改后的值放到数组data中					
		data['id'] = rows[0]['id'];
		data['com_name'] = rows[0]['com_name'];
		data['com_phone'] = rows[0]['com_phone'];
		data['desc'] = rows[0]['desc'];
		//获取编辑行中的值
		//datagrid.datagrid('acceptChanges');
		//data.JSON.stringify();
		//想php传参数data，并更新数据库
		changdb(data,url);
	}
	/*
	 *向数据库提交需要更新的数据
	*/
	function changdb(data,url){
		$.post(url,{id:data['id'],com_name:data['com_name'],com_phone:data['com_phone'],desc:data['desc']},function(msg){
			alert(msg);
		})
	}
	/*
	*表单提交
	*@param url
	*@author杨少鑫
	*@2016.11.18
	**/	
	function submitForm(href){
		var url = $('.ff').attr('action');
        $('.ff').form('submit', {
            url:url,
            success: function(msg){
					dialogOnClose();
                    var data = $.parseJSON(msg);
					var subtitle = data.subtitle;
                    //exgrid(data,href,subtitle);
                    $.messager.show({
                            title:'提交状态',
                            msg:data.info,
                            timeout: 5000,
                            showType: 'slide'
                    });
            }
        });
    }
    function dialogOnClose(){
        $('#dialog_cms').dialog('close');
    }
    function exgrid(data,href,subtitle){
        var classId = 'index';
        var subtitle = subtitle;        
        var url = href;
        if(data.state==="c"){
            dialogOnClose();
        }else{
            $.messager.alert('提示框',data.info);
            //return;
        }
		/*添加数据后自动跳转到显示列表*/
        $('#dg').datagrid('reload');
        if (!$('#tabs_' + classId).tabs('exists', subtitle)) {
                    $('#tabs_' + classId).tabs('add', {
                        title: subtitle,
                        content: subtitle,
                        closable: true,
                        href: href,
                        tools: [{
                                iconCls: 'icon-mini-refresh',
                                handler: function () {
                                    updateTab(classId, url, subtitle);
                                }
                            }]
                    });
                } else {
                    $('#tabs_' + classId).tabs('select', subtitle);
                }
    }
	
	