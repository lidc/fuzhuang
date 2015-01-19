/*
MySQL Backup
Source Server Version: 5.5.40
Source Database: fuzhuang
Date: 2015/1/19 18:15:13
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `cpid` int(11) DEFAULT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `product_desc` varchar(1000) DEFAULT NULL,
  `product_order` int(11) DEFAULT NULL,
  `product_brand_id` int(11) DEFAULT NULL,
  `product_url` varchar(100) DEFAULT NULL,
  `mtitle` varchar(255) DEFAULT NULL,
  `mkey` varchar(255) DEFAULT NULL,
  `mdesc` varchar(255) DEFAULT NULL,
  `add_time` int(22) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `product_content`
-- ----------------------------
DROP TABLE IF EXISTS `product_content`;
CREATE TABLE `product_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `content1` text,
  `content2` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
INSERT INTO `nav_page` VALUES ('1','0','首页','首页简介','/fuzhuang/Application/Admin/Public/Uploads/Original_Img/2015-01-16/54b8e413886c1.jpg','/fuzhuang/Application/Admin/Public/Uploads/Thumb_Img/2015-01-16/54b8e413886c1.jpg','1','1','1421403290','达到','达到','达到'), ('2','0','关于简朵','关于简朵','/fuzhuang/Application/Admin/Public/Uploads/Original_Img/2015-01-15/54b78c221b59f.png','','2','1','1421315106','关于简朵','关于简朵','关于简朵'), ('3','2','公司介绍','公司介绍','','','1','1','1421316307','公司介绍','公司介绍','公司介绍'), ('4','2','企业文化','企业文化','/fuzhuang/Application/Admin/Public/Uploads/Original_Img/2015-01-16/54b8e3223efc0.gif','/fuzhuang/Application/Admin/Public/Uploads/Thumb_Img/2015-01-16/54b8e3223efc0.gif','2','1','1421402914','企业文化','企业文化','企业文化'), ('5','2','优势展示','优势展示','/fuzhuang/Application/Admin/Public/Uploads/Original_Img/2015-01-15/54b79221dedea.png','/fuzhuang/Application/Admin/Public/Uploads/Thumb_Img/2015-01-15/54b79221dedea.png','3','0','1421316641','优势展示','优势展示','优势展示'), ('6','0','品牌成员','品牌成员简介','/fuzhuang/Application/Admin/Public/Uploads/Original_Img/2015-01-16/54b8e3c046ce6.jpg','/fuzhuang/Application/Admin/Public/Uploads/Thumb_Img/2015-01-16/54b8e3c046ce6.jpg','3','1','1421403072','品牌成员的','品牌成员','品牌成员但'), ('7','6','品牌故事及定位','品牌故事及定位','/fuzhuang/Application/Admin/Public/Uploads/Original_Img/2015-01-16/54b8c177802dc.png','/fuzhuang/Application/Admin/Public/Uploads/Thumb_Img/2015-01-16/54b8c177802dc.png','1','1','1421394295','品牌故事及定位','品牌故事及定位','品牌故事及定位');
INSERT INTO `page_content` VALUES ('1','2','&lt;p&gt;\r\n	addd\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	dfldlj垃圾了几分\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;img src=&quot;http://localhost/fuzhuang/plug-in/kindeditor/plugins/emoticons/images/30.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt;\r\n&lt;/p&gt;'), ('2','3','&lt;p&gt;\r\n	2公司介绍\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;'), ('3','4','企业文化'), ('4','5','优势展示'), ('5','6','&lt;p&gt;\r\n	品牌成员\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	达到\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;img src=&quot;http://localhost/fuzhuang/plug-in/kindeditor/plugins/emoticons/images/28.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt;\r\n&lt;/p&gt;'), ('6','7','品牌故事及定位'), ('7','1','&lt;p&gt;\r\n	顶顶顶顶顶顶顶顶\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;img src=&quot;http://localhost/fuzhuang/plug-in/kindeditor/plugins/emoticons/images/19.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;img src=&quot;http://localhost/fuzhuang/plug-in/kindeditor/plugins/emoticons/images/39.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt;\r\n&lt;/p&gt;');
INSERT INTO `product_category` VALUES ('1','0','Choude','Choude','','','0','1421662184','1','Choude','Choude','Choude'), ('2','1','少女文胸','少女文胸','/fuzhuang/public/uploads/product_img/2015-01-19/54bcd826615e0.jpg','/fuzhuang/public/uploads/product_img/thumb_img/2015-01-19/54bcd826615e0.jpg','1','1421662246','1','少女文胸','少女文胸','少女文胸'), ('3','0','La beileZa','La beileZa','','','2','1421662274','1','La beileZa','La beileZa','La beileZa'), ('4','1','男/女家居服','男/女家居服','','','2','1421662350','1','男/女家居服','男/女家居服','男/女家居服'), ('5','1','男/女暧衣','男/女暧衣','','','3','1421662410','1','男/女暧衣','男/女暧衣','男/女暧衣');
INSERT INTO `user_admin` VALUES ('1','admin','21232f297a57a5a743894a0e4a801fc3','admin','1800259110','28308','80808@qd.com','192.168.1.2','80808080','100msh','深圳福田','518000','1','1420709606'), ('2','admin2','admin','admin2','1800259110','28308','80808@qd.com','192.168.1.2','80808080','100msh','深圳福田','518000','1','1420709606'), ('3','admin3','admin','admin3','1800259110','28308','80808@qd.com','192.168.1.2','80808080','100msh','深圳福田','518000','1','1420709606'), ('4','','d41d8cd98f00b204e9800998ecf8427e','','0','0','','','','','','','1','0'), ('5','','d41d8cd98f00b204e9800998ecf8427e','','0','0','','','','','','','1','0');
