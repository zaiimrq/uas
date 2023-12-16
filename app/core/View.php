<?php

namespace Tugas\core;

class View
{
    public static function render(string $path, $model = []): void
    {
        require_once __DIR__ . '/../view/Layout/Header.php';
        require_once __DIR__ . '/../view/' . $path . '.php';
        require_once __DIR__ . '/../view/Layout/Footer.php';
    }

    public static function redirect(string $url): void
    {
        $url = BASEURL . $url;
        header("Location: $url");
        exit();
    }
}
