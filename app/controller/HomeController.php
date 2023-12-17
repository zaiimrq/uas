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
        if (isset($_GET["search"]) && $_GET["search"] !== '') {
            $data = $this->model->findDns($_GET['search']);

            foreach ($data[3] ?? [] as $item) {
                $sks_nilai[] = $item['sks_nilai'];
                unset($data[3]);
                $data[3]['ips'] = array_sum($sks_nilai) / $data[2]['total_sks'];
            }
        }

        View::render("Home/index", [
            "title" => "Home | Search DNS Online",
            "data" => $data ?? null
        ]);
    }
}
