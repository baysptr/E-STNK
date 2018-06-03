<?php
 include "config.php";
 date_default_timezone_set('Asia/Jakarta');

 $id = $_POST['u_id_identitas'];
 $no_mesin = $_POST['u_no_mesin'];
 $merk = $_POST['u_merk'];
 $seri = $_POST['u_seri'];
 $warna = $_POST['u_warna'];
 $jenis = $_POST['u_jenis'];
 $last_update = date("Y-m-d H:i:s");

 $sql = mysqli_query($conn, "update identitas_kendaraan set no_rangka = '$no_mesin', merk = '$merk', seri = '$seri', warna = '$warna', jenis = '$jenis', last_update = '$last_update' where id = '$id'");

if($sql){
    echo "<script>alert('Ubah data, Success');window.location = 'identitas_kendaraan.php';</script>";
}else{
    echo "<script>alert('Ubah data, Failur');window.location = 'identitas_kendaraan.php';</script>";
}