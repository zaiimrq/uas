<?php

use Tugas\core\Route; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $model["title"] ?? false ?></title>
    <link rel="shortcut icon" href="<?= BASEURL ?>/assets/image/logo-uniyap.webp" type="image/x-icon">
    <link href="<?= BASEURL ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/assets/css/jquery.dataTables.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/css/sweetalert2.min.css">
    <style>
        .tabel-container,
        .nilai-container {
            margin: 2em;
        }

        .lihat-container {
            margin: 3em;
        }
    </style>
</head>

<body>
    <?php if (!Route::is('/')) : ?>
        <nav class="navbar navbar-expand-sm bg-success navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="<?= BASEURL ?>/assets/image/logo-uniyap.webp" alt="Logo Uniyap" style="width:40px;">
                    <b> &ensp; Aplikasi Input Penilaian Semester</b>
                </a>
            </div>
        </nav>
    <?php endif; ?>