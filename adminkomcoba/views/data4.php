<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
    <div class="form-group">
        <label for="sel1">Select list:</label>
        <select class="form-control" name="pelatihan">
            <?php
            include "views/koneksi.php";
            //Perintah sql untuk menampilkan semua data pada tabel jurusan
            $sql = "SELECT * from pelatihan";

            $hasil = mysqli_query($koneksi, $sql);
            $no = 0;
            while ($data = mysqli_fetch_array($hasil)) {
                $no++;

                $ket = "";
                if (isset($_GET['pelatihan'])) {
                    $jurusan = trim($_GET['pelatihan']);

                    if ($jurusan == $data['id_pelatihan']) {
                        $ket = "selected";
                    }
                }
            ?>
                <option <?php echo $ket; ?> value="<?php echo $data['id_pelatihan']; ?>"><?php echo $data['judul']; ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-info" value="Pilih">
    </div>
</form>