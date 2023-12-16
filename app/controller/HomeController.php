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
        $data = $this->model->findDns($_GET['search'] ?? '');
        View::render("Home/index", [
            "title" => "Home | Search DNS Online",
            "data" => $data
        ]);
    }
}
