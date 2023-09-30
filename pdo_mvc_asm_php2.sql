-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 30, 2023 lúc 08:37 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pdo_mvc_asm_php2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'hieulhh', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_post`
--

CREATE TABLE `tbl_category_post` (
  `id_category_post` int(11) NOT NULL,
  `title_category_post` varchar(255) NOT NULL,
  `desc_category_post` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_post`
--

INSERT INTO `tbl_category_post` (`id_category_post`, `title_category_post`, `desc_category_post`) VALUES
(1, 'kinh tế', 'sạhdjshs'),
(2, 'luạt pháp', 'sạhdjshs'),
(3, 'thế giới quanh ta', 'hế llo ca nma'),
(4, 'lao động', 'aklalsk');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `id_category_product` int(11) UNSIGNED NOT NULL,
  `title_category_product` varchar(100) NOT NULL,
  `desc_category_product` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`id_category_product`, `title_category_product`, `desc_category_product`) VALUES
(2, 'Gia vị', 'Bao gồm các loại gia vị'),
(3, 'Đồ hộp/lon', 'Bao gồm các loại đồ hộp/lon'),
(16, 'Rau Củ tươi', 'Bao gồm các loại rau, củ tươi '),
(18, 'Hạt và ngũ cốc 123', 'Bao gồm các loại hạt và ngũ cốc 123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(100) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `customer_name`, `customer_phone`, `customer_email`, `customer_password`, `customer_address`, `created_at`, `updated_at`) VALUES
(1, 'Hiếu', '0377683838', 'lehuynhhieu.dll@gmail.com', '25f9e794323b453885f5181f1b624d0b', '11A/7 Lê Lợi', '2023-06-11 22:09:04', '2023-06-11 22:09:04'),
(2, 'tèo', '273627632', 'teo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '11A/7 Lê Lợi', '2023-06-11 22:49:12', '2023-06-11 22:49:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `order_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_code`, `order_date`, `order_status`) VALUES
(9, '4615', '14/06/2023 12:28:07am', 0),
(10, '2308', '14/06/2023 12:29:02am', 1),
(11, '714', '14/06/2023 12:35:30am', 0),
(12, '9575', '14/06/2023 12:36:27am', 0),
(13, '8878', '14/06/2023 12:37:04am', 0),
(14, '3760', '14/06/2023 01:28:54pm', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `noidung` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`order_detail_id`, `order_code`, `product_id`, `product_quantity`, `name`, `phone`, `address`, `email`, `noidung`) VALUES
(1, '2308', 7, 2, 'Hieu Le', '12312312', 'Binh Chanh', 'lehuynhhieu.dll@gmail.com', '1221'),
(2, '2308', 32, 2, 'Hieu Le', '12312312', 'Binh Chanh', 'lehuynhhieu.dll@gmail.com', '1221'),
(3, '2308', 20, 1, 'Hieu Le', '12312312', 'Binh Chanh', 'lehuynhhieu.dll@gmail.com', '1221'),
(4, '714', 7, 2, 'Hieu Le', '0377683838', 'Binh Chanh', 'lehuynhhieu.dll@gmail.com', 'mâmma'),
(5, '714', 32, 2, 'Hieu Le', '0377683838', 'Binh Chanh', 'lehuynhhieu.dll@gmail.com', 'mâmma'),
(6, '714', 20, 1, 'Hieu Le', '0377683838', 'Binh Chanh', 'lehuynhhieu.dll@gmail.com', 'mâmma'),
(7, '9575', 43, 1, 'teo em', '0377683838', 'quận 12', 'lehuynhhieu.dll@gmail.com', '12121'),
(8, '9575', 19, 1, 'teo em', '0377683838', 'quận 12', 'lehuynhhieu.dll@gmail.com', '12121'),
(9, '8878', 17, 1, '1 lan ', '0377683838', '11 Lê Lợi, Phường 2, Thành phố Tuy Hòa', 'lehuynhhieu.dll@gmail.com', '22121'),
(10, '3760', 37, 2, 'kien van thuan', '0377683838', '11 Lê Lợi, Phường 2, Thành phố Tuy Hòa', 'thuan.dll@gmail.com', '212'),
(11, '3760', 43, 2, 'kien van thuan', '0377683838', '11 Lê Lợi, Phường 2, Thành phố Tuy Hòa', 'thuan.dll@gmail.com', '212');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id_post` int(11) NOT NULL,
  `title_post` varchar(255) NOT NULL,
  `content_post` text NOT NULL,
  `img_post` varchar(200) NOT NULL,
  `id_category_post` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_post`
--

INSERT INTO `tbl_post` (`id_post`, `title_post`, `content_post`, `img_post`, `id_category_post`, `created_at`, `updated_at`) VALUES
(4, 'Ánh trang lẻ loi14235', 'dsadasdsadasdasda', 'thong1686407987.jpg', 1, '2023-06-10 12:35:48', '2023-06-10 12:35:48'),
(5, 'Ánh trang lẻ loi20', 'fhsdukfhdsjkfhsdjkhfjksd', 'cumeo1686408052.jpg', 3, '2023-06-10 14:40:26', '2023-06-10 14:40:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id_product` int(11) UNSIGNED NOT NULL,
  `title_product` varchar(255) NOT NULL,
  `price_product` varchar(100) NOT NULL,
  `desc_product` text NOT NULL,
  `quantity_product` int(11) NOT NULL,
  `img_product` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_category_product` int(11) UNSIGNED NOT NULL,
  `product_hot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`id_product`, `title_product`, `price_product`, `desc_product`, `quantity_product`, `img_product`, `created_at`, `updated_at`, `id_category_product`, `product_hot`) VALUES
(7, 'Aloe Vera Yurthfarm', '29000', 'Products are grown using modern technology, ensuring freshness, food hygiene and safety.', 100, 'raucu11686467880.jpg', '2023-06-11 07:18:00', '2023-06-11 07:18:00', 16, 1),
(8, 'Amaranth', '17000', 'Products are grown using modern technology, ensuring freshness, food hygiene and safety.', 100, 'raucu21686467946.jpg', '2023-06-11 07:19:06', '2023-06-11 07:19:06', 16, 1),
(9, 'Amaranth Organic', '32000', 'Products are grown using modern technology, ensuring freshness, food hygiene and safety.', 100, 'raucu31686467997.jpg', '2023-06-11 07:19:57', '2023-06-11 07:19:57', 16, 0),
(10, 'Artichoke Australia', '232500', 'Products are grown using modern technology, ensuring freshness, food hygiene and safety.', 50, 'raucu41686468079.jpg', '2023-06-11 07:21:19', '2023-06-11 07:21:19', 16, 0),
(11, 'Asean Salad Mixed VietGAP', '36750', 'Products are grown using modern technology, ensuring freshness, food hygiene and safety.', 100, 'raucu51686468138.jpg', '2023-06-11 07:22:18', '2023-06-11 07:22:18', 16, 0),
(12, 'Asparagus Global GAP', '90000', 'Products are grown using modern technology, ensuring freshness, food hygiene and safety.', 100, 'raucu61686468201.jpg', '2023-06-11 07:23:21', '2023-06-11 07:23:21', 16, 0),
(13, 'Baby Bok Choy Global GAP (500g)', '41300', 'Products are grown using modern technology, ensuring freshness, food hygiene and safety.', 50, 'raucu71686468270.jpg', '2023-06-11 07:24:30', '2023-06-11 07:24:30', 16, 0),
(14, 'Baby Broccoli Global GAP (250g)', '49500', 'Products are grown using modern technology, ensuring freshness, food hygiene and safety.', 100, 'raucu81686468324.jpg', '2023-06-11 07:25:24', '2023-06-11 07:25:24', 16, 0),
(15, 'Baby Beetroot (450g)', '34000', 'Products are grown using modern technology, ensuring freshness, food hygiene and safety.', 100, 'raucu91686468381.jpg', '2023-06-11 07:26:21', '2023-06-11 07:26:21', 16, 0),
(16, 'Baby Capsicum Multicolors Global GAP (300g)', '34750', 'Products are grown using modern technology, ensuring freshness, food hygiene and safety.', 100, 'raucu101686468431.jpg', '2023-06-11 07:27:11', '2023-06-11 07:27:11', 16, 0),
(17, 'Baby Carrot Global GAP', '41500', 'Products are grown using modern technology, ensuring freshness, food hygiene and safety.', 100, 'raucu111686468480.png', '2023-06-11 07:28:00', '2023-06-11 07:28:00', 16, 0),
(18, 'Baby Chayote Global GAP (500g)', '14800', 'Products are grown using modern technology, ensuring freshness, food hygiene and safety.', 100, 'raucu121686468521.jpg', '2023-06-11 07:28:41', '2023-06-11 07:28:41', 16, 0),
(19, 'Amarena Fabbri Wild Cherries in Syrup 230g', '300000', 'These local wild cherries are dark red with both a sweet and slightly bitter flavour are preserved in a rich syrup made from the juice of the same fruit.', 100, 'hohop11686468697.jpg', '2023-06-11 07:31:37', '2023-06-11 07:31:37', 3, 1),
(20, 'Dole Longan 24 x 565g', '65000', 'Source of natural ingredients, good for health', 100, 'dohop21686468740.jpg', '2023-06-11 07:32:20', '2023-06-11 07:32:20', 3, 1),
(21, 'Dole Mandarin Oranges in Light Syrup (425g)', '59000', 'The Dole brand – is the world\'s leading producer and marketer of fresh fruit. Dole\'s products are healthy, made entirely from natural fruits.', 100, 'dohop31686468779.jpg', '2023-06-11 07:32:59', '2023-06-11 07:32:59', 3, 0),
(22, 'Dole Peach Halves in Syrup (820g)', '129000', 'Source of natural ingredients, good for health', 100, 'dohop41686468817.jpg', '2023-06-11 07:33:37', '2023-06-11 07:33:37', 3, 0),
(23, 'Dole Pineapple Chunks In Syrup 822G', '65000', 'Source of natural ingredients, good for health', 100, 'dohop51686468864.jpg', '2023-06-11 07:34:24', '2023-06-11 07:34:24', 3, 0),
(24, 'Dole Rambutan in syrup (565g)', '88000', 'Source of natural ingredients, good for health', 100, 'dohop61686468929.jpg', '2023-06-11 07:35:29', '2023-06-11 07:35:29', 3, 0),
(25, 'Gold Reef Half Peaches In Heavy Syrup (480g)', '95000', 'Completely natural ingredients, convenient packaging, easy to store', 100, 'dohop71686468994.jpg', '2023-06-11 07:36:34', '2023-06-11 07:36:34', 3, 0),
(26, 'Greenfield Longan in syrup (565g)', '71000', 'Self-contained, strict, safe, chemical-free', 100, 'dohop81686469037.jpg', '2023-06-11 07:37:17', '2023-06-11 07:37:17', 3, 0),
(27, 'Kronos Yellow Cling Peach Halves in Syrup (820g) SKU F134350', '130000', 'Kronos peaches are currently one of the best-selling pickled peaches on the market. The product is securely packaged so it can be stored anywhere.', 100, 'dohop91686469089.jpg', '2023-06-11 07:38:09', '2023-06-11 07:38:09', 3, 0),
(28, 'Okazaki Bussan Almond Tofu Jelly 300g', '64000', 'Almond tofu is a sweet modest almond tofu fruit with plenty.', 100, 'dohop101686469137.jpg', '2023-06-11 07:38:57', '2023-06-11 07:38:57', 3, 0),
(29, 'Okazaki Bussan Kuzukiri Jelly 300g', '72000', 'The clear, flat Kuzukiri agar fibers are made from the Kuzu powder of the Kuzu plant. Kuzukiri is a sweet commonly used in Amamidokoro (or Kanmidokoro, a signature candy commonly found in cafes in Japan). On hot summer days, this delicious chewy Kuzukiri jelly is very popular. In addition to serving as a sweet dessert, Kuzukiri is also eaten with hot po', 100, 'dohop111686469188.jpg', '2023-06-11 07:39:48', '2023-06-11 07:39:48', 3, 0),
(30, 'Valfrutta Plums in Syrup (411g)', '72000', 'Valfrutta offers you all the sweetness and strong flavour of the best Italian plums.\r\nDETAILS', 100, 'dohop121686469242.jpg', '2023-06-11 07:40:42', '2023-06-11 07:40:42', 3, 0),
(31, 'Ponti Capers in Wine Vinegar 95g', '99000', 'Italian Product Ponti Capperi is a pickled capers fruit mixed with salt and wine vinegar.', 100, 'gvi11686469365.png', '2023-06-11 07:42:45', '2023-06-11 07:42:45', 2, 0),
(32, 'Puget Xeres-Garlic-Basil Dressing (330ml)', '170000', 'This light vinaigrette bursting with flavours of the South comes from a clever blend of ingredients delicately cooked. A soft touch of garlic (3.2%) complements the flavour of basil (1.5%), enhanced by fruity sherry vinegar.', 100, 'gvi21686469414.jpg', '2023-06-11 07:43:34', '2023-06-11 07:43:34', 2, 1),
(33, 'Sarson\'s Malt Vinegar (250ml)', '134000', 'Delicious malt vinegar for dressing your salads, potatoes or other dishes. Enjoy the best taste of vinegar in a convenient format 250 ml.', 100, 'gvi31686469456.jpg', '2023-06-11 07:44:16', '2023-06-11 07:44:16', 2, 1),
(34, 'JoyVN Sweet&Salty Seaweed PeanutTopping(240g)', '63000', '', 100, 'gvi41686469836.jpg', '2023-06-11 07:50:36', '2023-06-11 07:50:36', 2, 0),
(35, 'Naturgreen Himalayan Coarse Salt (500g)', '161000', 'Muối himalaya', 100, 'gvi51686470609.png', '2023-06-11 08:03:29', '2023-06-11 08:03:29', 2, 0),
(36, 'Naturgreen Himalayan Fine Salt (500g)', '161000', 'Muối Hymalayan', 100, 'gvi61686470659.jpg', '2023-06-11 08:04:19', '2023-06-11 08:04:19', 2, 0),
(37, 'NX Himalaya Pink Salt spicy shrimp (50g)', '49000', 'Muối Hymalayan', 100, 'gvi71686470725.png', '2023-06-11 08:05:25', '2023-06-11 08:05:25', 18, 0),
(38, 'Sel De Bac Lieu Salt Flakes in tube 1kg', '78000', 'Muối cá Bạc Liêu', 100, 'gvi81686470786.png', '2023-06-11 08:06:26', '2023-06-11 08:06:26', 2, 0),
(39, 'Sel De Bac Lieu Sea Salt 180g', '125000', '100% unrefined seasalt crystals formed by the sun and ocean breeze. Harvested from the salt pools of Bac Lieu. It only contains natural elements and minerals', 100, 'gvi91686470834.jpg', '2023-06-11 08:07:14', '2023-06-11 08:07:14', 2, 0),
(40, 'McCormick Ground Allspice (30g)', '76000', 'McCormick is recognized by customers because of 3 key features: The high quality of material The perfect mix ratio The microbiological control', 100, 'gvi101686470947.jpg', '2023-06-11 08:09:07', '2023-06-11 08:09:07', 2, 0),
(41, 'Minh Ha Ground Black Pepper (100g)', '74000', 'Tiêu sọ Phú Quốc', 100, 'gvi111686470998.png', '2023-06-11 08:09:58', '2023-06-11 08:09:58', 2, 0),
(42, 'Thanh Quoc Phu Quoc Pepper Mixed Sugar (300g)', '54000', 'Tiêu chín ngào đường', 100, 'gvi121686471050.png', '2023-06-11 08:10:50', '2023-06-11 08:10:50', 2, 0),
(43, 'Ngũ cốc Nestlé Koko Krunch vị socola hộp 150g', '60000', 'Bánh ngũ cốc ăn sáng Nestlé bổ sung Vitamin giúp phát triển thể chất và trí tuệ của trẻ. Ngũ cốc Nestlé Koko Krunch vị socola hộp 150g là sản phẩm bánh ngũ cốc vị socola kích thích cảm giác thèm ăn, cho bé hấp thụ dinh dưỡng tốt hơn, ngăn ngừa tình trạng thiếu máu ở trẻ.', 100, 'nc11686471503.jpg', '2023-06-11 08:18:23', '2023-06-11 08:18:23', 18, 1),
(44, 'Yến mạch nguyên chất Yumfood hũ 800g', '139000', 'Yến mạch ăn liền Yumfood hũ 800g được chế biến hoàn toàn từ 100% yến mạch nguyên chất, đạt chuẩn an toàn thực phẩm cùng với cam kết 3 không (không phẩm màu, không chất phụ gia và không chất bảo quản). Vì thế, yến mạch Yumfood vẫn giữ được độ thơm ngon và hàm lượng chất xơ dồi dào từ yến mạch', 100, 'nc21686471546.jpg', '2023-06-11 08:19:06', '2023-06-11 08:19:06', 18, 1),
(45, 'Bột đậu nành hạt sen mật ong Vitapro bịch 420g', '33000', 'Bột đậu nành kết hợp với hạt sen và mật ong mang đến cho bạn dinh dưỡng, thơm ngon. Bột đậu nành hạt sen mật ong Vitapro bịch 420g tiện lợi, có thể pha nóng hoặc lạnh tùy theo sở thích của bạn. Bột dinh dưỡng Vitapro thơm ngon, dinh dưỡng, giúp bạn có năng lượng hoạt động mỗi ngày', 100, 'nc31686471604.jpg', '2023-06-11 08:20:04', '2023-06-11 08:20:04', 18, 0),
(46, 'Yến mạch Úc cán mỏng Nutty hộp 300g', '43000', 'Yến mạch Úc cán mỏng Nutty hộp 300g giàu chất xơ, chất đạm, hương vị thơm ngon, yến mạch có thể dùng để chế biến thành nhiều món ăn khác nhau, rất tốt cho sức khỏe. Yến mạch Nutty được làm từ thành phần 100 % yến mạch Úc nguyên chất thơm ngon.', 100, 'nc41686472129.jpg', '2023-06-11 08:28:49', '2023-06-11 08:28:49', 18, 0),
(47, 'Ngũ cốc trái cây Calbee gói 482g', '165500', 'Ngũ cốc Calbee chất lượng, giàu dinh dưỡng được nhiều người tin tưởng lựa chọn. Ngũ cốc trái cây Calbee gói 482g được chế biến từ nguồn nguyên liệu tươi ngon, đảm bảo an toàn vệ sinh thực phẩm. Bạn có thể dùng ngũ cốc cùng sữa, sữa chua hay các loại nước ép tuỳ theo sở thích đều ngon.', 100, 'nc51686472464.jpg', '2023-06-11 08:34:24', '2023-06-11 08:34:24', 18, 0),
(48, 'Hạt chia hữu cơ Peru Dĩnh Trần hộp 350g', '159000', 'Hạt chia là một loại là loại thực phẩm giàu dinh dưỡng, vitamin, protein bổ sung cho cơ thể nhiều dưỡng chất cần thiết. Hạt chia hữu cơ Peru hộp 350g từ thương hiệu Dĩnh Trần đem đến cho chúng ta một sản phẩm sạch an toàn và chất lượng.', 100, 'nc61686472780.jpg', '2023-06-11 08:39:40', '2023-06-11 08:39:40', 18, 0),
(49, '5 thanh ngũ cốc Nestlé Koko Krunch 25g', '77400', 'Ngũ cốc Nestlé bổ sung vitamin B1,B2, B3, B6 và C, ngũ cốc đóng vai trò quan trọng trong sự phát triển thể chất và trí tuệ của trẻ. 5 thanh ngũ cốc Nestlé Koko Krunch 25g kích thích cảm giác thèm ăn, chuyển hóa năng lượng cho bé hấp thụ dinh dưỡng tốt hơn và ngăn ngừa tình trạng thiếu máu ở trẻ.', 100, 'nc71686472838.jpg', '2023-06-11 08:40:38', '2023-06-11 08:40:38', 18, 0),
(50, '5 thanh ngũ cốc Nestlé Fitnesse vị socola 23.5g', '67500', 'Ngũ cốc Nestlé bổ sung vitamin B1,B2, B3, B6 và C đóng vai trò quan trọng trong sự phát triển thể chất và có vị socola dễ ăn. 5 thanh ngũ cốc Nestlé Fitnesse vị socola 23.5g kích thích cảm giác thèm ăn, chuyển hóa năng lượng giúp hấp thụ dinh dưỡng tốt hơn và ngăn ngừa tình trạng thiếu máu.', 100, 'nc81686472886.jpg', '2023-06-11 08:41:26', '2023-06-11 08:41:26', 18, 0),
(51, '5 thanh bánh ngũ cốc Nestlé Milo Bar 235g', '63700', 'Ngũ cốc Nestlé bổ sung vitamin B1,B2, B3, B6 và C đóng vai trò quan trọng trong sự phát triển thể chất và trí tuệ của trẻ. 5 thanh bánh ngũ cốc Nestlé Milo Bar 235g kích thích cảm giác thèm ăn, chuyển hóa năng lượng cho bé hấp thụ dinh dưỡng tốt hơn và ngăn ngừa tình trạng thiếu máu ở trẻ.', 100, 'nc91686472927.jpg', '2023-06-11 08:42:07', '2023-06-11 08:42:07', 18, 0),
(52, 'Mủ trôm hạt chia đường phèn Ciel gói 100g', '27200', 'Hạt chia là một loại thực vật có nguồn gốc từ Trung Mỹ và được sử dụng như một thực phẩm bổ sung hàng ngày bởi những lợi ích tuyệt vời mà nó mang lại cho sức khỏe. Mủ trôm hạt chia đường phèn Ciel gói 100g sẽ giúp giải nhiệt nhanh chóng và bổ sung nguồn chất xơ dồi dào cho cơ thể.', 100, 'nc101686473762.jpg', '2023-06-11 08:56:02', '2023-06-11 08:56:02', 18, 0),
(53, 'Bột yến mạch tổ yến Anpha hộp 200g', '68000', 'Bột yến mạch Anpha không chỉ là một loại thực phẩm bổ dưỡng, mà còn có những công dụng khá bất ngờ đối với sức khỏe,do yến mạch chứa nhiều chất xơ hòa tan. Bột yến mạch thơm ngon, dễ ăn và đầy dinh dưỡng. Bột yến mạch tổ yến Anpha hộp 200g bổ sung yến mạch sẽ giúp bảo vệ tim của bạn', 100, 'nc111686473814.jpg', '2023-06-11 08:56:54', '2023-06-11 08:56:54', 18, 0),
(54, 'Thực phẩm bổ sung yến mạch nếp cẩm Yumfood gói 210g', '42000', 'Yến mạch, ngũ cốc của thương hiệu Yumfood sở hữu công thức đặc biệt, chứa ít calo, ít chất béo, nhiều chất xơ, giúp bạn kiểm soát cân nặng hiệu quả, mang lại một cơ thể khỏe mạnh và một vóc dáng thon thả, như ý. Thực phẩm bổ sung yến mạch nếp cẩm Yumfood gói 210g hương vị thơm ngon dễ ăn.', 100, 'nc121686473866.jpg', '2023-06-11 08:57:46', '2023-06-11 08:57:46', 18, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_category_post`
--
ALTER TABLE `tbl_category_post`
  ADD PRIMARY KEY (`id_category_post`);

--
-- Chỉ mục cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`id_category_product`);

--
-- Chỉ mục cho bảng `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id_post`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category_product` (`id_category_product`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_category_post`
--
ALTER TABLE `tbl_category_post`
  MODIFY `id_category_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `id_category_product` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id_product` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD CONSTRAINT `tbl_order_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`id_category_product`) REFERENCES `tbl_category_product` (`id_category_product`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
