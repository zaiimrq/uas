<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/global.php';

use Tugas\controller\DashboardController;
use Tugas\controller\HomeController;
use Tugas\core\Route;



Route::add("GET", "/", [HomeController::class, 'index']);
Route::add("GET", "/dashboard", [DashboardController::class, 'index']);
Route::add("GET", "/dashboard/input", [DashboardController::class, 'input']);
Route::add("POST", "/dashboard/input/doInput", [DashboardController::class, 'doInput']);
Route::add("GET", "/dashboard/input/status", [DashboardController::class, 'checkStatusNilai']);
Route::add("GET", "/dashboard/lihat", [DashboardController::class, 'lihat']);
Route::run();
