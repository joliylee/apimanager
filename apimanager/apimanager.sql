/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : apimanager

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2014-07-02 18:08:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `t_category`
-- ----------------------------
DROP TABLE IF EXISTS `t_category`;
CREATE TABLE `t_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '分类名',
  `project_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_category
-- ----------------------------
INSERT INTO `t_category` VALUES ('1', '个人中心', '2');
INSERT INTO `t_category` VALUES ('2', '订阅', '2');

-- ----------------------------
-- Table structure for `t_interface`
-- ----------------------------
DROP TABLE IF EXISTS `t_interface`;
CREATE TABLE `t_interface` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '接口名称',
  `path_product` varchar(200) NOT NULL DEFAULT '',
  `path_develop` varchar(200) NOT NULL DEFAULT '',
  `path_faker` varchar(200) NOT NULL DEFAULT '',
  `http_type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `category_id` int(10) unsigned NOT NULL DEFAULT '0',
  `detail` text NOT NULL,
  `project_id` int(10) unsigned NOT NULL DEFAULT '0',
  `input_url` varchar(200) NOT NULL DEFAULT '' COMMENT '输入参数url',
  `input_json` text NOT NULL COMMENT '输入参数字段json',
  `success_url` varchar(200) NOT NULL DEFAULT '' COMMENT '请求成功url',
  `output_success` text NOT NULL COMMENT '请求成功返回值',
  `success_json` text NOT NULL COMMENT '请求成功返回字段json',
  `fail_url` varchar(200) NOT NULL DEFAULT '' COMMENT '请求失败url',
  `output_fail` text NOT NULL COMMENT '请求失败返回值',
  `fail_json` text NOT NULL COMMENT '请求失败返回字段json',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_interface
-- ----------------------------
INSERT INTO `t_interface` VALUES ('3', '大声道', '', '', '', '1', '2', '', '2', 'http://api2.itaiyou.cn/reader/?uid=5&pageIndex=1&source=0ba035b63eb9af5f0f8d060d1fde60e2', '[{\"name\":\"uid\",\"sample\":\"5\",\"detail\":\"\"},{\"name\":\"pageIndex\",\"sample\":\"1\",\"detail\":\"\"},{\"name\":\"source\",\"sample\":\"0ba035b63eb9af5f0f8d060d1fde60e2\",\"detail\":\"\"}]', 'http://api2.itaiyou.cn/reader/?uid=5&pageIndex=1&source=0ba035b63eb9af5f0f8d060d1fde60e2', '{\r\n    \"result\":[\r\n        {\r\n            \"rid\":\"1\",\r\n            \"type\":\"1\",\r\n            \"linkurl\":\"\",\r\n            \"title\":\"游戏新闻\",\r\n            \"ico\":\"http://img.itaiyou.cn/res/reader/2014-04/5360684c24735.png\",\r\n            \"isdel\":\"0\",\r\n            \"xxxxx\":\"1111\",\r\n            \"yyyy\":\"2222\",\r\n            \"yyyyssss\":\"2222\",\r\n            \"isvideo\":false\r\n        },\r\n        {\r\n            \"rid\":\"2\",\r\n            \"type\":\"1\",\r\n            \"linkurl\":\"\",\r\n            \"title\":\"最好玩\",\r\n            \"ico\":\"http://img.itaiyou.cn/res/reader/2014-04/536068598ee20.png\",\r\n            \"isdel\":\"0\",\r\n            \"isvideo\":false\r\n        },\r\n        {\r\n            \"rid\":\"123\",\r\n            \"type\":\"1\",\r\n            \"linkurl\":\"\",\r\n            \"title\":\"英雄联盟LOL\",\r\n            \"ico\":\"http://img.itaiyou.cn/res/reader/2014-05/536b996de2a3d.png\",\r\n            \"isdel\":\"1\",\r\n            \"isvideo\":false\r\n        },\r\n        {\r\n            \"rid\":\"10\",\r\n            \"type\":\"1\",\r\n            \"linkurl\":\"\",\r\n            \"title\":\"全民英雄\",\r\n            \"ico\":\"http://img.itaiyou.cn/res/reader/2014-02/52f8fdff32b5b.png\",\r\n            \"isdel\":\"1\",\r\n            \"isvideo\":false\r\n        },\r\n        {\r\n            \"rid\":\"131\",\r\n            \"type\":\"1\",\r\n            \"linkurl\":\"\",\r\n            \"title\":\"天天炫斗\",\r\n            \"ico\":\"http://img.itaiyou.cn/res/reader/2014-05/536dec2719c07.png\",\r\n            \"isdel\":\"1\",\r\n            \"isvideo\":false\r\n        },\r\n        {\r\n            \"rid\":\"107\",\r\n            \"type\":\"1\",\r\n            \"linkurl\":\"\",\r\n            \"title\":\"炉石传说\",\r\n            \"ico\":\"http://img.itaiyou.cn/res/reader/2014-04/5357b37d2d3e1.png\",\r\n            \"isdel\":\"1\",\r\n            \"isvideo\":false\r\n        },\r\n        {\r\n            \"rid\":\"88\",\r\n            \"type\":\"1\",\r\n            \"linkurl\":\"\",\r\n            \"title\":\"刀塔传奇\",\r\n            \"ico\":\"http://img.itaiyou.cn/res/reader/2014-04/53588257e461d.png\",\r\n            \"isdel\":\"1\",\r\n            \"isvideo\":false\r\n        },\r\n        {\r\n            \"rid\":\"126\",\r\n            \"type\":\"1\",\r\n            \"linkurl\":\"\",\r\n            \"title\":\"炉石视频\",\r\n            \"ico\":\"http://img.itaiyou.cn/res/reader/2014-04/535de6dfe8839.png\",\r\n            \"isdel\":\"1\",\r\n            \"isvideo\":true\r\n        },\r\n        {\r\n            \"rid\":\"129\",\r\n            \"type\":\"1\",\r\n            \"linkurl\":\"\",\r\n            \"title\":\"迷你西游\",\r\n            \"ico\":\"http://img.itaiyou.cn/res/reader/2014-05/5363134c05ed7.png\",\r\n            \"isdel\":\"1\",\r\n            \"isvideo\":false\r\n        },\r\n        {\r\n            \"rid\":\"132\",\r\n            \"type\":\"1\",\r\n            \"linkurl\":\"\",\r\n            \"title\":\"全民打怪兽\",\r\n            \"ico\":\"http://img.itaiyou.cn/res/reader/2014-05/5370742d2d578.png\",\r\n            \"isdel\":\"1\",\r\n            \"isvideo\":false\r\n        }\r\n    ],\r\n    \"totalCount\":\"10\",\r\n    \"errorCode\":0\r\n}\r\n', '[{\"name\":\"result\",\"sample\":\"\",\"detail\":\"\",\"type\":\"Array\"},{\"name\":\"result.rid\",\"sample\":\"1\",\"detail\":\"1111\",\"type\":\"String\"},{\"name\":\"result.type\",\"sample\":\"1\",\"detail\":\"22222\",\"type\":\"String\"},{\"name\":\"result.linkurl\",\"sample\":\"\",\"detail\":null,\"type\":\"String\"},{\"name\":\"result.title\",\"sample\":\"\\u6e38\\u620f\\u65b0\\u95fb\",\"detail\":\"44444\",\"type\":\"String\"},{\"name\":\"result.ico\",\"sample\":\"http:\\/\\/img.itaiyou.cn\\/res\\/reader\\/2014-04\\/5360684c24735.png\",\"detail\":\"5555\",\"type\":\"String\"},{\"name\":\"result.isdel\",\"sample\":\"0\",\"detail\":\"6666\",\"type\":\"String\"},{\"name\":\"result.xxxxx\",\"sample\":\"1111\",\"detail\":null,\"type\":\"String\"},{\"name\":\"result.yyyy\",\"sample\":\"2222\",\"detail\":\"32323232\",\"type\":\"String\"},{\"name\":\"result.yyyyssss\",\"sample\":\"2222\",\"detail\":null,\"type\":\"String\"},{\"name\":\"totalCount\",\"sample\":\"10\",\"detail\":\"77777\",\"type\":\"String\"},{\"name\":\"errorCode\",\"sample\":\"0\",\"detail\":\"\",\"type\":\"Number\"}]', 'http://api2.itaiyou.cn/adv/choice_slider/?source=1be90810cad88d9ffa01bff99a9df2d5&key=2', '{\r\n    \"result\":[\r\n        {\r\n            \"adid\":\"200\",\r\n            \"title\":\"美轮美奂却坚如磐石《山》正式上线\",\r\n            \"pic\":\"http://img.itaiyou.cn/uploads/201407/53b378f345295.jpg\",\r\n            \"type\":1,\r\n            \"media\":\"太玩家\",\r\n            \"pubdate\":\"2014-07-02 10:38:00\",\r\n            \"linkid\":1966,\r\n            \"linkurl\":\"\",\r\n            \"isSafari\":0\r\n        },\r\n        {\r\n            \"adid\":\"199\",\r\n            \"title\":\"ARPG游戏《天下HD》操作演示公开 流畅效果堪比“切水果”\",\r\n            \"pic\":\"http://img.itaiyou.cn/uploads/201406/53b1355090ad8.jpg\",\r\n            \"type\":1,\r\n            \"media\":\"太玩家\",\r\n            \"pubdate\":\"2014-06-30 17:50:09\",\r\n            \"linkid\":1952,\r\n            \"linkurl\":\"\",\r\n            \"isSafari\":0\r\n        },\r\n        {\r\n            \"adid\":\"198\",\r\n            \"title\":\"畅游好游戏《谁是大英雄》试玩评测\",\r\n            \"pic\":\"http://img.itaiyou.cn/uploads/201406/53b0fbd0a48ac.jpg\",\r\n            \"type\":1,\r\n            \"media\":\"太玩家\",\r\n            \"pubdate\":\"2014-06-30 11:54:05\",\r\n            \"linkid\":1942,\r\n            \"linkurl\":\"\",\r\n            \"isSafari\":0\r\n        }\r\n    ],\r\n    \"errorCode\":0\r\n}\r\n', '[{\"name\":\"result\",\"sample\":\"\",\"detail\":null,\"type\":\"Array\"},{\"name\":\"result.adid\",\"sample\":\"200\",\"detail\":null,\"type\":\"String\"},{\"name\":\"result.title\",\"sample\":\"\\u7f8e\\u8f6e\\u7f8e\\u5942\\u5374\\u575a\\u5982\\u78d0\\u77f3\\u300a\\u5c71\\u300b\\u6b63\\u5f0f\\u4e0a\\u7ebf\",\"detail\":null,\"type\":\"String\"},{\"name\":\"result.pic\",\"sample\":\"http:\\/\\/img.itaiyou.cn\\/uploads\\/201407\\/53b378f345295.jpg\",\"detail\":null,\"type\":\"String\"},{\"name\":\"result.type\",\"sample\":\"1\",\"detail\":null,\"type\":\"Number\"},{\"name\":\"result.media\",\"sample\":\"\\u592a\\u73a9\\u5bb6\",\"detail\":null,\"type\":\"String\"},{\"name\":\"result.pubdate\",\"sample\":\"2014-07-02 10:38:00\",\"detail\":null,\"type\":\"String\"},{\"name\":\"result.linkid\",\"sample\":\"1966\",\"detail\":null,\"type\":\"Number\"},{\"name\":\"result.linkurl\",\"sample\":\"\",\"detail\":null,\"type\":\"String\"},{\"name\":\"result.isSafari\",\"sample\":\"0\",\"detail\":null,\"type\":\"Number\"},{\"name\":\"errorCode\",\"sample\":\"0\",\"detail\":null,\"type\":\"Number\"}]', '1404293787', '1404295370');

-- ----------------------------
-- Table structure for `t_project`
-- ----------------------------
DROP TABLE IF EXISTS `t_project`;
CREATE TABLE `t_project` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '项目id',
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '项目名',
  `host_product` varchar(100) NOT NULL DEFAULT '' COMMENT '正式服务器地址',
  `host_develop` varchar(100) NOT NULL DEFAULT '' COMMENT '测试服务器地址',
  `host_faker` varchar(100) NOT NULL DEFAULT '' COMMENT '伪数据服务器地址',
  `detail` text NOT NULL COMMENT '项目详情',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_project
-- ----------------------------
INSERT INTO `t_project` VALUES ('2', 'demo', '', '', 'http://192.168.1.101', '22', '1404292797', '1404293774', '0');
