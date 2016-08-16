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

$smarty->assign("title", "if test");
$smarty->assign("if1", 1);

$smarty->display('smarty_if.tpl');

?>