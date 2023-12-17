<div class="nilai-container">
	<style>
		.breadcrumb li a {
			text-decoration: none;
			font-size: large;
		}
	</style>
	<ol class="breadcrumb">
		<li><a href="<?= BASEURL ?>/dashboard">Dashboard</a> /</li>
		<li class="active"><a href="<?= BASEURL ?>/dashboard/lihat?npm=<?= $_GET["npm"] ?>">View DNS</a> /</li>
		<li class="active">Input Nilai</li>
	</ol>

	<h3>Pengisian Data Nilai Mahasiswa</h3>
	<p>
	<h6>Informasi Penting !</h6>
	Indeks nilai mahasiswa adalah dengan aturan predikat : <b> A < 85; B < 65; C < 50; D < 30; E> 20; </b>
	</p>
	<table id="#" class="table table-striped table-bordered" cellspacing="0" width="90%">
		<thead>
			<tr>
				<th scope="col">Kode MK</th>
				<th scope="col">Nama Mata Kuliah</th>
				<th scope="col">SKS</th>
				<th scope="col">Nilai</th>
				<th scope="col">Ket</th>
			</tr>
		</thead>
		<tbody>
			<?php if (!(is_null($model["data"]))) : ?>
				<form action="<?= BASEURL ?>/dashboard/input/doInput?npm=<?= $_GET["npm"] ?>" method="POST" id="formNilai">
					<?php foreach ($model["data"] as $data) : ?>
						<tr>
							<td><?= $data["kode_mk"] ?></td>
							<td><?= $data["nama_mk"] ?></td>
							<td><?= $data["sks"] ?></td>
							<td>
								<select name="<?= $data["kode_mk"] ?>" <?= $data['nilai'] !== null ? 'disabled' : false ?> required>
									<option></option>
									<?php foreach ($model["option"] as $option) : ?>
										<option <?= ($data['nilai'] ?? null) == $option ? 'selected' : false ?> value="<?= $option ?>"><?= $option ?></option>
									<?php endforeach; ?>
								</select>
							</td>
							<td>
								<input class="text-white <?= $data["status"] == "" ? false : ($data["status"] == "Lulus" ?  "bg-success" : ($data["status"] == "Mengulang" ? "bg-warning" : "bg-danger")) ?>" type="text" value="<?= $data['status'] ?? null ?>" readonly data-id="<?= $data["kode_mk"] ?>">
							</td>
						</tr>
					<?php endforeach; ?>
				</form>
			<?php endif; ?>
		</tbody>
	</table>
	<?php foreach ($model["data"] as $data) : ?>
		<?php if ($data['nilai'] == null) : ?>
			<input type="submit" form="formNilai" class="btn btn-primary" value="Submit Nilai">
		<?php break;
		endif; ?>
	<?php endforeach; ?>
</div>