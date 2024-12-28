-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 28, 2024 at 06:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donasidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `model_pembayaran`
--

CREATE TABLE `model_pembayaran` (
  `id_model` int(11) NOT NULL,
  `metode` varchar(50) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `model_pembayaran`
--

INSERT INTO `model_pembayaran` (`id_model`, `metode`, `keterangan`, `is_deleted`) VALUES
(1, 'BSI', '123456', 0),
(2, 'BCA', '123456', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `donatur` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `id_model` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `pesan` text DEFAULT NULL,
  `bukti_transfer` text DEFAULT NULL,
  `status` enum('pending','finished') DEFAULT 'pending',
  `tanggal` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `donatur`, `email`, `no_hp`, `id_model`, `jumlah`, `pesan`, `bukti_transfer`, `status`, `tanggal`) VALUES
(1, 'test', 'redsodacan06@gmail.com', '08xxxxxx', 2, 100000, 'adfadg', '/upload/1735363042-8f20c95109b315a570bf4e6f50887473-B_adv0.webp', 'pending', '2024-12-28 05:16:26'),
(2, 'Spenser', 'sturneaux0@rakuten.co.jp', '4131672483', 2, 100000, 'amet eros suspendisse accumsan tortor quis turpis sed ante vivamus tortor duis mattis egestas metus aenean fermentum donec ut mauris eget massa tempor convallis nulla neque libero convallis eget eleifend luctus ultricies eu nibh quisque id justo sit amet sapien dignissim vestibulum', NULL, 'finished', '2023-12-13 17:00:00'),
(3, 'Wye', 'wspenley1@vistaprint.com', '1823841741', 1, 50000, 'mus etiam vel augue vestibulum rutrum rutrum neque aenean auctor gravida sem praesent id massa id nisl venenatis lacinia aenean sit amet justo morbi ut odio cras mi pede malesuada in imperdiet', NULL, 'pending', '2022-01-28 17:00:00'),
(4, 'Cristina', 'ccossell2@deliciousdays.com', '5742330567', 2, 50000, 'nulla tellus in sagittis dui vel nisl duis ac nibh fusce lacus purus aliquet at feugiat non pretium quis lectus suspendisse potenti in eleifend quam a odio in hac habitasse platea dictumst maecenas ut massa quis augue luctus tincidunt nulla mollis molestie lorem quisque ut erat', NULL, 'finished', '2022-09-20 17:00:00'),
(5, 'Kenon', 'kangelo3@upenn.edu', '7248468815', 2, 100000, 'ultrices posuere cubilia curae duis faucibus accumsan odio curabitur convallis duis consequat dui nec nisi volutpat eleifend donec ut dolor morbi vel lectus in quam fringilla rhoncus mauris enim leo rhoncus sed vestibulum sit amet cursus id turpis integer aliquet massa id lobortis convallis', NULL, 'finished', '2024-09-05 17:00:00'),
(6, 'Bronnie', 'bmcenteggart4@sphinn.com', '3886510319', 2, 50000, 'lectus aliquam sit amet diam in magna bibendum imperdiet nullam orci pede venenatis', NULL, 'pending', '2022-07-08 17:00:00'),
(7, 'Neil', 'nwoodage5@google.com', '3494552062', 1, 50000, 'penatibus et magnis dis parturient montes nascetur ridiculus mus etiam vel augue vestibulum rutrum rutrum neque aenean auctor gravida sem praesent id massa id nisl venenatis lacinia aenean sit amet justo morbi ut odio cras mi', NULL, 'finished', '2022-06-30 17:00:00'),
(8, 'Gabe', 'gletty6@google.cn', '3116962934', 2, 200000, 'luctus et ultrices posuere cubilia curae mauris viverra diam vitae quam suspendisse potenti nullam porttitor lacus at turpis', NULL, 'pending', '2023-07-23 17:00:00'),
(9, 'Birk', 'bcranton7@nature.com', '1075960288', 1, 50000, 'dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum at lorem integer tincidunt ante vel ipsum praesent blandit lacinia erat vestibulum sed magna at nunc commodo placerat praesent blandit nam nulla integer pede justo lacinia eget tincidunt eget tempus vel pede morbi porttitor lorem id ligula suspendisse', NULL, 'pending', '2023-02-28 17:00:00'),
(10, 'Hoebart', 'heldrett8@reuters.com', '5853644472', 1, 200000, 'eu mi nulla ac enim in tempor turpis nec euismod scelerisque quam turpis adipiscing', NULL, 'pending', '2021-04-02 17:00:00'),
(11, 'Cherice', 'cseedull9@xrea.com', '7004935495', 2, 200000, 'nec euismod scelerisque quam turpis adipiscing lorem vitae mattis nibh ligula nec sem duis aliquam convallis nunc proin at turpis a pede posuere nonummy integer non velit donec diam neque vestibulum eget vulputate ut ultrices vel augue vestibulum ante ipsum primis in faucibus orci luctus', NULL, 'finished', '2024-10-11 17:00:00'),
(12, 'Wit', 'wlindella@ihg.com', '6743765504', 1, 100000, 'libero convallis eget eleifend luctus ultricies eu nibh quisque id justo sit amet sapien dignissim vestibulum vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae nulla dapibus dolor vel est', NULL, 'finished', '2022-08-01 17:00:00'),
(13, 'Alida', 'adimitrescob@howstuffworks.com', '6656391418', 2, 100000, 'nec molestie sed justo pellentesque viverra pede ac diam cras pellentesque volutpat dui maecenas tristique est et tempus semper est quam pharetra magna ac consequat metus sapien ut nunc vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia', NULL, 'pending', '2022-11-03 17:00:00'),
(14, 'Hillie', 'hkeninghamc@mediafire.com', '1017304367', 1, 100000, 'faucibus accumsan odio curabitur convallis duis consequat dui nec nisi volutpat eleifend donec ut dolor morbi vel lectus', NULL, 'finished', '2023-07-27 17:00:00'),
(15, 'Adel', 'agoodrichd@amazon.de', '6255561101', 2, 100000, 'morbi non lectus aliquam sit amet diam in magna bibendum imperdiet nullam orci pede venenatis non', NULL, 'pending', '2024-03-25 17:00:00'),
(16, 'Arnie', 'agoulstonee@webmd.com', '6439622796', 1, 50000, 'aliquam erat volutpat in congue etiam justo etiam pretium iaculis justo in hac habitasse platea dictumst etiam faucibus cursus urna ut tellus nulla ut erat id mauris vulputate elementum nullam varius nulla facilisi', NULL, 'pending', '2024-08-10 17:00:00'),
(17, 'Deloris', 'ddematteisf@tuttocitta.it', '2954200471', 1, 50000, 'neque sapien placerat ante nulla justo aliquam quis turpis eget', NULL, 'pending', '2022-08-14 17:00:00'),
(18, 'Arabel', 'amccroftg@bloglines.com', '2357884791', 2, 100000, 'ac leo pellentesque ultrices mattis odio donec vitae nisi nam ultrices libero non mattis pulvinar nulla pede ullamcorper augue a suscipit nulla elit ac nulla sed vel enim sit amet nunc viverra', NULL, 'finished', '2024-09-14 17:00:00'),
(19, 'Caesar', 'cstephenh@sphinn.com', '6664536726', 1, 100000, 'nunc proin at turpis a pede posuere nonummy integer non velit donec diam neque vestibulum eget vulputate ut ultrices vel augue vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae donec pharetra magna vestibulum aliquet ultrices erat tortor sollicitudin mi sit amet', NULL, 'finished', '2024-02-09 17:00:00'),
(20, 'Rowena', 'rgravei@msn.com', '2814128543', 1, 100000, 'vulputate luctus cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus vivamus vestibulum sagittis sapien cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus etiam vel augue vestibulum rutrum rutrum neque aenean auctor gravida sem praesent id massa id nisl', NULL, 'finished', '2024-05-15 17:00:00'),
(21, 'Cyndia', 'ckitcherj@skype.com', '2825298874', 2, 200000, 'vivamus vestibulum sagittis sapien cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus etiam vel augue vestibulum rutrum rutrum neque aenean auctor gravida sem praesent id massa id nisl venenatis lacinia aenean sit amet justo', NULL, 'pending', '2024-10-30 17:00:00'),
(22, 'Livvy', 'lgrealishk@nymag.com', '1343273586', 2, 50000, 'platea dictumst morbi vestibulum velit id pretium iaculis diam erat fermentum justo nec condimentum neque sapien placerat ante nulla justo aliquam quis turpis eget elit sodales scelerisque mauris sit amet eros suspendisse accumsan tortor quis turpis sed ante vivamus tortor duis mattis egestas metus aenean fermentum donec ut', NULL, 'finished', '2023-08-02 17:00:00'),
(23, 'Juliane', 'jblatchfordl@altervista.org', '7977824086', 2, 50000, 'elementum in hac habitasse platea dictumst morbi vestibulum velit id pretium iaculis diam erat fermentum justo nec condimentum neque sapien placerat ante nulla justo aliquam quis turpis eget', NULL, 'pending', '2022-12-09 17:00:00'),
(24, 'Corabelle', 'cmonumentm@is.gd', '5929203319', 1, 200000, 'justo sit amet sapien dignissim vestibulum vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae nulla dapibus dolor vel est donec odio justo sollicitudin ut suscipit', NULL, 'pending', '2021-03-29 17:00:00'),
(25, 'Ignacio', 'iwildashn@posterous.com', '5893024876', 2, 200000, 'in leo maecenas pulvinar lobortis est phasellus sit amet erat nulla tempus vivamus in felis', NULL, 'pending', '2024-08-23 17:00:00'),
(26, 'Dorella', 'dganiclefo@liveinternet.ru', '7494095099', 2, 100000, 'tincidunt nulla mollis molestie lorem quisque ut erat curabitur gravida nisi at nibh in hac habitasse platea dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum at lorem integer tincidunt ante vel ipsum praesent blandit lacinia erat vestibulum sed magna at nunc commodo placerat praesent blandit nam nulla integer pede', NULL, 'finished', '2024-06-25 17:00:00'),
(27, 'Lucia', 'lfairyp@gmpg.org', '8428815737', 1, 100000, 'in libero ut massa volutpat convallis morbi odio odio elementum eu interdum eu tincidunt in leo maecenas pulvinar lobortis est phasellus', NULL, 'finished', '2024-10-09 17:00:00'),
(28, 'Izak', 'ileaskq@tiny.cc', '4028910848', 1, 200000, 'eget tempus vel pede morbi porttitor lorem id ligula suspendisse ornare consequat lectus in est risus auctor sed tristique in tempus sit amet sem fusce consequat nulla nisl nunc nisl duis bibendum felis sed interdum', NULL, 'pending', '2021-04-06 17:00:00'),
(29, 'Millicent', 'mpresshaughr@qq.com', '9083633259', 1, 50000, 'lectus vestibulum quam sapien varius ut blandit non interdum in ante vestibulum ante ipsum primis in faucibus orci luctus', NULL, 'finished', '2022-09-14 17:00:00'),
(30, 'Clair', 'ccornills@usda.gov', '2541024086', 2, 50000, 'magna ac consequat metus sapien ut nunc vestibulum ante ipsum primis in faucibus orci', NULL, 'pending', '2023-01-30 17:00:00'),
(31, 'Ingmar', 'iwroutt@ed.gov', '3263192847', 2, 200000, 'ipsum dolor sit amet consectetuer adipiscing elit proin risus praesent lectus vestibulum quam', NULL, 'pending', '2021-04-14 17:00:00'),
(32, 'Homere', 'hknowlingu@ucoz.com', '6595459626', 1, 100000, 'massa volutpat convallis morbi odio odio elementum eu interdum eu tincidunt in leo maecenas pulvinar lobortis est phasellus sit amet erat nulla tempus vivamus in felis eu sapien cursus vestibulum proin eu mi nulla ac enim in tempor turpis nec euismod scelerisque quam turpis adipiscing lorem vitae mattis nibh', NULL, 'pending', '2024-09-10 17:00:00'),
(33, 'Claribel', 'clindmanv@goodreads.com', '5483832494', 2, 50000, 'eu nibh quisque id justo sit amet sapien dignissim vestibulum vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae nulla dapibus dolor vel est donec odio justo sollicitudin ut suscipit a feugiat et eros vestibulum ac est lacinia nisi', NULL, 'pending', '2021-06-10 17:00:00'),
(34, 'Orel', 'oyeardsleyw@instagram.com', '9074165734', 2, 50000, 'id turpis integer aliquet massa id lobortis convallis tortor risus dapibus augue vel accumsan tellus nisi eu orci mauris lacinia sapien quis libero nullam sit amet turpis elementum ligula vehicula consequat morbi a ipsum integer a', NULL, 'pending', '2024-06-14 17:00:00'),
(35, 'Sissie', 'smolderx@cbsnews.com', '6295567050', 2, 100000, 'integer ac neque duis bibendum morbi non quam nec dui luctus rutrum nulla tellus in sagittis dui vel nisl duis ac nibh fusce lacus purus aliquet at feugiat non pretium quis lectus suspendisse potenti in eleifend quam a odio in hac habitasse platea', NULL, 'finished', '2021-06-12 17:00:00'),
(36, 'Reinold', 'rskoney@stumbleupon.com', '4571441379', 1, 200000, 'pharetra magna vestibulum aliquet ultrices erat tortor sollicitudin mi sit amet lobortis sapien sapien non mi integer ac neque duis bibendum morbi non quam nec dui luctus rutrum nulla tellus in sagittis dui vel', NULL, 'finished', '2024-05-18 17:00:00'),
(37, 'Emmery', 'eblasez@ifeng.com', '4017065670', 1, 100000, 'posuere cubilia curae mauris viverra diam vitae quam suspendisse potenti nullam porttitor lacus at turpis donec posuere metus vitae ipsum aliquam non mauris morbi non lectus aliquam sit', NULL, 'pending', '2024-09-27 17:00:00'),
(38, 'Georgy', 'gsnelman10@bigcartel.com', '6399571858', 2, 100000, 'non sodales sed tincidunt eu felis fusce posuere felis sed lacus morbi sem mauris laoreet ut rhoncus aliquet pulvinar sed nisl nunc rhoncus dui vel sem sed sagittis nam congue', NULL, 'pending', '2021-03-26 17:00:00'),
(39, 'Colly', 'cmertsching11@cbsnews.com', '6213961530', 1, 200000, 'lectus vestibulum quam sapien varius ut blandit non interdum in ante vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae duis faucibus accumsan odio curabitur convallis duis consequat dui', NULL, 'pending', '2021-06-13 17:00:00'),
(40, 'Bendite', 'bdiggin12@opera.com', '6656257923', 2, 200000, 'in faucibus orci luctus et ultrices posuere cubilia curae duis', NULL, 'finished', '2022-07-10 17:00:00'),
(41, 'Nicolette', 'nmcgrale13@artisteer.com', '6825618600', 2, 50000, 'vestibulum eget vulputate ut ultrices vel augue vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae donec pharetra magna vestibulum aliquet ultrices erat tortor sollicitudin mi sit amet lobortis sapien', NULL, 'pending', '2022-07-10 17:00:00'),
(42, 'Coral', 'cmartinec14@macromedia.com', '5885647897', 1, 200000, 'euismod scelerisque quam turpis adipiscing lorem vitae mattis nibh ligula nec sem duis aliquam convallis nunc proin at turpis a pede posuere nonummy integer non velit donec diam neque vestibulum eget vulputate ut ultrices vel augue vestibulum ante ipsum primis in faucibus orci luctus et', NULL, 'pending', '2023-08-06 17:00:00'),
(43, 'Kass', 'kviant15@hhs.gov', '4266248593', 2, 100000, 'quis lectus suspendisse potenti in eleifend quam a odio in hac habitasse platea dictumst maecenas ut massa quis augue luctus', NULL, 'pending', '2023-09-14 17:00:00'),
(44, 'Jorry', 'jchurchman16@noaa.gov', '1834947772', 2, 200000, 'nunc proin at turpis a pede posuere nonummy integer non velit donec diam neque vestibulum eget vulputate ut', NULL, 'finished', '2022-10-06 17:00:00'),
(45, 'Fred', 'fmcbrady17@behance.net', '9585670743', 2, 200000, 'varius nulla facilisi cras non velit nec nisi vulputate nonummy maecenas tincidunt lacus at', NULL, 'finished', '2023-11-17 17:00:00'),
(46, 'Jozef', 'jvillalta18@redcross.org', '3758133195', 2, 100000, 'dui nec nisi volutpat eleifend donec ut dolor morbi vel lectus in quam fringilla rhoncus mauris enim leo rhoncus sed vestibulum sit amet cursus id turpis integer aliquet massa id lobortis convallis tortor risus dapibus', NULL, 'finished', '2023-10-08 17:00:00'),
(47, 'Armin', 'akeyzor19@opensource.org', '9235003463', 1, 100000, 'vitae quam suspendisse potenti nullam porttitor lacus at turpis donec posuere metus vitae ipsum aliquam non mauris morbi non lectus aliquam sit amet diam in magna bibendum imperdiet nullam orci pede venenatis non sodales sed tincidunt', NULL, 'finished', '2022-01-23 17:00:00'),
(48, 'Josselyn', 'joakwell1a@rakuten.co.jp', '7931756677', 1, 100000, 'praesent blandit nam nulla integer pede justo lacinia eget tincidunt', NULL, 'pending', '2024-07-26 17:00:00'),
(49, 'Dalston', 'dblower1b@hao123.com', '6681100404', 2, 50000, 'vulputate vitae nisl aenean lectus pellentesque eget nunc donec quis orci eget orci vehicula condimentum curabitur in libero ut massa volutpat convallis morbi odio odio elementum eu interdum eu tincidunt in leo maecenas pulvinar lobortis est phasellus sit amet erat nulla tempus vivamus in', NULL, 'pending', '2021-12-30 17:00:00'),
(50, 'Yehudit', 'yrollason1c@wikia.com', '8093656686', 2, 200000, 'penatibus et magnis dis parturient montes nascetur ridiculus mus vivamus vestibulum sagittis sapien cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus etiam vel augue vestibulum rutrum rutrum neque aenean auctor gravida sem praesent id massa id nisl venenatis lacinia aenean', NULL, 'finished', '2023-03-19 17:00:00'),
(51, 'Kincaid', 'kbarrows1d@smh.com.au', '9335558176', 2, 100000, 'lectus in quam fringilla rhoncus mauris enim leo rhoncus sed vestibulum sit amet cursus id turpis integer', NULL, 'pending', '2024-04-08 17:00:00'),
(52, 'Ysabel', 'ybewick1e@joomla.org', '6587516303', 2, 200000, 'nec euismod scelerisque quam turpis adipiscing lorem vitae mattis nibh ligula nec sem duis aliquam convallis nunc proin at turpis a pede posuere nonummy integer non velit donec diam neque vestibulum eget', NULL, 'pending', '2022-11-02 17:00:00'),
(53, 'Reagen', 'rfeechum1f@wufoo.com', '9649664297', 2, 200000, 'aliquam quis turpis eget elit sodales scelerisque mauris sit amet eros suspendisse accumsan tortor quis turpis sed ante vivamus tortor', NULL, 'pending', '2022-06-15 17:00:00'),
(54, 'Finley', 'fjoincey1g@networksolutions.com', '9392442235', 2, 200000, 'nulla integer pede justo lacinia eget tincidunt eget tempus vel pede morbi porttitor lorem id ligula suspendisse ornare consequat lectus in est risus auctor sed tristique in tempus sit amet sem fusce consequat nulla nisl nunc nisl duis bibendum felis sed interdum venenatis turpis', NULL, 'pending', '2023-10-08 17:00:00'),
(55, 'Edeline', 'emccoid1h@discuz.net', '1728366717', 1, 100000, 'pede justo lacinia eget tincidunt eget tempus vel pede morbi porttitor lorem id ligula suspendisse ornare consequat lectus in est risus auctor sed tristique in tempus sit amet sem fusce consequat nulla nisl nunc nisl duis bibendum felis sed interdum venenatis turpis enim blandit mi in', NULL, 'finished', '2023-12-28 17:00:00'),
(56, 'Alidia', 'ablinkhorn1i@japanpost.jp', '8846271004', 1, 200000, 'ridiculus mus etiam vel augue vestibulum rutrum rutrum neque aenean auctor gravida sem praesent id massa id nisl venenatis lacinia aenean sit amet justo morbi ut odio cras', NULL, 'finished', '2021-07-23 17:00:00'),
(57, 'Nannie', 'nspinige1j@geocities.jp', '3634170651', 2, 50000, 'tincidunt nulla mollis molestie lorem quisque ut erat curabitur gravida nisi at nibh in hac habitasse platea dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum at lorem integer tincidunt ante vel ipsum praesent blandit lacinia erat vestibulum sed magna at', NULL, 'pending', '2022-03-24 17:00:00'),
(58, 'Samson', 'svonnassau1k@ucsd.edu', '1643873560', 2, 200000, 'nulla ultrices aliquet maecenas leo odio condimentum id luctus nec molestie sed justo pellentesque viverra pede ac diam cras pellentesque volutpat dui maecenas tristique est et tempus semper est quam pharetra magna ac consequat metus sapien ut nunc vestibulum ante ipsum primis', NULL, 'pending', '2023-08-21 17:00:00'),
(59, 'Octavius', 'obinnie1l@indiegogo.com', '8015381011', 1, 100000, 'et magnis dis parturient montes nascetur ridiculus mus etiam vel augue vestibulum rutrum rutrum neque aenean auctor gravida sem praesent id massa id nisl venenatis lacinia aenean sit amet justo morbi ut odio cras mi pede malesuada in imperdiet et commodo vulputate justo in blandit ultrices enim lorem ipsum dolor', NULL, 'pending', '2024-09-03 17:00:00'),
(60, 'Albie', 'aworrell1m@liveinternet.ru', '1223587402', 1, 200000, 'iaculis diam erat fermentum justo nec condimentum neque sapien placerat ante nulla justo aliquam quis turpis eget elit sodales scelerisque mauris sit amet eros suspendisse accumsan tortor quis turpis sed ante vivamus tortor duis mattis egestas metus aenean fermentum donec ut mauris eget massa tempor convallis nulla', NULL, 'finished', '2021-09-07 17:00:00'),
(61, 'Olympia', 'owillshaw1n@sogou.com', '2693000404', 1, 200000, 'duis bibendum felis sed interdum venenatis turpis enim blandit mi in porttitor pede justo eu massa donec dapibus duis at velit eu est congue elementum in hac habitasse platea dictumst morbi vestibulum velit id pretium iaculis diam erat fermentum justo nec condimentum neque sapien placerat', NULL, 'finished', '2021-12-12 17:00:00'),
(62, 'Katha', 'ksarten1o@auda.org.au', '2586503105', 1, 200000, 'amet sem fusce consequat nulla nisl nunc nisl duis bibendum felis sed interdum venenatis turpis enim blandit mi in porttitor pede justo eu massa donec dapibus duis at velit eu', NULL, 'finished', '2024-01-30 17:00:00'),
(63, 'Abby', 'abowcher1p@dion.ne.jp', '5112117138', 2, 50000, 'eu interdum eu tincidunt in leo maecenas pulvinar lobortis est phasellus sit amet', NULL, 'pending', '2022-12-27 17:00:00'),
(64, 'Leonard', 'lmcquilliam1q@phpbb.com', '3054663954', 2, 50000, 'vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae donec pharetra magna', NULL, 'finished', '2023-05-17 17:00:00'),
(65, 'Jordanna', 'jmcmillian1r@homestead.com', '7591930950', 2, 50000, 'scelerisque mauris sit amet eros suspendisse accumsan tortor quis turpis sed ante vivamus tortor duis mattis egestas metus aenean fermentum donec ut mauris eget massa tempor convallis nulla neque libero convallis eget eleifend luctus ultricies eu nibh quisque id justo sit amet sapien dignissim', NULL, 'pending', '2024-06-21 17:00:00'),
(66, 'Roth', 'rdoncaster1s@boston.com', '7386629748', 1, 50000, 'nunc commodo placerat praesent blandit nam nulla integer pede justo lacinia eget tincidunt eget tempus vel pede morbi porttitor lorem id ligula suspendisse ornare consequat lectus in est risus auctor sed tristique in tempus sit amet sem fusce consequat nulla nisl', NULL, 'finished', '2022-06-24 17:00:00'),
(67, 'Chickie', 'cstanlike1t@yahoo.com', '8175359315', 2, 200000, 'erat curabitur gravida nisi at nibh in hac habitasse platea dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum at lorem integer tincidunt ante vel ipsum praesent blandit lacinia erat vestibulum sed magna at', NULL, 'finished', '2021-10-09 17:00:00'),
(68, 'Clemmy', 'cbaise1u@telegraph.co.uk', '7485639547', 1, 100000, 'vel sem sed sagittis nam congue risus semper porta volutpat quam pede lobortis ligula sit amet eleifend pede libero quis orci nullam molestie', NULL, 'finished', '2021-12-22 17:00:00'),
(69, 'Melva', 'mpressman1v@epa.gov', '4018083794', 1, 50000, 'vulputate ut ultrices vel augue vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae donec pharetra magna vestibulum aliquet ultrices erat tortor sollicitudin mi sit amet lobortis sapien sapien non mi integer ac neque duis bibendum morbi non quam nec dui', NULL, 'finished', '2022-03-17 17:00:00'),
(70, 'Kimbra', 'klidgerton1w@sciencedaily.com', '6009035839', 1, 50000, 'massa id lobortis convallis tortor risus dapibus augue vel accumsan tellus nisi eu orci mauris lacinia sapien quis libero nullam sit amet turpis elementum ligula vehicula', NULL, 'finished', '2021-07-07 17:00:00'),
(71, 'Michaeline', 'mkilfedder1x@uol.com.br', '6647809643', 2, 50000, 'venenatis turpis enim blandit mi in porttitor pede justo eu massa donec', NULL, 'pending', '2021-05-30 17:00:00'),
(72, 'Eugenius', 'esimonutti1y@xing.com', '8746641681', 1, 200000, 'eget eleifend luctus ultricies eu nibh quisque id justo sit amet sapien dignissim', NULL, 'pending', '2021-05-16 17:00:00'),
(73, 'Deirdre', 'dbartram1z@ocn.ne.jp', '1446702220', 2, 200000, 'vestibulum aliquet ultrices erat tortor sollicitudin mi sit amet lobortis sapien sapien non mi integer ac neque duis bibendum morbi non quam nec dui luctus', NULL, 'finished', '2024-01-12 17:00:00'),
(74, 'Irving', 'ielgar20@alibaba.com', '2974355905', 1, 200000, 'rutrum nulla nunc purus phasellus in felis donec semper sapien a libero nam dui proin leo odio porttitor id consequat in consequat ut nulla sed accumsan felis ut at dolor quis odio consequat varius integer ac leo pellentesque ultrices mattis odio donec vitae nisi nam ultrices libero non mattis pulvinar', NULL, 'pending', '2021-08-17 17:00:00'),
(75, 'Abdel', 'apleven21@360.cn', '2062365460', 1, 50000, 'orci nullam molestie nibh in lectus pellentesque at nulla suspendisse potenti cras in purus eu magna vulputate luctus cum sociis natoque penatibus', NULL, 'pending', '2022-04-17 17:00:00'),
(76, 'Davon', 'dbuckoke22@networkadvertising.org', '9337210865', 2, 100000, 'leo odio porttitor id consequat in consequat ut nulla sed accumsan felis ut at dolor quis odio consequat varius integer ac leo pellentesque ultrices mattis odio donec vitae nisi nam', NULL, 'finished', '2023-11-25 17:00:00'),
(77, 'Wylma', 'wblakesley23@1688.com', '9221240372', 1, 50000, 'morbi non lectus aliquam sit amet diam in magna bibendum imperdiet nullam orci', NULL, 'finished', '2023-03-12 17:00:00'),
(78, 'Jervis', 'jbrammar24@virginia.edu', '6749356504', 1, 50000, 'elementum in hac habitasse platea dictumst morbi vestibulum velit id pretium iaculis diam erat fermentum justo nec condimentum neque sapien placerat ante', NULL, 'finished', '2024-04-05 17:00:00'),
(79, 'Jard', 'jtrump25@springer.com', '5094009502', 2, 200000, 'quisque id justo sit amet sapien dignissim vestibulum vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae nulla dapibus dolor vel est donec odio justo sollicitudin ut suscipit a feugiat et eros vestibulum ac est lacinia nisi venenatis tristique fusce congue', NULL, 'finished', '2021-07-07 17:00:00'),
(80, 'Alleen', 'akinahan26@ustream.tv', '9431643353', 1, 200000, 'ornare imperdiet sapien urna pretium nisl ut volutpat sapien arcu sed augue aliquam erat volutpat in congue etiam justo etiam pretium iaculis justo in hac habitasse platea dictumst', NULL, 'pending', '2023-02-26 17:00:00'),
(81, 'Celestina', 'cvakhrushev27@instagram.com', '8525362425', 1, 50000, 'a libero nam dui proin leo odio porttitor id consequat in consequat ut nulla sed accumsan felis ut at dolor quis odio consequat varius integer ac leo pellentesque ultrices mattis odio donec vitae nisi nam ultrices libero non mattis pulvinar nulla pede ullamcorper augue', NULL, 'pending', '2023-06-05 17:00:00'),
(82, 'Genna', 'gkamien28@sakura.ne.jp', '6917171748', 2, 50000, 'maecenas tristique est et tempus semper est quam pharetra magna ac consequat metus sapien ut nunc vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae mauris viverra diam vitae', NULL, 'finished', '2020-12-31 17:00:00'),
(83, 'Katherine', 'kkinnerk29@dyndns.org', '8723943783', 1, 50000, 'massa quis augue luctus tincidunt nulla mollis molestie lorem quisque ut erat curabitur gravida nisi at nibh in hac habitasse platea dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum at lorem integer tincidunt ante vel ipsum praesent blandit lacinia erat vestibulum', NULL, 'finished', '2021-04-26 17:00:00'),
(84, 'Ellette', 'eearry2a@4shared.com', '6718907799', 2, 100000, 'ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae donec pharetra magna vestibulum aliquet ultrices erat tortor sollicitudin mi sit amet lobortis sapien sapien non mi integer ac neque duis bibendum morbi non quam nec dui luctus rutrum nulla tellus', NULL, 'finished', '2022-06-30 17:00:00'),
(85, 'Magdalen', 'mbarford2b@addthis.com', '5595837839', 2, 50000, 'orci luctus et ultrices posuere cubilia curae donec pharetra magna vestibulum aliquet ultrices erat tortor sollicitudin mi sit amet lobortis sapien sapien non mi integer ac neque duis bibendum morbi non quam nec dui luctus rutrum nulla tellus in sagittis dui vel nisl duis ac nibh', NULL, 'pending', '2022-08-19 17:00:00'),
(86, 'Ham', 'hplaide2c@paginegialle.it', '7533790382', 2, 100000, 'pede libero quis orci nullam molestie nibh in lectus pellentesque at nulla suspendisse potenti cras in', NULL, 'finished', '2022-08-13 17:00:00'),
(87, 'Billy', 'bcaris2d@columbia.edu', '7934939191', 2, 100000, 'amet nunc viverra dapibus nulla suscipit ligula in lacus curabitur at ipsum ac tellus semper interdum mauris ullamcorper purus sit amet nulla quisque arcu libero rutrum ac lobortis vel', NULL, 'finished', '2021-05-24 17:00:00'),
(88, 'Reinald', 'rpamphilon2e@go.com', '5742996345', 2, 100000, 'vestibulum sit amet cursus id turpis integer aliquet massa id lobortis convallis tortor risus dapibus augue vel accumsan tellus nisi eu orci mauris', NULL, 'finished', '2022-11-08 17:00:00'),
(89, 'Jorgan', 'jmitie2f@dropbox.com', '5622433505', 2, 200000, 'odio curabitur convallis duis consequat dui nec nisi volutpat eleifend donec ut dolor morbi vel lectus in quam fringilla rhoncus mauris enim leo rhoncus sed vestibulum sit amet cursus id turpis integer aliquet massa id lobortis convallis tortor risus dapibus augue vel accumsan tellus', NULL, 'finished', '2022-12-09 17:00:00'),
(90, 'Alberta', 'astackbridge2g@reddit.com', '9237911205', 2, 200000, 'quam pharetra magna ac consequat metus sapien ut nunc vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae mauris viverra diam vitae', NULL, 'pending', '2021-01-07 17:00:00'),
(91, 'Roselin', 'rgibbeson2h@myspace.com', '6489874270', 2, 200000, 'ornare consequat lectus in est risus auctor sed tristique in tempus sit', NULL, 'pending', '2023-06-26 17:00:00'),
(92, 'Sanders', 'scabral2i@wisc.edu', '7658600649', 1, 100000, 'vulputate justo in blandit ultrices enim lorem ipsum dolor sit', NULL, 'finished', '2024-03-14 17:00:00'),
(93, 'Alleen', 'amawne2j@skype.com', '1182461483', 1, 100000, 'justo sollicitudin ut suscipit a feugiat et eros vestibulum ac est lacinia nisi venenatis tristique fusce congue diam id ornare imperdiet sapien urna pretium nisl ut volutpat sapien arcu sed augue aliquam erat volutpat in congue etiam justo etiam pretium', NULL, 'pending', '2021-03-14 17:00:00'),
(94, 'Elinore', 'eechallie2k@psu.edu', '3879959501', 1, 100000, 'cras pellentesque volutpat dui maecenas tristique est et tempus semper est quam pharetra magna ac consequat metus sapien ut nunc vestibulum ante ipsum primis in faucibus orci', NULL, 'finished', '2023-04-12 17:00:00'),
(95, 'Wallas', 'wbatson2l@wufoo.com', '2218032126', 2, 100000, 'habitasse platea dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum at lorem integer tincidunt', NULL, 'finished', '2023-11-11 17:00:00'),
(96, 'Barde', 'boxby2m@deviantart.com', '6919920519', 1, 50000, 'elementum ligula vehicula consequat morbi a ipsum integer a nibh in quis justo maecenas rhoncus aliquam lacus morbi quis tortor id nulla ultrices aliquet maecenas leo odio condimentum id luctus nec molestie', NULL, 'pending', '2024-01-20 17:00:00'),
(97, 'Ruttger', 'rbucklan2n@e-recht24.de', '6676632796', 1, 100000, 'mi pede malesuada in imperdiet et commodo vulputate justo in blandit ultrices enim lorem ipsum dolor sit amet consectetuer adipiscing elit proin interdum mauris non ligula pellentesque ultrices phasellus id sapien in sapien iaculis congue vivamus metus', NULL, 'pending', '2023-05-25 17:00:00'),
(98, 'May', 'mjancik2o@dot.gov', '9094426275', 2, 200000, 'eleifend luctus ultricies eu nibh quisque id justo sit amet sapien dignissim vestibulum vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia', NULL, 'pending', '2024-06-29 17:00:00'),
(99, 'Cobb', 'cextil2p@reddit.com', '6293114607', 1, 50000, 'odio in hac habitasse platea dictumst maecenas ut massa quis augue luctus tincidunt nulla mollis molestie lorem', NULL, 'pending', '2021-10-16 17:00:00'),
(100, 'Krystyna', 'kgrigoletti2q@sfgate.com', '6125181898', 1, 100000, 'turpis elementum ligula vehicula consequat morbi a ipsum integer a nibh in quis justo maecenas rhoncus aliquam lacus morbi quis tortor id nulla ultrices aliquet maecenas leo odio condimentum id luctus nec', NULL, 'finished', '2023-08-28 17:00:00'),
(101, 'Mannie', 'mscothron2r@cargocollective.com', '9149093905', 1, 100000, 'ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae mauris viverra diam vitae quam suspendisse potenti nullam porttitor lacus at turpis donec posuere metus vitae ipsum aliquam non mauris morbi non lectus aliquam', NULL, 'finished', '2023-08-12 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$Z5TYvVIppnnXpcNxHqY//uwUdvPzcKhkjtWS.WzQzycCeiE3LdeAa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `model_pembayaran`
--
ALTER TABLE `model_pembayaran`
  ADD PRIMARY KEY (`id_model`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`),
  ADD KEY `id_model` (`id_model`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `model_pembayaran`
--
ALTER TABLE `model_pembayaran`
  MODIFY `id_model` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_model`) REFERENCES `model_pembayaran` (`id_model`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
