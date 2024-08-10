/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100427
 Source Host           : localhost:3306
 Source Schema         : adminpanel

 Target Server Type    : MySQL
 Target Server Version : 100427
 File Encoding         : 65001

 Date: 10/08/2024 16:42:15
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for register
-- ----------------------------
DROP TABLE IF EXISTS `register`;
CREATE TABLE `register`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `position` varbinary(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of register
-- ----------------------------
INSERT INTO `register` VALUES (1, 'admin', 'admin', 0x61646D696E);
INSERT INTO `register` VALUES (2, 'Kominter', 'kominter', 0x4B6F6D696E746572);
INSERT INTO `register` VALUES (3, 'Jatinter', 'jatinter', 0x4A6174696E746572);
INSERT INTO `register` VALUES (4, 'Konvinter', 'konvinter', 0x4B6F6E76696E746572);
INSERT INTO `register` VALUES (5, 'Lotas', 'lotas', 0x4C6F746173);
INSERT INTO `register` VALUES (6, 'Damkeman', 'damkeman', 0x44616D6B656D616E);
INSERT INTO `register` VALUES (7, 'Bangtas', 'bangtas', 0x42616E67746173);
INSERT INTO `register` VALUES (8, 'Renmin', 'renmin', 0x52656E6D696E);
INSERT INTO `register` VALUES (9, 'Protokol', 'protokol', 0x50726F746F6B6F6C);

-- ----------------------------
-- Table structure for upload_file
-- ----------------------------
DROP TABLE IF EXISTS `upload_file`;
CREATE TABLE `upload_file`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `files` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_input` date NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `laporan_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of upload_file
-- ----------------------------
INSERT INTO `upload_file` VALUES (1, 'coba coba', 'coba coba description', 'Screenshot 2023-03-30 012918.png', '2024-07-31', 'Kominter', 'Laporan Bulanan');
INSERT INTO `upload_file` VALUES (4, 'irfan', 'irfan ganteng', 'Screenshot 2023-07-02 222040.png', '2024-07-31', 'Kominter', NULL);
INSERT INTO `upload_file` VALUES (5, 'coba tanggal', 'tanggal', 'simanis.ico', '2024-07-31', 'Kominter', NULL);
INSERT INTO `upload_file` VALUES (6, 'judul ojan', 'descripsi coba', 'スクリーンショット 2024-07-31 170636.png', '2024-07-30', 'Kominter', NULL);
INSERT INTO `upload_file` VALUES (7, 'created', 'createdby', 'Screenshot 2023-03-30 012918.png', '2024-07-31', 'Kominter', NULL);
INSERT INTO `upload_file` VALUES (8, 'coba if', 'if coba', 'Screenshot 2023-07-02 224331.png', '2024-08-01', 'Kominter', 'Laporan Bulanan');
INSERT INTO `upload_file` VALUES (9, 'coba', 'react', 'Application Form new.docx', '2024-08-01', 'Kominter', 'Laporan Bulanan');
INSERT INTO `upload_file` VALUES (10, 'format baru', 'baru banget', 'Data Lamaran Kerja Karyawan.doc', '2024-08-02', 'Jatinter', 'Laporan Bulanan');
INSERT INTO `upload_file` VALUES (11, 'coba konvinter', 'konvinter', 'Form Technical Skills, Work Experiences, dan Project List(1).docx', '2024-08-02', 'Konvinter', 'Laporan Bulanan');
INSERT INTO `upload_file` VALUES (12, 'coba doc', 'react', 'Data Lamaran Kerja Karyawan.doc', '2024-08-06', 'Lotas', 'Laporan LKIP');
INSERT INTO `upload_file` VALUES (13, 'coba doc', 'react', 'Form Aplikasi PT. Lawencon Internasional.docx', '2024-08-06', 'Damkeman', 'Laporan LKIP');

SET FOREIGN_KEY_CHECKS = 1;
