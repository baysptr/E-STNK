<?php
    include "config.php";
    date_default_timezone_set('Asia/Jakarta');

    $nik = $_POST['u_nik'];
    $nopol = $_POST['u_nopol'];
    $pass = $_POST['u_pass'];
    $last_update = date("Y-m-d H:i:s");

    $sql_current = mysqli_query($conn, "select * from m_kendaraan where nik = '$nik'");
    $fetch_current = mysqli_fetch_assoc($sql_current);

    $old_nopol = $fetch_current['nopol'];

    $sql = mysqli_query($conn, "update m_kendaraan set nopol = '$nopol', pass = '$pass', last_update = '$last_update', old_nopol = '$old_nopol' where nik = '$nik'");

    if($sql){
        echo "<script>alert('Ubah data, Success');window.location = 'input_nopol.php';</script>";
    }else{
        echo "<script>alert('Ubah data, Failur');window.location = 'input_nopol.php';</script>";
    }