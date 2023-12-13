<?php


namespace Tugas\controller;

use Tugas\core\View;


class HomeController
{
    public function index()
    {
        View::render("Home/index");
    }
}
