-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2021 a las 12:38:35
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `puntoventa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boxes`
--

CREATE TABLE `boxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo` decimal(8,2) NOT NULL DEFAULT 0.00,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `businesses`
--

CREATE TABLE `businesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rfc` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `businesses`
--

INSERT INTO `businesses` (`id`, `name`, `description`, `rfc`, `adress`, `phone`, `email`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Checos interprise', 'Reciclado de materiales', 'xxxx-010237-x12', 'Dirección conocida', '443-111-1111', 'correo@correo.com', 'logo.png', '2021-05-04 10:20:21', '2021-05-04 10:20:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rfc_number` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepts`
--

CREATE TABLE `concepts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `concepto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('Ingreso','Egreso') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `measures`
--

CREATE TABLE `measures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medida` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `simbolo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_04_01_185032_create_measures_table', 1),
(7, '2021_04_01_185056_create_categories_table', 1),
(8, '2021_04_01_185455_create_providers_table', 1),
(9, '2021_04_01_185611_create_products_table', 1),
(10, '2021_04_01_185707_create_clients_table', 1),
(11, '2021_04_01_185752_create_purchases_table', 1),
(12, '2021_04_01_190201_create_purchase_details_table', 1),
(13, '2021_04_01_190306_create_sales_table', 1),
(14, '2021_04_01_190420_create_sale_details_table', 1),
(15, '2021_04_01_194744_create_productgables_table', 1),
(16, '2021_04_02_002911_create_sessions_table', 1),
(17, '2021_04_04_212109_create_businesses_table', 1),
(18, '2021_04_04_212317_create_printers_table', 1),
(19, '2021_04_05_004830_create_permission_tables', 1),
(20, '2021_04_10_050550_create_boxes_table', 1),
(21, '2021_04_10_050824_create_concepts_table', 1),
(22, '2021_04_10_050856_create_moves_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moves`
--

CREATE TABLE `moves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha_mov` datetime NOT NULL,
  `detalle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `importe` decimal(8,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conciliado` tinyint(4) NOT NULL DEFAULT 0,
  `tipo` enum('Ingreso','Egreso') COLLATE utf8mb4_unicode_ci NOT NULL,
  `box_id` bigint(20) UNSIGNED NOT NULL,
  `concept_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Disparadores `moves`
--
DELIMITER $$
CREATE TRIGGER `MOVES_AD` AFTER DELETE ON `moves` FOR EACH ROW BEGIN
        IF OLD.tipo = 'INGRESO' THEN
            UPDATE
                boxes
            SET
                saldo = saldo -OLD.importe
            WHERE
                boxes.id = OLD.box_id;
        ELSEIF OLD.tipo = 'EGRESO' THEN
            UPDATE
                boxes
            SET
                saldo = saldo + OLD.importe
            WHERE
                boxes.id = OLD.box_id;
        END IF;

    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `MOVES_AI` AFTER INSERT ON `moves` FOR EACH ROW BEGIN
        IF NEW.tipo = 'INGRESO' THEN
            UPDATE
                boxes
            SET
                saldo = saldo + NEW.importe
            WHERE
                boxes.id = NEW.box_id;
        ELSEIF NEW.tipo = 'EGRESO' THEN
            UPDATE
                boxes
            SET
                saldo = saldo - NEW.importe
            WHERE
                boxes.id = NEW.box_id;
        END IF;

    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `MOVES_AU` AFTER UPDATE ON `moves` FOR EACH ROW BEGIN
        IF OLD.tipo = 'INGRESO' AND NEW.tipo = 'INGRESO' THEN
            UPDATE
                boxes
            SET
                saldo = saldo -OLD.importe + NEW.importe
            WHERE
                boxes.id = NEW.box_id;
        ELSEIF OLD.tipo = 'INGRESO' AND NEW.tipo = 'EGRESO' THEN
            UPDATE
                boxes
            SET
                saldo = saldo -OLD.importe - NEW.importe
            WHERE
                boxes.id = NEW.box_id;
        ELSEIF OLD.tipo = 'EGRESO'  AND NEW.tipo = 'EGRESO' THEN
            UPDATE
                boxes
            SET
                saldo = saldo + OLD.importe - NEW.importe
            WHERE
                boxes.id = NEW.box_id;
        ELSEIF OLD.tipo = 'EGRESO'  AND NEW.tipo = 'INGRESO' THEN
            UPDATE
                boxes
            SET
                saldo = saldo + OLD.importe + NEW.importe
            WHERE
                boxes.id = NEW.box_id;
        END IF;

    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'users.index', 'Ver listado de usuarios', 'web', '2021-05-04 10:17:37', '2021-05-04 10:17:37'),
(2, 'users.edit', 'Editar un usuario', 'web', '2021-05-04 10:17:37', '2021-05-04 10:17:37'),
(3, 'users.update', 'Actualizar un usuario', 'web', '2021-05-04 10:17:42', '2021-05-04 10:17:42'),
(4, 'users.create', 'Crear un usuario', 'web', '2021-05-04 10:17:43', '2021-05-04 10:17:43'),
(5, 'users.destroy', 'Eliminar un usuario', 'web', '2021-05-04 10:17:43', '2021-05-04 10:17:43'),
(6, 'users.show', 'Ver detalles de un usuario', 'web', '2021-05-04 10:17:43', '2021-05-04 10:17:43'),
(7, 'users.pdfUsers', 'Generar PDF de usuarios', 'web', '2021-05-04 10:17:43', '2021-05-04 10:17:43'),
(8, 'users.export', 'Exportar Excel de usuarios', 'web', '2021-05-04 10:17:48', '2021-05-04 10:17:48'),
(9, 'roles.index', 'Ver listado de roles', 'web', '2021-05-04 10:17:48', '2021-05-04 10:17:48'),
(10, 'roles.edit', 'Editar un rol', 'web', '2021-05-04 10:17:48', '2021-05-04 10:17:48'),
(11, 'roles.update', 'Actualizar un rol', 'web', '2021-05-04 10:17:53', '2021-05-04 10:17:53'),
(12, 'roles.create', 'Crear un rol', 'web', '2021-05-04 10:17:54', '2021-05-04 10:17:54'),
(13, 'roles.destroy', 'Eliminar un rol', 'web', '2021-05-04 10:17:54', '2021-05-04 10:17:54'),
(14, 'roles.show', 'Ver detalles de un rol', 'web', '2021-05-04 10:17:54', '2021-05-04 10:17:54'),
(15, 'roles.pdfRoles', 'Generar PDF de roles', 'web', '2021-05-04 10:17:54', '2021-05-04 10:17:54'),
(16, 'roles.export', 'Exportar Excel de roles', 'web', '2021-05-04 10:17:54', '2021-05-04 10:17:54'),
(17, 'categories.index', 'Ver listado de categorías', 'web', '2021-05-04 10:17:54', '2021-05-04 10:17:54'),
(18, 'categories.edit', 'Editar una categoría', 'web', '2021-05-04 10:17:59', '2021-05-04 10:17:59'),
(19, 'categories.update', 'Actualizar una categoría', 'web', '2021-05-04 10:17:59', '2021-05-04 10:17:59'),
(20, 'categories.create', 'Crear una categoría', 'web', '2021-05-04 10:18:00', '2021-05-04 10:18:00'),
(21, 'categories.destroy', 'Eliminar una categoría', 'web', '2021-05-04 10:18:00', '2021-05-04 10:18:00'),
(22, 'categories.show', 'Ver detalles de una categoría', 'web', '2021-05-04 10:18:00', '2021-05-04 10:18:00'),
(23, 'categories.pdfCategories', 'Generar PDF de categorías', 'web', '2021-05-04 10:18:05', '2021-05-04 10:18:05'),
(24, 'categories.export', 'Exportar Excel de categorías', 'web', '2021-05-04 10:18:05', '2021-05-04 10:18:05'),
(25, 'clients.index', 'Ver listado de clientes', 'web', '2021-05-04 10:18:05', '2021-05-04 10:18:05'),
(26, 'clients.edit', 'Editar un cliente', 'web', '2021-05-04 10:18:05', '2021-05-04 10:18:05'),
(27, 'clients.update', 'Actualizar un cliente', 'web', '2021-05-04 10:18:05', '2021-05-04 10:18:05'),
(28, 'clients.create', 'Crear un cliente', 'web', '2021-05-04 10:18:11', '2021-05-04 10:18:11'),
(29, 'clients.destroy', 'Eliminar un cliente', 'web', '2021-05-04 10:18:11', '2021-05-04 10:18:11'),
(30, 'clients.show', 'Mostrar detalles de un cliente', 'web', '2021-05-04 10:18:11', '2021-05-04 10:18:11'),
(31, 'clients.pdfClients', 'Generar PDF de clientes', 'web', '2021-05-04 10:18:11', '2021-05-04 10:18:11'),
(32, 'clients.export', 'Exportar Excel de clientes', 'web', '2021-05-04 10:18:11', '2021-05-04 10:18:11'),
(33, 'products.index', 'Ver listado de productos', 'web', '2021-05-04 10:18:26', '2021-05-04 10:18:26'),
(34, 'products.edit', 'Editar un producto', 'web', '2021-05-04 10:18:36', '2021-05-04 10:18:36'),
(35, 'products.update', 'Actualizar un producto', 'web', '2021-05-04 10:18:46', '2021-05-04 10:18:46'),
(36, 'products.create', 'Crear un producto', 'web', '2021-05-04 10:18:48', '2021-05-04 10:18:48'),
(37, 'products.destroy', 'Eliminar un producto', 'web', '2021-05-04 10:18:49', '2021-05-04 10:18:49'),
(38, 'products.show', 'Mostrar detalles de un producto', 'web', '2021-05-04 10:18:49', '2021-05-04 10:18:49'),
(39, 'product.file', 'Obtener imagen de un producto', 'web', '2021-05-04 10:18:49', '2021-05-04 10:18:49'),
(40, 'products.pdfProducts', 'Generar PDF de productos', 'web', '2021-05-04 10:18:49', '2021-05-04 10:18:49'),
(41, 'products.export', 'Exportar Excel de productos', 'web', '2021-05-04 10:18:49', '2021-05-04 10:18:49'),
(42, 'providers.index', 'Ver listado de proveedors', 'web', '2021-05-04 10:18:49', '2021-05-04 10:18:49'),
(43, 'providers.edit', 'Editar un proveedor', 'web', '2021-05-04 10:18:50', '2021-05-04 10:18:50'),
(44, 'providers.update', 'Actualizar un proveedor', 'web', '2021-05-04 10:18:50', '2021-05-04 10:18:50'),
(45, 'providers.create', 'Crear un proveedor', 'web', '2021-05-04 10:18:50', '2021-05-04 10:18:50'),
(46, 'providers.destroy', 'Eliminar un proveedor', 'web', '2021-05-04 10:18:50', '2021-05-04 10:18:50'),
(47, 'providers.show', 'Mostrar detalle de un proveedor', 'web', '2021-05-04 10:18:55', '2021-05-04 10:18:55'),
(48, 'providers.pdfProviders', 'Generar PDF de proveedores', 'web', '2021-05-04 10:18:55', '2021-05-04 10:18:55'),
(49, 'providers.export', 'Exportar Excel de proveedores', 'web', '2021-05-04 10:18:55', '2021-05-04 10:18:55'),
(50, 'purchases.index', 'Ver listado de compras', 'web', '2021-05-04 10:18:56', '2021-05-04 10:18:56'),
(51, 'purchases.edit', 'Editar una compra', 'web', '2021-05-04 10:18:56', '2021-05-04 10:18:56'),
(52, 'purchases.update', 'Actualizar una compra', 'web', '2021-05-04 10:19:01', '2021-05-04 10:19:01'),
(53, 'purchases.create', 'Crear una compra', 'web', '2021-05-04 10:19:01', '2021-05-04 10:19:01'),
(54, 'purchases.destroy', 'Eliminar una compra', 'web', '2021-05-04 10:19:01', '2021-05-04 10:19:01'),
(55, 'purchases.show', 'Mostrar detalles de una compra', 'web', '2021-05-04 10:19:01', '2021-05-04 10:19:01'),
(56, 'purchases.pdf_detalle', 'Generar el pdf de una compra', 'web', '2021-05-04 10:19:01', '2021-05-04 10:19:01'),
(57, 'purchases.excel_detalle', 'Generar el detalle de una compra en excel', 'web', '2021-05-04 10:19:01', '2021-05-04 10:19:01'),
(58, 'purchases.pdfPurchases', 'Generar PDF de compras', 'web', '2021-05-04 10:19:07', '2021-05-04 10:19:07'),
(59, 'purchases.export', 'Exportar Excel de compras', 'web', '2021-05-04 10:19:07', '2021-05-04 10:19:07'),
(60, 'sales.pdfSales', 'Generar PDF de ventas', 'web', '2021-05-04 10:19:07', '2021-05-04 10:19:07'),
(61, 'sales.export', 'Exportar Excel de ventas', 'web', '2021-05-04 10:19:07', '2021-05-04 10:19:07'),
(62, 'sales.index', 'Ver listado de ventas', 'web', '2021-05-04 10:19:07', '2021-05-04 10:19:07'),
(63, 'sales.edit', 'Editar una venta', 'web', '2021-05-04 10:19:12', '2021-05-04 10:19:12'),
(64, 'sales.update', 'Actualizar una venta', 'web', '2021-05-04 10:19:12', '2021-05-04 10:19:12'),
(65, 'sales.create', 'Crear una venta', 'web', '2021-05-04 10:19:13', '2021-05-04 10:19:13'),
(66, 'sales.destroy', 'Eliminar una venta', 'web', '2021-05-04 10:19:13', '2021-05-04 10:19:13'),
(67, 'sales.show', 'Mostrar detalles de una venta', 'web', '2021-05-04 10:19:18', '2021-05-04 10:19:18'),
(68, 'sales.pdf_detalle', 'Generar el pdf de una venta', 'web', '2021-05-04 10:19:18', '2021-05-04 10:19:18'),
(69, 'sales.excel_detalle', 'Generar el detalle de una venta en excel', 'web', '2021-05-04 10:19:18', '2021-05-04 10:19:18'),
(70, 'sales.print', 'Imprimir tickets de venta', 'web', '2021-05-04 10:19:18', '2021-05-04 10:19:18'),
(71, 'business.index', 'Configurar datos del negocio', 'web', '2021-05-04 10:19:18', '2021-05-04 10:19:18'),
(72, 'business.update', 'Actualizar datos del negocio', 'web', '2021-05-04 10:19:18', '2021-05-04 10:19:18'),
(73, 'printer.index', 'Configurar datos de la impresora', 'web', '2021-05-04 10:19:28', '2021-05-04 10:19:28'),
(74, 'printer.update', 'Actualizar datos de la impresora', 'web', '2021-05-04 10:19:43', '2021-05-04 10:19:43'),
(75, 'purchases.upload', 'Subir imagen de una compra', 'web', '2021-05-04 10:19:53', '2021-05-04 10:19:53'),
(76, 'products.status', 'Modificar el status de un producto', 'web', '2021-05-04 10:19:58', '2021-05-04 10:19:58'),
(77, 'purchases.status', 'Modificar el status de una compra', 'web', '2021-05-04 10:20:08', '2021-05-04 10:20:08'),
(78, 'sales.status', 'Modificar el status de una venta', 'web', '2021-05-04 10:20:08', '2021-05-04 10:20:08'),
(79, 'sales.reports.day', 'Generar reporte de ventas del día', 'web', '2021-05-04 10:20:08', '2021-05-04 10:20:08'),
(80, 'sales.reports.date', 'Generar reporte de ventas por rango de fecha', 'web', '2021-05-04 10:20:08', '2021-05-04 10:20:08'),
(81, 'sales.report.result', 'Generar reportes de ventas', 'web', '2021-05-04 10:20:08', '2021-05-04 10:20:08'),
(82, 'purchases.reports.purchases.day', 'Generar reporte de compras del día', 'web', '2021-05-04 10:20:09', '2021-05-04 10:20:09'),
(83, 'purchases.reports.purchases.date', 'Generar reporte de compras por rango de fecha', 'web', '2021-05-04 10:20:09', '2021-05-04 10:20:09'),
(84, 'purchases.report.purchases.result', 'Generar reportes de compras', 'web', '2021-05-04 10:20:09', '2021-05-04 10:20:09'),
(85, 'purchases.print', 'Imprimir compra en impresora térmica', 'web', '2021-05-04 10:20:09', '2021-05-04 10:20:09'),
(86, 'boxes.index', 'Ver listado de cajas', 'web', '2021-05-04 10:20:10', '2021-05-04 10:20:10'),
(87, 'boxes.edit', 'Editar una caja', 'web', '2021-05-04 10:20:10', '2021-05-04 10:20:10'),
(88, 'boxes.update', 'Actualizar una caja', 'web', '2021-05-04 10:20:10', '2021-05-04 10:20:10'),
(89, 'boxes.create', 'Crear una caja', 'web', '2021-05-04 10:20:10', '2021-05-04 10:20:10'),
(90, 'boxes.destroy', 'Eliminar una caja', 'web', '2021-05-04 10:20:10', '2021-05-04 10:20:10'),
(91, 'boxes.pdfBoxes', 'Generar PDF de cajas', 'web', '2021-05-04 10:20:11', '2021-05-04 10:20:11'),
(92, 'boxes.export', 'Exportar Excel de cajas', 'web', '2021-05-04 10:20:11', '2021-05-04 10:20:11'),
(93, 'boxes.reports.corte_diario', 'Generar reporte de corte de caja por día', 'web', '2021-05-04 10:20:11', '2021-05-04 10:20:11'),
(94, 'boxes.reports.corte_por_fecha', 'Generar reporte de corte de caja por fecha', 'web', '2021-05-04 10:20:11', '2021-05-04 10:20:11'),
(95, 'concepts.index', 'Ver listado de concepto', 'web', '2021-05-04 10:20:11', '2021-05-04 10:20:11'),
(96, 'concepts.edit', 'Editar un concepto', 'web', '2021-05-04 10:20:12', '2021-05-04 10:20:12'),
(97, 'concepts.update', 'Actualizar un concepto', 'web', '2021-05-04 10:20:12', '2021-05-04 10:20:12'),
(98, 'concepts.create', 'Crear un concepto', 'web', '2021-05-04 10:20:12', '2021-05-04 10:20:12'),
(99, 'concepts.destroy', 'Eliminar un concepto', 'web', '2021-05-04 10:20:12', '2021-05-04 10:20:12'),
(100, 'concepts.pdfConcepts', 'Generar PDF de conceptos de Egresos e Ingresos', 'web', '2021-05-04 10:20:12', '2021-05-04 10:20:12'),
(101, 'concepts/export', 'Exportar Excel de conceptos de Egresos e Ingresos', 'web', '2021-05-04 10:20:12', '2021-05-04 10:20:12'),
(102, 'moves.index', 'Ver listado de movimientos', 'web', '2021-05-04 10:20:13', '2021-05-04 10:20:13'),
(103, 'moves.edit', 'Editar un movimiento', 'web', '2021-05-04 10:20:13', '2021-05-04 10:20:13'),
(104, 'moves.update', 'Actualizar un movimiento', 'web', '2021-05-04 10:20:13', '2021-05-04 10:20:13'),
(105, 'moves.create', 'Crear un movimiento', 'web', '2021-05-04 10:20:13', '2021-05-04 10:20:13'),
(106, 'moves.destroy', 'Eliminar un movimiento', 'web', '2021-05-04 10:20:13', '2021-05-04 10:20:13'),
(107, 'moves.show', 'Mostrar detalles de un movimiento', 'web', '2021-05-04 10:20:14', '2021-05-04 10:20:14'),
(108, 'moves.conciliado', 'Cambiar la situación de conciliación de un movimiento', 'web', '2021-05-04 10:20:14', '2021-05-04 10:20:14'),
(109, 'moves.pdfMoves', 'Generar PDF de movimientos', 'web', '2021-05-04 10:20:14', '2021-05-04 10:20:14'),
(110, 'moves.export', 'Exportar Excel de movimientos', 'web', '2021-05-04 10:20:14', '2021-05-04 10:20:14'),
(111, 'ptoventa.index', 'Ver el Dashboard', 'web', '2021-05-04 10:20:14', '2021-05-04 10:20:14'),
(112, 'measures.index', 'Ver listado de medidas', 'web', '2021-05-04 10:20:14', '2021-05-04 10:20:14'),
(113, 'measures.edit', 'Editar una medida', 'web', '2021-05-04 10:20:14', '2021-05-04 10:20:14'),
(114, 'measures.update', 'Actualizar una medida', 'web', '2021-05-04 10:20:15', '2021-05-04 10:20:15'),
(115, 'measures.create', 'Crear una medida', 'web', '2021-05-04 10:20:15', '2021-05-04 10:20:15'),
(116, 'measures.destroy', 'Eliminar una medida', 'web', '2021-05-04 10:20:15', '2021-05-04 10:20:15'),
(117, 'measures.pdfMeasures', 'Generar PDF de medidas', 'web', '2021-05-04 10:20:15', '2021-05-04 10:20:15'),
(118, 'measures.export', 'Exportar Excel de medidas', 'web', '2021-05-04 10:20:15', '2021-05-04 10:20:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `printers`
--

CREATE TABLE `printers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `printers`
--

INSERT INTO `printers` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '3nStar RPT-008', '2021-05-04 10:20:21', '2021-05-04 10:20:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productgables`
--

CREATE TABLE `productgables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productgable_id` bigint(20) UNSIGNED NOT NULL,
  `productgable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` decimal(12,3) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bar_code` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` decimal(12,3) NOT NULL DEFAULT 0.000,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sell_price` decimal(12,2) NOT NULL,
  `status` enum('ACTIVE','DEACTIVATED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `provider_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `measure_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `providers`
--

CREATE TABLE `providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rfc_number` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_date` datetime NOT NULL,
  `num_compra` int(11) NOT NULL,
  `tax` decimal(8,2) NOT NULL,
  `total` decimal(12,2) NOT NULL,
  `status` enum('VALID','CANCELED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'VALID',
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Disparadores `purchases`
--
DELIMITER $$
CREATE TRIGGER `tr_updStockCompraAnular` AFTER UPDATE ON `purchases` FOR EACH ROW BEGIN
    IF OLD.status = 'VALID' THEN
        UPDATE
            products p
        JOIN purchase_details di ON
            di.product_id = p.id AND di.purchase_id = NEW.id
        SET
            p.stock = p.stock - di.quantity;
    ELSEIF OLD.status = 'CANCELED' THEN
        UPDATE
            products p
        JOIN purchase_details di ON
            di.product_id = p.id AND di.purchase_id = NEW.id
        SET
            p.stock = p.stock + di.quantity;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchase_details`
--

CREATE TABLE `purchase_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` decimal(12,3) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Disparadores `purchase_details`
--
DELIMITER $$
CREATE TRIGGER `tr_updStockCompra` AFTER INSERT ON `purchase_details` FOR EACH ROW BEGIN
    UPDATE
        products
    SET
        stock = stock + NEW.quantity
    WHERE
        products.id = NEW.product_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'web', '2021-05-04 10:17:37', '2021-05-04 10:17:37'),
(2, 'Administrador', 'web', '2021-05-04 10:17:37', '2021-05-04 10:17:37'),
(3, 'Comprador', 'web', '2021-05-04 10:17:37', '2021-05-04 10:17:37'),
(4, 'Vendedor', 'web', '2021-05-04 10:17:37', '2021-05-04 10:17:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(37, 2),
(38, 1),
(38, 2),
(39, 1),
(39, 2),
(40, 1),
(40, 2),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(43, 1),
(43, 2),
(44, 1),
(44, 2),
(45, 1),
(45, 2),
(46, 1),
(46, 2),
(47, 1),
(47, 2),
(48, 1),
(48, 2),
(49, 1),
(49, 2),
(50, 1),
(50, 2),
(50, 3),
(51, 1),
(51, 2),
(52, 1),
(52, 2),
(53, 1),
(53, 2),
(53, 3),
(54, 1),
(54, 2),
(55, 1),
(55, 2),
(56, 1),
(56, 2),
(56, 3),
(57, 1),
(57, 2),
(58, 1),
(58, 2),
(59, 1),
(59, 2),
(60, 1),
(60, 2),
(61, 1),
(61, 2),
(62, 1),
(62, 2),
(63, 1),
(63, 2),
(64, 1),
(64, 2),
(65, 1),
(65, 2),
(66, 1),
(66, 2),
(67, 1),
(67, 2),
(68, 1),
(68, 2),
(69, 1),
(69, 2),
(70, 1),
(70, 2),
(71, 1),
(71, 2),
(72, 1),
(72, 2),
(73, 1),
(73, 2),
(74, 1),
(74, 2),
(75, 1),
(75, 2),
(76, 1),
(76, 2),
(77, 1),
(77, 2),
(78, 1),
(78, 2),
(79, 1),
(79, 2),
(80, 1),
(80, 2),
(81, 1),
(81, 2),
(82, 1),
(82, 2),
(83, 1),
(83, 2),
(84, 1),
(84, 2),
(85, 1),
(85, 2),
(86, 1),
(86, 2),
(87, 1),
(87, 2),
(88, 1),
(88, 2),
(89, 1),
(89, 2),
(90, 1),
(90, 2),
(91, 1),
(91, 2),
(92, 1),
(92, 2),
(93, 1),
(93, 2),
(94, 1),
(94, 2),
(95, 1),
(95, 2),
(96, 1),
(96, 2),
(97, 1),
(97, 2),
(98, 1),
(98, 2),
(99, 1),
(99, 2),
(100, 1),
(100, 2),
(101, 1),
(101, 2),
(102, 1),
(102, 2),
(103, 1),
(103, 2),
(104, 1),
(104, 2),
(105, 1),
(105, 2),
(106, 1),
(106, 2),
(107, 1),
(107, 2),
(108, 1),
(108, 2),
(109, 1),
(109, 2),
(110, 1),
(110, 2),
(111, 1),
(111, 2),
(112, 1),
(112, 2),
(113, 1),
(113, 2),
(114, 1),
(114, 2),
(115, 1),
(115, 2),
(116, 1),
(116, 2),
(117, 1),
(117, 2),
(118, 1),
(118, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_date` datetime NOT NULL,
  `num_vta` int(11) NOT NULL,
  `tax` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `status` enum('VALID','CANCELED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'VALID',
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Disparadores `sales`
--
DELIMITER $$
CREATE TRIGGER `tr_updStockVentaAnular` AFTER UPDATE ON `sales` FOR EACH ROW BEGIN
    IF OLD.status = 'VALID' THEN
        UPDATE
        products p
        JOIN sale_details dv ON
            dv.product_id = p.id AND dv.sale_id = NEW.id
        SET
            p.stock = p.stock + dv.quantity;
    ELSEIF OLD.status = 'CANCELED' THEN
        UPDATE
        products p
        JOIN sale_details dv ON
            dv.product_id = p.id AND dv.sale_id = NEW.id
        SET
            p.stock = p.stock - dv.quantity;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sale_details`
--

CREATE TABLE `sale_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` decimal(12,3) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Disparadores `sale_details`
--
DELIMITER $$
CREATE TRIGGER `tr_updStockVenta` AFTER INSERT ON `sale_details` FOR EACH ROW BEGIN
    UPDATE
        products
    SET
        stock = stock - NEW.quantity
    WHERE
        products.id = NEW.product_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'admin@gmail.com', NULL, '$2y$10$ugDYrSdSKfbDWu..MdMVTOnTXJ5UdmGv/zkivS9WIV.4nFE/bKUGS', NULL, NULL, NULL, NULL, NULL, '2021-05-04 10:20:16', '2021-05-04 10:20:16'),
(2, 'Administrador', 'administrador@correo.com', NULL, '$2y$10$I/hQe8UTPBmwt43AYBBCrO0rxUmSBlJaMnSPq0RE/w5vPdOAAEHw6', NULL, NULL, NULL, NULL, NULL, '2021-05-04 10:20:21', '2021-05-04 10:20:21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boxes`
--
ALTER TABLE `boxes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `boxes_name_unique` (`name`),
  ADD KEY `boxes_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_rfc_number_unique` (`rfc_number`),
  ADD UNIQUE KEY `clients_phone_unique` (`phone`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indices de la tabla `concepts`
--
ALTER TABLE `concepts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `concepts_concepto_unique` (`concepto`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `measures`
--
ALTER TABLE `measures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `measures_medida_unique` (`medida`),
  ADD UNIQUE KEY `measures_simbolo_unique` (`simbolo`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `moves`
--
ALTER TABLE `moves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `moves_box_id_foreign` (`box_id`),
  ADD KEY `moves_concept_id_foreign` (`concept_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `printers`
--
ALTER TABLE `printers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productgables`
--
ALTER TABLE `productgables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productgables_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD UNIQUE KEY `products_code_unique` (`code`),
  ADD UNIQUE KEY `products_bar_code_unique` (`bar_code`),
  ADD KEY `products_provider_id_foreign` (`provider_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_measure_id_foreign` (`measure_id`);

--
-- Indices de la tabla `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `providers_name_unique` (`name`),
  ADD UNIQUE KEY `providers_email_unique` (`email`),
  ADD UNIQUE KEY `providers_rfc_number_unique` (`rfc_number`),
  ADD UNIQUE KEY `providers_phone_unique` (`phone`);

--
-- Indices de la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `purchases_num_compra_unique` (`num_compra`),
  ADD KEY `purchases_provider_id_foreign` (`provider_id`),
  ADD KEY `purchases_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_details_purchase_id_foreign` (`purchase_id`),
  ADD KEY `purchase_details_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sales_num_vta_unique` (`num_vta`),
  ADD KEY `sales_client_id_foreign` (`client_id`),
  ADD KEY `sales_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `sale_details`
--
ALTER TABLE `sale_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_details_sale_id_foreign` (`sale_id`),
  ADD KEY `sale_details_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boxes`
--
ALTER TABLE `boxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `concepts`
--
ALTER TABLE `concepts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `measures`
--
ALTER TABLE `measures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `moves`
--
ALTER TABLE `moves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `printers`
--
ALTER TABLE `printers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productgables`
--
ALTER TABLE `productgables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `providers`
--
ALTER TABLE `providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sale_details`
--
ALTER TABLE `sale_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `boxes`
--
ALTER TABLE `boxes`
  ADD CONSTRAINT `boxes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `moves`
--
ALTER TABLE `moves`
  ADD CONSTRAINT `moves_box_id_foreign` FOREIGN KEY (`box_id`) REFERENCES `boxes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `moves_concept_id_foreign` FOREIGN KEY (`concept_id`) REFERENCES `concepts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productgables`
--
ALTER TABLE `productgables`
  ADD CONSTRAINT `productgables_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_measure_id_foreign` FOREIGN KEY (`measure_id`) REFERENCES `measures` (`id`),
  ADD CONSTRAINT `products_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`);

--
-- Filtros para la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`),
  ADD CONSTRAINT `purchases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD CONSTRAINT `purchase_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `purchase_details_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`);

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `sale_details`
--
ALTER TABLE `sale_details`
  ADD CONSTRAINT `sale_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `sale_details_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
