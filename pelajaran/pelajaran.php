<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit();
}

require_once "../config.php";
$title = "Mata Pelajaran - SMA Pemalang";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
 
 } else {
     $msg = "";
 }
 
 $alert = '';
 if ($msg == 'cancel') {
    $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-xmark"></i> Tambah Mapel Gagal, Mapel Sudah Ada
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}


 if ($msg == 'added') {
    $alert = '<div class="alert alert-succes alert-dismissible" style="display: none;" id="added" role="alert">
    <i class="fa-solid fa-circle-check"></i> Tambah Mapel Sukses
  </div>';
}


 if ($msg == 'deleted') {
    $alert = '<div class="alert alert-succes alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Pelajaran dihapus
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

if ($msg == 'cancelupdate') {
    $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-xmark"></i> UPdate mapel gagal, mapel sudah ada
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

if ($msg == 'updated') {
    $alert = '<div class="alert alert-succes alert-dismissible" style="display: none" role="alert" id="updated">
    <i class="fa-solid fa-circle-check"></i> Pelajaran berhasil diupdated
  </div>';
}




?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Mata Pelajaran</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Mata Pelajaran</li>
            </ol>
            <?php 
            if ($msg != '') {
                echo $alert;
            }
            ?>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa-solid fa-square-plus"></i> Tambah Pelajaran
                        </div>
                        <div class="card-body">
                            <form action="proses-pelajaran.php" method="POST">
                                <div class="mb-3">
                                    <label for="pelajaran" class="form-label">Pelajaran</label>
                                    <input type="text" class="form-control" id="pelajaran" name="pelajaran" placeholder="Nama pelajaran" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jurusan" class="form-label">Jurusan</label>
                                    <select name="jurusan" id="jurusan" class="form-select" required>
                                        <option value="" selected>--Pilih Jurusan Anda--</option>
                                        <option value="IPA">IPA</option>
                                        <option value="IPS">IPS</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="guru" class="form-label">Guru</label>
                                    <select name="guru" id="guru" class="form-select" required>
                                        <option value="" selected>--Pilih Guru Anda--</option>
                                        <?php
                                        $queryGuru = mysqli_query($koneksi, "SELECT * FROM tbl_guru");
                                        while ($dataGuru = mysqli_fetch_array($queryGuru)) { ?>
                                            <option value="<?= $dataGuru['nama'] ?>"><?= $dataGuru['nama'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary" name="simpan"><i class="fa-solid fa-bookmark"></i> Simpan</button>
                                    <button type="reset" class="btn btn-danger" name="reset"><i class="fa-solid fa-ban"></i> Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa-solid fa-table-list"></i> Data Pelajaran
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <form action="" method="GET" class="d-flex col-md-6">
                                    <?php
                                    if (@$_GET['cari']) {
                                        $cari = @$_GET['cari'];
                                    } else {
                                        $cari = '';
                                    }
                                    ?>
                                    <input type="text" class="form-control me-2" placeholder="Keyword" name="cari" value="<?= $cari ?>">
                                    <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass-plus"></i></button>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col"><center>Mata Pelajaran</center></th>
                                            <th scope="col"><center>Jurusan</center></th>
                                            <th scope="col"><center>Guru</center></th>
                                            <th scope="col"><center>Operasi</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        if (@$_GET['cari']) {
                                            $keyword = @$_GET['cari'];
                                        } else {
                                            $keyword = '';
                                        }
                                        $queryPelajaran = mysqli_query($koneksi, "SELECT * FROM tbl_pelajaran WHERE pelajaran LIKE '%$keyword%' OR jurusan LIKE '%$keyword%' OR guru LIKE '%$keyword%'");
                                        if (mysqli_num_rows($queryPelajaran) > 0) {
                                            while ($data = mysqli_fetch_array($queryPelajaran)) { ?>
                                                <tr>
                                                    <th scope="row"><?= $no++ ?></th>
                                                    <td><?= $data['pelajaran'] ?></td>
                                                    <td><?= $data['jurusan'] ?></td>
                                                    <td><?= $data['guru'] ?></td>
                                                    <td align="center">
                                                        <a href="edit-pelajaran.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-warning" title="Update Pelajaran"><i class="fa-solid fa-pen"></i></a>
                                                        <button type="button" data-id="<?= $data['id'] ?>" id="btnHapus" class="btn btn-sm btn-danger" title="Hapus Pelajaran"><i class="fa-solid fa-trash-can"></i></button>
                                                    </td>
                                                </tr>
                                            <?php }
                                        } else { ?>
                                            <tr>
                                                <td colspan="5" align="center">Tidak ada data</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <div class="modal" id="mdlHapus" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Yakin?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="" id="btnMdlHapus" class="btn btn-primary">Ya</a>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function(){
            $(document).on('click', "#btnHapus", function(){
                $('#mdlHapus').modal('show');
                let id = $(this).data('id');
                $('#btnMdlHapus').attr('href', "hapus-pelajaran.php?id=" + id);
            })
            
            setTimeout(function(){
                $('#added').fadeIn('slow');
            }, 300)
            setTimeout(function(){
                $('#added').fadeOut('slow');
            }, 3000)

            setTimeout( function(){
                $('#updated').slideDown('slow');
            },3000)

            setTimeout( function(){
                $("#updated").slideUp(700);
            },3000)
        })

    </script>

<?php

require_once "../template/footer.php";



?>