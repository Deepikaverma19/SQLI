# SQLI

CREATE DATABASE vulnerable_db;

USE vulnerable_db;

CREATE TABLE users (   
id INT AUTO_INCREMENT PRIMARY KEY,  
username VARCHAR(50),    
password VARCHAR(50));

INSERT INTO users (username, password) VALUES ('admin', 'adminpass');

INSERT INTO users (username, password) VALUES ('user', 'userpass');
