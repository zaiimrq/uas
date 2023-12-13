<div class="nilai-container">

	<ol class="breadcrumb">
		<li><a href="<?= BASEURL ?>/dashboard">Dashboard</a> / </li>
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
				<?php foreach ($model["data"] as $data) : ?>
					<tr>
						<form action="<?= BASEURL ?>/dashboard/input/doInput?npm=<?= $_GET["npm"] ?>" method="POST">
							<td><?= $data["kode_mk"] ?></td>
							<td><?= $data["nama_mk"] ?></td>
							<td><?= $data["sks"] ?></td>
							<td>
								<select name="<?= $data["kode_mk"] ?>" data-mk="<?= $data["kode_mk"] ?>">
									<option></option>
									<option value="A">A</option>
									<option value="B">B</option>
									<option value="C">C</option>
									<option value="D">D</option>
									<option value="E">E</option>
								</select>
							</td>
							<td>
								<?php foreach ($model["check"] as $key => $value) : ?>
									<?php if ($key == $data["kode_mk"]) : ?>
										<input type="text" value="<?= $value[1] ?>" readonly data-id="<?= $data["kode_mk"] ?>">
									<?php endif; ?>
								<?php endforeach; ?>
							</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
	<input type="submit" class="btn btn-primary" value="Submit Nilai">
	</form>
</div>