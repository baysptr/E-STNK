<?php
    include "config.php";

    $id = $_GET['id'];

    $sql = mysqli_query($conn, "delete from m_kendaraan where id = '$id'");

    if($sql){
        echo "<script>alert('Success');window.location = 'input_nopol.php';</script>";
    }else{
        echo "<script>alert('Failur');window.location = 'input_nopol.php';</script>";
    }