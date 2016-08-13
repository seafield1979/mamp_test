<?php
//  update_record.php
//  ajax経由で呼び出されるPHP。
//  testデータベースのusersテーブルのレコードを１件更新
// 
header("Content-type: text/plain; charset=UTF-8");

// ajaxからのリクエストかどうかをチェック
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{  
    // mysqliクラスのオブジェクトを作成
    $host = "localhost";
    $user = "root";
    $pass = "poco1979";
    $db = "test";
    $mysqli = new mysqli($host,$user,$pass,$db);
    
    if ($mysqli->connect_error) {
        echo $mysqli->connect_error;
        exit();
    } else {
        $mysqli->set_charset("utf8");
    }

    // レコード更新SQL
    date_default_timezone_set('Asia/Tokyo');    // タイムゾーンを設定しないとグリニッジ標準時間になる
    $date_str = date("Y/m/d H:i:s");

    $sql = 'UPDATE users SET comment="' . $date_str . '" ORDER BY id DESC LIMIT 1';
    if ($result = $mysqli->query($sql)) {
        echo $result ? "成功" : "失敗";
    }

    // DB接続を閉じる
    $mysqli->close();
}
?>