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
    <a href="/">献立</a>
  </h1>
  <a href="menu">献立を登録する</a>

  <form action="shuffle" method="post">
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
