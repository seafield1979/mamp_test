<?php
header("Content-type: text/plain; charset=UTF-8");

function show_cookie()
{
  foreach ($_COOKIE as $key=>$value) {
    echo "key=${key} value=${value} <br>";
  }
}

function add_cookie()
{
  $date_str = date("Y/m/d_H:i:s");
  setcookie( "hoge_${date_str}", $date_str, time() + (30*(24*60*60)));
  echo "key=hoge_${date_str} value=${date_str}";
}

function delete_cookie()
{
  foreach ($_COOKIE as $key=>$value) {
    //echo "key=${key} value=${value} <br>";
    setcookie( $key, "", time()-10000);
  }
  echo "削除";
}

// ajaxからのリクエストかどうかをチェック
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{  
    if (isset($_POST['test_no']))
    {
      switch (intval($_POST['test_no'])) {
        case 1:
          // Cookieを表示する
          show_cookie();
          break;
        case 2:
          // Cookieを追加する
          add_cookie();
          break;
        case 3:
          // Cookieを削除する
          delete_cookie();
          break;
      }
    }
    else
    {
        echo 'The parameter of "request" is not found.';
    }
}
?>