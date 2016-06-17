-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: 17-Jun-2016 às 20:02
=======
-- Generation Time: 17-Jun-2016 às 15:34
>>>>>>> origin/php_integration_v03
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `checkpoint_net_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `friends`
--

CREATE TABLE `friends` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `friend_id` int(10) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `accepted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `friend_id`, `date`, `accepted`) VALUES
(73, 1, 12, '2016-06-12 22:53:18', 1),
(74, 1, 3, '2016-06-12 23:20:42', 1),
(75, 1, 5, '2016-06-12 23:26:44', 1),
(76, 1, 8, '2016-06-12 22:58:11', 1),
(77, 1, 9, '2016-06-12 23:22:48', 1),
(78, 1, 11, '2016-06-12 22:56:27', 1),
(79, 11, 18, '2016-06-12 23:19:40', 1),
(80, 11, 14, '2016-06-12 23:10:10', 1),
(81, 11, 8, '2016-06-12 22:58:12', 1),
(82, 8, 14, '2016-06-12 23:10:11', 1),
(83, 8, 9, '2016-06-12 23:22:48', 1),
(84, 1, 18, '2016-06-12 23:19:49', 1),
(85, 1, 19, '2016-06-12 23:32:06', 1),
(86, 14, 18, '2016-06-12 23:19:50', 1),
(87, 14, 1, '2016-06-12 23:16:55', 1),
(88, 3, 19, '2016-06-12 23:32:06', 1),
(89, 3, 14, '2016-06-12 23:21:10', 1),
(90, 9, 14, '2016-06-12 23:30:44', 1),
(91, 9, 11, '2016-06-12 23:23:22', 1),
(92, 13, 11, '2016-06-12 23:30:18', 1),
(93, 13, 9, '2016-06-12 23:28:13', 1),
(94, 13, 8, '2016-06-12 23:29:25', 1),
(95, 13, 1, '2016-06-12 23:24:27', 1),
(96, 5, 9, '2016-06-12 23:28:14', 1),
(97, 12, 9, '2016-06-13 21:46:19', 1),
(98, 12, 11, '2016-06-12 23:30:19', 1),
(99, 12, 14, '2016-06-12 23:30:46', 1),
(100, 12, 8, '2016-06-12 23:29:27', 1),
(101, 1, 16, '2016-06-12 23:53:35', 1),
(102, 16, 5, '2016-06-13 21:46:25', 1),
(103, 16, 14, '2016-06-13 21:46:27', 1),
(104, 16, 19, '2016-06-13 21:46:29', 1),
(105, 16, 3, '2016-06-13 21:46:31', 1),
(106, 16, 18, '2016-06-13 21:46:32', 1),
(107, 1, 15, '2016-06-13 21:46:34', 1),
(108, 20, 1, '2016-06-13 21:46:35', 1),
(109, 20, 3, '2016-06-13 21:46:38', 1),
(110, 20, 11, '2016-06-13 21:46:39', 1),
(111, 20, 19, '2016-06-13 21:46:41', 1),
(112, 20, 9, '2016-06-13 21:46:49', 1),
(113, 21, 1, '2016-06-13 21:58:44', 1),
(114, 21, 3, '2016-06-13 21:55:12', 0),
(115, 21, 9, '2016-06-13 21:55:17', 0),
(116, 21, 20, '2016-06-13 21:55:27', 0),
(117, 21, 19, '2016-06-13 21:55:33', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `games`
--

CREATE TABLE `games` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `genre` varchar(64) NOT NULL,
  `launch_date` date DEFAULT NULL,
  `developer` varchar(64) NOT NULL,
  `publisher` varchar(64) DEFAULT NULL,
  `description` text,
  `art` varchar(512) DEFAULT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `removed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `games`
--

INSERT INTO `games` (`id`, `name`, `genre`, `launch_date`, `developer`, `publisher`, `description`, `art`, `added`, `removed`) VALUES
(3, 'Crysis', 'FPS', '0000-00-00', 'Crytek', 'Electronic Arts', '', '_imagens/game_art/14660339015761e6ed00660.jpg', '2016-06-15 23:38:21', 0),
(4, 'Battlefield 3', 'FPS', '0000-00-00', 'DICE', 'Electronic Arts', '', '_imagens/game_art/14660372545761f40691e12.jpg', '2016-06-16 00:34:14', 0),
(5, 'Battlefield 2', 'FPS', '0000-00-00', 'DICE', 'Electronic Arts', '', '_imagens/game_art/14660372715761f41731a92.jpe', '2016-06-16 00:34:31', 0),
<<<<<<< HEAD
(6, 'Monster Hunter', 'Action RPG', '2011-03-04', 'CAPCOM', 'CAPCOM', 'Monster Hunter Ã© um jogo de  hack and slash,  estratÃ©gia e aventura onde o jogador encarna na pele de um caÃ§ador em um mundo repleto de criaturas mortais. Nas caÃ§adas, seja  matando ou capturando monstros,  Ã© preciso  o uso de estratÃ©gia, habilidades e itens. Monster Hunter vendeu  pouco na AmÃ©rica e na Europa, mas fez grande sucesso no JapÃ£o.', '_imagens/game_art/1466040806576201e60e0be.jpg', '2016-06-16 01:33:26', 0);
=======
(6, 'Monster Hunter', 'Action RPG', '2011-03-04', 'CAPCOM', 'CAPCOM', 'Monster Hunter Ã© um jogo de  hack and slash,  estratÃ©gia e aventura onde o jogador encarna na pele de um caÃ§ador em um mundo repleto de criaturas mortais. Nas caÃ§adas, seja  matando ou capturando monstros,  Ã© preciso  o uso de estratÃ©gia, habilidades e itens. Monster Hunter vendeu  pouco na AmÃ©rica e na Europa, mas fez grande sucesso no JapÃ£o.', '_imagens/game_art/1466040806576201e60e0be.jpg', '2016-06-16 01:33:26', 0),
(13, 'Battlefield 1', 'FPS', '0000-00-00', 'DICE', 'Electronic Arts', 'A sÃ©rie Battlefield vai sair do cenÃ¡rio dos combates modernos e vai voltar para um cenÃ¡rio ainda mal explorado nos games. Em Battlefieldâ„¢ 1, vocÃª verÃ¡ a Primeira Guerra Mundial (que aconteceu entre 1914 e 1918) como nunca antes, com confrontos violentÃ­ssimos que unem a tecnologia do final do SÃ©culo XIX com armas que surgiram nesta batalha de escala global.', '_imagens/game_art/14660991455762e5c934412.png', '2016-06-16 17:45:45', 0),
(14, 'Final Fantasy XV', 'RPG', '0000-00-00', 'Square Enix', 'Square Enix', 'Em comemoraÃ§Ã£o aos treze anos de uma das maiores franquias de RPG, Final Fantasy, a Square Enix lanÃ§ou o projeto Fabula Nova Crystallis (ou "Nova Lenda do Cristal"), o qual abarca diversos tÃ­tulos que sÃ£o variaÃ§Ãµes do mundo de FF XIII. Fabula Nova Crystallis Ã© constituÃ­da por Final Fantasy Versus XIII, FF XIII, ambos para PlayStation 3, e FF Agito XIII, para celulares â€” cada um com personagens, mundos e enredos diferentes.', '_imagens/game_art/14660993905762e6be50e0e.jpg', '2016-06-16 17:49:50', 0),
(15, 'The Elder Scrolls V - Skyrim', 'RPG', '2011-11-11', 'Bethesda Softworks', 'Bethesda Softworks', 'Skyrim Ã© mais um capÃ­tulo da franquia The Elder Scrolls e se passa 200 anos apÃ³s os eventos do Ãºltimo jogo, Elder Scrolls IV: Oblivion.\r\nEm Skyrim, o jogador retorna ao mundo mÃ­tico de Tamriel para encontrar um cenÃ¡rio totalmente diferente de Oblivion. O ImpÃ©rio estÃ¡ em decadÃªncia e as naÃ§Ãµes Ã©lficas estÃ£o retomando os territÃ³rios outrora dominados pelos humanos.', '_imagens/game_art/14660997895762e84dc0c5b.png', '2016-06-16 17:56:29', 0),
(16, 'The Elder Scrolls IV - Oblivion', 'RPG', '2006-03-20', 'Bethesda Softworks', 'Bethesda Softworks', 'Penetre no universo do jogo mais vibrante e rico em detalhes jamais criado. Oblivion Ã© o penÃºltimo capÃ­tulo da saga dos Elder Scroll.', '_imagens/game_art/oblivion.png', '2016-06-16 18:09:16', 0),
(17, 'World of Warcraft', 'MMORPG', '2004-11-23', 'Blizzard Entertainment', 'Blizzard Entertainment', 'World of Warcraft Ã© um jogo on-line, (MMORPG) da produtora Blizzard lanÃ§ado em 2004. O jogo se passa no mundo fantÃ¡stico de Azeroth, introduzido no primeiro jogo da sÃ©rie, Warcraft: Orcs & Humans em 1994. Hoje ele Ã© o mais popular dos MMORPGs de todo o mundo hÃ¡ mais de 10 anos, contando com mais de 10 milhÃµes de jogadores ativos', '_imagens/game_art/14661014085762eea0d5521.jpe', '2016-06-16 18:23:28', 0),
(18, 'Final Fantasy XIV: Heavensward', 'MMORPG', '2015-06-23', 'Square Enix', 'Square Enix', 'The Holy See of Ishgard opens its gates to adventurers. The main storyline of the expansion pack deals with the Dragonsong War, a thousand-year conflict between Ishgard and Dravania, the home of the dragon beast tribe, which is also available to be explored. Free Companies can craft airships and use them to discover floating continents above the clouds. A number of new instances such as dungeons, two Primal battles and the Alexander: Gordias raid are introduced. Seal Rock, a capture the flag style PvP map, is added to the Frontlines. The level cap is increased to 60. The Au Ra are introduced as a new playable race. In addition to the expansion, the game became available for the first time on the Macintosh computer system.', '_imagens/game_art/146611327557631cfb609ee.jpg', '2016-06-16 21:41:15', 0),
(19, 'Enduro', 'Arcade Style Racing', NULL, 'Activision', 'Activision', 'O jogador controla um carro, algo semelhante a um FÃ³rmula 1 visto de trÃ¡s, e deve manobrar um carro de corrida no National Enduro, uma corrida de resistÃªncia de longa distÃ¢ncia, cujo percurso era aleatÃ³rio. O objetivo da corrida Ã© passar uma certa quantidade de carros a cada dia, para permitir ao jogador continuar correndo no dia seguinte. O jogador deve se desviar de outros pilotos, e passar 200 carros no primeiro dia, e 300 carros nos dias posteriores', '_imagens/game_art/14661675085763f0d41abde.png', '2016-06-17 12:45:08', 0),
(20, 'Monster Hunter 2 Dos', 'Action RPG', NULL, 'CAPCOM', 'CAPCOM', 'Monster Hunter 2 is the sequel of Monster Hunter. It was only released in Japan because the Monster Hunter series had only a small cult following elsewhere in the world, while being huge in Japan. New features include day and night changes, seasons, new monsters and new weapon types. Some of the new features carried over to its international portable installment and all leftovers of Monster Hunter 2 were later found in MHF2''s English expansion, excluding Yama Tsukami.', '_imagens/game_art/14661678765763f2442a875.jpg', '2016-06-17 12:51:16', 0),
(21, 'Monster Hunter 3 Tri', 'Action RPG', NULL, 'CAPCOM', 'CAPCOM', 'Monster Hunter Tri is the third installment in the Monster Hunter series and is the direct sequel to Monster Hunter Dos. It was first announced for the PlayStation 3, but was canceled. Capcom, specifically Capcom managing corporate officer Katsuhiko Ichii, announced on October 10, 2007 that Monster Hunter 3 will be a Wii-exclusive title.', '_imagens/game_art/14661683555763f4237f5a0.jpg', '2016-06-17 12:59:15', 0),
(22, 'Ã•kami', 'Action-Adventure', '0000-00-00', 'Clover Studios', 'CAPCOM', 'ÅŒkami  is an action-adventure video game developed by Clover Studio and published by Capcom. It was released for Sony Computer Entertainment''s PlayStation 2 video game console in 2006 in Japan and North America, and in 2007 in Europe and Australia. Despite the closure of Clover Studio a few months after the game''s initial release, a version for Nintendo''s Wii console was developed and produced by Ready at Dawn, Tose and Capcom, which was released in North America in April 2008, in Europe in June 2008, and in Japan in October 2009.', '_imagens/game_art/14661688575763f6195f641.jpg', '2016-06-17 13:07:37', 0),
(24, 'God of War', 'AÃ§Ã£o-aventura/ Hack and slash', '0000-00-00', 'SCE Santa Monica Studio', 'Sony Computer Entertainment', 'A histÃ³ria faz parte de uma saga, pela qual, Kratos inicia sua vinganÃ§a pelo Deus da Guerra,que o prometeu a vencer uma guerra em que perderia pela sua alma.PorÃ©m, Ares (o Deus da Guerra) trai o espartano dizendo para ele atacar um acampamento prÃ³ximo de seu arsenal, Kratos e seus soldados queimam o acampamento inteiro sobrando apenas mais uma cabana para ser demolida. Antes que ele entrasse na cabana,Kratos ainda tem uma previsÃ£o de uma cigana dizendo que se ele cumprir a ordem do Deus da Guerra irÃ¡ acabar num sofrimento eterno.', '_imagens/game_art/14661691445763f73865202.jpg', '2016-06-17 13:12:24', 0),
(25, 'League of Legends', 'MOBA', '0000-00-00', 'RIOT GAMES', 'RIOT GAMES', 'Em League of Legends, os jogadores assumem o papel de invocadores, controlando campeÃµes com habilidade Ãºnicas e que lutam com seu time contra outros invocadores ou campeÃµes controlados pelo computador. No modo mais popular do jogo, o objetivo de cada time Ã© destruir o nexus da equipe adversÃ¡ria, uma construÃ§Ã£o localizada na base e que Ã© protegida por outros estruturas. Cada jogo de League of Legends Ã© distinto, pois os campeÃµes sempre comeÃ§am fracos e progridem atravÃ©s da acumulaÃ§Ã£o de ouro e da experiÃªncia ao longo da partida.', '_imagens/game_art/14661694125763f844965a2.jpg', '2016-06-17 13:16:52', 0),
(26, 'Super Mario World', 'Plataforma', '0000-00-00', 'Nintedo EAD', 'Nintendo', 'Super Mario World Ã© um jogo de plataforma desenvolvido e publicado pela Nintendo como um tÃ­tulo que acompanhava o console Super Nintendo Entertainment System. O jogo foi lanÃ§ado em 1990 no JapÃ£o e em 1991 na AmÃ©rica do Norte. Super Mario World se tornou um enorme sucesso crÃ­tico e comercial, sendo considerado o mais bem-vendido da plataforma, com 20 milhÃµes de cÃ³pias vendidas no mundo todo', '_imagens/game_art/14661696495763f931ece9f.jpg', '2016-06-17 13:20:49', 0);
>>>>>>> origin/php_integration_v03

-- --------------------------------------------------------

--
-- Estrutura da tabela `games_played`
--

CREATE TABLE `games_played` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

<<<<<<< HEAD
=======
--
-- Extraindo dados da tabela `games_played`
--

INSERT INTO `games_played` (`id`, `user_id`, `game_id`) VALUES
(1, 1, 4),
(2, 22, 5),
(4, 1, 5),
(5, 20, 6),
(6, 1, 15),
(7, 1, 13),
(8, 4, 17),
(9, 4, 4),
(10, 3, 14),
(11, 3, 18),
(12, 23, 4),
(13, 1, 14),
(14, 20, 15),
(17, 20, 20),
(18, 20, 21),
(19, 20, 24),
(20, 20, 22),
(21, 20, 25),
(22, 20, 26);

>>>>>>> origin/php_integration_v03
-- --------------------------------------------------------

--
-- Estrutura da tabela `message`
--

CREATE TABLE `message` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender` int(10) UNSIGNED NOT NULL,
  `receiver` int(10) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `message`
--

INSERT INTO `message` (`id`, `sender`, `receiver`, `content`, `deleted`) VALUES
(1, 1, 11, 'Hail', 0),
(2, 11, 1, 'Heya', 0),
(3, 1, 11, 'How''re you doing?', 0),
(4, 11, 1, 'Fine, you?', 0),
(5, 1, 11, 'I''m fine too!', 0),
(6, 11, 1, 'Good to hear :)', 0),
(7, 11, 14, 'Youtube hoe', 0),
(8, 1, 11, 'Hello again, just testing some bug corrections.', 0),
(9, 11, 1, 'Oh, alright! They''re working!', 0),
(10, 20, 1, 'E ae desgraÃ§a o/', 0),
<<<<<<< HEAD
(11, 1, 13, 'dasdasdas', 0);
=======
(11, 1, 22, 'Du, dudu e edu', 0),
(12, 1, 20, 'Aqui Ã© Boris Bilder porra!', 0),
(13, 1, 4, 'Oi!', 0),
(14, 4, 22, 'VAINAMOINEN!', 0),
(15, 20, 1, 'e ase\r\n', 0);
>>>>>>> origin/php_integration_v03

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(256) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL,
  `origin` int(10) UNSIGNED NOT NULL,
  `likes` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `content`, `time`, `deleted`, `origin`, `likes`) VALUES
(1, 3, 'Bora ler cambada!', '2016-06-10 20:46:56', 0, 3, 1),
(2, 1, 'Bora jogar draft?', '2016-06-10 20:47:47', 0, 3, 1),
(3, 14, 'Fist me daddy', '2016-06-10 20:48:53', 0, 3, 5),
(4, 3, 'Edgar will poop on your bed while you''re reading!', '2016-06-10 20:53:41', 0, 14, 0),
(5, 1, 'Hey bro, have you played Dark Souls 3 yet?', '2016-06-10 20:56:01', 0, 14, 3),
(6, 19, 'Se descobrirem o paradeiro daqueles bÃ¡rbaros sujos e fedidos, contatem a Guarda Imperial imediatamente!', '2016-06-10 20:59:15', 0, 19, 2),
(7, 3, 'This is mah swamp!', '2016-06-12 03:00:44', 0, 1, 0),
(8, 19, 'Ave CÃ©sar!', '2016-06-12 03:01:56', 0, 1, 1),
(9, 12, 'I''m a 3000 man!', '2016-06-12 04:32:47', 0, 12, 1),
(10, 8, 'Hey buddy, when we''re going to film another Chin-Chin praising video?', '2016-06-12 04:33:35', 0, 12, 1),
(11, 3, 'Next time you''re at UNIFEI, bring me my MG-36.', '2016-06-12 04:34:02', 0, 12, 0),
(12, 11, 'Mission accomplished m8!', '2016-06-12 04:34:29', 0, 12, 6),
(13, 1, 'I forgot my chessex last time I came to your place for that RPG session, do you still have it there?', '2016-06-12 04:36:19', 0, 12, 1),
(14, 11, 'I need some vacations from the Throne. Those right-wingers fuckers are going what''s coming for them, the bite of my blade is cold as death!', '2016-06-12 04:39:12', 1, 11, 0),
(15, 11, 'Those terrorists are going to see what''s coming for them! The bite of my blade is cold as death and dreadful as the pits of hell.', '2016-06-12 04:39:47', 0, 11, 6),
(16, 8, 'THE DARK LORD IS HERE!', '2016-06-12 04:41:40', 0, 11, 1),
(17, 14, 'Hey m8, when you''re coming to Brazil again? We got a nice plan for you in that blue lycra again, MWAHAHAH', '2016-06-12 04:42:54', 0, 11, 1),
(18, 1, 'Now this is the real deal with the Savo dialect:\r\n\r\nhttps://www.youtube.com/watch?v=lQPy21If6TY', '2016-06-12 04:44:07', 1, 11, 0),
(19, 1, 'Now this is the real deal with the Savo dialect: \r\n<iframe width="480" height="270" src="https://www.youtube.com/embed/lQPy21If6TY" frameborder="0" allowfullscreen></iframe>', '2016-06-12 04:47:22', 0, 11, 4),
(20, 12, 'Nice job back in Iraq, now you know why I''ve chosen you as our esteemed General!', '2016-06-12 04:54:22', 0, 11, 2),
(21, 8, 'OREWA OCHINCHIN GADAISUKE NANDAYO!', '2016-06-12 04:56:18', 0, 8, 2),
(22, 14, 'Fist me dade', '2016-06-12 04:56:58', 0, 8, 0),
(23, 11, 'Welcome to the rice fields motherfucker!', '2016-06-12 05:00:55', 0, 8, 2),
(24, 13, 'You''ve always been one of our proxies during our sniper bullying rampage during HS, just sayin'' HAHAHAHAH', '2016-06-12 05:01:54', 0, 8, 0),
(25, 12, 'Noob HHUEHEUAEUHUEHEAUAHEUEU', '2016-06-12 05:02:12', 0, 8, 0),
(26, 1, 'You''re that guy who does Software Engineering I with that Adler fella, right? Heard about you...', '2016-06-12 05:07:13', 0, 13, 2),
(27, 11, 'Hey m8, where were you at this last weekend? I left the door of the frat open thinking that you''d show up during the night.', '2016-06-12 05:08:31', 0, 13, 0),
(28, 9, 'Hey, I got those figures you''re looking for lately, look for me on the cafeteria tomorrow morning.', '2016-06-12 05:09:58', 0, 13, 1),
(29, 8, 'Ugh, know that I accepted your friend request with some regrets, you filthy scum!', '2016-06-12 05:15:15', 0, 9, 2),
(30, 12, '', '2016-06-12 05:16:01', 1, 9, 0),
(31, 12, 'Dude, when will you come back to Brazil, we miss you grealy around here, the RPG sessions are nothing without your crazy Barbarian xD', '2016-06-12 05:16:30', 1, 9, 0),
(32, 12, 'Dude, when will you come back to Brazil? We miss you grealy around here, the RPG sessions are nothing without your crazy Barbarian xD', '2016-06-12 05:16:49', 0, 9, 0),
(33, 14, 'Fist me daddy', '2016-06-12 05:17:44', 0, 9, 0),
(34, 19, 'You have commited crimes against Skyrim and its people, what you say in your defense?', '2016-06-12 05:18:37', 0, 9, 2),
(35, 5, 'Haven''t heard of you lately, how are you doing there in Santa Rita?', '2016-06-12 05:19:21', 0, 9, 2),
(36, 18, 'Like a b0ss!', '2016-06-12 05:20:11', 0, 18, 2),
(37, 14, 'Next collab coming right up!', '2016-06-12 05:21:40', 0, 18, 1),
(38, 9, 'I''m fine m8! Long time no see! I expect to find you guys at CambuÃ­ during the vacations!', '2016-06-12 05:25:17', 0, 5, 2),
(39, 5, 'Figures...', '2016-06-12 05:26:53', 0, 1, 1),
(40, 13, 'That''s right, it''s me, it''s a nice course, such a privilege to do it in the 3rd semester with your seniors :P', '2016-06-12 05:28:36', 0, 1, 0),
(41, 18, 'Thanks for showing me Undertale ;)', '2016-06-12 08:19:26', 0, 1, 0),
(42, 9, 'Heya m8!', '2016-06-13 21:44:08', 0, 20, 0),
(43, 1, 'Topcoder kekesimus maximus\r\n', '2016-06-13 21:44:47', 0, 20, 1),
(44, 21, 'Damn those stormcloak rebels to Oblivion!', '2016-06-13 22:03:38', 0, 1, 0),
(45, 20, 'Ta ficando muito show essa rede social', '2016-06-16 01:34:27', 0, 20, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `upvotes`
--

CREATE TABLE `upvotes` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `upvotes`
--

INSERT INTO `upvotes` (`id`, `post_id`, `user_id`) VALUES
(2, 1, 14),
(3, 2, 14),
(4, 5, 1),
(5, 6, 1),
(7, 3, 1),
(8, 5, 12),
(9, 12, 11),
(10, 10, 11),
(11, 3, 11),
(12, 13, 11),
(13, 16, 8),
(14, 3, 8),
(15, 15, 8),
(16, 12, 8),
(17, 19, 13),
(18, 12, 13),
(19, 28, 9),
(20, 12, 9),
(21, 15, 9),
(22, 20, 9),
(23, 9, 9),
(24, 3, 9),
(25, 8, 9),
(26, 6, 9),
(27, 3, 18),
(28, 17, 18),
(29, 12, 18),
(30, 15, 18),
(31, 21, 18),
(32, 29, 18),
(33, 35, 5),
(34, 15, 5),
(35, 23, 5),
(36, 19, 5),
(37, 5, 5),
(38, 35, 1),
(39, 26, 1),
(40, 34, 19),
(41, 36, 1),
(42, 20, 1),
(43, 12, 1),
(44, 15, 1),
(45, 34, 1),
(46, 19, 1),
(47, 29, 8),
(48, 37, 1),
(49, 38, 9),
(50, 36, 16),
(51, 38, 20),
(52, 26, 20),
(53, 19, 20),
(54, 15, 20),
(55, 21, 20),
(56, 23, 20),
(57, 39, 20),
(58, 43, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `email` varchar(96) NOT NULL,
  `password` varchar(64) NOT NULL,
  `sex` varchar(8) NOT NULL,
  `birthday` date NOT NULL,
  `psn` varchar(64) DEFAULT NULL,
  `steam` varchar(64) DEFAULT NULL,
  `xbox_live` varchar(64) DEFAULT NULL,
  `nintendo` varchar(64) DEFAULT NULL,
  `biography` varchar(256) DEFAULT NULL,
  `favorite_game` varchar(64) DEFAULT NULL,
  `user_type` int(11) NOT NULL,
  `register_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `profile_pic` varchar(512) DEFAULT NULL,
  `removed` tinyint(1) NOT NULL,
  `platform` varchar(32) DEFAULT NULL,
  `profile_cover` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `sex`, `birthday`, `psn`, `steam`, `xbox_live`, `nintendo`, `biography`, `favorite_game`, `user_type`, `register_time`, `profile_pic`, `removed`, `platform`, `profile_cover`) VALUES
(1, 'Nixon Moreira Silva', 'nixonmoreira@hotmail.com', 'nixon123', 'male', '0000-00-00', 'merc_roach', 'Red Kaiser', 'RedKaiser42', 'Ah vÃ©i', '"Nichts ist fÃ¼r dich... Nichts war fÃ¼r dich... Nichts bleibt fÃ¼r dich... FÃ¼r immer!"', 'Battlefield 3', 0, '2016-06-17 17:51:40', '_imagens/profile_pic/14661019765762f0d8c2f87.jpg', 0, 'PC', '_imagens/profile_cover/1466185900576438ac33cea.jpg'),
(2, 'Ronegro', 'ronegro@negro.negro', 'negro123', 'other', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2016-06-03 19:06:42', NULL, 1, '', NULL),
(3, 'Andrew Ian Soares Simmon', 'andrew@unifei.edu.br', 'perdi', 'male', '0000-00-00', 'pudim64br', 'pudim64br', '', '', 'Leitura Ã© minha rotina', 'Final Fantasy VII', 0, '2016-06-17 17:55:58', '_imagens/profile_pic/1465705807575ce54f8d6dd.jpg', 0, 'Playstation 4', '_imagens/profile_cover/1466186158576439ae0f0cc.jpg'),
(4, 'RogÃ©rio', 'rogeriojr4@live.com', '123', 'male', '0000-00-00', NULL, 'Rogerio', NULL, NULL, NULL, NULL, 0, '2016-06-12 23:36:42', NULL, 0, '', NULL),
(5, 'Rafael Soares dos Reis Macris', 'rafa07@hotmail.com', 'rafa123', 'male', '1997-07-23', '', 'Tsotso', '', '', 'Estudo na INATEL e sou depressivo.', 'Crysis', 0, '2016-06-12 23:36:11', '_imagens/profile_pic/1465709077575cf2150bcf9.jpg', 0, '', NULL),
(6, 'adler diniz', 'adlerunifei@gmail.com', '12345', 'male', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2016-06-03 19:06:55', NULL, 1, '', NULL),
(7, 'Ronegro Novo', 'ronegro_seducao@negro.com', 'negro123', 'other', '1880-12-03', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2016-06-03 19:06:35', NULL, 1, '', NULL),
(8, 'Ulf Westberg', 'vice_keisari@gaea.gov.imp', 'filthy_frank*924', 'male', '1997-03-21', 'westo_j2010', 'Cool Westo', 'RoutineMovie138', '', 'It''s filthy frank motherfucker! It''s filthy frank bitch!', 'Hunter 3', 0, '2016-06-12 05:02:47', '_imagens/profile_pic/1465707612575cec5c4bb02.jpe', 0, '', NULL),
(9, 'Robin Kowalewski', 'robin_2246@yahoo.com.pl', 're24ad8*SDA', 'male', '1997-07-02', 'robin_kowalewski', 'Robin of Rivendell', 'robin_2246', 'MarkistTheory42', 'Born in Poland and went to Brazil to fight for the development of the Empire of Gaea. Also, live in the same fraternity as Markus Mannerheim. Studies Hydric Engineering at Federal University of Itajuba', 'Final Fantasy VII', 0, '2016-06-12 05:19:40', '_imagens/profile_pic/1465708479575cefbf4d69c.png', 0, '', NULL),
(10, 'Robin Kowalewski', 'robin_2246@yahoo.com.pl', 're24ad8*SDA', 'male', '1997-07-02', 'robin_kowalewski', 'Robin of Rivendell', 'robin_2246', 'MarkistTheory42', 'Born in Poland and went to Brazil to fight for the development of the Empire of Gaea. Also, live in the same fraternity as Markus Mannerheim. Studies Hydric Engineering at Federal University of Itajubá ', 'Final Fantasy VII', 0, '2016-06-03 19:07:17', NULL, 1, '', NULL),
(11, 'Markus Mannerheim', 'keisari@gaea.gov.imp', '3489_Aus1$UR', 'male', '1997-04-14', 'merc_woods', 'Markek Maximus', 'Noob_Coder_2015', 'Markek_Maximus', 'You know who I am!', 'Hunter - War At Mars', 0, '2016-06-12 04:41:02', '_imagens/profile_pic/1465706462575ce7dec43c3.png', 0, '', NULL),
(12, 'Emerson Baumann', 'emerson_baumann@yahoo.com.de', 'e124k293EPR', 'male', '1997-05-06', 'Baumann_732', 'General Baumann', 'General_Baumann', 'General_Baumann', 'General of the Imperial Armed Forces, like to play some shooter game every once in a while.', 'Battlefield 4', 0, '2016-06-12 04:32:40', '_imagens/profile_pic/1465705960575ce5e83d651.png', 0, '', NULL),
(13, 'Dansk Trondheim', 'nubenube@yahoo.com.dn', 'nubenube', 'male', '1998-02-12', 'Dansk_0357_TRDM', 'nube_123', 'nube_123', 'nube_123', 'Hi there! I''m a Information System student at UNIFEI. I like to play League of Legends and other MOBA genre games.', 'League of Legends', 0, '2016-06-12 05:06:17', '_imagens/profile_pic/1465707901575ced7db22e2.png', 0, 'PC', NULL),
(14, 'Felix Arvid Ulf Kjellberg', 'poods@gmail.com', 'deutschland', 'male', '1989-10-02', 'felix_03_ulf', 'Saladass', '', '', 'Stop sending me "Fist me daddy" messages!', 'agar.io', 0, '2016-06-12 23:36:51', '_imagens/profile_pic/1465705727575ce4ffd2174.png', 0, 'PC', NULL),
(15, 'Vilkas Mannerheim', 'keisari@gaea.gov.imp', 'vilkas123', 'male', '2001-05-12', 'xX_vilkasQS_Xx', 'vilkassen', 'FireDragon981', NULL, 'Son of Mikhail, the Bold, and proud conciliator between two enemy species.', 'Hunter 4', 0, '2016-06-03 19:10:57', NULL, 0, 'Playstation 4', NULL),
(16, 'Luiz Celso Arruda Filho', 'lully2015@hotmail.com', 'lully123', 'male', '2005-02-28', 'isanity_gamer', 'isanity_gamer', 'isanity238', '', 'Mor gamer minecraft S2', 'Minecraft', 0, '2016-06-13 00:03:10', '_imagens/profile_pic/1465776190575df83e53ad3.jpg', 0, 'Playstation 4', NULL),
(17, 'Mikhail Mannerheim', 'keisari@gaea.gov.imp', 'mikhail123', 'male', '2000-03-17', 'mikhail_jaeger', 'jaeger_2k', 'BlackJaeger401', 'Jageren_29', 'I''m Mikhail, the Bold, greatest military leader and emperor this empire had! I fought against the Telsicians and won like a boss!', 'Hunter 4', 0, '2016-06-12 23:34:26', NULL, 1, 'PC', NULL),
(18, 'SeÃ¡n McLoughlin', 'jackscepticeye@outlook.com', 'jack1234', 'male', '1990-03-21', 'jack_a_boss', 'jack_a_boss', 'jack_a_boss', '', 'Like a b0ss', 'Undertale', 0, '2016-06-12 05:21:00', '_imagens/profile_pic/1465708860575cf13c8ab29.png', 0, 'PC', NULL),
(19, 'Ronei Teixeira Costa JÃºnior', 'ronei@unifei.edu.br', 'ronei123', 'male', '1996-12-24', 'Ronei_123', '', '', '', 'SERIES, SERIES ALL DAY ALONG', 'Chrono Trigger', 0, '2016-06-12 23:34:37', '_imagens/profile_pic/1465714245575d0645b1ad5.png', 0, 'PC', NULL),
<<<<<<< HEAD
(20, 'Will Saymon', 'wsaymonoficial@gmail.com', 'will123', 'male', '0000-00-00', '', 'Wyru', '', '', 'You can''t move others hearts, unless you can move your own.', 'Monster Hunter', 0, '2016-06-16 00:57:36', '_imagens/profile_pic/1465854196575f28f44049c.jpg', 0, 'PSP', NULL),
(21, 'Pedro Lomonaco', 'pedro_ditd@hotmail.com', 'pedro123', 'male', '0000-00-00', '', 'SuspiroDourado', '', '', 'Born this way!', 'League of Legends', 0, '2016-06-13 21:55:45', '_imagens/profile_pic/1465854886575f2ba6c7254.jpg', 0, 'PC', NULL);
=======
(20, 'Will Saymon', 'wsaymonoficial@gmail.com', 'will123', 'male', '0000-00-00', '', 'Wyru', '', '', 'You can''t move others hearts, unless you can move your own.', 'Monster Hunter', 2, '2016-06-17 12:43:29', '_imagens/profile_pic/1465854196575f28f44049c.jpg', 0, 'PSP', NULL),
(21, 'Pedro Lomonaco', 'pedro_ditd@hotmail.com', 'pedro123', 'male', '0000-00-00', '', 'SuspiroDourado', '', '', 'Born this way!', 'League of Legends', 0, '2016-06-13 21:55:45', '_imagens/profile_pic/1465854886575f2ba6c7254.jpg', 0, 'PC', NULL),
(22, 'Eduardo Faggiani', 'edufaggiani@unifei.edu.br', 'edu123', 'male', '0000-00-00', '', '', '', '', 'Tuts tuts quero ver', 'Final Fantasy Tactics', 0, '2016-06-16 15:09:57', '_imagens/profile_pic/14660897965762c144f3a3d.jpg', 0, 'PC', NULL),
(23, 'Wilhem Pfaffenbach', 'wilhem@yahoo.com.de', 'wilhem123', 'male', '1997-05-01', '', 'Hardened Jaeger', 'Wilhem_245', '', '"We''re building it up, to break it back down, we''re building it up, to burn it down, we can''t wait, to burn it to the ground!"', 'Battlefield 4', 0, '2016-06-16 21:59:17', '_imagens/profile_pic/1466114357576321358cf97.png', 0, 'XBOX One', NULL);
>>>>>>> origin/php_integration_v03

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games_played`
--
ALTER TABLE `games_played`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upvotes`
--
ALTER TABLE `upvotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
<<<<<<< HEAD
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
=======
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
>>>>>>> origin/php_integration_v03
--
-- AUTO_INCREMENT for table `games_played`
--
ALTER TABLE `games_played`
<<<<<<< HEAD
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
=======
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
>>>>>>> origin/php_integration_v03
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
<<<<<<< HEAD
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
=======
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
>>>>>>> origin/php_integration_v03
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `upvotes`
--
ALTER TABLE `upvotes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
