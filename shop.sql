-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 08 2020 г., 19:03
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Футболки'),
(2, 'Штаны'),
(3, 'Обувь'),
(4, 'Головные уборы'),
(5, 'Кроссовки'),
(6, 'Спортивные штаны');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `products` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `address` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `products`, `created_at`, `address`, `status`) VALUES
(65, 44, '{\"products\":[{\"product_id\":\"8\",\"product_cost\":\"100\",\"count\":2,\"costs\":200},{\"product_id\":\"9\",\"product_cost\":\"100\",\"count\":3,\"costs\":300}],\"products_count\":5,\"total_costs\":500}', '2020-03-08 17:33:16', 'Ukraine, Sumy, Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09', 'NEW'),
(66, 42, '{\"products\":[{\"product_id\":\"8\",\"product_cost\":\"100\",\"count\":5,\"costs\":500}],\"products_count\":5,\"total_costs\":500}', '2020-03-08 17:34:50', 'Ukraine, Sumy, Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09', 'NEW'),
(67, 42, '{\"products\":[{\"product_id\":\"9\",\"product_cost\":\"100\",\"count\":2,\"costs\":200},{\"product_id\":\"19\",\"product_cost\":\"100\",\"count\":2,\"costs\":200},{\"product_id\":\"10\",\"product_cost\":\"100\",\"count\":2,\"costs\":200}],\"products_count\":6,\"total_costs\":600}', '2020-03-08 17:35:39', 'Ukraine, Sumy, Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09', 'NEW'),
(68, 42, '{\"products\":[{\"product_id\":\"9\",\"product_cost\":\"100\",\"count\":3,\"costs\":300},{\"product_id\":\"18\",\"product_cost\":\"100\",\"count\":1,\"costs\":\"100\"},{\"product_id\":\"19\",\"product_cost\":\"100\",\"count\":1,\"costs\":\"100\"},{\"product_id\":\"1\",\"product_cost\":\"100\",\"count\":3,\"costs\":300}],\"products_count\":8,\"total_costs\":800}', '2020-03-08 17:36:38', 'Ukraine, Sumy, Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09', 'NEW'),
(69, 45, '{\"products\":[{\"product_id\":\"1\",\"product_cost\":\"100\",\"count\":4,\"costs\":400}],\"products_count\":4,\"total_costs\":400}', '2020-03-08 19:05:29', 'Ukraine, Sumy, Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09', 'Processing'),
(70, 42, '{\"products\":[{\"product_id\":\"1\",\"product_cost\":\"100\",\"count\":5,\"costs\":500}],\"products_count\":5,\"total_costs\":500}', '2020-03-08 19:50:03', 'Ukraine, Sumy, Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09', 'NEW');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cost` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `content`, `category_id`, `image`, `cost`) VALUES
(1, 'Худи1', 'Крутая худи', 'Очень крутая худи', 1, '', '100'),
(8, 'Штаны', 'Обычные штаны', 'Те ещё штанишки, брюки брючишки', 2, '', '100'),
(9, 'Кепка черная', 'Кепка', 'Необычная кепка', 4, '', '100'),
(10, 'Штаны зелёные', 'Штаны', 'Штаны', 6, '', '100'),
(18, 'Худи2', 'Крутая худи', 'Очень крутая худи', 1, '', '100'),
(19, 'Штаны', 'Обычные штаны', 'Те ещё штанишки, брюки брючишки', 2, '', '100'),
(20, 'Кепка черная', 'Кепка', 'Необычная кепка', 4, '', '100'),
(21, 'Штаны зелёные', 'Штаны', 'Штаны', 6, '', '100'),
(22, 'Худи3', 'Крутая худи', 'Очень крутая худи', 1, '', '100'),
(23, 'Штаны', 'Обычные штаны', 'Те ещё штанишки, брюки брючишки', 2, '', '100'),
(24, 'Кепка черная', 'Кепка', 'Необычная кепка', 4, '', '100'),
(25, 'Штаны зелёные', 'Штаны', 'Штаны', 6, '', '100'),
(26, 'Худи4', 'Крутая худи', 'Очень крутая худи', 1, '', '100'),
(27, 'Штаны', 'Обычные штаны', 'Те ещё штанишки, брюки брючишки', 2, '', '100'),
(28, 'Кепка черная', 'Кепка', 'Необычная кепка', 4, '', '100'),
(29, 'Штаны зелёные', 'Штаны', 'Штаны', 6, '', '100'),
(30, 'Худи5', 'Крутая худи', 'Очень крутая худи', 1, '', '100'),
(31, 'Штаны', 'Обычные штаны', 'Те ещё штанишки, брюки брючишки', 2, '', '100'),
(32, 'Кепка черная', 'Кепка', 'Необычная кепка', 4, '', '100'),
(33, 'Штаны зелёные', 'Штаны', 'Штаны', 6, '', '100'),
(34, 'Худи6', 'Крутая худи', 'Очень крутая худи', 1, '', '100'),
(35, 'Штаны', 'Обычные штаны', 'Те ещё штанишки, брюки брючишки', 2, '', '100'),
(36, 'Кепка черная', 'Кепка', 'Необычная кепка', 4, '', '100'),
(37, 'Штаны зелёные', 'Штаны', 'Штаны', 6, '', '100'),
(38, 'Худи7', 'Крутая худи', 'Очень крутая худи', 1, '', '100'),
(39, 'Штаны', 'Обычные штаны', 'Те ещё штанишки, брюки брючишки', 2, '', '100'),
(40, 'Кепка черная', 'Кепка', 'Необычная кепка', 4, '', '100'),
(41, 'Штаны зелёные', 'Штаны', 'Штаны', 6, '', '100'),
(42, 'Худи8', 'Крутая худи', 'Очень крутая худи', 1, '', '100'),
(43, 'Штаны', 'Обычные штаны', 'Те ещё штанишки, брюки брючишки', 2, '', '100'),
(44, 'Кепка черная', 'Кепка', 'Необычная кепка', 4, '', '100'),
(45, 'Штаны зелёные', 'Штаны', 'Штаны', 6, '', '100');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_mail` varchar(255) NOT NULL,
  `verifided` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `phone`, `email`, `password`, `confirm_mail`, `verifided`) VALUES
(42, 'piter', '111-111-111', 'piter@pit.com', '827ccb0eea8a706c4c34a16891f84e7b', 'onZYijREVPwfyWDdY0VU', 1),
(44, 'John Doe', '555-000-555', 'John@Doe.com', '', '', 0),
(45, 'AlexMo', '', 'AlexMo@mo.com', '827ccb0eea8a706c4c34a16891f84e7b', 'iYBapqFcW6LYKdg1gtmm', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
