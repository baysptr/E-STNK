<?php
include "config.php";

$nik = $_GET['nik'];

$sql = mysqli_query($conn, "select * from m_kendaraan where nik = '$nik'");

echo json_encode(mysqli_fetch_assoc($sql));