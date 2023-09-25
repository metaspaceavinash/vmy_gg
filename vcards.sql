-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2023 at 09:41 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vcards`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_payment_settings`
--

CREATE TABLE `admin_payment_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appoinments`
--

CREATE TABLE `appoinments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` int(11) DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_enabled` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_deatails`
--

CREATE TABLE `appointment_deatails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enable_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_theme` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `links` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enable_businesslink` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enable_subdomain` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subdomain` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enable_domain` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `domains` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fbpixel_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customjs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_fonts` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customcss` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_custom_html_enabled` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_html_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_gdpr_enabled` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gdpr_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_branding_enabled` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branding_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `enable_pwa_business` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `businessfields`
--

CREATE TABLE `businessfields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `businessfields`
--

INSERT INTO `businessfields` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'phone', 'fa fa-phone', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(2, 'email', 'fa fa-envelope', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(3, 'address', 'fa fa-map-marker', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(4, 'website', 'fa fa-link', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(5, 'custom_field', 'fa fa-align-left', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(6, 'facebook', 'fab fa-facebook', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(7, 'twitter', 'fab fa-twitter', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(8, 'instagram', 'fab fa-instagram', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(9, 'whatsapp', 'fab fa-whatsapp', '2023-09-13 21:03:10', '2023-09-13 21:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `businessqrs`
--

CREATE TABLE `businessqrs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` int(11) DEFAULT NULL,
  `foreground_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `radius` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr_text_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_hours`
--

CREATE TABLE `business_hours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` int(11) DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_enabled` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_infos`
--

CREATE TABLE `contact_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` int(11) DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_enabled` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double(8,2) NOT NULL DEFAULT 0.00,
  `limit` int(11) NOT NULL DEFAULT 0,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `name`, `from`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Appointment Created', 'vmycards', 1, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(2, 'User Created', 'vmycards', 1, '2023-09-13 21:03:10', '2023-09-13 21:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `email_template_langs`
--

CREATE TABLE `email_template_langs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `lang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_template_langs`
--

INSERT INTO `email_template_langs` (`id`, `parent_id`, `lang`, `subject`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 'ar', 'Appointment Created', '<p>مرحبا عزيزتي</p><p>قام {appointment_name} بحجز تعيين ل ـ {appointment_date} في{appointment_time}.</p><p>البريد الالكتروني : {appointment_email}</p><p>رقم التليفون : {appointment_phone}</p><p>يعتبر،</p><p>{app_url}</p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(2, 1, 'da', 'Appointment Created', '<p>Hej, kære.</p><p>{ appointment_name } har bestilt en aftale for { appointment_date} kl. {appointment_time}.</p><p>E-mail: { appointment_email }</p><p>Telefonnummer: { appointment_phone }</p><p>Med venlig hilsen</p><p>{ app_name }.</p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(3, 1, 'de', 'Appointment Created', '<p>Hallo Lieber,</p><p>{appointment_name} hat einen Termin für {appointment_date} gebucht um {appointment_time}.</p><p>E-Mail: {appointment_email}</p><p>Telefonnummer: {appointment_phone}</p><p>Betrachtet,</p><p>{app_name}.</p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(4, 1, 'en', 'Appointment Created', '<p>Hi Dear,</p><p>{appointment_name} has booked an appointment for {appointment_date} at {appointment_time}.</p><p>Email: {appointment_email}</p><p>Phone Number: {appointment_phone}</p><p>Regards,</p><p>{app_name}.</p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(5, 1, 'es', 'Appointment Created', '<p>Hola Querido,</p><p>{appointment_name} ha reservado una cita para {appointment_date}a las {appointment_time}.</p><p>Correo electrónico: {appointment_email}</p><p>Número de teléfono: {appointment_phone}</p><p>Considerando,</p><p>{app_name}.</p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(6, 1, 'fr', 'Appointment Created', '<p>Salut, Chère,</p><p>{ appointment_name} a réservé un rendez-vous pour { appointment_date } à {appointment_time}.</p><p>Adresse électronique: {appointment_email}</p><p>Numéro de téléphone: { appointment_phone }</p><p>Regards,</p><p>{ app_name }.</p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(7, 1, 'it', 'Appointment Created', '<p>Ciao Caro,</p><p>{appointment_name} ha prenotato un appuntamento per {appointment_date} a {appointment_time}.</p><p>Email: {appointment_email}</p><p>Numero di telefono: {appointment_phone}</p><p>Riguardo,</p><p>{app_name}.</p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(8, 1, 'ja', 'Appointment Created', '<p>こんにちは、</p><p>{appointment_name} は {appointment_date} の {appointment_time} に予約を入れました。</p><p>メール: {appointment_email}</p><p>電話番号: {appointment_phone}</p><p>よろしくお願いします</p><p>{app_name}.</p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(9, 1, 'nl', 'Appointment Created', '<p>Hallo, lieverd.</p><p>{ appointment_name } heeft een afspraak voor { appointment_date } geboekt Bij {appointment_time}.</p><p>E-mail: { appointment_email }</p><p>Telefoonnummer: { appointment_phone }</p><p>Betreft:</p><p>{ app_name }.</p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(10, 1, 'pl', 'Appointment Created', '<p>Witam Szanowny Panie,</p><p>Użytkownik {appointment_name } zarezerwował termin dla {appointment_date } W {appointment_time}.</p><p>E-mail: {appointment_email }</p><p>Numer telefonu: {appointment_phone }</p><p>W odniesieniu do</p><p>{app_name }.</p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(11, 1, 'ru', 'Appointment Created', '<p>Привет, дорогой.</p><p>Пользователь { appointment_name } забронировал назначение на { appointment_date } в {appointment_time}.</p><p>Электронная почта: { appointment_email }</p><p>Номер телефона: { appointment_phone }</p><p>С уважением,</p><p>{ app_name }.</p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(12, 1, 'pt', 'Appointment Created', '<p>Oi Querida,</p><p>{appointment_name} marcou um compromisso para {appointment_date} no {appointment_time}.</p><p>E-mail: {appointment_email}</p><p>Número do Telefone: {appointment_phone}</p><p>Considera,</p><p>{app_name}.</p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(13, 1, 'tr', 'Appointment Created', '<p>Merhaba canım,</p><p>{appointment_name} için randevu aldı  {appointment_date} de {appointment_time}.</p><p>E-posta: {appointment_email}</p><p>Telefon numarası: {appointment_phone}</p><p>Saygılarımızla,</p><p>{app_name}.</p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(14, 1, 'he', 'Appointment Created', '<p>הי יקירי</p><p>{appointment_name} קבע תור ל {appointment_date} ב-{appointment_time}.</p><p>דואר אלקטרוני: {appointment_email}</p><p>מספר טלפון: {appointment_phone}</p><p>ברכות</p><p>{app_name}.</p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(15, 1, 'pt-br', 'Appointment Created', '<p>Oi querido</p><p>{appointment_name} marcou uma consulta para {appointment_date} em {appointment_time}.</p><p>Email: {appointment_email}</p><p>Telefone: {appointment_phone}</p><p>Relação,</p><p>{app_name}.</p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(16, 1, 'zh', 'Appointment Created', '<p>嗨，亲爱的</p><p>{appointment_name} 已预约 {appointment_date} 在 {appointment_time}.</p><p>电子邮件： {appointment_email}</p><p>电话号码： {appointment_phone}</p><p>问候</p><p>{app_name}.</p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(17, 2, 'ar', 'User Created', '<p><font face=\"sans-serif\">مرحبًا {user_name}</font></p><p><font face=\"sans-serif\">لتسجيل الدخول إلى تفاصيل حسابك ، ما عليك سوى النقر فوق Url أدناه</font></p><p><font face=\"sans-serif\">اسم المستخدم: {user_email}</font></p><p><font face=\"sans-serif\">كلمة المرور: {user_password}</font></p><p><font face=\"sans-serif\">{app_url}</font></p><p><font face=\"sans-serif\">شكرًا لك على الانضمام إلى فريقنا كـ {user_type}</font></p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(18, 2, 'da', 'User Created', '<p><font face=\"sans-serif\">Hej {user_name}</font></p><p><font face=\"sans-serif\">For at logge på dine kontooplysninger skal du blot klikke på URL nedenfor</font></p><p><font face=\"sans-serif\">brugernavn: {user_email}</font></p><p><font face=\"sans-serif\">adgangskode: {user_password}</font></p><p><font face=\"sans-serif\">{app_url}</font></p><p><font face=\"sans-serif\">Tak, fordi du sluttede dig til vores team som en {user_type}</font></p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(19, 2, 'de', 'User Created', '<p><font face=\"sans-serif\">Hallo, {user_name}</font></p><p><font face=\"sans-serif\">Um sich mit Ihren Kontodaten anzumelden, klicken Sie einfach unten auf die URL</font></p><p><font face=\"sans-serif\">Benutzername: {user_email}</font></p><p><font face=\"sans-serif\">Passwort: {user_password}</font></p><p><font face=\"sans-serif\">{app_url}</font></p><p><font face=\"sans-serif\">Vielen Dank, dass Sie unserem Team als {user_type} beigetreten sind</font></p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(20, 2, 'en', 'User Created', '<p><font face=\"sans-serif\">Hi {user_name}</font></p><p><font face=\"sans-serif\">To login to your account details simply click on Url Below</font></p><p><font face=\"sans-serif\">Username: {user_email}</font></p><p><font face=\"sans-serif\">Password: {user_password}</font></p><p><font face=\"sans-serif\">{app_url}</font></p><p><font face=\"sans-serif\"> Thank you for joining our team as {user_type}</font></p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(21, 2, 'es', 'User Created', '<p><font face=\"sans-serif\">Hola, {nombre_de_usuario}</font></p><p><font face=\"sans-serif\">Para iniciar sesión en los detalles de su cuenta, simplemente haga clic en Url a continuación</font></p><p><font face=\"sans-serif\">nombre de usuario: {user_email}</font></p><p><font face=\"sans-serif\">contraseña: {usuario_contraseña}</font></p><p><font face=\"sans-serif\">{aplicación_url}</font></p><p><font face=\"sans-serif\">Gracias por unirte a nuestro equipo como {user_type}</font></p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(22, 2, 'fr', 'User Created', '<p><font face=\"sans-serif\">Bonjour, {user_name}</font></p><p><font face=\"sans-serif\">Pour vous connecter aux détails de votre compte, cliquez simplement sur Url ci-dessous</font></p><p><font face=\"sans-serif\">nom d\'utilisateur : {user_email}</font></p><p><font face=\"sans-serif\">mot de passe : {user_password}</font></p><p><font face=\"sans-serif\">{app_url}</font></p><p><font face=\"sans-serif\">Merci d\'avoir rejoint notre équipe en tant que {user_type}</font></p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(23, 2, 'it', 'User Created', '<p><font face=\"sans-serif\">Ciao, {nome_utente}</font></p><p><font face=\"sans-serif\">Per accedere ai dettagli del tuo account, fai semplicemente clic sull\'URL qui sotto</font></p><p><font face=\"sans-serif\">nome utente: {utente_email}</font></p><p><font face=\"sans-serif\">password: {user_password}</font></p><p><font face=\"sans-serif\">{app_url}</font></p><p><font face=\"sans-serif\">Grazie per esserti unito al nostro team come {user_type}</font></p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(24, 2, 'ja', 'User Created', '<p><font face=\"sans-serif\">こんにちは、{user_name}</font></p><p><font face=\"sans-serif\">アカウントの詳細にログインするには、下のURLをクリックしてください。</font></p><p><font face=\"sans-serif\">ユーザー名：{user_email}</font></p><p><font face=\"sans-serif\">パスワード：{user_password}</font></p><p><font face=\"sans-serif\">{app_url}</font></p><p><font face=\"sans-serif\">{user_type}として私たちのチームに参加していただきありがとうございます</font></p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(25, 2, 'nl', 'User Created', '<p><font face=\"sans-serif\">Hallo, {user_name}</font></p><p><font face=\"sans-serif\">Om in te loggen op uw accountgegevens, klikt u op onderstaande URL</font></p><p><font face=\"sans-serif\">gebruikersnaam: {user_email}</font></p><p><font face=\"sans-serif\">wachtwoord: {user_password}</font></p><p><font face=\"sans-serif\">{app_url}</font></p><p><font face=\"sans-serif\">Bedankt dat je lid bent geworden van ons team als {user_type}</font></p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(26, 2, 'pl', 'User Created', '<p><font face=\"sans-serif\">Cześć, {nazwa_użytkownika}</font></p><p><font face=\"sans-serif\">Aby zalogować się na swoje konto, po prostu kliknij poniższy adres URL</font></p><p><font face=\"sans-serif\">nazwa użytkownika: {user_email}</font></p><p><font face=\"sans-serif\">hasło: {user_password}</font></p><p><font face=\"sans-serif\">{app_url}</font></p><p><font face=\"sans-serif\">Dziękujemy za dołączenie do naszego zespołu jako {user_type}</font></p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(27, 2, 'ru', 'User Created', '<p><font face=\"sans-serif\">Привет, {имя_пользователя}</font></p><p><font face=\"sans-serif\">Чтобы войти в свою учетную запись, просто нажмите URL-адрес ниже</font></p><p><font face=\"sans-serif\">имя пользователя: {user_email}</font></p><p><font face=\"sans-serif\">пароль: {user_password}</font></p><p><font face=\"sans-serif\">{app_url}</font></p><p><font face=\"sans-serif\">Спасибо, что присоединились к нашей команде как {user_type}</font></p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(28, 2, 'pt', 'User Created', '<p><font face=\"sans-serif\">Olá, {user_name}</font></p><p><font face=\"sans-serif\">Para acessar os detalhes da sua conta, basta clicar no URL abaixo</font></p><p><font face=\"sans-serif\">nome de usuário: {user_email}</font></p><p><font face=\"sans-serif\">senha: {user_password}</font></p><p><font face=\"sans-serif\">{app_url}</font></p><p><font face=\"sans-serif\">Obrigado por se juntar à nossa equipa como {user_type}</font></p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(29, 2, 'tr', 'User Created', '<p><font face=\"sans-serif\">MERHABA {user_name}</font></p><p><font face=\"sans-serif\">Hesap ayrıntılarınıza giriş yapmak için aşağıdaki URL`ye tıklamanız yeterlidir</font></p><p><font face=\"sans-serif\">Kullanıcı adı: {user_email}</font></p><p><font face=\"sans-serif\">Şifre:: {user_password}</font></p><p><font face=\"sans-serif\">{app_url}</font></p><p><font face=\"sans-serif\"> olarak ekibimize katıldığınız için teşekkür ederiz. {user_type}</font></p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(30, 2, 'he', 'User Created', '<p><font face=\"sans-serif\">היי {user_name}</font></p><p><font face=\"sans-serif\">כדי להתחבר לפרטי החשבון שלך פשוט לחץ על כתובת האתר למטה</font></p><p><font face=\"sans-serif\">שם משתמש: {user_email}</font></p><p><font face=\"sans-serif\">סיסמה: {user_password}</font></p><p><font face=\"sans-serif\">{app_url}</font></p><p><font face=\"sans-serif\"> תודה שהצטרפת לצוות שלנו כ {user_type}</font></p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(31, 2, 'pt-br', 'User Created', '<p><font face=\"sans-serif\">Oi {user_name}</font></p><p><font face=\"sans-serif\">Para acessar os detalhes da sua conta, basta clicar em Url Abaixo</font></p><p><font face=\"sans-serif\">Nome de usuário: {user_email}</font></p><p><font face=\"sans-serif\">Senha: {user_password}</font></p><p><font face=\"sans-serif\">{app_url}</font></p><p><font face=\"sans-serif\"> Obrigado por se juntar à nossa equipe como {user_type}</font></p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(32, 2, 'zh', 'User Created', '<p><font face=\"sans-serif\">你好 {user_name}</font></p><p><font face=\"sans-serif\">要登录您的帐户详细信息，只需单击下面的URL</font></p><p><font face=\"sans-serif\">用户名： {user_email}</font></p><p><font face=\"sans-serif\">密码： {user_password}</font></p><p><font face=\"sans-serif\">{app_url}</font></p><p><font face=\"sans-serif\"> 感谢您加入我们的团队 {user_type}</font></p>', '2023-09-13 21:03:10', '2023-09-13 21:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` int(11) DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_enabled` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landing_page_sections`
--

CREATE TABLE `landing_page_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_order` int(11) NOT NULL DEFAULT 0,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_type` enum('section-1','section-2','section-3','section-4','section-5','section-6','section-7','section-8','section-9','section-10','section-plan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_demo_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_blade_file_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `code`, `fullName`, `created_at`, `updated_at`) VALUES
(1, 'ar', 'Arabic', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(2, 'zh', 'Chinese', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(3, 'da', 'Danish', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(4, 'de', 'German', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(5, 'en', 'English', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(6, 'es', 'Spanish', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(7, 'fr', 'French', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(8, 'he', 'Hebrew', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(9, 'it', 'Italian', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(10, 'ja', 'Japanese', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(11, 'nl', 'Dutch', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(12, 'pl', 'Polish', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(13, 'pt', 'Portuguese', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(14, 'ru', 'Russian', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(15, 'tr', 'Turkish', '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(16, 'pt-br', 'Portuguese(Brazil)', '2023-09-13 21:03:10', '2023-09-13 21:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_16_144239_create_plans_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_09_28_102009_create_settings_table', 1),
(6, '2020_04_12_095629_create_coupons_table', 1),
(7, '2020_04_12_120749_create_user_coupons_table', 1),
(8, '2020_05_21_065337_create_permission_tables', 1),
(9, '2021_03_04_110817_create_plan_orders_table', 1),
(10, '2021_06_03_101323_create_admin_payment_settings', 1),
(11, '2021_06_15_035736_create_landing_page_sections_table', 1),
(12, '2021_07_28_101402_create_businesses_table', 1),
(13, '2021_07_28_105617_create_businessfields_table', 1),
(14, '2021_09_13_071920_create_business_hours_table', 1),
(15, '2021_09_13_072901_create_appoinments_table', 1),
(16, '2021_09_13_083333_create_services_table', 1),
(17, '2021_09_13_083428_create_testimonials_table', 1),
(18, '2021_09_13_083456_create_socials_table', 1),
(19, '2021_09_20_031809_create_contact_infos_table', 1),
(20, '2021_09_23_093115_create_appointment_deatails_table', 1),
(21, '2021_10_28_114242_create_visits_table', 1),
(22, '2021_11_25_093048_add_filed_in_bussiness_table', 1),
(23, '2021_12_22_033325_add_status_to_appointment_detail', 1),
(24, '2022_01_19_093049_add_google_filed_in_bussiness_table', 1),
(25, '2022_01_25_102226_create_plan_requests_table', 1),
(26, '2022_01_25_102325_add_requested_plan_to_users_table', 1),
(27, '2022_01_30_230459_create_contacts_table', 1),
(28, '2022_02_14_100435_add_field_in_business_table', 1),
(29, '2022_04_01_054641_create_custom_html_table', 1),
(30, '2022_04_01_120320_add_is_gdpr_enabled_to_businesses_table', 1),
(31, '2022_07_13_114541_create_email_templates_table', 1),
(32, '2022_07_13_114550_create_email_template_langs_table', 1),
(33, '2022_07_13_114939_create_user_email_templates_table', 1),
(34, '2022_07_26_141125_add_branding_data_to_businesses_table', 1),
(35, '2022_07_27_085503_add_enable_branding_to_plans_table', 1),
(36, '2023_02_20_120502_add_pwa_business_to_plans_table', 1),
(37, '2023_02_20_122925_add_enable_pwa_business_to_businesses_table', 1),
(38, '2023_03_21_064936_create_galleries_table', 1),
(39, '2023_04_10_042428_add_field_to_contact_table', 1),
(40, '2023_04_11_035909_create_pixel_fields_table', 1),
(41, '2023_04_19_123851_create_login_details_table', 1),
(42, '2023_04_27_125750_create_webhook_table', 1),
(43, '2023_05_03_145933_add_field_plan_table', 1),
(44, '2023_05_16_112657_create_businessqrs_table', 1),
(45, '2023_05_17_093607_add_enable_qr_code_plan_table', 1),
(46, '2023_06_12_092638_addfield_plans_table', 1),
(47, '2023_06_12_095600_create_template_table', 1),
(48, '2023_06_20_173753_addfield_plan_table', 1),
(49, '2023_06_20_173900_addfield_users_table', 1),
(50, '2023_06_28_100931_create_language_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'show dashboard', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(2, 'manage user', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(3, 'create user', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(4, 'edit user', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(5, 'delete user', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(6, 'manage role', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(7, 'create role', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(8, 'edit role', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(9, 'delete role', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(10, 'manage permission', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(11, 'create permission', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(12, 'edit permission', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(13, 'delete permission', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(14, 'manage business', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(15, 'edit business', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(16, 'delete business', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(17, 'show business', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(18, 'create business', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(19, 'theme settings business', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(20, 'custom settings business', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(21, 'block settings business', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(22, 'SEO settings business', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(23, 'PWA settings business', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(24, 'pixel settings business', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(25, 'manage appointment', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(26, 'edit appointment', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(27, 'delete appointment', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(28, 'calendar appointment', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(29, 'manage contact', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(30, 'delete contact', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(31, 'edit contact', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(32, 'manage company setting', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(33, 'manage system setting', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(34, 'change password account', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(35, 'manage change password', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(36, 'manage plan', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(37, 'create plan', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(38, 'edit plan', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(39, 'buy plan', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(40, 'manage order', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(41, 'manage coupon', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(42, 'create coupon', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(43, 'edit coupon', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(44, 'delete coupon', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(45, 'manage email templates', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(46, 'create email template', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(47, 'edit email template', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(48, 'view analytics business', 'web', '2023-09-13 21:03:09', '2023-09-13 21:03:09');

-- --------------------------------------------------------

--
-- Table structure for table `pixel_fields`
--

CREATE TABLE `pixel_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` int(11) DEFAULT NULL,
  `platform` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pixel_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `duration` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `themes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business` int(11) NOT NULL DEFAULT 0,
  `max_users` int(11) NOT NULL DEFAULT 0,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enable_custdomain` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `enable_custsubdomain` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `enable_branding` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pwa_business` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `enable_qr_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `enable_chatgpt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `storage_limit` double(255,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `price`, `duration`, `themes`, `business`, `max_users`, `description`, `enable_custdomain`, `enable_custsubdomain`, `enable_branding`, `created_at`, `updated_at`, `pwa_business`, `enable_qr_code`, `enable_chatgpt`, `storage_limit`) VALUES
(1, 'Free Plan', 0.00, 'Lifetime', 'theme1,theme2,theme3,theme4,theme5,theme6,theme7,theme8,theme9,theme10,theme11,theme12,theme13,theme14,theme15,theme16,theme17,theme18,theme19,theme20,theme21', -1, 10, NULL, 'on', 'on', 'on', '2023-09-13 21:03:10', '2023-09-13 21:03:10', 'on', 'on', 'on', 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `plan_orders`
--

CREATE TABLE `plan_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_number` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_exp_month` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_exp_year` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_id` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `price_currency` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `txn_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receipt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `store_id` int(11) NOT NULL DEFAULT 0,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan_requests`
--

CREATE TABLE `plan_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `duration` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'monthly',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'web', 0, '2023-09-13 21:03:09', '2023-09-13 21:03:09'),
(2, 'company', 'web', 1, '2023-09-13 21:03:10', '2023-09-13 21:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
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
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 1),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(38, 1),
(39, 2),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 2);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` int(11) DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_enabled` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'local_storage_validation', 'jpg,jpeg,png,xlsx,xls,csv,pdf', 1, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(2, 'wasabi_storage_validation', 'jpg,jpeg,png,xlsx,xls,csv,pdf', 1, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(3, 's3_storage_validation', 'jpg,jpeg,png,xlsx,xls,csv,pdf', 1, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(4, 'local_storage_max_upload_size', '2048000', 1, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(5, 'wasabi_max_upload_size', '2048000', 1, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(6, 's3_max_upload_size', '2048000', 1, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(7, 'title_text', 'vmycards', 1, NULL, NULL),
(8, 'footer_text', 'vmycards', 1, NULL, NULL),
(9, 'default_language', 'en', 1, NULL, NULL),
(10, 'display_landing_page', 'on', 1, NULL, NULL),
(11, 'signup_button', 'on', 1, NULL, NULL),
(12, 'email_verification', 'on', 1, NULL, NULL),
(13, 'color', 'theme-9', 1, NULL, NULL),
(14, 'cust_theme_bg', 'on', 1, NULL, NULL),
(15, 'SITE_RTL', 'off', 1, NULL, NULL),
(16, 'cust_darklayout', 'off', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` int(11) DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_enabled` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `template_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prompt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_json` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_tone` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `template_name`, `prompt`, `module`, `field_json`, `is_tone`, `created_at`, `updated_at`) VALUES
(1, 'name', 'please suggest subscription plan name for this  :  ##title##:  for my business', 'plan', '{\"field\":[{\"label\":\"What is your plan title?\",\"placeholder\":\"e.g. Pro Resller,Exclusive Access\",\"field_type\":\"text_box\",\"field_name\":\"title\"}]}', 0, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(2, 'description', 'please suggest subscription plan description for this  :  ##description##  for my business', 'plan', '{\"field\":[{\"label\":\"What is your plan about?\",\"placeholder\":\"e.g. Describe your plan details \",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 1, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(3, 'name', 'give 10 catchy only name of Offer or discount Coupon for : ##keywords##', 'coupon', '{\"field\":[{\"label\":\"Seed words\",\"placeholder\":\"e.g.coupon will provide you with a discount on your selected plan\",\"field_type\":\"text_box\",\"field_name\":\"keywords\"}]}', 0, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(4, 'meta_keyword', 'Please generate SEO meta title for my business, ##name##, which specializes in ##specializes##.', 'seo', '{\"field\":[{\"label\":\"Business Name\",\"placeholder\":\"e.g. your business or your website name\",\"field_type\":\"text_box\",\"field_name\":\"name\"},{\"label\":\"Specializes in what?\",\"placeholder\":\"e.g.your web or business specialities\",\"field_type\":\"text_box\",\"field_name\":\"specializes\"}]}', 0, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(5, 'meta_description', 'Write SEO meta description for:\n\n ##description## \n\nWebsite or Business name is:\n ##title## \n\nSeed words:\n ##keywords## \n\n', 'seo', '{\"field\":[{\"label\":\"Business Name\",\"placeholder\":\"e.g. Amazon, Google\",\"field_type\":\"text_box\",\"field_name\":\"title\"},{\"label\":\"Business Description\",\"placeholder\":\"e.g. Describe what your website or business do\",\"field_type\":\"textarea\",\"field_name\":\"description\"},{\"label\":\"Keywords\",\"placeholder\":\"e.g.  cloud services, databases\",\"field_type\":\"text_box\",\"field_name\":\"keywords\"}]}', 0, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(6, 'cookie_title', 'please suggest me cookie title for this ##description## website which i can use in my website cookie', 'cookie', '{\"field\":[{\"label\":\"Website name or info\",\"placeholder\":\"e.g. example website \",\"field_type\":\"textarea\",\"field_name\":\"title\"}]}', 0, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(7, 'cookie_description', 'please suggest me  Cookie description for this cookie title ##title##  which i can use in my website cookie', 'cookie', '{\"field\":[{\"label\":\"Cookie Title \",\"placeholder\":\"e.g. example website \",\"field_type\":\"text_box\",\"field_name\":\"title\"}]}', 0, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(8, 'strictly_cookie_title', 'please suggest me only Strictly Cookie Title for this ##description## website which i can use in my website cookie', 'cookie', '{\"field\":[{\"label\":\"Website name or info\",\"placeholder\":\"e.g. example website \",\"field_type\":\"textarea\",\"field_name\":\"title\"}]}', 0, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(9, 'strictly_cookie_description', 'please suggest me Strictly Cookie description for this Strictly cookie title ##title##  which i can use in my website cookie', 'cookie', '{\"field\":[{\"label\":\"Strictly Cookie Title \",\"placeholder\":\"e.g. example website \",\"field_type\":\"text_box\",\"field_name\":\"title\"}]}', 0, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(10, 'more_information_description', 'I need assistance in crafting compelling content for my ##web_name## website\'s \'Contact Us\' page of my website. The page should provide relevant information to users, encourage them to reach out for inquiries, support, and feedback, and reflect the unique value proposition of my business.', 'cookie', '{\"field\":[{\"label\":\"Websit Name\",\"placeholder\":\"e.g. example website \",\"field_type\":\"text_box\",\"field_name\":\"web_name\"}]}', 0, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(11, 'content', 'generate email template for ##type##', 'email template', '{\"field\":[{\"label\":\"Email Type\",\"placeholder\":\"e.g. new user,new client\",\"field_type\":\"text_box\",\"field_name\":\"type\"}]}', 1, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(12, 'note', 'Generate an appointment short message for ##status## status on behalf of my ##name##.', 'Add Note on appointment', '{\"field\":[{\"label\":\"Business Name\",\"placeholder\":\"e.g. graphics design \",\"field_type\":\"text_box\",\"field_name\":\"name\"},{\"label\":\"Appointment Status\",\"placeholder\":\"e.g. pending,complete\",\"field_type\":\"text_box\",\"field_name\":\"status\"}]}', 0, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(13, 'note', 'Generate an contact short message for ##status## status on behalf of my ##name##.', 'Add Note on contact', '{\"field\":[{\"label\":\"Business Name\",\"placeholder\":\"e.g. graphics design \",\"field_type\":\"text_box\",\"field_name\":\"name\"},{\"label\":\" Status\",\"placeholder\":\"e.g. pending,complete\",\"field_type\":\"text_box\",\"field_name\":\"status\"}]}', 0, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(14, 'business_title', 'Generate an innovative and memorable business name for a startup that ##description##. The businees focuses on ##description##. The name should reflect the businees\'s commitment to ##commitment##', 'create business', '{\"field\":[{\"label\":\"Business Agenda\",\"placeholder\":\"e.g.focus on laravel web development\",\"field_type\":\"textarea\",\"field_name\":\"description\"},{\"label\":\"Business Commitment\",\"placeholder\":\"e.g Laravel is considered the standard in web development, taking it to the top note.\",\"field_type\":\"textarea\",\"field_name\":\"commitment\"}]}', 0, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(15, 'title', 'Generate an innovative and memorable business name for a startup that ##description##. The businees focuses on ##description##. The name should reflect the businees\'s commitment to ##commitment##', 'edit business', '{\"field\":[{\"label\":\"Business Agenda\",\"placeholder\":\"e.g.focus on laravel web development\",\"field_type\":\"textarea\",\"field_name\":\"description\"},{\"label\":\"Business Commitment\",\"placeholder\":\"e.g Laravel is considered the standard in web development, taking it to the top note.\",\"field_type\":\"textarea\",\"field_name\":\"commitment\"}]}', 0, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(16, 'designation', 'Create unique and fitting business designations for the different roles within \'##type##\' a  business that offers ##offers##. The designations should reflect the business\'s commitment ##commitment## in the industry. Consider job titles that capture the essence of various roles, such as ##roles## etc.', 'edit business', '{\"field\":[{\"label\":\"Business Field/Type\",\"placeholder\":\"e.g.ecommmerce\",\"field_type\":\"text_box\",\"field_name\":\"type\"},{\"label\":\"What your business offer?\",\"placeholder\":\"e.g.baby products\",\"field_type\":\"text_box\",\"field_name\":\"offers\"},{\"label\":\"Business Commitment\",\"placeholder\":\"e.g Provide best products and after sale service.\",\"field_type\":\"textarea\",\"field_name\":\"commitment\"},{\"label\":\"Roles\",\"placeholder\":\"e.g leadership,customer care.\",\"field_type\":\"text_box\",\"field_name\":\"roles\"}]}', 0, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(17, 'sub_title', 'Generate compelling subtitles for ##name##, highlighting their unique offering ##sevices##, values, and benefits.', 'edit business', '{\"field\":[{\"label\":\"Business Name\",\"placeholder\":\"vMycards\",\"field_type\":\"text_box\",\"field_name\":\"name\"},{\"label\":\"Providing services\",\"placeholder\":\"provide best web base development\",\"field_type\":\"textarea\",\"field_name\":\"sevices\"}]}', 0, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(18, 'description', 'Imagine you are launching a new business called ##title## it related to ##description## Write a compelling description that showcases the unique features, services, and values of your business. Highlight how [business name] stands out from competitors and why customers should choose your business for their needs.', 'edit business', '{\"field\":[{\"label\":\"Business Name\",\"placeholder\":\"Business Name\",\"field_type\":\"text_box\",\"field_name\":\"title\"},{\"label\":\"Business Field\",\"placeholder\":\"Business field\",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 0, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(19, 'service_title', 'Generate a list of service names that can be provided by a ##designation##. Consider the expertise and responsibilities associated with this designation and brainstorm a range of services that align with their role. Think about the specific tasks, deliverables, or solutions that this designation would typically provide to clients or customers. Be creative and comprehensive in generating a diverse list of service names that capture the breadth of offerings associated with this designation.', 'service business', '{\"field\":[{\"label\":\"Designation\",\"placeholder\":\"e.g.Bankend developer\",\"field_type\":\"text_box\",\"field_name\":\"designation\"}]}', 0, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(20, 'service_description', 'Develop a detailed service description for the ##title##. Describe the key features, benefits, and deliverables associated with this service. Consider the specific needs it addresses, the unique value it offers, and the outcomes clients can expect. Provide clear and concise information that highlights the expertise and capabilities required to deliver this service effectively. Use this prompt to craft a compelling service description that communicates the value proposition and encourages potential clients to engage with the service.', 'service business', '{\"field\":[{\"label\":\"Service title\",\"placeholder\":\"e.g.Bankend development\",\"field_type\":\"text_box\",\"field_name\":\"title\"}]}', 0, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(21, 'testimonial_description', 'Imagine you are a satisfied customer of your own business. Write a testimonial expressing your positive experience and satisfaction with the ##description## . Highlight specific aspects that make your business stand out, such as ##highlight##, or the positive impact your business has had on your life or work. Make sure to convey your genuine enthusiasm and recommendation for others to experience the same level of satisfaction.', 'testimonial', '{\"field\":[{\"label\":\"Testimonial Description\",\"placeholder\":\"e.g.products or services provided\",\"field_type\":\"textarea\",\"field_name\":\"description\"},{\"label\":\"Highlight Points\",\"placeholder\":\"e.g exceptional customer service, high-quality offerings, unique features\",\"field_type\":\"textarea\",\"field_name\":\"highlight\"}]}', 0, '2023-09-13 21:03:10', '2023-09-13 21:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` int(11) DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_enabled` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'en',
  `current_business` int(11) DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'company',
  `plan` int(11) NOT NULL DEFAULT 1,
  `plan_expire_date` date DEFAULT NULL,
  `requested_plan` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `mode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'light',
  `plan_is_active` int(11) NOT NULL DEFAULT 1,
  `storage_limit` double(255,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `lang`, `current_business`, `avatar`, `type`, `plan`, `plan_expire_date`, `requested_plan`, `created_by`, `mode`, `plan_is_active`, `storage_limit`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@example.com', '2023-09-13 21:03:10', '$2y$10$g5Y02kZLls9SpIyOKyx/G.jwnT5dXkp.7OoL0rvYYtFasd8jp0yoi', NULL, 'en', NULL, NULL, 'super admin', 1, NULL, 0, 0, 'light', 1, 0.00, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(2, 'Company', 'company@example.com', '2023-09-13 21:03:10', '$2y$10$C3LP5riE8zyS.z6a1bHF7.z7aHzqnMpy6i8p4ajX7Jwc0eYh.RMR2', NULL, 'en', NULL, NULL, 'company', 1, NULL, 0, 1, 'light', 1, 0.00, '2023-09-13 21:03:10', '2023-09-13 21:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_coupons`
--

CREATE TABLE `user_coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(11) NOT NULL,
  `coupon` int(11) NOT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_email_templates`
--

CREATE TABLE `user_email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `template_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_email_templates`
--

INSERT INTO `user_email_templates` (`id`, `template_id`, `user_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2023-09-13 21:03:10', '2023-09-13 21:03:10'),
(2, 2, 1, 1, '2023-09-13 21:03:10', '2023-09-13 21:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referer` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `languages` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `useragent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `headers` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `platform` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visitable_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visitable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `visitor_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visitor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `webhooks`
--

CREATE TABLE `webhooks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_payment_settings`
--
ALTER TABLE `admin_payment_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_payment_settings_name_created_by_unique` (`name`,`created_by`);

--
-- Indexes for table `appoinments`
--
ALTER TABLE `appoinments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_deatails`
--
ALTER TABLE `appointment_deatails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `businessfields`
--
ALTER TABLE `businessfields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `businessqrs`
--
ALTER TABLE `businessqrs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_hours`
--
ALTER TABLE `business_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_infos`
--
ALTER TABLE `contact_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_template_langs`
--
ALTER TABLE `email_template_langs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landing_page_sections`
--
ALTER TABLE `landing_page_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pixel_fields`
--
ALTER TABLE `pixel_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plans_name_unique` (`name`);

--
-- Indexes for table `plan_orders`
--
ALTER TABLE `plan_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plan_orders_order_id_unique` (`order_id`);

--
-- Indexes for table `plan_requests`
--
ALTER TABLE `plan_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_name_created_by_unique` (`name`,`created_by`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_coupons`
--
ALTER TABLE `user_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_email_templates`
--
ALTER TABLE `user_email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visitor_visitable_type_visitable_id_index` (`visitable_type`,`visitable_id`),
  ADD KEY `visitor_visitor_type_visitor_id_index` (`visitor_type`,`visitor_id`);

--
-- Indexes for table `webhooks`
--
ALTER TABLE `webhooks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_payment_settings`
--
ALTER TABLE `admin_payment_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appoinments`
--
ALTER TABLE `appoinments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointment_deatails`
--
ALTER TABLE `appointment_deatails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `businessfields`
--
ALTER TABLE `businessfields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `businessqrs`
--
ALTER TABLE `businessqrs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business_hours`
--
ALTER TABLE `business_hours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_infos`
--
ALTER TABLE `contact_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `email_template_langs`
--
ALTER TABLE `email_template_langs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landing_page_sections`
--
ALTER TABLE `landing_page_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `pixel_fields`
--
ALTER TABLE `pixel_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plan_orders`
--
ALTER TABLE `plan_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plan_requests`
--
ALTER TABLE `plan_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_coupons`
--
ALTER TABLE `user_coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_email_templates`
--
ALTER TABLE `user_email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `webhooks`
--
ALTER TABLE `webhooks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
