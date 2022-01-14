/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ph2103lm

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-12-21 19:52:23
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `tbl_category`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `dateCreate` datetime DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_category
-- ----------------------------
INSERT INTO tbl_category VALUES ('1', 'Dell', '1', '2021-12-21 13:35:10');
INSERT INTO tbl_category VALUES ('2', 'HP', '1', '2021-12-21 13:35:21');
INSERT INTO tbl_category VALUES ('3', 'IBM', '1', '2021-12-21 13:35:27');
INSERT INTO tbl_category VALUES ('4', 'Lenovo', '1', '2021-12-21 13:51:44');
