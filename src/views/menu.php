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
    <a href="/">献立</a>
  </h1>
  <h2>献立の登録</h2>
  <form action="menu/create" method="post">
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
