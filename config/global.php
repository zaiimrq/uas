<?php





$dic = explode("\\", __DIR__);
array_pop($dic);
$dic = end($dic);


$uri = 'http://' . $_SERVER["HTTP_HOST"] . "/$dic";

if ($_SERVER["HTTP_HOST"] == 'uas.test' || $_SERVER["SERVER_PORT"] !== "80") {

    $uri = 'http://' . $_SERVER["HTTP_HOST"];
}



define("BASEURL", $uri);
