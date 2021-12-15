drop database if exists n0kejo00;
create database n0kejo00;
use n0kejo00;

CREATE TABLE IF NOT EXISTS `user`(
    uid INT PRIMARY KEY AUTO_INCREMENT,
    fname VARCHAR(64) NOT NULL,
    lname VARCHAR(64) NOT NULL,
    uname VARCHAR(32) NOT NULL,
    passw VARCHAR(120) NOT NULL,
    INDEX user_index(uname)
);

CREATE TABLE IF NOT EXISTS user_info(
    info_id INT PRIMARY KEY AUTO_INCREMENT,
    uname VARCHAR(32) NOT NULL,
    infotext VARCHAR(256),
    INDEX uname_index(uname),
    FOREIGN KEY(uname) references user(uname)
    ON DELETE restrict
);