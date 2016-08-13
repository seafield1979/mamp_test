<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8" />
<title>GETメッセージを表示する</title>

<!--
 ページ内にcssを記述 
-->
<style type="text/css">
   h1{color:#101010}
   .red{color:#ff0000;}
   .green{color:#00ff00;}
   .blue{color:#0000ff;}

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
<h1>GETメッセージを受け取るページ</h1>


<?php
  echo "<p>GETメッセージで送られたユーザー名:  ";
  echo "<strong>" . $_GET['username'] . "</strong></p>";

  echo "<p>GETメッセージで送られた生年月日:  ";
  echo "<strong>" . $_GET['birthday'] . "</strong></p>";
?>


</body>
</html>
