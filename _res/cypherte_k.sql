-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Maio-2020 às 16:38
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cypherte_k`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `convites`
--

CREATE TABLE `convites` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `data_ini` datetime NOT NULL,
  `convite` varchar(300) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `usado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dashboard`
--

CREATE TABLE `dashboard` (
  `id` int(11) NOT NULL,
  `solicitacao` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `datainfo` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `resposta` text DEFAULT NULL,
  `dataconclusao` datetime DEFAULT NULL,
  `idmod` int(11) DEFAULT NULL,
  `alvo` int(11) NOT NULL,
  `idlink` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dashtipos`
--

CREATE TABLE `dashtipos` (
  `id` int(11) NOT NULL,
  `tipo` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `dashtipos`
--

INSERT INTO `dashtipos` (`id`, `tipo`) VALUES
(0, 'Denúncia'),
(1, 'Comunicado'),
(2, 'Link (download)');

-- --------------------------------------------------------

--
-- Estrutura da tabela `geral`
--

CREATE TABLE `geral` (
  `id` int(11) NOT NULL,
  `logo` varchar(10) NOT NULL,
  `sub_titulo` varchar(300) DEFAULT NULL,
  `livro_capa_padrao` varchar(10) DEFAULT NULL,
  `livro_capa_tamanho` double NOT NULL,
  `livro_capa_max_x` int(11) NOT NULL,
  `livro_capa_max_y` int(11) NOT NULL,
  `livro_capa_min_x` int(11) NOT NULL,
  `livro_capa_min_y` int(11) NOT NULL,
  `avatar_padrao` varchar(10) DEFAULT 'NULL',
  `avatar_tamanho` double NOT NULL,
  `avatar_max_x` int(11) NOT NULL,
  `avatar_max_y` int(11) NOT NULL,
  `avatar_min_x` int(11) NOT NULL,
  `avatar_min_y` int(11) NOT NULL,
  `info_lateral` text DEFAULT NULL,
  `rodape` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livroautor`
--

CREATE TABLE `livroautor` (
  `id` int(11) NOT NULL,
  `autor` varchar(150) NOT NULL,
  `link` varchar(300) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `datanasci` date DEFAULT NULL,
  `foto` varchar(10) DEFAULT NULL,
  `datafalec` date DEFAULT NULL,
  `editavel` int(11) NOT NULL DEFAULT 1,
  `indie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livroautor`
--

INSERT INTO `livroautor` (`id`, `autor`, `link`, `bio`, `datanasci`, `foto`, `datafalec`, `editavel`, `indie`) VALUES
(0, '', '', NULL, NULL, NULL, NULL, 0, NULL),
(6, 'Lain Samui', '', '', NULL, NULL, NULL, 0, 1),
(7, 'Edwin A. Abbott', '', '', NULL, '7.jpg', NULL, 1, 0),
(8, 'Tsugumi Ohba', '', '', NULL, NULL, NULL, 1, 0),
(9, 'Frederico Lamberti Pissarra', '', '', NULL, NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livroavaliacao`
--

CREATE TABLE `livroavaliacao` (
  `id` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `positivo` int(11) DEFAULT NULL,
  `negativo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livrocat`
--

CREATE TABLE `livrocat` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `editavel` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livrocat`
--

INSERT INTO `livrocat` (`id`, `categoria`, `editavel`) VALUES
(1, 'Religião', 0),
(2, 'Infanto-Juvenil', 0),
(3, 'Romance', 0),
(4, 'Exatas', 0),
(5, 'Biografia', 0),
(6, 'Sociologia', 0),
(7, 'Erótico', 0),
(8, 'Fic-Cientifica', 0),
(9, 'Fic-Fantástica', 0),
(10, 'Fic-Supense', 0),
(11, 'Geografia', 0),
(12, 'História', 0),
(13, 'Ensaios', 0),
(14, 'Economia', 0),
(15, 'Filosofia', 0),
(16, 'Política', 0),
(17, 'Humor', 0),
(18, 'Direito', 0),
(19, 'Crônicas/ Contos', 0),
(20, 'Artes', 0),
(21, 'Concurso Público', 0),
(22, 'Aventura', 0),
(23, 'Linguística', 0),
(24, 'Medicina', 0),
(25, 'Poesia', 0),
(26, 'Policial', 0),
(27, 'Psicologia', 0),
(28, 'Teoria e Crítica', 0),
(29, 'Terror e Suspense', 0),
(30, 'Ufologia', 0),
(31, 'Espiritual', 0),
(32, 'Manuais /Tutoriais', 0),
(33, 'Dicionários', 0),
(34, 'Teoria e Conspiração', 0),
(37, 'Ocultismo', 0),
(38, 'Quadrinhos', 0),
(39, 'Informática', 0),
(40, 'Literatura', 0),
(41, 'Programação', 0),
(42, 'Herbalismo', 0),
(43, 'Jornalismo', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livrocomentarios`
--

CREATE TABLE `livrocomentarios` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL,
  `data_pub` datetime NOT NULL,
  `ativo` int(11) NOT NULL DEFAULT 1,
  `data_alt` datetime DEFAULT NULL,
  `texto` text NOT NULL,
  `moderador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livroeditoras`
--

CREATE TABLE `livroeditoras` (
  `id` int(11) NOT NULL,
  `editora` varchar(300) NOT NULL,
  `link` varchar(300) DEFAULT NULL,
  `editavel` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livroeditoras`
--

INSERT INTO `livroeditoras` (`id`, `editora`, `link`, `editavel`) VALUES
(0, '', '', 1),
(5, 'Conrad Livros', '', 1),
(6, 'Editora Rocco', '', 1),
(7, 'Shueisha', '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livroformatos`
--

CREATE TABLE `livroformatos` (
  `id` int(11) NOT NULL,
  `ext` varchar(7) NOT NULL,
  `software` varchar(150) DEFAULT NULL,
  `editavel` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livroformatos`
--

INSERT INTO `livroformatos` (`id`, `ext`, `software`, `editavel`) VALUES
(1, 'mobi', 'Mobipocket', 0),
(2, 'doc', 'Microsoft Office', 0),
(3, 'docx', 'Microsoft Office', 0),
(4, 'xls', 'Microsoft Office', 0),
(5, 'xlsx', 'Microsoft Office', 0),
(6, 'txt', '', 0),
(7, 'odt', 'Open Office', 0),
(8, 'epub', '', 0),
(9, 'jpg', NULL, 0),
(10, 'cbr', 'Winrar, Zip', 0),
(12, 'ods', 'Open Office', 0),
(13, 'odp', 'Open Office', 0),
(14, 'odf', 'Open Office', 0),
(15, 'ppt', 'Microsoft Office', 0),
(16, 'pptx', 'Microsoft Office', 0),
(17, 'torrent', 'ųTorrent', 0),
(20, 'pdf', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livroidioma`
--

CREATE TABLE `livroidioma` (
  `id` int(11) NOT NULL,
  `idioma` varchar(150) NOT NULL,
  `editavel` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livroidioma`
--

INSERT INTO `livroidioma` (`id`, `idioma`, `editavel`) VALUES
(1, 'Português', 0),
(3, 'Inglês', 0),
(5, 'Francês', 0),
(6, 'Russo', 0),
(7, 'Espanhol', 0),
(8, 'Japonês', 0),
(9, 'Latim', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livrolinks`
--

CREATE TABLE `livrolinks` (
  `id` int(11) NOT NULL,
  `link` varchar(300) NOT NULL,
  `idformato` int(11) NOT NULL,
  `idlivro` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `dataenvio` datetime NOT NULL,
  `n_downloads` int(11) DEFAULT NULL,
  `partes` int(11) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `ativo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livrolinks`
--

INSERT INTO `livrolinks` (`id`, `link`, `idformato`, `idlivro`, `iduser`, `dataenvio`, `n_downloads`, `partes`, `descricao`, `ativo`) VALUES
(12, 'mega.nz/#!790SCIZI!8bIHEBuGzhhJEslZJfdzLSAMAIXUg_0J7-IASgvGlu4', 1, 28, 7, '2019-10-03 00:18:00', NULL, NULL, '', 1),
(13, 'mega.nz/#!ZdlSmKLR!WXFBxt9hzYIlbeFEGL4vlyBnNUmrQOsgs1PAsTHfRxw', 20, 29, 7, '2019-10-16 13:55:00', NULL, NULL, '', 1),
(14, 'mega.nz/#!QB8AEQpT!gAZ9u3PUaXjLH0G9I4kEGl_QWHFDnypPiJYukq74CVY', 20, 30, 7, '2019-10-16 14:26:00', NULL, NULL, '', 1),
(15, 'mega.nz/#!pMkGFYKC!ZzfHCUu-LXjlzbRK2XgGKIlC3rIqBgyQ-T9hcPbz6AI', 20, 31, 7, '2019-10-16 14:24:00', NULL, NULL, '', 1),
(16, 'mega.nz/#!oYkQFCxB!-2CC8MiQqyx34TAtlr2LnT57Z5rTLQJCW_zPfacBGRg', 20, 32, 7, '2019-10-16 14:06:00', NULL, NULL, '', 1),
(17, 'mega.nz/#!cEtSQAxI!I70szYhgw8hXcaiWrxI66bq4naQVwrzm6Q5dBvP8diA', 20, 33, 7, '2019-10-16 14:15:00', NULL, NULL, '', 1),
(18, 'mega.nz/#!5I10HYhD!7XseVj0hz03TJgGQO-O5YczCUD7Mh3IkJJ3D3i7kOWI', 20, 34, 7, '2019-10-16 14:28:00', NULL, NULL, '', 1),
(19, 'mega.nz/#!tV0CCCbY!986ccA7Qgd4q0AtmMdRWgiJMdY6AM1eogdCGhvCp5pQ', 20, 35, 7, '2019-10-16 14:58:00', NULL, NULL, '', 1),
(20, 'mega.nz/#!cJ0EXaTL!cNdqAppPjl6QgiwOkvQUSRSPARiAw0p_HboQ0ENfmiE', 20, 36, 7, '2019-10-16 14:29:00', NULL, NULL, '', 1),
(21, 'mega.nz/#!sZ9kmK5I!oaYm-nyatLKaKhSxd0hH03_ApIZIbCbq5gmvET43rtM', 20, 37, 7, '2019-10-16 14:57:00', NULL, NULL, '', 1),
(22, 'mega.nz/#!IB0EXYZb!FioDL15LrEmMxC2vUHlnjWb3Gw5gvYKOuqCv86ocB_w', 20, 38, 7, '2019-10-16 14:29:00', NULL, NULL, '', 1),
(23, 'mega.nz/#!xAsgyYSR!3zA6sVCVdZSpmTWlG2A9z8N-LS0L1wD4kV1F1uty_6A', 20, 39, 7, '2019-10-16 14:06:00', NULL, NULL, '', 1),
(24, 'mega.nz/#!EFlQxQ5K!xU0OJqpVyDHFgF0YbTZ8IW0fYp18kZnRLQT9R_GjCuQ', 20, 40, 7, '2019-10-16 14:37:00', NULL, NULL, '', 1),
(25, 'mega.nz/#!MQ1gmChC!DHQZtHk9cWiBSaKTEzrZISKG2GqPROWZTyD_pf5OW1w', 20, 41, 7, '2019-10-16 14:11:00', NULL, NULL, '', 1),
(26, 'mega.nz/#!gZl0mQ4Z!3hShm9L2oH7xSGFLjyaF4Pa_wsAMV5P_o3wlr-c_1nA', 20, 42, 7, '2019-10-16 14:43:00', NULL, NULL, '', 1),
(27, 'mega.nz/#!BR0glIhD!gtcdv-mAuinOJYFwYIReIPftZQO0Zx4jXQXroQuQs6g', 20, 43, 7, '2019-10-16 14:13:00', NULL, NULL, '', 1),
(28, 'mega.nz/#!Vc0gBCoD!qDcRVAWAjZwvKxMKu3ghE8cJpirlRp9p-npo-r9EroE', 20, 44, 7, '2019-10-16 14:52:00', NULL, NULL, '', 1),
(29, 'mega.nz/#!dEswTIwY!xSsO330vMS1BMtZWm5BbjlYhNtfJ4tlxn8fwKgMxoPg', 20, 45, 7, '2019-10-16 14:37:00', NULL, NULL, '', 1),
(30, 'mega.nz/#!xF9UHIYR!eGDflcSdbFpyxYLntdmfXfoz7Osg9hOYLwvwrOTmHKQ', 20, 46, 7, '2019-10-16 15:36:00', NULL, NULL, '', 1),
(31, 'mega.nz/#!4Z8SGQAB!O_BeTF1Mi07UDEcDarB3WPPyu9wh-l5HaUq6Nx4y7y4', 20, 47, 7, '2019-10-16 15:15:00', NULL, NULL, '', 1),
(32, 'mega.nz/#!sclgiaZJ!wD3PcIMHdHJCs7BE_vTZE0jEx-Nd4y8kgrIRMfk8B5o', 20, 48, 7, '2019-10-16 15:46:00', NULL, NULL, '', 1),
(33, 'mega.nz/#!AI9WUCbb!rm0NlyAcFohhjgKc-st2hfYR644dpfVXyxWTO00Up8o', 20, 49, 7, '2019-10-16 15:27:00', NULL, NULL, '', 1),
(34, 'mega.nz/#!MQ1QmAyD!bXlPA59gu1W5uK0Ido4rQ3qNMHoSxp7eVwu-WuS5UaM', 20, 50, 7, '2019-10-16 15:58:00', NULL, NULL, '', 1),
(35, 'mega.nz/#!gM1gkCiY!vRWe9GeUr0CRa9pzjypXogvRyUu4dRKEAkBBjLq-rwg', 20, 51, 7, '2019-10-16 15:31:00', NULL, NULL, '', 1),
(36, 'mega.nz/#!kc9WnA6D!Ficju_nG3Dq3T0FpBYNXnRpyZ62x-KteKk_kUO9QW9w', 20, 52, 7, '2019-10-16 15:56:00', NULL, NULL, '', 1),
(37, 'mega.nz/#!lA0EEQRQ!j1gtidJummZZ7J84p6bEHOKOXKhhRCrz7ZfErw2GHNQ', 20, 53, 7, '2019-10-16 15:21:00', NULL, NULL, '', 1),
(38, 'mega.nz/#!RdtSzCiC!ggJtpVW8EVFqtpi9RNyDXRx6nM6uGPWAY3BS_n2F7Bs', 20, 54, 7, '2019-10-16 15:44:00', NULL, NULL, '', 1),
(39, 'mega.nz/#!xM80AABL!yEkV0Pqhc0dlWPbbNG61MpnPqsqAFyh3jA8HK2QFp4M', 20, 55, 7, '2019-10-16 15:19:00', NULL, NULL, '', 1),
(40, 'mega.nz/#!kQkEGK7R!GuUL8ntmVwygQ5KbvaXDOwzvionZ1OU91XstDP7KqZE', 20, 56, 7, '2019-10-16 15:43:00', NULL, NULL, '', 1),
(41, 'mega.nz/#!IZ0SjIBB!a11DbIE6A-vtfvP1Ot8R5sqBg2EqwyNmmIpSb2t3_ic', 20, 57, 7, '2019-10-16 15:15:00', NULL, NULL, '', 1),
(42, 'mega.nz/#!8E0iSCbS!IzPW28CqtVp1-h0PKJdxgKQFIbDm6mS2Rc8SJk8su64', 20, 58, 7, '2019-10-16 15:48:00', NULL, NULL, '', 1),
(43, 'mega.nz/#!1Q8EDQYL!3UjoUDP7NUkRd1VCtMoSclnFXsw5P-IR1nmqGBMdiAM', 20, 59, 7, '2019-10-16 15:19:00', NULL, NULL, '', 1),
(44, 'mega.nz/#!QI8WRSrY!4ccJtRVHNBHlw7-KW5uwfvdosf480mifEyCvB6Wd63A', 20, 60, 7, '2019-10-16 15:52:00', NULL, NULL, '', 1),
(45, 'mega.nz/#!tdsSSY7a!smyyV8wLz5ruKeP_tVQNZUkz8VtloE6P079bpK67KlE', 20, 61, 7, '2019-10-16 15:17:00', NULL, NULL, '', 1),
(46, 'mega.nz/#!oVkm3IDQ!YVSAWuRhQ-Uwe7fO6USwm1jgHTX2_OUvAGFSf8Kyn1U', 20, 62, 7, '2019-10-16 15:43:00', NULL, NULL, '', 1),
(47, 'mega.nz/#!gZ0SzarS!SPhYCArc8Zrwn4hkvmOMXMfem6WvXdPP1lma7QAfLY8', 20, 63, 7, '2019-10-16 15:16:00', NULL, NULL, '', 0),
(48, 'mega.nz/#!BYlSlS5L!zn_Rl8ZkPVzcs-Fj-iRJUMwdxwxRq2Vq2tzbZXBQOts', 20, 63, 7, '2019-10-16 15:15:00', NULL, NULL, '', 1),
(49, 'mega.nz/#!gZ0SzarS!SPhYCArc8Zrwn4hkvmOMXMfem6WvXdPP1lma7QAfLY8', 20, 64, 7, '2019-10-16 15:53:00', NULL, NULL, '', 1),
(50, 'mega.nz/#!RUkESAoB!fzRlm0JJGNyBcu_Z7zNMs8Rqo8NpePhUWkiSzeYx5H4', 20, 65, 7, '2019-10-16 15:23:00', NULL, NULL, '', 1),
(51, 'mega.nz/#!EUkikQAD!YV-m_g4FEWAb8qKZqEy-kPQsMMHTb31dPSsMQc4tYnI', 20, 66, 7, '2019-10-16 15:49:00', NULL, NULL, '', 1),
(52, 'mega.nz/#!RJ8AFYKK!tGglW0MiyN-J8muHLg1KmyMdVz_OW9WOzs3urWa1SuA', 20, 67, 7, '2019-10-16 15:23:00', NULL, NULL, '', 1),
(53, 'mega.nz/#!UYkQTQLT!Hp4XYRPY6LTwxLLShfGwKHgJ4dOrRavtAL5-AN_gZO8', 9, 68, 7, '2019-10-16 15:46:00', NULL, NULL, '', 1),
(54, 'mega.nz/#!wBlQgKzC!kO88LTCBEllZ5dtlqB2VlSeVMZoSvMn9yV00-58xi9M', 9, 69, 7, '2019-10-16 15:17:00', NULL, NULL, '', 1),
(55, 'mega.nz/#!BJkizCQY!Z0WzQvF6HpcgRKAoIrQ7jE3xZHPawc8dxD0lt2Pv4dE', 9, 70, 7, '2019-10-16 15:43:00', NULL, NULL, '', 1),
(56, 'mega.nz/#!Zc0wmCYI!2ifys94gCYPJKp7gawHDgOFO-GsdaIJESY52xymDmpg', 9, 71, 7, '2019-10-16 15:04:00', NULL, NULL, '', 1),
(57, 'mega.nz/#!lV0CFYKK!mpwDpY55QZhYQwEgST3tJ43NAzfFcFDGQJkZ_ohrRe4', 9, 72, 7, '2019-10-16 15:26:00', NULL, NULL, '', 1),
(58, 'mega.nz/#!JNsWRAyL!ttmwyjdjofx_Uyi6EiPxc8wnaaEyIv_GH48zu64sUa0', 9, 73, 7, '2019-10-16 15:54:00', NULL, NULL, '', 1),
(59, 'mega.nz/#!JItw0QIS!UXslIfNbCXgqrsStrQkf8UelZxvNjDui2ayhbxZ6RHc', 9, 74, 7, '2019-10-16 15:22:00', NULL, NULL, '', 1),
(60, 'mega.nz/#!BMtGQapS!Gfnm9h8L23QVRCbIs5rZ2eBM1Zrg6DoomXxs4YHPHwg', 9, 75, 7, '2019-10-16 15:46:00', NULL, NULL, '', 1),
(61, 'mega.nz/#!dV8kWKYA!nSegcD4QiqIGjtxAOSrjc7TdlTAD06fvzBKJM8pmtbE', 9, 77, 7, '2019-10-16 15:10:00', NULL, NULL, '', 1),
(62, 'mega.nz/#!0N9ARAoY!Syv8ICRwHaxSUPVSNBomKISZ8zpiedwr-5_QWAOuBs8', 20, 78, 7, '2019-10-16 15:11:00', NULL, NULL, '', 1),
(63, 'mega.nz/#!0RsinKbb!0Ako52kxtxz1bbjBxUwSLYCB_ZOBD9G0ZdhkVGbjvpc', 20, 79, 7, '2019-10-16 15:33:00', NULL, NULL, '', 1),
(64, 'mega.nz/#!sVtiga7D!8434XeoRKPIgVsn8S7KdoQjVXO0aXFfR-AMXtpv7ITU', 20, 80, 7, '2019-10-16 15:04:00', NULL, NULL, '', 1),
(65, 'mega.nz/#!sR0AmSIa!8CBqQc4IH8MnW7ppuU7lBBk4MgLXnlQHbncXzDMMPUo', 20, 81, 7, '2019-10-16 15:27:00', NULL, NULL, '', 1),
(66, 'mega.nz/#!gI8GkIqD!a-0j-stxWUz-iHP8W2JlRyzs9Wmimzm3x9RtX2zUKrc', 9, 82, 7, '2019-10-16 15:50:00', NULL, NULL, '', 1),
(67, 'mega.nz/#!EJFniCgR!jj8yQRvfmrB0OL42m4sRb3_jsJqS11L8hPjmFUpGnG0', 9, 76, 7, '2019-10-16 18:04:00', NULL, NULL, '', 1),
(68, 'mega.nz/#!oJdxVC5S!ZBQpKTcS52hKqG-RPKgmoP2AzbhASTuKv6FADcRs4Zs', 9, 83, 7, '2019-10-16 18:48:00', NULL, NULL, '', 1),
(69, 'mega.nz/#!gJMRUATQ!GeZqN58V8j6lttgkboxR8iicqZO9_Ba6K8eidcG3mbc', 9, 84, 7, '2019-10-16 18:12:00', NULL, NULL, '', 1),
(70, 'mega.nz/#!IFUFkSLA!42MvnPiRBI7rdkmratbror6eByivodXIK6oN9zxfbr0', 9, 85, 7, '2019-10-16 18:40:00', NULL, NULL, '', 1),
(71, 'mega.nz/#!cUszCIRb!m5CmJI9IoTx6DvZE_gEaeR_HSlbFAinfVKcrgskUTaM', 20, 86, 7, '2019-10-18 23:48:00', NULL, NULL, '', 1),
(72, 'mega.nz/#!dEkViSzb!JiCN3vyFu0LtQ2K_VrH6wcOE2HJ2q1JIICR1pMEHR9U', 20, 87, 7, '2019-10-18 23:23:00', NULL, NULL, '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livropontos`
--

CREATE TABLE `livropontos` (
  `id` int(11) NOT NULL,
  `idlivro` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `pontos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livropontos`
--

INSERT INTO `livropontos` (`id`, `idlivro`, `iduser`, `pontos`) VALUES
(10, 28, 7, 1),
(11, 29, 7, 1),
(12, 88, 7, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `subtitulo` varchar(300) DEFAULT NULL,
  `capa` varchar(10) DEFAULT NULL,
  `sinopse` text DEFAULT NULL,
  `ano` int(11) DEFAULT NULL,
  `ididioma` int(11) DEFAULT NULL,
  `n_pag` int(11) DEFAULT NULL,
  `ideditora` int(11) DEFAULT NULL,
  `ISBN` int(11) DEFAULT NULL,
  `idautor` int(11) DEFAULT NULL,
  `link_comp` varchar(500) DEFAULT NULL,
  `idcategoria` int(11) DEFAULT NULL,
  `idserie` int(11) DEFAULT NULL,
  `edicao` int(11) DEFAULT NULL,
  `idtipo` int(11) DEFAULT NULL,
  `editavel` int(11) NOT NULL DEFAULT 1,
  `tags` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id`, `titulo`, `subtitulo`, `capa`, `sinopse`, `ano`, `ididioma`, `n_pag`, `ideditora`, `ISBN`, `idautor`, `link_comp`, `idcategoria`, `idserie`, `edicao`, `idtipo`, `editavel`, `tags`) VALUES
(28, 'Tábua Esmeralda', '', '28.jpg', '', NULL, 1, NULL, 0, NULL, 0, '', 37, 0, 1, 14, 1, '#hermetismo'),
(29, 'Planolândia', 'Um romance de muitas dimensões', '29.jpg', '', 1884, 1, 77, 5, NULL, 7, '', 31, 0, 1, 10, 1, NULL),
(30, 'As 48 Leis de Poder', '', '30.jpg', '', 2000, 1, NULL, 6, NULL, 0, '', 6, 0, 1, 10, 1, NULL),
(31, 'A Arte De Fazer Um Jornal Diário', '', '31.jpg', '', NULL, 1, NULL, 0, NULL, 0, '', 43, 0, 1, 10, 1, NULL),
(32, 'A Biblia Vampírica', '', '32.png', '', NULL, 1, NULL, 0, NULL, 0, '', 37, 0, 1, 10, 1, NULL),
(33, 'A criptografia funciona', '', NULL, '', NULL, 1, NULL, 0, NULL, 0, '', 39, 0, 1, 10, 1, NULL),
(34, 'A Divergência entre Feud e Jung', '', NULL, '', NULL, 1, NULL, 0, NULL, 0, '', 6, 0, 1, 10, 1, NULL),
(35, 'A Essência Da Mente', '', '35.jpg', '', NULL, 1, NULL, 0, NULL, 0, '', 6, 0, 1, 10, 1, NULL),
(36, 'A Grande Rebelião', '', '36.png', '', NULL, 1, NULL, 0, NULL, 0, '', 37, 0, 1, 10, 1, NULL),
(37, 'A História sem Fim', '', '37.jpg', '', NULL, 1, NULL, 0, NULL, 0, '', 2, 0, 1, 10, 1, NULL),
(38, 'Abc do espiritismo', '', '38.jpg', '', NULL, 1, NULL, 0, NULL, 0, '', 1, 0, 1, 10, 1, NULL),
(39, 'Administração de Sistemas', '', '39.jpg', '', NULL, 1, NULL, 0, NULL, 0, '', 39, 0, 1, 10, 1, NULL),
(40, 'Advanced Bash-Scripting Guide', '', '40.jpeg', '', NULL, 3, NULL, 0, NULL, 0, '', 39, 0, 1, 10, 1, NULL),
(41, 'Alquimia Espiritual e a Via Interior', '', NULL, '', NULL, 1, NULL, 0, NULL, 0, '', 37, 0, 1, 10, 1, NULL),
(42, 'ALQUIMIA Tradición que no murió', '', NULL, '', NULL, 7, NULL, 0, NULL, 0, '', 37, 0, 1, 10, 1, NULL),
(43, 'America the Vulnerable-Inside', 'The New Threat Matrix of Digital Espionage, Crime, and Warfare', NULL, '', NULL, 3, NULL, 0, NULL, 0, '', 39, 0, 1, 10, 1, NULL),
(44, 'Analise de Sonhos', 'Seminario 1 ', NULL, '', NULL, 1, NULL, 0, NULL, 0, '', 6, 0, 1, 10, 1, NULL),
(45, 'Análise do tráfego de rede com a ferramenta de Wireshark', '', NULL, '', NULL, 1, NULL, 0, NULL, 0, '', 39, 0, 1, 10, 1, NULL),
(46, 'Animais de Poder', '', NULL, '', NULL, 1, NULL, 0, NULL, 0, '', 37, 0, 1, 10, 1, NULL),
(47, 'Apostila De Chacras E Mediunidadade', '', NULL, '', NULL, 1, NULL, 0, NULL, 0, '', 37, 0, 1, 15, 1, NULL),
(48, 'Arbatel of Magic', '', NULL, '', NULL, 3, NULL, 0, NULL, 0, '', 37, 0, 1, 10, 1, NULL),
(49, 'Armas y Simbolos de los TempIarios', '', NULL, '', NULL, 7, NULL, 0, NULL, 0, '', 37, 0, 1, 10, 1, NULL),
(50, 'Ars Almadel', ' Parte IV ', NULL, '', NULL, 1, NULL, 0, NULL, 0, '', 37, 8, 1, 10, 1, NULL),
(51, 'As Vias Alquimicas', '', NULL, '', NULL, 1, NULL, 0, NULL, 0, '', 37, 0, 1, 10, 1, NULL),
(52, 'Be-a-blog', '', NULL, '', NULL, 1, NULL, 0, NULL, 0, '', 39, 0, 1, 10, 1, NULL),
(53, 'Beginning Game Development with Python and Pygame', 'From Novice to Professional', NULL, '', 2007, 3, NULL, 0, NULL, 0, '', 41, 0, 1, 10, 1, NULL),
(54, 'Black Book of Viruses and Hacking', '', NULL, '', NULL, 3, NULL, 0, NULL, 0, '', 39, 0, 1, 10, 1, NULL),
(55, 'Boas práticas em informática', '', NULL, '', NULL, 1, NULL, 0, NULL, 0, '', 39, 0, 1, 10, 1, NULL),
(56, 'O Diário do Chaves', '', '56.jpg', '', NULL, 1, NULL, 0, NULL, 0, '', 40, 0, 1, 10, 1, '#chaves #televisão #tv #humor'),
(57, 'Botnets The Killer Web Applications Hacking', '', NULL, '', NULL, 3, NULL, 0, NULL, 0, '', 39, 0, 1, 10, 1, NULL),
(58, 'Breviário sobre Alquimia', '', NULL, '', NULL, 1, NULL, 0, NULL, 0, '', 37, 0, 1, 10, 1, NULL),
(59, 'O desenvolvimento da personalidade', '', NULL, '', NULL, 1, NULL, 0, NULL, 0, '', 6, 0, 1, 10, 1, NULL),
(60, 'C++ Hackers Guide', '', NULL, '', NULL, 3, NULL, 0, NULL, 0, '', 39, 0, 1, 10, 1, NULL),
(61, 'CEH Official Certified Ethical Hacker Review Guide', '', NULL, '', NULL, 3, NULL, 0, NULL, 0, '', 39, 0, 1, 10, 1, NULL),
(62, 'Como Assinar Chave Pública Terceiros', '', NULL, '', NULL, 1, NULL, 0, NULL, 0, '', 39, 0, 1, 15, 1, NULL),
(63, 'Computer Forensics', 'Computer Crime Scene Investigation', NULL, '', NULL, 3, NULL, 0, NULL, 0, '', 39, 0, 1, 10, 1, NULL),
(64, 'Computer Forensics', ' Investigating Network', NULL, '', NULL, 3, NULL, 0, NULL, 0, '', 39, 0, 1, 10, 1, NULL),
(65, 'Conceito - Perícia Forense', '', NULL, '', NULL, 1, NULL, 0, NULL, 0, '', 39, 0, 1, 10, 1, NULL),
(66, 'Curso de Projeciologia - Viagem astra', '', NULL, '', NULL, 1, NULL, 0, NULL, 0, '', 31, 0, 1, 10, 1, NULL),
(67, 'De Vermis Mysteriis', '', NULL, '', NULL, 9, NULL, 0, NULL, 0, '', 37, 0, 1, 10, 1, NULL),
(68, 'Death Note (vol01)', '', '68.jpeg', 'A história gira em torno do estudante Yagami Raito que encontra por acaso o caderno do “Deus da Morte”. Raito percebe que ao escrever o nome de alguém no caderno, a pessoa literalmente morre, assim, ele pretende criar um “Mundo Perfeito\".', 2003, 1, NULL, 7, NULL, 8, '', 38, 7, 1, 12, 1, '#suspense #sobrenatural'),
(69, 'Death Note (vol02)', '', '69.jpeg', 'A história gira em torno do estudante Yagami Raito que encontra por acaso o caderno do “Deus da Morte”. Raito percebe que ao escrever o nome de alguém no caderno, a pessoa literalmente morre, assim, ele pretende criar um “Mundo Perfeito\".', 2003, 1, NULL, 7, NULL, 8, '', 38, 7, 1, 12, 1, '#suspense #sobrenatural'),
(70, 'Death Note (vol03)', '', '70.jpeg', '', 2003, 1, NULL, 7, NULL, 8, '', 38, 7, 1, 12, 1, '#suspense #sobrenatural'),
(71, 'Death Note (vol04)', '', '71.jpeg', '', 2003, 1, NULL, 7, NULL, 8, '', 38, 7, 1, 12, 1, '#suspense #sobrenatural'),
(72, 'Death Note (vol05)', '', '72.jpeg', '', 2003, 1, NULL, 7, NULL, 8, '', 38, 7, 1, 12, 1, '#suspense #sobrenatural'),
(73, 'Death Note (vol06)', '', '73.jpeg', '', 2003, 1, NULL, 7, NULL, 8, '', 38, 7, 1, 12, 1, '#suspense #sobrenatural'),
(74, 'Death Note (vol07)', '', '74.jpeg', '', 2003, 1, NULL, 7, NULL, 8, '', 38, 7, 1, 12, 1, '#suspense #sobrenatural'),
(75, 'Death Note (vol08)', '', '75.jpeg', '', 2003, 1, NULL, 7, NULL, 8, '', 38, 7, 1, 12, 1, '#suspense #sobrenatural'),
(76, 'Death Note (vol09)', '', '76.jpeg', '', 2003, 1, NULL, 7, NULL, 8, '', 38, 7, 1, 12, 1, '#suspense #sobrenatural'),
(77, 'Death Note (vol10)', '', '77.jpeg', '', 2003, 1, NULL, 7, NULL, 8, '', 38, 7, 1, 12, 1, '#suspense #sobrenatural'),
(78, 'Diccionario Rosacruz', 'Rosiacrucian Fellowship', NULL, '', NULL, 7, NULL, 0, NULL, 0, '', 37, 0, 1, 10, 1, NULL),
(79, 'Easy Steps to Yoga', '', NULL, '', NULL, 3, NULL, 0, NULL, 0, '', 31, 0, 1, 10, 1, NULL),
(80, 'Enciclopedia de Plantas Medicinales', '', NULL, '', NULL, 1, NULL, 0, NULL, 0, '', 42, 0, 1, 10, 1, NULL),
(81, 'FBI document - UFO', '', NULL, '', NULL, 3, NULL, 0, NULL, 0, '', 30, 0, 1, 10, 1, NULL),
(82, 'Kenshin kaden', 'Haru ni sakura', '82.jpg', '', NULL, 1, NULL, 0, NULL, 0, '', 38, 0, 1, 12, 1, NULL),
(83, 'Death Note (vol11)', '', '83.jpeg', '', 2004, 1, NULL, 7, NULL, 8, '', 38, 0, 1, 12, 1, '#suspense #sobrenatural'),
(84, 'Death Note (vol12)', '', '84.jpeg', '', 2004, 1, NULL, 7, NULL, 8, '', 38, 7, 1, 12, 1, '#suspense #sobrenatural'),
(85, 'Death Note (Edição Especial)', '', '85.jpg', '', NULL, 1, NULL, 7, NULL, 8, '', 38, 0, 1, 12, 1, '#suspense #sobrenatural'),
(86, 'Linguagem Assembly para i386 e x86-64', '', '86.jpg', '', 2015, 1, 90, 0, NULL, 9, '', 39, 0, 1, 10, 1, '#processador #assembler'),
(87, 'C e Assembly x86-64 v0.32.8', '', '87.jpg', '', NULL, 1, 206, 0, NULL, 9, '', 39, 0, 1, 10, 1, '#processador #assembler'),
(88, 'Coraline', 'Edição Original', '88.jpg', 'Edição em idioma original da obra de ficção.', NULL, 3, 46, 0, NULL, 0, 'https://www.amazon.com/Coraline-Neil-Gaiman/dp/0380807343', 20, 0, 1, 10, 1, '#ficção #mistério #apaixonante');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livroserie`
--

CREATE TABLE `livroserie` (
  `id` int(11) NOT NULL,
  `serie` varchar(300) NOT NULL,
  `editavel` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livroserie`
--

INSERT INTO `livroserie` (`id`, `serie`, `editavel`) VALUES
(0, '', 0),
(7, 'Death Note', 0),
(8, 'Lemegeton', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livrotipos`
--

CREATE TABLE `livrotipos` (
  `id` int(11) NOT NULL,
  `tipo` varchar(150) NOT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `editavel` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livrotipos`
--

INSERT INTO `livrotipos` (`id`, `tipo`, `descricao`, `editavel`) VALUES
(10, 'Livro', 'Documento em A5 (ou maior) com mais de 40 páginas.', 0),
(11, 'Revista', 'Documento em formato A4 (ou aproximado) com circulação periódica.)', 0),
(12, 'Mangá', 'Quadrinhos orientais e de formato: 135 mm de largura por 205 mm de altura (aproximadamente).', 0),
(13, 'Comic Book', 'Quadrinhos de origem norte-americana.', 0),
(14, 'Artigo', 'Qualquer texto curto.', 0),
(15, 'Apostila', 'Texto técnico e curto (tutorial).', 0),
(16, 'Artbook', ' Coletânea dos trabalho de um artista gráfico (desenhista).', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `quem` int(11) NOT NULL,
  `quando` datetime NOT NULL,
  `onde` varchar(100) NOT NULL,
  `o_que` varchar(300) NOT NULL,
  `pontos` int(11) NOT NULL,
  `argumento_extra` varchar(130) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mural`
--

CREATE TABLE `mural` (
  `id` int(11) NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `texto` text NOT NULL,
  `iduser` int(11) NOT NULL,
  `idtipo` int(11) NOT NULL,
  `dataenvio` date NOT NULL,
  `ativo` int(11) DEFAULT NULL,
  `coment_atv` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `muralrespostas`
--

CREATE TABLE `muralrespostas` (
  `id` int(11) NOT NULL,
  `texto` text NOT NULL,
  `dataini` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `iduser` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `dataalt` timestamp NULL DEFAULT NULL,
  `idmural` int(11) NOT NULL,
  `moderador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `muraltipos`
--

CREATE TABLE `muraltipos` (
  `id` int(11) NOT NULL,
  `tipo` varchar(150) NOT NULL,
  `cor` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `muraltipos`
--

INSERT INTO `muraltipos` (`id`, `tipo`, `cor`) VALUES
(1, 'Aviso Importante!', 'B40404'),
(2, 'Pedido', '04B431'),
(3, 'Informativo', 'DF7401');

-- --------------------------------------------------------

--
-- Estrutura da tabela `palavrasproibidas`
--

CREATE TABLE `palavrasproibidas` (
  `id` int(11) NOT NULL,
  `palavra` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pesquisas`
--

CREATE TABLE `pesquisas` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `termo` varchar(300) NOT NULL,
  `datainfo` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pontos`
--

CREATE TABLE `pontos` (
  `id` int(11) NOT NULL,
  `user_bio` int(11) NOT NULL,
  `livro_link` int(11) NOT NULL,
  `stitulo` int(11) NOT NULL,
  `capa` int(11) NOT NULL,
  `autor` int(11) NOT NULL,
  `n_paginas` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `datapub` int(11) NOT NULL,
  `edicao` int(11) NOT NULL,
  `editora` int(11) NOT NULL,
  `idioma` int(11) NOT NULL,
  `isbn` int(11) NOT NULL,
  `serie` int(11) NOT NULL,
  `tags` int(11) NOT NULL,
  `sinopse` int(11) NOT NULL,
  `avalia` int(11) NOT NULL,
  `comentar` int(11) NOT NULL,
  `digitalizacao` int(11) NOT NULL,
  `autoral` int(11) NOT NULL,
  `rastreio` int(11) NOT NULL,
  `revisao` int(11) NOT NULL,
  `traducao` int(11) NOT NULL,
  `agraecimento` int(11) NOT NULL,
  `desgosto` int(11) NOT NULL,
  `palavra_proibida` int(11) NOT NULL,
  `novo_autor` int(11) NOT NULL,
  `autor_foto` int(11) NOT NULL,
  `autor_bio` int(11) NOT NULL,
  `nova_cat` int(11) NOT NULL,
  `nova_serie` int(11) NOT NULL,
  `nova_editora` int(11) NOT NULL,
  `link_comp` int(11) NOT NULL,
  `nova_obra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pontos`
--

INSERT INTO `pontos` (`id`, `user_bio`, `livro_link`, `stitulo`, `capa`, `autor`, `n_paginas`, `categoria`, `datapub`, `edicao`, `editora`, `idioma`, `isbn`, `serie`, `tags`, `sinopse`, `avalia`, `comentar`, `digitalizacao`, `autoral`, `rastreio`, `revisao`, `traducao`, `agraecimento`, `desgosto`, `palavra_proibida`, `novo_autor`, `autor_foto`, `autor_bio`, `nova_cat`, `nova_serie`, `nova_editora`, `link_comp`, `nova_obra`) VALUES
(1, 1, 10, 2, 2, 2, 2, 2, 2, 2, 2, 2, 10, 2, 2, 15, 1, 10, 20, 30, 10, 10, 25, 1, -1, -8, 5, 4, 4, 5, 5, 5, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `icone` varchar(10) DEFAULT NULL,
  `nomenclatura` varchar(130) NOT NULL,
  `descricao` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id`, `icone`, `nomenclatura`, `descricao`) VALUES
(1, '1.png', 'Ativo', ''),
(2, '2.png', 'Suspenso(a)', 'Associado suspendeu sua conta por vontade própria.'),
(3, '3.png', 'Silenciado(a)', 'Em punição temporária para interagir na biblioteca.'),
(4, '4.png', 'Bloqueado(a)', 'Este usuário foi bloqueado temporariamente.'),
(5, '5.png', 'Banido(a)', 'Usuário expulso de nossa comunidade.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `subtitulosite`
--

CREATE TABLE `subtitulosite` (
  `id` int(11) NOT NULL,
  `frase` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `subtitulosite`
--

INSERT INTO `subtitulosite` (`id`, `frase`) VALUES
(1, 'Nullius in Verba'),
(2, '“Privacidade para os fracos, transparência para os poderosos.” ~ Filosofia Cypherpunk'),
(3, '3,1415926535897932384626433832795 Com amor, pi. :3'),
(4, '\"A rede interpreta a censura como um dano e a contorna.” ~ John Gilmore'),
(5, 'Somos essencialmente masoquistas. Pois, a vida dói e amamos viver. :3'),
(6, 'Facere libita sibi'),
(7, '♪ Porque... porque... Porque eu sou um bolinho de arroz... ♫ :3'),
(8, 'Deus é: Quando o caminho o caminhante e o caminhar são um só. ~ Tao'),
(9, 'Em busca da sublime paz diante à face robótica do caos ~ Lain Samui'),
(10, '\"Give me what I want, and I´ll go away.\" ~ Andre Linoge'),
(11, '\"Você não precisa mudar sua vida. Tudo que você precisa é ter duas.” ~ Jean Baudrillard'),
(12, '\"A pequena raposa molha a cauda. Nenhuma culpa.\" ~ I Ching'),
(13, '\"E se teu amigo vento não te procurar, é porque multidões ele foi arrastar.\" ~ Zé Ramalho'),
(14, '\"Sua falta de fé é perturbadora.\" ~ Darth Vader'),
(15, 'O que não me mata me deixa uma persona mais... atípica! @_@'),
(16, 'Cuidado com a penalidade da alternância cognitiva.'),
(17, '\"Eu sou só um, mas sou um. Não posso fazer tudo, mas posso fazer algo.\" ~ Edward Everett Hale'),
(18, 'Todos os cogumelos são comestíveis... alguns, somente uma vez. : )'),
(19, '\"As palavras são uma lente para focar a mente.\" ~ Ayn Rand'),
(20, '\"Não sabendo que era impossível, foi lá e fez.\" ~ Sei lá... mas fez.'),
(21, 'Apenas um viés de confirmação.'),
(22, 'Nunca permita a dor e a loucura do mundo ofuscar a lógica.'),
(23, '...e a vida continua tão misteriosa quanto a morte.'),
(24, 'Porque, eu nunca morri em toda minha vida. ; )'),
(25, '\"Olhe para as estrelas e desapareça.\" ~ Chuck Palahniuk'),
(26, '\"Bons artistas pegam emprestado. Grandes artistas roubam.” ~ Pablo Picasso'),
(27, '\"Somos aquilo que fazemos repetidamente. A excelência, portanto, não é resultado de um modo de agir, mas de um hábito.\" ~ Aristóteles'),
(28, '“Pratique somente nos dias em que você come.” ~ método Suzuki'),
(29, 'A única constante é a mudança.'),
(30, '- Fui pescar no Estige, volto semana que vem. - : 3'),
(31, '\"Você acorda e é o suficiente.\" ~ Chuck Palahniuk'),
(32, '\"Sempre aja de modo a aumentar as opções.\" ~ Heinz von Foerster'),
(33, '\"Quem controla o presente controla o passado, e quem controla o passado controla o futuro.\" ~ Orwell'),
(34, '\"O código é a lei.\" ~ Larry Lessig'),
(35, '\"Seja a mudança que você quer ver no mundo.\" ~ Mahatma Gandhi'),
(36, '\"Simoníacos... ó míseros sequazes; Por quem de Deus os dons só prometidos; A virtude, em rapina contumazes. Por ouro e prata estão prostituídos.\" ~ Dante Alighieri'),
(37, '\"Não conheci o outro mundo por querer!\" ~ Urameshi'),
(38, '- Inocência sublimada com sucesso!'),
(39, '\"Você começa a crescer quando vê que ninguém vai te resgatar.\" ~ Robert Abraham'),
(40, '\"A vingança nunca é plena, mata a alma e a envenena.\" ~ Seu Madruga');

-- --------------------------------------------------------

--
-- Estrutura da tabela `titulos`
--

CREATE TABLE `titulos` (
  `id` int(11) NOT NULL,
  `designacao` varchar(300) NOT NULL,
  `descricao` text DEFAULT NULL,
  `exigencia` text DEFAULT NULL,
  `icone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `titulos`
--

INSERT INTO `titulos` (`id`, `designacao`, `descricao`, `exigencia`, `icone`) VALUES
(1, 'Re-editor(a)', 'Presta relevante trabalho em informar dados das obras listadas, completando cadastros.', '', '1.png'),
(2, 'Uploader Mor', 'Presta relevante serviço de hospedagem e partilha de links.', '', '2.png'),
(3, 'Escritor(a)', 'Promove conteúdo autoral.', 'Ao menos uma obra publicada.', '3.png'),
(4, 'Rastreador(a)', 'Presta importante serviço dedicado a localização de obras.', '', '4.png'),
(5, 'Digitalizador(a)', 'Presta árduo e importante serviço de digitalizar obras.', 'Ao menos uma obra digitalizada.', '5.png'),
(6, 'Revisor(a)', 'Compete a este a demanda de avaliar o processo organizacional da biblioteca.Incluindo o ato de baixar os livros para assegurar que seu conteúdo corresponda ao indicado.', 'Fazer parte da Curadoria.', '6.png'),
(7, 'Tradutor(a)', 'Dedica-se ao admirável e árduo trabalho traduzir obras.', 'Ao menos uma obra traduzida.', '7.png'),
(12, 'Develop', 'Responsável pela programação da biblioteca.', '', '12.png'),
(13, 'Bot', 'Auxilia na organização de nossa amada biblioteca', '', '13.png'),
(14, 'Hacker', 'Responsável por procurar brechas de segurança em nossa biblioteca.', 'Achar alguma brecha ou bug.', '14.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `umail`
--

CREATE TABLE `umail` (
  `id` int(11) NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `de` int(11) NOT NULL,
  `para` int(11) NOT NULL,
  `texto` text NOT NULL,
  `data_envio` datetime NOT NULL,
  `data_lido` datetime DEFAULT NULL,
  `idresp` int(11) DEFAULT NULL,
  `ativo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `urank`
--

CREATE TABLE `urank` (
  `id` int(11) NOT NULL,
  `rank` varchar(150) NOT NULL,
  `pontos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `urank`
--

INSERT INTO `urank` (`id`, `rank`, `pontos`) VALUES
(1, 'Neófito(a)', 0),
(2, 'Leitor(a)', 100),
(3, 'Leitor(a) Compulsivo(a)', 200),
(4, 'Uploader', 300),
(5, 'Uploader Atroz', 400),
(6, 'Comensalista', 500),
(7, 'Associado(a)', 666),
(8, 'Frater', 777);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `login` varchar(150) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `datanasci` date DEFAULT NULL,
  `dataini` date NOT NULL,
  `dataultimo` datetime DEFAULT NULL,
  `tipo` int(11) NOT NULL DEFAULT 1,
  `bio` text DEFAULT NULL,
  `viewmail` int(11) NOT NULL DEFAULT 1,
  `email` varchar(300) NOT NULL,
  `site` varchar(300) DEFAULT NULL,
  `telegram` varchar(300) DEFAULT NULL,
  `avatar` varchar(10) DEFAULT NULL,
  `informe_admin` text DEFAULT NULL,
  `idstatus` int(11) NOT NULL DEFAULT 1,
  `pontos` int(11) NOT NULL DEFAULT 0,
  `nsfw` int(11) NOT NULL DEFAULT 1,
  `heart` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`, `datanasci`, `dataini`, `dataultimo`, `tipo`, `bio`, `viewmail`, `email`, `site`, `telegram`, `avatar`, `informe_admin`, `idstatus`, `pontos`, `nsfw`, `heart`) VALUES
(1, 'Tecarina', 'tecarina', '$2y$10$8RxHnN1npcEJ0bt8xTDq/OF33jytIFIZB4qg7GE26ezmQDPgLFdtK', NULL, '2019-10-14', '2019-10-14 15:50:00', 1, '', 0, 'tecarina@teca.com', '', '', '1.png', NULL, 1, 0, 1, NULL),
(7, 'Admin', 'admin', '$2y$10$aybC0ihlj7JAa5yi2YuQGeybl7cF2wm28.kBsUHaSD2CpI.FCo5cK', NULL, '2019-09-04', '2019-10-04 14:13:00', 3, '', 0, 'admin@admin.com', '', '', '7.png', NULL, 1, 2260, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `utipos`
--

CREATE TABLE `utipos` (
  `id` int(11) NOT NULL,
  `tipouser` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `utipos`
--

INSERT INTO `utipos` (`id`, `tipouser`) VALUES
(1, 'Usuário(a)'),
(2, 'Curadoria'),
(3, 'Administrador(a)');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utitulos`
--

CREATE TABLE `utitulos` (
  `id_user` int(11) NOT NULL,
  `id_titulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `utitulos`
--

INSERT INTO `utitulos` (`id_user`, `id_titulo`) VALUES
(1, 13),
(7, 2),
(7, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `visitas`
--

CREATE TABLE `visitas` (
  `ID` int(11) NOT NULL,
  `page` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `data_visita` date NOT NULL,
  `visitas` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `convites`
--
ALTER TABLE `convites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices para tabela `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `solicitacao` (`solicitacao`),
  ADD KEY `usuario` (`iduser`);

--
-- Índices para tabela `dashtipos`
--
ALTER TABLE `dashtipos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `geral`
--
ALTER TABLE `geral`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `livroautor`
--
ALTER TABLE `livroautor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `livroavaliacao`
--
ALTER TABLE `livroavaliacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_livro` (`id_livro`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices para tabela `livrocat`
--
ALTER TABLE `livrocat`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `livrocomentarios`
--
ALTER TABLE `livrocomentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `livros_comentarios_ibfk_1` (`id_livro`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices para tabela `livroeditoras`
--
ALTER TABLE `livroeditoras`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `livroformatos`
--
ALTER TABLE `livroformatos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `livroidioma`
--
ALTER TABLE `livroidioma`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `livrolinks`
--
ALTER TABLE `livrolinks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `livros_links_ibfk_1` (`idformato`),
  ADD KEY `id_livro` (`idlivro`),
  ADD KEY `id_user` (`iduser`);

--
-- Índices para tabela `livropontos`
--
ALTER TABLE `livropontos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idlivro` (`idlivro`),
  ADD KEY `iduser` (`iduser`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria` (`idcategoria`),
  ADD KEY `editora` (`ideditora`),
  ADD KEY `idioma` (`ididioma`),
  ADD KEY `serie` (`idserie`),
  ADD KEY `autor` (`idautor`),
  ADD KEY `tipo` (`idtipo`);

--
-- Índices para tabela `livroserie`
--
ALTER TABLE `livroserie`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `livrotipos`
--
ALTER TABLE `livrotipos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quem` (`quem`);

--
-- Índices para tabela `mural`
--
ALTER TABLE `mural`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`iduser`),
  ADD KEY `tipo` (`idtipo`);

--
-- Índices para tabela `muralrespostas`
--
ALTER TABLE `muralrespostas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idmural` (`idmural`),
  ADD KEY `moderador` (`moderador`);

--
-- Índices para tabela `muraltipos`
--
ALTER TABLE `muraltipos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `palavrasproibidas`
--
ALTER TABLE `palavrasproibidas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pesquisas`
--
ALTER TABLE `pesquisas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices para tabela `pontos`
--
ALTER TABLE `pontos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `subtitulosite`
--
ALTER TABLE `subtitulosite`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `titulos`
--
ALTER TABLE `titulos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `umail`
--
ALTER TABLE `umail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `de` (`de`),
  ADD KEY `para` (`para`),
  ADD KEY `cc` (`idresp`);

--
-- Índices para tabela `urank`
--
ALTER TABLE `urank`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo` (`tipo`);

--
-- Índices para tabela `utipos`
--
ALTER TABLE `utipos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `utitulos`
--
ALTER TABLE `utitulos`
  ADD PRIMARY KEY (`id_user`,`id_titulo`),
  ADD KEY `fk_usuarios_has_titulos_titulos1_idx` (`id_titulo`),
  ADD KEY `fk_usuarios_has_titulos_usuarios1_idx` (`id_user`);

--
-- Índices para tabela `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `convites`
--
ALTER TABLE `convites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `dashtipos`
--
ALTER TABLE `dashtipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `geral`
--
ALTER TABLE `geral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `livroautor`
--
ALTER TABLE `livroautor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `livroavaliacao`
--
ALTER TABLE `livroavaliacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `livrocat`
--
ALTER TABLE `livrocat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `livrocomentarios`
--
ALTER TABLE `livrocomentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `livroeditoras`
--
ALTER TABLE `livroeditoras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `livroformatos`
--
ALTER TABLE `livroformatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `livroidioma`
--
ALTER TABLE `livroidioma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `livrolinks`
--
ALTER TABLE `livrolinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de tabela `livropontos`
--
ALTER TABLE `livropontos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de tabela `livroserie`
--
ALTER TABLE `livroserie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `livrotipos`
--
ALTER TABLE `livrotipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `mural`
--
ALTER TABLE `mural`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `muralrespostas`
--
ALTER TABLE `muralrespostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `muraltipos`
--
ALTER TABLE `muraltipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `palavrasproibidas`
--
ALTER TABLE `palavrasproibidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pesquisas`
--
ALTER TABLE `pesquisas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14429;

--
-- AUTO_INCREMENT de tabela `pontos`
--
ALTER TABLE `pontos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `subtitulosite`
--
ALTER TABLE `subtitulosite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `titulos`
--
ALTER TABLE `titulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `umail`
--
ALTER TABLE `umail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `urank`
--
ALTER TABLE `urank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `utipos`
--
ALTER TABLE `utipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `visitas`
--
ALTER TABLE `visitas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `convites`
--
ALTER TABLE `convites`
  ADD CONSTRAINT `convites_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `dashboard`
--
ALTER TABLE `dashboard`
  ADD CONSTRAINT `dashboard_ibfk_1` FOREIGN KEY (`solicitacao`) REFERENCES `dashtipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `dashboard_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `livroavaliacao`
--
ALTER TABLE `livroavaliacao`
  ADD CONSTRAINT `livroavaliacao_ibfk_1` FOREIGN KEY (`id_livro`) REFERENCES `livros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `livroavaliacao_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `livrocomentarios`
--
ALTER TABLE `livrocomentarios`
  ADD CONSTRAINT `livrocomentarios_ibfk_1` FOREIGN KEY (`id_livro`) REFERENCES `livros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `livrocomentarios_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `livrolinks`
--
ALTER TABLE `livrolinks`
  ADD CONSTRAINT `livrolinks_ibfk_1` FOREIGN KEY (`idformato`) REFERENCES `livroformatos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `livrolinks_ibfk_2` FOREIGN KEY (`idlivro`) REFERENCES `livros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `livrolinks_ibfk_3` FOREIGN KEY (`iduser`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `livropontos`
--
ALTER TABLE `livropontos`
  ADD CONSTRAINT `livropontos_ibfk_1` FOREIGN KEY (`idlivro`) REFERENCES `livros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `livropontos_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `livros`
--
ALTER TABLE `livros`
  ADD CONSTRAINT `livros_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `livrocat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `livros_ibfk_2` FOREIGN KEY (`ideditora`) REFERENCES `livroeditoras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `livros_ibfk_3` FOREIGN KEY (`ididioma`) REFERENCES `livroidioma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `livros_ibfk_4` FOREIGN KEY (`idserie`) REFERENCES `livroserie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `livros_ibfk_5` FOREIGN KEY (`idautor`) REFERENCES `livroautor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `livros_ibfk_6` FOREIGN KEY (`idtipo`) REFERENCES `livrotipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`quem`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `mural`
--
ALTER TABLE `mural`
  ADD CONSTRAINT `mural_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `mural_ibfk_2` FOREIGN KEY (`idtipo`) REFERENCES `muraltipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `muralrespostas`
--
ALTER TABLE `muralrespostas`
  ADD CONSTRAINT `muralrespostas_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `muralrespostas_ibfk_2` FOREIGN KEY (`idmural`) REFERENCES `mural` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `muralrespostas_ibfk_3` FOREIGN KEY (`moderador`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pesquisas`
--
ALTER TABLE `pesquisas`
  ADD CONSTRAINT `pesquisas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `umail`
--
ALTER TABLE `umail`
  ADD CONSTRAINT `umail_ibfk_1` FOREIGN KEY (`de`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `umail_ibfk_2` FOREIGN KEY (`para`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`tipo`) REFERENCES `utipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `utitulos`
--
ALTER TABLE `utitulos`
  ADD CONSTRAINT `fk_usuarios_has_titulos_titulos1` FOREIGN KEY (`id_titulo`) REFERENCES `titulos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_has_titulos_usuarios1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
