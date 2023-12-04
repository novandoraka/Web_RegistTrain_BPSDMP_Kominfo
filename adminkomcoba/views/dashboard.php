<head>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <script type="text/javascript" src="views/chart.js"></script>
</head>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"></li>
                        <li class="breadcrumb-item active">Wellcome!!!</li>
                    </ol>
                    <section class="" id="plot">
                        <div class="container">

                            <style type="text/css">
                                body {
                                    font-family: roboto;
                                }

                                table {
                                    margin: 0px auto;
                                }
                            </style>
                            <?php
                            include 'views/koneksi.php';
                            ?>

                            <center>
                                <div style="width: 700px;height: 700px">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </center>

                            <?php
                            //Query untuk menampilkan tabel mahasiswa1
                            $nama_jurusan1 = "";
                            $jumlah1 = null;

                            $sql = "SELECT pelatihan.judul, COUNT(*) AS total FROM pelatihan INNER JOIN peserta ON pelatihan.id_pelatihan=peserta.id_pelatihan GROUP BY pelatihan.id_pelatihan";

                            $hasil = mysqli_query($koneksi, $sql);

                            while ($data = mysqli_fetch_array($hasil)) {
                                $jur1 = $data['judul'];
                                $nama_jurusan1 .= "'$jur1'" . ", ";

                                $jum1 = $data['total'];
                                $jumlah1 .= "$jum1" . ", ";
                            }
                            //Query untuk menampilkan tabel mahasiswa2
                            ?>
                            <script>
                                var ctx = document.getElementById('myChart').getContext('2d');
                                var chart = new Chart(ctx, {
                                    // The type of chart we want to create
                                    type: 'bar',

                                    // The data for our dataset
                                    data: {
                                        labels: [<?php echo $nama_jurusan1; ?>],
                                        datasets: [{
                                            label: 'Data Pelatihan',
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255,99,132,1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)'
                                            ],
                                            borderWidth: 1,
                                            data: [<?php echo $jumlah1; ?>]
                                        }, ]
                                    },

                                    // Configuration options go here
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
            </main>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Core theme JS-->
    <script src="views/js/scripts.js"></script>
</body>