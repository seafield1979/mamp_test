<?php

// Smartyをインクルード フォルダは自分でSmartyのlibs以下を配置した場所を指定
require_once 'smarty/Smarty.class.php';

// Smartyインスタンスを生成
$smarty = new Smarty();

// Smartyは展開時にファイルを生成するのでその場所を指定する
$smarty->template_dir = 'templates/';
$smarty->compile_dir  = 'templates_c/';
$smarty->config_dir   = 'config/configs/';
$smarty->cache_dir    = 'config/cache/';


// Smartyに変数を渡す
$smarty->assign('test1', 'テスト1です。');
$smarty->assign('test2', 'テスト2です。');
$smarty->assign('test3', 'テスト3です。');

// Smartyに配列を渡す
$array = array(1,2,3,4,5);
$smarty->assign('array1', $array);

$array2 = array("key1"=>"hoge", "key2"=>"hage", "key3"=>"noho");
$smarty->assign('array2', $array2);

// オブジェクト
class Fruit{
  public $name;
  public $price;

  function __construct($name, $price){
    $this->name = $name;
    $this->price = $price;
  }

  public function getPrice(){
    return $this->price;
  }
  public function info(){
    return $this->name . "=" . $this->price;
  }
}
$fruit = new Fruit("Apple", 80);
$smarty->assign("fruit", $fruit);

// 修飾子
$smarty->assign("hogeL", "hogehoge");
$smarty->assign("hogeU", "HOGEHOGE");
$smarty->assign("spaceText", "hoge
  hoge
  hoge");
$smarty->assign("longText","aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");

// truncate 文字切り捨て
$smarty->assign("truncate1", "hoge1234567890");

// indent インデントを挿入する
$smarty->assign("indent1", "hogehoge");
$smarty->assign("indent2", "hogehoge
  hogehoge2
  hogehoge3");



// wordwrap
$smarty->assign("wordwrap1", "0123456789 0123456789 0123456789 0123456789 0123456789 0123456789 0123456789");

// cat
$smarty->assign("cat1", "Shutaro");

// replace
$smarty->assign("replace1", "この hoge 野郎!!");

// if文



// string_format
$smarty->assign("format1", "1234568");


$smarty->display('smarty_test.tpl');


?>