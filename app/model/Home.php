<?php


namespace Tugas\model;

use PDO;
use Tugas\database\Database;

class Home
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function findDns($npm)
    {

        $statement = $this->pdo->prepare("SELECT npm, nama FROM tb_mhs WHERE npm = ?");
        $statement->execute([$npm]);

        try {
            if ($mhs = $statement->fetch(PDO::FETCH_ASSOC)) {

                $this->pdo->beginTransaction();

                $statement = $this->pdo->prepare("SELECT tb_matkul.kode_mk, tb_matkul.nama_mk, tb_matkul.sks, tb_dns.nilai, CASE WHEN nilai IN ('A', 'B', 'C', 'D') THEN 'L' WHEN nilai = 'E' THEN 'TL' ELSE '' END AS status FROM tb_matkul LEFT JOIN tb_dns ON tb_dns.kode_mk = tb_matkul.kode_mk JOIN tb_mhs ON tb_mhs.npm = ? WHERE tb_matkul.kode_jurusan = tb_mhs.kode_jurusan");
                $statement->execute([$npm]);

                $sks = $this->pdo->prepare("SELECT SUM(tb_matkul.sks) as total_sks FROM tb_matkul JOIN tb_mhs ON tb_matkul.kode_jurusan = tb_mhs.kode_jurusan WHERE tb_mhs.npm = ?");
                $sks->execute([$npm]);

                $total_sks =  $sks->fetch(PDO::FETCH_ASSOC);

                $sks_nilai = $this->pdo->prepare("SELECT tb_matkul.sks * CASE WHEN tb_dns.nilai = 'A' THEN 4 WHEN tb_dns.nilai = 'B' THEN 3 WHEN tb_dns.nilai = 'C' THEN 2 WHEN tb_dns.nilai = 'D' THEN 1 ELSE 0 END AS sks_nilai FROM tb_dns JOIN tb_matkul ON tb_dns.kode_mk = tb_matkul.kode_mk WHERE tb_dns.npm = ? ");

                $sks_nilai->execute([$npm]);

                $sks_nilai = $sks_nilai->fetchAll(PDO::FETCH_ASSOC);

                $this->pdo->commit();
                if ($dns = $statement->fetchAll(PDO::FETCH_ASSOC)) {

                    return [
                        $mhs,
                        $dns,
                        $total_sks,
                        $sks_nilai
                    ];
                }
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }
}
