/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : chef

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-04-27 11:53:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `comments`
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `cook_id` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `11` (`user_id`),
  KEY `22` (`cook_id`),
  CONSTRAINT `11` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `22` FOREIGN KEY (`cook_id`) REFERENCES `cooks` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES ('2', '真的好', '2', '7', '2018-04-27 03:28:38', '2018-04-27 03:28:38');
INSERT INTO `comments` VALUES ('3', '测试评论测试评论测试评论测试评论', '2', '7', '2018-04-27 03:51:12', '2018-04-27 03:51:12');

-- ----------------------------
-- Table structure for `cooks`
-- ----------------------------
DROP TABLE IF EXISTS `cooks`;
CREATE TABLE `cooks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `url` varchar(2550) CHARACTER SET utf8 DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `desc` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cover_uri` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `1` (`user_id`),
  CONSTRAINT `1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cooks
-- ----------------------------
INSERT INTO `cooks` VALUES ('7', '2', 'http://www.360doc.com/content/16/0711/20/9008018_574787603.shtml', '肖申克的救赎', '第十件衣服的描述', 'images/da9bd6a1474ac425f35acc8cc2ca5283.jpeg', '0', '2018-04-27 02:27:40', '2018-04-27 02:27:40');
INSERT INTO `cooks` VALUES ('8', '2', 'http://www.360doc.com/content/17/0418/06/40694459_646452208.shtml', '肖申克的救赎', '第十件衣服的描述', 'images/34611b7bd3b9f9c8f70791e1b297174c.png', '0', '2018-04-27 02:28:05', '2018-04-27 02:28:05');

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
