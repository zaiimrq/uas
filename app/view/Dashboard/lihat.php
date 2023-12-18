<div class="lihat-container">
	<style>
		.breadcrumb li a {
			text-decoration: none;
			font-size: large;
		}
	</style>
	<ol class="breadcrumb">
		<li><a href="<?= BASEURL ?>/dashboard">Dashboard</a> / </li>
		<li class="active">View DNS</li>
	</ol>

	<?php if (isset($_GET["npm"])) : ?>
		<?php if ($model['data'] !== null) : ?>
			<div class="mt-4 p-5 bg-light rounded">
				<h1>DAFTAR NILAI SEMESTER</h1>
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

				<table class="table table-striped table-bordered mt-3" cellspacing="0" width="90%" style="text-align:center;">
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
						<?php $status = false ?>
						<?php foreach ($model['data'][1] as $data) : ?>
							<?php if ($data['nilai'] !== null) : ?>
								<?php $status = true ?>

								<tr>

									<td scope="row"><?= $i++ ?></td>
									<td><?= $data["kode_mk"] ?></td>
									<td><?= $data["nama_mk"] ?></td>
									<td><?= $data["sks"] ?></td>
									<td><?= $data["nilai"] ?></td>
									<td><?= $data["status"] ?></td>
									<td>
										<a data-npm="<?= $_GET["npm"] ?>" data-mk="<?= $data['kode_mk'] ?>" data-bs-toggle="modal" data-bs-target="#updatemodal" class="btn btn-warning btnupdate">
											<img src="<?= BASEURL ?>/assets/image/edit.webp" style="width:20px;height:auto;">
										</a>
									</td>
									<td>
										<a data-npm="<?= $_GET["npm"] ?>" data-mk="<?= $data['kode_mk'] ?>" class="btn btn-danger btndelete">
											<img src="<?= BASEURL ?>/assets/image/delete.webp" style="width:20px;height:auto;">
										</a>
									</td>
								</tr>

							<?php endif; ?>

						<?php endforeach; ?>
						<?php if (!$status) : ?>
							<tr>
								<td colspan="8">Tidak Ada Data Ditemukan</td>
							</tr>
						<?php endif ?>

					</tbody>
				</table>

			<?php endif; ?>
		<?php endif; ?>
			</div>
</div>
<br>

<!-- Modal Update -->
<div class="modal fade" id="updatemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Update Nilai</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form method="POST">
					<label for="kode_mk">Kode Matakuliah</label>
					<input type="text" class="form-control" name="kode_mk" id="kode_mk" disabled>
					<label for="nama_mk">Nama Matakuliah</label>
					<input type="text" class="form-control" name="nama_mk" id="nama_mk" disabled>
					<label for="sks">SKS</label>
					<input type="text" class="form-control" name="sks" id="sks" disabled>
					<label for="nilai">Nilai</label>
					<select class="form-control option-modal" name="nilai">
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="C">C</option>
						<option value="D">D</option>
						<option value="E">E</option>
					</select>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
			</form>
		</div>
	</div>
</div>