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
<form class="form-inline definewidth m20" action="/fuzhuang/index.php/Admin/Product/index" method="get">  
    产品名称：
    <input type="text" name="product_title" id="product_title"class="abc input-default" placeholder="<?php echo ($product_title); ?>" value="">&nbsp;&nbsp; 
    产品类型：
    <select name="parentid">
    		<option value="0">--请选择--</option>
    	<?php if(is_array($cl)): $i = 0; $__LIST__ = $cl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value='<?php echo ($v['id']); ?>' <?php if($parentid == $v['id']): ?>selected<?php endif; ?> />&nbsp; <?php if(($v['childY'] == $v['pid']) and ($v['pid'] != 0) ): ?>&nbsp;&nbsp;&nbsp; &lfloor; &nbsp;<?php endif; ?> <?php echo ($v['c_title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>            	            
    </select>&nbsp;&nbsp;  
    首页推荐：
     <select name="select_hotoffers">
            <option value="none"  >--请选择--</option>
            <option value="0" <?php if(($hotoffers == '0')): ?>selected<?php endif; ?> >不推荐</option>
            <!-- <option value="2" <?php if(($hotoffers == 2)): ?>selected<?php endif; ?> >推荐</option> -->
            <option value="1" <?php if(($hotoffers == 1)): ?>selected<?php endif; ?> >图片推荐</option>
                                        
    </select>
    &nbsp;&nbsp; 
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增产品</button>
</form>
<table class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>
    	<th>序号</th>
        <th>产品名称</th>
        <th>所在分类</th>
        <th>状态</th>
        <th>产品图片</th>
        <th>更多图片</th>   
        <th>首页推荐</th>             
        <th>管理操作</th>
    </tr>
    </thead>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
	           <td>1</td>
	           <td><?php echo ($v['product_title']); ?></td>
	           <td><?php echo ($v['b_title']); ?> <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($v['c_title']); ?></p></td>
	           <td><?php echo ($v['status']); ?></td>
	           <td><img src="<?php echo ($v['small_img']); ?>" style="height:52px;" /></td>
	           <td><a href="imgList?id=<?php echo ($v['id']); ?>&title=<?php echo ($v['product_title']); ?>">查看</a></td>
               <td>
                <?php if(($v["hotoffers"] == 1)): ?>图片推荐 
                 <?php elseif($v["hotoffers"] == 2): ?>推荐
                 <?php else: ?> 不推荐<?php endif; ?>
                </td>	           
	           <td>
                 <a href="/fuzhuang/index.php/Admin/Product/edit?id=<?php echo ($v['id']); ?>">编辑</a>    
                 <a href="/fuzhuang/index.php/Admin/Product/delete?id=<?php echo ($v['id']); ?>">删除</a>              
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
				window.location.href="/fuzhuang/index.php/Admin/Product/add";
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