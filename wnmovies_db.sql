-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 17, 2024 at 03:27 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wnmovies_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int NOT NULL,
  `movie_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `movie_id`, `created_at`, `is_deleted`) VALUES
(36, 'Phim hay lắm nha', 32, 194, '2024-02-09 15:14:41', 1),
(37, 'Phần 2 chừng nào ra\r\n', 32, 194, '2024-02-09 15:41:01', 1),
(39, 'Cảm động quá ạ\r\n', 31, 194, '2024-02-09 16:17:25', 0),
(40, 'Phim hay lắm ạ\r\n', 31, 205, '2024-02-16 14:53:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `thumb_url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `origin_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_general_ci,
  `year` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `time` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lang` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `quality` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `category` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `link_embed` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_deleted` int NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `thumb_url`, `origin_name`, `content`, `year`, `time`, `slug`, `lang`, `quality`, `status`, `category`, `country`, `link_embed`, `is_deleted`, `created_at`) VALUES
(187, 'Hành trình Pokémon: Loạt phim (Pokémon Master Journeys)', 'https://img.ophim11.cc/uploads/movies/hanh-trinh-pokemon-loat-phim-pokemon-master-journeys-thumb.jpg', 'Pokémon Journeys: The Series', '&#60;p&#62;Cuộc phiêu lưu tiếp tục khi Go và Satoshi tiến xa hơn trên hành trình nghiên cứu và Go tham gia Dự án Mew. Nhưng Mew không phải là Pokémon Huyền Thoại duy nhất!&#60;/p&#62;', '2021', '23phút/tập', 'hanh-trinh-pokemon-loat-phim-pokemon-master-journeys', 'Vietsub', 'HD', 'completed', 'Phiêu Lưu', 'Nhật Bản', 'https://hd1080.opstream2.com/share/e94fe9ac8dc10dd8b9a239e6abee2848', 1, '2024-02-02 19:53:24'),
(189, 'Chặng đường Pon', 'https://img.ophim11.cc/uploads/movies/chang-duong-pon-thumb.jpg', 'ぽんのみち', 'Nashiko Jippensha, một nữ sinh trung học sống ở thành phố Onomichi, tỉnh Hiroshima, gặp rắc rối sau khi bị đuổi ra khỏi nhà. Cô nói: “Tôi không có nơi nào để đi chơi với bạn bè…” Khi Naoko biết được rằng phòng khách mà cha cô từng điều hành giờ đã bị bỏ trống, cô quyết định xây lại nó thành nơi mọi người có thể tụ tập.', '2024', '24 phút/tập', 'chang-duong-pon', 'Vietsub', 'HD', 'ongoing', 'Phiêu Lưu', 'Nhật Bản', 'https://hdbo.opstream5.com/share/15d1a16e5bc7257729c4927f93bb9747', 1, '2024-02-03 18:56:59'),
(190, 'Thăng Cấp Một Mình', 'https://img.ophim11.cc/uploads/movies/thang-cap-mot-minh-thumb.jpg', 'Chỉ mình tôi thăng cấp, Solo Leveling', '&#60;p&#62;Thợ săn hạng E Jinwoo Sung là người yếu nhất trong số họ. Bị mọi người coi thường, anh ta không có tiền, không có khả năng nói và không có triển vọng công việc nào khác. Vì vậy, khi nhóm của anh ấy tìm thấy một hầm ngục ẩn giấu, anh ấy quyết tâm sử dụng cơ hội này để thay đổi cuộc sống của mình tốt hơn... nhưng cơ hội mà anh ấy tìm thấy hơi khác so với những gì anh ấy nghĩ trong đầu! Source: VuiGhe&#60;/p&#62;&#60;p&#62; &#60;/p&#62;', '2024', '23 phút/tập', 'thang-cap-mot-minh', 'Vietsub', 'HD', 'ongoing', 'Khoa Học', 'Nhật Bản', 'https://1080.opstream4.com/share/c2383e4dca61bf3b6f174ba5df1172b0', 1, '2024-02-04 23:12:06'),
(191, 'Nhà Vịt Di Cư', 'https://img.ophim11.cc/uploads/movies/nha-vit-di-cu-thumb.jpg', 'Migration', 'Đến mùa di cư, những đàn vịt nối đuôi nhau bay lượn vô cùng nhộn nhịp trên bầu trời. Một gia đình vịt nọ được dẫn dắt bởi vịt bố, cũng đã sẵn sàng “cất cánh” cho chuyến bay đến vùng đất mới trong tâm thế đầy hào hứng và vui vẻ. Thành viên phi hành đoàn cũng có độ tuổi rất đa dạng, từ “trẻ nhỏ”, “thiếu niên” cho đến vịt “trung niên”. Đang tự do bay lượn trong làn mây trắng bồng bềnh, nhà vịt đột ngột gặp phải cơn mưa lớn. Tiu ngỉu ôm nhau trú mưa dưới miếng gỗ nho nhỏ, cả nhà bỗng đối mặt với một sinh vật toát ra cảm giác đáng sợ nguy hiểm khó lường.', '2023', '83 Phút', 'nha-vit-di-cu', 'Vietsub', 'HD', 'completed', 'Gia Đình', 'Âu Mỹ', 'https://1080.opstream4.com/share/9fe5f22f40fa63795a7f70e81cb9ebb7', 1, '2024-02-04 23:43:12'),
(192, 'Đảo Hải Tặc', 'https://img.ophim11.cc/uploads/movies/one-piece-thumb.jpg', 'One Piece (Luffy)', '&#60;p&#62;Monkey D. Luffy, 1 cậu bé rất thích &#60;strong&#62;Đảo hải tặc&#60;/strong&#62; có ước mơ tìm được kho báu &#60;strong&#62;One Piece&#60;/strong&#62; và trở thành &#60;strong&#62;Vua hải tặc&#60;/strong&#62; - Pirate King. Lúc nhỏ, Luffy tình cờ ăn phải trái quỉ (Devil Fruit) Gomu Gomu, nó cho cơ thể cậu khả năng co dãn đàn hồi như cao su nhưng đổi lại cậu sẽ không bao giờ biết bơi. Sau đó Luffy lại được Shank cứu thoát tuy nhiên ông ta bị mất 1 cánh tay. Sau đấy Shank chia tay Luffy và để lại cho cậu cái mũ rơm (Straw Hat) và nói rằng: Sau này bao giờ thành cướp biển hãy gặp ta và trả lại nó. Chính lời nói này đã thúc đầy Luffy trở thành 1 cướp biển thật sự.&#60;/p&#62;&#60;p&#62;Hãy cùng theo dõi xem liệu &#60;strong&#62;Luffy&#60;/strong&#62; có thể trở thành đạt được kho báu &#60;strong&#62;One Piece&#60;/strong&#62; và trở thành &#60;strong&#62;Vua Hải Tặc &#60;/strong&#62;không nhé.&#60;/p&#62;', '1999', '25 phút/tập', 'one-piece', 'Vietsub', 'FHD', 'ongoing', 'Phiêu Lưu', 'Nhật Bản', 'https://1080.opstream4.com/share/d516b13671a4179d9b7b458a6ebdeb92', 0, '2024-02-04 23:43:35'),
(193, 'Thám Tử Lừng Danh Conan', 'https://img.ophim11.cc/uploads/movies/tham-tu-lung-danh-conan-thumb.jpg', 'Detective Conan', '&#60;p&#62;Mở đầu câu truyện, cậu học sinh trung học 17 tuổi (trong truyện tranh là 16) &#60;strong&#62;Shinichi Kudo&#60;/strong&#62; (Jimmy Kudo) bị biến thành cậu bé &#60;strong&#62;Conan&#60;/strong&#62; Edogawa. &#60;strong&#62;Shinichi&#60;/strong&#62; trong phần đầu của Thám tử lừng danh Conan được miêu tả là một thám tử học đường. Trong một lần đi chơi công viên ', '2005', '25 Phút', 'tham-tu-lung-danh-conan', 'Vietsub', 'HD', 'ongoing', 'Bí ẩn', 'Nhật Bản', 'https://hd1080.opstream2.com/share/a69b9ecf4cf7f3f9b68464232048c737', 0, '2024-02-04 23:45:00'),
(194, 'Thám Tử Lừng Danh Conan 26: Tàu Ngầm Sắt Màu Đen', 'https://img.ophim11.cc/uploads/movies/tham-tu-lung-danh-conan-26-tau-ngam-sat-mau-den-thumb.jpg', 'Detective Conan: Black Iron Submarine', 'Địa điểm lần này được đặt ở vùng biển gần đảo Hachijo-jima, Tokyo. Các kỹ sư từ khắp nơi trên thế giới đã tập hợp để vận hành toàn diện ', '2023', '110 Phút', 'tham-tu-lung-danh-conan-26-tau-ngam-sat-mau-den', 'Vietsub', 'HD', 'completed', 'Bí ẩn', 'Nhật Bản', 'https://1080.opstream4.com/share/64a2ced1a3bc35f45f1c3bdb0c8b256f', 0, '2024-02-04 23:45:50'),
(195, 'Mashle: Ma thuật và Cơ bắp', 'https://img.ophim11.cc/uploads/movies/mashle-ma-thuat-va-co-bap-thumb.jpg', 'MASHLE: MAGIC AND MUSCLES', 'Đây là một thế giới của phép thuật, nơi phép thuật được sử dụng cho mọi thứ. Nhưng sâu trong khu rừng tồn tại một chàng trai dành thời gian của mình để tập luyện. Anh chàng không thể sử dụng phép thuật, nhưng anh ấy tận hưởng một cuộc sống yên bình với cha mình. Nhưng một ngày nọ, cuộc sống của anh ấy bị đe dọa! Liệu cơ thể vạm vỡ của anh ấy có bảo vệ anh ấy khỏi những kẻ sử dụng ma thuật? Cơ bắp được rèn luyện mạnh mẽ sẽ nghiền nát ma thuật khi ảo tưởng ma thuật bất thường này bắt đầu!', '2023', '24 phút/tập', 'mashle-ma-thuat-va-co-bap', 'Vietsub', 'HD', 'completed', 'Khoa Học', 'Nhật Bản', 'https://1080.opstream4.com/share/86bef77c5a59d7f1195cb2fbe242882d', 0, '2024-02-04 23:47:01'),
(196, 'Mashle: Ma thuật và Cơ bắp (Phần 2)', 'https://img.ophim11.cc/uploads/movies/mashle-ma-thuat-va-co-bap-phan-2-thumb.jpg', 'MASHLE: MAGIC AND MUSCLES Season 2', '&#60;p&#62;Đây là một thế giới của phép thuật, nơi phép thuật được sử dụng cho mọi thứ. Nhưng sâu trong khu rừng tồn tại một chàng trai dành thời gian của mình để tập luyện. Anh chàng không thể sử dụng phép thuật, nhưng anh ấy tận hưởng một cuộc sống yên bình với cha mình. Nhưng một ngày nọ, cuộc sống của anh ấy bị đe dọa! Liệu cơ thể vạm vỡ của anh ấy có bảo vệ anh ấy khỏi những kẻ sử dụng ma thuật? Cơ bắp được rèn luyện mạnh mẽ sẽ nghiền nát ma thuật khi ảo tưởng ma thuật bất thường này bắt đầu!&#60;/p&#62;', '2024', '24 phút/tập', 'mashle-ma-thuat-va-co-bap-phan-2', 'Vietsub', 'HD', 'ongoing', 'Hài Hước', 'Nhật Bản', 'https://1080.opstream4.com/share/776e9111d31a090979dd9fc5f382651c', 0, '2024-02-04 23:47:15'),
(197, 'Frieren - Pháp Sư Tiễn Táng', 'https://img.ophim11.cc/uploads/movies/frieren-phap-su-tien-tang-thumb.jpg', 'Frieren: Beyond Journey&#39;s End', 'Sau một thập kỷ phiêu lưu, Frieren cùng tổ đội của dũng sĩ Himmel đã đánh bại Ma vương và mang lại hòa bình cho thế giới. Thế rồi cô ấy, một Elf với thọ mệnh hơn cả ngàn năm tuổi, lập lời hứa sẽ tái ngộ cùng nhóm Himmel rồi lên đường đi phiêu lưu một mình. 50 năm sau, Frieren đến thăm Himmel, nhưng lúc này anh ta đã già và chỉ còn lại một chút thời gian ngắn ngủi. Chứng kiến cái chết của Himmel, Frieren hối hận vì đã không ', '2023', '24 phút/tập', 'frieren-phap-su-tien-tang', 'Vietsub', 'HD', 'ongoing', 'Chính kịch', 'Nhật Bản', 'https://1080.opstream4.com/share/b9f081c9e97e49e170511f498f4693f5', 0, '2024-02-05 00:10:21'),
(198, 'Đêm Định Mệnh: Vô Hạn Kiếm Giới', 'https://img.ophim11.cc/uploads/movies/dem-dinh-menh-vo-han-kiem-gioi-thumb.jpg', 'Fate/stay night: Unlimited Blade Works', '&#60;p&#62;Chén Thánh là một bảo vật huyền thoại có thể đáp ứng mọi mong muốn của người sở hữu nó. Và buổi lễ để lấy Chén Thánh được gọi là Cuộc Chiến Chén Thánh.&#60;/p&#62;', '2014', '47M32S', 'dem-dinh-menh-vo-han-kiem-gioi', 'Vietsub', 'HD', 'ongoing', 'Bí ẩn', 'Nhật Bản', 'https://aa.opstream6.com/share/2e945b99f24f789d68d85ee332131c93', 0, '2024-02-05 17:17:08'),
(199, 'Magi: Mê Cung Ma Thuật', 'https://img.ophim11.cc/uploads/movies/magi-me-cung-ma-thuat-thumb.jpg', 'MAGI', '&#60;p&#62;Cốt chuyện trong bộ anime Magi: The Labyrinth of Magic xoay quanh về một cậu bé tên Aladdin đi khắp thế giới cùng với “người bạn” Ugo của mình, Djinn chứa trong cây sáo của Aladdin, cho đến khi anh gặp Alibaba Saluja, một chàng trai trẻ, một ngày nào đó muốn khám phá ngục tối Amon gần đó và yêu cầu nó Châu báu. Aladdin và Alibaba cuối cùng trở thành bạn bè và cùng nhau chinh phục Amon, mặc dù phải đối mặt với sự chống đối của Jamil tàn nhẫn và các chiến binh nô lệ của anh ta: Morgiana và Goltas.&#60;/p&#62;', '2012', 'Đang cập nhật', 'magi-me-cung-ma-thuat', 'Vietsub', 'HD', 'completed', 'Bí ẩn', 'Nhật Bản', 'https://hd1080.opstream2.com/share/c94a589bdd47870b1d74b258d1ce3b33', 0, '2024-02-05 21:33:36'),
(200, 'Magi: Vương Quốc Ma Thuật 2', 'https://img.ophim11.cc/uploads/movies/magi-vuong-quoc-ma-thuat-2-thumb.jpg', 'Magi: The Kingdom of Magic', '&#60;p&#62;Sau khi ăn mừng chiến thắng trước Al-Thamen, Aladdin và những người bạn của mình rời khỏi vùng đất Sindria. Tuy nhiên, khi trận chiến kết thúc, sẽ đến lúc mỗi người đi theo con đường riêng của mình. Hakuryuu và Kougyoku được lệnh trở về quê hương của họ, Đế quốc Kou. Trong khi đó, Aladdin thông báo rằng anh cần phải đến Magnostadt - một quốc gia bí ẩn do các pháp sư cai trị - để điều tra những sự kiện bí ẩn xảy ra trong vương quốc mới này và trở nên thành thạo hơn trong phép thuật. Về phần mình, được động viên bởi những lời của Aladdin, Alibaba và Morgiana cũng bắt đầu theo đuổi mục tiêu của riêng mình: luyện tập và trở về quê hương của cô ấy. Nghe nói rằng họ đã ngủ quên mãi mãi với những món đồ ma thuật có tên ', '2013', 'Đang cập nhật', 'magi-vuong-quoc-ma-thuat-2', 'Vietsub', 'HD', 'completed', 'Bí ẩn', 'Nhật Bản', 'https://hd1080.opstream2.com/share/e894d787e2fd6c133af47140aa156f00', 0, '2024-02-05 21:34:01'),
(201, 'Magi: The Labyrinth of Magic', 'https://img.ophim11.cc/uploads/movies/magi-the-labyrinth-of-magic-thumb.jpg', 'Vương quốc ma thuật, Magi Season 1', '&#60;p&#62;Nội dung phim được mô phỏng theo manga 1001 đêm mà chắc chắn có lẽ ai trong chúng ta đều biết về nó, những câu chuyện cổ này sẽ được nhân vật chính là Aladdin dẫn truyện cho chúng ta, là một trong những cậu bé bị nhốt tại một phòng bí mật có lẽ cả đời cậu củng sẽ ở đây luôn, may mắn thay cậu có một người bạn thân luôn ở bên cậu là thần đèn Ugo, chẳng ai biết ông ta ở đâu nhưng ẩn náo vào trong một vật dân dã của cậu chính là chiếc sáo, mỗi khi cậu cất lên tiếng véo von thì nó tạo ra một sức mạnh vô cùng lớn lao&#60;/p&#62;', '2013', '25 Tập', 'magi-the-labyrinth-of-magic', 'Vietsub', 'HD', 'completed', 'Phiêu Lưu', 'Nhật Bản', 'https://1080.opstream4.com/share/a1d50185e7426cbb0acad1e6ca74b9aa', 0, '2024-02-05 21:34:34'),
(202, 'Hội Pháp Sư Fairy Tail', 'https://img.ophim11.cc/uploads/movies/hoi-phap-su-fairy-tail-thumb.jpg', 'Fairy Tail', '&#60;p&#62;Fairy Tail (Hội Pháp Sư) là một series truyện tranh Nhật Bản được sáng tác bởi tác giả Hiro Mashima. Truyện đã được phát hành thành từng kỳ trên tạp chí Weekly Shōnen từ ngày 23 tháng 8 năm 2006 và cho đến bây giờ vẫn đang được tiếp tục. Sau đó những chương truyện riêng được nhà xuất bản Kodansha tổng hợp và phát hành thành từng tập. Tính đến tháng 10 năm 2008, đã có 12 tập truyện Fairy Tail được phát hành. Xuyên suốt câu chuyện là cuộc phiêu lưu của một Sorceress tên là Lucy Heartphilia, sau khi cô tham gia vào hiệp hội hội Fairy Tail, cô đã cùng với Natsu Dragneel hành trình để đi tìm một con rồng tên là Igneel.&#60;/p&#62;&#60;p&#62;Phần bạn đang xem là phần ADMIN đã gộp phần 1, phần 2, phần 3 vào 1 phần chung&#60;/p&#62;', '2006', '25 Phút', 'hoi-phap-su-fairy-tail', 'Vietsub', 'HD', 'ongoing', 'Phiêu Lưu', 'Nhật Bản', 'https://1080.opstream4.com/share/a495eebbfa243b79c5b9b224c482d0c2', 0, '2024-02-05 21:35:32'),
(203, 'Attack on Titan: Crimson Bow and Arrow', 'https://img.ophim11.cc/uploads/movies/attack-on-titan-crimson-bow-and-arrow-thumb.jpg', 'Attack on Titan: Crimson Bow and Arrow', 'Khi những người khổng lồ ăn thịt người lần đầu tiên xuất hiện 100 năm trước, con người đã tìm thấy sự an toàn đằng sau những bức tường khổng lồ ngăn cản những người khổng lồ theo dõi chúng. Nhưng sự an toàn mà họ có bấy lâu nay bị đe dọa khi một Titan khổng lồ đâm xuyên qua các rào cản, khiến lũ người khổng lồ tràn vào nơi từng là vùng an toàn của loài người.', '2014', '118 Phút', 'attack-on-titan-crimson-bow-and-arrow', 'Vietsub', 'HD', 'completed', 'Phiêu Lưu', 'Nhật Bản', 'https://kd.opstream3.com/share/9ff016546e872eb88257008651af50ef', 0, '2024-02-06 18:54:26'),
(204, 'Sự Vùng Lên Của Dũng Sĩ Khiên', 'https://img.ophim11.cc/uploads/movies/su-vung-len-cua-dung-si-khien-thumb.jpg', 'Tate no Yuusha no Nariagari, The Rising of the Shield Hero', '&#60;p&#62;Đó là một cuốn sách thấy ở thư viện. Nhân vật chính Naofumi Iwatani, đã được triệu hồi tới một thế giới khác như một dũng sĩ. Cậu có năng lực sử dụng lá chắn, khi gặp phải những âm mưu và sự phản bội, cậu đã mất tất cả ở thế giới đó. Một câu chuyện tưởng tượng về người anh hùng vụng dậy từ dưới đáy của sự mất mát bắt đầu!&#60;/p&#62;', '2019', '25 Phút/Tập', 'su-vung-len-cua-dung-si-khien', 'Vietsub', 'HD', 'completed', 'Bí ẩn', 'Nhật Bản', 'https://hd1080.opstream2.com/share/7f278ad602c7f47aa76d1bfc90f20263', 0, '2024-02-06 18:56:41'),
(205, 'Dược sư tự sự', 'https://img.ophim11.cc/uploads/movies/duoc-su-tu-su-thumb.jpg', 'The Apothecary Diaries', 'Ám ảnh với chất độc và dược phẩm, một người hầu trong cung của Hoàng đế tận dụng kinh nghiệm làm thầy thuốc ở khu đèn đỏ để phá giải những vụ án bí ẩn.', '2023', '22 phút/tập', 'duoc-su-tu-su', 'Vietsub', 'HD', 'completed', 'Bí ẩn', 'Nhật Bản', 'https://hdbo.opstream5.com/share/b03ed0e10dbb711cca35443b73118675', 0, '2024-02-07 01:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int NOT NULL DEFAULT '1' COMMENT '0 admin 1 user',
  `avatar` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ip_address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_deleted` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role_id`, `avatar`, `ip_address`, `is_deleted`, `created_at`, `updated_at`) VALUES
(30, 'admin', 'lamnhathuy0393418721@gmail.com', '$2y$10$jRJZUOiksMRSDWVeyts07OYyPYrTffqLFxMMs0aMRA17Jvd/57Nr2', 0, 'avt1.jpg', '116.111.186.45', 0, '2024-02-06 06:15:44', '2024-02-06 06:15:44'),
(31, 'Nhật Huy', 'huylnpc05258@fpt.edu.vn', '$2y$10$2ClBBvZHZxVpZ3orM4vEgueK50BvYR2cOU4hVCiVA1fF7lCVpMXz6', 1, NULL, '116.111.186.45', 0, '2024-02-06 06:20:01', '2024-02-06 06:20:01'),
(32, 'Huy Nè', 'lamnhathuy0393379824@gmail.com', '$2y$10$9.kz3nytr6pEPMZI4QIGiu4xYYFzm9Q9q4G2gPvW/n/FN2mG5haca', 1, NULL, '1.11.255.255', 0, '2024-02-09 14:46:45', '2024-02-09 14:46:45'),
(33, 'Anh Zách Đẹp Trai', 'huylppc05334@fpt.edu.vn', '$2y$10$ZksiWl9mmKYyrBd9eOxKeOJeNaHJ77fpPcOS2EWiy9tLLa5u/qI7m', 1, NULL, '116.111.186.45', 0, '2024-02-09 14:53:58', '2024-02-09 14:53:58'),
(34, 'Lâm Thị Như Ý', 'nhoktif0976021603@gmail.com', '$2y$10$9oQnOfaDZb1GPftbl3MaeuAqtA3HuSDF1Syf0mUP4KwA56K0D4Pqa', 1, NULL, '116.111.186.45', 0, '2024-02-09 14:53:58', '2024-02-09 14:53:58'),
(35, 'Bùi Thị Bích Tuyền', 'buithibichtuyenpl.1086@gmail.com', '$2y$10$WgAaEy8h0YtKa4RqPIvMw.51kg7beem9Lg3wf1fM42PaAQjgKp7Te', 1, NULL, '31.42.183.122', 0, '2024-02-09 14:53:58', '2024-02-09 14:53:58'),
(36, 'Danh dễ thương', 'tdanh3811@gmail.com', '$2y$10$7ZmmsGlXmieqp0GZJjL98OhzGWd7M5JG9vt1EghNGmGt4xypqgcyW', 1, NULL, '3.115.255.255', 0, '2024-02-09 14:53:58', '2024-02-09 14:53:58'),
(37, 'Kim Đang', 'dangttkpc05468@fpt.edu.vn', '$2y$10$Rqw0v5yECnxM2wLQWsW9YeFMdvPu2tDSrhwOOS2JzurzTangcZONW', 1, NULL, '2.20.255.255', 0, '2024-02-09 14:53:58', '2024-02-09 14:53:58'),
(47, 'Tiên Nguyễn', 'thitien2306@gmail.com', '$2y$10$LUtq8svgPNpWyLpKZSgLMOvKlfelqvNYLQZjD862KeS6BCDVC6F42', 1, NULL, '116.111.186.45', 0, '2024-02-09 14:56:45', '2024-02-09 14:56:45'),
(48, 'Vương Lê', 'vle55966@gmail.com', '$2y$10$sTnCF3gEJ8MCnj4b6ltspu9p.tuKONFSXO3gzxV8QshoCUKIStAjC', 1, NULL, '51.89.226.250', 0, '2024-02-09 14:58:35', '2024-02-09 14:58:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
