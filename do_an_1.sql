-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 20, 2021 lúc 03:08 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `do_an_1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `ma` int(11) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `gioi_tinh` smallint(6) NOT NULL,
  `cmnd` char(20) NOT NULL,
  `sdt` char(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mat_khau` char(20) NOT NULL,
  `cap_do` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`ma`, `ten`, `ngay_sinh`, `gioi_tinh`, `cmnd`, `sdt`, `email`, `mat_khau`, `cap_do`) VALUES
(56, 'Thư Hường', '2019-09-01', 0, '036201008998', '0369319134', 'admin@gmail.com', '123', 0),
(58, 'Xuân Đình', '2014-08-07', 1, '036201008998', '0369319134', 'xuandinh@gmail.com', '123', 0),
(59, 'Trần Đức', '2019-05-04', 0, '036201008998', '0968385320', 'tranduc@gmail.com', '123', 0),
(60, 'Hoàng Phương', '2001-11-23', 1, '036201008998', '0968385320', 'superAdmin@gmail.com', '123', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `anh`
--

CREATE TABLE `anh` (
  `ma` int(11) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `ten_ma_hoa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `anh`
--

INSERT INTO `anh` (`ma`, `ten`, `ten_ma_hoa`) VALUES
(1, 'Logo', '1615877430.png'),
(2, 'Header_admin', '1611581061.jpg'),
(4, 'Banner_user_1', '1612023844.jpg'),
(5, 'Banner_user_2', '1611642303.jpg'),
(6, 'Banner_user_3', '1611642312.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `footer`
--

CREATE TABLE `footer` (
  `dia_chi` varchar(300) NOT NULL,
  `sdt` char(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `link_facebook` varchar(300) NOT NULL,
  `link_youtube` varchar(300) NOT NULL,
  `link_twitter` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `footer`
--

INSERT INTO `footer` (`dia_chi`, `sdt`, `email`, `link_facebook`, `link_youtube`, `link_twitter`) VALUES
('Hai Bà Trưng - Hà Nội', '0968395394', 'hoangphuong2311bkhn@gmail.com', 'https://www.facebook.com/', 'https://www.youtube.com/', 'https://twitter.com/');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gioi_thieu`
--

CREATE TABLE `gioi_thieu` (
  `tieu_de` varchar(100) DEFAULT NULL,
  `noi_dung` text DEFAULT NULL,
  `anh` varchar(200) DEFAULT NULL,
  `noi_dung_anh` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `gioi_thieu`
--

INSERT INTO `gioi_thieu` (`tieu_de`, `noi_dung`, `anh`, `noi_dung_anh`) VALUES
('Về chúng tôi', 'Hệ thống shop cung cấp thú cưng, spa và chăm sóc chó, mèo cảnh thuần chủng. trải qua nhiều năm phát triển mậppet family đã nhân giống thành công những giống chó, mèo cảnh hot nhất hiện nay như: alaska, poodle, phốc sóc, bulldog, husky, corgi, golden… mèo anh, mèo ba tư, mèo munchkin, mèo scottish, mèo bengal.… Dần trở thành nơi uy tín để mọi người đến tìm những người bạn đồng hành trong cuộc sống.', '1611641490.jpg ', 'Tại việt nam, mậppet shop là đối tác hàng đầu cung cấp con giống chó cảnh, mèo cảnh thuần chủng cho các trại nuôi sinh sản, shop kinh doanh thú cưng trên toàn quốc.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `ma` int(11) NOT NULL,
  `ma_khach_hang` int(11) DEFAULT NULL,
  `ten_nguoi_nhan` varchar(200) DEFAULT NULL,
  `sdt_nguoi_nhan` char(12) DEFAULT NULL,
  `dia_chi_nguoi_nhan` varchar(200) DEFAULT NULL,
  `tinh_trang` int(11) DEFAULT NULL,
  `thoi_gian_mua` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoa_don`
--

INSERT INTO `hoa_don` (`ma`, `ma_khach_hang`, `ten_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nguoi_nhan`, `tinh_trang`, `thoi_gian_mua`) VALUES
(61, 65, 'Thư Hường', ' 083583295', 'Số 853 Ngô Gia Tự - Huyện Đầm Dơi - Cà Mau', 2, '2021-01-18 18:27:42'),
(62, 80, 'Đào Văn Anh', '0369319135', 'Số 853 Ngô Gia Tự - Huyện Chợ Lách - Bến Tre', 2, '2020-12-20 20:09:02'),
(63, 80, ' Đào Văn Anh', ' 0369319134', 'Số 853 Ngô Gia Tự - Huyện Bảo Lạc - Cao Bằng', 3, '2020-12-21 17:19:53'),
(64, 80, ' Đào Văn Anh', ' 0369319134', 'Số 853 Ngô Gia Tự - Huyện Chợ Đồn - Bắc Kạn', 2, '2021-01-22 11:08:48'),
(65, 80, ' Trần Đức', ' 0369319134', 'Số 853 Ngô Gia Tự - Thành phố Bắc Giang - Bắc Giang', 2, '2020-12-24 15:04:41'),
(66, 92, ' Văn Đạt', ' 0369319134', 'Số 50 Hà Lĩnh  - Huyện Thới Lai - Cần Thơ', 2, '2021-01-27 08:55:39'),
(67, 92, ' Phương', ' 0369319134', 'Số 853 Ngô Gia Tự - Huyện Hòa Vang - Đà Nẵng', 2, '2021-01-27 10:04:23'),
(68, 92, ' Phương', ' 0369319134', 'Số 853 Ngô Gia Tự - Huyện Thống Nhất - Đồng Nai', 3, '2021-01-27 10:09:02'),
(69, 92, ' Phương', ' 0369319134', 'Số 853 Ngô Gia Tự - Huyện Cái Nước - Cà Mau', 2, '2021-01-27 15:09:27'),
(70, 84, ' Đào Văn Anh', ' 0369319134', 'Số 853 Ngô Gia Tự - Thị xã Long Khánh - Đồng Nai', 2, '2021-01-27 15:57:42'),
(71, 84, ' Đào Văn Anh', ' 0369319134', 'Số 853 Ngô Gia Tự - Huyện Hòa Bình - Bạc Liêu', 2, '2021-01-27 16:01:37'),
(72, 84, ' Đào Văn Anh', ' 0369319134', 'Số 853 Ngô Gia Tự - Thị xã Sa Đéc - Đồng Tháp', 3, '2021-01-27 17:08:52'),
(73, 101, ' Trần Văn Đức', ' 0369319134', 'Số 853 Ngô Gia Tự - Huyện Quế Võ - Bắc Ninh', 2, '2021-01-30 22:14:01'),
(74, 80, ' Trần Đức', ' 0369319134', 'Số 853 Ngô Gia Tự - Huyện Chơn Thành - Bình Phước', 2, '2021-01-31 09:56:01'),
(75, 80, ' Trần Đức', ' 0369319134', 'Số 50 Hà Lĩnh  - Thị xã Long Khánh - Đồng Nai', 2, '2021-01-31 10:02:35'),
(76, 80, ' Trần Đức', ' 0369319134', 'Số 853 Ngô Gia Tự - Huyện Na Rì - Bắc Kạn', 1, '2021-03-12 14:04:23'),
(77, 80, ' Trần Đức', ' 0369319134', 'Số 853 Ngô Gia Tự - Huyện Chương Mỹ - Hà Nội', 1, '2021-03-16 13:48:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don_chi_tiet`
--

CREATE TABLE `hoa_don_chi_tiet` (
  `ma_hoa_don` int(11) NOT NULL,
  `ma_thu_cung` int(11) NOT NULL,
  `gia` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoa_don_chi_tiet`
--

INSERT INTO `hoa_don_chi_tiet` (`ma_hoa_don`, `ma_thu_cung`, `gia`) VALUES
(61, 70, 10000000),
(61, 73, 17000000),
(62, 7, 10000000),
(63, 15, 15000000),
(64, 29, 12000000),
(65, 12, 12000000),
(65, 13, 12000000),
(65, 86, 17000000),
(66, 16, 15000000),
(67, 10, 19000000),
(68, 83, 17000000),
(69, 11, 15000000),
(69, 30, 15000000),
(70, 28, 15000000),
(71, 72, 14000000),
(72, 85, 15000000),
(72, 101, 100000),
(73, 90, 16000000),
(74, 14, 15000000),
(75, 15, 15000000),
(75, 101, 100000),
(76, 79, 21000000),
(76, 89, 22000000),
(76, 104, 100000000),
(77, 102, 1000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma` int(11) NOT NULL,
  `ten` varchar(50) DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `gioi_tinh` smallint(6) DEFAULT NULL,
  `sdt` char(12) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mat_khau` char(20) DEFAULT NULL,
  `dia_chi` varchar(200) DEFAULT NULL,
  `ngay_dang_ky` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`ma`, `ten`, `ngay_sinh`, `gioi_tinh`, `sdt`, `email`, `mat_khau`, `dia_chi`, `ngay_dang_ky`) VALUES
(47, 'Mai Anh', '1921-10-01', 0, '09683953700', 'khach_hang_1@gmail.com', '123', '      Số 853 Ngô Gia Tự - Quận Long Biên - Hà Nội', '2020-12-26 10:32:51'),
(65, 'Thư Hường', '1900-10-01', 0, '083583295', 'khach_hang_2@gmail.com', '123', '   Số 853 Ngô Gia Tự - Huyện Nhơn Trạch - Đồng Nai', '2021-01-18 10:32:55'),
(80, 'Trần', '2010-11-11', 0, '0369319134', 'khach_hang_3@gmail.com', '123', 'Số 853 Ngô Gia Tự - Quận Long Biên - Hà Nội', '2021-01-11 10:33:00'),
(81, 'Đào Văn Anh', '2019-06-06', 1, '796432452221', 'khach_hang_4@gmail.com', '1234', '   Số 853 Ngô Gia Tự - Huyện Nhơn Trạch - Đồng Nai', '2021-01-28 10:33:03'),
(82, 'Đào Văn Lâm', '2017-06-06', 1, '0369319134', 'khach_hang_7@gmail.com', '123', '    Số 85 Ngô Gia Tự - Huyện Thới Bình - Cà Mau', '2021-01-23 04:35:30'),
(83, 'Phạm Nhài', '2019-05-07', 0, '0369319134', 'khach_hang_5@gmail.com', 'a123', '  Số 853 Ngô Gia Tự - Thị xã Gia Nghĩa - Đắk Nông', '2021-01-24 02:42:30'),
(84, 'Đào Văn Anh', '2005-03-17', 0, '0369319134', 'khach_hang_6@gmail.com', '1234', '  Số 853 Ngô Gia Tự - Huyện Thới Lai - Cần Thơ', '2021-01-24 02:47:27'),
(85, 'Trần', '2008-04-01', 1, '0369319134', 'khach_hang_8@gmail.com', 'a123', '  Số 853 Ngô Gia Tự - Quận Cẩm Lệ - Đà Nẵng', '2021-01-24 02:49:06'),
(86, 'Đào Anh', '2017-05-06', 0, '0369319134', 'khach_hang_9@gmail.com', 'a123', ' Ninh Hiệp Bắc Ninh Việt Nam - Huyện Lạng Giang - Bắc Giang', '2021-01-24 02:50:06'),
(87, 'Hoàng Ngọc', '2018-06-07', 0, '0369319134', 'khach_hang_10@gmail.com', '1234', '    Số 853 Ngô Gia Tự - Huyện Bình Đại - Bến Tre', '2021-01-24 08:53:56'),
(90, 'Hoàng Phương', '2019-03-04', 1, '0369319134', 'khach_hang_11@gmail.com', '123', '        Số 853 Ngô Gia Tự - Huyện Krông Pắc - Đắk Lắk', '2021-01-24 22:37:06'),
(91, 'Đào Văn', '2021-01-01', 0, '0968395378', 'khach_hang_12@gmail.com', '123', ' Số 853 Ngô Gia Tự - Quận Cái Răng - Cần Thơ', '2021-01-24 22:58:29'),
(92, 'Phương', '2019-05-06', 0, '0369319134', 'hoangphuong2311bkhn@gmail.com', 'A1234888888888mmmm', 'Số 853 Ngô Gia Tự', '2021-01-24 23:01:57'),
(94, 'Nam Long', '2021-01-01', 0, '0369319134', 'suAdmin@gmail.com', '123', 'Số 853 Ngô Gia Tự - Huyện Bảo Lạc - Cao Bằng', '2021-01-25 08:25:27'),
(95, 'Hoàng Đông', '2019-04-03', 0, '0369319134', 'hoan311bkhn@gmail.com', '123', 'Số 853 Ngô Gia Tự - Quận Ngũ Hành Sơn - Đà Nẵng', '2021-01-25 13:15:04'),
(96, 'Phan Mai Duyen', '2021-01-01', 0, '0362270120', 'phanmaiduyen3@gmail.com', 'A1234888888888mmmm', 'Số 853 Ngô Gia Tự - Quận Cái Răng - Cần Thơ', '2021-01-27 09:02:03'),
(97, 'Đào Văn Anh', '2021-01-01', 0, '0968395379', 'khachhangthichthitbo@gmail.com', '123abc', 'Ninh Hiệp Bắc Ninh - Huyện Krông Pắc - Đắk Lắk', '2021-01-27 09:05:10'),
(98, 'Trần Đức Bo', '2021-01-01', 0, '0968395379', 'khachhangvippro@gmail.com', '123abc', 'Ninh Hiệp - Huyện Sơn Động - Bắc Giang', '2021-01-27 09:06:30'),
(99, 'Hoàng Phương', '2016-06-06', 0, '0369319134', 'hoan2311bkhn@gmail.com', 'A1234m', 'Số 853 Ngô Gia Tự - Quận Liên Chiểu - Đà Nẵng', '2021-01-30 22:02:30'),
(100, 'Trần Văn Đức', '2021-01-01', 0, '0968395379', 'khach_hang_30@gmail.com', 'A123mmm', 'Số 853 Ngô Gia Tự - Huyện Mỏ Cày Bắc - Bến Tre', '2021-01-30 22:04:16'),
(101, 'Trần Văn', '2018-04-06', 1, '0369319134', 'hoang11bkhn@gmail.com', 'A123m', ' Số 853 Ngô Gia Tự - Huyện Dĩ An - Bình Dương', '2021-01-30 22:05:26'),
(102, 'Hoàng Phương', '2001-11-13', 1, '0968395394', 'hoangkhn@gmail.com', '1234', 'shrshw', '2021-03-08 14:23:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_thu_cung`
--

CREATE TABLE `loai_thu_cung` (
  `ma` int(11) NOT NULL,
  `ten` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loai_thu_cung`
--

INSERT INTO `loai_thu_cung` (`ma`, `ten`) VALUES
(7, 'Chó Becgie'),
(15, 'Chó Bull\r\n'),
(5, 'Chó mặt xệ'),
(14, 'Chó Ngao'),
(13, 'Chó Phốc\r\n'),
(16, 'Mèo Anh lông ngắn'),
(21, 'Mèo Ba Tư'),
(22, 'Mèo Bengal'),
(25, 'Mèo Munchkin'),
(27, 'Mèo Scottish');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mau_long`
--

CREATE TABLE `mau_long` (
  `ma` int(11) NOT NULL,
  `ten` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `mau_long`
--

INSERT INTO `mau_long` (`ma`, `ten`) VALUES
(5, 'Bicolor'),
(39, 'Hyma'),
(57, 'Màu báo '),
(3, 'nâu'),
(66, 'nâub'),
(6, 'Silver'),
(8, 'Tam thể'),
(2, 'Trắng'),
(50, 'Trắng vàng'),
(48, 'Tuxedo'),
(1, 'Vàng '),
(4, 'Vện'),
(10, 'Xám xanh'),
(13, 'Xám đen');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thu_cung`
--

CREATE TABLE `thu_cung` (
  `ma` int(11) NOT NULL,
  `ten` varchar(100) DEFAULT NULL,
  `anh` varchar(200) DEFAULT NULL,
  `gia_ban` float DEFAULT NULL,
  `dac_diem` text DEFAULT NULL,
  `cach_cham_soc` text DEFAULT NULL,
  `gioi_tinh` smallint(6) NOT NULL,
  `can_nang_nho_nhat` int(11) NOT NULL,
  `can_nang_lon_nhat` int(11) NOT NULL,
  `ma_xuat_xu` int(11) NOT NULL,
  `ma_mau_long` int(11) DEFAULT NULL,
  `ma_loai_thu_cung` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thu_cung`
--

INSERT INTO `thu_cung` (`ma`, `ten`, `anh`, `gia_ban`, `dac_diem`, `cach_cham_soc`, `gioi_tinh`, `can_nang_nho_nhat`, `can_nang_lon_nhat`, `ma_xuat_xu`, `ma_mau_long`, `ma_loai_thu_cung`) VALUES
(7, 'Chó Bulldog mặt xệ', '1607506823.jpg       ', 10000000, 'Đặc điểm ngoại hình:To lớn, tai nhỏ.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 3, 30, 1, 1, 5),
(8, 'Chó má xệ Boston Terrier', '1607507116.jpg  ', 15000000, 'To lớn, tai nhỏ.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 3, 23, 2, 1, 5),
(9, 'Chó Boxer (chó Võ Sĩ)', '1607507467.jpg  ', 14000000, 'To lớn, tai nhỏ, dáng cao.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 3, 27, 3, 3, 5),
(10, 'Chó pitbull', '1607507673.jpg    ', 19000000, 'To lớn, tai nhỏ.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 4, 31, 1, 4, 15),
(11, 'Chó bully', '1607508283.jpg       ', 15000000, 'To lớn, tai nhỏ.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 3, 31, 1, 5, 7),
(12, 'Becgie Bỉ', '1607509494.jpg    ', 12000000, 'Tai dựng, thân hình rắn chắc.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 4, 33, 1, 3, 7),
(13, 'Becgie Đức', '1607509793.jpg  ', 12000000, 'To lớn, lưng gù, tai dựng đứng.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 3, 23, 3, 3, 7),
(14, 'Becgie Hà Lan', '1607510297.jpg    ', 15000000, 'Mõm dài, tai dựng thẳng, chân dài.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 4, 29, 1, 6, 7),
(15, 'Becgie Pháp', '1607510677.jpg   ', 15000000, 'Mõm hẹp và nhọn, lông ngắn.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 5, 27, 2, 13, 7),
(16, 'Becgie Việt Nam', '1607511740.jpg  ', 15000000, 'Mõm hẹp và nhọn,tai dài dựng đứng, dáng cao.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 5, 28, 3, 3, 7),
(17, 'Phốc Hươu', '1607512649.jpg  ', 12000000, 'Lông ngắn, chân dài và bé.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 1, 19, 1, 4, 13),
(18, 'Phốc Sóc', '1607512948.jpg  ', 12000000, 'Lông dài xù, nhỏ bé,mặt tròn, tai nhỏ.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 2, 20, 5, 2, 13),
(19, 'Phốc Sóc', '1607513051.jpg ', 144444, 'Lông dài xù, nhỏ bé, cute, mặt béo, mắt tròn.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 4, 22, 7, 3, 13),
(20, 'Chó phốc lai nhật', '1607513658.jpg  ', 1500000, 'To lớn, tai nhỏ, mặt bự.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 2, 25, 1, 10, 13),
(21, 'Chó phốc chuột', '1609298236.jpg ', 15000000, 'To lớn, đầu nhỏ, tai to.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 3, 30, 2, 10, 13),
(22, 'chó Ngao Anh', '1607583631.jpg ', 12000000, 'Đầu to, mõm to xệ, mặt nhiều nếp nhăn.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 3, 35, 2, 1, 14),
(23, 'Ngao Argentina', '1607583755.png ', 12000000, 'Mắt nhỏ, đầu to, tai dài cụp.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 1, 27, 3, 8, 14),
(24, 'Ngao Bò', '1607583802.jpg ', 15000000, 'Đầu lớn, mặt mũi nhăn, mõn dài.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 3, 25, 4, 6, 14),
(25, 'Ngao Pháp', '1607584180.jpg ', 15000000, 'Đầu to, môi trên rủ che hàm.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 3, 33, 3, 6, 14),
(26, 'Ngao Tây Tạng', '1607584218.jpg ', 15000000, 'Lông dài và xù, to lớn.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 2, 24, 2, 2, 14),
(27, 'Ngao Ý', '1607584333.jpg ', 12000000, 'Dáng dài, lực lưỡng, chân, mõn dài.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 2, 26, 1, 1, 14),
(28, 'Bull Pháp', '1607584686.jpg ', 15000000, 'Tai dựng, đầu to, dáng cute, tai dựng đứng.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 1, 26, 4, 2, 15),
(29, 'Bulldog', '1607584781.jpg ', 12000000, 'Tai nhỏ, đầu to, chân ngắn.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 1, 25, 3, 10, 15),
(30, 'Bully American', '1607584948.jpg  ', 15000000, 'Lông ngắn, cơ bắp.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 1, 10, 2, 1, 15),
(31, 'Pitbull', '1607585041.jpg         ', 12000000, 'Dáng cao, lông ngắn, cơ bắp.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 2, 14, 4, 8, 15),
(32, 'American Bully', '1607585411.jpg', 12000000, 'Tên khác:Bully, Bully Mỹ\r\nNguồn gốc:Hoa Kỳ\r\nPhân loại:Chó cảnh\r\nKiểu lông:Lông ngắn\r\nMàu lông:Đen, Nâu, Xám, Trắng\r\nĐặc điểm ngoại hình:Lông ngắn, cơ bắp\r\nCân nặng:30-50kg\r\nTuổi thọ:8-12 năm\r\nTuổi sinh sản:1-8 tuổi\r\nSố lượng sinh:4-8 con/lứa', 'Trước khi mang Thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú Thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc Thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho Thú cưng bị thu hồi.\r\nTrong trường hợp Thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh Thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở Thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của Thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 1, 23, 1, 10, 15),
(67, 'Bánh Bao', '1609297372.jpg ', 12000000, 'Lông ngắn, mắt to', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 1, 1, 16, 3, 10, 16);
INSERT INTO `thu_cung` (`ma`, `ten`, `anh`, `gia_ban`, `dac_diem`, `cach_cham_soc`, `gioi_tinh`, `can_nang_nho_nhat`, `can_nang_lon_nhat`, `ma_xuat_xu`, `ma_mau_long`, `ma_loai_thu_cung`) VALUES
(70, 'Mèo tai cụp Scottish Fold', '1609297323.jpg ', 10000000, 'Mặt tròn, dáng cute.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 1, 1, 14, 4, 50, 16),
(71, 'Mèo Munchkin chân ngắn', '1609297283.jpg  ', 16000000, 'Chân ngắn, dáng cute.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 1, 9, 3, 48, 16),
(72, 'Chloe', '1609297232.jpg ', 14000000, 'Dáng cute, mặt tròn, mắt to.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 1, 14, 4, 1, 16),
(73, 'Oreo', '1609297196.jpg ', 17000000, 'Lông xám, mặt to, mắt tròn.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 1, 1, 9, 2, 13, 16),
(74, 'Gnes', '1609297147.png ', 17000000, 'Lông trắng mịn, mắt to.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 1, 1, 10, 6, 2, 21),
(75, 'Dora', '1609297020.jpg  ', 20000000, 'Lông mịn, mắt vàng to, mũi cao.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 1, 1, 8, 7, 2, 21),
(76, 'Mie', '1609295720.jpg ', 20000000, 'Lông mịn, mặt béo, mắt to.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 1, 10, 7, 2, 21),
(77, 'Pearl', '1609295532.jpg ', 20000000, 'Lông vàng phấn, mắt to.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 1, 9, 7, 5, 21),
(79, 'Beo', '1609295304.jpg ', 21000000, 'Lông báo vàng, tai dài.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 2, 9, 7, 57, 22),
(80, 'Christin', '1609295180.jpg ', 12000000, 'Tuổi: 6 tháng.\r\nTình trạng: có sẵn.\r\nSổ sức khỏe: có\r\nTiêm vacxin: 2 mũi\r\nTẩy giun: lần 1.\r\nGiấy Tica, Wcf: không\r\nBảo hành: 15-45 ngày tùy gói.\r\nVận chuyển: miễn phí toàn quốc.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 1, 8, 4, 3, 22),
(81, 'Blackie', '1609294979.jpg ', 17000000, 'Lông báo vàng, mắt vàng to.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 1, 1, 9, 11, 57, 22),
(82, 'Sadie', '1609294573.jpg  ', 9000000, 'Lông báo, mắt xanh to.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 1, 8, 4, 57, 22),
(83, 'Lucy', '1609294510.jpg ', 17000000, 'Lông báo, tai dài dựng đứng.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 1, 9, 1, 3, 22),
(84, 'Misty', '1609294443.jpg ', 15000000, 'Béo, cute.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 0, 1, 9, 4, 48, 25),
(85, 'Tây Môn Khánh', '1609294384.jpg ', 15000000, 'Lông trắng bồng, béo, mặt cute.', 'Trước khi mang thú cưng về nhà, bạn cần tìm hiểu rõ cách chăm sóc loài vật này. Chúng cần được đáp ứng nhu cầu cả về thể chất lẫn tinh thần. Thực phẩm dinh dưỡng, nước sạch, nhà, môi trường an toàn là những yếu tố mà chú thú cưng cần khi chuẩn bị gia nhập vào hộ gia đình mới, kể cả việc có nhiều thời gian chơi đùa, rèn luyện và kích thích tinh thần. Chăm sóc thú cưng là một nhiệm vụ khá lớn lao và không nên xem nhẹ việc nuôi loài vật này. Dẫu vậy, nhiệm vụ này sẽ giúp bạn xây dựng thành công mối quan hệ gần gũi và tin tưởng với thành viên mới của gia đình. Bạn nên thực hiện những bước sau để thú cưng của bạn có một sức khỏe tốt và một môi trường sống lành mạnh hơn :\r\n1.Cho thú cưng ăn đầy đủ chất dinh dưỡng\r\n2.Chăm sóc sức khỏe cho thú cưng \r\n3. Làm vệ sinh thường xuyên cho thú cưng \r\n4. Thường xuyên tương tác và chơi đùa với thú cưng \r\n5. Thể hiện sự tôn trọng và yêu thương thú cưng \r\n* Lời khuyên : \r\nThường xuyên truy cập trang web của FDA để cập nhật các loại thức ăn dành cho thú cưng bị thu hồi.\r\nTrong trường hợp thú cưng trở nên quá hung hăng, bạn nên tiếp cận chúng từ từ và cẩn trọng. Không tiến lại gần từ đằng sau vì chúng có thể xem đây là hành động gây hấn và sẽ cắn bạn.\r\n* Cảnh báo \r\nKhông bao giờ được đánh thú cưng! Đây là hành vi tàn nhẫn và chỉ khiến cho chúng sợ bạn mà thôi. Thay vào đó bạn nên thể hiện sự không hài lòng bằng cách giấu phần thưởng đi. Hơn nữa, bạn nên áp dụng phương pháp củng cố tích cực để thúc đẩy hành vi tốt ở thú cưng.\r\nChú ý hành vi của thú cưng. Thú cưng thường phát ra tín hiệu cho thấy có điều gì đó không ổn. Nếu nhận thấy sự thay đổi bất thường trong hành vi hoặc hành động của thú cưng, bạn nên đưa chúng đến bác sĩ thú y.', 1, 1, 7, 4, 6, 25),
(86, 'Ớt', '1609294298.jpg ', 17000000, 'Lông mịn,  mặt tròn, mắt to.', 'Cách chăm sóc :\r\n\r\nThức ăn cho mèo Munchkin:\r\n- 1 tháng tuổi: ở giai đoạn này mèo bú mẹ là đủ. Sữa của mèo Munchkin mẹ cung cấp đầy đủ dưỡng chất cần thiết và cân đối cho bé mèo Munchkin con phát triển.\r\n\r\n- Từ 1 – 2 tháng tuổi: mèo Munchkin bắt đầu mọc răng, ngoài sữa mẹ, ta nên cho ăn dặm thêm pate và tập cho mèo ăn thức ăn hạt khô, cháo loãng, thịt cá xay nấu chín …\r\n\r\n- Từ 2 tháng đến 1 năm tuổi: Mèo bắt đầu phát triển toàn diện từ răng, lông, móng, xương, da vì vậy nhu cầu dưỡng chất rất cao để đáp ứng đủ.\r\n- Từ 1 năm tuổi trở lên: lúc này cơ thể mèo đã phát triển cân đối, vì vậy cần loại thức ăn có hàm lượng dinh dưỡng cân bằng.\r\n\r\nCác hãng sản xuất thức ăn cũng rất chú ý đặc điểm này, vì vậy họ sản xuất dòng thức ăn riêng cho mèo ở giai đoạn này.\r\n\r\nCách Tắm Cho Mèo Munchkin:\r\nBước 1: Chuẩn Bị\r\n\r\nChuẩn bị loại sữa tắm phù hợp với mèo Munchkin\r\nChuẩn bị chậu tắm và khăn lau khô cho mèo\r\nChuẩn bị nước tắm cho mèo: nước ấm\r\nBước 2: Tiến hành tắm cho mèo\r\nBước 3: Lau khô lông cho mèo\r\nBước 4: Chải lông cho mèo\r\nVới những thông tin đầy đủ về mèo Munchkin như trên, MẬTPET FAMILY hi vọng sẽ giúp các bạn yêu mèo, lựa chọn chú mèo Munchkin chuẩn, thuần chủng, sức khỏe tốt với giá cả phù hợp nha!', 1, 1, 8, 5, 13, 25),
(87, 'Bailey', '1609294243.jpg     ', 20000000, 'Lông dài, tai dựng đứng.', 'Thức ăn cho mèo Munchkin:\r\n- 1 tháng tuổi: ở giai đoạn này mèo bú mẹ là đủ. Sữa của mèo Munchkin mẹ cung cấp đầy đủ dưỡng chất cần thiết và cân đối cho bé mèo Munchkin con phát triển.\r\n\r\n- Từ 1 – 2 tháng tuổi: mèo Munchkin bắt đầu mọc răng, ngoài sữa mẹ, ta nên cho ăn dặm thêm pate và tập cho mèo ăn thức ăn hạt khô, cháo loãng, thịt cá xay nấu chín …\r\n- Từ 2 tháng  đến 1 năm tuổi: Mèo bắt đầu phát triển toàn diện từ răng, lông, móng, xương, da  vì vậy nhu cầu dưỡng chất rất cao để đáp ứng đủ.\r\n- Từ 1 năm tuổi trở lên: lúc này cơ thể mèo đã phát triển cân đối, vì vậy cần loại thức ăn có hàm lượng dinh dưỡng cân bằng.\r\n\r\nCác hãng sản xuất thức ăn cũng rất chú ý đặc điểm này, vì vậy họ sản xuất dòng thức ăn riêng cho mèo ở giai đoạn này.\r\n\r\nCách Tắm Cho Mèo Munchkin:\r\nBước 1: Chuẩn Bị\r\n\r\nChuẩn bị loại sữa tắm phù hợp với mèo Munchkin\r\nChuẩn bị chậu tắm và khăn lau khô cho mèo\r\nChuẩn bị nước tắm cho mèo: nước ấm\r\nBước 2: Tiến hành tắm cho mèo\r\nBước 3: Lau khô lông cho mèo\r\nBước 4: Chải lông cho mèo\r\nVới những thông tin đầy đủ về mèo Munchkin như trên, MẬTPET FAMILY hi vọng sẽ giúp các bạn yêu mèo, lựa chọn chú mèo Munchkin chuẩn, thuần chủng, sức khỏe tốt với giá cả phù hợp nha!', 0, 1, 8, 2, 5, 25),
(89, 'Chilly', '1609293412.jpg    ', 22000000, 'Lông mượt, tai ngắn, mắt màu hổ phách.', 'Khẩu phần ăn hợp lý:\r\n- Từ 0 – 1 tháng \r\nBạn không nên cho mèo con Scottish ăn bất cứ loại thực phẩm nào khác ngoài sữa mẹ. Trong sữa mẹ sẽ chứa những chất dinh dưỡng chú mèo con cần. \r\n- Từ 1 – 2 tháng\r\nĐây là giai đoạn chú mèo con Scottish bắt đầu hình thành răng. Bạn có thể cho chúng ăn cá, thịt gà, pate… để bổ sung thêm nhiều dưỡng chất khác ngoài sữa mẹ. Bạn nên chia nhỏ bữa mỗi ngày, cho chú mèo Scottish ăn khoảng 4 – 5 bữa. \r\n- Từ 2 tháng – 1 tuổi \r\nBạn có thể tham khảo những loại thức ăn sẵn cho mèo được bán tại các cửa hàng thú cưng. Mèo rất thích ăn pate, hãy lựa chọn loại phù hợp, đầy đủ chất dinh dưỡng cần thiết nhất với thú cưng nhà mình nhé. \r\n- Trên 1 tuổi\r\nLúc này, bạn có thể cho chú mèo con Scottish nhà mình ăn đa dạng thực phẩm hơn. Do hệ tiêu hóa của chúng cũng đã ổn định, không dễ tổn thương. Bạn nên bổ sung những nguồn thực phẩm có chứa nhiều chất xơ, vitamin… giúp mèo không bị táo bón. \r\nTắm rửa:\r\nScottish là giống mèo ưa sạch sẽ. Chính vì vậy, bạn nên dành một chút thời gian mỗi ngày để tắm rửa sạch sẽ cho thú cưng nhà mình. Hãy sử dụng sữa tắm chuyên dụng cho mèo bạn nhé. Ngoài ra, bạn cũng nên chải, cắt tỉa lông cho gọn gàng.\r\n\r\nNơi đi vệ sinh:\r\nDo là mèo con nên bạn dễ huấn luyện chúng hơn. Hãy dạy chú mèo con Scottish của bạn đi vệ sinh đúng nơi. Tốt nhất, bạn nên sắm cho chú mèo của mình một gói cát đi vệ sinh. Đổ vào dụng cụ đi vệ sinh của chúng sẽ rất sạch sẽ. \r\n\r\nTrên đây là chia sẻ cách chăm sóc mèo Scottish con. Nếu bạn muốn sở hữu thêm cho mình những chú mèo Scottish con đáng yêu, hãy liên hệ với MậtPet Shop nhé. Những chú mèo tại đây đều được chăm sóc, tiêm chủng, đảm bảo sức khỏe tuyệt đối.', 0, 1, 5, 11, 8, 27),
(90, 'Dark Sky', '1609293330.jpg   ', 16000000, 'Lông ngắn, tai dựng thẳng, mặt tròn.', 'Khẩu phần ăn hợp lý:\r\n- Từ 0 – 1 tháng \r\nBạn không nên cho mèo con Scottish ăn bất cứ loại thực phẩm nào khác ngoài sữa mẹ. Trong sữa mẹ sẽ chứa những chất dinh dưỡng chú mèo con cần. \r\n- Từ 1 – 2 tháng\r\nĐây là giai đoạn chú mèo con Scottish bắt đầu hình thành răng. Bạn có thể cho chúng ăn cá, thịt gà, pate… để bổ sung thêm nhiều dưỡng chất khác ngoài sữa mẹ. Bạn nên chia nhỏ bữa mỗi ngày, cho chú mèo Scottish ăn khoảng 4 – 5 bữa. \r\n- Từ 2 tháng – 1 tuổi \r\nBạn có thể tham khảo những loại thức ăn sẵn cho mèo được bán tại các cửa hàng thú cưng. Mèo rất thích ăn pate, hãy lựa chọn loại phù hợp, đầy đủ chất dinh dưỡng cần thiết nhất với thú cưng nhà mình nhé. \r\n- Trên 1 tuổi\r\nLúc này, bạn có thể cho chú mèo con Scottish nhà mình ăn đa dạng thực phẩm hơn. Do hệ tiêu hóa của chúng cũng đã ổn định, không dễ tổn thương. Bạn nên bổ sung những nguồn thực phẩm có chứa nhiều chất xơ, vitamin… giúp mèo không bị táo bón. \r\nTắm rửa:\r\nScottish là giống mèo ưa sạch sẽ. Chính vì vậy, bạn nên dành một chút thời gian mỗi ngày để tắm rửa sạch sẽ cho thú cưng nhà mình. Hãy sử dụng sữa tắm chuyên dụng cho mèo bạn nhé. Ngoài ra, bạn cũng nên chải, cắt tỉa lông cho gọn gàng.\r\n\r\nNơi đi vệ sinh:\r\nDo là mèo con nên bạn dễ huấn luyện chúng hơn. Hãy dạy chú mèo con Scottish của bạn đi vệ sinh đúng nơi. Tốt nhất, bạn nên sắm cho chú mèo của mình một gói cát đi vệ sinh. Đổ vào dụng cụ đi vệ sinh của chúng sẽ rất sạch sẽ. \r\n\r\nTrên đây là chia sẻ cách chăm sóc mèo Scottish con. Nếu bạn muốn sở hữu thêm cho mình những chú mèo Scottish con đáng yêu, hãy liên hệ với MậtPet Shop nhé. Những chú mèo tại đây đều được chăm sóc, tiêm chủng, đảm bảo sức khỏe tuyệt đối.', 1, 1, 7, 3, 10, 27),
(91, 'Spider', '1609293279.jpg   ', 19000000, 'Lông ngắn, tai dựng thẳng, mắt xanh ngọc.', 'Khẩu phần ăn hợp lý:\r\n- Từ 0 – 1 tháng \r\nBạn không nên cho mèo con Scottish ăn bất cứ loại thực phẩm nào khác ngoài sữa mẹ. Trong sữa mẹ sẽ chứa những chất dinh dưỡng chú mèo con cần. \r\n- Từ 1 – 2 tháng\r\nĐây là giai đoạn chú mèo con Scottish bắt đầu hình thành răng. Bạn có thể cho chúng ăn cá, thịt gà, pate… để bổ sung thêm nhiều dưỡng chất khác ngoài sữa mẹ. Bạn nên chia nhỏ bữa mỗi ngày, cho chú mèo Scottish ăn khoảng 4 – 5 bữa. \r\n- Từ 2 tháng – 1 tuổi \r\nBạn có thể tham khảo những loại thức ăn sẵn cho mèo được bán tại các cửa hàng thú cưng. Mèo rất thích ăn pate, hãy lựa chọn loại phù hợp, đầy đủ chất dinh dưỡng cần thiết nhất với thú cưng nhà mình nhé. \r\n- Trên 1 tuổi\r\nLúc này, bạn có thể cho chú mèo con Scottish nhà mình ăn đa dạng thực phẩm hơn. Do hệ tiêu hóa của chúng cũng đã ổn định, không dễ tổn thương. Bạn nên bổ sung những nguồn thực phẩm có chứa nhiều chất xơ, vitamin… giúp mèo không bị táo bón. \r\nTắm rửa:\r\nScottish là giống mèo ưa sạch sẽ. Chính vì vậy, bạn nên dành một chút thời gian mỗi ngày để tắm rửa sạch sẽ cho thú cưng nhà mình. Hãy sử dụng sữa tắm chuyên dụng cho mèo bạn nhé. Ngoài ra, bạn cũng nên chải, cắt tỉa lông cho gọn gàng.\r\n\r\nNơi đi vệ sinh:\r\nDo là mèo con nên bạn dễ huấn luyện chúng hơn. Hãy dạy chú mèo con Scottish của bạn đi vệ sinh đúng nơi. Tốt nhất, bạn nên sắm cho chú mèo của mình một gói cát đi vệ sinh. Đổ vào dụng cụ đi vệ sinh của chúng sẽ rất sạch sẽ. \r\n\r\nTrên đây là chia sẻ cách chăm sóc mèo Scottish con. Nếu bạn muốn sở hữu thêm cho mình những chú mèo Scottish con đáng yêu, hãy liên hệ với MậtPet Shop nhé. Những chú mèo tại đây đều được chăm sóc, tiêm chủng, đảm bảo sức khỏe tuyệt đối.', 1, 1, 10, 5, 39, 27),
(92, 'Salt', '1609292195.jpg         ', 15000000, 'Lông ngắn,mặt tròn, mắt to.', 'Khẩu phần ăn hợp lý:\r\n- Từ 0 – 1 tháng \r\nBạn không nên cho mèo con Scottish ăn bất cứ loại thực phẩm nào khác ngoài sữa mẹ. Trong sữa mẹ sẽ chứa những chất dinh dưỡng chú mèo con cần. \r\n- Từ 1 – 2 tháng\r\nĐây là giai đoạn chú mèo con Scottish bắt đầu hình thành răng. Bạn có thể cho chúng ăn cá, thịt gà, pate… để bổ sung thêm nhiều dưỡng chất khác ngoài sữa mẹ. Bạn nên chia nhỏ bữa mỗi ngày, cho chú mèo Scottish ăn khoảng 4 – 5 bữa. \r\n- Từ 2 tháng – 1 tuổi \r\nBạn có thể tham khảo những loại thức ăn sẵn cho mèo được bán tại các cửa hàng thú cưng. Mèo rất thích ăn pate, hãy lựa chọn loại phù hợp, đầy đủ chất dinh dưỡng cần thiết nhất với thú cưng nhà mình nhé. \r\n- Trên 1 tuổi\r\nLúc này, bạn có thể cho chú mèo con Scottish nhà mình ăn đa dạng thực phẩm hơn. Do hệ tiêu hóa của chúng cũng đã ổn định, không dễ tổn thương. Bạn nên bổ sung những nguồn thực phẩm có chứa nhiều chất xơ, vitamin… giúp mèo không bị táo bón. \r\nTắm rửa:\r\nScottish là giống mèo ưa sạch sẽ. Chính vì vậy, bạn nên dành một chút thời gian mỗi ngày để tắm rửa sạch sẽ cho thú cưng nhà mình. Hãy sử dụng sữa tắm chuyên dụng cho mèo bạn nhé. Ngoài ra, bạn cũng nên chải, cắt tỉa lông cho gọn gàng.\r\n\r\nNơi đi vệ sinh:\r\nDo là mèo con nên bạn dễ huấn luyện chúng hơn. Hãy dạy chú mèo con Scottish của bạn đi vệ sinh đúng nơi. Tốt nhất, bạn nên sắm cho chú mèo của mình một gói cát đi vệ sinh. Đổ vào dụng cụ đi vệ sinh của chúng sẽ rất sạch sẽ. \r\n\r\nTrên đây là chia sẻ cách chăm sóc mèo Scottish con. Nếu bạn muốn sở hữu thêm cho mình những chú mèo Scottish con đáng yêu, hãy liên hệ với MậtPet Shop nhé. Những chú mèo tại đây đều được chăm sóc, tiêm chủng, đảm bảo sức khỏe tuyệt đối.', 0, 1, 9, 1, 50, 27),
(93, 'Sorson', '1609291989.jpg             ', 17000000, 'Lông ngắn mượt, tai dựng thẳng, mắt hai màu.', 'Khẩu phần ăn hợp lý:\r\n- Từ 0 – 1 tháng \r\nBạn không nên cho mèo con Scottish ăn bất cứ loại thực phẩm nào khác ngoài sữa mẹ. Trong sữa mẹ sẽ chứa những chất dinh dưỡng chú mèo con cần. \r\n- Từ 1 – 2 tháng\r\nĐây là giai đoạn chú mèo con Scottish bắt đầu hình thành răng. Bạn có thể cho chúng ăn cá, thịt gà, pate… để bổ sung thêm nhiều dưỡng chất khác ngoài sữa mẹ. Bạn nên chia nhỏ bữa mỗi ngày, cho chú mèo Scottish ăn khoảng 4 – 5 bữa. \r\n- Từ 2 tháng – 1 tuổi \r\nBạn có thể tham khảo những loại thức ăn sẵn cho mèo được bán tại các cửa hàng thú cưng. Mèo rất thích ăn pate, hãy lựa chọn loại phù hợp, đầy đủ chất dinh dưỡng cần thiết nhất với thú cưng nhà mình nhé. \r\n- Trên 1 tuổi\r\nLúc này, bạn có thể cho chú mèo con Scottish nhà mình ăn đa dạng thực phẩm hơn. Do hệ tiêu hóa của chúng cũng đã ổn định, không dễ tổn thương. Bạn nên bổ sung những nguồn thực phẩm có chứa nhiều chất xơ, vitamin… giúp mèo không bị táo bón. \r\nTắm rửa:\r\nScottish là giống mèo ưa sạch sẽ. Chính vì vậy, bạn nên dành một chút thời gian mỗi ngày để tắm rửa sạch sẽ cho thú cưng nhà mình. Hãy sử dụng sữa tắm chuyên dụng cho mèo bạn nhé. Ngoài ra, bạn cũng nên chải, cắt tỉa lông cho gọn gàng.\r\n\r\nNơi đi vệ sinh:\r\nDo là mèo con nên bạn dễ huấn luyện chúng hơn. Hãy dạy chú mèo con Scottish của bạn đi vệ sinh đúng nơi. Tốt nhất, bạn nên sắm cho chú mèo của mình một gói cát đi vệ sinh. Đổ vào dụng cụ đi vệ sinh của chúng sẽ rất sạch sẽ. \r\n\r\nTrên đây là chia sẻ cách chăm sóc mèo Scottish con. Nếu bạn muốn sở hữu thêm cho mình những chú mèo Scottish con đáng yêu, hãy liên hệ với MậtPet Shop nhé. Những chú mèo tại đây đều được chăm sóc, tiêm chủng, đảm bảo sức khỏe tuyệt đối.', 1, 1, 2, 7, 2, 27),
(101, 'Becgie Nga', '1611741061.jpg', 100000, 'ewgwegwegwegweg', 'gewgwegwegwe', 0, 2, 20, 11, 57, 7),
(102, 'Chó becgie Hà Nội', '1612024034.jpg', 1000000, 'xác định liệu biểu', 'duyệt sẽ tự động', 1, 5, 20, 6, 39, 7),
(103, 'Becgie Lào', '1612024285.jpg', 100000000, 'xác định liệu biểu mẫu hay trường nhập dữ liệu có tự động điền hay không. Nếu bật, trình duyệt sẽ tự động điền dựa trên giá trị đã nhập trước đó. Có thể bật/tắt khả năng tự điền theo từng trường dữ liệu. Với một số trình duyệt bạn phải bật chức năng này lên mới được.', 'xác định liệu biểu mẫu hay trường nhập dữ liệu có tự động điền hay không. Nếu bật, trình duyệt sẽ tự động điền dựa trên giá trị đã nhập trước đó. Có thể bật/tắt khả năng tự điền theo từng trường dữ liệu. Với một số trình duyệt bạn phải bật chức năng này lên mới được.', 1, 2, 20, 3, 39, 7),
(104, 'Becgie Ấn Độ', '1612024322.jpg', 100000000, 'xác định liệu biểu mẫu hay trường nhập dữ liệu có tự động điền hay không. Nếu bật, trình duyệt sẽ tự động điền dựa trên giá trị đã nhập trước đó. Có thể bật/tắt khả năng tự điền theo từng trường dữ liệu. Với một số trình duyệt bạn phải bật chức năng này lên mới được.', 'xác định liệu biểu mẫu hay trường nhập dữ liệu có tự động điền hay không. Nếu bật, trình duyệt sẽ tự động điền dựa trên giá trị đã nhập trước đó. Có thể bật/tắt khả năng tự điền theo từng trường dữ liệu. Với một số trình duyệt bạn phải bật chức năng này lên mới được.', 1, 2, 20, 6, 3, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xuat_xu`
--

CREATE TABLE `xuat_xu` (
  `ma` int(11) NOT NULL,
  `ten_quoc_gia` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `xuat_xu`
--

INSERT INTO `xuat_xu` (`ma`, `ten_quoc_gia`) VALUES
(5, 'Ấn Độ'),
(3, 'Anh'),
(6, 'Ba Tư'),
(11, 'Dogily Cattery'),
(7, 'Nga'),
(1, 'Nhật'),
(2, 'Pháp'),
(4, 'Việt Nam');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ma`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `anh`
--
ALTER TABLE `anh`
  ADD PRIMARY KEY (`ma`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`ma`),
  ADD KEY `ma_khach_hang` (`ma_khach_hang`);

--
-- Chỉ mục cho bảng `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD PRIMARY KEY (`ma_hoa_don`,`ma_thu_cung`),
  ADD KEY `ma_thu_cung` (`ma_thu_cung`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `loai_thu_cung`
--
ALTER TABLE `loai_thu_cung`
  ADD PRIMARY KEY (`ma`),
  ADD UNIQUE KEY `ten` (`ten`);

--
-- Chỉ mục cho bảng `mau_long`
--
ALTER TABLE `mau_long`
  ADD PRIMARY KEY (`ma`),
  ADD UNIQUE KEY `ten` (`ten`);

--
-- Chỉ mục cho bảng `thu_cung`
--
ALTER TABLE `thu_cung`
  ADD PRIMARY KEY (`ma`),
  ADD KEY `ma_loai_thu_cung` (`ma_loai_thu_cung`),
  ADD KEY `ma_mau_long` (`ma_mau_long`),
  ADD KEY `ma_xuat_xu` (`ma_xuat_xu`);

--
-- Chỉ mục cho bảng `xuat_xu`
--
ALTER TABLE `xuat_xu`
  ADD PRIMARY KEY (`ma`),
  ADD UNIQUE KEY `ten_quoc_gia` (`ten_quoc_gia`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `anh`
--
ALTER TABLE `anh`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT cho bảng `loai_thu_cung`
--
ALTER TABLE `loai_thu_cung`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `mau_long`
--
ALTER TABLE `mau_long`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `thu_cung`
--
ALTER TABLE `thu_cung`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT cho bảng `xuat_xu`
--
ALTER TABLE `xuat_xu`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`ma_khach_hang`) REFERENCES `khach_hang` (`ma`);

--
-- Các ràng buộc cho bảng `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD CONSTRAINT `hoa_don_chi_tiet_ibfk_1` FOREIGN KEY (`ma_hoa_don`) REFERENCES `hoa_don` (`ma`),
  ADD CONSTRAINT `hoa_don_chi_tiet_ibfk_2` FOREIGN KEY (`ma_thu_cung`) REFERENCES `thu_cung` (`ma`);

--
-- Các ràng buộc cho bảng `thu_cung`
--
ALTER TABLE `thu_cung`
  ADD CONSTRAINT `thu_cung_ibfk_1` FOREIGN KEY (`ma_loai_thu_cung`) REFERENCES `loai_thu_cung` (`ma`),
  ADD CONSTRAINT `thu_cung_ibfk_2` FOREIGN KEY (`ma_mau_long`) REFERENCES `mau_long` (`ma`),
  ADD CONSTRAINT `thu_cung_ibfk_3` FOREIGN KEY (`ma_xuat_xu`) REFERENCES `xuat_xu` (`ma`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
