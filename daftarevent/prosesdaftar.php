<?php
include "koneksi.php";
$no = $_POST['id_peserta'];
$namleng = $_POST['nama'];
$prof = $_POST['profesi'];
$inst = $_POST['instansi'];
$mail = $_POST['email'];
$hp = $_POST['notelp'];
$pela = $_POST['id_pelatihan'];
$jenkel = $_POST['jkel'];

$tambah = ("INSERT into peserta values('$no','$namleng','$prof','$inst','$mail','$hp','$pela','$jenkel')");
$insert_query = mysqli_query($koneksi, $tambah);

if ($insert_query) {
    echo "berhasil insert record";
} else
    echo "gagal insert record";
