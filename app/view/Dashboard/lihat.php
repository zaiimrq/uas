<div class="lihat-container">

	<ol class="breadcrumb">
		<li><a href="<?= BASEURL ?>/dashboard">Dashboard</a> / </li>
		<li class="active">View DNS</li>
	</ol>


	<?php if (isset($_GET["npm"])) : ?>
		<?php if ($model['data'] !== null) : ?>

			<div class="mt-4 p-5 bg-light rounded">
				<h1>DAFTAR NILAI SEMESTER</h1>
				<!-- <p>No DNS : <?= $model["data"][0]["id_dns"] ?></p> -->
				<p>Tahun Ajaran : 2023 - Ganjil</p>
				<hr>
				<b>
					<p>NAMA MAHASISWA : <?= $model["data"][0]["nama"] ?></p>
					<p>N.P.M : <?= $model["data"][0]["npm"] ?></p>
					<p>JURUSAN : <?= $model["data"][0]["jurusan"] ?></p>
				</b>
				<div class="d-flex justify-content-end">
					<a href="<?= BASEURL ?>/dashboard/input?npm=<?= $model["data"][0]["npm"] ?>&jurusan=<?= $model["data"][0]["kode_jurusan"] ?>" class="btn btn-success"><b>INPUT NILAI</b></a>
				</div>

				<table id="" class="table table-striped table-bordered mt-3" cellspacing="0" width="90%" style="text-align:center;">
					<thead>
						<tr>
							<th scope="col">NO</th>
							<th scope="col">KODE M.K</th>
							<th scope="col">NAMA MATAKULIAH</th>
							<th scope="col">SKS</th>
							<th scope="col">N.A</th>
							<th scope="col">KET</th>
							<th scope="col" colspan="2">AKSI</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($model['data'][1] as $data) : ?>
							<?php if ($data['nilai'] !== null) : ?>

								<tr>

									<td scope="row"><?= $i++ ?></td>
									<td><?= $data["kode_mk"] ?></td>
									<td><?= $data["nama_mk"] ?></td>
									<td><?= $data["sks"] ?></td>
									<td><?= $data["nilai"] ?></td>
									<td><?= $data["status"] ?></td>
									<td><button class="btn btn-warning"><img src="<?= BASEURL ?>/assets/image/edit.png" style="width:20px;height:auto;"></button></td>
									<td><button class="btn btn-danger"><img src="<?= BASEURL ?>/assets/image/delete.png" style="width:20px;height:auto;"></button></td>
								</tr>
							<?php else : ?>
								<tr>
									<td colspan="8">Tidak Ada Data Ditemukan</td>
								</tr>
							<?php
								break;
							endif;
							?>

						<?php endforeach; ?>
					</tbody>
				</table>

			<?php endif; ?>
		<?php endif; ?>
			</div>
</div>
<br>