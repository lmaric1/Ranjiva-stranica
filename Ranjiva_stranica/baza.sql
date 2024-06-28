CREATE DATABASE test_db;

USE test_db;

CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(500) NOT NULL
);

CREATE TABLE comments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    username VARCHAR(500) NOT NULL,
    comment TEXT NOT NULL
);

INSERT INTO users (username) VALUES ('admin'), ('Luka'), ('Marko');

