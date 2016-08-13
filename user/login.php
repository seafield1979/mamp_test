<?php
  $username = $_GET["username"];
  $password = $_GET["password"];
  
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

  // ユーザー名のクッキーを作成する
  function create_user_cookie($username)
  {
    setcookie( "username", $username, time()+(30*(24*60*60)));
  }

  $mysqli = connect_db();

  $success = false;
  // 完成済みのSELECT文を実行する
  $sql = "SELECT * FROM users WHERE user_name=\"${username}\" AND password=\"${password}\"";
  if ($result = $mysqli->query($sql)) {
      if ($result->num_rows >= 1) {
        $success = true;
        // Cookieにログイン情報を保存する
        create_user_cookie($username);
      }
      
      // 結果セットを閉じる
      $result->close();
  }
  else {
    echo "ユーザー名:${username}<br>";
    echo "失敗<br>";
  }

  // DB接続を閉じる
  $mysqli->close();
  
  // リダイレクト
  if ($success == true) {
    header('location: user_home.html');
  }
  else {
    echo "ログインに失敗しました";
  }
?>