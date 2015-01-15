/*
MySQL Backup
Source Server Version: 5.5.40
Source Database: fuzhuang
Date: 2015/1/15 18:20:44
*/

SET FOREIGN_KEY_CHECKS=0;

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nav_pid` int(11) DEFAULT NULL,
  `nav_id` int(11) DEFAULT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `product_desc` varchar(1000) DEFAULT NULL,
  `product_order` int(11) DEFAULT NULL,
  `product_brand_id` int(11) DEFAULT NULL,
  `product_url` varchar(100) DEFAULT NULL,
  `mtitle` varchar(255) DEFAULT NULL,
  `mkey` varchar(255) DEFAULT NULL,
  `mdesc` varchar(255) DEFAULT NULL,
  `add_time` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
INSERT INTO `nav_page` VALUES ('1','0','首页','11','33.jpg','','1','1','1421219231','','',''), ('2','0','关于简朵','关于简朵','/fuzhuang/Application/Admin/Public/Uploads/Original_Img/2015-01-15/54b78c221b59f.png','','2','1','1421315106','关于简朵','关于简朵','关于简朵'), ('3','2','公司介绍','公司介绍','','','1','1','1421316307','公司介绍','公司介绍','公司介绍'), ('4','2','企业文化','企业文化','/fuzhuang/Application/Admin/Public/Uploads/Original_Img/2015-01-15/54b790f66c949.png','/fuzhuang/Application/Admin/Public/Uploads/Thumb_Img/54b790f66c949.png','2','1','1421316342','企业文化','企业文化','企业文化'), ('5','2','优势展示','优势展示','/fuzhuang/Application/Admin/Public/Uploads/Original_Img/2015-01-15/54b79221dedea.png','/fuzhuang/Application/Admin/Public/Uploads/Thumb_Img/2015-01-15/54b79221dedea.png','3','1','1421316641','优势展示','优势展示','优势展示');
INSERT INTO `page_content` VALUES ('1','2','&lt;p&gt;\r\n	addd\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	dfldlj垃圾了几分\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;img src=&quot;http://localhost/fuzhuang/plug-in/kindeditor/plugins/emoticons/images/30.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt;\r\n&lt;/p&gt;'), ('2','3','&lt;p&gt;\r\n	2公司介绍\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;'), ('3','4','企业文化'), ('4','5','优势展示');
INSERT INTO `user_admin` VALUES ('1','admin','21232f297a57a5a743894a0e4a801fc3','admin','1800259110','28308','80808@qd.com','192.168.1.2','80808080','100msh','深圳福田','518000','1','1420709606'), ('2','admin2','admin','admin2','1800259110','28308','80808@qd.com','192.168.1.2','80808080','100msh','深圳福田','518000','1','1420709606'), ('3','admin3','admin','admin3','1800259110','28308','80808@qd.com','192.168.1.2','80808080','100msh','深圳福田','518000','1','1420709606'), ('4','','d41d8cd98f00b204e9800998ecf8427e','','0','0','','','','','','','1','0'), ('5','','d41d8cd98f00b204e9800998ecf8427e','','0','0','','','','','','','1','0');
