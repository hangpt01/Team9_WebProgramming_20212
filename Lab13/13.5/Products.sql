CREATE DATABASE ShoppingCart CHARACTER SET utf8mb4;

USE ShoppingCart;

CREATE TABLE `Products` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
);

INSERT INTO `Products` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, 'Camera', 'CAM01', 'product-images/camera.jpg', 1500.00),
(2, 'Hard Drive', 'USB02', 'product-images/external-hard-drive.jpg', 800.00),
(3, 'Watch', 'WATCH03', 'product-images/watch.jpg', 300.00),
(4, 'Laptop', 'LAP04', 'product-images/laptop.jpg', 800.00);

ALTER TABLE `Products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

ALTER TABLE `Products`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;