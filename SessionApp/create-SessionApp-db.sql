/*
This script creates the database and db user for the SessionApp application.
Import the script via your phpMyAdmin import function
*/
-- -----------------------------------------------------------------------

CREATE DATABASE session_db;

-- Creating the db user and assigning CRUD privileges on all tables 
CREATE USER 'yt4Wvs67_jer335'@'localhost' IDENTIFIED BY 'PE3GXn3qJpwEvybr';
USE session_db;
GRANT DELETE,INSERT,SELECT,UPDATE ON session_db.* TO 'yt4Wvs67_jer335'@'localhost';

-- Table structure for table user
CREATE TABLE user (
  userid int NOT NULL AUTO_INCREMENT,
  username varchar(16) NOT NULL,
  password varchar(40) NOT NULL,
  city varchar(32) NOT NULL,
  PRIMARY KEY (userid)
);