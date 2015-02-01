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
         var nav_photo=$("#nav_photo").val();
         if(nav_photo==''){
           $("#nav_photo").attr("name","");
           // return false;
          }
        }
    </script>
</head>
<body>
<form action="edit" method="post" class="definewidth m20" id="form1" name="form1" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo ($nl["id"]); ?>" />
<table class="table table-bordered table-hover m10">
    <tr>
        <td width="10%" class="tableleft">上级</td>
        <td>
            <select name="parentid">
                <option value="0">&nbsp;一级菜单</option>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value='<?php echo ($v['id']); ?>' <?php if($v['id'] == $nl['pid']): ?>selected<?php endif; ?> />&nbsp;<?php echo ($v['nav_title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>                           
            </select>
        </td>
    </tr>
    <tr>
        <td class="tableleft">菜单名称</td>
        <td><input type="text" name="nav_title" value="<?php echo ($nl['nav_title']); ?>" /></td>
    </tr>
     <tr>
        <td class="tableleft">页面路径</td>
        <td><input type="text" name="page_url" value="<?php echo ($nl['page_url']); ?>"/></td>
    </tr>
    <tr>
        <td class="tableleft">菜单简介</td>
        <td><textarea cols="40" rows="5" name="nav_desc" id="nav_desc" style="width:380px;"><?php echo ($nl['nav_desc']); ?></textarea></td>
    </tr>
    <tr>
        <td class="tableleft">图片</td>
        <td>
            <input type="file" name="nav_photo" id="nav_photo"/>
            <br/>
            <?php if($nl['nav_photo'] != ''): ?><img src="<?php echo ($nl['nav_photo']); ?>" style="height:80px;"/><?php endif; ?>
        </td>
    </tr>
    <tr>
        <td class="tableleft">排序</td>
        <td>
            <input class="text" type="text" name="nav_order" value="<?php echo ($nl['nav_order']); ?>" style="width:90px;" onblur="if(/[^0123456789]/g.test(value))value=value.replace(/[^0123456789]/g,'');" onkeyup="if(/[^0123456789]/g.test(value))value=value.replace(/[^0123456789]/g,'');"/>
        </td>
    </tr>   
    <tr>
        <td class="tableleft">状态</td>
        <td>
            <input type="radio" name="nav_status" value="1" <?php if($nl['nav_status'] == 1): ?>checked<?php endif; ?> /> 启用
            <input type="radio" name="nav_status" value="0" <?php if($nl['nav_status'] == 0): ?>checked<?php endif; ?> /> 禁用
        </td>
    </tr>
    <tr>
        <td class="tableleft">页面内容</td>
        <td>
            <textarea cols="40" rows="5" name="page_content" id="page_content"><?php echo ($ncl['content']); ?></textarea>
        </td>
    </tr>
    <tr>
        <td class="tableleft" colspan="2">SEO优化</td>       
    </tr>
    <tr>
        <td class="tableleft">Meta 标题</td>
        <td>
            <input type="text" name="meta_title" style="width:380px;" value="<?php echo ($nl['meta_title']); ?>" />
        </td>
    </tr>
    <tr>
        <td class="tableleft">Meta 关键字</td>
        <td>
            <input type="text" name="meta_keywords" style="width:380px;" value="<?php echo ($nl['meta_keywords']); ?>" />
        </td>
    </tr>
    <tr>
        <td class="tableleft">Meta 描述</td>
        <td>
            <input type="text" name="meta_description" style="width:380px;" value="<?php echo ($nl['meta_description']); ?>" />
        </td>
    </tr>    
    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="submit" class="btn btn-primary" onclick="return check();"/>保存</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
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
<?php echo ($editor); ?>