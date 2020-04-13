-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Mar 2020, 18:28
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `db_vocabulary_learning`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `packages_of_translation`
--

CREATE TABLE `packages_of_translation` (
  `ID_package` int(11) NOT NULL,
  `package_name` text NOT NULL,
  `ID_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `packages_of_translation`
--

INSERT INTO `packages_of_translation` (`ID_package`, `package_name`, `ID_user`) VALUES
(1, 'Pakiet 1', 1),
(6, 'wqe', 3),
(7, 'fffff', 3),
(8, '456', 3),
(9, '76', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `translations_pl_en`
--

CREATE TABLE `translations_pl_en` (
  `ID_translation` int(11) NOT NULL,
  `ID_word_in_pl` int(11) NOT NULL,
  `ID_word_in_en` int(11) NOT NULL,
  `ID_package` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `translations_pl_en`
--

INSERT INTO `translations_pl_en` (`ID_translation`, `ID_word_in_pl`, `ID_word_in_en`, `ID_package`) VALUES
(82, 21, 47, 6),
(101, 39, 66, 7),
(120, 53, 85, 9),
(128, 56, 88, 1),
(129, 57, 89, 1),
(132, 58, 90, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID_user` int(11) NOT NULL,
  `userName` text NOT NULL,
  `userPwd` text NOT NULL,
  `userEmail` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 2,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`ID_user`, `userName`, `userPwd`, `userEmail`, `status`, `active`) VALUES
(1, 'user1', '$2y$10$GIt/3wjklgy9btFENA9.xegL9zxEy/8YCEiPObuMDwZVQDdY9wNFm', 'user1@onet.pl', 2, 1),
(2, 'user2', '$2y$10$a1W.jn47Unz/Mq7vyzC9.uYz0XtYGqDe8Rdy3GUv3VT/KB2BldwzK', 'user2@onet.pl', 2, 1),
(3, 'qwe', '$2y$10$pB4ujFpzh66lvDYmEwn1HOtW.nddLS3uu.jDdXWFs.thAvda3IZbi', 'fhdsofhoi@od.pl', 2, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_status`
--

CREATE TABLE `user_status` (
  `ID_status` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `user_status`
--

INSERT INTO `user_status` (`ID_status`, `status`) VALUES
(1, 'administrator'),
(2, 'normal_user');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `words_in_en`
--

CREATE TABLE `words_in_en` (
  `ID_word_in_en` int(11) NOT NULL,
  `word_in_en` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `words_in_en`
--

INSERT INTO `words_in_en` (`ID_word_in_en`, `word_in_en`) VALUES
(47, '333333333333333'),
(48, '555555555555555555'),
(49, 'rrrrrrrrrrrrrrrrrrrrrrr'),
(50, '77777777777777777'),
(51, 'uuuuuuuuuuuuu'),
(52, 'gggggggggggggggggggggggggg'),
(53, '55555555555555555555555555'),
(54, 'dddddddddddddddddddd'),
(55, '5546456456'),
(56, '7777777777777777777777777'),
(57, '9999999999999999999999999'),
(59, '111111111111111111111'),
(60, '11111111111111122222222222'),
(61, '9999999999999999999'),
(62, 'uiuyiyui768768768'),
(63, '2'),
(64, '4'),
(65, '6'),
(66, '123'),
(67, '3'),
(68, '3'),
(69, '543'),
(70, 'iiiiiiiiiiiiiiiiiiiiiiiiii'),
(71, 'ppppppppppppppppp'),
(72, 'b'),
(73, 'u'),
(74, '456456546546546'),
(75, 'n'),
(76, 'g'),
(77, '2'),
(78, '6'),
(79, '9'),
(80, '55'),
(81, '6'),
(82, '5'),
(83, '2'),
(84, 'weqweqwe'),
(85, '324234'),
(86, 'weqwewqe'),
(87, '1'),
(88, '45'),
(89, '75'),
(90, '43424');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `words_in_pl`
--

CREATE TABLE `words_in_pl` (
  `ID_word_in_pl` int(11) NOT NULL,
  `word_in_pl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `words_in_pl`
--

INSERT INTO `words_in_pl` (`ID_word_in_pl`, `word_in_pl`) VALUES
(21, '2222222222'),
(22, '4444444444444'),
(23, 'tttttttttttttttttttttttt'),
(24, '7777777777777777'),
(25, 'uuuuuuuuuuuuuuuuuuuuuuuuuuuuu'),
(26, 'rrrrrrrrrrrrg'),
(27, '55555555555555555555'),
(28, 'ddddddddddddddd'),
(29, 'ffffffffffff456546456'),
(30, '666666666666666666'),
(31, '88888888888888888888888'),
(33, '11111111111111111111111'),
(34, '0000000000000000000000'),
(35, '0000678678678'),
(36, '1'),
(37, '3'),
(38, '5'),
(39, '123'),
(40, '12'),
(41, '4'),
(42, '345'),
(43, 'gggggggggggg'),
(44, 'oooooo'),
(45, 'vvvvvvvvvvv'),
(46, 'd'),
(47, '546456'),
(48, 't'),
(49, '7'),
(50, '78'),
(51, '6'),
(52, 'wqeqwe'),
(53, '213213'),
(54, 'eqwewq'),
(55, '2'),
(56, '56'),
(57, '54'),
(58, '23');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `packages_of_translation`
--
ALTER TABLE `packages_of_translation`
  ADD PRIMARY KEY (`ID_package`),
  ADD KEY `ID_user` (`ID_user`);

--
-- Indeksy dla tabeli `translations_pl_en`
--
ALTER TABLE `translations_pl_en`
  ADD PRIMARY KEY (`ID_translation`),
  ADD KEY `translations_pl_en_ibfk_2` (`ID_word_in_en`),
  ADD KEY `translations_pl_en_ibfk_3` (`ID_word_in_pl`),
  ADD KEY `ID_package` (`ID_package`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_user`),
  ADD KEY `status` (`status`);

--
-- Indeksy dla tabeli `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`ID_status`);

--
-- Indeksy dla tabeli `words_in_en`
--
ALTER TABLE `words_in_en`
  ADD PRIMARY KEY (`ID_word_in_en`);

--
-- Indeksy dla tabeli `words_in_pl`
--
ALTER TABLE `words_in_pl`
  ADD PRIMARY KEY (`ID_word_in_pl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `packages_of_translation`
--
ALTER TABLE `packages_of_translation`
  MODIFY `ID_package` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `translations_pl_en`
--
ALTER TABLE `translations_pl_en`
  MODIFY `ID_translation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `user_status`
--
ALTER TABLE `user_status`
  MODIFY `ID_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `words_in_en`
--
ALTER TABLE `words_in_en`
  MODIFY `ID_word_in_en` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT dla tabeli `words_in_pl`
--
ALTER TABLE `words_in_pl`
  MODIFY `ID_word_in_pl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `packages_of_translation`
--
ALTER TABLE `packages_of_translation`
  ADD CONSTRAINT `packages_of_translation_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `translations_pl_en`
--
ALTER TABLE `translations_pl_en`
  ADD CONSTRAINT `translations_pl_en_ibfk_2` FOREIGN KEY (`ID_word_in_en`) REFERENCES `words_in_en` (`ID_word_in_en`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `translations_pl_en_ibfk_3` FOREIGN KEY (`ID_word_in_pl`) REFERENCES `words_in_pl` (`ID_word_in_pl`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `translations_pl_en_ibfk_4` FOREIGN KEY (`ID_package`) REFERENCES `packages_of_translation` (`ID_package`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`status`) REFERENCES `user_status` (`ID_status`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
