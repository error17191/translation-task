-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 13, 2020 at 02:12 AM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `translate-task`
--

--
-- Dumping data for table `translations`
--

TRUNCATE `translations`;

INSERT INTO `translations` (`id`, `names`, `hits`) VALUES
(1, '[\"Mohyaddin Alaoddin\",\"Edited\",\"Mohy\",\"محى الدين 2\",\"Mohy Eldiin Beinmedia\",\"Mohy Eldin\",\"Mohey Bim\",\"mohy\",\"محى\",\"دانه\",\"دانو البستكي\",\"Mohy BeInMedia\",\"null\",\"Dana Al Bastaki\",\"محى الدين\",\"فني برمجة ميديا\",\"Mohy Aldiin KW\",\"Mohyaddin\",\"+96560949399\",\"Mohy Beinmedia\",\"Mohey\",\"محيي BeInMedia\",\"Mohyaddin Saleh\",\"N أ\",\"N A\",\"محي الدين علاء الدين\",\"محرر\",\"محي\",\"Mohiuddin 2\",\"محي الدين بينميديا\",\"محي الدين\",\"موهي بيم\",\"محي\",\"Erased\",\"Dana\",\"Dano Bastaki\",\"محيي بن ميديا\",\"لا شيء\",\"دانا البستكي\",\"Mohiuddin\",\"Media programming technician\",\"محي الدين KW\",\"محي بينميديا\",\"Givens BeInMedia\",\"محي الدين صالح\",\"N a\",\"لا\"]', '[0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,1,1,0,0,0,0,0,0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1]'),
(2, '[\"لؤى\",\"Me\",\"ط.ط.أحمدالعلي٦\",\"Loe\",\"Loai Saleh\",\"لؤى saleh\",\"لؤي علاء\",\"6Al6Al A3Le\",\"ذتتي\",\"Loai Alaa Saleh\",\"لؤي\",\"لؤي اتحاد الطلاب\",\"لؤي صاحب حسن\",\"ghostfir\",\"Loai\",\"لؤي صالح\",\"Mohy Eldin\",\"Loai Esu\",\"حبيبي 4\",\"موجهة صالح\",\"loai2020@hotmail.com\",\"أنا\",\"I Ahmed Al-Ali 6\",\"لوى\",\"Loay saleh\",\"Louay Alaa\",\"My self\",\"لؤي علاء صالح\",\"Louay Students Union\",\"Loay Hassan owner\",\"Louay Saleh\",\"محي الدين\",\"لؤي ايسو\",\"My love 4\",\"Geared fit\"]', '[0,0,0,0,0,0,0,1,0,0,1,0,0,1,2,1,0,0,0,0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1]'),
(3, '[\"Eimran A. f. c\",\"Imran\",\"Mohamed Imran\",\"Imran...\",\"null\",\"Imran Kdp\",\"Imran Shaik B Media\",\"محمد عمران تصليح ايفون\",\"Mohammed Imran\",\"Imran Be In Media Company\",\"Imran shaik\",\"shaik mohammad\",\"My Kuwait\",\"imran frind\",\"Imran Kwt\",\"عمران\",\"Imran Afc Kaldon\",\"Imran Fixer Client\",\"Imran Beinmedia\",\"محمد عمران\",\"Imran  Mohammed\",\"Imran. ( Shareef )\",\"عمران\",\"محمد\",\"Imran Shaik\",\"Imran Fixer\",\"Imran Mohammed\",\"Imran\",\"Imran BeInMedia\",\"محمد عمران\",\"عمران محمد\",\"Imran Beinmedia KW\",\"عمران بى ان ميديا\",\"Huh Jik\",\"محمد عمران اقامه\",\"عمران محمد خربوطلي\",\"+96566802750\",\"Imran Be In Media Ios\",\"iOS Developer\",\"إيوس مطور\",\"BeInMedia\",\"وسائل الإعلام المباشرة\",\"mohammad.imran.shaik@hotmail.com\",\"عمران شيخ\",\"أول البرمجيات مهندس\",\"Senior Software Engineer\",\"direct Media\",\"_____________\",\"عمران أ. ج\",\"عمران ...\",\"لا شيء\",\"عمران Kdp\",\"عمران شايك\",\"Muhammad Imran repairs Yvonne\",\"شركة عمران كن ان ميديا\",\"عمران شايك\",\"شايك محمد\",\"بلدي الكويت\",\"عمران صديق\",\"عمران كوت\",\"Omran\",\"عمران أ\",\"عمران المثبت المثبت\",\"عمران بينميديا\",\"Muhammad Imran\",\"عمران. (شريف)\",\"Omran\",\"Mohammed\",\"عمران شايك\",\"عمران المثبت\",\"عمران بينمديا\",\"Muhammad Imran\",\"Imran Muhammad\",\"عمران بينميديا\",\"Imran PN Media\",\"هوه جيك\",\"Muhammad Imran set up\",\"Imran Muhammad Kharbutli\",\"عمران كن في الإعلام Ios\",\"مطور دائرة الرقابة الداخلية\",\"Ios developer\",\"Live media\",\"Imran Sheikh\",\"The first software engineer\",\"مهندس برمجيات\"]', '[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2,0,0,0,0,0,0,2,2,0,0,0,0,0,1,0,0,0,1,1,1,0,0,0,0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1]'),
(4, '[\"MohyEldin\",\"Mohie Eldin\",\"محى الدين\",\"Mohy\",\"Mohey Bim\",\"Mohy BeInMedia\",\"Mohyaddin Alaoddin\",\"Mohy Eldin\",\"محي الدين\",\"Mohiuddin\",\"محي\",\"موهي بيم\",\"محيي بن ميديا\",\"محي الدين علاء الدين\",\"محي الدين\"]', '[1,0,0,0,0,0,0,0,1,1,1,1,1,1,1]'),
(5, '[\"صاحب الفودري\",\"صاحب الفودري (سكرتير الوزير)\",\"null\",\"Mohamed Kamal Ahmed\",\"محمد كمال\",\"Ibrahim Kw\",\"Waked\",\"Me In Kuwait\",\"Mahmoud Waked\",\"محمود واكد Beinmedia\",\"محمود  وسائل الإعلام المباشرة\",\"Mahmud\",\"The owner of the fodder\",\"Owner of Al-Foudary (Secretary of the Minister)\",\"لا شيء\",\"محمد كمال احمد\",\"Mohamed Kamal\",\"إبراهيم كو\",\"واكد\",\"أنا في الكويت\",\"محمود واكد\",\"Mahmoud Waked Beinmedia\",\"Mahmoud is direct media\",\"محمود\"]', '[0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,1,1,1,1,1,1,1,1]');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
