<?php
header("Content-type: text/plain; charset=UTF-8");

// ajaxからのリクエストかどうかをチェック
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{  
    if (isset($_POST['param1']))
    {
        //ここに何かしらの処理を書く（DB登録やファイルへの書き込みなど）
        echo "OK! param1=" . $_POST['param1'];
    }
    else
    {
        echo 'The parameter of "request" is not found.';
    }
}
?>