CREATE DATABASE IF NOT EXISTS db_exads;
USE db_exads;

CREATE USER 'user_exads'@'localhost' IDENTIFIED BY 'khH073&0';
GRANT ALL PRIVILEGES ON db_exads.* TO 'user_exads'@'localhost';
FLUSH PRIVILEGES;

CREATE TABLE IF NOT EXISTS tv_series (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    channel TINYINT NOT NULL,
    gender VARCHAR(255)
)  ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS tv_series_intervals (
    id_tv_series INT NOT NULL,
    week_day TINYINT NOT NULL,
    show_time TIME NOT NULL,
    FOREIGN KEY (id_tv_series) REFERENCES tv_series(id)
)  ENGINE=INNODB;

INSERT INTO tv_series (title, channel, gender) VALUES ('White Lines', 5, 'Drama');
INSERT INTO tv_series (title, channel, gender) VALUES ('Dark', 10, 'Mistery');
INSERT INTO tv_series (title, channel, gender) VALUES ('Lupin', 22, 'drama');

INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time) VALUES (1, 0, '17:00:00');
INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time) VALUES (1, 1, '17:00:00');
INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time) VALUES (1, 2, '17:00:00');
INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time) VALUES (1, 3, '17:00:00');
INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time) VALUES (1, 4, '17:00:00');
INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time) VALUES (1, 5, '17:00:00');
INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time) VALUES (1, 6, '17:00:00');

INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time) VALUES (2, 0, '19:00:00');
INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time) VALUES (2, 1, '19:00:00');
INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time) VALUES (2, 2, '19:00:00');
INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time) VALUES (2, 3, '19:00:00');
INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time) VALUES (2, 4, '19:00:00');
INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time) VALUES (2, 5, '19:00:00');
INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time) VALUES (2, 6, '19:00:00');

INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time) VALUES (3, 0, '21:00:00');
INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time) VALUES (3, 1, '21:00:00');
INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time) VALUES (3, 2, '21:00:00');
INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time) VALUES (3, 3, '21:00:00');
INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time) VALUES (3, 4, '21:00:00');
INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time) VALUES (3, 5, '21:00:00');
INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time) VALUES (3, 6, '21:00:00');