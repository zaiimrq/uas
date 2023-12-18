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

    public function input($data)
    {


        try {

            $query = "SELECT tb_matkul.kode_mk, tb_matkul.nama_mk, tb_matkul.sks, tb_dns.nilai, 
                        CASE 
                            WHEN nilai IN ('A', 'B', 'C') THEN 'Lulus'
                            WHEN nilai = 'D' THEN 'Mengulang'
                            WHEN nilai = 'E' THEN 'Tidak Lulus'
                        END AS status
                        FROM tb_matkul LEFT JOIN tb_dns ON tb_matkul.kode_mk = tb_dns.kode_mk
                                            JOIN tb_mhs ON tb_mhs.kode_jurusan = tb_matkul.kode_jurusan
                        WHERE tb_matkul.kode_jurusan = ? AND tb_mhs.npm = ?";

            $statement = $this->pdo->prepare($query);
            $statement->execute([
                $data["jurusan"],
                $data["npm"]
            ]);
            return $statement->fetchAll(PDO::FETCH_ASSOC) ?? null;
        } finally {
            $statement->closeCursor();
        }
    }
    public function inputNilai($npm, $data): bool
    {

        $this->pdo->beginTransaction();
        foreach ($data as $mk => $nilai) {

            $statement = $this->pdo->prepare("INSERT INTO tb_dns(npm, kode_mk, nilai) VALUES(?, ?, ?)");
            $statement->execute([
                $npm,
                $mk,
                $nilai
            ]);
        }

        $this->pdo->commit();

        return true;
    }

    public function lihat($npm)
    {

        $statement = $this->pdo->prepare("SELECT tb_mhs.npm, tb_mhs.nama, tb_jurusan.nama_jurusan AS jurusan, tb_jurusan.kode_jurusan FROM tb_mhs JOIN tb_jurusan ON tb_jurusan.kode_jurusan = tb_mhs.kode_jurusan WHERE npm = ?");
        $statement->execute([$npm]);

        try {
            if ($mhs = $statement->fetch(PDO::FETCH_ASSOC)) {

                $this->pdo->beginTransaction();

                $statement = $this->pdo->prepare("SELECT tb_matkul.kode_mk, tb_matkul.nama_mk, tb_matkul.sks, tb_dns.nilai, CASE WHEN nilai IN ('A', 'B', 'C', 'D') THEN 'L' WHEN nilai = 'E' THEN 'TL' ELSE '' END AS status FROM tb_matkul LEFT JOIN tb_dns ON tb_dns.kode_mk = tb_matkul.kode_mk JOIN tb_mhs ON tb_mhs.npm = ? WHERE tb_matkul.kode_jurusan = tb_mhs.kode_jurusan");
                $statement->execute([$npm]);

                $this->pdo->commit();
                if ($dns = $statement->fetchAll(PDO::FETCH_ASSOC)) {


                    return [
                        $mhs,
                        $dns,
                    ];
                }
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function lihatDelete(array $data)
    {
        $statement = $this->pdo->prepare("DELETE FROM tb_dns WHERE npm = ? AND kode_mk = ?");
        return $statement->execute([
            $data['npm'],
            $data['mk']
        ]);
    }

    public function lihatUpdate($data)
    {


        try {
            $statement = $this->pdo->prepare("SELECT tb_matkul.kode_mk, tb_matkul.nama_mk, tb_matkul.sks, tb_dns.nilai FROM tb_matkul JOIN tb_dns ON tb_dns.kode_mk = tb_matkul.kode_mk WHERE tb_dns.npm = ? AND tb_dns.kode_mk = ?");
            $statement->execute([
                $data["npm"],
                $data["mk"]
            ]);
            return $statement->fetch(PDO::FETCH_ASSOC);
        } finally {
            $statement->closeCursor();
        }
    }

    public function doUpdate($data, $nilai): bool
    {

        $statement = $this->pdo->prepare("UPDATE tb_dns SET nilai = ? WHERE npm = ? AND kode_mk = ?");

        return $statement->execute([
            $nilai,
            $data['npm'],
            $data['mk']
        ]);
    }
}
