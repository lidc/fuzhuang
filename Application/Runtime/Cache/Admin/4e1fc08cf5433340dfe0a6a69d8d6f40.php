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
     var big_img=document.form1.big_img.value;
     if(big_img==''){
       $("#big_img").attr("name","");
      }
    }
</script>
</head>
<body>
<form action="edit" method="post" class="definewidth m20" name="form1" id="form1" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo ($dl["id"]); ?>" />
<table class="table table-bordered table-hover m10">
    <tr>
        <td class="tableleft">标题</td>
        <td><input type="text" name="brand_name" value="<?php echo ($dl["brand_name"]); ?>"/></td>
    </tr>
    <tr>
        <td class="tableleft">描述</td>
        <td><textarea cols="40" rows="5" name="brand_desc" id="brand_desc" style="width:380px;"> <?php echo ($dl["brand_desc"]); ?> </textarea></td>
    </tr>
    <tr>
        <td class="tableleft">外部链接</td>
        <td><input type="text" name="brand_url" value="<?php echo ($dl["brand_url"]); ?>" /></td>
    </tr>
    <tr>
        <td class="tableleft">图片</td>
        <td>
            <input type="file" name="big_img" id="big_img" />
            <br/>
            <?php if($dl["small_img"] != ''): ?><img src="<?php echo ($dl["small_img"]); ?>" style="height:136px;"/><?php endif; ?>
        </td>
    </tr>
    <tr>
        <td class="tableleft">状态</td>
        <td>
            <input type="radio" name="status" value="1" <?php if($dl['status'] == 1): ?>checked<?php endif; ?> /> 启用
            <input type="radio" name="status" value="0" <?php if($dl['status'] == 0): ?>checked<?php endif; ?> /> 禁用
        </td>
    </tr>
    <tr>
        <td class="tableleft">首页推荐</td>
        <td>
            <input type="radio" name="hotOffers" value="1" <?php if(($dl["hotoffers"] == 1)): ?>checked<?php endif; ?> /> 首页图片推荐
            <input type="radio" name="hotOffers" value="2" <?php if($dl["hotoffers"] == 2): ?>checked<?php endif; ?> /> 首页推荐
            <input type="radio" name="hotOffers" value="0" <?php if($dl["hotoffers"] == 0): ?>checked<?php endif; ?> /> 不推荐
        </td>
    </tr>
    <tr>
        <td class="tableleft">页面内容</td>
        <td>
        	<textarea cols="40" rows="5" name="brand_content" id="brand_content"> <?php echo ($dl["brand_content"]); ?> </textarea>
        </td>
    </tr>
    <tr>
        <td class="tableleft" colspan="2">SEO优化</td>       
    </tr>
    <tr>
        <td class="tableleft">Meta 标题</td>
        <td>
            <input type="text" name="meta_title" style="width:380px;" value="<?php echo ($dl["meta_title"]); ?>"/>
        </td>
    </tr>
    <tr>
        <td class="tableleft">Meta 关键字</td>
        <td>
            <input type="text" name="meta_keywords" style="width:380px;" value="<?php echo ($dl["meta_keywords"]); ?>"/>
        </td>
    </tr>
    <tr>
        <td class="tableleft">Meta 描述</td>
        <td>
            <input type="text" name="meta_description" style="width:380px;" value="<?php echo ($dl["meta_keywords"]); ?>" />
        </td>
    </tr>    
    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="submit" class="btn btn-primary" onclick="return check();" >保存</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
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
<?php echo ($editor); ?>