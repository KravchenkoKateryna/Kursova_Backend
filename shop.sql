-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 10, 2024 at 02:42 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Букети'),
(2, 'Квіти'),
(3, 'Подарунки'),
(4, 'Аксесуари');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `place` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL DEFAULT '0',
  `image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `isShow` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `description`, `date`, `time`, `place`, `price`, `image`, `isShow`) VALUES
(1, 'Майстерклас по догляду за квітами', '“Майстерклас по догляду за квітами” - це унікальна можливість для всіх любителів рослин поглибити свої знання та навички у догляді за квітами. Під час цього заходу ви дізнаєтесь про основи догляду за різними видами квітів, включаючи правильний полив, освітлення, грунт та боротьбу з шкідниками. Майстер-клас буде корисним як для новачків, так і для досвідчених садівників, які хочуть покращити свої навички. Приєднуйтесь до нас, щоб навчитися, як зробити ваші квіти щасливими та здоровими!', '2024-06-13', '17:30:00', 'м.Житомир, вул. Чуднівська 110', 0, 'https://www.goodnet.org/photos/620x0/41439_hd.jpg', 1),
(2, 'Воркшоп \"Створи свій перший букет\"', 'Захоплюючий захід, де ви зможете відкрити для себе мистецтво флористики. Під час цього воркшопу, ви дізнаєтесь про основи створення букетів, включаючи вибір квітів, їх комбінування та правильне оформлення. Ви будете працювати під керівництвом досвідченого флориста, який допоможе вам створити власний унікальний букет. Цей воркшоп ідеально підходить для тих, хто любить квіти та хоче навчитися створювати власні композиції. Приєднуйтесь до нас і розкрийте свою креативність!\n\n<br><b>В ціну входить вартість компонентів для квіткових композицій.</b>', '2024-06-02', '18:00:00', 'м.Житомир, вул. Чуднівська 110', 450, '/images/events/event2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `category_id` int NOT NULL,
  `price` int NOT NULL,
  `images` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `title`, `description`, `category_id`, `price`, `images`) VALUES
(1, '101 гілка хризантеми', 'Незабутній букет із 101 гілки хризантеми \r\n\r\nЧому вибирають наші букети?\r\nПравильна температура зберігання\r\nМи зберігаємо квіти в ідеальних температурних умовах\r\nЖодної хімії при зберіганні\r\nМи не використовуємо хімію при зберіганні квітів\r\nКожен букет збирає флорист із великою любов\'ю\r\nЗібрані букети у реальному житті будуть виглядати так само, як на картинці', 1, 13620, 'https://juli.com.ua/image/cache/catalog/easyphoto/322/catalog-easyphoto-tmp-1804f973-e5c5-4950-8c2c-4dca1981be50-jpeg-1-690x800.jpeg'),
(2, 'Троянда червона', 'Найсвіжіші троянди від наших постачальників зроблять будь-який ваш букет ще яскравіше.', 2, 50, 'https://i.imgur.com/XXNwGDm.jpg'),
(3, 'Послуга - пакування квітів', 'Сформуємо квіткову композицію за вашим смаком. Обирайте послугу пакування і вкажіть ваші вподобання все інше зробимо ми.', 4, 100, 'https://images.prom.ua/4398610153_w640_h640_schilnij-fakturnij-kompozitnij.jpg'),
(4, 'Ваза для квітів скляна Bormioli Rocco 15 см Прозор', 'Ваза Capitol Bormioli Rocco має красивий вигляд як на обідньому, так і на святковому столі. Прикрасить будь-який інтер\'єр. Стильний дизайн, сучасні технології виробництва та тільки високоякісні матеріали.\r\n\r\nХарактеристики:\r\n\r\nТип: ваза для квітів\r\nЗастосування: всередині приміщення\r\nМатеріал: ударостійкого скла\r\nВисота вази: 15 см\r\nКолір: прозорий\r\nВиробник: Bormioli Rocco', 4, 169, 'https://content2.rozetka.com.ua/goods/images/big/192133828.jpg'),
(5, 'Амариліc Celica', 'Опис (Амариліc Celica) Амариліс ( Гіппеаструм ) Celica (Амариліс Селіка)  Зовнішній вигляд Ця квітка досить висока і красива. Листки у неї зелені і до 50 см в довжину, але не широкі всього 2-3 см, розташовуються в два ряди. Вони виростають рано навесні або восени коли прохолодно, і зникають до початку літа. По закінченню літньої спеки цибулинка випускає один або два стебла-квітконоси, які доростають до 60 см. На кожному стеблі розквітають від 2 до 12 квіточок. Вони червоного кольору і махрові. Пересаджують один раз на 3-4 роки.  Довжина листя: до 50 см  Довжина стебла: до 60 см  Любить світло, не витримує надмірного зволоження.', 2, 120, 'https://florium.ua/media/catalog/product/cache/1/file/9df78eab33525d08d6e5fb8d27136e95/c/e/celica_amaryllis.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `Items` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `totalPrice` int NOT NULL,
  `statusId` int NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `delivery_info` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `Items`, `totalPrice`, `statusId`, `address`, `date`, `delivery_info`, `comment`) VALUES
(1, 1, '1', 20000, 3, 'Test address', '2024-06-03', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `orderstatuses`
--

DROP TABLE IF EXISTS `orderstatuses`;
CREATE TABLE IF NOT EXISTS `orderstatuses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderstatuses`
--

INSERT INTO `orderstatuses` (`id`, `status`) VALUES
(1, 'Сформовано'),
(2, 'Опрацьовується'),
(3, 'Відправлено'),
(4, 'Виконано'),
(5, 'Відмінено');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `rating` int NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `firstName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `firstName`, `lastName`, `Password`, `isAdmin`, `phone`) VALUES
(1, 'admin@admin.com', 'admin', 'administrator2', 'admin', 1, '38012345678'),
(2, 'user@user.com', 'User2', 'Userius', 'user', 0, '38023456789'),
(3, 'test1@test.test', 'Tester', 'Testoviy', 'test', 0, '38067182356'),
(4, 'test2@test.test', 'Tester2', 'test2', 'test2', 0, '0931166406');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
