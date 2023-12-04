<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// //include library phpmailer
// include('assets/src/Exception.php');
// include('assets/src/PHPMailer.php');
// include('assets/src/SMTP.php');

include "koneksi.php";

// $no = $_POST['no'];
$namleng = $_POST['namalengkap'];
$mail = $_POST['email'];
$hp = $_POST['nohp'];
$jenkel = $_POST['jeniskelamin'];
$prof = $_POST['profesi'];
$inst = $_POST['instansi'];
$pela = $_POST['pelatihan'];

$query_input = mysqli_query($koneksi, "insert into peserta (nama,email,notelp,jkel,profesi,instansi,id_pelatihan) values('$namleng','$mail','$hp','$jenkel','$prof','$inst','$pela')");

if ($query_input) {
    echo "berhasil insert record";
} else
    echo "gagal insert record";

// if (($insert_query)) {
//     $email_pengirim = 'rakavando@gmail.com';
//     $nama_pengirim = 'PT. Real Madrid Inc';
//     $email_penerima = $_POST['email'];
//     $subjek = 'Registration Form Training';

//     $mail = new PHPMailer;
//     $mail->isSMTP();

//     $mail->Host = 'smtp.gmail.com';
//     $mail->Username = $email_pengirim;
//     $mail->password = '123456789';
//     $mail->Port = 465;
//     $mail->SMTPAuth = true;
//     $mail->SMTPSecure = 'ssl';
//     $mail->SMTPDebug = 2;

//     $mail->setFrom($email_pengirim, $nama_pengirim);
//     $mail->addAddress($email_penerima);
//     $mail->isHTML(true);
//     $mail->Subjek = $subjek;
//     $mail->Body = 'Selamat Anda sudah terdaftar di Pelatihan';

//     $send = $mail->send();
//     if ($send) {
//         echo "<h1>email berhasil dikirim</h1><br/><a href='index.php'>kembali ke form</a>";
//     } else {
//         echo "<h1>email gagal dikirim</h1><br/><a href='index.php'>kembali ke form</a>";
//     }
// }
