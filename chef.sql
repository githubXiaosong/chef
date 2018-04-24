/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : chef

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-04-20 16:21:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `cooks`
-- ----------------------------
DROP TABLE IF EXISTS `cooks`;
CREATE TABLE `cooks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `desc` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cover_uri` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `1` (`user_id`),
  CONSTRAINT `1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cooks
-- ----------------------------
INSERT INTO `cooks` VALUES ('1', '2', 'wadasd', 'asdasdadad', 'images/326fdf2f1c3288cec2889361c01f6146.jpeg', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `cooks` VALUES ('2', '2', 'ohohok', 'woshixiaosong', 'images/cbc6d7e8ee9c60cb6c8c8befe4990f26.jpeg', '0', '2018-04-19 03:00:13', '2018-04-19 03:00:13');
INSERT INTO `cooks` VALUES ('3', '2', '电影', 'test1111', 'images/4cd0865bdf74aef5f4859f3cdd41999d.jpeg', '0', '2018-04-19 03:01:16', '2018-04-19 03:01:16');
INSERT INTO `cooks` VALUES ('4', '2', 'Epic ', 'woshixiaosong', 'images/278ca2a5c097bd48c255ef87208bf987.jpeg', '0', '2018-04-20 04:51:29', '2018-04-20 04:51:29');
INSERT INTO `cooks` VALUES ('5', '2', '肖申克的救赎', '第二件衣服的描述', 'images/b1211d1ca617da777c29f8d76782543f.jpeg', '0', '2018-04-20 04:53:05', '2018-04-20 04:53:05');

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('2', 'xiaosong', '13081114887', '1098030258@qq.com', '0', '$2y$10$ngzQjfA5QhS1IpB/wY7d8OfuHTP8WaLBgLC9VkJL.5pzlGO1nJvZO', 'GFW2hreliLP5GsZoouAyb1I0eIvDgPbNfKPbVZb57CaYis6eTGWApo6xhQxX', '2018-04-18 03:45:09', '2018-04-20 04:52:55');
