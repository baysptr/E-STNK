<?php
    session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta name="description" content="">
    <meta name="author" content="">
    <title>E-STNK | Digital</title>
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/bootstrap/dist/css/jumbotron.css" rel="stylesheet">

    <link href="bower_components/Font-Awesome/web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-md navbar-light fixed-top" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="index.html">
        <img src="bower_components/bootstrap/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        e-STNK
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
            </li>
            <?php
                if(isset($_SESSION['logged_in'])){
                    if($_SESSION['status'] == "polda"){
                        echo '<li class="nav-item">
                            <a class="nav-link" href="input_nopol.php">Input Nopol</a>
                        </li>';
                    }else if($_SESSION['status'] == "samsat"){
                        echo '<li class="nav-item">
                            <a class="nav-link" href="identitas_kendaraan.php">Input Identitas Kendaraan</a>
                        </li>';
                    }
                }
            ?>
        </ul>
        <?php
            if(isset($_SESSION['logged_in'])){
                echo '<div class="text-right">
                    <div class="btn btn-sm btn-primary" onclick="window.location = \'logout.php\';" title="Login User !"><span class="fas fa-lock"></span></div>
                </div>';
            }else{
                echo '<div class="text-right">
                        <div class="btn btn-sm btn-primary" onclick="window.location = \'login.php\';" title="Logout User !"><span class="fas fa-user-lock"></span></div>
                    </div>';
            }
        ?>
    </div>
</nav>

<main role="main">
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Selamat Datang</h1>
            <p><b>e-STNK</b> adalah sebuah pengembangan teknologi di bidang STNK yang dapat mengurangi materil yang terpakai dalam hal ini media yang kami maksud adalah kertas, serta dapat mempermudah pengguna kendaraan bermotor dan substansi - substansi yang terlibat dalam bidang perhubungan.</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>About Product <span class="fas fa-user-circle"></span></h2>
                <p>Saya adalah mahasiswa <b>Fakultas Ilmu Komputer, Universitas Narotama</b> dengan jurusan <b>Sistem Komputer</b> semester 4.</p>
                <p><a class="btn btn-secondary" href="#" role="button">Lihat selengkapnya tentang saya &raquo;</a></p>
            </div>
            <div class="col-md-6">
                <h2>Contact Us <span class="fas fa-phone-square"></span></h2>
                <p>Selain saya yang sedang menempuh pendidikan <b>Strata 1 di Univ. Narotama, </b>saya juga menjalani pekerjaan <b>Freelance</b> dibidang <b>Engineering Controller & WEB Development,</b> Contact me for <b>Partnership</b></p>
                <p><a class="btn btn-secondary" href="#" role="button">Hubungi saya &raquo;</a></p>
            </div>
        </div>

        <hr>

    </div> <!-- /container -->

</main>

<footer class="container fixed-bottom">
    <p>&copy; e-STNK Corps. 2018 - 2019</p>
</footer>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
