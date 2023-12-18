<?php

namespace Tugas\controller;

use Tugas\core\Flasher;
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
        if (!(isset($_GET["npm"]) && $_GET["npm"] !== '') || !(isset($_GET["jurusan"]) && $_GET["jurusan"] !== '')) {
            View::redirect("/");
            exit;
        }
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

        $this->mahasiswa->inputNilai($_GET['npm'], $_POST);
        Flasher::setFlash("Selamat!", "Data berhasil diinput :)", "success");
        View::redirect("/dashboard/lihat?npm=" . $_GET["npm"]);
    }

    public function lihat()
    {
        if (!(isset($_GET["npm"]) && $_GET["npm"] !== '')) {
            View::redirect("/");
            exit;
        }
        $data = $this->mahasiswa->lihat($_GET['npm']);

        View::render("dashboard/lihat", [
            "title" => "Dashboard | Lihat Nilai",
            "data" => $data
        ]);
    }

    public function lihatDelete()
    {
        if ($this->mahasiswa->lihatDelete($_GET)) {
            View::redirect("/dashboard/lihat?npm=" . $_GET["npm"]);
        }
    }

    public function lihatUpdate()
    {
        $data = $this->mahasiswa->lihatUpdate($_GET);

        print json_encode($data);
    }

    public function doUpdate()
    {


        $this->mahasiswa->doUpdate($_GET, $_POST["nilai"]);
        Flasher::setFlash("Selamat!", "Data berhasil diubah :)", "success");
        View::redirect("/dashboard/lihat?npm=" . $_GET["npm"]);
    }
}
