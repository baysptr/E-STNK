<?php
session_start();
include "config.php";

if(isset($_SESSION['logged_in'])){
    if ($_SESSION['status'] != "polda"){
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
                <a class="nav-link" href="input_nopol.php">Input Nopol</a>
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
            <h1 class="display-3">Table data kendaraan</h1>
            <table class="table table-hover table-bordered table-light">
                <thead>
                    <tr>
                        <td><b>NO</b></td>
                        <td><b>NIK</b></td>
                        <td><b>NOPOL</b></td>
                        <td colspan="2" align="center"><div class="btn btn-sm btn-block btn-primary" onclick="addNopol()" title="Input data NOPOL"><span class="fas fa-plus-square"></span></div></td>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql = mysqli_query($conn, "select * from m_kendaraan");
                    $row = mysqli_num_rows($sql);
                    $no = 1;
                    if($row > 0){
                        while($data = mysqli_fetch_array($sql)){ ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['nik'] ?></td>
                                <td><?= $data['nopol'] ?></td>
                                <td><a href="javascript:;" onclick="detailNopol('<?= $data['id'] ?>')" class="btn btn-sm btn-block btn-info" title="Detail NOPOL"><span class="fas fa-book-open"></span></a> </td>
                                <td><a href="javascript:;" onclick="if(confirm('Apakah anda yakin untuk menghapusnya?') === true){ window.location = 'del_nopol.php?id=<?= $data['id'] ?>' }" class="btn btn-sm btn-block btn-danger" title="Hapus NOPOl"><span class="fas fa-trash"></span></a> </td>
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
                <h4 class="modal-title">Form Input NOPOL</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="do_nopol.php" method="post">
                    <table class="table table-light table-bordered table-hover">
                        <tr>
                            <td>NIK</td>
                            <td>:</td>
                            <td><input type="text" name="nik" id="nik" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>NOPOL</td>
                            <td>:</td>
                            <td><input type="text" name="nopol" id="nopol" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>PASS_NOPOL</td>
                            <td>:</td>
                            <td><input type="password" name="pass" id="pass" class="form-control"></td>
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
                <h4 class="modal-title">Detail NOPOL</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                    <table class="table table-light table-bordered table-hover">
                        <tr>
                            <td>NIK</td>
                            <td>:</td>
                            <td><input type="text" id="det_nik" disabled></td>
                        </tr>
                        <tr>
                            <td>NOPOL</td>
                            <td>:</td>
                            <td id="det_nopol"></td>
                        </tr>
                        <tr>
                            <td>PASS_NOPOL</td>
                            <td>:</td>
                            <td id="det_pass"></td>
                        </tr>
                        <tr>
                            <td>LAST UPDATE</td>
                            <td>:</td>
                            <td id="det_tgl"></td>
                        </tr>
                        <tr>
                            <td>OLD NOPOL</td>
                            <td>:</td>
                            <td id="det_old"></td>
                        </tr>
                    </table>
            </div>
            <div class="modal-footer">
                <div class="btn btn-sm btn-primary" onclick="ubahNopol($('#det_nik').val())">Ubah Data <span class="fas fa-edit"></span></div>
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
                <h4 class="modal-title">Form Ubah NOPOL</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="do_ubah_nopol.php" method="post">
                    <table class="table table-light table-bordered table-hover">
                        <input type="hidden" name="u_nik" id="u_nik" class="form-control">
                        <tr>
                            <td>NOPOL</td>
                            <td>:</td>
                            <td><input type="text" name="u_nopol" id="u_nopol" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>PASS_NOPOL</td>
                            <td>:</td>
                            <td><input type="password" name="u_pass" id="u_pass" class="form-control"></td>
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
    function addNopol() {
        $("#formModal").modal("show");
    }

    function detailNopol(id) {
        $.getJSON("det_nopol.php?id=" + id, function (data) {
           $("#det_nik").val(data.nik);
           $("#det_nopol").html(data.nopol);
           $("#det_pass").html(data.pass);
           $("#det_tgl").html(data.last_update);
           $("#det_old").html(data.old_nopol);
           $("#detailModal").modal("show");
        });
    }

    function ubahNopol(nik) {
        $("#detailModal").modal("hide");
        $.getJSON("ubah_nopol.php?nik=" + nik, function (data) {
            $("#u_nik").val(data.nik);
            $("#u_nopol").val(data.nopol);
            $("#u_pass").val(data.pass);
            $("#ubahModal").modal("show");
        });
    }
</script>
</body>
</html>
