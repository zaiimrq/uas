<div class="tabel-container">
	<h3>Data Nilai Mahasiswa</h3>
	<table id="tbldns" class="table table-striped table-bordered" cellspacing="0">
		<thead>
			<tr>
				<th>No</th>
				<th>NPM</th>
				<th>Nama</th>
				<th>Jurusan</th>
				<th class="text-center">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			<?php foreach ($model["data"] as $mhs) : ?>
				<tr>
					<td><?= $i++ ?></td>
					<td><?= $mhs["npm"] ?></td>
					<td><?= $mhs["nama"] ?></td>
					<td><?= $mhs["jurusan"] ?></td>
					<td class="text-center">
						<a href="<?= BASEURL ?>/dashboard/input?npm=<?= $mhs["npm"] ?>&jurusan=<?= $mhs["kode_jurusan"] ?>"><button type="button" class="btn btn-warning"><img src="../img/sign-in.png" style="width:20px;height:auto;"> VIEW</button></a>
						<a href="<?= BASEURL ?>/dashboard/input?npm=<?= $mhs["npm"] ?>&jurusan=<?= $mhs["kode_jurusan"] ?>" class="btn btn-warning">Input</a>
						<a href="<?= BASEURL ?>/dashboard/lihat" class="btn btn-success">Lihat</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>