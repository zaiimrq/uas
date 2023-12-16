<div class="tabel-container">
<button class="btn btn-warning "><a style="text-decoration:none; color:black;" href="<?= BASEURL ?>">Home</a></button>
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
						<a href="<?= BASEURL ?>/dashboard/lihat?npm=<?= $mhs["npm"] ?>"><button type="button" class="btn btn-warning"><img src="<?= BASEURL ?>/assets/image/sign-in.png" style="width:20px;height:auto;"> View</button></a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>