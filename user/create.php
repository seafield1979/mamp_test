<?php
  $username = $_GET["username"];
  $password = $_GET["password"];
  // echo "username=${username}<br>";
  // echo "password=${password}<br>";
  
  // すでにユーザー名のユーザーが存在していたら「ユーザーが存在しています」エラー
  // ２つのパスワードが異なるなら「パスワードが異なります」エラー
  // ユーザー名、パスワードが不正なら「正しいユーザー名を入力してください」エラー


  // 全て英数半角文字かどうかをチェック
  function check_half_chara($str) {
    if (preg_match("/^[a-zA-Z0-9]+$/", $str)) {
      return true;
    } else {
      return false;
    }   
  }

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

  // ユーザー名、パスワードが正しいかどうかをチェックする
  function check_input($username, $password)
  {
    if (! check_half_chara($username)) {
      echo "ユーザー名が不正です";
      exit(1);
    }
    if (! check_half_chara($password)) {
      echo "パスワードが不正です";
      exit(1);
    }

    return true;
  }


  // ユーザー名のユーザーが存在しているかどうかを判定する
  function check_user_exist($username) 
  {
    $mysqli = connect_db();

    $success = true;
    // 完成済みのSELECT文を実行する
    $sql = "SELECT * FROM users WHERE user_name=\"${username}\"";
    if ($result = $mysqli->query($sql)) {
        if ($result->num_rows > 0) {
          $success = false;
        }
        // 結果セットを閉じる
        $result->close();
    }

    // DB接続を閉じる
    $mysqli->close();

    return $success;
  }

  // ユーザー作成
  function create_user($username, $password) 
  {
    $mysqli = connect_db();

    $success = false;
    // 完成済みのSELECT文を実行する
    $time = date("Y-m-d H:i:d");
    $sql = "INSERT INTO users (user_name, password, create_datetime) VALUES (\"${username}\",\"${password}\",\"${time}\")";
    if ($result = $mysqli->query($sql)) {
        $success = true;
        create_user_cookie($username);
    }

    // DB接続を閉じる
    $mysqli->close();

    return $success;
  }

  if (false == check_input($username, $password)){
    echo "ユーザー名かパスワードが不正です";
    exit();
  }

  if (! check_user_exist($username)){
    echo "ユーザーが存在しています";
    exit();
  }

  if (true == create_user($username, $password)) {
    // リダイレクト
    header('location: user_home.html');
  }
  else {
    echo "ユーザーが作成できませんでした。";
  }
?>