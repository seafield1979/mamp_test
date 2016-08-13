<?php
// セッション開始
session_start();


$db['host'] = "localhost";  // DBサーバのurl
$db['user'] = "root";
$db['pass'] = "root";
$db['dbname'] = "test_login";

// エラーメッセージの初期化
$errorMessage = "";


function create_user() {
  global $db;
  global $_POST;
  global $errorMessage;
  // mysqlへの接続
  $mysqli = new mysqli($db['host'], $db['user'], $db['pass']);
  if ($mysqli->connect_errno) {
    $errorMessage = '<p>データベースへの接続に失敗しました。</p>' . $mysqli->connect_error;
    return;
  }

  // データベースの選択
  $mysqli->select_db($db['dbname']);

  // 入力値のサニタイズ
  $userid = $mysqli->real_escape_string($_POST["userid"]);
  $passwordHashed = password_hash($_POST['password'], PASSWORD_DEFAULT);

  // クエリの実行
  $query = "SELECT * FROM db_user WHERE name = '" . $userid . "'";
  $result = $mysqli->query($query);
  if (!$result) {
    $errorMessage = 'クエリーが失敗しました。' . $mysqli->error;
    $mysqli->close();
    return;
  }

  if ($result->num_rows >= 1){
    // すでにユーザーが存在している
    $errorMessage = "すでにユーザーが存在しています。別の名前で登録してください";
    $mysqli->close();
    return;
  }

  // 3.ユーザーの登録
  $query = "INSERT INTO db_user (name,password) VALUES (\"$userid\",\"$passwordHashed\")";
  if ($result = $mysqli->query($query)) {
    // 成功
  }
  else {
    // 失敗
    //$errorMessage = "ユーザー登録に失敗しました";
    $errorMessage = $query;
    return;
  }

  $mysqli->close();

  session_regenerate_id(true);
  $_SESSION["USERID"] = $userid;
  header("Location: main.php"); 
}

// ログインボタンが押された場合
if (isset($_POST["create"])) {
  // １．ユーザIDの入力チェック
  if (empty($_POST["userid"])) {
    $errorMessage = "ユーザIDが未入力です。";
  } else if (empty($_POST["password"])) {
    $errorMessage = "パスワードが未入力です。";
  } 

  // ２．ユーザIDとパスワードが入力されていたら認証する
  if (!empty($_POST["userid"]) && !empty($_POST["password"])) {
    create_user(); 
  } 
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
  <!-- $_SERVER['PHP_SELF']はXSSの危険性があるので、actionは空にしておく -->
  <!--<form id="loginForm" name="loginForm" action="<?php print($_SERVER['PHP_SELF']) ?>" method="POST">-->
  <form id="loginForm" name="loginForm" action="" method="POST">
  <fieldset>
  <legend>ユーザー新規作成</legend>
  <div><?php echo $errorMessage ?></div>
  <label for="userid">ユーザID</label>
  <input type="text" id="userid" name="userid" value="<?php echo htmlspecialchars($_POST["userid"], ENT_QUOTES); ?>">
  <br>
  <label for="password">パスワード</label>
  <input type="password" id="password" name="password" value="">
  <br>
  <input type="submit" id="create" name="create" value="新規作成">
  </fieldset>
  </form>
  </body>
</html>