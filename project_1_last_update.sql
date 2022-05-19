-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 15, 2021 lúc 04:24 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project_1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `acc` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `pass` varchar(32) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `acc`, `pass`) VALUES
(1, 'Thái', '0966991395', 'cb28353927517e5cf43178f8b8d113b5'),
(2, 'Thái', 'thaido1232@gmail.com', 'cb28353927517e5cf43178f8b8d113b5');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name_brand` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `name_brand`) VALUES
(34, 'abc'),
(23, 'ASUS'),
(22, 'DELL'),
(16, 'LOGITECH'),
(14, 'RAZER');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name_customer` varchar(40) COLLATE utf8_vietnamese_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `addr` varchar(300) COLLATE utf8_vietnamese_ci NOT NULL,
  `pass` varchar(32) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name_customer`, `phone`, `email`, `addr`, `pass`) VALUES
(1, 'Thái', '0966991395', 'thaido1232@gmail.com', 'Hà Nội', 'cb28353927517e5cf43178f8b8d113b5'),
(2, 'thaibort 2', '123456789', 'asd@gadf.com', 'Hà Nội', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `total` float NOT NULL,
  `status` tinyint(1) NOT NULL,
  `addr` varchar(300) COLLATE utf8_vietnamese_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `date_oder` datetime NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_customer` int(11) NOT NULL,
  `receiver` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `invoices`
--

INSERT INTO `invoices` (`id`, `total`, `status`, `addr`, `phone`, `date_oder`, `id_admin`, `id_customer`, `receiver`) VALUES
(21, 139000, 0, 'Hà Nội', '0966991395', '2021-03-09 15:03:25', NULL, 1, 'Thaibort'),
(22, 139000, 0, 'Hà Nội', '0966991395', '2021-03-10 11:49:33', NULL, 1, 'Quang Thái'),
(23, 139000, 0, 'Hà Nội', '0966991395', '2021-03-10 12:07:21', NULL, 1, 'Quang Thái'),
(24, 139000, 0, 'Hà Nội', '0966991395', '2021-03-10 12:09:31', NULL, 1, 'Thaibort'),
(25, 0, 0, 'Hà Nội', '0966991395', '2021-03-10 13:12:15', NULL, 1, 'Thaibort'),
(26, 0, 1, 'Hà Nội', '0966991395', '2021-03-10 13:12:20', NULL, 1, 'Thaibort'),
(27, 8460000, 0, 'Hà Nội', '0966991395', '2021-03-17 08:53:06', NULL, 1, 'abc'),
(28, 139000, 0, 'Hà Nội', '0966991395', '2021-03-17 09:02:26', NULL, 1, 'Thaibort'),
(29, 139000, 0, 'Hà Nội', '0966991395', '2021-03-17 09:10:06', NULL, 1, 'Thaibor'),
(30, 139000, 0, 'Hà Nội', '0966991395', '2021-03-17 09:14:16', NULL, 1, 'Thaibort'),
(31, 139000, 0, 'Hà Nội', '0966991395', '2021-03-17 19:57:54', NULL, 1, 'Thaibort'),
(32, 139000, 0, 'Hà Nội', '0966991395', '2021-03-17 19:58:53', NULL, 1, 'Thaibort'),
(33, 139000, 0, 'Hà Nội', '0966991395', '2021-03-17 19:59:13', NULL, 1, 'Thaibort'),
(34, 8460000, 0, 'Hà Nội', '0966991395', '2021-03-23 20:52:30', NULL, 1, 'Thaibort'),
(35, 1377000, 0, 'Hà Nội', '0966991395', '2021-03-26 21:48:17', NULL, 1, 'Đỗ Quang Thái'),
(36, 2289000, 3, 'Hà Nội', '0966991395', '2021-03-27 11:43:58', NULL, 1, 'Đỗ Quang Thái');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoices_details`
--

CREATE TABLE `invoices_details` (
  `id_invoices` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `invoices_details`
--

INSERT INTO `invoices_details` (`id_invoices`, `id_product`, `quantity`) VALUES
(21, 20, 1),
(22, 20, 1),
(24, 20, 1),
(27, 22, 1),
(28, 20, 1),
(29, 20, 1),
(30, 20, 1),
(31, 20, 1),
(32, 20, 1),
(33, 20, 1),
(34, 22, 1),
(35, 31, 3),
(36, 20, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `pic` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `pri` float NOT NULL,
  `dess` text COLLATE utf8_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `pic`, `pri`, `dess`, `status`, `id_brand`, `id_type`) VALUES
(20, 'Chuột không dây chơi game Asus', '../Public/image/58272_chuot_khong_day_choi_game_asus_rog_pugio_ii_p705_usb_rgb_den_0004_5.jpg', 2289000, '<ul><li>Chuột không dây chơi game Asus ROG Pugio II</li><li>Khả năng kết nối tối ưu bao gồm chế độ không dây kép 2.4GHz và Bluetooth (BLE), cùng với USB có day</li><li>Mắt cảm biến PMW3335 cao cấp với 16000 DPI, tốc độ 400ips</li><li>Thiết kế đối xứng thuận cả 2 tay với các nút bấm có kết nối từ tính có thể tháo rời</li><li>Thiết kế thay switch nóng độc quyền Asus ROG</li><li>Thời lượng sử dụng lên đến 100h với mắt đọc tiết kiệm năng lượng</li><li>Tuỳ chỉnh DPI tiện lợi ngay trên chuột</li><li>Cơ chế nút bấm xoay vòng cho phản hồi nhanh</li><li>Thời lượng pin sử dụng lên đến 69h với chế độ Wireless 2.4ghz và 100h với chế độ Bluetooth LE (với điều kiện không bật led)</li></ul>', 1, 23, 26),
(21, 'Màn hình máy tính Dell SE2417HGX 23.6 inch FHD Gaming', '../Public/image/1232.jpg', 3139000, '<p>Tỉ lệ: 16:9&nbsp;</p><p>Kích thước: 23.6 inch&nbsp;</p><p>Tấm nền: TN&nbsp;</p><p>Độ phân giải: Full HD (1920x1080)&nbsp;</p><p>Tốc độ làm mới: 75Hz&nbsp;</p><p>Thời gian đáp ứng: 1ms&nbsp;</p><p>Cổng kết nối: 2xHDMI, VGA&nbsp;</p><p>Phụ kiện: Cáp nguồn, Cáp HDMI,...</p>', 2, 22, 8),
(22, 'Màn hình máy tính Dell UltraSharp U2520D 25 inch QHD', '../Public/image/26863_u2415__5_.jpg', 8460000, '<p>Tỉ lệ: 16:9 Kích thước: 25 inch Tấm nền: IPS Độ phân giải: QHD (2560 x 1440) Tốc độ làm mới: 60Hz Thời gian đáp ứng: 5 ms Cổng kết nối: 1 x DP 1.4/1 X DisplayPort (Out) with MST/1 x HDMI 2.0 / 1 usb type C Phụ kiện: Cáp nguồn , Cáp DisplayPort , cáp usb</p>', 1, 22, 8),
(25, 'Bàn phím cơ E-Dra EK3104 Gaming Outemu Blue Switch Led RGB', '../Public/image/49828_ban_phim_co_e_dra_ek3104_gaming_outemu_blue_switch_led_rgb_2.jpg', 799000, '<ul><li>Bàn phím cơ E-Dra EK3104</li><li>Sử dụng switch Outemu siêu bền</li><li>Thiết kế full-size 104 phím</li><li>Led Rainbow</li><li>Keycap ABS DoubleShot</li></ul>', 1, 14, 21),
(26, 'Bàn phím Gaming Asus TUF K1 RGB', '../Public/image/53482_ban_phim_gaming_asus_tuf_k1_rgb_0001_2.jpg', 1499000, '<ul><li>Tactile TUF Gaming switch với tính năng NKRO 19 phím để có hiệu suất nhanh, đáng tin cậy</li><li>Hiệu ứng ánh sáng RGB động và thanh ánh sáng gắn 2 bên</li><li>Núm âm lượng chuyên dụng để điều chỉnh âm thanh nhanh chóng và dễ dàng</li><li>Khung nhựa được gia cố, bền bỉ với khả năng chống tràn lên đến 300 ml cho độ ổn định và độ tin cậy hàng ngày</li><li>Các phím được lập trình với chức năng ghi macro nhanh và bộ nhớ trong để chơi trò chơi được cá nhân hóa</li><li>Ứng dụng Armory Crate cung cấp các điều khiển mở rộng và giao diện trực quan để biến bàn phím thành của riêng bạn</li><li>Kê tay có thể tháo rời</li></ul>', 1, 23, 21),
(29, 'Bàn phím cơ Razer Huntsman Mercury Mini (RZ03-03390300-R3M1)', '../Public/image/40394_razer_huntsman_mercury_mini_ha1.jpg', 3090000, '<ul><li>Bàn phím cơ Razer Huntsman Mini Mercury</li><li>Thiết kế 60% nhỏ gọn</li><li>Keycap PBT Doubleshot bền bỉ</li><li>Tính năng Onboard Memory và tuỳ chỉnh các hiệu ứng led có sẵn trên phím</li><li>Kết nối chuẩn Type-C có thể tháo rời dây cáp</li><li>Thiết kế khung nhôm chắc chắn</li><li>Led RGB Chroma 16.8 triệu màu</li></ul>', 1, 14, 21),
(30, 'Bàn phím cơ Asus US ROG Claymo', '../Public/image/40591_ban_phim_asus_us_rog_claymore_core_rgb_aura_sync_cherry_red_switch_0003_4.jpg', 3789000, '<ul><li>Bàn phím Asus ROG Claymore Core</li><li>Các phím được chiếu đèn nền riêng với công nghệ LED Aura Sync RGB cho vô số tùy chọn cá nhân hóa</li><li>Các phím có thể được lập trình toàn diện với chế độ ghi macro bất cứ lúc nào</li><li>Công nghệ chống sót phím 100% với khả năng ghi nhận N phím cùng lúc (NKRO)</li><li>Phím nóng cho tốc độ quạt, ánh sáng và điều khiển ép xung khi được kết hợp với bo mạch chủ ASUS ROG</li><li>Bộ nhớ trên bo mạch để lưu hồ sơ bất cứ lúc nào, cùng ROG Armoury trực quan cho thiết lập ánh sáng, phím và số liệu thống kê</li><li>Cấu trúc nhôm bền vững với chi tiết tinh xảo lấy cảm hứng từ văn hóa Maya</li></ul>', 1, 23, 21),
(31, 'Tai nghe Dareu EH925 RGB ', '../Public/image/58249_.jpg', 459000, '<ul><li>Tai nghe Over Ear - MULTI LED</li><li>Driver: Φ53mm</li><li>Hiệu ứng: giả lập 7.1</li><li>Kết nối: USB</li><li>Đệm tai: da mềm</li><li>Headband: kim loại</li><li>Frequency Range: 20Hz-20KHz</li><li>Dây: 2.0m</li><li>Trọng lượng: 300 +/- 10g</li></ul>', 1, 23, 7),
(32, 'Tai nghe Dareu EH722s Black', '../Public/image/58247_.jpg', 359000, '<ul><li>Driver: Φ50mm x 10 mm (H)</li><li>Hiệu ứng: giả lập 7.1</li><li>Kết nối: USB</li><li>Đệm tai: da mềm</li><li>Vòng đầu: kim loại</li><li>Trở kháng: 24 ± 15% Ω</li><li>Tần số: 20Hz-20KHz</li><li>Dây: 2.0m</li></ul>', 1, 23, 7),
(33, 'Tai Nghe Dareu Over Ear EH925S', '../Public/image/58248_.jpg', 659000, '<ul><li>Tai nghe Over Ear - RGB MAGIC CONTROL BOX - NOISE CANCELLING</li><li>Driver: Φ53mm</li><li>Hiệu ứng: Giả lập 7.1</li><li>Kết nối: USB</li><li>Mic: có, có thể tháo rời</li><li>Đệm tai: Da mềm</li><li>Headband: Kim loại</li><li>Frequency Range: 20Hz-20KHz</li><li>Dây: 2.0m</li><li>Trọng lượng: 300g</li></ul>', 1, 23, 7),
(34, 'Tai nghe Kingston HyperX Cloud', '../Public/image/27423_tai_nghe_kingston_hyperx_cloud_2_gaming_black_0001_1.jpg', 2099000, '<ul><li>Phiên bản Cloud 2 với công nghệ giả lập âm thanh vòm 7.1</li><li>Sử dụng chiếc Soundcard 7.1, chỉ cần cắm và sử dụng</li><li>Không cần Driver điều chỉnh</li><li>Thiết kế cứng cáp, cảm giác đeo thoải mái trong nhiều giờ</li><li>Chất âm thiên sáng, chi tiết tốt, phù hợp với các game thi đấu ESPORTS</li><li>Microphone có thể được tháo rời thuận tiện</li><li>Được khuyên dùng bởi các game thủ CS:GO chuyên nghiệp</li></ul>', 1, 23, 7),
(35, 'Chuột IRocks IRM09W-PBK', '../Public/image/27486_mouse_irocks_irw09w_pbk.jpg', 399000, '<ul><li>Chuột IRocks IRM09W-PBK</li><li>Thiết kế đối xứng tiện lợi</li><li>Độ phân giải : 1750 DPI</li><li>Led : xanh lá cây</li><li>Chuẩn kết nối USB</li></ul>', 1, 23, 26),
(36, 'Chuột không dây Dareu A918', '../Public/image/58240_.jpg', 349000, '<ul><li>Chuột DareU A918 Wireless</li><li>Mắt cảm biến : PixArt PAW3335</li><li>Độ phân giải : 800-16000 DPI</li><li>Tracking: 400IPS</li><li>Polling rate: 1000Hz</li><li>Thời gian sử dụng: 260 giờ (GAMING) - 10 tháng (OFFICE)</li><li>Switch bấm độc quyền DareU, độ bền 30 triệu lần click</li></ul>', 1, 23, 26),
(37, 'Bàn phím Asus ROG Strix Scope ', '../Public/image/58268_ban_phim_asus_rog_strix_scope_tkl_usb_rgb_red_sw_0001_2.jpg', 3190000, '<ul><li>Bàn phím Asus ROG Strix Scope TKL</li><li>Thiết kế Layout Tenkeyless 87 phím</li><li>Gọn nhẹ, dễ dàng cho vào balo, dây cáp có thể tháo rời</li><li>Phím Stealth Key: Ẩn tất cả ứng dụng, âm thanh trong 1 lần nhấn</li><li>Switch Cherry MX cao cấp đến từ Đức</li><li>Kết cấu chắc chắn, plate làm bằng nhôm cao cấp làm tăng thẩm mỹ và cho độ bền cao</li></ul>', 1, 23, 21),
(38, 'Chuột không dây chơi game Asus', '../Public/image/58271_chuot_khong_day_choi_game_asus_rog_chakram_p704_usb_rgb_den_0002_3.jpg', 3799000, '<ul><li>Chuột không dây chơi game Asus ROG Chakram</li><li>Kết nối ba chế độ bao gồm không dây kép 2.4GHz và Bluetooth (BLE), cùng với USB có day</li><li>Cảm biến quang học cao cấp với 16000 DPI, tốc độ quét lên đến 400ips và polling rate 1000hz cho độ chính xác cao</li><li>Joystick có thể lập trình, tháo rời và cá nhân hoá</li><li>Tính năng sạc nhanh với 15 phút sạc cho bạn 12h giờ sử dụng</li><li>Tích hợp tính năng sạc không dây Qi tiện lợi</li><li>Thiết kế không cần ốc vít, kết nối từ tính</li><li>Tính năng thay switch nóng độc quyền ROG</li><li>Thời lượng pin cao lên đến 79h với chế độ Wireless 2.4Ghz (Khi không bật led)</li></ul>', 1, 23, 26),
(40, 'Tai nghe không dây Razer Thres', '../Public/image/40768_tong_the_tai_nghe_razer_thresher_71_wireless_for_ps4_pc.jpg', 3299000, '<ul><li>Phiên bản tai nghe không dây mới nhất của Razer</li><li>Tương thích với hệ máy PC và PS4</li><li>Kêt nối cả có day lẫn không dây cho sự lựa chọn kiểu chơi</li><li>Driver 50mm cho âm thanh sống động</li><li>Thời lượng sử dụng lên đến 16h với chế độ không dây</li></ul>', 1, 14, 7),
(41, 'Chuột IRocks IR7810R BK', '../Public/image/27485_mouse_irocks_ir7810r_bk.jpg', 299000, '<ul><li>Chuột IRocks IR7810R BK</li><li>Mắt cảm biến A3050</li><li>Độ phân giải : 1800 DPI</li><li>Polling Rate : 1000 Hz</li></ul>', 1, 23, 26),
(42, 'Ghế Gamer Soleseat Scred L07 B', '../Public/image/43310_soleseat_scred_l07_blackbluewhite.jpg', 6499000, '<ul><li>Ghế Soleseat chuyên dụng cho game thủ</li><li>Da PU bền bỉ</li><li>Khung kim loại chắc chắn</li><li>Nâng hạ độ cao, ngả lưng thoải mái</li><li>Trụ thủy lực Class-4</li><li>Chân đế hình sao 5 cánh</li><li>Kê tay có thể di chuyển</li></ul>', 1, 23, 25),
(43, 'Ghế Gamer Soleseat Pionner L04', '../Public/image/43302_1111.jpg', 5499000, '<ul><li>Ghế Soleseat chuyên dụng cho game thủ</li><li>Da PU bền bỉ</li><li>Khung kim loại chắc chắn</li><li>Nâng hạ độ cao, ngả lưng thoải mái</li><li>Trụ thủy lực Class-4</li><li>Chân đế hình sao 5 cánh</li><li>Kê tay có thể di chuyển</li></ul>', 1, 23, 25),
(44, 'Ghế Gamer Noblechairs HERO DOO', '../Public/image/58295_ghe_gamer_noblechairs_hero_doom_edition_0006_7.jpg', 14899000, '<ul><li>Ghế Gamer Noblechairs HERO DOOM Edition</li><li>Phiên bản Limited với cảm hứng từ tựa game DOOM nổi tiếng</li><li>Thiết kế sang trọng, đẳng cấp</li><li>Khung kim loại chắc chắn, chịu lực tốt</li><li>Chất liệu da PU</li><li>Chân đế kim loại hình sao 5 bánh</li><li>Ngả lưng từ 90-135 độ</li><li>Tay ghế điều chỉnh 4D</li></ul>', 1, 23, 25),
(45, 'Ghế Gamer Arena Racer Craftsma', '../Public/image/46824_gamer_arena_racer_craftsman_rlb___arf09_rlb_blue_04.jpg', 12499000, '<ul><li>Chất liệu da bọc: Real leather (da thật)</li><li>Khung kim loại chắc chắc.</li><li>Đệm mút: chất liệu dày, có đàn hồi cao, thoáng khí.</li><li>Tay ghế 4D</li><li>Khung gầm thiết kế dạng cánh bướm butterfly plate chắc chắn.</li><li>Piston Class 4.</li><li>Chân hợp kim nhôm</li><li>Bánh xe chất liệu nhựa PU độ bền cao.</li><li>Lưng ghế ngả 180 độ.</li><li>Phụ Kiện: Gối đầu, gối lưng.</li></ul>', 1, 23, 25),
(46, 'Màn hình ASUS VL279HE', '../Public/image/50268_asus_vl279he__3_.png', 4859000, '<ul><li>Phủ bề mặt chống lóa / phủ cứng 3H</li><li>Độ phân giải 1920 x 1080</li><li>Tần số quét 75 Hz</li><li>Góc nhìn 178° (H) / 178° (V)</li><li>Màu màn hình 16.7 triệu</li><li>Độ sáng 250 cd/m2</li><li>Độ tương phản 1000:1</li><li>Tỉ lệ màn hình 16:9</li><li>Thời gian phản ứng 5 ms (GTG)</li><li>Tấm nền IPS</li></ul>', 1, 23, 8),
(47, 'Màn hình Asus ROG XG279Q', '../Public/image/53917_xg279q__7_.png', 17489000, '<ul><li>Màn hình chơi game 27 inch WQHD IPS tần số quét 170Hz (ép xung) siêu nhanh, được thiết kế cho các game thủ chuyên nghiệp</li><li>Công nghệ tấm nền Fast IPS của ASUS cho màu sắc chuẩn mọi góc nhìn với tốc độ khung hình cực cao không bỏ sót chi tiết</li><li>Đạt chứng nhận tương thích G-Sync chống giật lag, xé hình, bóng ma cao cấp được giới game thủ ưa chuộng</li><li>Dải tương phản động cao cho phổ màu ấn tượng, chuyên nghiệp cho cả làm việc và chơi game, chứng nhận HDR 400</li><li>Đèn ASUS Aura RGB ở mặt sau và đèn chiếu sáng đặc trưng tùy chỉnh được cho vẻ ngoài lấy cảm hứng từ game</li><li>Sản phẩm có một giá đỡ được thiết kế công thái học cho khả năng điều chỉnh xoay trái phải, nghiêng lên xuống và chiều cao toàn diện</li></ul>', 1, 23, 8),
(48, 'Màn hình Asus TUF Gaming VG259', '../Public/image/52116_asus_tuf_gaming_vg259qm__8_.png', 11989000, '<ul><li>Màn hình chơi game 24,5 inch Full HD (1920 x 1080) với tấm nền Fast IPS có tốc độ làm mới siêu nhanh 280*Hz được thiết kế dành cho các game thủ chuyên nghiệp và mang tới trải nghiệm chơi game đắm chìm</li><li>Công nghệ Fast IPS hỗ trợ thời gian phản hồi 1ms (GTG) để đem lại hình ảnh chơi game sắc nét với tốc độ khung hình cao.</li><li>Đạt chứng nhận tương thích G-SYNC, mang lại trải nghiệm chơi game liền mạch, không xé hình nhờ hỗ trợ VRR (biến thiên tần số làm mới) theo thiết lập mặc định.</li><li>Công nghệ ASUS Extreme Low Motion Blur Sync (ELMB SYNC - Đồng bộ hóa độ nhòe chuyển động siêu thấp) kích hoạt ELMB và Tương thích với G-SYNC, loại bỏ hiện tượng bóng ma và xé hình để cung cấp các hình ảnh chơi game sắc nét với tốc độ khung hình cao.</li><li>Công nghệ High Dynamic Range (HDR) với dải màu chuyên nghiệp mang lại độ tương phản và hiệu suất màu đạt chuẩn DisplayHDR™ 400</li></ul>', 1, 23, 8),
(49, 'Bàn di chuột FULL SIZE VITRA ', '../Public/image/50401_ban_di_chuot_full_size_vitra_p01_led_rgb_300_x_800_x_4mm.jpg', 299000, '<ul><li>Kích thước: 800 x 300 x 4mm</li><li>Chất liệu: 100% cao su tự nhiên, vải bo viền led</li><li>Thiết kế: bề mặt pad speed giúp chuột điều khiển dễ dàng, giảm tổn hại mòn feet chuột. Phần đế cao su được tạo vân bám chắc trên bề mặt bàn, chống trơn trượt. Có thể cuộn tròn lại,dễ mang đi mang lại.</li><li>Led: RGB, có thể tùy chỉnh bằng điều khiển trên pad</li></ul>', 1, 23, 24),
(50, 'Bàn di chuột Dareu ESP100 Box ', '../Public/image/46660_mouse_pad_dareu_esp100_box_350_x_300_x_5mm_0000_1.jpg', 109000, '<ul><li>Kích thước: 350 x 300 x 5mm</li><li>Bề mặt được đan bằng sợi Cotton pha Polime đặc biệt</li><li>Độ chính xác tuyệt đối</li><li>Bọc viền</li><li>Hộp: có</li></ul>', 1, 23, 24),
(51, 'Bàn di chuột Razer Goliathus S', '../Public/image/34291_mouse_pad_razer_goliathus_speed_cosmic_edition_soft_small_rz02_01910100_r3m2_0000_1.jpg', 399000, '<ul><li>Bàn di chuột Razer Goliathus Speed Cosmic Edition Soft Small</li><li>Kích thước 215 mm x 270 mm</li><li>Bề mặt : vải</li></ul>', 1, 14, 24),
(52, 'Loa Bluetooth Microlab M300BT', '../Public/image/38247_microlab_bluetooth_m300bt.png', 969000, '<ul><li>Công suất : 38 Watt,</li><li>Tần Số Đáp ứng: 40Hz 20kHz,</li><li>Tỷ số nén nhiễu S/N &gt; 80dB,</li><li>kích thước (WxHxD): Loa Trầm 230x225x230 mm; Loa vệ tinh 85 x 196 x 115 mm</li><li>Tích Hợp USB, Thẻ Nhớ, Bluetooth)</li></ul>', 1, 23, 22),
(53, 'Loa Logitech Z906 - 5.1', '../Public/image/8782_loa_logitech_z906_51_0002_3.jpg', 6399000, '<ul><li>Thiết Kế: Hệ Thống Loa 5.1</li><li>Kết Nối: Jack 3.5mm (headphone) / Jack 3.5mm (input) / RCA (input) / Jack 3.5 (surround input) / Coaxial (input) / Optical (input) / Push Ternminal (output)</li><li>Chức Năng: Volume Control / Bass Control / 2.1 Mode / 4.1 Mode / 3D Mode / DTS Interative / Dolby Digital / THX / Loa treo tường được</li><li>Công Suất: 500W RMS</li><li>Công suất loa trầm: 165W</li><li>Công suất loa vệ tinh: 5x67W</li><li>Dolby Digital 5.1 decoding: Yes</li><li>DTS decoding: Yes</li><li>3D Stereo (Surround sound from 2-channel sources): Yes</li></ul>', 1, 16, 22),
(54, 'Bàn di chuột AKKO Color series', '../Public/image/54847_ban_di_chuot_akko_color_series_pink_360x280x3mm_0005.jpg', 129000, '<ul><li>Bàn di chuột AKKO Color series Pink</li><li>Pad speed, làm từ vải với bề mặt trơn láng và nhẵn mịn giúp tăng tốc độ di chuột</li><li>Size M: 360x280x3mm</li><li>Pad được bo viền giúp tăng độ chắc chắn khi sử dụng</li></ul>', 1, 23, 24),
(55, 'Loa Microlab X2 - 2.1', '../Public/image/1892_microlab_x2.png', 1199000, '<ul><li>Thiết Kế: Hệ Thống Loa 2.1</li><li>Kết Nối: Jack 3.5mm (input) / RCA (input) / Push Terminal (output)</li><li>Chức Năng: Volume Control / Bass Control / Treble Control / Balance</li><li>Công Suất: 46W RMS</li><li>Tần số đáp ứng: 35Hz - 20kHz</li><li>Tỷ số nén nhiễu S/N &gt;60dB</li><li>Kích thước (WxHxD): Loa trầm 323x165x247 mm</li><li>Kích thước (WxHxD): Loa vệ tinh 102x78x157 mm</li><li>Loa vệ tinh có thể xoay điều hướng</li></ul>', 1, 23, 22),
(56, 'Loa Microlab M590 - 4.1', '../Public/image/1891_microlab_m590_41.png', 849, '<ul><li>Loa Microlab M590 - 4.1</li><li>Tổng công suất loa: 50W</li><li>CS loa siêu trầm/ vệ tinh: 14W+36W (9Wx4)</li><li>Cổng tín hiệu vào: 4RCA</li><li>Loa siêu trầm với đường hầm phản xạ (trong loa) cho âm trầm sâu</li><li>Bảng điều khiển phía trước với âm lượng tổng thể, bass và nút bấm âm lượng treble</li><li>Kết nối âm thanh stereo RCA</li><li>Kết nối MP3/MP4, máy nghe nhạc CD / DVD của bạn, PC hoặc điện thoại</li><li>Rất lý tưởng cho máy tính chơi game mà đòi hỏi hiệu ứng âm trầm sâu và âm nhạc kỹ thuật số</li><li>Đèn LED chỉ báo</li></ul>', 1, 23, 22),
(57, 'Loa SoundMax A820 - 2.1', '../Public/image/1910_loa_soundmax_a820___2_1.png', 599000, '<ul><li>Model: A820</li><li>Màu sắc: Xám</li><li>Nhà sản xuất: Soundmax</li><li>Hệ thống loa: 2.1 kênh</li><li>Công suất: 25 W</li><li>Công suất loa trầm: 15 Watt</li><li>Công suất loa vệ tinh: 2 x 5 Watt</li><li>Tín hiệu ngõ vào: Jack RCA</li><li>Công suất loa trung tâm: Không</li><li>Tín hiệu ngõ ra: Terminal</li></ul><p><br>&nbsp;</p>', 1, 23, 22),
(58, 'Ghế Gamer AKRacing SpiderMan S', '../Public/image/35777_ghe_gamer_akracing_spiderman_series_z680s_black_5.jpg', 9999000, '<ul><li>Khung kim loại chắc chắn</li><li>Bọc da PU bền bỉ chịu lực tốt</li><li>Kê tay có thể điều chỉnh</li><li>Khung chân kim loại sơn tĩnh điện</li><li>Tải trọng lên đến 170kg</li><li>Ngả lưng 170* + 12*</li><li>Phụ kiện gối lưng, gối cổ</li><li>Chân đế hình sao 5 bánh</li></ul>', 1, 23, 25),
(59, 'Bàn di chuột Razer Goliathus E', '../Public/image/51510_razer_goliathus_mercury_mousepad_extended_rz02_02500316_r3m1__6_.jpg', 1599000, '<ul><li>Bề mặt: Vải mềm</li><li>Kích thước : Extended / Rộng</li><li>Dài 294 mm - Rộng 920 mm - Dày 3 mm</li><li>Trọng lượng: 560 gram</li><li>Dây cáp: 210 cm</li><li>LED RGB Chroma</li></ul>', 1, 14, 24),
(60, 'Bàn di chuột Gaming Asus ROG S', '../Public/image/58293_ban_di_chuot_gaming_asus_rog_sheath_0001_2.jpg', 849000, '<ul><li>Bàn di chuột Gaming Asus ROG SHEATH</li><li>Bề mặt: Vải</li><li>Kích thước: 900 x 440 x 3 mm</li><li>Bề mặt được tối ưu dành cho tác vụ lướt chuột mượt mà</li><li>Kích thước lớn cho tất cả các thiết bị chơi game của bạn</li><li>Đế cao su ROG đỏ chống trượt</li><li>Đường khâu bền chống sờn</li></ul>', 1, 23, 24),
(61, 'Chuột', '../Public/image/hul.jpg', 15000, '<p>abc</p>', 1, 23, 21);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name_type` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `type`
--

INSERT INTO `type` (`id`, `name_type`) VALUES
(30, 'abc'),
(21, 'Bàn phím'),
(26, 'Chuột'),
(25, 'Ghế'),
(22, 'Loa'),
(24, 'Lót chuột'),
(8, 'Màn hình'),
(7, 'Tai nghe');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `acc` (`acc`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name_brand`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Chỉ mục cho bảng `invoices_details`
--
ALTER TABLE `invoices_details`
  ADD PRIMARY KEY (`id_invoices`,`id_product`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_brand` (`id_brand`),
  ADD KEY `id_type` (`id_type`);

--
-- Chỉ mục cho bảng `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name_type`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `invoices_details`
--
ALTER TABLE `invoices_details`
  ADD CONSTRAINT `invoices_details_ibfk_1` FOREIGN KEY (`id_invoices`) REFERENCES `invoices` (`id`),
  ADD CONSTRAINT `invoices_details_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `id_type` FOREIGN KEY (`id_type`) REFERENCES `type` (`id`),
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
