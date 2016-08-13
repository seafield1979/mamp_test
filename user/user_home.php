<?php
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8" />
<title>ホーム</title>

<!-- 外部cssファイルをロード -->
<link href="user.css" rel="stylesheet" type="text/css" />

<!-- ページ内にcssを記述 -->
<style type="text/css">

</style>


<!--
  JavaScriptのソース
-->
<script type="text/javascript">
  // jsロード後に実行される処理
  (function(){
    
  })();

  // DOMロード後に実行される処理
  // ウェブ上のあらゆるオブジェクトの読み込みがすべて完了した後で処理をする方法
  window.onload = function() {
  	// document.write("html is loaded complete!!")
  }
</script>

</head>

<body> 
<!-- ここにhtmlの本体を記述する -->
<h1>ユーザーホーム</h1>

<table>
  <tr>
    <td>ユーザー名</td>
    <td>コメント</td>
  </tr>
  <tr>
    <td>---</td>
    <td>---</td>
  </tr>  
</table>

<!-- 送信ボタンを押すと form_api.php に GETメッセージが送られる -->
<a href="user_edit.html" class="button">編集</a>
<a href="user_delete.html" class="button">削除</a>
<a href="logout.php" class="button">ログアウト</a>


</body>
</html>
?>