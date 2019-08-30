-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2019 at 03:25 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uji_level`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `masuk_user` (`username` VARCHAR(255), `password` VARCHAR(255), `email` VARCHAR(255), `role` INT(1))  BEGIN

INSERT INTO `user` VALUES(NULL, `username`, md5(`password`), `email`, 'default.png', `role`);

END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `jumlahPost` (`email` VARCHAR(128)) RETURNS VARCHAR(128) CHARSET latin1 BEGIN

DECLARE jumlah INT;
SELECT COUNT(*) INTO jumlah FROM `blogpost` WHERE user_email = email;
RETURN CONCAT("Ada ", jumlah, " Postingan");

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `blogpost`
--

CREATE TABLE `blogpost` (
  `post_id` int(12) NOT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_header` varchar(255) DEFAULT NULL,
  `post_content` longtext,
  `user_email` varchar(225) DEFAULT NULL,
  `post_created` int(12) DEFAULT NULL,
  `post_status` varchar(128) DEFAULT NULL,
  `post_status_comment` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogpost`
--

INSERT INTO `blogpost` (`post_id`, `post_title`, `post_header`, `post_content`, `user_email`, `post_created`, `post_status`, `post_status_comment`) VALUES
(17, 'PHP', '800px-PHP-logo.svg.png', '<h2>Sejarah PHP</h2>\r\n\r\n<hr />\r\n<p>Pada awalnya PHP merupakan kependekan dari&nbsp;<em>Personal Home Page</em>&nbsp;(Situs personal). PHP pertama kali dibuat oleh&nbsp;<a href=\"https://www.wikiwand.com/id/Rasmus_Lerdorf\">Rasmus Lerdorf</a>&nbsp;pada tahun&nbsp;<a href=\"https://www.wikiwand.com/id/1995\">1995</a>. Pada waktu itu PHP masih bernama&nbsp;<em>Form Interpreted</em>&nbsp;(FI), yang wujudnya berupa sekumpulan skrip yang digunakan untuk mengolah data formulir dari&nbsp;<a href=\"https://www.wikiwand.com/id/Web\">web</a>.</p>\r\n\r\n<p>Selanjutnya Rasmus merilis kode sumber tersebut untuk umum dan menamakannya PHP/FI. Dengan perilisan kode sumber ini menjadi&nbsp;<a href=\"https://www.wikiwand.com/id/Sumber_terbuka\">sumber terbuka</a>, maka banyak&nbsp;<a href=\"https://www.wikiwand.com/id/Pemrogram\">pemrogram</a>&nbsp;yang tertarik untuk ikut mengembangkan PHP.</p>\r\n\r\n<p>Pada November 1997, dirilis PHP/FI 2.0. Pada rilis ini,&nbsp;<em><a href=\"https://www.wikiwand.com/id/Interpreter\">interpreter</a></em>&nbsp;PHP sudah diimplementasikan dalam program&nbsp;<a href=\"https://www.wikiwand.com/id/C\">C</a>. Dalam rilis ini disertakan juga modul-modul ekstensi yang meningkatkan kemampuan PHP/FI secara signifikan.</p>\r\n\r\n<p>Pada tahun 1997, sebuah perusahaan bernama Zend menulis ulang interpreter PHP menjadi lebih bersih, lebih baik, dan lebih cepat. Kemudian pada Juni 1998, perusahaan tersebut merilis interpreter baru untuk PHP dan meresmikan rilis tersebut sebagai PHP 3.0 dan singkatan PHP diubah menjadi&nbsp;<a href=\"https://www.wikiwand.com/id/Akronim_berulang\">akronim berulang</a>&nbsp;<em>PHP: Hypertext Preprocessing</em>.</p>\r\n\r\n<p>Pada pertengahan tahun 1999, Zend merilis interpreter PHP baru dan rilis tersebut dikenal dengan PHP 4.0. PHP 4.0 adalah versi PHP yang paling banyak dipakai pada awal abad ke-21. Versi ini banyak dipakai disebabkan kemampuannya untuk membangun aplikasi web kompleks tetapi tetap memiliki kecepatan dan stabilitas yang tinggi.</p>\r\n\r\n<p>Pada&nbsp;<a href=\"https://www.wikiwand.com/id/Juni\">Juni</a>&nbsp;<a href=\"https://www.wikiwand.com/id/2004\">2004</a>, Zend merilis&nbsp;<a href=\"https://www.wikiwand.com/id/PHP_5.0\">PHP 5.0</a>. Dalam versi ini, inti dari interpreter PHP mengalami perubahan besar. Versi ini juga memasukkan model&nbsp;<a href=\"https://www.wikiwand.com/id/Pemrograman_berorientasi_objek\">pemrograman berorientasi objek</a>&nbsp;ke dalam PHP untuk menjawab perkembangan bahasa pemrograman ke arah paradigma berorientasi objek. Server web bawaan ditambahkan pada versi 5.4 untuk mempermudah pengembang menjalankan kode PHP tanpa menginstall software server.</p>\r\n\r\n<p>Versi terbaru dan stabil dari bahasa pemograman PHP saat ini adalah versi 7.0.16 dan 7.1.2 yang resmi dirilis pada tanggal 17&nbsp;<a href=\"https://www.wikiwand.com/id/Februari\">Februari</a>&nbsp;2017<a href=\"https://www.wikiwand.com/id/PHP#citenote6\">[6]</a>.</p>\r\n', 'mapratama02@gmail.com', 1556946388, 'ready', 0),
(18, 'Lorem', 'Screenshot.png', '<h1>Lorem Ipsum</h1>\r\n\r\n<hr />\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, ducimus libero a repudiandae omnis veritatis doloribus consequatur optio temporibus, sunt architecto eius nulla! Cumque porro, facilis earum fuga ea laborum quis! Non magni cupiditate in nobis veniam. Laborum iusto illum ratione, hic ea sit ipsam, sequi impedit maxime nulla consequuntur quam. Eos ducimus deserunt dolorum commodi quas voluptatum laudantium assumenda asperiores praesentium? Dolores repudiandae tempora ipsum minus magni eligendi ex, neque fugiat esse eius explicabo totam excepturi minima. Reprehenderit optio autem enim et hic. Et inventore necessitatibus nisi. Incidunt illum id laborum voluptates, vero reprehenderit, iste perspiciatis obcaecati earum ducimus consequuntur. Vero amet enim neque officia nostrum! Alias dolorem officiis assumenda architecto, nobis voluptatibus corporis exercitationem harum, aliquam, eligendi recusandae reiciendis dolor numquam. Necessitatibus tenetur cum quod eligendi, debitis quaerat, praesentium perspiciatis ipsum dignissimos commodi, vitae odio in enim alias. Soluta tempora laborum suscipit. Eius nulla ad ex optio quod quo aut sunt magnam culpa, veritatis, eos sed blanditiis accusantium non dolore nostrum ipsum vero! Odit nulla voluptas, ullam nemo impedit sapiente non minus veniam dignissimos? A accusantium expedita distinctio placeat, eaque officiis dolorum nesciunt cumque laudantium qui cum sit corporis quos unde, molestiae adipisci dolorem. Eligendi perferendis pariatur cumque.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, ducimus libero a repudiandae omnis veritatis doloribus consequatur optio temporibus, sunt architecto eius nulla! Cumque porro, facilis earum fuga ea laborum quis! Non magni cupiditate in nobis veniam. Laborum iusto illum ratione, hic ea sit ipsam, sequi impedit maxime nulla consequuntur quam. Eos ducimus deserunt dolorum commodi quas voluptatum laudantium assumenda asperiores praesentium? Dolores repudiandae tempora ipsum minus magni eligendi ex, neque fugiat esse eius explicabo totam excepturi minima. Reprehenderit optio autem enim et hic. Et inventore necessitatibus nisi. Incidunt illum id laborum voluptates, vero reprehenderit, iste perspiciatis obcaecati earum ducimus consequuntur. Vero amet enim neque officia nostrum! Alias dolorem officiis assumenda architecto, nobis voluptatibus corporis exercitationem harum, aliquam, eligendi recusandae reiciendis dolor numquam. Necessitatibus tenetur cum quod eligendi, debitis quaerat, praesentium perspiciatis ipsum dignissimos commodi, vitae odio in enim alias. Soluta tempora laborum suscipit. Eius nulla ad ex optio quod quo aut sunt magnam culpa, veritatis, eos sed blanditiis accusantium non dolore nostrum ipsum vero! Odit nulla voluptas, ullam nemo impedit sapiente non minus veniam dignissimos? A accusantium expedita distinctio placeat, eaque officiis dolorum nesciunt cumque laudantium qui cum sit corporis quos unde, molestiae adipisci dolorem. Eligendi perferendis pariatur cumque.</p>\r\n', 'puro@gmail.com', 1556965330, 'ready', 0),
(19, 'The Title', 'Screenshot.png', '<h1>Lorem</h1>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste architecto autem optio impedit. Quod eligendi mollitia natus expedita deserunt, eius unde dignissimos reiciendis, repellat quisquam soluta provident nam corporis nisi autem molestiae quae delectus architecto esse? Quis veritatis dolor possimus a! Quod veritatis quaerat eveniet non praesentium autem, culpa aspernatur.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/uji_level/libs/img/HBD.png\" style=\"border-style:solid; border-width:0px; float:left; height:166px; margin:10px; width:150px\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste architecto autem optio impedit. Quod eligendi mollitia natus expedita deserunt, eius unde dignissimos reiciendis, repellat quisquam soluta provident nam corporis nisi autem molestiae quae delectus architecto esse? Quis veritatis dolor possimus a! Quod veritatis quaerat eveniet non praesentium autem, culpa aspernatur.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste architecto autem optio impedit. Quod eligendi mollitia natus expedita deserunt, eius unde dignissimos reiciendis, repellat quisquam soluta provident nam corporis nisi autem molestiae quae delectus architecto esse? Quis veritatis dolor possimus a! Quod veritatis quaerat eveniet non praesentium autem, culpa aspernatur.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste architecto autem optio impedit. Quod eligendi mollitia natus expedita deserunt, eius unde dignissimos reiciendis, repellat quisquam soluta provident nam corporis nisi autem molestiae quae delectus architecto esse? Quis veritatis dolor possimus a! Quod veritatis quaerat eveniet non praesentium autem, culpa aspernatur.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste architecto autem optio impedit. Quod eligendi mollitia natus expedita deserunt, eius unde dignissimos reiciendis, repellat quisquam soluta provident nam corporis nisi autem molestiae quae delectus architecto esse? Quis veritatis dolor possimus a! Quod veritatis quaerat eveniet non praesentium autem, culpa aspernatur.</p>\r\n', 'mapratama02@gmail.com', 1556968953, 'ready', 0),
(23, 'Laravel', '1280px-LaravelLogo.png', '<h1>Laravel</h1>\r\n\r\n<hr />\r\n<p><strong>Laravel</strong>&nbsp;adalah kerangka kerja aplikasi web berbasis&nbsp;<a href=\"https://www.wikiwand.com/id/PHP\">PHP</a>&nbsp;yang&nbsp;<a href=\"https://www.wikiwand.com/id/Open_source\">open source</a>, menggunakan konsep model&ndash;view&ndash;controller (MVC). Laravel berada dibawah lisensi MIT, dengan menggunakan&nbsp;<a href=\"https://www.wikiwand.com/id/GitHub\">GitHub</a>&nbsp;sebagai tempat berbagi kode.</p>\r\n\r\n<p>Desember 2013, Laravel menempati PHP framework terpopuler dan berada diatas PHP framework lain seperti Phalcon, Symfony2,&nbsp;<a href=\"https://www.wikiwand.com/id/CodeIgniter\">CodeIgniter</a>&nbsp;dan lainnya.</p>\r\n', 'mapratama02@gmail.com', 1557362644, 'ready', 0),
(28, 'qwerty', 'Eid Mubarak.png', '<p>qwertyuiopasdfghjklzxcvbnm</p>\r\n', 'mapratama02@gmail.com', 1563182184, 'pending', 0),
(30, 'asdasdasdasdasdasd', 'natsuki_by_satchely-dblwpeg.png', 'asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd', 'mapratama02@gmail.com', 1563182836, 'ready', 0),
(31, 'Lorem', 'abstract-background-canvas-249798.jpg', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://pratama/uji_level/libs/img/HBD%20Sonic.png\" style=\"float:left; height:100px; margin:20px; width:100px\" />Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus, eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum rutrum, est ut placerat elementum, lectus nisl aliquam velit, tempor aliquam eros nunc nonummy metus. In eros metus, gravida a, gravida sed, lobortis id, turpis. Ut ultrices, ipsum at venenatis fringilla, sem nulla lacinia tellus, eget aliquet turpis mauris non enim. Nam turpis. Suspendisse lacinia. Curabitur ac tortor ut ipsum egestas elementum. Nunc imperdiet gravida mauris.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'mapratama02@gmail.com', 1563185054, 'ready', 0);

--
-- Triggers `blogpost`
--
DELIMITER $$
CREATE TRIGGER `post_delete` AFTER DELETE ON `blogpost` FOR EACH ROW BEGIN

INSERT INTO `deleted_post` VALUES(Old.post_id, Old.post_title, Old.post_header, Old.post_content, Old.user_email, Old.post_created, Old.post_status, Old.post_status_comment);

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `deleted_post`
--

CREATE TABLE `deleted_post` (
  `post_id` int(12) NOT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_header` varchar(255) DEFAULT NULL,
  `post_content` longtext,
  `user_email` varchar(225) DEFAULT NULL,
  `post_created` int(12) DEFAULT NULL,
  `post_status` varchar(128) DEFAULT NULL,
  `post_status_comment` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deleted_post`
--

INSERT INTO `deleted_post` (`post_id`, `post_title`, `post_header`, `post_content`, `user_email`, `post_created`, `post_status`, `post_status_comment`) VALUES
(22, 'alalalalla', '0be02f22fd035eaee2887211434a03a1.jpg', '<p>ALalalalalalalalalallala</p>\r\n', 'puro@gmail.com', 1557203999, 'ready', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `user_role` int(11) NOT NULL,
  `role_name` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`user_role`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'User'),
(3, 'Writter');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_profile` varchar(128) DEFAULT NULL,
  `user_role` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_profile`, `user_role`) VALUES
(1, 'Muhammad Anugrah Pratama', '363c98d8452080281d9566b4f49b874a', 'mapratama02@gmail.com', 'flowers.jpg', 1),
(2, 'Puro', 'c385cc7cf10b1516599ffe32eb5f4a0b', 'puro@gmail.com', '983db17d923ae2abeb576e716e36239b.jpg', 3),
(3, 'Farrel Putera Fadjar', '5360ee1e404a8dbe7cdf2fce20f5a795', 'farrel_putera@gmail.com', 'Violet Evergarden.png', 2),
(4, 'Hajid Alakhtar', '5588646479e4801bdcbc044bd8392d25', 'hajid@yahoo.com', '2d2c56394ddcad28b42dbcfd76a143a6.png', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogpost`
--
ALTER TABLE `blogpost`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_email` (`user_email`);

--
-- Indexes for table `deleted_post`
--
ALTER TABLE `deleted_post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_email` (`user_email`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`user_role`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD KEY `user_email_2` (`user_email`),
  ADD KEY `user_role` (`user_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogpost`
--
ALTER TABLE `blogpost`
  MODIFY `post_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `deleted_post`
--
ALTER TABLE `deleted_post`
  MODIFY `post_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `user_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogpost`
--
ALTER TABLE `blogpost`
  ADD CONSTRAINT `blogpost_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `user` (`user_email`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_role`) REFERENCES `role` (`user_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
