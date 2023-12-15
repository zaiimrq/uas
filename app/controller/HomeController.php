<?php


namespace Tugas\controller;

use Tugas\core\View;
use Tugas\model\Home;


class HomeController
{
    private $model;
    public function __construct()
    {
        $this->model = new Home;
    }
    public function index()
    {
        View::render("Home/index");
    }
    public function search()
    {
        $data = $this->model->findDns($_POST);
        View::render("Home/index", [
            "title" => "| DNS",
            "data" => $data
        ]);
    }
}
