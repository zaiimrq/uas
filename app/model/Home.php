<?php


namespace Tugas\model;
use Tugas\database\Database;

class Home
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }
    
    public function findDns()
    {
        try {
            $statement = $this->pdo->prepare("SELECT tb_mhs.npm, tb_mhs.nama, tb_mhs.kode_jurusan, tb_jurusan.nama_jurusan AS jurusan
                                                FROM tb_mhs
                                                JOIN tb_jurusan ON tb_mhs.kode_jurusan = tb_jurusan.kode_jurusan WHERE tb_mhs.npm = $");
            $statement->execute();
            
            if ($row = $statement->fetchAll()) {
                return $row;
            }
        } finally {
            $statement->closeCursor();
        }
    }
}