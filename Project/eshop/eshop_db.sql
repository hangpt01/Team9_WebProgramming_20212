
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshop_db`
--

-- --------------------------------------------------------


--


-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand`, `disabled`, `views`) VALUES
(1, 'Johnsons', 0, 0),
(2, 'Ronhill', 0, 0),
(3, 'Albiro', 0, 0),
(4, 'Toyota', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `parent` int(11) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `disabled`, `parent`, `views`) VALUES
(1, 'Food', 0, 0, 16),
(2, 'Drinks', 0, 0, 15),
(3, 'Sodas', 1, 0, 10),
(4, 'Energy drink', 0, 0, 12),
(5, 'Meat', 0, 0, 10),
(6, 'Can food', 0, 0, 10),
(7, 'Goodies', 0, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `subject`, `message`, `date`) VALUES
(2, 'A Second Person', 'email2@email.com', 'a subject', 'a subject2', '2022-07-22 12:25:18');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country` varchar(30) NOT NULL,
  `disabled` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `disabled`) VALUES
(1, 'Viet Nam', 0),
(2, 'USA', 0),
(3, 'Canada', 0),
(4, 'England', 0),
(5, 'Japan', 0)
;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `user_url` varchar(60) NOT NULL,
  `description` varchar(20) NOT NULL,
  `delivery_address` varchar(1024) DEFAULT NULL,
  `total` double NOT NULL DEFAULT 0,
  `country` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `zip` varchar(6) DEFAULT NULL,
  `tax` double DEFAULT 0,
  `shipping` double DEFAULT 0,
  `date` datetime NOT NULL,
  `sessionid` varchar(30) NOT NULL,
  `home_phone` varchar(15) NOT NULL,
  `mobile_phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) NOT NULL,
  `orderid` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `amount` double NOT NULL,
  `total` double NOT NULL,
  `productid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `orderid`, `qty`, `description`, `amount`, `total`, `productid`) VALUES
(1, 1, 3, 'Milo Candy Bar', 12.99, 38.97, 9),
(2, 1, 2, 'Weet Bix 1.4 Kg', 20.99, 41.98, 8),
(3, 1, 3, 'Burger 250g With Drink', 9.99, 29.97, 7),
(4, 2, 3, 'Milo Candy Bar', 12.99, 38.97, 9),
(5, 2, 2, 'Weet Bix 1.4 Kg', 20.99, 41.98, 8),
(6, 2, 3, 'Burger 250g With Drink', 9.99, 29.97, 7),
(7, 3, 1, 'Burger 250g With Drink', 9.99, 9.99, 7),
(8, 3, 3, 'Weet Bix 1.4 Kg', 20.99, 62.97, 8),
(9, 4, 3, 'Burger 250g With Drink', 9.99, 29.97, 7),
(10, 4, 2, 'Weet Bix 1.4 Kg', 20.99, 41.98, 8),
(11, 5, 1, 'Burger 250g With Drink', 9.99, 9.99, 7),
(12, 6, 1, 'Burger 250g With Drink', 9.99, 9.99, 7),
(15, 8, 1, 'Weet Bix 1.4 Kg', 20.99, 20.99, 8),
(16, 10, 1, 'Weet Bix 1.4 Kg', 20.99, 20.99, 8),
(17, 11, 1, 'Milo Candy Bar', 12.99, 12.99, 9),
(20, 21, 3, 'Alcohol', 0.21, 0.63, 10);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `trans_id` varchar(255) NOT NULL,
  `raw` text NOT NULL,
  `event_type` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(100) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `payer_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `date`, `trans_id`, `raw`, `event_type`, `amount`, `status`, `order_id`, `summary`, `first_name`, `last_name`, `email`, `payer_id`) VALUES
(1, '2022-07-06 12:34:23', 'WH-72368620FC4839506-578153864S1803135', '{\"id\":\"WH-72368620FC4839506-578153864S1803135\",\"event_version\":\"1.0\",\"create_time\":\"2022-07-03T18:36:26.977Z\",\"resource_type\":\"checkout-order\",\"resource_version\":\"2.0\",\"event_type\":\"CHECKOUT.ORDER.APPROVED\",\"summary\":\"An order has been approved by buyer\",\"resource\":{\"create_time\":\"2022-07-03T18:31:44Z\",\"purchase_units\":[{\"reference_id\":\"default\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"6.00\",\"breakdown\":{\"item_total\":{\"currency_code\":\"USD\",\"value\":\"4.00\"},\"shipping\":{\"currency_code\":\"USD\",\"value\":\"2.00\"},\"tax_total\":{\"currency_code\":\"USD\",\"value\":\"0.00\"}}},\"payee\":{\"email_address\":\"eathorne2012-facilitator@yahoo.com\",\"merchant_id\":\"QKRY6BTWMQQ8C\"},\"description\":\"My item description\",\"shipping\":{\"name\":{\"full_name\":\"test buyer\"},\"address\":{\"address_line_1\":\"1 Main St\",\"admin_area_2\":\"San Jose\",\"admin_area_1\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}}}],\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v2/checkout/orders/8D5278164K216725B\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https://api.sandbox.paypal.com/v2/checkout/orders/8D5278164K216725B\",\"rel\":\"update\",\"method\":\"PATCH\"},{\"href\":\"https://api.sandbox.paypal.com/v2/checkout/orders/8D5278164K216725B/capture\",\"rel\":\"capture\",\"method\":\"POST\"}],\"id\":\"8D5278164K216725B\",\"intent\":\"CAPTURE\",\"payer\":{\"name\":{\"given_name\":\"test\",\"surname\":\"buyer\"},\"email_address\":\"eathorne2012-buyer@yahoo.com\",\"payer_id\":\"QCEPS6HXTCW9N\",\"address\":{\"country_code\":\"US\"}},\"status\":\"APPROVED\"},\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v1/notifications/webhooks-events/WH-72368620FC4839506-578153864S1803135\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https://api.sandbox.paypal.com/v1/notifications/webhooks-events/WH-72368620FC4839506-578153864S1803135/resend\",\"rel\":\"resend\",\"method\":\"POST\"}]}', 'CHECKOUT.ORDER.APPROVED', '6.00', 'APPROVED', 'My item description', 'An order has been approved by buyer', 'test', 'buyer', 'eathorne2012-buyer@yahoo.com', 'QCEPS6HXTCW9N'),
(2, '2022-07-09 19:26:44', 'WH-4U387217Y0402090W-29K29120XX664362Y', '{\"id\":\"WH-4U387217Y0402090W-29K29120XX664362Y\",\"event_version\":\"1.0\",\"create_time\":\"2022-07-09T19:26:34.680Z\",\"resource_type\":\"checkout-order\",\"resource_version\":\"2.0\",\"event_type\":\"CHECKOUT.ORDER.APPROVED\",\"summary\":\"An order has been approved by buyer\",\"resource\":{\"update_time\":\"2022-07-09T19:26:33Z\",\"create_time\":\"2022-07-09T19:25:30Z\",\"purchase_units\":[{\"reference_id\":\"default\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"22.98\",\"breakdown\":{\"item_total\":{\"currency_code\":\"USD\",\"value\":\"22.98\"},\"shipping\":{\"currency_code\":\"USD\",\"value\":\"0.00\"},\"tax_total\":{\"currency_code\":\"USD\",\"value\":\"0.00\"}}},\"payee\":{\"email_address\":\"eathorne2012-facilitator@yahoo.com\",\"merchant_id\":\"QKRY6BTWMQQ8C\"},\"description\":\"order 5\",\"shipping\":{\"name\":{\"full_name\":\"test buyer\"},\"address\":{\"address_line_1\":\"1 Main St\",\"admin_area_2\":\"San Jose\",\"admin_area_1\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}},\"payments\":{\"captures\":[{\"id\":\"29B44561UF627130H\",\"status\":\"COMPLETED\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"22.98\"},\"final_capture\":true,\"seller_protection\":{\"status\":\"ELIGIBLE\",\"dispute_categories\":[\"ITEM_NOT_RECEIVED\",\"UNAUTHORIZED_TRANSACTION\"]},\"seller_receivable_breakdown\":{\"gross_amount\":{\"currency_code\":\"USD\",\"value\":\"22.98\"},\"paypal_fee\":{\"currency_code\":\"USD\",\"value\":\"0.97\"},\"net_amount\":{\"currency_code\":\"USD\",\"value\":\"22.01\"}},\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v2/payments/captures/29B44561UF627130H\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https://api.sandbox.paypal.com/v2/payments/captures/29B44561UF627130H/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https://api.sandbox.paypal.com/v2/checkout/orders/60J70994M39520325\",\"rel\":\"up\",\"method\":\"GET\"}],\"create_time\":\"2022-07-09T19:26:33Z\",\"update_time\":\"2022-07-09T19:26:33Z\"}]}}],\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v2/checkout/orders/60J70994M39520325\",\"rel\":\"self\",\"method\":\"GET\"}],\"id\":\"60J70994M39520325\",\"intent\":\"CAPTURE\",\"payer\":{\"name\":{\"given_name\":\"test\",\"surname\":\"buyer\"},\"email_address\":\"eathorne2012-buyer@yahoo.com\",\"payer_id\":\"QCEPS6HXTCW9N\",\"address\":{\"country_code\":\"US\"}},\"status\":\"COMPLETED\"},\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v1/notifications/webhooks-events/WH-4U387217Y0402090W-29K29120XX664362Y\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https://api.sandbox.paypal.com/v1/notifications/webhooks-events/WH-4U387217Y0402090W-29K29120XX664362Y/resend\",\"rel\":\"resend\",\"method\":\"POST\"}]}', 'CHECKOUT.ORDER.APPROVED', '22.98', 'COMPLETED', 'order 5', 'An order has been approved by buyer', 'test', 'buyer', 'eathorne2012-buyer@yahoo.com', 'QCEPS6HXTCW9N'),
(3, '2022-07-13 10:19:20', 'WH-7T326909W98431811-0PA11016TB7979214', '{\"id\":\"WH-7T326909W98431811-0PA11016TB7979214\",\"event_version\":\"1.0\",\"create_time\":\"2022-07-13T10:18:33.518Z\",\"resource_type\":\"checkout-order\",\"resource_version\":\"2.0\",\"event_type\":\"CHECKOUT.ORDER.APPROVED\",\"summary\":\"An order has been approved by buyer\",\"resource\":{\"update_time\":\"2022-07-13T10:18:17Z\",\"create_time\":\"2022-07-13T10:17:05Z\",\"purchase_units\":[{\"reference_id\":\"default\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"1.05\",\"breakdown\":{\"item_total\":{\"currency_code\":\"USD\",\"value\":\"1.05\"},\"shipping\":{\"currency_code\":\"USD\",\"value\":\"0.00\"},\"tax_total\":{\"currency_code\":\"USD\",\"value\":\"0.00\"}}},\"payee\":{\"email_address\":\"eathorne2012-facilitator@yahoo.com\",\"merchant_id\":\"QKRY6BTWMQQ8C\"},\"description\":\"order 6\",\"shipping\":{\"name\":{\"full_name\":\"test buyer\"},\"address\":{\"address_line_1\":\"1 Main St\",\"admin_area_2\":\"San Jose\",\"admin_area_1\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}},\"payments\":{\"captures\":[{\"id\":\"1BE01178RF206244J\",\"status\":\"COMPLETED\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"1.05\"},\"final_capture\":true,\"seller_protection\":{\"status\":\"ELIGIBLE\",\"dispute_categories\":[\"ITEM_NOT_RECEIVED\",\"UNAUTHORIZED_TRANSACTION\"]},\"seller_receivable_breakdown\":{\"gross_amount\":{\"currency_code\":\"USD\",\"value\":\"1.05\"},\"paypal_fee\":{\"currency_code\":\"USD\",\"value\":\"0.33\"},\"net_amount\":{\"currency_code\":\"USD\",\"value\":\"0.72\"}},\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v2/payments/captures/1BE01178RF206244J\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https://api.sandbox.paypal.com/v2/payments/captures/1BE01178RF206244J/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https://api.sandbox.paypal.com/v2/checkout/orders/4PA73887R93208929\",\"rel\":\"up\",\"method\":\"GET\"}],\"create_time\":\"2022-07-13T10:18:17Z\",\"update_time\":\"2022-07-13T10:18:17Z\"}]}}],\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v2/checkout/orders/4PA73887R93208929\",\"rel\":\"self\",\"method\":\"GET\"}],\"id\":\"4PA73887R93208929\",\"intent\":\"CAPTURE\",\"payer\":{\"name\":{\"given_name\":\"test\",\"surname\":\"buyer\"},\"email_address\":\"eathorne2012-buyer@yahoo.com\",\"payer_id\":\"QCEPS6HXTCW9N\",\"address\":{\"country_code\":\"US\"}},\"status\":\"COMPLETED\"},\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v1/notifications/webhooks-events/WH-7T326909W98431811-0PA11016TB7979214\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https://api.sandbox.paypal.com/v1/notifications/webhooks-events/WH-7T326909W98431811-0PA11016TB7979214/resend\",\"rel\":\"resend\",\"method\":\"POST\"}]}', 'CHECKOUT.ORDER.APPROVED', '1.05', 'COMPLETED', 'order 6', 'An order has been approved by buyer', 'test', 'buyer', 'eathorne2012-buyer@yahoo.com', 'QCEPS6HXTCW9N');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `user_url` varchar(60) NOT NULL,
  `description` varchar(200) NOT NULL,
  `category` int(11) NOT NULL,
  `brand` int(11) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `image2` varchar(500) DEFAULT NULL,
  `image3` varchar(500) DEFAULT NULL,
  `image4` varchar(500) DEFAULT NULL,
  `date` datetime NOT NULL,
  `slag` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_url`, `description`, `category`, `brand`, `price`, `quantity`, `image`, `image2`, `image3`, `image4`, `date`, `slag`) VALUES
(7, 'IYHtfbbTBkpFExy', 'Burger 250g With Drink', 1, 1, 9.99, 8, 'uploads/6f7bd4cc3677b6e4ce2aeb249bfa2c32.jpg', 'uploads/Burger.jpg', 'uploads/glenlivet-12.jpg', 'uploads/sogood-landing.jpg', '2022-07-16 19:36:12', 'burger-250g-with-drink'),
(8, 'IYHtfbbTBkpFExy', 'Weet Bix 1.4 Kg', 1, 2, 20.99, 9, 'uploads/UT83WqLXMBXXXagOFbX9.jpg', 'uploads/getmedia_3dad7ab1-ce4b-40e7-b409-82013a7f2c4b_2020_Website_Title_WB.jpg width=760&height=460&ext=.jpg', 'uploads/banetti-foods.jpg', 'uploads/351396-01.jpg-1200Wx1200H.jpg', '2022-07-16 20:07:08', 'weet-bix-1-4-kg'),
(9, 'IYHtfbbTBkpFExy', 'Milo Candy Bar', 1, 4, 12.99, 100, 'uploads/images.jpg', 'uploads/banetti-foods.jpg', '', '', '2022-07-16 20:16:54', 'milo-candy-bar'),
(10, 'IYHtfbbTBkpFExy', 'Alcohol', 2, 2, 0.21, 6, 'uploads/yKqmWfrNPKYgOV4FLQHuzzi4iJnqaae09dQA2iedeffJCK7c9PSsVnSvjRIV.jpg', '', '', '', '2022-07-06 15:20:36', 'alcohol'),
(11, 'IYHtfbbTBkpFExy', 'Meat Burger', 6, 3, 0.21, 6, 'uploads/mJVdNoskTywnobsA6A6mCaVCD7OJ8xxTl7cwV9Hth1O5Z0aiqDdA3stCYnQY.jpg', '', '', '', '2022-07-06 15:21:24', 'meat-burger'),
(12, 'IYHtfbbTBkpFExy', 'Halo', 4, 3, 0.21, 6, 'uploads/UG8XjjVu7HTW1j6b4vfB9f2YqUVl0PbZ3WUXBU3LgXadugDVTCwua61u7Nrc.jpg', '', '', '', '2022-07-06 15:21:55', 'halo'),
(13, 'IYHtfbbTBkpFExy', 'So Good', 5, 1, 0.21, 6, 'uploads/6evwk0NfONIp1SkN6Lzu0bprGHDUoJKA0RL3Fw6A6Epo6f9VQUAfB0YpN4w0.jpg', '', '', '', '2022-07-06 15:22:18', 'so-good'),
(14, 'IYHtfbbTBkpFExy', 'Traditions', 7, 4, 0.21, 6, 'uploads/peCbYjssuVJWFRn5kS4w7AqZRimede6JLo2xRNAV264TTREC5abm9lpVQrfJ.jpg', '', '', '', '2022-07-06 15:24:01', 'tradition'),
(15, 'IYHtfbbTBkpFExy', 'Some Product', 7, 4, 0.08, 6, 'uploads/gfSXekdGkmQhkHE2GXDe29Cm2PN6MqrKFfLf5TK1rljqbO3Pfqopz5km5bKe.jpg', '', '', '', '2022-07-16 19:13:37', 'some-product')

;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting` varchar(30) DEFAULT NULL,
  `value` varchar(2048) DEFAULT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting`, `value`, `type`) VALUES
(1, 'phone_number', '+0898567581', ''),
(2, 'email', 'nghiatrong@gmail.com', ''),
(3, 'facebook_link', 'https://www.facebook.com', ''),
(4, 'twitter_link', 'https://www.twitter.com', ''),
(5, 'linkedin_link', '', ''),
(6, 'google_plus_link', '', ''),
(7, 'website_link', '', ''),
(8, 'youtube_link', '', ''),
(9, 'contact_info', 'CauGiay, YenHoa, TrungKinh - +84 0898567123', 'textarea');

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

CREATE TABLE `slider_images` (
  `id` int(11) NOT NULL,
  `header1_text` varchar(20) NOT NULL,
  `header2_text` varchar(30) DEFAULT NULL,
  `text` varchar(200) NOT NULL,
  `link` varchar(200) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `image2` varchar(500) DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider_images`
--

INSERT INTO `slider_images` (`id`, `header1_text`, `header2_text`, `text`, `link`, `image`, `image2`, `disabled`) VALUES
(1, 'E-SHOP', 'Awesome Food', 'This food is awesome. try it and let me know what ya think', 'http://localhost/eshop/public/product_details/burger-250g-with-drink', 'uploads/TVqski4iWztdtAL1lTOYioOeV7L0XM767EyiWiZ5ZdzuOuZ9XhA6FE3rX3LK.jpg', '', 0),
(2, 'E-SHOP STUFF', 'Milo Is The Best', 'As you already know Milo is awesome. everyone already knows its awesome', 'http://localhost/eshop/public/product_details/milo-candy-bar', 'uploads/gHmC5YMOwdiLKJFMH6mzr1pHGpNrLAS4gDtpK8zKhbXa639sJw5YJazX4LI0.jpg', '', 0),
(3, 'Awesome Bix', 'This Is Great Food', 'The food on this picture is awesome. try it and let us know', 'http://localhost/eshop/public/product_details/weet-bix-1-4-kg', 'uploads/2hu6d0OKjiX0wrPuoj9GZoaDLUIKNa0Y8qkZr1CHol8NtkTRyTaKVj2389NN.jpg', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `state` varchar(30) NOT NULL,
  `disabled` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `parent`, `state`, `disabled`) VALUES
(1, 1, 'Ha Noi', 0),
(2, 1, 'Da Nang', 0),
(3, 1, 'Sai Gon', 0),
(4, 1, 'Nha Trang', 0),
(5, 2, 'New York', 0),
(6, 2, 'Los Angeles', 0),
(7, 3, 'Vancouver', 0),
(8, 3, 'Toronto', 0),
(9, 4, 'London', 0),
(10, 4, 'Bellfast', 0),
(11, 5, 'Tokyo', 0)
;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `url_address` varchar(60) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `date` datetime NOT NULL,
  `rank` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `url_address`, `name`, `email`, `password`, `date`, `rank`) VALUES
(2, 'IYHtfbbTBkpFExy', 'Nghia', 'nghia@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2022-07-17 17:44:36', 'admin'),
(3, 'BX8z7P6oUmwRDwR3yGlJdJH', 'Hang', 'hang@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2022-07-17 14:57:34', 'customer');

--
-- Indexes for dumped tables
--

--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`brand`),
  ADD KEY `disabled` (`disabled`),
  ADD KEY `views` (`views`),
  ADD KEY `brand` (`brand`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `disabled` (`disabled`),
  ADD KEY `parent` (`parent`),
  ADD KEY `views` (`views`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `subject` (`subject`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disabled` (`disabled`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`user_url`),
  ADD KEY `date` (`date`),
  ADD KEY `sessionid` (`sessionid`),
  ADD KEY `description` (`description`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderid` (`orderid`),
  ADD KEY `description` (`description`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `status` (`status`),
  ADD KEY `amount` (`amount`),
  ADD KEY `event_type` (`event_type`),
  ADD KEY `trans_id` (`trans_id`),
  ADD KEY `date` (`date`),
  ADD KEY `first_name` (`first_name`),
  ADD KEY `email` (`email`),
  ADD KEY `last_name` (`last_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slag` (`slag`),
  ADD KEY `date` (`date`),
  ADD KEY `quantity` (`quantity`),
  ADD KEY `price` (`price`),
  ADD KEY `category` (`category`),
  ADD KEY `description` (`description`),
  ADD KEY `user_url` (`user_url`),
  ADD KEY `brand` (`brand`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setting` (`setting`);

--
-- Indexes for table `slider_images`
--
ALTER TABLE `slider_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disabled` (`disabled`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`),
  ADD KEY `disabled` (`disabled`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `url_address` (`url_address`),
  ADD KEY `email` (`email`),
  ADD KEY `name` (`name`),
  ADD KEY `rank` (`rank`),
  ADD KEY `date` (`date`);

--
-- AUTO_INCREMENT for dumped tables
--




-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `slider_images`
--
ALTER TABLE `slider_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;