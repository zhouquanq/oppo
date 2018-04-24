/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50516
Source Host           : 127.0.0.1:3306
Source Database       : oppo

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2015-07-20 09:45:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `oppo_admin`
-- ----------------------------
DROP TABLE IF EXISTS `oppo_admin`;
CREATE TABLE `oppo_admin` (
  `auid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '后台ID',
  `adminname` varchar(45) NOT NULL DEFAULT '' COMMENT '后台用户名',
  `passwd` varchar(32) NOT NULL DEFAULT '' COMMENT '后台密码',
  `logintime` int(10) NOT NULL DEFAULT '0' COMMENT '登录时间',
  `loginip` varchar(45) NOT NULL DEFAULT '' COMMENT '登录IP',
  PRIMARY KEY (`auid`),
  UNIQUE KEY `adminname_UNIQUE` (`adminname`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='后台用户表';

-- ----------------------------
-- Records of oppo_admin
-- ----------------------------
INSERT INTO `oppo_admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '0', '');

-- ----------------------------
-- Table structure for `oppo_adress`
-- ----------------------------
DROP TABLE IF EXISTS `oppo_adress`;
CREATE TABLE `oppo_adress` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adress` varchar(255) NOT NULL DEFAULT '' COMMENT '地址',
  `names` varchar(45) NOT NULL DEFAULT '' COMMENT '收件人名',
  `phone` char(12) NOT NULL DEFAULT '0' COMMENT '电话',
  `emall` varchar(45) NOT NULL DEFAULT '' COMMENT '邮箱',
  `user_uid` int(10) unsigned NOT NULL COMMENT '用户id',
  PRIMARY KEY (`id`),
  KEY `fk_oppo_adress_oppo_user1_idx` (`user_uid`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='地址表';

-- ----------------------------
-- Records of oppo_adress
-- ----------------------------
INSERT INTO `oppo_adress` VALUES ('27', '湖北黄冈黄冈市黄州区红卫路', '饶胖子', '13477649269', '', '17');
INSERT INTO `oppo_adress` VALUES ('28', '湖北武汉武汉市光谷广场', '周泉', '18872200492', '', '8');
INSERT INTO `oppo_adress` VALUES ('26', '湖北黄冈黄冈市黄州区陶店乡', '周泉', '18872200492', '', '16');
INSERT INTO `oppo_adress` VALUES ('31', '湖北黄冈黄冈市黄州区陶店乡陶店卫生院', '龙英', '13227361860', '', '16');

-- ----------------------------
-- Table structure for `oppo_attribute`
-- ----------------------------
DROP TABLE IF EXISTS `oppo_attribute`;
CREATE TABLE `oppo_attribute` (
  `attr_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '属性ID',
  `attr_name` varchar(45) NOT NULL DEFAULT '' COMMENT '属性名称',
  `attr_value` varchar(45) NOT NULL DEFAULT '' COMMENT '属性值',
  `attr_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1为属性 2为规格',
  `attr_type_tid` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`attr_id`),
  KEY `fk_oppo_attribute_oppo_type_idx` (`attr_type_tid`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COMMENT='属性表';

-- ----------------------------
-- Records of oppo_attribute
-- ----------------------------
INSERT INTO `oppo_attribute` VALUES ('27', '颜色', '白色,金色,黑色,粉色,银色', '1', '9');
INSERT INTO `oppo_attribute` VALUES ('25', '内存', '8G,16G,32G,64G', '1', '9');
INSERT INTO `oppo_attribute` VALUES ('28', '网络制式', '移动4G,联通4G,联通3G,移动联通双4G,电信4G', '1', '9');
INSERT INTO `oppo_attribute` VALUES ('30', '屏幕尺寸', '4.5,5.0,5.5,6.0', '0', '9');
INSERT INTO `oppo_attribute` VALUES ('37', '分类', '蓝牙耳机,有线耳机,数据线,移动电源,智能配件,其他', '0', '10');
INSERT INTO `oppo_attribute` VALUES ('38', '颜色', '黑色,白色,蓝色,粉色,红色,金色', '1', '10');

-- ----------------------------
-- Table structure for `oppo_brand`
-- ----------------------------
DROP TABLE IF EXISTS `oppo_brand`;
CREATE TABLE `oppo_brand` (
  `bid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bname` varchar(45) NOT NULL DEFAULT '',
  `logo` varchar(45) NOT NULL DEFAULT '',
  `is_hot` int(11) NOT NULL DEFAULT '0' COMMENT '1为热门',
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='品牌表';

-- ----------------------------
-- Records of oppo_brand
-- ----------------------------
INSERT INTO `oppo_brand` VALUES ('22', 'oppo', 'Upload/77221435206674_thumb.jpg', '1');
INSERT INTO `oppo_brand` VALUES ('20', '三星', 'Upload/52871435206581_thumb.jpg', '0');
INSERT INTO `oppo_brand` VALUES ('21', '苹果', 'Upload/27301435206594_thumb.jpg', '0');

-- ----------------------------
-- Table structure for `oppo_category`
-- ----------------------------
DROP TABLE IF EXISTS `oppo_category`;
CREATE TABLE `oppo_category` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `sname` varchar(35) NOT NULL DEFAULT '' COMMENT '分类名',
  `spid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父级ID',
  `oppo_type_tid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`sid`),
  KEY `fk_oppo_sort_oppo_type1_idx` (`oppo_type_tid`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COMMENT='分类表';

-- ----------------------------
-- Records of oppo_category
-- ----------------------------
INSERT INTO `oppo_category` VALUES ('26', '音乐手机', '19', '9');
INSERT INTO `oppo_category` VALUES ('19', '手机', '0', '0');
INSERT INTO `oppo_category` VALUES ('20', '智能手机', '19', '9');
INSERT INTO `oppo_category` VALUES ('22', '配件', '0', '0');
INSERT INTO `oppo_category` VALUES ('27', '配件', '22', '10');

-- ----------------------------
-- Table structure for `oppo_detail`
-- ----------------------------
DROP TABLE IF EXISTS `oppo_detail`;
CREATE TABLE `oppo_detail` (
  `did` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `small_img` varchar(255) NOT NULL DEFAULT '',
  `url_img` varchar(255) NOT NULL DEFAULT '',
  `big_img` varchar(255) NOT NULL DEFAULT '',
  `goods_gid` int(10) unsigned NOT NULL,
  `servace` text COMMENT '售后',
  `good_detail` text COMMENT '商品详细',
  PRIMARY KEY (`did`),
  KEY `fk_oppo_detail_oppo_goods1_idx` (`goods_gid`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COMMENT='商品详细表';

-- ----------------------------
-- Records of oppo_detail
-- ----------------------------
INSERT INTO `oppo_detail` VALUES ('5', '', '', '', '0', '测试测试测试测试测试', '测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试');
INSERT INTO `oppo_detail` VALUES ('25', 'Upload/Content/15/07/small_94801436590249.png,Upload/Content/15/07/small_3811436590248.png,Upload/Content/15/07/small_95421436590247.png,Upload/Content/15/07/small_75381436590246.png,Upload/Content/15/07/small_81941436590246.png', 'Upload/Content/15/07/url_94801436590249.png,Upload/Content/15/07/url_3811436590248.png,Upload/Content/15/07/url_95421436590247.png,Upload/Content/15/07/url_75381436590246.png,Upload/Content/15/07/url_81941436590246.png', 'Upload/Content/15/07/big_94801436590249.png,Upload/Content/15/07/big_3811436590248.png,Upload/Content/15/07/big_95421436590247.png,Upload/Content/15/07/big_75381436590246.png,Upload/Content/15/07/big_81941436590246.png', '130', '<p>5.5吋大屏，1600W电动旋转摄像头</p>', '<p>5.5吋大屏，1600W电动旋转摄像头</p>');
INSERT INTO `oppo_detail` VALUES ('24', 'Upload/Content/15/07/small_85191436590036.png,Upload/Content/15/07/small_79581436590035.png,Upload/Content/15/07/small_15111436590034.png,Upload/Content/15/07/small_77381436590033.png,Upload/Content/15/07/small_89461436590032.png', 'Upload/Content/15/07/url_85191436590036.png,Upload/Content/15/07/url_79581436590035.png,Upload/Content/15/07/url_15111436590034.png,Upload/Content/15/07/url_77381436590033.png,Upload/Content/15/07/url_89461436590032.png', 'Upload/Content/15/07/big_85191436590036.png,Upload/Content/15/07/big_79581436590035.png,Upload/Content/15/07/big_15111436590034.png,Upload/Content/15/07/big_77381436590033.png,Upload/Content/15/07/big_89461436590032.png', '129', '<p>闪充+全局闪拍一闪动人心/全金属一体机身/全新的2.5D弧度屏/领先的3GB RAM超大运行内存</p>', '<p>闪充+全局闪拍一闪动人心/全金属一体机身/全新的2.5D弧度屏/领先的3GB RAM超大运行内存</p>');
INSERT INTO `oppo_detail` VALUES ('23', 'Upload/Content/15/07/small_561436589876.png,Upload/Content/15/07/small_6061436589875.png,Upload/Content/15/07/small_49441436589874.png,Upload/Content/15/07/small_99531436589874.png,Upload/Content/15/07/small_46771436589872.png', 'Upload/Content/15/07/url_561436589876.png,Upload/Content/15/07/url_6061436589875.png,Upload/Content/15/07/url_49441436589874.png,Upload/Content/15/07/url_99531436589874.png,Upload/Content/15/07/url_46771436589872.png', 'Upload/Content/15/07/big_561436589876.png,Upload/Content/15/07/big_6061436589875.png,Upload/Content/15/07/big_49441436589874.png,Upload/Content/15/07/big_99531436589874.png,Upload/Content/15/07/big_46771436589872.png', '128', '<p>闪充+全局闪拍一闪动人心/全金属一体机身/全新的2.5D弧度屏/领先的3GB RAM超大运行内存</p>', '<p>闪充+全局闪拍一闪动人心/全金属一体机身/全新的2.5D弧度屏/领先的3GB RAM超大运行内存</p>');
INSERT INTO `oppo_detail` VALUES ('26', 'Upload/Content/15/07/small_65951436590354.png,Upload/Content/15/07/small_3961436590353.png,Upload/Content/15/07/small_52151436590352.png,Upload/Content/15/07/small_9071436590352.png,Upload/Content/15/07/small_17331436590351.png', 'Upload/Content/15/07/url_65951436590354.png,Upload/Content/15/07/url_3961436590353.png,Upload/Content/15/07/url_52151436590352.png,Upload/Content/15/07/url_9071436590352.png,Upload/Content/15/07/url_17331436590351.png', 'Upload/Content/15/07/big_65951436590354.png,Upload/Content/15/07/big_3961436590353.png,Upload/Content/15/07/big_52151436590352.png,Upload/Content/15/07/big_9071436590352.png,Upload/Content/15/07/big_17331436590351.png', '131', '<p>5.5吋大屏，1600W电动旋转摄像头</p>', '<p>5.5吋大屏，1600W电动旋转摄像头</p>');
INSERT INTO `oppo_detail` VALUES ('27', 'Upload/Content/15/07/small_99871436590512.png,Upload/Content/15/07/small_92041436590511.png,Upload/Content/15/07/small_16821436590509.png,Upload/Content/15/07/small_6411436590509.png,Upload/Content/15/07/small_3251436590508.png', 'Upload/Content/15/07/url_99871436590512.png,Upload/Content/15/07/url_92041436590511.png,Upload/Content/15/07/url_16821436590509.png,Upload/Content/15/07/url_6411436590509.png,Upload/Content/15/07/url_3251436590508.png', 'Upload/Content/15/07/big_99871436590512.png,Upload/Content/15/07/big_92041436590511.png,Upload/Content/15/07/big_16821436590509.png,Upload/Content/15/07/big_6411436590509.png,Upload/Content/15/07/big_3251436590508.png', '132', '<p>极致超薄，5000万像素超清画质，VOOC mini闪充</p>', '<p>极致超薄，5000万像素超清画质，VOOC mini闪充</p>');
INSERT INTO `oppo_detail` VALUES ('28', 'Upload/Content/15/07/small_61731436590603.png,Upload/Content/15/07/small_85461436590602.png,Upload/Content/15/07/small_86651436590601.png,Upload/Content/15/07/small_84331436590600.png,Upload/Content/15/07/small_63961436590599.png', 'Upload/Content/15/07/url_61731436590603.png,Upload/Content/15/07/url_85461436590602.png,Upload/Content/15/07/url_86651436590601.png,Upload/Content/15/07/url_84331436590600.png,Upload/Content/15/07/url_63961436590599.png', 'Upload/Content/15/07/big_61731436590603.png,Upload/Content/15/07/big_85461436590602.png,Upload/Content/15/07/big_86651436590601.png,Upload/Content/15/07/big_84331436590600.png,Upload/Content/15/07/big_63961436590599.png', '133', '<p>极致超薄，5000万像素超清画质，VOOC mini闪充</p>', '<p>极致超薄，5000万像素超清画质，VOOC mini闪充</p>');
INSERT INTO `oppo_detail` VALUES ('29', 'Upload/Content/15/07/small_57951436590756.png,Upload/Content/15/07/small_69011436590755.png,Upload/Content/15/07/small_28011436590754.png,Upload/Content/15/07/small_32531436590754.png', 'Upload/Content/15/07/url_57951436590756.png,Upload/Content/15/07/url_69011436590755.png,Upload/Content/15/07/url_28011436590754.png,Upload/Content/15/07/url_32531436590754.png', 'Upload/Content/15/07/big_57951436590756.png,Upload/Content/15/07/big_69011436590755.png,Upload/Content/15/07/big_28011436590754.png,Upload/Content/15/07/big_32531436590754.png', '134', '<p>自2015年6月14日起，降至￥2499！4G网络畅享极速体验，2K屏幕，1300万像素后置摄像头，VOOC闪充-全球首款极速体验</p>', '<p>自2015年6月14日起，降至￥2499！4G网络畅享极速体验，2K屏幕，1300万像素后置摄像头，VOOC闪充-全球首款极速体验</p>');
INSERT INTO `oppo_detail` VALUES ('30', 'Upload/Content/15/07/small_17171436590910.png,Upload/Content/15/07/small_26871436590909.png,Upload/Content/15/07/small_94831436590908.png,Upload/Content/15/07/small_43301436590908.png', 'Upload/Content/15/07/url_17171436590910.png,Upload/Content/15/07/url_26871436590909.png,Upload/Content/15/07/url_94831436590908.png,Upload/Content/15/07/url_43301436590908.png', 'Upload/Content/15/07/big_17171436590910.png,Upload/Content/15/07/big_26871436590909.png,Upload/Content/15/07/big_94831436590908.png,Upload/Content/15/07/big_43301436590908.png', '135', '', '');
INSERT INTO `oppo_detail` VALUES ('31', 'Upload/Content/15/07/small_4331436630946.png,Upload/Content/15/07/small_56611436630944.png,Upload/Content/15/07/small_23241436630943.png,Upload/Content/15/07/small_90071436630942.png', 'Upload/Content/15/07/url_4331436630946.png,Upload/Content/15/07/url_56611436630944.png,Upload/Content/15/07/url_23241436630943.png,Upload/Content/15/07/url_90071436630942.png', 'Upload/Content/15/07/big_4331436630946.png,Upload/Content/15/07/big_56611436630944.png,Upload/Content/15/07/big_23241436630943.png,Upload/Content/15/07/big_90071436630942.png', '136', '', '');
INSERT INTO `oppo_detail` VALUES ('32', 'Upload/Content/15/07/small_56911436631041.png,Upload/Content/15/07/small_8841436631040.png,Upload/Content/15/07/small_30661436631039.png,Upload/Content/15/07/small_911436631038.png', 'Upload/Content/15/07/url_56911436631041.png,Upload/Content/15/07/url_8841436631040.png,Upload/Content/15/07/url_30661436631039.png,Upload/Content/15/07/url_911436631038.png', 'Upload/Content/15/07/big_56911436631041.png,Upload/Content/15/07/big_8841436631040.png,Upload/Content/15/07/big_30661436631039.png,Upload/Content/15/07/big_911436631038.png', '137', '', '');
INSERT INTO `oppo_detail` VALUES ('33', 'Upload/Content/15/07/small_40451436631170.png,Upload/Content/15/07/small_21601436631169.png,Upload/Content/15/07/small_16821436631168.png,Upload/Content/15/07/small_85781436631168.png,Upload/Content/15/07/small_10321436631167.png', 'Upload/Content/15/07/url_40451436631170.png,Upload/Content/15/07/url_21601436631169.png,Upload/Content/15/07/url_16821436631168.png,Upload/Content/15/07/url_85781436631168.png,Upload/Content/15/07/url_10321436631167.png', 'Upload/Content/15/07/big_40451436631170.png,Upload/Content/15/07/big_21601436631169.png,Upload/Content/15/07/big_16821436631168.png,Upload/Content/15/07/big_85781436631168.png,Upload/Content/15/07/big_10321436631167.png', '138', '', '');
INSERT INTO `oppo_detail` VALUES ('34', 'Upload/Content/15/07/small_51291436631380.png,Upload/Content/15/07/small_55151436631378.png,Upload/Content/15/07/small_8441436631376.png,Upload/Content/15/07/small_16941436631375.png,Upload/Content/15/07/small_17541436631374.png', 'Upload/Content/15/07/url_51291436631380.png,Upload/Content/15/07/url_55151436631378.png,Upload/Content/15/07/url_8441436631376.png,Upload/Content/15/07/url_16941436631375.png,Upload/Content/15/07/url_17541436631374.png', 'Upload/Content/15/07/big_51291436631380.png,Upload/Content/15/07/big_55151436631378.png,Upload/Content/15/07/big_8441436631376.png,Upload/Content/15/07/big_16941436631375.png,Upload/Content/15/07/big_17541436631374.png', '139', '<p><span style=\"color: rgb(135, 135, 135); font-family: &#39;Myriad Pro&#39;, Arial, FZLanTingHei-R-GBK, 方正兰亭黑, &#39;Microsoft YaHei&#39;, 微软雅黑, STHeiti, 华文黑体, SimSun, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">钻石镜面，薄至6.85mm</span></p>', '<p><span style=\"color: rgb(135, 135, 135); font-family: &#39;Myriad Pro&#39;, Arial, FZLanTingHei-R-GBK, 方正兰亭黑, &#39;Microsoft YaHei&#39;, 微软雅黑, STHeiti, 华文黑体, SimSun, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">钻石镜面，薄至6.85mm</span></p>');
INSERT INTO `oppo_detail` VALUES ('35', 'Upload/Content/15/07/small_95021436632159.png,Upload/Content/15/07/small_88051436632158.png,Upload/Content/15/07/small_4781436632157.png,Upload/Content/15/07/small_36661436632156.png', 'Upload/Content/15/07/url_95021436632159.png,Upload/Content/15/07/url_88051436632158.png,Upload/Content/15/07/url_4781436632157.png,Upload/Content/15/07/url_36661436632156.png', 'Upload/Content/15/07/big_95021436632159.png,Upload/Content/15/07/big_88051436632158.png,Upload/Content/15/07/big_4781436632157.png,Upload/Content/15/07/big_36661436632156.png', '140', '<p><span style=\"color: rgb(135, 135, 135); font-family: &#39;Myriad Pro&#39;, Arial, FZLanTingHei-R-GBK, 方正兰亭黑, &#39;Microsoft YaHei&#39;, 微软雅黑, STHeiti, 华文黑体, SimSun, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">至2015年4月18日起，降至￥1299！美颜3.0， 4.7英寸</span></p>', '<p><span style=\"color: rgb(135, 135, 135); font-family: &#39;Myriad Pro&#39;, Arial, FZLanTingHei-R-GBK, 方正兰亭黑, &#39;Microsoft YaHei&#39;, 微软雅黑, STHeiti, 华文黑体, SimSun, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">至2015年4月18日起，降至￥1299！美颜3.0， 4.7英寸</span></p>');
INSERT INTO `oppo_detail` VALUES ('36', 'Upload/Content/15/07/small_49701436632410.png,Upload/Content/15/07/small_56201436632409.png,Upload/Content/15/07/small_49001436632407.png', 'Upload/Content/15/07/url_49701436632410.png,Upload/Content/15/07/url_56201436632409.png,Upload/Content/15/07/url_49001436632407.png', 'Upload/Content/15/07/big_49701436632410.png,Upload/Content/15/07/big_56201436632409.png,Upload/Content/15/07/big_49001436632407.png', '141', '<p><span style=\"color: rgb(135, 135, 135); font-family: &#39;Myriad Pro&#39;, Arial, FZLanTingHei-R-GBK, 方正兰亭黑, &#39;Microsoft YaHei&#39;, 微软雅黑, STHeiti, 华文黑体, SimSun, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">自2015年7月10日起，降至￥2499！自由自转，趣拍无限，与众不同的摄像头，与众不同的自拍体验！</span></p>', '<p><span style=\"color: rgb(135, 135, 135); font-family: &#39;Myriad Pro&#39;, Arial, FZLanTingHei-R-GBK, 方正兰亭黑, &#39;Microsoft YaHei&#39;, 微软雅黑, STHeiti, 华文黑体, SimSun, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">自2015年7月10日起，降至￥2499！自由自转，趣拍无限，与众不同的摄像头，与众不同的自拍体验！</span></p>');
INSERT INTO `oppo_detail` VALUES ('37', 'Upload/Content/15/07/small_97861436632585.png,Upload/Content/15/07/small_76651436632583.png,Upload/Content/15/07/small_14651436632581.png,Upload/Content/15/07/small_58831436632578.png,Upload/Content/15/07/small_72461436632577.png', 'Upload/Content/15/07/url_97861436632585.png,Upload/Content/15/07/url_76651436632583.png,Upload/Content/15/07/url_14651436632581.png,Upload/Content/15/07/url_58831436632578.png,Upload/Content/15/07/url_72461436632577.png', 'Upload/Content/15/07/big_97861436632585.png,Upload/Content/15/07/big_76651436632583.png,Upload/Content/15/07/big_14651436632581.png,Upload/Content/15/07/big_58831436632578.png,Upload/Content/15/07/big_72461436632577.png', '142', '<p><span style=\"color: rgb(135, 135, 135); font-family: &#39;Myriad Pro&#39;, Arial, FZLanTingHei-R-GBK, 方正兰亭黑, &#39;Microsoft YaHei&#39;, 微软雅黑, STHeiti, 华文黑体, SimSun, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">自2015年4月18日起，降至￥1499！至美外观，O-Video全新体验，高通四核</span></p>', '<p><span style=\"color: rgb(135, 135, 135); font-family: &#39;Myriad Pro&#39;, Arial, FZLanTingHei-R-GBK, 方正兰亭黑, &#39;Microsoft YaHei&#39;, 微软雅黑, STHeiti, 华文黑体, SimSun, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">自2015年4月18日起，降至￥1499！至美外观，O-Video全新体验，高通四核</span></p>');
INSERT INTO `oppo_detail` VALUES ('38', 'Upload/Content/15/07/small_28261436758872.png,Upload/Content/15/07/small_35461436758872.png', 'Upload/Content/15/07/url_28261436758872.png,Upload/Content/15/07/url_35461436758872.png', 'Upload/Content/15/07/big_28261436758872.png,Upload/Content/15/07/big_35461436758872.png', '143', '<p>内附三种尺寸耳塞，3.5mm转接线等贴心配件，美妙声音的使者，不仅专属N1，更属于你！</p>', '<p>内附三种尺寸耳塞，3.5mm转接线等贴心配件，美妙声音的使者，不仅专属N1，更属于你！</p>');
INSERT INTO `oppo_detail` VALUES ('39', 'Upload/Content/15/07/small_57381436759048.png,Upload/Content/15/07/small_20141436759047.png', 'Upload/Content/15/07/url_57381436759048.png,Upload/Content/15/07/url_20141436759047.png', 'Upload/Content/15/07/big_57381436759048.png,Upload/Content/15/07/big_20141436759047.png', '144', '<p>3.5mm美标接口，醇美音质感受（适用于N1及N1之后上市的所有机型）</p>', '<p>3.5mm美标接口，醇美音质感受（适用于N1及N1之后上市的所有机型）</p>');
INSERT INTO `oppo_detail` VALUES ('40', 'Upload/Content/15/07/small_29271436759137.png', 'Upload/Content/15/07/url_29271436759137.png', 'Upload/Content/15/07/big_29271436759137.png', '145', '<p>三频均衡，久听不累。</p>', '<p>三频均衡，久听不累。</p>');
INSERT INTO `oppo_detail` VALUES ('41', 'Upload/Content/15/07/small_4721436759393.png,Upload/Content/15/07/small_43151436759392.png,Upload/Content/15/07/small_16041436759391.png', 'Upload/Content/15/07/url_4721436759393.png,Upload/Content/15/07/url_43151436759392.png,Upload/Content/15/07/url_16041436759391.png', 'Upload/Content/15/07/big_4721436759393.png,Upload/Content/15/07/big_43151436759392.png,Upload/Content/15/07/big_16041436759391.png', '146', '<p>创新型贴合手指的耳塞体设计 强劲低音驱动的享乐感受</p>', '<p>创新型贴合手指的耳塞体设计 强劲低音驱动的享乐感受</p>');
INSERT INTO `oppo_detail` VALUES ('42', 'Upload/Content/15/07/small_86341436759518.png', 'Upload/Content/15/07/url_86341436759518.png', 'Upload/Content/15/07/big_86341436759518.png', '147', '<p>出色的低音引擎，意想不到的澎湃动力</p>', '<p>出色的低音引擎，意想不到的澎湃动力</p>');
INSERT INTO `oppo_detail` VALUES ('43', 'Upload/Content/15/07/small_50751436759651.png,Upload/Content/15/07/small_42591436759650.png', 'Upload/Content/15/07/url_50751436759651.png,Upload/Content/15/07/url_42591436759650.png', 'Upload/Content/15/07/big_50751436759651.png,Upload/Content/15/07/big_42591436759650.png', '148', '<p>动圈式换能系统，提供强劲、带有动感低音的立体声</p>', '<p>动圈式换能系统，提供强劲、带有动感低音的立体声</p>');
INSERT INTO `oppo_detail` VALUES ('44', 'Upload/Content/15/07/small_79901436759781.png,Upload/Content/15/07/small_30201436759780.png,Upload/Content/15/07/small_44111436759779.png,Upload/Content/15/07/small_32471436759778.png,Upload/Content/15/07/small_61881436759777.png', 'Upload/Content/15/07/url_79901436759781.png,Upload/Content/15/07/url_30201436759780.png,Upload/Content/15/07/url_44111436759779.png,Upload/Content/15/07/url_32471436759778.png,Upload/Content/15/07/url_61881436759777.png', 'Upload/Content/15/07/big_79901436759781.png,Upload/Content/15/07/big_30201436759780.png,Upload/Content/15/07/big_44111436759779.png,Upload/Content/15/07/big_32471436759778.png,Upload/Content/15/07/big_61881436759777.png', '149', '<p>自2014年9月4日起，降至￥98；耳机电源二合一，商务蓝牙耳机，不断电更方便</p>', '<p>自2014年9月4日起，降至￥98；耳机电源二合一，商务蓝牙耳机，不断电更方便</p>');
INSERT INTO `oppo_detail` VALUES ('45', 'Upload/Content/15/07/small_74101436759994.png,Upload/Content/15/07/small_64981436759993.png,Upload/Content/15/07/small_50871436759992.png', 'Upload/Content/15/07/url_74101436759994.png,Upload/Content/15/07/url_64981436759993.png,Upload/Content/15/07/url_50871436759992.png', 'Upload/Content/15/07/big_74101436759994.png,Upload/Content/15/07/big_64981436759993.png,Upload/Content/15/07/big_50871436759992.png', '150', '<p>超强重低音，清澈中高音，戴上它世界与你无关。</p>', '<p>超强重低音，清澈中高音，戴上它世界与你无关。</p>');
INSERT INTO `oppo_detail` VALUES ('46', 'Upload/Content/15/07/small_70621436760296.jpg,Upload/Content/15/07/small_19971436760295.jpg,Upload/Content/15/07/small_91121436760294.jpg', 'Upload/Content/15/07/url_70621436760296.jpg,Upload/Content/15/07/url_19971436760295.jpg,Upload/Content/15/07/url_91121436760294.jpg', 'Upload/Content/15/07/big_70621436760296.jpg,Upload/Content/15/07/big_19971436760295.jpg,Upload/Content/15/07/big_91121436760294.jpg', '151', '<p>自2014年8月15日起，降至￥198；国内首款全金属蓝牙耳机，精工细雕，高品质尊贵享受</p>', '<p>自2014年8月15日起，降至￥198；国内首款全金属蓝牙耳机，精工细雕，高品质尊贵享受</p>');
INSERT INTO `oppo_detail` VALUES ('47', 'Upload/Content/15/07/small_24731436771453.png,Upload/Content/15/07/small_66821436771452.png,Upload/Content/15/07/small_14171436771451.png', 'Upload/Content/15/07/url_24731436771453.png,Upload/Content/15/07/url_66821436771452.png,Upload/Content/15/07/url_14171436771451.png', 'Upload/Content/15/07/big_24731436771453.png,Upload/Content/15/07/big_66821436771452.png,Upload/Content/15/07/big_14171436771451.png', '152', '<p><span style=\"color: rgb(135, 135, 135); font-family: &#39;Myriad Pro&#39;, Arial, FZLanTingHei-R-GBK, 方正兰亭黑, &#39;Microsoft YaHei&#39;, 微软雅黑, STHeiti, 华文黑体, SimSun, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">自2015年1月6日起，降至￥148；简约设计，便于携带；7800mAh设计，续航能力更强劲</span></p>', '<p><span style=\"color: rgb(135, 135, 135); font-family: &#39;Myriad Pro&#39;, Arial, FZLanTingHei-R-GBK, 方正兰亭黑, &#39;Microsoft YaHei&#39;, 微软雅黑, STHeiti, 华文黑体, SimSun, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">自2015年1月6日起，降至￥148；简约设计，便于携带；7800mAh设计，续航能力更强劲</span></p>');
INSERT INTO `oppo_detail` VALUES ('48', 'Upload/Content/15/07/small_63331436771751.png,Upload/Content/15/07/small_92011436771750.png,Upload/Content/15/07/small_79171436771749.png', 'Upload/Content/15/07/url_63331436771751.png,Upload/Content/15/07/url_92011436771750.png,Upload/Content/15/07/url_79171436771749.png', 'Upload/Content/15/07/big_63331436771751.png,Upload/Content/15/07/big_92011436771750.png,Upload/Content/15/07/big_79171436771749.png', '153', '<p><span style=\"color: rgb(135, 135, 135); font-family: &#39;Myriad Pro&#39;, Arial, FZLanTingHei-R-GBK, 方正兰亭黑, &#39;Microsoft YaHei&#39;, 微软雅黑, STHeiti, 华文黑体, SimSun, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">自2015年1月6日起，降至￥128；超薄唯美外观，安全高效电芯</span></p>', '<p><span style=\"color: rgb(135, 135, 135); font-family: &#39;Myriad Pro&#39;, Arial, FZLanTingHei-R-GBK, 方正兰亭黑, &#39;Microsoft YaHei&#39;, 微软雅黑, STHeiti, 华文黑体, SimSun, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">自2015年1月6日起，降至￥128；超薄唯美外观，安全高效电芯</span></p>');
INSERT INTO `oppo_detail` VALUES ('49', 'Upload/Content/15/07/small_6331436771859.png,Upload/Content/15/07/small_13861436771858.png', 'Upload/Content/15/07/url_6331436771859.png,Upload/Content/15/07/url_13861436771858.png', 'Upload/Content/15/07/big_6331436771859.png,Upload/Content/15/07/big_13861436771858.png', '154', '<p>带上与世隔绝！</p>', '<p>带上与世隔绝！</p>');
INSERT INTO `oppo_detail` VALUES ('50', 'Upload/Content/15/07/small_45891436771960.png,Upload/Content/15/07/small_39461436771957.png,Upload/Content/15/07/small_97741436771956.png', 'Upload/Content/15/07/url_45891436771960.png,Upload/Content/15/07/url_39461436771957.png,Upload/Content/15/07/url_97741436771956.png', 'Upload/Content/15/07/big_45891436771960.png,Upload/Content/15/07/big_39461436771957.png,Upload/Content/15/07/big_97741436771956.png', '155', '<p><span style=\"color: rgb(135, 135, 135); font-family: &#39;Myriad Pro&#39;, Arial, FZLanTingHei-R-GBK, 方正兰亭黑, &#39;Microsoft YaHei&#39;, 微软雅黑, STHeiti, 华文黑体, SimSun, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">10倍光学变焦相机；1600w像素；通过wifi与手机互联，手机O-Lens APP控制镜头拍照。</span></p>', '<p><span style=\"color: rgb(135, 135, 135); font-family: &#39;Myriad Pro&#39;, Arial, FZLanTingHei-R-GBK, 方正兰亭黑, &#39;Microsoft YaHei&#39;, 微软雅黑, STHeiti, 华文黑体, SimSun, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">10倍光学变焦相机；1600w像素；通过wifi与手机互联，手机O-Lens APP控制镜头拍照。</span></p>');
INSERT INTO `oppo_detail` VALUES ('51', 'Upload/Content/15/07/small_48951436772081.png,Upload/Content/15/07/small_36001436772080.png,Upload/Content/15/07/small_73921436772079.png,Upload/Content/15/07/small_56651436772079.png,Upload/Content/15/07/small_41791436772078.png', 'Upload/Content/15/07/url_48951436772081.png,Upload/Content/15/07/url_36001436772080.png,Upload/Content/15/07/url_73921436772079.png,Upload/Content/15/07/url_56651436772079.png,Upload/Content/15/07/url_41791436772078.png', 'Upload/Content/15/07/big_48951436772081.png,Upload/Content/15/07/big_36001436772080.png,Upload/Content/15/07/big_73921436772079.png,Upload/Content/15/07/big_56651436772079.png,Upload/Content/15/07/big_41791436772078.png', '156', '<p><span style=\"color: rgb(135, 135, 135); font-family: &#39;Myriad Pro&#39;, Arial, FZLanTingHei-R-GBK, 方正兰亭黑, &#39;Microsoft YaHei&#39;, 微软雅黑, STHeiti, 华文黑体, SimSun, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">健康监测，智能提醒，遥控拍照，细致入微的贴身智能服务，和你一起步入未来</span></p>', '<p><span style=\"color: rgb(135, 135, 135); font-family: &#39;Myriad Pro&#39;, Arial, FZLanTingHei-R-GBK, 方正兰亭黑, &#39;Microsoft YaHei&#39;, 微软雅黑, STHeiti, 华文黑体, SimSun, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">健康监测，智能提醒，遥控拍照，细致入微的贴身智能服务，和你一起步入未来</span></p>');
INSERT INTO `oppo_detail` VALUES ('52', 'Upload/Content/15/07/small_4151436772306.png,Upload/Content/15/07/small_12691436772304.png', 'Upload/Content/15/07/url_4151436772306.png,Upload/Content/15/07/url_12691436772304.png', 'Upload/Content/15/07/big_4151436772306.png,Upload/Content/15/07/big_12691436772304.png', '157', '<p><span style=\"color: rgb(135, 135, 135); font-family: &#39;Myriad Pro&#39;, Arial, FZLanTingHei-R-GBK, 方正兰亭黑, &#39;Microsoft YaHei&#39;, 微软雅黑, STHeiti, 华文黑体, SimSun, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">自2015年2月10日起，降至￥198；追剧更轻松，第一时间无障碍享受清晰大片</span></p>', '<p><span style=\"color: rgb(135, 135, 135); font-family: &#39;Myriad Pro&#39;, Arial, FZLanTingHei-R-GBK, 方正兰亭黑, &#39;Microsoft YaHei&#39;, 微软雅黑, STHeiti, 华文黑体, SimSun, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">自2015年2月10日起，降至￥198；追剧更轻松，第一时间无障碍享受清晰大片</span></p>');
INSERT INTO `oppo_detail` VALUES ('53', 'Upload/Content/15/07/small_55261436772522.png,Upload/Content/15/07/small_46171436772521.png,Upload/Content/15/07/small_56591436772519.png', 'Upload/Content/15/07/url_55261436772522.png,Upload/Content/15/07/url_46171436772521.png,Upload/Content/15/07/url_56591436772519.png', 'Upload/Content/15/07/big_55261436772522.png,Upload/Content/15/07/big_46171436772521.png,Upload/Content/15/07/big_56591436772519.png', '158', '<p><span style=\"color: rgb(135, 135, 135); font-family: &#39;Myriad Pro&#39;, Arial, FZLanTingHei-R-GBK, 方正兰亭黑, &#39;Microsoft YaHei&#39;, 微软雅黑, STHeiti, 华文黑体, SimSun, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">AM3D 虚拟环绕音2.0和低音功能，赋予智能手机完美音效。</span></p>', '<p><span style=\"color: rgb(135, 135, 135); font-family: &#39;Myriad Pro&#39;, Arial, FZLanTingHei-R-GBK, 方正兰亭黑, &#39;Microsoft YaHei&#39;, 微软雅黑, STHeiti, 华文黑体, SimSun, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">AM3D 虚拟环绕音2.0和低音功能，赋予智能手机完美音效。</span></p>');
INSERT INTO `oppo_detail` VALUES ('54', 'Upload/Content/15/07/small_50161436837876.png', 'Upload/Content/15/07/url_50161436837876.png', 'Upload/Content/15/07/big_50161436837876.png', '159', '<p>佩戴舒适轻松，声音清晰有质感，蓝牙3.0,支持同时待机两部手机</p>', '<p>佩戴舒适轻松，声音清晰有质感，蓝牙3.0,支持同时待机两部手机</p>');
INSERT INTO `oppo_detail` VALUES ('55', 'Upload/Content/15/07/small_27151436848035.png,Upload/Content/15/07/small_66531436848034.png,Upload/Content/15/07/small_70071436848032.png,Upload/Content/15/07/small_36731436848031.png,Upload/Content/15/07/small_43071436848030.png', 'Upload/Content/15/07/url_27151436848035.png,Upload/Content/15/07/url_66531436848034.png,Upload/Content/15/07/url_70071436848032.png,Upload/Content/15/07/url_36731436848031.png,Upload/Content/15/07/url_43071436848030.png', 'Upload/Content/15/07/big_27151436848035.png,Upload/Content/15/07/big_66531436848034.png,Upload/Content/15/07/big_70071436848032.png,Upload/Content/15/07/big_36731436848031.png,Upload/Content/15/07/big_43071436848030.png', '160', '<p>自2015年7月13日起，降至￥1799! 金属至美，薄至6.3mm</p>', '<p>自2015年7月13日起，降至￥1799! 金属至美，薄至6.3mm</p>');
INSERT INTO `oppo_detail` VALUES ('56', 'Upload/Content/15/07/small_79031436858817.png,Upload/Content/15/07/small_46181436858816.png,Upload/Content/15/07/small_81891436858816.png,Upload/Content/15/07/small_53561436858815.png,Upload/Content/15/07/small_47231436858814.png', 'Upload/Content/15/07/url_79031436858817.png,Upload/Content/15/07/url_46181436858816.png,Upload/Content/15/07/url_81891436858816.png,Upload/Content/15/07/url_53561436858815.png,Upload/Content/15/07/url_47231436858814.png', 'Upload/Content/15/07/big_79031436858817.png,Upload/Content/15/07/big_46181436858816.png,Upload/Content/15/07/big_81891436858816.png,Upload/Content/15/07/big_53561436858815.png,Upload/Content/15/07/big_47231436858814.png', '161', '<p><span style=\"color: rgb(135, 135, 135); font-family: &#39;Myriad Pro&#39;, Arial, FZLanTingHei-R-GBK, 方正兰亭黑, &#39;Microsoft YaHei&#39;, 微软雅黑, STHeiti, 华文黑体, SimSun, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">自2014年9月30日起，降至￥1099！智能遥控2.0</span></p>', '<p><span style=\"color: rgb(135, 135, 135); font-family: &#39;Myriad Pro&#39;, Arial, FZLanTingHei-R-GBK, 方正兰亭黑, &#39;Microsoft YaHei&#39;, 微软雅黑, STHeiti, 华文黑体, SimSun, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">自2014年9月30日起，降至￥1099！智能遥控2.0</span></p>');

-- ----------------------------
-- Table structure for `oppo_goods`
-- ----------------------------
DROP TABLE IF EXISTS `oppo_goods`;
CREATE TABLE `oppo_goods` (
  `gid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品ID',
  `gname` varchar(45) NOT NULL DEFAULT '' COMMENT '商品名',
  `goods_sn` int(11) NOT NULL DEFAULT '0' COMMENT '商品货号',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '上架时间',
  `gclick` mediumint(9) NOT NULL DEFAULT '0' COMMENT '点击次数',
  `gnumber` mediumint(9) NOT NULL COMMENT '数量',
  `type_tid` int(11) NOT NULL,
  `category_sid` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL COMMENT '价格',
  `lest_img` char(45) NOT NULL,
  PRIMARY KEY (`gid`),
  KEY `fk_oppo_goods_oppo_type1_idx` (`type_tid`),
  KEY `fk_oppo_goods_oppo_category1_idx` (`category_sid`)
) ENGINE=MyISAM AUTO_INCREMENT=162 DEFAULT CHARSET=utf8 COMMENT='商品表';

-- ----------------------------
-- Records of oppo_goods
-- ----------------------------
INSERT INTO `oppo_goods` VALUES ('138', 'U3 大屏影音拍照4G手机 白色', '0', '1436631209', '312', '4324', '9', '20', '2599', 'Upload/Content/15/07/61971436631159.jpg');
INSERT INTO `oppo_goods` VALUES ('137', 'A31 联通版流光镜面4G手机 白色', '0', '1436631044', '3213', '123', '9', '26', '999', 'Upload/Content/15/07/84221436631029.jpg');
INSERT INTO `oppo_goods` VALUES ('132', 'R5 金属至薄移动联通双4G旗舰手机 银色', '0', '1436590521', '323', '566', '9', '20', '2999', 'Upload/Content/15/07/29251436590499.jpg');
INSERT INTO `oppo_goods` VALUES ('133', 'R5 金属至薄移动4G旗舰手机 银色', '0', '1436590615', '23', '3123', '9', '20', '2999', 'Upload/Content/15/07/28091436590591.jpg');
INSERT INTO `oppo_goods` VALUES ('134', ' OPPO Find 7白色移动4G手机正面 ', '0', '1436590771', '432', '432', '9', '26', '2499', 'Upload/Content/15/07/48791436590744.jpg');
INSERT INTO `oppo_goods` VALUES ('136', 'A31 电信版流光镜面4G手机 白色', '0', '1436630967', '23', '4534', '9', '26', '1099', 'Upload/Content/15/07/60151436630930.jpg');
INSERT INTO `oppo_goods` VALUES ('135', 'A31 移动版流光镜面4G手机 白色', '0', '1436590920', '24', '231', '9', '20', '999', 'Upload/Content/15/07/28971436590897.jpg');
INSERT INTO `oppo_goods` VALUES ('128', ' R7 全金属闪拍移动4G手机 银色', '0', '1436589898', '123', '123', '9', '20', '2499', 'Upload/Content/15/07/74491436589806.jpg');
INSERT INTO `oppo_goods` VALUES ('131', 'N3 电动旋转移动4G旗舰手机 白色', '0', '1436590366', '3123', '43', '9', '20', '3999', 'Upload/Content/15/07/75261436590342.jpg');
INSERT INTO `oppo_goods` VALUES ('130', ' N3 电动旋转移动联通双4G旗舰手机 白色', '0', '1436590266', '1231', '123', '9', '20', '3999', 'Upload/Content/15/07/79721436590237.jpg');
INSERT INTO `oppo_goods` VALUES ('129', ' R7 全金属闪拍电信4G手机 银色', '0', '1436590052', '232', '123', '9', '20', '2599', 'Upload/Content/15/07/41811436590021.jpg');
INSERT INTO `oppo_goods` VALUES ('139', 'R1C 钻石流光镜面移动4G手机 冰晶白', '0', '1436631390', '432', '123', '9', '20', '1999', 'Upload/Content/15/07/72591436631365.jpg');
INSERT INTO `oppo_goods` VALUES ('140', '3000 智能遥控2.0联通4G手机', '0', '1436632174', '42', '565', '9', '26', '1299', 'Upload/Content/15/07/92221436632146.jpg');
INSERT INTO `oppo_goods` VALUES ('141', 'N1mini 旋转趣拍移动4G手机', '0', '1436632422', '32', '54', '9', '20', '2499', 'Upload/Content/15/07/13701436632401.jpg');
INSERT INTO `oppo_goods` VALUES ('142', 'R6007 炫彩镜面移动4G手机', '0', '1436632589', '54', '76', '9', '20', '1499', 'Upload/Content/15/07/35101436632569.png');
INSERT INTO `oppo_goods` VALUES ('150', ' iLIKE 蓝牙耳机 LE903', '0', '1436760004', '43', '432', '10', '27', '289', 'Upload/Content/15/07/24211436759977.png');
INSERT INTO `oppo_goods` VALUES ('144', ' OPPO 原装高品质耳机 MH126 美标', '0', '1436759060', '43', '321', '10', '27', '68', 'Upload/Content/15/07/66491436759041.jpg');
INSERT INTO `oppo_goods` VALUES ('159', '捷波朗EASYGO+ 蓝牙耳机 ', '0', '1436837882', '65', '43', '10', '27', '245', 'Upload/Content/15/07/99351436837871.jpg');
INSERT INTO `oppo_goods` VALUES ('146', ' 森海塞尔CX215时尚入耳式耳机 蓝色', '0', '1436759411', '32', '34', '10', '27', '299', 'Upload/Content/15/07/25271436759382.jpg');
INSERT INTO `oppo_goods` VALUES ('152', 'iLIKE 7800mAh移动电源 BY701', '0', '1436771458', '32', '4234', '10', '27', '148', 'Upload/Content/15/07/72241436771445.jpg');
INSERT INTO `oppo_goods` VALUES ('148', ' 森海塞尔MX365时尚重低音耳机', '0', '1436759662', '23', '32', '10', '27', '189', 'Upload/Content/15/07/1331436759644.jpg');
INSERT INTO `oppo_goods` VALUES ('149', ' iLIKE蓝牙耳机LE505', '0', '1436759787', '432', '423', '10', '27', '98', 'Upload/Content/15/07/33001436759770.jpg');
INSERT INTO `oppo_goods` VALUES ('153', 'iLIKE 6000mAh移动电源 BY107', '0', '1436771758', '12', '423', '10', '27', '128', 'Upload/Content/15/07/61661436771743.jpg');
INSERT INTO `oppo_goods` VALUES ('154', 'iLIKE 10000mAh移 动电源 BY901', '0', '1436771871', '3', '42', '10', '27', '298', 'Upload/Content/15/07/96381436771851.jpg');
INSERT INTO `oppo_goods` VALUES ('155', 'O-lens 1镜头式相机 白色', '0', '1436771970', '32', '32', '10', '27', '999', 'Upload/Content/15/07/15151436771950.jpg');
INSERT INTO `oppo_goods` VALUES ('156', 'O-Band 智能手环', '0', '1436772096', '32', '23', '10', '27', '598', 'Upload/Content/15/07/10241436772070.jpg');
INSERT INTO `oppo_goods` VALUES ('157', 'iLIKE无线同屏影音分享器追剧宝HF107', '0', '1436772309', '21', '32', '10', '27', '198', 'Upload/Content/15/07/30911436772298.jpg');
INSERT INTO `oppo_goods` VALUES ('158', 'Jabra 军牌3蓝牙耳机', '0', '1436772524', '543', '32', '10', '27', '329', 'Upload/Content/15/07/80161436772499.jpg');
INSERT INTO `oppo_goods` VALUES ('160', 'OPPO R3 金属至薄移动4G手机', '0', '1436848039', '32', '423', '9', '20', '1799', 'Upload/Content/15/07/79041436848020.jpg');
INSERT INTO `oppo_goods` VALUES ('161', 'R830S 智能遥控联通4G手机', '0', '1436858827', '0', '0', '9', '20', '1099', 'Upload/Content/15/07/87101436858808.jpg');

-- ----------------------------
-- Table structure for `oppo_goods_attr`
-- ----------------------------
DROP TABLE IF EXISTS `oppo_goods_attr`;
CREATE TABLE `oppo_goods_attr` (
  `gtid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gtvalue` varchar(45) NOT NULL DEFAULT '' COMMENT '商品属性值',
  `goods_gid` int(10) unsigned NOT NULL,
  `attribute_attr_id` int(10) unsigned NOT NULL,
  `attr_price` decimal(10,0) NOT NULL,
  PRIMARY KEY (`gtid`),
  KEY `fk_oppo_goods_attr_oppo_goods1_idx` (`goods_gid`),
  KEY `fk_oppo_goods_attr_oppo_attribute1_idx` (`attribute_attr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=556 DEFAULT CHARSET=utf8 COMMENT='商品属性表';

-- ----------------------------
-- Records of oppo_goods_attr
-- ----------------------------
INSERT INTO `oppo_goods_attr` VALUES ('471', '黑色', '140', '27', '100');
INSERT INTO `oppo_goods_attr` VALUES ('470', '金色', '140', '27', '100');
INSERT INTO `oppo_goods_attr` VALUES ('460', '16G', '138', '25', '199');
INSERT INTO `oppo_goods_attr` VALUES ('461', '移动4G', '138', '28', '199');
INSERT INTO `oppo_goods_attr` VALUES ('462', '5.5', '139', '30', '100');
INSERT INTO `oppo_goods_attr` VALUES ('463', '白色', '139', '27', '100');
INSERT INTO `oppo_goods_attr` VALUES ('464', '16G', '139', '25', '100');
INSERT INTO `oppo_goods_attr` VALUES ('465', '电信4G', '139', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('466', '移动4G', '139', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('467', '联通4G', '139', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('468', '5.0', '140', '30', '100');
INSERT INTO `oppo_goods_attr` VALUES ('469', '白色', '140', '27', '100');
INSERT INTO `oppo_goods_attr` VALUES ('459', '黑色', '138', '27', '199');
INSERT INTO `oppo_goods_attr` VALUES ('458', '白色', '138', '27', '199');
INSERT INTO `oppo_goods_attr` VALUES ('457', '6.0', '138', '30', '199');
INSERT INTO `oppo_goods_attr` VALUES ('456', '电信4G', '137', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('455', '联通4G', '137', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('454', '移动4G', '137', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('453', '8G', '137', '25', '100');
INSERT INTO `oppo_goods_attr` VALUES ('431', '白色', '134', '27', '100');
INSERT INTO `oppo_goods_attr` VALUES ('432', '黑色', '134', '27', '100');
INSERT INTO `oppo_goods_attr` VALUES ('433', '16G', '134', '25', '100');
INSERT INTO `oppo_goods_attr` VALUES ('434', '移动4G', '134', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('435', '联通4G', '134', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('436', '联通3G', '134', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('437', '5.0', '135', '30', '100');
INSERT INTO `oppo_goods_attr` VALUES ('438', '白色', '135', '27', '100');
INSERT INTO `oppo_goods_attr` VALUES ('439', '黑色', '135', '27', '100');
INSERT INTO `oppo_goods_attr` VALUES ('440', '16G', '135', '25', '100');
INSERT INTO `oppo_goods_attr` VALUES ('441', '移动4G', '135', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('442', '联通4G', '135', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('443', '电信4G', '135', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('444', '5.0', '136', '30', '100');
INSERT INTO `oppo_goods_attr` VALUES ('445', '白色', '136', '27', '100');
INSERT INTO `oppo_goods_attr` VALUES ('446', '黑色', '136', '27', '100');
INSERT INTO `oppo_goods_attr` VALUES ('447', '8G', '136', '25', '100');
INSERT INTO `oppo_goods_attr` VALUES ('448', '电信4G', '136', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('449', '移动4G', '136', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('450', '联通4G', '136', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('451', '5.0', '137', '30', '100');
INSERT INTO `oppo_goods_attr` VALUES ('452', '白色', '137', '27', '100');
INSERT INTO `oppo_goods_attr` VALUES ('416', '32G', '131', '25', '100');
INSERT INTO `oppo_goods_attr` VALUES ('415', '白色', '131', '27', '100');
INSERT INTO `oppo_goods_attr` VALUES ('414', '5.5', '131', '30', '100');
INSERT INTO `oppo_goods_attr` VALUES ('410', '白色', '130', '27', '100');
INSERT INTO `oppo_goods_attr` VALUES ('411', '32G', '130', '25', '100');
INSERT INTO `oppo_goods_attr` VALUES ('412', '移动联通双4G', '130', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('413', '移动4G', '130', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('430', '5.0', '134', '30', '100');
INSERT INTO `oppo_goods_attr` VALUES ('429', '移动联通双4G', '133', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('428', '移动4G', '133', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('417', '移动4G', '131', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('418', '移动联通双4G', '131', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('419', '5.0', '132', '30', '100');
INSERT INTO `oppo_goods_attr` VALUES ('420', '银色', '132', '27', '100');
INSERT INTO `oppo_goods_attr` VALUES ('421', '16G', '132', '25', '100');
INSERT INTO `oppo_goods_attr` VALUES ('422', '移动4G', '132', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('423', '移动联通双4G', '132', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('424', '5.0', '133', '30', '100');
INSERT INTO `oppo_goods_attr` VALUES ('425', '银色', '133', '27', '100');
INSERT INTO `oppo_goods_attr` VALUES ('426', '金色', '133', '27', '100');
INSERT INTO `oppo_goods_attr` VALUES ('427', '16G', '133', '25', '100');
INSERT INTO `oppo_goods_attr` VALUES ('409', '5.5', '130', '30', '100');
INSERT INTO `oppo_goods_attr` VALUES ('401', '移动4G', '128', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('402', '电信4G', '128', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('403', '5.0', '129', '30', '100');
INSERT INTO `oppo_goods_attr` VALUES ('404', '银色', '129', '27', '100');
INSERT INTO `oppo_goods_attr` VALUES ('405', '16G', '129', '25', '100');
INSERT INTO `oppo_goods_attr` VALUES ('406', '32G', '129', '25', '100');
INSERT INTO `oppo_goods_attr` VALUES ('407', '移动4G', '129', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('408', '电信4G', '129', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('400', '32G', '128', '25', '100');
INSERT INTO `oppo_goods_attr` VALUES ('399', '16G', '128', '25', '100');
INSERT INTO `oppo_goods_attr` VALUES ('398', '银色', '128', '27', '100');
INSERT INTO `oppo_goods_attr` VALUES ('397', '5.0', '128', '30', '100');
INSERT INTO `oppo_goods_attr` VALUES ('472', '16G', '140', '25', '100');
INSERT INTO `oppo_goods_attr` VALUES ('473', '8G', '140', '25', '100');
INSERT INTO `oppo_goods_attr` VALUES ('474', '移动4G', '140', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('475', '联通4G', '140', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('476', '联通3G', '140', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('477', '5.5', '141', '30', '100');
INSERT INTO `oppo_goods_attr` VALUES ('478', '白色', '141', '27', '100');
INSERT INTO `oppo_goods_attr` VALUES ('479', '金色', '141', '27', '100');
INSERT INTO `oppo_goods_attr` VALUES ('480', '黑色', '141', '27', '100');
INSERT INTO `oppo_goods_attr` VALUES ('481', '16G', '141', '25', '100');
INSERT INTO `oppo_goods_attr` VALUES ('482', '移动4G', '141', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('483', '联通4G', '141', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('484', '电信4G', '141', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('485', '5.5', '142', '30', '100');
INSERT INTO `oppo_goods_attr` VALUES ('486', '白色', '142', '27', '100');
INSERT INTO `oppo_goods_attr` VALUES ('487', '黑色', '142', '27', '100');
INSERT INTO `oppo_goods_attr` VALUES ('488', '8G', '142', '25', '100');
INSERT INTO `oppo_goods_attr` VALUES ('489', '移动4G', '142', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('490', '联通4G', '142', '28', '100');
INSERT INTO `oppo_goods_attr` VALUES ('491', '蓝牙耳机', '143', '37', '15');
INSERT INTO `oppo_goods_attr` VALUES ('492', '白色', '143', '38', '15');
INSERT INTO `oppo_goods_attr` VALUES ('493', '黑色', '143', '38', '15');
INSERT INTO `oppo_goods_attr` VALUES ('494', '有线耳机', '144', '37', '12');
INSERT INTO `oppo_goods_attr` VALUES ('495', '黑色', '144', '38', '12');
INSERT INTO `oppo_goods_attr` VALUES ('496', '白色', '144', '38', '12');
INSERT INTO `oppo_goods_attr` VALUES ('497', '有线耳机', '145', '37', '34');
INSERT INTO `oppo_goods_attr` VALUES ('498', '黑色', '145', '38', '34');
INSERT INTO `oppo_goods_attr` VALUES ('499', '白色', '145', '38', '34');
INSERT INTO `oppo_goods_attr` VALUES ('500', '有线耳机', '146', '37', '12');
INSERT INTO `oppo_goods_attr` VALUES ('501', '蓝色', '146', '38', '12');
INSERT INTO `oppo_goods_attr` VALUES ('502', '红色', '146', '38', '12');
INSERT INTO `oppo_goods_attr` VALUES ('503', '有线耳机', '147', '37', '12');
INSERT INTO `oppo_goods_attr` VALUES ('504', '黑色', '147', '38', '12');
INSERT INTO `oppo_goods_attr` VALUES ('505', '白色', '147', '38', '12');
INSERT INTO `oppo_goods_attr` VALUES ('506', '有线耳机', '148', '37', '123');
INSERT INTO `oppo_goods_attr` VALUES ('507', '蓝色', '148', '38', '123');
INSERT INTO `oppo_goods_attr` VALUES ('508', '白色', '148', '38', '123');
INSERT INTO `oppo_goods_attr` VALUES ('509', '蓝牙耳机', '149', '37', '312');
INSERT INTO `oppo_goods_attr` VALUES ('510', '黑色', '149', '38', '312');
INSERT INTO `oppo_goods_attr` VALUES ('511', '白色', '149', '38', '312');
INSERT INTO `oppo_goods_attr` VALUES ('512', '蓝牙耳机', '150', '37', '12');
INSERT INTO `oppo_goods_attr` VALUES ('513', '白色', '150', '38', '12');
INSERT INTO `oppo_goods_attr` VALUES ('514', '黑色', '150', '38', '12');
INSERT INTO `oppo_goods_attr` VALUES ('515', '蓝色', '150', '38', '12');
INSERT INTO `oppo_goods_attr` VALUES ('516', '蓝牙耳机', '151', '37', '23');
INSERT INTO `oppo_goods_attr` VALUES ('517', '金色', '151', '38', '23');
INSERT INTO `oppo_goods_attr` VALUES ('518', '白色', '151', '38', '23');
INSERT INTO `oppo_goods_attr` VALUES ('519', '移动电源', '152', '37', '12');
INSERT INTO `oppo_goods_attr` VALUES ('520', '白色', '152', '38', '12');
INSERT INTO `oppo_goods_attr` VALUES ('521', '蓝色', '152', '38', '12');
INSERT INTO `oppo_goods_attr` VALUES ('522', '粉色', '152', '38', '12');
INSERT INTO `oppo_goods_attr` VALUES ('523', '移动电源', '153', '37', '42');
INSERT INTO `oppo_goods_attr` VALUES ('524', '白色', '153', '38', '42');
INSERT INTO `oppo_goods_attr` VALUES ('525', '蓝色', '153', '38', '42');
INSERT INTO `oppo_goods_attr` VALUES ('526', '粉色', '153', '38', '42');
INSERT INTO `oppo_goods_attr` VALUES ('527', '移动电源', '154', '37', '12');
INSERT INTO `oppo_goods_attr` VALUES ('528', '白色', '154', '38', '12');
INSERT INTO `oppo_goods_attr` VALUES ('529', '粉色', '154', '38', '12');
INSERT INTO `oppo_goods_attr` VALUES ('530', '智能配件', '155', '37', '12');
INSERT INTO `oppo_goods_attr` VALUES ('531', '白色', '155', '38', '12');
INSERT INTO `oppo_goods_attr` VALUES ('532', '智能配件', '156', '37', '12');
INSERT INTO `oppo_goods_attr` VALUES ('533', '黑色', '156', '38', '12');
INSERT INTO `oppo_goods_attr` VALUES ('534', '蓝色', '156', '38', '12');
INSERT INTO `oppo_goods_attr` VALUES ('535', '白色', '156', '38', '12');
INSERT INTO `oppo_goods_attr` VALUES ('536', '智能配件', '157', '37', '12');
INSERT INTO `oppo_goods_attr` VALUES ('537', '白色', '157', '38', '12');
INSERT INTO `oppo_goods_attr` VALUES ('538', '蓝牙耳机', '158', '37', '12');
INSERT INTO `oppo_goods_attr` VALUES ('539', '白色', '158', '38', '12');
INSERT INTO `oppo_goods_attr` VALUES ('540', '黑色', '158', '38', '12');
INSERT INTO `oppo_goods_attr` VALUES ('541', '蓝牙耳机', '159', '37', '12');
INSERT INTO `oppo_goods_attr` VALUES ('542', '白色', '159', '38', '12');
INSERT INTO `oppo_goods_attr` VALUES ('543', '黑色', '159', '38', '12');
INSERT INTO `oppo_goods_attr` VALUES ('544', '5.0', '160', '30', '12');
INSERT INTO `oppo_goods_attr` VALUES ('545', '白色', '160', '27', '12');
INSERT INTO `oppo_goods_attr` VALUES ('546', '银色', '160', '27', '12');
INSERT INTO `oppo_goods_attr` VALUES ('547', '16G', '160', '25', '12');
INSERT INTO `oppo_goods_attr` VALUES ('548', '8G', '160', '25', '12');
INSERT INTO `oppo_goods_attr` VALUES ('549', '移动4G', '160', '28', '12');
INSERT INTO `oppo_goods_attr` VALUES ('550', '电信4G', '160', '28', '12');
INSERT INTO `oppo_goods_attr` VALUES ('551', '5.0', '161', '30', '15');
INSERT INTO `oppo_goods_attr` VALUES ('552', '白色', '161', '27', '15');
INSERT INTO `oppo_goods_attr` VALUES ('553', '黑色', '161', '27', '15');
INSERT INTO `oppo_goods_attr` VALUES ('554', '8G', '161', '25', '15');
INSERT INTO `oppo_goods_attr` VALUES ('555', '联通4G', '161', '28', '15');

-- ----------------------------
-- Table structure for `oppo_goods_list`
-- ----------------------------
DROP TABLE IF EXISTS `oppo_goods_list`;
CREATE TABLE `oppo_goods_list` (
  `glid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `combine` varchar(45) NOT NULL DEFAULT '' COMMENT '组合属性',
  `goods_sn` varchar(10) NOT NULL DEFAULT '' COMMENT '货号',
  `gnumber` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '库存',
  `goods_gid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`glid`),
  KEY `fk_oppo_goods_list_oppo_goods1_idx` (`goods_gid`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='货品列表';

-- ----------------------------
-- Records of oppo_goods_list
-- ----------------------------
INSERT INTO `oppo_goods_list` VALUES ('13', '354,356,358', '22', '676', '120');
INSERT INTO `oppo_goods_list` VALUES ('11', '106,109,113', '21', '666', '53');
INSERT INTO `oppo_goods_list` VALUES ('12', '354,355,357', '123', '666', '120');
INSERT INTO `oppo_goods_list` VALUES ('7', '107,108,111', '123', '321', '53');
INSERT INTO `oppo_goods_list` VALUES ('15', '368,369,371', '123', '321', '122');

-- ----------------------------
-- Table structure for `oppo_li`
-- ----------------------------
DROP TABLE IF EXISTS `oppo_li`;
CREATE TABLE `oppo_li` (
  `lid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `totalPrice` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '总价',
  `status` smallint(5) NOT NULL DEFAULT '0' COMMENT '订单状态',
  `comments` varchar(125) NOT NULL DEFAULT '' COMMENT '备注',
  `adress` varchar(45) NOT NULL DEFAULT '' COMMENT '收货地址',
  `goods_sn` int(11) NOT NULL DEFAULT '0' COMMENT '订单号',
  `user_uid` int(10) unsigned NOT NULL,
  `add_time` char(11) NOT NULL DEFAULT '‘’' COMMENT '添加时间',
  `id` int(10) DEFAULT NULL COMMENT '地址ID',
  PRIMARY KEY (`lid`),
  KEY `fk_oppo_li_oppo_user1_idx` (`user_uid`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COMMENT='订单表';

-- ----------------------------
-- Records of oppo_li
-- ----------------------------
INSERT INTO `oppo_li` VALUES ('72', '3597.00', '2', '', '湖北黄冈黄冈市黄州区陶店乡', '0', '16', '1437179212', '26');

-- ----------------------------
-- Table structure for `oppo_list`
-- ----------------------------
DROP TABLE IF EXISTS `oppo_list`;
CREATE TABLE `oppo_list` (
  `list_id` int(11) NOT NULL AUTO_INCREMENT,
  `num` tinyint(5) unsigned NOT NULL DEFAULT '0' COMMENT '数量',
  `price` decimal(10,0) unsigned NOT NULL DEFAULT '0' COMMENT '价格',
  `beizhu` varchar(150) NOT NULL DEFAULT '' COMMENT '备注',
  `goods_gid` int(10) unsigned NOT NULL,
  `li_lid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`list_id`),
  KEY `fk_oppo_list_oppo_goods1_idx` (`goods_gid`),
  KEY `fk_oppo_list_oppo_li1_idx` (`li_lid`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COMMENT='订单列表';

-- ----------------------------
-- Records of oppo_list
-- ----------------------------
INSERT INTO `oppo_list` VALUES ('50', '1', '2999', '', '133', '72');
INSERT INTO `oppo_list` VALUES ('51', '2', '299', '', '146', '72');

-- ----------------------------
-- Table structure for `oppo_type`
-- ----------------------------
DROP TABLE IF EXISTS `oppo_type`;
CREATE TABLE `oppo_type` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tname` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='类型表';

-- ----------------------------
-- Records of oppo_type
-- ----------------------------
INSERT INTO `oppo_type` VALUES ('9', '手机');
INSERT INTO `oppo_type` VALUES ('10', '配件');

-- ----------------------------
-- Table structure for `oppo_user`
-- ----------------------------
DROP TABLE IF EXISTS `oppo_user`;
CREATE TABLE `oppo_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL DEFAULT '' COMMENT '前台用户名',
  `nicheng` varchar(45) NOT NULL DEFAULT '' COMMENT '昵称',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `email` varchar(45) NOT NULL DEFAULT '' COMMENT '邮箱',
  `phone` varchar(45) NOT NULL DEFAULT '' COMMENT '手机',
  `fixphone` varchar(45) NOT NULL DEFAULT '' COMMENT '电话',
  `address` varchar(45) NOT NULL DEFAULT '' COMMENT '地址',
  `sex` enum('未填写','女','男') NOT NULL DEFAULT '未填写' COMMENT '性别',
  `birthday` varchar(15) NOT NULL DEFAULT '未填写' COMMENT '生日',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='前台用户表';

-- ----------------------------
-- Records of oppo_user
-- ----------------------------
INSERT INTO `oppo_user` VALUES ('17', 'zhouzhou', '', '0ec173788c65dd08da60575219707632', '', '', '', '', '男', '1991年6月12日');
INSERT INTO `oppo_user` VALUES ('18', 'quanquan', '', '3585751fccbf7574e266bf4ac5e14485', '', '', '', '', '男', '1991年6月12日');
INSERT INTO `oppo_user` VALUES ('16', 'zhouquan', '', 'c209fb9384a0be328aff8fb407102e45', '', '', '', '', '男', '1991年6月12日');
