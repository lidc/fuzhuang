<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($ls["meta_title"]); ?></title>
<meta name="description" content="<?php echo ($ls["meta_description"]); ?>" />
<meta name="keywords" content="<?php echo ($ls["meta_keywords"]); ?>" />
<script src="/fuzhuang/Public/js/jquery-1.9.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="/fuzhuang/Public/css/style.css"/>
<link rel="stylesheet" href="/fuzhuang/plug-in/themes/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/fuzhuang/plug-in/nivo_slider/nivo-slider.css" type="text/css" media="screen" />
<script type="text/javascript" src="/fuzhuang/plug-in/nivo_slider/jquery.nivo.slider.js"></script>
<link href="/fuzhuang/Public/css/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="/fuzhuang/Public/css/default.ultimate.css" media="screen" rel="stylesheet" type="text/css" />
<!--[if lt IE 7]>
<script type="text/javascript" src="/fuzhuang/Public/js/jquery.js"></script>
<script type="text/javascript" src="/fuzhuang/Public/js/jquery.dropdown.js"></script>
<![endif]-->
<script src="/fuzhuang/plug-in/lightbox/js/lightbox.js"></script>
<link href="/fuzhuang/plug-in/lightbox/css/lightbox.css" rel="stylesheet" />
<script type="text/javascript">
	$(window).load(function() {
	    $('#slider').nivoSlider();
	});
</script>
</head>

<body>
<div class="page-content">
	<div class="header">
    	<div class="logo"><a href=""><img src="/fuzhuang/Public/images/logo.png" /></a></div>
        <div class="nav">
        	<ul id="nav" class="dropdown dropdown-horizontal">
	<?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($v["parent1"] != ''): ?><li id="n-home"><a href="/fuzhuang/index.php/Home/<?php echo ($v["page_url"]); ?>?id=<?php echo ($v["id"]); ?>" class="dir"><?php echo ($v["nav_title"]); ?></a>
		        <ul>
			    	<?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i; if($v["parent1"] == $v2["parent2"] ): ?><li class="first"><a href="/fuzhuang/index.php/Home/<?php echo ($v["page_url"]); ?>?id=<?php echo ($v["id"]); ?>&cpid=<?php echo ($v2["id"]); ?>" class="dir"><?php echo ($v2["nav_title"]); echo ($v2["c_title"]); ?></a>
						        <ul style=" width:160px;">
							      <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v3): $mod = ($i % 2 );++$i; if($v3["child"] == $v2["child"] && $v3["childY"] == 'y' ): ?><li class="first"><a href="/fuzhuang/index.php/Home/<?php echo ($v["page_url"]); ?>?id=<?php echo ($v["id"]); ?>&cpid=<?php echo ($v2["id"]); ?>&cid=<?php echo ($v3["id"]); ?>"><?php echo ($v3["c_title"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>                       
						      </ul>
						  </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>	                            
		        </ul>
	    	</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
</ul>        	
        </div>
        <div class="banner">
        	<div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
         <?php if(is_array($banner)): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo ($v["website"]); ?>" target="_blank"><img src="<?php echo ($v["big_photo"]); ?>" alt="" width="1024" height="303"/></a><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>   
</div>
        </div>
    </div>
    
    <div class="content">
    	<div class="con2">
        	<h1><?php echo ($ls["nav_title"]); ?></h1>
            <div>
            	<?php echo ($content); ?>
            </div>
            	
        </div>
    </div> 
    <div class="bottom">
    	<p>&nbsp;</p>
       <p>地址：广东省深圳市福田区益田创新科技园20栋713-715室 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;邮编：518017</p>
       <p>Add： Room 713-715,  building  No.20,  Yitian  Chuangxin  Chanyeyuan, Futian District , Shenzhen, Guangdong, China    &nbsp;&nbsp;&nbsp;Zip card：518017</p>
       <p>电话(Tel)：86-755-8382 5026 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 传真(Fax)：86-755-8382 4807</p>
       <p><span>服务热线(Hotline)：400 9973 929</span></p>
    </div>  
</div>
</body>
</html>