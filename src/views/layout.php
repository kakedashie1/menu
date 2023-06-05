<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php if (isset($title)) : echo $title . ' - ';endif; ?>献立
  </title>
</head>
<body>
  <h1>
    <a href="/">献立</a>
  </h1>
  <div>
    <?php echo $content; ?>
  </div>

</body>
</html>
