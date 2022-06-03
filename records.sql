SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `susers` (
  `id` int(3) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `iscontentpub` tinyint(0) NOT NULL DEFAULT '0',
  `isadmin` tinyint(0) NOT NULL DEFAULT '0',
  `crpubname` varchar(50),
  `streetaddress` text(200)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `susers` (`id`, `email`, `password`, `country`, `iscontentpub`, `isadmin`, `crpubname` , `streetaddress`) VALUES
(1, 'vasilis1rewr@gmail.com', 'fdsfdsf1w54rtw', 'Greece', '0', '0', '', ''),
(2, 'test@test.com', 'fdsfdssdffsf1w54rtw', 'USA', '1', '1', 'Test Enteprises', 'Test 123 TestStreet'),
(3, 'mike1234156@outlook.com', 'fdf1s56trw32++', 'UK', '0', '0', '', ''),
(4, 'vaschar@outlook.com', 'q9f15wer949we', 'Greece', '0', '0', '', ''),
(5, 'kostsakkas@uoi.gr', 'easwrf96+are4', 'Greece', '0', '0', '', ''),
(6, 'annmgianni@gmail.com', 'tydruj6+44g5er+a', 'Greece', '0', '0', '', '');


ALTER TABLE `susers`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `susers`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

CREATE TABLE `movies` (
  `id` SMALLINT(255) NOT NULL,
  `year` SMALLINT(255) NOT NULL,
  `name` text(40) NOT NULL,
  `picture` text(40) NOT NULL,
  `amazon` text(90) NOT NULL,
  `apple` text(60) NOT NULL,
  `youtube` text(25) NOT NULL,
  `netflix` text(25) NOT NULL,
  `hulu` text(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `movies` (`id`, `year`, `name`, `picture`, `amazon`, `apple`, `youtube`, `netflix` , `hulu`) VALUES
(1, '1959', 'House on Haunted Hill', 'HouseOnHauntedHill.jpg', 'B000SW16BC', 'umc.cmc.2otxctozjojdibqsuss1f0mnp', 'IBFRRZ6TsPk', '605556', ''),
(2, '1968', 'Night of the Living Dead', 'NightOfTheLivingDead.jpg', 'B018TGL4ZG', 'umc.cmc.5yxg24w94798nq94xsgd2hisv', '', '17017662', 'night-of-the-living-dead-68856533-1d59-495b-9590-e190890b70db'),
(3, '1986', 'Little Shop of Horrors', 'TheLittleShopofHorrors.jpg', '0KEKSTWCRTMA771TTUKVZ4OZ1L', 'umc.cmc.7m7ls4ignhj9qzaxl48427v9', 'MjGpxDVloDk', '60001313', '');


ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `movies`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;