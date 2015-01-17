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
    用户名称：
    <input type="text" name="userName" id="userName"class="abc input-default" placeholder="" value="<?php echo ($userName); ?>">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增用户</button>
</form>
<table class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>
        <th>编号</th>
        <th>登录用户</th>
        <th>真实名称</th>
        <th>联系电话</th>
        <th>状态</th>
        <th>添加时间</th>
        <th>管理操作</th>
    </tr>
    </thead>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>            
            <td><?php echo ($vo['id']); ?></td>
            <td><?php echo ($vo['username']); ?></td>
            <td><?php echo ($vo['real_name']); ?></td>
            <td><?php echo ($vo['phone']); ?></td>
            <td><?php echo ($vo['status']); ?></td>
            <td><?php echo ($vo['add_time']); ?></td>
            <td>
                  <a href="edit?uId=<?php echo ($vo['id']); ?>">编辑</a>
                  <a href="delete?uId=<?php echo ($vo['id']); ?>">删除</a>
            </td>            
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    <div class="inline pull-right page">
        <?php echo ($page_show); ?>
         <!-- 10122 条记录 1/507 页  <a href='#'>下一页</a>     <span class='current'>1</span><a href='#'>2</a><a href='/chinapost/index.php?m=Label&a=index&p=3'>3</a><a href='#'>4</a><a href='#'>5</a>  <a href='#' >下5页</a> <a href='#' >最后一页</a> -->    
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