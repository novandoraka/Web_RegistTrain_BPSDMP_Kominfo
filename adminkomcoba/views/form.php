<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        	<main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"></li>
                            <li class="breadcrumb-item active">Form tambah data</li>
                    	</ol>
                </div> 
                <div class="container-fluid px-4">
                    <form action="models/data.php?aksi=tambah" method="post" enctype="multipart/form-data">
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
            </main>
    </div>
</div>