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
    <script type="text/javascript">
    function check(){
     var big_photo=document.form1.big_photo.value;
     if(big_photo==''){
       $("#big_photo").attr("name","");
      }
    }
</script>
</head>
<body>
<form action="edit" method="post" class="definewidth m20" name="form1" id="form1" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo ($ls["id"]); ?>" />
<table class="table table-bordered table-hover m10">
    <tr>
        <td class="tableleft">Banner 标题</td>
        <td ><input type="text" name="banner_title" value="<?php echo ($ls['banner_title']); ?>" /></td>
    </tr>
    <tr>
        <td class="tableleft">链接网址</td>
        <td><input type="text" name="website" value="<?php echo ($ls['website']); ?>" /></td>
    </tr>
    <tr>
        <td class="tableleft">图片</td>
        <td>
            <input type="file" name="big_photo" id="big_photo"/>
            <br/>
            <img src="<?php echo ($ls['small_photo']); ?>" style=" width:180px; ">
        </td>
    </tr>
    <tr>
        <td class="tableleft">排序</td>
        <td>
            <input class="text" type="text" name="myorder" value="<?php echo ($ls['myorder']); ?>" style="width:90px;" onblur="if(/[^0123456789]/g.test(value))value=value.replace(/[^0123456789]/g,'');" onkeyup="if(/[^0123456789]/g.test(value))value=value.replace(/[^0123456789]/g,'');"/>
        </td>
    </tr>   
    <tr>
        <td class="tableleft">Banner 描述</td>
        <td>
            <textarea cols="60" rows="6" name="banner_desc" id="banner_desc"><?php echo ($ls['banner_desc']); ?></textarea>
        </td>
    </tr>       
    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="submit" class="btn btn-primary" onclick="return check();">保存</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
        </td>
    </tr>
</table>
</form>
</body>
</html>
<script>
    $(function () {       
        $('#backid').click(function(){
                window.location.href="index";
         });

    });
</script>