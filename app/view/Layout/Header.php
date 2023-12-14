<?php

use Tugas\core\Route; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard <?= $model["title"] ?? false ?></title>
    <link rel="shortcut icon" href="/assets/image/logo-uniyap.webp" type="image/x-icon">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <link href="<?= BASEURL ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/assets/css/jquery.dataTables.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/css/style.css">
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