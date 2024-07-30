-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 28, 2023 lúc 10:31 AM
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
-- Cơ sở dữ liệu: `online_quiz`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exam_instruct`
--

CREATE TABLE `exam_instruct` (
  `id` int(5) NOT NULL,
  `instruct` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `exam_instruct`
--

INSERT INTO `exam_instruct` (`id`, `instruct`) VALUES
(1, 'Bước 1: Sau khi đăng nhập thành công bạn sẽ được dẫn đến nơi chọn chủ đề để thi trắc nghiệm. <br>\r\nBước 2: Bạn chọn chủ đề và thực hiện nó trong thời gian qui định.<br>\r\nBước 3: Trong mỗi chủ đề có khoảng 10-20 câu hỏi để bạn thực hiện. Bạn có thể kết thúc thời gian làm bài trước cũng được. Bạn có thể làm lại bao nhiêu lần tuỳ thích.<br>\r\nBước 4: Sau khi làm bài xong bạn có thể xem kết quả tại thẻ menu “Kết quả”.');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `exam_instruct`
--
ALTER TABLE `exam_instruct`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `exam_instruct`
--
ALTER TABLE `exam_instruct`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
