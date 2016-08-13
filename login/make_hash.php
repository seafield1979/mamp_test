<?php
if (isset($_POST["text1"])){
  $textSrc = $_POST["text1"];
  $textHashed = password_hash($textSrc, PASSWORD_DEFAULT);
}

if (isset($_POST["hash1"]) && isset($_POST["hash2"])) {
  $hash1 = $_POST["hash1"];
  $hash2 = $_POST["hash2"];
  if (password_verify($hash1, $hash2)) {
    $compare_result = "一致";
  }
  else {
    $compare_result = "不一致";
  }
}
?>

<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>ハッシュを作成する</title>

    <style type="text/css">
      form [type="text"] {
        width:100%;
      }
    </style>
  </head>
  <body>
  <h1>ハッシュを作成する</h1>
    <form action=""
      method="POST">
      <input type="text" class="text" name="text1"  placeholder="ハッシュ元"/ value=<?php echo "\"${textSrc}\";" ?>><br>
      <input type="text" class="text" name="hashed"  placeholder="ハッシュ済み" value=<?php echo "\"${textHashed}\";"  ?>/><br>
      
      <input class="button" type="submit">
    </form>
  <h1>ハッシュを比較する</h1>
    <form action=""
      method="POST">
      <input type="text" class="text" name="hash1"  placeholder="ハッシュ1"/ value=<?php echo "\"${hash1}\";"  ?> /><br>
      <input type="text" class="text" name="hash2"  placeholder="ハッシュ2" value=<?php echo "\"${hash2}\";"  ?> /><br>
      
      <input class="button" type="submit" value="比較">
    </form>
    <h3><?php echo "${compare_result}"; ?></h3>
  </body>
</html>

<?php
$password = "hoge";
echo $passwordHash;
?>