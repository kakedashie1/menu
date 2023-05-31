<?php
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!empty($_POST['main_name'])) {
    $stmt = $mysqli->prepare('INSERT INTO main_dishes (name) VALUES (?)');
    $stmt->bind_param('s', $_POST['main_name']);
    $stmt->execute();
    header('Location: /menu.php');
  }

  if (!empty($_POST['sub_name'])) {
    $stmt = $mysqli->prepare('INSERT INTO sub_dishes (name) VALUES (?)');
    $stmt->bind_param('s', $_POST['sub_name']);
    $stmt->execute();
    header('Location: /menu.php');
  }

  if (!empty($_POST['soup_name'])) {
    $stmt = $mysqli->prepare('INSERT INTO soups (name) VALUES (?)');
    $stmt->bind_param('s', $_POST['soup_name']);
    $stmt->execute();
    header('Location: /menu.php');
  }
}

$mysqli->close();
?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>献立の登録</title>
</head>
<body>
  <h1>
    <a href="index.php">献立</a>
  </h1>
  <h2>献立の登録</h2>
  <form action="menu.php" method="post">
    <div>
      <label for="main_name">メイン</label>
      <input type="text" name="main_name">
      <label for="sub_name">サブ</label>
      <input type="text" name="sub_name">
      <label for="soup_name">汁物</label>
      <input type="text" name="soup_name">
    </div>
    <button type="submit">登録する</button>
  </form>

  <h2>登録済み献立の一覧</h2>
  <h3>メイン</h3>
  <ul>
    <?php foreach ($main_dishes as $main_dishe) : ?>
      <li>
        <?php echo $main_dishe['name']; ?>
      </li>
    <?php endforeach; ?>
  </ul>
  <h3>サブ</h3>
  <ul>
    <?php foreach ($sub_dishes as $sub_dishe) : ?>
      <li>
        <?php echo $sub_dishe['name']; ?>
      </li>
    <?php endforeach; ?>
  </ul>
  <h3>汁物</h3>
  <ul>
    <?php foreach ($soups as $soup) : ?>
      <li>
        <?php echo $soup['name']; ?>
      </li>
    <?php endforeach; ?>
  </ul>


</body>
</html>
