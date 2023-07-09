-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2020 at 10:58 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_list`
--
CREATE DATABASE IF NOT EXISTS `movie_list` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `movie_list`;

-- --------------------------------------------------------

--
-- Table structure for table `movie_data`
--

CREATE TABLE `movie_data` (
  `m_id` int(11) NOT NULL,
  `name` char(255) NOT NULL,
  `rel_date` date NOT NULL,
  `length` varchar(20) NOT NULL,
  `size` char(50) NOT NULL,
  `color` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_data`
--

INSERT INTO `movie_data` (`m_id`, `name`, `rel_date`, `length`, `size`, `color`) VALUES
(1, 'Avatar', '2009-12-18', '2hr 42min', '2GB', '#000080'),
(2, 'Battleship', '2012-05-18', '2hr 11min', '850MB', '#000000'),
(3, 'Cars', '2006-06-09', '1hr 57min', '601MB', '#ff0000'),
(4, 'Cars 2', '2011-06-24', '1hr 46min', '651MB', '#cc0000'),
(5, 'Cars 3', '2017-06-16', '1hr 42min', '741MB', '#990000'),
(6, 'Charlie and the Chocolate Factory', '2005-07-15', '1hr 55min', '751MB', '#ff0066'),
(7, 'Cloudy with a Chance of Meatballs', '2009-09-18', '1hr 30min', '550MB', '#ff6600'),
(8, 'Cloudy with a Chance of Meatballs 2', '2013-09-27', '1hr 35min', '756MB', '#ff3300'),
(9, 'Despicable Me', '2010-07-09', '1hr 35min', '756MB', '#e60000'),
(10, 'Despicable Me 2', '2013-07-03', '1hr 38min', '758MB', '#ff751a'),
(11, 'Despicable Me 3', '2017-06-30', '1hr 29min', '658MB', '#ff9900'),
(12, 'Diary of a Wimpy Kid', '2010-03-19', '2hr 0min', '442MB', '#cc6699'),
(13, 'Diary of a Wimpy Kid: Dog Days', '2012-08-03', '1hr 34min', '750MB', '#3399ff'),
(14, 'Diary of a Wimpy Kid: Rodrick Rules', '2011-03-25', '1hr 40min', '549MB', '#ff00ff'),
(15, 'Jurassic World', '2015-06-12', '2hr 4min', '870MB', '#00cc00'),
(16, 'Kung Fu Panda', '2008-06-06', '1hr 32min', '601MB', '#ff3333'),
(17, 'Kung Fu Panda 2', '2011-05-26', '1hr 30min', '601MB', '#ffcc00'),
(18, 'Kung Fu Panda 3', '2016-01-29', '1hr 35min', '696MB', '#009933'),
(19, 'Madagascar', '2005-05-27', '1hr 26min', '499MB', '#80bfff'),
(20, 'Madagascar: Escape 2 Africa', '2008-11-07', '1hr 29min', '699MB', '#cc6600'),
(21, 'Madagascar 3: Europe''s Most Wanted', '2012-06-08', '1hr 33min', '699MB', '#3333ff'),
(22, 'Mr. Bean''s Holiday', '2007-08-24', '1hr 30min', '700MB', '#666699'),
(23, 'Mr. Peabody & Sherman', '2014-03-07', '1hr 32min', '752MB', '#9900cc'),
(24, 'Night at the Museum', '2006-12-22', '1hr 48min', '751MB', '#ffd11a'),
(25, 'Night at the Museum: Battle of the Smithsonian', '2009-05-22', '1hr 45min', '750MB', '#660066'),
(26, 'Night at the Museum: Secret of the Tomb', '2014-12-19', '1hr 38min', '757MB', '#660033'),
(27, 'Penguins of Madagascar', '2014-11-26', '1hr 32min', '750MB', '#ccccff'),
(28, 'Ratatouille', '2007-06-29', '1hr 51min', '502MB', '#ffcc66'),
(29, 'The Adventures of Tintin', '2011-12-21', '1hr 47min', '677MB', '#663300'),
(30, 'The Hobbit: An Unexpected Journey', '2012-12-14', '3hr 2min', '1.83GB', '#009933'),
(31, 'The Hobbit: The Desolation of Smaug', '2013-12-13', '3hr 6min', '1.88GB', '#996633'),
(32, 'The Hobbit: The Battle of the Five Armies', '2014-12-17', '2hr 44min', '1.88GB', '#003300'),
(33, 'The Lord of the Rings: The Fellowship of the Ring', '2001-12-19', '3hr 48min', '1.50GB', '#996633'),
(34, 'The Lord of the Rings: The Two Towers', '2002-12-18', '3hr 55min', '1.34GB', '#00ffcc'),
(35, 'The Lord of the Rings: The Return of the King', '2003-12-17', '4hr 23min', '1.60GB', '#000000'),
(36, 'Zootopia', '2016-03-04', '1hr 48min', '799MB', '#00ffff'),
(37, 'Harry Potter and the Sorcerer''s Stone', '2001-11-16', '2hr 32min', '549MB', '#000000'),
(38, 'Harry Potter and the Chamber of Secrets', '2002-11-15', '2hr 41min', '599MB', '#000000'),
(39, 'Harry Potter and the Prisoner of Azkaban', '2004-06-04', '2hr 22min', '549MB', '#000000'),
(40, 'Harry Potter and the Goblet of Fire', '2005-11-18', '2hr 37min', '598MB', '#000000'),
(41, 'Harry Potter and the Order of the Phoenix', '2007-07-11', '2hr 18min', '549MB', '#000000'),
(42, 'Harry Potter and the Half-Blood Prince', '2009-07-15', '2hr 33min', '651MB', '#000000'),
(43, 'Harry Potter and the Deathly Hallows: Part 1', '2010-11-19', '2hr 26min', '998MB', '#000000'),
(44, 'Harry Potter and the Deathly Hallows: Part 2', '2011-07-15', '2hr 10min', '1GB', '#000000'),
(45, 'Jumanji: Welcome to the Jungle', '2017-12-20', '1hr 59min', '1020MB', '#00cc30'),
(46, 'Big Hero 6', '2014-11-07', '1hr 42min', '810MB', '#00aaff'),
(47, 'Interstellar', '2014-11-07', '2hr 49min', '1.02GB', '#000066'),
(48, 'Sherlock Holmes', '2009-12-25', '2hr 8min', '800MB', '#5c5c3d'),
(49, 'Sherlock Holmes: A Game of Shadows', '2011-12-16', '2hr 9min', '802MB', '#9966ff'),
(50, 'Batman Begins', '2005-06-15', '2hr 20min', '849MB', '#000066'),
(51, 'The Dark Knight', '2008-07-18', '2hr 32min', '949MB', '#000033'),
(52, 'The Dark Knight Rises', '2012-07-20', '2hr 44min', '1.10GB', '#00001a'),
(53, 'Inception', '2010-07-16', '2hr 28min', '1.07GB', '#3d5c5c'),
(54, 'Rampage', '2018-04-13', '1hr 47min', '931MB', '#003300'),
(55, 'Ready Player One', '2018-03-29', '2hr 20min', '1.17GB', '#6600cc'),
(56, 'Iron Man', '2008-05-02', '2hr 6min', '749MB', '#da1f28'),
(57, 'The Incredible Hulk', '2008-06-13', '1hr 52min', '648MB', '#a2cd48'),
(58, 'Iron Man 2', '2010-05-07', '1hr 59min', '698MB', '#760c10'),
(59, 'Thor', '2011-05-06', '1hr 54min', '703MB', '#2c3034'),
(60, 'Captain America: The First Avenger', '2011-07-22', '2hr 4min', '756MB', '#1849ca'),
(61, 'The Avengers', '2012-05-04', '2hr 22min', '1023MB', '#266ef6'),
(62, 'Iron Man 3', '2013-05-03', '2hr 10min', '925MB', '#990033'),
(63, 'Thor: The Dark World', '2013-11-08', '1hr 52min', '811MB', '#000000'),
(64, 'Captain America: The Winter Soldier', '2014-04-04', '2hr 15min', '930MB', '#000066'),
(65, 'Guardians of the Galaxy', '2014-08-01', '2hr 00min', '870MB', '#660066'),
(66, 'Avengers: Age of Ultron', '2015-05-01', '2hr 21min', '930MB', '#3399ff'),
(67, 'Ant-Man', '2015-07-17', '1hr 57min', '757MB', '#9d152c'),
(68, 'Captain America: Civil War', '2016-05-06', '2hr 27min', '1.05GB', '#0e305d'),
(69, 'Doctor Strange', '2016-11-04', '1hr 54min', '844MB', '#008dc8'),
(70, 'Guardians of the Galaxy Vol. 2', '2017-05-05', '2hr 15min', '999MB', '#ff0066'),
(71, 'Spider-Man: Homecoming', '2017-07-07', '2hr 13min', '985MB', '#e60000'),
(72, 'Thor: Ragnarok', '2017-11-03', '2hr 10min', '1.04GB', '#660066'),
(73, 'Black Panther', '2018-02-16', '2hr 14min', '1.13GB', '#333333'),
(74, 'Avengers: Infinity War', '2018-04-27', '2hr 29min', '1.25GB', '#ff3300'),
(75, 'Man of Steel', '2013-06-14', '2hr 23min', '978MB', '#0066cc'),
(76, 'Batman v Superman: Dawn of Justice', '2016-03-25', '3hr 2min', '1.48GB', '#000000'),
(77, 'Suicide Squad', '2016-08-05', '2hr 14min', '1007MB', '#00cc66'),
(78, 'Wonder Woman', '2017-06-02', '2hr 21min', '1.03GB', '#ffcc00'),
(79, 'Justice League', '2017-11-17', '2hr 0min', '1.08GB', '#3333cc'),
(80, 'Jurassic World: Fallen Kingdom', '2018-06-22', '2hr 8min', '1.07GB', '#1b1b1b'),
(81, 'Shutter Island', '2010-02-19', '2hr 18min', '599MB', '#1b1b1b'),
(82, 'The Commuter', '2018-01-12', '1hr 45min', '902MB', '#232323'),
(83, 'The Imitation Game', '2014-12-25', '1hr 54min', '813MB', '#823502'),
(84, 'The Martian', '2015-10-02', '2hr 24min', '1.02GB', '#ff8d30'),
(85, 'The Prestige', '2006-10-20', '2hr 10min', '594MB', '#8c4f4f'),
(86, 'Pirates of the Caribbean: The Curse of the Black Pearl', '2003-07-09', '2hr 23min', '900MB', '#af0303'),
(87, 'Pirates of the Caribbean: Dead Man''s Chest', '2006-07-07', '2hr 31min', '950MB', '#2c9e31'),
(88, 'Pirates of the Caribbean: At World''s End', '2007-05-25', '2hr 49min', '1019MB', '#2c709e'),
(89, 'Pirates of the Caribbean: On Stranger Tides', '2011-05-20', '2hr 16min', '900MB', '#2c9e7d'),
(90, 'Pirates of the Caribbean: Dead Men Tell No Tales', '2017-05-26', '2hr 9min', '961MB', '#6197ce'),
(91, 'Skyscraper', '2018-07-13', '1hr 42min', '866MB', '#d84e4e'),
(92, 'Spirit: Stallion of the Cimarron', '2002-05-24', '1hr 23min', '550MB', '#f49b42'),
(93, 'Ant-Man and the Wasp', '2018-07-06', '1hr 58min', '1005MB', '#d30026'),
(94, 'The Fast and the Furious', '2001-06-22', '1hr 46min', '650MB', '#42b3f4'),
(95, '2 Fast 2 Furious', '2003-06-06', '1hr 47min', '650MB', '#9bf442'),
(96, 'The Fast and the Furious: Tokyo Drift', '2006-06-16', '1hr 44min', '750MB', '#ff7b00'),
(97, 'Fast & Furious', '2009-04-03', '1hr 47min', '750MB', '#ffdd00'),
(98, 'Fast Five', '2011-04-29', '2hr 10min', '851MB', '#01577c'),
(99, 'Fast & Furious 6', '2013-05-24', '2hr 10min', '922MB', '#a80000'),
(100, 'Furious 7', '2015-04-03', '2hr 17min', '933MB', '#3d3a3a'),
(101, 'The Fate of the Furious', '2017-04-14', '2hr 16min', '1007MB', '#203e44'),
(102, 'Dunkirk', '2017-07-21', '1hr 46min', '810MB', '#2c6eba'),
(103, 'In Time', '2011-10-28', '1hr 49min', '701MB', '#494949'),
(104, 'Ultimate Avengers', '2006-02-21', '1hr 12min', '701MB', '#ffaa00'),
(105, 'Venom', '2018-10-05', '1hr 52min', '908MB', '#728c00'),
(106, 'Fantastic Beasts and Where to Find Them', '2016-11-18', '2hr 13min', '988MB', '#7f0909'),
(107, 'Aquaman', '2018-12-21', '2hr 23min', '1.20GB', '#0000ff'),
(108, 'Fantastic Beasts: The Crimes of Grindelwald', '2018-11-16', '2hr 14min', '1.12GB', '#404040'),
(109, 'Spider-Man: Into the Spider-Verse', '2018-11-14', '1hr 57min', '995MB', '#df1f2d'),
(110, 'Up', '2009-05-29', '1hr 36min', '601MB', '#133984'),
(111, 'Journey to the Center of the Earth', '2008-07-11', '1hr 33min', '600MB', '#661400'),
(112, 'Journey 2: The Mysterious Island', '2012-02-10', '1hr 34min', '600MB', '#669900'),
(113, 'It', '2017-09-08', '2hr 15min', '997MB', '#1b1b1b'),
(114, 'La La Land', '2016-12-25', '2hr 8min', '932MB', '#ff0066'),
(115, 'Kong: Skull Island', '2017-03-10', '1hr 58min', '883MB', '#cc6600'),
(116, 'The Conjuring', '2013-07-19', '1hr 52min', '817MB', '#999966'),
(117, 'Annabelle', '2014-10-03', '1hr 39min', '758MB', '#999966'),
(118, 'The Conjuring 2', '2016-06-10', '2hr 14min', '974MB', '#999966'),
(119, 'Annabelle: Creation', '2017-08-11', '1hr 49min', '801MB', '#999966'),
(120, 'The Nun', '2018-09-07', '1hr 36min', '831MB', '#999966'),
(121, 'Captain Marvel', '2019-03-08', '2hr 3min', '1.03GB', '#cc4224'),
(122, 'Shazam!', '2019-04-05', '2hr 12min', '1.09GB', '#dc302c'),
(123, 'Escape Room', '2019-01-04', '1hr 39min', '812MB', '#000066'),
(124, 'Glass', '2019-01-18', '2hr 9min', '1.08GB', '#ffcc00'),
(125, 'Godzilla', '2014-05-16', '2hr 3min', '868MB', '#000000'),
(126, 'Source Code', '2011-04-01', '1hr 33min', '551MB', '#0066cc'),
(127, 'The Equalizer', '2014-09-26', '2hr 12min', '873MB', '#1b1b1b'),
(128, 'The Equalizer 2', '2018-07-20', '2hr 1min', '1.02GB', '#1b1b1b'),
(129, 'The Happening', '2008-06-13', '1hr 31min', '601MB', '#cc9900'),
(130, 'The Invisible Guest', '2016-09-23', '1hr 46min', '918MB', '#999999'),
(131, 'Triangle', '2009-10-24', '1hr 39min', '651MB', '#990000'),
(132, 'Us', '2019-03-22', '1hr 56min', '996MB', '#b30000'),
(133, 'What Happened to Monday', '2017-08-18', '2hr 3min', '1.03GB', '#a6a6a6'),
(134, 'Avengers: Endgame', '2019-04-26', '3hr 1min', '1.43GB', '#1a1a64');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie_data`
--
ALTER TABLE `movie_data`
  ADD PRIMARY KEY (`m_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie_data`
--
ALTER TABLE `movie_data`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
