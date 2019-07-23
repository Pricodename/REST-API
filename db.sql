CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

INSERT INTO `categories` (`id`, `name`, `description`, `created`) VALUES
(1, 'Fashion', 'Category for anything related to fashion.', '2014-06-01 00:35:07'),
(2, 'Electronics', 'Gadgets, drones and more.', '2014-06-01 00:35:07'),
(3, 'Motors', 'Motor sports and more', '2014-06-01 00:35:07'),
(5, 'Movies', 'Movie products.', '0000-00-00 00:00:00'),
(6, 'Books', 'Kindle books, audio books and more.', '0000-00-00 00:00:00'),
(10, 'Sports', 'Drop into new winter gear.', '2016-01-09 02:24:24');

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`, `created`) VALUES
(1, 'Moto G5 plus', 'My first awesome phone!', '9024', 3, '2014-06-01 01:12:26'),
(2, 'Xiomi Note 4 plus', 'The most awesome phone of 2013', '299', 2, '2014-06-01 01:12:26'),
(4, 'Samsung Galaxy S4', 'How about no?', '60000', 3, '2014-06-01 01:12:26'),
(6, 'Beach Hawaiian Shirt', 'The best shirt!', '290', 1, '2014-06-01 01:12:26'),
(7, 'Dell Laptop', 'My business partner.', '45000', 2, '2014-06-01 01:13:45'),
(10, 'Samsung Galaxy Tab 10.1', 'Good tablet.', '259', 2, '2014-06-01 01:14:13'),
(9, 'Fastrack Watch', 'My sports watch.', '1990', 1, '2014-06-01 01:18:36'),
(11, 'MI smart band', 'The coolest smart watch!', '3000', 2, '2014-06-06 17:10:01'),
(15, 'Guardians of Galaxy 01', 'Book love', '400', 2, '2014-06-06 17:11:04');
