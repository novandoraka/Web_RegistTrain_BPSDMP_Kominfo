<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Now - KOMINFO</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/styles.css">
    <?php 
    include("koneksi.php");
    ?>
</head>

<body>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="images/logo2.jpg" alt="">
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form" action="prosesdaftar.php">
                        <h2>student registration form</h2>
                        <div class="form-group">
                            <label for="namalengkap">Nama Lengkap :</label>
                            <input type="text" name="namalengkap" id="namalengkap" required />
                        </div>
                        <div class="form-group">
                            <label for="profesi">Profesi :</label>
                            <input type="text" name="profesi" id="profesi" required />
                        </div>
                        <div class="form-radio">
                            <label for="jeniskelamin" class="radio-label">Jenis Kelamin :</label>
                            <div class="form-radio-item">
                                <input type="radio" name="jeniskelamin" id="laki-laki" value="laki-laki" checked>
                                <label for="laki-laki">Laki-Laki</label>
                                <span class="check"></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="jeniskelamin" id="perempuan" value="perempuan">
                                <label for="perempuan">Perempuan</label>
                                <span class="check"></span>
                            </div>
                        </div>
                        <!-- <div class="form-row">
                            <div class="form-group">
                                <label for="state">Negara :</label>
                                <div class="form-select">
                                    <select name="state" id="state">
                                        <option value=""></option>
                                        <option value="us">America</option>
                                        <option value="uk">English</option>
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city">Kota :</label>
                                <div class="form-select">
                                    <select name="city" id="city">
                                        <option value=""></option>
                                        <option value="losangeles">Los Angeles</option>
                                        <option value="washington">Washington</option>
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label for="nohp">No. HP :</label>
                            <input type="text" name="nohp" id="nohp">
                        </div>
                        <div class="form-group">
                            <label for="instansi">Intansi :</label>
                            <input type="text" name="instansi" id="instansi">
                        </div>
                        <div class="form-group">
                            <label for="pelatihan">Pelatihan :</label>
                            <div class="form-select">
                                <select name="pelatihan" id="pelatihan">
                                    <option value="0">Pilihan Anda</option>
                                    <?php
                                        $query_pelatihan = mysqli_query($koneksi, "select *from pelatihan");
                                        while($a= mysqli_fetch_array($query_pelatihan))
                                        {
                                    ?>
                                    <option value="<?php echo $a['id_pelatihan']?>"><?php echo $a['judul'];?></option>
                                    <?php 
                                        }
                                     ?>
                                        
                                    <!-- <option value="designer">Designer</option>
                                    <option value="marketing">Marketing</option> -->
                                </select>
                                <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email ID :</label>
                            <input type="email" name="email" id="email" />
                        </div>
                        <div class="form-submit">
                            <input type="submit" value="Reset All" class="submit" name="reset" id="reset" />
                            <input type="submit" value="Submit Form" class="submit" name="submit" id="submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>