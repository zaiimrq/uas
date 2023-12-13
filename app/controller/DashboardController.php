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
            "title" => "| DNS",
            "data" => $data
        ]);
    }

    public function input()
    {
        $data = $this->mahasiswa->inputNilaiDns($_GET);

        $check = $this->mahasiswa->checkStatusNilai($_GET);

        // $status[$check['kode_mk']] = $check['statua'];

        foreach ($check as $ck) {
            $status[$ck["kode_mk"]] = [$ck['nilai'], $ck["status"]];
        }

        // // var_dump($status);
        View::render("Dashboard/input", [
            "title" => "| Input Nilai",
            "data" => $data,
            "check" => $status
        ]);
    }

    public function doInput()
    {
        // var_dump($_POST);

        $doInput = $this->mahasiswa->inputNilai($_GET['npm'], $_POST);
        if ($doInput) {
            View::redirect("/dashboard");
        }

        // $status = $this->mahasiswa->checkStatusNilai($_GET);

        // echo json_encode($status);
    }

    public function checkStatusNilai()
    {

        // $status = $this->mahasiswa->checkStatusNilai($_GET);

        echo json_encode($_GET);

        // echo json_encode($status);
    }

    public function lihat()
    {
        View::render("Dashboard/lihat");
    }
}
