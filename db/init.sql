CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE appDB;
CREATE TABLE IF NOT EXISTS users (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  login VARCHAR(20) NOT NULL,
  password VARCHAR(40) NOT NULL,
  PRIMARY KEY (ID)
);
CREATE TABLE IF NOT EXISTS products (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL,
  price INTEGER,
  PRIMARY KEY (ID)
);

INSERT INTO users (login, password)
SELECT * FROM (SELECT 'admin', '{SHA}QL0AFWMIX8NRZTKeof9cXsvbvu8=') AS tmp
WHERE NOT EXISTS (
    SELECT login FROM users WHERE login='admin' AND password='123'
) LIMIT 1;

INSERT INTO products (name, price)
SELECT * FROM (SELECT 'Americano', 100) AS tmp
WHERE NOT EXISTS (
    SELECT name FROM products WHERE name = 'Americano' AND price = 100
) LIMIT 1;

INSERT INTO products (name, price)
SELECT * FROM (SELECT 'Cappuccino', 120) AS tmp
WHERE NOT EXISTS (
    SELECT name FROM products WHERE name = 'Cappuccino' AND price = 120
) LIMIT 1;

INSERT INTO products (name, price)
SELECT * FROM (SELECT 'Latte', 130) AS tmp
WHERE NOT EXISTS (
    SELECT name FROM products WHERE name = 'Latte' AND price = 130
) LIMIT 1;

INSERT INTO products (name, price)
SELECT * FROM (SELECT 'Cake', 150) AS tmp
WHERE NOT EXISTS (
        SELECT name FROM products WHERE name = 'Cake' AND price = 150
    ) LIMIT 1;

