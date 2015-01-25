<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站登录管理后台</title>
<link rel="stylesheet" type="text/css" href="/fuzhuang/Application/Admin/Public/css/login.css"/>
<script type="text/javascript" src="/fuzhuang/Public/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/fuzhuang/Application/Admin/Public/js/admin.js"></script>
</head>
<body>
<div class="top">
<form name="userLoginActionForm" id="userLoginActionForm" method="POST" action="/fuzhuang/index.php/Admin/Index/login" target="_parent" >
	<input type="text" id="username" name="username" value="" maxlength="20" placeholder="请输入用户名……" />
    <input type="password" id="userpwd" name="userpwd" maxlength="20" placeholder="请输入用户密码……"/>
    <input type="text" id="validatecode" name="validatecode" value="" placeholder="验证码" onkeypress="co_click(this.form);" style="border:1px #CCCCCC solid"maxlength="20" />    
    <a href="javaScript:getVcode2()" title="点击，换一张！">
        <img src='/fuzhuang/index.php/Admin/Public/verify' onclick='this.src=this.src+"?"+Math.random()' id="vcodesrc" name="vcodesrc"/>    	
    </a>
    <input type="button" value="" id="login_bt" name="login_bt" onclick="co_click(this.form)"/>
    <a href="" class="forget">忘记密码？</a>
    <input type="hidden"  id="is_cs" name="is_cs" value="0" />
    <input type="hidden"  id="is_get" name="is_get" value="1" />
    <input type="hidden"  id="show_msg" name="show_msg" value="" />
    <input type="hidden"  id="jz" name="jz" value="0" />
    <input type="hidden"  id="no_new" name="no_new" value="0" />
</form>
</div>
<div class="bottom">
	<div class="item_list">
    	<ul>
    	<li>一、1月28日手机版、微信网站上线
           
        </li>
    	<li>二、12月20日高级功能新增网站小图标</li>
    	<li>三、12月19日拖拽建站新增6个色系，增加选色功能</li>
    	<li>四、12月12日拖拽建站新增10个色系</li>
    	<li>五、12月6日拖拽建站新增焦点图，10个色系、模块样式扩展等</li>
    	<li>六、12月3日头部LOGO，栏目条，焦点图功能升级！</li>
    	<li>七、11月8日拖拽建站模块样式全线升级啦！</li>
     	</ul>
    </div>
   
</div> 
<div style="text-align:center;">
</div>
</body>
</html>