-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 06, 2022 lúc 03:11 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php2_quiz_test`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `is_correct` tinyint(3) DEFAULT NULL COMMENT '0 là sai, 1 là đúng',
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `answers`
--

INSERT INTO `answers` (`id`, `content`, `question_id`, `is_correct`, `img`) VALUES
(1, 'Từ \"ít tiền\".', 4, 0, NULL),
(2, 'Từ \"information technoloy\"', 4, 1, NULL),
(4, 'Từ \"Bị trị\"', 4, 0, NULL),
(7, 'Bịp', 4, 0, NULL),
(10, 'Vì bạn vô duyên', 5, 0, NULL),
(11, 'Vì méo biết.', 5, 0, NULL),
(12, '1 người đang code', 6, 1, NULL),
(13, '1 hắc cơ', 6, 0, NULL),
(14, 'đang hack nasa bằng html', 6, 0, NULL),
(15, 'chĩu', 6, 0, NULL),
(16, 'Xin chào', 7, 1, NULL),
(17, 'Tạm biệt', 7, 0, NULL),
(18, 'Cảm ơn', 7, 0, NULL),
(19, 'Xin lỗi', 7, 0, NULL),
(20, 'Tạm biệt', 8, 1, NULL),
(21, 'Cảm ơn', 8, 0, NULL),
(22, 'Xin lỗi', 8, 0, NULL),
(23, 'Chửi thề', 8, 0, NULL),
(24, 'helo teacher', 9, 1, NULL),
(25, 'Bye bye', 9, 0, NULL),
(26, 'Thank you', 9, 0, NULL),
(27, 'hi bro', 9, 0, NULL),
(28, 'alertt(\'ahahha\');', 11, 1, NULL),
(29, '12', 12, 1, NULL),
(30, '11', 12, 0, NULL),
(31, '1', 12, 0, NULL),
(32, '5', 12, 0, NULL),
(35, 'Javascript', 21, 1, NULL),
(36, 'sfsdfsdfsd', 21, 0, NULL),
(37, 'laravel', 21, 0, NULL),
(38, 'dsfsdsdf', 21, 0, NULL),
(39, 'console.log(hahaha)', 22, 0, NULL),
(40, 'console(\'hihih\')', 22, 0, NULL),
(41, 'console.log\'ádasda\'', 22, 0, NULL),
(42, 'console.log(\'hello\')', 22, 1, NULL),
(47, 'PHP', 24, 1, NULL),
(48, 'Javascript', 24, 0, NULL),
(49, 'Python', 24, 0, NULL),
(50, 'Ruby', 24, 0, NULL),
(51, 'Phần mềm trung gian xác thực , kiểm tra điều kiện', 25, 1, NULL),
(52, 'Méo biết', 25, 0, NULL),
(53, 'Cho vui', 25, 0, NULL),
(54, 'hic', 25, 0, NULL),
(55, 'Nhiều', 26, 1, NULL),
(56, 'Chĩu', 26, 0, NULL),
(57, '4', 26, 0, NULL),
(58, '1', 26, 0, NULL),
(59, 'console.log(hahaha)', 28, 1, NULL),
(60, 'Phần mềm trung gian xác thực , kiểm tra điều kiện', 28, 0, NULL),
(61, 'Phần mềm trung gian xác thực , kiểm tra điều kiện', 28, 0, NULL),
(62, 'Nhiều', 28, 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `questions`
--

INSERT INTO `questions` (`id`, `name`, `quiz_id`, `img`) VALUES
(4, 'IT là viết tắt của từ gì?', 3, NULL),
(5, 'Tại sao bạn ế?', 2, NULL),
(6, 'Ảnh sau cho biết điều gì?', 3, '61f2beed7541c-question1643298541.jpg'),
(7, 'Từ \'hello\' nghĩa là gì', 4, NULL),
(8, 'Từ \'good bye \' nghĩa tiếng việt là gì', 4, NULL),
(9, 'Câu nào sau đây sai cú pháp', 4, NULL),
(11, 'Câu lệnh nào đúng', 5, NULL),
(12, 'số đề ngày mai là gì', 6, NULL),
(13, '1+1= bao nhiêu', 2, '0009-1024x576.jpg'),
(17, 'hbjhbj', 2, NULL),
(21, 'js là viết tắt của', 3, NULL),
(22, 'câu lệnh nào sau đây đúng', 5, NULL),
(24, 'laravel là framework của ngôn ngữ nào', 7, NULL),
(25, 'Middleware trong laravel có tác dụng gì', 7, NULL),
(26, 'Php có bao nhiều framework', 7, NULL),
(28, 'ádasdasdasd', 8, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quizs`
--

CREATE TABLE `quizs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `duration_minutes` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `status` tinyint(2) DEFAULT 1 COMMENT '0\r\n0 là ẩn, 1 là hiện',
  `is_shuffle` tinyint(2) DEFAULT 0 COMMENT '0 là k xáo câu hỏi, 1 là có'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quizs`
--

INSERT INTO `quizs` (`id`, `name`, `subject_id`, `duration_minutes`, `start_time`, `end_time`, `status`, `is_shuffle`) VALUES
(2, 'Quiz ôn tập thi giữa kì môn Laravel', 16, 15, '2022-01-25 17:45:00', '2022-01-31 17:45:00', 1, 1),
(3, 'Quiz ôn tập thi môn js nâng cao hihi123123', 15, 30, '2022-01-26 09:58:00', '2022-02-25 11:58:00', 1, 1),
(4, 'Quiz ôn tập tiếng anh level 1.1 Poly', 17, 15, '2022-02-07 17:03:00', '2022-02-18 17:03:00', 1, 0),
(5, 'Bộ quiz 100 bài code thiếu nhi', 15, 30, '2022-02-08 22:21:00', '2022-02-26 22:21:00', 1, 0),
(6, 'Quiz ôn tập cuối môn js', 15, 15, '2022-02-10 16:16:00', '2022-02-26 16:16:00', 1, 1),
(7, 'Học laravel 9 từ cơ bản đến siêu dễ', 18, 15, '2022-02-18 21:47:00', '2022-02-26 21:47:00', 1, 1),
(8, 'Laravel 10', 16, 14, '2022-02-22 14:27:00', '2022-02-26 14:27:00', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Giáo viên'),
(2, 'Sinh viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student_quizs`
--

CREATE TABLE `student_quizs` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `score` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `student_quizs`
--

INSERT INTO `student_quizs` (`id`, `student_id`, `quiz_id`, `start_time`, `end_time`, `score`) VALUES
(34, 4, 3, '2022-02-09 21:53:26', '2022-02-09 21:53:37', 10),
(58, 4, 4, '2022-02-11 21:44:50', '2022-02-11 22:05:32', 3.33),
(66, 4, 6, '2022-02-12 14:19:33', '2022-02-12 14:19:35', 0),
(67, 2, 4, '2022-02-12 14:46:33', '2022-02-12 14:46:41', 3.33),
(69, 6, 7, '2022-02-18 22:19:03', '2022-02-18 22:19:10', 3.33),
(70, 6, 6, '2022-02-18 22:19:26', '2022-02-18 22:19:31', 10),
(71, 7, 6, '2022-02-18 22:21:49', '2022-02-18 22:21:52', 0),
(72, 7, 5, '2022-02-18 22:22:00', '2022-02-18 22:22:05', 5),
(86, 4, 7, '2022-02-21 23:13:54', '2022-02-21 23:38:17', 3.33),
(88, 4, 5, '2022-02-22 10:40:11', '2022-02-22 10:40:23', 5),
(89, 2, 7, '2022-02-22 14:20:46', '2022-02-22 14:21:27', 6.67),
(92, 2, 5, '2022-02-22 14:27:00', '2022-02-22 14:27:09', 5),
(93, 4, 8, '2022-02-22 14:44:19', '2022-02-22 14:44:22', 0),
(94, 2147483647, 5, '2022-02-25 23:12:47', '2022-02-25 23:12:54', 5),
(95, 2147483647, 5, '2022-02-25 23:12:47', '2022-02-25 23:15:00', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student_quiz_detail`
--

CREATE TABLE `student_quiz_detail` (
  `student_quiz_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `student_quiz_detail`
--

INSERT INTO `student_quiz_detail` (`student_quiz_id`, `question_id`, `answer_id`) VALUES
(31, 9, 24),
(36, 7, 24),
(37, 7, 0),
(48, 7, 16),
(50, 9, 24),
(52, 9, 24),
(53, 9, 26),
(54, 7, 17),
(54, 8, 20),
(54, 9, 26),
(55, 7, 19),
(55, 8, 22),
(55, 9, 24),
(58, 7, 19),
(58, 8, 22),
(58, 9, 24),
(66, 12, 30),
(67, 7, 17),
(67, 8, 21),
(67, 9, 24),
(69, 24, 50),
(69, 25, 51),
(69, 26, 56),
(70, 12, 29),
(71, 12, 30),
(72, 11, 28),
(72, 22, 39),
(86, 24, 47),
(86, 25, 0),
(86, 26, 56),
(88, 11, 28),
(88, 22, 39),
(89, 24, 48),
(89, 25, 51),
(89, 26, 55),
(92, 11, 28),
(92, 22, 39),
(93, 28, 60),
(94, 11, 28),
(94, 22, 39),
(95, 11, 28),
(95, 22, 39);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `author_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `avatar`, `author_id`) VALUES
(15, 'Javascript nâng cao', '61efccc742736-subject1643105479.png', 4),
(16, 'Laravel 8', '61efc68a23ab6-subject1643103882.png', 4),
(17, 'English', '6200ee37c1526-subject1644228151.jpg', 4),
(18, 'Laravel 9', '6207660e73145-subject1644652046.jpg', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT 2,
  `google_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `role_id`, `google_id`) VALUES
(1, 'trần hữu thiện', 'thienth@fpt.edu.vn', '$2y$10$ogeclBPOumIBjkRF17hUmuYTx/usbE71s5b6yfOy74KvLaLUdFq4u', NULL, 1, 0),
(2, 'Hiệp Trần', 'hiep@gmail.com', '$2y$10$FNJqDhdsdwEfVhbMurfHvO8LY47FBMr.v8gZaP3psEkrJ4kwFluom', 'C:\\xampp\\tmp\\phpCB15.tmp', 2, 0),
(4, 'Ngô Bá Đạo', 'admin@gmail.com', '$2y$10$U3UtkorG/edaTrC7Pb/hyOpOvJjyDNkiOzWYR7LYComKrV5XrMliu', 'C:\\xampp\\tmp\\phpB8FF.tmp', 1, 0),
(6, 'Nguyễn thị hue', 'hue@gmail.com', '$2y$10$TH.4tWELJI0vuGWFdP8.DelTAvwIJKOnzrA9U9bB4YVfqiy4U6odW', 'C:\\xampp\\tmp\\php6CBE.tmp', 2, 0),
(12, 'Hiệp Trần', 'hieptvh18@gmail.com', '$2y$10$QOoTVO9zj/uAeWK4tdzQseyqVvfEhprNLgNI4SSEy/CncoVbbuwwi', NULL, 1, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quizs`
--
ALTER TABLE `quizs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `student_quizs`
--
ALTER TABLE `student_quizs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `student_quiz_detail`
--
ALTER TABLE `student_quiz_detail`
  ADD PRIMARY KEY (`student_quiz_id`,`question_id`,`answer_id`) USING BTREE;

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `quizs`
--
ALTER TABLE `quizs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `student_quizs`
--
ALTER TABLE `student_quizs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
