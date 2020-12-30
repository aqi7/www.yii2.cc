/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : tenement

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-10-31 18:12:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `t_adlevel`
-- ----------------------------
DROP TABLE IF EXISTS `t_adlevel`;
CREATE TABLE `t_adlevel` (
  `a_id` int(30) NOT NULL DEFAULT '0',
  `a_name` varchar(30) DEFAULT NULL COMMENT '等级',
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of t_adlevel
-- ----------------------------
INSERT INTO `t_adlevel` VALUES ('1', '超级管理员');
INSERT INTO `t_adlevel` VALUES ('2', '普通管理员');

-- ----------------------------
-- Table structure for `t_admin`
-- ----------------------------
DROP TABLE IF EXISTS `t_admin`;
CREATE TABLE `t_admin` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键，自增',
  `a_name` varchar(30) NOT NULL COMMENT '管理员用户名',
  `a_pwd` varchar(90) NOT NULL COMMENT '密码',
  `a_tel` char(11) NOT NULL COMMENT '手机号',
  `a_role` tinyint(10) NOT NULL COMMENT '角色：1，超级管理员，2，普通管理员',
  `a_sid` int(11) DEFAULT NULL COMMENT '上级id',
  `bu_id` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of t_admin
-- ----------------------------
INSERT INTO `t_admin` VALUES ('1', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', '15263419973', '1', '0', null);
INSERT INTO `t_admin` VALUES ('21', 'root', '7c4a8d09ca3762af61e59520943dc26494f8941b', '13123456789', '2', '1', '1');
INSERT INTO `t_admin` VALUES ('22', 'sang', '20eabe5d64b0e216796e834f52d61fd0b70332fc', '15522346543', '2', '1', '2');

-- ----------------------------
-- Table structure for `t_bill`
-- ----------------------------
DROP TABLE IF EXISTS `t_bill`;
CREATE TABLE `t_bill` (
  `bi_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `r_id` tinyint(4) NOT NULL COMMENT '房间ID',
  `u_id` tinyint(4) NOT NULL COMMENT '用户ID',
  `bi_warter` varchar(10) NOT NULL COMMENT '水费',
  `bi_electric` varchar(10) NOT NULL COMMENT '电费',
  `bi_cost` varchar(10) NOT NULL COMMENT '网费',
  `bi_rent` varchar(10) NOT NULL COMMENT '租金',
  `bi_total` varchar(10) NOT NULL COMMENT '总金额',
  `bi_remarks` varchar(50) NOT NULL COMMENT '备注',
  `bi_time` date NOT NULL COMMENT '账单日期',
  PRIMARY KEY (`bi_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_bill
-- ----------------------------
INSERT INTO `t_bill` VALUES ('3', '6', '4', '23', '43', '23', '43', '235', '344', '2017-10-31');
INSERT INTO `t_bill` VALUES ('2', '13', '4', '12', '43', '54', '65', '174', '富商大贾', '2017-10-30');
INSERT INTO `t_bill` VALUES ('4', '7', '5', '32', '21', '43', '54', '150', 'twr', '2017-10-30');

-- ----------------------------
-- Table structure for `t_build`
-- ----------------------------
DROP TABLE IF EXISTS `t_build`;
CREATE TABLE `t_build` (
  `bu_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT '楼栋ID',
  `bu_name` varchar(20) NOT NULL COMMENT '楼栋名',
  `a_id` tinyint(4) NOT NULL COMMENT '楼栋管理员',
  PRIMARY KEY (`bu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_build
-- ----------------------------
INSERT INTO `t_build` VALUES ('1', '新兴苑A座', '21');
INSERT INTO `t_build` VALUES ('2', '新兴苑B座', '21');
INSERT INTO `t_build` VALUES ('3', '新兴苑C座', '22');

-- ----------------------------
-- Table structure for `t_furniture`
-- ----------------------------
DROP TABLE IF EXISTS `t_furniture`;
CREATE TABLE `t_furniture` (
  `f_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(20) DEFAULT NULL COMMENT '家具名',
  `f_class` varchar(30) NOT NULL COMMENT 'class添加图片',
  PRIMARY KEY (`f_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='家具表';

-- ----------------------------
-- Records of t_furniture
-- ----------------------------
INSERT INTO `t_furniture` VALUES ('1', '沙发', 'iconfont icon-shafa');
INSERT INTO `t_furniture` VALUES ('2', '餐桌', 'iconfont icon-zhuozi');
INSERT INTO `t_furniture` VALUES ('3', '椅子', 'iconfont icon-yizi');
INSERT INTO `t_furniture` VALUES ('4', '衣柜', 'iconfont icon-dpc');
INSERT INTO `t_furniture` VALUES ('5', '床', 'iconfont icon-chuangdian');
INSERT INTO `t_furniture` VALUES ('6', '书桌', 'iconfont icon-bangongzhuo');
INSERT INTO `t_furniture` VALUES ('7', '橱柜', 'iconfont icon-chugui');
INSERT INTO `t_furniture` VALUES ('8', '车位', 'iconfont icon-tingchewei');
INSERT INTO `t_furniture` VALUES ('9', '门禁', 'iconfont icon-menjin');

-- ----------------------------
-- Table structure for `t_household`
-- ----------------------------
DROP TABLE IF EXISTS `t_household`;
CREATE TABLE `t_household` (
  `h_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `h_name` varchar(20) DEFAULT NULL COMMENT '家电名',
  `h_class` varchar(30) NOT NULL COMMENT 'class添加图片',
  PRIMARY KEY (`h_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='家电';

-- ----------------------------
-- Records of t_household
-- ----------------------------
INSERT INTO `t_household` VALUES ('1', '热水器', 'iconfont icon-reshui');
INSERT INTO `t_household` VALUES ('2', '冰箱', 'iconfont icon-bingxiang');
INSERT INTO `t_household` VALUES ('3', '网络', 'iconfont icon-wifi');
INSERT INTO `t_household` VALUES ('4', '空调', 'iconfont icon-kongdiao');
INSERT INTO `t_household` VALUES ('5', '燃气', 'iconfont icon-7');
INSERT INTO `t_household` VALUES ('6', '洗衣机', 'iconfont icon-xiyiji');
INSERT INTO `t_household` VALUES ('7', '电梯', 'iconfont icon-gsdt');
INSERT INTO `t_household` VALUES ('8', '供暖', 'iconfont icon-nuanqi');
INSERT INTO `t_household` VALUES ('9', '油烟机', 'iconfont icon-xiyouyanji');
INSERT INTO `t_household` VALUES ('10', '微波炉', 'iconfont icon-weibolu');
INSERT INTO `t_household` VALUES ('11', '电视', 'iconfont icon-dianshi');

-- ----------------------------
-- Table structure for `t_message`
-- ----------------------------
DROP TABLE IF EXISTS `t_message`;
CREATE TABLE `t_message` (
  `me_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT '消息',
  `me_title` varchar(255) NOT NULL COMMENT '标题',
  `me_content` text NOT NULL COMMENT '内容',
  `u_id` tinyint(4) DEFAULT NULL COMMENT '用户',
  `me_visible` tinyint(4) DEFAULT NULL COMMENT '所有人可见',
  `me_time` date DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`me_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_message
-- ----------------------------
INSERT INTO `t_message` VALUES ('3', '撒旦a', '实打实', null, '1', '2017-10-12');
INSERT INTO `t_message` VALUES ('2', 'treat', '请问请问', '4', null, '2017-10-12');

-- ----------------------------
-- Table structure for `t_mothed`
-- ----------------------------
DROP TABLE IF EXISTS `t_mothed`;
CREATE TABLE `t_mothed` (
  `m_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT '支付方式ID',
  `m_name` varchar(10) NOT NULL COMMENT '支付方式',
  PRIMARY KEY (`m_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_mothed
-- ----------------------------
INSERT INTO `t_mothed` VALUES ('1', '押一付一');
INSERT INTO `t_mothed` VALUES ('2', '押二付一');
INSERT INTO `t_mothed` VALUES ('3', '押二付二');

-- ----------------------------
-- Table structure for `t_room`
-- ----------------------------
DROP TABLE IF EXISTS `t_room`;
CREATE TABLE `t_room` (
  `r_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `r_area` varchar(10) DEFAULT NULL COMMENT '面积',
  `f_id` varchar(10) DEFAULT NULL COMMENT '家具',
  `r_monery` varchar(12) DEFAULT NULL COMMENT '租金',
  `r_deposit` varchar(12) DEFAULT NULL COMMENT '押金',
  `r_rental` tinyint(4) DEFAULT NULL COMMENT '是否出租 1.未租 2.已租',
  `ro_id` tinyint(4) DEFAULT NULL COMMENT '户型',
  `r_address` varchar(50) DEFAULT NULL COMMENT '地址',
  `r_pic` varchar(50) DEFAULT NULL COMMENT '图片',
  `m_id` tinyint(4) DEFAULT NULL COMMENT '付款方式',
  `bu_id` tinyint(4) DEFAULT NULL COMMENT '楼栋',
  `u_id` tinyint(11) DEFAULT NULL COMMENT '用户id',
  `r_status` tinyint(4) DEFAULT NULL COMMENT '状态 1.已预约 2.微预约',
  `r_remarks` varchar(90) DEFAULT NULL COMMENT '备注',
  `h_id` varchar(10) DEFAULT NULL COMMENT '家电',
  `r_ktime` date DEFAULT NULL COMMENT '租房开始时间',
  `r_dtime` date DEFAULT NULL COMMENT '租房结束时间',
  `r_mtime` date DEFAULT NULL COMMENT '预约时间',
  `r_type` tinyint(4) DEFAULT NULL COMMENT '1看房2:租房',
  `r_state` tinyint(4) DEFAULT NULL COMMENT '状态:1:未处理2:已处理',
  `r_describe` text COMMENT '房源描述',
  `r_contract` varchar(50) DEFAULT NULL COMMENT '合同',
  `r_receipt` varchar(50) DEFAULT NULL COMMENT '收据',
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='房间信息';

-- ----------------------------
-- Records of t_room
-- ----------------------------
INSERT INTO `t_room` VALUES ('6', '120', '2,3', '2000', '100', '2', '1', '新兴苑A座-101', '1508840573.jpg', '1', '1', '4', '1', '111', '2,3', '2017-10-24', '2017-11-25', '2017-10-26', '2', '2', null, null, null);
INSERT INTO `t_room` VALUES ('7', '12', '1,2', '123', '12', '2', '1', '新兴苑A座-123', '1508841131.jpg', '2', '1', '5', null, null, '2,3', '2017-10-25', '2017-11-24', null, null, null, null, null, null);
INSERT INTO `t_room` VALUES ('8', '120', '1', '2000', '100', '1', '3', '新兴苑A座-105', '1508841450.jpg', '1', '3', null, null, null, '2', null, null, '2017-10-31', '2', null, null, null, null);
INSERT INTO `t_room` VALUES ('10', '88', '1,2', '1234', '100', '1', '1', '新兴苑B座-105', '1508843063.jpg', '1', '2', '5', '1', null, '2', null, null, '2017-10-27', '1', null, null, null, null);
INSERT INTO `t_room` VALUES ('11', '123', '1,2,8', '2112', '100', '1', '1', '新兴苑A座-105', '1508916392.jpg', '3', '1', null, null, null, '7,8,9', null, null, null, null, null, '钱钱钱钱钱钱钱钱', null, null);
INSERT INTO `t_room` VALUES ('13', '130', '1,7', '2000', '100', '2', '2', '新兴苑C座-109', '1509351431.jpg', '2', '3', '4', '1', '非法定', '6,11', '2017-10-30', '2017-11-30', '2017-10-30', '2', '2', 'f好房子', '1509356402.jpg', '1509356402.jpg');
INSERT INTO `t_room` VALUES ('12', '111', '1,8,9', '3000', '123', '1', '2', '新兴苑B座-505', '1509274205.jpeg', '1', '2', null, null, null, '7,8,9', null, null, null, null, null, '法定时间飞快', null, null);

-- ----------------------------
-- Table structure for `t_rotype`
-- ----------------------------
DROP TABLE IF EXISTS `t_rotype`;
CREATE TABLE `t_rotype` (
  `ro_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT '房间类型ID',
  `ro_name` varchar(20) NOT NULL COMMENT '房间类型',
  PRIMARY KEY (`ro_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_rotype
-- ----------------------------
INSERT INTO `t_rotype` VALUES ('1', '一室一厅');
INSERT INTO `t_rotype` VALUES ('2', '三室两厅');
INSERT INTO `t_rotype` VALUES ('3', '两室一厅');

-- ----------------------------
-- Table structure for `t_user`
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `u_id` int(4) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(20) DEFAULT NULL COMMENT '姓名',
  `u_pwd` char(80) DEFAULT NULL COMMENT '密码',
  `u_truename` varchar(20) DEFAULT NULL COMMENT '真实姓名',
  `u_tel` char(11) DEFAULT NULL COMMENT '联系方式',
  `u_sex` char(2) DEFAULT NULL,
  `u_age` varchar(5) DEFAULT NULL,
  `u_weixin` varchar(30) DEFAULT NULL COMMENT '微信号',
  `u_collect` varchar(20) DEFAULT NULL COMMENT '收藏',
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES ('4', '郭汝瑰', '7c4a8d09ca3762af61e59520943dc26494f8941b', '范德萨', '13156343747', '1', '18', 'jsang123', '');
INSERT INTO `t_user` VALUES ('5', '小豆腐', '7c4a8d09ca3762af61e59520943dc26494f8941b', '张三', '15552826709', '2', '18', null, null);
INSERT INTO `t_user` VALUES ('8', '戈萨格', '7c4a8d09ca3762af61e59520943dc26494f8941b', '发发呆', '13156343744', '2', '19', null, null);
INSERT INTO `t_user` VALUES ('9', '凡达萨', '7c4a8d09ca3762af61e59520943dc26494f8941b', '广泛大使馆', '13156343788', '2', '13', 'sfsggs', null);
