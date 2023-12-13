<?php

namespace Tugas\model;

use PDO;
use Tugas\database\Database;

class Mahasiswa
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function findAllMahasiswa()
    {
        try {
            $statement = $this->pdo->prepare("SELECT tb_mhs.npm, tb_mhs.nama, tb_mhs.kode_jurusan, tb_jurusan.nama_jurusan AS jurusan
                                                FROM tb_mhs
                                                JOIN tb_jurusan ON tb_mhs.kode_jurusan = tb_jurusan.kode_jurusan");
            $statement->execute();

            if ($row = $statement->fetchAll()) {
                return $row;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function inputNilaiDns(array $data)
    {
        $query = "SELECT tb_matkul.kode_mk, tb_matkul.nama_mk, tb_matkul.sks
                    FROM tb_matkul
                    WHERE tb_matkul.kode_jurusan = ?";
        try {
            $statement = $this->pdo->prepare($query);
            $statement->execute([$data["jurusan"]]);

            if ($row = $statement->fetchAll(PDO::FETCH_ASSOC)) {
                return $row;
            }
        } finally {
            $statement->closeCursor();
        }
    }
    public function inputNilai($npm, $data): bool
    {

        $this->pdo->beginTransaction();
        foreach ($data as $mk => $nilai) {

            $check = $this->pdo->prepare("SELECT kode_mk FROM tb_dns WHERE kode_mk = ? AND npm = ?");
            $check->execute([
                $mk,
                $npm
            ]);

            if ($row = $check->fetch()) {
                $statement = $this->pdo->prepare("UPDATE tb_dns SET nilai = ? WHERE kode_mk = ? AND npm = ?");
                $statement->execute([
                    $nilai,
                    $mk,
                    $npm
                ]);
            } else {
                $statement = $this->pdo->prepare("INSERT INTO tb_dns(npm, kode_mk, nilai) VALUES(?, ?, ?)");
                $statement->execute([
                    $npm,
                    $mk,
                    $nilai
                ]);
            }
        }

        $this->pdo->commit();

        return true;
    }

    public function checkStatusNilai($data)
    {
        $query = "SELECT kode_mk, nilai,
                    CASE 
                        WHEN nilai IN ('A', 'B', 'C') THEN 'Lulus'
                        ELSE 'Tidak Lulus'
                    END AS status
                    FROM tb_dns WHERE npm = ?";
        $statement = $this->pdo->prepare($query);
        $statement->execute([
            $data["npm"],
        ]);

        try {
            if ($row = $statement->fetchAll(PDO::FETCH_ASSOC)) {
                return $row;
            }
        } finally {
            $statement->closeCursor();
        }
    }
}
