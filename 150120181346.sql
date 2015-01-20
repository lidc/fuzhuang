/*
MySQL Backup
Source Server Version: 5.5.40
Source Database: fuzhuang
Date: 2015/1/20 18:13:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `banner`
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_title` varchar(25) DEFAULT NULL,
  `banner_desc` varchar(255) DEFAULT NULL,
  `big_photo` varchar(255) DEFAULT NULL,
  `small_photo` varchar(255) DEFAULT NULL,
  `add_time` int(22) DEFAULT NULL,
  `myorder` int(11) DEFAULT NULL,
  `website` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `brand`
-- ----------------------------
DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) DEFAULT NULL,
  `brand_desc` varchar(255) DEFAULT NULL,
  `brand_url` varchar(50) DEFAULT NULL,
  `big_img` varchar(100) DEFAULT NULL,
  `small_img` varchar(100) DEFAULT NULL,
  `myorder` int(11) DEFAULT NULL,
  `add_time` int(22) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `design`
-- ----------------------------
DROP TABLE IF EXISTS `design`;
CREATE TABLE `design` (
  `id` int(11) NOT NULL,
  `nav_pid` int(11) DEFAULT NULL,
  `nav_id` int(11) DEFAULT NULL,
  `design_title` varchar(255) DEFAULT NULL,
  `design_desc` varchar(1000) DEFAULT NULL,
  `design_content` text,
  `design_photo` varchar(255) DEFAULT NULL,
  `design_order` int(11) DEFAULT NULL,
  `design_status` int(11) DEFAULT NULL,
  `add_time` int(22) DEFAULT NULL,
  `release_time` int(22) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `nav_page`
-- ----------------------------
DROP TABLE IF EXISTS `nav_page`;
CREATE TABLE `nav_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `nav_title` varchar(255) NOT NULL,
  `nav_desc` varchar(1000) NOT NULL,
  `nav_photo` varchar(255) NOT NULL,
  `thumb_photo` varchar(255) NOT NULL,
  `nav_order` int(11) NOT NULL,
  `nav_status` int(11) NOT NULL,
  `add_time` int(20) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `nav_pid` int(11) DEFAULT NULL,
  `nav_id` int(11) DEFAULT NULL,
  `news_title` varchar(255) DEFAULT NULL,
  `news_desc` varchar(1000) DEFAULT NULL,
  `news_content` text,
  `news_photo` varchar(255) DEFAULT NULL,
  `add_time` int(20) DEFAULT NULL,
  `release_time` int(20) DEFAULT NULL,
  `news_status` int(11) DEFAULT NULL,
  `news_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `page_content`
-- ----------------------------
DROP TABLE IF EXISTS `page_content`;
CREATE TABLE `page_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nav_id` int(11) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `cpid` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_desc` varchar(1000) NOT NULL,
  `product_order` int(11) NOT NULL,
  `product_brand_id` int(11) NOT NULL,
  `big_img` varchar(125) NOT NULL,
  `small_img` varchar(125) NOT NULL,
  `product_url` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `add_time` int(22) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `product_category`
-- ----------------------------
DROP TABLE IF EXISTS `product_category`;
CREATE TABLE `product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `c_title` varchar(255) DEFAULT NULL,
  `c_desc` varchar(255) DEFAULT NULL,
  `big_img` varchar(255) DEFAULT NULL,
  `small_img` varchar(255) DEFAULT NULL,
  `myorder` int(11) DEFAULT NULL,
  `add_time` int(22) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `product_content`
-- ----------------------------
DROP TABLE IF EXISTS `product_content`;
CREATE TABLE `product_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `content1` text NOT NULL,
  `content2` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `product_images`
-- ----------------------------
DROP TABLE IF EXISTS `product_images`;
CREATE TABLE `product_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `big_photo` varchar(255) DEFAULT NULL,
  `small_photo` varchar(255) DEFAULT NULL,
  `photo_desc` varchar(1000) DEFAULT NULL,
  `photo_order` int(11) DEFAULT NULL,
  `add_time` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `user_admin`
-- ----------------------------
DROP TABLE IF EXISTS `user_admin`;
CREATE TABLE `user_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(55) NOT NULL,
  `real_name` varchar(25) NOT NULL,
  `tel` int(11) NOT NULL,
  `mobile_phone` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `userIp` varchar(25) NOT NULL,
  `qq` varchar(24) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `user_status` int(1) NOT NULL DEFAULT '0',
  `add_time` int(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `banner` VALUES ('1','banner 01','好久好久好久接口接口\r\n宝贝宝贝','/fuzhuang/public/uploads/banner_img/2015-01-19/54bc7aaa923d3.jpg','/fuzhuang/public/uploads/banner_img/thumb_img/2015-01-19/54bc7aaa923d3.jpg','1421638314','1','www.baidu.com'), ('2','banner 02','dddddddddd','/fuzhuang/public/uploads/banner_img/2015-01-19/54bc7996ed9af.jpg','/fuzhuang/public/uploads/banner_img/thumb_img/2015-01-19/54bc7996ed9af.jpg','1421638039','2','www.100msh.com');
INSERT INTO `nav_page` VALUES ('1','0','首页','首页简介','/fuzhuang/Application/Admin/Public/Uploads/Original_Img/2015-01-16/54b8e413886c1.jpg','/fuzhuang/Application/Admin/Public/Uploads/Thumb_Img/2015-01-16/54b8e413886c1.jpg','1','1','1421403290','达到','达到','达到'), ('2','0','关于简朵','关于简朵','/fuzhuang/Application/Admin/Public/Uploads/Original_Img/2015-01-15/54b78c221b59f.png','','2','1','1421315106','关于简朵','关于简朵','关于简朵'), ('3','2','公司介绍','公司介绍','','','1','1','1421316307','公司介绍','公司介绍','公司介绍'), ('4','2','企业文化','企业文化','/fuzhuang/Application/Admin/Public/Uploads/Original_Img/2015-01-16/54b8e3223efc0.gif','/fuzhuang/Application/Admin/Public/Uploads/Thumb_Img/2015-01-16/54b8e3223efc0.gif','2','1','1421402914','企业文化','企业文化','企业文化'), ('5','2','优势展示','优势展示','/fuzhuang/Application/Admin/Public/Uploads/Original_Img/2015-01-15/54b79221dedea.png','/fuzhuang/Application/Admin/Public/Uploads/Thumb_Img/2015-01-15/54b79221dedea.png','3','0','1421316641','优势展示','优势展示','优势展示'), ('6','0','品牌成员','品牌成员简介','/fuzhuang/Application/Admin/Public/Uploads/Original_Img/2015-01-16/54b8e3c046ce6.jpg','/fuzhuang/Application/Admin/Public/Uploads/Thumb_Img/2015-01-16/54b8e3c046ce6.jpg','3','1','1421403072','品牌成员的','品牌成员','品牌成员但'), ('7','6','品牌故事','品牌故事','/fuzhuang/Application/Admin/Public/Uploads/Original_Img/2015-01-16/54b8c177802dc.png','/fuzhuang/Application/Admin/Public/Uploads/Thumb_Img/2015-01-16/54b8c177802dc.png','1','1','1421681258','品牌故事','品牌故事','品牌故事'), ('9','6','品牌定位','品牌定位','','','2','1','1421681327','品牌定位','品牌定位','品牌定位'), ('8','2','牵手公益','牵手公益','','','4','1','1421680964','牵手公益','牵手公益','牵手公益'), ('10','0','创意设计','创意设计','','','4','1','1421681431','创意设计','创意设计','创意设计'), ('11','0','产品展示','产品展示','','','5','1','1421681494','产品展示','产品展示','产品展示'), ('12','0','新闻资讯','新闻资讯','','','6','1','1421681528','新闻资讯','新闻资讯','新闻资讯'), ('13','0','网点分支','网点分支','','','7','1','1421681553','网点分支','网点分支','网点分支'), ('14','13','专店地址','专店地址','','','1','1','1421681583','专店地址','专店地址','专店地址'), ('15','13','名称列表','名称列表','','','2','1','1421681610','名称列表','名称列表','名称列表'), ('16','0','人才中心','人才中心','','','8','1','1421681641','人才中心','人才中心','人才中心'), ('17','16','招聘信息','招聘信息','','','1','1','1421681668','招聘信息','招聘信息','招聘信息');
INSERT INTO `page_content` VALUES ('1','2','&lt;p&gt;\r\n	addd\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	dfldlj垃圾了几分\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;img src=&quot;http://localhost/fuzhuang/plug-in/kindeditor/plugins/emoticons/images/30.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt;\r\n&lt;/p&gt;'), ('2','3','&lt;p&gt;\r\n	2公司介绍\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;'), ('3','4','企业文化'), ('4','5','优势展示'), ('5','6','&lt;p&gt;\r\n	品牌成员\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	达到\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;img src=&quot;http://localhost/fuzhuang/plug-in/kindeditor/plugins/emoticons/images/28.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt;\r\n&lt;/p&gt;'), ('6','7','品牌故事'), ('7','1','&lt;p&gt;\r\n	顶顶顶顶顶顶顶顶\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;img src=&quot;http://localhost/fuzhuang/plug-in/kindeditor/plugins/emoticons/images/19.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;img src=&quot;http://localhost/fuzhuang/plug-in/kindeditor/plugins/emoticons/images/39.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt;\r\n&lt;/p&gt;'), ('8','8','牵手公益'), ('9','9','品牌定位'), ('10','10','创意设计'), ('11','11','产品展示'), ('12','12','新闻资讯'), ('13','13','网点分支'), ('14','14','专店地址'), ('15','15','名称列表'), ('16','16','人才中心'), ('17','17','招聘信息'), ('18','18','d');
INSERT INTO `product` VALUES ('1','2','1','a1','','ddd','0','0','/fuzhuang/public/uploads/product_img/2015-01-20/54be22ad2bbb4.png','/fuzhuang/public/uploads/product_img/thumb_img/2015-01-20/54be22ad2bbb4.png','','1','a','a','a','1421746861'), ('2','4','1','d','','dddddddddddddddddddd','0','0','/fuzhuang/public/uploads/product_img/2015-01-20/54be233b807b9.png','/fuzhuang/public/uploads/product_img/thumb_img/2015-01-20/54be233b807b9.png','','1','dd','d','ddd','1421747003'), ('3','3','0','333','','3333333333','0','0','/fuzhuang/public/uploads/product_img/2015-01-20/54be238f9474b.png','/fuzhuang/public/uploads/product_img/thumb_img/2015-01-20/54be238f9474b.png','','1','d','3','232','1421747087');
INSERT INTO `product_category` VALUES ('1','0','Choude','Choude','','','0','1421662184','1','Choude','Choude','Choude'), ('2','1','少女文胸','少女文胸','/fuzhuang/public/uploads/product_img/2015-01-19/54bcd826615e0.jpg','/fuzhuang/public/uploads/product_img/thumb_img/2015-01-19/54bcd826615e0.jpg','1','1421662246','1','少女文胸','少女文胸','少女文胸'), ('3','0','La beileZa','La beileZa','','','2','1421662274','1','La beileZa','La beileZa','La beileZa'), ('4','1','男/女家居服','男/女家居服','','','2','1421662350','1','男/女家居服','男/女家居服','男/女家居服'), ('5','1','男/女暧衣','男/女暧衣','','','3','1421662410','1','男/女暧衣','男/女暧衣','男/女暧衣'), ('6','1','男/女独立裤','男/女独立裤','','','3','1421682762','1','男/女独立裤','男/女独立裤','男/女独立裤');
INSERT INTO `product_content` VALUES ('1','3','&lt;p&gt;\r\n	333333dddd&lt;img src=&quot;http://localhost/fuzhuang/plug-in/kindeditor/plugins/emoticons/images/28.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	kjhog`fgg\r\n&lt;/p&gt;','');
INSERT INTO `user_admin` VALUES ('1','admin','21232f297a57a5a743894a0e4a801fc3','admin','1800259110','28308','80808@qd.com','192.168.1.2','80808080','100msh','深圳福田','518000','1','1420709606'), ('2','admin2','admin','admin2','1800259110','28308','80808@qd.com','192.168.1.2','80808080','100msh','深圳福田','518000','1','1420709606'), ('3','admin3','admin','admin3','1800259110','28308','80808@qd.com','192.168.1.2','80808080','100msh','深圳福田','518000','1','1420709606');
