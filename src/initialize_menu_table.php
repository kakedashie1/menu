<?php
$mysqli = new mysqli('db', 'test_user', 'pass', 'test_database');
if ($mysqli->connect_error) {
  throw new RuntimeException('mysqli接続エラー: ' . $mysqli->connect_error);
}

// main_dishes table
$mysqli->query('DROP TABLE IF EXISTS main_dishes');
$createMainDishesTableSql = <<<EOT
CREATE TABLE IF NOT EXISTS main_dishes (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  name VARCHAR(100) NOT NULL
  ) ENGINE=INNODB DEFAULT CHARSET=utf8mb4
EOT;
$mysqli->query($createMainDishesTableSql);

// sub_dishes table
$mysqli->query('DROP TABLE IF EXISTS sub_dishes');
$createSubDishesTableSql = <<<EOT
CREATE TABLE IF NOT EXISTS sub_dishes (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  name VARCHAR(100) NOT NULL
  ) ENGINE=INNODB DEFAULT CHARSET=utf8mb4
EOT;
$mysqli->query($createSubDishesTableSql);

// soups table
$mysqli->query('DROP TABLE IF EXISTS soups');
$createSoupsTableSql = <<<EOT
CREATE TABLE IF NOT EXISTS soups (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  name VARCHAR(100) NOT NULL
  ) ENGINE=INNODB DEFAULT CHARSET=utf8mb4
EOT;
$mysqli->query($createSoupsTableSql);

$mysqli->close();
?>
