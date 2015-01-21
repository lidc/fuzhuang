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
    <script src="/fuzhuang/plug-in/lightbox/js/jquery-1.11.0.min.js"></script>
	<script src="/fuzhuang/plug-in/lightbox/js/lightbox.min.js"></script>
	<link href="/fuzhuang/plug-in/lightbox/css/lightbox.css" rel="stylesheet" />
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
<form action="addImg" method="post" class="definewidth m20" name="form1" id="form1" enctype="multipart/form-data">
<input type="hidden" value="<?php echo ($id); ?>" name="id" id="id"/>
<table class="table table-bordered table-hover m10">
    <tr>
        <td class="tableleft" colspan="2"><h3><?php echo ($title); ?>的产品图片列表</h3></td>        
    </tr>
    <tr>
    	<td  width="10%" class="tableleft">请选择图片</td>
        <td>
            <input type="file" name="big_img" id="big_img"/>
        </td>
    </tr>
    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="submit" class="btn btn-primary" onclick="return check();" >保存</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
        </td>
    </tr>
    <tr>
        <td colspan="2">
        	<div class="image-row">
				<div class="image-set">
					<ul>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
							<a class="example-image-link" href="<?php echo ($v['big_img']); ?>" data-lightbox="example-set" data-title="">
								<img class="example-image" src="<?php echo ($v['small_img']); ?>" alt=""/>
							</a>
							<a href="deleteImg?id=<?php echo ($v['id']); ?>&productId=<?php echo ($v['product_id']); ?>" class="imgdel">删除</a>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
						<li>
							<a class="example-image-link" href="/fuzhuang/plug-in/lightbox/img/demopage/image-3.jpg" data-lightbox="example-set" data-title="">
								<img class="example-image" src="/fuzhuang/plug-in/lightbox/img/demopage/thumb-3.jpg" alt=""/>
							</a>
							<a href="deleteImg?id=<?php echo ($id); ?>" class="imgdel">删除</a>
						</li>
						<li>
							<a class="example-image-link" href="/fuzhuang/plug-in/lightbox/img/demopage/image-4.jpg" data-lightbox="example-set" data-title="">
								<img class="example-image" src="/fuzhuang/plug-in/lightbox/img/demopage/thumb-4.jpg" alt="" />
							</a>
							<a href="" class="imgdel">删除</a>
						</li>
						<li>
							<a class="example-image-link" href="/fuzhuang/plug-in/lightbox/img/demopage/image-5.jpg" data-lightbox="example-set" data-title="">
								<img class="example-image" src="/fuzhuang/plug-in/lightbox/img/demopage/thumb-5.jpg" alt="" />
							</a>
							<a href="" class="imgdel">删除</a>
						</li>
						<li>
							<a class="example-image-link" href="/fuzhuang/plug-in/lightbox/img/demopage/image-6.jpg" data-lightbox="example-set" data-title="">
								<img class="example-image" src="/fuzhuang/plug-in/lightbox/img/demopage/thumb-6.jpg" alt="" />
							</a>
							<a href="" class="imgdel">删除</a>
						</li>
					</ul>
				</div>
			</div>
        	
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