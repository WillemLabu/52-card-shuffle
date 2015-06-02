SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE IF NOT EXISTS `52cardshuffle` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `52cardshuffle`;

DROP TABLE IF EXISTS `decks`;
CREATE TABLE IF NOT EXISTS `decks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(100) NOT NULL,
  `deck` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

INSERT INTO `decks` (`id`, `guid`, `deck`) VALUES
(1, '834CDCEB-9A52-4349-9B86-EA23FB611091', 'c3,c8,c13,h12,h13,s5,d10,s10,c7,d5,h3,d12,c9,c11,h11,c5,h5,d3,h6,d1,h4,h2,s7,s2,h7,c6,d11,s1,s12,s11,h9,d6,d7,s8,s4,c12,c1,c10,d9,s13,s6,h1,d4,d13,d2,h8,s9,d8,c2,h10,s3,c4'),
(2, 'E4801220-A152-40E9-8188-9230AE4467A6', 'd7,h8,s11,d1,s2,c8,c12,c3,h1,d12,s5,c9,c13,d9,s9,h7,c1,c10,h4,c6,d2,s6,s10,s8,s3,s1,c2,d3,d10,h3,h6,c4,d4,c7,h12,d11,d13,h5,d8,h2,h11,d6,c5,s12,d5,s4,s7,c11,s13,h9,h13,h10'),
(3, '516F6544-78AB-45F0-92BD-E45633CE7D3B', 'd8,d12,d2,d5,h7,c8,s10,s3,s1,d10,c13,h1,c10,h10,h11,c11,s11,h12,d11,s5,s8,h13,d6,h9,s6,c5,s2,c3,h3,h8,c9,c7,d4,c12,d3,h6,c2,c6,h5,d7,s12,d1,d9,h4,s4,d13,c4,s13,c1,h2,s7,s9'),
(4, 'B696F3EE-FE58-4BF4-AD20-1C9A53396EA0', 'c1,c8,d6,h6,h5,d1,s1,s6,c3,h2,s2,h9,s7,h7,h10,s13,c13,s11,d9,h13,d12,h8,d7,d10,s4,s9,d11,c6,d8,c7,h3,d3,c2,s8,c5,c4,s5,d13,s3,c10,c12,h11,d4,c11,d2,h4,d5,h12,s12,c9,h1,s10'),
(5, '42031EBD-469D-4C7C-8B32-74ADDA74AAEC', 's7,d7,d10,c10,c1,s3,h4,s6,h13,d2,c9,c11,c13,s5,d5,h10,h12,d12,d3,h2,d11,s9,h3,s8,s2,s12,s4,c2,d6,d1,d9,d13,d4,h1,h7,c4,c5,c3,c6,h5,h9,c8,d8,c7,c12,s13,s11,s1,s10,h6,h8,h11'),
(6, '7C314CFB-FDE8-4731-A583-6BEC7BB52844', 'd1,h5,s11,h13,s10,s3,d7,d8,s7,c8,d11,s12,c7,h7,d4,c6,s1,c10,c4,h6,s2,c3,c11,h1,s6,h9,h2,h12,d3,c5,h4,c1,c12,d6,s4,h11,s9,s5,s8,s13,d13,c2,d9,h10,c9,d5,d10,d2,h3,h8,c13,d12'),
(7, 'D2248AA5-51BC-4D99-A938-99620DE05381', 'c9,c13,c10,d10,h9,s10,s3,c4,c12,d6,s9,d11,d4,s11,c11,s13,c1,c8,d7,d1,s2,d2,s7,s4,c7,h10,h1,s1,h12,h4,d5,h8,c6,h13,h3,s8,d12,c2,h7,s12,d13,h5,h2,s6,d9,h6,d3,d8,s5,c3,h11,c5'),
(8, '1C49DD91-A471-46BF-B019-B08172C79F2A', 'c7,s3,c12,d9,d5,s11,s7,s2,s12,d6,d2,d7,h2,s13,h3,c4,h1,h10,s10,c3,c6,d10,s4,c5,c9,h8,s5,h9,s6,c2,c10,h11,d11,d13,d1,h6,h13,h5,c8,c1,c13,h7,d12,d4,s8,s9,d3,h4,c11,s1,d8,h12'),
(9, 'DA0BC96F-1ABF-4D33-8FB4-243179A07E10', 'c12,h4,d7,c9,h11,d12,c5,c11,h5,c3,c10,h3,d6,s3,c1,c2,d5,s9,s2,c13,h9,d2,s5,d11,h12,h8,s4,c7,s10,s7,h6,d1,c6,h13,h2,s12,s11,s1,c8,s13,c4,s6,d10,d9,h10,d4,d8,d3,s8,h7,d13,h1'),
(10, '01E447E1-BE65-48A2-8297-6C42F326C723', 's2,d9,d6,h8,c5,h12,d4,s13,c4,d13,s11,d3,h13,s8,d2,d10,h6,h9,s10,c10,c9,c1,h3,h5,h1,c12,c3,h7,s7,d12,s3,c2,s5,d1,h2,d7,c7,s6,d8,d11,h4,c11,s9,s12,s1,h10,h11,d5,s4,c6,c13,c8'),
(11, 'B8407EBE-6D08-4F4F-8E06-D7E4154B0B4F', 's10,s13,d2,d8,c9,c8,c11,c2,h12,h6,s8,c12,s7,d3,h2,s6,c7,c1,h4,s5,s11,d1,c5,h10,s4,h13,c10,h3,d5,c3,d10,d6,d11,h11,d7,s9,c13,c6,d9,s12,c4,h5,d12,h7,s3,s1,s2,d13,d4,h8,h9,h1'),
(12, 'AF1A1805-393E-4FDB-BDC3-F01ACFABB693', 'h7,d5,d6,s9,c10,s2,h1,d1,s10,s6,d7,c8,d13,s3,d9,h2,s4,h4,d3,h3,c4,c13,s1,c6,c12,s13,h9,s5,d8,h13,c5,h6,d10,s12,c9,s7,c3,h10,s8,c7,c2,d2,d4,h11,s11,c1,h5,c11,d12,h12,h8,d11'),
(13, '040E69EA-FF41-4B60-8EDC-D0771B34F278', 's2,s1,c3,c1,s4,c7,d10,s5,h5,c6,h12,s6,c2,d8,h7,c13,d11,h8,h1,s12,s13,d2,h9,d12,h6,s11,c10,d3,d7,h10,s10,c9,h11,s9,s7,s3,c8,c12,d4,h2,h13,d6,h3,s8,d5,h4,d13,c4,d9,d1,c11,c5'),
(14, 'D40B08B3-F90B-4EC9-A377-AB5C79F006CD', 's11,d13,c7,c2,s7,s8,d9,s2,d6,d12,h10,s5,d3,h7,c3,h8,h9,s12,c10,d1,d5,s3,c12,d2,s13,c8,h12,c11,h11,c6,h13,s9,h6,d11,s1,c1,h2,c4,h1,s10,c9,d4,d7,c5,h5,c13,h3,d8,s4,h4,d10,s6'),
(15, '6165EF46-43E7-4546-9C91-0634BCB08025', 'd2,d3,d9,s5,d7,c11,s3,c1,h12,c7,s10,d10,d1,s12,c10,h10,c9,c5,d5,h9,s7,c6,h7,d13,d4,s8,s2,d11,d12,c13,h2,s9,h11,h1,c4,c8,h8,h13,d6,c2,s11,h4,h3,s4,s1,s13,c3,h6,s6,h5,d8,c12'),
(16, '0BDB8A96-089E-4C37-97F3-E07B7BC08D2E', 'c3,h10,c6,d12,s11,c11,d4,h3,h4,d8,h5,d2,d5,h7,c12,d3,c10,s8,c5,s13,s1,d6,d7,c8,c4,c7,h2,s9,c9,d9,h6,s5,s4,s3,h12,d10,s7,d13,d1,s12,h8,s6,c1,h9,c2,s10,h13,c13,s2,h11,d11,h1'),
(17, '4BD9BA2A-2531-4928-B86A-46CA033519CF', 's4,d5,s7,s5,c9,h10,s13,s3,c10,d3,h11,d7,d2,d10,h2,h9,s10,s9,d4,c7,c12,d8,s1,s12,d13,h4,c8,c3,d11,h6,c5,c2,d6,s2,h12,d1,c4,c6,d12,s8,c11,c1,h8,h7,d9,h3,c13,h1,h5,s11,s6,h13');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
