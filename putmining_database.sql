/*
 Navicat Premium Data Transfer

 Source Server         : ThisMySQL
 Source Server Type    : MySQL
 Source Server Version : 100413
 Source Host           : localhost:3306
 Source Schema         : putmining

 Target Server Type    : MySQL
 Target Server Version : 100413
 File Encoding         : 65001

 Date: 16/07/2021 00:11:46
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for blogs
-- ----------------------------
DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `paid` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of blogs
-- ----------------------------

-- ----------------------------
-- Table structure for contents
-- ----------------------------
DROP TABLE IF EXISTS `contents`;
CREATE TABLE `contents`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('page','mail') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'page',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contents
-- ----------------------------
INSERT INTO `contents` VALUES (1, 'Active Plays', '<p>This is Active Plays page.</p>', 'page', NULL, NULL);
INSERT INTO `contents` VALUES (2, 'How To', '<p>This is How To page.</p>', 'page', NULL, NULL);
INSERT INTO `contents` VALUES (3, 'Verification Email', '<p>Hello, you need to verify Email.</p>', 'mail', NULL, NULL);
INSERT INTO `contents` VALUES (4, 'Forgotpassword Email', '<p>Hello, click this button to reset password.</p>', 'mail', NULL, NULL);
INSERT INTO `contents` VALUES (5, 'PublicBlogUpdate Email', '<p>Hello, homepage public blog is updated.</p>', 'mail', NULL, NULL);
INSERT INTO `contents` VALUES (6, 'PaidBlogUpdate Email', '<p>Hello, paid blog is updated.</p>', 'mail', NULL, NULL);
INSERT INTO `contents` VALUES (7, 'Introduction', 'What is Putmining? <br>\n            To attain economic retirement (investing for income) with dividends alone, you will need millions of dollars AND a relatively high and reliable dividend percentage annual payout. For most folks, investing to build capital is a different strategy and mindset. It also takes quite a bit of time unless you have great luck, or a wealthy loved one passes away. Put Mining is designed to increase income percentage by ~10% per year without changing your current build or dividend income strategies. For example, if your current capital goal will be attained in 10 years at 5% compounded interest per year, Put Mining is designed to help you attain it in 3.5 years at 15%. We Mine through 100,000+ stock options every week aiming for weekly plays. The size recommendations of these plays are guided by up to date statistics gathered since its Jan.30, 2018 inception. A major goal of Put Mining is to constantly improve the filters and algorithms used. Using these statistics, the Put Mining aims to teach you to better understand and more effectively mitigate your risk.', 'page', NULL, NULL);
INSERT INTO `contents` VALUES (8, 'About Putmining', '\n                -Want a Free Subscription?<br>\n                All base stocks that are mined by Put Mining are picks by the brilliant Bill Spetrino. If you are an active member of Bill\'s BIO forum, this PutMining.com service is free to you. Simply subscribe with your preferred email address. Make your way to the Profile page, then Payments. Select the BIO option and enter your BIO userID in the field provided. So long as you remain an active member of BIO, your PutMining.com subscription will be free. If you are NOT an active member of Bill\'s BIO forum, consider joining with him by contacting him directly via http://www.billspetrino.com/. Once you\'re a BIO member, come back here and PutMining.com will be free for you. We will try, but make no promise to be 100% up to date with Bill\'s stock picks. For example, an option play may expire after changes that Bill makes.\n                <br><br>\n                - Return policy <br>\n                If you are disappointed with the Put Mining service, we will only ask that we have an email or voice conversation to understand why (to help improve future service). Then, we\'ll give a prorated refund for time not used (only applicable to 1+ year subscriptions).\n                <br><br>\n                - Subscriber Etiquette <br>\n                Each subscribed email is only authorized for one person\'s access to this site\'s information. If you are sharing an email address to access this site, you are violating the subscriber agreement. If you access this site\'s subscriber section from more than the email subscriber\'s own device, the account will be locked down and no refund will be offered due to violation of the subscriber agreement.\n            ', 'page', NULL, NULL);
INSERT INTO `contents` VALUES (9, 'Disclaimer', '\n            <p>\n                We either own, have owned, or will own either stocks or options of all companies mentioned\n                here. I have also either sold or will sell them. We are not CPAs, not licensed stock brokers, not\n                licensed financial advisors, not offering to manage money. We don\'t necessarily hold all the\n                stock, option, or other plays mentioned. We may have executed stock or option buys or sales\n                mentioned on this website before they have been advertised here. We will never ask you for\n                your personal (or business) brokerage account information details by voice, email, or any other\n                digital means. We will never ask you for any money for trading stock or options. We have no\n                way of financially benefiting from anything you do in the stock markets regardless of whether\n                you choose to act on the Put Mining plays listed on this site. We are not offering to, nor will I\n                ever offer or be willing to manage your money, stocks, or options plays for you. Each stock,\n                option, trade, or investment decision you make is ultimately your decision on your own. Only\n                you can know your entire financial situation and are therefore responsible for your own choices.\n                All posted plays are picked based on the U.S. system of option trading. Please don\'t confuse\n                this with European or other foreign terms and standards for option trading. PutMining.com only\n                intends to provide general education and impersonalized information. </p>\n            <p>Past performance is not necessarily indicative of future results. The results presented on this\n                website are not typical. Actual results will vary widely given a variety of factors such as\n                experience, skill, risk mitigation practices, market dynamics and the amount of capital deployed.\n                It is easy to lose money trading, and we recommend seeking individual professional advice or\n                educating yourself as much as possible before considering any investments.</p>\n            <p>Put Mining is not an investment advisor or registered broker. Neither PutMining.com nor any of\n                its owners or employees is registered as a securities broker-dealer, broker, an investment\n                advisor, or an investment advisor representative with the U.S. Securities and Exchange\n                Commission, any state securities regulatory authority, or any self-regulatory organization.</p>\n            <p>This website is for educational and information purposes only. This site is not intended as\n                investment advice. This website, and communication from it, are for educational and\n                informational purposes only. The website and any statements made in it or from it are not, and\n                should not be construed to be, personalized investment advice directed to or appropriate for any\n                particular individual. The statements made in this communication should not be relied upon for\n                purposes of transacting in the securities of the companies profiled in this communication, nor\n                should they be construed as a recommendation to buy, sell or hold any position in any security\n                of the companies profiled in this communication. We cannot and do not assess, verify or\n                guarantee the suitability or profitability of any particular investment. Any subscriber or user of\n                our services bears responsibility for their own investment research and decisions and should\n                review all investment decisions with a licensed investment professional.</p>\n            <p>Do not base any investment decision upon any materials found on this website or\n                communication from within. We are not registered as a securities broker-dealer or an\n                investment adviser either with the U.S. Securities and Exchange Commission (the “SEC”) or\n                with any state securities regulatory authority. We are neither licensed nor qualified to provide\n                investment advice.</p>\n            <p>The information contained in our report should be viewed as commercial advertisement and is\n                not intended to be investment advice. The website is not provided to any particular individual\n                with a view toward their individual circumstances. The information contained in our website is\n                not an offer to buy or sell securities. We distribute opinions, comments and information free of\n                charge exclusively to individuals who wish to receive them.</p>\n            <p>Our website has been prepared for informational purposes only and is not intended to be used\n                as a complete source of information on any particular company. An individual should never\n                invest in the securities of any of the companies mentioned based solely on information\n                contained on our website. Individuals should assume that all information provided regarding\n                companies is not trustworthy unless verified by their own independent research.</p>\n            <p>Any individual who chooses to invest in any securities should do so with caution. Investing in\n                securities is speculative and carries a high degree of risk. You may lose some or all of the\n                money that is invested. Always research your own investments, and consult with a registered\n                investment advisor or licensed stock broker before investing.</p>\n            <p>Any individual who chooses to invest in any securities should do so with caution. Investing in\n                securities is speculative and carries a high degree of risk. You may lose some or all of the\n                money that is invested. Always research your own investments, and consult with a registered\n                investment advisor or licensed stock broker before investing.</p>\n            <p>We are committed to providing factual information on the companies that are profiled. However,\n                we do not provide any assurance as to the accuracy or completeness of the information\n                provided, including information regarding a profiled company’s plans or ability to affect any\n                planned or proposed actions. We have no first-hand knowledge of any profiled company’s\n                operations and therefore cannot comment on their capabilities, intent, resources, nor experience\n                and we make no attempt to do so. Statistical information, dollar amounts, and market size data\n                was provided by the subject company and related sources which we believe to be reliable</p>\n            <p>To the fullest extent of the law, we will not be liable to any person or entity for the quality,\n                accuracy, completeness, reliability, or timeliness of the information provided in the report, or for\n                any direct, indirect, consequential, incidental, special or punitive damages that may arise out of\n                the use of information we provide to any person or entity (including, but not limited to, lost\n                profits, loss of opportunities, trading losses, and damages that may result from any inaccuracy\n                or incompleteness of this information). Every trade you make is your own trade and you are fully\n                responsible for any gain or loss you shall incur. PutMining.com, nor any moderators are held\n                liable for any losses you shall have at any time you are with our service or after. If you do not\n                agree with this then do not sign up and leave immediately.</p>\n            <p>We encourage you to invest carefully and read investment information available at the websites\n                of the SEC at http://www.sec.gov and FINRA at http://www.finra.org.</p>\n            <p>IF YOU DO NOT AGREE WITH THE TERMS OF THIS DISCLAIMER, PLEASE EXIT THIS\n                SITE IMMEDIATELY. PLEASE BE ADVISED THAT YOUR CONTINUED USE OF THIS SITE\n                OR THE INFORMATION PROVIDED HEREIN SHALL INDICATE YOUR CONSENT AND\n                AGREEMENT TO THESE TERMS</p>\n            ', 'page', NULL, NULL);

-- ----------------------------
-- Table structure for histories
-- ----------------------------
DROP TABLE IF EXISTS `histories`;
CREATE TABLE `histories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `action_date` datetime NOT NULL DEFAULT current_timestamp,
  `action` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ip` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `location` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `last_subscriber_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `last_notify_on_home` tinyint(1) NULL DEFAULT NULL,
  `last_notify_on_paid` tinyint(1) NULL DEFAULT NULL,
  `last_email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `last_password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `last_email_verification_date` datetime NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of histories
-- ----------------------------
INSERT INTO `histories` VALUES (1, 3, '2021-03-16 12:22:48', 'login', '127.0.0.1', ' ', NULL, 1, 1, 'paid@putmining.com', '$2y$10$TnLR5z3WEMcgX0IDNYq9iO3Za5kaXPDi59xivvD5ij47VdhengxEe', NULL, '2021-03-16 03:22:48', '2021-03-16 03:22:48');
INSERT INTO `histories` VALUES (2, 3, '2021-03-16 12:25:09', 'address', '127.0.0.1', ' ', NULL, 1, 1, 'a@a', '$2y$10$TnLR5z3WEMcgX0IDNYq9iO3Za5kaXPDi59xivvD5ij47VdhengxEe', NULL, '2021-03-16 03:25:09', '2021-03-16 03:25:09');
INSERT INTO `histories` VALUES (3, 3, '2021-03-16 12:25:30', 'login', '127.0.0.1', ' ', NULL, 1, 1, 'a@a', '$2y$10$TnLR5z3WEMcgX0IDNYq9iO3Za5kaXPDi59xivvD5ij47VdhengxEe', NULL, '2021-03-16 03:25:30', '2021-03-16 03:25:30');
INSERT INTO `histories` VALUES (4, 3, '2021-03-16 12:31:20', 'address', '127.0.0.1', ' ', NULL, 1, 1, 'a@a', '$2y$10$TnLR5z3WEMcgX0IDNYq9iO3Za5kaXPDi59xivvD5ij47VdhengxEe', NULL, '2021-03-16 03:31:20', '2021-03-16 03:31:20');
INSERT INTO `histories` VALUES (5, 1, '2021-03-16 13:37:27', 'login', '127.0.0.1', ' ', NULL, 1, 1, 'admin@putmining.com', '$2y$10$ZBCWPS1zJrGjX6tKeC1vTOcDv.1AQzD2/85GN0ZCuVCaQfaCWn3V6', NULL, '2021-03-16 04:37:27', '2021-03-16 04:37:27');
INSERT INTO `histories` VALUES (6, 1, '2021-03-16 13:39:22', 'notify', '127.0.0.1', ' ', NULL, 1, 1, 'admin@putmining.com', '$2y$10$ZBCWPS1zJrGjX6tKeC1vTOcDv.1AQzD2/85GN0ZCuVCaQfaCWn3V6', NULL, '2021-03-16 04:39:22', '2021-03-16 04:39:22');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2021_02_10_203054_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2021_02_15_065653_create_blogs_table', 1);
INSERT INTO `migrations` VALUES (3, '2021_02_24_031327_create_contents_table', 1);
INSERT INTO `migrations` VALUES (4, '2021_02_24_035239_create_settings_table', 1);
INSERT INTO `migrations` VALUES (5, '2021_03_12_060023_create_plans_table', 1);
INSERT INTO `migrations` VALUES (6, '2021_03_12_075340_create_payments_table', 1);
INSERT INTO `migrations` VALUES (7, '2021_03_12_075428_create_histories_table', 1);

-- ----------------------------
-- Table structure for payments
-- ----------------------------
DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `payment_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` date NULL DEFAULT NULL,
  `start_date` date NULL DEFAULT NULL,
  `expiry_date` date NULL DEFAULT NULL,
  `amount` int NOT NULL DEFAULT 0,
  `subscriber` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `payment_method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `confirmation_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `requested_refund_date` date NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of payments
-- ----------------------------

-- ----------------------------
-- Table structure for plans
-- ----------------------------
DROP TABLE IF EXISTS `plans`;
CREATE TABLE `plans`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `subtitle` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `price` double(8, 2) NOT NULL DEFAULT 1.00,
  `duration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `plus` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type` enum('monthly','annual','lifetime') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'monthly',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of plans
-- ----------------------------
INSERT INTO `plans` VALUES (1, 'Starter', 'Stater plan', 20.00, '1 month', '+1 month', 'monthly', NULL, NULL);
INSERT INTO `plans` VALUES (2, 'Professional', 'Professional plan', 200.00, '1 year', '+1 year', 'annual', NULL, NULL);
INSERT INTO `plans` VALUES (3, 'Unlimited', 'Unlimited plan', 1000.00, 'lifetime', '+100 year', 'lifetime', NULL, NULL);

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES (1, 'Alert Administrator Email', 'vovochkaperepelkin@yandex.ru', NULL, NULL);
INSERT INTO `settings` VALUES (2, 'Verification Email Subject', 'Email Verification', NULL, NULL);
INSERT INTO `settings` VALUES (3, 'Forgotpassword Email Subject', 'Reset Password', NULL, NULL);
INSERT INTO `settings` VALUES (4, 'PublicBlogUpdate Email Subject', 'Public Blog Updated', NULL, NULL);
INSERT INTO `settings` VALUES (5, 'PaidBlogUpdate Email Subject', 'Paid Blog Updated', NULL, NULL);
INSERT INTO `settings` VALUES (6, 'Paypal Client ID', 'AeLfBdW7OC9tPaolYdA5ZN0COAnVRzSGfdza8rGR8MQLNPf9F9oPbGsb16OI4VlAhAxhqZ_S1p21Oktg', NULL, NULL);
INSERT INTO `settings` VALUES (7, 'Paypal Secret Key', 'EB_AseyTPEnZu1O1eP-rkzAu_OauW4FIYCryIBOLRaRrxc2r6CLkUCPLQywWgMOd-dO9NHcxImbh4Lcj', NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT current_timestamp,
  `email_verified` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_date` date NULL DEFAULT NULL,
  `verify_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `verify_expiry_date` datetime NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `passwordreset_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `passwordreset_expiry_date` datetime NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `notify_on_home` tinyint(1) NOT NULL DEFAULT 1,
  `notify_on_paid` tinyint(1) NOT NULL DEFAULT 1,
  `expiry_date` date NULL DEFAULT NULL,
  `blocked` tinyint(1) NOT NULL DEFAULT 0,
  `bio` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin@putmining.com', '2021-03-15 12:59:06', 1, NULL, NULL, NULL, '$2y$10$ZBCWPS1zJrGjX6tKeC1vTOcDv.1AQzD2/85GN0ZCuVCaQfaCWn3V6', NULL, NULL, 1, 1, 0, '2021-12-31', 0, NULL, NULL, '2021-03-16 04:39:22');
INSERT INTO `users` VALUES (2, 'unpaid@putmining.com', '2021-03-15 12:59:06', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, NULL, 0, NULL, NULL, NULL);
INSERT INTO `users` VALUES (3, 'temafil@inbox.ru', '2021-03-15 12:59:06', 0, NULL, 'WpYBi0EtHP', '2021-03-16 04:01:20', '$2y$10$TnLR5z3WEMcgX0IDNYq9iO3Za5kaXPDi59xivvD5ij47VdhengxEe', NULL, NULL, 0, 1, 1, '2021-12-31', 0, NULL, NULL, '2021-03-16 03:31:20');
INSERT INTO `users` VALUES (4, 'a@a.com', '2021-03-16 12:22:28', 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, NULL, 0, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
