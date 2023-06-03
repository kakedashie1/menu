<?php


class MenuController extends Controller
{


  public function index()
  {
    $mysqli = new mysqli('db', 'test_user', 'pass', 'test_database');
if ($mysqli->connect_error) {
  throw new RuntimeException('mysqli接続エラー: ' . $mysqli->connect_error);
}

$result = $mysqli->query('SELECT name FROM main_dishes');
$main_dishes = $result->fetch_all(MYSQLI_ASSOC);

$result = $mysqli->query('SELECT name FROM sub_dishes');
$sub_dishes = $result->fetch_all(MYSQLI_ASSOC);

$result = $mysqli->query('SELECT name FROM soups');
$soups = $result->fetch_all(MYSQLI_ASSOC);



$mysqli->close();

include __DIR__ . '/../views/menu.php';

  }

  public function create()
  {
    $mysqli = new mysqli('db', 'test_user', 'pass', 'test_database');
if ($mysqli->connect_error) {
  throw new RuntimeException('mysqli接続エラー: ' . $mysqli->connect_error);
}

$result = $mysqli->query('SELECT name FROM main_dishes');
$main_dishes = $result->fetch_all(MYSQLI_ASSOC);

$result = $mysqli->query('SELECT name FROM sub_dishes');
$sub_dishes = $result->fetch_all(MYSQLI_ASSOC);

$result = $mysqli->query('SELECT name FROM soups');
$soups = $result->fetch_all(MYSQLI_ASSOC);


  if (!empty($_POST['main_name'])) {
    $stmt = $mysqli->prepare('INSERT INTO main_dishes (name) VALUES (?)');
    $stmt->bind_param('s', $_POST['main_name']);
    $stmt->execute();
    header('Location: /menu');
  }

  if (!empty($_POST['sub_name'])) {
    $stmt = $mysqli->prepare('INSERT INTO sub_dishes (name) VALUES (?)');
    $stmt->bind_param('s', $_POST['sub_name']);
    $stmt->execute();
    header('Location: /menu');
  }

  if (!empty($_POST['soup_name'])) {
    $stmt = $mysqli->prepare('INSERT INTO soups (name) VALUES (?)');
    $stmt->bind_param('s', $_POST['soup_name']);
    $stmt->execute();
    header('Location: /menu');
  }


$mysqli->close();

include __DIR__ . '/../views/menu.php';
  }


}
