<?php $koneksi = mysqli_connect("localhost", "root", "", "pelatihankominfo"); ?> <div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Send Sertifikat</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"></li>
                    <li class="breadcrumb-item active">Sertifikat</li>
                </ol>
                <!-- <div class="row mt-4">
                    <div class="col">
                        <div class="card bg-info text-white p-2">Pelatihan Pemrograman Web : <?php
                                                                                                $gunungrinjani = mysqli_query($koneksi, "select * from peserta where id_pelatihan='2'");
                                                                                                echo mysqli_num_rows($gunungrinjani);
                                                                                                ?></div>
                    </div>
                    <div class="col">
                        <div class="card bg-info text-white p-2">Pelatihan Desaign UI/UX : <?php
                                                                                            $gunungrinjani = mysqli_query($koneksi, "select * from peserta where id_pelatihan='3'");
                                                                                            echo mysqli_num_rows($gunungrinjani);
                                                                                            ?></div>
                    </div>
                    <div class="col">
                        <div class="card bg-info text-white p-2">Pelatihan Keamanan Cyber : <?php
                                                                                            $gunungrinjani = mysqli_query($koneksi, "select * from peserta where id_pelatihan='7'");
                                                                                            echo mysqli_num_rows($gunungrinjani);
                                                                                            ?></div>
                    </div>
                    <div class="col">
                        <div class="card bg-info text-white p-2">Pelatihan Jaringan Komputer : <?php
                                                                                                $gunungrinjani = mysqli_query($koneksi, "select * from peserta where id_pelatihan='8'");
                                                                                                echo mysqli_num_rows($gunungrinjani);
                                                                                                ?></div>
                    </div>

                </div> -->
                <center>
                    <form action="views/sendmail.php?aksi=tambah" method="POST" class="msg_container">
                        <h4>Compose Email</h4>
                        <p id="multi-responce"></p>
                        <div class="form-group">
                            <!-- <label for="pelatihan">Pelatihan :</label> -->

                            <select class="form-select mb-2  " aria-label=".form-select-lg example" name="pelatihan" id="pelatihan">
                                <option value="0">Kepada peserta</option>
                                <?php
                                $query_pelatihan = mysqli_query($koneksi, "SELECT pelatihan.judul, COUNT(*) AS total FROM pelatihan INNER JOIN peserta ON pelatihan.id_pelatihan=peserta.id_pelatihan GROUP BY pelatihan.id_pelatihan");
                                while ($a = mysqli_fetch_array($query_pelatihan)) {
                                ?>
                                    <option value="<?php echo $a['id_pelatihan'] ?>"><?php echo $a['judul']; ?> / <?php echo $a['total']; ?></option>
                                <?php
                                }
                                ?>
                            </select>


                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="floatingInput" name="subjek" placeholder="name@example.com">
                            <label for="floatingInput">Subjek</label>
                        </div>
                        <div class="form-floating mb-2">
                            <textarea class="form-control" placeholder="Leave a comment here" id="mytextarea" name="pesan" style="height: 300px"></textarea>
                            <label for="floatingTextarea2">Pesan</label>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-lg col-lg-12" id="submit">Send Now </button>

                    </form>
                </center>
            </div>
        </main>
    </div>
</div>