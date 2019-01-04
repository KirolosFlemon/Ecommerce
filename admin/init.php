<?php

include 'connect.php';

$tpl='include/templete/'; //templete dirctoey
$lang='include/langouge/'; //Langouge dirctoey
$func='include/function/'; //function dirctory
$js='layout/js/'; //js dirctoey
$css='layout/css/'; //css dirctoey

// Include Important Files
include $func .'function.php';
include $lang .'english.php';
include $tpl . 'head.inc';
// Include Nav on All Pages Expect the one With noNav vairable
if (!isset($noNav)){
include $tpl . 'nav.inc';
}

