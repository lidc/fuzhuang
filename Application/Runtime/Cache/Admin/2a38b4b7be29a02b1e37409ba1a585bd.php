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
    品牌咨询标题：
    <input type="text" name="brand_name" id="brand_name"class="abc input-default" placeholder="" value="<?php echo ($brand_name); ?>">&nbsp;&nbsp;  
    首页推荐：
     <select name="select_hotoffers">
    		<option value="none"  >--请选择--</option>
    		<option value="0" <?php if(($hotoffers == '0')): ?>selected<?php endif; ?> >不推荐</option>
    		<option value="2" <?php if(($hotoffers == 2)): ?>selected<?php endif; ?> >推荐</option>
    		<option value="1" <?php if(($hotoffers == 1)): ?>selected<?php endif; ?> >图片推荐</option>
    		            	            
    </select>
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增设计</button>
</form>
<table class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>
    	<th>序号</th>
        <th>产品咨询标题</th>
        <th>图标</th>
        <th>首页推荐</th>
        <th>时间</th>                 
        <th>管理操作</th>
    </tr>
    </thead>	 
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
	           <td><?php echo ($i); ?></td>
	           <td><?php echo ($v["brand_name"]); ?></td>
	           <td><img src="<?php echo ($v["small_img"]); ?>" style="height:42px;" /></td>
	           <td>
	           	<?php if(($v["hotoffers"] == 1)): ?>图片推荐 
				 <?php elseif($v["hotoffers"] == 2): ?>推荐
				 <?php else: ?> 不推荐<?php endif; ?>
	           	</td>
	           <td><?php echo (date('Y-m-d H:i:s',$v["add_time"])); ?></td>
	           <td>
	                 <a href="/fuzhuang/index.php/Admin/Brand/edit?id=<?php echo ($v["id"]); ?>">编辑</a>    
	                 <a href="/fuzhuang/index.php/Admin/Brand/delete?id=<?php echo ($v["id"]); ?>">删除</a>              
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
				window.location.href="/fuzhuang/index.php/Admin/Brand/add";
		 });
    });

	function del(id)
	{		
		if(confirm("确定要删除吗？"))
		{		
			var url = "index";			
			window.location.href=url;		
		}	
	}
</script>