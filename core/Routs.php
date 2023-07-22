<?php

require_once('../core/controller/Main.php');

$routs = [
    // MAIN 
    ReqPrimary => 'main@home',
];

// STANDARD
$endpoint = ReqPrimary;

if (isset($_GET[RefPrimary])) {
    if (key_exists($_GET[RefPrimary], $routs)) {
        $endpoint = $_GET[RefPrimary];
    } else {
        $endpoint = ReqPrimary;
    }
}

use core\controller;
use core\controller\Main;

// HANDLE THE ROUTE DEFINITION
$part = explode('@', $routs[$endpoint]);

$controllers = 'core\\controller\\' .  ucfirst($part[0]);
$method = ucfirst($part[1]);

$ctr = new $controllers();
$ctr->$method();

?>