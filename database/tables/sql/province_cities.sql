/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `province_cities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `province_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `province_cities_province_id_foreign` (`province_id`),
  CONSTRAINT `province_cities_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1156 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `province_cities` (`id`, `province_id`, `name`) VALUES
(1, 1, 'آبش احمد');
INSERT INTO `province_cities` (`id`, `province_id`, `name`) VALUES
(2, 1, 'آذرشهر');
INSERT INTO `province_cities` (`id`, `province_id`, `name`) VALUES
(3, 1, 'آقكند');
INSERT INTO `province_cities` (`id`, `province_id`, `name`) VALUES
(4, 1, 'اسكو'),
(5, 1, 'اهر'),
(6, 1, 'ايلخچي'),
(7, 1, 'باسمنج'),
(8, 1, 'بخشايش'),
(9, 1, 'بستان آباد'),
(10, 1, 'بناب'),
(11, 1, 'بناب جديد'),
(12, 1, 'تبريز'),
(13, 1, 'ترك'),
(14, 1, 'تركمانچاي'),
(15, 1, 'تسوج'),
(16, 1, 'تيكمه داش'),
(17, 1, 'تيمورلو'),
(18, 1, 'جلفا'),
(19, 1, 'خاروانا'),
(20, 1, 'خامنه'),
(21, 1, 'خداجو'),
(22, 1, 'خسرو شهر'),
(23, 1, 'خمارلو'),
(24, 1, 'خواجه'),
(25, 1, 'دوزدوزان'),
(26, 1, 'زرنق'),
(27, 1, 'زنوز'),
(28, 1, 'سراب'),
(29, 1, 'سردرود'),
(30, 1, 'سيس'),
(31, 1, 'سيه رود'),
(32, 1, 'شبستر'),
(33, 1, 'شربيان'),
(34, 1, 'شرفخانه'),
(35, 1, 'شند آباد'),
(36, 1, 'شهر جديد سهند'),
(37, 1, 'صوفيان'),
(38, 1, 'عجب شير'),
(39, 1, 'قره آغاج'),
(40, 1, 'كشكسراي'),
(41, 1, 'كلوانق'),
(42, 1, 'كليبر'),
(43, 1, 'كوزه كنان'),
(44, 1, 'گوگان'),
(45, 1, 'ليلان'),
(46, 1, 'مراغه'),
(47, 1, 'مرند'),
(48, 1, 'ملكان'),
(49, 1, 'ممقان'),
(50, 1, 'مهربان'),
(51, 1, 'ميانه'),
(52, 1, 'نظركهريزي'),
(53, 1, 'هاديشهر'),
(54, 1, 'هريس'),
(55, 1, 'هشترود'),
(56, 1, 'هوراند'),
(57, 1, 'وايقان'),
(58, 1, 'ورزقان'),
(59, 1, 'يامچي'),
(60, 2, 'آواجيق'),
(61, 2, 'اروميه'),
(62, 2, 'اشنويه'),
(63, 2, 'ايواوغلي'),
(64, 2, 'باروق'),
(65, 2, 'بازرگان'),
(66, 2, 'بوكان'),
(67, 2, 'پلدشت'),
(68, 2, 'پيرانشهر'),
(69, 2, 'تازه شهر'),
(70, 2, 'تكاب'),
(71, 2, 'چهار برج'),
(72, 2, 'خليفان'),
(73, 2, 'خوي'),
(74, 2, 'ديزج ديز'),
(75, 2, 'ربط'),
(76, 2, 'زرآباد'),
(77, 2, 'سردشت'),
(78, 2, 'سرو'),
(79, 2, 'سلماس'),
(80, 2, 'سيلوانه'),
(81, 2, 'سيمينه'),
(82, 2, 'سيه چشمه'),
(83, 2, 'شاهين دژ'),
(84, 2, 'شوط'),
(85, 2, 'فيرورق'),
(86, 2, 'قره ضياء الدين'),
(87, 2, 'قطور'),
(88, 2, 'قوشچي'),
(89, 2, 'كشاورز'),
(90, 2, 'گردكشانه'),
(91, 2, 'ماكو'),
(92, 2, 'محمد يار'),
(93, 2, 'محمود آباد'),
(94, 2, 'مرگنلر'),
(95, 2, 'مهاباد'),
(96, 2, 'مياندوآب'),
(97, 2, 'ميرآباد'),
(98, 2, 'نازك عليا'),
(99, 2, 'نالوس'),
(100, 2, 'نقده'),
(101, 2, 'نوشين'),
(102, 3, 'آبي بيگلو'),
(103, 3, 'اردبيل'),
(104, 3, 'اصلاندوز'),
(105, 3, 'بيله سوار'),
(106, 3, 'پارس آباد'),
(107, 3, 'تازه كند'),
(108, 3, 'تازه كند انگوت'),
(109, 3, 'جعفر آباد'),
(110, 3, 'خلخال'),
(111, 3, 'رضي'),
(112, 3, 'سرعين'),
(113, 3, 'عنبران'),
(114, 3, 'فخرآباد'),
(115, 3, 'كلور'),
(116, 3, 'كورائيم'),
(117, 3, 'گرمي'),
(118, 3, 'گيوي'),
(119, 3, 'لاهرود'),
(120, 3, 'مرادلو'),
(121, 3, 'مشگين شهر'),
(122, 3, 'نمين'),
(123, 3, 'نير'),
(124, 3, 'هشتجين'),
(125, 3, 'هير'),
(126, 4, 'آران و بيدگل'),
(127, 4, 'ابريشم'),
(128, 4, 'ابوزيد آباد'),
(129, 4, 'اردستان'),
(130, 4, 'اژيه'),
(131, 4, 'اصفهان'),
(132, 4, 'افوس'),
(133, 4, 'انارك'),
(134, 4, 'ايمانشهر'),
(135, 4, 'بادرود'),
(136, 4, 'باغ بهادران'),
(137, 4, 'بافران'),
(138, 4, 'برزك'),
(139, 4, 'برف انبار'),
(140, 4, 'بهاران شهر'),
(141, 4, 'بهارستان'),
(142, 4, 'بوئين و مياندشت'),
(143, 4, 'پير بكران'),
(144, 4, 'تودشك'),
(145, 4, 'تيران'),
(146, 4, 'جندق'),
(147, 4, 'جوزدان'),
(148, 4, 'جوشقان و كامو'),
(149, 4, 'چادگان'),
(150, 4, 'چرمهين'),
(151, 4, 'چمگردان'),
(152, 4, 'حبيب آباد'),
(153, 4, 'حسن آباد'),
(154, 4, 'حنا'),
(155, 4, 'خالد آباد'),
(156, 4, 'خميني شهر'),
(157, 4, 'خوانسار'),
(158, 4, 'خور'),
(159, 4, 'خوراسگان'),
(160, 4, 'خورزوق'),
(161, 4, 'داران'),
(162, 4, 'دامنه'),
(163, 4, 'درچه پياز'),
(164, 4, 'دستگرد'),
(165, 4, 'دهاقان'),
(166, 4, 'دهق'),
(167, 4, 'دولت آباد'),
(168, 4, 'ديزيچه'),
(169, 4, 'رزوه'),
(170, 4, 'رضوانشهر'),
(171, 4, 'زاينده رود'),
(172, 4, 'زرين شهر'),
(173, 4, 'زواره'),
(174, 4, 'زيباشهر'),
(175, 4, 'سده لنجان'),
(176, 4, 'سفيد شهر'),
(177, 4, 'سگزي'),
(178, 4, 'سميرم'),
(179, 4, 'شاپورآباد'),
(180, 4, 'شاهين شهر'),
(181, 4, 'شهرضا'),
(182, 4, 'طالخونچه'),
(183, 4, 'عسگران'),
(184, 4, 'علويچه'),
(185, 4, 'فرخي'),
(186, 4, 'فريدونشهر'),
(187, 4, 'فلاورجان'),
(188, 4, 'فولاد شهر'),
(189, 4, 'قمصر'),
(190, 4, 'قهجاورستان'),
(191, 4, 'قهدريجان'),
(192, 4, 'كاشان'),
(193, 4, 'كركوند'),
(194, 4, 'كليشاد و سودرجان'),
(195, 4, 'كمشجه'),
(196, 4, 'كمه'),
(197, 4, 'كهريزسنگ'),
(198, 4, 'كوشك'),
(199, 4, 'كوهپايه'),
(200, 4, 'گرگاب'),
(201, 4, 'گز برخوار'),
(202, 4, 'گلپايگان'),
(203, 4, 'گلدشت'),
(204, 4, 'گلشن'),
(205, 4, 'گلشهر'),
(206, 4, 'گوگد'),
(207, 4, 'لاي بيد'),
(208, 4, 'مباركه'),
(209, 4, 'محمد آباد'),
(210, 4, 'مشكات'),
(211, 4, 'منظريه'),
(212, 4, 'مهاباد'),
(213, 4, 'ميمه'),
(214, 4, 'نائين'),
(215, 4, 'نجف آباد'),
(216, 4, 'نصرآباد'),
(217, 4, 'نطنز'),
(218, 4, 'نوش آباد'),
(219, 4, 'نياسر'),
(220, 4, 'نيك آباد'),
(221, 4, 'هرند'),
(222, 4, 'ورزنه'),
(223, 4, 'ورنامخواست'),
(224, 4, 'وزوان'),
(225, 4, 'ونك'),
(226, 5, 'آسارا'),
(227, 5, 'اشتهارد'),
(228, 5, 'تنكمان'),
(229, 5, 'چهارباغ'),
(230, 5, 'ساوجبلاغ'),
(231, 5, 'شهر جديد هشتگرد'),
(232, 5, 'طالقان'),
(233, 5, 'فرديس'),
(234, 5, 'كرج'),
(235, 5, 'كمال شهر'),
(236, 5, 'كوهسار'),
(237, 5, 'گرمدره'),
(238, 5, 'گلسار'),
(239, 5, 'ماهدشت'),
(240, 5, 'محمدشهر'),
(241, 5, 'مشكين دشت'),
(242, 5, 'نظر آباد'),
(243, 5, 'هشتگرد'),
(244, 6, 'آبدانان'),
(245, 6, 'آسمان آباد'),
(246, 6, 'اركواز'),
(247, 6, 'ايلام'),
(248, 6, 'ايوان'),
(249, 6, 'بدره'),
(250, 6, 'پهله'),
(251, 6, 'توحيد'),
(252, 6, 'چوار'),
(253, 6, 'دره شهر'),
(254, 6, 'دلگشا'),
(255, 6, 'دهلران'),
(256, 6, 'زرنه'),
(257, 6, 'سراب باغ'),
(258, 6, 'سرابله'),
(259, 6, 'صالح آباد'),
(260, 6, 'لومار'),
(261, 6, 'مهر'),
(262, 6, 'مهران'),
(263, 6, 'مورموري'),
(264, 6, 'موسيان'),
(265, 6, 'ميمه'),
(266, 7, 'آبپخش'),
(267, 7, 'آبدان'),
(268, 7, 'امام حسن'),
(269, 7, 'انارستان'),
(270, 7, 'اهرم'),
(271, 7, 'برازجان'),
(272, 7, 'بردخون'),
(273, 7, 'بردستان'),
(274, 7, 'بندر دير'),
(275, 7, 'بندر ديلم'),
(276, 7, 'بندر ريگ'),
(277, 7, 'بندر كنگان'),
(278, 7, 'بندر گناوه'),
(279, 7, 'بنك'),
(280, 7, 'بوشهر'),
(281, 7, 'تنگ ارم'),
(282, 7, 'جم'),
(283, 7, 'چغادك'),
(284, 7, 'خارك'),
(285, 7, 'خورموج'),
(286, 7, 'دالكي'),
(287, 7, 'دلوار'),
(288, 7, 'ريز'),
(289, 7, 'سعد آباد'),
(290, 7, 'سيراف'),
(291, 7, 'شبانكاره'),
(292, 7, 'شنبه'),
(293, 7, 'عسلويه'),
(294, 7, 'كاكي'),
(295, 7, 'كلمه'),
(296, 7, 'نخل تقي'),
(297, 7, 'وحدتيه'),
(298, 8, 'آبسرد'),
(299, 8, 'آبعلي'),
(300, 8, 'ارجمند'),
(301, 8, 'اسلامشهر'),
(302, 8, 'انديشه'),
(303, 8, 'باغستان'),
(304, 8, 'باقرشهر'),
(305, 8, 'بومهن'),
(306, 8, 'پاكدشت'),
(307, 8, 'پرديس'),
(308, 8, 'پيشوا'),
(309, 8, 'تجريش'),
(310, 8, 'تهران'),
(311, 8, 'جواد آباد'),
(312, 8, 'چهاردانگه'),
(313, 8, 'حسن آباد'),
(314, 8, 'دماوند'),
(315, 8, 'رباط كريم'),
(316, 8, 'رودهن'),
(317, 8, 'ري'),
(318, 8, 'شاهدشهر'),
(319, 8, 'شريف آباد'),
(320, 8, 'شهريار'),
(321, 8, 'صالح آباد'),
(322, 8, 'صبا شهر'),
(323, 8, 'صفادشت'),
(324, 8, 'فردوسيه'),
(325, 8, 'فرون آباد'),
(326, 8, 'فشم'),
(327, 8, 'فيروزكوه'),
(328, 8, 'قدس'),
(329, 8, 'قرچك'),
(330, 8, 'كهريزك'),
(331, 8, 'كيلان'),
(332, 8, 'گلستان'),
(333, 8, 'لواسان'),
(334, 8, 'ملارد'),
(335, 8, 'نسيم شهر'),
(336, 8, 'نصيرآباد'),
(337, 8, 'وحيديه'),
(338, 8, 'ورامين'),
(339, 9, 'آلوني'),
(340, 9, 'اردل'),
(341, 9, 'باباحيدر'),
(342, 9, 'بروجن'),
(343, 9, 'بلداجي'),
(344, 9, 'بن'),
(345, 9, 'پردنجان'),
(346, 9, 'جونقان'),
(347, 9, 'چلگرد'),
(348, 9, 'دستناء');
INSERT INTO `province_cities` (`id`, `province_id`, `name`) VALUES
(349, 9, 'سامان'),
(350, 9, 'سفيد دشت'),
(351, 9, 'سودجان'),
(352, 9, 'سورشجان'),
(353, 9, 'شلمزار'),
(354, 9, 'شهركرد'),
(355, 9, 'طاقانك'),
(356, 9, 'فارسان'),
(357, 9, 'فرادنبه'),
(358, 9, 'فرخ شهر'),
(359, 9, 'كيان'),
(360, 9, 'گندمان'),
(361, 9, 'گهرو'),
(362, 9, 'لردگان'),
(363, 9, 'مال خليفه'),
(364, 9, 'منج'),
(365, 9, 'ناغان'),
(366, 9, 'نافچ'),
(367, 9, 'نقنه'),
(368, 9, 'هفشجان'),
(369, 9, 'وردنجان'),
(370, 10, 'آرين شهر'),
(371, 10, 'آيسك'),
(372, 10, 'ارسك'),
(373, 10, 'اسديه'),
(374, 10, 'اسفدن'),
(375, 10, 'اسلاميه'),
(376, 10, 'بشرويه'),
(377, 10, 'بيرجند'),
(378, 10, 'حاجي آباد'),
(379, 10, 'خضري دشت بياض'),
(380, 10, 'خوسف'),
(381, 10, 'زهان'),
(382, 10, 'سرايان'),
(383, 10, 'سربيشه'),
(384, 10, 'سه قلعه'),
(385, 10, 'شوسف'),
(386, 10, 'طبس مسينا'),
(387, 10, 'فردوس'),
(388, 10, 'قائن'),
(389, 10, 'قهستان'),
(390, 10, 'گزيك'),
(391, 10, 'محمدشهر'),
(392, 10, 'مود'),
(393, 10, 'نهبندان'),
(394, 10, 'نيمبلوك'),
(395, 11, 'احمدآباد صولت'),
(396, 11, 'انابد'),
(397, 11, 'باجگيران'),
(398, 11, 'باخرز'),
(399, 11, 'بار'),
(400, 11, 'بايك'),
(401, 11, 'بجستان'),
(402, 11, 'بردسكن'),
(403, 11, 'بيدخت'),
(404, 11, 'تايباد'),
(405, 11, 'تربت جام'),
(406, 11, 'تربت حيدريه'),
(407, 11, 'جغتاي'),
(408, 11, 'جنگل'),
(409, 11, 'چاپشلو'),
(410, 11, 'چكنه'),
(411, 11, 'چناران'),
(412, 11, 'خرو'),
(413, 11, 'خليل آباد'),
(414, 11, 'خواف'),
(415, 11, 'داورزن'),
(416, 11, 'درگز'),
(417, 11, 'درود'),
(418, 11, 'دولت آباد'),
(419, 11, 'رباط سنگ'),
(420, 11, 'رشتخوار'),
(421, 11, 'رضويه'),
(422, 11, 'روداب'),
(423, 11, 'ريوش'),
(424, 11, 'سبزوار'),
(425, 11, 'سرخس'),
(426, 11, 'سفيد سنگ'),
(427, 11, 'سلامي'),
(428, 11, 'سلطان آباد'),
(429, 11, 'سنگان'),
(430, 11, 'شادمهر'),
(431, 11, 'شانديز'),
(432, 11, 'ششتمد'),
(433, 11, 'شهر زو'),
(434, 11, 'شهرآباد'),
(435, 11, 'صالح آباد'),
(436, 11, 'طرقبه'),
(437, 11, 'عشق آباد'),
(438, 11, 'فرهاد گرد'),
(439, 11, 'فريمان'),
(440, 11, 'فيروزه'),
(441, 11, 'فيض آباد'),
(442, 11, 'قاسم آباد'),
(443, 11, 'قدمگاه'),
(444, 11, 'قلندر آباد'),
(445, 11, 'قوچان'),
(446, 11, 'كاخك'),
(447, 11, 'كاريز'),
(448, 11, 'كاشمر'),
(449, 11, 'كدكن'),
(450, 11, 'كلات'),
(451, 11, 'كندر'),
(452, 11, 'گلمكان'),
(453, 11, 'گناباد'),
(454, 11, 'لطف آباد'),
(455, 11, 'مزدآوند'),
(456, 11, 'مشهد'),
(457, 11, 'مشهدريزه'),
(458, 11, 'ملك آباد'),
(459, 11, 'نشتيفان'),
(460, 11, 'نصرآباد'),
(461, 11, 'نقاب'),
(462, 11, 'نوخندان'),
(463, 11, 'نيشابور'),
(464, 11, 'نيل شهر'),
(465, 11, 'همت آباد'),
(466, 11, 'يونسي'),
(467, 12, 'آشخانه'),
(468, 12, 'اسفراين'),
(469, 12, 'ايور'),
(470, 12, 'بجنورد'),
(471, 12, 'پيش قلعه'),
(472, 12, 'تيتكانلو'),
(473, 12, 'جاجرم'),
(474, 12, 'حصارگرمخان'),
(475, 12, 'درق'),
(476, 12, 'راز'),
(477, 12, 'سنخواست'),
(478, 12, 'شوقان'),
(479, 12, 'شيروان'),
(480, 12, 'صفي آباد'),
(481, 12, 'فاروج'),
(482, 12, 'قاضي'),
(483, 12, 'گرمه'),
(484, 12, 'لوجلي'),
(485, 13, 'آبادان'),
(486, 13, 'آغاجاري'),
(487, 13, 'اروند كنار'),
(488, 13, 'الوان'),
(489, 13, 'اميديه'),
(490, 13, 'انديمشك'),
(491, 13, 'اهواز'),
(492, 13, 'ايذه'),
(493, 13, 'باغ ملك'),
(494, 13, 'بستان'),
(495, 13, 'بندر امام خميني'),
(496, 13, 'بندر ماهشهر'),
(497, 13, 'بهبهان'),
(498, 13, 'تركالكي'),
(499, 13, 'جايزان'),
(500, 13, 'جنت مكان'),
(501, 13, 'چغاميش'),
(502, 13, 'چمران'),
(503, 13, 'چوئبده'),
(504, 13, 'حر'),
(505, 13, 'حسينيه'),
(506, 13, 'حمزه'),
(507, 13, 'حميديه'),
(508, 13, 'خرمشهر'),
(509, 13, 'دارخوين'),
(510, 13, 'دزآب'),
(511, 13, 'دزفول'),
(512, 13, 'دهدز'),
(513, 13, 'رامشير'),
(514, 13, 'رامهرمز'),
(515, 13, 'رفيع'),
(516, 13, 'زهره'),
(517, 13, 'سالند'),
(518, 13, 'سردشت'),
(519, 13, 'سماله'),
(520, 13, 'سوسنگرد'),
(521, 13, 'شادگان'),
(522, 13, 'شاوور'),
(523, 13, 'شرافت'),
(524, 13, 'شمس آباد'),
(525, 13, 'شوش'),
(526, 13, 'شوشتر'),
(527, 13, 'شيبان'),
(528, 13, 'صالح شهر'),
(529, 13, 'صفي آباد'),
(530, 13, 'صيدون'),
(531, 13, 'فتح المبين'),
(532, 13, 'قلعه تل'),
(533, 13, 'قلعه خواجه'),
(534, 13, 'گتوند'),
(535, 13, 'گوريه'),
(536, 13, 'لالي'),
(537, 13, 'مسجد سليمان'),
(538, 13, 'مشراگه'),
(539, 13, 'مقاومت'),
(540, 13, 'ملاثاني'),
(541, 13, 'ميانرود'),
(542, 13, 'ميداود'),
(543, 13, 'مينوشهر'),
(544, 13, 'هفتگل'),
(545, 13, 'هنديجان'),
(546, 13, 'هويزه'),
(547, 13, 'ويس'),
(548, 14, 'آب بر'),
(549, 14, 'ابهر'),
(550, 14, 'ارمخانخانه'),
(551, 14, 'چورزق'),
(552, 14, 'حلب'),
(553, 14, 'خرمدره'),
(554, 14, 'دندي'),
(555, 14, 'زرين آباد'),
(556, 14, 'زرين رود'),
(557, 14, 'زنجان'),
(558, 14, 'سجاس'),
(559, 14, 'سلطانيه'),
(560, 14, 'سهرورد'),
(561, 14, 'صائين قلعه'),
(562, 14, 'قيدار'),
(563, 14, 'گرماب'),
(564, 14, 'ماه نشان'),
(565, 14, 'نيك پي'),
(566, 14, 'هيدج'),
(567, 15, 'آرادان'),
(568, 15, 'اميريه'),
(569, 15, 'ايوانكي'),
(570, 15, 'بسطام'),
(571, 15, 'بيارجمند'),
(572, 15, 'دامغان'),
(573, 15, 'درجزين'),
(574, 15, 'ديباج'),
(575, 15, 'سرخه'),
(576, 15, 'سمنان'),
(577, 15, 'شاهرود'),
(578, 15, 'شهميرزاد'),
(579, 15, 'كلاته'),
(580, 15, 'كلاته خيج'),
(581, 15, 'گرمسار'),
(582, 15, 'مجن'),
(583, 15, 'مهدي شهر'),
(584, 15, 'ميامي'),
(585, 16, 'اديمي'),
(586, 16, 'اسپكه'),
(587, 16, 'ايرانشهر'),
(588, 16, 'بزمان'),
(589, 16, 'بمپور'),
(590, 16, 'بنت'),
(591, 16, 'بنجار'),
(592, 16, 'پيشين'),
(593, 16, 'جالق'),
(594, 16, 'چاه بهار'),
(595, 16, 'خاش'),
(596, 16, 'دوست محمد'),
(597, 16, 'راسك'),
(598, 16, 'زابل'),
(599, 16, 'زابلي'),
(600, 16, 'زاهدان'),
(601, 16, 'زرآباد'),
(602, 16, 'زهك'),
(603, 16, 'سراوان'),
(604, 16, 'سرباز'),
(605, 16, 'سوران'),
(606, 16, 'سيركان'),
(607, 16, 'علي اكبر'),
(608, 16, 'فنوج'),
(609, 16, 'قصر قند'),
(610, 16, 'كنارك'),
(611, 16, 'گشت'),
(612, 16, 'گلمورتي'),
(613, 16, 'محمد آباد'),
(614, 16, 'محمدان'),
(615, 16, 'محمدي'),
(616, 16, 'ميرجاوه'),
(617, 16, 'نصرت آباد'),
(618, 16, 'نگور'),
(619, 16, 'نوك آباد'),
(620, 16, 'نيك شهر'),
(621, 16, 'هيدوچ'),
(622, 17, 'آباده'),
(623, 17, 'آباده طشك'),
(624, 17, 'اردكان'),
(625, 17, 'ارسنجان'),
(626, 17, 'استهبان'),
(627, 17, 'اسير'),
(628, 17, 'اشكنان'),
(629, 17, 'افزر'),
(630, 17, 'اقليد'),
(631, 17, 'امام شهر'),
(632, 17, 'اهل'),
(633, 17, 'اوز'),
(634, 17, 'ايج'),
(635, 17, 'ايزد خواست'),
(636, 17, 'باب انار'),
(637, 17, 'بالاده'),
(638, 17, 'بنارويه'),
(639, 17, 'بهمن'),
(640, 17, 'بوانات'),
(641, 17, 'بيرم'),
(642, 17, 'بيضا'),
(643, 17, 'جنت شهر'),
(644, 17, 'جهرم'),
(645, 17, 'جويم'),
(646, 17, 'حاجي آباد'),
(647, 17, 'حسامي'),
(648, 17, 'حسن آباد'),
(649, 17, 'خانه زنيان'),
(650, 17, 'خاوران'),
(651, 17, 'خرامه'),
(652, 17, 'خشت'),
(653, 17, 'خنج'),
(654, 17, 'خور'),
(655, 17, 'خومه زار'),
(656, 17, 'داراب'),
(657, 17, 'داريان'),
(658, 17, 'دبيران'),
(659, 17, 'دژكرد'),
(660, 17, 'دهرم'),
(661, 17, 'دوبرجي'),
(662, 17, 'دوزه'),
(663, 17, 'رامجرد'),
(664, 17, 'رونيز'),
(665, 17, 'زاهد شهر'),
(666, 17, 'زرقان'),
(667, 17, 'سده'),
(668, 17, 'سروستان'),
(669, 17, 'سعادت شهر'),
(670, 17, 'سورمق'),
(671, 17, 'سيدان'),
(672, 17, 'ششده'),
(673, 17, 'شهر پير'),
(674, 17, 'شهر جديد صدرا'),
(675, 17, 'شيراز'),
(676, 17, 'صغاد'),
(677, 17, 'صفا شهر'),
(678, 17, 'علامرودشت'),
(679, 17, 'عماد ده'),
(680, 17, 'فدامي'),
(681, 17, 'فراشبند'),
(682, 17, 'فسا'),
(683, 17, 'فيروزآباد'),
(684, 17, 'قائميه'),
(685, 17, 'قادرآباد'),
(686, 17, 'قره بلاغ'),
(687, 17, 'قطب آباد'),
(688, 17, 'قطرويه'),
(689, 17, 'قير'),
(690, 17, 'كارزين'),
(691, 17, 'كازرون'),
(692, 17, 'كامفيروز'),
(693, 17, 'كره اي'),
(694, 17, 'كنار تخته'),
(695, 17, 'كوار'),
(696, 17, 'كوهنجان'),
(697, 17, 'گراش'),
(698, 17, 'گله دار'),
(699, 17, 'لار'),
(700, 17, 'لامرد'),
(701, 17, 'لپوئي'),
(702, 17, 'لطيفي'),
(703, 17, 'مبارك آباد'),
(704, 17, 'مرودشت'),
(705, 17, 'مشكان'),
(706, 17, 'مصيري'),
(707, 17, 'مهر'),
(708, 17, 'ميمند'),
(709, 17, 'نوبندگان'),
(710, 17, 'نوجين'),
(711, 17, 'نودان'),
(712, 17, 'نورآباد'),
(713, 17, 'ني ريز'),
(714, 17, 'هماشهر'),
(715, 17, 'وراوي'),
(716, 18, 'آبگرم'),
(717, 18, 'آبيك'),
(718, 18, 'آوج'),
(719, 18, 'ارداق'),
(720, 18, 'اسفرورين'),
(721, 18, 'اقباليه'),
(722, 18, 'الوند'),
(723, 18, 'بوئين زهرا'),
(724, 18, 'بيدستان'),
(725, 18, 'تاكستان'),
(726, 18, 'خاكعلي'),
(727, 18, 'خرمدشت'),
(728, 18, 'دانسفهان'),
(729, 18, 'رازميان'),
(730, 18, 'سگز آباد'),
(731, 18, 'سيردان'),
(732, 18, 'شال'),
(733, 18, 'شريفيه'),
(734, 18, 'ضياء آباد'),
(735, 18, 'قزوين'),
(736, 18, 'كوهين'),
(737, 18, 'محمديه'),
(738, 18, 'محمود آباد نمونه'),
(739, 18, 'معلم كلايه'),
(740, 18, 'نرجه'),
(741, 19, 'جعفريه'),
(742, 19, 'دستجرد'),
(743, 19, 'سلفچگان'),
(744, 19, 'قم'),
(745, 19, 'قنوات'),
(746, 19, 'كهك'),
(747, 20, 'آرمرده'),
(748, 20, 'اورامان تخت'),
(749, 20, 'بابارشاني'),
(750, 20, 'بانه'),
(751, 20, 'برده رشه'),
(752, 20, 'بلبان آباد'),
(753, 20, 'بوئين سفلي'),
(754, 20, 'بيجار'),
(755, 20, 'چناره'),
(756, 20, 'دزج'),
(757, 20, 'دلبران'),
(758, 20, 'دهگلان'),
(759, 20, 'ديواندره'),
(760, 20, 'زرينه'),
(761, 20, 'سرو آباد'),
(762, 20, 'سريش آباد'),
(763, 20, 'سقز'),
(764, 20, 'سنندج'),
(765, 20, 'شويشه'),
(766, 20, 'صاحب'),
(767, 20, 'قروه'),
(768, 20, 'كامياران'),
(769, 20, 'كاني دينار'),
(770, 20, 'كاني سور'),
(771, 20, 'مريوان'),
(772, 20, 'موچش'),
(773, 20, 'ياسوكند'),
(774, 21, 'اختيار آباد'),
(775, 21, 'ارزوئيه'),
(776, 21, 'امين شهر'),
(777, 21, 'انار'),
(778, 21, 'اندوهجرد'),
(779, 21, 'باغين'),
(780, 21, 'بافت'),
(781, 21, 'بردسير'),
(782, 21, 'بروات'),
(783, 21, 'بزنجان'),
(784, 21, 'بم'),
(785, 21, 'بهرمان'),
(786, 21, 'پاريز'),
(787, 21, 'جبالبارز'),
(788, 21, 'جوپار'),
(789, 21, 'جوزم'),
(790, 21, 'جيرفت'),
(791, 21, 'چترود'),
(792, 21, 'خاتون آباد'),
(793, 21, 'خانوك'),
(794, 21, 'خورسند'),
(795, 21, 'درب بهشت'),
(796, 21, 'دهج'),
(797, 21, 'دوساري'),
(798, 21, 'رابر'),
(799, 21, 'راور'),
(800, 21, 'راين'),
(801, 21, 'رفسنجان'),
(802, 21, 'رودبار'),
(803, 21, 'ريحان'),
(804, 21, 'زرند'),
(805, 21, 'زنگي آباد'),
(806, 21, 'زيد آباد'),
(807, 21, 'سيرجان'),
(808, 21, 'شهداد'),
(809, 21, 'شهر بابك'),
(810, 21, 'صفائيه'),
(811, 21, 'عنبر آباد'),
(812, 21, 'فارياب'),
(813, 21, 'فهرج'),
(814, 21, 'قلعه گنج'),
(815, 21, 'كاظم آباد'),
(816, 21, 'كرمان'),
(817, 21, 'كشكوئيه'),
(818, 21, 'كهنوج'),
(819, 21, 'كوهبنان'),
(820, 21, 'كيانشهر'),
(821, 21, 'گلباف'),
(822, 21, 'گلزار'),
(823, 21, 'لاله زار'),
(824, 21, 'ماهان'),
(825, 21, 'محمد آباد'),
(826, 21, 'محي آباد'),
(827, 21, 'مردهك'),
(828, 21, 'مس سرچشمه'),
(829, 21, 'منوجان'),
(830, 21, 'نجف شهر'),
(831, 21, 'نرماشير'),
(832, 21, 'نظام شهر'),
(833, 21, 'نگار'),
(834, 21, 'نودژ'),
(835, 21, 'هجدك'),
(836, 21, 'هماشهر'),
(837, 21, 'يزدان شهر'),
(838, 22, 'ازگله'),
(839, 22, 'اسلام آباد غرب'),
(840, 22, 'باينگان'),
(841, 22, 'بيستون'),
(842, 22, 'پاوه'),
(843, 22, 'تازه آباد'),
(844, 22, 'جوانرود'),
(845, 22, 'حميل'),
(846, 22, 'رباط'),
(847, 22, 'روانسر'),
(848, 22, 'سر پل ذهاب'),
(849, 22, 'سرمست'),
(850, 22, 'سطر'),
(851, 22, 'سنقر'),
(852, 22, 'سومار'),
(853, 22, 'شاهو'),
(854, 22, 'صحنه'),
(855, 22, 'قصر شيرين'),
(856, 22, 'كرمانشاه'),
(857, 22, 'كرند غرب'),
(858, 22, 'كنگاور'),
(859, 22, 'كوزران'),
(860, 22, 'گهواره'),
(861, 22, 'گيلانغرب'),
(862, 22, 'ميان راهان'),
(863, 22, 'نودشه'),
(864, 22, 'نوسود'),
(865, 22, 'هرسين'),
(866, 22, 'هلشي'),
(867, 23, 'باشت'),
(868, 23, 'پاتاوه'),
(869, 23, 'چرام'),
(870, 23, 'چيتاب'),
(871, 23, 'دهدشت'),
(872, 23, 'دوگنبدان'),
(873, 23, 'ديشموك'),
(874, 23, 'سوق'),
(875, 23, 'سي سخت'),
(876, 23, 'قلعه رئيسي'),
(877, 23, 'گراب سفلي'),
(878, 23, 'لنده'),
(879, 23, 'ليكك'),
(880, 23, 'مادوان'),
(881, 23, 'مارگون'),
(882, 23, 'ياسوج'),
(883, 24, 'آزاد شهر'),
(884, 24, 'آق قلا'),
(885, 24, 'انبار آلوم'),
(886, 24, 'اينچه برون'),
(887, 24, 'بندر تركمن'),
(888, 24, 'بندر گز'),
(889, 24, 'جلين'),
(890, 24, 'خان ببين'),
(891, 24, 'دلند'),
(892, 24, 'راميان'),
(893, 24, 'سرخنكلاته'),
(894, 24, 'سيمين شهر'),
(895, 24, 'علي آباد'),
(896, 24, 'فاضل آباد'),
(897, 24, 'كرد كوي'),
(898, 24, 'كلاله'),
(899, 24, 'گاليكش'),
(900, 24, 'گرگان'),
(901, 24, 'گميش تپه'),
(902, 24, 'گنبدكاووس'),
(903, 24, 'مراوه تپه'),
(904, 24, 'مينودشت'),
(905, 24, 'نگين شهر'),
(906, 24, 'نوده خاندوز'),
(907, 24, 'نوكنده'),
(908, 25, 'آستارا'),
(909, 25, 'آستانه اشرفيه'),
(910, 25, 'احمد سرگوراب'),
(911, 25, 'اسالم'),
(912, 25, 'اطاقور'),
(913, 25, 'املش'),
(914, 25, 'بازار جمعه'),
(915, 25, 'بره سر'),
(916, 25, 'بندر انزلي'),
(917, 25, 'پره سر'),
(918, 25, 'توتكابن'),
(919, 25, 'جيرنده'),
(920, 25, 'چابكسر'),
(921, 25, 'چاف و چمخاله'),
(922, 25, 'چوبر'),
(923, 25, 'حويق'),
(924, 25, 'خشكبيجار'),
(925, 25, 'خمام'),
(926, 25, 'ديلمان'),
(927, 25, 'رانكوه'),
(928, 25, 'رحيم آباد'),
(929, 25, 'رستم آباد'),
(930, 25, 'رشت'),
(931, 25, 'رضوانشهر'),
(932, 25, 'رودبار'),
(933, 25, 'رودبنه'),
(934, 25, 'رودسر'),
(935, 25, 'سنگر'),
(936, 25, 'سياهكل'),
(937, 25, 'شفت'),
(938, 25, 'شلمان'),
(939, 25, 'صومعه سرا'),
(940, 25, 'فومن'),
(941, 25, 'كلاچاي'),
(942, 25, 'كوچصفهان'),
(943, 25, 'كومله'),
(944, 25, 'كياشهر'),
(945, 25, 'گوراب زرميخ'),
(946, 25, 'لاهيجان'),
(947, 25, 'لشت نشاء'),
(948, 25, 'لنگرود'),
(949, 25, 'لوشان'),
(950, 25, 'لولمان'),
(951, 25, 'لوندويل'),
(952, 25, 'ليسار'),
(953, 25, 'ماسال'),
(954, 25, 'ماسوله'),
(955, 25, 'مرجقل'),
(956, 25, 'منجيل'),
(957, 25, 'هشتپر'),
(958, 25, 'واجارگاه'),
(959, 26, 'ازنا'),
(960, 26, 'اشترينان'),
(961, 26, 'الشتر'),
(962, 26, 'اليگودرز'),
(963, 26, 'بروجرد'),
(964, 26, 'پلدختر'),
(965, 26, 'چالانچولان'),
(966, 26, 'چغلوندي'),
(967, 26, 'چقابل'),
(968, 26, 'خرم آباد'),
(969, 26, 'درب گنبد'),
(970, 26, 'دورود'),
(971, 26, 'زاغه'),
(972, 26, 'سپيد دشت'),
(973, 26, 'سراب دوره'),
(974, 26, 'شول آباد'),
(975, 26, 'فيروزآباد'),
(976, 26, 'كوناني'),
(977, 26, 'كوهدشت'),
(978, 26, 'گراب'),
(979, 26, 'معمولان'),
(980, 26, 'مومن آباد'),
(981, 26, 'نورآباد'),
(982, 26, 'هفت چشمه'),
(983, 26, 'ويسيان'),
(984, 27, 'آلاشت'),
(985, 27, 'آمل'),
(986, 27, 'ارطه'),
(987, 27, 'امير كلا'),
(988, 27, 'ايزد شهر'),
(989, 27, 'بابل'),
(990, 27, 'بابلسر'),
(991, 27, 'بلده'),
(992, 27, 'بهشهر'),
(993, 27, 'بهنمير'),
(994, 27, 'پايين هولار'),
(995, 27, 'پل سفيد'),
(996, 27, 'پول'),
(997, 27, 'تنكابن'),
(998, 27, 'جويبار'),
(999, 27, 'چالوس'),
(1000, 27, 'چمستان'),
(1001, 27, 'خرم آباد'),
(1002, 27, 'خليل شهر'),
(1003, 27, 'خوش رودپي'),
(1004, 27, 'دابودشت'),
(1005, 27, 'رامسر'),
(1006, 27, 'رستمكلا'),
(1007, 27, 'رويان'),
(1008, 27, 'رينه'),
(1009, 27, 'زرگر محله'),
(1010, 27, 'زيرآب'),
(1011, 27, 'ساري'),
(1012, 27, 'سرخرود'),
(1013, 27, 'سلمان شهر'),
(1014, 27, 'سورك'),
(1015, 27, 'شيرگاه'),
(1016, 27, 'شيرود'),
(1017, 27, 'عباس آباد'),
(1018, 27, 'فريدونكنار'),
(1019, 27, 'فريم'),
(1020, 27, 'قائم شهر');
INSERT INTO `province_cities` (`id`, `province_id`, `name`) VALUES
(1021, 27, 'كتالم و سادات شهر'),
(1022, 27, 'كلارآباد'),
(1023, 27, 'كلاردشت'),
(1024, 27, 'كله بست'),
(1025, 27, 'كوهي خيل'),
(1026, 27, 'كياسر'),
(1027, 27, 'كياكلا'),
(1028, 27, 'گتاب'),
(1029, 27, 'گزنك'),
(1030, 27, 'گلوگاه'),
(1031, 27, 'محمود آباد'),
(1032, 27, 'مرزن آباد'),
(1033, 27, 'مرزيكلا'),
(1034, 27, 'نشتارود'),
(1035, 27, 'نكا'),
(1036, 27, 'نور'),
(1037, 27, 'نوشهر'),
(1038, 27, 'هچيرود'),
(1039, 28, 'آستانه'),
(1040, 28, 'آشتيان'),
(1041, 28, 'اراك'),
(1042, 28, 'پرندك'),
(1043, 28, 'تفرش'),
(1044, 28, 'توره'),
(1045, 28, 'جاورسيان'),
(1046, 28, 'خشكرود'),
(1047, 28, 'خمين'),
(1048, 28, 'خنداب'),
(1049, 28, 'داود آباد'),
(1050, 28, 'دليجان'),
(1051, 28, 'رازقان'),
(1052, 28, 'زاويه'),
(1053, 28, 'ساروق'),
(1054, 28, 'ساوه'),
(1055, 28, 'سنجان'),
(1056, 28, 'شازند'),
(1057, 28, 'شهر جديد مهاجران'),
(1058, 28, 'غرق آباد'),
(1059, 28, 'فرمهين'),
(1060, 28, 'قورچي باشي'),
(1061, 28, 'كارچان'),
(1062, 28, 'كرهرود'),
(1063, 28, 'كميجان'),
(1064, 28, 'مامونيه'),
(1065, 28, 'محلات'),
(1066, 28, 'ميلاجرد'),
(1067, 28, 'نراق'),
(1068, 28, 'نوبران'),
(1069, 28, 'نيمور'),
(1070, 28, 'هندودر'),
(1071, 29, 'ابوموسي'),
(1072, 29, 'بستك'),
(1073, 29, 'بندر جاسك'),
(1074, 29, 'بندر عباس'),
(1075, 29, 'بندر لنگه'),
(1076, 29, 'بيكاه'),
(1077, 29, 'پارسيان'),
(1078, 29, 'تخت'),
(1079, 29, 'جناح'),
(1080, 29, 'چارك'),
(1081, 29, 'حاجي آباد'),
(1082, 29, 'خمير'),
(1083, 29, 'درگهان'),
(1084, 29, 'دشتي'),
(1085, 29, 'دهبارز'),
(1086, 29, 'رويدر'),
(1087, 29, 'زيارتعلي'),
(1088, 29, 'سردشت'),
(1089, 29, 'سرگز'),
(1090, 29, 'سندرك'),
(1091, 29, 'سوزا'),
(1092, 29, 'سيريك'),
(1093, 29, 'فارغان'),
(1094, 29, 'فين'),
(1095, 29, 'قشم'),
(1096, 29, 'قلعه قاضي'),
(1097, 29, 'كنگ'),
(1098, 29, 'كوشكنار'),
(1099, 29, 'كيش'),
(1100, 29, 'گروك'),
(1101, 29, 'گوهران'),
(1102, 29, 'ميناب'),
(1103, 29, 'هرمز'),
(1104, 29, 'هشتبندي'),
(1105, 30, 'ازندريان'),
(1106, 30, 'اسد آباد'),
(1107, 30, 'برزول'),
(1108, 30, 'بهار'),
(1109, 30, 'تويسركان'),
(1110, 30, 'جورقان'),
(1111, 30, 'جوكار'),
(1112, 30, 'دمق'),
(1113, 30, 'رزن'),
(1114, 30, 'زنگنه'),
(1115, 30, 'سامن'),
(1116, 30, 'سركان'),
(1117, 30, 'شيرين سو'),
(1118, 30, 'صالح آباد'),
(1119, 30, 'فامنين'),
(1120, 30, 'فرسفج'),
(1121, 30, 'فيروزان'),
(1122, 30, 'قروه در جزين'),
(1123, 30, 'قهاوند'),
(1124, 30, 'كبودر آهنگ'),
(1125, 30, 'گل تپه'),
(1126, 30, 'گيان'),
(1127, 30, 'لالجين'),
(1128, 30, 'مريانج'),
(1129, 30, 'ملاير'),
(1130, 30, 'نهاوند'),
(1131, 30, 'همدان'),
(1132, 31, 'ابركوه'),
(1133, 31, 'احمد آباد'),
(1134, 31, 'اردكان'),
(1135, 31, 'اشكذر'),
(1136, 31, 'بافق'),
(1137, 31, 'بفروئيه'),
(1138, 31, 'بهاباد'),
(1139, 31, 'تفت'),
(1140, 31, 'حميديا'),
(1141, 31, 'خضر آباد'),
(1142, 31, 'ديهوك'),
(1143, 31, 'زارچ'),
(1144, 31, 'شاهديه'),
(1145, 31, 'طبس'),
(1146, 31, 'عشق آباد'),
(1147, 31, 'عقدا'),
(1148, 31, 'مروست'),
(1149, 31, 'مهردشت'),
(1150, 31, 'مهريز'),
(1151, 31, 'ميبد'),
(1152, 31, 'ندوشن'),
(1153, 31, 'نير'),
(1154, 31, 'هرات'),
(1155, 31, 'يزد');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;