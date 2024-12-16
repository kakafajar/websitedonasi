-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2024 at 01:48 PM
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
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `model_pembayaran`
--

INSERT INTO `model_pembayaran` (`id_model`, `metode`, `keterangan`) VALUES
(26, 'Transfer Bank', '1234567'),
(27, 'bri', '125151');

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
(1, 'Lay', 'labramcik0@state.tx.us', '7505486734', 27, 71394, 'sapien in sapien iaculis congue vivamus metus arcu adipiscing molestie hendrerit at vulputate vitae nisl aenean lectus pellentesque eget nunc donec quis orci eget orci vehicula condimentum curabitur in libero', NULL, 'pending', '2024-08-01 17:00:00'),
(2, 'Aaron', 'abruckenthal1@seattletimes.com', '9218887915', 27, 78763, 'libero ut massa volutpat convallis morbi odio odio elementum eu interdum eu tincidunt in leo maecenas pulvinar lobortis est phasellus sit amet erat nulla tempus vivamus in felis eu sapien cursus vestibulum proin eu mi nulla ac enim in tempor turpis nec euismod scelerisque quam turpis adipiscing lorem vitae', NULL, 'pending', '2024-09-04 17:00:00'),
(3, 'Quincy', 'qbremmell2@chronoengine.com', '4283186433', 26, 81590, 'vestibulum eget vulputate ut ultrices vel augue vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae donec', NULL, 'pending', '2024-09-21 17:00:00'),
(4, 'Poppy', 'preely3@umn.edu', '6271669095', 26, 85141, 'aliquam augue quam sollicitudin vitae consectetuer eget rutrum at lorem integer tincidunt ante vel ipsum praesent blandit lacinia erat vestibulum sed magna at nunc commodo placerat praesent blandit nam nulla integer pede justo lacinia eget tincidunt eget tempus vel pede morbi porttitor lorem id', NULL, 'pending', '2024-03-13 17:00:00'),
(5, 'Margy', 'mhuey4@dmoz.org', '5221038305', 27, 92452, 'vestibulum eget vulputate ut ultrices vel augue vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae donec pharetra magna vestibulum', NULL, 'finished', '2024-07-23 17:00:00'),
(6, 'Antons', 'askinner5@nature.com', '9648644682', 26, 65146, 'massa volutpat convallis morbi odio odio elementum eu interdum eu tincidunt in leo maecenas pulvinar lobortis est phasellus sit amet erat nulla tempus vivamus in felis eu sapien cursus vestibulum', NULL, 'pending', '2024-06-29 17:00:00'),
(7, 'Melba', 'mstentiford6@taobao.com', '4262975347', 27, 56697, 'ipsum aliquam non mauris morbi non lectus aliquam sit amet diam in magna bibendum imperdiet nullam orci pede venenatis non sodales sed tincidunt eu felis fusce', NULL, 'finished', '2024-02-21 17:00:00'),
(8, 'Guido', 'gpetherick7@facebook.com', '4195964102', 27, 91481, 'ut tellus nulla ut erat id mauris vulputate elementum nullam varius nulla facilisi cras non velit nec nisi vulputate nonummy maecenas tincidunt lacus at velit vivamus vel nulla eget eros elementum pellentesque quisque porta volutpat erat quisque erat eros viverra', NULL, 'finished', '2024-09-18 17:00:00'),
(9, 'Jaclin', 'jrosingdall8@soundcloud.com', '5293845109', 27, 55906, 'sed augue aliquam erat volutpat in congue etiam justo etiam pretium', NULL, 'finished', '2024-10-03 17:00:00'),
(10, 'Juana', 'jdelasci9@purevolume.com', '4223745986', 27, 71967, 'eu nibh quisque id justo sit amet sapien dignissim vestibulum vestibulum ante ipsum primis in faucibus orci luctus', NULL, 'finished', '2024-09-27 17:00:00'),
(11, 'Nate', 'nshoosmitha@jiathis.com', '1879420890', 27, 69798, 'fusce congue diam id ornare imperdiet sapien urna pretium nisl ut volutpat sapien arcu sed augue aliquam erat volutpat in congue etiam justo etiam pretium iaculis justo in hac habitasse platea', NULL, 'finished', '2024-01-28 17:00:00'),
(12, 'Mose', 'mbarbaryb@vkontakte.ru', '3381374232', 27, 58929, 'libero nam dui proin leo odio porttitor id consequat in consequat ut nulla sed accumsan felis ut at dolor quis odio consequat varius integer ac leo pellentesque ultrices mattis odio donec vitae nisi nam ultrices libero non mattis pulvinar', NULL, 'finished', '2024-04-13 17:00:00'),
(13, 'Thekla', 'tmacmarcuisc@cnet.com', '8569851033', 26, 85983, 'diam vitae quam suspendisse potenti nullam porttitor lacus at turpis donec', NULL, 'finished', '2024-10-03 17:00:00'),
(14, 'Bronson', 'bbealsd@cmu.edu', '7398248242', 26, 83690, 'id pretium iaculis diam erat fermentum justo nec condimentum neque sapien placerat ante nulla justo aliquam quis turpis eget elit sodales scelerisque mauris sit amet eros suspendisse accumsan tortor quis turpis sed ante vivamus tortor duis mattis egestas metus aenean fermentum donec ut', NULL, 'finished', '2024-09-02 17:00:00'),
(15, 'Smith', 'stukee@instagram.com', '3844652991', 27, 54548, 'porttitor lacus at turpis donec posuere metus vitae ipsum aliquam non mauris morbi non lectus aliquam sit amet diam in magna bibendum imperdiet nullam orci pede venenatis non sodales sed tincidunt', NULL, 'pending', '2024-07-18 17:00:00'),
(16, 'Maurine', 'mserginsonf@buzzfeed.com', '9319328951', 27, 98862, 'ac nulla sed vel enim sit amet nunc viverra dapibus nulla suscipit ligula in lacus curabitur at ipsum ac tellus semper interdum mauris ullamcorper purus', NULL, 'finished', '2024-04-22 17:00:00'),
(17, 'Hally', 'hverteyg@fda.gov', '5922059006', 26, 60623, 'augue luctus tincidunt nulla mollis molestie lorem quisque ut erat curabitur gravida nisi at nibh in hac habitasse platea dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum at lorem integer tincidunt ante vel', NULL, 'pending', '2024-04-15 17:00:00'),
(18, 'Virgie', 'vfotherbyh@booking.com', '6063531038', 26, 67535, 'erat curabitur gravida nisi at nibh in hac habitasse platea dictumst aliquam augue quam', NULL, 'finished', '2024-11-03 17:00:00'),
(19, 'Joyous', 'jdarrigonei@weebly.com', '7989885825', 26, 82557, 'tincidunt lacus at velit vivamus vel nulla eget eros elementum pellentesque quisque porta volutpat erat quisque erat eros viverra eget congue eget semper rutrum nulla nunc purus phasellus in felis donec semper sapien a libero nam', NULL, 'finished', '2024-03-10 17:00:00'),
(20, 'Jerrylee', 'jseggiej@economist.com', '7071581313', 27, 95348, 'nisl duis bibendum felis sed interdum venenatis turpis enim blandit mi in porttitor pede justo eu massa donec dapibus duis at', NULL, 'pending', '2024-01-24 17:00:00'),
(21, 'Normie', 'neastcottk@cam.ac.uk', '1341796011', 26, 52215, 'vehicula condimentum curabitur in libero ut massa volutpat convallis morbi odio odio elementum eu interdum', NULL, 'pending', '2024-06-28 17:00:00'),
(22, 'Raffaello', 'rliddiardl@csmonitor.com', '1487550196', 27, 93702, 'blandit mi in porttitor pede justo eu massa donec dapibus duis at velit eu est congue elementum in hac habitasse platea dictumst morbi vestibulum velit id pretium iaculis diam', NULL, 'pending', '2024-11-14 17:00:00'),
(23, 'Enrica', 'educkhamm@imageshack.us', '8039449039', 26, 90067, 'aenean auctor gravida sem praesent id massa id nisl venenatis lacinia aenean sit amet justo morbi ut odio cras mi pede malesuada in imperdiet et commodo vulputate justo in blandit ultrices enim lorem ipsum dolor', NULL, 'pending', '2024-01-19 17:00:00'),
(24, 'Imojean', 'imccrearyn@sitemeter.com', '9247264275', 26, 98568, 'quis lectus suspendisse potenti in eleifend quam a odio in hac habitasse platea dictumst maecenas', NULL, 'pending', '2024-04-12 17:00:00'),
(25, 'Sibby', 'sbentjenso@globo.com', '4937043131', 26, 53999, 'primis in faucibus orci luctus et ultrices posuere cubilia curae mauris viverra diam vitae quam suspendisse potenti nullam porttitor lacus at turpis donec posuere metus vitae ipsum aliquam non mauris', NULL, 'finished', '2024-02-27 17:00:00'),
(26, 'Carleton', 'cquinnetp@google.co.jp', '4638835262', 27, 96979, 'sit amet diam in magna bibendum imperdiet nullam orci pede venenatis non sodales sed tincidunt eu felis fusce posuere felis sed lacus morbi sem mauris laoreet ut rhoncus aliquet pulvinar sed nisl nunc rhoncus dui vel', NULL, 'finished', '2024-10-15 17:00:00'),
(27, 'Winfred', 'wcreechq@ft.com', '3352938770', 27, 69672, 'molestie hendrerit at vulputate vitae nisl aenean lectus pellentesque eget nunc donec quis orci eget orci vehicula condimentum curabitur in libero ut massa volutpat convallis morbi odio odio elementum eu interdum eu tincidunt in leo maecenas pulvinar lobortis est phasellus sit amet erat nulla tempus vivamus', NULL, 'pending', '2024-03-04 17:00:00'),
(28, 'Deonne', 'dhuxterr@narod.ru', '5646640492', 27, 81439, 'sed justo pellentesque viverra pede ac diam cras pellentesque volutpat dui maecenas', NULL, 'pending', '2024-03-14 17:00:00'),
(29, 'Anallise', 'aelvidges@tuttocitta.it', '4679566621', 27, 67738, 'quisque porta volutpat erat quisque erat eros viverra eget congue eget semper rutrum nulla nunc purus phasellus in felis donec semper sapien a libero nam dui', NULL, 'finished', '2024-10-13 17:00:00'),
(30, 'Amalea', 'aincet@e-recht24.de', '7521291659', 27, 68925, 'sollicitudin vitae consectetuer eget rutrum at lorem integer tincidunt ante vel ipsum praesent blandit lacinia erat vestibulum sed magna at nunc commodo', NULL, 'pending', '2024-02-08 17:00:00'),
(31, 'Rena', 'rattou@loc.gov', '3482909482', 27, 71167, 'sit amet diam in magna bibendum imperdiet nullam orci pede venenatis non sodales sed tincidunt eu felis fusce posuere felis sed lacus morbi', NULL, 'finished', '2024-03-20 17:00:00'),
(32, 'Mariellen', 'mlongmirev@wufoo.com', '9946443535', 27, 79327, 'dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum at', NULL, 'pending', '2024-02-04 17:00:00'),
(33, 'Rachelle', 'roleksinskiw@pagesperso-orange.fr', '2996604549', 27, 52034, 'purus eu magna vulputate luctus cum sociis natoque penatibus et magnis dis parturient montes', NULL, 'pending', '2024-07-04 17:00:00'),
(34, 'Anet', 'aglanesterx@hexun.com', '9826165970', 26, 90897, 'nulla neque libero convallis eget eleifend luctus ultricies eu nibh quisque id justo sit amet sapien dignissim vestibulum vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae nulla dapibus dolor vel est donec odio justo sollicitudin ut suscipit a feugiat et eros vestibulum ac est lacinia', NULL, 'finished', '2024-08-08 17:00:00'),
(35, 'Tammie', 'tmcgintyy@domainmarket.com', '3873442215', 27, 58909, 'justo sollicitudin ut suscipit a feugiat et eros vestibulum ac est lacinia nisi venenatis tristique fusce congue diam id ornare imperdiet sapien urna pretium nisl ut volutpat sapien arcu sed', NULL, 'finished', '2024-05-20 17:00:00'),
(36, 'Quinlan', 'qelnorz@washingtonpost.com', '1811940910', 27, 64435, 'blandit mi in porttitor pede justo eu massa donec dapibus duis at velit eu est', NULL, 'finished', '2024-02-04 17:00:00'),
(37, 'Christal', 'cgonsalvez10@vk.com', '7445719617', 27, 86984, 'felis sed lacus morbi sem mauris laoreet ut rhoncus aliquet pulvinar sed nisl nunc rhoncus dui vel sem sed sagittis nam congue risus semper porta volutpat quam pede lobortis ligula sit amet eleifend', NULL, 'finished', '2024-06-11 17:00:00'),
(38, 'Bernette', 'bmarjoram11@comsenz.com', '6516811106', 26, 98006, 'curabitur in libero ut massa volutpat convallis morbi odio odio elementum eu interdum eu tincidunt in leo maecenas pulvinar lobortis est phasellus sit amet erat nulla tempus vivamus in felis eu sapien cursus vestibulum proin eu mi nulla ac enim in', NULL, 'finished', '2024-09-01 17:00:00'),
(39, 'Dallis', 'dcrutcher12@mediafire.com', '7084995344', 27, 96516, 'at turpis a pede posuere nonummy integer non velit donec diam neque vestibulum eget vulputate ut ultrices vel augue vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae donec pharetra magna', NULL, 'finished', '2024-02-17 17:00:00'),
(40, 'Tripp', 'tnancarrow13@house.gov', '4553388863', 26, 76084, 'habitasse platea dictumst etiam faucibus cursus urna ut tellus nulla ut erat id mauris vulputate elementum nullam varius nulla facilisi cras non velit nec nisi vulputate nonummy maecenas tincidunt lacus at velit vivamus vel nulla eget eros elementum pellentesque quisque porta volutpat erat quisque erat eros viverra eget', NULL, 'pending', '2024-04-24 17:00:00'),
(41, 'Gunar', 'gadair14@istockphoto.com', '7587475203', 26, 71428, 'praesent id massa id nisl venenatis lacinia aenean sit amet justo morbi ut odio cras mi pede malesuada in imperdiet et commodo vulputate', NULL, 'finished', '2024-10-19 17:00:00'),
(42, 'Burg', 'briggs15@fc2.com', '7088107274', 27, 85983, 'blandit ultrices enim lorem ipsum dolor sit amet consectetuer adipiscing elit proin interdum', NULL, 'finished', '2024-02-09 17:00:00'),
(43, 'Lolita', 'lchetham16@arstechnica.com', '4881038446', 27, 57154, 'sollicitudin ut suscipit a feugiat et eros vestibulum ac est lacinia nisi venenatis tristique fusce congue diam id ornare imperdiet sapien urna pretium nisl ut volutpat sapien', NULL, 'pending', '2024-07-09 17:00:00'),
(44, 'Norean', 'nhentzeler17@dyndns.org', '6879055955', 27, 96848, 'sapien ut nunc vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae mauris viverra diam vitae quam suspendisse potenti nullam porttitor lacus at turpis donec posuere metus vitae ipsum aliquam non mauris morbi non', NULL, 'finished', '2024-01-18 17:00:00'),
(45, 'Udale', 'ualben18@independent.co.uk', '8376250333', 26, 97562, 'nam ultrices libero non mattis pulvinar nulla pede ullamcorper augue a suscipit nulla elit ac nulla sed vel enim sit amet nunc viverra dapibus nulla suscipit ligula in lacus curabitur at ipsum ac', NULL, 'pending', '2024-06-01 17:00:00'),
(46, 'Gina', 'ghammonds19@meetup.com', '9667919106', 26, 82001, 'neque sapien placerat ante nulla justo aliquam quis turpis eget elit sodales scelerisque mauris sit amet eros suspendisse accumsan tortor quis turpis sed ante vivamus tortor duis mattis egestas metus aenean fermentum donec ut mauris eget massa tempor convallis nulla neque libero', NULL, 'finished', '2024-02-05 17:00:00'),
(47, 'Daphne', 'dsherland1a@cdbaby.com', '5365541568', 26, 98527, 'mauris laoreet ut rhoncus aliquet pulvinar sed nisl nunc rhoncus dui vel sem sed sagittis nam', NULL, 'pending', '2024-04-10 17:00:00'),
(48, 'Izaak', 'idumphry1b@a8.net', '6471185172', 26, 90928, 'cursus vestibulum proin eu mi nulla ac enim in tempor', NULL, 'finished', '2024-03-24 17:00:00'),
(49, 'Miof mela', 'mlequesne1c@netvibes.com', '2572643800', 27, 73369, 'ultrices enim lorem ipsum dolor sit amet consectetuer adipiscing elit proin interdum mauris non ligula pellentesque ultrices phasellus id sapien in sapien iaculis congue vivamus metus arcu adipiscing molestie hendrerit at vulputate vitae nisl aenean lectus pellentesque eget nunc donec quis orci eget', NULL, 'finished', '2024-05-05 17:00:00'),
(50, 'Dorri', 'dronchka1d@zdnet.com', '3583616184', 26, 56749, 'primis in faucibus orci luctus et ultrices posuere cubilia curae nulla dapibus dolor vel est donec odio justo sollicitudin ut suscipit a feugiat et', NULL, 'pending', '2024-02-03 17:00:00'),
(51, 'Samaria', 'sokie1e@google.fr', '7091076968', 27, 77444, 'quam pede lobortis ligula sit amet eleifend pede libero quis orci nullam molestie nibh in lectus pellentesque at nulla', NULL, 'pending', '2024-01-13 17:00:00'),
(52, 'Rodney', 'rcarlyon1f@edublogs.org', '2668968928', 27, 66701, 'vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae nulla dapibus dolor vel est donec odio justo sollicitudin ut suscipit a feugiat et eros vestibulum ac est lacinia nisi venenatis tristique fusce congue diam id ornare imperdiet sapien urna pretium nisl ut volutpat sapien arcu sed', NULL, 'pending', '2024-05-08 17:00:00'),
(53, 'Robina', 'rroderick1g@ustream.tv', '7862867996', 27, 90181, 'purus aliquet at feugiat non pretium quis lectus suspendisse potenti in eleifend quam a odio in hac habitasse platea dictumst maecenas ut massa quis augue luctus tincidunt nulla mollis molestie lorem quisque ut erat curabitur gravida', NULL, 'pending', '2024-06-18 17:00:00'),
(54, 'Vonnie', 'vupwood1h@mysql.com', '9494862109', 26, 53732, 'amet consectetuer adipiscing elit proin risus praesent lectus vestibulum quam sapien varius ut blandit non interdum in ante vestibulum ante', NULL, 'pending', '2024-02-21 17:00:00'),
(55, 'Georges', 'gjaxon1i@icq.com', '9238317029', 26, 57649, 'augue vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae donec pharetra magna vestibulum aliquet', NULL, 'finished', '2024-11-21 17:00:00'),
(56, 'Barrett', 'bhuggin1j@unicef.org', '4541615618', 26, 93281, 'nulla sed vel enim sit amet nunc viverra dapibus nulla suscipit ligula in', NULL, 'finished', '2024-01-20 17:00:00'),
(57, 'Eachelle', 'ebowart1k@cam.ac.uk', '2624194092', 26, 99154, 'quis tortor id nulla ultrices aliquet maecenas leo odio condimentum id luctus nec molestie sed justo pellentesque viverra pede ac diam cras pellentesque volutpat dui maecenas tristique est et tempus semper est quam pharetra magna ac consequat metus sapien ut nunc vestibulum', NULL, 'pending', '2024-05-24 17:00:00'),
(58, 'Zita', 'zrunnalls1l@slideshare.net', '9598683647', 27, 68305, 'fusce posuere felis sed lacus morbi sem mauris laoreet ut rhoncus aliquet pulvinar sed nisl nunc rhoncus dui vel sem sed sagittis nam congue risus semper porta volutpat quam pede lobortis ligula sit amet eleifend pede libero quis orci nullam', NULL, 'finished', '2024-08-15 17:00:00'),
(59, 'Barbe', 'bclayborn1m@delicious.com', '8549907424', 27, 87218, 'sapien non mi integer ac neque duis bibendum morbi non quam nec dui luctus rutrum nulla tellus in sagittis dui vel nisl duis ac nibh fusce lacus purus', NULL, 'finished', '2024-07-15 17:00:00'),
(60, 'Karoline', 'ktonner1n@hexun.com', '7325036259', 26, 80886, 'platea dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum at lorem integer tincidunt ante vel ipsum praesent blandit lacinia erat vestibulum sed magna at nunc', NULL, 'finished', '2024-08-07 17:00:00'),
(61, 'Kelley', 'kchurchley1o@jigsy.com', '2628205293', 27, 65708, 'dolor sit amet consectetuer adipiscing elit proin interdum mauris non ligula pellentesque ultrices phasellus id sapien in sapien iaculis congue vivamus metus arcu adipiscing molestie hendrerit at vulputate vitae nisl aenean lectus pellentesque eget nunc donec quis orci', NULL, 'finished', '2024-02-09 17:00:00'),
(62, 'Obie', 'oguillart1p@bing.com', '1751715986', 27, 95219, 'eget tincidunt eget tempus vel pede morbi porttitor lorem id ligula suspendisse ornare consequat lectus in est risus auctor sed tristique in tempus sit amet sem fusce consequat nulla nisl nunc nisl', NULL, 'pending', '2024-08-05 17:00:00'),
(63, 'Millie', 'mcordon1q@mozilla.org', '8649386539', 26, 71588, 'turpis eget elit sodales scelerisque mauris sit amet eros suspendisse accumsan tortor quis turpis sed ante vivamus tortor duis mattis egestas metus aenean fermentum donec ut mauris eget massa tempor convallis nulla neque libero convallis eget eleifend luctus ultricies eu nibh quisque', NULL, 'pending', '2024-09-05 17:00:00'),
(64, 'Gardner', 'ggallo1r@stumbleupon.com', '3352062402', 26, 77936, 'sit amet eros suspendisse accumsan tortor quis turpis sed ante vivamus', NULL, 'pending', '2024-12-12 17:00:00'),
(65, 'Pepe', 'pboatwright1s@microsoft.com', '2004606950', 26, 69608, 'posuere metus vitae ipsum aliquam non mauris morbi non lectus aliquam sit amet diam in magna bibendum imperdiet nullam orci pede venenatis non sodales sed tincidunt', NULL, 'pending', '2024-08-30 17:00:00'),
(66, 'Gregoire', 'gbuckmaster1t@pcworld.com', '1312208489', 26, 78466, 'porttitor lorem id ligula suspendisse ornare consequat lectus in est risus auctor sed tristique in tempus sit amet', NULL, 'finished', '2024-07-12 17:00:00'),
(67, 'Jana', 'jochterlonie1u@samsung.com', '4572419320', 26, 85861, 'ipsum dolor sit amet consectetuer adipiscing elit proin risus praesent lectus vestibulum quam sapien varius ut blandit non interdum in ante vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae duis faucibus accumsan odio curabitur convallis duis consequat dui nec nisi volutpat eleifend donec ut', NULL, 'finished', '2024-12-04 17:00:00'),
(68, 'Francklin', 'fedworthy1v@japanpost.jp', '1492297361', 26, 74671, 'nascetur ridiculus mus etiam vel augue vestibulum rutrum rutrum neque aenean auctor gravida sem praesent id massa id nisl venenatis lacinia aenean sit amet justo morbi ut odio cras mi pede malesuada in', NULL, 'pending', '2024-02-12 17:00:00'),
(69, 'Karel', 'kstainland1w@smugmug.com', '2019122965', 26, 55470, 'vel sem sed sagittis nam congue risus semper porta volutpat quam pede lobortis ligula sit amet eleifend pede libero quis orci nullam molestie nibh in lectus pellentesque at nulla suspendisse potenti cras in purus eu magna vulputate luctus cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus', NULL, 'pending', '2024-07-15 17:00:00'),
(70, 'Nananne', 'ngoligly1x@rambler.ru', '9331179187', 26, 83355, 'nulla suspendisse potenti cras in purus eu magna vulputate luctus cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus vivamus vestibulum sagittis sapien cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus etiam vel augue vestibulum rutrum', NULL, 'pending', '2024-01-21 17:00:00'),
(71, 'Laurianne', 'leyden1y@a8.net', '2394386802', 26, 68160, 'nulla ac enim in tempor turpis nec euismod scelerisque quam turpis adipiscing lorem vitae mattis nibh', NULL, 'pending', '2024-03-30 17:00:00'),
(72, 'Patricia', 'pshattock1z@google.de', '9048976712', 26, 60691, 'est risus auctor sed tristique in tempus sit amet sem fusce consequat nulla nisl nunc nisl duis bibendum felis sed interdum venenatis turpis enim blandit mi in porttitor pede justo eu massa donec dapibus duis at velit eu est', NULL, 'pending', '2024-02-11 17:00:00'),
(73, 'Rhea', 'rwiggett20@cdbaby.com', '4838160196', 26, 64965, 'id lobortis convallis tortor risus dapibus augue vel accumsan tellus nisi eu orci mauris lacinia sapien quis libero nullam', NULL, 'finished', '2024-05-21 17:00:00'),
(74, 'Brunhilde', 'bpellant21@shareasale.com', '1631226988', 27, 75575, 'placerat ante nulla justo aliquam quis turpis eget elit sodales scelerisque mauris sit amet eros suspendisse accumsan tortor quis turpis sed ante vivamus tortor duis mattis egestas metus aenean fermentum donec ut mauris eget massa tempor convallis', NULL, 'pending', '2024-04-22 17:00:00'),
(75, 'Goran', 'gfeatherstonhalgh22@google.com.br', '2212113629', 27, 78490, 'vel augue vestibulum rutrum rutrum neque aenean auctor gravida sem praesent id massa id nisl venenatis lacinia aenean sit amet justo morbi ut odio cras mi pede malesuada in imperdiet et commodo vulputate justo', NULL, 'finished', '2024-05-06 17:00:00'),
(76, 'Lorens', 'ltitt23@ft.com', '8897805425', 27, 93851, 'justo pellentesque viverra pede ac diam cras pellentesque volutpat dui maecenas tristique est et tempus semper est quam pharetra magna ac', NULL, 'pending', '2024-01-23 17:00:00'),
(77, 'Darcie', 'dcoiley24@tamu.edu', '7435872734', 26, 60520, 'elementum ligula vehicula consequat morbi a ipsum integer a nibh in quis justo maecenas rhoncus aliquam lacus morbi quis tortor id nulla ultrices aliquet maecenas leo odio condimentum id luctus nec molestie sed justo pellentesque viverra pede ac diam cras pellentesque volutpat dui maecenas tristique est et tempus', NULL, 'finished', '2024-02-14 17:00:00'),
(78, 'Iolanthe', 'imcroberts25@toplist.cz', '3037196276', 27, 73220, 'diam cras pellentesque volutpat dui maecenas tristique est et tempus semper est quam pharetra magna ac consequat metus sapien ut nunc vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae mauris viverra diam vitae', NULL, 'pending', '2024-08-15 17:00:00'),
(79, 'Thomas', 'theaysman26@instagram.com', '4433863264', 26, 85881, 'nulla suspendisse potenti cras in purus eu magna vulputate luctus cum', NULL, 'finished', '2024-07-17 17:00:00'),
(80, 'Cory', 'collet27@engadget.com', '4017653016', 27, 91649, 'dolor sit amet consectetuer adipiscing elit proin interdum mauris non ligula pellentesque ultrices phasellus id sapien in sapien iaculis congue vivamus metus arcu adipiscing molestie hendrerit at vulputate vitae nisl aenean lectus pellentesque eget nunc donec quis orci eget orci vehicula condimentum curabitur in libero ut massa volutpat convallis morbi', NULL, 'finished', '2024-10-10 17:00:00'),
(81, 'Huntlee', 'hpyzer28@blogtalkradio.com', '3213448957', 26, 76540, 'dolor vel est donec odio justo sollicitudin ut suscipit a feugiat et eros vestibulum ac est lacinia nisi venenatis tristique fusce congue diam id ornare imperdiet sapien urna pretium nisl ut volutpat sapien arcu sed augue aliquam erat volutpat in congue', NULL, 'finished', '2024-06-03 17:00:00'),
(82, 'Odelinda', 'oobrallaghan29@pen.io', '6592668438', 27, 56504, 'pulvinar lobortis est phasellus sit amet erat nulla tempus vivamus in felis eu sapien cursus vestibulum proin eu mi nulla ac enim in tempor turpis nec euismod scelerisque quam turpis adipiscing lorem vitae mattis nibh ligula nec sem duis aliquam convallis nunc proin at', NULL, 'pending', '2024-03-14 17:00:00'),
(83, 'Kincaid', 'ksylett2a@unesco.org', '7844903558', 26, 58970, 'eget eros elementum pellentesque quisque porta volutpat erat quisque erat eros viverra eget congue eget semper rutrum nulla nunc purus phasellus in felis', NULL, 'finished', '2024-10-05 17:00:00'),
(84, 'Nerty', 'nlong2b@adobe.com', '2454969509', 26, 58000, 'rutrum neque aenean auctor gravida sem praesent id massa id nisl venenatis', NULL, 'finished', '2024-07-28 17:00:00'),
(85, 'Kelwin', 'knewlands2c@businesswire.com', '9509379082', 27, 95876, 'nullam orci pede venenatis non sodales sed tincidunt eu felis fusce posuere felis sed lacus morbi sem mauris laoreet ut rhoncus aliquet pulvinar sed nisl nunc rhoncus dui vel sem sed sagittis nam congue risus', NULL, 'finished', '2024-09-15 17:00:00'),
(86, 'Charleen', 'cjervis2d@ezinearticles.com', '5719613018', 26, 95412, 'praesent lectus vestibulum quam sapien varius ut blandit non interdum in ante vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae duis faucibus accumsan odio curabitur convallis duis consequat dui nec nisi volutpat eleifend donec ut dolor morbi vel', NULL, 'pending', '2024-02-06 17:00:00'),
(87, 'Freddy', 'fyukhtin2e@ucoz.ru', '1516601282', 27, 51327, 'nulla justo aliquam quis turpis eget elit sodales scelerisque mauris sit amet eros suspendisse accumsan tortor quis turpis sed', NULL, 'finished', '2024-10-21 17:00:00'),
(88, 'Corry', 'clinguard2f@google.com.br', '3526902984', 26, 61446, 'in consequat ut nulla sed accumsan felis ut at dolor quis odio consequat varius integer ac leo pellentesque ultrices mattis odio donec vitae nisi nam ultrices libero non mattis pulvinar nulla pede ullamcorper augue a suscipit nulla elit ac', NULL, 'pending', '2024-08-08 17:00:00'),
(89, 'Jedediah', 'jstanes2g@ft.com', '9515986418', 26, 50651, 'lorem id ligula suspendisse ornare consequat lectus in est risus auctor sed tristique in tempus sit amet sem fusce consequat nulla nisl nunc nisl duis bibendum felis sed interdum venenatis turpis enim blandit mi in porttitor pede justo', NULL, 'finished', '2024-01-15 17:00:00'),
(90, 'Fran', 'fangove2h@linkedin.com', '2262161524', 26, 51916, 'cras pellentesque volutpat dui maecenas tristique est et tempus semper est quam pharetra magna ac', NULL, 'pending', '2024-08-12 17:00:00'),
(91, 'Archer', 'afuke2i@about.me', '5321921042', 27, 85358, 'felis eu sapien cursus vestibulum proin eu mi nulla ac enim in tempor turpis', NULL, 'pending', '2024-02-23 17:00:00'),
(92, 'Brandie', 'baldrich2j@icio.us', '1847857620', 27, 73653, 'morbi vel lectus in quam fringilla rhoncus mauris enim leo rhoncus sed vestibulum sit amet cursus id turpis integer aliquet massa id lobortis convallis tortor risus dapibus augue vel accumsan tellus nisi eu orci mauris lacinia sapien quis libero nullam sit', NULL, 'finished', '2024-04-19 17:00:00'),
(93, 'Trudie', 'tharman2k@comsenz.com', '2841457144', 27, 82427, 'ut suscipit a feugiat et eros vestibulum ac est lacinia nisi venenatis tristique fusce congue diam id ornare imperdiet sapien', NULL, 'finished', '2024-05-19 17:00:00'),
(94, 'Ailsun', 'afenelow2l@weather.com', '1234648935', 27, 65868, 'in est risus auctor sed tristique in tempus sit amet sem fusce consequat nulla nisl nunc nisl duis bibendum felis sed interdum venenatis turpis enim blandit mi in porttitor pede justo eu massa donec dapibus duis at', NULL, 'finished', '2024-12-03 17:00:00'),
(95, 'Gertie', 'gsikora2m@indiegogo.com', '4891059058', 27, 63195, 'congue etiam justo etiam pretium iaculis justo in hac habitasse platea dictumst etiam faucibus cursus urna ut tellus nulla ut erat id mauris vulputate elementum nullam varius nulla facilisi cras non velit nec nisi', NULL, 'finished', '2024-06-21 17:00:00'),
(96, 'Gilly', 'gtripp2n@parallels.com', '2641849569', 26, 64563, 'nisl duis bibendum felis sed interdum venenatis turpis enim blandit mi in porttitor pede justo eu massa donec dapibus duis at velit eu est congue elementum in hac habitasse platea dictumst morbi vestibulum velit id pretium iaculis diam erat fermentum justo nec condimentum neque sapien', NULL, 'finished', '2023-12-26 17:00:00'),
(97, 'Calypso', 'clequesne2o@tripadvisor.com', '6395650401', 27, 57278, 'vitae nisl aenean lectus pellentesque eget nunc donec quis orci eget orci vehicula condimentum curabitur in libero ut massa volutpat convallis morbi odio odio elementum eu interdum eu tincidunt in leo maecenas pulvinar lobortis est phasellus sit amet erat nulla tempus vivamus in felis eu sapien', NULL, 'finished', '2024-12-04 17:00:00'),
(98, 'Calypso', 'cgiorgioni2p@angelfire.com', '9796964527', 26, 70170, 'augue vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae donec pharetra magna vestibulum aliquet ultrices erat tortor sollicitudin mi sit amet lobortis sapien sapien non mi integer ac neque duis bibendum morbi non quam nec dui luctus rutrum nulla', NULL, 'finished', '2024-03-09 17:00:00'),
(99, 'Arly', 'amorse2q@techcrunch.com', '8606350986', 26, 65192, 'orci nullam molestie nibh in lectus pellentesque at nulla suspendisse potenti cras in purus eu magna vulputate luctus cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus vivamus vestibulum sagittis sapien cum sociis natoque penatibus et magnis dis parturient', NULL, 'finished', '2024-06-09 17:00:00'),
(100, 'Valina', 'vathy2r@upenn.edu', '5046226565', 26, 99790, 'nibh in lectus pellentesque at nulla suspendisse potenti cras in purus eu magna vulputate luctus cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus vivamus', NULL, 'finished', '2024-09-11 17:00:00');

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
(1, 'admin', '$2a$12$6lvPWeP3f5rfc1TKn15ORu6dy.AlY5.y5ZGtSVmKUMsp0k7z0MMIC'),
(3, 'asdgg', '$2y$10$DicC94QiQb0/sSvOfVh7euh33FMFvfnkweVds0./Snn2UqTt9T2dG');

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
  MODIFY `id_model` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_model`) REFERENCES `model_pembayaran` (`id_model`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
