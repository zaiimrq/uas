<?php

use Tugas\core\Route;


$uri = $_SERVER["REQUEST_URI"];
$uri = rtrim($uri, "/");

if (!Route::is("/")) {

    $uri = strstr($uri, "/dashboard", true);
}
define("BASEURL", $uri);
