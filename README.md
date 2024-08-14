# SQLI

Structured Query Language (SQL*) Injection is a code injection technique used to modify or retrieve data from SQL databases. By inserting specialized SQL statements into an entry field, an attacker is able to execute commands that allow for the retrieval of data from the database, the destruction of sensitive data, or other manipulative behaviors.

CREATE DATABASE vulnerable_db;

USE vulnerable_db;

CREATE TABLE users (   
id INT AUTO_INCREMENT PRIMARY KEY,  
username VARCHAR(50),    
password VARCHAR(50));

INSERT INTO users (username, password) VALUES ('admin', 'adminpass');

INSERT INTO users (username, password) VALUES ('user', 'userpass');
