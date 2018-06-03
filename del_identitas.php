<?php
include "config.php";

$id = $_GET['id'];

$sql = mysqli_query($conn, "delete from identitas_kendaraan where id = '$id'");

if($sql){
    echo "<script>alert('Success');window.location = 'identitas_kendaraan.php';</script>";
}else{
    echo "<script>alert('Failur');window.location = 'identitas_kendaraan.php';</script>";
}