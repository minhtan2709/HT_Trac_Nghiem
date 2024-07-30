-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 30, 2024 lúc 04:31 PM
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
-- Cấu trúc bảng cho bảng `exam_category`
--

CREATE TABLE `exam_category` (
  `id` int(5) NOT NULL,
  `category` varchar(100) NOT NULL,
  `exam_time_in_minutes` varchar(5) NOT NULL,
  `logo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `exam_category`
--

INSERT INTO `exam_category` (`id`, `category`, `exam_time_in_minutes`, `logo`) VALUES
(14, 'Word', '15', 'logoimg/edadd84d5543a9413ba179396f2327cflogo word.png'),
(15, 'Excel', '15', 'logoimg/0e8d271e5555b4c839704a8ec61a99falogo excel.png'),
(16, 'PowerPoint', '15', 'logoimg/2a3649cfc35ec097d8f2d2c7a114bab7logo ppt.png'),
(52, 'Máy tính', '10', 'logoimg/78448864c1d2e0cf0c814396f8ec9839Computer.png');

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exam_results`
--

CREATE TABLE `exam_results` (
  `id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `exam_type` varchar(100) NOT NULL,
  `total_question` varchar(10) NOT NULL,
  `correct_answer` varchar(10) NOT NULL,
  `wrong_answer` varchar(10) NOT NULL,
  `exam_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `exam_results`
--

INSERT INTO `exam_results` (`id`, `username`, `exam_type`, `total_question`, `correct_answer`, `wrong_answer`, `exam_time`) VALUES
(80, 's4154', 'Word', '1', '1', '0', '03/04/2023'),
(81, 's4154', 'Word', '1', '1', '0', '03/04/2023'),
(82, 's4154', 'Excel', '0', '0', '0', '03/04/2023'),
(83, 's4154', 'Word', '1', '0', '1', '03/04/2023'),
(84, 's4154', 'Word', '1', '1', '0', '03/04/2023'),
(85, 's4154', 'Word', '20', '16', '4', '03/04/2023'),
(86, 's4154', 'Word', '20', '17', '3', '03/04/2023'),
(87, 's4154', 'Word', '20', '17', '3', '03/04/2023'),
(88, 's4154', 'Word', '20', '17', '3', '03/04/2023'),
(89, 's4154', 'Word', '20', '19', '1', '03/04/2023'),
(90, 's4154', 'Word', '20', '19', '1', '03/04/2023'),
(91, 's4154', 'Word', '20', '19', '1', '03/04/2023'),
(92, 's4154', 'Word', '20', '19', '1', '03/04/2023'),
(93, 's4154', 'Word', '20', '19', '1', '03/04/2023'),
(94, 's4154', 'Word', '20', '19', '1', '03/04/2023'),
(95, 's4154', 'Word', '20', '19', '1', '03/04/2023'),
(96, 's4154', 'Word', '20', '19', '1', '03/04/2023'),
(97, 's4154', 'Word', '21', '19', '2', '03/04/2023'),
(98, 's4154', 'Word', '20', '19', '1', '03/04/2023'),
(99, 's4154', 'Word', '20', '19', '1', '03/04/2023'),
(100, 's4154', 'Word', '20', '18', '2', '03/04/2023'),
(101, 's4154', 'Word', '20', '19', '1', '03/04/2023'),
(102, 's4154', 'Word', '20', '19', '1', '03/04/2023'),
(103, 's4154', 'Word', '20', '19', '1', '03/04/2023'),
(104, 's4154', 'Word', '20', '20', '0', '03/04/2023'),
(105, 's4154', 'Word', '20', '20', '0', '03/04/2023'),
(106, 's4154', 'Excel', '20', '17', '3', '03/04/2023'),
(107, 's4154', 'Excel', '19', '18', '1', '03/04/2023'),
(108, 's4154', 'Excel', '19', '18', '1', '03/04/2023'),
(109, 's4154', 'Excel', '19', '18', '1', '03/04/2023'),
(110, 's4154', 'Excel', '19', '5', '14', '03/04/2023'),
(111, 's4154', 'Excel', '19', '5', '14', '03/04/2023'),
(112, 's4154', 'Excel', '19', '5', '14', '03/04/2023'),
(113, 's4154', 'Excel', '19', '5', '14', '03/04/2023'),
(114, 's4154', 'Excel', '19', '0', '19', '03/04/2023'),
(115, 's4154', 'Excel', '19', '0', '19', '03/04/2023'),
(116, 's4154', 'Excel', '19', '0', '19', '03/04/2023'),
(117, 's4154', 'Excel', '19', '0', '19', '03/04/2023'),
(118, 's4154', 'Excel', '19', '0', '19', '03/04/2023'),
(119, 's4154', 'Excel', '19', '0', '19', '03/04/2023'),
(120, 's4154', 'Excel', '20', '19', '1', '03/04/2023'),
(121, 's4154', 'Excel', '20', '20', '0', '03/04/2023'),
(122, 's4154', 'Powerpoint', '20', '20', '0', '03/04/2023'),
(123, 's4154', 'Powerpoint', '20', '19', '1', '03/04/2023'),
(124, 's4154', 'Word', '20', '1', '19', '05/04/2023'),
(125, 'thanhphap', 'Word', '20', '0', '20', '06/04/2023'),
(126, 'thanhphap', 'Word', '20', '1', '19', '07/04/2023'),
(127, 'thanhphap', 'Word', '20', '1', '19', '07/04/2023'),
(128, 'thanhphap12', 'Word', '20', '0', '20', '07/04/2023'),
(129, 'thanhphap12', 'Word', '20', '0', '20', '10/04/2023'),
(130, 'thanhphap12', 'Word', '20', '2', '18', '10/04/2023'),
(131, 'thanhphap12', 'pp', '2', '2', '0', '10/04/2023'),
(132, 'thanhphap12', 'Word', '20', '0', '20', '10/04/2023'),
(133, 'thanhphap12', 'Word', '20', '0', '20', '10/04/2023'),
(134, 'thanhphap12', 'Word', '20', '0', '20', '10/04/2023'),
(135, 'thanhphap12', 'Excel', '20', '1', '19', '10/04/2023'),
(136, 'thanhphap12', 'Word', '20', '0', '20', '10/04/2023'),
(137, 'thanhphap12', 'Word', '20', '0', '20', '10/04/2023'),
(138, 'thanhphap12', 'Word', '20', '1', '19', '10/04/2023'),
(139, 'thanhphap12', 'Word', '20', '0', '20', '10/04/2023'),
(140, 'thanhphap12', 'Word', '20', '0', '20', '10/04/2023'),
(141, 'thanhphap12', 'Word', '20', '0', '20', '10/04/2023'),
(142, 'thanhphap12', 'Word', '20', '0', '20', '10/04/2023'),
(143, 'thanhphap12', 'Word', '20', '0', '20', '10/04/2023'),
(144, 'thanhphap12', 'Word', '20', '1', '19', '10/04/2023'),
(145, 'thanhphap12', 'Word', '20', '0', '20', '10/04/2023'),
(146, 'thanhphap12', 'Word', '20', '0', '20', '10/04/2023'),
(147, 'thanhphap12', 'Word', '20', '1', '19', '10/04/2023'),
(148, 'thanhphap12', 'Word', '20', '1', '19', '10/04/2023'),
(149, 'thanhphap12', 'Word', '20', '1', '19', '10/04/2023'),
(150, 'thanhphap12', 'Word', '20', '1', '19', '10/04/2023'),
(151, 'thanhphap12', 'Excel', '20', '0', '20', '10/04/2023'),
(152, 'thanhphap12', 'Word', '18', '12', '6', '10/04/2023'),
(153, 'thanhphap12', 'Word', '20', '20', '0', '10/04/2023'),
(154, 'thanhphap12', 'Excel', '20', '1', '19', '10/04/2023'),
(155, 'thanhphap12', 'Powerpoint', '20', '2', '18', '10/04/2023'),
(156, 'thanhphap1235', 'Word', '20', '0', '20', '11/04/2023'),
(157, 'thanhphap1235', 'Word', '20', '1', '19', '11/04/2023'),
(158, 'thanhphap1235', 'Word', '20', '1', '19', '11/04/2023'),
(159, 'thanhphap1235', 'Word', '20', '1', '19', '11/04/2023'),
(160, 'thanhphap1235', 'Word', '20', '1', '19', '11/04/2023'),
(161, 'thanhphap1235', 'Excel', '20', '1', '19', '11/04/2023'),
(162, 'thanhphap1235', 'Word', '20', '1', '19', '11/04/2023'),
(163, 'thanhphap1235', 'Excel', '20', '1', '19', '11/04/2023'),
(164, 'thanhphap1235', 'Word', '20', '0', '20', '11/04/2023'),
(165, 'thanhphap1235', 'Word', '20', '0', '20', '11/04/2023'),
(166, 'thanhphap12', 'Word', '20', '0', '20', '11/04/2023'),
(167, 'thanhphap1235', 'Word', '20', '0', '20', '11/04/2023'),
(168, 'thanhphap1235', 'Word', '20', '0', '20', '11/04/2023'),
(169, 'thanhphap1235', 'Word', '20', '0', '20', '11/04/2023'),
(170, 'thanhphap1235', 'Word', '20', '0', '20', '11/04/2023'),
(171, 'thanhphap1235', 'Word', '20', '0', '20', '11/04/2023'),
(172, 'thanhphap1235', 'Word', '20', '0', '20', '11/04/2023'),
(173, 'thanhphap1235', 'Word', '20', '20', '0', '11/04/2023'),
(174, 'thanhphap1235', 'Excel', '20', '1', '19', '11/04/2023'),
(175, 'thanhphap12', 'Word', '20', '20', '0', '12/04/2023'),
(176, 'thanhphap1235', 'Word', '20', '19', '1', '12/04/2023'),
(177, 'thanhphap12', 'Word', '20', '20', '0', '13/04/2023'),
(178, 'thanhphap12', 'Excel', '20', '1', '19', '13/04/2023'),
(179, 'thanhphap1235', 'Word', '20', '0', '20', '13/04/2023'),
(180, 'thanhphap1235', 'Word', '20', '2', '18', '13/04/2023'),
(181, 'thanhphap1235', 'Word', '20', '19', '1', '13/04/2023'),
(182, 'thanhphap1235', 'Word', '20', '0', '20', '14/04/2023'),
(183, 'thanhphap1235', 'S', '0', '0', '0', '14/04/2023'),
(184, 'thanhphap1235', 'S', '0', '0', '0', '14/04/2023'),
(185, 'thanhphap1235', 'E', '0', '0', '0', '14/04/2023'),
(186, 'thanhphap1235', 'S', '0', '0', '0', '14/04/2023'),
(187, 'thanhphap1235', 'Word', '20', '20', '0', '14/04/2023'),
(188, 'thanhphap1235', 'pp', '0', '0', '0', '14/04/2023'),
(189, 'thanhphap1235', 'Word', '20', '19', '1', '14/04/2023'),
(190, 'thanhphap1235', 'Word', '20', '0', '20', '14/04/2023'),
(191, 'thanhphap1235', 'Word', '20', '0', '20', '14/04/2023'),
(192, 'thanhphap1235', 'Word', '20', '0', '20', '14/04/2023 21:45:15'),
(193, 'thanhphap1235', 'Excel', '20', '0', '20', '02:47 15/04/2023'),
(194, 'thanhphap1235', 'Word', '20', '20', '0', '02:48 15/04/2023'),
(195, 'thanhphap1235', 'pp', '0', '0', '0', '18:51 15/04/2023'),
(196, 'thanhphap1235', 'Word', '20', '20', '0', '18:51 15/04/2023'),
(197, 'thanhphap1235', 'PowerPoint', '20', '0', '20', '21:17 15/04/2023'),
(198, 'thanhphap1235', 'Word', '21', '21', '0', '21:25 15/04/2023'),
(199, 'thanhphap1235', 'Máy tính', '10', '10', '0', '23:23 16/04/2023'),
(200, 'thanhphap1235', 'Máy tính', '10', '9', '1', '23:31 16/04/2023'),
(201, 'Minh_Tan', 'Word', '20', '7', '13', '16:05 28/12/2023'),
(202, 'Minh_Tan', 'Excel', '20', '7', '13', '16:07 28/12/2023');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `questions`
--

CREATE TABLE `questions` (
  `id` int(5) NOT NULL,
  `question_no` varchar(5) NOT NULL,
  `question` varchar(500) NOT NULL,
  `opt1` varchar(200) NOT NULL,
  `opt2` varchar(200) NOT NULL,
  `opt3` varchar(200) NOT NULL,
  `opt4` varchar(200) NOT NULL,
  `answer` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `questions`
--

INSERT INTO `questions` (`id`, `question_no`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `category`) VALUES
(24, '1', 'Trong MS Word 2016, để chèn bảng có độ rộng của mỗi cột là 1 inches, ta dùng lệnh nào trong hộp thoại Insert Table?', 'Fixed column width', 'AutoFit to contents', 'AutoFit to window', 'Remember dimensions for new table', 'Fixed column width', 'Word'),
(25, '2', 'Trong MS Word 2016, để thực hiện lệnh tìm kiếm và thay thế văn bản thì trong hộp thoại Find Replace, ta sẽ gõ từ cần tìm trong mục nào?', 'Find what', 'Replace with', 'Find with', 'Replay what', 'Find what', 'Word'),
(26, '3', 'Trong MS 2016, định dạng Drop Cap dùng để làm gì?', 'Tạo chữ to đầu đoạn và chữ này có thể kéo dài trên nhiều dòng', 'Tạo chữ to giữa đoạn và chữ này có thể kéo dài trên nhiều dòng', 'Tạo chữ to cuối đoạn và chữ này có thể kéo dài trên nhiều dòng', 'Tạo chữ to ở vị trí bất kì trong đoạn và chữ này có thể kéo dài trên nhiều dòng', 'Tạo chữ to đầu đoạn và chữ này có thể kéo dài trên nhiều dòng', 'Word'),
(27, '4', 'Trong MS Word 2016, khi thực hiện các thao tác chọn văn bản, thao tác nào sau đây là sai?', 'Nhấp đúp lên một từ để chọn từ đó', 'Nhấp nhanh ba lần lên một đoạn văn bản để chọn đoạn văn đó', 'Giữ Ctrl và nhấp chuột lên câu cần chọn để chọn nguyên câu đó', 'Nhấp đúp ở đầu dòng để chọn nguyên một dòng đó', 'Nhấp đúp ở đầu dòng để chọn nguyên một dòng đó', 'Word'),
(28, '5', 'Trong MS Word 2016, để sao chép cho nhiều định dạng liên tiếp cho nhiều khối văn bản khác nhau, ta thực hiện lệnh Format Painter như thế nào?', 'Nhấp nút Format Painter', 'Nhấp đúp nút Format Painter', 'Nhấp ba lần liên tiếp Format Painter', 'Không thực hiện được', 'Nhấp đúp nút Format Painter', 'Word'),
(29, '6', 'Trong MS Word 2016, để định dạng văn bản có chữ in hoa nhỏ, ta dùng lệnh gì?', 'Change Case – UPPERCASE', 'Change Case – lowercase', 'Hộp thoại Front – Small caps', 'Hộp thoại Front – All caps', 'Hộp thoại Front – Small caps', 'Word'),
(30, '7', 'Trong MS Word 2016, lệnh Insert Footnote dùng để làm gì?', 'Chèn chú thích ở đầu trang', 'Chèn chú thích ở cuối trang', 'Chèn chú thích ở đầu văn bản', 'Chèn chú thích ở cuối văn bản', 'Chèn chú thích ở cuối trang', 'Word'),
(31, '8', 'Trong MS Word 2016, để chèn tiêu đề ở đầu mỗi trang cho văn bản hiện hành, ta dùng lệnh gì?', 'Thẻ Insert – Header', 'Thẻ Insert – Footer', 'Thẻ References – Header', 'Thẻ References – Footer', 'Thẻ Insert – Header', 'Word'),
(32, '9', 'Trong MS Word 2016, chức năng View Side by Side dùng để làm gì?', 'Hiển thị hai cửa sổ văn bản chồng lên nhau để so sánh', 'Hiển thị hai cửa sổ văn bản song song để so sánh', 'Hiển thị tất cả cửa sổ văn bản chồng lên nhau để so sánh', 'Hiển thị tất cả cửa sổ văn bản song song để so sánh', 'Hiển thị hai cửa sổ văn bản song song để so sánh', 'Word'),
(33, '10', 'Trong MS Word 2016, để canh đều chiều cao của các dòng đang chọn trong bảng biểu, ta dùng lệnh gì?', 'Thẻ (Table Tools) Layout – Distribute Columns', 'Thẻ (Table Tools) Layout – Distribute Rows', 'Nhấp đúp chuột tại đường biên dưới dòng đang chọn', 'Trỏ chuột dưới dòng biên dưới của dòng – nhấp giữ và di chuyển chuột', 'Thẻ (Table Tools) Layout – Distribute Rows', 'Word'),
(34, '11', 'Trong MS Word 2016, để thay đổi lề phải của đoạn văn bản đang chọn, ta dùng lệnh gì?', 'Thẻ Layout – Indent Left', 'Thẻ Layout – Indent Right', 'Thẻ Home – Increase Indent', 'Thẻ Home – Decrease Indent', 'Thẻ Layout – Indent Right', 'Word'),
(35, '12', 'Trong MS Word 2016, để canh đều chiều cao của các dòng đang chọn trong bảng biểu, ta dùng lệnh gì?', 'Thẻ (Table Tools) Layout – Distribute Columns', 'Thẻ (Table Tools) Layout – Distribute Rows', 'Nhấp đúp chuột tại đường biên dưới dòng đang chọn', 'Trỏ chuột dưới dòng biên dưới của dòng – nhấp giữ và di chuyển chuột', 'Thẻ (Table Tools) Layout – Distribute Rows', 'Word'),
(39, '13', 'Trong MS Word 2016, chức năng Password to modify dùng để làm gì?', 'Không cho phép mở văn bản ra xem', 'Không cho phép mở văn bản ra xem', 'Không cho phép lưu cập nhật với nội dung đã chỉnh sửa', 'Không cho phép lưu văn bản với tên mới', 'Không cho phép lưu cập nhật với nội dung đã chỉnh sửa', 'Word'),
(40, '14', 'Trong MS Word 2016, để thay đổi khoảng cách giữa các dòng trong đoạn văn bản, ta dùng lệnh gì trong hộp thoại Paragraph?', 'Spacing Before', 'Spacing After', 'Line Spacing', 'Mirror indents', 'Line Spacing', 'Word'),
(41, '15', 'Trong MS Word 2016, để thiết lập trang in với khổ giấy đứng ta dùng lệnh gì trong thẻ Layout – Orientation?', 'Portrait', 'Landscape', 'Vertical', 'Horizontal', 'Portrait', 'Word'),
(42, '16', 'Trong MS Word 2016, để chèn kí tự đặc biệt vào văn bản, ta dùng lệnh gì?', 'Auto Text', 'Field', 'Symbol', 'Reference', 'Symbol', 'Word'),
(43, '17', 'Trong MS Word 2016, để xác định vị trí của hình ảnh (picture) trên một trang văn bản thì sau khi chọn hình ảnh, ta dùng lệnh gì trong thẻ (Picture Tools) Format?', 'Position', 'Wrap Text', 'Align', 'Seletion pane', 'Position', 'Word'),
(48, '18', 'Trong MS Word 2016, khi có ba hình vẽ (shape) chồng lên nhau, hình đang chọn nằm ở trên muốn chuyển xuống dưới cùng thì dùng lệnh gì?', 'Bring Forward', 'Bring in Front of Text', 'Send Backward', 'Send to Back', 'Send to Back', 'Word'),
(49, '1', 'Trong MS Excel 2016, để xóa dữ liệu và các định dạng trong một khối ô đang chọn, ta dùng lệnh gì trong thẻ Home – Clear ?', 'Clear Comments', 'Clear All', 'Clear Formats', 'Clear Contents', 'Clear All', 'Excel'),
(50, '2', 'Trong MS Excel 2016, thẻ nào trong hộp thoại Format Cells có chức năng định dạng gạch chân (Underline) dữ liệu ?', 'Font', 'Border', 'Alighment', 'Fill', 'Font', 'Excel'),
(51, '3', 'Trong MS Excel 2016, A1:A10 là một khối ô chứa dữ liệu, trong đó có hai ô chưa giá trị chuỗi ký tự và các ô còn lại chứa giá trị số. Công thức =COUNTA(A1:A10) cho kết quả là bao nhiêu ?', '1', '2', '8', '10', '10', 'Excel'),
(52, '4', 'Trong MS Excel 2016, với công thức có sử dụng địa chỉ ô tương đối, phát biểu nào dưới đây là đúng khi chép công thức theo chiều ngang ?', 'Cột trong địa chỉ ô sẽ bị đổi', 'Dòng trong địa chỉ ô sẽ bị đổi', 'Cột và dòng trong địa chỉ ô sẽ bị đổi', 'Cột và dòng trong địa chỉ ô sẽ không đổi', 'Cột trong địa chỉ ô sẽ bị đổi', 'Excel'),
(53, '5', 'Trong MS Excel 2016, để hiện dòng bị ẩn trên trang tính hiện hành ta chọn các dòng bao gồm cả dòng bị ẩn, rồi thực hiện lệnh Format – Hide & Unhide – Unhide Rows tại thẻ nào dưới đây ?', 'Insert', 'Page Layout', 'Formulas', 'Home', 'Home', 'Excel'),
(54, '6', 'Trong MS Excel 2016, minh họa nào dưới đây là địa chỉ ô ?', 'AA11', '1A1', '1A', '11AA', 'AA11', 'Excel'),
(56, '7', 'Trong MS Excel 2016, ký tự nào bắt đầu một công thức tính toán ?', '?', '=', '!', '$', '=', 'Excel'),
(57, '8', 'Trong MS Excel 2016, để thay đổi khổ giấy cho trang in ta chọn thế nào ?', 'View', 'Page Layout', 'Insert', 'Home', 'Page Layout', 'Excel'),
(58, '9', 'Trong MS Excel 2016, công thức =IF(5>10, 100) trả về kết quả là gì ?', 'TRUE', 'FALSE', 'MS Excel hiện thông báo lỗi', '100', 'FALSE', 'Excel'),
(59, '10', 'Trong MS Excel 2016, khi nhập dữ liệu kiểu ngày tháng, phát biểu nào dưới đây là đúng ?', 'Dữ liệu mặc định canh biên trái ô', 'Dữ liệu mặc định canh biên phải ô', 'Dữ liệu mặc định canh biên trên ô', 'Dữ liệu mặc định canh biên dưới ô', 'Dữ liệu mặc định canh biên phải ô', 'Excel'),
(60, '11', 'Trong MS Excel 2016, ký hiệu nào trộn các ô lại với nhau ?', 'opt_images/3b1cfd6ee28827fe0ee1d1ac153deb0ehình ảnh_2023-04-03_223025384.png', 'opt_images/3b1cfd6ee28827fe0ee1d1ac153deb0ehình ảnh_2023-04-03_223032098.png', 'opt_images/3b1cfd6ee28827fe0ee1d1ac153deb0ehình ảnh_2023-04-03_223037063.png', 'opt_images/3b1cfd6ee28827fe0ee1d1ac153deb0ePicture1.png', 'opt_images/3b1cfd6ee28827fe0ee1d1ac153deb0ePicture1.png', 'Excel'),
(61, '12', 'Trong MS Excel 2016, để làm tròn giá trị số tại ô A1 đến hàng trăm, tại ô A2 công thức viết như thế nào ?', '=ROUND(A1,0)', '=ROUND(A1,-2)', '=ROUND(A1,-1)', '=ROUND(A1,2)', '=ROUND(A1,-2)', 'Excel'),
(62, '13', 'Trong MS Excel 2016, làm thế nào để nhập một chuỗi ký tự 0123 vài ô bất kỳ ?', '0123', '‘0123', '“0123', '“0123”', '‘0123', 'Excel'),
(63, '14', 'Trong MS Excel, tại ô A1 có giá trị là 10, A2 có giá trị là 3. Hàm MOD(A1,A2) cho kết quả là bao nhiêu ?', '3', '0', '1', '10', '1', 'Excel'),
(64, '15', 'Trong MS Excel 2016, ký hiệu nào dùng để căn giữa dữ liệu trong ô ? ', 'opt_images/c728d4096038943cd7f55ea7c2896fc3hình ảnh_2023-04-03_223238394.png', 'opt_images/c728d4096038943cd7f55ea7c2896fc3Picture2.png', 'opt_images/c728d4096038943cd7f55ea7c2896fc3hình ảnh_2023-04-03_223301353.png', 'opt_images/c728d4096038943cd7f55ea7c2896fc3hình ảnh_2023-04-03_223255889.png', 'opt_images/c728d4096038943cd7f55ea7c2896fc3Picture2.png', 'Excel'),
(65, '16', 'Trong MS Excel 2016, tại ô A1 có giá trị số là 1.99. Công thức =INT(A1) cho kết quả là bao nhiêu ?', '0', '1', '2', '1.9', '1', 'Excel'),
(66, '17', 'Trong MS Excel 2016, phát biểu nào sau đây là đúng ?', 'Một trang in gọi là Worksheet', 'Một trang tính gọi là Workbook', 'Trong một Workbook có thể chứa nhiều Worksheet', 'Trong một Worksheet có thể chứa nhiều Workbook', 'Trong một Workbook có thể chứa nhiều Worksheet', 'Excel'),
(67, '18', 'Trong MS Excel 2016, công thức =LEFT(“THSP1234”, 4) sẽ cho kết quả là gì ?', '1234', '4321', 'THSP', 'SP12', 'THSP', 'Excel'),
(68, '19', 'Trong định dạng trang in Excel 2016, để thiết lập in lặp lại các cột tiêu đề trong trang tín ta dùng lệnh gì ?', 'Print Titles – Columns to repeat at top', 'Print Titles – Columns to repeat at left', 'Print Titles – Columns to repeat at right', 'Print Titles – Columns to repeat at bottom', 'Print Titles – Columns to repeat at left', 'Excel'),
(69, '20', 'Trong MS Excel 2016, có công thức tính như sau =IF(AND(A1>=5, B1>=4),Đạt, Hỏng). Khi nhấn Enter, màn hình xuất hiện thông báo lỗi. Vậy công thức nào dưới đây là đúng cú pháp ?', '=IF(A1>=5 AND B1>=4), Đạt, Hỏng)', '=IF(A1>=5 AND B1>=4), “Đạt”, “Hỏng”)', '=IF(AND(A1>=5, B1>=4), “Đạt”, “Hỏng”))', '=IF(AND(A1>=5, B1>=4), “Đạt”, “Hỏng”)', '=IF(AND(A1>=5, B1>=4), “Đạt”, “Hỏng”)', 'Excel'),
(80, '1', 'Trong MS Power Point 2016, để thay thế font Tahoma đang được áp dụng trong bài trình chiếu bằng font Arial, ta sử dụng lệnh nào trong thẻ Home?', 'Replace – Replace…', 'Replace – Replace Fonts…', 'Font', 'Find', 'Replace – Replace Fonts…', 'PowerPoint'),
(81, '2', 'Trong MS Power Point 2016, tại chế độ hiện thị Normal View, lệnh Zoom cho phép ta làm gì?', 'Cho phép phóng to, thu nhỏ trang chiếu đang được chọn', 'Cho phép phóng to, thu nhỏ các trang chiếu chẵn', 'Cho phép phóng to, thu nhỏ trang các chiếu lẻ', 'Cho phép phóng to, thu nhỏ tất cả các trang chiếu', 'Cho phép phóng to, thu nhỏ trang chiếu đang được chọn', 'PowerPoint'),
(82, '3', 'Trong MS Power Point 2016, để trình chiếu trang từ trang chiếu hiện hành, ta dùng lệnh gì tại thẻ Slide Show?', 'From Beginning', 'Broadcast Slide Show', 'From Current Slide', 'Custom Slide Show', 'From Current Slide', 'PowerPoint'),
(83, '4', 'Trong MS Power Point 2016, khi làm việc với đoạn văn bản, lệnh Decrease List Level, dùng để dùng để làm gì?', 'Tăng cấp danh sách cho đoạn văn bản', 'Giảm cấp danh sách cho đoạn văn bản', 'Tăng cấp danh sách cho các đoạn văn bản chẵn', 'Giảm cấp danh sách cho các đoạn văn bản lẻ', 'Giảm cấp danh sách cho đoạn văn bản', 'PowerPoint'),
(84, '5', 'Trong MS Power Point 2016, Khi làm việc với bảng, lệnh “Lock Aspect Ratio” dùng để làm gì?', 'Khóa tỷ lệ khung, chỉ cho phép chiều cao của dòng thay đổi', 'Khóa tỷ lệ khung, chỉ cho phép độ rộng của cột thay đổi', 'Khóa tỷ lệ khung, cho phép chiều cao dòng và độ rộng cột thay đổi theo tỷ lệ thuận', 'Khóa tỷ lệ khung, cho phép chiều cao dòng và độ rộng cột thay đổi theo tỷ lệ nghịch', 'Khóa tỷ lệ khung, cho phép chiều cao dòng và độ rộng cột thay đổi theo tỷ lệ thuận', 'PowerPoint'),
(85, '6', 'Trong MS Power Point 2016, để thiết lập chuyển tiếp trang tự động khi trình chiếu, ta dùng lệnh gì trong thẻ Transitions?', 'On Mouse Click', 'After', 'Duration', 'Effect Option', 'After', 'PowerPoint'),
(86, '7', 'Trong MS Power Point 2016, sử dụng lệnh nào để ẩn một trang chiếu trong thẻ Slide Show?', 'Hide Slide', 'Custom Slide Show', 'Duration', 'Effect Options', 'Custom Slide Show', 'PowerPoint'),
(87, '8', 'Trong MS Power Point 2016, khi khai báo âm thanh cho hiệu ứng Transition, lệnh “Loop Until Next Sound” có tác dụng gì?', 'Âm thanh sẽ phát cho đến khi chuyển sang trang chiếu tiếp theo', 'Âm thanh sẽ phát cho đến hết bài trình chiếu', 'Âm thanh sẽ phát cho đến khi nhấn phím ESC để dừng trình chiếu', 'Âm thanh sẽ phát lặp lại cho đến khi gặp âm thanh khác', 'Âm thanh sẽ phát lặp lại cho đến khi gặp âm thanh khác', 'PowerPoint'),
(88, '9', 'Trong MS Power Point 2016,khi làm việc với văn bản, lệnh Text Direction trong thẻ Home dùng để làm gì?', 'Đổi hướng văn bản trong khung', 'Đổi hướng khung chứa văn bản', 'Đổi hướng khu và văn bản trong khung', 'Đổi hướng trang chiếu', 'Đổi hướng văn bản trong khung', 'PowerPoint'),
(89, '10', 'Trong MS Power Point 2016, chế độ Notes Page dùng để làm gì?', 'Nhập nội dung chú thích cho trang chiếu', 'Xem trước việc trình chiếu cảu các hiệu ứng, các đoạn phim và âm thanh', 'Hiển thị các trang chiếu dưới dạng thu nhỏ, giúp dễ dàng sắp xếp lại các trang chiếu', 'Thiết kế nội dung trang chiếu', 'Nhập nội dung chú thích cho trang chiếu', 'PowerPoint'),
(90, '11', 'Trong MS Power Point 2016, để tạo nhóm các trang chiếu, ta dùng lệnh gì trong thẻ Home?', 'Add Section', 'Rename Section', 'Remove Section', 'Remove All Section', 'Add Section', 'PowerPoint'),
(91, '12', 'Trong MS Power Point 2016, khi làm việc với đoạn văn bản, để tăng cấp danh sách cho đoạn văn bản, ta dùng phím gì?', 'Tab', 'ESC', 'F5', 'Shift + F5', 'Tab', 'PowerPoint'),
(92, '13', 'Trong MS Power Point 2016,  hiệu ứng Entrance dùng để làm gì?', 'Làm đối tượng xuất hiện trên trang chiếu', 'Làm đối tượng được nhấn mạnh trên trang chiếu', 'Làm đối tượng biến mất trên trang chiếu', 'Làm đối tượng chuyển động theo đường dẫn xác định', 'Làm đối tượng xuất hiện trên trang chiếu', 'PowerPoint'),
(93, '14', 'Trong MS Power Point 2016, sử dụng lệnh nào để ẩn trang chiếu trong các section?', 'Remove Section', 'Collapse All', 'Remove All Sections', 'Remove Section & Slides', 'Collapse All', 'PowerPoint'),
(94, '15', 'Trong MS Power Point 2016, khi thực hiện chèn Header và Footer cho các trang chiếu, phần nào sau đây cho phép đánh số thứ tự cho các trang chiếu? ', 'Footer', 'Date and time – Update automatically', 'Slide Number', 'Date and time – Fixed', 'Slide Number', 'PowerPoint'),
(95, '16', 'Trong MS Power Point 2016, để chuyển bài trình chiếu thành tập tin văn bản Ms Word, ta dung lệnh gì trong File – Export?', 'Change File Type', 'Create PDF/XPS Document', 'Create Handouts', 'Package Presentation for CD', 'Create Handouts', 'PowerPoint'),
(96, '17', 'Trong MS Power Point 2016, hiệu ứng Motion Paths dùng để làm gì?', 'Làm xuất hiện đối tượng trên trang chiếu', 'Lam nổi bật đối tượng trên trang chiếu', 'Làm đối tượng thoát ra khỏi trang chiếu', 'Làm đối tượng chuyển động theo quỹ đạo xác định', 'Làm đối tượng chuyển động theo quỹ đạo xác định', 'PowerPoint'),
(97, '18', 'Trong MS Power Point 2016, định dạng tập tin âm thanh được sử dụng cho hiệu ứng chuyển trang là gì?', 'MP3', 'WAV', 'FLAC', 'WMA', 'WAV', 'PowerPoint'),
(98, '19', 'Trong MS Power Point 2016, ký hiệu nào dùng để đưa các chủ thể bị đè, trùng nhau hiện lên trên ', 'opt_images/162a3c3a9ca500f484971caf6d5dbb6fPicture1.png', 'opt_images/162a3c3a9ca500f484971caf6d5dbb6fhình ảnh_2023-04-03_230659732.png', 'opt_images/162a3c3a9ca500f484971caf6d5dbb6fhình ảnh_2023-04-03_230705113.png', 'opt_images/162a3c3a9ca500f484971caf6d5dbb6fhình ảnh_2023-04-03_230708636.png', 'opt_images/162a3c3a9ca500f484971caf6d5dbb6fPicture1.png', 'PowerPoint'),
(99, '20', 'Trong MS Power Point 2016, biểu tượng chức năng tự động tạo đa dạng biểu đồ là gì?', 'opt_images/b0804b21aab15c8d7800f8ebb7e375d8hình ảnh_2023-04-03_230745934.png', 'opt_images/b0804b21aab15c8d7800f8ebb7e375d8hình ảnh_2023-04-03_230743042.png', 'opt_images/b0804b21aab15c8d7800f8ebb7e375d8hình ảnh_2023-04-03_230739794.png', 'opt_images/b0804b21aab15c8d7800f8ebb7e375d8Picture2.png', 'opt_images/b0804b21aab15c8d7800f8ebb7e375d8Picture2.png', 'PowerPoint'),
(108, '19', 'Trong MS Word 2016, đâu là biểu tượng dùng để căn lề giữa ?', 'opt_images/5b123a16b11e9e3068b12c7334114012Đáp án 1.png', 'opt_images/5b123a16b11e9e3068b12c7334114012hình ảnh_2023-04-11_091009114.png', 'opt_images/5b123a16b11e9e3068b12c7334114012hình ảnh_2023-04-11_091013901.png', 'opt_images/5b123a16b11e9e3068b12c7334114012hình ảnh_2023-04-11_091018126.png', 'opt_images/5b123a16b11e9e3068b12c7334114012Đáp án 1.png', 'Word'),
(109, '20', 'Trong MS Word 2016, đâu là biểu tượng dùng để tạo tiêu đề cho trang ?', 'opt_images/b9a1c6f0cedec122d6059e5cb80d7388Đáp án 2.png', 'opt_images/b9a1c6f0cedec122d6059e5cb80d7388hình ảnh_2023-04-11_091057718.png', 'opt_images/b9a1c6f0cedec122d6059e5cb80d7388hình ảnh_2023-04-11_091100541.png', 'opt_images/b9a1c6f0cedec122d6059e5cb80d7388hình ảnh_2023-04-11_091104157.png', 'opt_images/b9a1c6f0cedec122d6059e5cb80d7388Đáp án 2.png', 'Word'),
(127, '1', 'Đĩa CD có dung lượng lưu trữ khoảng bao nhiêu ?', '700 MB', '700 KB', '700 GB', '700 TB', '700 MB', 'Máy tính'),
(128, '2', 'Cần điều khiển (joystick) thường kết nối với máy tính bằng cổng nào ?', 'PS2', 'COM', 'USB', 'HDMI', 'USB', 'Máy tính'),
(129, '3', 'Một byte bằng bao nhiêu bit ?', '8', '16', '32', '64', '8', 'Máy tính'),
(130, '4', 'Khi khởi động máy, hệ điều hành MS Windows sẽ được nạp vào đâu để thi hành ?', 'RAM', 'ROM', 'ALU ', 'BIOS', 'RAM', 'Máy tính'),
(131, '5', 'Phép tính quy đổi nào sau đây là đúng ?', '1 GB = 1024 * 1024 MB', '1 GB = 1000 * 1024 MB', '1 GB = 1024 * 1024 KB', '1 GB = 1000 * 1024 KB', '1 GB = 1024 * 1024 KB', 'Máy tính'),
(132, '6', 'CPU là viết tắt của thuật ngữ gì ?', 'Central Processing Unit', 'Center Processing Unit', 'Central Process Unit', 'Center Process Unit', 'Central Processing Unit', 'Máy tính'),
(133, '7', 'Phần mềm nào sau đây là phần mềm độc hại ?', 'Virus, Worm', 'MS Word, MS Excel', 'Paint, BKAV', 'Gadgets, Windows Media Player', 'Virus, Worm', 'Máy tính'),
(134, '8', 'EULA là viết tắt của thuật ngữ gì ?', 'End User License Agreement', 'Ended User License Agreement', 'Ending User License Agreement', 'Embed User License Agreement', 'End User License Agreement', 'Máy tính'),
(135, '9', 'Đâu là logo của MS Word ? ', 'opt_images/51071dd5f380ec83f2e4beb62b865e0dPicture1.png', 'opt_images/51071dd5f380ec83f2e4beb62b865e0dhình ảnh_2023-04-16_232222242.png', 'opt_images/51071dd5f380ec83f2e4beb62b865e0dhình ảnh_2023-04-16_232225036.png', 'opt_images/51071dd5f380ec83f2e4beb62b865e0dhình ảnh_2023-04-16_232228177.png', 'opt_images/51071dd5f380ec83f2e4beb62b865e0dPicture1.png', 'Máy tính'),
(136, '10', 'RAM là gì ?', 'Bộ nhớ ngoài', 'Bộ nhớ trong', 'Bộ nhớ tạm thời', 'Bộ nhớ vĩnh viễn', 'Bộ nhớ tạm thời', 'Máy tính');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `registration`
--

CREATE TABLE `registration` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `phonenum` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `registration`
--

INSERT INTO `registration` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `contact`, `birthday`, `phonenum`) VALUES
(27, 'franc', 'hello', 's4154545', '202cb962ac59075b964b07152d234b70', 'dafda@dfa', '21312', '2023-04-27', '1234'),
(30, 'Tân', 'Minh ', 'Minh_Tan', 'b9cebf6281f3288cfd98a8af75dff7da', '22h1120116@ut.edu.vn', 'advadvlkad', '2023-12-27', '0784674876'),
(31, 'Minh', 'Tan', 'Minh Tan', 'b958a33532614c67e288348af6044030', '22h1120116@ut.edu.vn', 'cxvnn', '2024-01-29', '0784674876');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `exam_category`
--
ALTER TABLE `exam_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `exam_instruct`
--
ALTER TABLE `exam_instruct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `exam_results`
--
ALTER TABLE `exam_results`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `exam_category`
--
ALTER TABLE `exam_category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `exam_instruct`
--
ALTER TABLE `exam_instruct`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `exam_results`
--
ALTER TABLE `exam_results`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT cho bảng `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT cho bảng `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
