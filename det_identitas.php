<?php
include "config.php";

$id = $_GET['id'];

$sql = mysqli_query($conn, "SELECT mk.nopol, ik.id, ik.no_rangka, ik.merk, ik.seri, ik.warna, ik.jenis, ik.last_update from identitas_kendaraan as ik join m_kendaraan as mk on mk.id=ik.id_kendaraan where ik.id = '$id'");

echo json_encode(mysqli_fetch_assoc($sql));