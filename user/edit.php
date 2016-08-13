<?php
  $username = $_COOKIE["username"];
  $comment = $_GET["comment"];

  $comment = htmlspecialchars($comment);

  // データベースに接続する
  function connect_db()
  {
    // ログイン可能かチェック
    // ユーザー名＆パスワードでユーザーを探す
    // mysqliクラスのオブジェクトを作成
    $host = "localhost";
    $user = "root";
    $pass = "root";
    $db = "user_test";
    $mysqli = new mysqli($host,$user,$pass,$db);
    if ($mysqli->connect_error) {
        echo $mysqli->connect_error;
        exit();
    } else {
        $mysqli->set_charset("utf8");
    }

    return $mysqli;
  }

  // ユーザー情報更新
  function update_user($username, $comment) 
  { 
    $mysqli = connect_db();

    $success = false;
    // 完成済みのSELECT文を実行する
    $time = date("Y-m-d H:i:d");
    $sql = "UPDATE users SET comment=\"${comment}\",update_datetime=\"${time}\" WHERE user_name=\"${username}\"";
    if ($result = $mysqli->query($sql)) {
        $success = true;
    }

    // DB接続を閉じる
    $mysqli->close();

    return $success;
  }

  if (true == update_user($username, $comment)) {
    // リダイレクト
    header('location: user_home.html');
  }
  else {
    echo "ユーザーが作成できませんでした。";
  }
?>