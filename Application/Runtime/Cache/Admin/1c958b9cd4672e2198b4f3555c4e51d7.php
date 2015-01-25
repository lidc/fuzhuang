<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/fuzhuang/Application/Admin/Public/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/fuzhuang/Application/Admin/Public/css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/fuzhuang/Application/Admin/Public/css/style.css" />
    <script type="text/javascript" src="/fuzhuang/Application/Admin/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/fuzhuang/Application/Admin/Public/js/jquery.sorted.js"></script>
    <script type="text/javascript" src="/fuzhuang/Application/Admin/Public/js/bootstrap.js"></script>
    <script type="text/javascript" src="/fuzhuang/Application/Admin/Public/js/ckform.js"></script>
    <script type="text/javascript" src="/fuzhuang/Application/Admin/Public/js/common.js"></script>

    <style type="text/css">
        body {
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }
        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }
    </style>
</head>
<body>
<form class="form-inline definewidth m20" action="index" method="get">  
    设计名称：
    <input type="text" name="design_title" id="design_title"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;  
   类型：
    <select name="parentid">
    		<option value="0">--请选择--</option>
    	<?php if(is_array($cl)): $i = 0; $__LIST__ = $cl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value='<?php echo ($v['id']); ?>' <?php if($parentid == $v['id']): ?>selected<?php endif; ?> />&nbsp; <?php if(($v['childY'] == $v['pid']) and ($v['pid'] != 0) ): ?>&nbsp;&nbsp;&nbsp;&lfloor;&nbsp;<?php endif; ?> <?php echo ($v['c_title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>            	            
    </select>
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增设计</button>
</form>
<table class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>
    	<th>序号</th>
        <th>设计标题</th>
        <th>所在分类</th>
        <th>设计图标</th>
        <th>发布时间</th>        
        <th>管理操作</th>
    </tr>
    </thead>	 
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
	           <td><?php echo ($v["id"]); ?></td>
	           <td><?php echo ($v["design_title"]); ?></td>
	           <td><?php echo ($v["b_title"]); ?> <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($v["c_title"]); ?></p></td>
	           <td><img src="<?php echo ($v["small_img"]); ?>" style="height:42px;" /></td>
	           <td><?php echo (date('Y-m-d H:i:s',$v["release_time"])); ?></td>
	           <td>
	                 <a href="edit?id=<?php echo ($v["id"]); ?>">编辑</a>    
	                 <a href="delete?id=<?php echo ($v["id"]); ?>&cid=<?php echo ($v["cid"]); ?>&cpid=<?php echo ($v["cpid"]); ?>">删除</a>              
	           </td>
	       </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<div class="inline pull-right page">
	<?php echo ($page_show); ?>        
</div>
</body>
</html>
<script>
    $(function () {        
		$('#addnew').click(function(){
				window.location.href="add.html";
		 });
    });

	function del(id)
	{		
		if(confirm("确定要删除吗？"))
		{		
			var url = "index.html";			
			window.location.href=url;		
		}	
	}
</script>