-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 11, 2023 lúc 05:07 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webktravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_menu`
--

CREATE TABLE `list_menu` (
  `list_id` int(11) NOT NULL,
  `list_name` varchar(255) NOT NULL,
  `list_address` varchar(255) NOT NULL,
  `list_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `list_menu`
--

INSERT INTO `list_menu` (`list_id`, `list_name`, `list_address`, `list_code`) VALUES
(1, 'Trang chủ', 'http://localhost/DACS2/index.php', 'home'),
(2, 'Địa điểm', 'http://localhost/DACS2/index.php?main=location&id=in', 'location'),
(4, 'Khuyến mãi', 'http://localhost/DACS2/index.php?main=promotion', 'promotion'),
(6, 'Liên hệ', 'http://localhost/DACS2/index.php?main=contact', 'contact'),
(7, 'Giỏ hàng', 'http://localhost/DACS2/main/cart_view.php', 'cart');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_menu_item`
--

CREATE TABLE `list_menu_item` (
  `id` int(100) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_address` varchar(100) NOT NULL,
  `item_code` varchar(100) NOT NULL,
  `item_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `list_menu_item`
--

INSERT INTO `list_menu_item` (`id`, `item_name`, `item_address`, `item_code`, `item_type`) VALUES
(1, 'Trong nước', 'http://localhost/DACS2/index.php?main=location&id=in', 'in', 'location'),
(2, 'Ngoài nước', 'http://localhost/DACS2/index.php?main=location&id=out', 'out', 'location');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_stt` int(11) NOT NULL,
  `admin_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `name`, `password`, `admin_stt`, `admin_img`) VALUES
(1, 'admin', 'Kim Thuan', '202cb962ac59075b964b07152d234b70', 1, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id_cart` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `code_cart` varchar(255) NOT NULL,
  `cart_status` int(10) NOT NULL,
  `cart_payments` int(10) NOT NULL,
  `cart_price` varchar(100) NOT NULL,
  `cart_name` varchar(255) NOT NULL,
  `cart_email` varchar(255) NOT NULL,
  `cart_phone` varchar(20) NOT NULL,
  `cart_address` varchar(255) NOT NULL,
  `cart_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`id_cart`, `id_user`, `code_cart`, `cart_status`, `cart_payments`, `cart_price`, `cart_name`, `cart_email`, `cart_phone`, `cart_address`, `cart_note`) VALUES
(85, 26, 'Z73L77N6RP', 0, 0, '349.000', 'thuan', 'thuankim2214@gmail.com', '0915300091', 'Đà Nẵng', 'note');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cartegory`
--

CREATE TABLE `tbl_cartegory` (
  `cartegory_id` int(11) NOT NULL,
  `cartegory_name` varchar(255) NOT NULL,
  `cartegory_type` varchar(20) NOT NULL,
  `cartegory_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cartegory`
--

INSERT INTO `tbl_cartegory` (`cartegory_id`, `cartegory_name`, `cartegory_type`, `cartegory_code`) VALUES
(31, 'Hà Nội', 'Trong nước', 'hn'),
(32, 'Hạ Long', 'Trong nước', 'hl'),
(33, 'Huế', 'Trong nước', 'hue'),
(34, 'Quảng Bình', 'Trong nước', 'qb'),
(35, 'Đà Nẵng', 'Trong nước', 'dn'),
(36, 'Quảng Nam', 'Trong nước', 'qn'),
(37, 'Nha Trang', 'Trong nước', 'nt'),
(38, 'Đà Lạt', 'Trong nước', 'dl'),
(39, 'Bà Rịa - Vũng Tàu', 'Trong nước', ''),
(40, 'Phan Thiết', 'Trong nước', ''),
(41, 'Philippines', 'Ngoài nước', ''),
(42, 'Ấn Độ', 'Ngoài nước', ''),
(43, 'Trung Quốc', 'Ngoài nước', ''),
(44, 'Thái Lan', 'Ngoài nước', ''),
(45, 'Malaysia', 'Ngoài nước', ''),
(46, 'Singapore', 'Ngoài nước', ''),
(47, 'Hàn Quốc', 'Ngoài nước', ''),
(48, 'Mỹ - Hoa Kỳ', 'Ngoài nước', ''),
(49, 'Nhật Bản', 'Ngoài nước', ''),
(50, 'Ấn Độ', 'Ngoài nước', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart_details`
--

CREATE TABLE `tbl_cart_details` (
  `id_cart_details` int(10) NOT NULL,
  `code_cart` varchar(255) NOT NULL,
  `id_product` varchar(255) NOT NULL,
  `amout_product` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart_details`
--

INSERT INTO `tbl_cart_details` (`id_cart_details`, `code_cart`, `id_product`, `amout_product`) VALUES
(87, 'Z73L77N6RP', 'NDSGN152-029-281123VN-V', 1),
(88, 'Z73L77N6RP', 'NDSGN1333-005-291123VN-D', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `id_product` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `comment_content`, `id_user`, `id_product`, `user_name`) VALUES
(11, 'Hay quá', '26', 'NDSGN152-029-281123VN-V', 'thuan'),
(12, 'Hayyyy', '26', 'NDSGN152-029-281123VN-V', 'thuan'),
(13, 'HAyyyyyyyy', '0', 'NDSGN152-029-281123VN-V', 'Ẩn danh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phonenumber` varchar(100) NOT NULL,
  `contact_mess` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_contact`
--

INSERT INTO `tbl_contact` (`contact_id`, `contact_name`, `contact_email`, `contact_phonenumber`, `contact_mess`) VALUES
(1, 'Thuận', 'thuankim2214@gmail.com', '+84915300091', 'Thuan');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `product_location` varchar(50) NOT NULL,
  `product_price` int(20) NOT NULL,
  `product_detail` text NOT NULL,
  `product_img` varchar(100) NOT NULL,
  `img_product1` varchar(100) NOT NULL,
  `img_product2` varchar(100) NOT NULL,
  `img_product3` varchar(100) NOT NULL,
  `img_product4` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_code`, `product_type`, `product_location`, `product_price`, `product_detail`, `product_img`, `img_product1`, `img_product2`, `img_product3`, `img_product4`) VALUES
(43, ' Hà Giang - Lũng Cú - Đồng Văn', 'NDSGN152-029-281123VN-V', 'Trong nước', 'Hà Nội', 150000, '- Hà Giang là mảnh đất có rất nhiều màu sắc ấn tượng. Màu hồng phấn của những cánh đồng hoa tam giác mạch, mùa của hoa cải vàng, hoa mận, hoa ban; màu vàng ươm như rót mật của những thửa ruộng bậc thang mùa lúa chín; màu xanh của những dãy núi trùng điệp, của cung đường đèo Mã Pì Lèng nổi tiếng uốn lượn bên dòng sông Nho Quế thơ mộng… phủ khắp cả miền biên cương hùng vĩ của Tổ quốc. - Hà Giang còn mang sắc màu rực rỡ của những chiếc váy, của một không gian bồng bềnh mây khói, xanh ngắt của núi đồi với những con đường quanh co… Vẻ đẹp của cuộc sống giản dị hàng ngày giữa thiên nhiên hùng vĩ với những ánh mắt ngây thơ của trẻ nhỏ hay nụ cười hồn hậu của người dân… - Đặc biệt, du khách đến Hà Giang còn bị hớp hồn bởi những triền đá tai mèo trùng điệp, những con đường quanh co, uốn lượn, những điểm đến độc đáo như cao nguyên đá Đồng Văn, dinh thự họ Vương, cột cờ Lũng Cú hay cao điểm Vị Xuyên. Những sắc màu mang đầy sức sống của vùng sơn cước khi “cỏ cây chen đá, lá chen hoa” như mời gọi du khách đến với du lịch Hà Giang. Tất cả đã tạo nên một bức tranh Hà Giang rực rỡ làm say đắm lòng người và mời gọi du khách. - Tạm biệt cao nguyên đá Đồng Văn, Quý khách sẽ đặt chân đến vùng đất văn hóa của người Tày tại Vườn Quốc Gia Hồ Ba Bể, Bắc Cạn và Làng Đá Khuổi Ky, Cao Bằng. Nơi đây còn được biết đến với những danh thắng hùng vỹ như Hồ nước ngọt Ba Bể, Bắc Cạn - một trong một trăm hồ nước ngọt lớn nhất thế; thác Bản Giốc, Cao Bằng - thác nước lớn thứ tư thế giới trong số các thác nước đẹp nằm trên biên giới giữa các quốc gia, đồng thời là thác nước tự nhiên lớn nhất khu vực Đông Nam', 'product2_3.jpg', 'product2_2.jpg', 'product2.jpg', 'product2_1.jpg', 'product2_4.jpg'),
(44, 'Sapa - Bản Cát Cát - Fansipan', 'NDSGN1333-005-291123VN-D', 'Trong nước', 'Hà Nội', 199000, 'Lào Cai là tỉnh vùng cao phía Bắc Việt Nam. Lào Cai có những điểm văn hóa, phong cảnh lãng mạn, những điểm check-in nổi tiếng của giới trẻ như thung lũng Mường Hoa, đỉnh Phanxipang, núi Hàm Rồng, các bản văn hóa dân tộc như Cát Cát, Tả Van, Lào Chải, Tả Phìn và những con đường mòn ôm sát cánh đồng lúa, … Ngoài ra, Lào Cai còn là điểm đến hấp dẫn của du khách bởi nét văn hóa ẩm thực đặc sắc của nhiều dân tộc anh em vùng cao.  Đặt chân đến Quảng Ninh – tỉnh đầu tiên có 4 thành phố: Hạ Long, Móng Cái, Uông Bí và Cẩm Ph tạo nên thành phố du lịch không chỉ nổi tiếng về biển như Vịnh Hạ Long với hàng nghìn đảo đá nhấp nhô trên sóng nước lung linh huyền ảo, những hang động tuyệt đẹp, những bãi tắm hoang sơ, làn nước mát lạnh trong veo đặt trưng của vùng đảo Cô Tô, Soi Sim, ... Không những thế, Quảng Ninh còn hấp dẫn du khách về không khí mát mẻ của vùng núi thiêng Yên Tử nơi hội tụ tâm linh, văn hóa và không gian nghỉ dưỡng đỉnh cao. Nếu bạn yêu sự hoang sơ của thiên nhiên, không gian thoáng mát thì hãy thử một lần ghé thăm cao nguyên Bình Liêu, được ví von như “Sapa vùng đất than”, với các cột mốc biên giới và dãy “cờ cỏ lau” hay con đường “Sống lưng khủng long” chạy dọc đường tuần biên luôn là điểm dừng yêu thích của du khách trong và ngoài tỉnh.', 'product3.jpg', 'product3_2.jpg', 'product3_1.jpg', 'product3_3.jpg', 'product3_4.jpg'),
(45, 'Hà Nội - Hạ Long - Yên Tử', 'NDSGN1061-166-301123VU-V', 'Trong nước', 'Hà Nội', 199000, 'Đặt chân đến Quảng Ninh – tỉnh đầu tiên có 4 thành phố: Hạ Long, Móng Cái, Uông Bí và Cẩm Phả tạo nên thành phố du lịch không chỉ nổi tiếng về biển như Vịnh Hạ Long với hàng nghìn đảo đá nhấp nhô trên sóng nước lung linh huyền ảo, những hang động tuyệt đẹp, những bãi tắm hoang sơ, làn nước mát lạnh trong veo đặc trưng của vùng đảo Cô Tô, Soi Sim, ... Không những thế, Quảng Ninh còn hấp dẫn du khách về không khí mát mẻ của vùng núi thiêng Yên Tử nơi hội tụ tâm linh, văn hóa và không gian nghỉ dưỡng đỉnh cao. Nếu bạn yêu sự hoang sơ của thiên nhiên, không gian thoáng mát thì hãy thử một lần ghé thăm cao nguyên Bình Liêu, được ví von như “Sapa vùng đất than”, với các cột mốc biên giới và dãy “cờ cỏ lau” hay con đường “Sống lưng khủng long” chạy dọc đường tuần biên luôn là điểm dừng yêu thích của du khách trong và ngoài tỉnh. ', 'product4_1.jpg', 'product4_1.jpg', 'product4_3.jpg', 'product4_2.jpg', 'product4.jpg'),
(46, ' Hà Nội - Hà Giang - Đồng Văn', 'NDSGN168-023-011223VN-V', 'Trong nước', 'Hà Nội', 200000, 'Hà Giang là mảnh đất có rất nhiều màu sắc ấn tượng. Màu hồng phấn của những cánh đồng hoa tam giác mạch, mùa của hoa cải vàng, hoa mận, hoa ban; màu vàng ươm như rót mật của những thửa ruộng bậc thang mùa lúa chín; màu xanh của những dãy núi trùng điệp, của cung đường đèo Mã Pì Lèng nổi tiếng uốn lượn bên dòng sông Nho Quế thơ mộng… phủ khắp cả miền biên cương hùng vĩ của Tổ quốc.  ', 'product5_3.jpg', 'product5.jpg', 'product5_1.jpg', 'product5_4.jpg', 'product5_3.jpg'),
(47, ' Bảo tàng Quảng Ninh', 'NDSGN103-089-071223VN-D', 'Trong nước', 'Hạ Long', 299000, 'Đặt chân đến Quảng Ninh – tỉnh đầu tiên có 4 thành phố: Hạ Long, Móng Cái, Uông Bí và Cẩm Phả tạo nên thành phố du lịch không chỉ nổi tiếng về biển như Vịnh Hạ Long với hàng nghìn đảo đá nhấp nhô trên sóng nước lung linh huyền ảo, những hang động tuyệt đẹp, những bãi tắm hoang sơ, làn nước mát lạnh trong veo đặc trưng của vùng đảo Cô Tô, Soi Sim, ... Không những thế, Quảng Ninh còn hấp dẫn du khách về không khí mát mẻ của vùng núi thiêng Yên Tử nơi hội tụ tâm linh, văn hóa và không gian nghỉ dưỡng đỉnh cao. Nếu bạn yêu sự hoang sơ của thiên nhiên, không gian thoáng mát thì hãy thử một lần ghé thăm cao nguyên Bình Liêu, được ví von như “Sapa vùng đất than”, với các cột mốc biên giới và dãy “cờ cỏ lau” hay con đường “Sống lưng khủng long” chạy dọc đường tuần biên luôn là điểm dừng yêu thích của du khách trong và ngoài tỉnh. -Ninh Bình - vùng đất “Nơi mơ đến, chốn mong về” ghi dấu ấn với Quần thể danh thắng Tràng An -Di sản văn hóa thiên nhiên thế giới, đi thuyền chèo tham quan hệ thống thạch nhũ trong hang động và di tích Đền Trần; uy nghiêm trầm mặc với quần thể chùa Bái Đính, ẩn mình thanh tịnh sau hang động với Tuyệt tịnh cốc, …', 'product6_2.jpg', 'product6_2.jpg', 'product6_1.jpg', 'product6.jpg', 'product6_4.jpg'),
(48, ' Du lịch đảo Tuần Châu, Hạ Long', 'NDSGN133-007-091223VN-D', 'Trong nước', 'Hạ Long', 499000, 'Nằm tại cửa ngõ của vịnh Hạ Long, đảo Tuần Châu là địa điểm du lịch Hạ Long nổi tiếng với hệ thống cảng du thuyền nhân tạo lớn nhất Việt Nam, bãi biển đẹp và sở hữu khu vui chơi giải trí độc đáo… Đảo Tuần Châu còn được du khách đặt cho nhiều cái tên mỹ miều như đảo hoa hậu, đảo hoa, đảo ngọc châu, đảo dừa…', 'product7.jpg', 'product7_3.jpg', 'product7_2.jpg', 'product7_4.jpg', 'product7_1.jpg'),
(49, ' Bảo tàng tranh 3D Funny Art', 'NDSGN102-090-141223VN-D-1', 'Trong nước', 'Hạ Long', 99000, 'Khu vui chơi ở Bãi Cháy này nổi tiếng với hơn 40 bức tranh 3D cùng các hiệu ứng đa chiều về các chủ đề Aquarium, phiêu lưu, Parody,… sẽ giúp du khách lưu giữ lại những bức ảnh khó quên đầy ấn tượng.', 'product8_4.jpg', 'product8_1.jpg', 'product8_2.jpg', 'product8_4.jpg', 'product8_34.jpg'),
(50, 'Đà Nẵng - Huế - Đầm Lập An', 'NDSGN932-002-141223VN-D-7', 'Trong nước', 'Đà Nẵng', 199000, '- Phố cổ Hội An với lung linh sắc màu của đèn lồng và những hoạt động dân gian đặc sắc\r\n- Đại Nội Huế rộng lớn nơi hoàng cung xưa của các vua chúa Triều Nguyễn\r\n- Chùa Thiên Mụ - Biểu tượng xứ Huế mộng mơ. \r\n- Động Thiên Đường – Một trong những hang động kỳ vĩ nhất được Hiệp hội hang động Hoàng gia Anh đánh giá là hang động khô dài nhất Châu Á, thuộc quần thể Di sản thiên nhiên Thế Giới.\r\n- Động Phong Nha - Thuộc quần thể Di sản với hệ thống sông ngầm dài nhất Thế Giới', 'product9.jpg', 'product9_1.jpg', 'product9_3.jpg', 'product9_2.jpg', 'product9_4.jpg'),
(51, 'Cầu Vàng -Sơn Trà - Hội An - Đà Nẵng', 'NDNHA7102-002-201223VNA-V', 'Trong nước', 'Đà Nẵng', 200000, '- Đầm Lập An: Ngắm cảnh mây bồng bềnh trên những chóp núi bao bọc quanh đầm,..\r\n- Tinh dầu tràm Thái Hà: Huế được coi là xứ sở của loại dầu tràm nổi danh khắp nước với công dụng tuyệt vời, là phương thuốc lành tính, an toàn với mọi lứa tuổi, giúp tiêu tan cái mệt mỏi, các cơn đau kinh niên, cho giấc ngủ được sâu hơn,…\r\n- Chùa Thiên Mụ: ngôi chùa được xem là biểu tượng xứ Huế và là nơi lưu giữ nhiều cổ vật quý giá không chỉ về mặt lịch sử mà còn cả về nghệ thuật.\r\n- Đại Nội: hoàng cung xưa của 13 vị Vua triều Nguyễn, tham quan Ngọ Môn, Điện Thái Hòa, Tử Cấm Thành, Thế Miếu, Hiển Lâm Các, Cửu Đình.\r\n- Dạo Phố Đêm: trải nghiệm một Huế về đêm không hề trầm mặc với các công trình trải theo chiều dài lịch sử mà như một thiếu nữ trẻ trung khoác lên mình bộ cánh sắc màu căng tràn nhựa sống với tại Phố đi bộ ven sông Hương hài hòa với vẻ lung linh cầu Trường Tiền, tranh thêu XQ, tự do thưởng thức các món đường phố xứ Huế như bánh mì lọc, chè Huế, ngắm nhìn thuyền rồng ngược xuôi bên bến Tòa Khâm văng vẳng âm vang điệu hò Huế. Khám phá khu phố Tây sôi động về đêm với nhiều quán xá đông vui, những hàng quà lưu niệm.', 'product10.jpg', 'product10.jpg', 'product10_1.jpg', 'product10_3.jpg', 'product10_2.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_register`
--

CREATE TABLE `tbl_register` (
  `register_id` int(11) NOT NULL,
  `register_name` varchar(200) NOT NULL,
  `register_phonenumber` varchar(10) NOT NULL,
  `register_password` varchar(255) NOT NULL,
  `register_address` varchar(200) NOT NULL,
  `register_email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_register`
--

INSERT INTO `tbl_register` (`register_id`, `register_name`, `register_phonenumber`, `register_password`, `register_address`, `register_email`) VALUES
(19, 'Thuan', '0915300091', '202cb962ac59075b964b07152d234b70', 'Đội 10 Thôn 5 Tiên Hiệp Tiên Phước Quảng Nam', 'thuan1@gmail.com'),
(26, 'thuan', '0915300091', '202cb962ac59075b964b07152d234b70', 'Đội 10 Thôn 5 Tiên Hiệp Tiên Phước Quảng Nam', 'thuan2@gmail.com'),
(27, 'thuan kim', '0915300093', '202cb962ac59075b964b07152d234b70', 'Đội 10 Thôn 5 Tiên Hiệp Tiên Phước Quảng Nam', 'thuan3@gmail.com'),
(36, 'Kim Thuận', '+849153000', '202cb962ac59075b964b07152d234b70', 'Đội 10 Thôn 5 Tiên Hiệp Tiên Phước Quảng Nam', 'thuankim2214@gmail.com'),
(37, 'Kim Thuận', '0915300091', '202cb962ac59075b964b07152d234b70', 'Đội 10 Thôn 5 Tiên Hiệp Tiên Phước Quảng Nam', 'thuankim2214@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_session_cart`
--

CREATE TABLE `tbl_session_cart` (
  `session_cart_id` int(10) NOT NULL,
  `session_user` varchar(255) NOT NULL,
  `session_cart` varchar(255) NOT NULL,
  `product_amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_test`
--

CREATE TABLE `tbl_test` (
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_test`
--

INSERT INTO `tbl_test` (`img`) VALUES
('product1_1.jpg'),
('product1_1.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `list_menu`
--
ALTER TABLE `list_menu`
  ADD PRIMARY KEY (`list_id`);

--
-- Chỉ mục cho bảng `list_menu_item`
--
ALTER TABLE `list_menu_item`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Chỉ mục cho bảng `tbl_cartegory`
--
ALTER TABLE `tbl_cartegory`
  ADD PRIMARY KEY (`cartegory_id`);

--
-- Chỉ mục cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  ADD PRIMARY KEY (`id_cart_details`);

--
-- Chỉ mục cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD PRIMARY KEY (`register_id`);

--
-- Chỉ mục cho bảng `tbl_session_cart`
--
ALTER TABLE `tbl_session_cart`
  ADD PRIMARY KEY (`session_cart_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `list_menu`
--
ALTER TABLE `list_menu`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `list_menu_item`
--
ALTER TABLE `list_menu_item`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id_cart` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT cho bảng `tbl_cartegory`
--
ALTER TABLE `tbl_cartegory`
  MODIFY `cartegory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  MODIFY `id_cart_details` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `tbl_register`
--
ALTER TABLE `tbl_register`
  MODIFY `register_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `tbl_session_cart`
--
ALTER TABLE `tbl_session_cart`
  MODIFY `session_cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
