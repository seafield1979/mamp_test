<?php
session_start();

// ログイン状態のチェック
if (!isset($_SESSION["USERID"])) {
  header("Location: logout.php");
  exit;
}

// セッション変数をセット
$_SESSION["PARAM1"] = "hoge1";

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
  <p>セッション変数 param1 を設定しました</p>
  <ul>
  <li><a href="main.php">メインページへ</a></li>
  </ul>
  </body>
</html>
