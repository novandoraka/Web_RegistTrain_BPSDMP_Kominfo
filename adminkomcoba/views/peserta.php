<!-- <?php
		include 'koneksi.php';
		?> -->

<head>
	<!-- <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> -->
</head>

<body>
	<div id="layoutSidenav">
		<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid px-4">
					<h1 class="mt-4">Dashboard</h1>
					<ol class="breadcrumb mb-4">
						<li class="breadcrumb-item"></li>
						<li class="breadcrumb-item active">Welcome Back</li>
					</ol>
					<div class="card-header">
						<form method="post" action="views/export.php">
							<input type="submit" name="export" class="btn btn-success" value="Export Excel" />
						</form>
					</div>
					<form action="" method="POST">
						<div class="form-group">
							<label for="sel1">Select list:</label>
							<select class="form-select" name="pelatihan">
								<option value="0">Pilih Pelatihan</option>
								<?php
								include "koneksi.php";
								//Perintah sql untuk menampilkan semua data pada tabel jurusan
								$sql = "select * from pelatihan";

								$hasil = mysqli_query($koneksi, $sql);
								$no = 0;
								while ($data = mysqli_fetch_array($hasil)) {
									$no++;

									$ket = "";
									if (isset($_POST['pelatihan'])) {
										$jurusan = trim($_POST['pelatihan']);

										if ($jurusan == $data['id_pelatihan']) {
											$ket = "selected";
										}
									}
								?>
									<option <?php echo $ket; ?> value="<?php echo $data['id_pelatihan']; ?>"><?php echo $data['judul']; ?></option>
								<?php
								}
								?>
								<span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
							</select>
						</div><br>
						<div class="form-group">
							<input type="submit" class="btn btn-info" value="Pilih">
						</div>
					</form>

					<div class="card-body">
						<table id="datatablesSimple" class="table">
							<br>
							<thead class="table-dark">
								<tr>
									<th>No</th>
									<th>nama</th>
									<th>notelp</th>
									<th>email</th>
									<th>Gender</th>
									<th>profesi</th>
									<th>instansi</th>
									<th>Pelatihan</th>

								</tr>
							</thead>
							<?php


							if (isset($_POST['pelatihan'])) {
								$pelatihan = trim($_POST['pelatihan']);
								$sql = "SELECT peserta.id_peserta, peserta.nama, peserta.notelp, peserta.email,peserta.jkel, peserta.profesi, peserta.instansi, pelatihan.judul FROM pelatihan INNER JOIN peserta ON pelatihan.id_pelatihan=peserta.id_pelatihan WHERE pelatihan.id_pelatihan='$pelatihan' ORDER BY peserta.nama asc ";
							} else {
								$sql = "SELECT peserta.id_peserta, peserta.nama, peserta.notelp, peserta.email,peserta.jkel, peserta.profesi, peserta.instansi, pelatihan.judul FROM pelatihan INNER JOIN peserta ON pelatihan.id_pelatihan=peserta.id_pelatihan ORDER BY peserta.nama asc limit 10";
							}


							$hasil = mysqli_query($koneksi, $sql);
							$no = 0;
							while ($data = mysqli_fetch_array($hasil)) {
								$no++;

							?>
								<tbody>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $data['nama']; ?></td>
										<td><?php echo $data['notelp']; ?></td>
										<td><?php echo $data['email']; ?></td>
										<td><?php echo $data['jkel']; ?></td>
										<td><?php echo $data['profesi']; ?></td>
										<td><?php echo $data['instansi']; ?></td>
										<td><?php echo $data['judul']; ?></td>
									</tr>
								</tbody>
							<?php
							}
							?>
						</table>
						<!-- <script>
							$(document).ready(function() {
								$('#tabel-data').DataTable();
							});
						</script> -->
					</div>
				</div>
			</main>
		</div>
	</div>
</body>