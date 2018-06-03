<?php
    include "config.php";
    date_default_timezone_set('Asia/Jakarta');

    $nik = $_POST['nik'];
    $nopol = $_POST['nopol'];
    $pass = $_POST['pass'];
    $last_update = date("Y-m-d H:i:s");

    $sql = mysqli_query($conn, "insert into m_kendaraan (id, nik, nopol, pass, last_update) VALUES ('', '$nik', '$nopol', '$pass', '$last_update')");
    if($sql){
        echo "<script>alert('Success');window.location = 'input_nopol.php';</script>";
    }else{
        echo "<script>alert('Failur');window.location = 'input_nopol.php';</script>";
    }