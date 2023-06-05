<a href="menu">献立を登録する</a>

  <form action="shuffle" method="post">
    <button>シャッフルする</button>
  </form>

  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <h2>今日の献立</h2>
    <?php if (!empty($_SESSION['error'])): ?>
  <p><?php echo htmlspecialchars($_SESSION['error'], ENT_QUOTES, 'UTF-8'); unset($_SESSION['error']); ?></p>
<?php endif; ?>


    <p>メイン: <?php echo htmlspecialchars($main_dish, ENT_QUOTES, 'UTF-8'); ?></p>
    <p>サブ: <?php echo htmlspecialchars($sub_dish, ENT_QUOTES, 'UTF-8'); ?></p>
    <p>スープ: <?php echo htmlspecialchars($soup, ENT_QUOTES, 'UTF-8'); ?></p>
  <?php endif; ?>
