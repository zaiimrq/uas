<?php


namespace Tugas\controller;

use Tugas\core\View;


class HomeController
{
    public function index()
    {
        View::render("Home/index");
    }
    public function search()
    {
        $data = $this->mahasiswa->findDns();
        View::render("Home/index", [
            "title" => "| DNS",
            "data" => $data
        ]);
    }
}
