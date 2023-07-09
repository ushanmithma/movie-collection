-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2020 at 10:55 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `details`
--
CREATE DATABASE IF NOT EXISTS `details` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `details`;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `age_rating` char(20) NOT NULL,
  `runtime` char(20) NOT NULL,
  `imdb_rating` char(3) NOT NULL,
  `release_date` char(20) NOT NULL,
  `genres` varchar(1000) NOT NULL,
  `size` char(20) NOT NULL,
  `quality` char(20) NOT NULL,
  `directors` varchar(1000) NOT NULL,
  `description` text NOT NULL,
  `color` text NOT NULL,
  `trailer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `age_rating`, `runtime`, `imdb_rating`, `release_date`, `genres`, `size`, `quality`, `directors`, `description`, `color`, `trailer`) VALUES
(1, 'Avengers: Endgame', 'PG-13', '3hr 1min', '8.6', '2019-04-26', 'Action, Adventure, Sci-Fi', '1.43GB', '720p WEB', 'Anthony Russo, Joe Russo', 'After the devastating events of Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, the Avengers assemble once more in order to reverse Thanos'' actions and restore balance to the universe.', '#1a1a64', 'https://www.youtube.com/embed/TcMBFSGVi1c'),
(2, 'The Lord of the Rings: The Fellowship of the Ring', 'PG-13', '3hr 48min', '8.8', '2001-12-19', 'Action, Drama, Fantasy', '1.5GB', '720p BRRip', 'Peter Jackson', 'A meek Hobbit from the Shire and eight companions set out on a journey to destroy the powerful One Ring and save Middle-earth from the Dark Lord Sauron.', '#996633', 'https://www.youtube.com/embed/V75dMMIW2B4'),
(3, 'The Lord of the Rings: The Return of the King', 'PG-13', '4hr 23min', '8.9', '2003-12-17', 'Adventure, Drama, Fantasy', '1.6GB', '720p BRRip', 'Peter Jackson', 'Gandalf and Aragorn lead the World of Men against Sauron''s army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring.', '#999966', 'https://www.youtube.com/embed/r5X-hFf6Bwo'),
(4, 'Avengers: Infinity War', 'PG-13', '2hr 29min', '8.5', '2018-04-27', 'Action, Adventure, Sci-Fi', '1.25GB', '720p WEB', 'Anthony Russo, Joe Russo', 'The Avengers and their allies must be willing to sacrifice all in an attempt to defeat the powerful Thanos before his blitz of devastation and ruin puts an end to the universe.', '#d93d27', 'https://www.youtube.com/embed/6ZfuNTqbHE8'),
(5, 'The Dark Knight', 'PG-13', '2hr 32min', '9.0', '2008-07-18', 'Action, Crime, Drama', '949MB', '720p BRRip', 'Christopher Nolan', 'When the menace known as The Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham. The Dark Knight must accept one of the greatest psychological and physical tests of his ability to fight injustice.', '#270e42', 'https://www.youtube.com/embed/EXeTwQWrcwY'),
(6, 'The Dark Knight Rises', 'PG-13', '2hr 44min', '8.4', '2012-07-20', 'Action, Thriller', '1.1GB', '720p BRRip', 'Christopher Nolan', 'Eight years after the Joker''s reign of anarchy, Batman, with the help of the enigmatic Catwoman, is forced from his exile to save Gotham City, now on the edge of total annihilation, from the brutal guerrilla terrorist Bane.', '#00001a', 'https://www.youtube.com/embed/GokKUqLcvD8'),
(7, 'Shazam!', 'PG-13', '2hr 12min', '7.2', '2019-04-05', 'Action, Adventure, Comedy', '1.09GB', '720p BRRip', 'David F. Sandberg', 'We all have a superhero inside us, it just takes a bit of magic to bring it out. In Billy Batson''s case, by shouting out one word - SHAZAM - this streetwise fourteen-year-old foster kid can turn into the grown-up superhero Shazam.', '#c13128', 'https://www.youtube.com/embed/go6GEIrcvFY'),
(8, 'Batman Begins', 'PG-13', '2hr 20min', '8.2', '2005-06-15', 'Action, Adventure', '849MB', '720p BRRip', 'Christopher Nolan', 'After training with his mentor, Batman begins his fight to free crime-ridden Gotham City from corruption.', '#000066', 'https://www.youtube.com/embed/neY2xVmOfUM'),
(9, 'Aquaman', 'PG-13', '2hr 23min', '7.1', '2018-12-21', 'Action, Adventure, Fantasy', '1.2GB', '720p WEB', 'James Wan', 'Arthur Curry, the human-born heir to the underwater kingdom of Atlantis, goes on a quest to prevent a war between the worlds of ocean and land.', '#499dad', 'https://www.youtube.com/embed/WDkg3h8PCVU'),
(10, 'Fantastic Beasts and Where to Find Them', 'PG-13', '2hr 13min', '7.3', '2016-11-18', 'Adventure, Family, Fantasy', '988MB', '720p BRRip', 'David Yates', 'The adventures of writer Newt Scamander in New York''s secret community of witches and wizards seventy years before Harry Potter reads his book in school.', '#7f0909', 'https://www.youtube.com/embed/ViuDsy7yb8M'),
(11, 'It', 'R-Rated', '2hr 15min', '7.4', '2017-09-08', 'Horror', '997MB', '720p BRRip', 'Andy Muschietti', 'In the summer of 1989, a group of bullied kids band together to destroy a shape-shifting monster, which disguises itself as a clown and preys on the children of Derry, their small Maine town.', '#663300', 'https://www.youtube.com/embed/FnCdOQsX5kc'),
(12, 'Pirates of the Caribbean: The Curse of the Black Pearl', 'PG-13', '2hr 23min', '8.0', '2003-07-09', 'Action, Adventure, Fantasy', '900MB', '720p BRRip', 'Gore Verbinski', 'Blacksmith Will Turner teams up with eccentric pirate "Captain" Jack Sparrow to save his love, the governor''s daughter, from Jack''s former pirate allies, who are now undead.', '#af0303', 'https://www.youtube.com/embed/naQr0uTrH_s'),
(13, 'Black Panther', 'PG-13', '2hr 14min', '7.3', '2018-02-16', 'Action, Adventure, Sci-Fi', '1.13GB', '720p BRRip', 'Ryan Coogler', 'T''Challa, heir to the hidden but advanced kingdom of Wakanda, must step forward to lead his people into a new future and must confront a challenger from his country''s past.', '#003366', 'https://www.youtube.com/embed/xjDjIWPwcPU'),
(14, 'The Nun', 'R-Rated', '1hr 36min', '5.4', '2018-09-07', 'Horror, Mystery, Thriller', '836.27MB', '720p BRRip', 'Corin Hardy', 'A priest with a haunted past and a novice on the threshold of her final vows are sent by the Vatican to investigate the death of a young nun in Romania and confront a malevolent force in the form of a demonic nun.', '#999966', 'https://www.youtube.com/embed/pzD9zGcUNrw'),
(15, 'The Conjuring', 'R-Rated', '1hr 52min', '7.5', '2013-07-19', 'Horror, Mystery, Thriller', '817.46MB', '720p BRRip', 'James Wan', 'Paranormal investigators Ed and Lorraine Warren work to help a family terrorized by a dark presence in their farmhouse.', '#999966', 'https://www.youtube.com/embed/k10ETZ41q5o'),
(16, 'The Conjuring 2', 'R-Rated', '2hr 14min', '7.3', '2016-06-10', 'Horror, Mystery, Thriller', '974.89MB', '720p BRRip', 'James Wan', 'Ed and Lorraine Warren travel to North London to help a single mother raising 4 children alone in a house plagued by a supernatural spirit.', '#999966', 'https://www.youtube.com/embed/KyA9AtUOqRM'),
(17, 'Godzilla', 'PG-13', '2hr 3min', '6.4', '2014-05-16', 'Action, Adventure, Sci-Fi', '868.29MB', '720p BRRip', 'Gareth Edwards', 'The world is beset by the appearance of monstrous creatures, but one of them may be the only one who can save humanity.', '#ff9900', 'https://www.youtube.com/embed/vIu85WQTPRc'),
(18, 'Pirates of the Caribbean: Dead Men Tell No Tales', 'PG-13', '2hr 9min', '6.6', '2017-05-26', 'Action, Adventure, Fantasy', '961.25MB', '720p BRRip', 'Joachim RÃ¸nning, Espen Sandberg', 'Captain Jack Sparrow searches for the trident of Poseidon while being pursued by an undead sea captain and his crew.', '#6197ce', 'https://www.youtube.com/embed/Hgeu5rhoxxY'),
(19, 'Furious 7', 'PG-13', '2hr 17min', '7.2', '2015-04-03', 'Action, Adventure, Thriller', '933.50MB', '720p BRRip', 'James Wan', 'Deckard Shaw seeks revenge against Dominic Toretto and his family for his comatose brother.', '#3d3a3a', 'https://www.youtube.com/embed/Skpu5HaVkOc'),
(20, 'Godzilla: King of the Monsters', 'PG-13', '2hr 12min', '6.4', '2019-05-31', 'Action, Adventure, Fantasy', '1.06GB', '720p WEB', 'Michael Dougherty', 'The crypto-zoological agency Monarch faces off against a battery of god-sized monsters, including the mighty Godzilla, who collides with Mothra, Rodan, and his ultimate nemesis, the three-headed King Ghidorah.', '#3366ff', 'https://www.youtube.com/embed/QFxN2oDKk0E'),
(21, 'Ready Player One', 'PG-13', '2hr 20min', '7.5', '2018-03-29', 'Action, Adventure, Sci-Fi', '1.16GB', '720p WEB', 'Steven Spielberg', 'When the creator of a virtual reality called the OASIS dies, he makes a posthumous challenge to all OASIS users to find his Easter Egg, which will give the finder his fortune and control of his world.', '#6600cc', 'https://www.youtube.com/embed/cSp1dM2Vj48'),
(22, 'The Commuter', 'PG-13', '1hr 45min', '6.3', '2018-01-12', 'Action, Mystery, Thriller', '903.38MB', '720p WEB', 'Jaume Collet-Serra', 'An Insurance Salesman/Ex-Cop is caught up in a criminal conspiracy during his daily commute home.', '#232323', 'https://www.youtube.com/embed/aDshY43Ol2U'),
(23, 'The Lord of the Rings: The Two Towers', 'PG', '3hr 55min', '8.7', '2002-12-18', 'Adventure, Drama, Fantasy', '1.34GB', '720p BRRip', 'Peter Jackson', 'While Frodo and Sam edge closer to Mordor with the help of the shifty Gollum, the divided fellowship makes a stand against Sauron''s new ally, Saruman, and his hordes of Isengard.', '#00ffcc', 'https://www.youtube.com/embed/LbfMDwc4azU'),
(24, 'The Hobbit: The Battle of the Five Armies', 'PG-13', '2hr 44min', '7.4', '2014-12-17', 'Adventure, Fantasy', '1.88GB', '720p BRRip', 'Peter Jackson', 'Bilbo and company are forced to engage in a war against an array of combatants and keep the Lonely Mountain from falling into the hands of a rising darkness.', '#003300', 'https://www.youtube.com/embed/ZSzeFFsKEt4'),
(25, 'The Hobbit: An Unexpected Journey', 'PG-13', '3hr 2min', '7.8', '2012-12-14', 'Adventure, Fantasy', '1.83GB', '720p BRRip', 'Peter Jackson', 'A reluctant Hobbit, Bilbo Baggins, sets out to the Lonely Mountain with a spirited group of dwarves to reclaim their mountain home, and the gold within it from the dragon Smaug.', '#009933', 'https://www.youtube.com/embed/SDnYMbYB-nU'),
(26, 'Venom', 'PG-13', '1hr 52min', '6.7', '2018-10-05', 'Action, Sci-Fi, Thriller', '908.6MB', '720p WEB', 'Ruben Fleischer', 'A failed reporter is bonded to an alien entity, one of many symbiotes who have invaded Earth. But the being takes a liking to Earth and decides to protect it.', '#993300', 'https://www.youtube.com/embed/xLCn88bfW1o'),
(27, 'La La Land', 'PG-13', '2hr 8min', '8.0', '2016-12-25', 'Comedy, Drama, Music', '932.57MB', '720p BRRip', 'Damien Chazelle', 'While navigating their careers in Los Angeles, a pianist and an actress fall in love while attempting to reconcile their aspirations for the future.', '#9900ff', 'https://www.youtube.com/embed/0pdqf4P9MB8'),
(28, 'Fantastic Beasts: The Crimes of Grindelwald', 'PG-13', '2hr 14min', '6.6', '2018-11-16', 'Adventure, Family, Fantasy', '1.12GB', '720p WEB', 'David Yates', 'The second installment of the "Fantastic Beasts" series featuring the adventures of Magizoologist Newt Scamander.', '#7f0909', 'https://www.youtube.com/embed/5sEaYB4rLFQ'),
(29, 'Harry Potter and the Sorcerer''s Stone', 'PG', '2hr 32min', '7.6', '2001-11-16', 'Adventure, Family, Fantasy', '550.00MB', '720p BRRip', 'Chris Columbus', 'An orphaned boy enrolls in a school of wizardry, where he learns the truth about himself, his family and the terrible evil that haunts the magical world.', '#336699', 'https://www.youtube.com/embed/VyHV0BRtdxo'),
(30, 'Harry Potter and the Chamber of Secrets', 'PG', '2hr 41min', '7.4', '2002-11-15', 'Adventure, Family, Fantasy', '600.00MB', '720p BRRip', 'Chris Columbus', 'An ancient prophecy seems to be coming true when a mysterious presence begins stalking the corridors of a school of magic and leaving its victims paralyzed.', '#003300', 'https://www.youtube.com/embed/1bq0qff4iF8'),
(31, 'Harry Potter and the Prisoner of Azkaban', 'PG', '2hr 22min', '7.9', '2004-06-04', 'Adventure, Family, Fantasy', '550.00MB', '720p BRRip', 'Alfonso CuarÃ³n', 'It''s Harry''s third year at Hogwarts; not only does he have a new "Defense Against the Dark Arts" teacher, but there is also trouble brewing. Convicted murderer Sirius Black has escaped the Wizards'' Prison and is coming after Harry.', '#009933', 'https://www.youtube.com/embed/lAxgztbYDbs'),
(32, 'The Hobbit: The Desolation of Smaug', 'PG-13', '3hr 6min', '7.8', '2013-12-13', 'Adventure, Fantasy', '1.88GB', '720p BRRip', 'Peter Jackson', 'The dwarves, along with Bilbo Baggins and Gandalf the Grey, continue their quest to reclaim Erebor, their homeland, from Smaug. Bilbo Baggins is in possession of a mysterious and magical ring.', '#996633', 'https://www.youtube.com/embed/iVAgTiBrrDA'),
(33, 'Spider-Man: Far from Home', 'PG-13', '2hr 9min', '7.8', '2019-07-02', 'Action, Adventure, Sci-Fi', '1.12GB', '720p WEB', 'Jon Watts', 'Following the events of Avengers: Endgame (2019), Spider-Man must step up to take on new threats in a world that has changed forever.', '#b11313', 'https://www.youtube.com/embed/Nt9L1jCKGnE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
