<?php
session_start();

// ログイン状態のチェック
if (!isset($_SESSION["USERID"])) {
  header("Location: logout.php");
  exit;
}

?>

<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>サンプルアプリケーション</title>
  </head>
  <body>
  <h1>ログイン機能　サンプルアプリケーション</h1>
  <!-- ユーザIDにHTMLタグが含まれても良いようにエスケープする -->
  <p>ようこそ<?=htmlspecialchars($_SESSION["USERID"], ENT_QUOTES); ?>さん</p>
  <?php
    foreach($_SESSION as $key=>$value) {
      echo "${key}=${value}<br>";
    }
  ?>
  <ul>
  <li><a href="page1.php">ページ1</a></li>
  <li><a href="page2.php">ページ2</a></li>
  <li><a href="logout.php">ログアウト</a></li>
  </ul>
  </body>
</html>
