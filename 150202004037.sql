/*
MySQL Backup
Source Server Version: 5.5.38
Source Database: fuzhuang
Date: 2015/2/2 00:40:37
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

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
  `hotOffers` int(11) NOT NULL DEFAULT '0',
  `add_time` int(22) DEFAULT NULL,
  `brand_content` text,
  `status` int(11) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `design`
-- ----------------------------
DROP TABLE IF EXISTS `design`;
CREATE TABLE `design` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpid` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `design_title` varchar(255) DEFAULT NULL,
  `design_desc` varchar(1000) DEFAULT NULL,
  `design_content` text,
  `big_img` varchar(255) DEFAULT NULL,
  `small_img` varchar(255) DEFAULT NULL,
  `design_order` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `hotOffers` int(11) NOT NULL DEFAULT '0',
  `add_time` int(22) DEFAULT NULL,
  `release_time` int(22) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `design_category`
-- ----------------------------
DROP TABLE IF EXISTS `design_category`;
CREATE TABLE `design_category` (
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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

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
  `page_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpid` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `news_title` varchar(255) DEFAULT NULL,
  `news_desc` varchar(1000) DEFAULT NULL,
  `news_content` text,
  `big_img` varchar(255) DEFAULT NULL,
  `small_img` varchar(255) DEFAULT NULL,
  `hotOffers` int(11) NOT NULL DEFAULT '0',
  `add_time` int(20) DEFAULT NULL,
  `release_time` int(20) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `news_order` int(11) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `news_category`
-- ----------------------------
DROP TABLE IF EXISTS `news_category`;
CREATE TABLE `news_category` (
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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `page_content`
-- ----------------------------
DROP TABLE IF EXISTS `page_content`;
CREATE TABLE `page_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nav_id` int(11) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `cpid` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` varchar(255) DEFAULT NULL,
  `product_desc` varchar(1000) DEFAULT NULL,
  `product_order` int(11) DEFAULT NULL,
  `product_brand_id` int(11) DEFAULT NULL,
  `big_img` varchar(125) DEFAULT NULL,
  `small_img` varchar(125) DEFAULT NULL,
  `product_url` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `hotOffers` int(1) NOT NULL DEFAULT '0',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `add_time` int(22) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `product_images`
-- ----------------------------
DROP TABLE IF EXISTS `product_images`;
CREATE TABLE `product_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `big_img` varchar(255) DEFAULT NULL,
  `small_img` varchar(255) DEFAULT NULL,
  `photo_desc` varchar(1000) DEFAULT NULL,
  `photo_order` int(11) DEFAULT NULL,
  `add_time` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

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
INSERT INTO `banner` VALUES ('1','banner 01','好久好久好久接口接口\r\n宝贝宝贝','/fuzhuang/public/uploads/banner_img/2015-01-19/54bc7aaa923d3.jpg','/fuzhuang/public/uploads/banner_img/thumb_img/2015-01-19/54bc7aaa923d3.jpg','1421638314','1','www.baidu.com'), ('2','banner 02','dddddddddd','/fuzhuang/public/uploads/banner_img/2015-01-19/54bc7996ed9af.jpg','/fuzhuang/public/uploads/banner_img/thumb_img/2015-01-19/54bc7996ed9af.jpg','1421638039','2','www.100msh.com'), ('4','banner 03','','/fuzhuang/public/uploads/banner_img/2015-01-31/54cc4975c5c3d.png','/fuzhuang/public/uploads/banner_img/thumb_img/2015-01-31/54cc4975c5c3d.png','1422674294','3','');
INSERT INTO `brand` VALUES ('1','J.D.Chaude创业天虹推广活动启动','ddd','www.baidu.com','/fuzhuang/public/uploads/brand_img/2015-01-31/54cc78a9313dd.jpg','/fuzhuang/public/uploads/brand_img/thumb_img/2015-01-31/54cc78a9313dd.jpg',NULL,'1','1422686831','&lt;p&gt;\r\n	&lt;a href=&quot;http://localhost:81/fuzhuang/index.php&quot;&gt;J.D.Chaude创业天虹推广活动启动&lt;/a&gt; \r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;a href=&quot;http://localhost:81/fuzhuang/index.php&quot;&gt;J.D.Chaude创业天虹推广活动启动&lt;/a&gt; \r\n&lt;/p&gt;','1','J.D.Chaude创业天虹推广活动启动','J.D.Chaude创业天虹推广活动启动','J.D.Chaude创业天虹推广活动启动'), ('2','$v.hotoffers','资讯链接资讯链接2','','','',NULL,'2','1422764289','&lt;a href=&quot;http://localhost:81/fuzhuang/design?id=12&quot;&gt;资讯链接资讯链接2&lt;/a&gt;','1','','',''), ('3','资讯链接资讯链接3','资讯链接资讯链接11','','','',NULL,'2','1422722179','&lt;a href=&quot;http://localhost:81/fuzhuang/design?id=12&quot;&gt;资讯链接资讯链接11&lt;/a&gt;','1','','',''), ('4','资讯链接资讯链接2','资讯链接资讯链接11','','','',NULL,'2','1422722207','&lt;a href=&quot;http://localhost:81/fuzhuang/design?id=12&quot;&gt;资讯链接资讯链接11&lt;/a&gt;&lt;a href=&quot;http://localhost:81/fuzhuang/design?id=12&quot;&gt;资讯链接资讯链接11&lt;/a&gt;&lt;a href=&quot;http://localhost:81/fuzhuang/design?id=12&quot;&gt;资讯链接资讯链接11&lt;/a&gt;','1','','',''), ('5','资讯链接资讯链接4','资讯链接资讯链接','','','',NULL,'2','1422722236','&lt;a href=&quot;http://localhost:81/fuzhuang/design?id=12&quot;&gt;资讯链接资讯链接11&lt;/a&gt;&lt;a href=&quot;http://localhost:81/fuzhuang/design?id=12&quot;&gt;资讯链接资讯链接11&lt;/a&gt;&lt;a href=&quot;http://localhost:81/fuzhuang/design?id=12&quot;&gt;资讯链接资讯链接11&lt;/a&gt;','1','','',''), ('6','资讯链接资讯链接5','资讯链接资讯链接11','','','',NULL,'2','1422722260','&lt;a href=&quot;http://localhost:81/fuzhuang/design?id=12&quot;&gt;资讯链接资讯链接11&lt;/a&gt;','1','','',''), ('7','资讯链接资讯链接6','资讯链接资讯链接6','','','',NULL,'2','1422722278','','1','','',''), ('8','资讯链接资讯链接6','资讯链接资讯链接6','','','',NULL,'2','1422722305','&lt;a href=&quot;http://localhost:81/fuzhuang/design?id=12&quot;&gt;资讯链接资讯链接11&lt;/a&gt;','1','','',''), ('9','资讯链接资讯链接7','资讯链接资讯链接7','','','',NULL,'2','1422764139','&lt;a href=&quot;http://localhost:81/fuzhuang/design?id=12&quot;&gt;资讯链接资讯链接7&lt;/a&gt;','1','','',''), ('10','资讯链接资讯链接29','资讯链接资讯链接29','','','',NULL,'2','1422722394','&lt;a href=&quot;http://localhost:81/fuzhuang/design?id=12&quot;&gt;资讯链接资讯链接11&lt;/a&gt;','1','','','');
INSERT INTO `design` VALUES ('1','1','2','资讯链接资讯链接3','资讯链接资讯链接','55d得得得&lt;img src=&quot;http://localhost:81/fuzhuang/plug-in/kindeditor/plugins/emoticons/images/11.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt;','','',NULL,'0','2','1422076339','1422676919','资讯链接资讯链接','资讯链接资讯链接','资讯链接资讯链接'), ('3','1','6','2015春夏灵动系列首推','2015春夏灵动系列首推','&lt;a href=&quot;http://localhost:81/fuzhuang/index.php&quot;&gt;2015春夏灵动系列首推&lt;/a&gt;','/fuzhuang/public/uploads/design_img/2015-01-31/54cc536d54b51.jpg','/fuzhuang/public/uploads/design_img/thumb_img/2015-01-31/54cc536d54b51.jpg',NULL,'0','1','1422074594','1422676845','2015春夏灵动系列首推','2015春夏灵动系列首推','2015春夏灵动系列首推'), ('4','1','2','资讯链接资讯链接','资讯链接资讯链接','55d得得得&lt;img src=&quot;http://localhost:81/fuzhuang/plug-in/kindeditor/plugins/emoticons/images/19.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt;','','',NULL,'0','2','1422076304','1422678985','资讯链接资讯链接','资讯链接资讯链接','资讯链接资讯链接'), ('5','1','2','资讯链接资讯链接4','资讯链接资讯链接','&lt;span style=&quot;color:#333333;font-family:\\\'Helvetica Neue\\\', Helvetica, Arial, sans-serif;font-size:13px;line-height:20px;background-color:#FFFFFF;&quot;&gt;资讯链接资讯链接&lt;/span&gt;&lt;span style=&quot;color:#333333;font-family:\\\'Helvetica Neue\\\', Helvetica, Arial, sans-serif;font-size:13px;line-height:20px;background-color:#FFFFFF;&quot;&gt;资讯链接资讯链接&lt;/span&gt;','','',NULL,'1','2','1422678118','1422678118','资讯链接资讯链接','资讯链接资讯链接','资讯链接资讯链接'), ('6','1','2','资讯链接资讯链接5','资讯链接资讯链接','&lt;span style=&quot;color:#333333;font-family:\\\'Helvetica Neue\\\', Helvetica, Arial, sans-serif;font-size:13px;line-height:20px;background-color:#FFFFFF;&quot;&gt;资讯链接资讯链接&lt;/span&gt;&lt;span style=&quot;color:#333333;font-family:\\\'Helvetica Neue\\\', Helvetica, Arial, sans-serif;font-size:13px;line-height:20px;background-color:#FFFFFF;&quot;&gt;资讯链接资讯链接&lt;/span&gt;','','',NULL,'1','2','1422678245','1422678245','资讯链接资讯链接','资讯链接资讯链接','资讯链接资讯链接'), ('7','1','2','资讯链接资讯链接6','资讯链接资讯链接','&lt;span style=&quot;color:#333333;font-family:\\\'Helvetica Neue\\\', Helvetica, Arial, sans-serif;font-size:13px;line-height:20px;background-color:#FFFFFF;&quot;&gt;资讯链接资讯链接&lt;/span&gt;','','',NULL,'1','2','1422678343','1422678343','资讯链接资讯链接','资讯链接资讯链接','资讯链接资讯链接'), ('8','1','2','资讯链接资讯链接7','资讯链接资讯链接','&lt;span style=&quot;color:#333333;font-family:\\\'Helvetica Neue\\\', Helvetica, Arial, sans-serif;font-size:13px;line-height:20px;background-color:#FFFFFF;&quot;&gt;资讯链接资讯链接&lt;/span&gt;','','',NULL,'1','2','1422678362','1422678362','资讯链接资讯链接','资讯链接资讯链接','资讯链接资讯链接'), ('9','1','2','资讯链接资讯链接8','资讯链接资讯链接8','&lt;span style=&quot;color:#333333;font-family:\\\\\\\'Helvetica Neue\\\\\\\', Helvetica, Arial, sans-serif;font-size:13px;line-height:20px;background-color:#FFFFFF;&quot;&gt;资讯链接资讯链接&lt;/span&gt;','','',NULL,'1','2','1422678384','1422679540','','',''), ('10','1','2','资讯链接资讯链接9','资讯链接资讯链接','&lt;span style=&quot;color:#333333;font-family:\\\'Helvetica Neue\\\', Helvetica, Arial, sans-serif;font-size:13px;line-height:20px;background-color:#FFFFFF;&quot;&gt;资讯链接资讯链接&lt;/span&gt;','','',NULL,'1','2','1422678408','1422678408','资讯链接资讯链接','资讯链接资讯链接','资讯链接资讯链接'), ('11','1','2','资讯链接资讯链接10','资讯链接资讯链接','&lt;span style=&quot;color:#333333;font-family:\\\'Helvetica Neue\\\', Helvetica, Arial, sans-serif;font-size:13px;line-height:20px;background-color:#FFFFFF;&quot;&gt;资讯链接资讯链接&lt;/span&gt;','','',NULL,'1','2','1422678431','1422678431','资讯链接资讯链接','资讯链接资讯链接','资讯链接资讯链接'), ('12','1','2','资讯链接资讯链接11','资讯链接资讯链接11','&lt;span style=&quot;color:#333333;font-family:\\\\\\\'Helvetica Neue\\\\\\\', Helvetica, Arial, sans-serif;font-size:13px;line-height:20px;background-color:#FFFFFF;&quot;&gt;资讯链接资讯链接&lt;/span&gt;','','',NULL,'1','2','1422678461','1422678525','资讯链接资讯链接','资讯链接资讯链接','资讯链接资讯链接');
INSERT INTO `design_category` VALUES ('1','0','设计类资讯','设计类资讯','','','1','1421940559','1','设计类资讯','设计类资讯','设计类资讯'), ('2','1','设计室','设计室','','','1','1421940620','1','设计室','设计室','设计室'), ('4','1','版房资讯','版房资讯','','','2','1421940657','1','版房资讯','版房资讯','版房资讯'), ('5','1','拍摄花絮','拍摄花絮','','','3','1421940688','1','拍摄花絮','拍摄花絮','拍摄花絮'), ('6','1','设计美文','设计美文','','','4','1421940722','1','设计美文','设计美文','设计美文');
INSERT INTO `nav_page` VALUES ('1','0','首页','首页简介','/fuzhuang/Application/Admin/Public/Uploads/Original_Img/2015-01-16/54b8e413886c1.jpg','/fuzhuang/Application/Admin/Public/Uploads/Thumb_Img/2015-01-16/54b8e413886c1.jpg','1','1','1422806019','达到','达到','达到','Index'), ('2','0','关于简朵','关于简朵','/fuzhuang/Application/Admin/Public/Uploads/Original_Img/2015-01-15/54b78c221b59f.png','','2','1','1422806119','关于简朵','关于简朵','关于简朵','About'), ('3','2','公司介绍','公司介绍','','','1','1','1421316307','公司介绍','公司介绍','公司介绍',''), ('4','2','企业文化','企业文化','/fuzhuang/Application/Admin/Public/Uploads/Original_Img/2015-01-16/54b8e3223efc0.gif','/fuzhuang/Application/Admin/Public/Uploads/Thumb_Img/2015-01-16/54b8e3223efc0.gif','2','1','1421402914','企业文化','企业文化','企业文化',''), ('5','2','优势展示','优势展示','/fuzhuang/Application/Admin/Public/Uploads/Original_Img/2015-01-15/54b79221dedea.png','/fuzhuang/Application/Admin/Public/Uploads/Thumb_Img/2015-01-15/54b79221dedea.png','3','0','1421316641','优势展示','优势展示','优势展示',''), ('6','0','品牌成员','品牌成员简介','/fuzhuang/Application/Admin/Public/Uploads/Original_Img/2015-01-16/54b8e3c046ce6.jpg','/fuzhuang/Application/Admin/Public/Uploads/Thumb_Img/2015-01-16/54b8e3c046ce6.jpg','3','1','1422807220','品牌成员的','品牌成员','品牌成员但','Brand'), ('7','6','品牌故事','品牌故事','/fuzhuang/Application/Admin/Public/Uploads/Original_Img/2015-01-16/54b8c177802dc.png','/fuzhuang/Application/Admin/Public/Uploads/Thumb_Img/2015-01-16/54b8c177802dc.png','1','1','1421681258','品牌故事','品牌故事','品牌故事',''), ('9','6','品牌定位','品牌定位','','','2','1','1421681327','品牌定位','品牌定位','品牌定位',''), ('8','2','牵手公益','牵手公益','','','4','1','1421680964','牵手公益','牵手公益','牵手公益',''), ('10','0','创意设计','创意设计','','','4','1','1422807256','创意设计','创意设计','创意设计','Design'), ('11','0','产品展示','产品展示','','','5','1','1422807292','产品展示','产品展示','产品展示','Product'), ('12','0','新闻资讯','新闻资讯','','','6','1','1422807325','新闻资讯','新闻资讯','新闻资讯','News'), ('13','0','网点分支','网点分支','','','7','1','1422807491','网点分支','网点分支','网点分支','Netpoint'), ('14','13','专店地址','专店地址','','','1','1','1421681583','专店地址','专店地址','专店地址',''), ('15','13','名称列表','名称列表','','','2','1','1421681610','名称列表','名称列表','名称列表',''), ('16','0','人才中心','人才中心','','','8','1','1422807583','人才中心','人才中心','人才中心','Talent'), ('17','16','招聘信息','招聘信息','','','1','1','1421681668','招聘信息','招聘信息','招聘信息',''), ('19','0','联系我们','联系我们','','','9','1','1422807847','联系我们','联系我们','联系我们','Contact');
INSERT INTO `news` VALUES ('1','0','3','少女如何穿文胸','少女如何穿文胸','&lt;a href=&quot;http://localhost:81/fuzhuang/index.php&quot;&gt;少女如何穿文胸&lt;/a&gt;','/fuzhuang/public/uploads/news_img/2015-02-01/54cda4f7bbda1.jpg','/fuzhuang/public/uploads/news_img/thumb_img/2015-02-01/54cda4f7bbda1.jpg','1','1422114997','1422766639','1',NULL,'方法','本办法','烦烦烦'), ('3','0','3','资讯链接资讯链接2','资讯链接资讯链接','&lt;a href=&quot;http://localhost:81/fuzhuang/index.php&quot;&gt;资讯链接资讯链接&lt;/a&gt;','','','2','1422766625','1422766625','1',NULL,'资讯链接资讯链接','资讯链接资讯链接','资讯链接资讯链接'), ('4','0','3','资讯链接资讯链接3','资讯链接资讯链接','&lt;a href=&quot;http://localhost:81/fuzhuang/index.php&quot;&gt;资讯链接资讯链接&lt;/a&gt;','','','2','1422766663','1422766663','1',NULL,'','',''), ('5','0','3','资讯链接资讯链接4','资讯链接资讯链接','&lt;a href=&quot;http://localhost:81/fuzhuang/index.php&quot;&gt;资讯链接资讯链接&lt;/a&gt;','','','2','1422766681','1422766681','1',NULL,'资讯链接资讯链接','',''), ('6','0','3','资讯链接资讯链接5','资讯链接资讯链接','&lt;a href=&quot;http://localhost:81/fuzhuang/index.php&quot;&gt;资讯链接资讯链接&lt;/a&gt;','','','2','1422766698','1422767010','1',NULL,'','',''), ('7','0','3','资讯链接资讯链接6','资讯链接资讯链接','&lt;a href=&quot;http://localhost:81/fuzhuang/index.php&quot;&gt;资讯链接资讯链接&lt;/a&gt;','','','2','1422766818','1422766998','1',NULL,'','',''), ('8','0','3','资讯链接资讯链接7','资讯链接资讯链接','&lt;a href=&quot;http://localhost:81/fuzhuang/index.php&quot;&gt;资讯链接资讯链接&lt;/a&gt;','','','2','1422766839','1422766839','1',NULL,'','',''), ('9','0','3','资讯链接资讯链接8','资讯链接资讯链接','&lt;a href=&quot;http://localhost:81/fuzhuang/index.php&quot;&gt;资讯链接资讯链接&lt;/a&gt;','','','2','1422766854','1422766854','1',NULL,'','',''), ('10','0','3','资讯链接资讯链接10','','&lt;a href=&quot;http://localhost:81/fuzhuang/index.php&quot;&gt;资讯链接资讯链接&lt;/a&gt;','','','2','1422766869','1422766869','1',NULL,'','','');
INSERT INTO `news_category` VALUES ('1','0','公司新闻','公司新闻','','','1','1421940776','1','公司新闻','公司新闻','公司新闻'), ('3','0','知识分享','知识分享','','','2','1421940840','1','知识分享','知识分享','知识分享');
INSERT INTO `page_content` VALUES ('1','2','&lt;p&gt;\r\n	addd\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	dfldlj垃圾了几分\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;img src=&quot;http://localhost/fuzhuang/plug-in/kindeditor/plugins/emoticons/images/30.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt; \r\n&lt;/p&gt;'), ('2','3','&lt;p&gt;\r\n	2公司介绍\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;'), ('3','4','企业文化'), ('4','5','优势展示'), ('5','6','&lt;p&gt;\r\n	品牌成员\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	达到\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;img src=&quot;http://localhost/fuzhuang/plug-in/kindeditor/plugins/emoticons/images/28.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt; \r\n&lt;/p&gt;'), ('6','7','品牌故事'), ('7','1','&lt;p&gt;\r\n	顶顶顶顶顶顶顶顶\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;img src=&quot;http://localhost/fuzhuang/plug-in/kindeditor/plugins/emoticons/images/19.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt; \r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;img src=&quot;http://localhost/fuzhuang/plug-in/kindeditor/plugins/emoticons/images/39.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt; \r\n&lt;/p&gt;'), ('8','8','牵手公益'), ('9','9','品牌定位'), ('10','10','创意设计'), ('11','11','产品展示'), ('12','12','新闻资讯'), ('13','13','网点分支'), ('14','14','专店地址'), ('15','15','名称列表'), ('16','16','人才中心'), ('17','17','招聘信息'), ('18','18','d'), ('19','19','深圳市简朵服饰实业有限公司&lt;br /&gt;\r\n地址：广东省深圳市福田区益田创新科技园20栋713-715室 &amp;nbsp; &amp;nbsp; &amp;nbsp;邮编：518017&lt;br /&gt;\r\n电话：86-755-8382 5026 &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 传真：86-755-8382 4807&lt;br /&gt;\r\n&lt;br /&gt;\r\nhttp :// www.gentle-china.com &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 服务热线：400 9973 929&lt;br /&gt;\r\nShenzhen &amp;nbsp;Gentle &amp;nbsp;Garment &amp;nbsp;Industry &amp;nbsp;Co.,Ltd&lt;br /&gt;\r\nAdd： Room 713-715, &amp;nbsp;building &amp;nbsp;No.20, &amp;nbsp;Yitian &amp;nbsp;Chuangxin &amp;nbsp;Chanyeyuan,&amp;nbsp;&lt;br /&gt;\r\nFutian District , Shenzhen, Guangdong, China &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; Zip card：518017&lt;br /&gt;\r\nTel：86-755-83825026 &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;Fax：86-755-83824807&lt;br /&gt;\r\nhttp://www.gentle-china.com &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;Hotline: 400 9973 929 &amp;nbsp;&lt;br /&gt;');
INSERT INTO `product` VALUES ('1','2','1','a1','','ddd方法','0','0','/fuzhuang/public/uploads/product_img/2015-02-01/54cdbb804968d.jpg','/fuzhuang/public/uploads/product_img/thumb_img/2015-02-01/54cdbb804968d.jpg','','1','1','a方法','a','a','1421746861'), ('3','3','0','女人的来的凉凉的','','聊得来的劳动力','0','0','/fuzhuang/public/uploads/product_img/2015-02-01/54cdbb72d6f96.jpg','/fuzhuang/public/uploads/product_img/thumb_img/2015-02-01/54cdbb72d6f96.jpg','','1','1','对对对','对对对','对对对','1421747087'), ('6','2','1','111',NULL,'pl',NULL,NULL,'/fuzhuang/public/uploads/product_img/2015-02-01/54cdbb5dd6324.jpg','/fuzhuang/public/uploads/product_img/thumb_img/2015-02-01/54cdbb5dd6324.jpg',NULL,'1','1','pl','','','1422768973'), ('7','5','1','2222',NULL,'pl',NULL,NULL,'/fuzhuang/public/uploads/product_img/2015-02-01/54cdbb9953856.jpg','/fuzhuang/public/uploads/product_img/thumb_img/2015-02-01/54cdbb9953856.jpg',NULL,'1','1','','','','1422769049'), ('8','1','0','333',NULL,'pl',NULL,NULL,'/fuzhuang/public/uploads/product_img/2015-02-01/54cdbbace490f.jpg','/fuzhuang/public/uploads/product_img/thumb_img/2015-02-01/54cdbbace490f.jpg',NULL,'1','1','','','','1422769068');
INSERT INTO `product_category` VALUES ('1','0','Choude','Choude','','','0','1421662184','1','Choude','Choude','Choude'), ('2','1','少女文胸','少女文胸','/fuzhuang/public/uploads/product_img/2015-01-19/54bcd826615e0.jpg','/fuzhuang/public/uploads/product_img/thumb_img/2015-01-19/54bcd826615e0.jpg','1','1421662246','1','少女文胸','少女文胸','少女文胸'), ('3','0','La beileZa','La beileZa','','','2','1421662274','1','La beileZa','La beileZa','La beileZa'), ('4','1','男/女家居服','男/女家居服','','','2','1421662350','1','男/女家居服','男/女家居服','男/女家居服'), ('5','1','男/女暧衣','男/女暧衣','','','3','1421662410','1','男/女暧衣','男/女暧衣','男/女暧衣'), ('6','1','男/女独立裤','男/女独立裤','','','3','1421682762','1','男/女独立裤','男/女独立裤','男/女独立裤');
INSERT INTO `product_content` VALUES ('1','3','&lt;p&gt;\r\n	333333dddd&lt;img src=&quot;http://localhost/fuzhuang/plug-in/kindeditor/plugins/emoticons/images/28.gif&quot; border=&quot;0&quot; alt=&quot;&quot; /&gt; \r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	kjhog`fggdddddddd\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	f了几分了将计就计\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	对对对&lt;img src=&quot;http://api.map.baidu.com/staticimage?center=114.025974%2C22.546054&amp;zoom=11&amp;width=558&amp;height=360&amp;markers=114.025974%2C22.546054&amp;markerStyles=l%2CA&quot; alt=&quot;&quot; /&gt; \r\n&lt;/p&gt;',''), ('2','1','地对地导弹的烦烦烦',NULL), ('3','2','顶顶顶顶顶顶顶顶',NULL), ('4','4','叮叮当当',NULL), ('5','5','动都',NULL), ('6','6','pl',NULL), ('7','7','pl',NULL), ('8','8','pl',NULL);
INSERT INTO `product_images` VALUES ('3','1','/fuzhuang/public/uploads/product_img/2015-01-22/54bfd62845168.png','/fuzhuang/public/uploads/product_img/thumb_img/2015-01-22/54bfd62845168.png',NULL,NULL,'1421858344');
INSERT INTO `user_admin` VALUES ('1','admin','21232f297a57a5a743894a0e4a801fc3','admin','1800259110','28308','80808@qd.com','192.168.1.2','80808080','100msh','深圳福田','518000','1','1420709606'), ('2','admin2','admin','admin2','1800259110','28308','80808@qd.com','192.168.1.2','80808080','100msh','深圳福田','518000','1','1420709606'), ('3','admin3','admin','admin3','1800259110','28308','80808@qd.com','192.168.1.2','80808080','100msh','深圳福田','518000','1','1420709606');
