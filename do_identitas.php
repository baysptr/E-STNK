<?php
include "config.php";
date_default_timezone_set('Asia/Jakarta');

$nopol = $_POST['nopol'];
$no_mesin = $_POST['no_mesin'];
$merk = $_POST['merk'];
$seri = $_POST['seri'];
$warna = $_POST['warna'];
$jenis = $_POST['jenis'];
$last_update = date("Y-m-d H:i:s");

$sql = mysqli_query($conn, "insert into identitas_kendaraan (id, id_kendaraan, no_rangka, merk, seri, warna, jenis, last_update) VALUES ('', '$nopol', '$no_mesin', '$merk', '$seri', '$warna', '$jenis', '$last_update')");
if($sql){
    echo "<script>alert('Success');window.location = 'identitas_kendaraan.php';</script>";
}else{
    echo "<script>alert('Failur');window.location = 'identitas_kendaraan.php';</script>";
}