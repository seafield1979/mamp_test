<?php
// show_record.php
// ajax経由で呼び出されるPHP。データベース(test)のレコードを取得して返す
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

    // 完成済みのSELECT文を実行する
    $sql = "SELECT id, name, comment FROM users";
    if ($result = $mysqli->query($sql)) {
        // 連想配列を取得
        while ($row = $result->fetch_assoc()) {
            echo $row["id"] . " : " . $row["name"] . " : " . $row["comment"] . "<br>";
        }
        // 結果セットを閉じる
        $result->close();
    }

    // DB接続を閉じる
    $mysqli->close();
}
?>