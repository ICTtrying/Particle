     DROP DATABASE IF EXISTS `SummerGame`;

     CREATE DATABASE `SummerGame`;

     USE `SummerGame`;

     CREATE TABLE leaderboard (
     id SMALLINT unsigned not null AUTO_INCREMENT PRIMARY KEY,
     name varchar(15) not null,
     highscore SMALLINT not null,
     DatumAangemaakt TIMESTAMP(6) DEFAULT CURRENT_TIMESTAMP(6),
     DatumGewijzigd TIMESTAMP(6) DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
     );

     INSERT INTO leaderboard (name, highscore) VALUES
     ('Wesley', 5);
