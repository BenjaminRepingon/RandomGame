-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 05, 2014 at 08:01 PM
-- Server version: 5.5.38-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `randomgame`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Strategy'),
(2, 'Arcade'),
(3, 'Shooters'),
(4, 'Racing'),
(5, 'Sports'),
(8, 'Action'),
(9, 'Puzzle'),
(10, 'Funny'),
(11, 'Girl'),
(12, 'Adventure'),
(13, 'Multiplayer'),
(14, 'Social');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_game` int(11) NOT NULL,
  `content` varchar(2048) NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iframe` varchar(1024) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link_name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` varchar(4096) NOT NULL,
  `rating` int(11) NOT NULL,
  `instructions` varchar(4096) NOT NULL,
  `id_category` int(11) NOT NULL,
  `plays` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `iframe`, `title`, `link_name`, `author`, `description`, `rating`, `instructions`, `id_category`, `plays`, `date`, `img`) VALUES
(2, '<iframe src="http://www.wooglie.com/iframegame.php?gameID=1160&BGCOLOR=000000" style="padding: 0px 0px 0px 0px;left: 0px; top: 0px; border: 0px; width: 800px; height: 680px" scrolling="no" frameborder=0></iframe>', 'Cubemen', 'cubemen', '\r\n3 Sprockets', 'Fast paced, Action packed, original Single & Multi-Player 3D Tower Defense meets RTS! Get ready for some crazy Cubemen action!\n\nIt''s the age old struggle between Good vs Bad, Blue vs Red, Little men vs Little men. Use your own little Cubemen to defend your base from other little Cubemen that are trying to run it over. It''s the usual story, but with many very interesting twists.\n\nPlay a purely defense game in various modes on a sweet selection of levels, or go into Skirmish mode and play a new type of TD game against either the computer or another human opponent. That''s right.. Two way REAL-TIME TD against the computer or a real person!\n\nThere are no static towers, just little men! Spawn your little Cubemen with orders to get to a certain location to attack or defend. You can move your Cubemen around the board at any time or click on an enemy to target them.\n\nIt’s TD like you''ve never seen or experienced before. Play it now!\n\nFull game (26 Defense levels, 20 Skirmish levels, new Medic Cubeman) available on:-\nSteam - http://store.steampowered.com/app/207250/\nDesura - http://www.desura.com/games/cubemen', 4, 'Mouse Controlled', 1, 10, '2014-10-02 21:27:46', 'cubemen.png'),
(3, '<iframe src="http://www.wooglie.com/iframegame.php?gameID=2082&BGCOLOR=000000" style="padding: 0px 0px 0px 0px;left: 0px; top: 0px; border: 0px; width: 840px; height: 500px" scrolling="no" frameborder=0></iframe>', 'Zombies Don t''Run', 'zombies_don_t_run', '\r\nJeebumm', 'Your car is broken, you can''t drive any further. From now the only way to survive on the road is to take your baseball bat and run. How long can you stay alive on the highway full of zombies, crashed cars and the other deadly obstacles ?\n\nThe game contains 2 play modes:\n\n- Bloody Highway - run as far as you can\n- Prison Outbreak - use your baseball bat to get rid of the hordes of zombies', 5, 'Left/Right arrow - move\nDown arrow - slide\nUp arrow - jump\nSpace - attack\nSpace while jumping - jump kick\n\nEsc - pause\n', 2, 12, '2014-10-03 20:03:57', 'zombies_don_t_run.jpg'),
(4, '<iframe src="http://www.wooglie.com/iframegame.php?gameID=407&BGCOLOR=000000" style="padding: 0px 0px 0px 0px;left: 0px; top: 0px; border: 0px; width: 900px; height: 680px" scrolling="no" frameborder=0></iframe>', 'Red Crucible', 'red_crucible', 'Rocketeer Games Studio', 'Blast, smash, crush and destroy your opponents with some of the worlds deadliest modern weapons and vehicles!\n\nRed Crucible is a fully rendered 3D online multiplayer, web browser game with real time lighting along with some of the most stunning 3D levels and arenas found anywhere.\n\nVisit our Facebook page:\nhttps://www.facebook.com/groups/RC2PlayersLounge/\n\nPlay on our website:\nhttp://www.rocketeergames.com/redcrucible.html\n', 0, 'General:\nMove - W, A, S, D\nLook - Mouse/Trackpad\nCrouch - C\nJump - Space\nSprint - Shift/Q\nIron Sight/Zoom - F (or right-click for infantry)\nWalk - Shift\nCamera mode - V\nReload - R\nOperate or Exit Vehicle - E\nThrow Grenades - G\nUse Inventory items - Number keys 7,8,9,0\n\nEquipment:\nPrimary Weapon - 1\nSecondary Weapon - 2\nKnife - 3\n\nHelicopters:\nRotors - Space/C\nMove - W, A, D, S\n\nJets:\nThrust - W\nBreak/Land - S\nSteer - Mouse\n\nGame:\nMenu - M\nInventory - I\nGame Stats - Tab\nFull Screen - F1\nChat - Enter/Return\nTeam Chat - T\n\nMap - U\nZoom Map - +/-\n\nWhile in chat mode:\nUp/Down Arrow - Scoll chat\nLeft/Right Arrow - Change chat mode (all, team, friends)', 3, 0, '2014-10-05 17:25:12', 'red_crucible.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `admin`) VALUES
(5, 'pok', '3932dafec15dedb5cf3c7341a584bc39e35ae7ea12aaaf108fca5b70c1ea583593c900e11be6f18ae5dbd51dd5cdd667c6e97961667488167ef3ae9718b64de9', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
