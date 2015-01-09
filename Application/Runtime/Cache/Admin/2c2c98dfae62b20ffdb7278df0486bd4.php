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
<table class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>
        <th colspan="2">欢迎您进入网站系统管理！以下是相关系统信息^_^</th>
    </tr>
    </thead>
    <tr>
        <td>当前时间</td><td><?php echo ($sysArr["current_time"]); ?></td>
    </tr>
    <tr>
        <td>当前系统类型及版本号</td><td><?php echo ($sysArr["sys_php_uname"]); ?></td>
    </tr>
    <tr>
        <td>当前PHP运行环境</td><td><?php echo ($sysArr["sys_php_sapi_name"]); ?></td>
    </tr>    
    <tr>
        <td>当前PHP版本</td><td><?php echo ($sysArr["sys_php_version"]); ?></td>
    </tr>    
    <tr>
        <td>当前服务器IP</td><td><?php echo ($sysArr["sys_server_name"]); ?></td>
    </tr>
    <tr>
        <td>当前浏览器</td><td><?php echo ($sysArr["sys_http_user_agent"]); ?></td>
    </tr>
    <tr>
        <td>技术支持联络QQ</td><td>876890079</td>
    </tr>
</table>
</body>
</html>