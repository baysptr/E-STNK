<?php
include "config.php";

$id = $_GET['id'];

$sql = mysqli_query($conn, "select * from m_kendaraan where id = '$id'");

echo json_encode(mysqli_fetch_assoc($sql));