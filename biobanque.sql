-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 20 juin 2024 à 18:37
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `biobanque`
--

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `information_entreprises`
--

CREATE TABLE `information_entreprises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomOrganisation` varchar(255) DEFAULT NULL,
  `emailOrganisation` varchar(255) DEFAULT NULL,
  `documentPdf` varchar(190) DEFAULT NULL,
  `nomPays` varchar(191) DEFAULT NULL,
  `codePays` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `idUser` bigint(20) UNSIGNED DEFAULT NULL,
  `autorisation` varchar(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `information_entreprises`
--

INSERT INTO `information_entreprises` (`id`, `nomOrganisation`, `emailOrganisation`, `documentPdf`, `nomPays`, `codePays`, `telephone`, `adresse`, `idUser`, `autorisation`, `created_at`, `updated_at`) VALUES
(28, 'jhdjd', 'jsjsj@gmail.com', '1718895198.pdf', 'Afghanistan', '221', '7888', 'skjkks', 190, NULL, '2024-06-20 14:53:18', '2024-06-20 14:53:18');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_02_21_081009_create_entreprise_cats_table', 1),
(7, '2024_02_21_081026_create_fournisseur_cats_table', 1),
(8, '2024_02_21_081212_create_information_entreprises_table', 1),
(9, '2024_04_02_073251_create_information_fourisseurs_table', 1),
(10, '2024_04_02_073404_create_category_products_table', 1),
(11, '2024_04_03_120826_create_galeries_table', 1),
(12, '2024_04_03_120939_create_mesures_table', 1),
(13, '2024_04_03_121156_create_produits_table', 1),
(14, '2024_02_03_081210_create_pays_table', 2),
(15, '2024_04_03_132029_create_personnes_table', 3),
(16, '2024_04_04_135802_create_permissions_table', 4),
(17, '2014_10_12_100000_create_password_resets_table', 5);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('abiodoundamala@gmail.com', '$2y$10$gJtNAtTQKc7CQi7986Xhn.hwzAV8f9A2IVVWRSlVkZ/wXMaLyneBm', '2024-05-12 11:43:44');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_otp`
--

CREATE TABLE `password_reset_otp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(190) DEFAULT NULL,
  `otp` varchar(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_reset_otp`
--

INSERT INTO `password_reset_otp` (`id`, `email`, `otp`, `created_at`) VALUES
(1, 'dmlattanda@gmail.com', '8254', '2024-05-30 08:34:03'),
(2, 'damalaanewar@gmail.com', '3852', '2024-05-30 08:34:32'),
(3, 'damalaanewar@gmail.com', '8692', '2024-05-30 22:09:11');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('abiodoundamala@gmail.com', '$2y$12$WO6xB6KtpLJhFHhonhAwNu2VDCvoqteoHrS1pA6Ro5aFDeugjk9uC', '2024-05-22 20:30:14'),
('damalaelanewar@gmail.com', '$2y$12$6Zej1J30UYutUl2kj4AjE..MQmEq1p5viSb78ByoVXJogPJXrvQum', '2024-05-06 13:01:44');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codePays` bigint(20) DEFAULT NULL,
  `nomPays` varchar(255) DEFAULT NULL,
  `flags` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `codePays`, `nomPays`, `flags`, `created_at`, `updated_at`) VALUES
(1, 93, 'Afghanistan', 'af.png', NULL, NULL),
(2, 27, 'Afrique du Sud', 'za.png', NULL, NULL),
(3, 213, 'Algérie', 'dz.png', NULL, NULL),
(4, 355, 'Albanie', 'al.png', NULL, NULL),
(5, 49, 'Allemagne', 'de.png', NULL, NULL),
(6, 376, 'Andorre', 'ad.png', NULL, NULL),
(7, 1264, 'Anguilla', 'ai.png', NULL, NULL),
(8, 672, 'Antarctique', 'aq.png', NULL, NULL),
(9, 1268, 'Antigua-et-Barbuda', 'ag.png', NULL, NULL),
(10, 966, 'Arabie saoudite', 'sa.png', NULL, NULL),
(11, 54, 'Argentine', 'ar.png', NULL, NULL),
(12, 374, 'Arménie', 'am.png', NULL, NULL),
(13, 297, 'Aruba', 'aw.png', NULL, NULL),
(14, 61, 'Australie', 'au.png', NULL, NULL),
(15, 43, 'Autriche', 'at.png', NULL, NULL),
(16, 994, 'Azerbaïdjan', 'az.png', NULL, NULL),
(17, 1242, 'Bahamas', 'bs.png', NULL, NULL),
(18, 973, 'Bahreïn', 'bh.png', NULL, NULL),
(19, 880, 'Bangladesh', 'bd.png', NULL, NULL),
(20, 1246, 'Barbade', 'bb.png', NULL, NULL),
(21, 32, 'Belgique', 'be.png', NULL, NULL),
(22, 501, 'Belize', 'bz.png', NULL, NULL),
(23, 229, 'Bénin', 'bj.png', NULL, NULL),
(24, 1441, 'Bermudes', 'bm.png', NULL, NULL),
(25, 975, 'Bhoutan', 'bt.png', NULL, NULL),
(26, 375, 'Biélorussie', 'by.png', NULL, NULL),
(27, 591, 'Bolivie', 'bo.png', NULL, NULL),
(28, 387, 'Bosnie-Herzégovine', 'ba.png', NULL, NULL),
(29, 267, 'Botswana', 'bw.png', NULL, NULL),
(30, 55, 'Brésil', 'br.png', NULL, NULL),
(31, 673, 'Brunei', 'bn.png', NULL, NULL),
(32, 359, 'Bulgarie', 'bg.png', NULL, NULL),
(33, 226, 'Burkina Faso', 'bf.png', NULL, NULL),
(34, 257, 'Burundi', 'bi.png', NULL, NULL),
(35, 237, 'Cameroun', 'cm.png', NULL, NULL),
(36, 1, 'Canada', 'ca.png', NULL, NULL),
(37, 238, 'Cap-Vert', 'cv.png', NULL, NULL),
(38, 56, 'Chili', 'cl.png', NULL, NULL),
(39, 86, 'Chine', 'cn.png', NULL, NULL),
(40, 357, 'Chypre', 'cy.png', NULL, NULL),
(41, 57, 'Colombie', 'co.png', NULL, NULL),
(42, 269, 'Comores', 'km.png', NULL, NULL),
(43, 850, 'Corée du Nord', 'kp.png', NULL, NULL),
(44, 82, 'Corée du Sud', 'kr.png', NULL, NULL),
(45, 506, 'Costa Rica', 'cr.png', NULL, NULL),
(46, 225, 'Côte d’Ivoire', 'ci.png', NULL, NULL),
(47, 385, 'Croatie', 'hr.png', NULL, NULL),
(48, 53, 'Cuba', 'cu.png', NULL, NULL),
(49, 599, 'Curaçao', 'cw.png', NULL, NULL),
(50, 45, 'Danemark', 'dk.png', NULL, NULL),
(51, 253, 'Djibouti', 'dj.png', NULL, NULL),
(52, 1767, 'Dominique', 'dm.png', NULL, NULL),
(53, 20, 'Égypte', 'eg.png', NULL, NULL),
(54, 971, 'Émirats arabes unis', 'ae.png', NULL, NULL),
(55, 593, 'Équateur', 'ec.png', NULL, NULL),
(56, 291, 'Érythrée', 'er.png', NULL, NULL),
(57, 34, 'Espagne', 'es.png', NULL, NULL),
(58, 372, 'Estonie', 'ee.png', NULL, NULL),
(59, 268, 'Eswatini', 'sz.png', NULL, NULL),
(60, 1, 'États-Unis', 'us.png', NULL, NULL),
(61, 251, 'Éthiopie', 'et.png', NULL, NULL),
(62, 679, 'Fidji', 'fj.png', NULL, NULL),
(63, 358, 'Finlande', 'fi.png', NULL, NULL),
(64, 33, 'France', 'fr.png', NULL, NULL),
(65, 241, 'Gabon', 'ga.png', NULL, NULL),
(66, 220, 'Gambie', 'gm.png', NULL, NULL),
(67, 995, 'Géorgie', 'ge.png', NULL, NULL),
(68, 500, 'Géorgie du Sud-et-les Îles Sandwich du Sud', 'gs.png', NULL, NULL),
(69, 233, 'Ghana', 'gh.png', NULL, NULL),
(70, 350, 'Gibraltar', 'gi.png', NULL, NULL),
(71, 30, 'Grèce', 'gr.png', NULL, NULL),
(72, 1473, 'Grenade', 'gd.png', NULL, NULL),
(73, 299, 'Groenland', 'gl.png', NULL, NULL),
(74, 590, 'Guadeloupe', 'gp.png', NULL, NULL),
(75, 1671, 'Guam', 'gu.png', NULL, NULL),
(76, 502, 'Guatemala', 'gt.png', NULL, NULL),
(77, 44, 'Guernesey', 'gg.png', NULL, NULL),
(78, 224, 'Guinée', 'gn.png', NULL, NULL),
(79, 240, 'Guinée équatoriale', 'gq.png', NULL, NULL),
(80, 245, 'Guinée-Bissau', 'gw.png', NULL, NULL),
(81, 592, 'Guyana', 'gy.png', NULL, NULL),
(82, 594, 'Guyane française', 'gf.png', NULL, NULL),
(83, 509, 'Haïti', 'ht.png', NULL, NULL),
(84, 504, 'Honduras', 'hn.png', NULL, NULL),
(85, 852, 'Hong Kong', 'hk.png', NULL, NULL),
(86, 36, 'Hongrie', 'hu.png', NULL, NULL),
(87, 47, 'Île Bouvet', 'bv.png', NULL, NULL),
(88, 61, 'Île Christmas', 'cx.png', NULL, NULL),
(89, 44, 'Île de Man', 'im.png', NULL, NULL),
(90, 358, 'Îles Åland', 'ax.png', NULL, NULL),
(91, 1345, 'Îles Caïmans', 'ky.png', NULL, NULL),
(92, 61, 'Îles Cocos', 'cc.png', NULL, NULL),
(93, 682, 'Îles Cook', 'ck.png', NULL, NULL),
(94, 298, 'Îles Féroé', 'fo.png', NULL, NULL),
(95, 672, 'Îles Heard-et-MacDonald', 'hm.png', NULL, NULL),
(96, 1670, 'Îles Mariannes du Nord', 'mp.png', NULL, NULL),
(97, 692, 'Îles Marshall', 'mh.png', NULL, NULL),
(98, 1, 'Îles mineures éloignées des États-Unis', 'um.png', NULL, NULL),
(99, 672, 'Îles Norfolk', 'nf.png', NULL, NULL),
(100, 64, 'Îles Pitcairn', 'pn.png', NULL, NULL),
(101, 677, 'Îles Salomon', 'sb.png', NULL, NULL),
(102, 1649, 'Îles Turques-et-Caïques', 'tc.png', NULL, NULL),
(103, 1284, 'Îles Vierges britanniques', 'vg.png', NULL, NULL),
(104, 1340, 'Îles Vierges des États-Unis', 'vi.png', NULL, NULL),
(105, 91, 'Inde', 'in.png', NULL, NULL),
(106, 62, 'Indonésie', 'id.png', NULL, NULL),
(107, 98, 'Iran', 'ir.png', NULL, NULL),
(108, 964, 'Irak', 'iq.png', NULL, NULL),
(109, 353, 'Irlande', 'ie.png', NULL, NULL),
(110, 44, 'Islande', 'is.png', NULL, NULL),
(111, 972, 'Israël', 'il.png', NULL, NULL),
(112, 39, 'Italie', 'it.png', NULL, NULL),
(113, 1876, 'Jamaïque', 'jm.png', NULL, NULL),
(114, 81, 'Japon', 'jp.png', NULL, NULL),
(115, 44, 'Jersey', 'je.png', NULL, NULL),
(116, 962, 'Jordanie', 'jo.png', NULL, NULL),
(117, 7, 'Kazakhstan', 'kz.png', NULL, NULL),
(118, 254, 'Kenya', 'ke.png', NULL, NULL),
(119, 996, 'Kirghizistan', 'kg.png', NULL, NULL),
(120, 686, 'Kiribati', 'ki.png', NULL, NULL),
(121, 383, 'Kosovo', 'xk.png', NULL, NULL),
(122, 965, 'Koweït', 'kw.png', NULL, NULL),
(123, 856, 'Laos', 'la.png', NULL, NULL),
(124, 266, 'Lesotho', 'ls.png', NULL, NULL),
(125, 371, 'Lettonie', 'lv.png', NULL, NULL),
(126, 961, 'Liban', 'lb.png', NULL, NULL),
(127, 231, 'Libéria', 'lr.png', NULL, NULL),
(128, 218, 'Libye', 'ly.png', NULL, NULL),
(129, 423, 'Liechtenstein', 'li.png', NULL, NULL),
(130, 370, 'Lituanie', 'lt.png', NULL, NULL),
(131, 352, 'Luxembourg', 'lu.png', NULL, NULL),
(132, 853, 'Macao', 'mo.png', NULL, NULL),
(133, 389, 'Macédoine du Nord', 'mk.png', NULL, NULL),
(134, 261, 'Madagascar', 'mg.png', NULL, NULL),
(135, 60, 'Malaisie', 'my.png', NULL, NULL),
(136, 265, 'Malawi', 'mw.png', NULL, NULL),
(137, 960, 'Maldives', 'mv.png', NULL, NULL),
(138, 223, 'Mali', 'ml.png', NULL, NULL),
(139, 356, 'Malte', 'mt.png', NULL, NULL),
(140, 212, 'Maroc', 'ma.png', NULL, NULL),
(141, 692, 'Marshall', 'mh.png', NULL, NULL),
(142, 596, 'Martinique', 'mq.png', NULL, NULL),
(143, 222, 'Mauritanie', 'mr.png', NULL, NULL),
(144, 230, 'Maurice', 'mu.png', NULL, NULL),
(145, 262, 'Mayotte', 'yt.png', NULL, NULL),
(146, 52, 'Mexique', 'mx.png', NULL, NULL),
(147, 691, 'Micronésie', 'fm.png', NULL, NULL),
(148, 373, 'Moldavie', 'md.png', NULL, NULL),
(149, 377, 'Monaco', 'mc.png', NULL, NULL),
(150, 976, 'Mongolie', 'mn.png', NULL, NULL),
(151, 382, 'Monténégro', 'me.png', NULL, NULL),
(152, 1664, 'Montserrat', 'ms.png', NULL, NULL),
(153, 258, 'Mozambique', 'mz.png', NULL, NULL),
(154, 264, 'Namibie', 'na.png', NULL, NULL),
(155, 674, 'Nauru', 'nr.png', NULL, NULL),
(156, 977, 'Népal', 'np.png', NULL, NULL),
(157, 505, 'Nicaragua', 'ni.png', NULL, NULL),
(158, 227, 'Niger', 'ne.png', NULL, NULL),
(159, 234, 'Nigéria', 'ng.png', NULL, NULL),
(160, 683, 'Niue', 'nu.png', NULL, NULL),
(161, 672, 'Norfolk', 'nf.png', NULL, NULL),
(162, 47, 'Norvège', 'no.png', NULL, NULL),
(163, 687, 'Nouvelle-Calédonie', 'nc.png', NULL, NULL),
(164, 64, 'Nouvelle-Zélande', 'nz.png', NULL, NULL),
(165, 968, 'Oman', 'om.png', NULL, NULL),
(166, 256, 'Ouganda', 'ug.png', NULL, NULL),
(167, 998, 'Ouzbékistan', 'uz.png', NULL, NULL),
(168, 92, 'Pakistan', 'pk.png', NULL, NULL),
(169, 680, 'Palaos', 'pw.png', NULL, NULL),
(170, 970, 'Palestine', 'ps.png', NULL, NULL),
(171, 507, 'Panama', 'pa.png', NULL, NULL),
(172, 675, 'Papouasie-Nouvelle-Guinée', 'pg.png', NULL, NULL),
(173, 595, 'Paraguay', 'py.png', NULL, NULL),
(174, 31, 'Pays-Bas', 'nl.png', NULL, NULL),
(175, 51, 'Pérou', 'pe.png', NULL, NULL),
(176, 63, 'Philippines', 'ph.png', NULL, NULL),
(177, 48, 'Pologne', 'pl.png', NULL, NULL),
(178, 689, 'Polynésie française', 'pf.png', NULL, NULL),
(179, 351, 'Portugal', 'pt.png', NULL, NULL),
(180, 1, 'Porto Rico', 'pr.png', NULL, NULL),
(181, 974, 'Qatar', 'qa.png', NULL, NULL),
(182, 262, 'Réunion', 're.png', NULL, NULL),
(183, 40, 'Roumanie', 'ro.png', NULL, NULL),
(184, 44, 'Royaume-Uni', 'gb.png', NULL, NULL),
(185, 7, 'Russie', 'ru.png', NULL, NULL),
(186, 250, 'Rwanda', 'rw.png', NULL, NULL),
(187, 212, 'Sahara occidental', 'eh.png', NULL, NULL),
(188, 685, 'Samoa', 'ws.png', NULL, NULL),
(189, 378, 'Saint-Marin', 'sm.png', NULL, NULL),
(190, 239, 'Sao Tomé-et-Principe', 'st.png', NULL, NULL),
(191, 221, 'Sénégal', 'sn.png', NULL, NULL),
(192, 381, 'Serbie', 'rs.png', NULL, NULL),
(193, 248, 'Seychelles', 'sc.png', NULL, NULL),
(194, 232, 'Sierra Leone', 'sl.png', NULL, NULL),
(195, 65, 'Singapour', 'sg.png', NULL, NULL),
(196, 421, 'Slovaquie', 'sk.png', NULL, NULL),
(197, 386, 'Slovénie', 'si.png', NULL, NULL),
(198, 252, 'Somalie', 'so.png', NULL, NULL),
(199, 249, 'Soudan', 'sd.png', NULL, NULL),
(200, 211, 'Soudan du Sud', 'ss.png', NULL, NULL),
(201, 94, 'Sri Lanka', 'lk.png', NULL, NULL),
(202, 46, 'Suède', 'se.png', NULL, NULL),
(203, 41, 'Suisse', 'ch.png', NULL, NULL),
(204, 597, 'Suriname', 'sr.png', NULL, NULL),
(205, 963, 'Syrie', 'sy.png', NULL, NULL),
(206, 268, 'Swaziland', 'sz.png', NULL, NULL),
(207, 992, 'Tadjikistan', 'tj.png', NULL, NULL),
(208, 255, 'Tanzanie', 'tz.png', NULL, NULL),
(209, 235, 'Tchad', 'td.png', NULL, NULL),
(210, 420, 'Tchéquie', 'cz.png', NULL, NULL),
(211, 66, 'Thaïlande', 'th.png', NULL, NULL),
(212, 670, 'Timor oriental', 'tl.png', NULL, NULL),
(213, 228, 'Togo', 'tg.png', NULL, NULL),
(214, 676, 'Tonga', 'to.png', NULL, NULL),
(215, 1868, 'Trinité-et-Tobago', 'tt.png', NULL, NULL),
(216, 216, 'Tunisie', 'tn.png', NULL, NULL),
(217, 993, 'Turkménistan', 'tm.png', NULL, NULL),
(218, 90, 'Turquie', 'tr.png', NULL, NULL),
(219, 688, 'Tuvalu', 'tv.png', NULL, NULL),
(220, 380, 'Ukraine', 'ua.png', NULL, NULL),
(221, 598, 'Uruguay', 'uy.png', NULL, NULL),
(222, 678, 'Vanuatu', 'vu.png', NULL, NULL),
(223, 379, 'Vatican', 'va.png', NULL, NULL),
(224, 58, 'Venezuela', 've.png', NULL, NULL),
(225, 84, 'Viêt Nam', 'vn.png', NULL, NULL),
(226, 681, 'Wallis-et-Futuna', 'wf.png', NULL, NULL),
(227, 967, 'Yémen', 'ye.png', NULL, NULL),
(228, 260, 'Zambie', 'zm.png', NULL, NULL),
(229, 263, 'Zimbabwe', 'zw.png', NULL, NULL),
(230, 260, 'Zambie', 'zm.png', NULL, NULL),
(231, 263, 'Zimbabwe', 'zw.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `cle` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `cle`, `created_at`, `updated_at`) VALUES
(2, 'Providers', 'task_providers', '2024-02-12 16:38:46', '2024-02-12 16:38:46'),
(3, 'Restaurants', 'task_restaurant', '2024-02-12 16:38:46', '2024-02-12 16:38:46'),
(4, 'Transfers', 'task_transfers', '2024-02-12 16:38:46', '2024-02-12 16:38:46'),
(5, 'Under', 'task_under', '2024-02-12 16:38:46', '2024-02-12 16:38:46'),
(6, 'My Profile', 'task_profile', '2024-02-12 16:38:46', '2024-02-12 16:38:46'),
(7, 'Auth double factor', 'task_2fa', '2024-02-12 16:38:46', '2024-02-12 16:38:46'),
(8, 'Edit', 'task_edit', '2024-02-12 16:49:18', '2024-02-12 16:49:18'),
(9, 'Add', 'task_add', '2024-02-12 16:49:18', '2024-02-12 16:49:18'),
(10, 'Delete', 'task_delete', '2024-02-12 16:49:18', '2024-02-12 16:49:18'),
(11, 'Providers Category', 'task_providers_category', '2024-02-29 12:32:29', '2024-02-29 12:32:29'),
(12, 'Bussiness Category', 'task_bussiness_category', '2024-02-29 12:32:29', '2024-02-29 12:32:29'),
(13, 'Country', 'task_country', '2024-02-29 12:49:54', '2024-02-29 12:49:54'),
(14, 'Product Category', 'task_product_category', '2024-04-08 08:11:27', '2024-04-08 08:11:27'),
(15, ' Measurement', 'task_measurement', '2024-04-08 08:11:27', '2024-04-08 08:11:27'),
(16, 'Gallery', 'task_gallery', '2024-04-08 08:15:43', '2024-04-08 08:15:43'),
(17, 'Orders', 'task_orders', '2024-04-08 08:19:36', '2024-04-08 08:19:36');

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE `personnes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Fournisseur', '2024-01-24 04:12:58', '2024-01-24 04:12:58'),
(2, 'Entreprise', '2024-01-24 04:12:58', '2024-01-24 04:12:58');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `task` varchar(255) DEFAULT NULL,
  `code_pays` varchar(255) DEFAULT NULL,
  `idpays` int(11) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `otp` varchar(255) DEFAULT NULL,
  `otp_expires_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `matricule` varchar(255) DEFAULT NULL,
  `tokenUser` varchar(190) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `email`, `role`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `task`, `code_pays`, `idpays`, `telephone`, `image`, `occupation`, `otp`, `otp_expires_at`, `email_verified_at`, `matricule`, `tokenUser`, `remember_token`, `created_at`, `updated_at`) VALUES
(190, 'DAMALA', 'El Anewar', 'damalaelanewar@gmail.com', '2', '$2y$10$0dfWOMSO1uP5YAm.9HQpJu51CpDI2lfC7RuBUEAV7RVONDc/sEGs2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3597', NULL, '2024-06-20 14:53:36', NULL, NULL, NULL, '2024-06-20 14:34:17', '2024-06-20 14:53:36'),
(191, 'User', NULL, 'user@cambotutorial.com', '0', '$2y$10$K0Z7olosc.poLQgLbSYoyOuVVuoEFnsjvTfWQoqJQvIJbH1RwqzAu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-20 14:55:59', '2024-06-20 14:55:59'),
(192, 'Editor', NULL, 'editor@cambotutorial.com', '1', '$2y$10$ms9pB1qAydHsmuhVTRtXAedrlnjEIL1thwsNmV1gRl.Hwj3yPz/QC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-20 14:55:59', '2024-06-20 14:55:59'),
(193, 'Admin', NULL, 'admin@cambotutorial.com', '3', '$2y$10$2fPz6.dwAW9vuXqTjOxuyucA7xdppbBjYhAy43z6FBFYKOfnW3qpG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8537', NULL, NULL, NULL, NULL, NULL, '2024-06-20 14:55:59', '2024-06-20 15:00:16');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `information_entreprises`
--
ALTER TABLE `information_entreprises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `information_entreprises_iduser_foreign` (`idUser`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `password_reset_otp`
--
ALTER TABLE `password_reset_otp`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `information_entreprises`
--
ALTER TABLE `information_entreprises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `password_reset_otp`
--
ALTER TABLE `password_reset_otp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `information_entreprises`
--
ALTER TABLE `information_entreprises`
  ADD CONSTRAINT `information_entreprises_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
