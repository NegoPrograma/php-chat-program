<?php
require_once __DIR__."./config.php";
require_once __DIR__."./autoload.php";
$core = new Core();

$core->run();
echo $_SERVER['PHP_SELF'];

?>