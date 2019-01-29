-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 16 Gru 2018, 19:35
-- Wersja serwera: 10.1.36-MariaDB
-- Wersja PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bloggero`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nazwa_bloga` varchar(250) NOT NULL,
  `opis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET latin2 NOT NULL,
  `tekst` text CHARACTER SET latin2 NOT NULL,
  `data_dodania` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_modyfikacji` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `username`, `tekst`, `data_dodania`, `data_modyfikacji`) VALUES
(1, 18, 'użytkownik testowy 1', 'Komentarz Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec ipsum ultrices, condimentum elit nec, luctus neque. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec eget ullamcorper ante. Donec fermentum erat nisi, eu dapibus neque ultrices et. Sed at sapien consectetur, iaculis dui non, sagittis mi. Nam consequat tempus felis at pretium. Cras ut lacus id ipsum interdum ullamcorper. In eget urna sed orci aliquam consequat. Morbi iaculis eros vel orci imperdiet ornare. Nulla quis dignissim ante. Etiam non rhoncus lectus, sit amet porta nunc. Cras at ultrices diam. Aenean arcu sapien, efficitur quis rutrum in, euismod et turpis.', '2018-12-01 22:11:16', '2018-12-01 22:11:16'),
(2, 18, 'użytkownik testowy 2', 'Drugi komentarz ale krótki Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec ipsum ultrices, condimentum elit nec, luctus neque. ', '2018-12-01 22:12:04', '2018-12-01 22:12:04'),
(14, 14, '', 'aaaaaaaaaaaaaaaaaa', '2018-12-15 22:11:41', '2018-12-15 22:11:41'),
(15, 0, '', 'dsfdsfdsfdsfdsfdsfdsfdsfdsfdsf', '2018-12-15 22:15:35', '2018-12-15 22:15:35'),
(16, 15, 'test', 'zzzzzzzzzzzzzzzzzzz', '2018-12-15 22:19:39', '2018-12-15 22:19:39'),
(17, 15, 'test', 'komentarz sprawdzam', '2018-12-15 22:26:56', '2018-12-15 22:26:56'),
(20, 14, 'test', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2018-12-15 23:08:23', '2018-12-15 23:08:23'),
(25, 15, 'test2', 'sadasdadsdsa', '2018-12-16 19:32:40', '2018-12-16 19:32:40');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `post`
--

CREATE TABLE `post` (
  `post_id` int(10) NOT NULL,
  `blog_id` int(10) NOT NULL,
  `tytul` varchar(250) CHARACTER SET latin2 NOT NULL,
  `opis` text CHARACTER SET latin2 NOT NULL,
  `tekst` text CHARACTER SET latin2 NOT NULL,
  `image` varchar(100) CHARACTER SET latin2 NOT NULL,
  `data_dodania` datetime NOT NULL,
  `data_modyfikacji` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `post`
--

INSERT INTO `post` (`post_id`, `blog_id`, `tytul`, `opis`, `tekst`, `image`, `data_dodania`, `data_modyfikacji`) VALUES
(13, 2, '0', 'Moja przygoda na rowerach, dobra zabawa', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at risus rutrum, laoreet odio quis, placerat mi. Morbi vehicula iaculis mauris, sed aliquet felis euismod sit amet. Aenean iaculis vehicula augue ut porta. Donec ut lacus ac sapien iaculis suscipit at ut purus. Phasellus a dictum turpis. Integer maximus est aliquam nibh varius, in varius massa rutrum. Sed ultricies tortor sit amet massa pulvinar, non luctus massa mattis. Quisque finibus augue non auctor gravida.</p>\r\n\r\n<p>Praesent pharetra congue diam. Nunc eu justo urna. Nulla at magna id mi elementum egestas ac ac dui. Aenean at felis consectetur odio ornare commodo sit amet eget ex. Nulla hendrerit non enim ut efficitur. Nam mattis lacus ac eros interdum lacinia. Aenean efficitur augue id metus vestibulum semper. Ut semper aliquet purus, ac tincidunt urna ullamcorper non. Duis non feugiat sapien. Praesent lacinia ante lacinia dictum iaculis. In hac habitasse platea dictumst. Aenean eget tristique neque, et porttitor orci. Donec condimentum elit odio, non tristique tortor finibus vitae. Nunc neque lacus, porta quis nisi quis, condimentum venenatis dui. Vestibulum posuere, nisi id maximus tempus, dui turpis feugiat nunc, sed suscipit lectus purus vitae diam.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra, sem eget dictum sodales, velit nunc condimentum libero, et commodo nulla quam blandit libero. Pellentesque consectetur nulla dignissim interdum ornare. Duis accumsan dolor massa, sed molestie diam convallis nec. Donec sapien nulla, tempus eleifend ante quis, porttitor faucibus dolor. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam et ligula vel massa scelerisque ullamcorper. Suspendisse non turpis interdum justo pharetra faucibus at et felis. Curabitur accumsan, erat ac ultricies fringilla, neque diam euismod augue, in faucibus ipsum nunc vel nisi. Nunc rutrum commodo augue at commodo. Curabitur leo sapien, mollis at porttitor sed, egestas et est. Phasellus mattis magna sit amet augue ultricies ullamcorper.</p>\r\n\r\n<p>Sed vitae aliquet mi. Etiam sapien risus, placerat cursus mattis eu, ultricies vitae lorem. Maecenas non feugiat risus, eget elementum augue. Aenean a lobortis felis. Sed tristique commodo est, non sodales sapien. Nam sollicitudin imperdiet ante eu egestas. Mauris et erat sit amet risus venenatis pulvinar sed eu sapien.</p>\r\n\r\n<p>Phasellus mollis hendrerit leo, sed tristique leo pellentesque in. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas convallis nulla est, sit amet scelerisque augue pretium vitae. Morbi mauris justo, placerat et vulputate quis, dictum id nibh. Nulla ac libero interdum elit pharetra elementum vitae eleifend enim. Ut nec ligula turpis. Nam vel felis nec nulla varius scelerisque. Donec cursus purus lacus. Quisque ut blandit nibh, ut faucibus turpis. Suspendisse lacinia urna leo, at faucibus ex vehicula a. Quisque est lacus, blandit id magna sit amet, pellentesque maximus nunc. Nullam nec risus feugiat, consequat purus id, facilisis tellus. Donec quis dui non turpis finibus interdum ac ut lacus. Etiam venenatis finibus lacus, sed blandit nibh faucibus id.</p>\r\n', 'img/post/a1.jpg', '2018-11-18 14:03:59', '2018-11-18 15:04:19'),
(14, 2, 'asdasdsad', 'sadsaddsa', '<p>&nbsp;dsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad sad&nbsp;dsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad sad&nbsp;dsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad sad&nbsp;dsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad sad</p>\r\n', 'img/post/a2.jpg', '2018-11-18 15:04:54', '2018-11-18 15:04:54'),
(15, 2, 'asdasdsad sad sad 1221 ', 'sadsaddsa ads 2112', '<p>&nbsp;dsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad sad&nbsp;dsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad sad&nbsp;dsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad sad&nbsp;dsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad sad</p>\r\n', 'img/post/a3.jpg', '2018-11-18 15:04:54', '2018-11-18 15:04:54'),
(16, 2, ' sad 1221 ', 'sadsaddsa ads 2112', '<p>&nbsp;dsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad sad&nbsp;dsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad sad&nbsp;dsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad sad&nbsp;dsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad sad</p>\r\n', 'img/post/a4.jpg', '2018-11-18 15:04:54', '2018-11-18 15:04:54'),
(17, 2, ' sad 122121 321 12 ', 'sadsaddsa ads 2112', '<p>&nbsp;dsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad sad&nbsp;dsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad sad&nbsp;dsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad sad&nbsp;dsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad saddsadsadsadas sadasdsadsa&nbsp; sasasasasasasa&nbsp; sasasasas as dasasasasasasasasas&nbsp; &nbsp;asdas dsa&nbsp; asd sad ads asasasasasasaada asd asd sad sad sad</p>\r\n', 'img/post/a5.jpg', '2018-11-18 15:04:54', '2018-11-18 15:04:54'),
(18, 2, 'Tworzymy coś pięknego - Dzień 1', 'Zorganizowanie pracy jednej osoby może wydawać się trudne, jednak jak karkołomne jest zarządzanie czteroosobowym zespołem mieliśmy się dopiero przekonać. Zwłaszcza, że jednostką odpowiedzialną za organizację był sam zespół. ', 'Głównym czynnikiem motywującym każdego z Nas jest zaliczenie przedmiotu. Dzięki wspólnemu celowi i długich dyskusjach na temat projektu, doszliśmy do tego, co tak naprawdę chcemy osiągnąć. Na końcu Naszej współpracy widzimy w pełni funkcjonalny portal, na którym ludzie będą mogli zamieszczać swoje wpisy zawierające ich przemyślenia, plany czy rzeczy tak banalne jak to, jakich zakupów dokonali w ostatnim czasie. \r\nMając już wizję mogliśmy zabrać się do pracy. Zadania zostały rozdzielone, a praca ruszyła z kopyta. Zaprojektowana została baza danych na której opierać się ma cały system oraz wstępny layout strony. W najbliższym czasie planujemy połączyć dwie wyżej wymienione rzeczy tak, abyśmy mogli przetestować podstawowe funkcjonalności, takie jak zakładanie konta czy dodawanie postów. Pierwszym wpisem testowym będzie właśnie ten tekst wraz z motywującym obrazkiem zgranego zespołu jaki niewątpliwie tworzymy.  \r\n', 'img/post/foto.jpg', '2018-11-27 17:56:42', '2018-11-27 17:56:42');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rating`
--

CREATE TABLE `rating` (
  `rate_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `rating` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

--
-- Zrzut danych tabeli `rating`
--

INSERT INTO `rating` (`rate_id`, `post_id`, `username`, `rating`, `timestamp`) VALUES
(37, 15, 'test', 5, '2018-12-16 17:00:26'),
(66, 15, 'test2', 1, '2018-12-16 18:08:44');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET latin2 NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `about_short` varchar(50) CHARACTER SET latin2 NOT NULL,
  `about_me` text CHARACTER SET latin2 NOT NULL,
  `about_blog` text CHARACTER SET latin2 NOT NULL,
  `FB` varchar(30) CHARACTER SET latin2 NOT NULL,
  `TW` varchar(30) CHARACTER SET latin2 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `avatar`, `about_short`, `about_me`, `about_blog`, `FB`, `TW`) VALUES
(1, 'abc', 'patrykpuslecki@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '../images/avatars/Koala.jpg', '', '', '', '', ''),
(2, 'test', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', '../images/avatars/aaa.png', 'Taki tam Rusek z Rosji, potężne pięsci, słaba głow', 'Coś tam ciekawego o tym profilu, w sensie opis tego gostka i tyle. To się będzie zaciągało z danych o użytkowniku więc się to doda na chillku do bazy danych.', 'Krótko o treści bloga: np no tam se jeżdżę ocś robi ei jem też troche. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut ligula id nisl mattis faucibus. Donec tempus, leo ac euismod euismod, nisi nulla ultrices quam, sit amet tristique nisi sem nec tortor. Sed a lectus porta ligula tempus mattis. Proin pretium, ligula vel iaculis ultricies, purus neque eleifend arcu, vel fermentum justo tellus vel massa. Quisque in venenatis diam, ac congue lacus. Maecenas in sodales diam, at varius risus. Aliquam ornare enim a lectus tristique, in pellentesque quam volutpat', 'mój facebook', '@moj_twitter'),
(3, 'test2', 'test2@gmail.com', 'ad0234829205b9033196ba818f7a872b', '../images/avatars/facio.jpg', 'Testuje sobie właśnie króciutką wiadomość startową', 'Tutaj sobie piszę o sobie, że jestem spoko gościem co ma dużo zainteresowań i myk pyk zakłada bloga blab ldsf ds ds dfs fds fds fds fds f dsf', 'Tutaj piszę o blogu co tutaj można znaleźć że lubię rowery, żelki i mordobitki dasfds fds fdsf dsf ds fds fds fdsfds fsdf ds fsdfds dsf dsf dsf dsffdsfdsf sdg fdg g fh gdfh gfh gfh gfh gfhg fh gfh gfhgfh gfh gf hgf hgfgfh fg hg fh gfh gfhfed e wrgt er greth bg h gdfh bvc b gdfsh gfd h  gdfhgfhdgfh fghgdfgdfbhvcb.', 'faceboczek', '@twitterek');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indeksy dla tabeli `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indeksy dla tabeli `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT dla tabeli `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT dla tabeli `rating`
--
ALTER TABLE `rating`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
