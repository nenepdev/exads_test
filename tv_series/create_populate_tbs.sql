CREATE DATABASE exads_test;

CREATE TABLE tv_series (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) UNIQUE NOT NULL,
CHANNEL VARCHAR(30) NOT NULL,
gender VARCHAR(30) NOT NULL
);

INSERT INTO tv_series(title,CHANNEL,gender)
VALUES ('Gilmore Girls', 'Fox Comedy','Comedy-Romance'),
('Game of Thrones', 'HBO', 'Drama'),
('Atypical', 'Netflix', 'Comedy-Romance')
;

SELECT * FROM tv_series;

CREATE TABLE tv_series_intervals (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_tv_series INT(6) UNSIGNED NOT NULL,
week_day INT(1) NOT NULL,
show_time TIME NOT NULL,
FOREIGN KEY (id_tv_series) REFERENCES tv_series(id)
);

INSERT INTO tv_series_intervals(id_tv_series,week_day,show_time)
VALUES (1, '0','18:00:00'),
(1, '2','21:00:00'),
(1, '6','21:00:00'),
(2, '4','23:00:00'),
(3, '0','15:00:00'),
(3, '1','19:00:00'),
(3, '5','15:00:00'),
(3, '0','12:00:00')
;





