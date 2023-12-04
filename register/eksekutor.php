<?php
include "koneksi.php";

include "../register/classes/class.phpmailer.php";

// $no = $_POST['no'];
$namleng = $_POST['namalengkap'];
$mail = $_POST['email'];
$hp = $_POST['nohp'];
$jenkel = $_POST['jeniskelamin'];
$prof = $_POST['profesi'];
$inst = $_POST['instansi'];
$pela = $_POST['pelatihan'];
// $jud = $_POST['judul'];

$query_input = mysqli_query($koneksi, "insert into peserta (nama,email,notelp,jkel,profesi,instansi,id_pelatihan) values('$namleng','$mail','$hp','$jenkel','$prof','$inst','$pela')");
// $tampil = mysqli_query($koneksi, "SELECT judul FROM pelatihan");
$query_pel = mysqli_query($koneksi, "SELECT pelatihan.judul FROM pelatihan INNER JOIN peserta ON pelatihan.id_pelatihan=peserta.id_pelatihan WHERE pelatihan.id_pelatihan=$pela");
$row = mysqli_fetch_array($query_pel);

if ($query_input) {

    $tujuan = $_POST['email'];
    // include "classes/class.phpmailer.php";

    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->SMTPSecure = 'ssl';
    $mail->Host = "smtp.gmail.com"; //host email
    $mail->SMTPDebug = 2;
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->Username = "rakavando@gmail.com"; //user email server
    $mail->Password = "gjckusftkqjbjuqy"; //password email server
    $mail->SetFrom("rakavando@gmail.com", "Testing"); //set email pengirim / server
    $mail->Subject = "Pendaftaran Pelatihan BPSDMP KOMINFO"; //subyek email
    $mail->AddAddress($tujuan);  // email tujuan
    $mail->MsgHTML("Selamat, " . $namleng . " anda telah terdaftar dalam " . $row['judul'] . ". Silahkan menunggu info lebih lanjut");


    if ($mail->Send()) {
        echo "<script>alert('PENDAFTARAN BERHASIL')</script>";
        echo "<meta http-equiv='refresh' content='0; url=../?page=index.php'>";
        // echo "<script type='text/javascript'> document.location = 'index.php';</script>";
    } else {
        echo "<script>alert('PENDAFTARAN GAGAL')</script>";
        // echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    }
}
?>

<!-- Elseif Channel -->