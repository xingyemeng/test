<?php if (!defined('THINK_PATH')) exit();?><form class="ff" action='<?php echo U("Privilege/doadd");?>' method="post">
	<div class='content'>
        <table>
            <tbody>
                <tr>
                    <th>上级权限：</th>
                    <td>
                        <select name='id'>  
							<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value ="<?php echo $vo['id']; ?>"><?php $__FOR_START_24227__=0;$__FOR_END_24227__=$vo['level'];for($i=$__FOR_START_24227__;$i < $__FOR_END_24227__;$i+=1){ ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>|----<?php echo ($vo["pri_name"]); ?></option>
								if(<?php echo ($vo["children"]); ?>){
									<?php if(is_array($vo["children"])): $i = 0; $__LIST__ = $vo["children"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lst): $mod = ($i % 2 );++$i;?><option value ="<?php echo $lst['id']; ?>"><?php $__FOR_START_9632__=0;$__FOR_END_9632__=$lst['level'];for($i=$__FOR_START_9632__;$i < $__FOR_END_9632__;$i+=1){ ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>|----<?php echo ($lst["pri_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								}<?php endforeach; endif; else: echo "" ;endif; ?> 
						</select>
                    </td>
                </tr>
                <tr>
                    <th>权限名：</th>
                    <td>
                        <input type='text' name='pri_name' value='' />
                    </td>
                </tr>
				<tr>
                    <th>模块名：</th>
                    <td>
                        <input type='text' name='mname' value='' />
                    </td>
                </tr>
				<tr>
                    <th>控制器名：</th>
                    <td>
                        <input type='text' name='cname' value='' />
                    </td>
                </tr>
				<tr>
                    <th>方法名：</th>
                    <td>
                        <input type='text' name='aname' value='' />
                    </td>
                </tr>
            </tbody>
        </table>   
    </div>
</form>