<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>简朵服饰</title>
<link rel="stylesheet" type="text/css" href="/fuzhuang/Public/css/style.css"/>
<link rel="stylesheet" type="text/css" href="/fuzhuang/Public/css/nivo-slider.css">
<script type="text/javascript" src="/fuzhuang/Public/js/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="/fuzhuang/Public/js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript">
	$(window).load(function() {
		$('#slider').nivoSlider();
	});
</script>
<!--[if lt IE 7]>
<script type="text/javascript" src="/fuzhuang/Public/js/jquery.js"></script>
<script type="text/javascript" src="/fuzhuang/Public/js/jquery.dropdown.js"></script>
<![endif]-->
<link href="/fuzhuang/Public/css/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="/fuzhuang/Public/css/default.ultimate.css" media="screen" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="page-content">
	<div class="header">
    	<div class="logo"><a href=""><img src="/fuzhuang/Public/images/logo.png" /></a></div>
        <div class="nav">
        	<ul id="nav" class="dropdown dropdown-horizontal">
           	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($v["parent1"] != ''): ?><li id="n-home"><a href="./" class="dir"><?php echo ($v["nav_title"]); ?></a>
                <ul>
                	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i; if($v["parent1"] == $v2["parent2"] ): ?><li class="first"><a href="./" class="dir"><?php echo ($v2["nav_title"]); echo ($v2["c_title"]); ?></a>
                        <ul style=" width:160px;">
                        	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v3): $mod = ($i % 2 );++$i; if($v3["child"] == $v2["child"] && $v3["childY"] == 'y' ): ?><li class="first"><a href="./"><?php echo ($v3["c_title"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>                       
                        </ul>
                    </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>          
                                    
                </ul>
            </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        	<!--<ul>
            	<li><a href="">首页</a></li>
               	<li><a href="">关于简朵</a></li>
                <li><a href="">品牌成员</a></li>
                <li><a href="">创意设计</a></li>
                <li><a href="">产品展厅</a></li>
                <li><a href="">新闻资讯</a></li>
                <li><a href="">网点分支</a></li>
                <li><a href="">人才中心</a></li>
                <li><a href="">联系我们</a></li>
            </ul>-->
            
         <!--  <ul id="nav" class="dropdown dropdown-horizontal">
           	 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($v["parent1"] != ''): ?><li id="n-home"><a href="./" class="dir"><?php echo ($v["nav_title"]); ?></a>
                <ul>
                	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i; if($v["parent1"] == $v2["parent2"] ): ?><li class="first"><a href="./" class="dir"><?php echo ($v2["nav_title"]); echo ($v2["c_title"]); ?></a>
                        <ul style=" width:160px;">
                        	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v3): $mod = ($i % 2 );++$i; if($v3["child"] == $v2["child"] && $v3["childY"] == 'y' ): ?><li class="first"><a href="./"><?php echo ($v3["c_title"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>                       
                        </ul>
                    </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>          
                                    
                </ul>
            </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
           
           <!-- <li id="n-home"><a href="./">首页</a></li>
            <li id="n-music"><a href="./" class="dir">商品展示</a>
                <ul>
                    <li class="first"><a href="./" class="dir">一级商品</a>
                        <ul>
                            <li class="first"><a href="./">零度对策</a></li>
                            <li><a href="./">零度对策</a></li>
                            <li><a href="./">零度对策</a></li>                            
                        </ul>
                    </li>                    
                    <li><span class="dir">二级商品</span>
                        <ul>
                            <li class="first"><a href="./">网络营销技巧</a></li>
                            <li><a href="./">网络营销技巧</a></li>
                        </ul>
                    </li>                   
                </ul>
            </li>
            <li id="n-shows"><a href="./" class="dir">行业资讯</a>
                <ul>
                    <li class="first"><a href="./"><strong>行业资讯</strong></a></li>
                    <li><a href="./">行业资讯</a></li>
                    <li><a href="./"target="_blank">行业资讯</a></li>
                </ul>
            </li>
            <li id="n-news"><a href="./" class="dir">工程案例</a>
                <ul>
                    <li class="first"><a href="./">工程案例</a></li>
                    <li><span class="dir">工程案例</span>
                        <ul>
                            <li class="first"><a href="./">零度对策</a></li>
                            <li><a href="./">零度对策</a></li>
                        </ul>
                    </li>
                    <li><span class="dir">工程案例</span>
                        <ul>
                            <li class="first"><a href="./">零度对策</a></li>
                            <li><a href="./">零度对策</a></li>
                        </ul>
                    </li>                    
                </ul>
            </li>
            <li><span class="dir">关于我们</span>
                <ul>
                    <li class="first"><a href="./" class="dir">关于我们</a>
                        <ul>
                            <li class="first"><a href="./">零度对策</a></li>
                            <li><a href="./">零度对策</a></li>
                            <li><a href="./">零度对策</a></li>
                        </ul>
                    </li>
                    <li><a href="./" class="dir">关于我们</a>
                        <ul>
                            <li class="first"><span class="dir">零度对策</span>
                                <ul>
                                    <li class="first"><a href="./">电子商务</a></li>
                                    <li><a href="./">电子商务</a></li>
                                    <li><a href="./">电子商务</a></li>
                                </ul>
                            </li>
                            <li><a href="./" class="dir">关于我们</a>
                                <ul>
                                    <li class="first"><a href="./">零度对策</a></li>
                                    <li><a href="./">零度对策</a></li>
                                    <li><a href="./">零度对策</a></li>
                                </ul>
                            </li>
                            <li><a href="./">关于我们</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li id="n-home"><a href="./">零度对策</a></li>
            <li id="n-home"><a href="./">联系我们</a></li> 
        </ul>-->
        </div>
        <div class="banner">
        	<div id="wrapper">
                <div id="slider-wrapper">
                    <div id="slider" class="nivoSlider">                        
                        <a href="" target="_blank"><img src="/fuzhuang/Public/images/banner.png" alt="" width="1024" height="303"/></a>
                        <a href="" target="_blank"><img src="/fuzhuang/Public/images/banner2.jpg" alt="" width="1024" height="303"/></a>
                        <a href="" target="_blank"><img src="/fuzhuang/Public/images/banner.png" alt=""  width="1024" height="303"/></a>
                        <a href="" target="_blank"><img src="/fuzhuang/Public/images/banner2.jpg" alt=""  width="1024" height="303"/></a>
                    </div>                
                </div>
            </div>
        </div>
    </div>
    
    <div class="content">
    	<div class="con1">
        	<div class="con1-mod">
            	<div class="mod-title"><a href=""><img src="/fuzhuang/Public/images/chuangyisheji.png"/></a></div>
                <div class="mod-hot">
                	<a href=""><img src="/fuzhuang/Public/images/01.jpg"/></a>
                    <p><a href="">2015春夏灵动系列首推</a></p>
                </div>
                <div class="mod-list">
                	<hr/>
                    <ul>
                    	<li><a href="">资讯链接资讯链接</a></li>
                        <li><a href="">资讯链接资讯链接</a></li>
                        <li><a href="">资讯链接资讯链接</a></li>
                        <li><a href="">资讯链接资讯链接</a></li>
                        <li><a href="">资讯链接资讯链接</a></li>
                        <li><a href="">资讯链接资讯链接</a></li>
                        <li><a href="">资讯链接资讯链接</a></li>
                        <li><a href="">资讯链接资讯链接</a></li>
                    </ul>
                    <p><a href=""><img src="/fuzhuang/Public/images/more.png" /></a></p>
                </div>
            </div>
            <div class="con1-mod">
            	<div class="mod-title"><a href=""><img src="/fuzhuang/Public/images/pinpaizixun.png"/></a></div>
                <div class="mod-hot">
                	<a href=""><img src="/fuzhuang/Public/images/02.jpg"/></a>
                    <p><a href="">J.D.Chaude创业天虹推广活动启动</a></p>
                </div>
                <div class="mod-list">
                	<hr/>
                    <ul>
                    	<li><a href="">资讯链接资讯链接</a></li>
                        <li><a href="">资讯链接资讯链接</a></li>
                        <li><a href="">资讯链接资讯链接</a></li>
                        <li><a href="">资讯链接资讯链接</a></li>
                        <li><a href="">资讯链接资讯链接</a></li>
                        <li><a href="">资讯链接资讯链接</a></li>
                        <li><a href="">资讯链接资讯链接</a></li>
                        <li><a href="">资讯链接资讯链接</a></li>
                    </ul>
                    <p><a href=""><img src="/fuzhuang/Public/images/more.png" /></a></p>
                </div>
            </div>
            <div class="con1-mod">
            	<div class="mod-title"><a href=""><img src="/fuzhuang/Public/images/jiaoyufenxiang.png"/></a></div>
                <div class="mod-hot">
                	<a href=""><img src="/fuzhuang/Public/images/03.jpg"/></a>
                    <p><a href="">少女如何穿文胸</a></p>
                </div>
                <div class="mod-list">
                	<hr/>
                    <ul>
                    	<li><a href="">资讯链接资讯链接</a></li>
                        <li><a href="">资讯链接资讯链接</a></li>
                        <li><a href="">资讯链接资讯链接</a></li>
                        <li><a href="">资讯链接资讯链接</a></li>
                        <li><a href="">资讯链接资讯链接</a></li>
                        <li><a href="">资讯链接资讯链接</a></li>
                        <li><a href="">资讯链接资讯链接</a></li>
                        <li><a href="">资讯链接资讯链接</a></li>
                    </ul>
                    <p><a href=""><img src="/fuzhuang/Public/images/more.png" /></a></p>
                </div>
            </div>
        </div>
        
        <div class="con2">
        	<div class="con2-head">
            	<div class="con2-title">J.D.Chaude 暖暖热卖单品 Sells a single product</div>
                <div class="con2-img"><img src="/fuzhuang/Public/images/05.jpg" /></div>
            </div>
            <div class="con2-product-list">
            	<ul>
                	<li><a href=""><img src="/fuzhuang/Public/images/06.jpg" /></a></li>
                    <li><a href=""><img src="/fuzhuang/Public/images/07.jpg" /></a></li>
                    <li><a href=""><img src="/fuzhuang/Public/images/08.jpg" /></a></li>
                    <li><a href=""><img src="/fuzhuang/Public/images/09.jpg" /></a></li>
                    <li><a href=""><img src="/fuzhuang/Public/images/10.jpg" /></a></li>
                </ul>
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