<?php
$mysqli = new mysqli('db', 'test_user', 'pass', 'test_database');
if ($mysqli->connect_error) {
  throw new RuntimeException('mysqli接続エラー: ' . $mysqli->connect_error);
}

$main_dish = "";
$sub_dish = "";
$soup = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>献立</title>
</head>
<body>
  <h1>
    <a href="index.php">献立</a>
  </h1>
  <a href="menu.php">献立を登録する</a>

  <form action="index.php" method="post">
    <button>シャッフルする</button>
  </form>

  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <h2>今日の献立</h2>
    <p>メイン: <?php echo htmlspecialchars($main_dish, ENT_QUOTES, 'UTF-8'); ?></p>
    <p>サブ: <?php echo htmlspecialchars($sub_dish, ENT_QUOTES, 'UTF-8'); ?></p>
    <p>スープ: <?php echo htmlspecialchars($soup, ENT_QUOTES, 'UTF-8'); ?></p>
  <?php endif; ?>
</body>
</html>
