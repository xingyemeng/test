<?php if (!defined('THINK_PATH')) exit();?><!---参数thref，目的是给表单提交后，直接显示用户列表时的url，这样可以打开对应的列表页调用正确的内容---->
<form action='<?php echo U("Customer/doadd");?>' thref='<?php echo U("Customer/index");?>' class="ff" method="post">
    <div class='content'>
        <table>
            <tbody>
                <tr>
                    <th>姓名：</th>
                    <td>
                        <input class="easyui-validatebox" name="cname" data-options="required:true,validType:'mail'" />
                    </td>
                </tr>
                <tr>
                    <th>电话号码：</th>
                    <td>
                        <input text="text" class="easyui-validatebox" name="cphone" data-options='required:true' />
                    </td>
                </tr>
                <tr>
                    <th>描述：</th>
                    <td>
                        <textarea class="easyui-validatebox" name="cdes" data-options='required:true' ></textarea>
                    </td>
                </tr>
            </tbody>
        </table>   
    </div>
</form>