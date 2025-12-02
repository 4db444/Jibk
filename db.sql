DROP DATABASE IF EXISTS jibk;
CREATE DATABASE IF NOT EXISTS jibk;

USE jibk;

DROP TABLE IF EXISTS expenses;
CREATE TABLE IF NOT EXISTS expenses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(30) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    description TEXT DEFAULT NULL,
    date DATE DEFAULT curdate()
); 


DROP TABLE IF EXISTS incomes;
CREATE TABLE IF NOT EXISTS incomes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(30) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    description TEXT DEFAULT NULL,
    date DATE DEFAULT curdate()
); 

select * from incomes;