--
-- Database: `bookMS`
--
CREATE DATABASE codepencil DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS codepencil.user(
uid int(20) NOT NULL auto_increment,
username varchar(50) NOT NULL,
password varchar(50) NOT NULL,
name varchar(50) NOT NULL,
reg_time datetime NOT NULL,
PRIMARY KEY(uid)
)ENGINE=MyISAM DEFAULT CHARSET=utf8 auto_increment=6;

INSERT INTO codepencil.user (uid,username,password,name,reg_time)VALUES
(1,'a1','000000','jack','2015-10-18'),
(2,'a2','000000','jim','2015-11-29');

CREATE TABLE IF NOT EXISTS codepencil.code(
cid int(20) NOT NULL auto_increment,
uid int(20) NOT NULL,
codename varchar(50) NOT NULL,
htmlcode varchar(2000) NOT NULL,
csscode varchar(2000) NOT NULL,
jscode varchar(2000) NOT NULL,
create_time datetime NOT NULL,
PRIMARY KEY(cid)
)ENGINE=MyISAM DEFAULT CHARSET=utf8 auto_increment=11;

INSERT INTO codepencil.code(cid,uid,codename,htmlcode,csscode,jscode,create_time)VALUES
(1,1,'first','<html></html>','<CSS></CSS>','<JS></JS>','2015-2-11');
