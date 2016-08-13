<?php
  $username = $_COOKIE["username"];

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

  // ユーザー名のクッキーを削除する
  function delete_user_cookie()
  {
    setcookie( "username", "", time()-1000);
  }

  // ユーザー削除
  function delete_user($username) 
  {
    $mysqli = connect_db();

    $success = false;
    // DELETE文
    $sql = "DELETE FROM users WHERE user_name=\"${username}\"";
    if ($result = $mysqli->query($sql)) {
        $success = true;
        delete_user_cookie();
    }

    // DB接続を閉じる
    $mysqli->close();

    return $success;
  }

  if (true == delete_user($username)) {
    // リダイレクト
    header('location: user_top.html');
  }
  else {
    echo "ユーザーが削除できませんでした。";
  }
?>