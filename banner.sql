/*
Navicat MySQL Data Transfer

Source Server         : 本地连接
Source Server Version : 50538
Source Host           : localhost:3306
Source Database       : fuzhuang

Target Server Type    : MYSQL
Target Server Version : 50538
File Encoding         : 65001

Date: 2015-01-19 00:28:55
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `banner`
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of banner
-- ----------------------------
INSERT INTO banner VALUES ('1', 'banner 01', '好久好久好久接口接口\r\n宝贝宝贝', '/fuzhuang/Application/Admin/Public/Uploads/Original_Img/2015-01-19/54bbdde55cfbe.jpg', '/fuzhuang/Application/Admin/Public/Uploads/Thumb_Img/2015-01-19/54bbdde55cfbe.jpg', '1421598488', '1', 'www.baidu.com');
