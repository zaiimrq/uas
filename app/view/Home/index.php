<!-- Header Section -->
<div class="header text-center">
    <div class="container">
        <button class="btn btn-warning "><a style="text-decoration:none; color:black;" href="<?= BASEURL ?>/dashboard">Dashboard Admin</a></button>
        <h1>Cek DNS Mahasiswa Online</h1>
        <p>Selamat datang Mahasiswa Universitas Yapis Papua !</p><br>
        <p>Masukkan NPM Anda untuk melihat Daftar Nilai Semester terkini</p>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="<?= BASEURL ?>" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" value="<?= $_GET["search"] ?? false ?>" class="form-control" placeholder="Masukkan NPM">
                        <button type="submit" class="btn btn-warning">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bagian DNS (Data Mahasiswa) -->
<?php if (isset($_GET["search"])) : ?>
    <?php if ($model['data'] !== null) : ?>
        <div class="dns-section">
            <div class="container">
                <h2>DAFTAR NILAI SEMESTER (DNS)</h2>
                <p>TAHUN AKADEMIK : 2023 - GANJIL</p>
                <p>JENJANG : STRATA - 1</p>
                <hr>
                <b>
                    <p>NAMA MAHASISWA : <?= $model["data"][0]["nama"] ?></p>
                    <p>N.P.M : <?= $model['data'][0]["npm"] ?></p>
                </b>


                <!-- Tabel DNS -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>KODE M.K</th>
                                <th>NAMA MATAKULIAH</th>
                                <th>SKS</th>
                                <th>N.A</th>
                                <th>KET</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($model['data'][1] as $data) : ?>
                                <tr>
                                    <td>1</td>
                                    <td><?= $data['kode_mk'] ?></td>
                                    <td><?= $data['nama_mk'] ?></td>
                                    <td><?= $data['sks'] ?></td>
                                    <td><?= $data['nilai'] ?></td>
                                    <td><?= $data['status'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Tabel SKS -->
                <p>Total SKS Kelulusan : 144 SKS</p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SKS DIAMBIL</th>
                                <th>SKS DIPEROLEH</th>
                                <th>IP.S</th>
                                <th>TOTAL SKS DIPEROLEH</th>
                                <th>IP.K</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $model['data'][2]['total_sks'] ?></td>
                                <td>21</td>
                                <td>4.00</td>
                                <td>40</td>
                                <td>4.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p>Beban SKS Semester Berikutnya : 24 SKS</p>
            </div>
        </div>
    <?php else : ?>
        <h1 class="h1 pt-4 text-danger" style="text-align: center;">Data Tidak Ditemukan !</h1>
    <?php endif; ?>
<?php endif; ?>

<!-- Features Section -->
<div class="features">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="feature-box">
                    <h3>Kemudahan Akses</h3>
                    <p>Kemudahan Akses Daftar Nilai Semester dimanapun dan kapanpun.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box">
                    <i class="bi bi-search"></i>
                    <h3>Kecepatan Pencarian</h3>
                    <p>Memberikan fasilitas pencarian berdasarkan NIM, memungkinkan mahasiswa untuk dengan cepat menemukan informasi nilai mereka tanpa harus menavigasi melalui berbagai platform.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box">
                    <i class="bi bi-clock"></i>
                    <h3>Real-Time Update</h3>
                    <p>Menyajikan informasi nilai secara langsung dan real-time, memastikan bahwa mahasiswa selalu mendapatkan informasi yang terkini dan akurat.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- quotes -->
<div class="quotes-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <blockquote class="blockquote">
                    <p class="mb-0"><i>"Pendidikan adalah senjata paling mematikan di dunia, karena dengan pendidikan, Anda dapat mengubah dunia."</i></p><br>
                    <footer class="blockquote-footer">Nelson Mandela</footer>
                </blockquote>
            </div>
        </div>
    </div>
</div>

<!-- contact section -->
<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="<?= BASEURL ?>/assets/image/vektor.svg" alt="Gambar">
            </div>
            <div class="col-md-6">
                <h2>Cek Nilai Anda Dengan Mudah</h2>
                <p>
                    Selamat datang di layanan cek nilai online kami. Segera temukan hasil studi Anda tanpa harus menunggu. Kami menyajikan informasi nilai secara instan, memberikan kemudahan akses di ujung jari Anda.
                </p>
                <p>
                    Dengan antarmuka yang ramah pengguna, Anda dapat dengan cepat melihat nilai Anda dan mendapatkan pemahaman yang lebih baik tentang progres akademik Anda. Bergabunglah dengan kami dan buat perjalanan akademik Anda lebih transparan dan terkini.
                </p>
                <p>
                    Segera manfaatkan layanan cek nilai online kami. Kami menyediakan cara yang efisien dan praktis untuk melihat pencapaian Anda. Tingkatkan pengalaman pendidikan Anda dengan informasi nilai yang akurat dan mudah diakses.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Footer Section -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center"><br><br>
                <h5>Platform Cek Nilai Online</h5>
                <h5>Universitas Yapis Papua</h5><br><br>
                <p>&copy; 2023 Uniyap-DNS. All rights reserved.</p>
            </div>
            <div class="col-md-6"><br>
                <h5>Contact Us</h5>
                <p>Email : @uniyap.ac.id <br>Tlp : 9066-2999-1238</p>
                <p>Alamat : Jl. Dr. Samratulangi <br>No. 11 Dok V Atas, Jayapura, Indonesia 99115.</p>
                <p></p>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<!-- <script src="<?= BASEURL ?>/assets/js/popper.min.js"></script>
    <script src="<?= BASEURL ?>/assets/js/bootstrap.min.js"></script>

</body>

</html> -->