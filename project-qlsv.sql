-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 16, 2022 lúc 11:29 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project-qlsv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `faculties`
--

CREATE TABLE `faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Jon Lang', '2022-08-28 19:44:25', '2022-08-28 19:44:25'),
(4, 'Mariane Waelchi', '2022-08-28 19:44:25', '2022-08-28 19:44:25'),
(5, 'Domenica Larkin', '2022-08-28 19:44:25', '2022-08-28 19:44:25'),
(6, 'Mr. Cordelia Hills V', '2022-08-28 19:44:25', '2022-08-28 19:44:25'),
(7, 'Saige Lueilwitz', '2022-08-28 19:44:25', '2022-08-28 19:44:25'),
(8, 'Dr. Jean Reichel I', '2022-08-28 19:44:25', '2022-08-28 19:44:25'),
(9, 'Mrs. Leanna Simonis', '2022-08-28 19:44:25', '2022-08-28 19:44:25'),
(10, 'Jazmyne Dietrich2', '2022-08-28 19:44:25', '2022-08-28 20:19:11'),
(15, 'HTML&CSS5', NULL, NULL),
(16, 'HTML&CSS5', NULL, NULL),
(17, 'HTML&CSS5', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, '19601a0a-3db4-4e2e-a4d1-6f9a60ef2fbf', 'database', 'default', '{\"uuid\":\"19601a0a-3db4-4e2e-a4d1-6f9a60ef2fbf\",\"displayName\":\"App\\\\Jobs\\\\HandleMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\HandleMail\",\"command\":\"O:19:\\\"App\\\\Jobs\\\\HandleMail\\\":2:{s:8:\\\"\\u0000*\\u0000email\\\";s:16:\\\"hieunt@gmail.com\\\";s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2022-09-02 01:35:38.611710\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 'ArgumentCountError: Too few arguments to function App\\Mail\\SendMail::__construct(), 0 passed in C:\\xampp\\htdocs\\quanlysinhvien\\app\\Jobs\\HandleMail.php on line 36 and exactly 1 expected in C:\\xampp\\htdocs\\quanlysinhvien\\app\\Mail\\SendMail.php:20\nStack trace:\n#0 C:\\xampp\\htdocs\\quanlysinhvien\\app\\Jobs\\HandleMail.php(36): App\\Mail\\SendMail->__construct()\n#1 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\HandleMail->handle()\n#2 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(651): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\HandleMail))\n#8 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\HandleMail))\n#9 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(123): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\HandleMail), false)\n#11 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\HandleMail))\n#12 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\HandleMail))\n#13 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(125): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(69): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\HandleMail))\n#15 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(425): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(375): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(173): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(150): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(134): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(651): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(139): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\symfony\\console\\Command\\Command.php(291): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(124): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\symfony\\console\\Application.php(998): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(102): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\quanlysinhvien\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}', '2022-09-01 18:35:38'),
(2, '3ea8dc69-a731-4017-b368-6b6c9c0cde50', 'database', 'default', '{\"uuid\":\"3ea8dc69-a731-4017-b368-6b6c9c0cde50\",\"displayName\":\"App\\\\Jobs\\\\HandleMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\HandleMail\",\"command\":\"O:19:\\\"App\\\\Jobs\\\\HandleMail\\\":2:{s:8:\\\"\\u0000*\\u0000email\\\";s:19:\\\"kpham2874@gmail.com\\\";s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2022-09-02 01:42:27.233065\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 'ArgumentCountError: Too few arguments to function App\\Mail\\SendMail::__construct(), 0 passed in C:\\xampp\\htdocs\\quanlysinhvien\\app\\Jobs\\HandleMail.php on line 36 and exactly 1 expected in C:\\xampp\\htdocs\\quanlysinhvien\\app\\Mail\\SendMail.php:20\nStack trace:\n#0 C:\\xampp\\htdocs\\quanlysinhvien\\app\\Jobs\\HandleMail.php(36): App\\Mail\\SendMail->__construct()\n#1 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\HandleMail->handle()\n#2 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(651): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\HandleMail))\n#8 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\HandleMail))\n#9 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(123): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\HandleMail), false)\n#11 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\HandleMail))\n#12 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\HandleMail))\n#13 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(125): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(69): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\HandleMail))\n#15 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(425): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(375): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(173): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(150): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(134): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(651): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(139): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\symfony\\console\\Command\\Command.php(291): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(124): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\symfony\\console\\Application.php(998): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(102): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\quanlysinhvien\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}', '2022-09-01 18:42:27'),
(3, 'c70d825c-ec60-482a-b949-e0df9455cb87', 'database', 'default', '{\"uuid\":\"c70d825c-ec60-482a-b949-e0df9455cb87\",\"displayName\":\"App\\\\Jobs\\\\HandleMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\HandleMail\",\"command\":\"O:19:\\\"App\\\\Jobs\\\\HandleMail\\\":2:{s:8:\\\"\\u0000*\\u0000email\\\";s:24:\\\"khanhpvph17641@gmail.com\\\";s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2022-09-02 01:49:57.353462\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 'ArgumentCountError: Too few arguments to function App\\Mail\\SendMail::__construct(), 0 passed in C:\\xampp\\htdocs\\quanlysinhvien\\app\\Jobs\\HandleMail.php on line 37 and exactly 1 expected in C:\\xampp\\htdocs\\quanlysinhvien\\app\\Mail\\SendMail.php:20\nStack trace:\n#0 C:\\xampp\\htdocs\\quanlysinhvien\\app\\Jobs\\HandleMail.php(37): App\\Mail\\SendMail->__construct()\n#1 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\HandleMail->handle()\n#2 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(651): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\HandleMail))\n#8 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\HandleMail))\n#9 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(123): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\HandleMail), false)\n#11 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\HandleMail))\n#12 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\HandleMail))\n#13 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(125): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(69): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\HandleMail))\n#15 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(425): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(375): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(173): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(150): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(134): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(651): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(139): Illuminate\\Container\\Container->call(Array)\n#27 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\symfony\\console\\Command\\Command.php(291): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(124): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\symfony\\console\\Application.php(998): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(102): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\quanlysinhvien\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\quanlysinhvien\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}', '2022-09-01 18:49:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_17_071424_create_faculties_table', 1),
(6, '2022_08_17_071436_create_subjects_table', 1),
(7, '2022_08_17_071446_create_students_table', 1),
(8, '2022_08_17_071503_create_student_subject_table', 1),
(9, '2022_08_25_023116_create_permission_tables', 1),
(10, '2022_09_02_013302_create_jobs_table', 2),
(12, '2022_09_02_153056_add_code_to_students_table', 3),
(13, '2022_09_04_144235_add_deleted_at_to_students_table', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 17),
(2, 'App\\Models\\User', 18),
(2, 'App\\Models\\User', 19),
(2, 'App\\Models\\User', 21),
(2, 'App\\Models\\User', 22),
(2, 'App\\Models\\User', 23),
(2, 'App\\Models\\User', 24),
(2, 'App\\Models\\User', 25),
(2, 'App\\Models\\User', 26),
(2, 'App\\Models\\User', 27),
(2, 'App\\Models\\User', 28),
(2, 'App\\Models\\User', 29),
(2, 'App\\Models\\User', 30),
(2, 'App\\Models\\User', 32),
(2, 'App\\Models\\User', 33),
(2, 'App\\Models\\User', 34),
(2, 'App\\Models\\User', 35),
(2, 'App\\Models\\User', 36),
(2, 'App\\Models\\User', 37),
(2, 'App\\Models\\User', 38),
(2, 'App\\Models\\User', 39),
(2, 'App\\Models\\User', 40),
(2, 'App\\Models\\User', 41),
(2, 'App\\Models\\User', 42),
(2, 'App\\Models\\User', 43);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'list', 'web', '2022-08-28 19:16:49', '2022-08-28 19:16:49'),
(2, 'create', 'web', '2022-08-28 19:16:49', '2022-08-28 19:16:49'),
(3, 'edit', 'web', '2022-08-28 19:16:49', '2022-08-28 19:16:49'),
(4, 'delete', 'web', '2022-08-28 19:16:49', '2022-08-28 19:16:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-08-28 19:17:38', '2022-08-28 19:17:38'),
(2, 'student', 'web', '2022-08-28 19:22:06', '2022-08-28 19:22:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `students`
--

INSERT INTO `students` (`id`, `user_id`, `faculty_id`, `name`, `email`, `avatar`, `phone`, `birthday`, `address`, `gender`, `created_at`, `updated_at`, `code`, `deleted_at`) VALUES
(17, 35, 1, 'Nguyễn Trung Hiếu', 'hieuntph17602@fpt.edu.vn', 'images/users/_zVilxlsLWnK8htqtyEDIPktVTowAHmGH37MhxLIj.png', '0968104762', '2002-09-05', 'Ha Noi', 1, '2022-09-04 20:09:20', '2022-09-13 04:03:08', 'IcKWV', NULL),
(18, 36, 1, 'Phạm Văn Khánh', 'khanhpvph17641@fpt.edu.vn', 'images/students/Phạm Văn Khánh_T5wx0WCn236nh58fHlZBAyqaR1SPlv4bduoIchwk.png', '0584677817', '2022-09-06', 'Ha Noi', 1, '2022-09-05 23:29:57', '2022-09-05 23:29:57', 'LGHDQ', NULL),
(19, 37, 7, 'Nguyễn Trung Hiệp', 'hiepnt@gmail.com', 'images/students/Phạm Văn Khánh_T5wx0WCn236nh58fHlZBAyqaR1SPlv4bduoIchwk.png', '0584677815', '2022-09-07', 'Ha Noi', 1, '2022-09-06 23:22:07', '2022-09-07 19:37:04', 'NHXSU', NULL),
(20, 43, 7, 'Lê Văn Huy', 'uewhyytsjunwltlnhb@nthrw.com', 'images/students/Phạm Văn Khánh_T5wx0WCn236nh58fHlZBAyqaR1SPlv4bduoIchwk.png', '', '0000-00-00', '', 0, NULL, '2022-09-08 19:58:09', '', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student_subject`
--

CREATE TABLE `student_subject` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `mark` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `student_subject`
--

INSERT INTO `student_subject` (`id`, `student_id`, `subject_id`, `mark`, `created_at`, `updated_at`) VALUES
(10, 17, 5, 1.00, NULL, NULL),
(13, 18, 7, 9.00, NULL, NULL),
(14, 18, 5, 10.00, NULL, NULL),
(16, 17, 9, 10.00, NULL, NULL),
(17, 19, 9, 3.00, NULL, NULL),
(18, 19, 5, 7.00, NULL, NULL),
(19, 19, 7, 2.00, NULL, NULL),
(20, 19, 8, 7.00, NULL, NULL),
(25, 17, 8, 5.50, NULL, NULL),
(28, 18, 9, 1.00, NULL, NULL),
(30, 17, 16, 2.00, NULL, NULL),
(31, 17, 7, 1.00, NULL, NULL),
(32, 19, 16, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'HTML&CSS', '2022-09-03 13:42:26', '2022-09-03 13:42:26'),
(7, 'Laravel', '2022-09-05 20:45:59', '2022-09-05 20:45:59'),
(8, 'Huyaccc', '2022-09-06 01:57:44', '2022-09-06 01:57:44'),
(9, 'Tesst bugho', '2022-09-07 06:19:46', '2022-09-07 06:19:49'),
(16, '14444444', '2022-09-15 03:14:05', '2022-09-15 03:14:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', NULL, '$2y$10$IKc50A9.j7v/hElQ8uoa5.K0cvKei20c2Ptr0FFneUBHiJz/QcJFO', NULL, '2022-08-28 19:17:38', '2022-08-29 03:27:07'),
(34, 'Nguyễn Trung Hiếu', 'hieuntph17602', NULL, '$2y$10$M7uG8LcvrE2S6857/RIYUenWp5uQtReMI38opFuP.skKrfBmO2nPK', NULL, '2022-09-04 20:08:39', '2022-09-04 20:08:39'),
(35, 'Nguyễn Trung Hiếu', 'hieuntph17602@fpt.edu.vn', NULL, '$2y$10$s0au1fwFZ6XU6w6panZweOd/0RYTnO3rtYKlMdQtGg1uK.Y0V.8RW', NULL, '2022-09-04 20:09:20', '2022-09-04 20:09:20'),
(36, 'khanhpvph17641@gmail.com', 'khanhpvph17641@gmail.com', NULL, '$2y$10$KmE8YGe1A4wHs6Hyq7hL2eDLnBpVnmTXKdF4bJqv7hOTdlPriLmPO', NULL, '2022-09-05 23:29:57', '2022-09-05 23:29:57'),
(37, 'Nguyễn Trung Hiệp', 'hiepnt@gmail.com', NULL, '$2y$10$1VM9xglHkW9Q6PJJhJo55.5DjiQePk6twG2szQWPjFdSC/O597yjq', NULL, '2022-09-06 23:22:07', '2022-09-06 23:22:07'),
(38, 'Nguyễn Trung Hiếu', 'hieunt@gmail.com', NULL, '$2y$10$WUc5MrDLCqBbpTkQ01Pr2uhBZhWpCfUQKL4T1iGeWswXJgphKHeb.', NULL, '2022-09-07 01:34:58', '2022-09-07 01:34:58'),
(43, 'Lê Văn Huy', 'huylv@gmail.com', NULL, '$2y$10$uuaCgf9YF/DMAdscCQAcnOf3O8OIuvOh9WMPZKYBlB2iESaQecyqm', NULL, '2022-09-08 01:51:50', '2022-09-08 01:51:50');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Chỉ mục cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_code_unique` (`code`),
  ADD KEY `students_user_id_foreign` (`user_id`),
  ADD KEY `students_faculty_id_foreign` (`faculty_id`);

--
-- Chỉ mục cho bảng `student_subject`
--
ALTER TABLE `student_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_subject_student_id_foreign` (`student_id`),
  ADD KEY `student_subject_subject_id_foreign` (`subject_id`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `student_subject`
--
ALTER TABLE `student_subject`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `student_subject`
--
ALTER TABLE `student_subject`
  ADD CONSTRAINT `student_subject_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_subject_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
