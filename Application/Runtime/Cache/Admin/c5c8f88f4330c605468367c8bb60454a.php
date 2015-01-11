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
<form action="<?php echo U('edit');?>" method="post" class="definewidth m20">
<input type="hidden" name="id" value="" />
<table class="table table-bordered table-hover ">
    <tr>
        <td width="10%" class="tableleft">登陆用户名称</td>
        <td><input type="text" name="username" value="<?php echo ($ls['username']); ?>"/></td>
    </tr>
    <tr>
        <td width="10%" class="tableleft">登陆密码</td>
        <td><input type="text" name="password" value=""/></td>
    </tr>
    <tr>
        <td width="10%" class="tableleft">确认登陆密码</td>
        <td><input type="text" name="confirm_password" value=""/></td>
    </tr>
    <tr>
        <td width="10%" class="tableleft">真实姓名</td>
        <td><input type="text" name="real_name" value="<?php echo ($ls['real_name']); ?>"/></td>
    </tr>
    <tr>
        <td width="10%" class="tableleft">联系电话</td>
        <td><input type="text" name="tel" value="<?php echo ($ls['tel']); ?>"/></td>
    </tr>
    <tr>
        <td width="10%" class="tableleft">联系手机号</td>
        <td><input type="text" name="mobile_phone" value="<?php echo ($ls['mobile_phone']); ?>"/></td>
    </tr>
    <tr>
        <td width="10%" class="tableleft">E-Mail</td>
        <td><input type="text" name="email" value="<?php echo ($ls['email']); ?>"/></td>
    </tr>
    <tr>
        <td width="10%" class="tableleft">QQ</td>
        <td><input type="text" name="qq" value="<?php echo ($ls['qq']); ?>"/></td>
    </tr>
    <tr>
        <td width="10%" class="tableleft">详细地址</td>
        <td><input type="text" name="address" value="<?php echo ($ls['address']); ?>"/></td>
    </tr>   
    <tr>
        <td class="tableleft">状态</td>
        <td >
            <input type="radio" name="user_status" value="1" <?php if($ls['user_status'] == 1): ?>checked<?php endif; ?> /> 启用
           <input type="radio" name="user_status" value="0" <?php if($ls['user_status'] == 0): ?>checked<?php endif; ?> /> 禁用
        </td>
    </tr>
    <tr>
        <td class="tableleft"></td>
        <td>
        	<input type="hidden" name="uId" value="<?php echo ($ls['id']); ?>"/>
            <button type="submit" class="btn btn-primary" type="button">保存</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
        </td>
    </tr>
</table>
</form>
</body>
</html>
<script>
    $(function () {       
		$('#backid').click(function(){
				window.location.href="index.html";
		 });

    });
</script>