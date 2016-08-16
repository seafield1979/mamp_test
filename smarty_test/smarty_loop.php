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

$smarty->assign("title", "繰り返し");

$array1 = array(1,2,3,4,5);
$array2 = array("key1"=>"aaa", "key2"=>"bbb", "key3"=>"ccc", "key4"=>"ddd", "key5"=>"eee");
$array3 = null;

$smarty->assign("array1", $array1);
$smarty->assign("array2", $array2);

$smarty->assign("array3", $array3);


$smarty->display('smarty_loop.tpl');

?>