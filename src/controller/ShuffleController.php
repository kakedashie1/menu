<?php


class ShuffleController extends Controller
{


  public function index()
  {
      $mysqli = new mysqli('db', 'test_user', 'pass', 'test_database');
      if ($mysqli->connect_error) {
        throw new RuntimeException('mysqli接続エラー: ' . $mysqli->connect_error);
      }

      $main_dish = "";
      $sub_dish = "";
      $soup = "";


      include __DIR__ . '/../views/index.php';
  }

  public function create()
  {
       $mysqli = new mysqli('db', 'test_user', 'pass', 'test_database');
      if ($mysqli->connect_error) {
        throw new RuntimeException('mysqli接続エラー: ' . $mysqli->connect_error);
      }

      $main_dish = "";
      $sub_dish = "";
      $soup = "";


        $result = $mysqli->query('SELECT name FROM main_dishes');
        $main_dishes = $result->fetch_all(MYSQLI_ASSOC);
        shuffle($main_dishes);
        $main_dish = $main_dishes[0]['name'];

        $result = $mysqli->query('SELECT name FROM sub_dishes');
        $sub_dishes = $result->fetch_all(MYSQLI_ASSOC);
        shuffle($sub_dishes);
        $sub_dish = $sub_dishes[0]['name'];

        $result = $mysqli->query('SELECT name FROM soups');
        $soups = $result->fetch_all(MYSQLI_ASSOC);
        shuffle($soups);
        $soup = $soups[0]['name'];


      include __DIR__ . '/../views/index.php';
  }
}
