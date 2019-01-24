<?php
$conn = mysqli_connect('localhost', 'root', 'root', 'store');
-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3307
-- Время создания: Янв 20 2019 г., 13:04
-- Версия сервера: 8.0.13
-- Версия PHP: 7.3.0
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `check`
--

CREATE TABLE `check` (
  `id` int(11) NOT NULL,
  `check_number` int(11) NOT NULL,
  `good_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `check`
--

INSERT INTO `check` (`id`, `check_number`, `good_id`, `count`, `user`) VALUES
(1, 1, 43, 2, 'test'),
(2, 1, 50, 1, 'test');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `about` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `img` varchar(5000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `category`, `price`, `count`, `about`, `img`) VALUES
(39, 'Гитара акустическая Cort AD810 OP', 'guitars', 2500, 6, 'Standard Series — самая старая серия акустических гитар Cort, эти инструменты предлагают превосходные характеристики по доступной цене для начинающих и любителей. Множество моделей с различной функциональностью удовлетворят любые музыкальные вкусы.', 'https://i1.rozetka.ua/goods/277006/cort_ad810_op_images_277006027.jpg'),
(40, 'Гитара классическая Stagg C440 M NAT', 'guitars', 1600, 12, 'Размер: Полноразмерные\r\nВерхняя дека: Липа\r\nНаличие звукоснимателя: Нет\r\nКоличество струн: 6\r\nЦельная верхняя дека: Нет', 'https://i1.rozetka.ua/goods/4225527/stagg_c440_m_nat_images_4225527760.jpg'),
(41, 'Гитара акустическая Yamaha F310', 'guitars', 3890, 3, 'Верхняя дека: Ель\r\nКоличество струн: 6\r\nРазмер: Полноразмерные\r\nНаличие звукоснимателя: Нет\r\nТип корпуса: Dreadnought\r\nЦельная верхняя дека: Нет', 'https://i2.rozetka.ua/goods/94874/yamaha_f310_images_94874409.jpg'),
(42, 'Гитара классическая Cort AC100 OP', 'guitars', 2245, 33, 'Размер: Полноразмерные\r\nВерхняя дека: Ель\r\nНаличие звукоснимателя: Нет\r\nКоличество струн: 6\r\nЦельная верхняя дека: Нет', 'https://i2.rozetka.ua/goods/510796/cort_ac100_op_images_510796992.jpg'),
(43, 'Fender Squier SA-150', '', 4560, 2, 'Верхняя дека: Липа\r\nКоличество струн: 6\r\nРазмер: Полноразмерные\r\nНаличие звукоснимателя: Нет\r\nТип корпуса: Dreadnought\r\nЦельная верхняя дека: Нет\r\nСтрана регистрации бренда: США', 'https://i1.rozetka.ua/goods/3403933/fender_squier_226327_images_3403933311.jpg'),
(44, 'Электрогитара Yamaha ERG121U Black', 'guitars', 7560, 3, 'Корпус: Агатис\r\nКоличество струн: 6\r\nМензура: 25.5\"\r\nГриф: Клен\r\nКоличество ладов: 22\r\nНакладка грифа: Палисандр\r\nСтрана регистрации бренда: Япония', 'https://i2.rozetka.ua/goods/9672/yamaha_erg121u_images_9672043.jpg'),
(45, 'Epiphone Les Paul Special VE', 'guitars', 5500, 7, 'Корпус: Тополь, шпонированый махогоном\r\nКоличество струн: 6\r\nМензура: 24.75\"\r\nГриф: Окуме\r\nКоличество ладов: 22\r\nНакладка грифа: Палисандр\r\nСтрана регистрации бренда: США\r\nКредит 0,01% на 3 месяца!Дарим 100 грн за распаковку\r\n', 'https://i2.rozetka.ua/goods/5494393/epiphone_226006_images_5494393536.jpg'),
(46, 'Цифровое пианино Yamaha P-45 Black', 'keyboard', 14090, 33, 'Блок питания в подарок!\r\nКоличество клавиш: 88 (7.5 октав)\r\nТип клавиатуры: Молоточковая\r\nПодсветка клавиатуры: Нет\r\nКоличество встроенных тембров: 10\r\nСтрана регистрации бренда: Япония', 'https://i2.rozetka.ua/goods/468438/yamaha_p45_blk_images_468438167.jpg'),
(47, 'Сценическое пианино Yamaha P-125 Black', 'keyboard', 19999, 22, 'Блок питания в подарок!\r\nКоличество клавиш: 88 (7.5 октав)\r\nТип клавиатуры: Молоточковая\r\nПодсветка клавиатуры: Нет\r\nКоличество встроенных тембров: 24\r\nСтрана регистрации бренда: Индонезия', 'https://i2.rozetka.ua/goods/4731649/yamaha_p125b_images_4731649704.jpg'),
(48, 'Цифровое пианино Casio AP-470 Black', 'keyboard', 31444, 11, 'Доставка 1-2 дня\r\nКоличество клавиш: 88 (7.5 октав)\r\nТип клавиатуры: Молоточковая\r\nПодсветка клавиатуры: Нет\r\nКоличество встроенных тембров: 22\r\nСтрана регистрации бренда: Япония', 'https://i1.rozetka.ua/goods/6128341/casio_ap_470bk_images_6128341152.jpg'),
(49, 'Цифровое пианино Casio Privia PX-870 Brown', 'keyboard', 26550, 55, 'Количество клавиш: 88 (7.5 октав)\r\nТип клавиатуры: Молоточковая\r\nПодсветка клавиатуры: Нет\r\nКоличество встроенных тембров: 19\r\nСтрана регистрации бренда: Япония', 'https://i1.rozetka.ua/goods/6125561/casio_px_870bn_images_6125561040.jpg'),
(50, 'Цифровое пианино Casio AP-700BK', 'keyboard', 45600, 23, 'Количество клавиш: 88 (7.5 октав)\r\nТип клавиатуры: Молоточковая\r\nПодсветка клавиатуры: Нет\r\nСтрана регистрации бренда: Япония', 'https://i1.rozetka.ua/goods/1880475/copy_casio_celviano_ap_650bk_58c6308cda457_images_1880475752.jpg'),
(51, 'Цифровое пианино Korg G1 Air White', 'keyboard', 44567, 44, 'Количество клавиш: 88 (7.5 октав)\r\nТип клавиатуры: Молоточковая\r\nПодсветка клавиатуры: Нет\r\nКоличество встроенных тембров: 32\r\nСтрана регистрации бренда: Япония', 'https://i1.rozetka.ua/goods/2453089/copy_korg_225785_5a4de68ae79c4_images_2453089329.jpg'),
(52, 'Цифровой рояль Orla Grand 450 White', 'keyboard', 255700, 1, 'Количество клавиш: 88 (7.5 октав)\r\nТип клавиатуры: Молоточковая\r\nПодсветка клавиатуры: Нет\r\nКоличество встроенных тембров: 385\r\nСтрана регистрации бренда: Италия', 'https://i2.rozetka.ua/goods/1329270/orla_grand_450_white_images_1329270150.jpg'),
(53, 'Tama VP52KRS DMF (211106) Dark', 'drums', 29500, 7, 'Количество барабанов - 5\r\nЦвет - Коричневый\r\nМатериал - Береза', 'https://i2.rozetka.ua/goods/9308/tama_vp52krs_dmf_211106_images_9308511.jpg'),
(54, 'Малый барабан Stagg', 'drums', 3000, 100500, 'Страна регистрации бренда: Бельгия', 'https://i2.rozetka.ua/goods/2572455/stagg_sds_1455st8_m_images_2572455367.jpg'),
(55, 'Hayman HM-100-BK', '', 10500, 7, 'Страна регистрации бренда: Нидерланды', 'https://i2.rozetka.ua/goods/2121919/hayman_18_3_17_4_images_2121919940.jpg'),
(56, 'Peace Prodigy DP-109CH-22 White', 'drums', 15000, 15000, 'Страна регистрации бренда: Тайвань', 'https://i2.rozetka.ua/goods/2294931/peace_dp_109ch_22_18_3_11_37_images_2294931665.jpg'),
(57, 'DB Percussion DB52-29 Metallic Red', 'drums', 12450, 34, 'Бас барабан 20\"x14”\r\nТом Том 10\"x9”\r\nТом Том 12\"x10”\r\nФлор Том 14\"x14”', 'https://i2.rozetka.ua/goods/9491657/64871513_images_9491657525.jpg'),
(58, 'Малый барабан DB Percussion', 'drums', 2700, 21, 'Малый барабан деревянный 14\" х 6,5\". 10 лагов', 'https://i2.rozetka.ua/goods/9491661/64871772_images_9491661340.jpg'),
(59, 'Ударная установка Premier XPK', 'drums', 26000, 12, 'Страна регистрации бренда: Англия', 'https://i2.rozetka.ua/goods/6105298/premier_18_3_14_99_images_6105298336.jpg'),
(60, 'Микрофон Rode VideoMic Pro Plus', 'micro', 10000, 34, 'Назначение: Для радиосистем, Для диктофонов, Для видеокамер\r\nНаправленность: Суперкардиоидные', 'https://i2.rozetka.ua/goods/2275888/copy_rode_stereo_videomic_pro_210225_59e73035634b8_images_2275888104.jpg'),
(61, 'Микрофон Behringer C1U', 'micro', 2455, 35, 'Назначение: Студийные\r\nНаправленность: Кардиоидные', 'https://i1.rozetka.ua/goods/9414/behringer_c_1u_images_9414815.jpg'),
(62, 'Микрофон Shure SM58 LCE', 'micro', 3750, 23, 'Назначение: Вокальные\r\nНаправленность: Кардиоидные\r\nЧувствительность: -54,5 дБ', 'https://i2.rozetka.ua/goods/9563/shure_sm58_lce_images_9563384.png'),
(63, 'Микрофон AKG P220', 'micro', 6690, 22, 'Назначение: Студийные\r\nНаправленность: Кардиоидные\r\nЧувствительность: 18 мВ/Па\r\nСтрана регистрации бренда: Австрия', 'https://i2.rozetka.ua/goods/2007458/akg_225106_images_2007458400.jpg'),
(64, 'Беспроводной микрофон караоке', 'micro', 540, 90, 'Чувствительность: -40 ± 3 дБ.', 'https://i1.rozetka.ua/goods/9594422/52630704_images_9594422404.jpg'),
(65, 'Портативный Караоке Микрофон MicGeek', 'micro', 510, 78, 'Wireless Microphone WS-858 - модель заслуженно можно назвать ультра мобильной! Микрофон имеет встроенный аккумулятор и динамик, а значит что он не \"привязан\" ни к розетке, ни к дополнительной акустике. Отлично подойдет для домашнего использования, в качестве подарка ребенку или для профессиональной эксплуатации ведущим на праздник/вечеринку или другое торжество.', 'https://i2.rozetka.ua/goods/6465758/43579048_images_6465758918.jpg'),
(66, 'YAMAHA VS4 (пара)', 'park', 3650, 45, 'АС всепогодная 2-полосная\r\n4\" НЧ +1\" ВЧ,\r\nМощность 30Вт (прог.),\r\nПереключаемая 8Ом или трансформатор 100/70В ,\r\nЧастотный диапазон 100Гц - 20кГц,\r\nРазмеры 152 x 243 x 172 мм,\r\nКрепежные кронштейны в комплекте,\r\nРейтинг EC60529 IPX3\r\nЦвет: черный', 'https://jam.ua/files/images/items/Yamaha%20VS4.jpg'),
(67, 'HL AUDIO H15', 'park', 1500, 67, 'Громковоритель подвесной трансформаторного типа\r\nРупорный\r\nДля трансляционных линий 100В\r\nМаксимальная мощность: 15 Вт\r\nАлюминиевый корпус\r\nЧувствительность: 102 дБ\r\nЧастотный диапазон: 300Гц - 8 кГц\r\nПереключаемая мощность: 15 - 7.5 - 3.8 Вт\r\nРазмеры: ø 200 x 230 мм\r\nВес: 1,9 кг', 'https://jam.ua/files/images/items/H15-hl-audio.jpg'),
(68, 'YAMAHA VS4W (пара)', 'park', 3600, 43, 'АС всепогодная,\r\n\r\n2-полосная, 4\" НЧ +1\" ВЧ,\r\nМощность 30Вт (прог.),\r\nПереключаемая 8Ом или трансформатор 100/70В ,\r\nЧастотный диапазон 100Гц - 20кГц,\r\nРазмеры 152 x 243 x 172 мм,\r\nКрепежные кронштейны в комплекте,\r\nРейтинг EC60529 IPX3,\r\nЦвет: белый,\r\nЦена за пару.', 'https://jam.ua/files/images/items/Yamaha%20VS4w.jpg'),
(69, 'HL AUDIO TH50', 'park', 1600, 23, 'АС подвесная трансформаторного типа\r\n \r\nДля трансляционных линий 70/100В,\r\n2-полосная, НЧ 5\"+ ВЧ 1\",\r\nМощность: 30Вт,\r\nЧастотный диапазон: 100Гц - 20кГц,\r\nРазмеры: 182 × 162 × 242 мм,\r\nКорпус из ударопрочного полистирола (HIPS)\r\nВес: 2.5 кг\r\nЦвет: Белый', 'https://jam.ua/files/images/items/th50-white-hl-audio.jpg'),
(70, 'YAMAHA NS-AW592 BK (пара)', 'park', 6770, 33, 'Простой и элегантный внешний вид - громкоговорители Yamaha NS-AW592 обладают аккуратным, простым  дизайном, который будет выглядеть привлекательно в любом месте на внешней стороне вашего дома, и даже в интерьере.\r\nВходящие в комплект кронштейны позволяют регулировать громкоговорители для соответствия месту установки. Они могут быть установлены вертикально или горизонтально, и могут перемещаться на 81° вправо или влево и вверх или вниз.', 'https://jam.ua/files/images/items/NS-AW592BK-main-yamaha.jpg'),
(71, 'DANELECTRO QT15', 'access', 99, 56, 'Гитарный тюнер универсальный', 'https://jam.ua/files/images/items/QT15PHOT.jpg'),
(72, 'FZONE FM310 (White)', 'access', 1020, 33, 'Метроном механический\r\nтемп: 30 - 280 bpm\r\nвыделение сильной доли\r\nразмеры: 0, 2/4, 3/4, 4/4, 6/8\r\nпластиковый корпус\r\nцвет: белый', 'https://jam.ua/files/images/items/FM310%20White%20JAM.jpg'),
(73, 'FZONE FM310 (Wood)', 'access', 960, 22, 'Метроном механический\r\nтемп: 30 - 280 bpm\r\nвыделение сильной доли\r\nразмеры: 0, 2/4, 3/4, 4/4, 6/8\r\nпластиковый корпус\r\nцвет: деревянный (Wood)', 'https://jam.ua/files/images/items/FM-310-wooden.jpg'),
(74, 'D`ADDARIO B12S-48', 'access', 125, 99, 'Нотная тетрадь D`Addario.\r\n12 строк (нотных станов),\r\n48 страниц\r\nИзготовлена из переработанной бумаги\r\nПечать соевыми чернилами\r\nПружинный переплет\r\nПроизводство - США', 'https://jam.ua/files/images/items/B12S48_00.gif'),
(75, 'MAXTONE KCNM KEYCHAIN TREBLE CLEF', 'access', 100, 22, 'Деревянный брелок для ключей в виде скрипичного ключа', 'https://jam.ua/files/images/items/KCN-M-maxtone.jpg'),
(76, 'MARTIN D910 DARCO Electric Heavys', 'access', 136, 55, 'Струны для электрогитары\r\nСтруны Darco - это прекрасный баланс цены и качества. Они отличаются отличной разборчивостью звучания и изготовлены в соответствии со строгими стандартами качества, характерными для компании Martin.', 'https://jam.ua/files/images/items/d910-main-darco.jpg'),
(77, 'DIMARZIO EP1610SSI BASIC GUITAR CABLE', 'access', 750, 46, 'Гитарный кабель DiMarzio серии Basic. Качественное звучание стало доступнее.\r\nПрименение таких же высококачественных комплектующих, что и в более дорогих кабелях Dimarzio, обеспечивает низкий уровень шума и улучшенную отдачу в высокочастотном диапазоне.', 'https://jam.ua/files/images/items/ep1600bk.jpg'),
(78, 'YAMAHA YTR3335', 'brass', 22400, 15, 'Доступная труба со \"взрослым\" звучанием!', 'https://jam.ua/files/images/items/Yamaha%20YTR3335.jpg'),
(79, 'SEYDEL SESSION STEEL C-major', 'brass', 1975, 24, 'Блюзовая губная гармоника, прекрасная модель для начинающих!', 'https://jam.ua/files/images/items/Seydel%20Session_Steel%20JAM.UA.jpg'),
(80, 'YAMAHA YTR4335GSII', 'brass', 29800, 12, 'Модели серии 4000 теперь поставляются с модифицированным раструбом из двух частей изготовленным из золотой латуни с толщиной металла, подобранной так, чтобы улучшить звучание инструмента и удобство игры. Обновленные утяжеленные крышки помповых клапанов и кнопки придают звучанию трубы выразительность и дополнительный объем.', 'https://jam.ua/files/images/items/ytr4335gs2-yamaha.jpg'),
(81, 'MAXTONE TT MINI 53L', 'brass', 15700, 2, 'Мини труба Си бемоль\r\nТруба Maxtone – прекрасный выбор для начинающего музыканта.', 'https://jam.ua/files/images/items/TT-MINI-53-L.JPG'),
(82, 'MAXTONE TTC53TL1 (TTC61L)', 'brass', 34800, 33, 'Тенор тромбон Си бемоль\r\nТромбоны Maxtone – прекрасный выбор для начинающего музыканта.\r\n\r\nИспользуя многолетний опыт европейских производителей и современные технологии, компания Maxtone производит качественные и при этом доступные духовые инструменты.', 'https://jam.ua/files/images/items/TTC61L.jpg'),
(83, 'YAMAHA YAS-280', 'brass', 46200, 4, 'Саксофоны серии YAS-280 — это прекрасный выбор для первого знакомства с инструментом.', 'https://jam.ua/files/images/items/Yamaha%20YAS280.jpg'),
(84, 'MAXTONE TBC53/260', 'brass', 2890, 12, 'Горн (рожок) Соль/Фа\r\nИспользуя многолетний опыт европейских производителей и современные технологии, компания Maxtone производит качественные и при этом доступные духовые инструменты.', 'https://jam.ua/files/images/items/TBC-53-260-maxtone.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `passwd` varchar(128) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `passwd`, `mail`, `number`) VALUES
(2, 'test', 'b913d5bbb8e461c2c5961cbe0edcdadfd29f068225ceb37da6defcf89849368f8c6c2eb6a4c4ac75775d032a0ecfdfe8550573062b653fe92fc7b8fb3b7be8d6', 'test', 'test'),
(5, 'admin', '6a4e012bd9583858a5a6fa15f58bd86a25af266d3a4344f1ec2018b778f29ba83be86eb45e6dc204e11276f4a99eff4e2144fbe15e756c2c88e999649aae7d94', '', ''),
(6, 'kaleka', '8d69d61e1f70d4194c0c77818747927fe48a1f37eee7f03c009a34c1287bba400fa8036a009b7655b3c77a825f9a24775054777d8423506686eee0f2ab62c5e3', 'asdsa@asda', ''),
(7, 'aaa', 'd6ba3e6ab8745031057704342d48a38e80e6285e036eaa8dac3ce01f2419aa1ad0173a8e4e224b170830542ff09747ce37d1c9f39556a588ae159f5cd4517219', 'asd@adsa', '1231'),
(8, 'loh', '87d9ff42f9b4b369409e66a038ce5d04314df8ebcf710232ce3146e177c9df54e07b7cf005a6b732d5d83f4a8048bb4899af2a866949f6c427f3eaf37804fca9', 'pidor@lox.chmo', '1234'),
(9, 'kek', '22fb46e1955a8aeb31c59d79d887d02af2d1bc4524e85aafa2455cc78bc0147b10dd477201d147e2f5ca910bb43d982320478b9d179ddde85f4806497fe2ee68', '123@hui.loh', '-20342'),
(10, 'testm', 'eaa18fa9caa3aed6bd5784c8bf8f052035e0883bbdb3f0ace470920d543aedb61a016e1422d39d20584aebdad97c163756d1871a2cc715410b23f89c01c14ed9', 'mail@mail.com', '345345'),
(11, 'bbb', '5335dab9f68c554b7eae0196df8aa6884d33d7fc11e9724298932a40a3cbf00debea495357685478c85bdaea49eb4d52f3af5a545c4ba31627b63714f39261cd', 'asda@asdas', '+12312312');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `check`
--
ALTER TABLE `check`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `check`
--
ALTER TABLE `check`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
