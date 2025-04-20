/*
 Navicat Premium Data Transfer

 Source Server         : adsad
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : db_gamestop

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 20/04/2025 12:07:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for game
-- ----------------------------
DROP TABLE IF EXISTS `game`;
CREATE TABLE `game`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_game` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `genre_id` int NULL DEFAULT NULL,
  `publisher_id` int NULL DEFAULT NULL,
  `harga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tahun_rilis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `platform` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi_game` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idfk_game_1`(`genre_id` ASC) USING BTREE,
  INDEX `idfk_game_2`(`publisher_id` ASC) USING BTREE,
  CONSTRAINT `idfk_game_1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `idfk_game_2` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of game
-- ----------------------------
INSERT INTO `game` VALUES (1, 'FIFA 23', NULL, 1, '750000', '2022', 'PC', 'Game simulasi sepak bola terbaru dengan lisensi resmi FIFA yang menawarkan pengalaman bermain yang realistis dengan tim dan pemain dari seluruh dunia.');
INSERT INTO `game` VALUES (2, 'Animal Crossing: New Horizons', 4, 2, '599000', '2020', 'Nintendo Switch', 'Game simulasi kehidupan di mana pemain mengelola pulau terpencil dan mengembangkannya menjadi komunitas yang berkembang dengan berbagai aktivitas seperti memancing, berkebun, dan berinteraksi dengan penduduk hewan yang ramah.');

-- ----------------------------
-- Table structure for genre
-- ----------------------------
DROP TABLE IF EXISTS `genre`;
CREATE TABLE `genre`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_genre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of genre
-- ----------------------------
INSERT INTO `genre` VALUES (1, 'Action', 'Game yang mengandalkan kemampuan fisik pemain seperti koordinasi tangan-mata, refleks cepat, dan ketepatan waktu. Seringkali melibatkan pertarungan, tembak-menembak, atau platforming.');
INSERT INTO `genre` VALUES (2, 'Role-Playing Game (RPG)', 'Game yang berfokus pada pengembangan karakter dan cerita, di mana pemain mengambil peran tokoh dalam dunia fiksi. Fitur utamanya adalah sistem leveling, pengambilan keputusan, dan seringkali dunia yang luas untuk dijelajahi.');
INSERT INTO `genre` VALUES (3, 'Strategy', 'Game yang menekankan pada pemikiran taktis dan perencanaan untuk mencapai kemenangan. Pemain biasanya mengelola sumber daya, unit, atau wilayah dengan fokus pada pengambilan keputusan yang cermat.');
INSERT INTO `genre` VALUES (4, 'Simulation', 'Game yang mencoba mensimulasikan aspek-aspek kehidupan nyata atau aktivitas spesifik. Berfokus pada realisme dan detail, seperti simulasi penerbangan, manajemen kota, atau kehidupan virtual.');
INSERT INTO `genre` VALUES (5, 'Adventure', 'Game yang berfokus pada eksplorasi, pemecahan teka-teki, dan interaksi dengan lingkungan atau karakter lain. Biasanya memiliki alur cerita yang kuat dan melibatkan penemuan serta pengumpulan barang.');

-- ----------------------------
-- Table structure for publisher
-- ----------------------------
DROP TABLE IF EXISTS `publisher`;
CREATE TABLE `publisher`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_publisher` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tahun_berdiri` int NOT NULL,
  `negara_asal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_kontak` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of publisher
-- ----------------------------
INSERT INTO `publisher` VALUES (1, 'Electronic Arts (EA)', 1982, 'Amerika Serikat', 'ea@e.a');
INSERT INTO `publisher` VALUES (2, 'Nintendo', 1889, 'Jepang', 'not available');
INSERT INTO `publisher` VALUES (3, 'Ubisoft', 1986, 'Prancis', 'not available');

SET FOREIGN_KEY_CHECKS = 1;
