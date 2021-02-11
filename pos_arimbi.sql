-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Sep 2020 pada 04.00
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_arimbi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `slug`, `created_at`, `updated_at`) VALUES
(3, 'minuman', NULL, 'minuman', '2020-09-10 03:53:47', '2020-09-10 03:53:47'),
(4, 'makanan', NULL, 'makanan', '2020-09-10 03:54:27', '2020-09-10 03:54:27'),
(5, 'coffe', 3, 'coffe', '2020-09-10 03:54:41', '2020-09-10 03:54:41'),
(6, 'cemilan', 4, 'cemilan', '2020-09-10 03:54:52', '2020-09-10 03:54:52'),
(7, 'non-coffe', 3, 'non-coffe', '2020-09-10 03:59:28', '2020-09-10 03:59:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `activate_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `phone_number`, `address`, `status`, `activate_token`, `created_at`, `updated_at`) VALUES
(7, 'ahmad', 'amkomarudin7@gmail.com', '$2y$10$rmJA3.z0Cv.iowgtpsDIb.jshA0U967eyOY6EYzOd9FLiw9Tb2g7W', '08921329', 'askjdnaskjd', 1, NULL, '2020-09-15 08:01:28', '2020-09-15 08:05:13'),
(8, 'hgh', 'ipang@gmail.com', '$2y$10$nPHDDxkEZxKJm4o/zLOVye8NkLcNQdPhe9XY5ZxotFR1MawmbzEly', '080989', 'ghfhf', 0, 'uR3uuiRSc3Hkt64i67exITHUdifYYz', '2020-09-17 04:47:45', '2020-09-17 04:47:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_07_25_085647_create_categories_table', 1),
(5, '2020_07_25_085729_create_products_table', 1),
(6, '2020_07_25_085735_create_customers_table', 1),
(7, '2020_07_25_085741_create_orders_table', 1),
(8, '2020_07_25_085746_create_order_details_table', 1),
(9, '2020_07_25_092707_add_field_status_to_products_table', 2),
(10, '2020_07_25_111217_add_field_subtotal_to_orders_table', 3),
(11, '2020_07_25_123841_add_field_password_to_customers_table', 4),
(12, '2020_07_25_123919_add_field_active_token_to_customers_table', 4),
(13, '2020_07_25_133242_add_field_status_to_orders_table', 5),
(14, '2020_07_25_135721_create_payments_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` int(11) NOT NULL DEFAULT 1,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0: new, 1: confirm, 2: process, 3: shipping, 4: done',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `invoice`, `customer_id`, `customer_name`, `customer_phone`, `customer_address`, `subtotal`, `status`, `created_at`, `updated_at`) VALUES
(5, '24fh-1596192826', '3', 'ahmadfff', '2039', 'ssads', 21321, '4', '2020-07-31 03:53:46', '2020-07-31 03:53:46'),
(6, 'PWGn-1597898397', '5', 'ali', '0899089797', 'sakdmkasmd', 200000, '0', '2020-08-19 21:39:57', '2020-08-19 21:39:57'),
(7, 'kQae-1599836139', '6', 'ahmad', '089639432', 'subang', 103000, '0', '2020-09-11 07:55:39', '2020-09-11 07:55:39'),
(8, 'nA9v-1600182088', '7', 'ahmad', '08921329', 'askjdnaskjd', 30000, '0', '2020-09-15 08:01:28', '2020-09-15 08:01:28'),
(9, 'hdnU-1600343265', '8', 'hgh', '080989', 'ghfhf', 13000, '0', '2020-09-17 04:47:45', '2020-09-17 04:47:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `qty`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 21321, 2, '2020-07-25 06:06:45', '2020-07-25 06:06:45'),
(6, 5, 2, 21321, 1, '2020-07-31 03:53:46', '2020-07-31 03:53:46'),
(7, 6, 3, 200000, 1, '2020-08-19 21:39:57', '2020-08-19 21:39:57'),
(8, 7, 9, 17000, 3, '2020-09-11 07:55:39', '2020-09-11 07:55:39'),
(9, 7, 8, 13000, 4, '2020-09-11 07:55:39', '2020-09-11 07:55:39'),
(10, 8, 9, 17000, 1, '2020-09-15 08:01:28', '2020-09-15 08:01:28'),
(11, 8, 8, 13000, 1, '2020-09-15 08:01:28', '2020-09-15 08:01:28'),
(12, 9, 8, 13000, 1, '2020-09-17 04:47:45', '2020-09-17 04:47:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transfer_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transfer_date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `name`, `transfer_to`, `transfer_date`, `amount`, `proof`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'ahmad', 'BCA - 1234567', '2020-07-27', 42642, '1595689132.jpg', 1, '2020-07-25 07:58:52', '2020-07-25 08:00:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `category_id`, `description`, `image`, `price`, `status`, `created_at`, `updated_at`) VALUES
(6, 'cappucino', 'cappucino', 5, '<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur,&nbsp;adipisicing&nbsp;elit.&nbsp;Ex,&nbsp;dolores&nbsp;eaque!&nbsp;Nesciunt&nbsp;hic&nbsp;similique&nbsp;sequi&nbsp;quo&nbsp;repellendus&nbsp;consectetur&nbsp;nemo&nbsp;praesentium&nbsp;esse&nbsp;autem&nbsp;temporibus!&nbsp;Odit&nbsp;omnis,&nbsp;iusto&nbsp;repellat&nbsp;tenetur&nbsp;sunt&nbsp;quia!</p>', '1599735338cappucino.png', 17000, 1, '2020-09-10 03:55:38', '2020-09-10 03:55:38'),
(7, 'kentang goreng', 'kentang-goreng', 6, '<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur,&nbsp;adipisicing&nbsp;elit.&nbsp;Ex,&nbsp;dolores&nbsp;eaque!&nbsp;Nesciunt&nbsp;hic&nbsp;similique&nbsp;sequi&nbsp;quo&nbsp;repellendus&nbsp;consectetur&nbsp;nemo&nbsp;praesentium&nbsp;esse&nbsp;autem&nbsp;temporibus!&nbsp;Odit&nbsp;omnis,&nbsp;iusto&nbsp;repellat&nbsp;tenetur&nbsp;sunt&nbsp;quia!</p>', '1599735377kentang-goreng.png', 15000, 1, '2020-09-10 03:56:17', '2020-09-10 03:56:17'),
(8, 'Tubruk', 'tubruk', 5, '<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur,&nbsp;adipisicing&nbsp;elit.&nbsp;Ex,&nbsp;dolores&nbsp;eaque!&nbsp;Nesciunt&nbsp;hic&nbsp;similique&nbsp;sequi&nbsp;quo&nbsp;repellendus&nbsp;consectetur&nbsp;nemo&nbsp;praesentium&nbsp;esse&nbsp;autem&nbsp;temporibus!&nbsp;Odit&nbsp;omnis,&nbsp;iusto&nbsp;repellat&nbsp;tenetur&nbsp;sunt&nbsp;quia!</p>', '1599735491tubruk.png', 13000, 1, '2020-09-10 03:58:11', '2020-09-10 03:58:11'),
(9, 'red-velvet', 'red-velvet', 7, '<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur,&nbsp;adipisicing&nbsp;elit.&nbsp;Ex,&nbsp;dolores&nbsp;eaque!&nbsp;Nesciunt&nbsp;hic&nbsp;similique&nbsp;sequi&nbsp;quo&nbsp;repellendus&nbsp;consectetur&nbsp;nemo&nbsp;praesentium&nbsp;esse&nbsp;autem&nbsp;temporibus!&nbsp;Odit&nbsp;omnis,&nbsp;iusto&nbsp;repellat&nbsp;tenetur&nbsp;sunt&nbsp;quia!</p>', '1599735607red-velvet.png', 17000, 1, '2020-09-10 04:00:07', '2020-09-10 04:00:07'),
(10, 'taro', 'taro', 7, '<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet,&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Ipsum&nbsp;vel&nbsp;porro&nbsp;dolores&nbsp;esse&nbsp;quis&nbsp;non&nbsp;fuga&nbsp;quasi&nbsp;eius&nbsp;sapiente&nbsp;modi&nbsp;aliquam&nbsp;cupiditate&nbsp;sunt&nbsp;deleniti&nbsp;officiis&nbsp;impedit&nbsp;nemo,&nbsp;id&nbsp;consequatur&nbsp;numquam!</p>', '1599740629taro.png', 17000, 1, '2020-09-10 05:23:49', '2020-09-10 05:23:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Arimbi', 'admin@arimbi.id', NULL, '$2y$10$xgNImd8R147DoNeoWKDDluEc9ginp4gjkomguXr2PXDHeMn9vEwxm', NULL, '2020-07-25 02:15:17', '2020-07-25 02:15:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_invoice_unique` (`invoice`);

--
-- Indeks untuk tabel `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
