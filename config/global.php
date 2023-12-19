<?php

use Tugas\core\Route;


$uri = $_SERVER["REQUEST_URI"];


if (!Route::is('/')) {

    $uri = strstr($uri, "/dashboard", true);
}

if (isset($_GET["search"])) {
    $uri = strstr($uri, "/?", true);
}
$uri = "http://" . $_SERVER["HTTP_HOST"] . $uri;

$uri = rtrim($uri, '/');

define("BASEURL", $uri);
