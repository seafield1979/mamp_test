{config_load file="sample.config" section="Saitama"}

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>サンプル</title>
</head>
<body>
<ul>変数  
  <li>{$test1}</li>
  <li>{$test2}</li>
  <li>{$test3}</li>
</ul>
<ul>配列  
  <li>{$array1[0]}</li>
  <li>{$array1[1]}</li>
  <li>{$array1[2]}</li>
</ul>
<ul>連想配列
  <li>{$array2.key1}</li>
  <li>{$array2.key2}</li>
  <li>{$array2["key3"]}</li>
</ul>
<ul>
  <li>{$fruit->name}</li>
  <li>{$fruit->price}</li>
  <li>{$fruit->getPrice()}</li>
  <li>{$fruit->info()}</li>
</ul>
<ul> 設定ファイル
  <li>{#hoge1#}</li>
  <li>{$smarty.config.hoge1}</li>
  <li>{#hoge2#}</li>
</ul>
<ul> 設定ファイル(セクション)
  <li>{#hogel#}</li>
  <li>{$smarty.config.hogel}</li>
  <li>{#url#}</li>
</ul>
<ul> 予約変数11
  <li>{$smarty.now|date_format:'%Y/%m/%d %H:%M:%S'}</li>
  <li>{$smarty.version}</li>
  <li>{$smarty.template}</li>
</ul>

<h3>if文</h3>
  

<ul> 修飾子
  <li>{$hogeU|lower}</li>
  <li>{$hogeL|upper}</li>
  <li>{$spaceText|strip}</li>
  <li>{$spaceText}</li>
  <li>{$spaceText|nl2br}</li>
  <li>{$longText|truncate:30:"zzz"}</li>
</ul>

<ul> truncate
  <li>{$truncate1|truncate:10}</li>
  <li>{$truncate1|truncate:10:"〜"}</li>
  <li>{$truncate1|truncate:10:"〜":true}</li>
  <li>{$truncate1|truncate:10:"〜":true:true}</li>
</ul>

<p>indent</p>
<pre>{$indent1|indent:3}</pre>
<pre>{$indent1|indent:3:"■"}</pre>
<pre>{$indent2|indent:3}</pre>

<ul> wordwrap
  <li>{$wordwrap1|wordwrap}</li>
  <li>{$wordwrap1|wordwrap:10}</li>
  <li>{$wordwrap1|wordwrap:10:"<br>"}</li>
</ul>

<ul> string_format
  <li>{$format1|string_format:"%03d"}</li>
  <li>{$format1|string_format:"%010d"}</li>
</ul>

<ur> cat
  <li>{$cat1|cat:"is good"}</li>
</ur>

<ur> replace
  <li>{$replace1|replace:"hoge":"hage"}</li>
</ur>

</body>
</html>