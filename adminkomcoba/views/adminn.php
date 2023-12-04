<?php
include("models/koneksi.php");
?>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Daftar Admin</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"></li>
                    <li class="breadcrumb-item active">Tabel Admin</li>
                </ol>
                <!-- <select name="pelatihan" id="pelatihan">
 					<option value="">Sort pelatihan</option>
 					<?php
                        require_once 'models/m_admin.php';
                        $object = new modeladmin();
                        $object->setdata();
                        $datapeserta = $object->getdata();
                        foreach ($datapeserta as $key) {
                        ?>
 						<option value="<?php echo $key['id_pelatihan'] ?>"><?php echo $key['judul']; ?></option>
 					<?php
                        }
                        ?>
 				</select>
 				<span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span> -->


                <!-- <div class="card-header">
					<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#tambah">Tambah Pelatihan</button>

					<div id="tambah" class="modal fade" role="dialog">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Tambah Pelatihan Baru</h4>
									<button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">&times;</button>
								</div>
								<form action="views/data.php?aksi=tambah" method="post" enctype="multipart/form-data">
									<div class="modal-body">
										<div class="form-group">
											<label class="control-label" for="judul">Nama Pelatihan</label>
											<input type="text" name="judul" class="form-control" id="judul" required>
										</div>
										<div class="form-group">
											<label class="control-label" for="deskripsi">Deskripsi</label>
											<input type="text" name="deskripsi" class="form-control" id="deskripsi" required>
										</div>
										<div class="form-group">
											<label class="control-label" for="tglpel">Tanggal</label>
											<input type="date" name="tglpel" class="form-control" id="tglpel" required>
										</div>
										<div class="form-group">
											<label class="control-label" for="banner">Banner</label>
											<input type="file" name="banner" class="form-control" id="banner" required>
										</div>
									</div>
									<div class="modal-footer">
										<button type="reset" class="btn btn-danger">Reset</button>
										<button type="submit" name="submit" class="btn btn-success" value="Send">Send</button>
									</div>
								</form>
								
							</div>
						</div>
					</div>

				</div> -->
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>nama</th>
                            <th>email</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once 'models/m_admin.php';
                        $object = new modeladmin();
                        //$object->inputdata();
                        $no = 1;
                        $object->setdata();
                        $datapeserta = $object->getdata();
                        foreach ($datapeserta as $key) {

                        ?>
                            <tr>
                                <td><?php echo $no++ . "."; ?></td>
                                <td><?php echo $key['nama']; ?></td>
                                <td><?php echo $key['email']; ?></td>
                                <td><?php echo $key['statuss']; ?></td>
                                <td>
                                    <!-- <button class="btn btn-info btn-xs" type="button" data-bs-toggle="modal" data-bs-target="#mymodal<?php echo $key['id_pelatihan'] ?>"><i class="fa fa-edit" style="width: 19;"></i></button> -->
                                    <a class="btn btn-danger btn-xs" href="views/data3.php?aksi=hapus&id=<?php echo $key['id']; ?>"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <!-- <?php
                        require_once 'models/m_pelatihan.php';
                        $object = new modelpelatihan();
                        //$object->inputdata();
                        $no = 1;
                        $object->setdata();
                        $datapelatihan = $object->getdata();
                        foreach ($datapelatihan as $key) {

                        ?>
                    <div id="mymodal<?php echo $key['id_pelatihan'] ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Pelatihan</h4>
                                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                                </div>
                                <form action="views/data.php?aksi=ubah&id=<?php echo $key['id_pelatihan']; ?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label" for="judul">Nama Pelatihan</label>
                                            <input type="text" name="judul" class="form-control" id="judul" value="<?php echo $key['judul']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="deskripsi">Deskripsi</label>
                                            <input type="text" name="deskripsi" class="form-control" id="deskripsi" value="<?php echo $key['deskripsi']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="tglpel">Tanggal</label>
                                            <input type="date" name="tglpel" class="form-control" id="tglpel" value="<?php echo $key['tglpel']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="banner">Banner</label>
                                            <input type="file" name="banner" class="form-control" id="banner" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                        <button type="submit" name="submit" class="btn btn-success" value="Send">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
                        }
                ?> -->
            </div>
        </main>
    </div>
</div>