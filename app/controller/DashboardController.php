<?php

namespace Tugas\controller;

use Tugas\core\View;
use Tugas\model\Mahasiswa;

class DashboardController
{
    private Mahasiswa $mahasiswa;

    public function __construct()
    {
        $this->mahasiswa = new Mahasiswa;
    }
    public function index()
    {
        $data = $this->mahasiswa->findAllMahasiswa();
        View::render("Dashboard/index", [
            "title" => "Dashboard | DNS",
            "data" => $data
        ]);
    }

    public function input()
    {
        $data = $this->mahasiswa->input($_GET);
        $option = ['A', 'B', 'C', 'D', 'E'];

        View::render("Dashboard/input", [
            "title" => "Dashboard | Input Nilai",
            "data" => $data,
            "option" => $option
        ]);
    }

    public function doInput()
    {

        $doInput = $this->mahasiswa->inputNilai($_GET['npm'], $_POST);
        if ($doInput) {
            View::redirect("/dashboard");
        }
    }

    public function lihat()
    {
        View::render("Dashboard/lihat");
    }
}
