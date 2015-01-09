<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<title>后台管理系统</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/fuzhuang/Application/Admin/Public/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
<link href="/fuzhuang/Application/Admin/Public/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
<link href="/fuzhuang/Application/Admin/Public/assets/css/main-min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/fuzhuang/Public/js/jquery-1.10.2.min.js"></script>
</head>
<body>
<div class="header">
  <div class="dl-title"> 
    <!--<img src="/chinapost/Public/assets/img/top.png">--> 
  </div>
  <div class="dl-log">欢迎您，<span class="dl-log-user"><?php echo ($_SESSION['fuzhuang']['username']); ?></span><a href="/chinapost/index.php?m=Public&a=logout" title="退出系统" class="dl-log-quit">[退出]</a> </div>
</div>
<div class="content">
  <div class="dl-main-nav">
    <div class="dl-inform">
      <div class="dl-inform-title"><s class="dl-inform-icon dl-up"></s></div>
    </div>
    <ul id="J_Nav"  class="nav-list ks-clear">
      <li class="nav-item dl-selected">
        <div class="nav-item-inner nav-home">系统管理</div>
      </li>
      <li class="nav-item dl-selected">
        <div class="nav-item-inner nav-order">产品管理</div>
      </li>
      <li class="nav-item dl-selected">
        <div class="nav-item-inner nav-order">创意设计</div>
      </li>
      <li class="nav-item dl-selected">
        <div class="nav-item-inner nav-order">新闻资讯</div>
      </li>
      <li class="nav-item dl-selected">
        <div class="nav-item-inner nav-order">产品管理</div>
      </li>
      <li class="nav-item dl-selected">
        <div class="nav-item-inner nav-order">新闻管理</div>
      </li>
    </ul>
  </div>
  <ul id="J_NavContent" class="dl-tab-conten"> 
  </ul>
</div>
<script type="text/javascript" src="/fuzhuang/Application/Admin/Public/assets/js/jquery-1.8.1.min.js"></script> 
<script type="text/javascript" src="/fuzhuang/Application/Admin/Public/assets/js/bui-min.js"></script> 
<script type="text/javascript" src="/fuzhuang/Application/Admin/Public/assets/js/common/main-min.js"></script> 
<script type="text/javascript" src="/fuzhuang/Application/Admin/Public/assets/js/config-min.js"></script> 
<script>
<<<<<<< HEAD
    BUI.use('common/main',function(){
        var config = [{id:'1',homePage : '2',menu:[{text:'系统管理',items:[{id:'2',text:'机构管理',href:'<?php echo ($__FILE__); ?>Admin/Node/index'},{id:'3',text:'角色管理',href:'Role/index.html'},{id:'4',text:'用户管理',href:'User/index.html'},{id:'6',text:'菜单管理',href:'Menu/index.html'}]}]},{id:'7',menu:[{text:'业务管理',items:[{id:'9',text:'查询业务',href:'Node/index.html'}]}]},{id:'10',homePage : '10',menu:[{text:'产品管理',items:[{id:'10',text:'产品列表',href:'Node/index.html'}]}]}];
=======
    // BUI.use('common/main',function(){
    //     var config = [{id:'1',menu:[{text:'系统管理',items:[{id:'12',text:'机构管理',href:'<?php echo ($__FILE__); ?>Admin/Node/index'},{id:'3',text:'角色管理',href:'Role/index.html'},{id:'4',text:'用户管理',href:'User/index.html'},{id:'6',text:'菜单管理',href:'Menu/index.html'}]}]},{id:'7',homePage : '9',menu:[{text:'业务管理',items:[{id:'9',text:'查询业务',href:'Node/index.html'}]}]}];
    //     new PageUtil.MainPage({
    //         modulesConfig : config
    //     });
    // });    
  BUI.use('common/main',function(){
        var config = [{id:'1',homePage : '2',menu:[{text:'系统管理',items:[{id:'2',text:'系统信息',href:'<?php echo ($__FILE__); ?>Admin/System/index'},{id:'3',text:'用户管理',href:'<?php echo ($__FILE__); ?>Admin/User/index'},{id:'4',text:'菜单管理',href:'Node/index.html'},{id:'5',text:'Banner管理',href:'Banner/index.html'}]}]},{id:'7',menu:[{text:'产品管理',items:[{id:'9',text:'产品列表',href:'Product/index.html'},{id:'10',text:'产品添加',href:'Product/add.html'}]}]},{id:'11',menu:[{text:'创意设计',items:[{id:'12',text:'设计类资讯',href:'Design/index.html'},{id:'13',text:'设计添加',href:'Design/add.html'}]}]},{id:'14',menu:[{text:'新闻资讯',items:[{id:'15',text:'新闻列表',href:'News/index.html'},{id:'16',text:'新闻添加',href:'News/add.html'}]}]}];
>>>>>>> 7dc65646a47764619a58be39e1a5d8cca446c08b
        new PageUtil.MainPage({
            modulesConfig : config
        });
    }); 
</script>
</body>
</html>