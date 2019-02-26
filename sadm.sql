DROP DATABASE IF EXISTS travelers;
CREATE DATABASE IF NOT EXISTS travelers;
USE travelers;

DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users(
userId bigint(12) NOT NULL AUTO_INCREMENT,
fullname varchar(50) NOT NULL DEFAULT '',
email varchar(60) NOT NULL DEFAULT '',
username varchar(60) NOT NULL DEFAULT '',
password varchar(60) NOT NULL DEFAULT '',
createdDate bigint(10) NOT NULL DEFAULT 0,
updateDate bigint(10) NOT NULL DEFAULT 0,

PRIMARY KEY (userId),
UNIQUE KEY (email),
UNIQUE KEY (username)



);