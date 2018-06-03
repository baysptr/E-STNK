<?php
session_start();
include "config.php";

if(isset($_SESSION['logged_in'])){
    if ($_SESSION['status'] != "samsat"){
        echo "<script>alert('Maaf akses anda tidak diketahui!');window.location='index.php'</script>";
    }
}else{
    echo "<script>alert('Maaf anda belum melakukan login!');window.location='index.php'</script>";
}
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
            <li class="nav-item">
                <a class="nav-link" href="index.php">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="identitas_kendaraan.php">Input Identitas Nopol</a>
            </li>
        </ul>
        <div class="text-right">
            <div class="btn btn-sm btn-primary" onclick="window.location = 'logout.php';" title="Login User !"><span class="fas fa-lock"></span></div>
        </div>
    </div>
</nav>

<main role="main">
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Table data Identitas kendaraan</h1>
            <table class="table table-hover table-bordered table-light">
                <thead>
                <tr>
                    <td><b>NO</b></td>
                    <td><b>NOPOL</b></td>
                    <td><b>MERK</b></td>
                    <td colspan="2" align="center"><div class="btn btn-sm btn-block btn-primary" onclick="addIdentitas()" title="Input data NOPOL"><span class="fas fa-plus-square"></span></div></td>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = mysqli_query($conn, "select identitas_kendaraan.id as id_identitas, identitas_kendaraan.id_kendaraan, m_kendaraan.nopol, identitas_kendaraan.merk from identitas_kendaraan join m_kendaraan on m_kendaraan.id=identitas_kendaraan.id_kendaraan");
                $row = mysqli_num_rows($sql);
                $no = 1;
                if($row > 0){
                    while($data = mysqli_fetch_array($sql)){ ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nopol'] ?></td>
                            <td><?= $data['merk'] ?></td>
                            <td><a href="javascript:;" onclick="detailIdentitas('<?= $data['id_identitas'] ?>')" class="btn btn-sm btn-block btn-info" title="Detail NOPOL"><span class="fas fa-book-open"></span></a> </td>
                            <td><a href="javascript:;" onclick="hapusIdentitas('<?= $data['id_identitas'] ?>')" class="btn btn-sm btn-block btn-danger" title="Hapus NOPOl"><span class="fas fa-trash"></span></a> </td>
                        </tr>
                    <?php }
                }else{ ?>
                    <tr>
                        <td colspan="5" align="center"><b>Data belum terisi</b></td>
                    </tr>
                <?php }
                ?>
                </tbody>
            </table>
        </div>
    </div>

</main>

<footer class="container fixed-bottom">
    <p>&copy; e-STNK Corps. 2018 - 2019</p>
</footer>

<!-- Modal -->
<div id="formModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Input Identitas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="do_identitas.php" method="post">
                    <table class="table table-light table-bordered table-hover">
                        <tr>
                            <td>NOPOL</td>
                            <td>:</td>
                            <td>
                                <select name="nopol" id="nopol" class="form-control">
                                    <option disabled selected>-- Pilih NOPOl --</option>
                                    <?php
                                        $sql_form = mysqli_query($conn, "SELECT * FROM m_kendaraan WHERE id NOT IN (SELECT id_kendaraan FROM identitas_kendaraan)");
                                        while($data = mysqli_fetch_array($sql_form)){
                                            echo '<option value="'.$data['id'].'">'.$data["nopol"].'</option>';
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>NO MESIN</td>
                            <td>:</td>
                            <td><input type="text" name="no_mesin" id="no_mesin" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>MERK</td>
                            <td>:</td>
                            <td><input type="text" name="merk" id="merk" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>SERI</td>
                            <td>:</td>
                            <td><input type="text" name="seri" id="seri" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>WARNA</td>
                            <td>:</td>
                            <td><input type="text" name="warna" id="warna" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>JENIS</td>
                            <td>:</td>
                            <td><input type="text" name="jenis" id="jenis" class="form-control"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right"><input type="reset" value="Clear!" class="btn btn-sm btn-danger"></td>
                            <td><input type="submit" value="Simpan" class="btn btn-sm btn-primary"></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail -->
<div id="detailModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Identitas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                    <table class="table table-light table-bordered table-hover">
                        <input type="hidden" id="det_id_identitas">
                        <tr>
                            <td>NOPOL</td>
                            <td>:</td>
                            <td id="det_nopol"></td>
                        </tr>
                        <tr>
                            <td>NO MESIN</td>
                            <td>:</td>
                            <td id="det_no_rangka"></td>
                        </tr>
                        <tr>
                            <td>MERK</td>
                            <td>:</td>
                            <td id="det_merk"></td>
                        </tr>
                        <tr>
                            <td>SERI</td>
                            <td>:</td>
                            <td id="det_seri"></td>
                        </tr>
                        <tr>
                            <td>WARNA</td>
                            <td>:</td>
                            <td id="det_warna"></td>
                        </tr>
                        <tr>
                            <td>JENIS</td>
                            <td>:</td>
                            <td id="det_jenis"></td>
                        </tr>
                        <tr>
                            <td>LAST UPDATE</td>
                            <td>:</td>
                            <td id="det_tgl"></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td><div class="btn btn-sm btn-primary" onclick="ubahIdentitas($('#det_id_identitas').val())">Ubah data <span class="fas fa-edit"></span></div> </td>
                        </tr>
                    </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="ubahModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Ubah Identitas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="do_ubah_identitas.php" method="post">
                    <table class="table table-light table-bordered table-hover">
                        <input type="hidden" id="u_id_identitas" name="u_id_identitas">
                        <tr>
                            <td>NOPOL</td>
                            <td>:</td>
                            <td><input type="text" id="u_nopol" disabled class="form-control"></td>
                        </tr>
                        <tr>
                            <td>NO MESIN</td>
                            <td>:</td>
                            <td><input type="text" name="u_no_mesin" id="u_no_mesin" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>MERK</td>
                            <td>:</td>
                            <td><input type="text" name="u_merk" id="u_merk" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>SERI</td>
                            <td>:</td>
                            <td><input type="text" name="u_seri" id="u_seri" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>WARNA</td>
                            <td>:</td>
                            <td><input type="text" name="u_warna" id="u_warna" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>JENIS</td>
                            <td>:</td>
                            <td><input type="text" name="u_jenis" id="u_jenis" class="form-control"></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td><input type="submit" value="Simpan" class="btn btn-sm btn-primary"></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script>
    function addIdentitas() {
        $("#formModal").modal("show");
    }

    function hapusIdentitas(id) {
        if(confirm("Apakah anda yakin akan menghapus data ini ?") === true){
            window.location = "del_identitas.php?id=" + id;
        }
    }

    function detailIdentitas(id) {
        $.getJSON("det_identitas.php?id=" + id, function (data) {
            $("#det_id_identitas").val(data.id);
            $("#det_nopol").html(data.nopol);
            $("#det_no_rangka").html(data.no_rangka);
            $("#det_merk").html(data.merk);
            $("#det_seri").html(data.seri);
            $("#det_warna").html(data.warna);
            $("#det_jenis").html(data.jenis);
            $("#det_tgl").html(data.last_update);
            $("#detailModal").modal("show");
        });
    }

    function ubahIdentitas(id) {
        $("#detailModal").modal("hide");
        $.getJSON("det_identitas.php?id=" + id, function (data) {
            $("#u_id_identitas").val(data.id);
            $("#u_nopol").val(data.nopol);
            $("#u_no_mesin").val(data.no_rangka);
            $("#u_merk").val(data.merk);
            $("#u_seri").val(data.seri);
            $("#u_warna").val(data.warna);
            $("#u_jenis").val(data.jenis);
            $("#ubahModal").modal("show");
        });
    }
</script>

</body>
</html>
