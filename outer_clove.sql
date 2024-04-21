-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 07:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `outer_clove`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminUN` varchar(255) NOT NULL,
  `adminPwd` varchar(255) NOT NULL,
  `adminName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminUN`, `adminPwd`, `adminName`) VALUES
(1, 'Yomal', 'Yomal2001', 'Yomal Thushara'),
(2, 'Shenali', 'Shenali0514', 'Shenali Hirushika');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerId` int(11) NOT NULL,
  `customerFname` varchar(128) NOT NULL,
  `customerEmail` varchar(255) NOT NULL,
  `customerPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerId`, `customerFname`, `customerEmail`, `customerPassword`) VALUES
(1, 'Yomal Thushara', 'yomalthushara2001@gmail.com', '$2y$10$.hPltG.sxg19SSBNYxIIx.MMlpfIGycCUSM3gxmnQhdX5dEaE834O'),
(2, 'Shenali Hirushika', 'shenuhiru0514@gmail.com', '$2y$10$v7aW/yTCogQ1ssiSENCdoeAogHhihc6kAHN21SqJQZvhFjaOc8pI6'),
(3, 'Visitha Nirmal', 'vnr2001@gmail.com', '$2y$10$GO0vdi5BWysDAns1Xcz8GuCgxwJJPA7kzfUj1YUiv5c2DbM3Y3/M2'),
(7, 'Bhagya', 'bhagya111@gmail.com', 'a3b4cb5e53acd28fdec76e511f879f92'),
(8, 'Priyantha Kumara', 'kumara11@gmail.com', '361d7ae0f9042c27e4de4f85373a1abc');

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `meal_ID` int(10) UNSIGNED NOT NULL,
  `mealTittle` varchar(100) NOT NULL,
  `mealDescription` text NOT NULL,
  `mealPrice` decimal(10,0) NOT NULL,
  `meal_ImageName` varchar(255) NOT NULL,
  `categoryId` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`meal_ID`, `mealTittle`, `mealDescription`, `mealPrice`, `meal_ImageName`, `categoryId`, `featured`, `active`) VALUES
(5, 'Pepperoni Pizza', 'Pepperoni pizza is a classic and popular pizza variety featuring a thin crust topped with tomato sauce, mozzarella cheese, and slices of cured and spiced pepperoni sausage, which typically crisps and curls during baking, adding a savory and slightly spicy flavor to the dish.', 16, 'Meal-Name-2304.jpg', 17, 'Yes', 'Yes'),
(6, 'BBQ chicken pizza', 'BBQ chicken pizza is a delicious twist on the classic, featuring a barbecue sauce base, succulent cooked chicken, red onions, and gooey mozzarella cheese. The combination of sweet, tangy, and savory flavors creates a mouthwatering experience that\'s both familiar and distinctive in the world of pizza.', 9, 'Meal-Name-6035.jpg', 17, 'Yes', 'Yes'),
(7, 'Seafood Pizza', 'Seafood pizza is a delectable variation topped with an array of seafood, such as shrimp, clams, mussels, or squid. Complemented by a tomato sauce and melted cheese base, the seafood adds a briny, savory dimension to the pizza, creating a delightful fusion of flavors from the ocean and the traditional pizza experience.', 12, 'Meal-Name-7082.png', 17, 'Yes', 'Yes'),
(8, 'Mushroom & Bacon Pizza', 'Mushroom and bacon pizza features a classic crust topped with tomato sauce, mozzarella cheese, sautéed mushrooms, and crispy bacon pieces. The savory and earthy combination of mushrooms, paired with the smoky flavor of bacon, creates a rich and satisfying pizza experience with a delightful interplay of textures and tastes.', 13, 'Meal-Name-1902.jpg', 17, 'Yes', 'Yes'),
(9, 'Mushroom & Bacon Pizza', 'Mushroom and bacon pizza features a classic crust topped with tomato sauce, mozzarella cheese, sautéed mushrooms, and crispy bacon pieces. The savory and earthy combination of mushrooms, paired with the smoky flavor of bacon, creates a rich and satisfying pizza experience with a delightful interplay of textures and tastes.', 13, 'Meal-Name-871.jpg', 17, 'Yes', 'Yes'),
(10, 'Vegetarian Pizza', 'Vegetarian pizza is a meat-free delight, typically adorned with a tomato sauce and mozzarella cheese base. Toppings vary widely, often including colorful vegetables like bell peppers, tomatoes, olives, onions, and mushrooms. The result is a flavorful and wholesome pizza that caters to vegetarians, offering a medley of fresh, vibrant ingredients.', 7, 'Meal-Name-5339.jpg', 17, 'Yes', 'Yes'),
(11, 'Fried Rice', 'Fried rice is a versatile and savory dish made from cooked rice stir-fried in a wok or skillet. It typically includes ingredients like vegetables, eggs, and meat or tofu, flavored with soy sauce and often garnished with green onions. This popular Asian dish offers a delicious blend of textures and flavors in each bite.', 7, 'Meal-Name-2355.jpg', 18, 'Yes', 'Yes'),
(12, 'Nasi Goreng', 'Nasi Goreng is an Indonesian fried rice dish known for its flavorful and aromatic profile. Cooked rice is stir-fried with a combination of ingredients such as kecap manis (sweet soy sauce), shallots, garlic, tamarind, and often accompanied by ingredients like eggs, prawns, chicken, or vegetables. It\'s a tasty and popular dish with a perfect balance of sweet, savory, and spicy notes.', 9, 'Meal-Name-4153.jpg', 18, 'Yes', 'Yes'),
(13, 'Biriyani', 'Biryani is a fragrant and flavorful South Asian rice dish made with basmati rice, aromatic spices, and meat (such as chicken, mutton, or beef) or vegetables. The ingredients are layered and cooked together, allowing the rice to absorb the rich flavors. Biryani often incorporates herbs, saffron, or food coloring, resulting in a visually appealing and delicious one-pot dish.', 6, 'Meal-Name-4013.jpg', 18, 'Yes', 'Yes'),
(14, 'Mix Rice', 'Mix rice is a versatile dish that combines various ingredients and flavors. It typically involves blending cooked rice with an assortment of ingredients such as vegetables, proteins like chicken or shrimp, and spices. The result is a diverse and satisfying dish where different components harmonize to create a flavorful and balanced meal. Mix rice variations can be found in various cuisines worldwide.', 8, 'Meal-Name-316.jpg', 17, 'Yes', 'Yes'),
(15, 'Mongolian Rice', 'Mongolian rice is not a specific traditional dish, but Mongolian cuisine often incorporates rice into various recipes. One example is Mongolian-style fried rice, which typically includes cooked rice stir-fried with vegetables, soy sauce, and sometimes meat like beef or lamb. While not a staple in traditional Mongolian cuisine, this dish reflects a fusion of flavors influenced by regional preferences.', 7, 'Meal-Name-6327.jpg', 18, 'Yes', 'Yes'),
(16, 'Spaghetti', 'Spaghetti is a type of pasta characterized by long, thin, cylindrical noodles made from durum wheat semolina. It is a staple in Italian cuisine and is commonly served with a variety of sauces, such as marinara, Bolognese, carbonara, or aglio e olio. Spaghetti can be paired with meat, seafood, or vegetarian toppings, offering a versatile and widely enjoyed pasta dish worldwide.', 13, 'Meal-Name-3572.jpg', 19, 'Yes', 'Yes'),
(17, 'Ramen', 'Ramen is a Japanese noodle soup dish consisting of Chinese-style wheat noodles served in a meat or fish-based broth, often flavored with soy sauce or miso, and topped with ingredients such as sliced pork, dried seaweed, green onions, and a soft-boiled egg. Ramen comes in various regional styles, each with its own unique broth and toppings, making it a popular and diverse dish.', 8, 'Meal-Name-3910.jpg', 19, 'Yes', 'Yes'),
(18, 'Linguine', 'Linguine is a type of pasta that is similar to spaghetti but flattened and wider. The name \"linguine\" means \"little tongues\" in Italian. This pasta is commonly used in various Italian dishes and pairs well with a variety of sauces, including seafood, tomato-based sauces, and cream-based sauces. The flat shape of linguine allows it to hold onto sauces, making it a versatile choice in pasta dishes.', 10, 'Meal-Name-5210.jpg', 19, 'Yes', 'Yes'),
(19, 'Rotini', 'Rotini is a type of pasta characterized by its corkscrew or helical shape. The spiral design of rotini allows it to hold onto sauces, making it a popular choice for a variety of dishes. It can be used in salads, casseroles, and pasta dishes with both meat and vegetable-based sauces. The unique shape adds texture to the dish and makes it an appealing option for different culinary creations.', 9, 'Meal-Name-4297.jpg', 19, 'Yes', 'Yes'),
(20, 'Fettuccine', 'Fettuccine is a type of pasta that is long, flat, and wide, similar to but broader than linguine. The name \"fettuccine\" means \"little ribbons\" in Italian. This pasta is commonly used in Italian cuisine, particularly in dishes where a broad and flat pasta is desired. Fettuccine pairs well with creamy sauces, such as Alfredo, as well as with hearty meat or vegetable-based sauces. The wide surface area of fettuccine allows it to capture and hold onto sauces, creating a satisfying dining experience.', 6, 'Meal-Name-6061.jpg', 19, 'Yes', 'Yes'),
(21, 'Chocolate Cake', 'Chocolate cake is a decadent dessert made with cocoa, flour, sugar, and eggs. Moist and rich, it satisfies sweet cravings with its luscious texture and intense chocolate flavor.', 3, 'Meal-Name-656.jpg', 20, 'Yes', 'Yes'),
(23, 'Watalappam', 'Watalappam is a traditional Sri Lankan dessert, a creamy and rich pudding made with coconut milk, jaggery (palm sugar), eggs, and various spices like cardamom and nutmeg. It has a unique texture and a delicious blend of sweet and spiced flavors.', 2, 'Meal-Name-9501.jpg', 20, 'Yes', 'Yes'),
(24, 'Fruits Salad', 'Fruit salad is a refreshing dish made by combining various fresh fruits, often including a mix of berries, melons, citrus fruits, and more. It\'s typically served chilled and may be enhanced with a simple dressing or a sprinkle of mint for added freshness.', 2, 'Meal-Name-562.jpg', 20, 'Yes', 'Yes'),
(25, 'Ice-Cream', 'Ice cream is a frozen dessert made from a mixture of cream, sugar, and flavorings. It comes in various flavors and textures, ranging from creamy vanilla to indulgent chocolate, offering a delightful treat enjoyed in cones, cups, or as toppings.', 3, 'Meal-Name-2555.jpg', 20, 'Yes', 'Yes'),
(26, 'Espresso', 'Espresso is a concentrated coffee beverage brewed by forcing hot water under pressure through finely-ground coffee beans. It is known for its robust flavor, strong aroma, and a layer of crema on top, providing a quick and intense caffeine boost in a small, concentrated shot.', 2, 'Meal-Name-6224.jpg', 21, 'Yes', 'Yes'),
(27, 'Green Tea', 'Green tea is a popular, antioxidant-rich beverage made from unoxidized Camellia sinensis leaves. Known for its mild, earthy flavor, it\'s celebrated for potential health benefits and is widely consumed globally.', 1, 'Meal-Name-5067.jpg', 21, 'Yes', 'Yes'),
(28, 'Mango Lassi', 'Mango lassi is a refreshing Indian drink made by blending ripe mangoes with yogurt, milk, and a touch of sugar. This sweet and creamy beverage is often flavored with cardamom and served chilled.', 2, 'Meal-Name-8615.jpg', 21, 'Yes', 'Yes'),
(29, 'Mojito', 'Mojito is a classic cocktail originating from Cuba, consisting of white rum, sugar, lime juice, soda water, and fresh mint. It\'s a refreshing and citrusy drink served over ice, making it a popular choice for warm weather and social gatherings.', 1, 'Meal-Name-9608.jpg', 21, 'Yes', 'Yes'),
(30, 'Lemonade', 'Lemonade is a simple and refreshing beverage made from freshly squeezed lemon juice, water, and sugar. It offers a sweet-tart flavor and is often served over ice, making it a popular and thirst-quenching choice, especially during hot weather.', 2, 'Meal-Name-2998.jpg', 21, 'Yes', 'Yes'),
(31, 'Apple Pie', 'Apple pie is a classic dessert consisting of a flaky pastry crust filled with sliced apples, sugar, and cinnamon. Baked to golden perfection, it offers a warm, comforting, and delicious treat, often enjoyed with a scoop of vanilla ice cream.', 3, 'Meal-Name-4674.jpg', 20, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `meal_category`
--

CREATE TABLE `meal_category` (
  `categoryID` int(10) UNSIGNED NOT NULL,
  `categoryTittle` varchar(100) NOT NULL,
  `ctgryImageName` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meal_category`
--

INSERT INTO `meal_category` (`categoryID`, `categoryTittle`, `ctgryImageName`, `featured`, `active`) VALUES
(17, 'Pizza', 'Food_Category_244.jpg', 'Yes', 'Yes'),
(18, 'Rice', 'Food_Category_148.jpg', 'Yes', 'Yes'),
(19, 'Noodles', 'Food_Category_421.jpg', 'Yes', 'Yes'),
(20, 'Dessert', 'Food_Category_628.jpg', 'Yes', 'Yes'),
(21, 'Beverages', 'Food_Category_333.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(10) UNSIGNED NOT NULL,
  `orderMeal` varchar(150) NOT NULL,
  `orderPrice` decimal(10,0) NOT NULL,
  `orderQty` int(11) NOT NULL,
  `orderTotal` decimal(10,0) NOT NULL,
  `orderDate` datetime NOT NULL,
  `orderStatus` varchar(50) NOT NULL,
  `costomerName` varchar(150) NOT NULL,
  `customerContact` varchar(20) NOT NULL,
  `customerEmail` varchar(150) NOT NULL,
  `customerAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `orderMeal`, `orderPrice`, `orderQty`, `orderTotal`, `orderDate`, `orderStatus`, `costomerName`, `customerContact`, `customerEmail`, `customerAddress`) VALUES
(1, 'Pepperoni Pizza', 16, 1, 16, '2023-12-16 09:40:09', 'Ordered', 'Yomal Thushara', '0710151055', 'yomalthushara2001@gmail.com', 'asas'),
(2, 'BBQ chicken pizza', 9, 3, 27, '2023-12-16 09:46:46', 'Ordered', 'Visitha Nirmal', '07566463242', 'vnr2001@gmail.com', '99/3, Kahawatta, Abatenna');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `resID` int(10) NOT NULL,
  `resDay` varchar(20) NOT NULL,
  `resHour` varchar(10) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `persons` int(10) NOT NULL,
  `reservation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`resID`, `resDay`, `resHour`, `fullName`, `phoneNumber`, `persons`, `reservation_date`) VALUES
(2, 'friday', '10', 'Yomal Thushara', '0722640485', 3, '2023-12-17 16:34:19'),
(3, 'friday', '10', 'Chamod Mullegama', '0782651489', 4, '2023-12-17 16:34:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`meal_ID`);

--
-- Indexes for table `meal_category`
--
ALTER TABLE `meal_category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`resID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `meal_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `meal_category`
--
ALTER TABLE `meal_category`
  MODIFY `categoryID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `resID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
