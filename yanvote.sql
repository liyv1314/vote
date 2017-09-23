/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50635
 Source Host           : localhost
 Source Database       : yanvote

 Target Server Type    : MySQL
 Target Server Version : 50635
 File Encoding         : utf-8

 Date: 09/19/2017 18:59:01 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `campaign`
-- ----------------------------
DROP TABLE IF EXISTS `campaign`;
CREATE TABLE `campaign` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '' COMMENT '竞选者姓名',
  `gender` varchar(10) NOT NULL DEFAULT '',
  `desc` varchar(255) NOT NULL DEFAULT '',
  `position_id` int(11) unsigned NOT NULL DEFAULT '0',
  `vote` int(11) NOT NULL DEFAULT '0',
  `create_time` int(10) NOT NULL DEFAULT '0',
  `update_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `campaign`
-- ----------------------------
BEGIN;
INSERT INTO `campaign` VALUES ('1', '王五', '男', '王大锤', '1', '21', '1505724619', '1505724619'), ('4', '赵四', '男', '尼古拉斯 赵四', '4', '40', '1505728640', '1505728640'), ('5', '李久安', '男', '一小只', '1', '27', '1505730204', '1505730204'), ('6', '六神', '男', '六神无主', '1', '0', '1505812015', '1505812015');
COMMIT;

-- ----------------------------
--  Table structure for `position`
-- ----------------------------
DROP TABLE IF EXISTS `position`;
CREATE TABLE `position` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `position` varchar(30) NOT NULL DEFAULT '' COMMENT '职位名称',
  `update_time` int(10) NOT NULL DEFAULT '0',
  `create_time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `position`
-- ----------------------------
BEGIN;
INSERT INTO `position` VALUES ('1', '组织委员', '1505722951', '1505722951'), ('4', '宣传委员', '1505730246', '1505730246');
COMMIT;

-- ----------------------------
--  Table structure for `record`
-- ----------------------------
DROP TABLE IF EXISTS `record`;
CREATE TABLE `record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `create_time` int(10) NOT NULL DEFAULT '0',
  `update_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `record`
-- ----------------------------
BEGIN;
INSERT INTO `record` VALUES ('1', '1', '5', '0', '0'), ('2', '1', '5', '0', '0'), ('3', '1', '5', '0', '0'), ('4', '1', '5', '0', '0'), ('5', '1', '5', '0', '0'), ('6', '1', '5', '0', '0'), ('7', '1', '5', '0', '0'), ('8', '1', '5', '0', '0'), ('9', '1', '5', '0', '0'), ('10', '1', '5', '0', '0'), ('11', '1', '5', '0', '0'), ('12', '1', '5', '0', '0'), ('13', '1', '5', '0', '0'), ('14', '1', '5', '0', '0'), ('15', '1', '1', '0', '0'), ('16', '1', '4', '0', '0'), ('17', '1', '1', '0', '0'), ('18', '1', '5', '0', '0'), ('19', '1', '1', '0', '0'), ('20', '1', '1', '0', '0'), ('21', '1', '4', '0', '0'), ('22', '1', '5', '0', '0'), ('23', '1', '5', '0', '0'), ('24', '1', '5', '0', '0'), ('25', '1', '1', '0', '0'), ('26', '1', '4', '0', '0'), ('27', '1', '4', '0', '0'), ('28', '1', '1', '0', '0'), ('29', '1', '1', '0', '0'), ('30', '1', '5', '0', '0'), ('31', '1', '1', '0', '0'), ('32', '1', '5', '0', '0'), ('33', '1', '5', '0', '0'), ('34', '1', '1', '0', '0'), ('35', '1', '4', '0', '0'), ('36', '1', '4', '0', '0'), ('37', '1', '4', '0', '0'), ('38', '1', '1', '0', '0'), ('39', '1', '1', '0', '0'), ('40', '1', '1', '0', '0'), ('41', '1', '4', '0', '0'), ('42', '1', '4', '0', '0'), ('43', '1', '1', '0', '0'), ('44', '1', '4', '0', '0'), ('45', '1', '4', '0', '0'), ('46', '1', '1', '0', '0'), ('47', '1', '4', '0', '0'), ('48', '1', '4', '0', '0'), ('49', '1', '4', '0', '0'), ('50', '1', '4', '0', '0'), ('51', '1', '4', '0', '0'), ('52', '1', '4', '0', '0'), ('53', '1', '4', '0', '0'), ('54', '1', '4', '0', '0'), ('55', '1', '4', '0', '0'), ('56', '1', '4', '0', '0'), ('57', '1', '4', '0', '0'), ('58', '1', '5', '0', '0'), ('59', '1', '1', '0', '0'), ('60', '1', '1', '0', '0'), ('61', '1', '1', '0', '0'), ('62', '1', '1', '0', '0'), ('63', '1', '1', '0', '0'), ('64', '1', '4', '0', '0'), ('65', '1', '4', '0', '0'), ('66', '1', '4', '0', '0'), ('67', '1', '4', '0', '0'), ('68', '1', '4', '0', '0'), ('69', '1', '4', '0', '0'), ('70', '1', '4', '0', '0'), ('71', '1', '4', '0', '0'), ('72', '1', '4', '0', '0'), ('73', '1', '4', '0', '0'), ('74', '1', '4', '0', '0'), ('75', '1', '4', '0', '0'), ('76', '1', '5', '0', '0'), ('77', '1', '5', '0', '0'), ('78', '1', '5', '0', '0'), ('79', '1', '4', '0', '0'), ('80', '1', '1', '0', '0'), ('81', '1', '4', '0', '0'), ('82', '2', '5', '0', '0'), ('83', '2', '1', '0', '0'), ('84', '2', '4', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '' COMMENT '投票用户姓名',
  `sid` varchar(15) NOT NULL DEFAULT '' COMMENT '投票用户学号',
  `update_time` int(10) NOT NULL DEFAULT '0',
  `create_time` int(10) NOT NULL DEFAULT '0',
  `choosed` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `user`
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES ('1', '李昱', '02130402', '1505732047', '1505732047', ''), ('2', 'bob', '12345678', '0', '0', '1,4');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
