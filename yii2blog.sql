-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 18 2018 г., 23:38
-- Версия сервера: 5.6.37
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `content` text,
  `date` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `viewed` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `title`, `description`, `content`, `date`, `image`, `viewed`, `user_id`, `status`, `category_id`) VALUES
(3, 'Yii - Краткий обзор', 'Yii — это высокоэффективный, основанный на компонентной структуре PHP-фреймворк для быстрой разработки крупных веб-приложений.', 'Yii приложения организованы согласно шаблону проектирования модель-представление-контроллер (MVC). Модели представляют собой данные, бизнес логику и бизнес правила; представления отвечают за отображение информации, в том числе и на основе данных, полученных из моделей; контроллеры принимают входные данные от пользователя и преобразовывают их в понятный для моделей формат и команды, а также отвечают за отображение нужного представления.\r\n\r\nКроме MVC, Yii приложения также имеют следующие сущности:\r\n\r\n1) входные скрипты: это PHP скрипты, которые доступны напрямую конечному пользователю приложения. Они ответственны за запуск и обработку входящего запроса;\r\n2) приложения: это глобально доступные объекты, которые осуществляют корректную работу различных компонентов приложения и их координацию для обработки запроса;\r\n3) компоненты приложения: это объекты, зарегистрированные в приложении и предоставляющие различные возможности для обработки текущего запроса;\r\n4) модули: это самодостаточные пакеты, которые включают в себя полностью все средства для MVC. Приложение может быть организованно с помощью нескольких модулей;\r\n5) фильтры: это код, который должен быть выполнен до и после обработки запроса контроллерами;\r\n6) виджеты: это объекты, которые могут включать в себя представления. Они могут содержать различную логику и быть использованы в различных представлениях.', '2018-02-15', '6710bd5ce1d1c00b6ffcf14aae2ad112.png', 6, NULL, 1, 1),
(4, '«Создатель великой вселенной Marvel»: Отрывок из новой биографии Стэна Ли', '28 декабря — 95 лет со дня рождения создателя Человека-паука, Халка, Доктора Стрэнджа, Железного человека, Сорвиголовы, Тора и многих других персонажей комиксов.', 'Незначительная, на первый взгляд, сцена наглядно демонстрирует место, которое занимает исполнитель этой маленькой роли — американский писатель и сценарист Стэн Ли, которому 28 декабря исполнилось 95 лет — во вселенной Marvel. Камео создателя Человека-паука, Халка, Доктора Стрэнджа, Железного человека, Сорвиголовы, Тора и многих других персонажей на самом деле имеет большое значение для сюжета ленты и указывает на то, как события вселенной Marvel будут разворачиваться в дальнейшем. Даже больше: по одной из фанатских теорий, Стэн Ли в своих камео играет персонажа по имени Всевышний (One-Above-All), который является богом вселенной Marvel и ее творцом.\r\n\r\nВклад этого человека в современную массовую культуру трудно переоценить. Боб Батчелор, автор новой книги «Стэн Ли. Создатель великой вселенной Marvel», которую недавно опубликовало на русском языке издательство «Эксмо», подробно рассказывает о том, как Стэнли Либер (настоящее имя писателя) подарил читателям комиксов новый взгляд на супергероев: «Они оказались настоящими, имеющими свои недостатки, как и все люди. Персонажи Marvel обладали эмоциональными слабостями. Их главным врагом были человеческие эмоции, а не, например, осколки внеземных пород, как у Супермена».\r\nНовшество, которое Стэн Ли привнес в индустрию комиксов, состояло в том, что он сосредоточился на том, как говорят персонажи, что они чувствуют, с какими проблемами сталкиваются и каково им жить в реальном мире с их необычными способностями. Подобный подход очень понравился поклонникам комиксов: если супергерои могут быть похожими на нас, то и мы можем быть похожими на супергероев. «Читатели приняли идеи Ли, а его авторский почерк превратился в один из определяющих для популярной культуры», — отмечает Батчелор.', '2018-02-15', 'a2bbf52ccbe7f51b7b121624312361b2.jpg', 3, NULL, 1, 3),
(7, 'Intel Cannon Lake и Ice Lake', 'Новые сведения о мобильных процессорах Cannon Lake и Ice Lake', 'Слухи о первых 10-нм процессорах Intel под названием Cannon Lake (первоначально — Cannonlake) появились ещё до выхода дебютных 14-нм решений компании. В июне 2014 г. прогнозировалось, что CPU и SoC Cannon Lake увидят свет в 2016 году. Впоследствии переход на 10-нм норму многократно откладывался, однако бесконечно это происходить не может: сначала Intel выпустит ряд экономичных SoC Cannon Lake в рамках 8-го поколения Core, а затем — процессоры Ice Lake в качестве моделей Core 9-го поколения.\r\nМесяц назад мы писали о подготовке компанией из Санта-Клары двухъядерных SoC Core i3-8121U и Core i3-8130U. Последний в итоге стал частью модельного ряда 14-нм процессоров Kaby Lake Refresh-U, а вот чип с индексом «8121U» по-прежнему считается одним из 10-нм Cannon Lake. В пользу данной гипотезы говорит его идентификатор «Family 6 Model 102», ассоциируемый с семейством SoC Cannon Lake-U.', '2018-02-16', '8a049e30228958f69aac177fa21ec236.png', 4, NULL, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `article_tag`
--

CREATE TABLE `article_tag` (
  `id` int(11) NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `article_tag`
--

INSERT INTO `article_tag` (`id`, `article_id`, `tag_id`) VALUES
(4, 3, 1),
(15, 7, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'Yii'),
(2, '3Dnews'),
(3, 'Films');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `text` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1518714022),
('m180215_162105_create_article_table', 1518714047),
('m180215_162212_create_category_table', 1518714047),
('m180215_162221_create_tag_table', 1518714047),
('m180215_162226_create_user_table', 1518714047),
('m180215_162232_create_comment_table', 1518714047),
('m180215_162254_create_article_tag_table', 1518714047);

-- --------------------------------------------------------

--
-- Структура таблицы `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tag`
--

INSERT INTO `tag` (`id`, `title`) VALUES
(1, 'tag1'),
(2, 'tag2'),
(3, 'tag3');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `isAdmin` int(11) DEFAULT '0',
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `article_tag`
--
ALTER TABLE `article_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_article_article_id` (`article_id`),
  ADD KEY `idx_tag_id` (`tag_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-post-user_id` (`user_id`),
  ADD KEY `idx-article_id` (`article_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `article_tag`
--
ALTER TABLE `article_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `article_tag`
--
ALTER TABLE `article_tag`
  ADD CONSTRAINT `fk-tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tag_article_article_id` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk-article_id` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-post-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
